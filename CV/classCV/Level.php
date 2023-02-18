<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class Level
{
    public function __construct()
    {
        if (!isset($_SESSION['level'])) $_SESSION['level']=0;
        if (!isset($_SESSION['setting'])) $_SESSION['setting']=0;
        if (!isset($_SESSION['save'])) $_SESSION['save']=0;

        $this->levelHunt();

        // максимальное число шагов. Используется в разных блоках, поэтому задается переменной сессии
        $_SESSION['level_max']=10;
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
        if ($_SESSION['level']!=1002 && $_SESSION['level']!=1001)
            return $_SESSION['level']--;
        else $_SESSION['level']=0;
    }

    static function levelReset()
    {
        return $_SESSION['level']=0;
    }

    //функция должна сработать при наличии команды на переход в режим настроек.
    //в массив $_SESSION['setting'] вносим номер страницы, на которой пользователь нажал на кнопку настроек
    static function levelSetting()
    {
        if ($_SESSION['level']!=1000)
            $_SESSION['setting']=$_SESSION['level'];
        $_SESSION['level']=1000;
    }

    // переход на страничку записи информации
    static function saveData()
    {
        if ($_SESSION['level']!=1001)
            $_SESSION['save']=$_SESSION['level'];
        $_SESSION['level']=1001;
    }

    // переход на страничку загрузки информации
    static function loadData()
    {
        if ($_SESSION['level']!=1002)
            $_SESSION['load']=$_SESSION['level'];
        $_SESSION['level']=1002;
    }
    
    // срабатывает при выходе из режима настроек и присваивает ранее сохраненное значение с какой страницы перешли в настройки
    static function leaveSetting()
    {
        $_SESSION['level']=$_SESSION['setting'];
    }

    // выход из странички записи информации
    static function leaveSave()
    {
        $_SESSION['level']=$_SESSION['save'];
    }

    // выход из странички загрузки информации
    static function leaveLoad()
    {
        $_SESSION['level']=$_SESSION['load'];
        //$_SESSION['level']=0;
    }

    static function levelHunt()
    {
        
        // obsługa przycisków menu nawigacji: do przodu, do tyłu, do góry
        // обработка кнопок навигационного меню: вперед, назад, в начало
        if (isset($_REQUEST['next'])) self::levelInc();
        if (isset($_REQUEST['back'])) self::levelDec();
        if (isset($_REQUEST['main'])) self::levelReset();
        if (isset($_REQUEST['setting'])) self::levelSetting();
        if (isset($_REQUEST['leave_setting'])) self::leaveSetting();
        if (isset($_REQUEST['save'])) self::saveData();
        if (isset($_REQUEST['load'])) self::loadData();
        if (isset($_REQUEST['leave_save'])) self::leaveSave();
        if (isset($_REQUEST['leave_load'])) self::leaveLoad();
        // obsługa przycisków przesyłania na różnych stronach
        // обработка кнопок Отправить на разных страницах
        if (isset($_REQUEST['nameFoCV'])
            || isset($_REQUEST['skills_button'])
                || isset($_REQUEST['skills_short'])
                    || isset($_REQUEST['go_language'])
                        || isset($_REQUEST['experience_button'])
                            || isset($_REQUEST['education_button'])
                                || isset($_REQUEST['adresButton'])
                                    || isset($_REQUEST['go_sertificate'])
                                     
            ) self::levelInc();
        /////////////////////////////////////////////////////
        if ($_SESSION['level']<0) $_SESSION['level']=0;

        // Ограничиваем рост уровня страницы если он не равен 1000
        // Уровень 1000 означает переход на страницу настроек
        if ($_SESSION['level']!=1000 && $_SESSION['level']!=1001 && $_SESSION['level']!=1002)
            if ($_SESSION['level']>$_SESSION['level_max']) 
                $_SESSION['level']=$_SESSION['level_max'];
    }

    // функция слушает кнопки и при наличии нужной кнопки читает и записывает соответствующую информацию
    static function dataHunt(Certificates $cert, 
                             Languages $lang, 
                             Address $adr, 
                             Education $edu,
                             Experience $experience,
                             Skills $skils,
                             UserName $usName,
                             SkillsBriefly $skilsList,
                             )
    {
        $cert->certificatesLevl();
        $lang->saveLevl();
        $adr->addressHunt();
        $edu->educationHunt();
        $experience->experienceHunt();
        $skils->skillsHunt();
        $usName->nameHunt();
        $skilsList->skillsBrieflyLevl();
    }


}
