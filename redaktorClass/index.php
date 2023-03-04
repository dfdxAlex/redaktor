<?php
include_once "src/autoload.php";

session_start();

/** Вывести верхнюю часть разметки */
echo new src\libraries\Header;

// $obj2 = new src\libraries\DelegatorLang();
// $obj2->control();

$obj = new src\libraries\DelegatorLang();
$obj->control();

echo new src\libraries\MenuUp();

// src\libraries\UrlLevel::urlLevel($min=1, $max=10);


$obj->setLang();




echo new src\libraries\Footer;



