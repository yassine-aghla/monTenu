<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    
    public function tenues()
    {
        return $this->hasMany(Tenue::class);
    }
}
