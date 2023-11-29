<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skillset extends Model
{
    use HasFactory;

    protected $table = 'skillset';
    protected $connection = 'pgsql';
    protected $primaryKey = 'skillset_id';
    protected $guarded = ['skillset_id'];
    protected $keyType = 'string';

    public function mostFrequentSkillset() 
    {
        return $this->hasMany(MostFrequentSkillset::class);
    }

    public function talents() 
    {
        return $this->belongsToMany(Talent::class, 'talent_skillset', 'skillset_id', 'talent_id');
    }

    public function skillsetType() 
    {
        return $this->belongsTo(SkillsetType::class, 'skillset_type_id');
    }

    public function talentSkillset() 
    {
        return $this->hasMany(TalentSkillset::class);
    }
}
