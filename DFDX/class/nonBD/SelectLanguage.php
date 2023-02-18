<?php
namespace class\nonBD;

// класс хранит данные выбора языка пользователя
class SelectLanguage
{
    public function __construct()
    {
        if (!isset($_SESSION['language'])) $_SESSION['language']='en';
    }

    static function setLenguage()
    {
        if (isset($_REQUEST['en'])) $_SESSION['language']='en';
        if (isset($_REQUEST['pl'])) $_SESSION['language']='pl';
        if (isset($_REQUEST['ua'])) $_SESSION['language']='ua';
        if (isset($_REQUEST['ru'])) $_SESSION['language']='ru';
    }

    static function getLenguage()
    {
        if (!isset($_SESSION['language'])) $_SESSION['language']='en';
        return $_SESSION['language'];
    }
}
