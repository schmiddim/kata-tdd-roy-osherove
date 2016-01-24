<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use String\Calculator;


class CalculatorStep6Test extends PHPUnit_Framework_TestCase
{


	public function testOver1000()
	{
		$this->assertEquals(1, Calculator::add('1,2000'));

	}

}
