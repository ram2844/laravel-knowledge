@extends('layouts.app')

@section('content')


<section class="saf-programpage">
    <div class="container">

        <div class="row pb-3">
            <div class="col-md-5">
                <div class="gotoback">
                    <a href="{{ route('programs') }}">⟵ Back</a>
                </div>
            </div>
            <div class="col-md-7">
                <a href="javascript:void(0)" class="link-btn theme-book-btn singleprogbookbtn" style="float:right;" data-toggle="modal" data-target="#bookSeatModal99999">book seats ⟶</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="program-featureimg">
                    <!-- <img src="{{url('/image/programsingleimg.jpg')}}"> -->
                    <img src="{{asset('uploads/programs').'/'.$row->program_image}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="programsingle">
                    <h3 class="title">{{$row->name}}</h3>
                    <div class="description">
                        {!!$row->description!!}
                    </div>
                    <a href="javascript:void(0)" class="link-btn theme-book-btn" data-toggle="modal" data-target="#bookSeatModal99999">book seats ⟶</a>
                </div>

                <div class="modal safbkseat fade" id="bookSeatModal99999" tabindex="-1" role="dialog" aria-labelledby="bookSeatModalLabel99999" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px">
                        <div class="modal-content">
                            <form action="{{ route('cart.add', ['program_id' => $row->id]) }}" method="GET" autocomplete="off" >
                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookSeatModalLabel99999">Select A Date</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row program-item">
                                        <div class="col-md-3">

                                            @php
                                                $programDates = $row->getProgramDates();
                                            @endphp

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

            <div class="col-md-3">
                @php
                    $programSponsors = $row->programSponsors();

                @endphp

                <div class="programrightblock">
                    
                    @if(isset($programSponsors) && $programSponsors->count())
                        <div class="partners">
                            <h3 class="title">partners</h3>
                            <div class="programpartnerslick">
                                @foreach($programSponsors as $key => $value2)
                                    <div class="logo-item">
                                        <a target="_blank" href="{{$value2}}"><img src="{{ asset('uploads/sponsors/thumbnails/250/'.$key) }}"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- dd($programVenues->toArray()); -->

                    @php

                        $programVenues = $row->getProgramVenues();
                        $accessibility_ids = [];

                    @endphp


                    @if($programVenues->count())

                        <div class="getdirection">
                            <a target="_blank" href="{{ $programVenues[0]->venue->google_map_url ?? 'javascript:void(0)' }}" class="loc-btn">Get Directions</a>
                        </div>

                        <div class="icon" style="position: relative;">
                            <!-- Motif icons -->
                            @foreach($programVenues as $key1 => $value1)

                                @php
                                    if(isset($value1->venue->accessibility_ids) && !empty($value1->venue->accessibility_ids) && is_array($value1->venue->accessibility_ids)){

                                        $accessibility_ids = array_merge($accessibility_ids, $value1->venue->accessibility_ids);
                                    }
                                @endphp

                                <img height="25px" src="{{ asset('uploads/vanues/thumbnails/250/'.$value1->venue->accesebility_icon) }}" alt="{{ $value1->venue->title }}" title="{{ $value1->venue->title }}">
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
    						<i class="fa fa-share" aria-hidden="true" style="cursor:pointer; vertical-align: middle;" onclick="copyTextToClipboard(this, '{{ url()->full() }}')"></i>
    						<!-- <i class="fa fa-bell" aria-hidden="true"></i> -->

                            <!-- <div id="snackbar">Link copied</div> -->
					   </div>
                    @endif
                </div>
            </div>
        </div>

        @if($programs->count())
            <div class="row pt-5 pb-5">
                <div class="col-md-12">
                    <h3 class="related-program">Related programs</h3>
                </div>
            </div>

            <div class="row">
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
                                    <img src="{{ url('uploads/programs/thumbnails/250').'/'.$value->program_image }}" class="pgrimg">

                                    <div class="tags"></div>
                                </div>

                                <h3 class="title">{{ $value->name ?? 'N/A' }}</h3>
                                
                                <a href="javascript:void(0)" class="link-btn" data-toggle="modal" data-target="#bookSeatModal{{$value->id}}">Book seats ⟶</a>

                            </a>


                        </div>

                        <div class="modal fade" id="bookSeatModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="bookSeatModalLabel{{$value->id}}" aria-hidden="true">
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
            </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
    <script type="text/javascript">
        
    </script>
@endpush