@extends('layouts.app')

@section('content')

<section class="saf-checkout">
    <div class="container">
        
        <form class="checkoutfrm" method="POST" action="{{ route('checkout.submit') }}">
            @csrf()
            <div class="row">
                <div class="col-7">
                    <h3 class="billing-title">Billing Details</h3>

                    <div class="form-group">
                        <label for="fullname">full name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="" value="{{ old('name', $row->name ?? '') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="contact">Whatsapp number</label>
                        <div class="row">
                            <div class="col-4">
                                <select name="country_std_code" id="country_std_code" class="form-control @error('country_std_code') is-invalid @enderror" required>
                                    <option value="">Select Country Code</option>
                                    @if($countryStdCodes->count())
                                        @foreach($countryStdCodes as $value)
                                            @if(!empty($value->std_code))
                                                <option value="{{$value->std_code}}" {{ old('country_std_code', '91') == $value->std_code ? 'selected' : '' }}>+{{$value->std_code}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-8">
                                @if(\Auth::check())
                                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $row->contact ?? '') }}" required>
                                @else
                                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $row->contact ?? '') }}">
                                @endif
                            </div>
                        </div>

                        <!-- <span class="otp-message-wrapper">
                            <input type="hidden" class="is-valid">
                            <span class="valid-feedback" role="alert" id="otp-message">
                                <strong></strong>
                            </span>
                        </span> -->

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    @if(!\Auth::check())
                        <div class="form-group otp-wrapper">
                            <div class="row">
                                <div class="col-9">
                                    <label for="otp">OTP</label>
                                    <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" value="{{ old('otp') }}">
                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-3 text-right">
                                    <label>&nbsp;</label><br>
                                    <button type="button" class="btn btn-success" onclick="requestOtp()" title="OTP will be send to your whatapp number">GET OTP</button>
                                </div>
                            </div>

                            <span class="otp-message-wrapper">
                                <input type="hidden" class="is-valid">
                                <span class="valid-feedback" role="alert" id="otp-message">
                                    <strong></strong>
                                </span>
                            </span>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="Email Address">Email Address</label>

                        @if(\Auth::check())

                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required="" value="{{ old('email', $row->email ?? '') }}">
                        @else

                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required="" value="{{ old('email', $row->email ?? '') }}">
                        @endif

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="Permanent Address">Permanent Address</label>
                        <textarea class="form-control @error('permanent_address') is-invalid @enderror" id="permanent_address" name="permanent_address" required="">{{ old('permanent_address', $row->permanent_address ?? '') }}</textarea>

                        @error('permanent_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="row">
	                    <div class="form-group col-md-4">
	                        <label for="Country">Country</label>
	                        <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" onchange="getStates(this, 'country_id', 'state_id', '')" required="">
	                            <option value="">Select</option>
	                            @if($countries->count())
	                                @foreach($countries as $value)
	                                    <option value="{{$value->id}}" {{ old('country_id', $row->country_id ?? 0) == $value->id ? 'selected' : '' }}>{{$value->country_name}}</option>
	                                @endforeach
	                            @endif
	                        </select>

                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

	                    </div>

	                    <div class="form-group col-md-4 other-country-div" style="display: {{ old('country_id') == '2' ? '' : 'none'; }}">
	                        <label for="Email Address">other country</label>
	                        <input type="text" class="form-control @error('other_country') is-invalid @enderror" id="other_country" name="other_country" value="{{ old('other_country', $row->other_country ?? '') }}">

                            @error('other_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

	                    </div>

	                    <div class="form-group col-md-4 other-country-cond" style="display: {{ old('country_id') == '2' ? 'none' : ''; }}">
	                        <label for="State">State</label>
	                        <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror" onchange="getCities(this, 'state_id', 'city_id')">
	                            <option value="">Select</option>
	                        </select>

                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

	                    </div>

	                    <div class="form-group col-md-4 other-country-cond" style="display: {{ old('country_id') == '2' ? 'none' : ''; }}">
	                        <label for="City">City</label>
	                        <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
	                            <option value="">Select</option>
	                        </select>

                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

	                    </div>
                    </div>

                    <!-- <div class="form-group">
                        <input type="checkbox" name="shippingadd" id="shippingadd">
                        <label for="State" class="shlabel">Shipping address same as billing</label>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit Details ⟶">
                    </div> -->
                </div>

                <div class="col-5">
                    <div class="checkout-sidebar">
                        <h3 class="sidebar-title">Curated Experience</h3>

                        @php
                            $subTotal = 0;
                        @endphp

                        @if(isset($carts) && !empty($carts))
                            @foreach($carts as $key => $cart)

                                @php
                                    if(\Auth::check() && \Auth::user()->getRoleType() == 'VIP'){

                                        $cart['program']->amount = 0;
                                    }
                                    
                                    $subTotal += ($cart['program']->amount * ($cart['qty'] ?? 1));
                                @endphp

                                <div class="product-details">
                                    <div class="product-name">{{ $cart['program']->name ?? 'N/A' }}</div>
                                    <div class="product-price">{{ number_format($cart['program']->amount, 2) }} X {{ $cart['qty'] ?? 1 }}</div>
                                </div>
                            @endforeach
                        @endif

                        @php

                            $coupon_amount = 0;

                            $appliedCoupon = \Session::get('AppliedCoupon');

                            if( $appliedCoupon && $appliedCoupon->amount > 0){
                                $coupon_amount = $appliedCoupon->amount;

                                $subTotal = $subTotal - $coupon_amount;
                            }

                        @endphp

                        @if($appliedCoupon && $appliedCoupon->amount > 0)
                            <div class="product-total">
                                <div class="title">Coupon Amount <br>
                                    <small>Coupon Code (<strong>{{$appliedCoupon->coupon_code}}</strong>)</small>
                                </div>
                                <div class="total-price">
                                    -{{ number_format(($appliedCoupon->amount), 2) }}
                                </div>
                            </div>
                        @endif

                        <div class="product-total">
                            <div class="title">Total Amount</div>
                            <div class="total-price">
                                {{ $subTotal > 0 ? number_format($subTotal, 2) : 'Free' }}
                            </div>
                        </div>

                        

                        @if($subTotal > 0 && \Auth::check() && \Auth::user()->getRoleType() != 'VIP')
                            <div class="payment-method">
                                <h3 class="title">Payment Method</h3>

                                <!-- <div class="form-group">
                                    <input type="radio" name="paymentmethod" id="paymentmethod">
                                    <label for="cash" class="pymt">Cash Payment</label>
                                </div> -->

                                <div class="form-group">
                                    <input type="radio" name="paymentmethod" id="paymentmethod" value="razorpay" checked="">
                                    <label for="paymentmethod" class="pymt">Payment with Razorpay</label>
                                </div>
                            </div>

                            @if(\Auth::check())
                                <div class="coupon-container" style="border-top: 1px solid black;padding-top: 20px;margin-top: 30px;">

                                    @if( $appliedCoupon && $appliedCoupon->amount > 0)
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="coupon_code"> Gift Card</label>
                                                <input type="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" id="coupon_code" name="coupon_code" value="{{ $appliedCoupon->coupon_code }}" placeholder="Enter Gift Card Code" readonly>

                                                @error('coupon_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>&nbsp;</label>
                                                <input type="button" value="Remove" class="order-btn" style="border: 0px; border-radius: 0; background: var(--black-primary); color: var(--white-primary); text-transform: capitalize; font-size: 18px; padding: 8px 16px; width: 100%; text-align: center; display: block;" onclick="return removeCoupon(this)">
                                            </div>
                                        </div>
                                    @else

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="coupon_code"> Gift Card</label>
                                                <input type="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" id="coupon_code" name="coupon_code" value="{{ old('coupon_code', $row->coupon_code ?? '') }}" placeholder="Enter Gift Card Code">

                                                @error('coupon_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">&nbsp;</label>
                                                <input type="button" value="Apply" class="order-btn" style="border: 0px; border-radius: 0; background: var(--black-primary); color: var(--white-primary); text-transform: capitalize; font-size: 18px; padding: 8px 16px; width: 100%; text-align: center; display: block;" onclick="applyCoupon(this)">
                                            </div>
                                        </div>

                                    @endif
                                    <span class="coupon-message"> <strong></strong> </span>
                                </div>
                                @endif
                        @endif

                        <div class="placeorder">
                            <!-- <a href="javascript:void(0)" class="order-btn">Place Order ⟶</a> -->
                            <input type="submit" value="Place Order ⟶" class="order-btn">
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('scripts')
    <script type="text/javascript">

    $(document).ready(function(){
        
        getStates(null, 'country_id', 'state_id', '', <?php echo old( 'state_id', $row->state_id ?? 0 )?>);

    });

    function getStates(_this, source_id, target_id, title = '', selectedId = 0) {
        
        var country_id = $('#'+source_id).val();

        if(country_id == '2'){

	    	$(".other-country-cond").hide();
	    	$(".other-country-div").show();
	    	return false;

	    } else {
	    	$(".other-country-cond").show();
	    	$(".other-country-div").hide();
	    }

        if(country_id){
            $.ajax({
                type: "GET",
                url: "{{ url('states') }}/" + country_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select '+title+'</option>';
                        if(response.data.length) {
                            for (var i = 0; i < response.data.length; i++) {

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].state_name+'</option>';
                            }

                            $("#"+target_id).html(options);
                            // $("#"+target_id).selectpicker('refresh');

                            if(selectedId){
                                getCities(null, 'state_id', 'city_id', '', <?php echo old( 'city_id', $row->city_id ?? 0 )?>);
                            }
                        }
                    }
                }
            });
        } else {
            $("#"+target_id).html('<option value="">Select '+title+'</option>');
            // $("#"+target_id).selectpicker('refresh');
        }
    }

    function getCities(_this, source_id, target_id, title = '', selectedId = 0) {

        var state_id = $('#'+source_id).val();
        if (state_id){
            $.ajax({
                type: "GET",
                url: "{{ url('cities') }}/" + state_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select '+title+'</option>';
                        if(response.data.length){
                            for (var i = 0; i < response.data.length; i++) {

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].city_name+'</option>';
                            }

                            $("#"+target_id).html(options);
                            // $("#"+target_id).selectpicker('refresh');
                        }
                    }
                }
            });
        } else {
            $("#"+target_id).html('<option value="">Select '+title+'</option>');
            // $("#"+target_id).selectpicker('refresh');
        }
    }

    function requestOtp(_this) {

        var country_std_code    = $('#country_std_code').val();
        var contact             = $('#contact').val();
        var email               = $('#email').val();
        $("#otp-message strong").text('');
        // console.log("contact.length", contact.length);

        if(!country_std_code){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please select country code');
            // $(".otp-wrapper").hide();
            return false;

        } else if(!contact){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter whatsapp contact');
            // $(".otp-wrapper").hide();
            return false;

        } else if(contact.length < 8){
            
            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Invalid whatsapp contact');
            // $(".otp-wrapper").hide();
            return false;

        } else if(!email){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter email');
            // $(".otp-wrapper").hide();
            return false;

        } else {

            $("#otp-message strong").text('');
        }

        $.ajax({
            type: "POST",
            url: "{{ url('request-otp-on-whatsapp-checkout') }}",
            datatype: 'json',
            data: { country_std_code: country_std_code, contact: contact, email: email, referer: 'checkout' },
            beforeSend: function (){

                $(".otp-message-wrapper").find('.is-invalid').removeClass('is-invalid').addClass('is-valid');
                $(".otp-message-wrapper").find('.invalid-feedback').removeClass('invalid-feedback').addClass('valid-feedback');
                $(".otp-message-wrapper").show();
                $("#otp-message strong").text('OTP Sending...');
                // $(".otp-wrapper").hide();
            },
            success: function (response) {

                if(response?.status){
                    
                    $(".otp-message-wrapper").find('.is-invalid').removeClass('is-invalid').addClass('is-valid');
                    $(".otp-message-wrapper").find('.invalid-feedback').removeClass('invalid-feedback').addClass('valid-feedback');
                    $(".otp-message-wrapper").show();
                    // $(".otp-wrapper").show();

                } else {

                    if(response?.data == 'NO_ALLOWED'){

                        // $(".otp-wrapper").show();

                    } else if(response?.data != 'NO_NEED_OTP'){

                        $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
                        $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
                        // $(".otp-wrapper").hide();

                    } else {

                        $(".otp-message-wrapper").hide();
                    }
                }
                
                $("#otp-message strong").text(response?.message || 'Something went wrong!');
            }
        });
    }

    function applyCoupon(_this) {

        var coupon_code = $('#coupon_code').val();

        if (coupon_code){

            $.ajax({
                type: "GET",
                url: "{{ url('apply-coupon') }}/" + coupon_code,
                datatype: 'json',
                beforeSend: function (){
                    $(".coupon-message").removeClass('text-success text-danger').find('strong').text('');
                },
                success: function (response) {
                    if(response?.status){
                        $(".coupon-message").removeClass('text-success text-danger').addClass('text-success').find('strong').text(response?.message);

                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);

                    } else {
                        $(".coupon-message").removeClass('text-success text-danger').addClass('text-danger').find('strong').text(response?.message);
                    }
                }
            });
        } else {
            $(".coupon-message").removeClass('text-success text-danger').addClass('text-danger').find('strong').text("Please enter coupon code");
        }
    }

    function removeCoupon(_this) {

        if(!confirm('Are you sure?')){
            return false;
        }

        $.ajax({
            type: "GET",
            url: "{{ url('remove-coupon') }}/",
            datatype: 'json',
            success: function (response) {
                if(response?.status){
                    $(".coupon-message").removeClass('text-success text-danger').addClass('text-success').find('strong').text(response?.message);

                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);

                } else {
                    $(".coupon-message").removeClass('text-success text-danger').addClass('text-danger').find('strong').text(response?.message);
                }
            }
        });
       
    }

    </script>
@endpush