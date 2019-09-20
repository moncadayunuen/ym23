@extends('layouts.layout')
@section('content')
<div class="container pt-5">
<section class="about-me pt-5">
  @foreach ($careers as $career)
    <div class="row align-items-center justify-content-start">
      <div class="col-lg-6 col-md-4 col-12">
        <div class="thumb-about-me">
          <img class="img-fluid" src="{{ url($career->photo) }}" alt="">
        </div>
      </div>
      <div class="offset-lg-1 col-lg-5 col-md-12 about-right">
        <div class="section-title">
          <h1 class="text-center">{{ $career->title }}</h1>
        </div>
        <p>{!! $career->content !!}</p>
        <a href="{{ route('download', $career) }}" class="btn btn-download">Descargar CV</a>
      </div>
      <div class="mt-5 col-lg-12">
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
      <div class="mt-5 col-lg-12">
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
              <a><img src="./img/languages/php-brands.svg" width="100px" title="" alt=""></a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-center">
              <a><img src="./img/languages/laravel.png" width="100px" title="" alt=""></a>
            </div>
          </div>
      </div>
    </div>
  @endforeach
</section>
</div>
@endsection