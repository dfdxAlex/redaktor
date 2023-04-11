<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Служебный класс для функций formBlock() и formBlockMas
 * Класс выводит кнопку Reset
 * Входящий параметр in содержит ссылку на вызываемый объект,
 * от туда и берется информация о параметрах кнопки
 */

class ReturnH1
{
    private $in;
    public function __construct($in)
    {
        $this->in = $in;
    }

    public function __toString()
    {
        return "<div 
                  class='{$this->in->class}PH'
                >
                  <{$this->in->value} 
                    class='{$this->in->class}'
                  >
                    {$this->in->text}
                  </{$this->in->value}>
                </div>";
    }
}
