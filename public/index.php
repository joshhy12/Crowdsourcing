<?php
// Define the application path
define('APP_PATH', dirname(__DIR__));

// Load configuration
require_once APP_PATH . '/config/config.php';
require_once APP_PATH . '/config/database.php';

// Auto-loading function for classes
spl_autoload_register(function ($class) {
    // Convert namespace separators to directory separators
    $class = str_replace('\\', '/', $class);
    
    // Define paths to check for the class
    $paths = [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
        APP_PATH . '/helpers/'
    ];
    
    // Check each path for the class file
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Start session
session_start();

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

// Default route
if (empty($uri)) {
    $uri = 'home/index';
}

// Split URI into controller and action
$parts = explode('/', $uri);
$controllerName = ucfirst($parts[0]) . 'Controller';
$action = isset($parts[1]) ? $parts[1] : 'index';

// Create controller instance
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        // Call the action
        $controller->$action();
    } else {
        // Handle 404 - Action not found
        header("HTTP/1.0 404 Not Found");
        echo "Action not found";
    }
} else {
    // Handle 404 - Controller not found
    header("HTTP/1.0 404 Not Found");
    echo "Controller not found";
}
