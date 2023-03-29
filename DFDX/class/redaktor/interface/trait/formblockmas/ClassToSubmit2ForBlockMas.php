<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT2
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToSubmit2ForBlockMas
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
        if ($this->obj->searchParam($this->parametr, $this->i))
            $name=$parametr[$this->i+1]; 

        $textValue='Ok';
        if ($this->obj->searchParam($this->parametr, $this->i+1))
            $textValue=$this->parametr[$this->i+2]; 
        $textWww=$this->parametr[1]; 

        if ($this->obj->searchParam($this->parametr, $this->i+2))
            $textWww=$this->parametr[$this->i+3]; 
        $class=$this->parametr[0].$this->i;

         if (!$this->obj->getZeroStyle()) $rez = '<input 
                                                    type="submit" 
                                                    name="'.$name.'" 
                                                    value="'.$textValue.'" 
                                                    class="'.$class.' btn" 
                                                    formaction="'.$textWww.'"
                                                  >';

         if ($$this->obj->getZeroStyle()) $rez = '<input 
                                                    type="submit" 
                                                    name="'.$name.'" 
                                                    value="'.$textValue.'" 
                                                    class="'.$class.'" 
                                                    formaction="'.$textWww.'"
                                                  >';

         return $rez;
    }
 }
