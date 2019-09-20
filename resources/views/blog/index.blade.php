@extends('layouts.layout')
@section('content')
@if (count($posts) > 0)
<section class="pt-5">
  <div class="container">

    <div class="row pt-5">
      <div class="owl-carousel">
        @foreach($postsCategories as $postCategory)
        <div>
          <a href="{{ route('blog.categories', $postCategory->url) }}" target="_blank">
            <div class="thumb-category">
              <img class="img-fluid" src="{{ url($postCategory->thumbnail) }}" alt="">
              <div class="content-category">
                <h4>{{ $postCategory->name }}</h4>
                <p>{{ $postCategory->description }}</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
     
    </div>

  </div>
</section>
    
<section class="pt-5">
  <div class="container">

    <div class="single-post row">
      @foreach ($posts as $post)
      <div class="col-12 py-2 widget-wrap mb-2 px-2">
        <div class="row">

          <div class="col-lg-3  col-md-3 meta-details">
            <ul class="tags">
              @foreach ($post->tags as $tag)
                <li><a href="{{ route('blog.tags', $tag->url) }}">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
            <div class="user-details row">
              <p class="user-name col-lg-12 col-md-12 col-6"><a class="pr-2">{{ $post->owner->name }}</a><i class="fa fa-user-alt"></i></p>
              <p class="col-lg-12 col-md-12 col-6"><a>{{$post->published_at->format('d M, Y')}}</a> <i class="fa fa-calendar-alt"></i></p>
            </div>
          </div>

          <div class="col-lg-9 col-md-9">
            <a href="{{ route('blog.show', $post->url) }}">
            <div class="feature-img">
              <img class="img-fluid" src="{{ url($post->thumbnail) }}" alt="">
            </div>
            </a>
            <a class="posts-title" href="{{ route('blog.show', $post->url) }}">{{$post->title}}</a>
            <p class="excert">{{$post->description}}</p>
            <a href="{{ route('blog.show', $post->url) }}" class="btn btn-secondary my-2"><span>Ver más</span></a>
          </div>

        </div>
      </div>
      @endforeach
    </div>

    {{ $posts->links() }}

  </div>
</section>
@else
<center class="pt-5"><h2 class="py-5">No hay publicaciones aún</h2></center>
@endif
@endsection

@push('js-scripts')
<script src="{{ asset('./js/jquery.min.js') }}"></script>
<script src="{{ asset('./js/owl.carousel.js') }}"></script>
@endpush

@push('scripts')
  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop: true,
        items: 3,
        center: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        autoWidth: false,
        responsive:{
          0:{
              items:1,
          },
          768:{
              items:2,
          },
          1024:{
              items:3
          }
        }
      });
    });
  </script>
@endpush