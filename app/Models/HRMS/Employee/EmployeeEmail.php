<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;

class EmployeeEmail extends Model
{
    use HasCustomPrimaryKey;

    protected $table = 'employee_emails';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Define inverse relationship back to Employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
