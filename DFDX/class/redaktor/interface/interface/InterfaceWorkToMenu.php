<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих меню
// interfejs funkcji menu
// interface for menu functions

interface InterfaceWorkToMenu extends interface\interface\InterfaceCollingScolding
{
     
     // Служебные функции. Функция возвращает имя кнопки из таблицы менюшки по ID
     // Funkcje użytkowe. Funkcja zwraca nazwę przycisku z tabeli menu według ID
     // Utility functions. The function returns the name of the button from the menu table by ID
     public function getNamepoId($tab,$id);

     // Функция возвращает тип менюшки с заданным именем
     // Funkcja zwraca typ menu o podanej nazwie
     // The function returns the menu type with the given name
     public function typMenu($nameTablic);

     // Функция исправляет или изменяет тип уже существующей менюшки
     // Funkcja naprawia lub zmienia typ już istniejącego menu
     // The function fixes or changes the type of an already existing menu
     public function saveTypMenu($nameTablic,$typ);

     // Функция создает запись о новой менюшке
     // Funkcja tworzy nowy wpis w menu
     // The function creates a new menu entry
     public function createTypMenu($nameTablic,$typ);

     //Функция реализовывает возможность запуска методов menu с помощью магического метода __unserialize
     // $data[0] - текстовое название метода, на пример 'menu9'
     // $data[1] - имя таблицы метода, на пример 'menu_up_dfdx'
     // $data[2] - страница обработчика, на пример 'dfdx.php'
     // $data[3+n] - надписи каждого текстового поля, параметр value, использует глобальный массив класса

     //Funkcja implementuje możliwość uruchamiania metod menu za pomocą metody __unserialize magic
     // $data[0] - nazwa tekstowa metody, na przykład 'menu9'
     // $data[1] - nazwa tabeli metod, na przykład 'menu_up_dfdx'
     // $data[2] - strona obsługi, na przykład 'dfdx.php'
     // $data[3+n] - etykiety każdego pola tekstowego, parametr wartości, używa globalnej tablicy klasy

     //The function implements the ability to launch menu methods using the __unserialize magic method
     // $data[0] - text name of the method, for example 'menu9'
     // $data[1] - method table name, for example 'menu_up_dfdx'
     // $data[2] - handler page, for example 'dfdx.php'
     // $data[3+n] - labels of each text field, value parameter, uses the class's global array
     public function __unserialize(array $data);

     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // default link parameter sends the user to the main page of the site
     public function menu($nameTablic);

     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // Добавлена возможность управлять выводом кнопок с помощью двоичного кода. $kod=1(1) - будет выведена первая кнопка,
     // $kod=2(10) - будет выведена вторая кнопка, $kod=3(11) - будет выведена первая и вторая кнопка.
     // Максимальное значение $kod=32768(1111111111111111) - 2 байта или 16 единиц.
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // Dodano możliwość sterowania wyjściem przycisków za pomocą kodu binarnego. $kod=1(1) - zostanie wyświetlony pierwszy przycisk,
     // $kod=2(10) - zostanie wyświetlony drugi przycisk, $kod=3(11) - zostanie wyświetlony pierwszy i drugi przycisk.
     // Maksymalna wartość $kod=32768(1111111111111111) - 2 bajty lub 16 jednostek.
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // Added the ability to control the output of buttons using binary code. $kod=1(1) - the first button will be displayed,
     // $kod=2(10) - the second button will be displayed, $kod=3(11) - the first and second buttons will be displayed.
     // Maximum value $kod=32768(1111111111111111) - 2 bytes or 16 units.
     // link parameter default sends the user to the main page of the site
     public function menu2($nameTablic,$kod);

     // Запускаем через магический метод __unserialize(nameTablic,array('Редактор','Аматор'));
     // первый параметр - это имя таблицы, второй - это массив названий кнопок. Массив безразмерный, пишем то название кнопок, которое отображается на сайте.
     // простая функция, выводит из базы меню все кнопки согласно очереди в массиве
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // Внимание!! Название кнопки при вызове магическим методом должно совпадать с названием кнопки в базе данных
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // Uruchom magiczną metodę __unserialize(nameTablic,array('Editor','Amateur'));
     // pierwszy parametr to nazwa tabeli, drugi to tablica nazw przycisków. Tablica jest bezwymiarowa, piszemy nazwy przycisków, które wyświetlają się na stronie.
     // prosta funkcja, wyświetla wszystkie przyciski z bazy menu zgodnie z kolejnością w tablicy
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // Uwaga!! Nazwa przycisku wywołana metodą magic musi odpowiadać nazwie przycisku w bazie danych
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // Run through the magic method __unserialize(nameTablic,array('Editor','Amateur'));
     // the first parameter is the name of the table, the second is the array of button names. The array is dimensionless, we write the name of the buttons that is displayed on the site.
     // simple function, displays all buttons from the menu base according to the order in the array
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // Attention!! The name of the button when called by the magic method must match the name of the button in the database
     // link parameter default sends the user to the main page of the site
     public function menu3($nameTablic);

