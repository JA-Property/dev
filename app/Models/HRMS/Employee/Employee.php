<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\HRMS\Employee\EmployeeAddress;
use App\Models\HRMS\Employee\EmployeeEmail;
use App\Models\HRMS\Employee\EmployeePhone;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    // Enable auto-incrementing integer primary key.
    public $incrementing = true;
    // Set the primary key type to integer.
    protected $keyType = 'int';

    // Remove the boot method since we no longer generate a custom ID.
    
    public function addresses()
    {
        return $this->hasMany(EmployeeAddress::class, 'employee_id');
    }

    public function phones()
    {
        return $this->hasMany(EmployeePhone::class, 'employee_id');
    }

    public function emails()
    {
        return $this->hasMany(EmployeeEmail::class, 'employee_id');
    }

    // ... other relationships (emergencyContacts, employmentHistory, jobAssignments, dependents) ...
}
