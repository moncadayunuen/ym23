@extends('layouts.layout')
@section('content')
<section class="pt-5">
  <div class="container">
    <div class="row pt-5">

          <div class="col-5">
            <img class="img-fluid" src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}">
          </div>
          <div class="col-7">
            <div class="project-card">
              <h4>{{ $project->title }}</h4>
              <p>{{ $project->description }}</p>
              <ul class="project-info">
                <li><span>Client:</span>{{ $project->client }}</li>
                <li><span>Website:</span>{{ $project->website }}</li>
                <li><span>Completed:</span>{{ $project->created->format('d M, Y') }}</li>
              </ul>
            </div>
          </div>

      <div class="col-12 py-4 d-flex justify-content-center">{!! $project->content !!}</div>

    </div>
  </div>
</section>
@endsection