<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentStatus extends Model
{
    use HasFactory;

    protected $table = 'talent_status';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_status_id';
    protected $keyType = 'string';
    
    public function talents() 
    {
        return $this->hasMany(Talent::class);
    }
}
