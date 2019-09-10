@extends('layouts.layout')
@section('content')
<section class="post-content-area py-3">
  <div class="container">
    @if(count($posts) > 0)
    <div class="row">
         
      <div class="col-lg-8 posts-list">

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
                  <p class="user-name col-lg-12 col-md-12 col-6"><a>{{ $post->owner->name }}</a> <i class="ti-user"></i></p>
                  <p class="date col-lg-12 col-md-12 col-6"><a>{{$post->published_at->format('d M, Y')}}</a> <i class="ti-calendar"></i></p>
                  {{-- <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <i class="ti-eye"></i></p> --}}
                  {{-- <p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <i class="ti-comment"></i></p> --}}
                </div>
              </div>
              <div class="col-lg-9 col-md-9">
                <div class="feature-img">
                  <a href="{{ route('blog.show', $post->url) }}"><img class="img-fluid" src="{{ url($post->thumbnail) }}" alt=""></a>
                </div>
                <a class="posts-title" href="{{ route('blog.show', $post->url) }}"><h3>{{$post->title}}</h3></a>
                <p class="excert">{{$post->description}}</p>
                <a href="{{ route('blog.show', $post->url) }}" class="primary-btn" data-text="View More">
                    <span>L</span>
                    <span>e</span>
                    <span>e</span>
                    <span>r</span>
                    <span> </span>
                    <span>M</span>
                    <span>á</span>
                    <span>s</span>
                  </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        {{ $posts->links() }}

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
              @foreach($tags as $tag)
                <li><a href="{{ route('blog.tags', $tag->url) }}">{{ $tag->name }}</a></li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>

    </div>
    @else
      <center><h3 class="text-center">The are not posts</h3></center>
    @endif
  </div>
</section>
@endsection