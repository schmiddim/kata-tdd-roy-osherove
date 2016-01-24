<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use String\Calculator;


class CalculatorStep4Test extends PHPUnit_Framework_TestCase
{

	public function testWithDelimiterLine()
	{
		$this->assertEquals(3, Calculator::add("1;2"));
		$this->assertEquals(6, Calculator::add("//+\n4+2"));
		$this->assertEquals(37, Calculator::add("//-\n4-33"));
	}
}
