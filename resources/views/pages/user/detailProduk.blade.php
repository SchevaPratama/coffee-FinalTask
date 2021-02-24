@extends('layout/userLayout/main')

@section('content')
<!-- Subheader Start -->
<div class="andro_subheader pattern-bg primary-bg">
    <div class="container">
      <div class="andro_subheader-inner">
        <h1>Product Details</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Product Content Start -->
  <div class="section">
    <div class="container">

      <div class="row">
        <div class="col-md-5">
          <div class="andro_product-single-thumb">
            <img src="{{ asset('images/produk/'.$product->gambar) }}" alt="product">
          </div>
        </div>
        <div class="col-md-7">

            <h3>{{$product->nama}}</h3>

            <div class="andro_product-price">
              <span>{{$product->harga}}</span>
            </div>

            <p class="andro_product-excerpt">{{$product->deskripsi}}.</p>

            <form class="andro_product-atc-form mt-3">
              <div class="qty-outter">
                <a href="/order/{{$product->id}}" target="_blank" class="andro_btn-custom your-link ">Buy Now</a>
              </div>

            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- Product Content End -->

  <!-- Additional Information Start -->
  <div class="section pt-0">
    <div class="container">
      <div class="andro_product-additional-info">
        <div class="row">

          <div class="col-lg-4">
            <ul class="nav andro_sticky-section" id="bordered-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-product-desc-tab" data-toggle="pill" href="#tab-product-desc" role="tab" aria-controls="tab-product-desc" aria-selected="true">Description</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-8">
            <div class="tab-content" id="bordered-tabContent">
              <div class="tab-pane fade show active" id="tab-product-desc" role="tabpanel" aria-labelledby="tab-product-desc-tab">
                <h4>Description</h4>
                {{$product->deskripsi}}
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <!-- Additional Information End -->

  <!-- Related Products Start -->
  <div class="section pt-0 andro_related-posts">
    <div class="container">

      <div class="section-title flex-title">
        <h4 class="title">Related Products</h4>
        <div class="andro_arrows">
          <i class="fa fa-arrow-left slick-arrow slider-prev"></i>
          <i class="fa fa-arrow-right slick-arrow slider-next"></i>
        </div>
      </div>

      <div class="andro_related-posts-slider">

        <!-- Product Start -->
        @foreach ($products as $pro)
        <div class="andro_product andro_product-has-controls andro_product-has-buttons">
          <div class="andro_product-badge andro_badge-featured">
            <i class="fa fa-star"></i>
            <span>Featured</span>
          </div>
          <div class="andro_product-thumb">
            <a href="product-single.html"><img src="{{ asset('images/produk/'.$pro->gambar) }}" alt="product"></a>
          </div>
          <div class="andro_product-body">
            <h5 class="andro_product-title"> <a href="product-single.html">{{$pro->nama}}</a> </h5>
            <div class="andro_product-price">
              <span>{{$pro->harga}}</span>
            </div>
          </div>
          <div class="andro_product-footer">
            <div class="andro_product-buttons">
              <a href="/detailProduct/{{$pro->id}}" class="andro_btn-custom light">Buy Now</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Product End -->
      </div>
    </div>
  </div>
  <!-- Related Products End -->
@endsection