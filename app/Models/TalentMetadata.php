<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentMetadata extends Model
{
    use HasFactory;

    protected $table = 'talent_metadata';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_metadata_id';
    protected $guarded = ['talent_metadata_id'];
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->belongsTo(Talent::class, 'talent_id');
    }
}
