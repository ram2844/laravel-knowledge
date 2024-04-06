<?php 

// Print Query Type 1

public function index()
{
	$data = User::where('name', 'Ram')->toSql();
	dd($data);
}


// Print Query Type 2

public function index()
{
	$data = User::where('name', 'Ram')->dd();
	dd($data);
}

?>