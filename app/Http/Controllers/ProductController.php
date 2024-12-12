<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Build query
        $productsQuery = Product::query();

        // Filter by category
        if ($request->filled('category')) { // Check if 'category' is not empty
            $productsQuery->where('category', $request->input('category'));
        }

        // Filter by price range
        if ($request->filled('price')) {
            if ($request->input('price') === 'low') {
                $productsQuery->orderBy('price', 'asc');
            } elseif ($request->input('price') === 'high') {
                $productsQuery->orderBy('price', 'desc');
            }
        }

        // Search by name or description
        if ($request->filled('search')) {
            $search = $request->input('search');
            $productsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Paginate results
        $products = $productsQuery->paginate(9)->appends($request->query());

        // Return view with filtered products
        return view('products', compact('products'));
    }
}