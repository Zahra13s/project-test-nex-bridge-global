<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    //
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();

         $request->session()->invalidate();
    $request->session()->regenerateToken();


        return redirect('/')->with('success', 'Your profile has been deleted.');
    }


}
