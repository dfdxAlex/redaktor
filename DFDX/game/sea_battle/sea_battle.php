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
use \game\sea_battle\object\WorkingWithSessions;
// начало документа
$headHead = new HtmlHead('css/sea_battle.css','Sea Battle','sea-battle-body',0,3);
echo $headHead;

//Создает переменные сессии, если их ещё нет
$sessionCreate = new WorkingWithSessions();

//$_SESSION['sea_battle_user_step']=0;////
// класс для ввода имени
// коммент для теста
if ($_SESSION['sea_battle_user_step']<2)
    $selectName = new SelectName();


$qqq = new Button();


// конец документа
echo new HtmlFutter();

