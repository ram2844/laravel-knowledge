@component('mail::message')

Dear {{$user->first_name}} {{$user->last_name}},

Your volunteer application has been successfully submitted to Serendipity Arts Festival. We will contact you regarding the selection process soon. Stay tuned for further updates!

Thank you,<br>
Team Serendipity Arts Festival

@endcomponent
