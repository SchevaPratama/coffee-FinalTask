@extends('layout/userLayout/main')

@section('content')
    <!-- Subheader Start -->
  <div class="andro_subheader pattern-bg primary-bg">
    <div class="container">
      <div class="andro_subheader-inner">
        <h1>About Us</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Img Start -->
  <div class="section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 mb-lg-20 andro_single-img-wrapper">
          <img src="assets/img/about2.png" alt="about us">
        </div>
        <div class="col-lg-6">
          <div class="section-title-wrap mr-lg-30">
            <h2 class="title">Serving <span class="custom-primary">Mountain Coffee</span> Since 1922</h2>
            <p class="subtitle">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
            <p class="subtitle">
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <a href="shop-v1.html" class="andro_btn-custom">Browse Our Shop</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Img End -->

  <!-- Img Start -->
  <div class="section pt-0">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 mb-lg-20 andro_single-img-wrapper">
          <img src="assets/img/about.jpg" alt="img">
          <div class="andro_dots"></div>
        </div>
        <div class="col-lg-6">
          <div class="section-title-wrap mr-lg-30">
            <h2 class="title">Serving <span class="custom-primary">Mountain Coffee</span> Since 1922</h2>
            <p class="subtitle">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
            <p class="subtitle">
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <ul class="andro_list">
              <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
              <li>Lorem Ipsum has been the industry's</li>
              <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
              <li>Lorem Ipsum has been the industry's standard dummy</li>
            </ul>
            <a href="shop-v1.html" class="andro_btn-custom">Browse Our Shop</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Img End -->


  <!-- Testimonials Start -->
  <div class="section section-padding pt-0">
    <div class="container">
      <div class="section-title">
        <h4 class="title">What Are People Saying</h4>
      </div>

      <div class="row">

        @foreach ($feedbacks as $feedback)
        <!-- Testimonail item start -->
        <div class="col-lg-4 col-md-6">
          <div class="andro_testimonial">
            <div class="andro_testimonial-body">
              <h5>{{$feedback->name}}</h5>
              <p>{{$feedback->comment}}</p>
            </div>
          </div>
        </div>
        <!-- Testimonail item end -->
        @endforeach
      </div>

    </div>
  </div>
  <!-- Testimonials End -->
@endsection