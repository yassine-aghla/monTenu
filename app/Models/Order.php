<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'payment_id',
        'status',
        'shipping_address',
        'billing_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

   
    public static $statuses = [
        'pending' => 'En attente',
        'completed' => 'Complétée',
        'failed' => 'Échouée',
        'refunded' => 'Remboursée'
    ];
}
