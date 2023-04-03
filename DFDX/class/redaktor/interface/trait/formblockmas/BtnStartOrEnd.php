<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Делегация, удаляет повторяющийся код выбора наличия в классе
 * кнопки бутстрапа и если да, то на первом или втором месте 
 * класс btn
 */

 class BtnStartOrEnd
{
    private $in;
    public function __construct($in)
    {
        $this->in = $in;
    }
    public function setStyle()
    {
        $this->in->textWww=$this->in->actionN;
        $this->in->class=$this->in->nameB.$this->in->name.$this->in->i;
        if (!$this->in->obj->getZeroStyle()) {
            if ($this->in->obj->getBtnStart())
                $this->in->class='btn '.$this->in->obj->getBtnStart().$this->in->class;
            else
                $this->in->class=$this->in->class.' btn '.$this->in->obj->getBtnStart();
        }
    }
}
