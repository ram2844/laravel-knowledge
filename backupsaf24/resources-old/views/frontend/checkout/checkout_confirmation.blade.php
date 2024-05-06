@extends('layouts.app')

@section('content')
<section class="confirmpage">
	<div class="container">
	    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="message-card">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                        <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                    </svg>
                    <h1 class="title green">Order Placed Successfully</h1>
                    <p class="desc">Thank You, Your order has been received</p>
                    <a href="{{ url('/') }}">Continue...</a>
                </div>

                <!-- <div class="message-card">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                        <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                        <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                    </svg>
                    <h1 class="title red">Something Went Wrong !</h1>
                    <p class="desc">Your order process failed, please try again</p>
                    <a href="{{url('/')}}">Continue...</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection     
