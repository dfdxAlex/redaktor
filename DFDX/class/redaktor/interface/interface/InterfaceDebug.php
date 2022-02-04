<?php
namespace class\redaktor\interface\interface;

// интерфейс для служебных функций, для отладки
// interfejs funkcji narzędziowych, do debugowania
// interface for utility functions, for debugging


interface InterfaceDebug extends InterfaceWorkToBd
{
    // Функция записывает некоторое сообщение в таблицу `debuger`. Если $kill=true, запись будет одна, если false, то будут добавляться
    // Funkcja zapisuje komunikat do tabeli `debuger`. Jeśli $kill=true, wpis będzie jeden, jeśli false, wpisy zostaną dodane
    // The function writes some message to the `debuger` table. If $kill=true, the entry will be one, if false, then the entries will be added
    public function printTab($mesadz,$kill);

    // Выводит данные из таблицы debuger
    // Wyświetla dane z tabeli debugowania
    // Displays data from the debug table
    public function printTabEcho();

}
