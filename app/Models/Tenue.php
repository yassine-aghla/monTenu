<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'description', 'prix', 'categorie_id', 'taille', 'couleur', 
        'disponible','date_creation',
         'materiau', 'marque', 'reference', 'promotion','league','equipe',
         'quantite','statut','premier_prix','joueur','number'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function images()
    {
        return $this->hasMany(TenueImage::class);
    }
}
