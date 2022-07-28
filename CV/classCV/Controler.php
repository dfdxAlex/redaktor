<?php
namespace classCV;


// класс управляет логикой приложения
class Controler
{
    public function __construct()
    {
        // поставить кнопки выбора языка интерфейса
        echo new ButtonLanguage();
        // меню навигации по сайту
        echo new ButtonMenuUp();
        // метод слушает $_REQUEST[] на наличие команд от меню навигационного
        // если команда есть, то гуляем по меню
        Level::levelHunt();



    }
    static function control()
    {
        // вывести список шаблонов, если шаг = 0
        if ($_SESSION['level']==0) {                   // Создать объект для работы со страницей выбора шаблона
            $patternCV = new SelectPattern();
            echo $patternCV;
        }
        if ($_SESSION['level']==1) {                   // Создать объект для работы со страницей ввода имени и фамилии
            $userName = new UserName();
            //$userName->nameHunt();
            $userName->nameForm();
            
        }
    }
}


// $_SESSION['pattern'] Содержит информацию о выбранном шаблоне CV
// $_SESSION['level'] Содержит информацию об текущей странице, на которой находится пользователь
// $_SESSION['name'] Содержит имя пользователя для анкеты
// $_SESSION['surname'] Содержит фамилию пользователя для анкеты
