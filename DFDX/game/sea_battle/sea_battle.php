<?php
namespace extensions;

session_start();

// sea battle
// start proect 12.05.2022
// 
// 
//  


// подключение автозагрузчика cms-dfdx
include '../../class.php';

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
use \class\nonBD\Button;
// начало документа
echo new HtmlHead('css/sea_battle.css','Sea Battle','sea-battle-body',0,3);

$qqq = new Button();


// конец документа
echo new HtmlFutter();

