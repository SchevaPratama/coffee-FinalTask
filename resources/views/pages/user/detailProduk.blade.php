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
                    <span>Rp.{{$product->harga}}</span>
                </div>

                <p class="andro_product-excerpt">{{$product->deskripsi}}.</p>

                <div class="andro_product-variation-wrapper">

                </div>

                <form class="andro_product-atc-form mt-3" action="/order/{{$product->id}}" method="post">
                    @csrf
                    <div class="qty-outter">
                        @if ($product->stock > 0)
                        <div class="form-group mt-4">
                            <input type="number" class="form-control" placeholder="Jumlah Produk" name="quantity">
                        </div>
                        <button type="submit" class="andro_btn-custom your-link">Buy Now</button>
                        {{-- <a href="/order/{{$product->id}}" target="_blank" class="andro_btn-custom your-link ">Buy
                        Now</a> --}}
                        @else
                        <button class="andro_btn-custom your-link" disabled="disabled">Buy Now</button>
                        {{-- <a href="" target="_blank" class="andro_btn-custom your-link " disabled>Buy Now</a> --}}
                        @endif

                    </div>

                </form>

                <ul class="andro_product-meta">
                    <li>
                        <span>Terjual: </span>
                        <div class="andro_product-meta-item">
                            <a href="#">{{$product->terjual}}</a>
                        </div>
                    </li>
                    <li>
                        <span>stock: </span>
                        <div class="andro_product-meta-item">
                            <a href="#">{{$product->stock}}</a>
                        </div>
                    </li>
                </ul>
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
                            <a class="nav-link active" id="tab-product-desc-tab" data-toggle="pill"
                                href="#tab-product-desc" role="tab" aria-controls="tab-product-desc"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-product-reviews-tab" data-toggle="pill"
                                href="#tab-product-reviews" role="tab" aria-controls="tab-product-reviews"
                                aria-selected="false">Reviews ({{$totalFeedbacks}})</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="tab-content" id="bordered-tabContent">
                        <div class="tab-pane fade show active" id="tab-product-desc" role="tabpanel"
                            aria-labelledby="tab-product-desc-tab">
                            <h4>Description</h4>
                            {{$product->deskripsi}}
                        </div>

                        <div class="tab-pane fade" id="tab-product-reviews" role="tabpanel"
                            aria-labelledby="tab-product-reviews-tab">
                            <h4>Leave a Review</h4>

                            <!-- Review Form start -->
                            <div class="comment-form">
                                <form action="/admin/feedbackProduct" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group col-lg-12">
                                            <input type="text" placeholder="Your Name" class="form-control" name="name"
                                                value="{{old('name')}}">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea name="comment" class="form-control"
                                                placeholder="Type your message" rows="8">{{old('comment')}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="andro_btn-custom primary">Send Message</button>
                                </form>
                            </div>
                            <!-- Review Form End -->

                            <!-- Reviews Start -->
                            <div class="comments-list">
                                <ul>
                                    @foreach ($feedbacks as $feedback)
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <h5>{{$feedback->name}}</h5>
                                            <span>Posted on: {{$feedback->time}}</span>
                                            <p>{{$feedback->comment}}.</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Reviews End -->

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
                    <a href="product-single.html"><img src="{{ asset('images/produk/'.$pro->gambar) }}"
                            alt="product"></a>
                </div>
                <div class="andro_product-body">
                    <h5 class="andro_product-title"> <a href="product-single.html">{{$pro->nama}}</a> </h5>
                    <div class="andro_product-price">
                        <span>Rp.{{$pro->harga}}</span>
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
