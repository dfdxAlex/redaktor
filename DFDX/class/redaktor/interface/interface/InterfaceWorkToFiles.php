<?php
namespace class\redaktor\interface\interface;

//интерфейс функций, работающих с файлами
//interfejs funkcji plików
//file functions interface

interface InterfaceWorkToFiles
{
   //Функция возвращает имя и относительный путь к файлу при условии, что искомый файл находится выше текущего места.
   //Funkcja zwraca nazwę i ścieżkę względną do pliku, pod warunkiem, że wyszukiwany plik znajduje się powyżej bieżącej lokalizacji.
   //The function returns the name and relative path to the file, provided that the searched file is above the current location.
   public function searcNamePath($nameFile);
}
