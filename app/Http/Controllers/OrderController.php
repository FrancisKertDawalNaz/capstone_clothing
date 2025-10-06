<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $userId = auth()->id();

        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'address'    => 'required|string',
            'postal'     => 'required|string',
            'city'       => 'required|string',
            'region'     => 'required|string',
            'phone'      => 'required|string',
            'payment'    => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', $userId)->get();
        $subtotal  = $cartItems->sum(fn($item) => $item->price * $item->qty);

        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.',
            ], 400);
        }

        $order = Order::create([
            'user_id'    => $userId,
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'address'    => $data['address'],
            'city'       => $data['city'],
            'region'     => $data['region'],
            'postal'     => $data['postal'],
            'phone'      => $data['phone'],
            'payment'    => $data['payment'],
            'subtotal'   => $subtotal,
            'status'     => 'Pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'name'       => $item->name,
                'price'      => $item->price,
                'qty'        => $item->qty,
                'image'      => $item->image,
                'duration'   => $item->duration,
            ]);
        }

        // clear cart
        Cart::where('user_id', $userId)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'order_id' => $order->id,
        ]);
    }
}
