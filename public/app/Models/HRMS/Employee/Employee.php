<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = self::generateUniqueId();
            }
        });
    }

    protected static function generateUniqueId($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        do {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
        } while (self::where('id', $randomString)->exists());
        return $randomString;
    }

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
}
