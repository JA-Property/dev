<?php
// public/index.php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\HRMS\Employee\EmployeeController;

// Basic routing based on GET parameters 'action' and 'id'
$action = $_GET['action'] ?? 'show';
$id     = $_GET['id'] ?? null;

if ($action === 'show' && $id) {
    $controller = new EmployeeController();
    $controller->show($id);
} else {
    echo "No valid action specified.";
}
