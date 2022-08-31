<?php
namespace classCover;


// класс управляет логикой приложения
class Controler
{
    public function __construct()
    {

        // Блок ставит два верхних меню: работа с языками и навигацией по сайту
        echo new ButtonLanguage();


    }
    static function control()
    {
        // вывести список шаблонов, если шаг = 0


          
    }


}


//$_SESSION['languageCover']   содержит язык пользователя