     // Внимание!!! Меню как ссылочное не использовать!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     //При запуске через Магический метод:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // Uwaga!!! Nie używaj menu jako odniesienia!!
     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // styl nazwa klasy text.$nameTablic.number
     // $url ustawia link, do którego idziemy po kliknięciu jednego z przycisków
     // Jeśli pole linku w bazie danych nie jest tekstowe i nie jest zresetowane, to przycisk przesyłania
     // Jeśli pole link w bazie danych to tekst , narysuj pole wejściowe
     // Jeśli pole łącza w bazie danych zostało zresetowane, narysuj przycisk resetowania
     //Po uruchomieniu metodą Magic:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Pierwszy parametr to nazwa funkcji, drugi parametr to nazwa tabeli menu.
     //Parametry w tablicy, pierwszy element to link aktywny"redaktor.php"
     // Następujące elementy w kolejności etykiet wewnątrz znacznika tekstowego type=text, value=$poslednijZapros i tak dalej
     // br w bazie zamiast NAZWA działa jak w kodzie html, jeśli URL=text
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // Attention!!! Do not use the menu as a reference!!
     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // style class name text.$nameTablic.number
     // $url sets the link where we go when we click on one of the buttons
     // If the link field in the database is not text and not reset, then the submit button
     // If the link field in the database is text , then draw the input field
     // If the link field in the database is reset , then draw the reset button
     //When launched via the Magic method:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //The first parameter is the name of the function, the second parameter is the name of the menu table.
     //Parameters in an array, the first element is a link active"redaktor.php"
     //The following elements in the order of the label inside the text tag type=text, value=$poslednijZapros and so on
     // br in the base in place of NAME works like in html code if URL=text
     // link parameter default sends the user to the main page of the site
     public function menu4($nameTablic,$url);

     // Внимание!!! Меню как ссылочное не использовать!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     //При запуске через Магический метод:
     //$this->__unserialize(array('menu5','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой мисвол, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // Uwaga!!! Nie używaj menu jako odniesienia!!
     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // styl nazwa klasy text.$nameTablic.number
     // $url ustawia link, do którego idziemy po kliknięciu jednego z przycisków
     // Jeśli pole linku w bazie danych nie jest tekstowe i nie jest zresetowane, to przycisk przesyłania
     // Jeśli pole link w bazie danych to tekst , narysuj pole wejściowe
     // Jeśli pole łącza w bazie danych zostało zresetowane, narysuj przycisk resetowania
     //Po uruchomieniu metodą Magic:
     //$this->__unserialize(array('menu5','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Pierwszy parametr to nazwa funkcji, drugi parametr to nazwa tabeli menu.
     //Parametry w tablicy, pierwszy element to link aktywny"redaktor.php"
     // Następujące elementy w kolejności etykiet wewnątrz znacznika tekstowego type=text, value=$poslednijZapros i tak dalej
     // br w bazie zamiast NAZWA działa jak w kodzie html, jeśli URL=text
     // Dodano możliwość sprawdzenia, czy przyciski należą do statusu użytkownika w menu 5
     // Dodatkowe pole STATUS zawiera listę statusów w jakich działa przycisk, należy je poprzedzić
     // dowolny misvol, na przykład "-". Przykład -012345 - oznacza to, że przycisk jest widoczny we wszystkich statusach
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // Attention!!! Do not use the menu as a reference!!
     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // style class name text.$nameTablic.number
     // $url sets the link where we go when we click on one of the buttons
     // If the link field in the database is not text and not reset, then the submit button
     // If the link field in the database is text , then draw the input field
     // If the link field in the database is reset , then draw the reset button
     //When launched via the Magic method:
     //$this->__unserialize(array('menu5','redaktor_nastr','redaktor.php',$poslednijZapros));
     //The first parameter is the name of the function, the second parameter is the name of the menu table.
     //Parameters in an array, the first element is a link active"redaktor.php"
     //The following elements in the order of the label inside the text tag type=text, value=$poslednijZapros and so on
     // br in the base in place of NAME works like in html code if URL=text
     // Added the ability to check whether buttons belong to user status in menu 5
     // The additional field STATUS contains a list of statuses in which the button works, they should be preceded by
     // any misvol, for example "-". Example -012345 - this means the button is visible in all statuses
     // link parameter default sends the user to the main page of the site
     public function menu5($nameTablic,$url);

