<?php
namespace class\nonBD\navBootstrap;

/**
  * the second abstract class of the Composite pattern
  * signature is for complex classes
  * only in complex classes there will be a property-property nameButton,
  * it contains the names of the menu item.
  * in complex objects is a property
  * is an array and contains the names of the expandable item
  * The addElement() method adds a variable to the complex class array,
  *
  */
/**
 * второй абстрактный класс паттерна Composite
 * сигнатура предназначена для сложных классов
 * только в сложныз классах будет свойство-свойство nameButton, 
 * оно содержит имена пункта меню.
 * в сложных объектах - это свойство
 * является массивом и содержит имена разворачивающегося пункта
 * Метод addElement() добавляет переменную в массив сложного класса,
 * 
 */

abstract class INavMenuDiff extends INavMenu
{
    abstract public function addElement(INavMenu $element);

    abstract public function renameElement(INavMenu $element);
}
