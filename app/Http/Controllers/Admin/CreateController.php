<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    //
    //category create
    public function addCategory(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
        ]);

        $data = Category::create([
            'category' => $request->category
        ]);
        return back();
    }

    //product create
    public function addProduct(Request $request)
    {

        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            "price" => "required"
        ]);

        if ($request->hasFile('image')) {
            $fileName = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products'), $fileName);
            $imagePath = $fileName;
        }

        Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category'],
            'image' => $imagePath,
            'price' => $validated['price'],
            'description' => $validated['description'],
        ]);

        return back();
    }
}
