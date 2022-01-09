<?php
namespace redaktor;
// класс с общими функциями 
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
      foreach($parametr as $value)
       {
          $reztrue=false;
          $rezhant=false;
          $valueButton='';
          $returnNameDinamik=false;
          $returnName=false;
          $returnValue=false;
          $nameStatic='';

        if (stripos('sss'.$value,'false=')) // определяет значение, которое функция вернет в случае неудачного поиска
          $falseRez=preg_replace('/false=/','',$value);

        if (stripos('sss'.$value,'rez=hant')) // если необходимо поймать нажатую динамическую кнопку
          foreach($parametr as $value)
            {
             if (stripos('sss'.$value,'nameStatic='))  // ищем имя кнопки
               $nameStatic=preg_replace('/nameStatic=/','',$value);                        // выделяем имя кнопки
             if (stripos('sss'.$value,'returnNameDynamic'))  // ищем имя кнопки
                $returnNameDinamik=true;  // вернуть динамическую часть имени кнопки если труе
             if (stripos('sss'.$value,'returnName'))  // ищем имя кнопки
                $returnName=true;  // вернуть полное имя кнопки если труе
             if (stripos('sss'.$value,'returnValue'))  // ищем имя кнопки
                $returnValue=true;  // вернуть надпись на кнопке если труе
            }
          if ($nameStatic!='')
           if (isset($_POST))
            foreach($_POST as $key=>$value)
              if (stripos('sss'.$key,$nameStatic)) //найти нажатую кнопку по статичной части её имени
               {
                  if ($returnValue) return $value;
                  if ($returnNameDinamik) return preg_replace('/'.$nameStatic.'/','',$key);
                  if ($returnName) return $key;
               }
           //else return false; // Если массив Пост удалили, то выйти из функции
          if (stripos('sss'.$value,'rez=true')) // если необходимо проверить была ли нажата кнопка
          foreach($parametr as $value)
            {
              $reztrue=true;
             if (stripos('sss'.$value,'name='))  // ищем имя кнопки
               $nameButton=preg_replace('/name=/','',$value);                        // выделяем имя кнопки
             if (stripos('sss'.$value,'value='))  // ищем имя кнопки
               $valueButton=preg_replace('/value=/','',$value);                        // выделяем надпись на кнопке
            }
          if (stripos('sss'.$value,'rez=info')) // если необходимо вернуть название нажатой кнопки
            foreach($parametr as $value)
                if (stripos('sss'.$value,'name='))  // ищем имя кнопки
                 {
                   $nameButton=preg_replace('/name=/','',$value);                        // выделяем имя кнопки
                   if (isset($_POST[$nameButton])) return $_POST[$nameButton];
                   else false;
                 }
         if ($reztrue)
          if (isset($_POST[$nameButton]) && ($valueButton=='' || $valueButton==$_POST[$nameButton])) return true; else return false;       // если она нажата, то вернуть труе
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

foreach($parametr as $value)
 {
    if (stripos('sss'.$value,'container'))
      $container=true;
    if (stripos('sss'.$value,'class=-row-'))
      $classB=preg_replace('/-/','"',$value);
    if (stripos('sss'.$value,'class') && stripos('sss'.$value,'class=-row-')==false)
      $classDiv=preg_replace('/-/','"',$value);
    if (stripos('sss'.$value,'action'))
      $action=preg_replace('/-/','"',$value);
    if (stripos('sss'.$value,'method'))
      $method=preg_replace('/-/','"',$value);
    if (stripos('sss'.$value,'classButton='))
      {
       $classKnopok=preg_replace('/-/','"',$value);
       $classKnopok=preg_replace('/Button/','',$classKnopok);
      }
    if (stripos('sss'.$value,'кнопок-'))
      $knopok=preg_replace('/кнопок-/','',$value);
  }
    for ($i=1;$i<=$knopok;$i++) //объявить пустой массив
     {
        $masNameKnopok[$i]='имя не задано';
        $masValueKnopok[$i]='название не задано';
        $masClassKnopok[$i]='';
     }
    for ($i=1;$i<=$knopok;$i++)
     {
      foreach($parametr as $value)
       {
        $poisk='n'.$i.'-';
        if (stripos('sss'.$value,$poisk))
         {
          $poisk='/'.$poisk.'/';
          $masNameKnopok[$i]=preg_replace($poisk,'',$value);
         }
        $poisk='v'.$i.'-';
        if (stripos('sss'.$value,$poisk))
         {
          $poisk='/'.$poisk.'/';
          $masValueKnopok[$i]=preg_replace($poisk,'',$value);
         }
        $poisk='c'.$i.'=';
        if (stripos('sss'.$value,$poisk))
         { 
          $poisk='/'.$poisk.'/';
          $masClassKnopok[$i]=preg_replace($poisk,'class=',$value);
          $masClassKnopok[$i]=preg_replace('/-/','"',$masClassKnopok[$i]);
         } 
       }
     }

    //рисуем кнопку
    if ($container) echo '<section class="container">';
    if ($container && $classB!="") echo '<div '.$classB.'>';
    if ($classDiv!="") echo '<div '.$classDiv.'>';
    echo '<form '.$action.' '.$method.'>';
    $class=$classKnopok;

    for ($i=1; $i<=$knopok;$i++)
     {
      echo '<input ';
      if ($masClassKnopok[$i]!='') echo $masClassKnopok[$i];
      if ($masClassKnopok[$i]=='' && $class!='') echo $class;
      echo ' type="submit" name="'.$masNameKnopok[$i].'" value="'.$masValueKnopok[$i].'">';
     }

    echo '</form>';
    if ($classDiv!="") echo '</div>';
    if ($container && $classB!="") echo '</div>';
    if ($container) echo '</section>';
     //обработка параметра help
     foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь' || $value=='помощь')
       {
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
   public function okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton){
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
   public function okSelect($mesaz,$nameKn,$classDiv,$classP,$classButton){
    echo '<section class="container">';
    echo '<div class="row '.$classDiv.'">';
    echo '<form action="redaktor.php" method="POST">';
    echo '<input type="checkbox" checked name="'.$nameKn.'Select'.'" id="'.$nameKn.'Id" value="'.$nameKn.'Value">';
    echo '<label for="'.$nameKn.'Id">'.$mesaz.'</label>';
    echo '<input class="'.$classButton.'" type="submit" name="'.$nameKn.'" value="OK">';
    echo '</form>';
    echo '</div>';
    echo '</section>';
    if (isset($_POST[$nameKn.'Select'])) return $_POST[$nameKn.'Select']; else return false;
   }
   // Набор текстовое поле + кнопки Ok Cansel
   public function poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput){
    echo '<section class="container">';
    echo '<div class="row '.$classDiv.'">';
    //echo '<p class="'.$classP.'">'.$mesaz.'</p>';
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
   public function poleInputokCanselPlusNameStr($nameStr,$mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput){
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
      foreach ($parametr as $value)  // поиск признаков $form_not_open и $form_not_close=false;
       {
        if ($value=='form_not_open') $form_not_open=true;
        if ($value=='form_not_close') $form_not_close=true;
        if ($value=='zero_style') $zero_style=true;
       }
    
    if (!$zero_style)
     {
      echo '<section class="container-fluid">';
      echo '<div class="row">';
     }
      echo '<div class="'.$nameBlock.'">';
      if (!$form_not_open)
        echo '<form action="'.$actionN.'" method="POST">';
      echo '<div class="'.$nameBlock.'-div">';
      $i=0;
      foreach ($parametr as $key => $value)
       {
         if ($value=='bootstrap-start')
          {
            echo '<section class="container-fluid">';
            echo '<div class="row">';
            echo '<div class="col-12">';
          }
        if ($value=='bootstrap-f-start')
          {
            echo '</div></div>';
            echo '<div class="row">';
            echo '<div class="col-12">';
          }
        if ($value=='bootstrap-finish')
            echo '</div></div></section>';

        if ($value=='br') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]>1 && gettype($parametr[$i+1])=='integer') $kolWoBr=$parametr[$i+1]; else $kolWoBr=1;
            for($j=0; $j<$kolWoBr; $j++)
             echo '<br>';
          }
        if ($value=='text') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="text" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='textarea') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<textarea name="'.$name.'" class="'.$class.'">'.$textValue.'</textarea>';
          }
        if ($value=='text2') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'text'.$i; else $name=$nameBlock.'text'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="text" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='password') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'password'.$i; else $name=$nameBlock.'password'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="password" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='password2') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'password'.$i; else $name=$nameBlock.'password'.$i;
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            $class=$nameBlock.$name.$i;
            echo '<input type="password" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
          }
        if ($value=='reset') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $textValue=$parametr[$i+1]; else $textValue='Reset'; else $textValue='Reset';
            $class=$nameBlock.'reset'.$i;
            if (!$zero_style) echo '<input type="reset" class="'.$class.' btn" value="'.$textValue.'">';
            if ($zero_style) echo '<input type="reset" class="'.$class.' " value="'.$textValue.'">';
          }
        if ($value=='submit') 
          {
            //echo '<br>нашли submit';
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
        if ($value=='submit2') 
          {
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
        if ($value=='submit3') 
          {
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
        if ($value=='p' || $value=='h1' || $value=='h2' || $value=='h3' || $value=='h4' || $value=='h5' || $value=='h6') 
          {
            if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1])) $text=$parametr[$i+1]; else $text=''; else $text='';
            if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
              if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $class=$parametr[$i+2]; else $class=$nameBlock.$value.$i; else $class=$class=$nameBlock.$value.$i;
            echo '<div class="'.$class.'PH"><'.$value.' class="'.$class.'">'.$text.'</'.$value.'></div>';
          }
        if ($value=='span') 
          {
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
       if (!$zero_style) echo '</div></section>';
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
    switch ($status) 
    {
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ////////////////Считываем параметры инициализации базы данных////////////////////////////
class initBD extends instrument
{
    ////////////////////////////////////////////////Настройка движка
    //public $pokazFormDobableniaMataOtPolzovatela; // информация показывать ли на сайте форму сбора матов. 1-показать, 0-не показывать.
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        parent::__construct();
        $fd = fopen(parent::searcNamePath('initBD.ini'), 'r') or die("не удалось открыть файл");
        $this->host=stristr(fgets($fd),';',true); 
        $this->loginBD=stristr(fgets($fd),';',true); 
        $this->parol=stristr(fgets($fd),';',true); 
        $this->nameBD=stristr(fgets($fd),';',true); 
        $this->site=stristr(fgets($fd),';',true); 
        fclose($fd);
        $this->con = mysqli_connect($this->initBdHost(),$this->initBdLogin(),$this->initBdParol(),$this->initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд        mysqli_set_charset ( $con , "utf8" ) ;
 
            ///////////////////////// Проверка таблиц движка
            // ------------------------Расшифровка позиций в таблице настроек----------------------
            // id=1 - Сюда записан признак включить или выключить форму сбора нецензурных слов от пользователей
            //проверка существует ли таблица настроек
            if (!$this->searcNameTablic('tablica_nastroer_dvigka_int'))
              $this->zaprosSQL("CREATE TABLE tablica_nastroer_dvigka_int(id INT, nastr INT)");
            ////////////////////////////////Восстановление таблицы tablica_nastroer_dvigka_int
            $zapros="SELECT nastr FROM tablica_nastroer_dvigka_int WHERE id=1"; //настройка показа формы сбора данных
            $rez=$this->zaprosSQL($zapros);
            if ($rez) $stroka=mysqli_fetch_array($rez);
            if (is_null($stroka[0])) 
               $this->zaprosSQL("INSERT INTO tablica_nastroer_dvigka_int(id, nastr) VALUES (1,0)");
            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////// таблица блокировки пользователей для добавления мата blocked_list_dobavit_mat////////////////
            //проверка существует ли таблица блокировки пользователей для добавления мата blocked_list_dobavit_mat
            if (!$this->searcNameTablic('blocked_list_dobavit_mat'))
              $this->zaprosSQL("CREATE TABLE blocked_list_dobavit_mat(id INT, login VARCHAR(50))");
      }
    public function __destruct(){mysqli_close($this->con);}
    public function initBdHost(){return $this->host;}
    public function initBdLogin(){return $this->loginBD;}
    public function initBdParol(){return $this->parol;}
    public function initBdNameBD(){return $this->nameBD;}
    public function initsite(){return $this->site;} // домашняя страница


      public function sborMatov()  {
        $zapros="SELECT nastr FROM tablica_nastroer_dvigka_int WHERE id=1"; //настройка показа формы сбора данных
        $rez=$this->zaprosSQL($zapros);
        if ($rez) $stroka=mysqli_fetch_array($rez);
        return $stroka[0];
      }
    // Инструментарий от родительского  
         // Функция выводит некое сообщение $mesaz, задает название кнопок, которым будет присвоено OK или Cansel
         // $mesaz - сообщение, $nameKn - имя кнопки, отправляемой в массив $_POST, $classDiv - дополнительный класс для общего контейнера
         // $classP - класс тегов Р - сообщения, $classButton - класс для кнопок
         // statusNumerSlovo($status) Преобразуем номер статуса в его значение
    // okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton)  // отправляет на страницу редактора
    // poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput) выводит дополнительную строку для ввода текста -- параметры. Имя кнопки задается. Имя кнопки может быть Ok или Cancel. Имя текстового поля - это имя кнопки + "Text"
    // poleInputokCanselPlusNameStr($nameStr,$mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput) как и верх, только плюс имя страницы обработчика
    // okSelect($mesaz,$nameKn,$classDiv,$classP,$classButton) выводит переключатель select и кнопку ок. 

    // Инструментарий
    // База данных
    // searcNameTablic($nameTablicy)                     // Поиск таблицы в базе данных
    // siearcSlova($nameTablice,$stolb,$slovo)           // проверяем есть ли слово в некотором столбце (вывод труе или фальш)
    // killTab($nameTablicy)                             //Удаление таблицы из БД
    // killTabEtap1($nameTablicy)                        //Удаление таблицы из БД
    // clearTab($nameTablicy)                            //Очистка таблицы
    // maxIdLubojTablicy($nameTablice)                   // поиск максимального ID таблицы +1
    // searcIdPoUsloviu($nameTablicy,$usl1,$usl2,$usl3,$usl4,$usl5)               //Проверяет есть ли запись по условиям, возвращает ID, записи 
    // killZapisTablicy($nameTablice,$were) //           // Удалить строку в таблице $were-условие для удаления включая ключевое слово WHERE
    // zaprosSQL($zapros)                                // создать SQL запрос, условие согласно синтаксису SQL// false если ошибка
    // tablicaDlaMenu($nameTablice)                      // проверяет принадлежность таблицы к кнопкам, возвращает ID имени таблицы в "tablice_tablic"
    // kolVoZapisTablice($nameTablice)                   // считает число записей в таблице
    // kolVoStolbovTablice($nameTablice)                 // считает число столбцов в таблице
    // id_tab_gl_searc($nameTablicy)                     // Проверяем относится ли таблица к главным таблицам
    // zapretUdaleniaTablicy($nameTablicy)               // запрет на удаление таблиц
       
    // public function searcNamePath($nameFile)          //Функция возвращает имя и относительный путь к файлу при условии, что искомый файл находится выше текущего места.
    
    //Функция проверяет статус в заданной таблице, выводит checked="checked" если статус есть или ''

    // Работа с матами
    // proverkaMata($slovo)                              // функция проверяет наличие оскорбительного слова мата проверка мата

    // Работа с массивами
    // proverkaMassiwa($mas,$slowo)                // Ищет слово $slowo в массиве $mas. Если нашли, то возврат true

    // printTab('fff',1);                                // отладочная функция создает таблицу debuger и что-то туда пишет
    // printTabEcho();       //не работает                            // выводит содержимое таблицы debuger
 
    
    public function proverkaMassiwa($mas,$slowo)
    {
      foreach($mas as $value)
        if ($value==$slowo) return true;
      return false;
    }

    public function proverkaMata($slovo) // проверяет входной параметр на соответствие мату из базы данных
    {
      $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
      while(!is_null($stroka=mysqli_fetch_array($rez)))
       {
         if ($slovo==$stroka[0]) return true;
       }
      return false;
    }
    public function searcIdPoUsloviu($nameTablicy,$usl1,$usl2,$usl3,$usl4,$usl5)               //Проверяет есть ли запись по условиям, возвращает ID, записи 
    {
      
      $zapros="SELECT MAX(id) FROM ".$nameTablicy;//."WHERE ";
      if ($usl1!="")
        $zapros=$zapros.' WHERE '.$usl1;
        if ($usl2!="")
        $zapros=$zapros.' AND '.$usl2;
        if ($usl3!="")
        $zapros=$zapros.' AND '.$usl3;
        if ($usl4!="")
        $zapros=$zapros.' AND '.$usl4;
        if ($usl5!="")
        $zapros=$zapros.' AND '.$usl5;
        $rez=$this->zaprosSQL($zapros);
        if (!$rez) return 0;
        $stroka=mysqli_fetch_array($rez);
        if (is_null($stroka)) return 0;
        if ($stroka[0]=='') return 0;
        if ($stroka) return $stroka[0];
        return 0;
    }
    //Функция проверяет статус в заданной таблице, выводит checked="checked" если статус есть или ''
    public function checkedStatus($pole,$str,$status,$nameTable)
    {
      $zapros="SELECT status FROM ".$nameTable."_status WHERE stolb=".$pole." AND str=".$str;
      $rez=$this->zaprosSQL($zapros);
      if ($rez==false) return ' ';
      $stroka=mysqli_fetch_array($rez);
      if ($stroka==false) return ' ';
      if (stripos($stroka['0'],$status)>0) return 'checked';
      $rez=$this->zaprosSQL($zapros);
      $stroka=mysqli_fetch_array($rez);
      return ' ';
    }
    public function siearcSlova($nameTablice,$stolb,$slovo)
    {
      $zapros="SELECT ".$stolb." FROM ".$nameTablice." WHERE ".$stolb."='".$slovo."'";
      $rez=$this->zaprosSQL($zapros);
      if (!$rez) return false;
      $stroka=mysqli_fetch_array($rez);
      if (is_null($stroka)) return false;
      $strr='--'.$stroka[0];
      $strVhod=stripos( $strr ,$slovo);
      if ($strVhod>1) return true;
      return false;
    }
    public function printTab($mesadz,$kill)
    {
      if ($kill) $this->zaprosSQL("DELETE FROM `debuger` WHERE 1");
      $zapros="CREATE TABLE debuger (mesage VARCHAR(255))";
      $this->zaprosSQL($zapros);
      $zapros="INSERT INTO debuger(mesage) VALUES ('".$mesadz."')";
      $this->zaprosSQL($zapros);
    }
    public function printTabEcho()
    {
      $zapros="SELECT * FROM debuger WRERE 1";
      $rez=$this->zaprosSQL($zapros);
      if (!$rez) {
          echo 'не получилось скачать данные из таблицы debuger'; return false;
       }
      $stroka=mysqli_fetch_assoc($rez);
      while (!is_null($stroka=mysqli_fetch_assoc($rez)))
      {
        foreach ($stroka as $key => $value)
          {
           echo $key.'=>'.$value;
          }
      }
    }
    public function zapretUdaleniaTablicy($nameTablicy) // запрет на удаление таблиц
    {
        if ($nameTablicy=='menu_parametr_tab') return 'Невозможно удалить';
        if ($nameTablicy=='nastrolkiredaktora') return 'Невозможно удалить';
        if ($nameTablicy=='redaktor_down') return 'Невозможно удалить';
        if ($nameTablicy=='redaktor_nastr7') return 'Невозможно удалить';
        if ($nameTablicy=='redaktor_up') return 'Невозможно удалить';
        if ($nameTablicy=='tablica_tablic') return 'Невозможно удалить';
        if ($nameTablicy=='login') return 'Невозможно удалить';
        if ($nameTablicy=='registracia') return 'Невозможно удалить';//
        if ($nameTablicy=='podtverdit') return 'Невозможно удалить';
        if ($nameTablicy=='status_klienta') return 'Невозможно удалить';
        if ($nameTablicy=='type_menu_po_imeni') return 'Невозможно удалить';
        if ($nameTablicy=='redakt_profil') return 'Невозможно удалить';
        if ($nameTablicy=='redakt_profil_tegi') return 'Невозможно удалить';
        if ($nameTablicy=='maty') return 'Невозможно удалить';
        if ($nameTablicy=='menu_maty') return 'Невозможно удалить';
        if ($nameTablicy=='mat_ot_polzovatelej') return 'Невозможно удалить';
        if ($nameTablicy=='nie_maty') return 'Невозможно удалить';
        if ($nameTablicy=='tablica_nastroer_dvigka_int') return 'Невозможно удалить'; //dla_statusob_123
        if ($nameTablicy=='dla_statusob_123') return 'Невозможно удалить';
        return 'Согласен удалить';
    }
    
    public function radioAndChekboxSearc($nameTablicy) // 
    {
        $zapros="select  from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
        $rez=$this->zaprosSQL($zapros);
        $vozvrat=false;
        $str=$this->kolVoZapisTablice($nameTablice);
        while (!is_null($stroka=(mysqli_fetch_assoc($rez))))
           if ($stroka['radio'] || $stroka['checkbox']) {$vozvrat=true;break;}
        return $vozvrat;
    }
    public function id_tab_gl_searc($nameTablicy)
     {
        $zapros="select * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
        $rez=$this->zaprosSQL($zapros);
        $stroka=(mysqli_fetch_assoc($rez));
        if ($stroka['COLUMN_NAME']=='id_tab_gl') {return true;}
        return false;
     }
    public function searcNameTablic($nameTablicy) // Поиск таблицы в базе данных
    {
        $result=false;
        $zapros="SHOW TABLES";
        $rez=$this->zaprosSQL($zapros);
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
            if ($stroka[0]==$nameTablicy)   $result=true;            //
        return $result;
     }
     public function killTab($nameTablicy)  //Удаление таблицы из БД
       {
          $zapros="DROP TABLE ".$_SESSION['nameTablice'];
          $rez=$this->zaprosSQL($zapros);
       }
     public function killTab2($nameTablicy)  //Удаление таблицы из БД через входящий параметр
       {
          $zapros="DROP TABLE ".$nameTablicy;
          $rez=$this->zaprosSQL($zapros);
       }
     public function killTabEtap1($nameTablicy)  //Удаление таблицы из БД если только она не служебная
     {      
                                            //Если таблица служебная, то подменяется имя кнопки "Согласен удалить" на "Невозможно удалить"
        if ($this->searcNameTablic($nameTablicy) ) 
        {
        echo '<h4>Внимание!! Попытка удалить таблицу '.$nameTablicy.'</h4>'; 
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<form method="POST" action="redaktor.php">';
        echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="'.$this->zapretUdaleniaTablicy($nameTablicy).'" name="killTabOk">';
        echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="Отмена" name="killTabCancel">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        } else parent::okCansel('Такой таблицы нет и не важно на что нажать:). Пока-пока...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
     }       
     public function clearTab($nameTablicy)  //Очистка таблицы
     {
      $zapros="TRUNCATE TABLE ".$nameTablicy;
      $rez=$this->zaprosSQL($zapros);
     }
     public function maxIdLubojTablicy($nameTablice)  // поиск максимального ID таблицы +1
     {
        $zapros="SELECT MAX(id) FROM ".$nameTablice;
        $rez=$this->zaprosSQL($zapros);
        if (!$rez) return -1;
        $stroka=mysqli_fetch_array($rez);
        if (is_null($stroka[0])) $stroka[0]=-1;
        //if ($stroka[0]==NULL) $stroka[0]=-1;
        $rezId=$stroka[0]+1;
        return $rezId;
     }
     // Удалить строку в таблице
     // $nameTablice - имя таблицы $were-условие для удаления включая ключевое слово WHERE
     public function killZapisTablicy($nameTablice,$were) //// Удалить строку в таблице
     {
        $zapros="DELETE FROM ".$nameTablice." ".$were;
        $rez=$this->zaprosSQL($zapros);
     }
  public function zaprosSQL($zapros) // создать SQL запрос, условие согласно синтаксису SQL
     {
        $statistikTrueFalseRez=mysqli_query($this->con,'SELECT statik_true FROM statistik_dfdx WHERE 1');
        $statistikTrueFalse=mysqli_fetch_assoc($statistikTrueFalseRez);

        if ($statistikTrueFalse['statik_true']==1)
         {
          $statistikTrueFalseRez=mysqli_query($this->con,'SELECT n_zapros FROM statistik_dfdx WHERE 1');
          $statistik_n_zapros=mysqli_fetch_assoc($statistikTrueFalseRez);
          $statistik_n_zapros['n_zapros']++;
          mysqli_query($this->con,'UPDATE statistik_dfdx SET n_zapros='.$statistik_n_zapros['n_zapros'].' WHERE 1');
          mysqli_query($this->con,'UPDATE statistik_dfdx SET d_zapros="'.date("y.m.d").'" WHERE 1');
         }
        $rez=mysqli_query($this->con,$zapros);
        return $rez;
     }

     public function tablicaDlaMenu($nameTablice) // проверяет принадлежность таблицы к кнопкам, возвращает ID имени таблицы в "tablice_tablic"
     {
        $boolRez=false;
        $zapros="SELECT ID FROM tablica_tablic WHERE NAME='".$nameTablice."'";
        $rez=$this->zaprosSQL($zapros);
        if (!$rez) echo 'Проблема с таблицей "tablica_tablic"';
        $stroka=mysqli_fetch_array($rez);
        if (isset($stroka[0]) && !is_null($stroka[0]) && $stroka[0]>-1)  $boolRez=true;
        return $boolRez;
     }
     public function kolVoZapisTablice($nameTablice) // считает число записей в таблицк
     {
       if ($this->searcNameTablic($nameTablice))
       {
        $zapros="SELECT COUNT(1) FROM ".$nameTablice;
        $rez=$this->zaprosSQL($zapros);
        $viv=mysqli_fetch_array($rez);
        return $viv[0];
       } else return 0;
     }
     public function kolVoStolbovTablice($nameTablice) //число столбцов в таблице
     {
     $zapros="SELECT MAX(ORDINAL_POSITION) FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME='".$nameTablice."'";
     $query=$this->zaprosSQL($zapros);   
     $viv=mysqli_fetch_array($query);
     return $viv[0];
     }

     public function createTab(...$parametr) //функция проверяет есть ли таблица и если нет, то создает её
     {
      $nametablice='';
      $masN=array();
      $masT=array();
      $masS=array();
      $prosmotr=false;
      $zapros1='Таблица уже существует!';
      $zapros2='Стартовое значение уже задано!';

      foreach($parametr as $value)
      if (stripos('sss'.$value,'name='))
      {
         $nametablice=preg_replace('/name=/','',$value);
         $nametablice=mb_strtolower($nametablice);
         //echo '--'.$nametablice;
      }

      foreach($parametr as $value)
      if (stripos('sss'.$value,'просмотр'))
        $prosmotr=true;

        $i=0;
      foreach($parametr as $value)
        if (stripos('sss'.$value,'poleN='))
         $masN[$i++]=preg_replace('/poleN=/','',$value);

      $ii=0;
      foreach($parametr as $value)
        if (stripos('sss'.$value,'poleT='))
         $masT[$ii++]=preg_replace('/poleT=/','',$value);

      $iii=0;
      foreach($parametr as $value)
        if (stripos('sss'.$value,'poleS='))
         $masS[$iii++]=preg_replace('/poleS=/','',$value);
      
      //обработка параметра help
      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь')
        {
          echo '<p>Функция проверяет существует ли таблица, если нет, то создает её и присваивает начальные значения</p>';
          echo '<p>Обязательный параметр "name=имя таблица"</p>';
          echo '<p>Имя поля задается параметром "poleN=имя поля"</p>';
          echo '<p>Тип поля задается параметром "poleT=тип поля"</p>';
          echo '<p>Первичное значение поля задается параметром "poleS=значение"</p>';
          echo '<p>Число полей poleN,poleT,poleS должно быть одинаково.</p>';
          echo '<p>Если необходимо только посмотреть запроссы, то добавляем параметр "просмотр"</p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
        } 

      if ($nametablice=='' || $i!=$ii || $ii!=$iii) {echo 'Не корректное имя таблицы';return false;} //если забыли задать имя таблицы, то выходим из функции

      if (!$this->searcNameTablic($nametablice))
       {
         $zapros="CREATE TABLE ".$nametablice.' (';
         $z='';
         for($j=0; $j<$i; $j++)
           {
             if ($j+1<$i)
            $z=$z.$masN[$j].' '.$masT[$j].', ';
            else $z=$z.$masN[$j].' '.$masT[$j];
           }
          $zapros=$zapros.$z.')';
          $zapros1=$zapros;
          if (!$prosmotr)
           $this->zaprosSQL($zapros);
        } 
    
    if (!$this->kolVoZapisTablice($nametablice)>0)
      {
        $zapros="INSERT INTO ".$nametablice.' (';
        $z='';
        $z1='';

        for($j=0; $j<$i; $j++)
        {
          if ($j+1<$i)
          $z=$z.$masN[$j].', ';
          else $z=$z.$masN[$j];
          $znak='';

          if (stripos('sss'.$masT[$j],'VARCHAR') || stripos('sss'.$masT[$j],'varchar')
           || ($masT[$j]=='TEXT' || $masT[$j]=='text')
           || ($masT[$j]=='DATE' || $masT[$j]=='date')
           || ($masT[$j]=='DATETIME' || $masT[$j]=='datetime')
           || ($masT[$j]=='TIMESTAMP' || $masT[$j]=='timestamp')
           || ($masT[$j]=='TIME' || $masT[$j]=='time')
           || ($masT[$j]=='CHAR' || $masT[$j]=='char')
           || ($masT[$j]=='TINYTEXT' || $masT[$j]=='tinytext')
           || ($masT[$j]=='MEDIUMTEXT' || $masT[$j]=='mediumtext')
           || ($masT[$j]=='LONGTEXT' || $masT[$j]=='longtext')
           || ($masT[$j]=='BINARY' || $masT[$j]=='binary')
           || ($masT[$j]=='VARBINARY' || $masT[$j]=='varbinary')
           || ($masT[$j]=='TINYBLOB' || $masT[$j]=='tinyblob')
           || ($masT[$j]=='MEDIUMBLOB' || $masT[$j]=='mediumblob')
           || ($masT[$j]=='LONGBLOB' || $masT[$j]=='longblob')
           || ($masT[$j]=='BLOB' || $masT[$j]=='blob')
           || ($masT[$j]=='ENUM' || $masT[$j]=='enum')
           || ($masT[$j]=='SET' || $masT[$j]=='set')
           ) $znak="'";
            
          if ($j+1<$i)
          $z1=$z1.$znak.$masS[$j].$znak.',';
          else $z1=$z1.$znak.$masS[$j].$znak;
         }
         $zapros=$zapros.$z.') VALUES ('.$z1.')';
         $zapros2=$zapros;
         if (!$prosmotr)
          $this->zaprosSQL($zapros);
      } 
      if ($prosmotr)  //режим просмотра запроссов
        echo '<p>Запрос для создания таблицы: '.$zapros1.'</p><p>Запрос для первой строки: '.$zapros2.'</p>';
     }
}
////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class htmlTeg extends initBD
{

///////////////////////////////////////////////Конструктор///////////////////////////////////////////////
    public function __construct($nameTeg)
        {
            parent::__construct();
            if ($nameTeg=="") {$nameTeg="html"; echo("Задан пустой тег, знаете ли Вы, что можно делать с комментариями в html?<br>");}
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд
            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT * FROM html_teg WHERE teg=".chr(39).$nameTeg.chr(39);
            $rez=parent::zaprosSQL($zapros) OR die ('Не удалось отправить запрос стр.17');
            $stroka=mysqli_fetch_assoc($rez) OR die ('Не удалось получить массив данных, скорее всего нет такой темы, ищите по ключевым словам или тексту.');
            if ($stroka!=false){
            $this->id=$stroka['id'];
            $this->teg=$stroka['teg'];
            $this->info=$stroka['info'];
            $this->infoVideo=$stroka['infoVideo'];
            $this->leson_id=$stroka['leson_id'];
            $this->atrib_id=$stroka['atrib_id'];
            $this->sintax_id=$stroka['sintax_id'];
            $this->kluc1=$stroka['kluc1'];
            $this->kluc2=$stroka['kluc2'];
            $this->kluc3=$stroka['kluc3'];
            $this->kluc4=$stroka['kluc4'];
            $this->kluc5=$stroka['kluc5'];
            $this->kluc6=$stroka['kluc6'];
            $this->kluc7=$stroka['kluc7'];
            $this->kluc8=$stroka['kluc8'];
            $this->kluc9=$stroka['kluc9'];
            $this->kluc10=$stroka['kluc10'];
            $this->htmlTegError=0;
            }
            mysqli_close($con);
            $this->statikHtml();
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function id(){               //читает id из защищённой переменной
              return $this->id;
            }
        public function teg(){              //читает teg из защищённой переменной
                return $this->teg;
              }
        public function info(){             //читает info из защищённой переменной
                return $this->info;
              }
        public function infoVideo(){        //читает infoVideo из защищённой переменной
                return $this->infoVideo;
              }
        public function leson_id(){         //читает leson_id из защищённой переменной
                return $this->leson_id;
              }
        public function atrib_id(){         //читает atrib_id из защищённой переменной
                return $this->atrib_id;
              }
        public function sintax_id(){        //читает sintax_id из защищённой переменной
                return $this->sintax_id;
              }
        public function initTeg($nameTeg)   // Обновление значений свойст объекта
              {                             // Прочитать инфу о теге из бд
                  $ret=true;
                  if ($nameTeg=="") {$nameTeg="html";}
                  $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд                  mysqli_set_charset ( $con , "utf8" ) ;
                  $zapros="SELECT * FROM html_teg WHERE teg=".chr(39).$nameTeg.chr(39);
                  $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
                  $stroka=mysqli_fetch_assoc($rez);// OR die ('Не удалось получить массив');
                  if ($stroka!=false){
                  $this->id=$stroka['id'];
                  $this->teg=$stroka['teg'];
                  $this->info=$stroka['info'];
                  $this->infoVideo=$stroka['infoVideo'];
                  $this->leson_id=$stroka['leson_id'];
                  $this->atrib_id=$stroka['atrib_id'];
                  $this->sintax_id=$stroka['sintax_id'];
                  $this->kluc1=$stroka['kluc1'];
                  $this->kluc2=$stroka['kluc2'];
                  $this->kluc3=$stroka['kluc3'];
                  $this->kluc4=$stroka['kluc4'];
                  $this->kluc5=$stroka['kluc5'];
                  $this->kluc6=$stroka['kluc6'];
                  $this->kluc7=$stroka['kluc7'];
                  $this->kluc8=$stroka['kluc8'];
                  $this->kluc9=$stroka['kluc9'];
                  $this->kluc10=$stroka['kluc10'];
                } else $ret=false;
                  mysqli_close($con);
                  $this->statikHtml();
                  return $ret;
              }
        /////////////////////////////////////////////////////////////////////////////////////////////

        public function maxid($nameTablica)   // определяет максимальное id + 1 или минимальное свободное id
        {
            if ($nameTablica=='') $nameTablica="html_teg";
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT MAX(id) FROM html_teg";
            $rez=parent::zaprosSQL($zapros);
            if (!$rez) {mysqli_close($con);return -1;}
            $stroka=mysqli_fetch_array($rez);
            if (!isset($stroka)) {mysqli_close($con);return -1;}
            mysqli_close($con);
            $this->statikHtml();
            return $stroka[0]+1;
        }
        public function idTega($teg)   // определяет id номер тега
        {
            if ($teg=='') return -1;
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT id FROM html_teg WHERE teg=".chr(39).$teg.chr(39);
            $rez=parent::zaprosSQL($zapros);
            if (!$rez) {mysqli_close($con);return -1;}
            $stroka=mysqli_fetch_array($rez);
            if (!isset($stroka)) {mysqli_close($con);return -1;}
            mysqli_close($con);
            $this->statikHtml();
            return $stroka[0];
        }
        public function saveTeg($nameTablica)   // Запись данных из формы в базу данных, если неудача то вернем false
        {
            $start=true;
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;           // установить кодировку
            if ($this->idTega($_POST['Teg'])==-1)
             $zapros="INSERT INTO  ".$nameTablica."(`id`, `teg`, `info`, `infoVideo`, `leson_id`, `atrib_id`, `sintax_id`, `kluc1`, `kluc2`, `kluc3`, `kluc4`, `kluc5`, `kluc6`, `kluc7`, `kluc8`, `kluc9`, `kluc10`) VALUES (".$this->maxid($nameTablica).",'".$_POST['Teg']."','".$_POST['opisanie']."','".$_POST['opisanieVideo']."',".$_POST['idPrimer'].",".$_POST['idAtribut'].",".$_POST['idSintax'].",'".$_POST['kluc1']."','".$_POST['kluc2']."','".$_POST['kluc3']."','".$_POST['kluc4']."','".$_POST['kluc5']."','".$_POST['kluc6']."','".$_POST['kluc7']."','".$_POST['kluc8']."','".$_POST['kluc9']."','".$_POST['kluc10']."')";
            if ($this->idTega($_POST['Teg'])>-1)
             $zapros="UPDATE ".$nameTablica." SET `id`=".$_POST['idTeg'].",`teg`='".$_POST['Teg']."',`info`='".$_POST['opisanie']."',`infoVideo`='".$_POST['opisanieVideo']."',`leson_id`=".$_POST['idPrimer'].",`atrib_id`=".$_POST['idAtribut'].",`sintax_id`=".$_POST['idSintax'].",`kluc1`='".$_POST['kluc1']."',`kluc2`='".$_POST['kluc2']."',`kluc3`='".$_POST['kluc3']."',`kluc4`='".$_POST['kluc4']."',`kluc5`='".$_POST['kluc5']."',`kluc6`='".$_POST['kluc6']."',`kluc7`='".$_POST['kluc7']."',`kluc8`='".$_POST['kluc8']."',`kluc9`='".$_POST['kluc9']."',`kluc10`='".$_POST['kluc10']."' WHERE teg='".$_POST['Teg']."'";
             $rez=parent::zaprosSQL($zapros);
            if (!$rez) $start=false;
            mysqli_close($con);
            $this->initTeg($_POST['Teg']);     // Освежить свойства объекта
            $this->statikHtml();
            return $start;
        }

        public function statikHtml()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;           // установить кодировку
            $zapros="SELECT html FROM statistik WHERE 1";
            $rez=parent::zaprosSQL($zapros);
            $stroka=mysqli_fetch_array($rez);
            $chet=1;
            $chet=$stroka[0]+1;
            $zapros="UPDATE statistik SET html=".$chet." WHERE 1";
            $rez=parent::zaprosSQL($zapros);
            mysqli_close($con);
            return $chet;
        }
        //////////////////////////////////////////////////////////////////////////////////////////
}

//////////////////////////////////////////////////////////// Конец класса htmlTeg ///////////////////////
//////////////////////////////////////////////////////////// Конец класса htmlTeg ///////////////////////
//////////////////////////////////////////////////////////// Конец класса htmlTeg ///////////////////////
//////////////////////////////////////////////////////////// Конец класса htmlTeg ///////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class dataAktual  extends initBD
{

    public function __construct()
        {
            parent::__construct();
            $this->con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT "."*"." FROM statistik WHERE 1";
            $rez=parent::zaprosSQL($zapros) OR die ('Не удалось отправить запрос стр.17');
            $stroka=mysqli_fetch_assoc($rez) OR die ('Не удалось получить массив');
            $this->secondsSite=$stroka['SiteUpSec'];
            $this->minutesSite=$stroka['SiteUpMin'];
            $this->hoursSite=$stroka['SiteUpHours'];
            $this->mdaySite=$stroka['SiteUpDay'];
            $this->wdaySite=$stroka['SiteUpWday'];
            $this->monSite=$stroka['SiteUpMon'];
            $this->yearSite=$stroka['SiteUpYears'];
            $this->ydaySite=$stroka['SiteUpYday'];
            $this->weekdaySite=$stroka['SiteUpWeekday'];
            $this->monthSite=$stroka['SiteUpMonth'];
            $this->secondsBd=$stroka['BdUpSec'];
            $this->minutesBd=$stroka['BdUpMin'];
            $this->hoursBd=$stroka['BdUpHours'];
            $this->mdayBd=$stroka['BdUpDay'];
            $this->wdayBd=$stroka['BdUpWday'];
            $this->monBd=$stroka['BdUpMon'];
            $this->yearBd=$stroka['BdUpYears'];
            $this->ydayBd=$stroka['BdUpYday'];
            $this->weekdayBd=$stroka['BdUpWeekday'];
            $this->monthBd=$stroka['BdUpMonth'];
        }
        public function __destruct()
        {
            mysqli_close($this->con);
        }
        public function saveDataSite()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $masData=getdate( );
            $zapros="UPDATE statistik SET `SiteUpSec`=".$masData['seconds'].",`SiteUpMin`=".$masData['minutes'].",`SiteUpHours`=".$masData['hours'].",`SiteUpDay`=".$masData['mday'].",`SiteUpWday`=".$masData['wday'].",`SiteUpMon`=".$masData['mon'].",`SiteUpYears`=".$masData['year'].",`SiteUpYday`=".$masData['yday'].",`SiteUpWeekday`=".chr(34).$masData['weekday'].chr(34).",`SiteUpMonth`=".chr(34).$masData['month'].chr(34)." WHERE 1";
            $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
        }
        public function saveDataBd()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $masData=getdate( );
            $zapros="UPDATE statistik SET `BdUpSec`=".$masData['seconds'].",`BdUpMin`=".$masData['minutes'].",`BdUpHours`=".$masData['hours'].",`BdUpDay`=".$masData['mday'].",`BdUpWday`=".$masData['wday'].",`BdUpMon`=".$masData['mon'].",`BdUpYears`=".$masData['year'].",`BdUpYday`=".$masData['yday'].",`BdUpWeekday`=".chr(34).$masData['weekday'].chr(34).",`BdUpMonth`=".chr(34).$masData['month'].chr(34)." WHERE 1";
            $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
        }
} // Конец класса dataAktual

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class redaktor  extends menu
{
 
    public function __construct()
     {
        $this->colVn=0; // для хранения информации о размере поля редактирования главной таблицы
        $this->strVn=0; // для хранения информации о размере поля редактирования главной таблицы
        parent::__construct();
        $this->con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд        mysqli_set_charset ( $con , "utf8" ) ;
      }
     
     public function startMenuRedaktora(){
        //Читаем последнее число выводимых таблиц и последнее имя выводимой таблицы
        $zapros="SELECT * FROM nastrolkiredaktora WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        $stroka=mysqli_fetch_assoc($rez);
        $poslednijZapros=$stroka['imiePosTabl'];
        $_SESSION['nameTablice']=$poslednijZapros;
        if (!parent::searcNameTablic($poslednijZapros)) $poslednijZapros="";
        //Читаем последнее число выводимых таблиц и последнее имя выводимой таблицы
        echo '<h6 class="mesage">*поле слева предназначено для имени таблицы</h6>';
        echo '<h6 class="error">**Внимание!! Не использовать заглавные буквы в названии таблицы</h6>';
         parent::__unserialize(array('menu7','redaktor_nastr7','redaktor.php',$poslednijZapros,'не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно'));
     }
    public function __destruct(){
        mysqli_close($this->con);
    }
     public function kakovClass($nameMenu) //Узнает у менюшки общий класс у всех кнопок или у каждой кнопки свой класс
      {
        $zapros="SELECT CLASS FROM tablica_tablic WHERE NAME='".$nameMenu."'";
        $rez=parent::zaprosSQL($zapros);
        $stroka=mysqli_fetch_array($rez);
        if (!isset($stroka)) return false;
        if ($stroka[0]==0) return false;
        if ($stroka[0]==1) return true;
      }
    public function createTablicySawe($nameTable) // записываем таблицу 
      {
        $i=0;
        $j=0;
       if (!parent::searcNameTablic($nameTable))
        {
        $zapros="CREATE TABLE ".$nameTable."(id_tab_gl INT, ";
         for ($j=1; $j<=$_SESSION['col']; $j++)
         {
          $zapros=$zapros."poz".$j." VARCHAR(255)";
          if ($j!=$_SESSION['col']) $zapros=$zapros.", ";
         }
        $zapros=$zapros.")";
        $rez=parent::zaprosSQL($zapros);
        }
        for ($j=1; $j<=$_SESSION['str']; $j++)
        {
         $zapros1="INSERT INTO `".$nameTable."` (`id_tab_gl`,";
         $zapros2=" VALUES (".$j.",";
         for ($i=1; $i<=$_SESSION['col']; $i++)
          {
            $zapros1=$zapros1."`poz".$i."`";
            if ($i!=$_SESSION['col'])  $zapros1=$zapros1.",";
            $zapros2=$zapros2."'".$_POST['radio_'.$nameTable.'_'.$j.'_'.$i]."'";
            if ($i!=$_SESSION['col'])  $zapros2=$zapros2.",";
         }
            $zapros1=$zapros1.")"; 
            $zapros2=$zapros2.")"; 
            $zapros=$zapros1.$zapros2;
            echo $zapros."<br>";
            $rez=parent::zaprosSQL($zapros);
        } 
      }
      public function createPoleTablicy($nameTable,$col,$str) // рисуем поле для редактирования таблицы
      {
        $_SESSION['str']=$str;
        $_SESSION['col']=$col;
        $i=0;
        $j=0;
        echo '<div class="container-fluid">'."\n";
        echo '<div class="row">'."\n";
        echo '<form class="poleTablicyRedaktora" active="redaktor.php" method="POST">'."\n";
        for ($j=1; $j<=$str; $j++)
        {
        echo '<div class="poleTablicy1">'."\n";
         for ($i=1; $i<=$col; $i++)
          {
            echo '<div class="poleTablicy">'."\n";
             echo '<p class="mesage">Ряд:'.$j.' Позиция:'.$i.'</p>';
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="NULL" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'0" checked/><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'0">NULL</label>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="text" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'1" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'1">Text</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="password" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'2" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'2">password</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="button" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'3" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'3">button</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="input submit" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'4" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'4">input submit</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="input reset" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'5" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'5">input reset</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="img" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'6" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'6">img</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="textarea" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'7" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'7">textarea</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="radio" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'8" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'8">radio</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="checkbox" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'9" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'9">checkbox</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="заголовок" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'10" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'10">заголовок</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="select" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'11" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'11">select</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="input" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'12" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'12">input</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="audio" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'13" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'13">audio</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="embed" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'14" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'14">embed</label><br>'."\n";
             //echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="video source" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'15" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'15">video source</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="video" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'16" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'16">video</label><br>'."\n";
             echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="произвольный" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'17" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'17">произвольный</label><br>'."\n";
            // echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="audio source" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'18" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'18">audio source</label><br>'."\n";
             //echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="object" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'19" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'19">object</label><br>'."\n";
             //echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="canvas" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'20" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'20">canvas</label><br>'."\n";
             //echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="iframe" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'21" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'21">iframe</label><br>'."\n";
             
             echo '</div>'."\n";
             
            }
            echo '</div><br>';
        }
        echo '<div class="buttonPoleTablicy">';
        echo '<input class="radio_class_button" type="submit" value="Сохранить" name="saweTabOb"/>';
        echo '<input class="radio_class_button" type="submit" value="Выйти без сохранения" name="saweTabOb"/>';
        echo '<input class="radio_class_button" type="reset" value="Очистить"/>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div><br>';
      }
      public function createStyleTabUParametryTabliws() 
       {
        if (parent::searcNameTablic($_SESSION['nameTablice'])) 
         {
          parent::killTab($_SESSION['nameTablice']);
         }
        echo '<p class=mesage>В полях ниже введите число столбцов и строк соответственно</p>';
        parent::menu4('menu_parametr_tab','redaktor.php');   
       }
     public function createStyleTabUProwerkaImeni($nameTable) // 
     {
        if (parent::zapretUdaleniaTablicy($nameTable)!="Невозможно удалить")
        {
         if (parent::searcNameTablic($nameTable)) {$nameTab='Таблица с именем:'.$nameTable.' существует. Для продолжения жмём ОК';}
         else {$nameTab='Создаём таблицу с именем:'.$nameTable.'. Для продолжения жмём ОК';}
         parent::okCansel($nameTab,'buttonTabUniwJestUge','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
        } else parent::okCansel('Таблица защищена от удаления. Пока-пока, и да, не важно на что ты нажмёшь...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
     }
     public function nazataPokazatSpisokTablic() // Обработка нажатия кнопки Список таблиц tablicaDlaMenu($nameTablice)
     {
      $this->stolb=parent::kolVoStolbovTablice($_SESSION['nameTablice']);
      $this->strok=parent::kolVoZapisTablice($_SESSION['nameTablice']); 
        echo '<div class="infoSpisokTablic">';                        
        echo '<p class="obhieSpisokTablic">Общие таблицы</p>';        
        echo '<p class="menuSpisokTablic">Таблицы для меню</p>';
        echo '<p class="buttonMenuSpisokTablicGlavP">Таблицы для верстки сайтов</p>';
        echo '<p class="buttonMenuSpisokTablicGlavTegP">Таблица данных для сайтов</p>';
        echo '<p class="zapretNaUdalenieP">Таблицу невозможно удалить</p>';
        echo '</div>';
        $zapros="SHOW TABLES";
        $rez=parent::zaprosSQL($zapros);
        echo '<div class="container-fluid">';
        echo '<div class="row spisokTablic">';
        echo'<form method="POST" active="redaktor.php">';
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
         {
         if ($_SESSION['status']==5 || ($_SESSION['status']!=5 && parent::zapretUdaleniaTablicy($stroka[0])!='Невозможно удалить'))
         {
         if (parent::zapretUdaleniaTablicy($stroka[0])=='Невозможно удалить') $dopClass="zapretNaUdalenie"; else $dopClass="";
         if (parent::tablicaDlaMenu($stroka[0]))
          echo '<input class="btn btn-primary buttonMenuSpisokTablic '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
           else if (parent::id_tab_gl_searc($stroka[0]))
            echo '<input class="btn btn-primary buttonMenuSpisokTablicGlav '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
            else if (parent::zaprosSQL('SELECT name_teg FROM '.$stroka[0].' WHERE 1'))
              echo '<input class="btn btn-primary buttonMenuSpisokTablicGlavTeg '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
              else 
               echo '<input class="btn btn-primary '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
            }
         }
        echo'</form>';
        echo '</div>';
        echo '</div>';
     }
     
   public function saveNameTable($nameTable) // запомнить последнее имя таблицы в БД 
      { // Обработка нажатия одной из кнопок соответствующих некой таблице
        $_SESSION['nameTablice']=$nameTable;
        $zapros="UPDATE nastrolkiredaktora SET `imiePosTabl`='".$nameTable."' WHERE 1";
        $rez=parent::zaprosSQL($zapros);
      }
   public function createNameMenu($nameTablic) // Нажали на Создать Меню
    {
      if (parent::zapretUdaleniaTablicy($nameTablic)!="Невозможно удалить")
      {
        $mesaz="Такая таблица уже есть, продолжить?";
        $nameKn='tablicaJest';
        $classDiv="buttonCreateNameMenuDiv";
        $classP="buttonCreateNameMenuP";
        $classButton="buttonCreateNameMenuButton";
        if (parent::searcNameTablic($nameTablic)) parent::okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton);
        if (!parent::searcNameTablic($nameTablic))
         {
            echo '<div class="container">';
            echo '<div class="row">';
            echo'<p>Название таблицы(меню)'.$nameTablic.'</p>';
            echo'<form active="redaktor.php" method="POST">';
            echo'<input type="radio" checked name="listStyle" value="Общий стиль для всех кнопок"><span>Общий стиль для всех кнопок(class="'.$nameTablic.'")</span><br>';
            echo'<input type="radio" name="listStyle" value="У каждой кнопки свой стиль"><span>Стиль первой кнопки в классе(class="'.$nameTablic.'0", второй class="'.$nameTablic.'1" и т.д.)</span><br>';
            echo'<input type="submit" value="Создать" name="createTabMenu">';
            echo'</form>';
            echo'</div>';
            echo'</div>';
         } 
      } else parent::okCansel('Таблица защищена от удаления. Пока-пока, и да, не важно на что ты нажмёшь...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
     }

    public function createTabDlaMenu(){
          // Создание пустой таблицы для нового меню
          $zapros="CREATE TABLE ".$_SESSION['nameTablice']."(ID INT, NAME VARCHAR(255), URL VARCHAR(255), CLASS VARCHAR(255))";
          $rez=parent::zaprosSQL($zapros);
          $rezId=parent::maxIdLubojTablicy('tablica_tablic');
          ////////////////////////////////////////////////
          $nameTable=$_SESSION['nameTablice']; // вытягиваем имя таблицы
          if ($_POST['listStyle']=="Общий стиль для всех кнопок") $class=0; // определяем класс будет общим или индивидуальным для каждой кнопки
          if ($_POST['listStyle']=="У каждой кнопки свой стиль") $class=1;
          $zapros="INSERT INTO `tablica_tablic`(`ID`, `NAME`, `CLASS`) VALUES (".$rezId.",'".$nameTable."',".$class.")";
          $rez=parent::zaprosSQL($zapros);
    }
    public function createTabDlaMenu5(){
      // Создание пустой таблицы для нового меню
      $zapros="CREATE TABLE ".$_SESSION['nameTablice']."(ID INT, NAME VARCHAR(255), URL VARCHAR(255), CLASS VARCHAR(255), STATUS VARCHAR(255))";
      $rez=parent::zaprosSQL($zapros);
      $rezId=parent::maxIdLubojTablicy('tablica_tablic');
      ////////////////////////////////////////////////
      $nameTable=$_SESSION['nameTablice']; // вытягиваем имя таблицы
      if ($_POST['listStyle']=="Общий стиль для всех кнопок") $class=0; // определяем класс будет общим или индивидуальным для каждой кнопки
      if ($_POST['listStyle']=="У каждой кнопки свой стиль") $class=1;
      $zapros="INSERT INTO `tablica_tablic`(`ID`, `NAME`, `CLASS`) VALUES (".$rezId.",'".$nameTable."',".$class.")";
      $rez=parent::zaprosSQL($zapros);
}
public function loadTablic($nameTablic)  // загрузить главную таблицу загрузить шаблон нарисовать шаблон 
    {
       if (!parent::searcNameTablic($nameTablic) && !parent::id_tab_gl_searc($nameTablic)) //Не нашли таблицу 
        {

           echo '<p class="error">В базе данных такой таблицы нет, создаёте?</p>';
           echo '<div class="container">';
           echo '<div class="row">';
           echo'<p class="mesage">Название таблицы(меню)'.$nameTablic.'</p>';
           echo'<form active="redaktor.php" method="POST">';
           echo'<input type="radio" checked name="listStyle" value="Общий стиль для всех кнопок"><span>Общий стиль для всех кнопок(class="'.$nameTablic.'")</span><br>';
           echo'<input type="radio" name="listStyle" value="У каждой кнопки свой стиль"><span>Стиль первой кнопки в классе(class="'.$nameTablic.'0", второй class="'.$nameTablic.'1" и т.д.)</span><br>';
           echo'<input type="submit" value="Создать" name="createTabMenu">';
           echo'</form>';
           echo'</div>';
           echo'</div>';
        }
        if (parent::searcNameTablic($nameTablic) && !parent::id_tab_gl_searc($nameTablic)) //Если нашли таблицу
        {
            $zapros="SELECT kol_voKn FROM tablica_tablic WHERE NAME='".$nameTablic."'";  // Проверяем данные о числе записей в таблице таблиц
            $rez=parent::zaprosSQL($zapros);
            $kol_voZapisejTablicaTablic=array();
            $kol_voZapisejTablicaTablic[0]=2;
            if ($rez!==false) $kol_voZapisejTablicaTablic=mysqli_fetch_array($rez);
            if (!isset($kol_voZapisejTablicaTablic)) $kol_voZapisejTablicaTablic[0]='Число записей не известно';
            echo '<p class="mesage">Число записей в таблице '.$nameTablic.' равно '.$kol_voZapisejTablicaTablic[0].'</p>';
            $mesaz="В поле ниже введите число позиций(кнопок) в создаваемом меню";
            $nameKn='kol_voKn';
            $classDiv="buttonCreateNameMenuDiv";
            $classP="buttonCreateNameMenuP";
            $classButton="buttonCreateNameMenuButton";
            $classInput="inputCreateNameMenuButton";
            parent::poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput);
        }
   if (parent::id_tab_gl_searc($nameTablic)) //Редактирование таблицы главной. проверить есть ли радио и чекбоксы и если есть, то по сколько пунктов 
        {
          parent::okSelect("Показать нулевые кнопки",'pokazNULL','pokazNULLDiv','pokazNULLP','pokazNULLButton');
           
          //проверим есть ли вспомогательная таблица и если нет, то создадим её 
           if (!parent::searcNameTablic($nameTablic.'_tegi'))
                parent::zaprosSQL("CREATE TABLE ".$nameTablic."_tegi"."(stolb INT, str INT, name_teg VARCHAR(255), name_attrib VARCHAR(255), text VARCHAR(6000), string_ili_int INT)");
 
            //проверим есть ли вспомогательная таблица и если нет, то создадим её 
            if (!parent::searcNameTablic($nameTablic.'_status'))
              parent::zaprosSQL("CREATE TABLE ".$nameTablic."_status"."(stolb INT, str INT, status VARCHAR(255))");

           $bylo=false; // несет информацию о том, что в очередной строке таблицы было что-то для вывода и следовательно после окончания строки следует перейти на новую строку.
           $rezBin=false; 
           echo '<section class="container-fluid">'; //
           
           // Запись статусов
           if (isset($_POST['savePola0_0']))
           $this->saveStatusRazreshenia($nameTablic,'savePola0_0');
           
           echo '<form action="redaktor.php" method="POST">';
           echo '<div class="row">';
           echo '<div class="col-5 poleRedaktGlawnTablTegDiv">';
           // Формируем поле редактирования
           echo '<p class=poleRedaktGlawnTablTegP>Главный тег Form</p>';

           //выпадающее меню задания основного аттрибута
           $this->attribTega('selectFormAttrib','form',$nameTablic);
           echo '<input type="text" name="formGlavnyAttrib0_0" class="poleRedaktGlawnTablTegText" value=""><br>';
           //выпадающее меню задания универсального аттрибута
           $this->attribUniwersalnye('selectFormUniversalAttrib');
           echo '<input type="text" name="formGlavnyAttribUniversalny0_0" class="poleRedaktGlawnTablTegText" value=""><br>';
           //выпадающее меню задания события
           $this->sobytia('selectFormSobytie');
           echo '<input type="text" name="formGlavnySobytia0_0" class="poleRedaktGlawnTablTegText" value=""><br>';
           //текстовые поля задания любого аттрибута
           echo '<input type="text" name="swojAttrib0_0" class="poleRedaktGlawnTablTegText" size=17  value="----------">';
           echo '<input type="text" name="swojAttribZnacenie0_0" class="poleRedaktGlawnTablTegText"><br>';
           //определение значения аттрибута, нужны кавычки или нет
           echo '<input type="radio" name="tegRadio0_0" class="poleRedaktGlawnTablTegText" checked value="string" id="str"><label for="str">string</label> ';
           echo '<input type="radio" name="tegRadio0_0" class="poleRedaktGlawnTablTegText" value="int"  id="int"><label for="int">int</label> <br>';
           //Задание статуса
           echo '<input type="checkbox" name="status00_0" value="s0"'.parent::checkedStatus(0,0,"0",$nameTablic).'>0 ';
           echo '<input type="checkbox" name="status10_0" value="s1"'.parent::checkedStatus(0,0,"1",$nameTablic).'>1 ';
           echo '<input type="checkbox" name="status20_0" value="s2"'.parent::checkedStatus(0,0,"2",$nameTablic).'>2 ';
           echo '<input type="checkbox" name="status30_0" value="s3"'.parent::checkedStatus(0,0,"3",$nameTablic).'>3 ';
           echo '<input type="checkbox" name="status40_0" value="s4"'.parent::checkedStatus(0,0,"4",$nameTablic).'>4 ';
           echo '<input type="checkbox" name="status50_0" value="s5"'.parent::checkedStatus(0,0,"5",$nameTablic).'>5 ';
           echo '<input type="checkbox" name="status90_0" value="s9"'.parent::checkedStatus(0,0,"9",$nameTablic).'>9 <br>';
           //кнопки записи информации
           echo '<input type="submit" value="Запомнить" name="savePola0_0" class="poleRedaktGlawnTablTegSubmit">';
           echo '<input type="reset" value="Стереть" class="poleRedaktGlawnTablTegSubmit">';
           echo '<div class="btn btn-outline-info redaktorHablonJakorHelp"><a href="#helpTegForm">Помощь</a></div>';
           echo '</div>'; 

           echo '<div class="col-7 poleRedaktRezultat">';

          //Запись основных аттрибутов и их свойств   ----------
           if (isset($_POST['selectFormAttrib'])  && isset($_POST['savePola0_0']) && $_POST['selectFormAttrib']!="----------")
           $this->saveAttribTega($nameTablic,'form',$_POST['selectFormAttrib'],'savePola0_0',$_POST['formGlavnyAttrib0_0'],$_POST['tegRadio0_0']);

           //Запись общих аттрибутов и их свойств
           if (isset($_POST['selectFormUniversalAttrib'])  && isset($_POST['savePola0_0']) && $_POST['selectFormUniversalAttrib']!="----------")
           $this->saveAttribTega($nameTablic,'form',$_POST['selectFormUniversalAttrib'],'savePola0_0',$_POST['formGlavnyAttribUniversalny0_0'],$_POST['tegRadio0_0']);

           //Запись событий и их свойств
           if (isset($_POST['selectFormSobytie'])  && isset($_POST['savePola0_0']) && $_POST['selectFormSobytie']!="----------")
           $this->saveAttribTega($nameTablic,'form',$_POST['selectFormSobytie'],'savePola0_0',$_POST['formGlavnySobytia0_0'],$_POST['tegRadio0_0']);

           //Запись произвольных аттрибутов и их свойств
           if (isset($_POST['swojAttribZnacenie0_0'])  && isset($_POST['savePola0_0']) && $_POST['swojAttrib0_0']!="----------")
           $this->saveAttribTega($nameTablic,'form',$_POST['swojAttrib0_0'],'savePola0_0',$_POST['swojAttribZnacenie0_0'],$_POST['tegRadio0_0']);

           echo $this->strokaAttrbutov($nameTablic,'form',0,0,'&lt','&gt');
           echo '<div class="col-12 statusy">'; // Вывод статусов в правый столбец
           if (parent::checkedStatus(0,0,"0",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Гость</p></div>';
           if (parent::checkedStatus(0,0,"1",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Пользователь</p></div>';
           if (parent::checkedStatus(0,0,"2",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Редактор</p></div>';
           if (parent::checkedStatus(0,0,"3",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Подписчик</p></div>';
           if (parent::checkedStatus(0,0,"4",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Администратор</p></div>';
           if (parent::checkedStatus(0,0,"5",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Супер Администратор</p></div>';
           if (parent::checkedStatus(0,0,"9",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Не проверен</p></div>';
           echo '</div>';


           echo '</div></div><br>';

           $this->strok=parent::kolVoZapisTablice($nameTablic);
           $this->stolb=parent::kolVoStolbovTablice($nameTablic);

           for ($i=1; $i<=$this->strok; $i++) //перебираем столбцы начиная с первого. 
             {
              for ($j=1; $j<$this->stolb; $j++)  // перебираем строки с первойkolVoZapisTablice
               {
                
                $zapros="SELECT poz".$j." FROM ".$nameTablic." WHERE id_tab_gl=".$i;
                $rez=parent::zaprosSQL($zapros);
                $stroka=mysqli_fetch_array($rez);
                if ($stroka[0]!="NULL" || $_SESSION['pokazNULL']) 
                 {

                 // Запись статусов
                  if (isset($_POST['savePola'.$j."_".$i]))
                    $this->saveStatusRazreshenia($nameTablic,'savePola'.$j."_".$i);
                   echo '<div class="row">';
                   echo '<div class="col-5 poleRedaktGlawnTablTegDiv">';
                   echo '<p class=poleRedaktGlawnTablTegP>Строка:'.$i.', столбец:'.$j.', тег '.$stroka[0].'</p>';
                   //выпадающее меню задания основного аттрибута
                   $this->attribTega("selectTegAttrib".$j."_".$i,$stroka[0],$nameTablic);
                   echo '<input type="text" name="formGlavnyAttrib'.$j."_".$i.'" class="poleRedaktGlawnTablTegText"><br>';
                   $this->attribUniwersalnye('selectTegUniversalAttrib'.$j."_".$i);
                   echo '<input type="text" name="formGlavnyAttribUniversalny'.$j."_".$i.'" class="poleRedaktGlawnTablTegText"><br>';
                   $this->sobytia('selectTegSobytie'.$j."_".$i);
                   echo '<input type="text" name="formGlavnySobytia'.$j."_".$i.'" class="poleRedaktGlawnTablTegText"><br>';
                   $_SESSION['clickButtonGlawnPole']=true;
                   echo '<input type="text" name="swojAttrib'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" size=17 value="----------">';
                   echo '<input type="text" name="swojAttribZnacenie'.$j."_".$i.'" class="poleRedaktGlawnTablTegText"><br>';
                   echo '<input type="radio" name="tegRadio'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" checked value="string" id="str"><label for="str">string</label> ';
                   echo '<input type="radio" name="tegRadio'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="int"  id="int"><label for="int">int</label><br>';
                              //Задание статуса шаблона
                   echo '<input type="checkbox" name="status0'.$j.'_'.$i.'" value="s0"'.parent::checkedStatus($j,$i,"0",$nameTablic).'>0 ';
                   echo '<input type="checkbox" name="status1'.$j.'_'.$i.'" value="s1"'.parent::checkedStatus($j,$i,"1",$nameTablic).'>1 ';
                   echo '<input type="checkbox" name="status2'.$j.'_'.$i.'" value="s2"'.parent::checkedStatus($j,$i,"2",$nameTablic).'>2 ';
                   echo '<input type="checkbox" name="status3'.$j.'_'.$i.'" value="s3"'.parent::checkedStatus($j,$i,"3",$nameTablic).'>3 ';
                   echo '<input type="checkbox" name="status4'.$j.'_'.$i.'" value="s4"'.parent::checkedStatus($j,$i,"4",$nameTablic).'>4 ';
                   echo '<input type="checkbox" name="status5'.$j.'_'.$i.'" value="s5"'.parent::checkedStatus($j,$i,"5",$nameTablic).'>5 ';
                   echo '<input type="checkbox" name="status9'.$j.'_'.$i.'" value="s9"'.parent::checkedStatus($j,$i,"9",$nameTablic).'>9 <br>';
                   if ($stroka[0]=='video source' || $stroka[0]=='audio source')
                   {
                    if ($stroka[0]=='video source')
                    {
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" checked value="src" id="src"><label for="src">src</label> ';
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="type"  id="type"><label for="type">type</label> <br>';
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="codex"  id="codecs"><label for="codecs">codecs</label> <br>';
                    }
                    if ($stroka[0]=='audio source')
                    {
                      echo '<input type="radio" name="tegAudioSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" checked value="audio" id="str"><label for="str">string</label> ';
                      echo '<input type="radio" name="tegAudioSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="source"  id="int"><label for="int">int</label> <br>';
                    }
                    } else echo '<br>';
                   echo '<input type="submit" value="Запомнить" name="savePola'.$j."_".$i.'" class="poleRedaktGlawnTablTegSubmit">';
                   echo '<input type="reset" value="Стереть" class="poleRedaktGlawnTablTegSubmit">';
                   if ($stroka[0]=='p' || $stroka[0]=='h1' || $stroka[0]=='h2' || $stroka[0]=='h3' || $stroka[0]=='h4' || $stroka[0]=='h5' || $stroka[0]=='h6')
                   echo '<div class="btn btn-outline-info redaktorHablonJakorHelp"><a href="#helpPH16Text">Помощь</a></div>';
                   if ($stroka[0]=='img')
                   echo '<div class="btn btn-outline-info redaktorHablonJakorHelp"><a href="#helpImgText">Помощь</a></div>';
                   if ($stroka[0]=='checkbox' || $stroka[0]=='radio')
                   echo '<div class="btn btn-outline-info redaktorHablonJakorHelp"><a href="#helpRadio">Помощь</a></div>';
                   echo '<div class="btn btn-outline-info redaktorHablonJakor"><a href="#vverh">Вверх</a></div>';
                 echo '</div>';
                 
                 echo '<div class="col-7 poleRedaktRezultat">';
                //Запись основных аттрибутов и их свойств   ----------
                
                if ((isset($_SESSION['obnovit']) && !$_SESSION['obnovit']) || (isset($_POST['selectTegAttrib'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['selectTegAttrib'.$j."_".$i]!="----------"))
                 {
                  $_SESSION['obnovit']=true;//переменная предотвращает циклические обновления страницы
                  $this->saveAttribTega($nameTablic,$stroka[0],$_POST['selectTegAttrib'.$j."_".$i],'savePola'.$j."_".$i,$_POST['formGlavnyAttrib'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);
                }
                
                //Запись общих аттрибутов и их свойств
                if (isset($_POST['selectTegUniversalAttrib'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['selectTegUniversalAttrib'.$j."_".$i]!="----------")
                {
                $this->saveAttribTega($nameTablic,$stroka[0],$_POST['selectTegUniversalAttrib'.$j."_".$i],'savePola'.$j."_".$i,$_POST['formGlavnyAttribUniversalny'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);
                }
                //Запись событий и их свойств
                if (isset($_POST['selectTegSobytie'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['selectTegSobytie'.$j."_".$i]!="----------")
                $this->saveAttribTega($nameTablic,$stroka[0],$_POST['selectTegSobytie'.$j."_".$i],'savePola'.$j."_".$i,$_POST['formGlavnySobytia'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);

                //Запись произвольных аттрибутов и их свойств
                if (isset($_POST['swojAttribZnacenie'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['swojAttrib'.$j."_".$i]!="----------")
                $this->saveAttribTega($nameTablic,$stroka[0],$_POST['swojAttrib'.$j."_".$i],'savePola'.$j."_".$i,$_POST['swojAttribZnacenie'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);
                


                  //подбираем размер шрифта
                  $fontSize=16;
                  $rezultat=$this->strokaAttrbutov($nameTablic,$stroka[0],$i,$j,'&lt','&gt');
                  $cisloVhodowBr=substr_count($rezultat, '<br>');
                  if ($cisloVhodowBr>1) $fontSize=intdiv ( 180 , $cisloVhodowBr );
                  if ($fontSize>16) $fontSize=16;
                  if ($fontSize<7) $fontSize=7;
                  $rezultat='<div style="font-size: '.$fontSize.'px;">'.$rezultat.'</div>';
                  echo $rezultat; 
                  echo '<div class="col-12 statusy">'; // Вывод статусов в правый столбец
                  if (parent::checkedStatus($j,$i,"0",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Гость</p></div>';
                  if (parent::checkedStatus($j,$i,"1",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Пользователь</p></div>';
                  if (parent::checkedStatus($j,$i,"2",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Редактор</p></div>';
                  if (parent::checkedStatus($j,$i,"3",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Подписчик</p></div>';
                  if (parent::checkedStatus($j,$i,"4",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Администратор</p></div>';
                  if (parent::checkedStatus($j,$i,"5",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Супер Администратор</p></div>';
                  if (parent::checkedStatus($j,$i,"9",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                  echo '<div class="'.$klass.'"><p>Не проверен</p></div>';
                  echo '</div>';
                echo '</div></div><br>';
                 }
               }
             }
             echo '</form>';
         echo '</container>'; 

         echo '<div class="helpFormGlawTab container-fluid" >'; // Помощь по работе с главной таблицей 
         echo '<a name="helpTegForm">';        // Помощь по настройке общего вида в теге Form
         echo '<h5>Помощь по настройке общего вида в теге Form</h5>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">Общий вид рабочего поля или шаблона задается параметрами или фальш-аттрибутами</p>';
         echo '<p class="infoHelpGlTablP">Фальш-аттрибут "ширина столбцоы Bootstrap" соответственно задает число и ширину столбцов сетки Bootstrap</p>';
         echo '<p class="infoHelpGlTablP">Сумма ширины всех столбцов равна 12. Сколько рабочих столбцов, столько и цифр.</p>';
         echo '<p class="infoHelpGlTablP">К примеру если есть три колонки на сайте или рабочем поле, то их следует задать вот-так: 3-6-3.</p>';
         echo '<p class="infoHelpGlTablP">Таким образом получаем разметку в три колонки, две по краям узкие и одна в середине широкая.</p>';
         echo '<p class="infoHelpGlTablP">Если параметр не задать, то будут все колоны равного размера.</p>';
         echo '<p class="infoHelpGlTablP">Если нужна стилизация, то класс каждого столбца будет называться так:.</p>';
         echo '<p class="infoHelpGlTablP">class="col-(данные из таблицы) bootstrap_(номер столбца)_(название таблицы)"</p>';
         echo '</div>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">Фальш-аттрибут "разделение блоков с BR" равен числу пустых строк под каждой строкой или уровнем шаблона.</p>';
         echo '<p class="infoHelpGlTablP">Фальш-аттрибут "разделение блоков с HR" равен числу горизонтальных линий под каждой строкой или уровнем шаблона.</p>';
         echo '</div>';
         echo '</div>';
         echo '<div class="btn btn-outline-info vverhInfoPoleRedaktoraHablona"><a href="#vverh">Вверх</a></div>';

         echo '<div class="helpFormGlawTab container-fluid" >'; // Помощь по работе тегом img
         echo '<a name="helpImgText">';        // Помощь по привязке ссылки на картинку к картинке
         echo '<h5>Помощь по привязке картинки к текстовому полю, указывающему ссылку на картинку.(новый метод)</h5>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">С помощью данной функции производится привязка текстового поля, в котором будет указана ссылка </p>';
         echo '<p class="infoHelpGlTablP">на картинку к позиции картинки. Новый метод проще, на основе фильш-аттрибута</p>';
         echo '<p class="infoHelpGlTablP">В главных аттрибутах картинки есть фальш-аттрибут "источник ссылки", выбираем его и в поле свойств указываем строку-столбец</p>';
         echo '<p class="infoHelpGlTablP">на текстовое поле, с помощью которого будет производиться ввод пользователем ссылки на картинку.</p>';
         echo '<p class="infoHelpGlTablP">Пример: аттрибут "источник ссылки" = 1-3. Это значит программа будет искать ссылку на картинку в строке 1 и позации 3.</p>';
         echo '<p class="infoHelpGlTablP">Если же там ссылки не будет или фальш-аттрибут не будет задан программа попытается найти ссылку по старому методу,</p>';
         echo '<p class="infoHelpGlTablP">с помощью привязки через второй класс, как это указано ниже.</p>';
         echo '</div>';
         echo '<h5>Помощь по привязке картинки к текстовому полю, указывающему ссылку на картинку.(старый метод)</h5>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">С помощью данной функции производится привязка текстового поля, в котором будет указана ссылка </p>';
         echo '<p class="infoHelpGlTablP">на картинку к позиции картинки. Привязка не жесткая и может быть изменена посредствам данной страницы.</p>';
         echo '<p class="infoHelpGlTablP">Допустим у нас есть картинка, ссылка на картинку задается через форму пользователя. </p>';
         echo '<p class="infoHelpGlTablP">Чтобы всё правильно работало необходимо установить в этой форме ссылку по умолчанию в том поле, которое</p>';
         echo '<p class="infoHelpGlTablP">будет привязано к картинке. Эта ссылка будет подставлена в случае, если пользователь не задаст свою ссылку.</p>';
         echo '<p class="infoHelpGlTablP">Ссылка должна быть указана в параметре src картинки. src="default.jpg"</p>';
         echo '<p class="infoHelpGlTablP">В текстовом поле можно указать текст по умолчанию, на пример Введите ссылку на картинку.</p>';
         echo '</div>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<h5>Теперь собственно привязка картинки с текстовым полем.</h5>';
         echo '<p class="infoHelpGlTablP">Связь происходит с помощью названия стилевого класса. Используется второй класс, первый остается для стиля.</p>';
         echo '<p class="infoHelpGlTablP">К примеру для картинки придумываем класс class="styleJpg urlJpg"</p>';
         echo '<p class="infoHelpGlTablP">Для текстового поля второй класс должен быть таким же, как и для картинки: urlJpg - class="styleText urlJpg"</p>';
         echo '<p class="infoHelpGlTablP">urlJpg является тем словом, которое связывает картинку с текстовым полем, предназначенным для ввода ссылки.</p>';
         echo '</div>';
         echo '</div>';
         echo '<div class="btn btn-outline-info vverhInfoPoleRedaktoraHablona"><a href="#vverh">Вверх</a></div>';

         echo '<div class="helpFormGlawTab container-fluid" >'; // Помощь по работе с чекбоксами и радио кнопками
         echo '<a name="helpRadio">';        // Помощь по привязке ссылки на картинку к картинке
         echo '<h5>Помощь по настройке блоков Checkbox или Radio кнопок.</h5>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">Настройки обязательных аттрибутов (id, name, value, for) настраиваются на одинарной кнопке.</p>';
         echo '<p class="infoHelpGlTablP">Одинарная кнопка будет при первом старте таблицы или при указании "Число строк"=0</p>';
         echo '<p class="infoHelpGlTablP">После того, как обязательные аттрибуты будут настроены выбираем параметр "Число строк" и задаем нужное число.</p>';
         echo '<p class="infoHelpGlTablP">После обновления будет виден весь блок кнопок. Остается настроить текст.</p>';
         echo '<p class="infoHelpGlTablP">Для настройки текста в меню главных аттрибутов появятся соответствующие опции.</p>';
         echo '<p class="infoHelpGlTablP">Информация записывается в базу данных после каждого нажатия кнопки "Запомнить",</p>';
         echo '<p class="infoHelpGlTablP">поэтому, при необходимости внести изменения в аттрибуты можно смело выбрать опцию</p>';
         echo '<p class="infoHelpGlTablP">"Число строк"=0, настроить аттрибуты и вернуть нужное число строк.</p>';
         echo '<p class="infoHelpGlTablP">Если всё готово, то выбираем опцию "Сохранить блок" и Вуаля, всё готово.</p>';
         echo '<p class="infoHelpGlTablP">Если возникает необходимость что-то изменить, то сначала удаляем блок, потом меняем настройки и </p>';
         echo '<p class="infoHelpGlTablP">сохраняем блок. При удалении блока все его настройки сохраняются. По сути происходит разборка и сборка блока кнопок.</p>';
         echo '<h5>Если нужно, чтобы чекбоксы работали со статусами... (частный случай)</h5>';
         echo '<p class="infoHelpGlTablP">Есть правила задания имен для главных аттрибутов.</p>';
         echo '<p class="infoHelpGlTablP">Допустим блок находится в первой строке таблицы, третьем столбце, тогда имена аттрибутов следует делать такими:</p>';
         echo '<p class="infoHelpGlTablP">id="statusStr1Stolb3", где Str1 - это строка 1, Stolb3 - это (столбец 3 или позиция 3 или поле 3)</p>';
         echo '<p class="infoHelpGlTablP">for="statusStr1Stolb3", где Str1 - это строка 1, Stolb3 - это (столбец 3 или позиция 3 или поле 3)</p>';
         echo '<p class="infoHelpGlTablP">name="N_statusStr1Stolb3" где Str1 - это строка 1, Stolb3 - это (столбец 3 или позиция 3 или поле 3), N_ - просто маркер, он обязателен!</p>';
         echo '<p class="infoHelpGlTablP">value="V_statusStr1Stolb3" где Str1 - это строка 1, Stolb3 - это (столбец 3 или позиция 3 или поле 3), V_ - просто маркер, он обязателен!</p>';
         echo '<p class="infoHelpGlTablP">Далее программа сама добавит порядковые номера.</p>';
         echo '<p class="infoHelpGlTablP">При заполнении свойства аттрибутов можно просто скопировать отсюда и изменить лишь строку и столбец.</p>';
         echo '<h5>Импорт и очистка блоков шаблона</h5>';
         echo '<p class="infoHelpGlTablP">Импорт - это взятие настроек чекбоксов из соседних ячеек с преобразованием всех имен.</p>';
         echo '<p class="infoHelpGlTablP">На пример: если импортируете чекбоксы из строки 2 столбца 3 в строку 3 столбец 3, то </p>';
         echo '<p class="infoHelpGlTablP">id="statusStr2Stolb3" будет преобразован в id="statusStr3Stolb3" и так далее, надписи текстовые сохранятся.</p>';
         echo '<p class="infoHelpGlTablP">Для импорта достаточно в нужной ячейке выбрать фальш-аттрибут "импорт из клетки ?-?", в значении аттрибута следует задать строку и столбец</p>';
         echo '<p class="infoHelpGlTablP">места, из которого происходит импорт, через тире или минус. На пример: "импорт из клетки ?-?"=3-4. В данном примере в текущую клетку</p>';
         echo '<p class="infoHelpGlTablP">будут импортированы настройки чекбокса из позиции строка 3, столбец 4.</p>';
         echo '<p class="infoHelpGlTablP">Для очистки блока или ячейки достаточно выбрать псевдо-аттрибут "очистить аттрибуты" и Запомнить.</p>';
         echo '<p class="infoHelpGlTablP"></p>';
         echo '</div>';
         echo '</div>';
         echo '<div class="btn btn-outline-info vverhInfoPoleRedaktoraHablona"><a href="#vverh">Вверх</a></div>';

         echo '<div class="helpFormGlawTab container-fluid" >'; // Помощь по работе с чекбоксами и радио кнопками
         echo '<a name="helpPH16Text">';        // Помощь по настройке общего вида в теге Form
         echo '<h5>Помощь по настройке параграфа P и заголовков h1-h6</h5>';
         echo '<div  class="infoHelpGlTablDiv">';
         echo '<p class="infoHelpGlTablP">Для работы данного пункта необходимо указать программе из какой позиции шаблона следует брать текст.</p>';
         echo '<p class="infoHelpGlTablP">Для этой цели служит псевдо-аттрибут "источник текста".</p>';
         echo '<p class="infoHelpGlTablP">Указание происходит с помощью двух цифр, строка-позиция.</p>';
         echo '<p class="infoHelpGlTablP">Выбираем псевдо-аттрибут "источник текста" и присваиваем ему значение 1-3.</p>';
         echo '<p class="infoHelpGlTablP">В примере выводимый текст будет взят из первой строки третьей позиции таблицы _data</p>';
         echo '</div>';
         echo '</div>';
         echo '<div class="btn btn-outline-info vverhInfoPoleRedaktoraHablona"><a href="#vverh">Вверх</a></div>';
        }
    }//helpPH16Text
///////////////////////////////////////////////работа в шаблоне////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function cisloUrovnejHablon($nameTablice)  // число уровней шаблона
    {
       $zapros="SELECT MAX(str) FROM ".$nameTablice.'_tegi';
       $rez=parent::zaprosSQL($zapros);
       if (!$rez) return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) return -1;
       if ($stroka[0]==NULL) $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }
    public function cisloStolbovjHablon($nameTablice)  // Число столбов в шаблоне
    {
       $zapros="SELECT MAX(stolb) FROM ".$nameTablice.'_tegi';
       $rez=parent::zaprosSQL($zapros);
       if (!$rez) return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) return -1;
       if ($stroka[0]==NULL) $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }
    //достаем тег из бд
    public function setapTeg($nameTablice,$nameAtrib,$stolb,$str)  // страница обработчика шаблона
    {
       $zapros="SELECT text FROM ".$nameTablice."_tegi"." WHERE name_attrib='".$nameAtrib."' AND stolb=".$stolb." AND str=".$str;
       $rez=parent::zaprosSQL($zapros);
       if (!$rez) return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) return -1;
       if ($stroka[0]==NULL) $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }
    public function statusRegiHablon($nameTablic,$stolb,$str)  // Проверяем статус кнопки
    {
      $zapros="SELECT status FROM ".$nameTablic."_status WHERE stolb=".$stolb." AND str=".$str;
      $rez=parent::zaprosSQL($zapros);
      if (!$rez) return false;
      $stroka=mysqli_fetch_array($rez);
      //if (!$stroka) return false;
      $st=$_SESSION['status'].'';
      if (stripos($stroka[0],$st)>0) return true;
      return false;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function hablon($nameTablic)
    {
        $urovnejHablona=$this->cisloUrovnejHablon($nameTablic);
        $stolbovHablona=$this->cisloStolbovjHablon($nameTablic);

        ///////////////////////////////////////////// добываем параметры сетки bootstrap
        $stolpBootstrap=array();
        $razdelitBr=0;
        $razdelitHr=0;
        $rez=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='разделение блоков с BR'");
        if ($rez) {$stroka=mysqli_fetch_array($rez);$razdelitBr=(int)$stroka[0]+0;}
        $rez=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='разделение блоков с HR'");
        if ($rez) {$stroka=mysqli_fetch_array($rez);$razdelitHr=(int)$stroka[0]+0;}
        $rez=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='ширина столбцов bootstrap'");
        if (!$rez)  // если нет данных, то сделать равные столбцы
          for ($i=1; $i<=$stolbovHablona; $i++)  // создаем фальш строку bootstrap
          {
            $stolpBootstrap[$i]=12/$stolbovHablona;
          } 
        $stolbec=mysqli_fetch_array($rez);
        $chars = preg_split('/(-)+?/',$stolbec[0], -1);
        for ($i=1; $i<=$stolbovHablona; $i++)  // достаем параметры столбов bootstrap
        {
          $stolpBootstrap[$i]=(int)$chars[$i-1];
        }
        
        echo '<section class="container-fluid section_'.$nameTablic.'">';
        echo '<h4>Редактирование профиля '.$_SESSION['login'].' ('.parent::statusNumerSlovo($_SESSION['status']).')</h4>';

        ///////////////////////////////////////////рисуем form/////////////////////////////////////////
        $rez=parent::zaprosSQL("SELECT * FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0");
        if (!$rez) {echo 'Не найдена таблица шаблона'; return 'Не найдена таблица шаблона';}
        $viv=' ';
        $vivteg='';
        $textPh1h6='0-0';
        while ($stroka=mysqli_fetch_assoc($rez))
        {
            if ($stroka['name_attrib']!='ширина столбцов bootstrap' && $stroka['name_attrib']!='разделение блоков с BR' && $stroka['name_attrib']!='разделение блоков с HR')
              if ($vivteg=='') $vivteg=$stroka['name_teg']; // запоминаем тег, пока он ещё есть
            if ($stroka['name_attrib']!='ширина столбцов bootstrap' && $stroka['name_attrib']!='разделение блоков с BR' && $stroka['name_attrib']!='разделение блоков с HR')
              if ($stroka['string_ili_int']==0) // строим строку аттрибутов
                $viv=$viv.' '.$stroka['name_attrib'].'="'.$stroka['text'].'"';
                else $viv=$viv.' '.$stroka['name_attrib'].'='.$stroka['text'];
        }
          $viv='<'.$vivteg.' '.$viv.'>';
            echo $viv;
          ////////////////////////////////////////////////////////////////////////////////////////////////
      
        for ($stri=1; $stri<$urovnejHablona+1; $stri++)  //Цикл просмотра строк
          {
            echo '<div class="row">';
            for ($stolbi=1; $stolbi<$stolbovHablona+1; $stolbi++) //Цикл просмотра ытолбцов
              {
                //////////////////////////////////////рисуем поле////////////////////////////////////////////////
                 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 if ($this->statusRegiHablon($nameTablic,$stolbi,$stri)) //Если всё в порядке со статусом
                   {
                     
                      // вытягиваем все аттрибуты, которые зарегистрированы по рассматриваемой позиции
                      $rez=parent::zaprosSQL("SELECT * FROM ".$nameTablic."_tegi WHERE str=".$stri." AND stolb=".$stolbi);
                      if (!$rez) {echo 'Не найдена таблица шаблона';break;}
                      $viv=' ';
                      $textNaKnopke='';
                      $for='';
                      $kodHtml='';
                      $nameTega='';
                      $urlDlaImage='';
                      // узнаем имя тега из главной таблицы
                      $nameTega=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$stolbi." FROM ".$nameTablic." WHERE id_tab_gl=".$stri));
                      // обрабатываем чекбоксы и радио в случае, если они заданы блоком
                      $blockJest=false;
                      if ($nameTega[0]=='checkbox' || $nameTega[0]=='radio')
                      {
                        $poiskBloka=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri." AND stolb=".$stolbi." AND name_attrib='блок'" );
                        if (!$poiskBloka) $blockJest=false;    // Если нет данных, значит нет блока
                        $rezPoiskBlok=mysqli_fetch_array($poiskBloka);
                        if (!$rezPoiskBlok[0]) $blockJest=false;  //  Если нет данных, значит нет блока
                        
                        if (stripos($rezPoiskBlok[0],$nameTega[0])>0)  //Нашли блок, соответствующий заданному чекбоксу или радио
                         {
                           $blockJest=true; // Нашли блок для нужного чекбокса или радио
                           $strStatus=$this->loadInfoData($nameTablic,$stri,$stolbi);
                           $rezPoiskBlok[0]=preg_replace ("%(<br><label for=)%","<label for=",$rezPoiskBlok[0]); // убираем лишние <br>
                           $rezPoiskBlok[0]=preg_replace ("%(<br><label class=)%","<label class=",$rezPoiskBlok[0]); // убираем лишние <br>
                           if (stripos($rezPoiskBlok[0],'statusStr'.$stri.'Stolb'.$stolbi)>0) // проверяем привязку к работе со статусами
                           { 
                           $poiskTeg=$nameTega[0]; 
                           $blockStroks=$rezPoiskBlok[0];  // копия строки-блока
                           $chars = preg_split('/((<input).+?(label>)?)/', $blockStroks, -1, PREG_SPLIT_DELIM_CAPTURE);

                            // разобрали блок на строки, одна строка = одному пункту
                           $str0=$chars[2].' '.$chars[3];
                           $str1=$chars[5].' '.$chars[6];
                           $str2=$chars[8].' '.$chars[9];
                           $str3=$chars[11].' '.$chars[12];
                           $str4=$chars[14].' '.$chars[15];
                           $str5=$chars[17].' '.$chars[18];
                           $str9=$chars[20].' '.$chars[21];
                           
                           // Статус 0
                           if (stripos($strStatus,'0')>0)   // Если в строке статусов есть нулевой статус
                            if (!stripos($str0,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                             $str0=preg_replace ("%(input type)%","input checked type",$str0); // вставляем checked
                           if (!stripos($strStatus,'0')>0)   // Если в строке статусов нет нулевой статус
                            if (stripos($str0,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                             $str0=preg_replace ("%.\b(checked)\b%"," ",$str0); // вставляем checked   
                          // Статус 1                        
                           if (stripos($strStatus,'1')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str1,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str1=preg_replace ("%(input type)%","input checked type",$str1); // вставляем checked
                            if (!stripos($strStatus,'1')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str1,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str1=preg_replace ("%.\b(checked)\b%"," ",$str1); // вставляем checked  
                          // Статус 2                       
                            if (stripos($strStatus,'2')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str2,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str2=preg_replace ("%(input type)%","input checked type",$str2); // вставляем checked
                            if (!stripos($strStatus,'2')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str2,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str2=preg_replace ("%.\b(checked)\b%"," ",$str2); // вставляем checked  
                          // Статус 3                       
                            if (stripos($strStatus,'3')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str3,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str3=preg_replace ("%(input type)%","input checked type",$str3); // вставляем checked
                            if (!stripos($strStatus,'3')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str3,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str3=preg_replace ("%.\b(checked)\b%"," ",$str3); // вставляем checked  
                           // Статус 1                        
                            if (stripos($strStatus,'4')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str4,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str4=preg_replace ("%(input type)%","input checked type",$str4); // вставляем checked
                            if (!stripos($strStatus,'4')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str4,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str4=preg_replace ("%.\b(checked)\b%"," ",$str4); // вставляем checked  
                            // Статус 5                        
                            if (stripos($strStatus,'5')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str5,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str5=preg_replace ("%(input type)%","input checked type",$str5); // вставляем checked
                            if (!stripos($strStatus,'5')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str5,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str5=preg_replace ("%.\b(checked)\b%"," ",$str5); // вставляем checked  
                            // Статус 9                        
                            if (stripos($strStatus,'9')>0)   // Если в строке статусов есть нулевой статус
                             if (!stripos($str9,'checked')>0)   // Если в выводимой строке нет свойства checked то вставить его
                              $str9=preg_replace ("%(input type)%","input checked type",$str9); // вставляем checked
                            if (!stripos($strStatus,'9')>0)   // Если в строке статусов нет нулевой статус
                             if (stripos($str9,'checked')>0)   // Если в выводимой строке есть свойства checked то убрать его
                              $str9=preg_replace ("%.\b(checked)\b%"," ",$str9); // вставляем checked  
                           }
                           $viv=$str0.$str1.$str2.$str3.$str4.$str5.$str9;
                         }
                      } 
                      $textPoUmolcaniu="здесь фальш_аттрибута текста по умолчанию нет";
                      //$linkNaImg='здесь фальш_аттрибута источник ссылки нет';
                      //---------------------------------------------------------------------------------------------------
                     
                      $info=$this->loadInfoData($nameTablic,$stri,$stolbi); //Получаем пользовательское значение из таблицы _data, если оно есть
                      if (!$blockJest) // Есть смысл создавать строку с аттрибутами только если чекбокс или радио не заданы блоком
                      while ($stroka=mysqli_fetch_assoc($rez))
                        { 
                         if ($stroka['name_attrib']=='источник текста') $textPh1h6=$stroka['text'];
                         //if (stripos($stroka['name_attrib'],'ссылки')>0) $linkNaImg=$stroka['text'];
                         // Работаем со стандартным оформлением аттрибутов по схеме <тег аттрибут="значение"> //////////////////////
                         if ($nameTega[0]==$stroka['name_teg']) // отсеваем строки со старыми тегами, если они есть (с неактуальными)
                         if ($nameTega[0]=='img'  && $stroka['name_attrib']!='источник ссылки'
                          || $nameTega[0]=='text' 
                            || $nameTega[0]=='p'  && $stroka['name_attrib']!='источник текста'  
                              || $nameTega[0]=='h1'  && $stroka['name_attrib']!='источник текста'  
                                || $nameTega[0]=='h2'  && $stroka['name_attrib']!='источник текста'  
                                  || $nameTega[0]=='h3'  && $stroka['name_attrib']!='источник текста'  
                                    || $nameTega[0]=='h4'  && $stroka['name_attrib']!='источник текста'
                                      || $nameTega[0]=='h5'  && $stroka['name_attrib']!='источник текста' 
                                        || $nameTega[0]=='h6'  && $stroka['name_attrib']!='источник текста' 
                                          || ($nameTega[0]=='textarea' && $stroka['name_attrib']!='текст на кнопке')
                                            || ($nameTega[0]=='button' && $stroka['name_attrib']!='текст на кнопке')
                                              || ($nameTega[0]=='checkbox'  && $stroka['name_attrib']!='текст на кнопке' && $stroka['name_attrib']!='for' && $stroka['name_attrib']!='checked')
                                                || ($nameTega[0]=='html' && $stroka['name_attrib']!='ввести код') 
                                  )
                                  {
                                    $text=$stroka['text']; // Значение аттрибута по умолчанию, из таблицы _tegi
                                    
                                    // Если на данный момент рассматривается тег value тега text, и в базе _data есть новое значение, то заменить значение стартовое из _tegi на значение из базы _data
                                    if ($nameTega[0]=='text' && $stroka['name_attrib']=='value' && $info) $text=$info; 

                                    // Если на данный момент рассматривается фальш-аттрибут (текст по умолчанию)
                                    if ($nameTega[0]=='text' && $stroka['name_attrib']=='value' && $info) $text=$info;
                                    
                                    // Если на данный момент рассматривается тег img тега text, и в базе _data есть новое значение, то заменить значение стартовое из _tegi на значение из базы _data
                                    if ($stroka['name_attrib']=='текст по умолчанию') 
                                        $textPoUmolcaniu=$text;
                                   
                                    // Работа с чекбоксами написанными кодом
                                    if ($stroka['string_ili_int']==0) // строим строку аттрибутов
                                        $viv=$viv.' '.$stroka['name_attrib'].'="'.$text.'"';
                                        else $viv=$viv.' '.$stroka['name_attrib'].'='.$text;
                                  }
                          //------------------------------------------------------------------------------------------------------
                          if ($stroka['name_attrib']=='checked') $viv=$viv.' checked';  // простые аттрибуты
                       
                       //////////////////////////////////////////////////////////////////////////////////////////////////////////
                       ////////////Работаем со значением Текст на кнопке
                       if ($stroka['name_attrib']=='текст на кнопке')
                         {
                           if ($stroka['name_teg']=='button'                              //выдернуть(запомнить) текст на кнопке
                             || $stroka['name_teg']=='checkbox'
                              || $stroka['name_teg']=='radio'
                               || $stroka['name_teg']=='textarea'
                                )
                            $textNaKnopke=$stroka['text'];
                            if ($stroka['name_teg']=='textarea' && $info) $textNaKnopke=$info; // Запоминаем текст в поле Текст ареа.
                          }
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Работаем с For
                        if ($stroka['name_attrib']=='for')
                          $for=$stroka['text'];                            //выдернуть(запомнить) For
                          ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                          ////////////Работаем с html
                         if ($nameTega[0]=='html' && $stroka['name_attrib']=='ввести код')// && !$info)
                          {
                               $kodHtml=$stroka['text'];                            //выдернуть(запомнить) html код
                          }
                        ////////////Работаем с img
                         if ($stroka['name_teg']=='img' && $stroka['name_attrib']=='источник ссылки')
                           {
                            //echo $stroka['name_teg'].'--'.$stroka['name_attrib'];
                            $strIstok=0;
                            $stolbIstok=0;
                            $rezult=preg_split("/-/",$stroka['text']);
                            $strIstok=(int)$rezult[0];
                            $stolbIstok=(int)$rezult[1];
                            $linkImg=$this->loadInfoData($nameTablic,$strIstok,$stolbIstok); //Получаем пользовательское значение из таблицы _data, если оно есть
                            $viv=$viv.' src="'.$linkImg.'"';
                            if (preg_match("/(http.+)/",$linkImg)) $viv=preg_replace("/(src)?.+(jpg)?/",' src="'.$linkImg.'"',$viv);
                           }
                         ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        } ////////////////////////////////////////////////// крнец while
                         ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         if ($nameTega[0]=='html') $viv='<div '.$viv.'>'.$kodHtml.'</div>';
                         
                        if (!$blockJest) // Есть смысл создавать строку с аттрибутами только если чекбокс или радио не заданы блоком
                         if ($nameTega[0]=='checkbox') // добавить текст на кнопке для тега checked и сформировать строку
                           $viv='<input type="checkbox" '.$viv.'><label for="'.$for.'">'.$textNaKnopke.'</label>';

                         if ($nameTega[0]=='button') // добавить текст на кнопке для тега button и сформировать строку
                           $viv='<button '.$viv.'>'.$textNaKnopke.'</button>';

                         if ($nameTega[0]=='textarea') // добавить текст на поле и сформировать строку
                           $viv='<textarea '.$viv.'>'.$textNaKnopke.'</textarea>';

                         if ($nameTega[0]=='img')    
                          $viv='<img '.$viv.'>';

                          //
                          if ($nameTega[0]=='p' || $nameTega[0]=='h1' || $nameTega[0]=='h2' || $nameTega[0]=='h3' || $nameTega[0]=='h4' || $nameTega[0]=='h5' || $nameTega[0]=='h6')    
                          {
                            // прочитать значение текста из пользовательской таблицы _data
                            if ($textPoUmolcaniu=="здесь фальш_аттрибута текста по умолчанию нет")
                              {
                                $strIstok=0;
                                $stolbIstok=0;
                                $rezult=preg_split("/-/",$textPh1h6);
                                $strIstok=(int)$rezult[0];
                                $stolbIstok=(int)$rezult[1];
                                $textPh1h6=mysqli_fetch_array(parent::zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$strIstok." AND stolb=".$stolbIstok." AND login='".$_SESSION['login']."'" ));
                                $viv='<'.$nameTega[0].' '.$viv.'>'.$textPh1h6[0].'</'.$nameTega[0].'>';
                              }

                              if ($textPoUmolcaniu!="здесь фальш_аттрибута текста по умолчанию нет") 
                                $viv='<'.$nameTega[0].' '.$viv.'>'.$textPoUmolcaniu.'</'.$nameTega[0].'>';
                          }

                         if ($nameTega[0]=='text')
                           $viv='<input type="text" '.$viv.'>';
                         
                           echo '<div class="col-'.$stolpBootstrap[$stolbi].' bootstrap_'.$stolbi.'_'.$nameTablic.'">';
                           echo $viv; 
                           echo '</div>';

                    } else {// конец if
                    echo '<div class="col-'.$stolpBootstrap[$stolbi].' bootstrap_'.$stolbi.'_'.$nameTablic.'">';
                    echo '</div>';}
              } // конец for stolb
              echo '<div class="row">';
              echo '<div class="col">';
              if ($razdelitBr>0) for ($i=1;$i<=$razdelitBr;$i++) echo '<br>';
              if ($razdelitHr>0) for ($i=1;$i<=$razdelitHr;$i++) echo '<hr class="Hr'.$nameTablic.'">';
              echo '</div>';
              echo '</div>';
            echo '</div>'; //закрыли тег класса row
          } // конец i
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////записываем//////////////////////////////////////////////////////
         echo '</form>';
        echo '</section>';
    }
         //привязка с помощью классов будет в том случае, если нет привязки с помощью фальш-тега "источник ссылки"
         //функция должна вывести ссылку на картинку, используя ключевое слово - второй тег класса. (класс связи - у картинки и у строки, содержащей ссылку должен быть одинаковый второй класс)
         //$classKontakt - вторая часть класса, общая для картинки и поля с ссылкой на картинку, если параметр будет пустым, то функция найдёт картинку по координатам и выделит класс
  public function searcUrlImage($nameTablic,$str,$stolb,$classKontakt)
         {
           /////////////////////////////////////////////работаем с фальш-тегом "источник ссылки"////////////////////////////////////
           // узнаем источник ссылки с помощью фальш тега, если он есть
           $z=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE name_attrib='источник ссылки' AND name_teg='img' AND str=".$str." AND stolb=".$stolb);
           $stroka=mysqli_fetch_array($z);
           $chars = preg_split('/(-)+?/',$stroka[0], -1);
           $strX=(int)$chars[0];
           $stolbX=(int)$chars[1];
           $z=parent::zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$strX." AND stolb=".$stolbX." AND  login='".$_SESSION['login']."'");
           if ($z) $stroka=mysqli_fetch_array($z);
           if (preg_match('/.+?\.(jpg|png|tiff|psd|bmp|gif|jp2)/i',$stroka[0], $matches, PREG_OFFSET_CAPTURE)==1) 
           return $stroka[0];
           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $str2=0;
            $stolb2=0;
            if ($classKontakt=='') // если маркировочный класс не задан в входящем параметре, то найдём его
            {
              $z=parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE name_attrib='class' AND name_teg='img' AND str=".$str." AND stolb=".$stolb);
              $stroka=mysqli_fetch_array($z);
              $pozSpace=strripos($stroka[0],' ');
              $classKontakt=mb_substr($stroka[0],$pozSpace);
            }

            $z=parent::zaprosSQL("SELECT str,stolb,text FROM ".$nameTablic."_tegi WHERE name_attrib='class' AND name_teg!='img'");
            while ($stroka=mysqli_fetch_assoc($z))
            {
              if (strpos($stroka['text'], $classKontakt)>0) {$str2=$stroka['str'];$stolb2=$stroka['stolb']; } // Если нашли вхождение, то запомнить координаты блока
              if ($str2>0) Break 1;
            }
            $z=parent::zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$str2." AND stolb=".$stolb2." AND login='".$_SESSION['login']."'");
            if (!$z) return false;
            $stroka=mysqli_fetch_array($z);
            return $stroka[0];
         }
    public function loadInfoData($nameTablic,$str,$stolb) //Вывести значение столбцы инфо из базы по строке и столбцу
         {
          $z=parent::zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$str." AND login='".$_SESSION['login']."' AND stolb=".$stolb);
          if (!$z) return false;
          $stroka=(mysqli_fetch_array($z));
          if (!$stroka) return false;
          return $stroka[0];
         }
       public function saveStrData($nameTablic,$str,$stolb,$info,$dopis) // Функция делает запись в таблицу Дата либо исправляет старую
         {
          $id=0;
          $jestNol=false;
           //проверим есть ли вспомогательная таблица _data если нет, то создадим её 
          if (!parent::searcNameTablic($nameTablic.'_data'))
          parent::zaprosSQL("CREATE TABLE ".$nameTablic."_data"."(id INT, str INT, stolb INT, info VARCHAR(6000), login VARCHAR(100))");
           
          //проверяем есть ли конкретная запись на нужном месте в таблице. Функция выводит максимальный ID для записей для конкретного места
           //Если режим одной записи, то есть не дописываем а заменяем запись
           $id=parent::searcIdPoUsloviu($nameTablic."_data",'str='.$str,'stolb='.$stolb,'login="'.$_SESSION['login'].'"','','');                                                     
           
           ///////Прочитать строку с найдеными ИД и логином. Полезно при ИД=0
           if ($id==0)
           {
            $login=$_SESSION['login'];
            $z=parent::zaprosSQL("SELECT * FROM ".$nameTablic."_data WHERE id=0 AND login='".$login."'");
            $stroka=(mysqli_fetch_assoc($z));
            if ($stroka['str']>0) $jestNol=true;
           }
            $idMax=parent::maxIdLubojTablicy($nameTablic.'_data'); // поиск максимального id по всей таблице
            if ($idMax<0) $idMax=0;
            ////////////////////////////////////////////////////////////////////////////////////////////
            if ((!$dopis && $id>0) || (!$dopis && $jestNol)) 
             {
              $zapros="DELETE FROM redakt_profil_data WHERE id=".$id." AND str=".$str." AND stolb=".$stolb." AND login='".$_SESSION['login']."'";
              parent::zaprosSQL($zapros);
             } 
           $zapros="INSERT INTO ".$nameTablic."_data(id, str, stolb, info, login) VALUES (".$idMax.",".$str.",".$stolb.",'".$info."','".$_SESSION['login']."')";
           parent::zaprosSQL($zapros);
         }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////
         public function saveProfil($nameTablic,$dopis)  // Функция обрабатывает нажатие кнопки Сохранить профиль // запись шаблона
         {
          $urovnejHablona=$this->cisloUrovnejHablon($nameTablic);
          $stolbovHablona=$this->cisloStolbovjHablon($nameTablic);
          for ($stri=1; $stri<$urovnejHablona+1; $stri++)  //Цикл просмотра строк
          {
            for ($stolbi=1; $stolbi<$stolbovHablona+1; $stolbi++) //Цикл просмотра ытолбцов
              {
                $nameTega[0]='';
                $nameTega=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$stolbi." FROM ".$nameTablic." WHERE id_tab_gl=".$stri));
                if ($nameTega[0]=='text' || $nameTega[0]=='textarea') 
                 {
                   $searcName=mysqli_fetch_array(parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri.' AND stolb='.$stolbi.' AND name_attrib=\'name\''));
                   if (isset($_POST[$searcName[0]]))
                    $this->saveStrData($nameTablic,$stri,$stolbi,$_POST[$searcName[0]],false);
                 }
                 if ($nameTega[0]=='radio' || $nameTega[0]=='checkbox') 
                 {
                   $searcName=mysqli_fetch_array(parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri.' AND stolb='.$stolbi.' AND name_attrib=\'id\''));
                    $this->saveStrData($nameTablic,$stri,$stolbi,$this->statusVStroku($searcName[0]),false);
                 }

              }
          }

         }
         // прикладная функция преобразовывает блок статусов в строку для БД
         // параметр $nameStatus - это общее имя чекбоксов, к которым прибавится номер порядковый
         // Работает с массивом POST
         public function statusVStroku($nameStatus)
         {
           $vihod='-';
           if (isset($_POST['N_'.$nameStatus.'_1'])) $vihod=$vihod.'s0';
           if (isset($_POST['N_'.$nameStatus.'_2'])) $vihod=$vihod.'s1';
           if (isset($_POST['N_'.$nameStatus.'_3'])) $vihod=$vihod.'s2';
           if (isset($_POST['N_'.$nameStatus.'_4'])) $vihod=$vihod.'s3';
           if (isset($_POST['N_'.$nameStatus.'_5'])) $vihod=$vihod.'s4';
           if (isset($_POST['N_'.$nameStatus.'_6'])) $vihod=$vihod.'s5';
           if (isset($_POST['N_'.$nameStatus.'_7'])) $vihod=$vihod.'s9';
           return $vihod;
         }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //делает строку с аттрибутами для конкретного тега
         public function strokaAttrbutov($nameTable,$teg,$str,$pole,$tegOpen,$tegClose)
             {
              $strokaRez="";
               $nadpisNaButton='';
               $attribDlaFor='';
               $zagolowok='';
               $stringSelect='';
               if ($teg=='form')
                { 
                  echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                  $strokaRez=$tegOpen.'form';
                }
               if ($teg=='text')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="text"';
                }
               if ($teg=='password')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="password"';
                }
               if ($teg=='button')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'button';
                }
               if ($teg=='input submit')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="submit"';
                }
               if ($teg=='input reset')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="reset"';
                }
               if ($teg=='img')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'img';
                }
               if ($teg=='textarea')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'textarea';
                }
               if ($teg=='radio')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
                 $strokaRez=$tegOpen.'input type="radio"';
                }
               if ($teg=='checkbox')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
                 $strokaRez=$tegOpen.'input type="checkbox"';
                }
                if ($teg=='заголовок')
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
               if ($teg=='select')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>
                         Для добавления пункта выбираем аттрибут "option", а в его значения вписываем имя_Валуе=имя_Пункта. Пример: name=Gena.<br>
                         Для удаления выбираем аттрибут "удалить option", в качестве значения указываем часть имени value, без первого символа.</p>';
                 $strokaRez=$tegOpen.'select';
                }
                if ($teg=='input')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input ';
                }
                if ($teg=='audio')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'audio ';
                }
                if ($teg=='embed')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'embed ';
                }
                if ($teg=='video')
                {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'video ';
                }
                if ($teg=='произвольный')
                 echo '<p class="mesage strokaAttribP">Если нужно вставить тег, то выбираем "вставить тег" и в правом поле записываем имя тега.<br>Если нужно вставить код, то выбираем соответствующий код и в правое поле вставляем его.</p>';
                if ($teg=='html')
                 {
                  echo '<p class="mesage strokaAttribP">Вписываем код html cо скобками тегов</p>';
                  $strokaRez=$tegOpen.'div ';
                 }      
                 if ($teg=='PHP')
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                 if ($teg=='javaScript')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='VBScript')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='JScript')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='Ruby')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='Python')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }     
                 if ($teg=='Tcl')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }  
                 if ($teg=='C++(bin)')
                 {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 } 
              $classDlaLabel='';
              $z=parent::zaprosSQL("SELECT * FROM ".$nameTable."_tegi WHERE name_teg='".$teg."' AND str=".$str." AND stolb=".$pole);
              while (!is_null($stroka=(mysqli_fetch_assoc($z))))
               {
                // Общая переменная определяющая что аттрибут не для тегов, а служебный. Служит для отделения аттрибутов от служебной информации
                $badAttrib=false; // по умолчанию любой атрибут считается аттрибутом
                // Список не аттрибутов
                if ($stroka['name_attrib']=="ширина столбцов bootstrap") $badAttrib=true;
                if (stripos ($stroka['name_attrib'],'екст')) $badAttrib=true;
                if ($stroka['name_attrib']=='блок') $badAttrib=true;
                if ($stroka['name_attrib']=='импорт из клетки ?-?') $badAttrib=true;
                if ($stroka['name_attrib']=='число строк')  $badAttrib=true;
                if ($stroka['name_attrib']=='очистить аттрибуты')  $badAttrib=true;
                if ($stroka['name_attrib']=="ввести код")  $badAttrib=true; //источник ссылки
                if ($stroka['name_attrib']=="источник ссылки")  $badAttrib=true; //источник ссылки
                if ($stroka['name_attrib']=="источник текста")  $badAttrib=true; //источник ссылки
                if ($stroka['name_attrib']=="разделение блоков с BR")  $badAttrib=true; //источник ссылки импорт ?-?
                if ($stroka['name_attrib']=="разделение блоков с HR")  $badAttrib=true; //источник ссылки
                 //работаем с тегом Select
               if ($teg=='select' && $stroka['name_attrib']=="option") 
                 {
                  $markerTut=strripos ($stroka['text'],'=', 0);
                  $valueName=mb_substr ($stroka['text'],0,$markerTut );
                  $valueZnacenie=mb_substr ($stroka['text'],$markerTut+1,strlen($stroka['text']));
                  $stringSelect=$stringSelect.'<br>'.$tegOpen.'option value="'.$valueName.'"'.$tegClose.$valueZnacenie.$tegOpen.'/option'.$tegClose;
                 }
                 ////////////////////////
                 if ($stroka['name_attrib']=="ввести код") $nadpisNaButton=$stroka['text']; //запоминаем что должно быть написано на кнопке button
                 if ($stroka['name_attrib']=="текст на кнопке") $nadpisNaButton=$stroka['text']; //запоминаем что должно быть написано на кнопке button
                
                 if ($stroka['name_attrib']!='число строк')
                 if ($stroka['name_attrib']=="for" && ($teg=='radio' || $teg=='checkbox')) $attribDlaFor=$stroka['text']; //запоминаем значение for для тега radio
                 if ($stroka['name_attrib']=="class для label" && ($teg=='radio' || $teg=='checkbox')) $classDlaLabel=$stroka['text']; //запоминаем значение for для тега radio
                 if ($teg=='заголовок' && ($stroka['name_attrib']=="h1" || $stroka['name_attrib']=="h2" || $stroka['name_attrib']=="h3" || $stroka['name_attrib']=="h4" || $stroka['name_attrib']=="h5" || $stroka['name_attrib']=="h6" || $stroka['name_attrib']=="p")) $zagolowok=$stroka['name_attrib'];
          
         if (!$badAttrib) 
               if ($teg!='select' || ($teg=='select' && $this->selectValue($stroka['name_attrib'])=="select" && $stroka['name_attrib']!='удалить option')) 
                if ($teg!='заголовок' || ($teg=='заголовок' && ($stroka['name_attrib']!="h1" && $stroka['name_attrib']!="h2" && $stroka['name_attrib']!="h3" && $stroka['name_attrib']!="h4" && $stroka['name_attrib']!="h5" && $stroka['name_attrib']!="h6" && $stroka['name_attrib']!="p"))) 
                 if ($stroka['text']=="" && $stroka['name_attrib']!="текст на кнопке") 
                  if ($stroka['name_attrib']!='for' || ($stroka['name_attrib']=='for' && $teg!='radio' && $teg!='checkbox'))
                  if ($stroka['name_attrib']!='class для label')
                  $strokaRez=$strokaRez.' '.$stroka['name_attrib'];
         
       if (!$badAttrib) 
               if ($teg!='select' || ($teg=='select' && $this->selectValue($stroka['name_attrib'])=="select" && $stroka['name_attrib']!='удалить option')) 
                if ($teg!='заголовок' || ($teg=='заголовок' && ($stroka['name_attrib']!="h1" && $stroka['name_attrib']!="h2" && $stroka['name_attrib']!="h3" && $stroka['name_attrib']!="h4" && $stroka['name_attrib']!="h5" && $stroka['name_attrib']!="h6" && $stroka['name_attrib']!="p"))) 
                 if ($stroka['string_ili_int']==0 && $stroka['text']!="" && $stroka['name_attrib']!="текст на кнопке")
                  if ($stroka['name_attrib']!='for' || ($stroka['name_attrib']=='for' && $teg!='radio' && $teg!='checkbox'))
                  if ($stroka['name_attrib']!='class для label') 
                  $strokaRez=$strokaRez.' '.$stroka['name_attrib'].'="'.$stroka['text'].'"';
                  
          if (!$badAttrib) 
               if ($teg!='select' || ($teg=='select' && $this->selectValue($stroka['name_attrib'])=="select" && $stroka['name_attrib']!='удалить option')) 
                if ($teg!='заголовок' || ($teg=='заголовок' && ($stroka['name_attrib']!="h1" && $stroka['name_attrib']!="h2" && $stroka['name_attrib']!="h3" && $stroka['name_attrib']!="h4" && $stroka['name_attrib']!="h5" && $stroka['name_attrib']!="h6" && $stroka['name_attrib']!="p"))) 
                 if ($stroka['string_ili_int']==1 && $stroka['text']!="" && $stroka['name_attrib']!="текст на кнопке")
                  if ($stroka['name_attrib']!='for' || ($stroka['name_attrib']=='for' && $teg!='radio' && $teg!='checkbox'))
                  if ($stroka['name_attrib']!='class для label') 
                  $strokaRez=$strokaRez.' '.$stroka['name_attrib'].'='.$stroka['text'];
               }
               if ($teg=='form' || $teg=='text' || $teg=='password' || $teg=='button' 
                    || $teg=='input submit' || $teg=='input reset' || $teg=='img' || $teg=='textarea'
                     || $teg=='radio' || $teg=='checkbox' || $teg=='заголовок' || $teg=='select' || $teg=='input'
                      || $teg=='audio' || $teg=='embed' || $teg=='video' || $teg=='video source' || $teg=='html'
                        || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Ruby' || $teg=='Python' || $teg=='Tcl' || $teg=='C++(bin)') $strokaRez=$strokaRez.$tegClose;

               if ($teg=='embed') $strokaRez=$strokaRez.$nadpisNaButton.$tegOpen.'/embed'.$tegClose;
               if ($teg=='video') $strokaRez=$strokaRez.$nadpisNaButton.$tegOpen.'/video'.$tegClose;
               if ($teg=='button') $strokaRez=$strokaRez.$nadpisNaButton.$tegOpen.'/button'.$tegClose;
               if ($teg=='audio') $strokaRez=$strokaRez.$nadpisNaButton.$tegOpen.'/audio'.$tegClose;
               if ($teg=='textarea') $strokaRez=$strokaRez.$nadpisNaButton.$tegOpen.'/textarea'.$tegClose;
               if ($teg=='заголовок') $strokaRez=$tegOpen.$zagolowok.' '.$strokaRez.$nadpisNaButton.$tegOpen.'/'.$zagolowok.$tegClose;
               
               if ($teg=='radio' || $teg=='checkbox') 
                                                     { // Проверяем сколько есть в таблице строк и дублируем
                                                       $strokaRez=$strokaRez.'<br>'.$tegOpen.'label ';
                                                       if ($classDlaLabel!='') $strokaRez=$strokaRez.'class="'.$classDlaLabel.'" ';
                                                       $strokaRez=$strokaRez.'for="'.$attribDlaFor.'"'.$tegClose.$nadpisNaButton.$tegOpen.'/label'.$tegClose;
                                                       
                                                       $strokaTime=$strokaRez; 
                                                       $strokaHablon=$strokaRez;
                                                       $j=$this->nomerChecboxRadio($nameTable,$str,$pole);
                                                       if ($j>1) 
                                                       {
                                                        $strokaRez='';
                                                       for ($i=1; $i<=$j; $i++)
                                                        {
                                                          // работаем с id
                                                          $idNew=$this->nameAttibuta($nameTable,$str,$pole,'id');
                                                          $idNew='id="'.$idNew.'_'.$i.'"';
                                                          $strokaTime=preg_replace("%id=\"\S+\"%",$idNew,$strokaTime);
                                                          // работаем с for
                                                          $idNew=$this->nameAttibuta($nameTable,$str,$pole,'for');
                                                          $idNew='for="'.$idNew.'_'.$i.'"';
                                                          $forRestor=$idNew; // используется ниже для восстановления тега for
                                                          $strokaTime=preg_replace("%for=\"\S+\"%",$idNew,$strokaTime);                                                          
                                                         // работаем с name
                                                          $idNew=$this->nameAttibuta($nameTable,$str,$pole,'name');
                                                          $idNew='name="'.$idNew.'_'.$i.'"';
                                                          $strokaTime=preg_replace("%name=\"\S+\"%",$idNew,$strokaTime);
                                                         // работаем с value
                                                         $idNew=$this->nameAttibuta($nameTable,$str,$pole,'value');
                                                         $idNew='value="'.$idNew.'_'.$i.'"';
                                                         $strokaTime=preg_replace("%value=\"\S+\"%",$idNew,$strokaTime);

                                                         // работаем с со строками
                                                         $texttext='Текст '.$i;
                                                         $idNew=$this->nameAttibuta($nameTable,$str,$pole,$texttext);
                                                         if ($idNew)
                                                         {
                                                         $idNew=$forRestor.$tegClose.$idNew.$tegOpen;
                                                         $poisk="%(for)\S+".$tegClose."\S+".$tegOpen."%";
                                                         $poisk2="%(for)\S+".$tegClose."\s+".$tegOpen."%";
                                                         $poisk3="%(for)\S+".$tegClose.$tegOpen."%";
                                                         $strokaTime=preg_replace($poisk,$idNew,$strokaTime);
                                                         $strokaTime=preg_replace($poisk2,$idNew,$strokaTime);
                                                         $strokaTime=preg_replace($poisk3,$idNew,$strokaTime);
                                                         }
                                                         $strokaRez=$strokaRez.$strokaTime.'<br>';$strokaTime=$strokaHablon;
                                                        }
                                                        }
                                                        $_SESSION['text_checkbox_'.$str.'_'.$pole]=$strokaRez;
                                                     }
               if ($teg=='select') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/select'.$tegClose;
               if ($teg=='video source') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/video'.$tegClose;
               if ($teg=='html') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='javaScript') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='VBScript') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='JScript') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='Ruby') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='Python') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='Tcl') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
               if ($teg=='C++(bin)') $strokaRez=$strokaRez.$nadpisNaButton.$stringSelect.'<br>'.$tegOpen.'/div'.$tegClose;
              
               return $strokaRez;
             }
        // добыть значение аттрибута для размножения checkbox radio
        public function nameAttibuta($nameTable,$str,$poz,$attrib)
        {
          $z=parent::zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='".$attrib."'");
          if (!$z) return false;
          $stroka=mysqli_fetch_array($z);
          if (!$stroka) return false;
          return $stroka[0];
        }
        // определить число строк в checkbox radio
        public function nomerChecboxRadio($nameTable,$str,$poz)
        {
          $z=parent::zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='число строк'");
          if (!$z) return 0;
          $stroka=mysqli_fetch_array($z);
          if (!$stroka) return 0;
          return $stroka[0];
        }
        // Запись статусов для разрешения
        public function saveStatusRazreshenia($nameTable,$nameButton)
        {
          //////////////////////////алгоритм - какая кнопка Сохранить была нажата
          //очистим лишнее из строки - это savePola
          $cistajaStroka=mb_substr($nameButton,8);
          //находим первое число - столбец или поле
          $pole=(int)stristr($cistajaStroka,"_", true);
          //находим второе число - строка
          $strS=stristr($cistajaStroka,"_", false);
          $str=(int)mb_substr($strS,1);
          //Создали строку статусов
          $j=$pole; $i=$str;
          if (isset($_POST['status0'.$j.'_'.$i])) $pole0='s0'; else $pole0=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status1'.$j.'_'.$i])) $pole1='s1'; else $pole1=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status2'.$j.'_'.$i])) $pole2='s2'; else $pole2=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status3'.$j.'_'.$i])) $pole3='s3'; else $pole3=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status4'.$j.'_'.$i])) $pole4='s4'; else $pole4=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status5'.$j.'_'.$i])) $pole5='s5'; else $pole5=''; // если первая галочка была установлена, то передаем s0
          if (isset($_POST['status9'.$j.'_'.$i])) $pole9='s9'; else $pole9=''; // если первая галочка была установлена, то передаем s0
          $status='-'.$pole0.$pole1.$pole2.$pole3.$pole4.$pole5.$pole9;
          //////////////// проверяем есть ли уже запись в таблице статусов и если есть, то удаляем работа со статусами на шаблоне
           parent::zaprosSQL("DELETE FROM `".$nameTable."_status` WHERE stolb=".$pole." AND str=".$str);
           parent::zaprosSQL("INSERT INTO ".$nameTable."_status(stolb, str, status) VALUES (".$pole.", ".$str.", '".$status."')");
           ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            
        }

        //записываем аттрибут тега
        public function saveAttribTega($nameTable,$teg,$attrib,$nameButton,$text,$striliint)
        {
          if ($attrib=="----------") return false;
          //глобальные переменные функции
          $stringIliInt=0;
          $z=true;
          if ($striliint=="int") $stringIliInt=1; 
                                                  
          //////////////////////////алгоритм - какая кнопка Сохранить была нажата
          //очистим лишнее из строки - это savePola
          $cistajaStroka=mb_substr($nameButton,8);
          //находим первое число - столбец или поле
          $pole=(int)stristr($cistajaStroka,"_", true);
          //находим второе число - строка
          $strS=stristr($cistajaStroka,"_", false);
          $str=(int)mb_substr($strS,1);
                
          // проверяем есть ли уже запись и если есть, то удаляем
          if ($attrib!='задать тег' &&  $attrib!='удалить' &&  $attrib!='option' &&  $attrib!='сохранить блок') 
            $z=parent::zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."' AND name_attrib='".$attrib."'");
         ////////////////////////////////////////////////
          if ($z!=false && $attrib!='задать тег' &&  $attrib!='удалить' &&  $attrib!='option' &&  $attrib!='ввести код') 
            parent::zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."' AND name_attrib='".$attrib."'");
         ///////////////////////////////////////////////
         
         //Ищем в аттрибуте слово "текст" для работы с надписями на чекбоксах
         if (preg_match('/(текст)/', $attrib, $matches, PREG_OFFSET_CAPTURE)==1) 
         {
         $poiskText=$matches[0];
         if ($poiskText[0]=='text')
          {
           parent::zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_attrib='".$attrib."'");
           $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$teg."','".$attrib."','".$strokaTime."')";
           parent::zaprosSQL($stroka);  
           return true;
          }
         }

         if ($attrib=='сохранить блок' && isset($_SESSION['text_checkbox_'.$str.'_'.$pole]))
         {
           $strokaTime=preg_replace('%\&lt%','<',$_SESSION['text_checkbox_'.$str.'_'.$pole]);
           $strokaTime=preg_replace('%\&gt%','>',$strokaTime);
           $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$teg."','блок','".$strokaTime."')";
           parent::zaprosSQL($stroka);  
           return true;
         }
         //очистить аттрибуты
         if ($attrib=='очистить аттрибуты')
         {
          parent::zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str);
         }
         // импорт аттрибутов
         if ($attrib=='импорт из клетки ?-?')
         {
           $pozicii=preg_split("/-/",$text);  // находим позицию - источник импорта
           $strP=(int)$pozicii[0];                 // находим позицию - источник импорта
           $stolpP=(int)$pozicii[1];               // находим позицию - источник импорта
           $strokaImport=parent::zaprosSQL("SELECT * FROM ".$nameTable."_tegi WHERE stolb=".$stolpP." AND str=".$strP);
           
           while (!is_null($zCopy=mysqli_fetch_assoc($strokaImport)))
           {
                  $strokaTime=preg_replace('%(Str)[0-9]+?%','Str'.$str,$zCopy['text']);
                  $strokaTime2=preg_replace('%(Stolb)[0-9]+?%','Stolb'.$pole,$strokaTime);
                  $zCopy['text']=$strokaTime2;
                  $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$zCopy['name_teg']."','".$zCopy['name_attrib']."','".$zCopy['text']."')";
                  parent::zaprosSQL($stroka);
                  //parent::printTab ($stroka,1);
            }
         }
         if ($attrib=='удалить блок' && isset($_SESSION['text_checkbox_'.$str.'_'.$pole]))
         {
           parent::zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_attrib='блок'");
           return true;
         }
         ////////////////////////////////////////////////////
         if ($teg=='произвольный' && $attrib=='задать тег' || $teg=='заголовок' && $attrib=='задать тег') 
          {
          $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;// WHERE 1
          parent::zaprosSQL($stroka);   
          return true;
          }

        // вставить html код
     if (($teg=='html' || $teg=='PHP' || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Ruby' || $teg=='Python' || $teg=='Tcl' || $teg=='C++(bin)') && $attrib=='ввести код') 
        {
         $stroka=mysqli_fetch_array($z);
         if ($text!="-")
           $kodVpis=$stroka[0].$text; 
          else $kodVpis='';
         $z=mysqli_fetch_array(parent::zaprosSQL("SELECT name_attrib FROM ".$nameTable."_tegi WHERE name_attrib='ввести код' AND stolb=".$pole." AND str=".$str));
          if ($z[0]!='ввести код') parent::zaprosSQL("INSERT INTO ".$nameTable."_tegi(stolb, str,name_teg,name_attrib, text,  string_ili_int) VALUES (".$pole.", ".$str.", '".$teg."', 'ввести код', '".$kodVpis."', 0)");
           else {
                  $stroka="UPDATE ".$nameTable."_tegi SET text='".$kodVpis."' WHERE stolb=".$pole." AND str=".$str." AND name_attrib='ввести код'";
                  parent::zaprosSQL($stroka);
                }
      }
        // вставить html код
         if ($attrib=='вставить HTML код') 
           {
            $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
            if ($z[0]=="html") return true;

             $stroka="UPDATE ".$nameTable." SET poz".$pole."='html' WHERE id_tab_gl=".$str;
             parent::zaprosSQL($stroka);
             if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                {
                  $_SESSION['obnovit']=false;
                  $_SESSION['pokazNULL']=false;
                  echo '<script>location.reload();</script>';
                }
         }
          // вставить php код
           if ($attrib=='вставить PHP код') 
             {
              $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
              if ($z[0]=="PHP") return true;
                 $stroka="UPDATE ".$nameTable." SET poz".$pole."='PHP' WHERE id_tab_gl=".$str;
                 parent::zaprosSQL($stroka);
                  if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                    {
                      $_SESSION['obnovit']=false;
                      $_SESSION['pokazNULL']=false;
                      echo '<script>location.reload();</script>';
                    }
             }
          // вставить javaScript код
          if ($attrib=='вставить javaScript код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="javaScript") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='javaScript' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }
          // вставить VBScript код
          if ($attrib=='вставить VBScript код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="VBScript") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='VBScript' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }
          // вставить JScript код
          if ($attrib=='вставить JScript код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="JScript") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='JScript' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }
          // вставить Ruby код
          if ($attrib=='вставить Ruby код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="Ruby") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='Ruby' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }      
          // вставить Python код
          if ($attrib=='вставить Python код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="Python") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='Python' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }     
          
          // вставить Tcl код
          if ($attrib=='вставить Tcl код') 
          {
           $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
           if ($z[0]=="Tcl") return true;
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='Tcl' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
               if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                 {
                   $_SESSION['obnovit']=false;
                   $_SESSION['pokazNULL']=false;
                   echo '<script>location.reload();</script>';
                 }
          }  
           // вставить C++(bin) код
           if ($attrib=='вставить C++(bin) код') 
           {
            $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
            if ($z[0]=="C++(bin)") return true;
               $stroka="UPDATE ".$nameTable." SET poz".$pole."='C++(bin)' WHERE id_tab_gl=".$str;
               parent::zaprosSQL($stroka);
                if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
                  {
                    $_SESSION['obnovit']=false;
                    $_SESSION['pokazNULL']=false;
                    echo '<script>location.reload();</script>';
                  }
           }           

         if ($teg=='select' && $attrib=="удалить option") 
            {
              $zz="SELECT * FROM ".$nameTable."_tegi WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."'";
              $rezz=parent::zaprosSQL($zz);
              while (!is_null($stroka1=(mysqli_fetch_array($rezz))))
               {
                if (strripos($stroka1['text'], $text ,0))
                parent::zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND text='".$stroka1['text']."'");
               }  
            }
            /////////////////////////////
          if ($text!="-" && $attrib!='задать тег' &&  $attrib!='удалить' && $attrib!='удалить option' && $attrib!='вставить HTML код' && $attrib!='ввести код')
            {
            $z=parent::zaprosSQL("INSERT INTO ".$nameTable."_tegi (`stolb`, `str`, `name_teg`, `name_attrib`, `text`, `string_ili_int`) VALUES (".$pole.",".$str.",'".$teg."','".$attrib."','".$text."' ,".$stringIliInt.")");
            return true;
            }
          //////////////////////////////////////////////

          if ($attrib=='задать тег' && $text!="" && $z['id_tab_gl']==$str && $attrib!='удалить option') 
           {
           $z=mysqli_fetch_assoc(parent::zaprosSQL("SELECT * FROM ".$nameTable." WHERE poz".$pole."='произвольный'"));
           if ($z["poz".$pole]=='произвольный')
            {
             $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
             parent::zaprosSQL($stroka);
             if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
             {
              $_SESSION['obnovit']=false;
             echo '<script>location.reload();</script>';
             return true;
             }
            }
           }
          //////////////////////////////////////
          if ($attrib=='задать тег' && $text!="" && $z['id_tab_gl']==$str) 
           {
            $z=mysqli_fetch_assoc(parent::zaprosSQL("SELECT * FROM ".$nameTable." WHERE poz".$pole."='NULL'"));
             if ($z["poz".$pole]=='NULL' || $z["poz".$pole]=='произвольный')
             {
             $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
             parent::zaprosSQL($stroka);
             if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
             {
              $_SESSION['obnovit']=false;
              $_SESSION['pokazNULL']=false;
             echo '<script>location.reload();</script>';
             }
            }
           }
         //////////////////////////////////////
          if ($attrib=='задать тег' && $text!="") 
          {
            // для блокировки циклических обновлений проверяем отработала ли функция, если да, то обновление страницы произошло
            $z=mysqli_fetch_array(parent::zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
            // выполняем задачу по смене значения NULL на нужный тег
            $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
            parent::zaprosSQL($stroka);
            //-----------------------------------------------------
            if ($z[0]=='NULL')
            echo '<script>location.reload();</script>';
          }
           /////////////////
           if ($attrib=='удалить' && $attrib!='удалить option') 
            {
              $stroka="UPDATE ".$nameTable." SET poz".$pole."='NULL' WHERE id_tab_gl=".$str;
              parent::zaprosSQL($stroka);
              if (isset($_SESSION['obnovit']) && $_SESSION['obnovit'])
              {
               $_SESSION['obnovit']=false;
               $_SESSION['pokazNULL']=false;
              echo '<script>location.reload();</script>';
              }
            }
          } 

        //определяет к какому тегу относится аттрибут
        public function selectValue($attrib)
        {
          if ($attrib=='accesskey' || $attrib=='autofocus' || $attrib=='form' 
           || $attrib=='multiple' || $attrib=='name' || $attrib=='required' || $attrib=='size' || $attrib=='tabindex') return 'select';
           if ($attrib=='disabled' || $attrib=='label' || $attrib=='selected' || $attrib=='value') return 'option';
           return 'value';
        }
        public function poiskButtonName() // поиск названия кнопки, которая была нажата
        {
          $i=1;$j=1;
          if (isset($_SESSION['nameTablice']))
          {
          $this->strok=parent::kolVoZapisTablice($_SESSION['nameTablice']);
           $this->stolb=parent::kolVoStolbovTablice($_SESSION['nameTablice']);
          }
          if (isset($_SESSION['clickButtonGlawnPole']) && $_SESSION['clickButtonGlawnPole'])
          { 
            for ($i=1; $i<=$this->strok; $i++) //перебираем столбцы начиная с первого.
            {
             for ($j=1; $j<$this->stolb; $j++)  // перебираем строки с первойkolVoZapisTablice
              {
                if (isset($_POST['savePola'.$j."_".$i])) return $j."_".$i;
              }
            }
          }
          $j=0;
          $i=0;
          return $j."_".$i;
        }
        public function nomerStrokRadio($nameSelect,$nameTablic)
        {
          // Ищем местоположение текущего блока
          $z=preg_match('/(_)/', $nameSelect, $matches, PREG_OFFSET_CAPTURE);  // находим разделительное подчёркивание, там есть начало и конец нужных данных
          if (!$z) return '';
          $poz_=$matches[0];
          $str=(int) substr($nameSelect, $poz_[1]+1);
          $poz=(int) substr($nameSelect, 15,$poz_[1]-14);
          $zz=mysqli_fetch_array(parent::zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='число строк'"));
          $vivod='';
          for ($i=1; $i<=$zz[0]; $i++) $vivod=$vivod.'<option>Текст '.$i.'</option>';
          
          return $vivod;
        }
        public function attribTega($nameSelect,$teg,$nameTablic)
        {
          
          echo '<select name="'.$nameSelect.'" class="poleRedaktGlawnTablTegSelect">';
          echo '<optgroup label="Основные атрибуты">';
          echo '<option>----------</option>';
          echo '<option>удалить</option>';
          if ($teg=='html'  || $teg=='PHP' || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Ruby' || $teg=='Python' || $teg=='Tcl' || $teg=='C++(bin)')
          {
            echo '<option>ввести код</option>';
          }
          
          if ($teg=='произвольный' || $teg=='NULL')
          {
            echo '<option>вставить HTML код</option>';
            echo '<option>вставить PHP код</option>';
            echo '<option>вставить javaScript код</option>';
            echo '<option>вставить VBScript код</option>';
            echo '<option>вставить JScript код</option>';
            echo '<option>вставить Ruby код</option>';
            echo '<option>вставить Python код</option>';
            echo '<option>вставить Tcl код</option>';
            echo '<option>вставить C++(bin) код</option>';
            echo '<option>задать тег</option>';
          }
         
          if ($teg=='заголовок')
        {
          echo '<option>h1</option>';
          echo '<option>h2</option>';
          echo '<option>h3</option>';
          echo '<option>h4</option>';
          echo '<option>h5</option>';
          echo '<option>h6</option>';
          echo '<option>p</option>';
        }

        if ($teg=='select')
        {
        echo '<option>удалить option</option>';
        echo '<option>option</option>';
        }

        if ($teg=='img')
        {
        echo '<option>источник ссылки</option>';
        }
        if ($teg=='p' || $teg=='h1' || $teg=='h2' || $teg=='h3' || $teg=='h4' || $teg=='h5' || $teg=='h6')
        {
        echo '<option>текст по умолчанию</option>';
        echo '<option>источник текста</option>';
        }
        if ($teg=='form')
        {
        echo '<option>ширина столбцов bootstrap</option>';
        echo '<option>разделение блоков с BR</option>';
        echo '<option>разделение блоков с HR</option>';
        }

        if ($teg=='video source')
        {
        echo '<option>удалить source</option>';
        echo '<option>source</option>';
        }

        if ($teg=='radio' || $teg=='checkbox')
        {
         echo '<option>сохранить блок</option>';
         echo '<option>удалить блок</option>';
         echo '<option>импорт из клетки ?-?</option>';
         echo '<option>class для label</option>';
         echo $this->nomerStrokRadio($nameSelect,$nameTablic);
        }
        echo '<option>очистить аттрибуты</option>';
        if ($teg=='radio' || $teg=='checkbox')
        echo '<option>число строк</option>';
        if ($teg=='button' || $teg=='textarea' || ($teg=='radio' && $this->nomerStrokRadio($nameSelect,$nameTablic)=='') || ($teg=='checkbox' && $this->nomerStrokRadio($nameSelect,$nameTablic)=='') || $teg=='заголовок')
          echo '<option>текст на кнопке</option>';
        if ($teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>accept</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input' || $teg=='select')
          echo '<option>accesskey</option>';
        if ($teg=='button'  || $teg=='img' || $teg=='input' || $teg=='embed' || $teg=='html'  || $teg=='PHP' || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Ruby' || $teg=='Python' || $teg=='Tcl' || $teg=='C++(bin)')
          echo '<option>align</option>';
        if ($teg=='button'  || $teg=='img' || $teg=='input')
          echo '<option>alt</option>';
        if ($teg=='text' || $teg=='password' || $teg=='textarea' || $teg=='input')
          echo '<option>autocomplete</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='textarea' || $teg=='select' || $teg=='input')
          echo '<option>autofocus</option>';
        if ($teg=='form' || $teg=='password' || $teg=='button' || $teg=='input')
          echo '<option>accept-charset</option>';
        if ($teg=='textarea' || $teg=='input' || $teg=='form')
          echo '<option>action</option>';
        if ($teg=='form' || $teg=='input')
          echo '<option>autocapitalize</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>autocorrect</option>';
        if ($teg=='audio' || $teg=='audio source' || $teg=='video' || $teg=='video source')
          echo '<option>autoplay</option>';
        if ($teg=='img' || $teg=='input')
          echo '<option>border</option>';
        if ($teg=='radio' || $teg=='checkbox' || $teg=='input')
          echo '<option>checked</option>';
        if ($teg=='img')
          echo '<option>crossorigin</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>cols</option>';
        if ($teg=='audio' || $teg=='audio source' || $teg=='video' || $teg=='video source')
          echo '<option>controls</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='textarea' || $teg=='select' || $teg=='input')
          echo '<option>disabled</option>';
        if ($teg=='img')
          echo '<option>decoding</option>';
        if ($teg=='form' || $teg=='input')
          echo '<option>enctype</option>';
        if ($teg=='radio' || $teg=='checkbox')
          echo '<option>for</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='textarea' || $teg=='select' || $teg=='input')
          echo '<option>form</option>';
        if ($teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>formaction</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>formenctype</option>';
        if ($teg=='button' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>formmethod</option>';
        if ($teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>formnovalidate</option>';
        if ($teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>formtarget</option>';
        if ($teg=='img' || $teg=='embed' || $teg=='video' || $teg=='video source')
          echo '<option>height</option>';
        if ($teg=='img' || $teg=='embed')
          echo '<option>hspace</option>';
        if ($teg=='embed')
          echo '<option>hidden</option>';
        if ($teg=='img')
          echo '<option>importance</option>';
        if ($teg=='img')
          echo '<option>intrinsicsize</option>';
        if ($teg=='img')
          echo '<option>ismap</option>';
        if ($teg=='input')
          echo '<option>list</option>';
        if ($teg=='audio' || $teg=='audio source' || $teg=='video' || $teg=='video source')
          echo '<option>loop</option>';
        if ($teg=='select')
          echo '<option>optgroup label</option>';
        if ($teg=='select')
          echo '<option>label</option>';
        if ($teg=='img')
          echo '<option>longdesc</option>';
        if ($teg=='input')
          echo '<option>max</option>';
        if ($teg=='text' || $teg=='password' || $teg=='textarea' || $teg=='input')
          echo '<option>maxlength</option>';
        if ($teg=='input')
          echo '<option>min</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>minlength</option>';
        if ($teg=='select')
          echo '<option>multiple</option>';
        if ($teg=='video source')
          echo '<option>media</option>';
        if ($teg=='form' || $teg=='input')
          echo '<option>method</option>';
        if ($teg=='form' || $teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='img' || $teg=='textarea' || $teg=='radio' || $teg=='checkbox' || $teg=='select' || $teg=='input')
          echo '<option>name</option>';
        if ($teg=='form' || $teg=='input')
          echo '<option>novalidate</option>';
        if ($teg=='embed')
          echo '<option>pluginspage</option>';
        if ($teg=='audio'  || $teg=='audio source' || $teg=='video' || $teg=='video source')
          echo '<option>preload</option>';
        if ($teg=='text' || $teg=='password' || $teg=='input')
          echo '<option>pattern</option>';
        if ($teg=='text' || $teg=='password' || $teg=='textarea' || $teg=='input')
          echo '<option>placeholder</option>';
        if ($teg=='text' || $teg=='password' || $teg=='textarea' || $teg=='input') //
          echo '<option>readonly</option>';
        if ($teg=='video' || $teg=='video source')
          echo '<option>poster</option>';
        if ($teg=='img')
          echo '<option>referrerpolicy</option>';
        if ($teg=='text' || $teg=='password' || $teg=='textarea' || $teg=='select' || $teg=='input')
          echo '<option>required</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>rows</option>';
        if ($teg=='text' || $teg=='password' || $teg=='select' || $teg=='input')
          echo '<option>size</option>';
        if ($teg=='img' || $teg=='video source')
          echo '<option>sizes</option>';
        if ($teg=='select')
          echo '<option>selected</option>';
        if ($teg=='button' || $teg=='img' || $teg=='input' || $teg=='audio' || $teg=='audio source' || $teg=='embed' || $teg=='video' || $teg=='video source')
          echo '<option>src</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>spellcheck</option>';
        if ($teg=='input')
          echo '<option>step</option>';
        if ($teg=='video source')
          echo '<option>srcset</option>';
        if ($teg=='text' || $teg=='password' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input') 
          echo '<option>tabindex</option>';
        if ($teg=='form' || $teg=='input submit' || $teg=='input reset' || $teg=='input')
          echo '<option>target</option>';
        if ($teg=='form' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='input' || $teg=='audio source' || $teg=='embed' || $teg=='video source')
          echo '<option>type</option>';
          if ($teg=='html'  || $teg=='PHP' || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Ruby' || $teg=='Python' || $teg=='Tcl' || $teg=='C++(bin)')
          echo '<option>title</option>';
        if ($teg=='text' || $teg=='button' || $teg=='input submit' || $teg=='input reset' || $teg=='radio' || $teg=='checkbox' || $teg=='input' || $teg=='select')
          echo '<option>value</option>';
        if ($teg=='img' || $teg=='embed')
          echo '<option>vspace</option>';
        if ($teg=='img' || $teg=='embed' || $teg=='video' || $teg=='video source')
          echo '<option>width</option>';
        if ($teg=='textarea' || $teg=='input')
          echo '<option>wrap</option>';
        if ($teg=='img')
          echo '<option>usemap</option>';
          echo '</optgroup></select>';
        }
        public function attribUniwersalnye($nameSelect)
        {

          echo '<select name="'.$nameSelect.'" class="poleRedaktGlawnTablTegSelect">';
          echo '<optgroup label="Универсальные атрибуты">';
          echo '<option>----------</option>';
          echo '<option>accesskey</option>';
          echo '<option>autocapitalize</option>';
          echo '<option>class</option>';
          echo '<option>contenteditable</option>';
          echo '<option>contextmenu</option>';
          echo '<option>data-</option>';
          echo '<option>dir</option>';
          echo '<option>draggable</option>';
          echo '<option>enterkeyhint</option>';
          echo '<option>exportparts</option>';
          echo '<option>hidden</option>';
          echo '<option>id</option>';
          echo '<option>inputmode</option>';
          echo '<option>is</option>';
          echo '<option>itemid</option>';
          echo '<option>itemprop</option>';
          echo '<option>itemref</option>';
          echo '<option>itemscope</option>';
          echo '<option>itemtype</option>';
          echo '<option>lang</option>';
          echo '<option>nonce</option>';
          echo '<option>part</option>';
          echo '<option>slot</option>';
          echo '<option>spellcheck</option>';//
          echo '<option>style</option>';
          echo '<option>tabindex</option>';
          echo '<option>title</option>';
          echo '<option>translate</option>';
          echo '<option>xml:lang</option>';
          echo '</optgroup></select>';
        }
        public function sobytia($nameSelect)
        {
          echo '<select name="'.$nameSelect.'" class="poleRedaktGlawnTablTegSelect">';
          
          echo '<optgroup label="События">';
          echo '<option>----------</option>';
          echo '<option>onblur</option>';
          echo '<option>onchange</option>';
          echo '<option>onclick</option>';
          echo '<option>ondblclick</option>';
          echo '<option>onfocus</option>';
          echo '<option>onkeydown</option>';
          echo '<option>onkeypress</option>';
          echo '<option>onkeyup</option>';
          echo '<option>onload</option>';
          echo '<option>onmousedown</option>';
          echo '<option>onmousemove</option>';
          echo '<option>onmouseout</option>';
          echo '<option>onmouseover</option>';
          echo '<option>onmouseup</option>';
          echo '<option>onreset</option>';
          echo '<option>onselect</option>';
          echo '<option>onsubmit</option>';
          echo '<option>onunload</option>';
          echo '</optgroup></select>';
        }
        //возвращает значение аттрибуда
        public function poiskSwoistvaTega($nameTable,$teg,$attrib,$str,$pole)
        {
          $z=parent::zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE name_teg='".$teg."' AND str=".$str." AND stolb=".$pole." AND name_attrib='".$attrib."'");
          $stroka=mysqli_fetch_assoc($z);
          return $stroka['text'];
        }
      

        public function createFormTablicyMenu($nameTablic,$kol_voStrokVvod)
        {
          // Проверка будет меню 3,4 или меню 5  ////////////////////////////
          $zapros="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".parent::initBdNameBD()."' AND TABLE_NAME = '".$nameTablic."' AND COLUMN_NAME = 'STATUS'";
          $typeMenu=34;
          $rez=parent::zaprosSQL($zapros);
          $stroka=mysqli_fetch_assoc($rez);
          if (!is_null($stroka))
          if ($stroka['ORDINAL_POSITION']>4) $typeMenu="5";
          //////////////////////////////////////////////////////////////////////
            $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
            $rez=parent::zaprosSQL($zapros);
            $kol_voZapisej=parent::kolVoZapisTablice($nameTablic);        // Проверяем фактическое число записей в таблице
            $zapros="SELECT kol_voKn FROM tablica_tablic WHERE NAME='".$nameTablic."'";  // Проверяем данные о числе записей в таблице таблиц
            $kol_voZapisejTablicaTablic=mysqli_fetch_assoc(parent::zaprosSQL($zapros));
            if (!isset($kol_voZapisejTablicaTablic['kol_voKn'])) $kol_voZapisejTablicaTablic['kol_voKn']=0;
            $kol_voStrok=$kol_voZapisejTablicaTablic['kol_voKn'];
            //Находим максимальное значение из трёх источников: из таблицы таблиц, из введенного и из фактического
            if ($kol_voStrokVvod>=$kol_voZapisej) $maxKnopok=$kol_voStrokVvod; else $maxKnopok=$kol_voZapisej;
            if ($maxKnopok>$kol_voStrok)
            {
                $kol_voStrok=$maxKnopok;
                $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$kol_voStrok." WHERE NAME='".$nameTablic."'";
                parent::zaprosSQL($zapros);
            }
            //parent::printMas($kol_voZapisejTablicaTablic['kol_voKn']);
            if ($kol_voZapisej>$kol_voZapisejTablicaTablic['kol_voKn'])
              {
                $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$kol_voStrok." WHERE NAME='".$nameTablic."'";
                parent::zaprosSQL($zapros);
              } else $kol_voZapisej=$kol_voZapisejTablicaTablic['kol_voKn'];
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-9">';
            echo'<form active="redaktor.php" method="POST">';
            $dinamikClass=$this->kakovClass($nameTablic);
            $id=0;
            $name="";
            $url="";
            $class="";
            $status="";
            for ($i=0; $i<$kol_voStrok; $i++)
            {
                if (!is_null($kol_voZapisej) && $kol_voZapisej>$i)
                 {
                  $stroka=mysqli_fetch_assoc($rez);
                  $id=$stroka['ID'];
                  $name=preg_quote($stroka['NAME']);
                  $url=$stroka['URL'];
                  $class=$stroka['CLASS'];
                  if ($typeMenu==5) $status=$stroka['STATUS'];
                 } else {
                          $id=$i;
                          $name="";
                          $url="";
                          $status="";
                          if ($dinamikClass) {$class=$nameTablic.(string)$i;} else {$class=$nameTablic;}
                        }
                 echo ' ID<input type="text" size=3 name="ID'.$i.'" value="'.$id.'">';
                 echo ' NAME<input type="text" size=10 name="NAME'.$i.'" value="'.$name.'">';
                 echo ' URL<input type="text" size=10 name="URL'.$i.'" value="'.$url.'">';
                 echo ' CLASS<input type="text" size=10 name="CLASS'.$i.'" value="'.$class.'">';
                 if ($typeMenu>4) echo ' STATUS<input type="text" size=10 name="STATUS'.$i.'" value="'.$status.'">';
                 echo '<br>';
            }
            echo '<input type="submit" name="saveTabeMenu" value="Сохранить">';
            echo '<input type="submit" name="saveTabeMenu" value="Выйти">';
            echo'</form>';
            echo'</div>';
            echo '<div class="col-3">'; // здесь помощь по соответствующей менюшке
            echo'</div>';
            echo'</div>';
            echo'</div>';
            $this->infoMenu($nameTablic);
        }

        public function infoMenu($nameTablic)
        {
           $typeMenu=parent::typMenu($nameTablic);
           if ($typeMenu==1 || $typeMenu==3 || $typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
            {
              echo '<section class="container">';
              echo '<dl class="row help_menu_row">';
              ////////////////////////////////////////////////////////////////
              if ($typeMenu==1) { // если menu
              echo '<dt class="col-3 text-truncate">Имя функции (PHP)</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">Функция menu("'.$nameTablic.'")</dd>';
              }

              if ($typeMenu==3) { // если menu3
                echo '<dt class="col-3 text-truncate">Имя функции (PHP)</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">Функция __unserialize(array(menu3,'.$nameTablic.',kn4,kn1,kn2,kn1,kn4))</dd>';
                }

              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu5
                  echo '<dt class="col-3 text-truncate">Имя функции (PHP)</dt>';
                  echo '<dd class="col-9 text-truncate style-infoMenu">Функция __unserialize(array(menu'.$typeMenu.','.$nameTablic.',ссылка на страницу обработчика,имя текстового поля ввода,имя текстового поля ввода...,)) или<br>menu'.$typeMenu.'('.$nameTablic.',ссылка на страницу обработчика)</dd>';
              }
             ////////////////////////////////////////////////////////////////
              echo '<dt class="col-3 text-truncate">Выводимые объекты</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              if ($typeMenu==1  || $typeMenu==3 || $typeMenu==4 || $typeMenu==5)
              echo '<p>Кнопка Button</p>';
              if ($typeMenu==6  || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
              echo '<p>Кнопка input type=submit</p>';
              if ($typeMenu==6  || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
              echo '<p>Возможна передача ссылки через переменную $_SESSION</p>';
              if ($typeMenu==6  || $typeMenu==7 || $typeMenu==8 || $typeMenu==4 || $typeMenu==5 || $typeMenu==9)
              echo '<p>Текстовое поле text</p>';
              if ($typeMenu==6  || $typeMenu==7 || $typeMenu==8 || $typeMenu==4 || $typeMenu==5 || $typeMenu==9)
              echo '<p>Перевод строки тегом BR</p>';
              if ($typeMenu==8 || $typeMenu==9)
              echo '<p>Текстовое поле textarea</p>';
              if ($typeMenu==9)
              echo '<p>Для кнопок добавлен параметр default - переход на главную страницу создаваемого сайта</p>';
              if ($typeMenu==9)
              echo '<p>Абзац тег P</p>';
              if ($typeMenu==9)
              echo '<p>Заголовки h1-h6</p>';
              if ($typeMenu==9)
              echo '<p>Тег div (для вставки html разметки)</p>';
              if ($typeMenu==9)
              echo '<p>Тег img</p>';
              if ($typeMenu==9)
              echo '<p>Тег hr - горизонтальная полоса</p>';
              if ($typeMenu==9)
              echo '<p>Текст в контейнере Bootstrap (col1)(1 столбец - вся ширина)</p>';
              if ($typeMenu==9)
              echo '<p>Текст в контейнере Bootstrap (col2)(2 столбеца - вся ширина в разных комбинациях)</p>';
              if ($typeMenu==9)
              echo '<p>Текст в контейнере Bootstrap (col3)(3 столбеца - вся ширина в разных комбинациях)</p>';
              echo '</dd>';
             ////////////////////////////////////////////////////////////////
              echo '<dt class="col-3 text-truncate">Использовать как навигационное меню(PHP)</dt>';
              if ($typeMenu==1 || $typeMenu==3 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
              echo '<dd class="col-9 text-truncate style-infoMenu">Можно</dd>';
              if ($typeMenu==4 || $typeMenu==5)
              echo '<dd class="col-9 text-truncate style-infoMenu">Не использовать</dd>';
             ////////////////////////////////////////////////////////////////
             if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // text2
              echo '<dt class="col-3 text-truncate">Аттрибут PLACEHOLDER или VALUE</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu"><p>Если в поле ссылки "text", то в поле ввода текст по умолчанию выводится с помощью value</p>';
              echo '<p>Если в поле ссылки "text2", то в поле ввода текст по умолчанию выводится с помощью PLACEHOLDER</p>';
              echo '<p>Если в поле ссылки "textP", то будет поле ввода пароля, со звёздочками и аттрибутом VALUE</p>';
              echo '<p>Если в поле ссылки "textP2" или "text2P", то будет поле ввода пароля, со звёздочками и аттрибутом PLACEHOLDER</p></p>';
              echo '<p>в случае с аттрибутом PLACEHOLDER стиль можно задать псевдоэлементом ::placeholder{}, как в примере.</p>';
              echo '<p>Если стиль не задать, то поля с аттрибутом PLACEHOLDER будут пустыми.</p>';
              echo '<p>на пример:<br> input::placeholder{<br>стили, которые заработают в том случае, когда будет задействован в теге input аттрибут placeholder<br>}<br></p></dd>';
            }

              if ($typeMenu==1) { // если menu
              echo '<dt class="col-3 text-truncate">Свободное использование(PHP)</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">Используется свободно</dd>';
              }

              if ($typeMenu==1 || $typeMenu==3 || $typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu
                echo '<dt class="col-3 text-truncate">Ссылка на главную страницу(PHP)</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">Работает. Если ссылка в таблице равна "default".</dd>';
                }
              if ($typeMenu==3) { // если menu3
                echo '<dt class="col-3 text-truncate">Свободное использование(PHP)</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">Используется только с магическим методом</dd>';
              }

              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu4
                echo '<dt class="col-3 text-truncate">Свободное использование(PHP)</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">Используется как с магическим методом, так и без него</dd>';
              }
              ////////////////////////////////////////////////////////////////
              if ($typeMenu==1) { // если menu 1
                  echo '<dt class="col-3 text-truncate">Принцип работы</dt>';
                  echo '<dd class="col-9 text-truncate style-infoMenu">Меню выводит все кнопки подряд, согласно расположению в базе данных.</dd>';
                }

              
              if ($typeMenu==3) { // если menu 3
                echo '<dt class="col-3 text-truncate">Принцип работы</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">Меню выводит кнопки, запрашивая их по именам. Список имен задается массивом с помощью магического метода. Если кнопка не найдена, она <br>будет пустой, если кнопку не нужно выводить, её имя просто не должно появляться в массиве.</dd>';
              }

              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu 4
                echo '<dt class="col-3 text-truncate">Принцип работы</dt>';
                if ($typeMenu==7 || $typeMenu==8 || $typeMenu==9)
                echo '<dd class="col-9 text-truncate style-infoMenu">Меню выводит кнопки согласно их ID.</dd>';
                if ($typeMenu==4 || $typeMenu==5)
                echo '<dd class="col-9 text-truncate style-infoMenu">Меню выводит кнопки, поля текстового ввода или переводы &ltbr&gt подряд. <br> Меню нельзя использовать как ссылочное, потому, что обработчик задается один раз в параметре функции,<br>из таблицы ссылки игнорируются.<br></dd>';
                if ($typeMenu==6)
                echo '<dd class="col-9 text-truncate style-infoMenu">Меню выводит кнопки, поля текстового ввода или переводы &ltbr&gt подряд. <br> Меню можно использовать как ссылочное.<br></dd>';

              }                      
              //////////////////////////////////////////////////////////////////////////////////////////
              if ($typeMenu==3 || $typeMenu==1) { // если menu 3
              echo '<dt class="col-3">Правила заполнения таблицы</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>Первый столбец заполняется автоматически.</p>';
              echo '<p>Второй столбец - это имя кнопки. Данное имя кнопки будет передаваться в переменную $_POST как значение VALUE=...</p>';
              echo '<p>Третий столбец - определяет страницу обработчика - ссылка.</p>';
              echo '<p>Четвертый столбец - это класс стилизации кнопки, может быть общим или персональным. К имени сласса необходимо <br>добавить приставку button</p>';
              echo '</dd>';
              }

              if ($typeMenu==4  || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu 4 или 5
                echo '<dt class="col-3">Правила заполнения таблицы</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">';
              if ($typeMenu==4  || $typeMenu==5 || $typeMenu==6)
                echo '<p>Первый столбец заполняется автоматически.</p>';
              if ($typeMenu==8 || $typeMenu==7 || $typeMenu==9)
                echo '<p>Первый столбец заполняется автоматически, однако, можно менять ID кнопок для изменения последовательности их вывода.</p>';
                echo '<p>Второй столбец - это имя кнопки. Данное имя кнопки будет передаваться в переменную $_POST как значение VALUE=...</p>';
                echo '<p>Третий столбец - задает тип объекта - это будет кнопка, текстовое поле либо просто перевод строки.</p>';
              if ($typeMenu==1  || $typeMenu==3 || $typeMenu==4 || $typeMenu==5) 
                echo '<p>Ссылка как адрес обработчика здесь игнорируется. Адрес обработчика задается в параметре функции.</p>';
                echo '<p>Если в третьем столбце будет ссылка, то меню поставит кнопку, которая отправит данные формы по ссылке, ';
              if ($typeMenu==1  || $typeMenu==3 || $typeMenu==4 || $typeMenu==5)
                echo '<br>указанной в параметре функции.</p>';
              if ($typeMenu==6  || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
                echo '<br>указанной в поле URL. Однако перед этим функция проверит нет ли переменной сессии с таким именем и если есть,<br>то ссылка будет взята из этой переменной.<br>Другими словами, если необходимо кнопке передать ссылку через переменную сессии $_SESSION[link]<br>';
                echo 'то в качестве ссылки записываем имя этой переменной, URL=link.</p>';
                echo '<p>Если в третьем столбце будет слово "reset", то меню поставит кнопку типа RESET.</p>';
                echo '<p>Если в третьем столбце будет слово text, а имя кнопки будет отличаться от слова br, то меню поставит текстовое <br>поле для ввода информации.</p>';
                echo '<p>Данную возможность следует использовать с магическим методом, и в массиве магического метода перечислить надписи <br>внутри текстовых полей.</p>';
                echo '<p>Если в третьем столбце будет слово text, а в столбце имени слово br, то меню установит тег BR и переведёт строку вниз.</p>';
                if ($typeMenu==9)
                {
                echo '<p>Если в третьем столбце будет слово "hr", то меню поставит горизонтальную линию.</p>';
                echo '<p>Если в третьем столбце будет слово "col1", то меню выведет текст, написанный в поле URL на всю ширину страницы <br>в контейнере Bootstrap на 1 столбец.<br><b><i>NAME=col1 --- URL=Текст на всю ширину страницы</i></b></p>';
                echo '<p>Если в третьем столбце будет слово "col2", то меню выведет текст, написанный в поле URL на всю ширину страницы <br>в двух одинаковых контейнерах Bootstrap на 2 равных столбеца. Выводимый текст должен быть разделен знаком "&" на два столбца.<br><b><i>NAME=col2 --- URL=Текст первого столбца&Текст второго столбца.</i></b></p>';
                echo '<p>Если в третьем столбце будет слово "col2_4/8" или комбинация, то меню выведет текст, написанный в поле URL на <br>всю ширину страницы в контейнере Bootstrap на 2 столбеца, соответственно шириной 4 и 8. Выводимый текст должен быть разделен <br>знаком "&" на два столбца.<br><b><i>NAME=col2_7/5 --- URL=Текст первого столбца&Текст второго столбца.</i></b></p>';
                echo '<p>Если в третьем столбце будет слово "col3", то меню выведет текст, написанный в поле URL на всю ширину страницы <br>в трех одинаковых контейнерах Bootstrap на 3 равных столбеца. Выводимый текст должен быть разделен знаком "&" на три столбца.<br><b><i>NAME=col3 --- URL=Текст первого столбца&Текст второго столбца&Текст третьего столбца.</i></b></p>';
                echo '<p>Если в третьем столбце будет слово "col3_3/6" или комбинация, то меню выведет текст, написанный в поле URL на <br>всю ширину страницы в контейнере Bootstrap на 3 столбеца, соответственно шириной 3 и 6 и 3 (сумма должна быть равна 12, <br>третий столбец равен остатку от первых двух столбцов). Выводимый текст должен быть разделен знаком "&" на три столбца.<br><b><i>NAME=col3_3/5 --- URL=Текст первого столбца&Текст второго столбца&Текст третьего столбца.</i></b></p>';
                }
                echo '<p>Четвертый столбец - это класс стилизации кнопки, может быть общим или персональным. К имени сласса необходимо <br>добавить приставку ... смотреть ниже</p>';
                if ($typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) {
                  echo '<p>Пятый столбец определяет видимость кнопки для определенных статусов:</p>';
                  echo '<p>-первый символ игнорируется (ставим прочерк или минус или любой другой символ)</p>';
                  echo '<p>-второй и последующие символы, в произвольном порядке определяют видимость кнопки для статуса</p>';
                }
                echo '</dd>';
                }
              
                if ($typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu 5
                  echo '<dt class="col-3 text-truncate">Статусы</dt>';
                  echo '<dd class="col-9 text-truncate style-infoMenu">';
                  echo '<p>Всего существует 7 статусов: 0,1,2,3,4,5,9</p>';
                  echo '<p>0-Гость</p>';
                  echo '<p>1-Зарегистрированный пользователь</p>';
                  echo '<p>2-Редактор</p>';
                  echo '<p>3-Подписчик</p>';
                  echo '<p>4-Модератор (имеет доступ к таблицам в базе данных сайта)</p>';
                  echo '<p>5-Администратор (имеет доступ ко всем таблицам в базе данных)</p>';
                  echo '<p>9-Зарегистрированный, но не подтвердивший регистрацию пользователь</p>';
                  echo '</dd>';
                }  

              if ($typeMenu==3 || $typeMenu==1) { // если menu 3br
              echo '<dt class="col-3">Работа со стилями</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>В таблице указан стиль для конкретной кнопки.</p>';
              echo '<p>Общий стиль для тега section - название таблицы: class='.$nameTablic.'.</p>';
              echo '<p>Класс для всей формы - это class="form_'.$nameTablic.'."</p>';
              echo '<p>Класс для кнопок формы - это class="button_[CLASS]"</p>';
              echo '</dd>';
              }

              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu 4 или 5
                echo '<dt class="col-3">Работа со стилями</dt>';
                echo '<dd class="col-9 text-truncate style-infoMenu">';
                echo '<p>В таблице указан стиль для конкретной кнопки.</p>';
                echo '<p>Общий стиль для тега section - название таблицы: class='.$nameTablic.'.</p>';
                echo '<p>Класс для всей формы - это class="form_'.$nameTablic.'."</p>';
                echo '<p>Класс для кнопок формы - это class="button_[CLASS]"</p>';
                if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9)
                echo '<p>Класс для текстового поля - это class="text_[CLASS]."</p>';
                if ($typeMenu==8 || $typeMenu==9)
                echo '<p>Класс для текстового поля textarea- это class="textarea_[CLASS]."</p>';
                if ($typeMenu==9)
                echo '<p>Класс для p,h1,h2,h3,h4,h5,h6,div - это class="тег_[CLASS]."</p>';
                echo '<p>Класс для картинки в контейнере div - это class="imgDiv_[CLASS] и img_[CLASS]."</p>';
                echo '<p>Дополнительный класс для контейнеров col1, col2, col3 col1_[CLASS], col2_[CLASS], col3_[CLASS]."</p>';
                echo '</dd>';
                }
                                

              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) { // если menu 
                  echo '<dt class="col-3">Работа без магического метода</dt>';
                  echo '<dd class="col-9 text-truncate style-infoMenu">';
                  echo '<p>menu'.$typeMenu.'('.$nameTablic.',ссылка на обработчик)</p>';
                  echo '<p>Первый параметр задает имя таблицы с настройками меню.</p>';
                  if ($typeMenu==4 || $typeMenu==5) 
                  echo '<p>Второй параметр определяет ссылку на страницу обработчика.</p>';
                  if ($typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) 
                  echo '<p>Второй параметр игнорируется, остался в наследство для лучшей совместимости функций.</p>';
                  echo '</dd>';

                  echo '<dt class="col-3">Работа с магическим методом</dt>';
                  echo '<dd class="col-9 text-truncate style-infoMenu">';
                  echo '<p>__unserialize(array(menu'.$typeMenu.','.$nameTablic.',ссылка на обработчик,текст в первом текстовом поле,...));</p>';
                  echo '<p>Первый параметр задает название меню.</p>';
                  echo '<p>Второй параметр задает имя таблицы меню.</p>';
                  if ($typeMenu==4 || $typeMenu==5) 
                  echo '<p>Следующим параметром является массив, в нем только первое значение обязательно.</p>';
                  if ($typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) 
                  echo '<p>Следующим параметром является массив, в нем первое значение ИГНОРИРУЕТСЯ.</p>';
                  if ($typeMenu==4 || $typeMenu==5) 
                  echo '<p>Первый параметр массива задает ссылку на страницу обработчика.</p>';
                  if ($typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) 
                  echo '<p>Первый параметр массива игнорируется, остался в наследство для лучшей совместимости.</p>';
                  echo '<p>Второй и последующие параметры задают надпись внутри текстового поля, если оно есть в меню. value=....</p>';
                  echo '</dd>';
                  }

              if ($typeMenu==3 || $typeMenu==1) { // если menu 3
              echo '<dt class="col-3">Применение в коде (PHP)</dt>'; 
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p><code> __unserialize(array('.$nameTablic.',имя кнопки 1,имя кнопки 2)) </code></p>';
              echo '<p>Меню выводит кнопки запрашивая их по именам, начиная с первого параметра в массиве.</p>';
              echo '</dd>';
              }

              echo '<dt class="col-3">Упрощенный код меню</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p><code>1. &lt section class="'.$nameTablic.'" &gt</code></p>';
              echo '<p><code>2.  &lt form class="form_'.$nameTablic.' action="[URL]" method="POST" &gt</code></p>';
              if ($typeMenu==4 || $typeMenu==5 || $typeMenu==1 || $typeMenu==3) 
              echo '<p><code>3.  &lt button class="button_'.$nameTablic.' type="submit" name="'.$nameTablic.'" value="[NAME]&gt [NAME]  &lt/button &gt </code></p>';
              if ($typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) 
              echo '<p><code>3.  &lt input class="button_'.$nameTablic.' type="submit" name="'.$nameTablic.'" value="[NAME] formaction=[URL]&gt</code></p>';
              echo '<p><code>4. &lt/form &gt</code></p>';
              echo '<p><code>5. &lt /section &gt</code></p>';
              echo '<p>В квадратных скобках данные из соответствующего столбца таблицы.</p>';
              echo '</dd>';

              echo '<dt class="col-3">Перехват управления в коде</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>Пример</p>';
              echo '<p><code>if (isset($_POST['.$nameTablic.']) && $_POST['.$nameTablic.']==[поле NAME]) </code></p>';
              echo '<code> {</code><br>';
              if ($typeMenu==4) echo '<code> $_POST[имя(NAME) текстового поля] (получение данных из текстового поля)</code><br>';
              echo '<code>код подпрограммы</code><br>';
              echo '<code> }</code><br>';
              echo '<p>где поле NAME - это имя нужной, для перехвата, кнопки</p>';
              echo '</dd>';
              echo '</dl>';
              echo'</section>';
            }
          if ($typeMenu==2)
            {
              echo '<section class="container">';
              echo '<dl class="row help_menu_row">';

              echo '<dt class="col-3 text-truncate">Имя функции (PHP)</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">Функция menu2("'.$nameTablic.',Kod")</dd>';
              echo '<dt class="col-3 text-truncate">Ссылка на главную страницу(PHP)</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">Работает. Если ссылка в таблице равна "default".</dd>';
              echo '<dt class="col-3 text-truncate">Выводимые объекты</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>Кнопка Button</p>';
              echo '</dd>';

              echo '<dt class="col-3 text-truncate">Параметр Kod(PHP)</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu"><p>Данный параметр задает разрешения на отображение кнопок.</p>';
              echo '<p>Получить данное значение весьма просто. Отсчёт кнопок начинается с нуля, даже если ID иной.</p>';
              echo '<p>Самая верхняя кнопка в таблице имеет позицию ноль и вес в десятичной системе 1.</p>';
              echo '<p>Вторая кнопка в таблице имеет позицию один и вес в десятичной системе 2.</p>';
              echo '<p>Третья кнопка в таблице имеет позицию два и вес в десятичной системе 4.</p>';
              echo '<p>То есть имеем дело с десятичным представлением некоего двоичного числа,</p>';
              echo '<p>которое отображает схему отображения кнопок.</p>';
              echo '<p>На примере - это выглядит так:</p>';
              echo '<p>Допустим в меню есть четыре кнопки. Для того, чтобы их включить необходимо, чтобы каждой из четырех</p>';
              echo '<p>кнопок соответствовала своя единица, то есть получаем двойчное число 1111, или десятичное 15.</p>';
              echo '<p>Если необходимо включить нулевую и третью кнопку, то имеем двоичное число 0101, или десятичное 5.</p>';
              echo '<p>Таким образом параметр Kod задает десятичное представление двоичного числа, которое задает конфигурацию отображения кнопок.</p>';
              echo '</dd>';
              echo '<dt class="col-3">Правила заполнения таблицы</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>Первый столбец заполняется автоматически.</p>';
              echo '<p>Второй столбец - это имя кнопки. Данное имя кнопки будет передаваться в переменную $_POST как значение VALUE=...</p>';
              echo '<p>Третий столбец - это ссылка на страницу, которая обрабатывает нажатие конкретной кнопки.</p>';
              echo '<p>Четвертый столбец - это класс стилизации кнопки, может быть общим или персональным. К имени сласса необходимо добавить приставку button</p>';
              echo '</dd>';
                           ////////////////////////////////////////////////////////////////
                           echo '<dt class="col-3 text-truncate">Использовать как навигационное меню(PHP)</dt>';
                           echo '<dd class="col-9 text-truncate style-infoMenu">Можно</dd>';
                          ////////////////////////////////////////////////////////////////
              echo '<dt class="col-3">Работа со стилями</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>В таблице указан стиль для конкретной кнопки.</p>';
              echo '<p>Общий стиль для тега section - название таблицы: class='.$nameTablic.'.</p>';
              echo '<p>Класс для всей формы - это class="form_'.$nameTablic.'."</p>';
              echo '<p>Класс для кнопок формы - это class="button_'.$nameTablic.'."</p>';
              echo '</dd>';

              echo '<dt class="col-3">Упрощенный код меню</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p><code>1. &lt section class="'.$nameTablic.'" &gt</code></p>';
              echo '<p><code>2.  &lt form class="form_'.$nameTablic.' action="[URL]" method="POST" &gt</code></p>';
              echo '<p><code>3.  &lt button class="button_'.$nameTablic.' type="submit" name="'.$nameTablic.'" value="[NAME]&gt [NAME]  &lt/button &gt </code></p>';
              echo '<p><code>4. &lt/form &gt</code></p>';
              echo '<p><code>5. &lt /section &gt</code></p>';
              echo '<p>В квадратных скобках данные из соответствующего столбца таблицы.</p>';
              echo '</dd>';

              echo '<dt class="col-3">Перехват управления в коде</dt>';
              echo '<dd class="col-9 text-truncate style-infoMenu">';
              echo '<p>Пример</p>';
              echo '<p><code>if (isset($_POST['.$nameTablic.']) && $_POST['.$nameTablic.']==[поле NAME]) </code></p>';
              echo '<code> {</code><br>';
              echo '<code>код подпрограммы</code><br>';
              echo '<code> }</code><br>';
              echo '<p>где поле NAME - это имя нужной, для перехвата, кнопки</p>';
              echo '</dd>';

              echo '</dl>';
              echo'</section>';
            } 

        }
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
        public function saveFormTablicyMenu($nameTablic)
        {
                    // Проверка будет меню 3,4 или меню 5  ////////////////////////////
                    $zapros="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".parent::initBdNameBD()."' AND TABLE_NAME = '".$nameTablic."' AND COLUMN_NAME = 'STATUS'";
                    $typeMenu=34;
                    $rez=parent::zaprosSQL($zapros);
                    $stroka=mysqli_fetch_assoc($rez);
                    if (!is_null($stroka))
                    if ($stroka['ORDINAL_POSITION']==5) $typeMenu="5";
                    //////////////////////////////////////////////////////////////////////
            parent::clearTab($nameTablic);
            $i=0;
            $id="ID".$i;
            $name="NAME".$i;
            $url="URL".$i;
            $class="CLASS".$i;
            $status="STATUS".$i;
            while (isset($_POST[$id]))
             {
                if ($_POST[$name]!="") {
                  if ($typeMenu==34)
                    $zapros="INSERT INTO ".$nameTablic."(`ID`, `NAME`, `URL`, `CLASS`) VALUES (".$_POST[$id].",'".$_POST[$name]."','".$_POST[$url]."','".$_POST[$class]."')";
                    if ($typeMenu==5) 
                    $zapros="INSERT INTO ".$nameTablic."(`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES (".$_POST[$id].",'".$_POST[$name]."','".$_POST[$url]."','".$_POST[$class]."','".$_POST[$status]."')";

                    $rez=parent::zaprosSQL($zapros);
                }
                $i++;
                $id="ID".$i;
                $name="NAME".$i;
                $url="URL".$i;
                $class="CLASS".$i;
                $status="STATUS".$i;
             }
           $zapisej=parent::kolVoZapisTablice($nameTablic);  // проверяем сколько удалось записать строк для менюшки и обновляем число записей в таблице таблиц
           $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$zapisej." WHERE NAME='".$nameTablic."'";
           parent::zaprosSQL($zapros);
        }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class menu extends initBD
 {
     public function __construct()
     {
        parent::__construct();
        $this->zapuskMenuMagiceski=false;
         $this->kn[0]=false;
         $this->kn[1]=false;
         $this->kn[2]=false;
         $this->kn[3]=false;
         $this->kn[4]=false;
         $this->kn[5]=false;
         $this->kn[6]=false;
         $this->kn[7]=false;
         $this->kn[8]=false;
         $this->kn[9]=false;
         $this->kn[10]=false;
         $this->kn[11]=false;
         $this->kn[12]=false;
         $this->kn[13]=false;
         $this->kn[14]=false;
         $this->kn[15]=false;
         $this->con = mysqli_connect($this->initBdHost(),$this->initBdLogin(),$this->initBdParol(),$this->initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд
     
         if (!parent::searcNameTablic('type_menu_po_imeni'))   // Проверяем есть ли таблица с названия-типами меню
         {
           $zapros="CREATE TABLE type_menu_po_imeni(
                                                     name_menu    VARCHAR (100),
                                                     type_menu    INT 
                                                   )  ";
           parent::zaprosSQL($zapros);
         } 
     
        }
     public function __destruct()
     {
        mysqli_close($this->con);
     }
     // Служебные функции
     // Функция возвращает имя кнопки из таблицы менюшки по ID
     public function getNamepoId($tab,$id) 
     {
        $zapros="SELECT NAME FROM ".$tab." WHERE ID=".$id;
        $rez=parent::zaprosSQL($zapros);
        $stroka=mysqli_fetch_array($rez);
        return $stroka['NAME'];
     }
     public function typMenu($nameTablic) // Функция возвращает тип менюшки с заданным именем
     {
      $zapros="SELECT type_menu FROM type_menu_po_imeni WHERE name_menu='".$nameTablic."'";
      $rez=parent::zaprosSQL($zapros);
      if ($rez) $stroka=mysqli_fetch_array($rez); else return 0;
      if ($stroka[0]>0) return $stroka[0]; else return 0;
     }
     public function saveTypMenu($nameTablic,$typ) // Функция исправляет или изменяет тип уже существующей менюшки
     {
      $zapros="UPDATE type_menu_po_imeni SET `type_menu`=".$typ." WHERE name_menu='".$nameTablic."'";
      $rez=parent::zaprosSQL($zapros);
      return $rez;
     }
     public function createTypMenu($nameTablic,$typ) // Функция создает запись о новой менюшке
     {
      $zapros="INSERT INTO type_menu_po_imeni(`name_menu`, `type_menu`) VALUES ('".$nameTablic."',".$typ.")";
      $rez=parent::zaprosSQL($zapros);
      return $rez;
     }
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu($nameTablic) // Это меню типа 1
     {

             // Регистрируем либо изменяем тип меню
             if ($this->typMenu($nameTablic)!=1)
             {
              if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
               {
                 parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                 $this->saveTypMenu($nameTablic,1); 
               }
              if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,1);
             }
            //////////////////////////////////////
        
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $i=0;
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {
          if ($stroka['URL']!='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
          if ($stroka['URL']=='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.parent::initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
            $i++;
        }
        echo'</section>';
     }
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // Добавлена возможность управлять выводом кнопок с помощью двоичного кода. $kod=1(1) - будет выведена первая кнопка,
     // $kod=2(10) - будет выведена вторая кнопка, $kod=3(11) - будет выведена первая и вторая кнопка.
     // Максимальное значение $kod=32768(1111111111111111) - 2 байта или 16 единиц.
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu2($nameTablic,$kod)
     {
             // Регистрируем либо изменяем тип меню
             if ($this->typMenu($nameTablic)!=2)
             {
              if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
               {
                 parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                 $this->saveTypMenu($nameTablic,2); 
               }
              if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,2);
             }
            //////////////////////////////////////
            if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
       if ($kod>=32768) $this->kn[15]=true; else $this->kn[15]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[14]=true; else $this->kn[14]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[13]=true; else $this->kn[13]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[12]=true; else $this->kn[12]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[11]=true; else $this->kn[11]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[10]=true; else $this->kn[10]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[9]=true; else $this->kn[9]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[8]=true; else $this->kn[8]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[7]=true; else $this->kn[7]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[6]=true; else $this->kn[6]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[5]=true; else $this->kn[5]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[4]=true; else $this->kn[4]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[3]=true; else $this->kn[3]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[2]=true; else $this->kn[2]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[1]=true; else $this->kn[1]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[0]=true; else $this->kn[0]=false;
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        $i=0;
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {
            if ($this->kn[$i])
            if ($stroka['URL']!='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
            
            if ($this->kn[$i])
            if ($stroka['URL']=='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.parent::initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
            $i++;
        }
        echo'</section>';
     }

     // Запускаем через магический метод __unserialize(nameTablic,array('Редактор','Аматор'));
     // первый параметр - это имя таблицы, второй - это массив названий кнопок. Массив безразмерный, пишем то название кнопок, которое отображается на сайте.
     // простая функция, выводит из базы меню все кнопки согласно очереди в массиве
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // Внимание!! Название кнопки при вызове магическим методом должно совпадать с названием кнопки в базе данных
     // параметр ссылки default отправляет пользователя на главную страницу сайта
    public function menu3($nameTablic)
     {
             // Регистрируем либо изменяем тип меню
             if ($this->typMenu($nameTablic)!=3) {
              if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic))  {
                 parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                 $this->saveTypMenu($nameTablic,3); }
              if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,3);}
            //////////////////////////////////////
        echo'<section class="'.$nameTablic.'">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        foreach ($this->masKn as $value)
         {
            $zapros="SELECT * FROM ".$nameTablic." WHERE NAME='".$value."'";
            $rez=parent::zaprosSQL($zapros);
            $stroka=mysqli_fetch_array($rez);
            if ($stroka['URL']!='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
            if ($stroka['URL']=='default')
            echo '<form class="form_'.$stroka['CLASS'].'" action="'.parent::initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
          }
        unset($value);
        echo'</section>';
     }

     //public function __unserialize($nameMenu,$nameTablic,array $data):void
     // переделал параметры входящие функции, по какой-то причине функция стала принимать только массив на входе, после перехода на php8
     public function __unserialize(array $data):void
     {
      $nameMenu=$data[0];
      $nameTablic=$data[1];
      //echo $nameMenu.'--'.$nameTablic.'--'.$data[2];
        $this->zapuskMenuMagiceski=true;
    if ($nameMenu=='menu3')
        {
         $i=0;
         foreach ($data as $value)
          {
            if ($i>1) // блокируем проверку первых двух элементов массива, которые содержат в себе значения переменных $nameMenu и $nameTablic
            $this->masKn[$i-2] = $value;
            $i++;
          }
          //unset($value);
         $this->menu3($nameTablic);
        }
    if ($nameMenu=='menu4' || $nameMenu=='menu5' || $nameMenu=='menu6' || $nameMenu=='menu7' || $nameMenu=='menu8' || $nameMenu=='menu9')
        {
         $i=0;
         foreach ($data as $value)
          {
            if ($i>1) // блокируем проверку первых двух элементов массива, которые содержат в себе значения переменных $nameMenu и $nameTablic
            $this->masKn[$i-2] = $value;
            //echo '<br>'.$i.'--'.$value;
            $i++;
          }
          //unset($value);
          //echo $this->masKn[0];
          if ($nameMenu=='menu4')
            $this->menu4($nameTablic,$this->masKn[0]);
          if ($nameMenu=='menu5')
            $this->menu5($nameTablic,$this->masKn[0]);
          if ($nameMenu=='menu6')
            $this->menu6($nameTablic,$this->masKn[0]);
          if ($nameMenu=='menu7')
            $this->menu7($nameTablic,$this->masKn[0]);
          if ($nameMenu=='menu8')
            $this->menu8($nameTablic,$this->masKn[0]);
          if ($nameMenu=='menu9')
            $this->menu9($nameTablic,$this->masKn[0]);
        }
        $this->zapuskMenuMagiceski=false;
     }

     // Внимание!!! Меню как ссылочное не использовать!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     //При запуске через Магический метод:
     //parent::__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu4($nameTablic,$url)
     {
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=4) {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,4); }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,4);   }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        if (!$rez) echo'Не удалось загрузить таблицу для menu4';
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $i=0;
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {
            if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && $stroka['URL']!='default')
              echo '<button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            if ($stroka['URL']=='reset')
              echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
           
          if ($stroka['URL']=='text')
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='text2')
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='textP')
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='text2P' || $stroka['URL']=='textP2')
                 if ($stroka['NAME']!='br')
                       {
                         $textStart="";
                          if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                          echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                          $ii++;
                       } else echo '<br>';           


            if ($stroka['URL']=='default')
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
            $i++;
        }
        echo '</form>';
        echo'</section>';
     }
     // Внимание!!! Меню как ссылочное не использовать!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     //При запуске через Магический метод:
     //parent::__unserialize('menu5','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой мисвол, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu5($nameTablic,$url)
     {
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=5)
                    {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
                      {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,5); 
                      }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,5);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $i=0;
        $status=(string)$_SESSION['status'];
        
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {
            if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
            if ($stroka['URL']!='text2'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default')
              echo '<button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

            if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';
             
          if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                 if ($stroka['NAME']!='br')
                       {
                         $textStart="";
                          if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                          echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                          $ii++;
                       } else echo '<br>';    
             
             if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
            $i++;
        }
        echo '</form>';
        echo'</section>';
     }
     // То же самое, как и меню 5, только можно использовать как ссылочное
     // Внимание!!! Меню можно использовать как ссылочное!!
     // простая функция, выводит из базы меню все кнопки подряд
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     // Внимание!!! Меню как ссылочное не использовать!!
     //При запуске через Магический метод:
     //parent::__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой символ, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu6($nameTablic,$url)
     {
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=6)
                    {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
                      {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,6); 
                      }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,6);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        if ($rez===false) return false;
        while (!is_null($stroka=(mysqli_fetch_assoc($rez))))
        {


          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP'  && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default')
          {   
            $linkButton=$stroka['URL'];
            if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$linkButton.'"/>';
            if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
          }
         if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
          
          if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
             if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
               {
               $textStart="";
               if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
               echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
               $ii++;
               } else echo '<br>';

           if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
            if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          //if ($stroka['ID']==$idPoz)
              if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                 if ($stroka['NAME']!='br')
                       {
                         $textStart="";
                          if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                          echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                          $ii++;
                       } else echo '<br>';    
            if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
         }
        echo '</form>';
        echo'</section>';
     }
 
     // Внимание!!! Меню можно использовать как ссылочное!!
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     // Внимание!!! Меню как ссылочное не использовать!!
     //При запуске через Магический метод:
     //parent::__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой мисвол, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // То же самое, что и меню 6, только объекты выводятся согласно номерам ID
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu7($nameTablic,$url)
     {
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=7)
                    {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
                      {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,7); 
                      }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,7);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array(parent::zaprosSQL($zapros));
        $idMax=$stroka[0];
       for ($idPoz=0; $idPoz<=$idMax; $idPoz++)
       { 
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {

          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default')
            {   
              $linkButton=$stroka['URL'];
              if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
              echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$linkButton.'">';
              if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
            }
          if ($stroka['ID']==$idPoz)
              if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
          
          if ($stroka['ID']==$idPoz)
             if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
                if ($stroka['NAME']!='br')
                  {
                    $textStart="";
                     if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                     echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                     $ii++;
                  } else echo '<br>';

           if ($stroka['ID']==$idPoz)
              if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                 if ($stroka['NAME']!='br')
                       {
                         $textStart="";
                          if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                          echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                          $ii++;
                       } else echo '<br>';                  

        if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

        if ($stroka['ID']==$idPoz)
          if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
           if ($stroka['URL']=='default')
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
    
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
      }
        echo '</form>';
        echo'</section>';
     }
      // Внимание!!! Меню можно использовать как ссылочное!!
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     // Внимание!!! Меню как ссылочное не использовать!!
     //При запуске через Магический метод:
     //parent::__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой мисвол, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // То же самое, что и меню 7, только добавлен объект textarea
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu8($nameTablic,$url)
     {
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=8)
                    {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
                      {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,8); 
                      }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,8);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array(parent::zaprosSQL($zapros));
        $idMax=$stroka[0];
       for ($idPoz=0; $idPoz<=$idMax; $idPoz++)
       { 
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {


          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default')
            {   
              $linkButton=$stroka['URL'];
              if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];  
              echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$linkButton.'">';
              if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
            }
          if ($stroka['ID']==$idPoz)
              if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
         
          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
             if ($stroka['URL']=='textP')
                 if ($stroka['NAME']!='br')
                 {
                 $textStart="";
                 if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                 echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                 $ii++;
                 } else echo '<br>';
                        
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false)
            {
             $textStart="";
             if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
             echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
             $ii++;
            }
          if ($stroka['ID']==$idPoz)
            if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
               if ($stroka['NAME']!='br')
                     {
                       $textStart="";
                        if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                        echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                        $ii++;
                     } else echo '<br>';   

          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
     
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
      }
        echo '</form>';
        echo'</section>';
     }
           // Внимание!!! Меню можно использовать как ссылочное!!
     // $nameTablic - имя таблицы менюшки
     // Общий класс '<section class="'.$nameTablic.'">
     // Класс для формы с приставкой form_+$nameTablic
     // Класс для кнопки с приставкой  button_+$nameTablic
     // В таблице может быть определен для каждой кнопки свой класс.
     // имя стилевых классов text.$nameTablic.номер
     // $url задает ссылку, куда переходим при нажатии на одну из кнопок
     // Если поле ссылки в БД не text и не reset, то буттон типа submit
     // Если поле ссылки в БД  text , то рисуем поле ввода
     // Если поле ссылки в БД  reset , то рисуем кнопку reset
     // Внимание!!! Меню как ссылочное не использовать!!
     //При запуске через Магический метод:
     //parent::__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
     //Первый параметр - это название функции, второй параметр - это название таблицы меню.
     //Параметры в массиве, первый элемент - это ссылка active"redaktor.php"
     //Следующие элементы по порядку надписи внутри текстового тега type=text, value=$poslednijZapros и так далее
     //  br в базе на месте NAME работает как в html коде если URL=text
     // В меню5 добавлена возвожность проверять принадлежность кнопок к статусу пользователя
     // В дополнительное поле STATUS записывается перечень статусов, в которых работает кнопка, перед ними следует поставить 
     // любой мисвол, к примеру "-". Пример -012345 - это значит кнопка видна при всех статусах
     // новое------------------------------------------------------------------------------------
     // То же самое, что и меню 8, только добавлены объекты p,h1-h6, div, img
     // Класс стиля будет равен p(h1,h2,h3,h4,h5,h6,div)_имя класса в таблице
     // Класс для картинки. Класс для дива imgDiv_имя класса, класс для img img_имя класса
     // горизонтальная полоса, имя hr
     // строка col1 поделенная бутстрапом, NAME=col1, url="строка1"
     // строка col2 поделенная бутстрапом, NAME=col2, url="строка1&строка2"
     // строка col2_4/8 поделенная бутстрапом, NAME=col2_4/8, url="строка1&строка2" // добавив _4/8 можно регулировать ширину столбцов. Сумма должна быть равна 12. 
     // строка col3 поделенная бутстрапом, NAME=col2, url="строка1&строка2&строка3"
     // Принцип задания столбцов аналогичен с той лиш разницей, что на третий столбец пойдёт остаток. col3_4/4 - это равносильно col-4-4-4 Сумма должна быть равна 12. 
     // параметр ссылки default отправляет пользователя на главную страницу сайта
     public function menu9($nameTablic,$url)
     {
      
                    // Регистрируем либо изменяем тип меню
                    if ($this->typMenu($nameTablic)!=9)
                    {
                     if (parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) 
                      {
                        parent::killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,9); 
                      }
                     if (!parent::siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,9);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array(parent::zaprosSQL($zapros));
        $idMax=$stroka[0];
        
       

       for ($idPoz=0; $idPoz<=$idMax; $idPoz++)
       { 
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
        {

          

          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default' && $stroka['URL']!='p'  
              && $stroka['URL']!='h1' && $stroka['URL']!='h2' && $stroka['URL']!='h3' && $stroka['URL']!='h4' && $stroka['URL']!='h5' && $stroka['URL']!='h6' && $stroka['URL']!='div' && $stroka['NAME']!='img' 
               && $stroka['NAME']!='hr'  && $stroka['NAME']!='col1' && (!stripos('-'.$stroka['NAME'],'col2') && !stripos($stroka['NAME'],'&') && !stripos ('-'.$stroka['NAME'],'col3')) )
               {   
                $linkButton=$stroka['URL'];
                if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
                echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$linkButton.'">';
                if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
              }
          if ($stroka['ID']==$idPoz)
              if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
              echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
          
          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
             if ($stroka['URL']=='textP')
                 if ($stroka['NAME']!='br')
                 {
                 $textStart="";
                 if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                 echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                 $ii++;
                 } else echo '<br>';
                 
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br')
              {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false)
            {
             $textStart="";
             if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
             echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
             $ii++;
            }
          if ($stroka['ID']==$idPoz)
            if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
               if ($stroka['NAME']!='br')
                     {
                       $textStart="";
                        if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                        echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                        $ii++;
                     } else echo '<br>';    
         if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.parent::initsite().'"/>';
          
         if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
            if ($stroka['URL']=='p' || $stroka['URL']=='h1' || $stroka['URL']=='h2' || $stroka['URL']=='h3' || $stroka['URL']=='h4' || $stroka['URL']=='h5' || $stroka['URL']=='h6' || $stroka['URL']=='div')
              echo '<'.$stroka['URL'].' class="'.$stroka['URL'].'_'.$stroka['CLASS'].'">'.$stroka['NAME'].'</'.$stroka['URL'].'>';
          
        if ($stroka['ID']==$idPoz)
          if ($stroka['NAME']=='img' &&  strrpos($stroka['STATUS'],$status)!=false)
            echo '<div class="imgDiv_'.$stroka['CLASS'].'"><img src="'.$stroka['URL'].'" alt="название и путь к файлу:'.$stroka['URL'].'"></div>';
        
            if ($stroka['ID']==$idPoz)
          if ($stroka['NAME']=='hr' &&  strrpos($stroka['STATUS'],$status)!=false)
            echo '<hr class="hr_'.$stroka['CLASS'].'">';

        if ($stroka['ID']==$idPoz)
          if ($stroka['NAME']=='col1' &&  strrpos($stroka['STATUS'],$status)!=false)
            echo '<div class="container-fluid"><div class="row"><div class="col-12"><div class=col1_'.$stroka['CLASS'].'">'.$stroka['URL'].'</div></div></div></div>';
         
        if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
          if ($stroka['NAME']=='col2' || $stroka['NAME']=='col2_1/11' || $stroka['NAME']=='col2_2/10' || $stroka['NAME']=='col2_3/9' 
             || $stroka['NAME']=='col2_4/8' || $stroka['NAME']=='col2_5/7' || $stroka['NAME']=='col2_7/5' || $stroka['NAME']=='col2_8/4' || $stroka['NAME']=='col2_9/3' 
               || $stroka['NAME']=='col2_10/2' || $stroka['NAME']=='col2_11/1' || $stroka['NAME']=='col2_6/6')
             {
                $box1=6;
                $box2=6;
               if ($stroka['NAME']!='col2')
               {
                $vhod=strrpos($stroka['NAME'],'/');
                $box2=(int)mb_substr($stroka['NAME'],$vhod+1);
                $box1=12-$box2;
               }
                $vhod=strrpos($stroka['URL'],'&');
                $stroka2=mb_substr ($stroka['URL'],$vhod+1);
                $stroka1=mb_substr ($stroka['URL'],-strlen($stroka['URL']),$vhod);
                echo '<div class="container-fluid"><div class="row"><div class="col-'.$box1.'"><div class="col2_'.$stroka['CLASS'].'">'.$stroka1.'</div></div><div class="col-'.$box2.'"><div class="col2_'.$stroka['CLASS'].'">'.$stroka2.'</div></div></div></div>';
             }

          if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
             if (stripos ('-'.$stroka['NAME'],'col3'))
             {
                $box1=4;
                $box2=4;
                $box3=4;
               if ($stroka['NAME']!='col3')
               {
                $vhod=strrpos($stroka['NAME'],'/');
                $box2=(int)mb_substr($stroka['NAME'],$vhod+1); //нашли третью цифру для столбца бутстрапа
                $box1=(int)mb_substr($stroka['NAME'],5,$vhod-5);                
                $box3=12-$box2-$box1;
               }
                $dlinaStr=strlen ( $stroka['URL'] );
                $vhod2=strrpos($stroka['URL'],'&');   // нашли последнее вхождение
                $vhod1=strrpos($stroka['URL'],'&',-($dlinaStr-$vhod2+1));   // нашли предпоследнее вхождение
                $stroka3=mb_substr ($stroka['URL'],$vhod2+1);
                $stroka2=mb_substr ($stroka['URL'],$vhod1+1,$vhod2-$vhod1-1);
                $stroka1=mb_substr ($stroka['URL'],0,$vhod1);
                echo '<div class="container-fluid"><div class="row"><div class="col-'.$box1.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka1.'</div></div><div class="col-'.$box2.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka2.'</div></div><div class="col-'.$box3.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka3.'</div></div></div></div>';
             }
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=parent::zaprosSQL($zapros);
      }
        echo '</form>';
        echo'</section>';
     }

 }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class login extends initBd  // Работа с регистрациями
{
   public function __construct()
   {
    parent::__construct();
    $this->milisek=time();
    if (!parent::searcNameTablic('status_klienta')) // если таблицы нет, то создать её
     {
      $zapros="CREATE TABLE status_klienta(login VARCHAR(30), parol VARCHAR(30), mail VARCHAR(50), status INT , time INT)";
      parent::zaprosSQL($zapros);
     }
   }
   public function prowerkaLogin() // проверка логина, если логин существует или не соответствует правилам, то вернуть TRUE
   {
    if (parent::proverkaMata($_POST['Логин'])) return true;
    if ($_POST['Логин']=='' || $_POST['Логин']=='Логин') return true; 
    $zapros="SELECT status FROM status_klienta WHERE login='".$_POST['Логин']."'";
    $rez=parent::zaprosSQL($zapros);
    $stroka=mysqli_fetch_array($rez);
    if (is_null($stroka)) return false;
    if ($stroka[0]>=0) return true;
    return false;
   }
   public function prowerkaMail()
   {
    if (preg_match('/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/',$_POST['Почта'])!=1) return true;
    $zapros="SELECT status FROM status_klienta WHERE mail='".$_POST['Почта']."'";
    $rez=parent::zaprosSQL($zapros);
    $stroka=mysqli_fetch_array($rez);
    if (is_null($stroka[0])) return false;
    if ($stroka[0]>=0) return true;
    return false;
   }
   public function capcha()
   {
     $randcislo=rand(0,9);
     if ($randcislo==0) 
     {
       $this->varianty($randcislo);
       return "Сколько ног у таракана?";
     }
     if ($randcislo==1) 
     {
       $this->varianty($randcislo);
       return "Летом тепло...";
     }
     if ($randcislo==2) 
     {
       $this->varianty($randcislo);
       return "Ночью темно...";
     }
     if ($randcislo==3) 
     {
       $this->varianty($randcislo);
       return "Трижды по половине";
     }
     if ($randcislo==4) 
     {
       $this->varianty($randcislo);
       return "Музыку еле слышно";
     }
     if ($randcislo==5) 
     {
       $this->varianty($randcislo);
       return "Капли текли по крыше";
     }
     if ($randcislo==6) 
     {
       $this->varianty($randcislo);
       return "Ваньку валяли в полдень";
     }
     if ($randcislo==7) 
     {
       $this->varianty($randcislo);
       return "Ветер срывает крышу";
     }
     if ($randcislo==8) 
     {
       $this->varianty($randcislo);
       return "Вирус пришел внезапно";
     }
     if ($randcislo==9) 
     {
       $this->varianty($randcislo);
       return "Кто-нибудь видел Жору?";
     }
   }

   public function varianty($nomer)
   {
    if ($nomer==0) 
    {
     parent::zaprosSQL("UPDATE registracia SET NAME='4' WHERE ID=11");
     parent::zaprosSQL("UPDATE registracia SET NAME='6' WHERE ID=12");
     parent::zaprosSQL("UPDATE registracia SET NAME='8' WHERE ID=13");
     parent::zaprosSQL("UPDATE registracia SET NAME='10' WHERE ID=14");
     return '6';
    }

     if ($nomer==1) 
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Колесо круглое' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Пи=3,1415...' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ночью темно' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Зимой холодно' WHERE ID=14");
      return 'Зимой холодно';
     }
     if ($nomer==2) 
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Летом тепло' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Джинсы тесны' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ахалай Махалай' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Днем светло' WHERE ID=14");
      return 'Днем светло';
     }
     if ($nomer==3) // трижды по половине
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Дважды по три бутылки' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Конь на холме пасётся' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше чем два поллитра' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Пять раз по двадцать пять' WHERE ID=14");
      return 'Больше чем два поллитра';
     }

     if ($nomer==4) //Музыку еле слышно
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Боком толкали бочку' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Видно, но хуже слышно' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Вода попала в уши' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Холодно, но не жарко' WHERE ID=14");
      return 'Вода попала в уши';
     }
     if ($nomer==5) // Капли текли по крыше
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Звёзды спадают на пол' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Кот шурудит на крыше' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Дождь уже слабо падал' WHERE ID=14");
      return 'Дождь уже слабо падал';
     }
     if ($nomer==6)  // Ваньку валяли в полдень
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Круглое часто носят' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Зеньки раскрой зараза' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ваньку валяли в полдень' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=14");
      return 'Ваньку валяли в полдень';
     }
     if ($nomer==7)  // Ветер срывает крышу
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Новую нужно ставить' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Кошка кричит весною' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Жизнь оживает снова' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Только не очень быстро' WHERE ID=14");
      return 'Новую нужно ставить';
     }

     if ($nomer==8)  // Вирус пришел внезапно
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Галоши надеть забыл он' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Весь мир ошарашил вскоре' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Лечили его всем миром' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Намедни катался на лыжах' WHERE ID=14");
      return 'Лечили его всем миром';
     }
     if ($nomer==9) //Кто-нибудь видел Жору
     {
      parent::zaprosSQL("UPDATE registracia SET NAME='Жора играет в спальне' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Гена сидит на крыше' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Миша ломает гвозди' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Федя читает книгу' WHERE ID=14");
      return 'Жора играет в спальне';
     }
   }
  public function capcaRez($vopros,$otvet)  // Проверяет правильность ответа капчи
  {
    if ($vopros=='Сколько ног у таракана?' && $otvet=='6') return true;
    if ($vopros=='Летом тепло...' && $otvet=='Зимой холодно') return true;
    if ($vopros=='Ночью темно...' && $otvet=='Днем светло') return true;
    if ($vopros=='Трижды по половине' && $otvet=='Больше чем два поллитра') return true;
    if ($vopros=='Музыку еле слышно' && $otvet=='Вода попала в уши') return true;
    if ($vopros=='Капли текли по крыше' && $otvet=='Дождь уже слабо падал') return true;
    if ($vopros=='Ваньку валяли в полдень' && $otvet=='Ваньку валяли в полдень') return true;
    if ($vopros=='Ветер срывает крышу' && $otvet=='Новую нужно ставить') return true;
    if ($vopros=='Вирус пришел внезапно' && $otvet=='Весь мир ошарашил вскоре') return true;
    if ($vopros=='Кто-нибудь видел Жору' && $otvet=='Жора играет в спальне') return true;
    return false;
  }

public function lovimOtvetNaCapcu($knopka) //Ловит нажатие кнопки варианта капчи
{
   if ($knopka=='4' || $knopka=='6' || $knopka=='8' || $knopka=='10' || $knopka=='Колесо круглое' 
   || $knopka=='Пи=3,1415...' || $knopka=='Ночью темно' || $knopka=='Зимой холодно'
   || $knopka=='Летом тепло' || $knopka=='Джинсы тесны' || $knopka=='Ахалай Махалай' || $knopka=='Днем светло'
   || $knopka=='Дважды по три бутылки' || $knopka=='Конь на холме пасётся' || $knopka=='Больше чем два поллитра' 
   || $knopka=='Пять раз по двадцать пять'  || $knopka=='Боком толкали бочку' || $knopka=='Видно, но хуже слышно'
   || $knopka=='Вода попала в уши' || $knopka=='Холодно, но не жарко' || $knopka=='Больше не буду плакать' 
   || $knopka=='Круглое часто носят' || $knopka=='Дождь уже слабо падал' || $knopka=='Кот шурудит на крыше' || $knopka=='Звёзды спадают на пол'
   || $knopka=='Кошка кричит весною' || $knopka=='Новую нужно ставить' || $knopka=='Ваньку валяли в полдень' || $knopka=='Зеньки раскрой зараза'
   || $knopka=='Весь мир ошарашил вскоре' || $knopka=='Галоши надеть забыл он' || $knopka=='Только не очень быстро' || $knopka=='Жизнь оживает снова'
   || $knopka=='Федя читает книгу' || $knopka=='Миша ломает гвозди' || $knopka=='Гена сидит на крыше' || $knopka=='Жора играет в спальне' || $knopka=='Намедни катался на лыжах' || $knopka=='Лечили его всем миром') return true;
   return false;
  }

public function zapisGostia($login,$parol,$mail,$temaMeila,$meilText)
{
  $rand=rand(9999,99999);
  $zapros="INSERT INTO status_klienta(`login`, `parol`, `mail`, `status`, `time`) VALUES ('".$login."','".$parol."','".$mail."',".$rand.",".time().")";
      parent::zaprosSQL($zapros);
      $mlText=$meilText.$rand;
      mail ($mail,$temaMeila,$mlText);
}
public function siearcMail($login,$meilText)
{
  $zapros="SELECT * FROM status_klienta WHERE login='".$login."'";
  $rez=parent::zaprosSQL($zapros);
  $stroka=mysqli_fetch_assoc($rez);
  $mlText=$meilText.$stroka['status'];
      mail ($stroka['mail'],'Нашли письмо',$mlText);
}
public function statusRegi($login,$parol)  // Проверяем статус учётной записи
{
  $zapros="SELECT status FROM status_klienta WHERE login='".$login."' AND parol='".$parol."'";
  $rez=parent::zaprosSQL($zapros);
  if (!$rez) return 0;
  $stroka=mysqli_fetch_array($rez);
  if (!$stroka) return 0;
  return $stroka[0];
}
public function saveStatus($status)  // Проверяем статус учётной записи
{
  $rez=parent::zaprosSQL("UPDATE status_klienta SET status=".$status." WHERE login='".$_SESSION['login']."'");
}

public function listKlientow()
{
  if ($_SESSION['status']==5 || $_SESSION['status']==4)
   $rez=parent::zaprosSQL("SELECT * FROM status_klienta WHERE 1");
   if ($_SESSION['status']==4)
   {
     echo '<section class="container-fluid status">';
 
     echo '<div class="row">';
     echo '<div class="col">';
     echo '<p class="mesage">Login</p>';
     echo '</div>';
     echo '<div class="col">';
     echo '<p class="mesage">Reset Password</p>';
     echo '</div>';
     echo '</div>';
 
   while (!is_null($stroka=(mysqli_fetch_array($rez))))
   {
     if ($stroka['status']<5)
     {
     echo '<form method="POST" active="redaktor.php">';
     echo '<div class="row">';
     echo '<div class="col">'; 
     echo '<input type="text" class="status_text" name="login" value="'.$stroka['login'].'">';
     echo '</div>';
     echo '<div class="col">';
     echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сбр.пароль">';
     echo '</div>';
     echo '</div>';
     echo '</form>';
     }
   }
     echo '</section>';
   }
  if ($_SESSION['status']==5)
  {
    echo '<section class="container-fluid status">';

    echo '<div class="row">';
    echo '<div class="col">';
    echo '<p class="mesage">Login</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Password</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mail">Mail</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Status</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="time">Time</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Reset Password</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Save</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Kill</p>';
    echo '</div>';
    echo '</div>';

  while (!is_null($stroka=(mysqli_fetch_array($rez))))
  {
    echo '<form method="POST" active="redaktor.php">';
    echo '<div class="row">';
    echo '<div class="col">'; //login
    echo '<input type="text" class="status_text" name="login" value="'.$stroka['login'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="parol" value="'.$stroka['parol'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="mail" value="'.$stroka['mail'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="status" value="'.$stroka['status'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="time" value="'.$stroka['time'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сбр.пароль">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сохранить">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Удалить">';
    echo '</div>';
    echo '</div>';
    echo '</form>';
  }
  echo '<dt class="col-3 text-truncate">Статусы</dt>';
  echo '<dd class="col-9 text-truncate style-infoMenu">';
  echo '<p>Всего существует 7 статусов: 0,1,2,3,4,5,9</p>';
  echo '<p>0-Гость</p>';
  echo '<p>1-Зарегистрированный пользователь</p>';
  echo '<p>2-Редактор</p>';
  echo '<p>3-Подписчик</p>';
  echo '<p>4-Модератор (имеет доступ к таблицам в базе данных сайта)</p>';
  echo '<p>5-Администратор (имеет доступ ко всем таблицам в базе данных)</p>';
  echo '<p>9-Зарегистрированный, но не подтвердивший регистрацию пользователь</p>';
  echo '</dd>';
    echo '</section>';
  }
} // конец listKlientow()

public function resetParol() // Сбросить пароль 
{
  parent::zaprosSQL("UPDATE status_klienta SET parol='1111' WHERE login='".$_POST['login']."'");
}
public function saveStatusR() // Сохранить учётку
{
  parent::zaprosSQL("UPDATE status_klienta SET parol='".$_POST['parol']."', mail='".$_POST['mail']."', status=".$_POST['status']." WHERE login='".$_POST['login']."'");
}
  public function killGosc() // Удалить учётку учётку
{
  parent::zaprosSQL("DELETE FROM status_klienta WHERE login='".$_POST['login']."'");
}
  public function naGlavnuStranicu()
{
  exit("<meta http-equiv='refresh' content='0; url= ".parent::initsite()."'>");
}
  public function tutObnovit()
  {
  exit("<meta http-equiv='refresh' content='0; url= 'redaktor.php'>");
}
  public function nameGlawnogoSite()
{
  return parent::initsite();
}
public function statusString()
{
if ($_SESSION['status']>99 || $_SESSION['status']==9) return 'Учётная запись не подтверждена.';
if ($_SESSION['status']==0) return 'Гость.';
if ($_SESSION['status']==1) return 'Пользователь.';
if ($_SESSION['status']==2) return 'Модератор.';
if ($_SESSION['status']==3) return 'Подписчик.';
if ($_SESSION['status']==4) return 'Администратор.';
if ($_SESSION['status']==5) return 'Супер Администратор.';
}
//public function redaktProfil()
//{
      
//}
} // конец класса login
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
class maty extends menu  // Работа с матами и нецензурной лексикой
{
    public function __construct()
      {
        parent::__construct();
         //проверим есть ли вспомогательная таблица и матов
         if (!parent::searcNameTablic('maty'))
         parent::zaprosSQL("CREATE TABLE maty(mat VARCHAR(15))");
         $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE 1");
         //проверим есть ли вспомогательная таблица и Не матов
         if (!parent::searcNameTablic('nie_maty'))
          parent::zaprosSQL("CREATE TABLE nie_maty(nie_mat VARCHAR(15))");
         $rez_nieMat=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
         //проверим есть ли вспомогательная таблица для матов от пользователей
         if (!parent::searcNameTablic('mat_ot_polzovatelej'))
          parent::zaprosSQL("CREATE TABLE mat_ot_polzovatelej(mat VARCHAR(15), login VARCHAR(15))");
         $rez_mat_polsovat=parent::zaprosSQL("SELECT mat FROM mat_ot_polzovatelej WHERE 1");

          $i=0;
         //Читаем таблицу ы массив mat_polsovat
         while(!is_null($stroka=mysqli_fetch_array($rez)))
          {
            $this->mas_mat[$i]=$stroka[0];
            $i++;
          }
          $i=0;
         //Читаем таблицу ы массив
         while(!is_null($stroka=mysqli_fetch_array($rez_nieMat)))
          {
           $this->nie_mat[$i]=$stroka[0];
           $i++;
           }
         $i=0;
         while(!is_null($stroka=mysqli_fetch_array($rez_mat_polsovat)))
           {
            $this->mat_polsovat[$i]=$stroka[0];
            $i++;
            }
       }
       //функция должна разбить текст на оттельные слова и искать мат при условии, что слово не входит в базу исключений.
       //цель в правильном написании слова подстраХуй
       public function echoBezMatovPlusIsklucenia($text) // функция находит совпадения матов и меняет их на звездочки.
       {  // Не работает!!!!!!!!!!!!!!!!!!!!!!!!
         $rezultat=$text;
         echo $text.'<br>';
         $mas_rezult=$masRezult[0];
         foreach($mas_rezult as $value)
              { 
                 $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                 $vyragenie='/\s('.$hablon.')\s?/';
                 $rezultat=preg_replace($vyragenie,' ** ',$rezultat);
              }
       }
       public function echoBezMatov($text) // функция находит совпадения матов и меняет их на звездочки и выводит результат
          {
            $rezultat=$text;
            if (isset($this->mas_mat[0]))
             foreach($this->mas_mat as $value)
              {  
                $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                $vyragenie='/(^|\s|\W|\d)'.$hablon.'($|\s|(\W)|\d+)?/uUmi';
                $rezultat=preg_replace($vyragenie,'**',$rezultat);
              }
              echo $rezultat;
          }
        public function bezMatov($text) // функция находит совпадения матов и меняет их на звездочки и возвращает результат
          {
            $rezultat=$text;
            if (isset($this->mas_mat[0]))
             foreach($this->mas_mat as $value)
              {  
                $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                $vyragenie='/(^|\s|\W|\d)'.$hablon.'($|\s|(\W)|\d+)?/uUmi';
                $rezultat=preg_replace($vyragenie,'**',$rezultat);
              }
              return $rezultat;
          }
         public function createRegularNotRegistr($value) // функция возвращает преобразованные слова для регистронезависимого поиска
         {
          $value=preg_replace('/а|А/','(а|А)+?',$value);
          $value=preg_replace('/б|Б/','(б|Б)+?',$value);
          $value=preg_replace('/в|В/','(в|В)+?',$value);
          $value=preg_replace('/г|Г/','(г|Г)+?',$value);
          $value=preg_replace('/д|Д/','(д|Д)+?',$value);
          $value=preg_replace('/е|Е/','(е|Е)+?',$value);
          $value=preg_replace('/ё|Ё/','(ё|Ё)+?',$value);
          $value=preg_replace('/ж|Ж/','(ж|Ж)+?',$value);
          $value=preg_replace('/з|З/','(з|З)+?',$value);
          $value=preg_replace('/и|И/','(и|И)+?',$value);
          $value=preg_replace('/й|Й/','(й|Й)+?',$value);
          $value=preg_replace('/к|К/','(к|К)+?',$value);
          $value=preg_replace('/л|Л/','(л|Л)+?',$value);
          $value=preg_replace('/м|М/','(м|М)+?',$value);
          $value=preg_replace('/н|Н/','(н|Н)+?',$value);
          $value=preg_replace('/о|О/','(о|О)+?',$value);
          $value=preg_replace('/п|П/','(п|П)+?',$value);
          $value=preg_replace('/р|Р/','(р|Р)+?',$value);
          $value=preg_replace('/с|С/','(с|С)+?',$value);
          $value=preg_replace('/т|Т/','(т|Т)+?',$value);
          $value=preg_replace('/у|У/','(у|У)+?',$value);
          $value=preg_replace('/ф|Ф/','(ф|Ф)+?',$value);
          $value=preg_replace('/х|Х/','(х|Х)+?',$value);
          $value=preg_replace('/ч|Ч/','(ч|Ч)+?',$value);
          $value=preg_replace('/ц|Ц/','(ц|Ц)+?',$value);
          $value=preg_replace('/ш|Ш/','(ш|Ш)+?',$value);
          $value=preg_replace('/щ|Щ/','(щ|Щ)+?',$value);
          $value=preg_replace('/ъ|Ъ/','(ъ|Ъ)+?',$value);
          $value=preg_replace('/ы|Ы/','(ы|Ы)+?',$value);
          $value=preg_replace('/ь|Ь/','(ь|Ь)+?',$value);
          $value=preg_replace('/э|Э/','(э|Э)+?',$value);
          $value=preg_replace('/ю|Ю/','(ю|Ю)+?',$value);
          $value=preg_replace('/я|Я/','(я|Я)+?',$value);
          $hablon=$value;
          return $hablon;
         }
         public function searcMata($mat) // Функция ищет матерное слово в базе, если находит, то возвращает true
          {
            // сначала проверим наличие слова
            $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE mat='".$mat."'");
            $stroka=mysqli_fetch_array($rez);
            if ($stroka[0]) return true;
            return false;
          }
          public function searcNieMata($nie_mat) // Функция ищет слово в базе исключений для матерных слов, если находит, то возвращает true
          {
            // сначала проверим наличие слова
            $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$nie_mat."'");
            $stroka=mysqli_fetch_array($rez);
            if ($stroka[0]) return true;
            return false;
          }
        public function kill_mat()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->mas_mat[0]))
             foreach($this->mas_mat as $value)
               if (isset($_POST['maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM maty WHERE mat='".$value."'"); 
         }
         public function kill_nie_mat()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->nie_mat[0]))
             foreach($this->nie_mat as $value)
               if (isset($_POST['nie_maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$value."'"); 
         }
         public function list_block_save()  // Функция блокировки пользователя для добавления матов.
         {
            $rez=parent::zaprosSQL("SELECT login FROM status_klienta WHERE status>0 AND status<6"); // получаем все логины со статусами от 1 до 5
            while(!is_null($stroka=mysqli_fetch_array($rez)))
             {
               if (isset($_POST['blok_user_mat_ot_polzovatelej_'.$stroka[0]])) // Если была нажата кнопка, блокировки пользователя
                { 
                  $id=parent::maxIdLubojTablicy('blocked_list_dobavit_mat');
                  if ($id<1) $id=1;
                  parent::zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$stroka[0]."')");
                }
             }
         }
         public function kill_ot_polsovatelej()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->mat_polsovat[0]))
             foreach($this->mat_polsovat as $value)
               if (isset($_POST['kill_mat_ot_polzovatelej_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
         }
        public function razblokirovka_polsovatelej()  // Функция разблокировка пользователя
         {
          $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // получаем все логины со статусами от 1 до 5
          while(!is_null($stroka=mysqli_fetch_array($rez)))
             if (isset($_POST['buttonListBocked'.$stroka[0]])) // Если была нажата кнопка, блокировки пользователя
               parent::zaprosSQL("DELETE FROM blocked_list_dobavit_mat WHERE login='".$stroka[0]."'"); 
         }
        public function zablokirovanMaty()  // Функция разблокировка пользователя
         {
          $vivod=false;
          $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // проверяем заблокирован ли пользователь на добавление матов
          while(!is_null($stroka=mysqli_fetch_array($rez)))
             if ($stroka[0]==$_SESSION['login']) // Если была нажата кнопка, блокировки пользователя
              {$vivod=true; break;}
          return $vivod;
         }
       public function save_ot_polsovatelej()  // Функция переноса мата из временной таблицы в постоянную
         {
           if (isset($this->mat_polsovat[0]))
             foreach($this->mat_polsovat as $value)
               if (isset($_POST['save_mat_ot_polzovatelej_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                {
                   parent::zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
                   parent::zaprosSQL("INSERT INTO maty(mat) VALUES ('".$value."')");
                }
         }
      public function redactMaty() // Работа с меню ретактирования таблицы матов
       {
          
          $this->razblokirovka_polsovatelej();  // Функция разблокировка пользователя
          $this->list_block_save(); // функция проверяет не была ли нажата кнопка блокировки пользователя, если была, то заносит логин в таблицу банов
          $this->kill_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
          $this->kill_nie_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
          $this->kill_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова пользователей
          $this->save_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого переноса слова из временной таблицы пользователей в постоянную
          
          parent::menu4('menu_maty','redaktor.php');

          ///////////////////////////////////////начало работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
          echo '<br>';
         if (isset($_POST['vklSborMatov']))
          parent::zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=1 WHERE id=1");
         if (isset($_POST['vyklSborMatov']))
          parent::zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=0 WHERE id=1");
         if (parent::sborMatov()==1) // Значит сбор матов включен, поставить кнопку выключения
           {
            echo '<div class="vklSborMatovDiv">';
            echo '<form method="POST" action="redaktor.php">';
            echo '<input type="submit" class="vyklSborMatov" name="vyklSborMatov" value="Выключить форму сбора нецензурных слов от пользователей">';
            echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
            echo '</form>';
            echo '</div>';
            echo '<br>';             
           } else // иначе сбор матов выключен, поставить кнопку включения
            {
                  echo '<div class="vklSborMatovDiv">';
                  echo '<form method="POST" action="redaktor.php">';
                  echo '<input type="submit" class="vklSborMatov" name="vklSborMatov" value="Включить форму сбора нецензурных слов от пользователей">';
                  echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
                  echo '</form>';
                  echo '</div>';
                  echo '<br>';
            }
           ///////////////////////////////////////конец работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
          ////////// Показать список заблокированных пользователей
         if (isset($_POST['buttonListBocked'])) //&& $_POST['menu_maty']=='Список заблокированных пользователей')
           {
             $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1");
             echo '<section class="container-fluid">';
             echo '<form action="redaktor.php" method="post">';
             while(!is_null($stroka=mysqli_fetch_array($rez)))
              {
                echo '<div class="row">';
                echo '<div class="col">';
                echo '<input class="buttonListBocked" type="submit" name="buttonListBocked'.$stroka[0].'" value="Разблокировать ('.$stroka[0].')">';
                echo '</div>';
                echo '</div>';
              }
             echo '</section>';
             echo 'Конец списка';
            }
          if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить мат' && $_POST['mat_text']!='')
            {
             // Если слово есть, то удаляем
             if ($this->searcMata($_POST['mat_text'])) 
              {
               parent::zaprosSQL("DELETE FROM maty WHERE mat='".$_POST['mat_text']."'");
               //Снова проверяем наличие слова в БД
               if ($this->searcMata($_POST['mat_text'])) echo 'Не удалось удалить';
               if (!$this->searcMata($_POST['mat_text'])) echo 'Слово удалено<br>';
              }
           // если слова нет, то заносим его в базу данных
           if (!$this->searcMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
          }
        if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить не мат' && $_POST['mat_text']!='')
          {
           // Если слово есть, то удаляем
           if ($this->searcNieMata($_POST['mat_text'])) 
            {
             parent::zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
             //Снова проверяем наличие слова в БД
             if ($this->searcNieMata($_POST['mat_text'])) echo 'Не удалось удалить';
             if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово удалено<br>';
            }
         // если слова нет, то заносим его в базу данных
         if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
        }

      if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать')
        {
          $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE 1");
          echo '<section class="container-fluid">';
          echo '<form action="redaktor.php" method="post">';
          while(!is_null($stroka=mysqli_fetch_array($rez)))
           {
             echo '<div class="row">';
             echo '<div class="col">';
             echo '<input class="button_maty" type="submit" name="maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
             echo '</div>';
             echo '</div>';
           }
          echo '</section>';
          echo 'Конец списка';
         }
        if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать не маты') // Рисуем кнопки нематов
         {
           $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
           echo '<section class="container-fluid">';
           echo '<form action="redaktor.php" method="post">';
           while(!is_null($stroka=mysqli_fetch_array($rez)))
            {
              echo '<div class="row">';
              echo '<div class="col">';
              echo '<input class="button_nie_maty" type="submit" name="nie_maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
              echo '</div>';
              echo '</div>';
            }
           echo '</section>';
           echo 'Конец списка';
          }

       if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='От пользователей') // Рисуем кнопки матов от пользователей
          {
            $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE 1");
            echo '<section class="container-fluid">';
            echo '<form action="redaktor.php" method="post">';
            while(!is_null($stroka=mysqli_fetch_assoc($rez)))
             {
               echo '<div class="row">';
               echo '<div class="col">';
               echo '<input class="button_mat_ot_polzovatelej_list" type="submit" name="kill_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Пользователь '.$stroka['login'].' добавил мат ('.$stroka['mat'].'). Удалить!">';
               echo '<input class="button_mat_ot_polzovatelej_save" type="submit" name="save_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Сохранить">';
               echo '<input class="button_mat_ot_polzovatelej_block" type="submit" name="blok_user_mat_ot_polzovatelej_'.$stroka['login'].'" value="Заблокировать пользователя - '.$stroka['login'].'">';
               echo '</div>';
               echo '</div>';
             }
            echo '</section>';
            echo 'Конец списка';
           }

  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='')
      {
        $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='')
      {
        $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД НЕ матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД НЕ матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить' && $_POST['mat_text']!='')
      {
        // сначала проверим наличие слова
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcMata($_POST['mat_text'])) 
        {
          parent::zaprosSQL("INSERT INTO maty(mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник матов!<br>';
        if (!$this->searcMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник матов!<br>';
        }
      }
    if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить не мат' && $_POST['mat_text']!='')
      {
        // сначала проверим наличие слова
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике НЕ матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcNieMata($_POST['mat_text'])) 
        {
          parent::zaprosSQL("INSERT INTO nie_maty(nie_mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник НЕ матов!<br>';
        if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник НЕ матов!<br>';
        }
      }
  }
      // работаем с заполнением базы матов от пользователей на главной странице сайта
  public function dobavilMat($text) //mat_ot_polzovatelej
       {
        if (isset($_POST['otkazDobawleniaMatow'])) //Самозаблокироваться от показа окна добавления матов
         {
          $id=parent::maxIdLubojTablicy('blocked_list_dobavit_mat');
          if ($id<1) $id=1;
          parent::zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$_SESSION['login']."')");
         }
        if ($_SESSION['status']<1 || $_SESSION['status']>5) return false;
        if ($this->zablokirovanMaty()) return false; // если пользователь заблокирован, то выйти
        if (parent::sborMatov()==0) return false;
         // Узнаем сколько матов пользователь может ввести
         $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
         $cisloMatov=10;
           while(!is_null($stroka=mysqli_fetch_assoc($rez)))
              $cisloMatov--;

        if ($cisloMatov>0 && isset($_POST['dobawilMat']) && $_POST['dobawilMat']=='Ok' && $_POST['dobawilMatText']!='') {
                foreach($this->mas_mat as $value)
                  if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное нецензурное слово уже присутствует в базе данных.';
                foreach($this->nie_mat as $value)
                  if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное слово уже присутствует в базе данных и помечено как слово, разрешенное к применению на данном ресурсе.';
           
            if (!preg_match_all('/Спасибо/u',$text)>0) { //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
                $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
                if (!$rez) echo 'не удалось прочитать данные из таблицы временных нецензурных слов';
                while(!is_null($stroka=mysqli_fetch_assoc($rez))) 
                    if ($stroka['mat']==$_POST['dobawilMatText']) $text='Спасибо, но некто, с логином '.$stroka['login'].' уже отправил данное слово на рассмотрение.';
            }

            if (!preg_match_all('/Спасибо/u',$text)>0) {  //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
                  parent::zaprosSQL("INSERT INTO mat_ot_polzovatelej(mat, login) VALUES ('".$_POST['dobawilMatText']."','".$_SESSION['login']."')");
                  $cisloMatov--;
            } 
        }
        if ($cisloMatov<1) $text=='Лимит ввода нецензурных слов исчерпан, подождите пока модератор одобрит предыдущие Ваши предложения.';
            {
              $text=$text.' Лимит матов-'.$cisloMatov;
              parent::formBlock('formaSborMata',parent::initsite(),
                                'p', $text, 'dobawilMatP',
                                'text2','dobawilMatText',
                                'submit','dobawilMat',
                                'reset',
                                'submit','otkazDobawleniaMatow','Заблокировать данную функцию');

            }
    }
}// конец класса maty

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class futter  extends maty //dataAktual  // Класс выводит информацию в низ сайта
{
    public function __construct()
     {
        parent::__construct();
     }
     public function futterR(...$parametr)
     {
      $bootStrap=false;
      $container='-fluid';
      $dataSozdania='';
      $classPole='';
      // Ищем параметр подключающий бутстрап
      foreach($parametr as $value)
        if (stripos('sss'.$value,'bootstrap'))
          $bootStrap=true;

      //ищем приставку к классу container
      foreach($parametr as $value)
        if (stripos('sss'.$value,'container='))
          $container='-'.preg_replace('/container=/','',$value); // Выделяем логин редактора/ов

      //ищем создания сайта
      foreach($parametr as $value)
        if (stripos('sss'.$value,'дата:'))
          $dataSozdania=preg_replace('/дата:/','',$value); // Выделяем логин редактора/ов

      //ищем имя класса главного поля
      foreach($parametr as $value)
        if (stripos('sss'.$value,'pole='))
        $classPole=preg_replace('/pole=/','',$value); // Выделяем логин редактора/ов

      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь')
       {
           echo '<p>Функция выводит нижний блок</p>';
           echo '<p>Параметры функции произвольные и задаются как обычно!</p>';
           echo '<p>Функция проверяет все параметры и по ключевым словам определяет с каким параметром, что следует делать.</p>';
           echo '<p>Параметров произвольное колличество</p>';
           echo '<p>Для настройки блока под бутстрап необходимо вписать параметр "bootstrap"</p>';
           echo '<p>Для задания приставки к классу container-...fluid задаем дополнительный параметр "container=...fluid"</p>';
           echo '<p>по умолчанию параметр container=fluid</p>';
           echo '<p>Дальше выводимая информация</p>';
           echo '<p>Дата создания сайта задается параметром "дата:18.02.2021"</p>';
           echo '<p></p>';
           echo '<p></p>';
           echo '<p>Работа с классами</p>';
           echo '<p>Задать имя класса главного поля можно через параметр "pole=имя класса"</p>';
           echo '<p>По умолчанию есть класс futter заданный в стилях движка, после него идёт класс заданный с помощью pole=</p>';
           echo '<p></p>';
           
        }

        // Выводим футтер
      if ($bootStrap) echo '<section class="container'.$container.'">';
      if ($bootStrap) echo '<div class="row">';
      if ($classPole=='') echo '<div class="futtrer">';
      if ($classPole!='') echo '<div class='.$classPole.'>';
      
      if ($dataSozdania!='') echo '<p>Дата создания сайта:'.$dataSozdania.'</p>';

      //if ($classPole!='') echo '</div>';
      echo '</div>';
      if ($bootStrap) echo '</div>';
      if ($bootStrap) echo '</section>';

     }
     public function dataRedaktSite()
     {
      //  echo ("<h3>Статистика обращений к базам данных</h3>");
       // echo '<h4>Обращений к базе HTML:'.$this->stHtml.'</h4>';
       // $chislo="".$this->mdaySite;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdaySite<10) $chislo="0".$this->mdaySite;
       // $dat="".$this->monSite;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monSite<10) $dat="0".$this->monSite;
       // $min="".$this->minutesSite;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesSite<10) $min="0".$this->minutesSite;
       // $sek="".$this->secondsSite;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsSite<10) $sek="0".$this->secondsSite;
       // echo '<h5>Последнее изменение сайта '.$chislo.'.'.$dat.'.'.$this->yearSite.'. <span>Время изменения <span>'.$this->hoursSite.':'.$min.':'.$sek.'</span></span></h5>';
       // $chislo="".$this->mdayBd;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdayBd<10) $chislo="0".$this->mdayBd;
       // $dat="".$this->monBd;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monBd<10) $dat="0".$this->monBd;
       // $min="".$this->minutesBd;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesBd<10) $min="0".$this->minutesBd;
       // $sek="".$this->secondsBd;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsBd<10) $sek="0".$this->secondsBd;
       // echo '<h5>Последнее изменение БД '.$chislo.'.'.$dat.'.'.$this->yearBd.'. <span>Время изменения <span>'.$this->hoursBd.':'.$min.':'.$sek.'</span></span></h5>';
       // echo '<h6>Используемые языки: HTML,CSS,PHP,MySQL</h6>';
     }
}   // Конец класса футтер
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class statistic  extends futter // // Класс работа со статистикой
{
  public function __construct()
  {
     parent::__construct();

     parent::createTab(
       'name=statistik_dfdx',
       'poleN=statik_true',
       'poleT=int',
       'poleS=0',
       'poleN=n_zapros',
       'poleT=int',
       'poleS=0',
       'poleN=d_zapros',
       'poleT=DATE',
       'poleS=1000-01-01'
     );
     parent::createTab(
      'name=slegka_dfdx',
      'poleN=id',
      'poleT=int',
      'poleS=0',
      'poleN=metka',
      'poleT=VARCHAR(500)',
      'poleS=-',
      'poleN=zaprosov',
      'poleT=int',
      'poleS=0'//,'просмотр'
    );

  }
  
  public function statistikOnOff()
  {
      if (isset($_POST['buttonStatistik']))
      {
        if ($_POST['buttonStatistik']=='Включить статистику запроссов к БД (функция zaprosSQL)')
           parent::zaprosSQL("UPDATE statistik_dfdx SET statik_true=1 WHERE 1");
        if ($_POST['buttonStatistik']=='Выключить статистику запроссов к БД (функция zaprosSQL)')
           parent::zaprosSQL("UPDATE statistik_dfdx SET statik_true=0 WHERE 1");
      }
      //echo 'нажата кнопка статистики';
      $rez=parent::zaprosSQL("SELECT statik_true FROM statistik_dfdx WHERE 1");
      $stroka=mysqli_fetch_assoc($rez);

      if ($stroka['statik_true']==0) {$classButtonStatik='classButtonStatikFalse'; $valueButtonStatik="Включить статистику запроссов к БД (функция zaprosSQL)";}
      else {$classButtonStatik='classButtonStatikTrue';$valueButtonStatik="Выключить статистику запроссов к БД (функция zaprosSQL)";}

      //кнока включить-выключить статистику запросов в БД
      echo '<section class="container-fluid">';
      echo '<div class="row">';
      echo '<div class="buttonStatistikDiv">';
      echo '<form action="redaktor.php" method="post">';
      echo '<input type="submit" class="'.$classButtonStatik.' btn" value="'.$valueButtonStatik.'" name="buttonStatistik">';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</section>';

  }
  public function dataObnov()
  {
    $rez=parent::zaprosSQL("SELECT d_zapros FROM statistik_dfdx WHERE 1");
    $stroka=mysqli_fetch_assoc($rez);
    return $stroka['d_zapros'];
  }
  public function kolZaprosow() // число запросов к базе данных
  {
    $rez=parent::zaprosSQL("SELECT n_zapros FROM statistik_dfdx WHERE 1");
    $stroka=mysqli_fetch_assoc($rez);
    return $stroka['n_zapros'];
  }
  public function metkaStatistika($metka)  // увеличение запроссов к метке на 1
  {
    $rez=parent::zaprosSQL("SELECT id FROM slegka_dfdx WHERE metka='".$metka."'");
    $stroka=mysqli_fetch_assoc($rez);
    if (parent::notFalseAndNULL($stroka) && $stroka['id']>0) {
      $id=$stroka['id'];
      $rez=parent::zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
      $stroka=mysqli_fetch_assoc($rez);
      $stroka['zaprosov']++;
      parent::zaprosSQL("UPDATE slegka_dfdx SET zaprosov=".$stroka['zaprosov']." WHERE id=".$id);
    } else parent::zaprosSQL("INSERT INTO slegka_dfdx(id, metka, zaprosov) VALUES (".parent::maxIdLubojTablicy('slegka_dfdx') .",'".$metka."',1)");
  }
  public function getMetkaStatistik($metka) // чтение числа запроссов к метке
  {
    $rez=parent::zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
    
    $stroka=mysqli_fetch_assoc($rez); 

    if (!$stroka || is_null($stroka)) return 0;

    return $stroka['zaprosov'];
  }
}

class poisk extends statistic // // Класс работа со статистикой
{
 function __construct()
  {
     parent::__construct();
  }

  // Функция поиска статьи по слову, возвращает массив с ID найденных статей
  public function poiskStati($nametablic,$slowo,&$masRezult=array(),...$data)
  {
    $help=false;
    $rezPoiska=0;
    $autor=false;
    $autor_login='';
    $razdel=false;
    $razdel_text='';
    $uslovie=1;
    $masRezult[0]=-1;
    $i=0;
    foreach($data as $value) 
    if (stripos('sss'.$value,'help') || stripos('sss'.$value,'помощь'))
     $help=true;

    foreach($data as $value) 
     if (stripos('sss'.$value,'заголовки'))
      $rezPoiska=1;

    foreach($data as $value) 
      if (stripos('sss'.$value,'текст'))
       $rezPoiska=2;

    foreach($data as $value) 
      if (stripos('sss'.$value,'автор'))
      {
       $autor=true;
       $autor_login=preg_replace('/автор-/','',$value);
      }

      foreach($data as $value) 
      if (stripos('sss'.$value,'категория'))
      {
       $razdel=true;
      }


    $smegnyeKategorii = array(); // массив со смежными категориями
    $iSmegKat=0;
    $masWhere = array();
    $masWhereI=0;
    $rez=false;
    if (!$autor && $razdel)
     $rez=parent::zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE 1"); //прочитать все категории из базы
    if ($autor && $razdel)
     $rez=parent::zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE login_redaktora='".$autor_login."'"); //прочитать все категории из базы 

   if ($razdel && $rez!==false) // Если нашли заданные разделы, то найти комбинированные разделы например html3 входит в html3html5
    while(!is_null($stroka=mysqli_fetch_array($rez))) 
      if (!parent::proverkaMassiwa($smegnyeKategorii,$stroka[0])) // если такой категории в массиве нет
       {
        foreach($data as $value) 
         if (stripos('sss'.$value,'категория-'))       // Если проверяемая категория входит в перечень тех категорий, которые есть на входе функции
          {
           $razdelTest=preg_replace('/категория-/','',$value); // Удалить лишнее
            if (stripos('sss'.$stroka[0],$razdelTest))
             {
              $smegnyeKategorii[$iSmegKat++]=$stroka[0];
              $razdel=true;
             }
          }
       }
    if ($razdel)   // 
     {
      // если задан логин, то добавить его в запрос
      if ($razdel) $uslovie='';
      if ($autor) $uslovie='login_redaktora="'.$autor_login.'" AND ';
        foreach($smegnyeKategorii as $value) 
         {
            $uslovie=$uslovie.'razdel="'.$value.'"';
            $masWhere[$masWhereI++]=$uslovie;
            $uslovie='';
            if ($autor) $uslovie='login_redaktora="'.$autor_login.'" AND '; 
          }
       // Имеем массив с условиями запроссов связанных с категориями и логином $masWhere
      }
        if (!$razdel && !$autor) $uslovie=1; // Если не задан автор и не заданы категории, то смотрим все
        if (!$razdel && $autor) $uslovie="login_redaktora='".$autor_login."'"; // Если задан только автор
         
      $i=0;
      if ($razdel) //если разделы были заданы, то перебираем статьи по каждому разделу
       foreach($masWhere as $value) // перебираем массив с условиями запросов, зависящими от логинов и категорий
        {
          if ($rezPoiska==0) $zapros="SELECT id,name,news FROM ".$nametablic." WHERE ".$value;
          if ($rezPoiska==1) $zapros="SELECT id,name FROM ".$nametablic." WHERE ".$value;
          if ($rezPoiska==2) $zapros="SELECT id,news FROM ".$nametablic." WHERE ".$value;
          $rez=parent::zaprosSQL($zapros);
          while(!is_null($stroka=mysqli_fetch_assoc($rez))) 
          {
            if ($rezPoiska==0 && (stripos('sss'.$stroka['name'],$slowo) || stripos('sss'.$stroka['news'],$slowo))) $masRezult[$i++]=$stroka['id'];
            if ($rezPoiska==1 && stripos('sss'.$stroka['name'],$slowo)) $masRezult[$i++]=$stroka['id'];
            if ($rezPoiska==2 && stripos('sss'.$stroka['news'],$slowo)) $masRezult[$i++]=$stroka['id'];
          }
        }
       
      if (!$razdel) //если разделы не были заданы, то перебираем все статьи 
       {
        if ($rezPoiska==0) $zapros="SELECT id,name,news FROM ".$nametablic." WHERE ".$uslovie;
        if ($rezPoiska==1) $zapros="SELECT id,name FROM ".$nametablic." WHERE ".$uslovie;
        if ($rezPoiska==2) $zapros="SELECT id,news FROM ".$nametablic." WHERE ".$uslovie;
        $rez=parent::zaprosSQL($zapros);
        while (!is_null($stroka=mysqli_fetch_assoc($rez))) 
        {
         if ($rezPoiska==0 && (stripos('sss'.$stroka['name'],$slowo) || stripos('sss'.$stroka['news'],$slowo))) $masRezult[$i++]=$stroka['id'];
         if ($rezPoiska==1 && stripos('sss'.$stroka['name'],$slowo)) $masRezult[$i++]=$stroka['id'];
         if ($rezPoiska==2 && stripos('sss'.$stroka['news'],$slowo)) $masRezult[$i++]=$stroka['id'];
        }
       }

     $masRezult=array_unique ($masRezult);
     $mas=$masRezult;
     $i=-1;
     foreach($mas as $value)
      $i++;
     foreach($mas as $value)
      $masRezult[$i--]=$value;
     


    if ($help)
    {
      echo '<p class="mesage">Функция совершает поиск статьи по слову.</p>';
      echo '<p class="mesage">Первый параметр - это имя таблицы, в которой производим поиск</p>';
      echo '<p class="mesage">Второй параметр - это искомое слово.</p>';
      echo '<p class="mesage">Третий параметр - это массив, в который возвращаются ID номера найденных статей.</p>';

      echo '<p class="mesage">Не обязательные параметры</p>';
      echo '<p class="mesage">Ключевое слово "заголовки", производит поиск только по заголовкам. По умолчанию поиск максимальный</p>';
      echo '<p class="mesage">Ключевое слово "текст", производит поиск только по текстам. По умолчанию поиск максимальный</p>';
      echo '<p class="mesage">Для поиска по заголовкам и тексту не вводим ни параметр "заголовки" ни "текст"</p>';

      echo '<p class="mesage">Фильтр по автору "автор-логин"</p>';
      echo '<p class="mesage">Фильтр по категории "категория-имя категории"</p>';
      echo '<p class="mesage"></p>';
      echo '<p class="mesage"></p>';
      $masRezult[0]=-1;
    }

  }
  
}

?>