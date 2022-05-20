<?php
namespace game\sea_battle;

session_start();

// sea battle
// start proect 12.05.2022


// подключение автозагрузчика cms-dfdx
include '../../class.php';

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
use \class\nonBD\Button;
use \game\sea_battle\valueObject\SelectName;
// начало документа
$headHead = new HtmlHead('css/sea_battle.css','Sea Battle','sea-battle-body',0,3);
echo $headHead;

//echo $headHead->getRand(); //получить значение фона

// класс для ввода имени
$selectName = new SelectName();


$qqq = new Button();


// конец документа
echo new HtmlFutter();

