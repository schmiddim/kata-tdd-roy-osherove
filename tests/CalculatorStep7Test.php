<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use String\Calculator;


class CalculatorStep7Test extends PHPUnit_Framework_TestCase
{


	public function testWithAnyLengthDelimiters()
	{
		$this->assertEquals(37, Calculator::add("//--\n4--33"));
		$this->assertEquals(37, Calculator::add("//[--]\n4--33"));


	}


}
