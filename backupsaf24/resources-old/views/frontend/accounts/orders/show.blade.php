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