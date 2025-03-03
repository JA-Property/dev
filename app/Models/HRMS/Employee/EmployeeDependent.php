<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;

class EmployeeDependent extends Model
{
    use HasCustomPrimaryKey;
    
    protected $table = 'employee_dependents';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Define a belongsTo relationship back to Employee.
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    // Additional fields might include:
    // - dependent_name, relationship, date_of_birth, gender, etc.
}
