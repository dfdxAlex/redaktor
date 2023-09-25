<?php
namespace class\nonBD\navBootstrap;

/**
  * The class must create an object that will contain
  * information about a simple menu item.
  * There must be a method that returns the finished element.
  *
  * The markup line is created in the constructor, so the properties
  * each menu button can only be set before creating the object.
  * Therefore, before creating an object, you should configure all the necessary
  * properties. We are talking about personal properties, such as the name of the button
  * and link. Style settings are configured once.
  *
  * Before creating an object, you must set personal parameters
  * using the properties of the super class abstract class INavMenu.
  *
  * There is already a setter in the superclass, and this class takes it as a parameter
  * a reference to any previously created INavMenu signature object and at the same
  * time it must be the object that will be passed to the constructor
  * of this object.
  *
  * Let's say the main object was created like this:
  * $navbarMenuUp = new NavMenu();
  *
  * then the current object should be created like this:
  * $navbarMenuUp->setProperty('Home','Home'); -- set button caption
  * $navbarMenuUp->setProperty('link','?1'); -- set button link
  * $element1 = new ElementNavBar($navbarMenuUp); -- create object
  *
  * After creating one object, you can create the necessary
  * number of objects.
  *
  * After creating all the necessary objects, they need to be transferred to the main
  * object, which of them will build the menu.
  *Place these objects in the main object nojno with
  * method:
  * $navbarMenuUp->addElement($element1);
  * $navbarMenuUp->addElement($element2);
  * $navbarMenuUp->addElement($elementN);
  *
  * After placing all the required objects in the main object
  * display the menu using the method of the main object:
  * echo $navbarMenuUp->writeElement();
  *
  * The writeElement() method must be in all objects that inherit
  * abstract classes INavMenu or INavMenuDiff, but in each
  * class they will display their information.
  * In the current class, this is one button, in the BlockNavBar class, this is
  * drop-down menu, and in the main class NavMenu - this is the output of everything
  * menu.
  *
  * To make a horizontal separator line,
  * only works when a simple object is passed
  * the complex one that creates dropdown menus (BoxNavMenu) should
  * create a simple object with any parameters, but in the constructor
  * pass the second parameter true;
  * Such an object will independently set the button with its properties,
  * but if it is passed to a given complex object that creates
  * dropdown menu, it will set a horizontal dividing line.
  *
  * This navBootstrap library is built according to the rules of the Composite template
  */

