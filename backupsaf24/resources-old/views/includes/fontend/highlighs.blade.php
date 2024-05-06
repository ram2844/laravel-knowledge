<div class="row highlighrow">
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12">
                <div class="highlight-listbox">
                    
                    @php 
                        $dayNo = request()->get('day', 1);
                    @endphp

                    @if($programs)
                        @foreach($programs as $key => $value)
                            <div class="highlight-list-item">
                                <p class="accessiblity">
                                    {{ @implode(' | ', $value->programTags()->toArray()) }}
                                </p>
                                <!-- <a href="{{ route('home', ['p' => $key, 'day' => $dayNo]) }}#highlightsSection">
                                    <h3 class="title">{{$value->name}}</h3>
                                </a>
                                 -->
                               <!--  <a href="javascript:void(0)" onclick="getHighlights(null, {{$key}})">
                                    <h3 class="title">{{$value->name}}</h3>
                                </a> -->

                                <a href="{{ route('program.details', ['id' => $value->slug]) }}">
                                    <h3 class="title">{{$value->name}}</h3>
                                </a>
                                <p class="locationplace">{{ @$value->programDetails[0]->formatForAddToCalenderEventTime() }} | {{ @$value->programDetails[0]->venue->title }}</p>
                                <a href="javascript:void(0)" class="link-btn" data-toggle="modal" data-target="#bookSeatModal{{$value->id}}">book seats ⟶</a>

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
                                                        @php
                                                            $programDates = $value->getProgramDates();
                                                        @endphp
                                                            
                                                        <label class="col-form-label font-weight-bolder">Date</label>
                                                        <select class="form-control selectpicker program-date" tabindex="null" required onchange="getEventTimes(this)">
                                                            <option value="">Select Date</option>
                                                            @if($programDates->count())
                                                                @foreach($programDates as $value2)
                                                                   <option value="{{$value2->id}}">{{ $value2->formatForAddToCalenderEventDate() }}</option>
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
                                                <button type="submit" class="btn btn-primary font-weight-bold external-link-btn">Add To Calender</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-5">

        @php $p = (int) $activeProgramIndex ?? 0; @endphp

        @if($programs && isset($programs[$p]))

            @php $singleProgram = $programs[$p]; @endphp

            <div class="featured-highlight ">

                <img src="{{url('uploads/programs').'/'.$singleProgram->program_image}}" class="{{ $singleProgram->name }}">

                <h3 class="title">{{ $singleProgram->name }}</h3>
                <p class="desc">
                    {!! $singleProgram->short_description !!}
                </p>
                <a href="javascript:void(0)" class="link-btn" data-toggle="modal" data-target="#bookSeatModal{{$singleProgram->id}}">book seats ⟶</a>
            </div>
        @endif

    </div>
</div>