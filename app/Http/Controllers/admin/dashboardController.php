<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AuditTrailModel;
use App\Models\BookingVisitor;
use App\Models\BookVisitationModel;
use App\Models\CourseModel;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{

    public function display_dashboard()
    {
        $totalRevenue = DB::table('orders')->sum('subtotal');
        $totalUsers = DB::table('users')->where('user_type', 2)->count();
        $newusers = DB::table('users')->where('user_type', 2)->whereDate('created_at', Carbon::today())->count();
        $gcashCount = DB::table('orders')->where('payment', 'Gcash')->count();
        $codCount = DB::table('orders')->where('payment', 'Cash on Delivery')->count();
        $shops = DB::table('shops')->get();

        $topCustomers = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('SUM(orders.subtotal) as total_spent'))
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_spent')
            ->take(3)
            ->get();

        $recentProducts = DB::table('order_items')
            ->select('name', 'price')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('admin.dashboard', compact('totalRevenue', 'totalUsers', 'newusers', 'gcashCount', 'codCount', 'topCustomers', 'recentProducts', 'shops'));
    }

     public function rider()
    {
        return view('admin.riderhome');
    }

    public function order_list()
    {
        $orders = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                'orders.id',
                'orders.user_id',
                'orders.first_name',
                'orders.address',
                'orders.payment',
                'orders.subtotal',
                'order_items.name',
                'order_items.qty',
                'order_items.duration'
            )
            ->orderByDesc('orders.id')
            ->get();

        return view('admin.Order_list', compact('orders'));
    }

    public function customer()
    {
        $customers = DB::table('orders')
            ->select(
                'id',
                'first_name',
                'last_name',
                'address',
                'city',
                'region',
                'postal',
                'phone'
            )
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.customer', compact('customers'));
    }

    public function payment()
    {
        $payments = DB::table('orders')
            ->select(
                'id',
                'user_id',
                'first_name',
                'subtotal',
                'payment',
                'created_at',
                'address',
                'phone'
            )
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.payment', compact('payments'));
    }

    public function marketing()
    {
        return view('admin.marketing');
    }

    public function myproduct()
    {
        $products = DB::table('products')->get();
        $shops = DB::table('shops')->get();

        return view('admin.myproduct', compact('products', 'shops'));
    }



    public function storeProduct(Request $request)
    {
        $request->validate([
            'shop_id'   => 'required|exists:shops,id',
            'item_name' => 'required|string|max:255',
            'brand'     => 'nullable|string|max:255',
            'status'    => 'nullable|string|max:50',
            'stocks'    => 'required|integer|min:0',
            'price'     => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            // same style as shop logo
            $imagePath = $request->file('product_image')->store('products', 'public');
        }

        DB::table('products')->insert([
            'shop_id'   => $request->shop_id,
            'item_name' => $request->item_name,
            'brand'     => $request->brand,
            'status'    => $request->status,
            'stocks'    => $request->stocks,
            'price'     => $request->price,
            'image'     => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }




    public function storeShop(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('shops', 'public');
        }

        DB::table('shops')->insert([
            'shop_name' => $request->shop_name,
            'contact' => $request->contact,
            'address' => $request->address,
            'logo' => $logoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Shop added successfully!');
    }

    


}
