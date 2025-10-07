<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show($id)
    {
        // kunin yung shop gamit ID
        $shop = DB::table('shops')->where('id', $id)->first();

        if (!$shop) {
            abort(404); // kung walang shop, error 404
        }

        // kunin na rin products kung meron kang products table
        $products = DB::table('products')
            ->where('shop_id', $id)
            ->get();

        return view('user.main_shop', compact('shop', 'products'));
    }
}
