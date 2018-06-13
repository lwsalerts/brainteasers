<?php 

/**
 * Print all possible combination of brackets by a given number
 * for eg.
 *
 * for N = 2 
 * (()), ()()
 *
 * for N = 3
 * ((())), (()()), ()()()
 */
function bracketCombination(int $number)
{
	for($i = 0; $i < $number; $i++){
		echo '(';		
	}
}


bracketCombination(2);
