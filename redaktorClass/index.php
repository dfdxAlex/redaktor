<?php
include_once "src/autoload.php";

session_start();

/** Вывести верхнюю часть разметки */
echo new src\libraries\Header;

/**
 * Объект работает с переводами фраз на разные языки
 */
$obj = new src\libraries\DelegatorLang();
// $obj->setRedactorLang(true);
$obj->control();
//  $obj->echoDataMas(); //посмотреть или отредактировать базу переводов

/**
 * Верхнее меню с кнопками вперед/назад
 */
echo new src\libraries\MenuUp($obj);


/**
 * Формы для рабоиы с сервисом
 * Фабрикаиспользует GET параметр level
 */
echo src\libraries\Forms::formsFactory($obj);

// $obj->setLang();




echo new src\libraries\Footer;



