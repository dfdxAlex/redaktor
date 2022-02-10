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

    // Функция выводит статью с помощью функции news1
    // параметр Modul $modul необходим для передачи в функцию объекта класса Modul, в котором и живёт news1()
    // параметр $action - это страница обработки news1, передается в функцию news1
    // параметр $nomerNewsGlawn определяет сколько статей будет показано на одной странице
    // параметр $runNewsIsNews1 принимает значение ИД статьи, которую нужно показать на странице персональной ссылки
    public function publishNews(\class\redaktor\Modul $modul,string $action,string $nomerNewsGlawn, int $runNewsIsNews1);
}
