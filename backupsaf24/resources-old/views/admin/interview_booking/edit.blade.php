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
	                                <h1 class="display-4 font-weight-boldest mb-10">ORDER DETAILS</h1>
	                                <div class="d-flex flex-column align-items-md-end px-0">
	                                    <!--begin::Logo-->
	                                    <a href="javascript:void(0)" class="mb-5">
	                                    	<img src="{{asset('media/logos/logo-header.png')}}" class="max-h-50px" alt="">
	                                    </a>
	                                    <!--end::Logo-->
	                                    <span class=" d-flex flex-column align-items-md-end opacity-70">
	                                    <span>{{$row->permanent_address}}</span>
	                                    <span>{{$row->city->city_name ?? ''}}, {{$row->state->state_name ?? ''}}, {{$row->country->country_name ?? ''}}</span>
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
	                                    <span class="font-weight-bolder mb-2">ADDRESS</span>
	                                    <span class="opacity-70">{{$row->permanent_address}}<br>{{$row->city->city_name ?? ''}}, {{$row->state->state_name ?? ''}}, {{$row->country->country_name ?? ''}}</span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- end: Invoice header-->
	                    <!-- begin: Invoice body-->
	                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
	                        <div class="col-md-11">
	                            <div class="table-responsive">
	                                <table class="table">
	                                    <thead>
	                                        <tr>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Image</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Title</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Date/Time</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Amount</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Qty</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Total Amount</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>

	                                    	@if($orderDetails->count())
		                                    	@foreach($orderDetails as $key => $value)
			                                        <tr class="font-weight-boldest">
			                                            <td class="pl-0 pt-7 d-flex align-items-center">
			                                                <!--begin::Symbol-->
			                                                <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
				                                                @if(isset($value->program_image) && !empty($value->program_image))
																	<div class="symbol-label" style="background-image: url({{asset('uploads/programs/thumbnails/250/'.$value->program_image)}})"></div>
							                            		@else
							                            			<div class="symbol-label" style="background-image: url({{asset('media/users/blank.png')}})"></div>
							                            		@endif
			                                                </div>
			                                                <!--end::Symbol-->
			                                            </td>
			                                            <td class="text-left pt-7 align-middle"> {{$value->program_name}}</td>
			                                            <td class="text-left pt-7 align-middle"> {{$value->getFormattedDateTime() }}</td>
			                                            <td class="pr-0 pt-7 text-right align-middle"><i class='fas fa-rupee-sign icon-sm'></i> {{ number_format($value->program_amount, 2) }}</td>

			                                            <td class="pr-0 pt-7 text-right align-middle">{{ $value->program_qty ?? 1 }}</td>

			                                            <td class="pr-0 pt-7 text-right align-middle"><i class='fas fa-rupee-sign icon-sm'></i> {{ number_format(($value->program_total_amount), 2) }}</td>
			                                        </tr>
		                                        @endforeach
	                                        @endif
	                                        
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- end: Invoice body-->
	                    <!-- begin: Invoice footer-->
	                    <div class="row row justify-content-center py-8 px-8 py-md-10 px-md-0 ">
	                        <div class="col-md-11">
	                            <div class="table-responsive">
	                                <table class="table">
	                                    <thead>
	                                        <tr>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">PAYMENT TYPE</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">PAYMENT STATUS</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">PAYMENT DATE</th>
	                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase text-right">TOTAL PAID</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr class="font-weight-bolder">
	                                            <td>{{$row->order_number ?? 'N/A'}}</td>
	                                            <td>{{$row->payment_status ?? 'N/A'}}</td>
	                                            <td>{{$row->payment_date ?? 'N/A'}}</td>
	                                            <td class="text-primary font-size-h3 font-weight-boldest text-right"><i class='fas fa-rupee-sign'></i> {{ number_format($row->total_amount, 2) }}</td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- end: Invoice footer-->
	                    <!-- begin: Invoice action-->
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

		                    <div class="col-md-4">
		                    	<form action="{{ route($moduleConfig['routes']['updateRoute'], ['id' => $row->id]) }}" method="POST">
		                        	@csrf()
		                        	<input type="hidden" name="_method" value="PUT">
		                        	<input type="hidden" name="type" value="paymentStatus">
			                        <div class="form-group row validated">
			                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Payment Status </label>
			                            <div class="col-lg-6 col-md-6 col-sm-12">
			                                <select class="form-control selectpicker" name="status" >
			                                    <option value="">Select</option>
			                                    <option {{ $row->payment_status == 'PENDING' ? 'selected' : '' }} value="PENDING">Pending</option>
			                                    <option {{ $row->payment_status == 'SUCCESS' ? 'selected' : '' }} value="SUCCESS">Success</option>
			                                    <option {{ $row->payment_status == 'FAILED' ? 'selected' : '' }} value="FAILED">Failed</option>
			                                    
			                                </select>
			                                
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