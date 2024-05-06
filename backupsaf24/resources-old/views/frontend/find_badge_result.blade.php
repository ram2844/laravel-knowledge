@extends('layouts.app')
@section('content')
<section class="saf-loginpage">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6 text-center">
	            <h1 class="main-title">Your M-Ticket</h1>
	            <p style="text-align: center; font-size: 20px;">Show this M-Ticket at the time of entry</p>

	            @if($user)

		            @if($user->badge)
		            	<a style="font-size: 18px;" href="{{ $user->badge }}" target="_blank" download>Download Badge</a>
		            	<br>
		            	<br>
		            	<img src="{{ $user->badge }}" class="img-fluid">

	            	@else

	            	<p class="text-danger">Account exist but badge not available.</p>

	            	@endif

            	@else

            	<p class="text-danger">No account exist.</p>

            	@endif
            	
	        </div>
	    </div>
	</div>
</section>

@endsection
