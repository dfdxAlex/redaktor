<?php
namespace class\redaktor\interface\trait\formblockmas;


/**
 * Класс проверяет есть ли параметры для помещения в 
 * устанавливаемый элемент. Вложенность до 4-х параметров.
 * Первый параметр - это ссылка на вызываемый объект This
 * Остальные параметры, до 4-х - это имена переменных, 
 * которые необходимо изменить.
 * Если переменных меньше 4-х, то их можно не указывать.
 * Первая переменная - это первый аттрибут элемента и так далее
 */
class ClassFormBlockSearchParametr
{
    private $in;
    private $var1;
    private $var2;
    private $var3;
    private $var4;

    public function __construct($in,$var1=false,$var2=false,$var3=false,$var4=false)
    {
        $this->in = $in;
        $this->var1 = $var1;
        $this->var2 = $var2;
        $this->var3 = $var3;
        $this->var4 = $var4;
    }

    public function searchParametr()
    {
        $v1 = $this->var1;
        $v2 = $this->var2;
        $v3 = $this->var3;
        $v4 = $this->var4;

        if ($this->var1 && $this->in->obj->searchParam($this->in->parametr, $this->in->i)) {
            $this->in->$v1=$this->in->parametr[$this->in->i+1]; 
            if ($this->var2 && $this->in->obj->searchParam($this->in->parametr, $this->in->i+1)) {
                $this->in->$v2=$this->in->parametr[$this->in->i+2];
                if ($this->var3 && $this->in->obj->searchParam($this->in->parametr, $this->in->i+2)) {
                    $this->in->$v3=$this->in->parametr[$this->in->i+3];
                    if ($this->var4 && $this->in->obj->searchParam($this->in->parametr, $this->in->i+3)) {
                        $this->in->$v4=$this->in->parametr[$this->in->i+4];
                    }
                }
            }
        }
    }
}
