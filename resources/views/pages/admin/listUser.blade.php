@extends('layout/adminLayout/main')

@section('content')
<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        {{-- <div class="flex-grow-1 search-bar">
            <form action="/admin/penjualan/{{$dataBulan->id}}/search" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="hidden" name="bulan" value="{{$dataBulan->nama_bulan}}">
                    <input type="text" class="form-control" name="search" placeholder="search" />
                    <div class="input-group-append">
                        <button class="btn btn-search" type="submit"><i class="lni lni-search-alt"></i>
                        </button>
                    </div> 
                </div>
            </form>
        </div> --}}
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
                <div class="breadcrumb-title pr-3">User</div>
            </div>
            <!--end breadcrumb-->
            @if (session('status'))
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-10 col-lg-10 col-xl-10">
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Data User</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama User</th>
											<th>Email</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($users as $user)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
										</tr>
                                        @endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Nama User</th>
											<th>Email</th>
										</tr>
									</tfoot>
								</table>
							</div>
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
