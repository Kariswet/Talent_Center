<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentRequest extends Model
{
    use HasFactory;

    protected $table = 'talent_request';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_request_id';
    protected $guarded = ['talent_request_id'];
    protected $keyType = 'string';

    public function talentRequestStatus() 
    {
        return $this->belongsTo(TalentRequestStatus::class, 'talent_request_status_id');
    }
}
