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
                        <form action="{{ route('media.booking.create') }}" method="POST" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}

                            <!--Begin::Header-->
                            <div class="card-header pt-0 pb-0">
                                @include('includes.common.error')
                                @include('flash::message')

                                <div class="card-title">
                                    <h3 class="card-label">Media Booking</h3>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--Begin::Body-->
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting Person Name </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <select name="meeting_person_id" id="meeting_person_id" class="form-control form-control-lg form-control-custom selectpicker @error('meeting_person_id') is-invalid @enderror" onchange="getSlotDates(this)">
                                                    <option value="">Select Meeting Person Name</option>

                                                    @if($meetingPersons->count())
                                                        @foreach($meetingPersons as $country)
                                                            <option value="{{$country->id}}" {{ old('meeting_person_id') == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('meeting_person_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting Date </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <select name="meeting_date" id="meeting_date" class="form-control form-control-lg form-control-custom selectpicker @error('meeting_date') is-invalid @enderror" onchange="getSlotTimes(this)">
                                                    <option value="">Select Meeting Date</option>
                                                </select>
                                                @error('meeting_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting Time </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <select name="meeting_from_time" id="meeting_from_time" class="form-control form-control-lg form-control-custom selectpicker @error('meeting_from_time') is-invalid @enderror">
                                                    <option value="">Select Meeting Time</option>

                                                </select>
                                                @error('meeting_from_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!--end::Body-->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-center">
                                        <input type="submit" class="theme-btn" value="BOOK NOW &LongRightArrow;">
                                    </div>
                                </div>
                            </div>
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

    function getSlotDates( _this ) {

        var meeting_person_id = $('#meeting_person_id').val();

        if(meeting_person_id) {

            $.ajax({

                type:       "GET",
                url:        "{{ url('media-meeting-dates') }}/" + meeting_person_id,
                datatype:   'json',
                success: function (response) {

                    if(response?.status) {

                        var options = '<option value="">Select Meeting Date</option>';

                        if(response?.data?.length) {
                            for (var i = 0; i < response?.data?.length; i++) {

                                options += '<option value="'+response?.data[i]?.meeting_date+'">'+response?.data[i]?.meeting_date+'</option>';
                            }

                            $("#meeting_date").html(options);
                            $("#meeting_date").selectpicker('refresh');
                        }
                    }
                }
            });

        } else {

            $("#meeting_date").html('<option value="">Select Meeting Date</option>');
            $("#meeting_date").selectpicker('refresh');
        }
    }

    function getSlotTimes( _this ) {

        var meeting_date = $('#meeting_date').val();

        if(meeting_date) {

            $.ajax({

                type:       "GET",
                url:        "{{ url('media-meeting-times') }}",
                datatype:   'json',
                data : { meeting_date: meeting_date },
                success: function (response) {

                    if(response?.status) {

                        var options = '<option value="">Select Meeting Time</option>';

                        if(response?.data?.length) {
                            for (var i = 0; i < response?.data?.length; i++) {

                                options += '<option value="'+response?.data[i]?.id+'">'+(response?.data[i]?.meeting_from_time + ' - ' + response?.data[i]?.meeting_to_time)+'</option>';
                            }

                            $("#meeting_from_time").html(options);
                            $("#meeting_from_time").selectpicker('refresh');
                        }
                    }
                }
            });

        } else {

            $("#meeting_from_time").html('<option value="">Select Meeting Time</option>');
            $("#meeting_from_time").selectpicker('refresh');
        }
    }
    
</script>
@endpush