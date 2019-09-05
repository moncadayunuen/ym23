@extends('layouts.layout')
@section('content')
  <!-- start banner Area -->
  <section class="home-banner-area">
    <div class="container-fluid">
      <div class="row fullscreen d-flex align-items-center">
        <div class="banner-content col-lg-4 col-md-8 justify-content-center ">
          <h1 class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".6s">I'm <span>a</span> <br />
            Multi<span>m</span>edia</br><span>D</span>esigner</h1>
          <div class="designation mb-25 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <p>I have many challenges ahead, I think about how to face them</p>
          </div>
          <a href="{{ route('aboutMe.index') }}" class="primary-btn" data-text="Show more">
            <span>V</span>
            <span>e</span>
            <span>r</span>
            <span></span>
            <span>M</span>
            <span>á</span>
            <span>s</span>
          </a>
        </div>
        <div class="banner-img offset-lg-1 col-lg-7 col-md-6">
          <img class="img-fluid" src="img/banner-img.png" alt="">
        </div>
        <div class="social-icons">
          <ul>
            <li><a href="https://www.github.com/moncadayunuen/" target="_blank"><i class="ti-github"></i>moncadayunuen</a></li>
            <li><a href="https://www.facebook.com/yunuenmoncada/" target="_blank"><i class="ti-linkedin"></i>yunuen-moncada</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
    <!-- End banner Area -->

    <!-- Start About Area -->
    @foreach ($careers as $career)
    <section class="about-area section-gap">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-lg-5 about-left">
            <img class="img-fluid" src="{{ url($career->photo) }}" alt="">
          </div>
          <div class="offset-lg-1 col-lg-5 col-md-12 about-right">
            <div class="section-title">
              <h2 class="mb-4">{{ $career->title }}</h2>
            </div>
            <div class="mb-35 wow fadeIn" data-wow-duration=".8s" data-wow-delay=".3s">
              <p>{!! $career->content !!}</p>
            </div>
            <a href="{{ route('aboutMe.index') }}" class="primary-btn" data-text="Read More">
              <span>L</span>
              <span>e</span>
              <span>e</span>
              <span>r</span>
              <span></span>
              <span>M</span>
              <span>á</span>
              <span>s</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    @endforeach
    <!-- End About Area -->

    <!-- Start Service Area -->
    <section class="service-area section-gap-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center">
              <h3>My Services</h3>
              <h2><span>What I Offer?</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.0s">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-desktop"></i>
                <h4 class="ml-3">Interfaces Web Design</h4>
              </div>
              <p>Wireframe, Layout & Programming websites.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-paint-brush"></i>
                <h4 class="ml-3">Brand design</h4>
              </div>
              <p>Conceptualization and brands design.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-bullhorn"></i>
                <h4 class="ml-3">Content Social Media</h4>
              </div>
              <p>Design or animation of social media content.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="d-flex align-items-center mb-3">
                <i class="far fa-lightbulb"></i>
                <h4 class="ml-3">Creativity & Innovation</h4>
              </div>
              <p>Always learning the most newest.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="d-flex align-items-center mb-3">
                <i class="flaticon-button"></i>
                <h4 class="ml-3">Video Edition</h4>
              </div>
              <p>Edition, banners design, etc.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-bezier-curve"></i>
                <h4 class="ml-3">Motion Graphics</h4>
              </div>
              <p>Intros, Outros, Infographics, gifts, etc.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Service Area -->

  <!-- Start Pricing Area -->
  <section class="pricing-area section-gap-top">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center">
            <h3>Quoting</h3>
            <h2><span>Salary</span> for independents projects</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="pricing_item">
            <h3 class="p_title">Graphic Design</h3>
            <p class="p_criteria">Price by an hour</p>
            <h1 class="p_price">$115.00</h1>
            <div class="p_list">
              <ul>
                <li><span class="ti-check"></span> Approaches</li>
                <li><span class="ti-check"></span> Corrections / Changes / Delivery</li>
              </ul>
                <a class="primary-btn mt-4" href="contact.html" data-text="I want a project">
                <span>P</span>
                <span>r</span>
                <span>o</span>
                <span>y</span>
                <span>e</span>
                <span>c</span>
                <span>t</span>
                <span>o</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="pricing_item">
            <h3 class="p_title">Website</h3>
            <p class="p_criteria">Price by an hour</p>
            <h1 class="p_price">$140.00</h1>
            <div class="p_list">
              <ul>
                <li><span class="ti-check"></span> Conceptualization / Wireframe</li>
                <li><span class="ti-check"></span> Layout</li>
                <li><span class="ti-check"></span> Programming Website</li>
                <li><span class="ti-check"></span> Pre-Delivery</li>
                <li><span class="ti-check"></span> Correactions / Changes / Delivery</li>
                <li><span class="ti-check"></span> Hosting and Domain Purchase</li>
              </ul>
              <a class="primary-btn mt-4" href="contact.html" data-text="I want a project">
                <span>P</span>
                <span>r</span>
                <span>o</span>
                <span>y</span>
                <span>e</span>
                <span>c</span>
                <span>t</span>
                <span>o</span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="pricing_item">
            <h3 class="p_title">Motion Graphics</h3>
            <p class="p_criteria">Price by an hour</p>
            <h1 class="p_price">$135.00</h1>
            <div class="p_list">
              <ul>
                <li><span class="ti-check"></span> Conceptualization Topic</li>
                <li><span class="ti-check"></span> Graphic Design of Product</li>
                <li><span class="ti-check"></span> Animation Stage</li>
                <li><span class="ti-check"></span> Pre-Delivery</li>
                <li><span class="ti-check"></span> Corrections / Changes / Delivery</li>
              </ul>
              <a class="primary-btn mt-4" href="contact.html" data-text="I want a project">
                <span>P</span>
                <span>r</span>
                <span>o</span>
                <span>y</span>
                <span>e</span>
                <span>c</span>
                <span>t</span>
                <span>o</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Pricing Area -->
@endsection