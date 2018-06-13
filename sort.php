<?php 

class HeapSort
{
	public function __invoke($array)
	{
		$sortedArray = [];

		//argument we pass must be the rest of the unsorted array
		while(sizeof($array)){
			$array = $this->heap($array);
			$sortedArray[] = array_shift($array);
		}

		return $sortedArray;
	}

	/**
	 * makes the first element in the array as smallest
	 */
	public function heap($array)
	{
		foreach ($array as $key => $value) {
			if($array[0] > $value ){
				$this->swap($array ,0, $key);
			}
		}
		return $array;
	}

	/**
	 * swap indexes
	 */
	private function swap(&$array ,$index1, $index2)
	{
		$temp = $array[$index1];
		$array[$index1] = $array[$index2];
		$array[$index2] = $temp;
	}

}


class QuickSort
{
	public function sort($array)
	{
		
		if(sizeof($array) <= 1){
			return $array;
		}

		//find a pivot
		$pivot = array_shift($array);
		
		$lte = [];
		$gt = [];
		//split array into two parts, one with greater than pivot and one with less than equal to pivot
		foreach ($array as $key => $value) {
			
			if($value <= $pivot) {
				$lte[] = $value;	
			}else{
				$gt[] = $value;	
			}

		}

		return array_merge($this->sort($lte),[$pivot],$this->sort($gt));
	}
}


function segregateBoolean($array)
{
	$noOfZeroes = noOfZeroes($array);
	
	$segArray = [];

	//another foreach to form an array
	foreach ($array as $key => $element) {
		if($key < $noOfZeroes){
			$segArray[] = 0;
			continue;
		}
		$segArray[] = 1;
	}

	return $segArray;
}

function noOfZeroes($array){

	$noOfZeroes = 0;
	
	//count number of zeros, return the array with that many number of zeros
	foreach ($array as $element) {
		if(!$element){
			$noOfZeroes++;
		}
	}
	return $noOfZeroes;
}


function segregateBooleanInOneLoop($array)
{
	$left = 0;
	$right = count($array) - 1;

	while($left < $right){

		//increment left
		while( $array[$left] == 0 && $left < $right){
			$left++;
		}

		//decrement right
		while( $array[$right] == 1 && $left < $right){
			$right--;
		}

		//swap left and right
		if($left < $right){
			$array[$left] = 0;
			$array[$right] = 1;
		}

	}
	return $array;
}


var_dump(segregateBooleanInOneLoop([0,0,0,0,1,1,0,1,1,1,0,1,0,1,0,1]));

// var_dump(segregateBoolean([0,0,0,1,1,1,0,1,0,1]));

// var_dump((new QuickSort)->sort([2,1,3,4,56,2,3,4, 120,54, 90,0,-98]));

// $a = new HeapSort;
// var_dump($a([90,54,3,2,88,45,0,-2]));
// var_dump((new HeapSort)->sort([7,4,3,4,5,6,7]));
// 

// var_dump((new HeapSort([]))->heap([9,2,3,4,5,6,7]));
