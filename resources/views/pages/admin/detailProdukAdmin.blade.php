@extends('layout/adminLayout/main')

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Detail Produk</div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card radius-15">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->nama}}</h5>
                            <h6 class="card-subtitle mb-2">{{$product->harga}}</h6>
                            <p class="text-justify">{{$product->deskripsi}}</p> 
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Stock: {{$product->stock}}</b></li>
                            <li class="list-group-item"><b>Terjual: {{$product->terjual}}</b></li>
                        </ul>
                        <div class="card-body"> 
                            <a href="/admin/products/{{$product->id}}/edit" class="card-link btn btn-warning text-light">Update</a>
                            <form action="/admin/products/{{$product->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete This Item?');">Hapus</button>
                            </form>
                            <a class="card-link btn btn-primary" data-toggle="modal" data-target="#exampleModal8">Gambar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="">
                            <div class="card mb-0">
                                <img src="{{ asset('images/produk/'.$product->gambar) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page content-->
    </div>
    <!--end page-content-wrapper-->
</div>
@endsection
