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

    // функция вывода большого шаблона
    // duża funkcja wyjścia wzoru
    // big pattern output function
    public function hablon($nameTablic);

    //привязка с помощью классов будет в том случае, если нет привязки с помощью фальш-тега "источник ссылки"
    //функция должна вывести ссылку на картинку, используя ключевое слово - второй тег класса. (класс связи - у картинки и у строки, содержащей ссылку должен быть одинаковый второй класс)
    //$classKontakt - вторая часть класса, общая для картинки и поля с ссылкой на картинку, если параметр будет пустым, то функция найдёт картинку по координатам и выделит класс
    //powiązanie za pomocą klas nastąpi w przypadku braku powiązania za pomocą fałszywego tagu „źródło linku”
    //funkcja powinna wyświetlać link do obrazka za pomocą słowa kluczowego - tagu drugiej klasy. (klasa linku - obraz i linia zawierająca link muszą mieć tę samą drugą klasę)
    //$classKontakt - druga część klasy, wspólna dla obrazka oraz pole z linkiem do obrazka, jeśli parametr jest pusty, funkcja wyszuka obraz po współrzędnych i wybierze klasę
    //binding using classes will be in the event that there is no binding using the false tag "link source"
    //the function should display a link to the image using the keyword - the second class tag. (link class - the image and the line containing the link must have the same second class)
    //$classKontakt - the second part of the class, common for the image and the field with a link to the image, if the parameter is empty, the function will find the image by coordinates and select the class
    public function searcUrlImage($nameTablic,$str,$stolb,$classKontakt);

    //Вывести значение столбца инфо из базы по строке и столбцу
    //Wyświetl wartość kolumny info z bazy danych według wiersza i kolumny
    //Display the value of the info column from the database by row and column
    public function loadInfoData($nameTablic,$str,$stolb);

    // Функция делает запись в таблицу Дата либо исправляет старую
    // Funkcja zapisuje do tabeli Date lub koryguje starą
    // The function writes to the Date table or corrects the old one
    public function saveStrData($nameTablic,$str,$stolb,$info,$dopis);

    // Функция обрабатывает нажатие кнопки Сохранить профиль // запись шаблона
    // funkcja obsługuje przycisk Zapisz profil kliknij // wpis szablonu
    // The function handles the Save profile button click // template entry
    public function saveProfil($nameTablic,$dopis);

    // прикладная функция преобразовывает блок статусов в строку для БД
    // параметр $nameStatus - это общее имя чекбоксов, к которым прибавится номер порядковый
    // Работает с массивом POST
    // funkcja aplikacji konwertuje blok statusu na ciąg dla bazy danych
    // parametr $nameStatus to wspólna nazwa pól wyboru, do których zostanie dodany numer seryjny
    // Działa z tablicą POST
    // application function converts the status block into a string for the database
    // the $nameStatus parameter is the common name of the checkboxes to which the serial number will be added
    // Works with the POST array
    public function statusVStroku($nameStatus);

    //делает строку с аттрибутами для конкретного тега
    //tworzy ciąg z atrybutami dla określonego tagu
    //makes a string with attributes for a specific tag
    public function strokaAttrbutov($nameTable,$teg,$str,$pole,$tegOpen,$tegClose);

    // добыть значение аттрибута для размножения checkbox radio
    // pobierz wartość atrybutu do propagowania pola wyboru radia
    // get attribute value for propagating checkbox radio
    public function nameAttibuta($nameTable,$str,$poz,$attrib);

    // определить число строк в checkbox radio
    // określ liczbę linii w radiu checkbox
    // determine the number of lines in the checkbox radio
    public function nomerChecboxRadio($nameTable,$str,$poz);

    // Запись статусов для разрешения
    // Zapisz statusy do rozwiązania
    // Write statuses for resolution
    public function saveStatusRazreshenia($nameTable,$nameButton);

    //записываем аттрибут тега
    //zapisz atrybut tagu
    //write tag attribute
    public function saveAttribTega($nameTable,$teg,$attrib,$nameButton,$text,$striliint);

    //определяет к какому тегу относится аттрибут
    //określa, do którego tagu należy atrybut
    //determines which tag the attribute belongs to
    public function selectValue($attrib);

    // поиск названия кнопки в редакторе большого шаблона, которая была нажата
    // wyszukaj nazwę przycisku w dużym edytorze szablonów, który został kliknięty
    // search for the name of the button in the large template editor that was clicked
    public function poiskButtonName();

    // Ищем местоположение текущего блока
    // Poszukaj lokalizacji bieżącego bloku
    // Look for the location of the current block
    public function nomerStrokRadio($nameSelect,$nameTablic);

    // Строит меню выпадающее из аттрибутов, для конкретного тега
    // Tworzy menu rozwijane atrybutów dla określonego tagu
    // Builds an attribute dropdown menu for a specific tag
    public function attribTega($nameSelect,$teg,$nameTablic);

    // Список универсальных аттрибутов
    // Lista uniwersalnych atrybutów
    // List of universal attributes
    public function attribUniwersalnye($nameSelect);

    //Список событий
    //Lista wydarzeń
    //List of events
    public function sobytia($nameSelect);

    //возвращает значение аттрибуда
    //zwraca wartość atrybutu
    //returns the attribute value
    public function poiskSwoistvaTega($nameTable,$teg,$attrib,$str,$pole);

    // Создает таблицу для меню
    // Tworzy tabelę dla menu
    // Creates a table for the menu
    public function createFormTablicyMenu($nameTablic,$kol_voStrokVvod);

    // Функция выводит вспомогательную информацию во время редактирования таблицы меню
    // Funkcja wyświetla informacje pomocnicze podczas edycji tabeli menu
    // The function displays auxiliary information while editing the menu table
    public function infoMenu($nameTablic);

     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.

     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.

     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     public function saveFormTablicyMenu($nameTablic);

}
