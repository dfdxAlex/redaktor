<?php
namespace Tests\User;

include "PHPUnit/Test/User/class/User.php";

class UserTest extends \PHPUnit\Framework\TestCase
{

    private $user;
    
    public function testName()
    {
      $assertEquals('alex',$this->user->$name);
    }

    protected function setUp() : void
    {
      $this->user = new \Tests\User\class\User('alex');
      $this->user->$name='alex';
    }

    protected function tearDown() : void
    {

    }
}
