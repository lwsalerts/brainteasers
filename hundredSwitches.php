<?php 

/**
 * there are hundred bulbs in a room. All bulbs are off initially. You are asked to make 100 passes through them,
 * in such a manner that during ith pass all switches that are multiples of i should be toggled(on to off and off to on).
 *
 * After completing 100 passes through the switches how many bulbs are on? what are their numbers(indexes) ?
 */

function hundredBulbs()
{
	// create an array with 100 0's
	$array = getArray(100);

	
	//passing 100 times
	for($pass = 1; $pass<=100; $pass++){

		// looping the array (indicates 1 pass)
		foreach ($array as $key => $value) {
			$index = $key+1;
			// check if current bulb is divisible by i
			if(isDivisibleByGivenNumber($index, $pass)){
				
				// toggle it
				$array[$key] = !$value;
			}
		}	
	}

	
	printIndexesOfOnSwitchesAndCount($array);
	 
	// after loop ends check if the positions at which 1's are there
}

function printIndexesOfOnSwitchesAndCount($array){

	$count = 0;
	
	foreach ($array as $key => $value) {
		if($value){
			$count++;
			echo ($key + 1)."\n" ;
		}
	}

	echo "total number of bulbs that are on are : ".$count;
}


function isDivisibleByGivenNumber(int $number, int $divisor){
	if($number % $divisor == 0){
		return true;
	}
	return false;
}

function getArray(int $numberOfElements){
	return array_fill(0, $numberOfElements, 0);
}


function hundredBulbsTheMathsWay()
{
	//numbers with odd number of divisors, will be in on state. which only happens with perfect squares
	$array = getArray(100);

	$count = 0;

	foreach ($array as $key => $value) 
	{
		$index = $key + 1;
		if(sqrt($index) == (int)(sqrt($index))){
			$count++;
			echo "$index\n";
		}
	}
	echo "total number of bulbs that are on are : ".$count;
}

hundredBulbs();
hundredBulbsTheMathsWay();