/**
 * Класс должен создать объект, который будет содержать
 * информацию о простом элементе менюшки.
 * Должен быть метод, который возвращает готовый елемент.
 * 
 * Строка с разметкой создается в конструкторе, поэтому свойства
 * каждой кнопки меню можно задать только перед созданием объекта.
 * Поэтому, перед созданием объекта следует настроить все необходимые 
 * свойства. Речь идёт об персональных свойствах, таких как имя кнопки
 * и ссылка. Стилевые настройки настраиваются один раз.
 * 
 * Перед созданием объекта необходимо задать персональные параметры
 * используя свойства супер-класса abstract class INavMenu.
 * 
 * Сеттер в суперклассе уже есть, а данный класс принимает в параметр
 * ссылку на любой ранее созданный объект сигнатуры INavMenu и в то же
 * время это должен быть тот объект, который будет передан в конструктор
 * этого объекта.
 * 
 * Допустим, главный объект был создан так:
 * $navbarMenuUp = new NavMenu();
 * 
 * тогда текущий объект, должен быть создан так:
 * $navbarMenuUp->setProperty('Home','Первая'); -- задать надпись на кнопке
 * $navbarMenuUp->setProperty('link','?1'); -- задать ссылку кнопки
 * $element1 = new ElementNavBar($navbarMenuUp); -- создать объект
 * 
 * После создания одного объекта, можно создать необходимое 
 * колличество объектов.
 * 
 * После создания всех нужных объектов, их нужно передать главному
 * объеку, который из них построит меню.
 * Поместить эти объекты в главный объект нцжно с помощью 
 * метода:
 * $navbarMenuUp->addElement($element1);
 * $navbarMenuUp->addElement($element2);
 * $navbarMenuUp->addElement($elementN);
 * 
 * После помещения всех необходимых объектов в главный объект
 * выводим меню используя метод главного объекта:
 * echo $navbarMenuUp->writeElement();
 * 
 * Метод writeElement() должен быть во всех объектах,наследующих
 * абстрактные классы INavMenu или INavMenuDiff, но в каждом 
 * классе они вывдят свою информацию.
 * В текущем классе - это одна кнопка, в классе BlockNavBar - это
 * выпадающее меню, а в классе главном NavMenu - это вывод всего 
 * меню.
 * 
 * Чтобы сделать разделительную горизонтальную черту, 
 * работает только тогда, когда простой объект передается
 * сложному, создающему выпадающие меню (BoxNavMenu), следует 
 * создать простой объект с любыми параметрами, но в конструктор
 * передать вторым параметром true;
 * Такой объект самостоятельно установит кнопку со своими свойствами,
 * но если его передать в данный сложный объект, который создает
 * выпадающее меню, он установит горизонтальную разделительную линию.
 * 
 * Данная библиотека navBootstrap построена по правилам шаблона Composite
 */



 class ElementNavBar extends INavMenu
 {
     private $home;
     private $link;
     private $hr; 
     private $rez; 

     public function __construct(INavMenu $in, $hr=false)
     {
         $this->hr=$hr;
         $this->in = $in;
         /**
          * Сохранить имя-название кнопки в глобальное для класса 
          * переменной
          */
         $this->home = $this->in->getProperty('Home');
        /**
         * Получение ссылки для пункта меню. Берется ссылка из
         * глобального свойства $link, по умолчанию #.
         * Для установки ссылки необходимо использовать 
         * метод setProperty($nameProperty, $dataProperty)
         * пример:
         *  $obj->setProperty('link', 'google.com')
         */
        $this->link = $this->in->getProperty('link');
        
        /**
         * Сбросс параметра ссылки сразу, после прочтения.
         */
        $this->in->setProperty('link', '#');
        
        /**
         * Данное условие проверяет признак свойства $workBox, которое 
         * может быть false (по умолчанию) или true.
         * Функция getProperty() работает с классами стилей и поэтому
         * преобразовавыет 'work-box' в camelCase и разыметовывает в 
         * переменную.
         * Если 'work-box'($workBox) равно false, то кнопка работает
         * как самостоятельный объект.
         * Если 'work-box'($workBox) изменён на true, то кнопка работает
         * в составе выпадающего меню. Стилевые классы и разметка в 
         * navbar-е отличается у простой кнопки, в зависимости от 
         * расположения.
         */
        if (!$in->getProperty('work-box')) {
            $this->rez = '
                         <li class="'.
                         $this->in->getProperty('nav-item').'">
                           <a class="'.
                             $this->in->getProperty('nav-link').' '.
                             $this->in->getProperty('active').'" 
                             aria-current="page" 
                             href="'.$this->link.'"
                            >
                            '.$this->home.'</a>
                         </li>
                         ';
        }
         else 
            if (!$this->getHr()) {
                $this->rez.='<li><a class="'.
                $this->in->getProperty('dropdown-item').'" href="'.
                $this->getLink().'">'.
                $this->getHome().'</a></li>';
            } else {
                $this->rez.='<li><hr class="'.
                $this->in->getProperty('dropdown-divider').'"></li>';
            } 
            /**
             * После использования вернуть свойство в свойство по 
             * умолчанию.
             */
            $in->setProperty('work-box',false);
     }

     public function writeElement()
     {
         if (strripos($this->rez,'dropdown')>0)
             return $this->rez;
         echo $this->rez;
     }

     public function getLink()
     {
        return $this->link;
     }
     public function getHome()
     {
        return $this->home;
     }
     public function getHr()
     {
      return $this->hr;
     }
 }
