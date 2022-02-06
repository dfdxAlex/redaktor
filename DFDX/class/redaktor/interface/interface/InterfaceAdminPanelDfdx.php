<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, реализующих работу административной панели CMS-DFDX
// interfejs dla funkcji realizujących pracę panelu administracyjnego CMS-DFDX
// interface for functions that implement the work of the CMS-DFDX administrative panel


interface InterfaceAdminPanelDfdx extends InterfaceWorkToMenu
{
    // Функция читает из таблицы имя последней редактируемой таблицы и помещает с поле меню административной панели
    // Funkcja odczytuje z tabeli nazwę ostatnio edytowanej tabeli i umieszcza ją w polu menu panelu administratora
    // The function reads the name of the last edited table from the table and places it in the admin panel menu field
    public function startMenuRedaktora();

    //Узнает у менюшки общий класс у всех кнопок или у каждой кнопки свой класс
    //Rozpoznaje ogólną klasę menu dla wszystkich przycisków lub każdy przycisk ma swoją własną klasę
    //Recognizes the general class of the menu for all buttons or each button has its own class
    public function kakovClass($nameMenu);

    // Создаем главное поле таблицы большого шаблона
    // Utwórz główne pole dużej tabeli szablonów
    // Create the main field of the large template table
    public function createTablicySawe($nameTable);

    // рисуем поле для редактирования таблицы
    // narysuj pole do edycji tabeli
    // draw a field for editing the table
    public function createPoleTablicy($nameTable,$col,$str);

    // Выводит блок для ввода числа столбцов и строк в создаваемой таблице для большого шаблона
    // Wyświetla blok do wprowadzania liczby kolumn i wierszy w tworzonej tabeli dla dużego szablonu
    // Displays a block for entering the number of columns and rows in the created table for a large template
    public function createStyleTabUParametryTabliws();

    // На этапе создания таблицы для большого шаблона функция проверяет свободно ли имя, для создаваемой таблицы.
    // Na etapie tworzenia tabeli dla dużego szablonu funkcja sprawdza, czy nazwa dla tworzonej tabeli jest wolna.
    // At the stage of creating a table for a large template, the function checks whether the name is free for the created table.
    public function createStyleTabUProwerkaImeni($nameTable);

    // Обработка нажатия кнопки Список таблиц
    // Przycisk obsługi kliknij Lista tabel
    // Handling button click List of tables
    public function nazataPokazatSpisokTablic();

    // функция запоминает имя последней таблицы, по которой клацнули из Списка таблиц
    // funkcja zapamiętuje nazwę ostatniej klikniętej tabeli z Listy tabel
    // the function remembers the name of the last table clicked on from the Table List
    public function saveNameTable($nameTable);

    // Обработка нажатия на кнопку Создать Меню
    // Obsługa kliknięcia przycisku Utwórz menu
    // Handling clicking on the Create Menu button
    public function createNameMenu($nameTablic);

    // Создание пустой таблицы для нового меню
    // Utwórz pustą tabelę dla nowego menu
    // Create an empty table for the new menu
    public function createTabDlaMenu();

    // Создание пустой таблицы для нового меню типа 5 и выше
    // Utwórz pustą tabelę dla nowego menu typu 5 i nowszego
    // Create an empty table for a new menu type 5 and higher
    public function createTabDlaMenu5();

    //Загрузить таблицу большого шаблона
    //Załaduj dużą tabelę szablonów
    //Load large template table
    public function loadTablic($nameTablic);

    // Функция возвращает число уровней большого шаблона
    // Funkcja zwraca liczbę poziomów dużego szablonu
    // The function returns the number of levels of the large template
    public function cisloUrovnejHablon($nameTablice);

    // Функция возвращает число столбцов большого шаблона
    // Funkcja zwraca liczbę kolumn dużego szablonu
    // The function returns the number of columns of the large template
    public function cisloStolbovjHablon($nameTablice);

    //достаем тег из бд
    // pobierz tag z bazy danych
    // get the tag from the database
    public function setapTeg($nameTablice,$nameAtrib,$stolb,$str);

    // Проверяем статус кнопки
    // Sprawdź stan przycisku
    // Check button status
    public function statusRegiHablon($nameTablic,$stolb,$str);

}
