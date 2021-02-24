@extends('layout/adminLayout/main')

@section('content')
<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <form action="/admin/products/search" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="search" />
                    <div class="input-group-append">
                        <button class="btn btn-search" type="submit"><i class="lni lni-search-alt"></i>
                        </button>
                    </div> 
                </div>
            </form>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;"> <i
                            class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                <p class="designattion mb-0">Available</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>
                        <div class="dropdown-divider mb-0"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end header-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Produk</div>
                <div class="">
                    <div class="btn-group">
                        <a href="/admin/products/tambah" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>
            </div>

            @if (session('status'))
            <div class="row">
                <div class="col-lg-10 col-xl-10">
                    <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <!--end breadcrumb-->
            {{-- <div class="row">
                @foreach ($produk as $pro)
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <img src="{{ asset('adminAssets/images/gallery/05.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$pro->nama}}</h5>
                <p class="card-text">{{$pro->deskripsi}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <b>Harga : </b> {{$pro->harga}}</li>
            </ul>
            <div class="card-body">
                <a href="javascript:;" class="card-link">Edit Produk</a>
                <a href="javascript:;" class="card-link">Hapus Produk</a>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}
<div class="row">
    <div class="col-12 col-lg-10 col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">List Produk</h4>
                </div>
                <hr />
                <ul class="list-group">
                    @foreach ($products as $pro)
                    <li class="list-group-item d-flex justify-content-between align-items-center">{{$pro->nama}}<a
                            class="btn btn-primary rounded-pill" href="/admin/products/{{$pro->id}}">Detail</a>
                    </li>
                    @endforeach
                </ul>
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
