<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT3
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToSubmit3ForBlockMas
 {
  private $parametr;
  public $i;
  public $obj;
  private $old;
  public $nameB;
  public $actionN = false;

  public $textWww;
  public $name;
  public $class;
     public function __construct($parametr, $i, $obj, $actionN=false, $old, $nameB)
     {
         $this->parametr = $parametr;
         $this->i = $i;
         $this->obj = $obj;
         $this->actionN = $actionN;
         $this->old = $old;
         $this->nameB = $nameB;
     }

     public function __toString()
     {
        $this->name=$this->parametr[0].'submit'.$this->i;
        $this->textValue='Ok';
        $this->textWww=$this->parametr[1];

        $this->class=''; 
        if ($this->obj->searchParam($this->parametr, $this->i)) {
            $this->name=$this->parametr[$this->i+1]; 
            if ($this->obj->searchParam($this->parametr, $this->i+1)) {
                $this->textValue=$this->parametr[$this->i+2];
                if ($this->obj->searchParam($this->parametr, $this->i+2)) {
                    $this->textWww=$this->parametr[$this->i+3];
                    if ($this->obj->searchParam($this->parametr, $this->i+3)) {
                        $this->class=$this->parametr[$this->i+4];
                    }
                }
            }
        }
        if (!$this->old) {
            
            if (!$this->obj->getZeroStyle()) 
                $rez = new ReturnSubmitOld($this, true, true);

            if ($this->obj->getZeroStyle()) 
                $rez = new ReturnSubmitOld($this, false, true);

        } else {
       /**
        * класс определяет будет ли бутстрап в классе, если да, 
        * то впереди или позади
        */
        $obj1 = new BtnStartOrEnd($this);
        $obj1->setStyle();

        /**
       * выводит кнопку если работаем со старыми вариантами
       * реализации класса, функция formBlock
       */
       $rez = new ReturnSubmitNew($this);
    }

        return $rez;
     }
}



