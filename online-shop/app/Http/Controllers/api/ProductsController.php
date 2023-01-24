<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    function index()
    {
        $products = Product::with(['category', 'size', 'color'])->get();
        return response()->json($products);
    }

    function getFeatured()
    {
        $products = Product::where('is_featured', 1)->get();
        foreach ($products as $product) {
            $product['image'] = asset('storage/'.$product['image']);
        }
        return response()->json($products);
    }
    function getRecent()
    {
        $products = Product::where('is_recent', 1)->get();
        foreach ($products as $product) {
            $product['image'] = asset('storage/'.$product['image']);
        }
        return response()->json($products);
    }
}