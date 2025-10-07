<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // kunin lahat ng shops sa database
        $shops = DB::table('shops')->get();

        // ibalik sa view
        return view('user.home', compact('shops'));
    }
}
