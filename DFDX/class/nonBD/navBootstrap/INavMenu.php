<?php
namespace class\nonBD\navBootstrap;

/**
  * the first abstract class of the Composite pattern
  * signature is for simple and complex classes
  * in both classes there will be a nameButton property, it contains
  * menu item name.
  * In simple objects, this property will be responsible for
  * name of a single button, in complex objects it is a property
  * is an array and contains the names of the expandable item
  * The getNameButton() method returns a variable in simple classes,
  * or an array reference in complex classes.
  */

/**
 * первый абстрактный класс паттерна Composite
 * сигнатура предназначена для простых и сложных классов
 * в обоих классах будет свойство nameButton, оно содержит
 * имя пункта меню.
 * В простых объектах данное свойство будет отвечать за 
 * название одиночной кнопки, в сложных объектах - это свойство
 * является массивом и содержит имена разворачивающегося пункта
 * Метод getNameButton() возвращает переменную в простых классах,
 * или ссылку на массив в сложных классах.
 */

abstract class INavMenu
{
    abstract public function writeElement();
    /**
     * These properties are basically bootstrap navigation menu styling classes
     * Properties are set to default values that are available to descendants
     * If there are changes to these properties, they will be done through
     * property container Singleton.
     */
    /**
     * Данные свойства - это в основном классы стилизации навмгационного меню от бутстрапа
     * Свойствам заданы значения по умолчанию, которые доступны для потомков
     * Если будут изменения данных свойств, то они будут делаться через
     * контейнер свойств Синглтон.
     */
    // private $navbar='navbar';
    // private $navbarExpandLg='navbar-expand-lg';
    // private $navbarLight='navbar-light';
    // private $bgLight='bg-light';
    // private $containerFluid='container-fluid';
    // private $navbarBrand='navbar-brand';
    // private $navbarBrandHref='#';
    // private $navbarBrandName='Navbar';
    // private $navbarToggler='navbar-toggler';
    // private $navbarTogglerIcon='navbar-toggler-icon';
    // private $navbarTogglerIconSpan='';
    // private $collapse='collapse';
    // private $navbarCollapse='navbar-collapse';
    // private $navbarNav='navbar-nav';
    // private $meAuto='me-auto';
    // private $mb2='mb-2';
    // private $mbLg0='mb-lg-0';
    // private $navItem='nav-item';
    // private $navLink='nav-link';
    // private $active='active';
    // private $dropdown='dropdown';
    // private $dropdownToggle='dropdown-toggle';
    // private $dropdownMenu='dropdown-menu';
    // private $dropdownDivider='dropdown-divider';
    // private $dropdownItem='dropdown-item';
    // private $dFlex='d-flex';
    // private $formControl='form-control';
    // private $me2='me-2';
    // private $btn='btn';
    // private $btnOutlineSuccess='btn-outline-success';
    // private $home='Home';

    /**
      * property determines whether to put the search field and the Search button from the bootstrap
      * set by default.
      */
    /**
     * свойство определяет ставить ли из бутстрапа поле поиска и кнопку Search
     * по умолчанию ставить.
     */
    private $buttonSearch=true;
    
    /**
      * The property stores a link for the next menu item
      * At the end of the processing of each menu item, the parameter must
      * fold into the grate.
      */
    /**
     * Свойство хранит в себе линк для очередного пункта меню
     * В конце обработки каждого пункта меню параметр должен
     * скидываться в решетку.
     */
    private $link = '#';

    /**
     * Свойство содержит информацию о том, помещен ли листочек (простой объект)
     * в класс бокса (сложного объекта). Это необходимо потому, что
     * кнопки рисуются по разному когда они сами по себе или в составе
     * выпадающего меню.
     */
    private $workBox = false;

    public function setProperty($nameProperty, $dataProperty)
    {
        $realName = $this->valuePatternName($nameProperty);
        $this->$realName = $dataProperty;
    }

    public function getProperty($name)
    {
        $realName = $this->valuePatternName($name);
        return $this->$realName;
    }
    
    /**
      * In order to use parameters such as
      * is directly in the navbar example, and this function is needed.
      * As input, the function accepts a parameter that needs to be changed
      * in the example and converts it to a variable name that
      * stores the value of this parameter.
      * This applies to style classes and the ability to change them.
      */
    /**
     * Для того, чтобы пользоваться параметрами такими, которые 
     * есть непосредственно в примере navbar, и нужна данная функция.
     * На вход функция принимает параметр, который нужно изменить 
     * в примере и преобразовывает его в имя переменной, которая и 
     * хранит в себе значение данного параметра.
     * Это относится к стилевым классам и возможности их изменения.
     */
    private function valuePatternName($name)
    {
        if ($name === 'Home') 
            return 'home';
        if ($name === '#') 
            return 'navbarBrandHref';
        if ($name === 'Navbar') 
            return 'navbarBrandName';
        if ($name === 'span') 
            return 'navbarTogglerIconSpan';

        $mas = explode('-', $name);
        $rez = $name;
        foreach ($mas as $key=>$value) {
            if ($key==0) 
                $rez=$value;
            else {
                $rez.=ucfirst($value);
            }
        }
        return $rez;
    } 
}
