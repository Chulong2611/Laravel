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
        return view('user.favourites', compact('favourites'));
        
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

        return redirect()->route('user.favourites')->with('success', 'Đã thêm vào danh sách yêu thích.');
    }

    public function remove($productId)
    {
        $user = Auth::user();
        $items = Favourite::where('user_id', $user->id)->where('product_id', $productId);
        $items->delete();
        return redirect()->back()->with('success', 'Đã xoá khỏi yêu thích');
    }


}
