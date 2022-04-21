<?php
namespace DFDX;

// server control panel (SCP)  
// start proect 19.04.2022


// подключение автозагрузчика cms-dfdx
include 'DFDX/class.php';

use class\nonBD\HtmlHead;
use class\nonBD\HtmlFutter;

// начало документа
echo new HtmlHead('resource/css/styles_menu_of_json.css','SCP','body-class',1,3);







// конец документа
echo new HtmlFutter();

