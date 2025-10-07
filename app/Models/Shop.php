<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $fillable = ['shop_name', 'owner_name', 'contact', 'address', 'logo'];

}
