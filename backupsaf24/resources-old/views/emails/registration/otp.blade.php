@component('mail::message')

Dear {{$user->name}},<br>

Greetings from SerendipityArts Festival !<br> 

Please use the OTP {{$user->otp}} to proceed.<br>

Regards,<br>
Team Serendipity

@endcomponent
