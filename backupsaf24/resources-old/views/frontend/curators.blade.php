@extends('layouts.app')

@section('content')

<section class="saf-curatorpage">
	<div class="container">
		<div class="row pb-3">
			<div class="col-md-12">
				<h1 class="main-title">Curators</h1>
				<p class="sub-title">Our programmes have been put together by a panel comprising stalwarts representing various disciplines on the spectrum of the arts. It is their expertise that makes Serendipity Arts Festival a landmark event in the cultural calendar of the subcontinent.</p> 
			</div>
		</div>

		<div class="row">
		@if($curator->count())
        	@foreach($curator as $value)
				<div class="col-md-4">
					<a href="{{ route('curator.details', ['id' => $value->slug]) }}">
						<div class="curator-card">
							<img src="{{url('uploads/curators').'/'.$value->curator_image}}">
							<h3 class="name">{{$value->name}}</h3>
							<p class="desgn">{{$value->discipline_name}}</p>
						</div>
					</a>
				</div>
			@endforeach
        @endif

		</div>

	</div>
</section>

@if($special->count())
	<section class="saf-curatorpage">
		<div class="container">
			<div class="row pb-3">
				<div class="col-md-12">
					<h1 class="main-title">Special Project Curators</h1>
					<!-- <p class="sub-title">Our programmes have been put together by a panel comprising stalwarts representing various disciplines on the spectrum of the arts. It is their expertise that makes Serendipity Arts Festival a landmark event in the cultural calendar of the subcontinent.</p>  -->
				</div>
			</div>

			<div class="row">
			
	        	@foreach($special as $value)
					<div class="col-md-4">
						<a href="{{ route('curator.details', ['id' => $value->slug]) }}">
							<div class="curator-card">
								<img src="{{url('uploads/curators').'/'.$value->curator_image}}">
								<h3 class="name">{{$value->name}}</h3>
								<p class="desgn">{{$value->discipline_name}}</p>
							</div>
						</a>
					</div>
				@endforeach
	        

			</div>

		</div>
	</section>
@endif

@endsection