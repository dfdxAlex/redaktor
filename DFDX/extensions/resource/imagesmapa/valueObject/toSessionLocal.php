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

    // функция возвращает следующий свободный номер для записи координат
    public function klacNumerEnd()
    {
        $i=0;
         foreach ($_SESSION as $key=>$value) {
             if (stripos($key,'klacX')!==false) $i++;
         }
        $i++;
        return $i;
    }



}
