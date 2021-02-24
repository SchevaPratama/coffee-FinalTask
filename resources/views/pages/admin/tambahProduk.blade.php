@extends('layout/adminLayout/main')

@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Tambah Produk</h4>
                            </div>
                            <hr/>
                            <form action="/admin/products" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}">
                                            @error('harga')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="4" cols="3" id="deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="gambar" id="gambar">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary px-4">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end page content-->
    </div>
    <!--end page-content-wrapper-->
</div>
@endsection