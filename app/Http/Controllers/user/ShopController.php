<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show($id)
    {
        $shop = DB::table('shops')->where('id', $id)->first();

        if (!$shop) {
            abort(404, 'Shop not found');
        }

        $products = DB::table('products')
            ->where('shop_id', $id)
            ->get();

        return view('user.main_shop', compact('shop', 'products'));
    }
}
