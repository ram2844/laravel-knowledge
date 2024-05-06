@extends('layouts.app')
@section('content')

<section class="saf-productpage">
	<div class="container">

	    <div class="row">
	    	@include('flash::message')

	        <div class="col-md-9">
	            <h1 class="main-title">Merchandise</h1>
	            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
	        </div>
	    </div>

		<!-- filter code -->
		<div class="row pt-5">
			<div class="col-md-12">
				<form method="GET" action="" class="searchform" id="searchform">             
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="searchbar">search for merchandise</label>
                                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search shirts, mugs, bottles....">
                            </div>
                        </div>

						<div class="col-md-12">
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group" style="margin-bottom:0;">
										<label for="searchbar">filter</label>
									</div>
								</div>
								<div class="col-md-3">
                            		<div class="form-group">
                                		<select name="sort_by" id="sort_by" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();">
                                    		<option {{ request()->sort_by == 'NAME-ASC' ? 'selected' : '' }} value="NAME-ASC">Name A-Z</option>
                                    		<option {{ request()->sort_by == 'NAME-DESC' ? 'selected' : '' }} value="NAME-DESC">Name Z-A</option>
                                    		<option {{ request()->sort_by == 'PRICE-ASC' ? 'selected' : '' }} value="PRICE-ASC">Price Low to High</option>
                                    		<option {{ request()->sort_by == 'PRICE-DESC' ? 'selected' : '' }} value="PRICE-DESC">Price High to Low</option>
                                		</select>
                            		</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<select name="category[]" id="category" class="form-control selectpicker" onchange="document.getElementById('searchform').submit();" multiple>
											@if($categories->count())
		                                        @foreach($categories as $value)
		                                            <option {{ @in_array($value->id, request()->category ?? []) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
		                                        @endforeach
		                                    @endif
										</select>
									</div>
								</div>
							</div>
                        </div>
                        
                    </div>
                </form>
			</div>
		</div>

		<div class="row productlist pt-10">

			@if($products->count())
                @foreach($products as $value)
					<div class="col-md-3 product-item">
						<a href="{{ route('ecomm.product.details', ['id' => $value->slug]) }}">
							<div class="product-card">
								<div class="imgblock">
									<img src="{{url('uploads/ecomm_products/thumbnails/250').'/'.$value->product_main_image}}" alt="">
								</div>
								<div class="product-detail">
									<div class="catg-name">
										<div class="category-name">{{$value->category->name ?? 'N/A'}}</div>
										<div class="product-name">{{$value->product_name}}</div>
										<div class="product-price">₹ {{$value->product_price}}</div>
									</div>
									<div class="actionbtn">
										<div class="icon-wishlist"><i class="fa fa-heart"></i></div>
										<input type="hidden" name="product_id" class="product_id" value="{{$value->id}}">
										<div class="addtocart">Add to cart</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			@endif
		</div>

	</div>
</section>

@include('frontend.ecomm.inc.add_to_cart_modal')

@endsection

