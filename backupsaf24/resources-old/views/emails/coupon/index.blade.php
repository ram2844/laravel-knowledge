@component('mail::message')

Dear {{ $data['user']->name ?? 'N/A' }},<br>

Greetings from SerendipityArts Festival !<br> 

Please use the Coupon {{ $data['coupon']->coupon_code ?? 'N/A' }} on checkout for discount.<br>

Regards,<br>
Team Serendipity

@endcomponent
