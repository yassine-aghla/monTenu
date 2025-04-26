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
         'quantite','statut','premier_prix','joueur','number','brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function images()
    {
        return $this->hasMany(TenueImage::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class); 
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function carts()
{
    return $this->belongsToMany(Cart::class, 'cart_items')
                ->withPivot('quantity')
                ->withTimestamps();
}
    
}
