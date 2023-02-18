<?php
namespace class\redaktor\interface\interface;

// интерфейс для класса работы с типами переменных
// interfejs dla klasy do pracy z typami zmiennych
// interface for the class for working with variable types

// описание функций в TraitInterfaceWorkToType
// opis funkcji w TraitInterfaceWorkToType
// description of functions in TraitInterfaceWorkToType

interface InterfaceWorkToType
{

    //функция возвращает описание разрешенного тега по его имени, если тег не разрешен, то возвращает false
    //funkcja zwraca opis dozwolonego tagu po nazwie, jeśli tag nie jest dozwolony, to zwraca false
    //function returns a description of the allowed tag by its name, if the tag is not allowed, then returns false
    public function tegAllowed($teg);

    // функция возвращает труе, если входящее значение не равно Фальс и не равно NULL и существует
    // function returns true if input value is neither False nor NULL and exists
    public function notFalseAndNULL($data):bool;

    // функция выводит на экран массив неизвестного уровня - главная задача
    // функция выводит тип переменной и её значение если это не массив
    // функция просматривает до 9-ти мерные массивы включительно
    // the function displays an array of an unknown level - the main task
    // the function prints the type of the variable and its value if it is not an array
    // the function looks up to 9-dimensional arrays inclusive
    public function printMas($mas);

    // функция возвращает текстовое значение переданного параметра булеан или нулл или false, 
    // если параметр не соответствует этим типам
    // the function returns the text value of the passed parameter boolean or null or false,
    // if the parameter does not match these types
    public function trueFalseNull($param);

    //Функция очищает код от вредных тегов оставляя только разрешенные
    //Funkcja czyści kod ze szkodliwych tagów, pozostawiając tylko dozwolone
    //The function cleans the code from harmful tags, leaving only allowed ones
    public function clearCode($cod,...$parametr);

    // проверяет есть ли значение переменной $slowo в массиве $mas. Можно заменить на использование регулярных выражений
    // sprawdza, czy wartość zmiennej $slowo znajduje się w tablicy $mas. Można zastąpić wyrażeniami regularnymi
    // checks if the value of the $slowo variable is in the $mas array. Can be replaced with regular expressions
    public function proverkaMassiwa($mas,$slowo);

    //функция преобразовывает русское слово в транслит
    //funkcja zamienia rosyjskie słowo na transliterację
    //function converts a Russian word into transliteration
    public function translit($string);

    //функция заменяет unicod в символ кирилицы, в том числе старые и специальные символы кирилицы Кириллица (блок Юникода)
    //funkcja zastępuje Unicode znakiem cyrylicy, w tym stare i specjalne znaki cyrylicy Cyrylica (blok Unicode)
    //function replaces unicode with a Cyrillic character, including old and special Cyrillic characters Cyrillic (Unicode block)
    public function translitUnicodToCirilCompact($string);
}
