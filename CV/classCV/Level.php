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
        // obsługa przycisków menu nawigacji: do przodu, do tyłu, do góry
        // обработка кнопок навигационного меню: вперед, назад, в начало
        if (isset($_REQUEST['next'])) self::levelInc();
        if (isset($_REQUEST['back'])) self::levelDec();
        if (isset($_REQUEST['main'])) self::levelReset();
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
        if ($_SESSION['level']>10) $_SESSION['level']=10;
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
