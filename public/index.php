<?php
// index.php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load the requested controller
$requestUrl = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$route = trim($requestUrl, '/');
$parts = explode('/', $route);
//$controller = $parts[0];
$controller = 'login';




// Map the requested controller to the corresponding file path
$controllerFilePath = realpath(__DIR__ . '/../controllers/' . ucfirst($controller) . 'Controller.php');


// Check if the controller file exists
if (file_exists($controllerFilePath)) {
    // Include the controller file
    require_once $controllerFilePath;



    // Create the controller class name
    $controllerClassName = ucfirst($controller) . 'Controller';

    // Check if the controller class exists
    if (class_exists($controllerClassName)) {
        // Create an instance of the controller
        $controllerInstance = new $controllerClassName();
        // Execute the controller action
            $controllerInstance->log();
            //$controllerInstance->indexAction();
            exit;
    }
}

// Check if the requested URL is /login
if ($controller === 'login') {
    // Display the login view
    include_once __DIR__ . '/../controllers/LoginController.php';
    exit;
}

// If the controller is not found, display an error message
echo '404 Not Found';
?>
