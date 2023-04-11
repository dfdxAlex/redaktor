<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Класс запускется когда необходимо поставить элемент SUBMIT2
 * проверяет остальные параметры и возвращает содержимое
 */

 class ClassToSubmit2ForBlockMas
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
        $this->name=$this->parametr[0].'submit'.$this->i;
        $this->textValue='Ok';
        $this->textWww=$this->parametr[1]; 
        $this->class=$this->parametr[0].$this->i;

        /**
         * Класс проверяет есть ли параметры для помещения в 
         * устанавливаемый элемент. Вложенность до 4-х параметров.
         * Первый параметр - это ссылка на вызываемый объект This
         * Остальные параметры, до 4-х - это имена переменных, 
         * которые необходимо изменить.
         * Если переменных меньше 4-х, то их можно не указывать.
         * Первая переменная - это первый аттрибут элемента и так далее
         */
        $obj2 = new ClassFormBlockSearchParametr($this, 'name', 'textValue', 'textWww');
        $obj2->searchParametr();
        
        if (!$this->old) {
            if (!$this->obj->getZeroStyle()) 
               /**
                * выводит кнопку если работаем со старыми вариантами
                * реализации класса, функция formBlockMas с бутстрапом
                */
                $rez = new ReturnSubmitOld($this, true);

            if ($this->obj->getZeroStyle()) 
               /**
                * выводит кнопку если работаем со старыми вариантами
                * реализации класса, функция formBlockMas без бутстрапа
                */
                $rez = new ReturnSubmitOld($this);

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
