@extends('layouts.layout')
@section('content')

<header>
  <div class="box-about-me">
    <h1>Soy Diseñadora Multimedia</h1>
    <p>Tengo muchos desafíos por delante, pienso cómo enfrentarlos</p>
    <div class="d-flex">
      <a class="btn btn-primary" href="{{ route('projects.index') }}"><span>Proyectos </span></a>
      <a class="btn btn-underline" href="{{ route('about') }}"><span>Sobre mí</span></a>
    </div>
  </div>
</header>

<section class="about-me">
  <div class="row">
    <div class="col-lg-6 col-md-4 col-12">
      <div class="thumb-about-me">
        <img src="{{ asset('img/banner-img.png') }}" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-6 col-md-8 col-12">
      <h1 class="text-center">Sobre mí</h1>
      <p>Tengo una licenciatura en multimedia de la Universidad de Medios Audiovisuales, con especialidad en multimedia. Parte de mi capacitación incluye fotografía, diseño gráfico digital, animación y diseño de interfaces web y móvil.
      </p>
      <a class="btn btn-secondary m-2" href="{{ route('about') }}"><span>Ver más</span></a>
    </div>
  </div>
</section>


<section class="skills">
  <h1 class="title-white">Habilidades</h1>
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="fa fa-laptop"></i>
            <h3>Interfaces Web Design</h3>
          </div>
          <div class="card-content">
            <p>Prototipos, maquetado de sitios, CMS's, etc.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="fa fa-paint-brush"></i>
            <h3>Diseño de Marca</h3>
          </div>
          <div class="card-content">
            <p>Logotipos, Papelería, Packaging, etc.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="fas fa-bullhorn"></i>
            <h3>Redes sociales</h3>
          </div>
          <div class="card-content">
            <p>Contenido para Facebook, Instagram, Youtube, etc.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="far fa-lightbulb"></i>
            <h4>Aprendizaje Continuo</h4>
          </div>
          <div class="card-content">
            <p>Siempre aprendiendo cosas nuevas. Y fortaleciendo lo aprendido.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="fas fa-play"></i>
            <h4>Edición de Video</h4>
          </div>
          <div class="card-content">
            <p>Edición de video, subtítulos, correción de color, edición de audio.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-skill">
          <div class="single-skill-header">
            <i class="fas fa-bezier-curve"></i>
            <h4>Motion Graphics</h4>
          </div>
          <div class="card-content">
            <p>Videos institucionales, banners, intros, outros, gifts, etc.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@if(count($post) > 0)
<section class="blog">
  <h1 class="title">Blog</h1>

  <div class="container">
    <div class="row py-5">
      @if (count($posts) > 0 )
      @foreach ($post as $mainpost)
      <div class="col-lg-6">
        <div class="single-project">
          <div class="thumb-project">
            <a href="{{ route('blog.show', $mainpost->url) }}"><img src="{{ asset($mainpost->thumbnail) }}" class="img-fluid h-img"></a>
          </div>
          <a href="{{ route('blog.show', $mainpost->url) }}" class="text-decoration"><h2>{{ $mainpost->title }}</h2></a>
          <div class="meta">
            <span class="d-flex"><img src="{{ asset($mainpost->owner->avatar) }}" width="35" class="pr-2"> {{ $mainpost->owner->name }}</span>
            <span>{{ $mainpost->published_at->format('d/m/Y') }}</span>
          </div>
          <p>{{ $mainpost->description }}</p>
        </div>
      </div>
      @endforeach
      @else
      @foreach ($post as $mainpost)
      <div class="offset-md-3 col-md-9 offset-lg-3 col-lg-6 col-12">
        <div class="single-project">
          <div class="thumb-project">
            <img src="{{ asset($mainpost->thumbnail) }}" class="img-fluid h-img">
          </div>
          <a href="" class="text-decoration"><h2>{{ $mainpost->title }}</h2></a>
          <div class="meta">
            <span class="d-flex"><img src="./images//user.jpg" width="35" class="pr-2"> {{ $mainpost->owner->name }}</span>
            <span>{{ $mainpost->published_at->format('d/m/Y') }}</span>
          </div>
          <p>{{ $mainpost->description }}</p>
        </div>
      </div>
      @endforeach
      @endif
      <div class="col-lg-6">
        @foreach($posts as $post)
        <div class="single-project">
          <div class="row">
            <div class="col-lg-6 col-md-5">
              <div class="thumb-project">
                <a href="{{ route('blog.show', $post->url) }}"><img src="{{ asset($post->thumbnail) }}" class="img-fluid h-img"></a>
              </div>
            </div>
            <div class="col-lg-6 col-md-7">
              <a href="{{ route('blog.show', $post->url) }}" class="text-decoration"><h4 class="px-2">{{ $post->title }}</h4></a>
              <div class="meta">
                <span class="d-flex"><img src="{{ $post->owner->avatar }}" width="35" class="pr-2"> {{ $post->owner->name }}</span>
                <span>{{ $post->published_at->format('d/m/Y') }}</span>
              </div>
              <p>{{ $post->description }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</section>
@else
<div></div>
@endif

@endsection