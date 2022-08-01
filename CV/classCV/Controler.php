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
        //$_SESSION['level']=4; // удалить
        // вывести список шаблонов, если шаг = 0
        if ($_SESSION['level']==0) {                   // Создать объект для работы со страницей выбора шаблона
            $patternCV = new SelectPattern();
            echo $patternCV;
        }
        if ($_SESSION['level']==1) {                   // Создать объект для работы со страницей ввода имени и фамилии
            $userName = new UserName();
            $userName->nameForm();
        }
        if ($_SESSION['level']==2) {                   // Создать объект для работы со страницей ввода фотографии
            $loadFoto = new LoadFoto();
        }
        if ($_SESSION['level']==3) {                   // Создать объект для работы со страницей ввода контактов
            $address = new Address();
            $address->addressHunt();
            echo $address;
        }
        if ($_SESSION['level']==4) {                   // Создать объект для работы со страницей ввода скилов
            $scills = new Skills();
            $scills->skillsHunt();
            echo $scills;
        }
        if ($_SESSION['level']==5) {                   // Создать объект для работы со страницей ввода опыта
            $experience = new Experience();
            $experience->experienceHunt();
            echo $experience;
        }
        if ($_SESSION['level']==6) {                   // Создать объект для работы со страницей ввода образования
            $education = new Education();
            $education->educationHunt();
            echo $education;
        }
        if ($_SESSION['level']==7) {                   // Создать объект для работы со страницей ввода информации об языках
            $languages = new Languages();
            echo $languages->saveLevl();
            $languages->languagesNumer();
            echo $languages;
            //var_dump ($_REQUEST);
        }
    }
}


// $_SESSION['pattern'] Содержит информацию о выбранном шаблоне CV
// $_SESSION['level'] Содержит информацию об текущей странице, на которой находится пользователь
// $_SESSION['name'] Содержит имя пользователя для анкеты
// $_SESSION['surname'] Содержит фамилию пользователя для анкеты
// $_SESSION['linkFoto'] Содержит ссылку на картинку
//$_SESSION['address']=$_REQUEST['address']; адрес
//$_SESSION['tel']=$_REQUEST['tel'];         телефон
//$_SESSION['email']=$_REQUEST['email'];     почта
//$_SESSION['Linkedln']=$_REQUEST['Linkedln'];  Linkedln
//$_SESSION['git']=$_REQUEST['git'];         гит
//$_SESSION['skills'] Содержит описание скилов
//$_SESSION['experience'] опыт
//$_SESSION['education'] образование
//$_SESSION['languages_numer'] число позиций в языках
//$_SESSION['languages(1-n)'] информация о языках (сам язык)
//$_SESSION['languages-level'] уровень владения 
