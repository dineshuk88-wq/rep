<?php
/**
 * Application Helper Functions
 */

/**
 * Get configuration value
 */
function config(string $key, $default = null) {
    return $_ENV[$key] ?? $default;
}

/**
 * Output escaped HTML
 */
function html(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to URL
 */
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}

/**
 * Check if request is AJAX
 */
function is_ajax(): bool {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Return JSON response
 */
function json_response(array $data, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * Get authenticated user
 */
function auth(): ?array {
    return $_SESSION['user'] ?? null;
}

/**
 * Check if user is authenticated
 */
function is_authenticated(): bool {
    return isset($_SESSION['user']);
}

/**
 * Log message
 */
function log_message(string $level, string $message, ?array $context = null): void {
    $logDir = BASE_PATH . '/storage/logs';
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logFile = $logDir . '/' . date('Y-m-d') . '.log';
    $timestamp = date('Y-m-d H:i:s');
    $contextStr = $context ? json_encode($context) : '';
    $logEntry = "[$timestamp] [$level] $message $contextStr\n";
    
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

/**
 * Format currency (Saudi Riyal)
 */
function format_currency(float $amount, string $currency = 'SAR'): string {
    return number_format($amount, 2, '.', ',') . ' ' . $currency;
}

/**
 * Format date
 */
function format_date(string $date, string $format = 'd/m/Y'): string {
    return date($format, strtotime($date));
}

/**
 * Generate UUID
 */
function generate_uuid(): string {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

/**
 * Validate email
 */
function is_valid_email(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Hash password
 */
function hash_password(string $password): string {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Verify password
 */
function verify_password(string $password, string $hash): bool {
    return password_verify($password, $hash);
}

/**
 * Sanitize input
 */
function sanitize(string $input): string {
    return trim(htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
}

/**
 * Get validation errors
 */
function validation_errors(): array {
    return $_SESSION['errors'] ?? [];
}

/**
 * Set validation errors
 */
function set_validation_errors(array $errors): void {
    $_SESSION['errors'] = $errors;
}

/**
 * Flash message
 */
function flash_message(string $message, string $type = 'info'): void {
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
}

/**
 * Get flash message
 */
function get_flash_message(): ?array {
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

/**
 * Format number
 */
function format_number(float $number, int $decimals = 2): string {
    return number_format($number, $decimals, '.', ',');
}

/**
 * Get request input
 */
function input(string $key, $default = null) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return $_POST[$key] ?? $default;
    }
    return $_GET[$key] ?? $default;
}

/**
 * Check if input exists
 */
function has_input(string $key): bool {
    return isset($_POST[$key]) || isset($_GET[$key]);
}

/**
 * Get JSON input
 */
function json_input(): ?array {
    $input = file_get_contents('php://input');
    return json_decode($input, true);
}

/**
 * Convert to Arabic numerals
 */
function to_arabic_numerals(string $text): string {
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    return str_replace($english, $arabic, $text);
}

/**
 * Convert to English numerals
 */
function to_english_numerals(string $text): string {
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    return str_replace($arabic, $english, $text);
}

/**
 * Generate random token
 */
function generate_token(int $length = 32): string {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Check permission
 */
function has_permission(string $permission): bool {
    $user = auth();
    if (!$user) {
        return false;
    }
    
    // This will be implemented based on your permission system
    return true;
}
