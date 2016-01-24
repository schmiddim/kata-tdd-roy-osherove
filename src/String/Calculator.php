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
		$sum = 0;
		foreach ($numbers as $number) {
			$sum += intval($number);
		}
		return $sum;
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
		$numbers = explode($delimiter, $numberString);
		$sum = 0;
		foreach ($numbers as $number) {
			$sum += intval($number);
		}

		return $sum;
	}
}