<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Простая фабрика, создает объект в зависимости от входящешл
 * параметра $in
 * Работает с функцией formBlockMas() и formBlock()
 */

class FactoryForFormBlockMas
{
    static $linkObj = false;
    public static function factoryForFormBlockMas($in, array $parametr, $i, $nameBlock='', $actionN='', $old=false) 
    {
        if (empty(self::$linkObj)) self::$linkObj = new \class\redaktor\interface\trait\formblock\SearchParam($parametr);
        
        if ($in == 'span') return new ClassToSpanForBlockMas($parametr, $i, self::$linkObj, $old, $nameBlock, $in);
        if ($in == 'submit3') return new ClassToSubmit3ForBlockMas($parametr, $i, self::$linkObj, $actionN, $old, $nameBlock);
        if ($in == 'submit2') return new ClassToSubmit2ForBlockMas($parametr, $i, self::$linkObj, $actionN, $old, $nameBlock);
        if ($in == 'submit') return new ClassToSubmitForBlockMas($parametr, $i, self::$linkObj, $actionN, $old, $nameBlock);
        if ($in == 'reset') return new ClassToResetForBlockMas($parametr, $i, self::$linkObj, $actionN, $old, $nameBlock);
        
        if ($in=='p' 
          || $in=='h1' 
            || $in=='h2' 
              || $in=='h3' 
                || $in=='h4' 
                  || $in=='h5' 
                    || $in=='h6') return new ClassToH1ForBlockMas($parametr, $i, $in, self::$linkObj, $old, $nameBlock);
    }
}




