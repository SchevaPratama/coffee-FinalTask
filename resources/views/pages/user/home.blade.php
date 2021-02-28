@extends('layout/userLayout/main')

@section('content')
<!-- Banner Start -->
<div class="andro_banner banner-2">
    <div class="andro_banner-slider">
        <div class="andro_banner-slider-inner" style="background-image: url({{ asset('assets/img/banner/1.jpg') }});">
            <div class="container">
                <div class="andro_banner-slider-text">
                    <img src="{{ asset('assets/img/products/8.png') }}" class="img-1" alt="product">
                    <h2> Start Your Day With A Cup Of Coffee </h2>
                </div>
            </div>
        </div>
        <div class="andro_banner-slider-inner" style="background-image: url({{ asset('assets/img/banner/2.jpg') }});">
            <div class="container">
                <div class="andro_banner-slider-text">
                    <img src="{{ asset('assets/img/products/14.png') }}" class="img-1" alt="product">
                    <h2> Welcome To Our Websites </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Categories Start -->
<div class="section section-padding category_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <i class="flaticon-coffee-cup"></i>
                    <h5>Guaranteed Coffee</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <i class="flaticon-coffee-2"></i>
                    <h5>Daily Robustaing</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <i class="flaticon-tag"></i>
                    <h5>Cheap & Creamyy</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories End -->

{{-- <!-- Categories Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-coffee-cup"></i>
                        <h5>Cafe Latte</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-coffee-beans"></i>
                        <h5>Mocha</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-coffee"></i>
                        <h5>Ice Coffee</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-coffee-1"></i>
                        <h5>Espresso</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-ice-coffee"></i>
                        <h5>Cappucino</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4">
                <div class="andro_icon-block text-center has-link">
                    <a href="#">
                        <i class="flaticon-moka-pot"></i>
                        <h5>Arabica</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories End --> --}}

<!-- Icons Start -->
{{-- <div class="section section-padding pt-0 mt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="andro_icon-block icon-block-2">
                    <i class="flaticon-coffee-cup"></i>
                    <h5>Guaranteed Coffee</h5>
                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="andro_icon-block icon-block-2">
                    <i class="flaticon-coffee-2"></i>
                    <h5>Daily Robustaing</h5>
                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="andro_icon-block icon-block-2">
                    <i class="flaticon-tag"></i>
                    <h5>Cheap & Creamyy</h5>
                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                </div>
            </div>

        </div>
    </div>
</div> --}}
<!-- Icons End -->

<!-- Featured Products Start -->
<div class="section section-padding pt-0">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                <div class="section-title">
                    <h4 class="title">Our Products</h4>
                </div>

                <div class="row">

                    @foreach ($products as $product)
                    <!-- Product Start -->
                    <div class="col-sm-4">
                        <div
                            class="andro_product andro_product-minimal andro_product-has-controls andro_product-has-buttons">

                            @if ($product->stock == 0)
                                <div class="andro_product-badge andro_badge-sale">
                                    Out Of Stock
                                </div>
                            @endif
                            
                            <div class="andro_product-thumb">
                                <a href="/detailProduct/{{$product->id}}"><img src="{{ asset('images/produk/'.$product->gambar) }}"
                                        alt="product"></a>
                            </div>
                            <div class="andro_product-body">
                                <h6 class="andro_product-title"> <a href="/detailProduct/{{$product->id}}">{{$product->nama}}</a>
                                </h6>
                            </div>
                            <div class="andro_product-footer">
                                <div class="andro_product-price">
                                    <span>{{$product->harga}}</span>
                                </div>
                                <div class="andro_product-buttons">
                                    <a href="/detailProduct/{{$product->id}}" class="andro_btn-custom primary">Buy
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product End -->
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</div>
<!-- Featured Products End -->

<!-- FAQ & Contact Form Start -->
<div class="section pt-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 mb-lg-30">

                <div class="section-title">
                    <h4 class="title">FAQ</h4>
                </div>

                <div class="accordion with-gap" id="generalFAQExample">
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#generalOne"
                            aria-expanded="true" aria-controls="generalOne">
                            What is Coffeed?
                        </div>

                        <div id="generalOne" class="collapse show" data-parent="#generalFAQExample">
                            <div class="card-body">
                                Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#generalTwo"
                            aria-expanded="false" aria-controls="generalTwo">
                            Getting Started with Coffeed
                        </div>

                        <div id="generalTwo" class="collapse" data-parent="#generalFAQExample">
                            <div class="card-body">
                                Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#generalThree"
                            aria-expanded="false" aria-controls="generalThree">
                            Do i have the latest version?
                        </div>

                        <div id="generalThree" class="collapse" data-parent="#generalFAQExample">
                            <div class="card-body">
                                Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#generalFour"
                            aria-expanded="false" aria-controls="generalFour">
                            How many times can I use Coffeed?
                        </div>

                        <div id="generalFour" class="collapse" data-parent="#generalFAQExample">
                            <div class="card-body">
                                Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#generalFive"
                            aria-expanded="false" aria-controls="generalFive">
                            How to migrate my website?
                        </div>

                        <div id="generalFive" class="collapse" data-parent="#generalFAQExample">
                            <div class="card-body">
                                Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-7">

                <div class="section-title">
                    <h4 class="title">Leave A Comment</h4>
                </div>

                <form action="/admin/feedback" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <input type="text" placeholder="Your Name" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="comment" class="form-control" placeholder="Type your message"
                                rows="8"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="andro_btn-custom primary">Send Message</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- FAQ & Contact Form End -->

@endsection
