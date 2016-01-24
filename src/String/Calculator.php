<?php


namespace String;


class Calculator
{

	const PATTERN_ADD_WITH_DELIMITER = '/\/\/.*\\n/';
	const PATTERN_ADD_WITH_MULTIPLE_DELIMITERS = '/\/\/(\[.*\]){1,}\\n/';

	public static function add($numbers)
	{
		if (empty($numbers)) {
			return 0;
		}
		$numbers = self::getNormalizedString($numbers);

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
			if ($number > 1000) {
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
	 * return 1,2,3,n
	 * @param $string
	 */
	public static function getNormalizedString($string)
	{
		$matchesForSimplePattern = array();
		$matchesForMultipleDelimiters = array();
		preg_match(self::PATTERN_ADD_WITH_DELIMITER, $string, $matchesForSimplePattern);
		$multipleDelimiterMatches = preg_match_all(self::PATTERN_ADD_WITH_MULTIPLE_DELIMITERS, $string, $matchesForMultipleDelimiters);


		if ($multipleDelimiterMatches > 0) {
			$delimiter = trim(str_replace(['//', '[', ']'], '', $matchesForSimplePattern  [0]));
			$numberString = preg_replace(self::PATTERN_ADD_WITH_DELIMITER, '', $string);
			$numberString = str_replace($delimiter, ',', $numberString);
			return $numberString;
		} else if (count($matchesForSimplePattern) > 0) {
			$delimiter = trim(str_replace(['//', "\n"], '', $matchesForSimplePattern  [0]));
			$numberString = preg_replace(self::PATTERN_ADD_WITH_DELIMITER, '', $string);
			$numberString = str_replace($delimiter, ',', $numberString);
			return $numberString;

		} else {
			return str_replace(';', ',', $string);

		}

	}
}