<?php
include_once "src/autoload.php";

session_start();

/** Вывести верхнюю часть разметки */
echo new src\libraries\Header;

echo new src\libraries\MenuUp();

// echo src\libraries\RamSession::ramSession()->setPrefix('ram_test_')->getPrefix().PHP_EOL;

// echo src\libraries\RamSession::ramSession()->setRam('test','25')->getRam('test').PHP_EOL;
// $ggg = src\libraries\RamSession::ramSession()->fileJsonToMas('Info.jsn');

// src\libraries\RamSession::ramSession()->setPrefix('')->jsonToFile('Info.jsn',$ggg);
src\libraries\RamSession::ramSession()->fileJsonToSession('Info.jsn');
var_dump($_SESSION);

// var_dump($ggg);





echo new src\libraries\Footer;



