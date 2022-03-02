<?php
namespace Tests\User;

include "class/test_value.php";

class UserTest extends \PHPUnit\Framework\TestCase
{

 
    
    public function testName()
    {
      // Obiekt jest testowany pod kątem 5 funkcji. Cztery arytmetyki: dodawanie, odejmowanie, mnożenie i dzielenie.
      // Piąta funkcja sprawdza, czy typ waluty jest określony poprawnie.
      // Объект тестируется по 5-ти функциям. Четыре арифметические: сложение, вычитание, умножение и деление.
      // Пятая функция проверяет правильность указания типа валюты.
      $this->assertEquals('20 USD',new \Tests\User\class\Money(new \Tests\User\class\Nomer(15),new \Tests\User\class\Nomer(5.0),new \Tests\User\class\Currency('uSd'),'sum'));
      $this->assertEquals('10 USD',new \Tests\User\class\Money(new \Tests\User\class\Nomer(15),new \Tests\User\class\Nomer(5.0),new \Tests\User\class\Currency('usd'),'sub'));
      $this->assertEquals('75 USD',new \Tests\User\class\Money(new \Tests\User\class\Nomer(15),new \Tests\User\class\Nomer(5.0),new \Tests\User\class\Currency('Usd'),'mult'));
      $this->assertEquals('3 USD',new \Tests\User\class\Money(new \Tests\User\class\Nomer(15),new \Tests\User\class\Nomer(5.0),new \Tests\User\class\Currency('usD'),'div'));
    }

    protected function setUp() : void
    {
    }

    protected function tearDown() : void
    {
    }
}
