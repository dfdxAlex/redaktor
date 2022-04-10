<?php
namespace program\IPCalculator\src\ValueObject;

// Класс для контроля наличия и управления переменными Сессий
class ControlSession
{
    public function __construct()
    {
        if (!isset($_SESSION['button-IP-Groups']) || isset($_POST['button-IP-Groups-reset'])) $_SESSION['button-IP-Groups']='z';
        if (!isset($_SESSION['ip1'])) $_SESSION['ip1']=0;
        if (!isset($_SESSION['ip2'])) $_SESSION['ip2']=0;
        if (!isset($_SESSION['ip3'])) $_SESSION['ip3']=0;
        if (!isset($_SESSION['ip4'])) $_SESSION['ip4']=0;
        if (!isset($_SESSION['ipMask'])) $_SESSION['ipMask']=0;
        if (!isset($_SESSION['ipSSIDR'])) $_SESSION['ipSSIDR']=-1;
    }

    // функция устанавливает значения переменным сессий, в зависимости от имеющихся значений в массиве пост
    public function varSet()
    {
        if (isset($_POST['button-IP-Groups'])) {
            $_SESSION['button-IP-Groups']=$_POST['IP_From_Group'];
        }

        if (isset($_POST['ipS1']) && $_POST['ipS1']>-1 && $_POST['ipS1']<256) $_SESSION['ip1']=$_POST['ipS1']; else $_SESSION['ip1']=0;
        if (isset($_POST['ipS2']) && $_POST['ipS2']>-1 && $_POST['ipS2']<256) $_SESSION['ip2']=$_POST['ipS2']; else $_SESSION['ip2']=0;
        if (isset($_POST['ipS3']) && $_POST['ipS3']>-1 && $_POST['ipS3']<256) $_SESSION['ip3']=$_POST['ipS3']; else $_SESSION['ip3']=0;
        if (isset($_POST['ipS4']) && $_POST['ipS4']>-1 && $_POST['ipS4']<256) $_SESSION['ip4']=$_POST['ipS4']; else $_SESSION['ip4']=0;
        if (isset($_POST['ipSmask']) && $_POST['ipSmask']>-1 && $_POST['ipSmask']<33) $_SESSION['ipMask']=$_POST['ipSmask']; else $_SESSION['ipMask']=0;
        if (isset($_POST['ipSSIDRreset'])) $_SESSION['ipSSIDR']=-1;
        if (isset($_POST['ipSSIDR'])) $_SESSION['ipSSIDR']=0;
    }

    // функция определяет можно ли показывать меню пользователя
    public function showUserMenu()
    {
        if ($_SESSION['button-IP-Groups']!='z') return false;
        if ($_SESSION['ipSSIDR']!=-1) return false;
        return true;
    }
}
