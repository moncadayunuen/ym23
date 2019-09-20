@extends('layouts.layout')
@section('content')
@if (count($posts) > 0)
<section class="pt-5">
  <div class="container">
    <div class="pt-5 row">
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
<center class="pt-5"><h2 class="py-5">No hay publicaciones en esta categoría</h2></center>
@endif
@endsection