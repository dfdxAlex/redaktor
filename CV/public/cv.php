<?php
namespace public;

session_start();

/////////////////////////////////////////////
// подключение автозагрузчика библиотеки DFDX
require_once "../class/autoloader.php";

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
// класс хранит шаг пользователя
use \classCV\Level;
use \class\nonBD\SelectLanguage;
use \class\nonBD\Translation;

// класс отслеживает нажатия кнопок
use \classCV\RequestButton;

// класс контроллер
use \classCV\Controler;

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
echo "<script src='../src/js/MyLib.js'></script>";
//сгенерировать верхнюю часть сайта header
echo new HtmlHead('../src/CSS/cv.css','CV');
///////////////////////////////////////////// 
Level::dataHunt(new \classCV\Certificates(),
                new \classCV\Languages(),
                new \classCV\Address(),
                new \classCV\Education(),
                new \classCV\Experience(),
                new \classCV\Skills(),
                new \classCV\UserName(),
                new \classCV\SkillsBriefly(),
               );



// Контроллер
$controller = new Controler();
Controler::control();



// установка futter
echo new HtmlFutter();
///////////////////////////////////////////
