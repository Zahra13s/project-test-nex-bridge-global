<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    //
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $imagePath = public_path('products/' . $product->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $product->delete();
        }

        return back()->with('success', 'Product deleted successfully!');
    }

}
