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
    public function rightMenu(InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc, int $nBootton=1000000);

    // функция отображает правое меню на сайте
    // funkcja wyświetla odpowiednie menu na stronie
    // function displays the right menu on the site

    // параметр $kluc задает категорию статей, с которыми работает правое меню
    // parametr $kluc ustawia kategorię artykułów, z którymi współpracuje odpowiednie menu
    // parameter $kluc sets the category of articles that the right menu works with

    // параметр InterfaceWorkToStatistik - это любой объект данного типа
    // parametr InterfaceWorkToStatistik to dowolny obiekt tego typu
    // InterfaceWorkToStatistik parameter is any object of this type
    function pravoePole(InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc, int $nBootton=1000000);

    // Функция выводит статью с помощью функции news1
    // параметр Modul $modul необходим для передачи в функцию объекта класса Modul, в котором и живёт news1()
    // параметр $action - это страница обработки news1, передается в функцию news1
    // параметр $nomerNewsGlawn определяет сколько статей будет показано на одной странице
    // параметр $runNewsIsNews1 принимает значение ИД статьи, которую нужно показать на странице персональной ссылки
    // параметр nameBD определяет имя таблицы, в которой лежат статьи функции news1
    // параметр string $searchСategory определяет, с какими категориями функция poiskStati() будет работать.
    // параметр string $articleSection определяет, с какими категориями функция news1() будет работать.

    // Funkcja wyświetla artykuł za pomocą funkcji news1
    // Parametr Modul $modul jest wymagany do przekazania obiektu klasy Modul do funkcji, w której znajduje się news1()
    // $action parametr to strona przetwarzania news1, przekazana do funkcji news1
    // parametr $nomerNewsGlawn określa, ile artykułów zostanie pokazanych na jednej stronie
    // parametr $runNewsIsNews1 przyjmuje wartość identyfikatora artykułu, który ma być wyświetlany na osobistej stronie linku
    // parametr nameBD definiuje nazwę tabeli zawierającej artykuły funkcji news1
    // parametr ciągu $searchCategory określa, z którymi kategoriami będzie pracować funkcja poiskStati().
    // parametr ciągu $articleSection określa, z którymi kategoriami będzie działać funkcja news1().

    // The function displays the article using the news1 function
    // The Modul $modul parameter is required to pass an object of the Modul class to the function, in which news1() lives
    // $action parameter is news1 processing page, passed to news1 function
    // parameter $nomerNewsGlawn determines how many articles will be shown on one page
    // parameter $runNewsIsNews1 takes the value of the ID of the article to be shown on the personal link page
    // the nameBD parameter defines the name of the table containing the news1 function articles
    // string parameter $searchCategory determines which categories the poiskStati() function will work with.
    // string parameter $articleSection determines which categories the news1() function will work with.
    public function publishNews(\class\redaktor\Modul $modul,string $action,string $nomerNewsGlawn, int $runNewsIsNews1, string $nameBD, string $searchСategory, string $articleSection, string $twitter);

    // функция выводит левое меню на странице сайта
    // funkcja wyświetla lewe menu na stronie serwisu
    // function displays the left menu on the site page
    public function leftMenu();
}
