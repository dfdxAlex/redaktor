<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Простая фабрика, создает объект в зависимости от входящешл
 * параметра $in
 * Работает с функцией formBlockMas() и formBlock()
 */

class ClasForFormBlockMas
{
    static $linkObj = false;
    public static function factoryForFormBlockMas($in, array $parametr, $i, $nameBlock='', $actionN='') 
    {
        if (empty(self::$linkObj)) self::$linkObj = new \class\redaktor\interface\trait\formblock\SearchParam($parametr);
        
        if ($in == 'span') return new ClassToSpanForBlockMas($parametr, $i, self::$linkObj);
        if ($in == 'submit3') return new ClassToSubmit3ForBlockMas($parametr, $i, self::$linkObj, $actionN);
        if ($in == 'submit2') return new ClassToSubmit3ForBlockMas($parametr, $i, self::$linkObj, $actionN);
        
        if ($in=='p' 
          || $in=='h1' 
            || $in=='h2' 
              || $in=='h3' 
                || $in=='h4' 
                  || $in=='h5' 
                    || $in=='h6') return new ClassToH1ForBlockMas($parametr, $i, $in, self::$linkObj);
    }
}




