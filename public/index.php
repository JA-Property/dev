<?php
// public/index.php
use App\Core\GlobalLogger;

require_once __DIR__ . '/../bootstrap.php';


// Debugging inside the Authentication module
GlobalLogger::debug("AuthModule", "This is a debug message");

// Informational log for user login inside UserModule
GlobalLogger::info("UserModule", "User logged in", ['user_id' => 123]);

// Warning inside PerformanceModule
GlobalLogger::warning("PerformanceModule", "Memory usage is high");

// Error inside DatabaseModule
GlobalLogger::error("DatabaseModule", "Database connection failed", ['host' => 'localhost']);

use App\Controllers\HRMS\Employee\EmployeeController;

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? null;
$id     = $_GET['id'] ?? null;

$controller = new EmployeeController();

if ($method === 'GET') {
    if ($action === 'show' && $id) {
        $controller->show($id);
    } elseif ($action === 'new') {
        $controller->create();
    } else {
        echo "No valid GET action specified.";
    }
} elseif ($method === 'POST') {
    // All POST requests are assumed to be for storing a new employee.
    $controller->store();
} else {
    echo "No valid action specified.";
}
