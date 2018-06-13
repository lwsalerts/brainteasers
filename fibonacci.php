<?php 

function fibonacci($number)
{
	if(!is_int($number) || $number < 1){
		return [];
	}

	$fibonacci = [];
	
	//loop over the number, add numbers
	for($i = 1; $i <= $number; $i++){
		
		$fibonacciSum = $i * ($i + 1) / 2;

		array_push($fibonacci, $fibonacciSum);
		
		// yield $i * ($i + 1) / 2;
		
	}	

	// return;
	return $fibonacci;
}

$t1 = microtime(true);

$a = fibonacci(2000000);

foreach ($a as $value) {
	echo "$value\n";
}

$t2 = microtime(true);

echo $t2 - $t1;