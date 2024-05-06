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
	                	
	                	<div class="card-body p-0">
		                    <!-- begin: Invoice-->
		                    <!-- begin: Invoice header-->
		                    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
		                        <div class="col-md-11">
		                            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
		                                <h1 class="display-4 font-weight-boldest mb-10">MEDIA BOOKING DETAILS</h1>
		                                <div class="d-flex flex-column align-items-md-end px-0">
		                                    <!--begin::Logo-->
		                                    <a href="javascript:void(0)" class="mb-5">
		                                    	<img src="{{asset('media/logos/logo-header.png')}}" class="max-h-50px" alt="">
		                                    </a>
		                                    <!--end::Logo-->
		                                    <span class=" d-flex flex-column align-items-md-end opacity-70">
		                                    <span>{{ $row->created_at->format('M d, Y') }}</span>
		                                    </span>
		                                </div>
		                            </div>
		                            <div class="border-bottom w-100"></div>
		                            <div class="d-flex justify-content-between pt-6">
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">ORDER DATE</span>
		                                    <span class="opacity-70">{{$row->created_at->format('M d, Y')}}</span>
		                                    <!-- Jan 07, 2020 -->
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">ORDER NO.</span>
		                                    <span class="opacity-70">{{$row->order_number}}</span>
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">Name</span>
		                                    <span class="opacity-70">{{$row->name}}</span>
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">Email</span>
		                                    <span class="opacity-70">{{$row->email}}</span>
		                                </div>
		                            </div>
		                            <div class="d-flex justify-content-between pt-6">
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">CONTACT</span>
		                                    <span class="opacity-70">{{$row->contact}}</span>
		                                    <!-- Jan 07, 2020 -->
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">MEETING PERSON NAME</span>
		                                    <span class="opacity-70">{{$row->meeting_person_name}}</span>
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">MEETIGN DATE</span>
		                                    <span class="opacity-70">{{ $row->meeting_date }}</span>
		                                </div>
		                                <div class="d-flex flex-column flex-root">
		                                    <span class="font-weight-bolder mb-2">MEETING TIME</span>
		                                    <span class="opacity-70">{{$row->meeting_from_time}} - {{$row->meeting_to_time}}</span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                   
		                    
		                    <!-- end: Invoice action-->
		                    <!-- end: Invoice-->
		                </div>
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

    function allCheckClick(_this){
    	
    	if($(_this).is(':checked')){
    		$(".interest").prop('checked', true);
    	} else {

    		$(".interest").prop('checked', false);
    	}
    }
	
</script>
@endpush