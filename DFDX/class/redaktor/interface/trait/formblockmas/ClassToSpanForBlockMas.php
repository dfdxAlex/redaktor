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
    public function __construct($parametr, $i)
    {
        $this->parametr = $parametr;
        $this->i = $i;
    }

    public function __toString()
    {
        $obj = new \class\redaktor\interface\trait\formblock\SearchParam;
        $text='';
        $class='';
        if ($obj->searchParam($this->parametr, $this->i)) {// метод searchParam() сам добавляет $i+1
           $text=$this->parametr[$this->i+1]; 
           $class=$this->parametr[0].'span'.$this->i; 
           if ($obj->searchParam($this->parametr, $this->i+1))
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
