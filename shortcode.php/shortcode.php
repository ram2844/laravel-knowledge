<?php
->orderBy('created_at', 'desc') ==  ->latest()
->orderBy('age', 'desc') ==  ->latest('age')
->select('id', 'name')->get() ==  ->get(['id', 'name'])
$request->has('value') ? $request->value : 'defaults' == $request->get('value', 'defaults')
?>