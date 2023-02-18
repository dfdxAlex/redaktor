<?php
namespace classCV;


// класс управляет логикой приложения
class Controler
{
    public function __construct()
    {

        // Блок ставит два верхних меню: работа с языками и навигацией по сайту
        $menuLen = new ButtonLanguage();
        $menuUp = new  ButtonMenuUp();
        $progress=$this->progress();
        if ($_SESSION['level']!=10)
            echo "<nav>
                     <div class='container-fluid'>
                         <div class='row'>
                             <div class='col-8'>
                                 $menuUp
                             </div>
                             <div class='col-4'>
                                 $menuLen
                             </div>
                         </div>
                         $progress
                     </div>
                 </nav>
            ";
        // метод слушает $_REQUEST[] на наличие команд от меню навигационного
        // если команда есть, то гуляем по меню
        //Level::levelHunt();
    }
    static function control()
    {
        //$_SESSION['level']=0;
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
        if ($_SESSION['level']==4) {                   // Создать объект для работы со страницей ввода списка скилов
            $skillsBriefly = new SkillsBriefly();
            $skillsBriefly->skillsBrieflyNumer();
            $skillsBriefly->skillsBrieflyLevl();
            echo $skillsBriefly;
        }
        if ($_SESSION['level']==5) {                   // Создать объект для работы со страницей ввода скилов
            $scills = new Skills();
            $scills->skillsHunt();
            echo $scills;
        }
        if ($_SESSION['level']==6) {                   // Создать объект для работы со страницей ввода опыта
            $experience = new Experience();
            $experience->experienceHunt();
            echo $experience;
        }
        if ($_SESSION['level']==7) {                   // Создать объект для работы со страницей ввода образования
            $education = new Education();
            $education->educationHunt();
            echo $education;
        }
        if ($_SESSION['level']==8) {                   // Создать объект для работы со страницей ввода информации об языках
            $languages = new Languages();
            $languages->saveLevl();
            $languages->languagesNumer();
            echo $languages;
        }
        if ($_SESSION['level']==9) {                   // Создать объект для работы со страницей ввода информации об языках
            $certificates = new Certificates();
            $certificates->certificatesLevl();
            $certificates->certificatesNumer();
            echo $certificates;
        }
        if ($_SESSION['level']==10) {                   // генерируем CV
            echo new ButtonMenuUp();
            $cvCreate = new CVCreate();
            $cvCreate->createCV();
            $_SESSION['level-10-true']=true;
        }

        if ($_SESSION['level']==1000) {                   // генерируем страницу настроек
            $cvSetting = new Setting();
        }

        if ($_SESSION['level']==1001) {                   // Запись переменных сессии
            $cvSave = new SaveCV();
        }

        if ($_SESSION['level']==1002) {                   // чтение переменных сессии
            $cvLoad = new LoadCV();
        }

          
    }

    function progress()
    {
        if ($_SESSION['level']==1000) return ''; 
        $progress=$_SESSION['level'];
        $progressMax=$_SESSION['level_max'];
        return "
        <div class='row'>
            <div class='col-4'>
                <progress max='$progressMax' value='$progress'></progress>
            </div>
            <div class='col-8'>
            </div>
        </div>
        ";
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
//$_SESSION['certificates_numer'] число полей сертификатов
//$_SESSION['certificates_name'.$i] содержимое полей сертификатов
//$_SESSION['Skillsbriefly_numer'] число в списке навыков
//$_SESSION['skillsbriefly_name'.$i] список навыков
//$_SESSION['setting'] держит информацию о том, с какой именно страницы перешли на страницу настроек

