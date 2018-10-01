<?php
	$arraySize = rand(10,60);
	$array = [];
	
	for ($i = 0; $i < $arraySize; $i++) {
		$array[$i] = rand(1,100);	
	}
	
	$sum = 0;
	for ($i = 0; $i < $arraySize; $i++) {
		$sum += $array[$i];	
	}
	
	$average = $sum/$arraySize;
	
	echo "<p>Average: ".$average."</p>";
	
	$parts = $arraySize/3;

	if (is_float($parts)) {
		$table12Size = ceil($parts);
	} else {
		$table12Size = $parts;
	}	
	
	function difference($item, $avg) {
		return intval(round($item - $avg,0, PHP_ROUND_HALF_UP));
	}
	
	$table = "<div class='column1' style='float: left'>";
	
	for ($i = 0; $i < $table12Size; $i++) {
		$number = difference($array[$i], $average);
		if (($number % 2) == 0) {
			$table .= "<div style='background-color: green; padding:5px;'>".$number."</div>";
		} else {
			$table .= "<div style='background-color: red; padding:5px;'>".$number."</div>";
		}
	}
	
	$table .= "</div><div class='column2' style='float: left'>";

	for ($i = $table12Size; $i < 2*$table12Size; $i++) {
		$number = difference($array[$i], $average);
		if (($number % 2) == 0) {
			$table .= "<div style='background-color: green; padding:5px;'>".$number."</div>";
		} else {
			$table .= "<div style='background-color: red; padding:5px;'>".$number."</div>";
		}
	}	
	
	$table .= "</div><div class='column3' style='float: left'>";
	
	for ($i = 2*$table12Size; $i < $arraySize; $i++) {
		$number = difference($array[$i], $average);
		if (($number % 2) == 0) {
			$table .= "<div style='background-color: green; padding:5px;'>".$number."</div>";
		} else {
			$table .= "<div style='background-color: red; padding:5px;'>".$number."</div>";
		}
	}
	
	$table .= "</div>";
	
	echo "<p>Fibonacci: ".fib($array[$arraySize-1])."</p>";
	
	echo $table;
	
	function fib($n) {
		static $cache;

		if ($n < 0) {
			return NULL;
		} elseif ($n === 0) {
			return 0;
		} elseif ($n === 1 || $n === 2) {
			return 1;
		} else {
			if (!(!is_null($cache) && array_key_exists($n, $cache))) {
				$cache[$n] = fib($n-1) + fib($n-2);
			}
			return $cache[$n]; 
		} 	
	}
?>