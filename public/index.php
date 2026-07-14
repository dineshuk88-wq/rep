<?php
/**
 * Diksha Accounting ERP - Saudi Edition
 * Application Entry Point
 */

define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

// Load environment variables
if (file_exists(BASE_PATH . '/.env')) {
    $env = parse_ini_file(BASE_PATH . '/.env');
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
    }
}

// Error handling
error_reporting(E_ALL);
if (isset($_ENV['APP_DEBUG']) && $_ENV['APP_DEBUG'] === 'true') {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

// Set timezone
date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'UTC');

// Start session
session_start();

// Load helpers
require_once BASE_PATH . '/app/helpers.php';

// Initialize database connection
try {
    require_once BASE_PATH . '/config/database.php';
} catch (Exception $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Load routes
$routes = [];
require_once BASE_PATH . '/routes/web.php';
require_once BASE_PATH . '/routes/api.php';

// Route the request
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Simple routing logic
try {
    $routeFound = false;
    
    // Check exact route match
    if (isset($routes[$requestMethod][$requestUri])) {
        call_user_func($routes[$requestMethod][$requestUri]);
        $routeFound = true;
    }
    
    if (!$routeFound) {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
} catch (Exception $e) {
    http_response_code(500);
    if (isset($_ENV['APP_DEBUG']) && $_ENV['APP_DEBUG'] === 'true') {
        echo "<h1>Error</h1>";
        echo "<p>" . $e->getMessage() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    } else {
        echo "500 - Internal Server Error";
    }
}
