<?php
namespace class\redaktor\interface\trait\formblock;
    /**
     *Служебная функция проверяет не является ли параметр кнопкой
     */
class SearcTegFormBlock
{
       // Служебная функция проверяет не является ли параметр кнопкой
       public function searcTegFormBlock($parametr)
       {
           if ($parametr=='br') return true;
           if ($parametr=='text') return true;
           if ($parametr=='text2') return true;
           if ($parametr=='password') return true;
           if ($parametr=='password2') return true;
           if ($parametr=='reset') return true;
           if ($parametr=='p') return true;
           if ($parametr=='h1') return true;
           if ($parametr=='h2') return true;
           if ($parametr=='h3') return true;
           if ($parametr=='h4') return true;
           if ($parametr=='h5') return true;
           if ($parametr=='h6') return true;
           if ($parametr=='pButton') return true;
           if ($parametr=='h1Button') return true;
           if ($parametr=='h2Button') return true;
           if ($parametr=='h3Button') return true;
           if ($parametr=='h4Button') return true;
           if ($parametr=='h5Button') return true;
           if ($parametr=='h6Button') return true;
           if ($parametr=='submit') return true;
           if ($parametr=='submit2') return true;
           if ($parametr=='submit3') return true;
           if ($parametr=='span') return true;
           if ($parametr=='color') return true;
           if ($parametr=='radio') return true;
           if ($parametr=='checkbox') return true;
           if ($parametr=='buttonUrl') return true;
           if ($parametr=='textL') return true;
           if ($parametr=='textLH') return true;
           if ($parametr=='div') return true;
           if ($parametr=='ulli') return true;
           if ($parametr=='olli') return true;
           if ($parametr=='dlli') return true;
           if ($parametr=='select') return true;
           return false;
       }
}
