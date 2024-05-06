@extends('layouts.app')

@section('content')

<section class="saf-programpage">
    <div class="container">

        <div class="row pb-3">
            <div class="col-md-12">

                @include('flash::message')
                
                <h1 class="main-title">Program Schedule</h1>
                <p class="sub-title">We are pleased to be back with a range of exciting programs spanning diverse genres, forms, and contexts, from across the Visual, Performing, and Culinary Arts.</p> 
            </div>
        </div>
        
        <!-- filter code -->
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="{{ route('programs') }}" class="searchform" id="searchform">             
                    <div class="form-group">
                        <label for="searchbar">Search programs</label>
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search events, descriptions....">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="fltr-title">Filter</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-end">
                                        <a href="{{ route('programs') }}">RESET</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="event_date[]" id="event_date" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();" multiple title="Select Date">
                                    <!-- <option value="">Dates</option> -->
                                    <option {{ @in_array('2023-12-15', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-15">15 Dec</option>
                                    <option {{ @in_array('2023-12-16', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-16">16 Dec</option>
                                    <option {{ @in_array('2023-12-17', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-17">17 Dec</option>
                                    <option {{ @in_array('2023-12-18', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-18">18 Dec</option>
                                    <option {{ @in_array('2023-12-19', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-19">19 Dec</option>
                                    <option {{ @in_array('2023-12-20', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-20">20 Dec</option>
                                    <option {{ @in_array('2023-12-21', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-21">21 Dec</option>
                                    <option {{ @in_array('2023-12-22', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-22">22 Dec</option>
                                    <option {{ @in_array('2023-12-23', request()->event_date ?? []) ? 'selected' : '' }} value="2023-12-23">23 Dec</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="category[]" id="category" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();" multiple title="Select Category">
                                    <!-- <option value="">Select Category</option> -->
                                    @if($categories->count())
                                        @foreach($categories as $value)
                                            @if( $value->name != 'Exhibitions and Installations')
                                            <option {{ @in_array($value->id, request()->category ?? []) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
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
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="program_tag[]" id="program_tag" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();" multiple title="Select Tag">
                                    <!-- <option value="">Select Type</option> -->
                                    @if($programTags->count())
                                        @foreach($programTags as $value)
                                            <option {{ @in_array($value->id, request()->program_tag ?? []) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
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
                    <div class="col-md-4  mb-10">
                        <div class="program-item">
                            <a href="{{ route('program.details', ['id' => $value->slug]) }}">

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
                                    <img src="{{url('uploads/programs').'/'.$value->program_image}}" class="pgrimg">
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
                                <h3 class="title">{{ $value->name ?? 'N/A' }}</h3>
                                <!-- <a class="link-btn" href="{{ route('cart.add', ['program_id' => $value->id]) }}">book seats ⟶</a> -->
                                <a href="javascript:void(0)" class="link-btn" data-toggle="modal" data-target="#bookSeatModal{{$value->id}}">Book Seats ⟶</a>
                            </a>
                        </div>

                        <div class="modal safbkseat fade" id="bookSeatModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="bookSeatModalLabel{{$value->id}}" aria-hidden="true">
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
