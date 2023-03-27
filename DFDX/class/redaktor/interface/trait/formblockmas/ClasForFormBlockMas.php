<?php
namespace class\redaktor\interface\trait\formblockmas;

/**
 * Простая фабрика, создает объект в зависимости от входящешл
 * параметра $in
 * Работает с функцией formBlockMas() и formBlock()
 */

class ClasForFormBlockMas
{
    public static function factoryForFormBlockMas($in, array $parametr, $i) 
    {
        if ($in == 'span') return new ClassToSpanForBlockMas($parametr, $i);
        
        if ($in=='p' 
          || $in=='h1' 
            || $in=='h2' 
              || $in=='h3' 
                || $in=='h4' 
                  || $in=='h5' 
                    || $in=='h6') return new ClassToH1ForBlockMas($parametr, $i, $in);
    }
}




