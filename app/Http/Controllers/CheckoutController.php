<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Save Order
            $order = DB::table('orders')->insertGetId([
                'user_id' => auth()->id(),
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Save Order Items (example cart items)
            $cartItems = DB::table('carts')->where('user_id', auth()->id())->get();
            foreach ($cartItems as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $order,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Clear the cart
            DB::table('carts')->where('user_id', auth()->id())->delete();

            DB::commit();

            return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout.index')->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }
}
