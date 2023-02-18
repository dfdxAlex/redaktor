<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с верхней частью сайта
// interfejs dla funkcji współpracujących z górą strony
// interface for functions that work with the top of the site

interface InterfaceWorkToHeader extends InterfaceWorkToMenu
{
    // функция прописывает основные настройки заголовка head для страницы
    // funkcja ustawia główne ustawienia nagłówka strony
    // function sets the main heading settings for the page

    // так, как параметр title для каждой страницы свой, то вставляем его в код функции через входящий параметр
    // ponieważ parametr title jest inny dla każdej strony, wstawiamy go do kodu funkcji za pomocą parametru input
    // since the title parameter is different for each page, then we insert it into the function code through the input parameter
    public function headStart($title);

    // функция воспроизводит часть текста, для подключения бутстрапа, которая публикуется в шапке сайта.
    // вторая часть текста для подключения бутстрапа находится в интерфейсе InterfaceWorkToFutter
    // funkcja odtwarza część tekstu do podłączenia bootstrapu, który jest publikowany w nagłówku strony.
    // druga część tekstu do podłączenia ładowania początkowego znajduje się w interfejsie InterfaceWorkToFutter
    // the function reproduces a part of the text to connect the bootstrap, which is published in the site header.
    // the second part of the text for connecting the bootstrap is in the interface InterfaceWorkToFutter
    
    // в массив необходимо передать файлы с стилями CSS, массив типа [string,string,...]
    // pliki ze stylami CSS muszą być przekazane do tablicy, tablicy typu [string,string,...]
    // files with CSS styles must be passed to the array, an array of type [string,string,...]
    public function headBootStrap5(array $listFileStyle);

    // Функция выводит картинку с названием активного раздела сайта, если картинки нет, то запускает функцию бегущей строки
    // InterfaceWorkToBd $InterfaceWorkToMenu - параметр передает в функцию сигнатуру соответствующего объекта, для использования методов
    // string $pathFileSection - переменная содержит путь и имя файла шапки, который нужно найти и загрузить
    // string $functionAnalogSectionImages - задает имя функции, которая будет запускаться в случае отсутствия картинки для раздела сайта

    // Funkcja wyświetla obrazek z nazwą aktywnej sekcji serwisu, jeśli nie ma obrazka uruchamia funkcję tickera
    // InterfaceWorkToBd $InterfaceWorkToMenu - parametr przekazuje sygnaturę odpowiedniego obiektu do funkcji, w celu użycia metod
    // string $pathFileSection - zmienna zawiera ścieżkę i nazwę pliku nagłówkowego do wyszukania i załadowania
    // string $functionAnalogSectionImages - ustawia nazwę funkcji, która zostanie uruchomiona w przypadku braku obrazu dla sekcji strony

    // The function displays a picture with the name of the active section of the site, if there is no picture, it starts the ticker function
    // string $pathFileSection - the variable contains the path and name of the header file to be found and loaded
    // string $functionAnalogSectionImages - sets the name of the function that will be run if there is no image for the site section
    public function showSiteSection(string $pathFileSection, string $functionAnalogSectionImages);

    // функция обслуживает верхнее меню сайта.
    // funkcja służy do górnego menu serwisu.
    // function serves the top menu of the site.
    public function topMenuProcessing();

    // функция скачивает и показывает колличество монет у пользователя
    // InterfaceWorkToModul $redaktor сигнатура класса работы с админкой
    // funkcja pobiera i pokazuje liczbę monet, które posiada użytkownik
    // InterfaceWorkToModul klasy administratora modułu $redaktor
    // the function downloads and shows the number of coins the user has
    // InterfaceWorkToModul $redaktor admin class signature
    public function showNumberOfCoins(InterfaceWorkToModul $redaktor);

    // показывает шапку сайта
    // pokazuje nagłówek strony
    // shows the site header
    public function showSiteHeader(string $url);

    // функция обнуляет все режимы работы, если на страницу пришли из административной панели
    // funkcja resetuje wszystkie tryby działania, jeśli strona była odwiedzana z panelu administratora
    // the function resets all modes of operation if the page was visited from the admin panel
    public function resetOperatingMode();

    // функция создает переменные сессий при первом посещении страницы
    // funkcja tworzy zmienne sesji przy pierwszej wizycie na stronie
    // function creates session variables on first visit to the page
    public function firstCreationSessionVariables();

    // $masBotton ассоциативный массив имя кнопки => ссылка на обработчик
    // $blockName='second-menu' - необязательный параметр на случай необходимости создать ещё одно меню. Задает начальный класс контейнера
    // $blockName='second-menu' используется на главной странице dfdx.php
    
    // $masBotton nazwa przycisku tablicy asocjacyjnej => link do obsługi
    // $blockName='drugie menu' jest parametrem opcjonalnym na wypadek konieczności utworzenia innego menu. Określa początkową klasę kontenera
    // $blockName='drugie menu' jest używane na stronie głównej dfdx.php
    
    // $masBotton associative array button name => link to handler
    // $blockName='second-menu' is an optional parameter in case you need to create another menu. Specifies the initial container class
    // $blockName='second-menu' is used on the main page dfdx.php
    public function menuOfOurProjects(array $masBotton, $blockName='second-menu');
}
