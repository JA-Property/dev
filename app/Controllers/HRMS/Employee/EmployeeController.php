<?php
namespace App\Controllers\HRMS\Employee;

use App\Models\HRMS\Employee\Employee;

class EmployeeController
{
    /**
     * Display details for a specific employee.
     *
     * @param string $id The custom employee ID.
     */
    public function show($id)
    {
        // Retrieve the employee with all related data.
        $employee = Employee::with([
            'addresses', 
            'phones', 
            'emails', 
            'emergencyContacts',
            'employmentHistory',
            'jobAssignments',
            'dependents'
        ])->find($id);

        if (!$employee) {
            echo "Employee not found.";
            return;
        }

        require_once __DIR__ . '/../../../Views/HRMS/Employee/EmployeeProfile.php';
    }

    /**
     * Display the form for creating a new employee.
     */
    public function create()
    {
        require_once __DIR__ . '/../../../Views/HRMS/Employee/NewEmployee.php';
    }

    /**
     * Process the form submission to create a new employee.
     */
    public function store()
    {
        if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
            echo "First name and last name are required.";
            return;
        }
    
        $employee = new Employee();
        $employee->first_name = $_POST['first_name'];
        $employee->middle_name = $_POST['middle_name'] ?? null;
        $employee->last_name = $_POST['last_name'];
    
        if ($employee->save()) {
            header("Location: /?action=show&id=" . $employee->id);
            exit;
        } else {
            echo "Error creating employee.";
        }
    }
    
}
