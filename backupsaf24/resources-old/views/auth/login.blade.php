@extends('layouts.app')
@section('content')
<section class="saf-loginpage">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <h1 class="main-title">Login</h1>
            	<form class="loginfrm" method="POST" action="{{ route('login') }}">
                    @csrf
	                <div class="form-group">
	                    <label for="email">username</label>
	                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="type your username" value="{{ old('email') }}" required autocomplete="email">
	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	              
	                <div class="form-group">
	                    <label for="password">password</label>
	                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="type your password" required autocomplete="new-password">

	                    @error('password')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror

	                    <a href="{{route('password.request')}}" class="frg-btn">Forgot password?</a>
	                </div>
	           
	                <div class="form-group cntr">
	                    <input type="submit" value="login &LongRightArrow;">
	                </div>
	            </form>
	        </div>
	    </div>

	    <div class="row justify-content-center">
	        <div class="col-md-6">
	            <!-- <div class="social-link">
	                <p>or sign up using</p>
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div> 
	            </div> -->

	            <div class="rgtr-link">
	                <p>Don't have an account? <a href="{{route('register')}}">Register now</a></p>
	            </div>
	        </div>
	    </div>
	</div>
</section>

@endsection
