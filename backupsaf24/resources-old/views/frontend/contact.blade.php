@extends('layouts.app')
@section('content')

<section class="saf-contactpage">
	<div class="container">
	    <div class="row">
	    	@include('flash::message')

	        <div class="col-md-8">
	            <h1 class="main-title">Contact Us</h1>
	            <p class="sub-title">Shoot any queries you may have or send us your feedback!</p>
	            <form class="cntfrm" action="{{ route('contact.submit') }}" method="post">
	            	@csrf()
	                <div class="form-group">
	                    <label for="fullname">full name</label>
	                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="" value="{{ old('name') }}">

	                    @error('name')
	                        <div class="invalid-feedback">{{ $message }}</div>
	                    @enderror

	                </div>
					<div class="form-group">
	                    <label for="contactnumber">contact number</label>
	                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" required="" value="{{ old('contact') }}">
	                    @error('contact')
	                        <div class="invalid-feedback">{{ $message }}</div>
	                    @enderror
	                </div>
					<div class="form-group">
	                    <label for="email">email id</label>
	                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required="" value="{{ old('email') }}">
	                    @error('email')
	                        <div class="invalid-feedback">{{ $message }}</div>
	                    @enderror
	                </div>

	                <div class="form-group">
	                    <label for="country">Message</label>
	                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" rows="4" name="message" required="" value="{{ old('message') }}"></textarea>
	                    @error('message')
	                        <div class="invalid-feedback">{{ $message }}</div>
	                    @enderror
	                </div>

	                <div class="form-group">
	                	
	                    {!! htmlFormSnippet() !!}

	                    @error('recaptcha')
	                        <div class="invalid-feedback">{{ $message }}</div>
	                    @enderror
	                </div>

	                <div class="form-group">
	                    <input type="submit" value="Submit ⟶">
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</section>

@endsection