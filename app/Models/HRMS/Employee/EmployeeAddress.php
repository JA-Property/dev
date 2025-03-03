<?php
namespace App\Models\HRMS\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomPrimaryKey;

class EmployeeAddress extends Model
{
    use HasCustomPrimaryKey;

    protected $table = 'employee_addresses';
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
