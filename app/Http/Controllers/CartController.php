<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart!',
        ]);
    }

    public function viewCart()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart', compact('cartItems', 'totalPrice'));
    }

    public function remove($id)
{
    \Log::info("Remove method called for product ID: $id");

    $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

    if (!$cartItem) {
        \Log::info("Product not found in cart for user ID: " . Auth::id());
        return response()->json([
            'success' => false,
            'message' => 'Item not found in cart!',
        ], 404);
    }

    $cartItem->delete();

    \Log::info("Product with ID: $id successfully removed");

    $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    \Log::info("Total price after removal: $totalPrice");

    return response()->json([
        'success' => true,
        'message' => 'Product removed from cart!',
        'totalPrice' => $totalPrice,
    ]);
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully!',
            'cart' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }
}
