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
        if ($_SESSION['status']>0)
            $save="<input type='submit' name='save' value='".new Translation('Сохранить')."' formaction='#'>";

        if ($_SESSION['level']!=1000 && $_SESSION['level']!=10)
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post'>
                    <input type='submit' name='main' value='".new Translation('На главную')."'>
                    <input type='submit' name='back' value='".new Translation('Назад')."'>
                    <input type='submit' name='next' value='".new Translation('Вперед')."'>
                    <input type='submit' name='setting' value='".new Translation('Настройки')."'>
                    $save
                </form>
            </nav>
            ";
            
        // ставит кнопки сохранения и возврат, если перешли в настройки или только возврат, если перешли в сохранение данных
        if ($_SESSION['level']==1000 || $_SESSION['level']==1001) {
            $saveKillMenuUp = '';
            if ($_SESSION['level']==1000) $saveKillMenuUp="<input type='submit' name='save_setting' value='".new Translation('Сохранить')."'>";
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post' id='form_setting'>
                    $saveKillMenuUp
                    <input type='submit' name='leave_setting' value='".new Translation('Назад')."'>
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
