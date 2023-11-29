<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSkillset extends Model
{
    use HasFactory;

    protected $table = 'talent_skillset';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_skillset_id';
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->belongsTo(Talent::class, 'talent_id');
    }

    public function skillsets() 
    {
        return $this->belongsTo(Skillset::class, 'skillset_id');
    }
}
