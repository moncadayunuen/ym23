@extends('layouts.layout')
@section('content')
<div class="container pt-5">
  <div class="pt-5 pb-4">
      @if(count($projects) > 0)
      <div class="row">
        <div class="col-lg-12">
          <div class="portfolioFilter clearfix">
            <a href="#" data-filter="*" class="current">Todas las categorías</a>
            @foreach($categories as $category)
              <a href="#" data-filter=".{{ $category->name }}">{{ $category->name }}</a>
            @endforeach
          </div>
        </div>
        @foreach($projects as $project)
        <div class="col-lg-4 col-md-6 col-6 my-4">
          <a href="{{ route('projects.show', $project->title) }}" class="text-decoration">
            <div class="card {{ $project->category_project->name }} objects">
              <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->name }}" class="img-fluid">
              <div class="card-overlay">
                <h5>{{ $project->title }}</h5>
                <h4>{{ $project->client }}</h4>
                
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
      @else
        <h2 class="py-5">No hay proyectos</h2>
      @endif
  </div>
</div>
@endsection
