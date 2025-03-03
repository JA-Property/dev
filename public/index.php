<?php
// public/index.php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\EmployeeController;

// Basic routing based on a GET parameter "action" and "id"
$action = $_GET['action'] ?? 'show';
$id     = $_GET['id'] ?? null;

if ($action === 'show' && $id) {
    $controller = new EmployeeController();
    $controller->show($id);
} else {
    echo "No valid action specified.";
}
