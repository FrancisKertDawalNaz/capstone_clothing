<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'name',
        'price',
        'quantity',
        'size',
        'duration',
        'image',
        'shop',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
