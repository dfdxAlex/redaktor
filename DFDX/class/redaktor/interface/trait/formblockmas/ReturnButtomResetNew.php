<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Служебный класс для функций formBlock() и formBlockMas
 * Класс выводит кнопку Reset
 * Входящий параметр in содержит ссылку на вызываемый объект,
 * от туда и берется информация о параметрах кнопки
 */

class ReturnButtomResetNew
{
    private $in;
    public function __construct($in)
    {
        $this->in = $in;
    }

    public function __toString()
    {
        return "<input 
                  type='reset' 
                  value='{$this->in->textValue}' 
                  class='{$this->in->class}' 
                >";
    }
}
