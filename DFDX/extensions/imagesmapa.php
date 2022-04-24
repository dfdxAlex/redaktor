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

//$toSession->getSessionAllFilter('imagesmapa');
?>


<img src="resource/imagesmapa/tmp/imageTest.jpg" alt="CMS-DFDX" usemap="#workmap">

<map name="workmap"><area shape="poly" name="workmap" href="#" coords="58,132,87,110,106,102,121,104,128,78,145,87,156,112,166,138,173,172,121,135,56,138" ></map>


<?php

// конец документа
echo new HtmlFutter();

