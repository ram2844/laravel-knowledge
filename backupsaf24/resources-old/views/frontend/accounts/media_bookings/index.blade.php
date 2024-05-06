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

					@include('flash::message')
					
					<!--begin::Card-->
	                <div class="card card-custom gutter-bs">
					<div class="card-header pt-0 pb-5 pl-0" style="min-height:auto;">
                        <div class="card-title">
							<h3 class="card-label" style="font-size: 1.5rem;">My Media Bookings</h3>
						</div>
					</div>
	                	<div class="card-body">
		                <!--begin::Shopping Order-->
			                <div class="table-responsive">
			                    <table class="table">
			                        <!--begin::Order Header-->
			                        <thead>
			                            <tr>
											<th>S.No</th>
			                                <th>Booking No.</th>
			                                <th>Name</th>
			                                <th>Email</th>
			                                <th>Meeting Person Name</th>
			                                <th>Meeting Date/Time</th>
			                                <th>Status</th>
			                                <th>Action</th>
			                            </tr>
			                        </thead>
			                        <!--end::Order Header-->

			                        <tbody>
			                            <!--begin::Order Content-->
			                            @php
			                            $subTotal = 0;
			                            @endphp

			                            @if($orders->count())
			                                @foreach($orders as $order)

			                                	@php

			                                		$subTotal += $order->total_amount;

			                                	@endphp

			                                   	<tr>
					                                <td class="">
														1
													</td>
					                                <td class="">
					                                	<a target="_blank" href="{{ route('programs') }}" class="text-dark text-hover-primary">{{ $order->order_number ?? 'N/A' }}</a>
					                                </td>
					                                <td class="">
					                                	<a target="_blank" href="{{ route('programs') }}" class="text-dark text-hover-primary">{{ $order->name ?? 'N/A' }}</a>
					                                </td>
					                                <td class="">
					                                	{{ $order->email ?? 'N/A' }}
					                                </td>
					                                
					                                <td class="">
					                                	{{ $order->meeting_person_name ?? 'N/A' }}
					                                </td>
					                                
					                                <td class="">
					                                	{{ $order->meeting_date ?? 'N/A' }}<br>
					                                	<small>{{ $order->meeting_from_time ?? 'N/A' }}</small>
					                                </td>
					                                
					                                <td class="">
					                                    {!! \Helper::getOrderStatusHtml($order->status) !!}
					                                </td>
					                                <td class="text-right align-middle">
					                                    <a href="{{ route('media.booking.edit', ['id' => $order->id]) }}" class="btn btn-danger font-weight-bolder font-size-sm">
					                                        View
					                                    </a>
					                                </td>
					                            </tr>
			                                @endforeach
		                                @else
			                                <tr>
				                                <td colspan="6" class="border-0 text-center text-danger font-size-h4">
				                                    No order yet.
				                                </td>
				                            </tr>
			                            @endif
			                            <!--end::Order Content-->
			                        </tbody>
			                    </table>
			                </div>
			                <!--end::Shopping Order-->
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