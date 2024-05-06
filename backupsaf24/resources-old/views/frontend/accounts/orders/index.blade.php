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
					<div class="card-header pt-0 pb-5 pl-0" style="min-height:auto;">
                        <div class="card-title">
							<h3 class="card-label" style="font-size: 1.5rem;">My Calendar</h3>
						</div>
					</div>
	                	
	                	<div class="card-body">
		                <!--begin::Shopping Order-->
			                <div class="table-responsive">
			                    <table class="table">
			                        <!--begin::Order Header-->
			                        <thead>
			                            <tr>
										<th>S No.</th>
			                                <th>Booked on</th>
			                                <th>Order Number</th>
			                                <th>Name</th>
			                                <!-- <th>Email</th> -->
			                                <th>Total Amount</th>
			                                <!-- <th>Payment Status</th> -->
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
			                                @foreach($orders as $key => $order)

			                                	@php

			                                		$subTotal += $order->total_amount;

			                                	@endphp

			                                   	<tr>
					                                <td class="">
														{{$key+1}}
													</td>
													<td class="">
					                                	{{ $order->created_at_human ?? 'N/A' }}
					                                </td>
					                                <td class="">
					                                	<a target="_blank" href="{{ route('programs') }}" class="text-dark text-hover-primary">{{ $order->order_number ?? 'N/A' }}</a>
					                                </td>
					                                <td class="">
					                                	{{ $order->name ?? 'N/A' }}
					                                </td>
					                                
					                                <td class="text-right align-middle font-weight-bolder font-size-h5">
					                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format($order->total_amount, 2) }}
					                                </td>
					                                <td class="">
					                                    {!! \Helper::getOrderPaymentStatusHtml($order->payment_status) !!}
					                                </td>
					                                <!-- <td class="">
					                                    {!! \Helper::getOrderStatusHtml($order->status) !!}
					                                </td> -->
					                                <td class="text-right align-middle">
					                                    <a href="{{ route('order.show', ['id' => $order->id]) }}" class="btn btn-danger font-weight-bolder font-size-sm">
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