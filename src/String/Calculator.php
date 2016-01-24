<?php


namespace String;


class Calculator
{

	public static function add($numbers)
	{
		if (empty($numbers)) {
			return 0;
		}
		$numbers = explode(',', $numbers);

		$sum=0;
		foreach($numbers as $number) {
			$sum+= intval($number);
		}
		return $sum;
	}
}