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
        if (!isset($_SESSION['colorName1_cover'])) $_SESSION['colorName1_cover']=0;
        if (!isset($_SESSION['colorName2_cover'])) $_SESSION['colorName2_cover']=0;
        if (!isset($_SESSION['checkName1_cover'])) $_SESSION['checkName1_cover']=0;
        if (!isset($_SESSION['border_cover'])) $_SESSION['checkName1_cover']=false;

        // отслеживаем нажатые кнопки и помещаем их значения в переменные сессий
        if (isset($_REQUEST['loadWidth']) && !$_REQUEST['loadWidth']=='') $_SESSION['loadWidth_cover']=(int)$_REQUEST['loadWidth'];
        if (isset($_REQUEST['loadHeyght']) && !$_REQUEST['loadHeyght']=='') $_SESSION['loadHeyght_cover']=(int)$_REQUEST['loadHeyght'];
        // Данные фона поля
        if (isset($_REQUEST['colorName1']) && $_REQUEST['colorName1']!='#000000') $_SESSION['colorName1_cover']=$_REQUEST['colorName1'];
        if (isset($_REQUEST['colorName2']) && $_REQUEST['colorName2']!='#000000') $_SESSION['colorName2_cover']=$_REQUEST['colorName2'];
        if (isset($_REQUEST['checkName1'])) $_SESSION['checkName1_cover']=$_REQUEST['checkName1'];
        if (isset($_REQUEST['resetColor'])) {
            $_SESSION['colorName1_cover']='#000000';
            $_SESSION['colorName2_cover']='#000000';
        }
        // Видна ли граница поля
        if (isset($_REQUEST['buttonBorder']) && $_SESSION['border_cover']) $_SESSION['border_cover']=false;
        else if (isset($_REQUEST['buttonBorder']) && !$_SESSION['border_cover']) $_SESSION['border_cover']=true;


    }

    public function __toString()
    {
       return '';
    }

}
