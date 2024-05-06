@extends('layouts.app')

<style type="text/css">

	.address-wapper {
	    border: 1px solid #e0e0e0;
	    border-top: 0;
	    position: relative;
	}

	.address-wapper:first-child {
	    border-top: 1px solid #e0e0e0;
	    margin-top: 20px;
	    border-radius: 2px 0;
	}

	.address-box{
	    overflow: hidden;
	    padding: 20px;
	}

	.address-box p{
	    font-size: 14px;
	}
</style>

@section('content')
<section class="saf-dashboard">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
				<h1 class="main-title">My Account</h1>
				<p class="sub-title">View your saved programs and exhibitions, use the filters to search your saved events by venues, dates, genre and accesibility </p> 
	        </div>
	    </div>

		<div class="row dashboard-panel">
			<div class="col-md-3">
				@include('frontend/includes/aside-customer')
			</div>

			<div class="col-md-9">
				<div class="content-area">

					@include('flash::message')
					
					<div class="row">
						<div class="col-md-10">
							<h3 class="card-label" style="font-size: 1.5rem;">My Addresses</h3>
						</div>
						<div class="col-md-2 text-right">
							<a href="{{ route('create.address') }}" class="btn btn-success btn-sm">Add Address</a>
						</div>
						
					</div>

					<div class="row">

					 	@if($userAddresses->count())
                        	@foreach($userAddresses as $value)
                        		<div class="col-md-12">
									<div class="address-wapper">
										<div class="address-box">
											<div class="row">
												<div class="col-md-11">
													<p><b>{{$value->name}} {{$value->contact}} </b></p>
													<p>{{$value->address}}, {{$value->locality}}, {{$value->city->city_name ?? 'N/A'}}, {{$value->state->state_name ?? 'N/A'}} - {{$value->pincode}}</p>
												</div>
												<div class="col-md-1">
													<a href="{{ route('edit.address', ['id' => $value->id]) }}"> <i class="fa fa-edit"></i> </a><br><br>
													<a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('deleteAddressForm').submit();"> <i class="fa fa-trash"></i> </a>
													<form id="deleteAddressForm" action="{{ route('delete.address', ['id' => $value->id]) }}" method="POST" style="display: none;">
														{{ csrf_field() }}
														<input type="hidden" name="_method" value="DELETE">
                            							<input type="hidden" name="id" value="{{$value->id}}">
													</form>
												</div>

											</div>
										</div>
									</div>
								</div>
                        	@endforeach
                    	@else

                    	<p class="text-center text-danger">No address found.</p>

                    	@endif
						
					</div>
				</div>
	        </div>
		</div>

	</div>
</section>
@endsection