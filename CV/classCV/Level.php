<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class Level
{
    public function __construct()
    {
        if (!isset($_SESSION['level'])) $_SESSION['level']=0;
    }

    public function __toString()
    {
        return $_SESSION['level'];
    }

    static function levelInc()
    {
        return $_SESSION['level']++;
    }

    static function levelDec()
    {
        return $_SESSION['level']--;
    }

    static function levelReset()
    {
        return $_SESSION['level']=0;
    }

    static function levelHunt()
    {
        if (isset($_REQUEST['next'])) self::levelInc();
        if (isset($_REQUEST['back'])) self::levelDec();
        if (isset($_REQUEST['main'])) self::levelReset();
    }
}
