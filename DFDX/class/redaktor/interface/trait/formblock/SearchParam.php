<?php
namespace class\redaktor\interface\trait\formblock;
    /**
    * Класс проверяет существует ли следующий элемент в массиве, 
    * не является ли он тегом для бутстрапа и не является ли он тегоm 
    * в принципе
    */
class SearchParam extends SearcTegFormBlock
{
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
