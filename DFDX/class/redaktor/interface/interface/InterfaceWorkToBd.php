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

    // функция проверяет существует ли запись с условиями, входящими во входной параметр. Максимальное число условий 5. Возвращает ID найденной записи
    // funkcja sprawdza, czy istnieje rekord z warunkami zawartymi w parametrze wejściowym. Maksymalna liczba warunków to 5. Zwraca identyfikator znalezionego rekordu
    // the function checks if there is a record with the conditions included in the input parameter. The maximum number of conditions is 5. Returns the ID of the found record
    public function searcIdPoUsloviu($nameTablicy,$usl1,$usl2,$usl3,$usl4,$usl5);

    // Функция проверяет есть ли слово в заданном столбце заданной таблицы. 
    // Funkcja sprawdza, czy w podanej kolumnie danej tabeli znajduje się słowo.
    // The function checks if there is a word in the given column of the given table.
    public function siearcSlova($nameTablice,$stolb,$slovo);

    // функция проверяет есть ли запрет на удаление таблицы, если есть, то возвращает 'Невозможно удалить'
    // funkcja sprawdza, czy istnieje zakaz usunięcia tabeli, jeśli tak, zwraca 'Unable to delete'
    // the function checks if there is a ban on deleting the table, if so, it returns 'Unable to delete'
    public function zapretUdaleniaTablicy($nameTablicy); 

    // Функция ищет в таблице $nameTablicy поля radio и checkbox со значением True, если находит, то возвращает True
    // Funkcja przeszukuje tabelę $nameTablicy w poszukiwaniu pól radiowych i pól wyboru z wartością True, jeśli zostanie znaleziona, a następnie zwraca True
    // The function searches the $nameTablicy table for the radio and checkbox fields with the value True, if found, then returns True
    public function radioAndChekboxSearc($nameTablicy);

    // Функция ищет в таблице столбец 'id_tab_gl', если находит, то возвращает True
    // Funkcja przeszukuje tabelę w poszukiwaniu kolumny „id_tab_gl”, jeśli ją znajdzie, zwraca True
    // The function searches the table for the 'id_tab_gl' column, if it finds it, it returns True
    public function id_tab_gl_searc($nameTablicy);

    // Функция ищет в Базе Данных нужную таблицу. Возвращает true или false
    // Funkcja przeszukuje bazę danych w poszukiwaniu wymaganej tabeli. Zwraca prawda lub fałsz
    // The function searches the database for the required table. Returns true or false
    public function searcNameTablic($nameTablicy);

    //Удаление таблицы из БД через переменную сессии
    //Usunięcie tabeli z bazy danych za pomocą zmiennej sesji
    //Deleting a table from the database via a session variable
    public function killTab($nameTablicy);  

    //Удаление таблицы из БД через входящий параметр
    //Usunięcie tabeli z bazy danych za pomocą parametru wejściowego
    //Deleting a table from the database via an input parameter
    public function killTab2($nameTablicy); 

    //Удаление таблицы из БД если только она не служебная
    //Usunięcie tabeli z bazy danych, chyba że jest to tabela serwisowa
    //Deleting a table from the database, unless it is a service table
    public function killTabEtap1($nameTablicy);

    //Очистка таблицы
    //Wyczyść stół
    //Clear the table
    public function clearTab($nameTablicy);  

    // поиск максимального ID таблицы +1
    //wyszukaj maksymalny identyfikator tabeli +1
    //search for maximum table ID +1
    public function maxIdLubojTablicy($nameTablice);

    // Удалить строку в таблице
    // $nameTablice - имя таблицы $were-условие для удаления включая ключевое слово WHERE
    // Usuń wiersz w tabeli
    // $nameTable - nazwa tabeli $była warunkiem usunięcia, w tym słowo kluczowe WHERE
    // Delete row in table
    // $nameTable - the name of the table $were the condition to delete, including the WHERE keyword
    public function killZapisTablicy($nameTablice,$were);


    // Старая функция
    //Функция проверяет статус в заданной таблице, выводит checked="checked" если статус есть или ''
    //функция из давно забытых времен
    // stara funkcja
    //Funkcja sprawdza status w podanej tabeli, wyprowadza check="sprawdzone" jeśli status istnieje lub ''
    // old function
    //The function checks the status in the given table, outputs checked="checked" if the status exists or ''
    //function from long forgotten times
    //funkcja z dawno zapomnianych czasów
    public function checkedStatus($pole,$str,$status,$nameTable);
}
