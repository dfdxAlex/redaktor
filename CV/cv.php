<?php
declare(strict_types=1);

session_start();

// подключение автозагрузчика библиотеки Dompdf
require_once "vendor/autoload.php"; 
use Dompdf\Dompdf;
/////////////////////////////////////////////
// подключение автозагрузчика библиотеки DFDX
require_once "class/autoloaderDFDX.php";

// класс с верхней частью сайта Header
use class\nonBD\HtmlHead;
// класс с нижней частью сайта futter
use class\nonBD\HtmlFutter;
// класс хранит шаг пользователя
use classCV\Level;
// класс контролирующий выбранный пользователем язык интерфейса
use classCV\SelectLanguage;
// класс подставляет слово в зависимости от выбранного языка интерфейса
use classCV\Translation;

// класс контроллер
use classCV\Controler;

// Создает объект в котором хранится информация о текущем шаге пользователя
// Конструктор проверяет существует ли переменная сессии и если нет, то создает её.
$level = new Level();
// если была нажата кнопка выбора языка интерфейса пользователя, то зафиксировать это
$language = new SelectLanguage();
// метод отслеживает массив $_REQUEST['en'...]
SelectLanguage::setLenguage();

//////////////////////////////////////////////начало страницы body/////////////////////////////////////////////
//сгенерировать верхнюю часть сайта header
echo new HtmlHead('CSS/cv.css','CV');
///////////////////////////////////////////// 

// Контроллер
$controller = new Controler();
Controler::control();


//echo $_SESSION['level'];



//echo new Level;


// установка futter
echo new HtmlFutter();
///////////////////////////////////////////// 
/*
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(file_get_contents('https://www.php.net/manual/ru/domdocument.loadhtml.php'));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();*/
