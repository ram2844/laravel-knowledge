@extends('layouts.app')

@section('content')
<section class="saf-dashboard">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
				<h1 class="main-title">My Account</h1>
				<p class="sub-title">View your saved programs and exhibitions, use the filters to search your saved events by venues, dates, genre and accesibility </p> 
	        </div>
	    </div>

		<div class="row dashboard-panel">
			<div class="col-md-3">
				@include('frontend/includes/aside-customer')
			</div>

			<div class="col-md-9">
				<div class="content-area">

					@include('flash::message')
					
					<div class="row">
						<!-- <div class="col-md-6 pb-3">
							<div class="cardbox">
								<div class="iconbox"></div>
								<div class="details">
									<h3 class="title">Events</h3>
									<p class="nums">{{$eventCount}} Upcoming Events</p>
								</div>
							</div>
						</div> -->

						<div class="col-md-6 pb-3">
							<div class="cardbox">
								<div class="iconbox"></div>
								<div class="details">
									<h3 class="title">Exhibitions</h3>
									<p class="nums">{{$exhibitionCount}} Upcoming Exhibitions</p>
								</div>
							</div>
						</div>


						<div class="col-md-6 pb-3">
							<div class="cardbox">
								<div class="iconbox"></div>
								<div class="details">
									<h3 class="title">Programs</h3>
									<p class="cntxt">{{$programCount}} Upcoming Exhibitions

									<!-- <ul>
										<li>
											April 29 - April 30<br/>
											Spotlight Showcase - Avora Records
										</li>
										<li>
											April 29 - April 30<br/>
											Spotlight Showcase - Avora Records
										</li>
									</ul> -->
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
	        </div>
		</div>

	</div>
</section>
@endsection