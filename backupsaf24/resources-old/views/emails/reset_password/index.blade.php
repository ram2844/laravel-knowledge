@component('mail::message')

Dear {{$user->name}},

We got a request to reset your password.



@component('mail::button', ['url' => $user->reset_url])
    Reset Password
@endcomponent


	
This password reset link will expire in 60 minutes.
If you did not request a password reset, no further action is required.


Thank you,<br>
Team Serendipity Arts Festival

@endcomponent
