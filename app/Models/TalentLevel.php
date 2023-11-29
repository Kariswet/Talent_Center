<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentLevel extends Model
{
    use HasFactory;

    protected $table = 'talent_level';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_level_id';
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->hasMany(Talent::class);
    }
}
