<?php 

return [
	'master_statuses'	=>	array(
		0	=>	'Inactive',
		1	=>	'Active',
	),
	'payment_statuses'	=>	array(
		'PENDING'	=>	['title' => 'Pending', 'class' => ' label-light-info'],
		'PROCESSING'	=>	['title' => 'Processing', 'class' => ' label-light-warning'],
		'SUCCESS'	=>	['title' => 'Success', 'class' => ' label-light-success'],
		'FAILED'	=>	['title' => 'Failed', 'class' => ' label-light-danger'],
	),
	'order_statuses'	=>	array(
		'PENDING'	=>	['title' => 'Pending', 'class' => ' label-light-info'],
		'PROCESSING'	=>	['title' => 'Processing', 'class' => ' label-light-warning'],
		'SUCCESS'	=>	['title' => 'Success', 'class' => ' label-light-success'],
		'FAILED'	=>	['title' => 'Failed', 'class' => ' label-light-danger'],
	),
	
];