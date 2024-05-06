@extends('layouts.app')
@section('content')
<section class="saf-loginpage">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <div class="pb-13 pt-lg-0 pt-5 text-center">
                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Reset Password</h3>
                </div>

            	<form class="loginfrm" method="POST" action="{{ route('password.update') }}">
            		
		            @if (session('status'))
	                    <div class="alert alert-success" role="alert">
	                        {{ session('status') }}
	                    </div>
	                @endif
	                
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
	                <div class="form-group">
	                    <label for="email">E-Mail Address</label>
	                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>

	                <div class="form-group">
	                    <label for="password">password</label>
	                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" required autocomplete="new-password">

	                    @error('password')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror

	                </div>

	                <div class="form-group">
	                    <label for="confirm-password">Confirm password</label>
	                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirm-password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

	                    @error('password_confirmation')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	           
	                <div class="form-group cntr">
	                    <input type="submit" value="Reset Password &LongRightArrow;">
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</section>

@endsection
