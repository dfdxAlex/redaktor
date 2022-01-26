<?php

namespace redaktor;

class User 
{
public $year;
public $mes;
public function __construct(int $year = null, int $mes = null) 
{
    $this->year=$year;
    $this->mes=$mes;
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
} // конец класса
