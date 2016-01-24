<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use String\Calculator;


class CalculatorStep5Test extends PHPUnit_Framework_TestCase
{

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage  negatives not allowed -2
	 */
	public function testSingleNegative()
	{
		$this->assertEquals(3, Calculator::add('1,-2'));

	}
	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage  negatives not allowed -1, -2
	 */
	public function testMultipleNegative()
	{
		$this->assertEquals(3, Calculator::add('-1,-2'));

	}
}
