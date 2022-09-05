<?php
namespace classCover;

// класс выводит кнопки Вперед, Назад, В начало
class ButtonMenuUp
{
    public function __construct()
    {

        Level::levelHunt();
    }

    public function __toString()
    {
        $rez='';
        // Если не находимся в режиме настройки, то показать кнопки навигации по страницам
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post'>
                    <input class='btn btn-info' type='submit' name='main' value='".new Translation('На главную')."'>
                    <input class='btn btn-info' type='submit' name='back' value='".new Translation('Назад')."'>
                    <input class='btn btn-info' type='submit' name='next' value='".new Translation('Вперед')."'>
                </form>
            </nav>
            ";

        return $rez;
    }

}
