<?php
// Класс содержит базовые методы, которые используются в других классах
namespace redaktor;

class instrument
{
    public function __construct()
    {
    }  
   // функция возвращает труе, если входящее значение не равно Фальс и не равно NULL и существует class instrument
   public function notFalseAndNULL($data)
   {
     if ($data===false) return false;
     if (is_null($data)) return false;
     if (!isset($data)) return false;
     return true;
   }
   // функция выводит на экран массив неизвестного уровня - главная задача
   // функция выводит тип переменной и её значение если это не массив
   // функция просматривает до 9-ти мерные массивы включительно
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
   // функция возвращает текстовое значение переданного параметра булеан или нулл или false, если параметр не соответствует этим типам
   public function trueFalseNull($param)
    {
      if ($param===true) 
          return 'True';
      if ($param===false) 
          return 'False';
      if (is_null($param)) 
          return 'NULL';
      return false;
    }
   //Функция очищает код от вредных тегов оставляя разрешенные
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
         }

        if ($vivod) 
            return $cod;
        if (!$vivod) 
            return $listTegow;
   }
   // ловим кнопку
   public function hanterButton(...$parametr)
    {
      $falseRez=false;
      // просматриваем входящие параметры
      foreach($parametr as $value) {
          $reztrue=false;
          $rezhant=false;
          $valueButton='';
          $returnNameDinamik=false;
          $returnName=false;
          $returnValue=false;
          $nameStatic='';

          if (stripos($value,'false=')!==false) // определяет значение, которое функция вернет в случае неудачного поиска
              $falseRez=preg_replace('/false=/','',$value);

          if (stripos($value,'rez=hant')!==false) // если необходимо поймать нажатую динамическую кнопку
              foreach($parametr as $value)  {

                  if (stripos($value,'nameStatic=')!==false)                // ищем имя кнопки
                      $nameStatic=preg_replace('/nameStatic=/','',$value);  // выделяем имя кнопки

                  if (stripos($value,'returnNameDynamic')!==false)          // ищем имя кнопки
                      $returnNameDinamik=true;                              // вернуть динамическую часть имени кнопки если труе

                  if (stripos($value,'returnName')!==false)                 // ищем имя кнопки
                      $returnName=true;                                     // вернуть полное имя кнопки если труе

                  if (stripos($value,'returnValue')!==false)                // ищем имя кнопки
                      $returnValue=true;                                    // вернуть надпись на кнопке если труе
                }

          if ($nameStatic!='')       // Если передали параметр nameStatic=
            if (isset($_POST))       // Если есть любой массив POST
                foreach($_POST as $key=>$value)             // перебераем массив POST
                    if (stripos($key,$nameStatic)!==false) {//найти нажатую кнопку по статичной части её имени
                        if ($returnValue) 
                            return $value;
                        if ($returnNameDinamik) 
                            return preg_replace('/'.$nameStatic.'/','',$key);
                        if ($returnName) 
                            return $key;
                    }
                    
           // Если массив Пост удалили, то выйти из функции
           if (stripos($value,'rez=true')!==false) // если необходимо проверить была ли нажата кнопка
              foreach($parametr as $value)  {
                  $reztrue=true;
                  if (stripos($value,'name=')!==false)                     // ищем имя кнопки
                  $nameButton=preg_replace('/name=/','',$value);     // выделяем имя кнопки
                  if (stripos($value,'value=')!==false)                    // ищем имя кнопки
                  $valueButton=preg_replace('/value=/','',$value);   // выделяем надпись на кнопке
                }

           if (stripos($value,'rez=info')!==false) // если необходимо вернуть название нажатой кнопки
              foreach($parametr as $value)
                 if (stripos($value,'name=')!==false) {             // ищем имя кнопки
                   $nameButton=preg_replace('/name=/','',$value);   // выделяем имя кнопки
                   if (isset($_POST[$nameButton])) 
                      return $_POST[$nameButton];
                   else false;
                 }
                 
           if ($reztrue)
              if (isset($_POST[$nameButton]) && ($valueButton=='' || $valueButton==$_POST[$nameButton])) 
                  return true; 
              else return false;       // если она нажата, то вернуть труе
        }
        
     //обработка параметра help
  foreach($parametr as $value)
     if ($value=='help' || $value=='Помощь' || $value=='помощь')
      {
        echo '<p class="mesage">Функция проверяет была ли нажата некоторая кнопка и результат выдает в нужном виде.</p><br>';
        echo '<p class="mesage">Узнать была ли нажата некотороя кнопка:</p><br>';
        echo '<p class="mesage">Нужно задать в кавычках "rez=true"</p><br>';
        echo '<p class="mesage">Нужно задать в кавычках "name=имя кнопки"</p><br>';
        echo '<p class="mesage">Если задать "value=надпись на кнопке", проверяется так-же параметр value</p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage">Узнать какая кнопка была нажата</p><br>';
        echo '<p class="mesage">Нужно задать в кавычках "rez=info"</p><br>';
        echo '<p class="mesage">Нужно задать в кавычках "name=имя кнопки"</p><br>';
        echo '<p class="mesage"></p><br>';
        
        echo '<p class="mesage">Поймать динамическую кнопку</p><br>';
        echo '<p class="mesage">Здесь можно узнать какая из динамически созданных кнопок была нажата</p><br>';
        echo '<p class="mesage">Нужно задать в кавычках "rez=hant" (активировать режим)</p><br>';
        echo '<p class="mesage">Необходимо задать неизменяемую часть имени кнопок "nameStatic=имя кнопки"</p><br>';
        echo '<p class="mesage">Необходимо задать возвращаемый параметр:</p><br>';
        echo '<p class="mesage"> "returnNameDynamic" - вернуть динамическую часть имени нажатой кнопки</p><br>';
        echo '<p class="mesage"> "returnName" - Вернуть полное имя нажатой кнопки</p><br>';
        echo '<p class="mesage"> "returnValue" - Вернуть надпись на нажатой кнопке</p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage">Определить false. Определить значение, которое выведется вместо false можно параметром "false=значение"</p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage"></p><br>';
        echo '<p class="mesage"></p><br>';
      }
     return $falseRez;
    }


