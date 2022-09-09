<?php
namespace classCover;


// класс управляет логикой приложения
class Controler
{
    public function __construct()
    {
        if (!isset($_SESSION['level_cover'])) $_SESSION['level_cover']=0;

        $requestTest = new RequestButton();

        // Блок ставит  меню: работа с языками
        echo '<nav class="container-fluid">
                  <div class="row">'.
                      '<div class="col-7">
                           <div class="up-menu">'.
                               new ButtonMenuUp().
                          '</div>
                      </div>
                      <div class="col-5">
                          <div class="up-menu">'.
                               new ButtonLanguage().
                          '</div>
                      </div>
                   </div>
               </nav>';

    }

    static function control()
    {
        $_SESSION['level_cover']=1;
        
        if ($_SESSION['level_cover']==0) {
           $fieldSize = new FieldSize();
        }
        if ($_SESSION['level_cover']==1) {
            $fieldSize = new BackGroundPole();
         }
          
    }


}


//$_SESSION['languageCover']   содержит язык пользователя
//$_SESSION['level_cover']    текущий шаг страниц
//$_SESSION['level_max_cover'] максимальное значение шагов
//$_SESSION['loadWidth_cover'] значение ширины поля
//$_SESSION['loadHeyght_cover'] высота рабочего поля
//$_SESSION['colorName1_cover'] Первый цвет фона
//$_SESSION['colorName2_cover'] Второй цвет фона
//$_SESSION['checkName1_cover'] Вариант фона - один из цветов или градиент
//$_SESSION['border_cover'] Если true то рисовать границу, иначе нет

