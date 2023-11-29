<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MostFrequentSkillset extends Model
{
    use HasFactory;

    protected $table = 'most_frequent_skillset';
    protected $connection = 'pgsql';
    protected $primaryKey = 'most_frequent_skillset_id';
    protected $guarded = ['most_frequent_skillset_id'];
    protected $keyType = 'string';

    public function skillsets() 
    {
        return $this->belongsTo(Skillset::class, 'skillset_id');
    }
}
