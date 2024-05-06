@extends('layouts.app')

<style type="text/css">

    .address-wrapper {
        border: 1px solid #e0e0e0;
        border-top: 0;
        position: relative;
    }

    .address-wrapper:first-child {
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

<section class="saf-checkout">
    <div class="container">

        <form class="checkoutfrm" method="POST" action="{{ route('ecomm.checkout.submit') }}">
            @csrf()
            <div class="row">
                <div class="col-7">
                    
                    @include('flash::message')
                    @include('includes.common.error')

                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="billing-title">Address Details</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('create.address') }}" class="btn btn-success btn-sm">Add Address</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="bold">Billing Details</h5>
                        </div>
                        @if($userAddresses->count())
                            @foreach($userAddresses as $key => $value)
                                <div class="col-md-12">
                                    <div class="address-wrapper">
                                        <div class="address-box">
                                            <div class="row">

                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <input type="radio" name="billing_address_id" value="{{ $value->id }}" {{ $key == 0 ? 'checked' : '' }}>
                                                    </div>
                                                </div>

                                                <div class="col-md-10">
                                                    <p><b>{{$value->name}} {{$value->contact}} </b></p>
                                                    <p>{{$value->address}}, {{$value->locality}}, {{$value->city->city_name ?? 'N/A'}}, {{$value->state->state_name ?? 'N/A'}} - {{$value->pincode}}</p>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('edit.address', ['id' => $value->id]) }}"> <i class="fa fa-edit"></i> </a><br><br>
                                                    
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

                    <div class="row mt-10">
                        <div class="col-md-12">
                            <h5 class="">Shipping Details</h5>
                        </div>
                        @if($userAddresses->count())
                            @foreach($userAddresses as $key => $value)
                                <div class="col-md-12">
                                    <div class="address-wrapper">
                                        <div class="address-box">
                                            <div class="row">

                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <input type="radio" name="shipping_address_id" value="{{ $value->id }}" {{ $key == 0 ? 'checked' : '' }}>
                                                    </div>
                                                </div>

                                                <div class="col-md-10">
                                                    <p><b>{{$value->name}} {{$value->contact}} </b></p>
                                                    <p>{{$value->address}}, {{$value->locality}}, {{$value->city->city_name ?? 'N/A'}}, {{$value->state->state_name ?? 'N/A'}} - {{$value->pincode}}</p>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('edit.address', ['id' => $value->id]) }}"> <i class="fa fa-edit"></i> </a><br><br>
                                                    
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

                <div class="col-5">
                    <div class="checkout-sidebar">
                        <h3 class="sidebar-title">Curated Experience</h3>

                        @php
                            $subTotal = 0;
                        @endphp

                        @if(isset($carts) && !empty($carts))
                            @foreach($carts as $key => $cart)

                                @php
                                    $subTotal += ($cart['product']->product_price * ($cart['qty'] ?? 1));
                                @endphp

                                <div class="product-details">
                                    <div class="product-name">{{ $cart['product']->product_name ?? 'N/A' }} ({{ $cart['productDetails']->size_name ?? 'N/A' }})</div>
                                    <div class="product-price">{{ number_format($cart['product']->product_price, 2) }} X {{ $cart['qty'] ?? 1 }}</div>
                                </div>
                            @endforeach
                        @endif

                        <div class="product-total">
                            <div class="title">Total Amount</div>
                            <div class="total-price">
                                {{ $subTotal > 0 ? number_format($subTotal, 2) : 'Free' }}
                            </div>
                        </div>

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
    
</script>
@endpush