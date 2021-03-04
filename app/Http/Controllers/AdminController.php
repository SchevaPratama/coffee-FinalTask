<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Bulan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function pageAuth()
    {
        // dd(Auth::user()->is_admin);
        $role = Auth::user()->is_admin;
        if ($role == 1) {
            return redirect('/admin');
        } else {
            return redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $totalProduk = Product::all()->count();
            $totalTerjual = Product::sum('terjual');
            $totalFeedback = Comment::all()->count();
            return view('pages.admin.home', compact('totalProduk', 'totalTerjual', 'totalFeedback'));
        } else {
            return redirect('/');
        }
        // $totalProduk = Product::all()->count();
        // $totalTerjual = Product::sum('terjual');
        // $totalFeedback = Comment::all()->count();
        // return view('pages.admin.home',compact('totalProduk','totalTerjual','totalFeedback'));
    }

    public function searchProducts(Request $request)
    {
        $search = $request->search;

        $products = DB::table('products')
            ->where('nama', 'like', "%" . $search . "%")
            ->get();

        return view('pages.admin.listProduk', compact('products'));
    }

    public function searchPenjualan(Request $request, Bulan $bulan)
    {
        $search = $request->search;

        $penjualan = DB::table('penjualan')
            ->join('products', 'penjualan.id_barang', '=', 'products.id')
            ->select('penjualan.*', 'products.*')
            ->where('bulan', $bulan->nama_bulan)
            ->where('tanggal_transaksi', 'like', "%" . $search . "%")
            ->get();

        $dataBulan = $bulan;
        return view('pages.admin.detailPenjualan', compact('penjualan', 'dataBulan'));
    }

    public function searchFeedback(Request $request)
    {
        $search = $request->search;

        $comments = DB::table('comment')
            ->where('name', 'like', "%" . $search . "%")
            ->get();

        return view('pages.admin.feedbackList', compact('comments'));
    }

    public function products()
    {
        $products = Product::all();
        return view('pages.admin.listProduk', compact('products'));
    }

    public function penjualan()
    {
        $bulan = DB::table('bulan')->get();
        $penjualan = DB::table('penjualan')->get();
        return view('pages.admin.listPenjualan', compact('penjualan', 'bulan'));
    }

    public function detailPenjualan(Bulan $bulan)
    {
        // echo $bulan->nama_bulan;
        // $bulan = DB::table('bulan')->get();
        $penjualan = DB::table('penjualan')
            ->join('products', 'penjualan.id_barang', '=', 'products.id')
            ->select('penjualan.*', 'products.*')
            ->where('bulan', $bulan->nama_bulan)
            ->get();
        $dataBulan = $bulan;
        return view('pages.admin.detailPenjualan', compact('penjualan', 'dataBulan'));
    }

    public function listUser(User $user)
    {
        // echo $bulan->nama_bulan;
        // $bulan = DB::table('bulan')->get();
        $users = DB::table('users')
            ->where('is_admin', 0)
            ->get();
        return view('pages.admin.listUser', compact('users'));
    }

    public function showFeedback()
    {
        $commentsProduct = DB::table('comment')
            ->join('products', 'comment.product_id', '=', 'products.id')
            ->select('comment.*', 'products.*')
            ->get();

        $comments = DB::table('comment')
            ->where('product_id', 'NULL')
            ->get();
        return view('pages.admin.feedbackList', compact('comments', 'commentsProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tambahProduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
        ]);
        Product::create([
            'nama' => htmlspecialchars_decode($request->nama),
            'harga' => htmlspecialchars_decode($request->harga),
            'stock' => htmlspecialchars_decode($request->stock),
            'deskripsi' => htmlspecialchars_decode($request->deskripsi),
            'gambar' => $request->file('gambar')->getClientOriginalName(),
        ]);

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/produk/', $request->file('gambar')->getClientOriginalName());
        }
        return redirect('/admin/products')->with('status', 'Produk Berhasil Ditambahkan');
    }

    public function feedback(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nama' => 'required',
        //     'harga' => 'required'
        //     ]);
        $user = User::where('id', 1)->first();
        $products = Product::all();
        Comment::create([
            'name' => htmlspecialchars_decode($request->name),
            'comment' => htmlspecialchars_decode($request->comment),
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    public function feedbackProduct(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nama' => 'required',
        //     'harga' => 'required'
        //     ]);
        $user = User::where('id', 1)->first();
        $products = Product::all();
        Comment::create([
            'product_id' => $request->product_id,
            'name' => htmlspecialchars_decode($request->name),
            'comment' => htmlspecialchars_decode($request->comment),
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.admin.detailProdukAdmin', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.admin.editProduk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
        ]);
        Product::where('id', $product->id)
            ->update([
                'nama' => htmlspecialchars_decode($request->nama),
                'harga' => htmlspecialchars_decode($request->harga),
                'stock' => htmlspecialchars_decode($request->stock),
                'deskripsi' => htmlspecialchars_decode($request->deskripsi)
            ]);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/produk/', $request->file('gambar')->getClientOriginalName());
            Product::where('id', $product->id)
                ->update([
                    'gambar' => $request->file('gambar')->getClientOriginalName(),
                ]);
            // $product->gambar = $request->file('gambar')->getClientOriginalName();
        }
        return redirect('/admin/products')->with('status', 'Produk Berhasil Diubah');
    }

    public function sell(Request $request, Product $product)
    {
        // dd($request->all());
        $user = User::where('id', 1)->first();
        Product::where('id', $product->id)
            ->update([
                'stock' => DB::raw('stock - 1'),
                'terjual' => DB::raw('terjual + 1'),
            ]);
        DB::table('penjualan')->insert([
            'id_barang' => $product->id,
            'tanggal_transaksi' => date('Y-m-d'),
            'bulan' => date('F'),
            'tahun' => date('Y'),
            'status' => 0,
        ]);
        return redirect('https://api.whatsapp.com/send?phone=' . $user->telp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/admin/products')->with('status', 'Produk Berhasil Dihapus');
    }

    public function deleteFeedback(Comment $comment)
    {
        Comment::destroy($comment->id_comment);
        return redirect('/feedbacks')->with('status', 'Feedback Berhasil Dihapus');
    }
}
