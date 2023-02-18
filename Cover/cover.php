<?php

session_start();


/////////////////////////////////////////////
// подключение автозагрузчика библиотеки DFDX
require_once "class/autoloaderDFDX.php";

// класс с верхней частью сайта Header
use class\nonBD\HtmlHead;
// класс с нижней частью сайта futter
use class\nonBD\HtmlFutter;

// подключение библиотеки с js функциями
echo "<script src='js/MyLib.js'></script>";
//сгенерировать верхнюю часть сайта header
echo new HtmlHead('CSS/cover.css','Cover');

// класс контролирующий выбранный пользователем язык интерфейса
use classCover\SelectLanguage;
// если была нажата кнопка выбора языка интерфейса пользователя, то зафиксировать это
$language = new SelectLanguage();
// метод отслеживает массив $_REQUEST['en'...]
SelectLanguage::setLenguage();

// класс подставляет слово в зависимости от выбранного языка интерфейса
use classCover\Translation;

// класс отслеживает нажатия кнопок
//use classCV\RequestButton;

// класс контроллер
use classCover\Controler;


// Контроллер
$controller = new Controler();
Controler::control();


echo '<script src="https://kit.fontawesome.com/e6a725b74a.js" crossorigin="anonymous"></script>';
// установка futter
echo new HtmlFutter();

///////////////////////////////////////////
