<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    public function get_categories()
    {
        return response()->json(Category::all());
    }
    public function index()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category['image'] = asset('storage/' . $category['image']);
        }
        return response()->json($categories);
    }

    function store(Request $request)
    {
        $request->validate(Category::$rules);

        $imageUrl = $request->file('image')->store('categories', ['disk' => 'public']);
        $category = new Category;

        $category->fill($request->post());
        $category['image'] = $imageUrl;

        $category->save();
        return response()->json(['message' => 'success']);
    }

    function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    function update($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $request->validate(Category::$rules);

        $category->fill($request->post());

        $imageUrl = $request->file('image')->store('categories', ['disk' => 'public']);

        $category['image'] = $imageUrl;

        $category->save();
        return response()->json(['message' => 'success']);
    }

    function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    function destroy($id)
    {
        $category = Category::findOrFail($id);
        Category::destroy($id);
        return response()->json(['message' => 'success']);
    }
}