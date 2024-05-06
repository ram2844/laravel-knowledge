@extends('layouts.app')
@section('content')
<section class="saf-loginpage">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <div class="pb-13 pt-lg-0 pt-5 text-center">
                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                    <span class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password
                </div>

            	<form class="loginfrm" method="POST" action="{{ route('password.email') }}">
            		
		            @if (session('status'))
	                    <div class="alert alert-success" role="alert">
	                        {{ session('status') }}
	                    </div>
	                @endif
                    @csrf
	                <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	           
	                <div class="form-group cntr">
	                    <input type="submit" value="Submit &LongRightArrow;">
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</section>

@endsection
