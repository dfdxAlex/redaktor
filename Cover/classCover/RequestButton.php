<?php
namespace classCover;

// класс отслеживает нажатия кнопок и заносит данные в переменные сессий
class RequestButton
{
    public function __construct()
    {
        //создаем переменную сессии, если её нет
        if (!isset($_SESSION['loadWidth_cover'])) $_SESSION['loadWidth_cover']=0;
        if (!isset($_SESSION['loadHeyght_cover'])) $_SESSION['loadHeyght_cover']=0;

        // отслеживаем нажатые кнопки и помещаем их значения в переменные сессий
        if (isset($_REQUEST['loadWidth'])) $_SESSION['loadWidth_cover']=(int)$_REQUEST['loadWidth'];
        if (isset($_REQUEST['loadHeyght'])) $_SESSION['loadHeyght_cover']=(int)$_REQUEST['loadHeyght'];
    }

    public function __toString()
    {
       return '';
    }

}
