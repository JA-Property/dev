<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;
use App\Models\HRMS\Employee\EmployeeAddress;
use App\Models\HRMS\Employee\EmployeeEmail;
use App\Models\HRMS\Employee\EmployeePhone;

class Employee extends Model
{
    use HasCustomPrimaryKey; // Use the custom primary key trait

    // Specify the table name if not following Laravel conventions.
    protected $table = 'employees';

    // Define the custom primary key.
    protected $primaryKey = 'id';

    // Disable auto-incrementing since we're using a custom key.
    public $incrementing = false;

    // Set the primary key type to string.
    protected $keyType = 'string';

    /**
     * Define a one-to-many relationship for addresses.
     */
    public function addresses()
    {
        return $this->hasMany(EmployeeAddress::class, 'employee_id');
    }

    /**
     * Define a one-to-many relationship for phones.
     */
    public function phones()
    {
        return $this->hasMany(EmployeePhone::class, 'employee_id');
    }

    /**
     * Define a one-to-many relationship for emails.
     */
    public function emails()
    {
        return $this->hasMany(EmployeeEmail::class, 'employee_id');
    }
}
