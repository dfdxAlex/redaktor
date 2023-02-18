<?php
namespace extensions;

session_start();

// imagesMapa
// start proect 22.04.2022
// проект создается для создания карт на картинке
// Задача с помощью Джейсон файла создать карту, привязянную к картинке и определять по какой зоне кликнул пользователь
//  


// подключение автозагрузчика cms-dfdx
include '../class.php';

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
use \extensions\resource\imagesmapa\object\MenuUp;
use \extensions\resource\imagesmapa\valueObject\toSessionLocal;
use \class\value_object\toSession;

// Класс локальных переменных сессий.
// объект создается на один раз для проверки наличия всех переменных необходимых для работы, если их нет, то они создаются
$toSession = new toSessionLocal();
// объект для работы с переменными сессии, класс находится в движке dfdx
$toSession = new toSession();
//$toSession->toSessionHelp();

// начало документа
echo new HtmlHead('resource/imagesmapa/css/imagesmapa.css','ImagesMapa');

// верхнее меню
$menuAp = new MenuUp();



// конец документа
echo new HtmlFutter();

