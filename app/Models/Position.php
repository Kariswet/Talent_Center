<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $connection = 'pgsql';
    protected $primaryKey = 'position_id';
    protected $guarded = ['position_id'];
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->belongsToMany(Talent::class, 'talent_position', 'position_id', 'talent_id');
    }
}
