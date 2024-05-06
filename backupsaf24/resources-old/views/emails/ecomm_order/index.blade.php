@component('mail::message')

Dear {{ $data['user']->name ?? 'N/A' }},<br>


Thank you for Order with us!<br>
We hope these little moments turn out to be big memories for you.<br><br>
Your itinerary for the Serendipity Arts Festival is as follows:<br> 

@if($data['orderDetail']->count())
@foreach($data['orderDetail'] as $key => $value)
Product Name: {{ $value->product_name ?? 'N/A' }} <br>
Product Price: {{ $value->product_price ?? 'N/A' }} <br>
Product Size: {{ $value->product_size ?? 'N/A' }} <br>
Product Total Amount: {{ $value->product_total_amount ?? 'N/A' }} <br><br><br>
@endforeach
@endif

Thank you,<br>
Team Serendipity Arts Festival

@endcomponent
