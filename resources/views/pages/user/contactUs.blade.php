@extends('layout/userLayout/main')

@section('content')
    <!-- Subheader Start -->
  <div class="andro_subheader pattern-bg primary-bg">
    <div class="container">
      <div class="andro_subheader-inner">
        <h1>Contact Us</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Locations Start -->
  <div class="section section-padding">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="andro_cta">
            <a href="#">
              <img src="assets/img/locations/location.jpg" alt="location">
              <div class="andro_cta-content">
                <h4 class="text-white">Find Us In <span class="fw-400">Banyuwangi</span> </h4>
                <p class="text-white mb-0">Jln Yos Sudarso No 08.</p>
              </div>
            </a>
          </div>
        </div>

        {{-- <div class="col-md-6">
          <div class="andro_cta">
            <a href="#">
              <img src="assets/img/locations/2.jpg" alt="location">
              <div class="andro_cta-content">
                <h4 class="text-white">Find Us In <span class="fw-400">New York</span> </h4>
                <p class="text-white mb-0">Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus.</p>
              </div>
            </a>
          </div>
        </div> --}}

      </div>
    </div>
  </div>
  <!-- Locations Start -->

  <!-- Icons Start -->
  <div class="section section-padding pt-0">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">

          <div class="section-title">
            <h4 class="title">Contact Us On</h4>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="andro_icon-block">
                <a href="https://api.whatsapp.com/send?phone={{$user->telp}}">
                  <i class="fab fa-whatsapp"></i>
                  <h5>Phone</h5>
                  <p>+{{$user->telp}}.</p>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg">
                  <rect height="500" width="500" class="andro_svg-stroke-shape-anim"></rect>
                </svg>
              </div>
            </div>
    
            <div class="col-lg-4">
              <div class="andro_icon-block">
                <a href="https://www.instagram.com/{{$user->instagram}}/" target="_blank">
                  <i class="fab fa-instagram"></i>
                  <h5>Instagram</h5>
                  <p>{{$user->instagram}}.</p>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg">
                  <rect height="500" width="500" class="andro_svg-stroke-shape-anim"></rect>
                </svg>
              </div>
            </div>
    
            <div class="col-lg-4">
              <div class="andro_icon-block">
                <a href="#">
                  <i class="far fa-envelope"></i>
                  <h5>Email</h5>
                  <p>{{$user->email}}.</p>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg">
                  <rect height="500" width="500" class="andro_svg-stroke-shape-anim"></rect>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Icons End -->

  <!-- FAQ & Contact Form Start -->
  <div class="section pt-0">
    <div class="container">
      <div class="row">

        <div class="col-lg-5 mb-lg-30">

          <div class="section-title">
            <h4 class="title">FAQ</h4>
          </div>

          <div class="accordion with-gap" id="generalFAQExample">
            <div class="card">
              <div class="card-header" data-toggle="collapse" role="button" data-target="#generalOne" aria-expanded="true" aria-controls="generalOne">
                What is Coffeed?
              </div>

              <div id="generalOne" class="collapse show" data-parent="#generalFAQExample">
                <div class="card-body">
                  Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" data-toggle="collapse" role="button" data-target="#generalTwo" aria-expanded="false" aria-controls="generalTwo">
                Getting Started with Coffeed
              </div>

              <div id="generalTwo" class="collapse" data-parent="#generalFAQExample">
                <div class="card-body">
                  Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" data-toggle="collapse" role="button" data-target="#generalThree" aria-expanded="false" aria-controls="generalThree">
                Do i have the latest version?
              </div>

              <div id="generalThree" class="collapse" data-parent="#generalFAQExample">
                <div class="card-body">
                  Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" data-toggle="collapse" role="button" data-target="#generalFour" aria-expanded="false" aria-controls="generalFour">
                How many times can I use Coffeed?
              </div>

              <div id="generalFour" class="collapse" data-parent="#generalFAQExample">
                <div class="card-body">
                  Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" data-toggle="collapse" role="button" data-target="#generalFive" aria-expanded="false" aria-controls="generalFive">
                How to migrate my website?
              </div>

              <div id="generalFive" class="collapse" data-parent="#generalFAQExample">
                <div class="card-body">
                  Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
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