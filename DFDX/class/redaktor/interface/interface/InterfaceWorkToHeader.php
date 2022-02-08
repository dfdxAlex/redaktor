<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с верхней частью сайта
// interfejs dla funkcji współpracujących z górą strony
// interface for functions that work with the top of the site

interface InterfaceWorkToHeader
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
}
