<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['name', 'description', 'thumbnail_url', 'is_active'];
    
    public static function active()
    {
        return self::where('is_active', true)->first();
    }
}
