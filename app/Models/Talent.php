<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;

    protected $table = 'talent';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_id';
    //protected $guarded = ['talent_id'];
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'talent_id',
        'talent_photo_filename',
        'talent_name',
        'talent_status_id',
        'employee_number',
        'sex',
        'birth_date',
        'talent_description',
        'talent_cv_filename',
        'experience',
        'talent_level_id',
        'total_project_completed',
        'email',
        'cellphone',
        'employee_status_id',
        'talent_availability',
        'biography_video_url',
    ];
    
    public function talentLevel() 
    {
        return $this->belongsTo(TalentLevel::class, 'talent_level_id');
    }

    public function talentStatus() 
    {
        return $this->belongsTo(TalentStatus::class, 'talent_status_id');
    }

    public function employeeStatus() 
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_status_id');
    }

    public function skillsets() 
    {
        return $this->belongsToMany(Skillset::class, 'talent_skillset', 'talent_id', 'skillset_id');
    }

    public function positions() 
    {
        return $this->belongsToMany(Position::class, 'talent_position', 'talent_id', 'position_id');
    }

    public function talentWishlist()
    {
        return $this->hasMany(TalentWishlist::class);
    }

    public function talentMetadata() 
    {
        return $this->hasOne(TalentMetadata::class);
    }

    public function talentSkillset() 
    {
        return $this->hasMany(TalentSkillset::class);
    }
}
