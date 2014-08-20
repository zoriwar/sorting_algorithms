<?php

set_time_limit( 180 );

// Time to sort 10000 items was 22.050992012 seconds

function dbl_select($array) {
	$start = microtime(true);
	$lower = 0;
	$upper = count($array)-1;
	$check = 0;

	while ($lower < $upper) {
		$min = $array[$lower];
		$max = $array[$upper];
		$min_index = $lower;
		$max_index = $upper;

		for ($i = $lower; $i < $upper; $i++) {
				if ($array[$i] < $min) {
					$min = $array[$i];
					$min_index = $i; }
					
				if ($array[$i] > $max) {
					$max = $array[$i];
					$max_index = $i; } 
		}
		$array[$min_index] = $array[$lower];
		$array[$lower] = $min;
		$array[$max_index] = $array[$upper];
		$array[$upper] = $max;
		$lower += 1;
		$upper -= 1;
		}
	$end = microtime(true);
	echo "processing time for " . count($array) . " elements is: " . ($end-$start);
	return $array;

}
$random_array = [];
for ($k=0; $k<10000; $k++) {
	$random_array[] = rand(0, 10000);
}


// var_dump($random_array);
dbl_select($random_array);



	

?>