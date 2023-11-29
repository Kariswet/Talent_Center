<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    use HasFactory;

    protected $table = 'employee_status';
    protected $connection = 'pgsql';
    protected $primaryKey = 'employee_status_id';
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->hasMany(Talent::class);
    }
}
