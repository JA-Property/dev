<?php
// public/index.php

require_once __DIR__ . '/../bootstrap.php';

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
    // Assuming any POST request is for storing a new employee.
    $controller->store();
} else {
    echo "No valid action specified.";
}
