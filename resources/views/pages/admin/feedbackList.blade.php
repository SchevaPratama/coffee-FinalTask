@extends('layout/adminLayout/main')

@section('content')<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <form action="/feedbacks/search" method="GET" class="form-inline">
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
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Feedback</div>
            </div>
            <div class="row card-collapse">
                @foreach ($comments as $comment)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header has-arrow">{{$comment->name}}</div>
                        <div class="card-body">
                            <p class="card-text">{{$comment->comment}}.</p>
                            <form action="/admin/feedback/{{$comment->id_comment}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete This Item?');">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($commentsProduct as $commentProduct)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header has-arrow">{{$commentProduct->name}} (<b>{{$commentProduct->nama}}</b>)</div>
                        <div class="card-body">
                            <p class="card-text">{{$commentProduct->comment}}.</p>
                            <p class="card-text"><b>Nama Produk: {{$commentProduct->nama}}</b></p>
                            <form action="/admin/feedback/{{$commentProduct->id_comment}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete This Item?');">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--end row-->
        </div>
        <!--end page content-->
    </div>
    <!--end page-content-wrapper-->
</div>
@endsection