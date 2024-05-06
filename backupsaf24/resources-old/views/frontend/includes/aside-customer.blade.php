 <div class="sidebar">
	<div class="sideborderline"></div>
	<div class="profile">
		<div class="txt-img">
			<div class="name">
				@php

					$userName = \Auth::user()->name;

					$userNameArr = explode(' ', $userName);

				@endphp

				<span class="first-name">{{ $userNameArr[0][0] ?? '' }}</span>
				<span class="last-name">{{ $userNameArr[1][0] ?? '' }}</span>
			</div>
		</div>
		<h3 class="title">{{ $userName }}</h3>
		<p class="desg">{{ \Auth::user()->getRoleType(true) }}</p>
	</div>
	<ul class="dashmenu">
		<li> 
			<a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt" aria-hidden="true"></i> My Account</a>
		</li>
		<li> 
			<a href="{{ route('profile') }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>
		</li>
		<li> 
			<a href="{{ route('addresses.index') }}"><i class="fa fa-edit" aria-hidden="true"></i> My Addresses</a>
		</li>
		<li> 
			<a href="{{ route('order.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> My Calendar</a>
		</li>

		@if(\Auth::user()->getRoleType() == 'MEDIA')
			<li> 
				<a href="{{ route('media.booking.create') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Media Booking Slot</a>
			</li>
			<li> 
				<a href="{{ route('media.bookings.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>My Media Bookings</a>
			</li>
		@endif
        @if(\Auth::user()->getRoleType() == 'VOLUNTEER')
			<li> 
				<a href="{{ route('volunteer.banking.edit') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>Banking Details</a>
			</li>
		@endif
        
		<li> 
			<a href="{{ route('wishlist.index') }}"><i class="fa fa-heart" aria-hidden="true"></i> My Wishlist</a>
		</li>
		<li> 
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
			<form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;"></form>
		</li>
	</ul>
</div>