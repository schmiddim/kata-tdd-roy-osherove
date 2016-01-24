<?php


namespace String;


class Calculator
{

	const PATTERN_ADD_WITH_DELIMITER = '/\/\/.*\\n/';

	public static function add($numbers)
	{
		if (empty($numbers)) {
			return 0;
		}

		$numbers = preg_split('/,|\n/', $numbers);
		$negatives = self::getNegativeValuesFromArray($numbers);
		if (count($negatives) > 0) {
			$message = 'negatives not allowed ';
			$message .= implode(', ', $negatives);
			throw new \Exception($message);
		}
		$sum = 0;
		foreach ($numbers as $number) {
			$number = intval($number);
			if($number > 1000){
				continue;
			}
			$sum += $number;
		}
		return $sum;
	}

	public static function getNegativeValuesFromArray($array)
	{
		$negatives = array();
		foreach ($array as $number) {
			$number = intval($number);
			if ($number < 0) {
				$negatives [] = $number;
			}
		}
		return $negatives;
	}

	/**
	 * //[delimiter]\n[numbers…]
	 * @param $numberStringWithDirective
	 */
	public static function addWithDelimiter($numberStringWithDirective)
	{

		$matches = array();
		preg_match(self::PATTERN_ADD_WITH_DELIMITER, $numberStringWithDirective, $matches);

		if (0 == count($matches)) {
			return self::add(str_replace(';', ',', $numberStringWithDirective));
		}
		$delimiter = trim(str_replace(['//', "\n"], '', $matches  [0]));

		$numberString = preg_replace(self::PATTERN_ADD_WITH_DELIMITER, '', $numberStringWithDirective);
		$numberString = str_replace($delimiter, ',', $numberString);

		return self::add($numberString);

	}
}