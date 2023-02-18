<?php

session_start();

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
use class\nonBD\SelectLanguage;
// класс подставляет слово в зависимости от выбранного языка интерфейса
use class\nonBD\Translation;

// класс отслеживает нажатия кнопок
use classCV\RequestButton;

// класс контроллер
use classCV\Controler;

// Создает объект в котором хранится информация о текущем шаге пользователя
// Конструктор проверяет существует ли переменная сессии и если нет, то создает её.
$level = new Level();
// если была нажата кнопка выбора языка интерфейса пользователя, то зафиксировать это
//$language = new SelectLanguage();
// метод отслеживает массив $_REQUEST['en'...]
SelectLanguage::setLenguage();

        // отслеживает возврат из режима создания CV
        RequestButton::livesCreateCV();

//////////////////////////////////////////////начало страницы body/////////////////////////////////////////////
// подключение библиотеки с js функциями
echo "<script src='js/MyLib.js'></script>";
//сгенерировать верхнюю часть сайта header
echo new HtmlHead('CSS/cv.css','CV');
///////////////////////////////////////////// 
Level::dataHunt(new classCV\Certificates(),
                new classCV\Languages(),
                new classCV\Address(),
                new classCV\Education(),
                new classCV\Experience(),
                new classCV\Skills(),
                new classCV\UserName(),
                new classCV\SkillsBriefly(),
               );



// Контроллер
$controller = new Controler();
Controler::control();



// установка futter
echo new HtmlFutter();
///////////////////////////////////////////
