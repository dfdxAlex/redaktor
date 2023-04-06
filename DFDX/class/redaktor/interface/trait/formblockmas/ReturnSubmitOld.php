<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс рисует кнопки для функций formBlock и formBlockMas
 */


class ReturnSubmitOld
{
  private $btn;
  private $div;
  private $in;

  public function __construct($in, $btn=false, $div=false)
  {
      $this->btn = $btn;
      $this->div = $div;
      $this->in = $in;
  }

  public function __toString()
  {
      $rez='';
      if ($this->div)  $rez = '<div class="'.$this->in->class.'Div">';
      $rez.='<input 
               type="submit" 
               name="'.$this->in->name.'" 
               value="'.$this->in->textValue.'" 
               class="'.$this->in->class;
      if ($this->btn) $rez.=' btn';
      $rez.='" formaction="'.$this->in->textWww.'">';
      if ($this->div)  $rez.='</div>';
      
      return $rez;
  }
}
