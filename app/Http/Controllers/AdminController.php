<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\Bulan;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProduk = Product::all()->count();
        $totalTerjual = Product::sum('terjual');
        $totalFeedback = Comment::all()->count();
        return view('pages.admin.home',compact('totalProduk','totalTerjual','totalFeedback'));
    }

    public function searchProducts(Request $request)
	{
		$search = $request->search;
 
		$products = DB::table('products')
		->where('nama','like',"%".$search."%")
		->paginate();
 
        return view('pages.admin.listProduk',compact('products'));
	}

    public function searchPenjualan(Request $request,Bulan $bulan)
	{
		$search = $request->search;
 
		$penjualan = DB::table('penjualan')
                    ->join('products', 'penjualan.id_barang', '=', 'products.id')
                    ->select('penjualan.*', 'products.*')
                    ->where('bulan',$bulan->nama_bulan)
                    ->where('tanggal_transaksi','like',"%".$search."%")
                    ->paginate();

        $dataBulan = $bulan;
        return view('pages.admin.detailPenjualan',compact('penjualan','dataBulan'));
	}

    public function searchFeedback(Request $request)
	{
		$search = $request->search;
 
		$comments = DB::table('comment')
		->where('name','like',"%".$search."%")
		->paginate();
 
        return view('pages.admin.feedbackList',compact('comments'));
	}

    public function products()
    {
        $products = Product::all();
        return view('pages.admin.listProduk',compact('products'));
    }

    public function penjualan()
    {
        $bulan = DB::table('bulan')->get();
        $penjualan = DB::table('penjualan')->get();
        return view('pages.admin.listPenjualan',compact('penjualan','bulan'));
    }

    public function detailPenjualan(Bulan $bulan)
    {
        // echo $bulan->nama_bulan;
        // $bulan = DB::table('bulan')->get();
        $penjualan = DB::table('penjualan')
                    ->join('products', 'penjualan.id_barang', '=', 'products.id')
                    ->select('penjualan.*', 'products.*')
                    ->where('bulan',$bulan->nama_bulan)
                    ->get();
        $dataBulan = $bulan;
        return view('pages.admin.detailPenjualan',compact('penjualan','dataBulan'));
    }

    public function showFeedback()
    {
        $comments = Comment::all();
        return view('pages.admin.feedbackList',compact('comments'));
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
            'harga' => 'required'
            ]);
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->file('gambar')->getClientOriginalName(),
        ]);

        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/produk/',$request->file('gambar')->getClientOriginalName());
        }
        return redirect('/admin/products')->with('status','Produk Berhasil Ditambahkan');
    }

    public function feedback(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nama' => 'required',
        //     'harga' => 'required'
        //     ]);
        $user = User::where('id',1)->first(); 
        $products = Product::all();
        Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'time' => date('Y-m-d H:i:s'),
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
        return view('pages.admin.detailProdukAdmin',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.admin.editProduk',compact('product'));
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
            'harga' => 'required'
        ]);
        Product::where('id',$product->id)
                ->update([
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $request->file('gambar')->getClientOriginalName(),
                ]);
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/produk/',$request->file('gambar')->getClientOriginalName());
            $product->gambar = $request->file('gambar')->getClientOriginalName();
        }
        return redirect('/admin/products')->with('status','Produk Berhasil Diubah');
    }

    public function sell(Request $request, Product $product)
    {
        // dd($request->all());
        $user = User::where('id',1)->first();
        Product::where('id',$product->id)
                ->update([
                    'terjual' => DB::raw('terjual + 1'),
        ]);
        DB::table('penjualan')->insert([
            'id_barang' => $product->id,
            'tanggal_transaksi' => date('Y-m-d'),
            'bulan' => date('F'),
            'tahun' => date('Y'),
        ]);
        return redirect('https://api.whatsapp.com/send?phone='.$user->telp);
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
        return redirect('/admin/products')->with('status','Produk Berhasil Dihapus');
    }
}
