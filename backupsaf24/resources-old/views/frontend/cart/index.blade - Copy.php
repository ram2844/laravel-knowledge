@extends('layouts.app')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="d-flex flex-row">
		    
		    <!--begin::Layout-->
		    <div class="flex-row-fluid ml-lg-8">
		        <!--begin::Section-->
		        <div class="card card-custom gutter-b">
		            <!--begin::Header-->
		            @include('flash::message')
		            <div class="card-header flex-wrap border-0 pt-6 pb-0">
		                <h3 class="card-title align-items-start flex-column">
		                    <span class="card-label font-weight-bolder font-size-h3 text-dark">My Calender</span>
		                </h3>
		                <div class="card-toolbar">
		                    <div class="dropdown dropdown-inline">
		                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">
		                            Explore More
		                        </a>
		                    </div>
		                </div>
		            </div>
		            <!--end::Header-->

		            <div class="card-body">
		                <!--begin::Shopping Cart-->
		                <div class="table-responsive">
		                    <table class="table">
		                        <!--begin::Cart Header-->
		                        <thead>
		                            <tr>
		                                <th>Image</th>
		                                <th>Title</th>
		                                <th>Date</th>
		                                <th>Time</th>
		                                <th class="text-right">Price</th>
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <!--end::Cart Header-->

		                        <tbody>
		                            <!--begin::Cart Content-->
		                            @php
		                            $subTotal = 0;
		                            @endphp

		                            @if($carts->count())
		                                @foreach($carts as $cart)

		                                	@php

		                                		$subTotal += $cart->program->amount;

		                                	@endphp

		                                   	<tr>
				                                <td class="d-flex align-items-center font-weight-bolder">
				                                    <!--begin::Symbol-->
				                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
				                                    	@if(isset($cart->program->program_image) && !empty($cart->program->program_image))
															<div class="symbol-label" style="background-image: url({{asset('uploads/programs/thumbnails/250/'.$cart->program->program_image)}})"></div>
					                            		@else
					                            			<div class="symbol-label" style="background-image: url({{asset('media/users/blank.png')}})"></div>
					                            		@endif
				                                    </div>
				                                    <!--end::Symbol-->
				                                </td>
				                                <td class="">
				                                	<a target="_blank" href="{{ route('programs') }}" class="text-dark text-hover-primary">{{ $cart->program->name ?? 'N/A' }}</a>
				                                </td>
				                                <td class="">
				                                	{{ $cart->programDetails->event_date ?? 'N/A' }}
				                                </td>
				                                <td class="">
				                                	{{ $cart->programDetails->from_time ?? 'N/A' }} - {{ $cart->programDetails->to_time ?? 'N/A' }}
				                                </td>
				                                <td class="text-right align-middle font-weight-bolder font-size-h5">
				                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format($cart->program->amount, 2) }}
				                                </td>
				                                <td class="text-right align-middle">
				                                    <a onclick="return confirm('Are you sure?')" href="{{ route('cart.remove', ['id' => $cart->id]) }}" class="btn btn-danger font-weight-bolder font-size-sm">
				                                        Remove
				                                    </a>
				                                </td>
				                            </tr>
		                                @endforeach
	                                @else
		                                <tr>
			                                <td colspan="6" class="border-0 text-center text-danger font-size-h4">
			                                    Your cart is empty
			                                </td>
			                            </tr>
		                            @endif
		                            <!--end::Cart Content-->

		                            @if($carts->count())
			                            <!--begin::Cart Footer-->
			                            <tr>
			                                <td colspan="4"></td>
			                                <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
			                                <td class="font-weight-bolder font-size-h4 text-right">
			                                	<i class="fa fa-rupee-sign fa-sm"></i>
			                                	{{ number_format($subTotal, 2) }}
			                                </td>
			                            </tr>
			                            <tr>
			                                <td colspan="6" class="border-0 text-right pt-10">
			                                    <a href="{{ route('checkout.index') }}" class="btn btn-success font-weight-bolder px-8">Proceed to Checkout</a>
			                                </td>
			                            </tr>
			                            <!--end::Cart Footer-->
		                            @endif
		                        </tbody>
		                    </table>
		                </div>
		                <!--end::Shopping Cart-->
		            </div>
		        </div>
		        <!--end::Section-->
		    </div>
		    <!--end::Layout-->
		</div>
	</div>
</div>

@endsection

@push('scripts')
	<script type="text/javascript">

	</script>
@endpush