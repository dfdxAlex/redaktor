<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с системой обработки нецензурной лексики
// interfejs dla funkcji współpracujących z systemem przetwarzania wulgaryzmów
// interface for functions that work with the profanity processing system


interface InterfaceCollectScolding extends InterfaceFoUser
{

    //первоначальные загрузки данных из таблицы с нецензурной лексикой
    //wstępne ładowanie danych z tabeli z nieprzyzwoitym językiem
    //initial data loads from table with obscene language
    public function initDataWithLanguage();

    // функция проверяет в базе данных включён ли блок кнопок сбора слов нецензурной лексики
    // funkcja sprawdza w bazie danych, czy blok przycisków do zbierania nieprzyzwoitych słów jest włączony
    // the function checks in the database whether the block of buttons for collecting obscene words is enabled
    public function sborMatov();

    // проверяет входной параметр на соответствие мату из базы данных. Проверяется одно слово за 1 закачку данных из БД
    // porównuje parametr wejściowy z matą z bazy danych. Jedno słowo jest sprawdzane dla 1 pobrania danych z bazy danych
    // checks the input parameter against the mat from the database. One word is checked for 1 download of data from the database
    public function proverkaMata($slovo);

    //функция должна разбить текст на оттельные слова и искать мат при условии, что слово не входит в базу исключений.
    //цель в правильном написании слова подстраХуй
    // функция находит совпадения матов и меняет их на звездочки.

    //funkcja powinna podzielić tekst na osobne słowa i wyszukać matę, pod warunkiem, że słowo nie znajduje się w bazie wyjątków.
    // celem jest poprawna pisownia słowa zastraszyć
    // funkcja wyszukuje dopasowania mat i zamienia je na gwiazdki.

    //the function should split the text into separate words and search for a mat, provided that the word is not included in the exception base.
    // the goal is in the correct spelling of the word intimidate
    // the function finds matches of mats and changes them to asterisks.
    public function echoBezMatovPlusIsklucenia($text);

    // функция находит совпадения матов и меняет их на звездочки и выводит результат
    // funkcja wyszukuje dopasowania mat i zamienia je na gwiazdki i wyświetla wynik
    // the function finds matches of mats and changes them to asterisks and displays the result
    public function echoBezMatov($text);

    // функция находит совпадения матов и меняет их на звездочки и возвращает результат
    // funkcja wyszukuje dopasowania mat i zamienia je na gwiazdki i zwraca wynik
    // the function finds matches of mats and changes them to asterisks and returns the result
    public function bezMatov($text); 

    // функция возвращает преобразованные слова для регистронезависимого поиска (скорее всего не применяется)
    // funkcja zwraca przekonwertowane słowa dla wyszukiwania bez rozróżniania wielkości liter (prawdopodobnie nie dotyczy)
    // function returns converted words for case-insensitive search (probably not applicable)
    public function createRegularNotRegistr($value);

    // Функция ищет матерное слово в базе, если находит, то возвращает true
    // Funkcja szuka przekleństwa w bazie danych, jeśli je znajdzie, zwraca true
    // The function looks for a swear word in the database, if it finds it, it returns true
    public function searcMata($mat);

    // Функция ищет слово в базе исключений для матерных слов, если находит, то возвращает true
    // Funkcja szuka słowa w bazie wykluczeń dla przekleństw, jeśli je znajdzie, zwraca true
    // The function looks for a word in the base of exclusions for swear words, if it finds it, it returns true
    public function searcNieMata($nie_mat);

    // Функция быстрого удаление конкретного слова через его кнопку
    // Funkcja szybkiego usuwania określonego słowa za pomocą przycisku
    // Function to quickly delete a specific word through its button
    public function kill_mat();

    // Функция быстрого удаление конкретного слова через его кнопку
    // Funkcja szybkiego usuwania określonego słowa za pomocą przycisku
    // Function to quickly delete a specific word through its button
    public function kill_nie_mat();

    // Функция блокировки пользователя для добавления матов.
    // Funkcja blokowania użytkownika do dodawania mat.
    // User blocking function for adding mats.
    public function list_block_save();

    // Функция быстрое удаление конкретного слова через его кнопку
    // Funkcja szybkiego usuwania określonego słowa za pomocą przycisku
    // Function to quickly delete a specific word through its button
    public function kill_ot_polsovatelej();

    // Функция разблокировка пользователя
    // Funkcja odblokowania użytkownika
    // User unlock function
    public function razblokirovka_polsovatelej();

    // Функция блокировка пользователя
    // Funkcja blokady użytkownika
    // User lock function
    public function zablokirovanMaty();

    // Функция переноса мата из временной таблицы в постоянную
    // Funkcja przeniesienia maty ze stołu tymczasowego na stały
    // The function of transferring a mat from a temporary table to a permanent one
    public function save_ot_polsovatelej();  

    // Работа с меню ретактирования таблицы матов
    // Praca z menu do edycji tabeli mat
    // Working with the menu for editing the table of mats
    public function redactMaty();

    // работаем с заполнением базы матов от пользователей на главной странице сайта
    // pracujemy z wypełnieniem bazy mat od użytkowników na stronie głównej serwisu
    // we work with filling the base of mats from users on the main page of the site
    public function dobavilMat($text);
}
