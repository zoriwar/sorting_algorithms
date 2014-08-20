<?php


set_time_limit( 600 );

// Time to sort 10000 items was 105.476628065 seconds

function select_sort($array) {
	$start = microtime(true);
	for ($boundary = 0; $boundary<count($array);$boundary++) {
		$min = $array[$boundary];
		$min_index = $boundary;
		for ($i = $boundary; $i< count($array); $i++ ) {
			if ($array[$i] < $min) {
				$min = $array[$i];
				$min_index = $i; }    }
		$array[$min_index] = $array[$boundary];
		$array[$boundary]=$min; }
	$end = microtime(true);
	$diff = $end - $start;
	echo "For " . count($array) . " elements, this algorithm takes " . $diff . " seconds";
	return $array; }
	


$random_array = [];
for ($k=0; $k<1000; $k++) {
	$random_array[] = rand(0, 10000);
}
var_dump($random_array);
var_dump(select_sort($random_array));



	





?>