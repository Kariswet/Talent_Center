<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentWishlist extends Model
{
    use HasFactory;

    protected $table = 'talent_wishlist';
    protected $connection = 'pgsql';
    protected $primaryKey = 'talent_wishlist_id';
    protected $guarded = ['talent_wishlist_id'];
    protected $keyType = 'string';

    public function talents() 
    {
        return $this->belongsTo(Talent::class, 'talent_wishlist_id');
    }
}
