<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentRequestStatus extends Model
{
    use HasFactory;

    protected $table = 'talent_request_status';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_request_status_id';
    protected $guarded = ['talent_request_status_id'];
    protected $keyType = 'string';

    public function talentRequest() 
    {
        return $this->hasMany(TalentRequest::class);
    }
}
