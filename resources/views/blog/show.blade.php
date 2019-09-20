@extends('layouts.layout')
@section('content')
<section class="pt-5">
  <div class="container">
    <div class="row pt-5">

          <div class="col-lg-12">
            <a class="posts-title" href="{{ route('blog.show', $post->url) }}"><h3>{{ $post->title }}</h3></a>
            <p>{{ $post->description }}</p>
            <div class="feature-img">
              <img class="img-fluid" src="{{ url($post->thumbnail) }}" alt="{{ $post->title }}">
            </div>
          </div>

          <div class="col-lg-3  col-md-3 py-3">
            <ul class="tags">
              @foreach ($post->tags as $tag)
              <li><a href="{{ route('blog.tags', $tag->url) }}">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
            <div class="user-details row">
              <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{ $post->owner->name }}</a> <span class="ti-user"></span></p>
              @if($post->published_at)
              <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $post->published_at->format('d M, Y') }}</a> <span class="ti-calendar"></span></p>
              @endif
              <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-github"></i></a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-9 col-md-9 pb-3">{!! $post->content !!}</div>

          <div class="col-12 comments-area">COMENTARIOS
              <div id="disqus_thread"></div>
              <script>
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://ym23-official.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
              </script>
          </div>

      </div>
    </div>
  </div>
</section>
@endsection