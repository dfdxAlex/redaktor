<?php
namespace class\nonBD\propertyContainers;

/**
 * Класс контейнер свойств, может быть использован любым другим классом.
 * 
 * The property container class can be used by any other class.
 */

class PropertyContainer
{
    private $property = [];

    public function getProperty($name)
    {
        if (isset($this->property[$name]))
            return $this->property[$name];
        else 
            return false;
    }

    public function setProperty($name, $value)
    {
        $this->property[$name] = $value;
    }

    public function getPropertyMas()
    {
        return $this->property;
    }
}
