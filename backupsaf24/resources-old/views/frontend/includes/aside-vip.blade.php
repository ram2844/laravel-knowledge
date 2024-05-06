<ul class="dashmenu">
	<li> 
		<a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt" aria-hidden="true"></i> My Account</a>
	</li>
	<li> 
		<a href="{{ route('profile') }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>
	</li>
	<li> 
		<a href="{{ route('order.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> My Booking</a>
	</li>
	<li> 
		<a href="{{ route('wishlist.index') }}"><i class="fa fa-heart" aria-hidden="true"></i> My Wishlist</a>
	</li>
	<li> 
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
		<form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;"></form>
	</li>
</ul>