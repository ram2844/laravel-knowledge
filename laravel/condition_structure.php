<!-- echo string -->
{{"hello"}}

<!-- echo variable -->
{{$variable}}

<!-- echo html and js -->
{!! "<h1>Hello</h1>" !!}

<!-- php code  -->
@php
	code 
@endphp

<!-- comment -->
{-- comment --}


<!-- if condition -->
@if(condition)
   //statement
@else if(condition)
	 //statement
@else
	 //statement
@endif

<!-- switch case -->
@switch($a)
	@case(1)
		first case
	@break

	@case(2)
		second case
	@break

	@default
		default case
@endawitch

<!-- isset() -->
@isset($var)
	 //The var is difine and is not null.
@endisset

<!-- empty() -->
@empty($var)
	 //The var is empty.
@endempty

<!-- for loop -->
@for ($i=0; $i < ; $i++)
	// the value is {{$i}}
@endfor

<!-- foreach loop -->
@foreach ($users as $value)
	// <p>the value is {{$value}}</p>
@endforeach

<!-- while loop -->
@while (condition)
	// <p>loop statement</p>
@endwhile

<!-- forelse loop -->
@forelse ($users as $value)
	// <p>the value is {{$value}}</p>
@empty
	<p>No value</p>
@endforelse

<!-- continue condition -->
@continue

<!-- break condition -->
@break

<?php
	
?>