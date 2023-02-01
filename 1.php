<?php
$data = [
  [
		"firstName" => "Kimberly", 
		"lastName" => "Robinson",
		"placeEmploy" => "USA",
		"residence"=> "USA",
		"salary"=> 7000
	],
	
	[
		"firstName" => "Raymond", 
		"lastName" => "Hughes",
		"placeEmploy" => "UK",
		"residence"=> "UK",
		"salary"=> 5000
	],

	[
		"firstName" => "Oscar", 
		"lastName" => "Bell",
		"placeEmploy" => "Japan",
		"residence"=> "Singapore",
		"salary"=> 4000
	],

	[
		"firstName" => "Richard", 
		"lastName" => "Evans",
		"placeEmploy" => "Poland",
		"residence"=> "Singapore",
		"salary"=> 5000
	],

	[
		"firstName" => "Helen", 
		"lastName" => "Harris",
		"placeEmploy" => "UK",
		"residence"=> "USA",
		"salary"=> 6000
	],

	[
		"firstName" => "Kouto", 
		"lastName" => "Kamio",
		"placeEmploy" => "Japan",
		"residence"=> "Poland",
		"salary"=> 8000
	],

	[
		"firstName" => "Jack", 
		"lastName" => "Isaque",
		"placeEmploy" => "USA",
		"residence"=> "USA",
		"salary"=> 8000
	]
];

function getByResidence($place) {

	$arrFilter = array_filter($GLOBALS['data'], function($x) use (&$place) { 
		return $x['residence'] == $place; 
	});
	print_r($arrFilter);
}

function getBySalary($sal) {
	
	$arrFilter = array_filter($GLOBALS['data'], function($x) use (&$sal) { 
		return $x['salary'] > $sal; 
	});
	print_r($arrFilter);
}

function getByHighSalary() {

	$maxSal = array_reduce($GLOBALS['data'], function($res, $val) { return $res > $val['salary'] ? $res : $val['salary']; }, 0);
	$arrFilter = array_filter($GLOBALS['data'], function($x) use (&$maxSal) { 
		return $x['salary'] == $maxSal; 
	});
	print_r($arrFilter);
}

function getAveBySalary() {

	$maxSal = array_reduce($GLOBALS['data'], function($res, $val) { return $res + $val['salary']; }, 0);
	echo $maxSal / sizeof($GLOBALS['data']);
}

getByResidence("USA");
echo "<br>";
getBySalary(5000);
echo "<br>";
getByHighSalary();
echo "<br>";
getAveBySalary();
?>
