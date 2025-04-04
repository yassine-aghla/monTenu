<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'tenue_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenue()
    {
        return $this->belongsTo(Tenue::class);
    }
}

