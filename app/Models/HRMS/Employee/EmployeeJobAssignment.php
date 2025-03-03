<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;

class EmployeeJobAssignment extends Model
{
    use HasCustomPrimaryKey;
    
    protected $table = 'employee_job_assignments';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Define a belongsTo relationship back to Employee.
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    // Additional fields might include:
    // - position_title, department, supervisor, assigned_date, end_date, etc.
}
