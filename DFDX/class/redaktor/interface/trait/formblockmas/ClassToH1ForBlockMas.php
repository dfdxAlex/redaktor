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
    private $old;
    private $nameB;
    private $value;
    private $obj;

    public function __construct($parametr, $i, $value, $obj, $old, $nameB)
    {
        $this->parametr = $parametr;
        $this->i = $i;
        $this->value = $value;
        $this->obj = $obj;
        $this->old = $old;
        $this->nameB = $nameB;
    }

    public function __toString()
    {
        $text='';
        /**
         * если $old=true, то класс работает с функцией formBlock
         * усли $old=false, то с formBlock
         */
        if ($this->old) 
            $class=$this->nameB.$this->i;
        else
            $class=$this->parametr[0].$this->value.$this->i; 

        if ($this->obj->searchParam($this->parametr, $this->i)) {
            $text=$this->parametr[$this->i+1]; 
            if ($this->obj->searchParam($this->parametr, $this->i+1)) 
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
