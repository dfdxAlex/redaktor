<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT3
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToSubmit3ForBlockMas
 {
     private $parametr;
     private $i;
     private $obj;
     private $actionN = false;
     public function __construct($parametr, $i, $obj, $actionN=false)
     {
         $this->parametr = $parametr;
         $this->i = $i;
         $this->obj = $obj;
         $this->actionN = $actionN;
     }

     public function __toString()
     {
        $name=$this->parametr[0].'submit'.$this->i;
        $textValue='Ok';
        /**
         * Класс работает с двумя функциями, в одну из них следует передавать параметр
         * actionN.
         * Если параметр не равен false, то присваиваем ссылку для кнопки из этой переменной.
         */
        if (empty($this->actionN)) $textWww=$this->parametr[1]; 
        else $textWww=$this->actionN;

        $class=''; 
        if ($this->obj->searchParam($this->parametr, $this->i)) {
            $name=$this->parametr[$this->i+1]; 
            if ($this->obj->searchParam($this->parametr, $this->i+1)) {
                $textValue=$this->parametr[$this->i+2];
                if ($this->obj->searchParam($this->parametr, $this->i+2)) {
                    $textWww=$this->parametr[$this->i+3];
                    if ($this->obj->searchParam($this->parametr, $this->i+2)) {
                        $class=$this->parametr[$this->i+4];
                    }
                }
            }

        }

        if (!$this->obj->getZeroStyle()) $rez = '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'"></div>';
        if ($this->obj->getZeroStyle()) $rez = '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'"></div>';

        return $rez;
     }
}
