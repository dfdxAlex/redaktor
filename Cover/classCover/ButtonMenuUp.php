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
        //<input class='btn btn-info' type='submit' name='next' value='".new Translation('Вперед')."'>
        //<input class='btn btn-info' type='submit' name='back' value='".new Translation('Назад')."'>
            $rez = "
            <nav class='btn button-language'>
                <form action='#' method='post'>
                    <button class='btn btn-info' name='main'><i class='fa-solid fa-backward'></i></button>
                    <button class='btn btn-info' name='back'><i class='fa-solid fa-arrow-left'></i></button>
                    <button class='btn btn-info' name='next'><i class='fa-sharp fa-solid fa-arrow-right'></i></bytton>
                </form>
            </nav>
            ";

        return $rez;
    }

}
