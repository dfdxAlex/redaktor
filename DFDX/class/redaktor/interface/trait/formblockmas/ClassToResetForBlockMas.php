<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT3
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToResetForBlockMas
 {
  public $parametr;
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
        $this->textValue='Reset';
        $this->class=$this->parametr[0].'reset'.$this->i;


        /**
         * Класс проверяет есть ли параметры для помещения в 
         * устанавливаемый элемент. Вложенность до 4-х параметров.
         * Первый параметр - это ссылка на вызываемый объект This
         * Остальные параметры, до 4-х - это имена переменных, 
         * которые необходимо изменить.
         * Если переменных меньше 4-х, то их можно не указывать.
         * Первая переменная - это первый аттрибут элемента и так далее
         */
        $obj2 = new ClassFormBlockSearchParametr($this, 'textValue');
        $obj2->searchParametr();


        if (!$this->old) {
            if (!$this->obj->getZeroStyle()) 
                $rez = new ReturnButtomResetNew($this);

            if ($this->obj->getZeroStyle()) 
                $rez = new ReturnButtomResetNew($this);

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
       $rez = new ReturnButtomResetNew($this);
    }

        return $rez;
     }
}


// <?php
// namespace class\redaktor\interface\trait\formblockmas;

class ReturnButtomResetNew
{

/**
 * Служебный класс для функций formBlock() и formBlockMas
 * Класс выводит кнопку Reset
 * Входящий параметр in содержит ссылку на вызываемый объект,
 * от туда и берется информация о параметрах кнопки
 */


    private $in;
    public function __construct($in)
    {
        $this->in = $in;
    }

    public function __toString()
    {
        return "<input 
                  type='reset' 
                  value='{$this->in->textValue}' 
                  class='{$this->in->class}' 
                >";
    }
}




