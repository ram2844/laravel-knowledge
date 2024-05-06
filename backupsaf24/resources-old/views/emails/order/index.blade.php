@component('mail::message')

Dear {{ $data['user']->name ?? 'N/A' }},<br>


Thank you for curating your calendar with us!<br>
We hope these little moments turn out to be big memories for you.<br><br>
Your itinerary for the Serendipity Arts Festival is as follows:<br> 

@if($data['orderDetail']->count())
@foreach($data['orderDetail'] as $key => $value)
Event Name: {{ $value->program_name ?? 'N/A' }} <br>
Venue: {{ $value->programDetail->venue->title ?? 'N/A' }} <br>
Date: {{ $value->program_date ? date('d M', strtotime($value->program_date)) : 'N/A' }} <br>
Time: {{ $value->program_from_time ? date('h:i A', strtotime($value->program_from_time)) : 'N/A' }} - {{ $value->program_to_time ? date('h:i A', strtotime($value->program_to_time)) : 'N/A' }}<br><br>
@endforeach
@endif

Thank you,<br>
Team Serendipity Arts Festival

@endcomponent
