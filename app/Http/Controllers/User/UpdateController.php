<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    //

    //profile update
    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
    ]);

    $user = Auth::user();
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

//cart update
public function updateCart(Request $request, $cartItemId)
{
    $request->validate([
        'qty' => 'required|integer|min:1',
    ]);

    $cartItem = Cart::findOrFail($cartItemId);
    $cartItem->qty = $request->qty;
    $cartItem->sub_total = $cartItem->price * $cartItem->qty;
    $cartItem->save();

    $total = Cart::where('user_id', auth()->id())->sum('sub_total');

    return redirect()->route('cartPage')->with('total', $total);
}

}
