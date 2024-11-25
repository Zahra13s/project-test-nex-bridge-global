<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    //
    public function adminProfilePage(){
        $information = User::where('users.id', Auth::user()->id)->first();
        return view('admin.profile', compact('information'));
    }

    public function categoriesPage()
    {
        $data = DB::table('categories')->paginate(10);

        $product_counts = DB::table('products')
            ->select('category_id', DB::raw('count(*) as product_count'))
            ->groupBy('category_id')
            ->paginate(10);

        $categoryProductCounts = [];
        foreach ($product_counts as $product) {
            $categoryProductCounts[$product->category_id] = $product->product_count;
        }

        return view('admin.category', compact('data', 'categoryProductCounts'));
    }

    public function productsPage()
    {
        $data = Category::get();
        $product = Product::select('products.*', 'categories.id as category_id', 'categories.category')
            ->leftJoin('categories', 'products.category_id', 'categories.id')->paginate(3);
        return view('admin.product', compact('data', 'product'));
    }
}
