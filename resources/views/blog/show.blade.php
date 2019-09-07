@extends('layouts.layout')
@section('content')
<section class="post-content-area single-post-area section-gap">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 posts-list">
        <div class="single-post row widget-wrap">
          <div class="col-lg-12">
            <div class="feature-img">
              <img class="img-fluid" src="{{ url($post->thumbnail) }}" alt="">
            </div>
          </div>
          <div class="col-lg-3  col-md-3 meta-details">
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
              {{-- <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="ti-eye"></span></p> --}}
              {{-- <p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="ti-comment"></span></p> --}}
              <ul class="social-links col-lg-12 col-md-12 col-6">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter"></i></a></li>
                <li><a href="#"><i class="ti-github"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 col-md-9">
            <a class="posts-title" href="{{ route('blog.show', $post->url) }}"><h3>{{ $post->title }}</h3></a>
            <p class="excert">{!! $post->content !!}</p>
          </div>
        </div>
        <div class="row">
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
        
      <div class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">

          <div class="single-sidebar-widget search-widget">
            <form class="search-form" action="#">
              <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
              <button type="submit"><i class="ti-search"></i></button>
            </form>
          </div>

          <div class="single-sidebar-widget tag-cloud-widget">
            <h4 class="tagcloud-title">Tags</h4>
            <ul>
              @foreach ($post->tags as $tag)
                <li><a href="{{ route('blog.tags', $tag->url) }}">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
          </div>
            
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection