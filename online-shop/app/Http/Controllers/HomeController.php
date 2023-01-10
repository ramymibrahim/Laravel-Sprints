<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        return view('index')->with([
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    function shop()
    {
        return view('shop');
    }
}