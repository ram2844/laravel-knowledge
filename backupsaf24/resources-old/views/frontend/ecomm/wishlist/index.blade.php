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
							<h3 class="card-label" style="font-size: 1.5rem;">My Wishlists</h3>
						</div>
					</div>
	                	<div class="card-body">
			                <!--begin::Shopping Cart-->
			                <div class="table-responsive">
			                    <table class="table">
	                                <!--begin::Cart Header-->
	                                <thead>
	                                    <tr>
											<th>Image</th>
	                                        <th>Title</th>
	                                        <th class="text-right">Price</th>
	                                        <th class="text-center">Qty</th>
	                                        <th class="text-right">Total Price</th>
	                                        <th>Remove</th>
	                                    </tr>
	                                </thead>
	                                <!--end::Cart Header-->

	                                <tbody>
	                                    <!--begin::Cart Content-->
	                                    @if($wishlists->count())
	                                        @foreach($wishlists as $key => $cart)

	                                            <tr>
	                                                <td class="d-flex align-items-center font-weight-bolder">
	                                                    <!--begin::Symbol-->
	                                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
	                                                        @if(isset($cart->product->product_main_image) && !empty($cart->product->product_main_image))
	                                                            <div class="symbol-label" style="background-image: url({{asset('uploads/ecomm_products/thumbnails/250/'.$cart->product->product_main_image)}})"></div>
	                                                        @else
	                                                            <div class="symbol-label" style="background-image: url({{asset('media/users/blank.png')}})"></div>
	                                                        @endif
	                                                    </div>
	                                                    <!--end::Symbol-->
	                                                </td>
	                                                <td class="">
	                                                    <a target="_blank" href="{{ route('ecomm.product.details', ['id' => $cart->product_id]) }}" class="text-dark text-hover-primary">{{ $cart->product->product_name ?? 'N/A' }}</a>
	                                                </td>
	                                                
	                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
	                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format($cart->product->product_price, 2) }}
	                                                </td>
	                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
	                                                    {{ $cart->qty ?? 1 }}
	                                                </td>

	                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
	                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format(($cart->product->product_price * ($cart->qty ?? 1)), 2) }}
	                                                </td>
	                                                <td class="text-center align-middle">
	                                                    <a onclick="return confirmRemove('{{ route('ecomm.wishlist.remove', ['id' => $cart->id]) }}')" href="javascript:void(0)" class="btn btn-danger font-weight-bolder font-size-sm">
	                                                        X
	                                                    </a>
	                                                </td>
	                                            </tr>
	                                        @endforeach
	                                    @else
	                                        <tr>
	                                            <td colspan="8" class="border-0 text-center text-danger font-size-h4">
	                                                Your wishlist is empty
	                                            </td>
	                                        </tr>
	                                    @endif
	                                    <!--end::Cart Content-->

	                                    
	                                </tbody>
	                            </table>
			                </div>
			                <!--end::Shopping Cart-->
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

    function confirmRemove(url){

            if(confirm('Are you sure?')){

                window.location.href = url;
            }

            return false;
        }
	
</script>
@endpush