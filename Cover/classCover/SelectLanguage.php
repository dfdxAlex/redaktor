<?php
namespace classCover;

// класс хранит данные выбора языка пользователя
class SelectLanguage
{
    public function __construct()
    {
        if (!isset($_SESSION['languageCover'])) $_SESSION['languageCover']='en';
    }

    static function setLenguage()
    {
        if (isset($_REQUEST['en'])) $_SESSION['languageCover']='en';
        if (isset($_REQUEST['pl'])) $_SESSION['languageCover']='pl';
        if (isset($_REQUEST['ua'])) $_SESSION['languageCover']='ua';
        if (isset($_REQUEST['ru'])) $_SESSION['languageCover']='ru';
    }

    static function getLenguage()
    {
        return $_SESSION['languageCover'];
    }
}
