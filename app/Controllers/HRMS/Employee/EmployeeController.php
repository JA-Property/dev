<?php
namespace App\Controllers\HRMS;

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
        // Retrieve the employee along with related addresses, phones, and emails using eager loading.
        $employee = Employee::with(['addresses', 'phones', 'emails'])->find($id);

        if (!$employee) {
            // Handle the case when no employee is found.
            echo "Employee not found.";
            return;
        }

        // Pass the employee data to the view.
        // This view (EmployeeProfile.php) will have access to the $employee variable.
        require_once __DIR__ . '/../../Views/HRMS/Employee/EmployeeProfile.php';
    }
}
