<?php

namespace App\Http\Controllers\User;

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
    public function userProfilePage(){
        $information = User::where('users.id', Auth::user()->id)->first();
        return view('user.profile', compact('information'));
    }

    public function productPage(){
        $category = Category::get();
        $products = Product::select("products.*", "categories.category")
        ->leftJoin('categories', "categories.id", "products.category_id")
        ->get();
        return view('user.product',compact('category', 'products'));
    }

    public function productDetailsPage($id){
        $products = Product::select("products.*", "categories.category")
        ->leftJoin('categories', "categories.id", "products.category_id")
        ->where('products.id',$id)
        ->first();
        return view('user.productDetails',compact('products'));
    }

    public function cartPage()
    {
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('carts.user_id', auth()->id())
            ->select(
                'carts.id as cart_id',
                'products.name as product_name',
                'categories.category as category_name',
                'products.price',
                'carts.qty',
                'products.image',
                DB::raw('(products.price * carts.qty) as sub_total')
            )
            ->get();

        $total = $cartItems->sum('sub_total');

        return view('user.addtocart', compact('cartItems', 'total'));
    }

}