// функция рисует кнопку с использованием параметров префикса и переменной. Работает с функцией buttonHanter()
public function buttonPrefix(...$parametr)
   {
    $container=false;
    $classB="";
    $action="#";
    $method='method="POST"';
    $classDiv="";
    $knopok=1;
    $classKnopok='';
    $masNameKnopok = array();
    $masValueKnopok = array();
    $masClassKnopok = array();
    $help=false;

foreach($parametr as $value) {
    if (stripos($value,'помощь')!==false)
      $help=true;
    if (stripos($value,'Помощь')!==false)
      $help=true;
    if (stripos($value,'help')!==false)
      $help=true;
    if (stripos($value,'container')!==false)
      $container=true;
    if (stripos($value,'class=-row-')!==false)
      $classB=preg_replace('/-/','"',$value);
    if (stripos($value,'class')!==false && stripos($value,'class=-row-')===false)
      $classDiv=preg_replace('/-/','"',$value);
    if (stripos($value,'action')!==false)
      $action=preg_replace('/-/','"',$value);
    if (stripos($value,'method')!==false)
      $method=preg_replace('/-/','"',$value);
    if (stripos($value,'classButton=')!==false) {
       $classKnopok=preg_replace('/-/','"',$value);
       $classKnopok=preg_replace('/Button/','',$classKnopok);
     }
    if (stripos($value,'кнопок-')!==false)
      $knopok=preg_replace('/кнопок-/','',$value);
}
    for ($i=1;$i<=$knopok;$i++) {//объявить пустой массив
        $masNameKnopok[$i]='имя не задано';
        $masValueKnopok[$i]='название не задано';
        $masClassKnopok[$i]='';
     }
    for ($i=1;$i<=$knopok;$i++) {
        foreach($parametr as $value) {
            $poisk='n'.$i.'-';
            if (stripos($value,$poisk)!==false) {
                $poisk='/'.$poisk.'/';
                $masNameKnopok[$i]=preg_replace($poisk,'',$value);
            }
            $poisk='v'.$i.'-';
            if (stripos($value,$poisk)!==false) {
                $poisk='/'.$poisk.'/';
                $masValueKnopok[$i]=preg_replace($poisk,'',$value);
            }
            $poisk='c'.$i.'=';
            if (stripos($value,$poisk)!==false) { 
                $poisk='/'.$poisk.'/';
                $masClassKnopok[$i]=preg_replace($poisk,'class=',$value);
                $masClassKnopok[$i]=preg_replace('/-/','"',$masClassKnopok[$i]);
            } 
          }
      }

    //рисуем кнопку
    if ($container) 
        echo '<section class="container">';
    if ($container && $classB!="") 
        echo '<div '.$classB.'>';
    if ($classDiv!="") 
        echo '<div '.$classDiv.'>';
    echo '<form '.$action.' '.$method.'>';
    $class=$classKnopok;

    for ($i=1; $i<=$knopok;$i++) {
      echo '<input ';
      if ($masClassKnopok[$i]!='') 
          echo $masClassKnopok[$i];
      if ($masClassKnopok[$i]=='' && $class!='') 
          echo $class;
      echo ' type="submit" name="'.$masNameKnopok[$i].'" value="'.$masValueKnopok[$i].'">';
     }

    echo '</form>';
    if ($classDiv!="") 
        echo '</div>';
    if ($container && $classB!="") 
        echo '</div>';
    if ($container) 
        echo '</section>';
     //обработка параметра help
    if ($help) {
         echo '<p class="mesage">Чтобы кнопка была в отдельном контейнере, то нужен параметр container. Пример:buttonPrefix("container");</p><br>';
         echo '<p class="mesage">Чтобы добавить CLASS=ROW от бутстрапа, то вводим параметр данного класса в параметр функции:<br>';
         echo 'Пример:buttonPrefix("class=-row-"); Знак "-" там, где нужны кавычки. В функцию передаем "-"<br>';
         echo 'Для добавления произвольного класса вместе с дивом вводим параметр<br>';
         echo 'Пример:buttonPrefix("class=-имя произвольного класса-"); Знак "-" там, где нужны кавычки. В функцию передаем "-"</p><br>';
         echo '<p class="mesage"></p><br>';
         echo '<p class="mesage">Далее параметры кнопки<br>';
         echo 'Для указания ссылки на страницу обработки вводим параметр buttonPrefix("action=-ссылка-")<br>';
         echo 'Для указания метода передачи параметров вводим параметр buttonPrefix("method=-post или get-"), по умолчанию POST уже есть.</p><br>';
         echo '<p class="mesage">Число кнопок задается словом "кнопок-5" buttonPrefix("кнопок-5");</p><br>';
         echo '<p class="mesage">Имена кнопок задаются с помощью символа n+номер кнопки. buttonPrefix("n1-nameButton");</p><br>';
         echo '<p class="mesage">Название на кнопке задается с помощью символа v+номер кнопки. buttonPrefix("v1-имя первой кнопки");</p><br>';
         echo '<p class="mesage"></p><br>';
         echo '<p class="mesage">Далее работа с классами кнопок</p><br>';
         echo '<p class="mesage">Для назначения класса по умолчанию для тех кнопок, у которых нет своего класса используется слово classButton;<br>';
         echo 'buttonPrefix("classButton=-имя общего класса-");</p><br>';
         echo '<p class="mesage">Чтобы задать персональный класс кнопке, передаем параметр с1=-новый класс- buttonPrefix("с1=-bottonClass-")</p><br>';
         echo '<p class="mesage">Для использования стилей Бутстрапа добавляем класс btn ...</p><br>';
       }
   }

   //Функция возвращает имя и относительный путь к файлу при условии, что искомый файл находится выше текущего места.
   public function searcNamePath($nameFile)
    {
      while (!file_exists($nameFile))
        $nameFile='../'.$nameFile;
      return $nameFile;
    }

   // Функция выводит некое сообщение $mesaz, задает название кнопок, которым будет присвоено OK или Cansel ///проверка git 1-3
   // $mesaz - сообщение, $nameKn - имя кнопки, отправляемой в массив $_POST, $classDiv - дополнительный класс для общего контейнера
   // $classP - класс тегов Р - сообщения, $classButton - класс для кнопок
   public function okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton)
   {
    echo '<section class="container">';
        echo '<div class="row '.$classDiv.'">';
            echo '<p class="'.$classP.'">'.$mesaz.'</p>';
            echo '<form action="redaktor.php" method="POST">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="OK">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="Cancel">';
            echo '</form>';
        echo '</div>';
    echo '</section>';
   }
   public function okSelect($mesaz,$nameKn,$classDiv,$classP,$classButton)
   {
    echo '<section class="container">';
        echo '<div class="row '.$classDiv.'">';
            echo '<form action="redaktor.php" method="POST">';
                echo '<input type="checkbox" checked name="'.$nameKn.'Select'.'" id="'.$nameKn.'Id" value="'.$nameKn.'Value">';
                echo '<label for="'.$nameKn.'Id">'.$mesaz.'</label>';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="OK">';
            echo '</form>';
        echo '</div>';
    echo '</section>';
    if (isset($_POST[$nameKn.'Select'])) 
        return $_POST[$nameKn.'Select']; 
    else 
        return false;
   }
   // Набор текстовое поле + кнопки Ok Cansel
   public function poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput)
   {
    echo '<section class="container">';
        echo '<div class="row '.$classDiv.'">';
            echo '<form action="redaktor.php" method="POST">';
                echo '<p class="'.$classP.'">'.$mesaz.'</p>';
                echo '<input class="'.$classInput.'" type="text" name="'.$nameKn.'Text">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="Ok">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="Cancel">';
            echo '</form>';
        echo '</div>';
    echo '</section>';
   }
   // Набор текстовое поле + кнопки Ok Cansel + указывает на страницу обработчик
   public function poleInputokCanselPlusNameStr($nameStr,$mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput)
   {
    echo '<section class="container">';
        echo '<div class="row '.$classDiv.'">';
            echo '<form action="'.$nameStr.'" method="POST">';
                echo '<p class="'.$classP.'">'.$mesaz.'</p>';
                echo '<input class="'.$classInput.'" type="text" name="'.$nameKn.'Text">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="Ok">';
                echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="Cancel">';
            echo '</form>';
        echo '</div>';
    echo '</section>';
   }
   // Функция ставит блок кнопок и текстовых полей без использования базы данных.
   //$nameBlock - имя блока кнопок 
   //$actionN - ссылка на страницу обработки
   //...$parametr дальше пошел список параметров
   // первым в параметре идёт тип кнопки или название тега:
   // Если br то после этого тега можно указать число данных тегов <br>, если не указать, то будет 1 тег
   // Если text, то будет текстовое поле, следующим параметром должно идти имя name=.. за ним текст по умолчанию для value 
   // class="$nameBlock+name+номер кнопки" , по умолчанию value будет пустая строка
   // Если text2, то будет текстовое поле, следующим параметром должно идти имя name=.. за ним текст по умолчанию для placeholder 
   // class="$nameBlock+name+номер кнопки", по умолчанию placeholder будет пустая строка
   // Если textarea то создаем текстовое поле как text, только большое
   // Если password, то будет текстовое поле для ввода пароля, следующим параметром должно идти имя name=.. за ним текст по умолчанию для value 
   // class="$nameBlock+name+номер кнопки" , по умолчанию value будет пустая строка
   // Если password2, то будет текстовое поле для ввода пароля, следующим параметром должно идти имя name=.. за ним текст по умолчанию для placeholder 
   // class="$nameBlock+name+номер кнопки", по умолчанию placeholder будет пустая строка
   // Если reset то будет кнопка очистки текстовых полей. После него следует ввести надпись на кнопке, если параметр пропустить, то на кнопке будет надпись Reset
   // class="$nameBlock+reset+номер кнопки"
   // Если submit то рисуется кнопка, после 3 параметра, имя кнопки, надпись на ней и Третий параметр может быть ссылка на другую страницу обработки формы.
   // class="$nameBlock+name+номер кнопки", надпись на кнопке по умолчанию Ок
   // Если submit2 то рисуется кнопка, после 3 параметра, имя кнопки, надпись на ней и Третий параметр может быть ссылка на другую страницу обработки формы.
   // class="$nameBlock+номер кнопки", надпись на кнопке по умолчанию Ок
   // Если submit3 то рисуется кнопка, после 3 параметра, имя кнопки, надпись на ней и Третий параметр может быть ссылка на другую страницу обработки формы.
   // class кнопки задается 4-м параметром, надпись на кнопке по умолчанию Ок
   // Добавлен Div со своим классом для кнопки. Класс Дива равен классу кнопки + Div
   // Если P или h1-h6, то создаем заголовок. Текст - это следующий параметр, класс - это второй параметр.
   // Добавлен див, класс Дива равен классу заголовка+PH
   // Если span то создаем строчный тег внутри дивов. Текст - это следующий параметр, класс - это второй параметр.
   // Добавлен див, класс Дива равен классу заголовка+PH
   // <div class="classPH"><span class="class">Текст</span></div>
   // Признаки form_not_open form_not_close не обязательны и управляют отсутствием открывающего тега form и закрывающего тега form соответственно.
   // Признак zero_style, если задать этот признак, то элементы будут без  бутстрапа
   // Стили
   // Класс общего Дива равен имени блока. <div class="$nameBlock">
   // Класс внутриформенного блока <div class="$nameBlock-div">
   // бутстрап
   // bootstrap-start - добавляет section, row, col-12
   // bootstrap-f-start - добавляет /col-12 /row row, col-12
   // bootstrap-finish - добавляет /col-12 /row /section
   public function formBlock($nameBlock, $actionN,...$parametr)
   {
      $form_not_open=false;          // Управляет выводом открывающего тега Форм, если фалс, то выводим.
      $form_not_close=false;         // Управляет выводом закрывающего тега Форм, если фалс, то выводим.
      $zero_style=false;
      foreach ($parametr as $value) {// поиск признаков $form_not_open и $form_not_close=false;
          if ($value=='form_not_open') $form_not_open=true;
          if ($value=='form_not_close') $form_not_close=true;
          if ($value=='zero_style') $zero_style=true;
       }
    
      if (!$zero_style) {
          echo '<section class="container-fluid">';
          echo '<div class="row">';
      }
      echo '<div class="'.$nameBlock.'">';
      if (!$form_not_open)
          echo '<form action="'.$actionN.'" method="POST">';
      echo '<div class="'.$nameBlock.'-div">';
      $i=0;
      foreach ($parametr as $key => $value) {
         if ($value=='bootstrap-start') {
            echo '<section class="container-fluid">';
            echo '<div class="row">';
            echo '<div class="col-12">';
          }
         if ($value=='bootstrap-f-start') {
            echo '</div></div>';
            echo '<div class="row">';
            echo '<div class="col-12">';
          }
         if ($value=='bootstrap-finish')
            echo '</div></div></section>';

         if ($value=='br') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]>1 && gettype($parametr[$i+1])=='integer') 
                $kolWoBr=$parametr[$i+1]; 
            else 
                $kolWoBr=1;
            for($j=0; $j<$kolWoBr; $j++)
                echo '<br>';
          }
         if ($value=='text') {
              if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
                  if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
              if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
                  if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
              $class=$nameBlock.$name.$i;
              echo '<input type="text" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='textarea') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<textarea name="'.$name.'" class="'.$class.'">'.$textValue.'</textarea>';
          }
        if ($value=='text2') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="text" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='password') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'password'.$i; else $name=$nameBlock.'password'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="password" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='password2') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'password'.$i; else $name=$nameBlock.'password'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="password" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='reset') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $textValue=$parametr[$i+1]; else $textValue='Reset'; else $textValue='Reset';
            $class=$nameBlock.'reset'.$i;
            if (!$zero_style) echo '<input type="reset" class="'.$class.' btn" value="'.$textValue.'">';
            if ($zero_style) echo '<input type="reset" class="'.$class.' " value="'.$textValue.'">';
          }
        if ($value=='submit') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
            if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
            $class=$nameBlock.$name.$i;
            if (!$zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'">';
            if ($zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' " formaction="'.$textWww.'">';
          }
        if ($value=='submit2') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
            if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
            $class=$nameBlock.$i;
            if (!$zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'">';
            if ($zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'">';
          }
        if ($value=='submit3') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
            if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
            if (isset($parametr[$i+4]) && $parametr[$i+4]!='bootstrap-start' && $parametr[$i+4]!='bootstrap-f-start' && $parametr[$i+4]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3]) && !$this->searcTegFormBlock($parametr[$i+4])) $class=$parametr[$i+4]; else $class=''; else $textWww='';
            if (!$zero_style) echo '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'"></div>';
            if ($zero_style) echo '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'"></div>';
          }
        if ($value=='p' || $value=='h1' || $value=='h2' || $value=='h3' || $value=='h4' || $value=='h5' || $value=='h6') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $text=$parametr[$i+1]; else $text=''; else $text='';
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $class=$parametr[$i+2]; else $class=$nameBlock.$value.$i; else $class=$class=$nameBlock.$value.$i;
            echo '<div class="'.$class.'PH"><'.$value.' class="'.$class.'">'.$text.'</'.$value.'></div>';
          }
        if ($value=='span') {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $text=$parametr[$i+1]; else $text=''; else $text='';
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $class=$parametr[$i+2]; else $class=$nameBlock.$value.$i; else $class=$class=$nameBlock.$value.$i;
            echo '<div class="'.$class.'PH"><'.$value.' class="'.$class.'">'.$text.'</'.$value.'></div>';
          }
          $i++; 
       }
       echo '</div>'; // конец внутреннего блока
       if (!$form_not_close)
          echo '</form>';
       echo '</div>';
       if (!$zero_style) 
          echo '</div></section>';
   }
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
        if ($parametr=='submit') return true;
        if ($parametr=='submit2') return true;
        if ($parametr=='submit3') return true;
        if ($parametr=='span') return true;
        return false;
    }
   // Преобразуем номер статуса в его значение
   public function statusNumerSlovo($status)
   {
    switch ($status) {
      case 0:
        return 'Гость';
      case 1:
        return 'Пользователь';
      case 2:
        return 'Редактор';
      case 3:
        return 'Подписчик';
      case 4:
        return 'Администратор';
      case 5:
        return 'Супер Администратор';
      case 9:
        return 'Не подтвердивший регистрацию';
      default:
        return 'Статус не известен';
    }
   }
}
?>