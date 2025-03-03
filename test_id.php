<?php
require_once 'bootstrap.php';
use App\Models\HRMS\Employee\Employee;

// Create a new Employee instance without saving
$employee = new Employee();
$employee->first_name = 'Test';
$employee->last_name = 'User';

// Force trigger the creation callback by calling save()
if ($employee->save()) {
    echo "Generated ID: " . $employee->id;
} else {
    echo "Error saving employee.";
}
