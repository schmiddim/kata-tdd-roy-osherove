<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use String\Calculator;

class CalculatorTest extends PHPUnit_Framework_TestCase
{

	public function testEmpty()
	{
		$this->assertEquals(0, Calculator::add(''));
	}

	public function testOneNumber()
	{
		$this->assertEquals(1, Calculator::add('1'));
		$this->assertEquals(3, Calculator::add('3'));
		$this->assertEquals(6, Calculator::add('6'));
	}

	public function testTwoNumbers()
	{
		$this->assertEquals(3, Calculator::add('1,2'));
		$this->assertEquals(200, Calculator::add('198,2'));

	}
	public function testMultipleNumbers()
	{
		$this->assertEquals(6, Calculator::add('1,2,3'));
		$this->assertEquals(50, Calculator::add('10,10,30'));

	}
}
