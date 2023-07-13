<?php

// index.php

$requestUri = $_SERVER['REQUEST_URI'];
$baseUrl = '/bank';


require_once './controllers/LoginController.php';
require_once './controllers/DashboardController.php';
require_once './controllers/BankDashboardController.php';



if ($requestUri === $baseUrl . '/auth/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new LoginController();
    $authController->log();
} elseif ($requestUri === $baseUrl . '/auth/bank/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $authController = new BankLoginController();
        $authController->log();
} elseif ($requestUri === $baseUrl . '/auth/logout') {
    $authController = new LoginController();
    $authController->logout();
} elseif ($requestUri === $baseUrl . '/dashboard/transfer' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $dashboardController = new DashboardController();
    $dashboardController->transfer();
} elseif ($requestUri === $baseUrl . '/dashboard') {
    $dashboardController = new DashboardController();
    $dashboardController->indexAction();
} elseif ($requestUri === $baseUrl . '/dashboard') {
    $dashboardController = new DashboardController();
    $dashboardController->indexAction();
} else {
    $authController = new LoginController();
    $authController->log();
}
