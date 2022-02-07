<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с нижней частью сайта
// interfejs dla funkcji, które działają na dole strony
// interface for functions that work with the bottom of the site

interface InterfaceWorkToFutter extends InterfaceWorkToMenu
{
    // функция выводит нижний блок сайта
    // funkcja wyświetla dolny blok strony
    // function displays the bottom block of the site
    public function futterR(...$parametr);

    // функция выводит дату редактирования сайта, Не Работает
    // funkcja wyświetla datę edycji strony, Nie działa
    // function displays the date the site was edited, Doesn't work
    public function dataRedaktSite();
}
