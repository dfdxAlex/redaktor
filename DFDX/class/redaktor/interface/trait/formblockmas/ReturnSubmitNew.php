<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Служебный класс для функций formBlock() и formBlockMas
 * Класс выводит кнопку с заданными параметрами.
 * Входящий параметр in содержит ссылку на вызываемый объект,
 * от туда и берется информация о параметрах кнопки
 */

class ReturnSubmitNew
{
    private $in;
    public function __construct($in)
    {
        $this->in = $in;
    }

    public function __toString()
    {
        return "<input 
                  type='submit' 
                  id='{$this->in->name}' 
                  name='{$this->in->name}' 
                  value='{$this->in->textValue}' 
                  class='{$this->in->class}' 
                  formaction='{$this->in->textWww}'
                >";
    }
}
