<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
protected $fillable = ['user_id'];

public function user()
{
    return $this->belongsTo(User::class);
}

public function tenues()
{
    return $this->belongsToMany(Tenue::class, 'cart_items')
                ->withPivot('quantity')
                ->withTimestamps();
}

public function items()
{
    return $this->hasMany(CartItem::class);
}
}
