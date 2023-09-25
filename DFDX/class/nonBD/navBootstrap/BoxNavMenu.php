<?php
namespace class\nonBD\navBootstrap;

/**
  * The class creates dropdown menus from simple objects
  *
  * To create an object from this class, use the constructor:
  * $boxMenu = new BoxNavMenu($navbarMenuUp);
  * the $navbarMenuUp parameter is the main object to which all
  * objects are simple and complex.
  *
  * After creating an object from this class, it should
  * add simple objects that will create a dropdown
  * menu. Simple objects are added using the addElement() method
  * example:
  * $boxMenu->addElement($element1);
  * $boxMenu->addElement($element2);
  * $boxMenu->addElement($element3);
  * $boxMenu->addElement($elementN);
  *
  * After this container is filled with simple objects,
  * this container object should be passed to the main object using
  * of the same method.addElement()
  * $navbarMenuUp->addElement($boxMenu);
  *
  * You can also pass simple objects to the main element,
  * See the info on the ElementNavBar class.
  *
  * Properties of simple objects from which a complex object is created,
  * are set when creating a simple object and further with it
  * remain until destroyed.
  *
  * To make a separating horizontal line, you should
  * create a simple object with any parameters, but in the constructor
  * pass the second parameter true;
  * Such an object will independently set the button with its properties,
  * but if it is passed to a given complex object that creates
  * dropdown menu, it will set a horizontal dividing line.
  */

/**
 * Класс создает выпадающие меню из простых объектов
 * 
 * Для создания объекта из данного класса используем конструктор:
 * $boxMenu = new BoxNavMenu($navbarMenuUp);
 * параметр $navbarMenuUp - это главный объект, в который передаются все
 * объекты простые и сложные. 
 * 
 * После того, как создали объект из данного класса, в него следует 
 * добавить простых объектов, которые и будут создавать выпадающее
 * меню. Добавляются простые объекты с помощью метода addElement()
 * пример:
 * $boxMenu->addElement($element1);
 * $boxMenu->addElement($element2);
 * $boxMenu->addElement($element3);
 * $boxMenu->addElement($elementN);
 * 
 * После того, как данный контейнер будет заполнен простыми объектами,
 * данный объект контейнер следует передать главному объекту с помощью
 * такого же метода.addElement()
 * $navbarMenuUp->addElement($boxMenu);
 * 
 * Так-же в главный элемент можно передавать и простые объекты, 
 * смотри инфу по классу ElementNavBar.
 * 
 * Свойства простых объектов, из которых создается сложный объект,
 * задаются при создании простого объекта и дальше с ним 
 * сохраняются до уничтожения.
 * 
 * Чтобы сделать разделительную горизонтальную черту, следует 
 * создать простой объект с любыми параметрами, но в конструктор
 * передать вторым параметром true;
 * Такой объект самостоятельно установит кнопку со своими свойствами,
 * но если его передать в данный сложный объект, который создает
 * выпадающее меню, он установит горизонтальную разделительную линию.
 */

 class BoxNavMenu extends INavMenuDiff
 {
    private $masObject = [];
    private $in;

    public function __construct(INavMenu $in)
    {
        $this->in = $in;
    }

    public function addElement(INavMenu $element)
    {
        $this->masObject[] = $element;
    }

    public function writeElement()
    {
        $rez = '
        <li class="'.
        $this->in->getProperty('nav-item').' '.
        $this->in->getProperty('dropdown').'">
          <a class="'.
            $this->in->getProperty('nav-link').' '.
            $this->in->getProperty('dropdown-toggle').'" 
            href="'.$this->masObject[0]->getLink().'" 
            id="navbarDropdown" 
            role="button" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
          >
            '.$this->masObject[0]->getHome().'
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          ';

            foreach($this->masObject as $key=>$value) {
                if ($key!==0) {
                        $rez.=$value->writeElement();
                }
            }

            $rez.=
          '</ul>
        </li>';

        echo $rez;
    }
    
    public function renameElement(INavMenu $element)
    {
        foreach($this->masObject as $key=>$value) {
            if ($value === $element) {
                unset($this->masObject[$key]);
                return true;
            }
        }
    }
 }
