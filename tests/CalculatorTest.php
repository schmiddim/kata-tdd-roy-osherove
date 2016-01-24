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

	public function testWith2Spearators()
	{
		$this->assertEquals(50, Calculator::add('10
		10,
		30'));

	}

	/**
	 * Step 4
	 * @throws Exception
	 */
	public function testWithDelimiterLine()
	{
		$this->assertEquals(3, Calculator::add("1;2"));
		$this->assertEquals(6, Calculator::add("//+\n4+2"));
		$this->assertEquals(37, Calculator::add("//-\n4-33"));
	}
	/**
	 * Step 5
	 * @expectedException \Exception
	 * @expectedExceptionMessage  negatives not allowed -2
	 */
	public function testSingleNegative()
	{
		$this->assertEquals(3, Calculator::add('1,-2'));

	}

	/**
	 * Step 5
	 * @expectedException \Exception
	 * @expectedExceptionMessage  negatives not allowed -1, -2
	 */
	public function testMultipleNegative()
	{
		$this->assertEquals(3, Calculator::add('-1,-2'));

	}

	//Step 5
	public function testOver1000()
	{
		$this->assertEquals(1, Calculator::add('1,2000'));

	}

	//Step 7
	public function testWithAnyLengthDelimiters7()
	{
		$this->assertEquals(37, Calculator::add("//--\n4--33"));
		$this->assertEquals(37, Calculator::add("//[--]\n4--33"));
	}

	//Step 8
	public function testWithAnyLengthDelimiters()
	{
		$this->assertEquals(37, Calculator::add("//--\n4--33"));
		$this->assertEquals(40, Calculator::add("//[--][++]\n4--33++3"));
		$this->assertEquals(45, Calculator::add("//[--][++][,,]\n4--33++3,,5"));
		$this->assertEquals(45, Calculator::add("//[-][++][,]\n4--33++3,5"));

	}

}
