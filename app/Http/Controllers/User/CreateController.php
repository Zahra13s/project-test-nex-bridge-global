<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    //
    public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    $userId = auth()->id();

    $cartItem = DB::table('carts')->where('user_id', $userId)->where('product_id', $request->product_id)->first();

    if ($cartItem) {
        DB::table('carts')->where('id', $cartItem->id)->update([
            'qty' => $cartItem->qty + $request->qty,
            'sub_total' => ($cartItem->qty + $request->qty) * $request->price,
        ]);
    } else {
        DB::table('carts')->insert([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'sub_total' => $request->qty * $request->price,
            'total' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return response()->json(['success' => true, 'message' => 'Product added to cart']);
}
}
