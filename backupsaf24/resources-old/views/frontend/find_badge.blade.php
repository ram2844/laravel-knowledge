@extends('layouts.app')
@section('content')
<section class="saf-loginpage">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <h1 class="main-title">Your M-Ticket</h1>
	            <p style="text-align: center; font-size: 20px;">Show this M-Ticket at the time of entry</p>

	            @include('includes.common.error')
	            @include('flash::message')

            	<form class="loginfrm" method="POST" action="{{ route('find.badge.submit') }}">
                    @csrf
	                <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="type your email" value="{{ old('email', '') }}" required autocomplete="email">
	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	              
	                <div class="form-group">
	                    <label for="contact">contact</label>
	                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="type your contact" required autocomplete="new-contact" value="{{ old('contact', '') }}">

	                    @error('contact')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	           
	                <div class="form-group cntr">
	                    <input type="submit" value="Download M-Ticket &LongRightArrow;">
	                </div>
	            </form>
	        </div>
	    </div>

	    
	</div>
</section>

@endsection
