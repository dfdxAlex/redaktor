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

    // функция закрывает документ подключая всё, необходимое. в конце функция закрывает body и html
    // funkcja zamyka dokument, w tym wszystko, co potrzebne. na końcu funkcja zamyka body i html
    // the function closes the document, including everything needed. at the end the function closes body and html
    public function closeHtmlDok();

    // Функция выводит футтер общий.
    // Funkcja wyświetla ogólną stopkę.
    // The function outputs the general footer.

    // параметр $interfaceStatistik - это любой объект типа InterfaceWorkToStatistik
    // параметр $metka - это слово-метка, используется для ведения статистики для каждой страницы.
    // parametr $interfaceStatistik jest dowolnym obiektem typu InterfaceWorkToStatistik
     // parametr $metka to słowo etykiety używane do przechowywania statystyk dla każdej strony.
    // parameter $interfaceStatistik is any object of type InterfaceWorkToStatistik
     // the $metka parameter is a label word used to keep statistics for each page.
    public function futterGeneral(InterfaceWorkToStatistik $interfaceStatistik, string $metka);
}
