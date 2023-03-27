<?php
namespace class\redaktor\interface\trait\formblock;
    /**
    * Класс проверяет существует ли следующий элемент в массиве, 
    * не является ли он тегом для бутстрапа и не является ли он тегоm 
    * в принципе
    */
class SearchParam extends SearcTegFormBlock
{
    private $form_not_open = false;
    private $form_not_close = false;
    private $zero_style = false;
    private $btn_start = false;
    private $btn_btn = '';

    public function __construct($parametr)
    {
       // поиск различных признаков.
       foreach ($parametr as $value) {// поиск признаков $form_not_open и $form_not_close=false;
        if ($value=='form_not_open') $this->form_not_open=true;
        if ($value=='form_not_close') $this->form_not_close=true;
        if ($value=='zero_style') $this->zero_style=true;
        if ($value=='btn_start') $this->btn_start=true;
        if ($value=='btn-primary') $this->btn_btn='btn-primary ';
        if ($value=='btn-secondary') $this->btn_btn='btn-secondary ';
        if ($value=='btn-success') $this->btn_btn='btn-success ';
        if ($value=='btn-danger') $this->btn_btn='btn-danger ';
        if ($value=='btn-warning') $this->btn_btn='btn-warning ';
        if ($value=='btn-info') $this->btn_btn='btn-info ';
        if ($value=='btn-light') $this->btn_btn='btn-light ';
        if ($value=='btn-dark') $this->btn_btn='btn-dark ';
        if ($value=='btn-link') $this->btn_btn='btn-link ';
     }
    }
    public function getBtnBtn()
    {
        return $this->btn_btn;
    }
    public function getBtnStart()
    {
        return $this->btn_start;
    }

    public function getZeroStyle()
    {
        return $this->zero_style;
    }

    public function getFormNotClose()
    {
        return $this->form_not_close;
    }
    public function getFormNotOpen()
    {
        return $this->form_not_open;
    }
   /**
    * Функция проверяет существует ли следующий элемент в массиве, 
    * не является ли он тегом для бутстрапа и не является ли он тегоm 
    * в принципе
    */
    public function searchParam(array $parametr, int $i)
    {
        if (isset($parametr[$i+1]))                              // если следующий параметр существует
            if ($this->noBootstrap($parametr[$i+1]))             // если это не разметка бутстрапа
                if (!$this->searcTegFormBlock($parametr[$i+1]))  // если это не следующая форма
                    return true;
        return false;
    }
    //функция проверяет, не находится ли в очередном параметре ключевые 
    //слова работы с бутстрапом
    private function noBootstrap($attrib)
    {
         return match ($attrib) {
             'bootstrap-start'=>false,
             'bootstrap-f-start'=>false,
             'bootstrap-finish'=>false,
             default => true
         };
    }
}
