<?php

namespace class\redaktor;

class User 
{
use TraitInstrument{
    TraitInstrument::traitEcho insteadOf TraitUser;
}
use TraitUser;
public $year;
public $mes;
public static $day;
public function __construct(int $year = null, int $mes = null) 
{
    $this->year=$year;
    $this->mes=$mes;
}
public function otTrait()
{
    return self::traitEcho();
}
public function userName(initBd $initBd) 
{
    return $initBd->initsite();
}

public function userMail(instrument $instrument) 
{
    return $instrument->instrumetTest();
}

public function userYear() 
{
    return $this->year.'--'.$this->mes;
}

public function setYear()
{
    $this->year=$year;
}
public static function setDay($day)
{
    self::$day=$day;
}
public function getDay()
{
    return self::$day;
}
} // конец класса
