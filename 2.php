<?php
$firstArray = array("field1" => "first", "field2" => "second", "field3" => "third");
$secondArray = array("field1value" => "dinosaur", "field2value" => "pig", "field3value"
=> "platypus");

$output = array();
array_map(function($key, $val) use (&$firstArray) {
	$k = substr($key, 0, -5);
	if(in_array($k, array_keys($firstArray))) {
		$GLOBALS['output'][$firstArray[$k]] =  $val;
	}
}, array_keys($secondArray), $secondArray);
print_r($output);
?>
