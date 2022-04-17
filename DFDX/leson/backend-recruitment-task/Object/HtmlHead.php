<?php
namespace Object;

// The class sets the title of the html page
// When creating an object, you must specify the path and name of the style file relative to the page on which the object was created
// The second parameter sets the title page parameter
// The value is assigned to the object using the toString magic method, that is, the object must be printed
// with the echo construct, the object itself may not be created. example echo new \...\...\...\HtmlHead('style.css','title')
// Класс прописывает заголовок страницы html
// При создании объекта необходимо задать путь и имя файла стилей относительно страницы, на которой объект создан
// Вторым параметром задается параметр страницы title
// Значение присваивается объекту с помощью магического метода toString, то есть объект нужно вывести на печать 
// конструкцией echo, сам объект можно не создавать. пример echo new \...\...\...\HtmlHead('style.css','title')
class HtmlHead
{
    private $name;
    private $title;
    public function __construct($nameStyle,$titles)
    {
        $this->name=$nameStyle;
        $this->title=$titles;
    } 
    public function __toString()
    {
        return '
        <!DOCTYPE html>
        <html lang="en">        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>'.$this->title.'</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link href="'.$this->name.'" rel="stylesheet" type="text/css">
        </head>
        <body>
        ';
    }
}
