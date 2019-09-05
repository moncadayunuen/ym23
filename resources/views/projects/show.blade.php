@extends('layouts.layout')
@section('content')
<section class="portfolio_details_area section-gap">
  <div class="container">
    <div class="portfolio_details_inner">
      <div class="row">
        <div class="col-md-6 col-5">
          <div class="left_img">
            <img class="img-fluid" src="{{ asset($project->thumbnail) }}" alt="">
          </div>
        </div>
        <div class="offset-md-1 col-md-5 col-7">
          <div class="portfolio_right_text mt-30">
            <h4>{{ $project->title }}</h4>
            <p>{{ $project->description }}</p>
            <ul class="list">
              <li><span>Client</span>: {{ $project->client }}</li>
              <li><span>Website</span>: {{ $project->website }}</li>
              <li><span>Completed</span>: {{ $project->created->format('d M, Y') }}</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          {!! $project->content !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection