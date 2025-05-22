<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /** @var \App\Models\User $user **/
    public function index()
    {
        $favourites = Favourite::with('product')->where('user_id', Auth::id())->get();
        return view('user.favorites', compact('favourites'));
    }
    
    public function add($productId)
    {
        $user = Auth::user();

        $exists = Favourite::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->exists();

        if (!$exists) {
            Favourite::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        return back()->with('success', 'Đã thêm vào danh sách yêu thích.');

    }

    public function remove(Product $product)
    {
        Favourite::where('user_id', Auth::id())->where('product_id', $product->id)->delete();
        return back()->with('success', 'Đã xoá khỏi yêu thích');
    }

   /* public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'unauthenticated'], 401);
        }

        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $productId = $request->product_id;
        $userId = Auth::id();

        $favourite = Favourite::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($favourite) {
            $favourite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favourite::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }*/
}
