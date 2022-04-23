<?php
namespace extensions\resource\imagesmapa\valueObject;

// класс проверяет список необходимых переменных сессий и если их нет, создает
class toSessionLocal
{
    public function __construct()
    {
        if (!isset($_SESSION['imagesMapaMenuUp'])) $_SESSION['imagesMapaMenuUp']='';
        if (!isset($_SESSION['imagesMapaPathImageTmp'])) $_SESSION['imagesMapaPathImageTmp']='';
        if (!isset($_SESSION['imagesMapaWightTmp'])) $_SESSION['imagesMapaWightTmp']='';
        if (!isset($_SESSION['imagesMapaHeightTmp'])) $_SESSION['imagesMapaHeightTmp']='';
    }
}
