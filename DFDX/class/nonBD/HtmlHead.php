<?php
namespace class\nonBD;

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

// class upgrade 04/19/2022
// Added parameter $classBody='non'.
// If this parameter is set as the style name "body-style" then this class will be added to the body class="body-style"
// If non-zero optional parameters $indexMin=0,$indexMax=0 are entered, then
// a random number from $indexMin to $indexMax and is assigned to the name of the given class through the "-" sign
// $indexMin must be >=0 but less than $indexMax

// модернизация класса 19.04.2022
// Добавлен параметр $classBody='non'.
// Если этот параметр задать как имя стиля "body-style" то к боди добавится данный класс class="body-style"
// Если введены необязательные параметры $indexMin=0,$indexMax=0 отличные от нуля, то будет задано 
// случайное число от $indexMin до $indexMax и приписано к имени заданного класса через знак "-"
// $indexMin должен быть >=0 но меньше $indexMax

// $oblect = new HtmlHead('css/styles.css','scp',$classBody='non',$indexMin=0,$indexMax=0);
class HtmlHead implements interface\IHtmlHead
{
    private $name;
    private $title;
    private $classBody;
    private $indexBodyClass;
    public function __construct($nameStyle,$titles,$classBody='non',$indexMin=0,$indexMax=0)
    {
        $this->indexBodyClass=-1;
        $this->name=$nameStyle;
        $this->title=$titles;
        $this->classBody=$classBody;
        if ($indexMin>=0 && $indexMax>$indexMin) {
            $this->indexBodyClass=rand($indexMin,$indexMax);
        }
    } 
    public function __toString()
    {
        $returnClassBody='';

        // If the user defined a class for body, then add it without the last quote
        // You need to append without the last quote in order to be able to add the style number,
        // if random style works

        // Если для body пользователь определил класс, то дописать его без последней кавычки
        // Дописывать нужно без последней кавычки для того, чтобы иметь возможность добавить номер стиля, 
        // если работает случайный стиль
        if ($this->classBody!='non')  $returnClassBody=' class="'.$this->classBody;

        // if a random class variant is specified for body, then add a random number to the class name
        // если задан вариант случайного класса для body, то дописать случайный номер к имени класса
        if ($this->indexBodyClass>-1) $returnClassBody.='-'.$this->indexBodyClass;

        // closing quote regardless of what had to be added to the class
        // закрывающаяся кавычка в независимости от того, что пришлось дописать к классу
        if ($this->classBody!='non') $returnClassBody.='"';

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
        <body'.$returnClassBody.'>
        ';
    }
    public function getRand()
    {
        return $this->indexBodyClass;
    }
}
