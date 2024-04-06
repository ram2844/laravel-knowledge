<?php
->orderBy('created_at', 'desc') ==  ->latest()
->orderBy('age', 'desc') ==  ->latest('age')
->select('id', 'name')->get() ==  ->get(['id', 'name'])
$request->has('value') ? $request->value : 'defaults' == $request->get('value', 'defaults')



// <!-- Get random number id -->

public function newId()
{
	$id = Str::random(24);
}

// get more than max limit data (100+ data) 

$data == Models::get();

$this->chunk(100, function($data)){
	foreach ($data as $value) {
		//Your code 
	}
}

?>