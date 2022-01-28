<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToType
{
   //interface InterfaceWorkToType
   public function notFalseAndNULL($data):bool
   {
     if ($data===false) return false;
     if (is_null($data)) return false;
     if (!isset($data)) return false;
     return true;
   }
   //interface InterfaceWorkToType
   public function printMas($mas)
   {
      if (!isset($mas)) {
            echo 'Переменная не существует';
            return;
       }
      if ($this->trueFalseNull($mas)!==false) 
            echo $this->trueFalseNull($mas);
      if (gettype($mas)=='unknown type') {
            echo 'Неопределенный тип переменной';
            return;
       }
      if (gettype($mas)=='object') {
            echo 'Входной параметр тира "object"';
            return;
       }
      if (gettype($mas)=='resource') {
            echo 'Входной параметр тира "resource"';
            return;
       }
      if (gettype($mas)=='string') {
            echo 'Тип "string": '.$mas;
            return;
       }
      if (gettype($mas)=='double') {
            echo 'Тип "double или float": '.$mas;
            return;
       }
      if (gettype($mas)=='integer') {
            echo 'Тип "integer": '.$mas;
            return;
       }
      $masZero=true; // если не будет ни одного входа, то считать массив пустым
      if (gettype($mas)=='array') { 
          foreach ($mas as $index2 => $mas2) {
             $masZero=false;
             if ($this->trueFalseNull($mas2)!==false) 
                echo '['.$index2.']='.$this->trueFalseNull($mas2);
             if (gettype($mas2)=='string' || gettype($mas2)=='double' || gettype($mas2)=='integer') 
                echo '['.$index2.']='.$mas2;

             if (gettype($mas2)=='array')
              foreach ($mas2 as $index3 => $mas3) {
                  if ($this->trueFalseNull($mas3)!==false) 
                      echo '['.$index2.']['.$index3.']='.$this->trueFalseNull($mas3);
                  if (gettype($mas3)=='string' || gettype($mas3)=='double' || gettype($mas3)=='integer') 
                      echo '['.$index2.']['.$index3.']='.$mas3;

                  if (gettype($mas3)=='array')
                    foreach ($mas3 as $index4 => $mas4) {
                       if ($this->trueFalseNull($mas4)!==false) 
                          echo '['.$index2.']['.$index3.']['.$index4.']='.$this->trueFalseNull($mas4);
                       if (gettype($mas4)=='string' || gettype($mas4)=='double' || gettype($mas4)=='integer') 
                          echo '['.$index2.']['.$index3.']['.$index4.']='.$mas4;

                       if (gettype($mas4)=='array')
                        foreach ($mas4 as $index5 => $mas5) {
                          if ($this->trueFalseNull($mas5)!==false) 
                              echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']='.$this->trueFalseNull($mas5);
                          if (gettype($mas5)=='string' || gettype($mas5)=='double' || gettype($mas5)=='integer') 
                              echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']='.$mas5;

                          if (gettype($mas5)=='array')
                            foreach ($mas5 as $index6 => $mas6)  {
                              if ($this->trueFalseNull($mas6)!==false) 
                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']='.$this->trueFalseNull($mas6);
                              if (gettype($mas6)=='string' || gettype($mas6)=='double' || gettype($mas6)=='integer') 
                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']='.$mas6;
                              
                              if (gettype($mas6)=='array')
                                foreach ($mas6 as $index7 => $mas7) {
                                  if ($this->trueFalseNull($mas7)!==false) 
                                      echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']='.$this->trueFalseNull($mas7);
                                  if (gettype($mas7)=='string' || gettype($mas7)=='double' || gettype($mas7)=='integer') 
                                      echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']='.$mas7;

                                  if (gettype($mas7)=='array')
                                    foreach ($mas7 as $index8 => $mas8) {
                                        if ($this->trueFalseNull($mas8)!==false) 
                                            echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']='.$this->trueFalseNull($mas8);
                                        if (gettype($mas8)=='string' || gettype($mas8)=='double' || gettype($mas8)=='integer') 
                                            echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']='.$mas8;

                                        if (gettype($mas8)=='array')
                                          foreach ($mas8 as $index9 => $mas9) {
                                              if ($this->trueFalseNull($mas9)!==false) 
                                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']='.$this->trueFalseNull($mas9);
                                              if (gettype($mas9)=='string' || gettype($mas9)=='double' || gettype($mas9)=='integer') 
                                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']='.$mas9;

                                              if (gettype($mas9)=='array')
                                                 foreach ($mas9 as $index10 => $mas10) {
                                                    if ($this->trueFalseNull($mas10)!==false) 
                                                        echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']['.$index10.']='.$this->trueFalseNull($mas10);
                                                    if (gettype($mas10)=='string' || gettype($mas10)=='double' || gettype($mas10)=='integer') 
                                                        echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']['.$index10.']='.$mas10;

                                                    if (gettype($mas10)=='array') 
                                                        echo 'Массив глубже 9-ти мерного';
                                                    echo '<br>';
                                                  }
                                             echo '<br>';
                                            }
                                        echo '<br>';
                                      }
                                      echo '<br>';
                                  }
                                  echo '<br>';
                             }
                             echo '<br>';
                         }
                         echo '<br>';
                     }
                     echo '<br>';
                }
                echo '<br>';
           }
           echo '<br>';
       }
      echo '<br>';
      if (gettype($mas)=='array' && $masZero) 
          echo 'Массив пуст';
   }
}
