<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с базой данных
// interfejs dla funkcji pracujących z bazą danych
// interface for functions working with the database

interface InterfaceWorkToBd
{
    // функция возвращает параметр host для подключения к базе данных.
    // funkcja zwraca parametr hosta do połączenia z bazą danych.
    // the function returns the host parameter for connecting to the database.
    public function initBdHost();

    // функция возвращает имя пользователя базы данных.
    // funkcja zwraca nazwę użytkownika bazy danych.
    // function returns the name of the database user.
    public function initBdLogin();

    // функция возвращает пароль пользователя базы данных
    // funkcja zwraca hasło użytkownika bazy danych
    // the function returns the password of the database user
    public function initBdParol();

    //функция возвращает имя базы данных
    //funkcja zwraca nazwę bazy danych
    //function returns database name
    public function initBdNameBD();

    //функция возвращает главную страницу сайта
    //funkcja zwraca stronę główną serwisu
    //function returns the main page of the site
    public function initsite();
}
