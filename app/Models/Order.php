<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address',
        'city', 'region', 'postal', 'phone', 'payment', 'subtotal'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
