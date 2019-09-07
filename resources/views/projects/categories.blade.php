@extends('layouts.layout')
@section('content')
@if(count($projects) > 0)
<section class="work-area section-gap-top" id="work">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title text-center">
					<h3>My Portfolio</h3>
					<h2><span>Check</span> My Work</h2>
				</div>
			</div>

			<div class="col-lg-12 d-none">
				<div class="filters">
					<ul>
						<li class="active" data-filter=".all"></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="filters-content">
			<div class="row grid">
					<div class="grid-sizer"></div>
					@foreach ($projects as $project)
					<div class="col-lg-4 col-md-6 grid-item all wow fadeIn" data-wow-duration="2s" data-wow-delay="0s">
						<div class="single-work">
							<div class="relative">
								<div class="thumb">
									<img class="image img-fluid" src="{{ url($project->thumbnail) }}" alt="">
								</div>
								<div class="middle">
									<h4>{{ $project->title }}</h4>
									<div class="cat">{{ $project->client }}</div>
								</div>
								<a class="overlay" href="{{ route('projects.show', $project->title) }}"></a>
							</div>
						</div>
					</div>
					@endforeach
			</div>
		</div>

	</div>
</section>
@else 
	<center><h1>There are not projects published</h1></center>
@endif
@endsection