<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use DB;

class UserController extends Controller
{
    // public function index()
    // {
    //     return view('pages.user.home');
    // }

    public function products()
    {
        $user = User::where('id',1)->first(); 
        $products = Product::all();
        return view('pages.user.home',['products' => $products,'user' => $user]);
    }

    public function searchProducts(Request $request)
	{
		$search = $request->search;
 
		$products = DB::table('products')
		->where('nama','like',"%".$search."%")
		->paginate();
        $user = User::where('id',1)->first(); 
        return view('pages.user.home',['products' => $products,'user' => $user]);
	}

    public function show(Product $product)
    {
        $user = User::where('id',1)->first(); 
        $products = Product::where('id', '!=' , $product->id)
                ->get();
        return view('pages.user.detailProduk',['products' => $products,'product' => $product,'user' => $user]);
    }

    public function about()
    {
        $feedbacks = Comment::all()->random(3);
        $user = User::where('id',1)->first(); 
        return view('pages.user.aboutUs',['user' => $user,'feedbacks' => $feedbacks]);
    }

    public function contact()
    {
        $user = User::where('id',1)->first(); 
        return view('pages.user.contactUs',['user' => $user]);
    }
}
