<?php
namespace extensions;

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

// начало документа
echo new HtmlHead('resource/menuofjson/css/styles_menu_of_json.css','MenuOfJSON');

// верхнее меню
$menuAp = new MenuUp();





// конец документа
echo new HtmlFutter();
