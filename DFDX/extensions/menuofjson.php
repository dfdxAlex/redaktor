<?php
namespace extensions;

session_start();

// menu of json 
// start proect 19.04.2022
// проект создается для быстрого создания менюшек, основанных на технологии файлов JSON
// С помощью страницы меню нужно создать и уметь редактировать
// С помощью отдельного модуля меню нужно установить в нужное место


// подключение автозагрузчика cms-dfdx
include '../class.php';

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
use \extensions\resource\menuofjson\object\MenuUp;
use \class\value_object\toSession;
use \extensions\resource\menuofjson\valueObject\toSessionLocal;

// Класс локальных переменных сессий.
// объект создается на один раз для проверки наличия всех переменных необходимых для работы, если их нет, то они создаются
$toSession = new toSessionLocal();
// объект для работы с переменными сессии, класс находится в движке dfdx
$toSession = new toSession('');

// начало документа
echo new HtmlHead('resource/menuofjson/css/styles_menu_of_json.css','MenuOfJSON');

// верхнее меню
$menuAp = new MenuUp();









// конец документа
echo new HtmlFutter();
