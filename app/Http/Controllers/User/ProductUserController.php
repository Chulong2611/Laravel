<?php
namespace App\Http\Controllers\User;

use App\Models\Favourite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;


class ProductUserController extends Controller
{

public function index()
{
    $products = Product::paginate(15);

    return view('user.products.all', compact('products'));
}
}