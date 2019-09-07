@extends('layouts.layout')
@section('content')
<section class="about-area section-gap">
  @foreach ($careers as $career)
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
        <a href="{{ route('download', $career) }}" class="primary-btn" data-text="Download CV">
          <span>D</span>
          <span>e</span>
          <span>s</span>
          <span>c</span>
          <span>a</span>
          <span>r</span>
          <span>g</span>
          <span>a</span>
          <span>r</span>
        </a>
      </div>
      <div class="mt-5 col-lg-12 wow fadeIn" data-wow-duration=".8s" data-wow-delay=".3s">
          <h2 class="text-center">Software</h2>
          <div class="row py-3">
            <div class="col-lg-3 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/software/photoshop.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/software/illustrator.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/software/experience.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/software/premier.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-3 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/software/after-effects.svg" width="100px" title="" alt=""></a>
            </div>
          </div>
      </div>
      <div class="mt-5 col-lg-12 wow fadeIn" data-wow-duration=".8s" data-wow-delay=".3s">
          <h2 class="text-center">Languages</h2>
          <div class="row py-3">
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/html-5-logo.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/css-3.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/js-brands.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/js-react-icon.jpg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/mysql.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/node-brands.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/php-brands.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/laravel.png" width="100px" title="" alt=""></a>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach
</section>
@endsection