@extends('layouts.app')

@section('content')


<section class="saf-venuepage">
	<div class="container">
		<div class="row pb-3">
			<div class="col-md-12">
				<h1 class="main-title">Venues</h1>
				<p class="sub-title">Spread across a patch of Panaji skirting the river Mandovi, the Festival locations have been strategically chosen for their historical value, natural beauty, and affinity to the arts. The initiatives undertaken by the Festival are set to transform these venues into spaces where audiences from all walks of life can experience the wonder of the arts in new and exciting contexts—an endeavour that will turn the Mandovi waterfront into a hub of cultural activity. With its close-knit networks and practical commute options, Serendipity Arts Festival promises to be accessible to all.</p> 
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				@if($venues->count())
        			@foreach($venues as $value)
					<div class="latestvenue-item">
						<div class="row">
							<div class="col-md-6">
								<div class="titlerow">
									<div class="sqmark"></div>
									<h3 class="title">{{$value->title}}</h3>
								</div>

								
								
								<div class="desc-block">
									<div class="icon">
										@if($value->accesebility_icon)
											<img src="{{ asset('uploads/vanues/').'/'.$value->accesebility_icon }}">
										@else
											<img src="{{asset('/image/aguad-jail.jpg')}}">
										@endif
									</div>

									<div class="desc">

									<div class="access-icon">

@php

$allAccessibilities = $value->getAccessibility();

@endphp

@if($allAccessibilities->count())
	@foreach($allAccessibilities as $key2 => $value2)

		<img height="25" src="{{ asset('uploads/accessibilities/thumbnails/250/').'/'.$value2->icon }}" alt="{{$value2->name}}" title="{{$value2->name}}">
		<!-- <i class="fa fa-wheelchair" aria-hidden="true"></i> -->
		<!-- <i class="fa fa-wifi" aria-hidden="true"></i> -->
	@endforeach
@endif

</div>

										<div class="short-desc">{!!$value->description!!}
									</div>

										
										<div class="action-btn">
										<a target="_blank" href="{{$value->google_map_url}}" class="loc-btn">Get Directions  &LongRightArrow;</a>
										<!-- <a href="{{ route('programs', ['venue' => $value->id]) }}" class="link-btn">View programmes &LongRightArrow;</a> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="venueimg">
									<img src="{{asset('uploads/vanues/').'/'.$value->featured_image}}" alt="">
								</div>
							</div>
						</div>
					</div>

					@endforeach
	        	@endif

		<!-- 		<div class="latestvenue-item">
					<div class="row">
						<div class="col-md-6">
							<h3 class="title">Old GMC Building</h3>
							<p class="location">Location: Lorem ipsum dolor sit amet, consectetur.</p>
							<div class="desc-block">
								<div class="icon">
									<img src="{{url('/image/ART-PARK.jpg')}}">
								</div>

								<div class="desc">
									<div class="short-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
										exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
										pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
										deserunt mollit anim id est laborum.
									</div>

									<a href="#" class="link-btn">View programmes &LongRightArrow;</a>
								</div>	
							</div>
						</div>
						<div class="col-md-6">
							<img src="{{url('/image/old-gmc-building.jpg')}}" alt="" class="venueimg">
						</div>
					</div>
				</div>


				<div class="latestvenue-item">
					<div class="row">
						<div class="col-md-6">
							<h3 class="title">Santa Monica Jetty</h3>
							<p class="location">Location: Lorem ipsum dolor sit amet, consectetur.</p>
							<div class="desc-block">
								<div class="icon">
									<img src="{{url('/image/aguad-jail.jpg')}}">
								</div>

								<div class="desc">
									<div class="short-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
										exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
										pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
										deserunt mollit anim id est laborum.
									</div>

									<a href="#" class="link-btn">View programmes &LongRightArrow;</a>
								</div>	
							</div>
						</div>
						<div class="col-md-6">
							<img src="{{url('/image/sanat-monica-jetty.jpg')}}" alt="" class="venueimg">
						</div>
					</div>
				</div>



				<div class="latestvenue-item">
					<div class="row">
						<div class="col-md-6">
							<h3 class="title">Old GMC Building</h3>
							<p class="location">Location: Lorem ipsum dolor sit amet, consectetur.</p>
							<div class="desc-block">
								<div class="icon">
									<img src="{{url('/image/ART-PARK.jpg')}}">
								</div>

								<div class="desc">
									<div class="short-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
										exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
										pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
										deserunt mollit anim id est laborum.
									</div>

									<a href="#" class="link-btn">View programmes &LongRightArrow;</a>
								</div>	
							</div>
						</div>
						<div class="col-md-6">
							<img src="{{url('/image/old-gmc-building.jpg')}}" alt="" class="venueimg">
						</div>
					</div>
				</div> -->




			</div>
		</div>

		<div class="row">

		<h1 class="visiting-maintitle">Visting Goa</h1>

			<div class="col-md-6 visitred">
			<img src="{{URL::asset('/image/air.png')}}" class="visting-image">
				<h4 class="visiting-title">By Air</h4>
				<p class="visiting-desc">
				Goa has two airports now: at Dabolim and at Mopa, which are 30 km and 35 km away respectively from Goa’s capital Panaji, which is where our festival is. Several budget airlines, and India’s national carrier Air India, operate direct flights to Goa from Mumbai, Delhi, Chennai, Kolkata, Bengaluru, Hyderabad and several other cities. A return flight to Mumbai with a low-cost airline can cost Rs 5,000 if booked well in advance.
				</p>
			</div>
			<div class="col-md-6 visitgreen">
				<img src="{{URL::asset('/image/road.png')}}" class="visting-image">
				<h4 class="visiting-title">By Road</h4>
				<p class="visiting-desc">
				Private and state-run long distance buses run to and from Goa, and in many cases you can simply turn up at the bus station or you can opt to book online. Buses usually ply to Goa (Panaji, Mapusa, Margao) from Mumbai, Bengaluru, Hampi and Pune. A sleeper bus ticket can cost up to Rs 1,500, depending on the boarding station. You can hire a taxi from Mumbai to Goa. The journey takes around 15 hours. The cost of cab ranges from Rs 20 to Rs 50 per km, depending on the car chosen. Additionally, you have to pay toll taxes.
				</p>
			</div>
			<div class="col-md-6 visitpurple">
				<img src="{{URL::asset('/image/rail.png')}}" class="visting-image">
				<h4 class="visiting-title">By Rail</h4>
				<p class="visiting-desc">
				The main train stations in Goa are Madgaon station in Margao; Vasco da Gama; and Karmali station near Old Goa, 12 kms from Panaji. Direct trains run from all metros and other cities such as Jodhpur and Jaipur in Rajasthan and Jamnagar in Gujarat.
				</p>
			</div>
			<div class="col-md-6 visitblue">
				<img src="{{URL::asset('/image/traveller1.png')}}" class="visting-image">
				<h4 class="visiting-title">International Travellers</h4>
				<p class="visiting-desc">
				The main train stations in Goa are Madgaon station in Margao; Vasco da Gama and Karmali station near Old Goa, 12 kms from Panaji. Direct trains run from all metros and other cities such as Jodhpur and Jaipur in Rajasthan and Jamnagar in Gujarat.
				</p>
			</div>
		</div>

	</div>
</section>

@endsection