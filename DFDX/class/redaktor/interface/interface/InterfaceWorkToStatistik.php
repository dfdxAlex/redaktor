<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих со статистикой
// interfejs dla funkcji pracujących ze statystykami
// interface for functions working with statistics

interface InterfaceWorkToStatistik extends InterfaceWorkToMenu
{
    // функция включения/отключения статистики
    // funkcja włączania/wyłączania statystyk
    // function to enable/disable statistics
    public function statistikOnOff();

    // функция возвращает дату последнего запроса к БД
    // funkcja zwraca do bazy datę ostatniego zapytania
    // the function returns the date of the last query to the database
    public function dataObnov();

    // число запросов к базе данных
    // liczba zapytań do bazy danych
    // number of requests to the database
    public function kolZaprosow();

    // увеличение запроссов к метке на 1
    // zwiększ liczbę żądań do etykiety o 1
    // increase requests to the label by 1
    public function metkaStatistika($metka);

    // чтение числа запроссов к метке
    // odczytaj liczbę żądań do etykiety
    // read the number of requests to the label
    public function getMetkaStatistik($metka);
}
