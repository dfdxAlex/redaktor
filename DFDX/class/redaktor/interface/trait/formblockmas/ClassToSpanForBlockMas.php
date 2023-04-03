<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SPAN
 * проверяет остальные параметры и возвращает содержимое
 */

class ClassToSpanForBlockMas
{
    private $parametr;
    private $i;
    private $obj;
    private $old;
    private $nameB;
    public function __construct($parametr, $i, $obj, $old, $nameB)
    {
        $this->parametr = $parametr;
        $this->i = $i;
        $this->obj = $obj;
        $this->old = $old;
        $this->nameB = $nameB;
    }

    public function __toString()
    {
        $text='';
        /**
         * если $old=true, то класс работает с функцией formBlock
         * усли $old=false, то с formBlockMas
         */
        if ($this->old) 
          $class=$this->nameB.$this->i;
        else 
          $class=$this->parametr[0].'span'.$this->i; 
          
        if ($this->obj->searchParam($this->parametr, $this->i)) {// метод searchParam() сам добавляет $i+1
           $text=$this->parametr[$this->i+1]; 
           if ($this->obj->searchParam($this->parametr, $this->i+1))
              $class=$this->parametr[$this->i+2]; 
        }

            return "<div 
                      class='{$class}PH'
                    >
                      <span 
                        class='$class'
                      >
                        $text
                      </span>
                    </div>";
    }
}
