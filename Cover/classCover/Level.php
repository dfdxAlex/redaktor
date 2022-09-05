<?php
namespace classCover;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class Level
{
    public function __construct()
    {


        // функция ловит кнопки навигации и изменяет переменную текущего шага
        $this->levelHunt();


    }

    public function __toString()
    {
        return $_SESSION['level_cover'];
    }

    static function levelInc()
    {
        return $_SESSION['level_cover']++;
    }

    static function levelDec()
    {
        return $_SESSION['level_cover']--;
    }

    static function levelReset()
    {
        return $_SESSION['level_cover']=0;
    }


    static function levelHunt()
    {
        if (!isset($_SESSION['level_cover'])) $_SESSION['level_cover']=0;
        // максимальное число шагов. Используется в разных блоках, поэтому задается переменной сессии
        $_SESSION['level_max_cover']=3;
        
        // obsługa przycisków menu nawigacji: do przodu, do tyłu, do góry
        // обработка кнопок навигационного меню: вперед, назад, в начало
        if (isset($_REQUEST['next'])) self::levelInc();
        if (isset($_REQUEST['back'])) self::levelDec();
        if (isset($_REQUEST['main'])) self::levelReset();

        /////////////////////////////////////////////////////
        if ($_SESSION['level']<0) $_SESSION['level']=0;

        // Ограничиваем рост уровня страницы если он не равен 1000
            if ($_SESSION['level_cover']>$_SESSION['level_max_cover']) 
                $_SESSION['level_cover']=$_SESSION['level_max_cover'];
    }




}
