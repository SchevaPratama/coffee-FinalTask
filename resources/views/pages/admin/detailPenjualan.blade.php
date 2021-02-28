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
            <form action="/admin/penjualan/{{$dataBulan->id}}/search" method="GET" class="form-inline">
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
                <div class="breadcrumb-title pr-3">Penjualan</div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-10 col-xl-10">
                    <div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{$dataBulan->nama_bulan}}</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>Tanggal Pembelian</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($penjualan as $jual)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$jual->nama}}</td>
											<td>{{$jual->harga}}</td>
											<td>{{$jual->tanggal_transaksi}}</td>
                                            @if ($jual->status == 1)
                                                <td>Berhasil</td>
                                            @else
                                                <td>Gagal</td>
                                            @endif
											<td>
                                                <form action="/admin/updatepenjualan/{{$jual->id_transaksi}}" method="post" enctype="multipart/form-data">
                                                @method('patch')
                                                @csrf
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 ml-3 mt-3">
                                                            <button type="submit" class="btn btn-success px-4">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>Tanggal Pembelian</th>
											<th>Status</th>
											<th>Aksi</th>
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
