<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SPAN
 * проверяет остальные параметры и возвращает содержимое
 */

class ClassToSpanForBlockMas
{
    public $parametr;
    public $i;
    public $obj;
    private $old;
    private $nameB;

    public $text;
    public $class;
    public $value;

    public function __construct($parametr, $i, $obj, $old, $nameB, $value)
    {
        $this->parametr = $parametr;
        $this->i = $i;
        $this->obj = $obj;
        $this->old = $old;
        $this->nameB = $nameB;
        $this->value = $value;
    }

    public function __toString()
    {
        $this->text='';
        /**
         * если $old=true, то класс работает с функцией formBlock
         * усли $old=false, то с formBlockMas
         */
        if ($this->old) 
          $this->class=$this->nameB.$this->i;
        else 
          $this->class=$this->parametr[0].'span'.$this->i; 

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
