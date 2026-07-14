<?php
/**
 * Web Routes - Page Routes
 */

$routes['GET']['/'] = function () {
    if (is_authenticated()) {
        redirect('/dashboard');
    }
    require_once BASE_PATH . '/resources/views/auth/login.php';
};

$routes['POST']['/login'] = function () {
    require_once BASE_PATH . '/app/Controllers/AuthController.php';
    $controller = new AuthController();
    $controller->login();
};

$routes['GET']['/logout'] = function () {
    session_destroy();
    redirect('/');
};

// Dashboard
$routes['GET']['/dashboard'] = function () {
    if (!is_authenticated()) {
        redirect('/');
    }
    require_once BASE_PATH . '/resources/views/dashboard/index.php';
};

// Company Management
$routes['GET']['/company'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/CompanyController.php';
    $controller = new CompanyController();
    $controller->index();
};

// Users Management
$routes['GET']['/users'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/UserController.php';
    $controller = new UserController();
    $controller->index();
};

// Roles & Permissions
$routes['GET']['/roles'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/RoleController.php';
    $controller = new RoleController();
    $controller->index();
};

// Chart of Accounts
$routes['GET']['/accounts'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/AccountController.php';
    $controller = new AccountController();
    $controller->index();
};

// Vouchers
$routes['GET']['/journal-voucher'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/VoucherController.php';
    $controller = new VoucherController();
    $controller->journalIndex();
};

// Customers
$routes['GET']['/customers'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/CustomerController.php';
    $controller = new CustomerController();
    $controller->index();
};

// Suppliers
$routes['GET']['/suppliers'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/SupplierController.php';
    $controller = new SupplierController();
    $controller->index();
};

// Reports
$routes['GET']['/reports/ledger'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/ReportController.php';
    $controller = new ReportController();
    $controller->ledger();
};

$routes['GET']['/reports/trial-balance'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/ReportController.php';
    $controller = new ReportController();
    $controller->trialBalance();
};

$routes['GET']['/reports/balance-sheet'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/ReportController.php';
    $controller = new ReportController();
    $controller->balanceSheet();
};

$routes['GET']['/reports/profit-loss'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/ReportController.php';
    $controller = new ReportController();
    $controller->profitLoss();
};

// Settings
$routes['GET']['/settings'] = function () {
    if (!is_authenticated()) redirect('/');
    require_once BASE_PATH . '/app/Controllers/SettingController.php';
    $controller = new SettingController();
    $controller->index();
};
