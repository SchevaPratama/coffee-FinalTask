<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Product;
use App\Models\Bulan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = DB::table('bulan')->get();
        $penjualan = DB::table('penjualan')->get();
        return view('pages.admin.listPenjualan',compact('penjualan','bulan'));
    }

    public function searchPenjualan(Request $request,Bulan $bulan)
	{
		$search = $request->search;
 
		$penjualan = DB::table('penjualan')
                    ->join('products', 'penjualan.id_barang', '=', 'products.id')
                    ->select('penjualan.*', 'products.*')
                    ->where('bulan',$request->bulan)
                    ->where('jumlah_barang','like',"%".$search."%")
                    ->orWhere('nama','like',"%".$search."%")
                    ->orWhere('harga','like',"%".$search."%")
                    ->orWhere('total_harga','like',"%".$search."%")
                    ->orWhere('tanggal_transaksi','like',"%".$search."%")
                    ->get();

        $dataBulan = $bulan;
        return view('pages.admin.detailPenjualan',compact('penjualan','dataBulan'));
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

    public function sell(Request $request, Product $product)
    {
        // dd($request->all());
        $user = User::where('id',1)->first();
        Product::where('id',$product->id)
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
        return redirect('https://api.whatsapp.com/send?phone='.$user->telp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $user = User::where('id',1)->first();
        Product::where('id',$product->id)
                ->update([
                    'stock' => DB::raw('stock - '.$request->quantity),
                    'terjual' => DB::raw('terjual + '.$request->quantity),
        ]);
        DB::table('penjualan')->insert([
            'id_barang' => $product->id,
            'jumlah_barang' => $request->quantity,
            'total_harga' => $product->harga * $request->quantity,
            'tanggal_transaksi' => date('j F Y'),
            'bulan' => date('F'),
            'tahun' => date('Y'),
            'status' => 0,
        ]);
        return redirect('https://api.whatsapp.com/send?phone='.$user->telp.'&text='.$product->nama.'%20'.$request->quantity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan,Bulan $bulan)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan,Bulan $bulan)
    {
        Penjualan::where('id_transaksi',$penjualan->id_transaksi)
                ->update([
                    'status' => 1,
                ]);

        return redirect(URL::previous())->with('status','Status Transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
