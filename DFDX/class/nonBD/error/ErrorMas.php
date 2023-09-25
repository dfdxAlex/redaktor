<?php
namespace class\nonBD\error;

/**
 * Класс выводит ошибки, собравшиеся в другом классе.
 * 
 * Инструкция к применению:
 * Класс выводит ошибки из специального массива, который
 * заполняется в другом классе. Собственно - это не обязательно
 * ошибки, но они будут выводиться на красном фоне.
 * 
 * Чтобы всё работало, каждый класс, который захочет обрабатываться этим
 * классом должен имплементировать интерфейс:
 * implements \class\nonBD\interface\IErrorMas
 * В данном интерфейсе есть два метода, которые описаны в трейте:
 * use \class\nonBD\error\TraitForError; , поэтому, этот трейт
 * тоже следует подключить к классу.
 * 
 * Массив, который нужен для хранения ошибок так-же описан в трейте.
 * 
 * В классе, в котором заполняется массив с ошибками, можно
 * заполнять непосредственно массив: 
 * $this->masError[] = 'Pair login or password';,
 * а можно воспользоваться методом:
 * $this->addError('Pair login or password');
 * 
 */

class ErrorMas
{
    protected $in;

    public function __construct(\class\nonBD\interface\IErrorMas $in) 
    {
        $this->in = $in;
    }

    public function __toString()
    {
        $rez='';
        if (count($this->in->getMassError())==0) {
            $rez = "<div class='alert alert-success' role='alert'>
                      Operation was successfully completed!
                    </div>";
        } else {
            foreach ($this->in->getMassError() as $key=>$val) {
                $rez.=$this->block($val);
            }
        }

        return $rez;
    }

    public function block($massage)
    {   return "
        <div class='alert alert-danger' role='alert'>
        $massage
        </div>";
    }
}


