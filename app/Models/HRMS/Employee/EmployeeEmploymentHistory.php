<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;

class EmployeeEmploymentHistory extends Model
{
    use HasCustomPrimaryKey;
    
    protected $table = 'employee_employment_history';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Define a belongsTo relationship back to Employee.
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    // Additional fields might include:
    // - job_title, department, start_date, end_date, etc.
}
