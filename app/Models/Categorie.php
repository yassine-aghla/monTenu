<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    Protected $fillable=['name','description'];

    public function tenues()
    {
        return $this->hasMany(Tenue::class);
    }
}