     // То же самое, как и меню 5, только можно использовать как ссылочное
     // Внимание!!! Меню можно использовать как ссылочное!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     // Внимание!!! Меню как ссылочное не использовать!!
     //При запуске через Магический метод:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой символ, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // параметр ссылки default отправляет пользователя на главную страницу сайта

     // To samo, co menu 5, ale może służyć jako punkt odniesienia
     // Uwaga!!! Menu może służyć jako punkt odniesienia!!
     // prosta funkcja, wyświetla wszystkie przyciski w rzędzie z bazy menu
     // $nameTablic - nazwa tabeli menu
     // Klasa ogólna '<section class="'.$nameTablic.'">
     // Klasa formularza z przedrostkiem form_+$nameTablic
     // Klasa dla przycisku z prefiksem button_+$nameTablic
     // Tabela może mieć własną klasę zdefiniowaną dla każdego przycisku.
     // styl nazwa klasy text.$nameTablic.number
     // $url ustawia link, do którego idziemy po kliknięciu jednego z przycisków
     // Jeśli pole linku w bazie danych nie jest tekstowe i nie jest zresetowane, to przycisk przesyłania
     // Jeśli pole link w bazie danych to tekst , narysuj pole wejściowe
     // Jeśli pole łącza w bazie danych zostało zresetowane, narysuj przycisk resetowania
     // Uwaga!!! Nie używaj menu jako odniesienia!!
     //Po uruchomieniu metodą Magic:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //Pierwszy parametr to nazwa funkcji, drugi parametr to nazwa tabeli menu.
     //Parametry w tablicy, pierwszy element to link aktywny"redaktor.php"
     // Następujące elementy w kolejności etykiet wewnątrz znacznika tekstowego type=text, value=$poslednijZapros i tak dalej
     // br w bazie zamiast NAZWA działa jak w kodzie html, jeśli URL=text
     // Dodano możliwość sprawdzenia, czy przyciski należą do statusu użytkownika w menu 5
     // Dodatkowe pole STATUS zawiera listę statusów w jakich działa przycisk, należy je poprzedzić
     // dowolny znak, na przykład "-". Przykład -012345 - oznacza to, że przycisk jest widoczny we wszystkich statusach
     // domyślny parametr linku odsyła użytkownika do głównej strony serwisu

     // Same as menu 5, but can be used as a reference
     // Attention!!! The menu can be used as a reference!!
     // simple function, displays all buttons in a row from the menu base
     // $nameTablic - menu table name
     // Generic class '<section class="'.$nameTablic.'">
     // Class for the form with the prefix form_+$nameTablic
     // Class for button with prefix button_+$nameTablic
     // The table can have its own class defined for each button.
     // style class name text.$nameTablic.number
     // $url sets the link where we go when we click on one of the buttons
     // If the link field in the database is not text and not reset, then the submit button
     // If the link field in the database is text , then draw the input field
     // If the link field in the database is reset , then draw the reset button
     // Attention!!! Do not use the menu as a reference!!
     //When launched via the Magic method:
     //$this->__unserialize(array('menu4','redaktor_nastr','redaktor.php',$poslednijZapros));
     //The first parameter is the name of the function, the second parameter is the name of the menu table.
     //Parameters in an array, the first element is a link active"redaktor.php"
     //The following elements in the order of the label inside the text tag type=text, value=$poslednijZapros and so on
     // br in the base in place of NAME works like in html code if URL=text
     // Added the ability to check whether buttons belong to user status in menu 5
     // The additional field STATUS contains a list of statuses in which the button works, they should be preceded by
     // any character, for example "-". Example -012345 - this means the button is visible in all statuses
     // link parameter default sends the user to the main page of the site
     public function menu6($nameTablic,$url);

}
