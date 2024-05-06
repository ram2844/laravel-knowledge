@extends('layouts.backend')

@section('content')

<div class="d-flex flex-column-fluid">
   	<div class=" container ">
	    <!--begin::Page Layout-->
	    <div class="d-flex flex-row">
	        
	        <!--begin::Layout-->
	        <div class="flex-row-fluid ml-lg-8">
	            <!--begin::Card-->
            	@include('includes.common.error')
            	@include('flash::message')

	            <div class="card card-custom gutter-b">
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
	                                    <span class="font-weight-bolder mb-2">MEETING DATE</span>
	                                    <span class="opacity-70">{{ $row->meeting_date }}</span>
	                                </div>
	                                <div class="d-flex flex-column flex-root">
	                                    <span class="font-weight-bolder mb-2">MEETING TIME</span>
	                                    <span class="opacity-70">{{$row->meeting_from_time}} - {{$row->meeting_to_time}}</span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                   
	                    <div class="row justify-content-center1 py-8 px-8 ">

	                    	<div class="col-md-4">
		                        <form action="{{ route($moduleConfig['routes']['updateRoute'], ['id' => $row->id]) }}" method="POST">
		                        	@csrf()
		                        	<input type="hidden" name="_method" value="PUT">
		                        	<input type="hidden" name="type" value="orderStatus">
		                        	<div class="form-group row validated">
			                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Order Status </label>
			                            <div class="col-lg-6 col-md-6 col-sm-12">
			                                <select class="form-control selectpicker" name="status" >
			                                    <option value="">Select</option>
			                                    <option {{ $row->status == 'PENDING' ? 'selected' : '' }} value="PENDING">Pending</option>
			                                    <option {{ $row->status == 'CONFIRMED' ? 'selected' : '' }} value="CONFIRMED">Confirmed</option>
			                                    <option {{ $row->status == 'COMPLETED' ? 'selected' : '' }} value="COMPLETED">Completed</option>
			                                    <option {{ $row->status == 'REJECTED' ? 'selected' : '' }} value="REJECTED">Rejected</option>
			                                    
			                                </select>
			                                @error('status')
			                                    <div class="invalid-feedback">{{ $message }}</div>
			                                @enderror
			                            </div>
			                            <div class="col-lg-3 col-md-3 col-sm-12">
			                                <button type="submit" class="btn btn-success font-weight-bold">Update</button>
			                            </div>
			                        </div>
		                        </form>
		                    </div>

	                        <div class="col-md-4 text-right">
	                            <div class="d-flex justify-content-end">
	                                <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Order Details</button>
	                            </div>
	                        </div>

	                    </div>
	                    <!-- end: Invoice action-->
	                    <!-- end: Invoice-->
	                </div>
	            </div>
	            <!--end::Card-->
	        </div>
	        <!--end::Layout-->
	    </div>
	    <!--end::Page Layout-->		
	</div>
</div>
@endsection