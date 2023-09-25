<?php
namespace class\nonBD;

/**
 * Класс Декоратор для класса HtmlHead();
 * Используется контейнер свойств для изменения результата возврата данных из
 * класса HtmlHead();
 * Свойство ['BootStrap'] позволяет заменить ссылку для CSS стилей от бутстрапа, 
 * передаётся в свойство только строка от https://cdn.js ... crossorigin="anonymous"
 * Свойство ['JSBootStrap'] позволяет вставить в header ссылки подключения части JS от BootStrap
 * данные вводятся вместе с тегами <script></script>
 * 
 * Для работы необходимо передать в конструктор старый объект типа HtmlHead()
 * После этого с помощь методов контейнера внести свойства в нужные переменные
 * После этого необходимо запустить метод echoHead();
 * 
 *  Class Decorator for class HtmlHead();
 * Uses the property container to change the result of returning data from
 * class HtmlHead();
 * The ['BootStrap'] property allows you to replace the link for CSS styles from bootstrap,
 * only the string from https://cdn.js ... crossorigin="anonymous" is passed to the property
 * The ['JSBootStrap'] property allows you to insert into the header connection links of the JS part from BootStrap
 * data is entered together with <script></script> tags
 *
 * To work, you must pass the old object of the HtmlHead () type to the constructor
 * After that, using the methods of the container, add properties to the necessary variables
 * After that, you need to run the echoHead() method;
 */

/**
 * Пример использования класса:
 * 
 * An example of using a class:
 * 
 * создаем объект старого сласса
 * create an old class object
 * $headOld =  new \class\nonBD\HtmlHead('../src/css/style.css','MyProject',$classBody='non',$indexMin=0,$indexMax=0);
 *   
 * Создаем объект класса - Декоратора, в который уже встроен контейнер свойств
 * We create an object of the class - Decorator, in which the property container is already embedded
 * $headNew = new \class\nonBD\HtmlHeadMod($headOld);
 * 
 * Помещаем к контейнер свойств нужные свойства
 * We put the necessary properties to the property container
 * $headNew->setProperty('BootStrap', 'https://...css" rel="stylesheet" rigin="anonymous"');
 * $headNew->setProperty('JSBootStrap', '<script src="https://...origin="anonymous"></script>');
 *
 * запускаем метод, который сам прописывает заголовок 
 * run the method that writes the header itself
 * $headNew->echoHead();
 */

class HtmlHeadMod extends propertyContainers\PropertyContainer
{
    private $in; 
    public function __construct(interface\IHtmlHead $in)
    {
        $this->in = $in;
    }

    public function echoHead()
    {
        $str = $this->in;

        $link = $this->getProperty('BootStrap');
        if ($link) {
            $str = str_replace(
                                 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"',
                                 $link,
                                 $str
                              );
        }

        $link = $this->getProperty('JSBootStrap');
        if ($link) {
            $str = str_replace(
                                 '</head>',
                                 $link.'</head>',
                                 $str
                              );
        }

        echo $str;
    }
}
