<?php
namespace extensions;

session_start();

// imagesMapa
// start proect 22.04.2022
// проект создается для рассылки материала в социальные сети
//  


// подключение автозагрузчика cms-dfdx
include '../class.php';

use \class\nonBD\HtmlHead;
use \class\nonBD\HtmlFutter;
use \class\value_object\toSession;
use \extensions\resource\socialMedia\valueObject\ToSessionLocal;
use \extensions\resource\socialMedia\object\MenuUp;

// объект для работы с переменными сессии, класс находится в движке dfdx
$toSession = new toSession();
// местный объект для работы с переменными сессии
$toSessionLocal = new toSessionLocal();

//$toSession->help();

// начало документа
echo new HtmlHead('resource/socialMedia/css/socialMedia.css','socialMedia');

// меню выбора соцсетей, куда следует отправить ресурс
$soc=new MenuUp();
$soc->menu();


    //echo $toSession;
    //$toSession->toSessionHelp();
    //$toSession->getSessionAllFilter('social');

// конец документа
echo new HtmlFutter();

