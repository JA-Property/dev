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
    public $incrementing = true;  // Enable auto-increment
    protected $keyType = 'int';     // Primary key type is integer

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

    // ... other relationships ...
}
