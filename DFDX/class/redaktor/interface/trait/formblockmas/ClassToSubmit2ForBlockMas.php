<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT2
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToSubmit2ForBlockMas
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
        $textValue='Ok';
        $this->textWww=$this->parametr[1]; 
        $this->class=$this->parametr[0].$this->i;

        if ($this->obj->searchParam($this->parametr, $this->i)) {
            $this->name=$this->parametr[$this->i+1]; 
            if ($this->obj->searchParam($this->parametr, $this->i+1)) {
                $textValue=$this->parametr[$this->i+2]; 
                if ($this->obj->searchParam($this->parametr, $this->i+2))
                    $this->textWww=$this->parametr[$this->i+3]; 
            }
        }
        
        if (!$this->old) {
         if (!$this->obj->getZeroStyle()) $rez = '<input 
                                                    type="submit" 
                                                    name="'.$this->name.'" 
                                                    value="'.$textValue.'" 
                                                    class="'.$this->class.' btn" 
                                                    formaction="'.$this->textWww.'"
                                                  >';

         if ($this->obj->getZeroStyle()) $rez = '<input 
                                                    type="submit" 
                                                    name="'.$this->name.'" 
                                                    value="'.$textValue.'" 
                                                    class="'.$this->class.'" 
                                                    formaction="'.$this->textWww.'"
                                                  >';
                                                } else {
                                                    // $textWww=$this->actionN;
                                                    // $class=$this->nameB.$name.$this->i;
                                                    // if (!$this->obj->getZeroStyle()) {
                                                    //     if ($this->obj->getBtnStart())
                                                    //         $class='btn '.$this->obj->getBtnStart().$class;
                                                    //     else
                                                    //         $class=$class.' btn '.$this->obj->getBtnStart();
                                                    // }
                                                    $obj1 = new BtnStartOrEnd($this);
                                                    $obj1->setStyle();
                                                    
                                                    $rez = "<input 
                                                    type='submit' 
                                                    id='$this->name' 
                                                    name='$this->name' 
                                                    value='$textValue' 
                                                    class='$this->class' 
                                                    formaction='$this->textWww'
                                                  >";
                                                }



         return $rez;
    }
 }
