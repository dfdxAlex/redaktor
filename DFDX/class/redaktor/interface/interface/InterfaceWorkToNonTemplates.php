<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с основной частью сайта
// interfejs dla funkcji współpracujących z główną częścią serwisu
// interface for functions that work with the main part of the site

interface InterfaceWorkToNonTemplates extends InterfaceWorkToMenu
{
    // функция отображает правое меню на сайте
    // funkcja wyświetla odpowiednie menu na stronie
    // function displays the right menu on the site

    // параметр $kluc задает категорию статей, с которыми работает правое меню
    // parametr $kluc ustawia kategorię artykułów, z którymi współpracuje odpowiednie menu
    // parameter $kluc sets the category of articles that the right menu works with

    // параметр InterfaceWorkToStatistik - это любой объект данного типа
    // parametr InterfaceWorkToStatistik to dowolny obiekt tego typu
    // InterfaceWorkToStatistik parameter is any object of this type
    public function rightMenu(InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc);

    // функция отображает правое меню на сайте
    // funkcja wyświetla odpowiednie menu na stronie
    // function displays the right menu on the site

    // параметр $kluc задает категорию статей, с которыми работает правое меню
    // parametr $kluc ustawia kategorię artykułów, z którymi współpracuje odpowiednie menu
    // parameter $kluc sets the category of articles that the right menu works with

    // параметр InterfaceWorkToStatistik - это любой объект данного типа
    // parametr InterfaceWorkToStatistik to dowolny obiekt tego typu
    // InterfaceWorkToStatistik parameter is any object of this type
    function pravoePole(InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc);
}
