<?php
namespace classCV;

// класс выводит кнопки Вперед, Назад, В начало
class ButtonMenuUp
{
    public function __toString()
    {
        $rez='';
        // Если не находимся в режиме настройки, то показать кнопки навигации по страницам
        $save='';
        $load='';
        $br='';
        if (!isset($_SESSION['status'])) $_SESSION['status']=0;
        if ($_SESSION['status']>0) {
            $save="<input type='submit' name='save' value='".new \class\nonBD\Translation('Сохранить')."' formaction='#'>";
            $load="<input type='submit' name='load' value='".new \class\nonBD\Translation('Загрузить')."' formaction='#'>";
            $br='<br>';
        }
        
        if ($_SESSION['level']!=1000 && $_SESSION['level']!=10)
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post'>
                    <input type='submit' name='main' value='".new \class\nonBD\Translation('На главную')."'>
                    <input type='submit' name='back' value='".new \class\nonBD\Translation('Назад')."'>
                    <input type='submit' name='next' value='".new \class\nonBD\Translation('Вперед')."'>$br
                    <input type='submit' name='setting' value='".new \class\nonBD\Translation('Настройки')."'>
                    $save
                    $load
                </form>
            </nav>
            ";

        // ставит кнопки сохранения и возврат, если перешли в настройки или только возврат, если перешли в сохранение данных
        if ($_SESSION['level']==1000 || $_SESSION['level']==1001) {
            $saveKillMenuUp = '';
            $loadKillMenuUp = '';
            if ($_SESSION['level']==1000) {
                $saveKillMenuUp="<input type='submit' name='save_setting' value='".new \class\nonBD\Translation('Сохранить')."'>";
                //$loadKillMenuUp="<input type='submit' name='load_setting' value='".new \class\nonBD\Translation('Загрузить')."'>";
            }
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post' id='form_setting'>
                    $saveKillMenuUp
                    <input type='submit' name='leave_setting' value='".new \class\nonBD\Translation('Назад')."'>
                </form>
            </nav>
            ";
        }
        // Если кнопка не должна показываться при генерации CV, то выводим только форму, а кнопка возврата будет вставлена через JS
        // в методе создания CV готового для сохранения. public function createCV() класса CVCreate
        if ($_SESSION['level']==10)
        $rez = "
        <nav>
            <form action='#' method='post' id='form_setting'>
            </form>
        </nav>
        ";
        

        return $rez;
    }

}
