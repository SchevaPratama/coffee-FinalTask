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
            <div class="input-group">
                <div class="input-group-prepend search-arrow-back">
                    <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                    </button>
                </div>
                <input type="text" class="form-control" placeholder="search" />
                <div class="input-group-append">
                    <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
                    </button>
                </div>
            </div>
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

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
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
<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <a href="/admin/products">
                        <div class="card radius-15 bg-voilet">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="mb-0 text-white">{{$totalProduk}} <i
                                                class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                    </div>
                                    <div class="ml-auto font-35 text-white"><i class="fas fa-box"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Produk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="/admin/penjualan">
                        <div class="card radius-15 bg-primary-blue">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="mb-0 text-white">{{$totalTerjual}} <i
                                                class='bx bxs-down-arrow-alt font-14 text-white'></i> </h2>
                                    </div>
                                    <div class="ml-auto font-35 text-white"><i class="fas fa-money-bill-wave-alt"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Penjualan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="feedbacks">
                        <div class="card radius-15 bg-rose">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="mb-0 text-white">{{$totalFeedback}} <i
                                                class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                    </div>
                                    <div class="ml-auto font-35 text-white"><i class="far fa-comment-dots"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Feedback</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->
@endsection
