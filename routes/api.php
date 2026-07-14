<?php
/**
 * API Routes - RESTful API Endpoints
 */

// Authentication Routes
$routes['POST']['/api/auth/login'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/AuthApiController.php';
    $controller = new AuthApiController();
    $controller->login();
};

$routes['POST']['/api/auth/logout'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/AuthApiController.php';
    $controller = new AuthApiController();
    $controller->logout();
};

$routes['POST']['/api/auth/refresh'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/AuthApiController.php';
    $controller = new AuthApiController();
    $controller->refreshToken();
};

// Company API
$routes['GET']['/api/companies'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/CompanyApiController.php';
    $controller = new CompanyApiController();
    $controller->index();
};

$routes['GET']['/api/companies/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CompanyApiController.php';
    $controller = new CompanyApiController();
    $controller->show($id);
};

$routes['POST']['/api/companies'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/CompanyApiController.php';
    $controller = new CompanyApiController();
    $controller->store();
};

$routes['PUT']['/api/companies/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CompanyApiController.php';
    $controller = new CompanyApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/companies/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CompanyApiController.php';
    $controller = new CompanyApiController();
    $controller->delete($id);
};

// Users API
$routes['GET']['/api/users'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/UserApiController.php';
    $controller = new UserApiController();
    $controller->index();
};

$routes['GET']['/api/users/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/UserApiController.php';
    $controller = new UserApiController();
    $controller->show($id);
};

$routes['POST']['/api/users'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/UserApiController.php';
    $controller = new UserApiController();
    $controller->store();
};

$routes['PUT']['/api/users/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/UserApiController.php';
    $controller = new UserApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/users/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/UserApiController.php';
    $controller = new UserApiController();
    $controller->delete($id);
};

// Accounts API
$routes['GET']['/api/accounts'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/AccountApiController.php';
    $controller = new AccountApiController();
    $controller->index();
};

$routes['GET']['/api/accounts/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/AccountApiController.php';
    $controller = new AccountApiController();
    $controller->show($id);
};

$routes['POST']['/api/accounts'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/AccountApiController.php';
    $controller = new AccountApiController();
    $controller->store();
};

$routes['PUT']['/api/accounts/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/AccountApiController.php';
    $controller = new AccountApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/accounts/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/AccountApiController.php';
    $controller = new AccountApiController();
    $controller->delete($id);
};

// Journal Vouchers API
$routes['GET']['/api/journal-vouchers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/VoucherApiController.php';
    $controller = new VoucherApiController();
    $controller->index();
};

$routes['GET']['/api/journal-vouchers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/VoucherApiController.php';
    $controller = new VoucherApiController();
    $controller->show($id);
};

$routes['POST']['/api/journal-vouchers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/VoucherApiController.php';
    $controller = new VoucherApiController();
    $controller->store();
};

$routes['PUT']['/api/journal-vouchers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/VoucherApiController.php';
    $controller = new VoucherApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/journal-vouchers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/VoucherApiController.php';
    $controller = new VoucherApiController();
    $controller->delete($id);
};

// Customers API
$routes['GET']['/api/customers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/CustomerApiController.php';
    $controller = new CustomerApiController();
    $controller->index();
};

$routes['GET']['/api/customers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CustomerApiController.php';
    $controller = new CustomerApiController();
    $controller->show($id);
};

$routes['POST']['/api/customers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/CustomerApiController.php';
    $controller = new CustomerApiController();
    $controller->store();
};

$routes['PUT']['/api/customers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CustomerApiController.php';
    $controller = new CustomerApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/customers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/CustomerApiController.php';
    $controller = new CustomerApiController();
    $controller->delete($id);
};

// Suppliers API
$routes['GET']['/api/suppliers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/SupplierApiController.php';
    $controller = new SupplierApiController();
    $controller->index();
};

$routes['GET']['/api/suppliers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/SupplierApiController.php';
    $controller = new SupplierApiController();
    $controller->show($id);
};

$routes['POST']['/api/suppliers'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/SupplierApiController.php';
    $controller = new SupplierApiController();
    $controller->store();
};

$routes['PUT']['/api/suppliers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/SupplierApiController.php';
    $controller = new SupplierApiController();
    $controller->update($id);
};

$routes['DELETE']['/api/suppliers/:id'] = function ($id) {
    require_once BASE_PATH . '/app/Controllers/Api/SupplierApiController.php';
    $controller = new SupplierApiController();
    $controller->delete($id);
};

// Reports API
$routes['GET']['/api/reports/ledger'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/ReportApiController.php';
    $controller = new ReportApiController();
    $controller->ledger();
};

$routes['GET']['/api/reports/trial-balance'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/ReportApiController.php';
    $controller = new ReportApiController();
    $controller->trialBalance();
};

$routes['GET']['/api/reports/balance-sheet'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/ReportApiController.php';
    $controller = new ReportApiController();
    $controller->balanceSheet();
};

$routes['GET']['/api/reports/profit-loss'] = function () {
    require_once BASE_PATH . '/app/Controllers/Api/ReportApiController.php';
    $controller = new ReportApiController();
    $controller->profitLoss();
};
