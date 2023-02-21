<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с базой данных
// interfejs dla funkcji pracujących z bazą danych
// interface for functions working with the database

interface InterfaceWorkToBd
{
    //Подключение к базе данных. Параметры подключения находятся в файле initBD.ini
    //Połączenie z bazą danych. Ustawienia połączenia znajdują się w pliku initBD.ini
    //Database connection. The connection settings are in the file initBD.ini
    public function connectToBd();

    // функция возвращает параметр host для подключения к базе данных.
    // funkcja zwraca parametr hosta do połączenia z bazą danych.
    // the function returns the host parameter for connecting to the database.
    //устарел/outdated
    //public function initBdHost();

    // функция возвращает имя пользователя базы данных.
    // funkcja zwraca nazwę użytkownika bazy danych.
    // function returns the name of the database user.
    //устарел/outdated
    //public function initBdLogin();

    // функция возвращает пароль пользователя базы данных
    // funkcja zwraca hasło użytkownika bazy danych
    // the function returns the password of the database user
    //устарел/outdated
    //public function initBdParol();

    //функция возвращает имя базы данных
    //funkcja zwraca nazwę bazy danych
    //function returns database name
    //устарел/outdated
    //public function initBdNameBD();

    //функция возвращает главную страницу сайта
    //funkcja zwraca stronę główną serwisu
    //function returns the main page of the site
    //устарел/outdated
    //public function initsite();

    //функция возвращает почту, которая используется для отправки писем и работает с PHPMailer
    //funkcja zwraca pocztę używaną do wysyłania e-maili i współpracuje z PHPMailer
    //function returns the mail that is used to send emails and works with PHPMailer
    //устарел/outdated
    //public function initMailFoPhpMailer();

    //функция возвращает пароль к почте, которая используется для отправки писем и работает с PHPMailer
    //funkcja zwraca hasło do poczty używanej do wysyłania e-maili i współpracuje z PHPMailer
    //function returns the password for the mail that is used to send emails and works with PHPMailer
    //устарел/outdated
    //public function initParolFoMailFoPhpMailer();

    //функция возвращает корневой каталог сайта. Полезна в тех случаях, когда необходимо задать не стандартный домашний каталог сайте
    //funkcja zwraca katalog główny serwisu. Przydatne w przypadkach, gdy konieczne jest ustawienie niestandardowego katalogu domowego witryny
    //function returns the root directory of the site. Useful in cases where it is necessary to set a non-standard site home directory
    //устарел/outdated
    //public function siteRootDirectory();

    //функция возвращает главную страницу сайта. Точный аналог функции initsite();
    //funkcja zwraca stronę główną serwisu. Dokładny odpowiednik funkcji initsite();
    //function returns the main page of the site. The exact analogue of the initsite() function;
    public function nameGlawnogoSite();

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

    // создать SQL запрос, условие согласно синтаксису SQL, 
    // в административном меню можно включить или выключить статистику запросов в базу данных через данную функцию.
    // utwórz zapytanie SQL, warunek zgodnie ze składnią SQL,
    // w menu administracyjnym możesz włączyć lub wyłączyć statystyki zapytań do bazy danych za pomocą tej funkcji.
    // create SQL query, condition according to SQL syntax,
    // in the administrative menu, you can enable or disable the statistics of requests to the database through this function.
    public function zaprosSQL($zapros);

    // проверяет принадлежит ли таблица какому-нибудь меню, возвращает ID имени таблицы в "tablice_tablic"
    // данные берутся из служебной таблицы "tablica_tablic"
    // данные в "tablica_tablic" помещаются при создании таблицы для меню через административную панель 
    // sprawdza, czy tabela należy do jakiegoś menu, zwraca identyfikator nazwy tabeli w "table_tablic"
    // dane są pobierane z tabeli usług "table_tablic"
    // dane w "table_tablic" są umieszczane podczas tworzenia tabeli dla menu za pomocą panelu administracyjnego
    // checks if the table belongs to some menu, returns the ID of the table name in "table_tablic"
    // data is taken from the service table "table_tablic"
    // data in "table_tablic" is placed when creating a table for the menu through the admin panel
    public function tablicaDlaMenu($nameTablice);

    // считает число записей в таблице
    // zlicza liczbę rekordów w tabeli
    // counts the number of records in the table
    public function kolVoZapisTablice($nameTablice);


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

    // подсчёт числа столбцов в таблице
    // liczenie ilości kolumn w tabeli
    // counting the number of columns in the table
    public function kolVoStolbovTablice($nameTablice);

    //функция проверяет есть ли таблица и если нет, то создает её
    //funkcja sprawdza, czy istnieje tabela, a jeśli nie, to ją tworzy
    //the function checks if there is a table and if not, then creates it
    public function createTab(...$parametr); 

    //функция проверяет существуют ли служебные таблицы, если нет, то создает их.
    //funkcja sprawdza, czy istnieją tabele usług, jeśli nie, a następnie je tworzy.
    //the function checks whether service tables exist, if not, then creates them.
    public function tableValidationCMS();

    // Переходит на главную страницу сайта, страница берется из файли initBd.ini
    // Przechodzi do strony głównej serwisu, strona jest pobierana z plików initBd.ini
    // Goes to the main page of the site, the page is taken from the initBd.ini files
    public function naGlavnuStranicu();

    // Обновить страницу redaktor.php
    // Odśwież stronę redaktor.php
    // Refresh page redaktor.php
    public function tutObnovit();
}
