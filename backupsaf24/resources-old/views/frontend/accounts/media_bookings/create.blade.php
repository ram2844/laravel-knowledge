@extends('layouts.app')
<style type="text/css">
    .bootstrap-select>.dropdown-toggle.btn-light, .bootstrap-select>.dropdown-toggle.btn-secondary {
        
        border-color: #000000 !important;
    }
</style>

@section('content')
<section class="saf-dashboard--">
    <div class="container">
        <div class="row dashboard-panel">
            <div class="col-md-3">
                @include('frontend/includes/aside-customer')
            </div>

            <div class="col-md-9">
                <div class="content-area">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-bs">
                        <form action="{{ route('media.booking.store') }}" method="POST" enctype="multipart/form-data" class="bookingslotform">
                            
                            {{ csrf_field() }}
                           
                            <!--Begin::Body-->
                            <div class="card-body">
                                @include('includes.common.error')
                                @include('flash::message')
                                <div class="row bookslot pt-5 pb-5">
                                    <div class="col-md-12">
                                        <h3 class="title">Book an Interview Slot</h3>
                                        <p class="sub-title">Please select who you would like to book a slot with</p> 
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="radio-toolbar">

                                            @if($meetingPersons->count())
                                                @foreach($meetingPersons as $key => $value)
                                                    
                                                    <input type="radio" name="meeting_person_id" id="{{ $value->name }}" class="meeting-person-{{ $key }}" value="{{ $value->id }}" {{ $key == 0 ? 'checked' : '' }} onchange="getSlotDates(this)">
                                                    <label for="{{ $value->name }}">{{ $value->name }}</label>

                                                @endforeach
                                            @endif

                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="meeting_date" id="meeting_date" class="form-control @error('meeting_date') is-invalid @enderror" onchange="getSlotTimes(this)">
                                                        <option value="">SELECT DATE</option>
                                                        
                                                    </select>

                                                    @error('meeting_date')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="meeting_from_time" id="meeting_from_time" class="form-control @error('meeting_from_time') is-invalid @enderror">
                                                        <option value="">SELECT TIME</option>
                                                        
                                                    </select>

                                                    @error('meeting_from_time')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" value="Submit ⟶">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->

                            <!-- <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4 text-center">
                                            <input type="submit" class="theme-btn" value="BOOK NOW &LongRightArrow;">
                                        </div>
                                    </div>
                                </div> -->
                        </form>

                    </div>
                    <!--end::Card-->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){

        console.log('$(".meeting-person")', $(".meeting-person"));
        getSlotDates($(".meeting-person-0"));

    })

    function getSlotDates( _this ) {

        var meeting_person_id = $(_this).val();
        // console.log('meeting_person_id', meeting_person_id);

        if(meeting_person_id) {

            $.ajax({

                type:       "GET",
                url:        "{{ url('media-meeting-dates') }}/" + meeting_person_id,
                datatype:   'json',
                success: function (response) {

                    if(response?.status) {

                        var options = '<option value="">SELECT DATE </option>';

                        if(response?.data?.length) {
                            for (var i = 0; i < response?.data?.length; i++) {

                                options += '<option value="'+response?.data[i]?.meeting_date+'">'+response?.data[i]?.meeting_date+'</option>';
                            }

                            $("#meeting_date").html(options);
                            // $("#meeting_date").selectpicker('refresh');
                        }
                    } else {
                        $("#meeting_date").html('<option value="">SELECT DATE</option>');
                        $("#meeting_from_time").html('<option value="">SELECT TIME</option>');
                    }
                }
            });

        } else {

            $("#meeting_date").html('<option value="">SELECT DATE</option>');
            $("#meeting_from_time").html('<option value="">SELECT TIME</option>');
            // $("#meeting_date").selectpicker('refresh');
        }
    }

    function getSlotTimes( _this ) {

        var meeting_date = $('#meeting_date').val();
        var meeting_person_id = $('input[name=meeting_person_id]:checked').val();

        if(meeting_date && meeting_person_id) {

            $.ajax({

                type:       "GET",
                url:        "{{ url('media-meeting-times') }}",
                datatype    : 'json',
                data        : { meeting_date: meeting_date, meeting_person_id: meeting_person_id },
                success: function (response) {

                    if(response?.status) {

                        var options = '<option value="">SELECT TIME</option>';

                        if(response?.data?.length) {
                            for (var i = 0; i < response?.data?.length; i++) {

                                if(
                                    typeof response?.data[i]?.media_booking != 'undefined' &&
                                    response?.data[i]?.media_booking != null 

                                ){
                                    options += '<option disabled value="'+response?.data[i]?.id+'">'+(response?.data[i]?.meeting_from_time + ' - ' + response?.data[i]?.meeting_to_time)+'</option>';
                                } else {

                                    options += '<option value="'+response?.data[i]?.id+'">'+(response?.data[i]?.meeting_from_time + ' - ' + response?.data[i]?.meeting_to_time)+'</option>';
                                }
                            }

                            $("#meeting_from_time").html(options);
                            // $("#meeting_from_time").selectpicker('refresh');
                        }
                    } else {
                        $("#meeting_from_time").html('<option value="">SELECT TIME</option>');
                    }
                }
            });

        } else {

            $("#meeting_from_time").html('<option value="">SELECT TIME</option>');
            // $("#meeting_from_time").selectpicker('refresh');
        }
    }
    
</script>
@endpush