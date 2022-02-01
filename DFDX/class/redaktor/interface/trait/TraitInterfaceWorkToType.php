<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToType
{
    //interface InterfaceWorkToType

    public function proverkaMassiwa($mas,$slowo)
    {
      foreach($mas as $value)
        if ($value==$slowo) 
            return true;
      return false;
    }

    public function clearCode($cod,...$parametr) 
    {
         //разрешенные теги
         //Функция выводит очищенную строку с кодом, либо список допустимых тегов
         //Если есть входящий параметр список_тегов_строка, то список вернется одной строкой (значение по умолчанию)
         //Если есть входящий параметр список_тегов_столбец, то список вернется одной строкой разделенное тегами <br>
         //Чтобы функция вернула преобразованный текст, следует задать параметр 'текст' (по умолчанию)
         //Чтобы получить список разрешенных тегов, необходимо задать параметр 'список'
         //Чтобы удалить ВСЕ теги нужен параметр удалить_все
 
         $spisokPlusBr=false;
         $listTegow='';
         $vivod=true;
         $udalitVse=false;
       
         foreach($parametr as $value) {
           if ($value=='список_тегов_столбец')
             $spisokPlusBr=true;
 
         //foreach($parametr as $value)
           if ($value=='список')
             $vivod=false;
 
         //foreach($parametr as $value)
           if ($value=='удалить_все')
             $udalitVse=true;
         }
 
         if ($udalitVse) // Если команда Удалить Все теги
             $cod=preg_replace('/>|</','',$cod); // Удалить лишнее
 
         if (!$udalitVse) {// Если нет команды Удалить Все теги
          
             $cod=preg_replace('/</','&lt',$cod); // Удалить лишнее
             $cod=preg_replace('/<\?php/','&lt?php',$cod); // Заменить открывающий тег php на нарисованный
             $cod=preg_replace('/>/','&gt',$cod); // 
             $cod=preg_replace('/class/','',$cod); // Удалить лишнее
             $cod=preg_replace('/"&gt/','">',$cod); // вернуть кавычку с закрытым тегом
             $cod=preg_replace('/&ltp&gt/','<p>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/p&gt/','</p>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltp&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth1&gt/','<h1>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h1&gt/','</h1>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth1&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth2&gt/','<h2>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h2&gt/','</h2>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth2&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth3&gt/','<h3>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h3&gt/','</h3>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth3&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth4&gt/','<h4>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h4&gt/','</h4>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth4&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth5&gt/','<h5>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h5&gt/','</h5>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth5&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth6&gt/','<h6>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h6&gt/','</h6>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth6&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lti&gt/','<i>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/i&gt/','</i>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lti&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltfont&gt/','<font>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/font&gt/','</font>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltfont&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbr&gt/','<br>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/br&gt/','</br>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltbr&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltacronym&gt/','<acronym>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/acronym&gt/','</acronym>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltacronym&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltabbr&gt/','<abbr>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/abbr&gt/','</abbr>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltabbr&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lta\s/','<a ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/a&gt/','</a>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lta&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltu&gt/','<u> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/u&gt/','</u>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltu&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lttt&gt/','<tt> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/tt&gt/','</tt>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lttt&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsup&gt/','<sup> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/sup&gt/','</sup>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsup&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltstrong&gt/','<strong> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/strong&gt/','</strong>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltstrong&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltstrike&gt/','<strike> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/strike&gt/','</strike>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltstrike&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltspan&gt/','<span> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/span&gt/','</span>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltspan&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsmall&gt/','<small> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/small&gt/','</small>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsmall&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsamp&gt/','<samp> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/samp&gt/','</samp>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsamp&gt ';
             
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lts&gt/','<s> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/s&gt/','</s>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lts&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltq&gt/','<q> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/q&gt/','</q>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltq&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltkbd&gt/','<kbd> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/kbd&gt/','</kbd>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltkbd&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltem&gt/','<em> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/em&gt/','</em>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltem&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdfn&gt/','<dfn> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/dfn&gt/','</dfn>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdfn&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltcode&gt/','<code> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/code&gt/','</code>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltcode&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltcite&gt/','<cite> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/cite&gt/','</cite>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltcite&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbig&gt/','<big> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/big&gt/','</big>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltbig&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltb&gt/','<b> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/b&gt/','</b>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltb&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltiframe/','<iframe',$cod); // Удалить лишнее
             $cod=preg_replace('/&gt&lt\/iframe&gt/','></iframe>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltiframe&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';  // переработка и разрешение тегов <br /> в <br>
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbr/','<br',$cod); // Удалить лишнее
             $cod=preg_replace('/\s\/&gt/','>',$cod); // Вернуть закрытый тег
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdiv&gt/','<div> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/div&gt/','</div>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdiv&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltimg/','<img ',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltimg&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltpre/','<pre ',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltpre&gt ';
          }
 
         if ($vivod) 
             return $cod;
         if (!$vivod) 
             return $listTegow;
    }
  //interface InterfaceWorkToType
  public function trueFalseNull($param)
  {
    if ($param===true) return 'True';
    if ($param===false) return 'False';
    if (is_null($param)) return 'NULL';
    return false;
  }

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
