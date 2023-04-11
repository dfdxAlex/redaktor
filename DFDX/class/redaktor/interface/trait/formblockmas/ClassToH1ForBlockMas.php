<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс активируется тогда, когда нужно поставить абзац 
 * или заголовок. Находит все параметры и возвращает готовую строку
 */

class ClassToH1ForBlockMas
{
    public $parametr;
    public $i;
    private $old;
    private $nameB;
    public $value;
    public $obj;

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
        $this->text='';
        /**
         * если $old=true, то класс работает с функцией formBlock
         * усли $old=false, то с formBlock
         */
        if ($this->old) 
            $this->class=$this->nameB.$this->i;
        else
            $this->class=$this->parametr[0].$this->value.$this->i; 

        /**
         * Класс проверяет есть ли параметры для помещения в 
         * устанавливаемый элемент. Вложенность до 4-х параметров.
         * Первый параметр - это ссылка на вызываемый объект This
         * Остальные параметры, до 4-х - это имена переменных, 
         * которые необходимо изменить.
         * Если переменных меньше 4-х, то их можно не указывать.
         * Первая переменная - это первый аттрибут элемента и так далее
         */
        $obj2 = new ClassFormBlockSearchParametr($this, 'text', 'class');
        $obj2->searchParametr();

        return new ReturnH1($this);
    }
}
