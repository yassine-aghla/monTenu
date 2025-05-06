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

    public function getStatusLabelAttribute()
    {
        return self::$statuses[$this->status] ?? 'Inconnu';
    }

    public function getStatusColorClassAttribute()
    {
        $colors = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'completed' => 'bg-green-100 text-green-800',
            'failed' => 'bg-red-100 text-red-800',
            'refunded' => 'bg-blue-100 text-blue-800'
        ];
        
        return $colors[$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    public function payment()
{
    return $this->hasOne(Payment::class);
}
}
