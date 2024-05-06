@extends('layouts.app')

@section('content')


<section class="saf-exhibitionpage">
	<div class="container">

		<div class="row pb-3" style="align-items:end;">
			<div class="col-md-10">

				@include('flash::message')

				<h1 class="main-title">Exhibitions & Installations</h1>
				<p class="sub-title">We invite you to experience a wide variety of exhibitions showcasing a range of themes, practices, and media.</p> 
			</div>

            <div class="col-md-2">
                <a class="downloadbtn">Download PDF <i class="fas fa-download"></i></a>
            </div>
		</div>
		
		<!-- filter code -->
		<div class="row">
			<div class="col-md-12">
				<form method="GET" action="{{ route('exhibitions') }}" class="searchform" id="searchform">             
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="fltr-title">Filter</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-end">
                                        <a href="{{ route('exhibitions') }}">RESET</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- <label for="searchbar">search programs</label> -->
                                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search events, descriptions....">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="venue[]" id="venue" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();" multiple title="Select Venue">
                                    <!-- <option value="">Select Venue</option> -->
                                    @if($venues->count())
                                        @foreach($venues as $value)
                                            <option {{ @in_array($value->id, request()->venue ?? []) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </form>
			</div>
		</div>

		<div class="row pb-3">
			<div class="col-md-12">
				<div class="showing-results">
					<p class="result">showing <span>{{$programs->count()}}</span> of <span>{{$programs->count()}}</span></p>
				</div>
			</div>
		</div>

		<div class="row pb-3">

			@if($programs->count())
	        	@foreach($programs as $value)
				 	<div class="col-md-10 exhibitionsingle">
						<div class="row">
							<div class="col-md-5">
								<div class="exhibition-item">
                                    <a href="{{ route('exhibition.details', ['id' => $value->slug]) }}">
                                        @php
                                            $programDates = $value->getProgramDates();
                                            $programVenues = $value->getProgramVenues();
                                        @endphp

    									<div class="row pb-3">
                                            <div class="col-md-6">
                                                <div class="date">
                                                    <p>
                                                        @if($programDates->count())
                                                            @foreach($programDates as $key2 => $value2)
                                                                {{ @date('d M', strtotime($value2->event_date)) }}

                                                                @if($programDates->count() - 1 != $key2)
                                                                    |
                                                                @endif

                                                            @endforeach
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="venue">
                                                    <p>
                                                        @if($programVenues->count())
                                                            @foreach($programVenues as $key3 => $value3)
                                                                {{ $value3->venue->title ?? '' }}

                                                                @if($programVenues->count() - 1 != $key3)
                                                                    |
                                                                @endif

                                                            @endforeach
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

    									<div class="imgtag">
    										<img src="{{url('uploads/programs/thumbnails/250').'/'.$value->program_image}}" class="pgrimg">
    										@php

    										$programTags = $value->programTags();

    										@endphp

    										@if($programTags)
    											<div class="tags">
    			        						@foreach($programTags as $value2)
    												<div class="tag-col">{{$value2}}</div>
    												@endforeach
    											</div>
    										@endif
    									</div>
    									<a href="javascript:void(0)" class="link-btn" data-toggle="modal" data-target="#bookSeatModal{{$value->id}}">Book Seats ⟶</a>
    								</div>
                                </a>
							</div>

							<div class="col-md-7">
								<div class="exhibition-item-content">
									<h3 class="title">{{ $value->name ?? 'N/A' }}</h3>
									<p class="desc">{!! $value->short_description !!}</p>

                                    @php

                                        $programVenues = $value->getProgramVenues();
                                        $accessibility_ids = [];

                                    @endphp

                                    @if($programVenues->count())
    									<div class="icon" style="position: relative;">

                                            <!-- Motif icons -->
                                            @foreach($programVenues as $key1 => $value1)

                                                @php
                                                    if(isset($value1->venue->accessibility_ids) && !empty($value1->venue->accessibility_ids) && is_array($value1->venue->accessibility_ids)){

                                                        $accessibility_ids = array_merge($accessibility_ids, $value1->venue->accessibility_ids);
                                                    }
                                                @endphp

                                                @if(isset($value1->venue) && isset($value1->venue->accesebility_icon) && !empty($value1->venue->accesebility_icon))
                                                    <img height="25px" src="{{ asset('uploads/vanues/thumbnails/250/'.$value1->venue->accesebility_icon ?? '') }}" alt="{{ $value1->venue->title }}" title="{{ $value1->venue->title }}">
                                                @endif

                                            @endforeach

                                            <!-- Accessibility icons -->
                                            @php
                                                if(isset($accessibility_ids) && !empty($accessibility_ids) && is_array($accessibility_ids)){

                                                    $venuesAccessibilities = \App\Models\Accessibility::whereIn('id', $accessibility_ids)->get();
                                                }
                                            @endphp

                                            @if( isset($venuesAccessibilities) && $venuesAccessibilities->count())
                                                @foreach($venuesAccessibilities as $key11 => $value11)
                                                    <img height="25px" src="{{ asset('uploads/accessibilities/thumbnails/250/'.$value11->icon) }}" alt="{{ $value11->name }}" title="{{ $value11->name }}">
                                                @endforeach
                                            @endif

    										<!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
    										<!-- <i class="fa fa-universal-access" aria-hidden="true"></i> -->
    										<i class="fa fa-share" aria-hidden="true" style="cursor:pointer;" onclick="copyTextToClipboard(this, '{{ route('exhibition.details', ['id' => $value->slug]) }}')"></i>
    										<!-- <i class="fa fa-bell" aria-hidden="true"></i> -->
                                            
    									</div>
                                    @endif
								</div>
							</div>
						</div>

						<div class="modal safevbk fade" id="bookSeatModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="bookSeatModalLabel{{$value->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document" style="max-width: 800px">
                                <div class="modal-content">
                                    <form action="{{ route('cart.add', ['program_id' => $value->id]) }}" method="GET" autocomplete="off" >
                                        
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bookSeatModalLabel{{$value->id}}">Select A Date</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row program-item">
                                                <div class="col-md-3">
                                                    <label class="col-form-label font-weight-bolder">Date</label>
                                                    <select class="form-control selectpicker program-date" tabindex="null" required onchange="getEventTimes(this)">
                                                        <option value="">Select Date</option>
                                                        @if($programDates->count())
                                                            @foreach($programDates as $value2)
                                                               <option {{ \Helper::checkProgramDate($value2->event_date) }} value="{{$value2->id}}">{{ $value2->formatForAddToCalenderEventDate() }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-form-label font-weight-bolder">Time</label>
                                                    <select class="form-control selectpicker program-time" name="program_detail_id" tabindex="null" required onchange="checkQty(this)">
                                                        <option value="">Select Time</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-form-label font-weight-bolder">Venue</label>
                                                    <input type="text" value="" class="form-control venue-title" placeholder="Venue" readonly>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-form-label font-weight-bolder">Qty</label>
                                                    <input type="number" min="1" max="4" name="qty" value="1" class="form-control qty input-limit" placeholder="Qty">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary font-weight-bold external-link-btn">Add To Calendar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

					</div>
				@endforeach
	        @endif

		</div>

	</div>
</section>

@endsection


@push('scripts')

@endpush