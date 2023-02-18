<?php
namespace class\redaktor\interface\interface;

// интерфейс для служебных функций, для отладки
// interfejs funkcji narzędziowych, do debugowania
// interface for utility functions, for debugging


interface InterfaceDebug
//extends InterfaceWorkToBd
{

    // Функция пишет сообщение, если есть отправленный заголовок
    public function headerTrue(string $mesage=null);

    // Функция записывает некоторое сообщение в таблицу `debuger`. Если $kill=true, запись будет одна, если false, то будут добавляться
    // Funkcja zapisuje komunikat do tabeli `debuger`. Jeśli $kill=true, wpis będzie jeden, jeśli false, wpisy zostaną dodane
    // The function writes some message to the `debuger` table. If $kill=true, the entry will be one, if false, then the entries will be added
    public function printTab($mesadz,$kill);

    // Выводит данные из таблицы debuger
    // Wyświetla dane z tabeli debugowania
    // Displays data from the debug table
    public function printTabEcho();

    // функция выводит на echo путь к файлу, в котором находится функция. 
    // реагирует функция на параметр 
    // функция работает только если $_SESSION['domDom'] === true.
    // синтаксис domDom(func_get_args());

    // funkcja wyświetla na echo ścieżkę do pliku, w którym znajduje się funkcja.
    // funkcja reaguje na parametr
    // funkcja działa tylko wtedy, gdy $_SESSION['domDom'] === true.
    // składnia domDom(func_get_args());
    
    // the function outputs on echo the path to the file in which the function is located.
    // the function reacts to the parameter
    // function only works if $_SESSION['domDom'] === true.
    // syntax domDom(func_get_args());
    public function domDom(array $masArgument);

}
