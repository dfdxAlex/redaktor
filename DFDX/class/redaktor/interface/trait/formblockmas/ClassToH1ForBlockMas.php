<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс активируется тогда, когда нужно поставить абзац 
 * или заголовок. Находит все параметры и возвращает готовую строку
 */

class ClassToH1ForBlockMas
{
    private $parametr;
    private $i;
    private $value;

    public function __construct($parametr, $i, $value)
    {
        $this->parametr = $parametr;
        $this->i = $i;
        $this->value = $value;
    }

    public function __toString()
    {
        $text='';
        $class=$this->parametr[0].$this->value.$this->i; 
        $obj = new \class\redaktor\interface\trait\formblock\SearchParam;
     
       if ($obj->searchParam($this->parametr, $this->i)) {
           $text=$this->parametr[$this->i+1]; 
           if ($obj->searchParam($this->parametr, $this->i)) 
               $class=$this->parametr[$this->i+2]; 
       }
        return "<div 
                class='{$class}PH'
              >
                <$this->value 
                  class='$class'
                >
                  $text
                </$this->value>
              </div>";
    }
}
