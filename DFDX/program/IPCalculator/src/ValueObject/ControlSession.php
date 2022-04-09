<?php
namespace program\IPCalculator\src\ValueObject;

// Класс для контроля наличия и управления переменными Сессий
class ControlSession
{
    public function __construct()
    {
        if (!isset($_SESSION['button-IP-Groups']) || isset($_POST['button-IP-Groups-reset'])) $_SESSION['button-IP-Groups']='z';
    }

    public function varSet()
    {
        if (isset($_POST['button-IP-Groups'])) {
            $_SESSION['button-IP-Groups']=$_POST['IP_From_Group'];
        }
            
    }
}
