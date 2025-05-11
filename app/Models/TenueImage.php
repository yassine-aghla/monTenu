<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenueImage extends Model
{
    use HasFactory;

    protected $fillable = ['tenue_id', 'image_path'];

    public function tenue()
    {
        return $this->belongsTo(Tenue::class);
    }
}