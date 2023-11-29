<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsetType extends Model
{
    use HasFactory;

    protected $table = 'skillset_type';
    protected $connection = 'pgsql';
    protected $primaryKey = 'skillset_type_id';
    protected $guarded = ['skillset_type_id'];
    protected $keyType = 'string';

    public function skillsets() 
    {
        return $this->hasMany(Skillset::class);
    }
}
