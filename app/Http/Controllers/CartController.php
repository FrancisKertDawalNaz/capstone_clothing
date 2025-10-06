<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // Store item to cart
    public function store(Request $request)
    {
        // Optional: require login
        $userId = Auth::id();

        // Validate input
        $data = $request->validate([
            'product_id' => 'nullable|integer',
            'name'       => 'required|string',
            'price'      => 'required|numeric',
            'image'      => 'nullable|string',
            'shop'       => 'nullable|string',
            'qty'        => 'required|integer|min:1',
            'duration'   => 'nullable|string',
        ]);

        $cart = Cart::create([
            'user_id'    => $userId,
            'product_id' => $data['product_id'] ?? null,
            'name'       => $data['name'],
            'price'      => $data['price'],
            'image'      => $data['image'] ?? null,
            'shop'       => $data['shop'] ?? null,
            'qty'        => $data['qty'],
            'duration'   => $data['duration'] ?? 'Not selected',
        ]);

        return response()->json([
            'success' => true,
            'message' => "{$cart->name} added to cart successfully!",
            'item'    => $cart,
        ]);
    }

    // Optional: list all cart items
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        // Calculate subtotal
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->qty);

        return response()->json([
            'items' => $cartItems,
            'subtotal' => $subtotal
        ]);
    }


    // Optional: remove cart item
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart item removed successfully!',
        ]);
    }

    public function checkout()
    {
        $items = Cart::where('user_id', auth()->id())->get();
        $subtotal = $items->sum(fn($item) => $item->price * $item->qty);

        return view('user.check', compact('items', 'subtotal'));
    }

   
}
