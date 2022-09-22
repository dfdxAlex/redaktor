<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceButton
{

  public function buttonTwitter($text, $nameTD='bd2')
  {
    // получить ID статьи из входящего параметра
    // get the article ID from the input parameter
    $idNews=preg_match('/\d+\s/',$text,$masRez);
    if (count($masRez)<1) return;
    // вытащить по ИД название статьи из таблицы
    // pull out the title of the article from the table by ID
    if ($this->notFalseAndNULL($masRez))
        if ($masRez[0]>-1) {
          $zapros="SELECT name FROM ".$nameTD." WHERE id=".$masRez[0];
          $rez=$this->zaprosSQL($zapros);
          $stroka=mysqli_fetch_array($rez);
        }
    // заменить ИД в переменной $text на имя статьи, для дальнейшей передачи в кнопку твиттера
    // replace the ID in the $text variable with the name of the article, to be passed to the twitter button
    $text=preg_replace('/\d+\s/','',$text);
    $stroka[0].=$text;

    $textTwitter=preg_filter('/\s/','%20',$stroka[0]);
    echo '<br><br>';
    echo '<div class="buttonTwitterDiv">';
    echo '<a class="link-button-twitter-text" target="_blank"';
    echo ' href="https://twitter.com/intent/tweet?text='.$textTwitter.'">';
    echo 'Твитнуть</a>';
    echo '</div>';
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function formBlock($nameBlock, $actionN,...$parametr)
    {
       $this->nameB=$nameBlock;
       $form_not_open=false;          // Управляет выводом открывающего тега Форм, если фалс, то выводим.
       $form_not_close=false;         // Управляет выводом закрывающего тега Форм, если фалс, то выводим.
       $zero_style=false;             // если присутствует данный признак, то Bootstrap работать не будет
       $this->zeroStyle=$zero_style;
       $btn_start=false;              // если данный признак установить в true, то в классах кнопок btn будет на первом месте
       $btn_btn='';
       $checkbox=true;
       // поиск различных признаков.
       foreach ($parametr as $value) {// поиск признаков $form_not_open и $form_not_close=false;
           if ($value=='form_not_open') $form_not_open=true;
           if ($value=='form_not_close') $form_not_close=true;
           if ($value=='zero_style') $zero_style=true;
           if ($value=='btn_start') $btn_start=true;
           if ($value=='btn-primary') $btn_btn='btn-primary ';
           if ($value=='btn-secondary') $btn_btn='btn-secondary ';
           if ($value=='btn-success') $btn_btn='btn-success ';
           if ($value=='btn-danger') $btn_btn='btn-danger ';
           if ($value=='btn-warning') $btn_btn='btn-warning ';
           if ($value=='btn-info') $btn_btn='btn-info ';
           if ($value=='btn-light') $btn_btn='btn-light ';
           if ($value=='btn-dark') $btn_btn='btn-dark ';
           if ($value=='btn-link') $btn_btn='btn-link ';
        }
     
       //локальная переменная $zero_style исчезнет после полной модификации метода
       $this->zeroStyle=$zero_style;
       //локальная переменная $btn_start исчезнет после полной модификации метода
       $this->btnStart=$btn_start;
       //локальная переменная $btn_btn исчезнет после полной модификации метода
       $this->btnBtn=$btn_btn;

       $this->actionForm=$actionN;


       if (!$zero_style && !$form_not_open && !$form_not_close) {
           echo '<section class="container-fluid">';
           echo '<div class="row">';
       }

       if (!$form_not_open && !$form_not_close)
           echo '<div class="'.$this->nameB.'">';

       if (!$form_not_open)
           echo '<form action="'.$actionN.'" method="POST">';

       echo '<div class="'.$this->nameB.'-div">';

       //$i=0;
       //foreach ($parametr as $key => $value) {
       for ($i=0; $i<count($parametr); $i++) {
          $value=$parametr[$i];
          
          // устанавливает дивы с классами для BootStrap bootstrap
          if (stripos($value,'bootstrap')!==false) echo $this->tegiFoBootstrap($value);
          
          // устанавливает заданное число тегов <br>
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='br') 
              if ($this->tegiBr($parametr, $i)) continue;

          //устанавливает поле формы типа input type=text
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='text') 
              if ($this->tegiInputText($parametr, $i)) continue;

          //устанавливает поле формы типа input type=text вместо value - PlaceHolder
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='text2') 
              if ($this->tegiInputText2($parametr, $i)) continue;
           
          //устанавливает поле формы типа input type=text с подключеным тегом LABEL и PlaceHolder
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='textL') 
              if ($this->tegiInputTextL($parametr, $i)) continue;

          //устанавливает поле формы типа input type=text с подключеным тегом LABEL и PlaceHolder с добавленным BR
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='textLH') 
              if ($this->tegiInputTextLH($parametr, $i)) continue;

          // текстовое поле для ввода пароля
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='password') 
              if ($this->tegiInputParol($parametr, $i)) continue;

          // текстовое поле для ввода пароля
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='password2') 
              if ($this->tegiInputParol2($parametr, $i)) continue;
         
          // текстовое поле для ввода текста
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='textarea') 
              if ($this->tegiInputTextArea($parametr, $i)) continue;

          // Кнопка Reset
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='reset') 
              if ($this->tegiInputButtonReset($parametr, $i)) continue;

          // Кнопка Reset
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='submit' || $value=='submit2') 
              if ($this->tegiInputButtonSubmit($parametr, $i)) continue;


         if ($value=='submit3') {
             if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
               if (!$this->searcTegFor($parametr,$i,1)) $name=$parametr[$i+1]; else $name=$this->nameB.'submit'.$i; else $name=$nameBlock.'submit'.$i;
             if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
               if (!$this->searcTegFor($parametr,$i,2)) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $this->noBootstrap($parametr[$i+3]))
               if (!$this->searcTegFor($parametr,$i,3)) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
             if (isset($parametr[$i+4]) && $this->noBootstrap($parametr[$i+4]))
               if (!$this->searcTegFor($parametr,$i,4)) $class=$parametr[$i+4]; else $class=''; else $textWww='';
             $class=$this->nameB.$name.$i;
             $classFoDiv=$class;
             if (!$zero_style) {
                 if ($btn_start)
                     $class='btn '.$class;
                 if (!$btn_start)
                     $class=$class.' btn';
             }
             echo '<div class="'.$classFoDiv.'Div"><input type="submit" id="'.$name.'" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'"></div>';
           }
           //кнопка из Url
          if ($value=='buttonUrl') {
           if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
             if (!$this->searcTegFor($parametr,$i,1)) $textValue=$parametr[$i+1]; else $textValue='Ok'; else $textValue='Ok';
           if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
             if (!$this->searcTegFor($parametr,$i,2)) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
           if (isset($parametr[$i+3]) &&  $this->noBootstrap($parametr[$i+3]))
             if (!$this->searcTegFor($parametr,$i,3)) $class=$parametr[$i+4]; else $class=''; else $textWww='';
           $class=$this->nameB.$name.$i;
           $classFoDiv=$class;
           if (!$zero_style) {
               if ($btn_start)
                   $class='btn '.$class;
               if (!$btn_start)
                   $class=$class.' btn';
           }
           echo '<div class="'.$classFoDiv.'Div"><a class="'.$class.'" href="'.$textWww.'">'.$textValue.'</a></div>';
         }
         if ($value=='p' || $value=='h1' || $value=='h2' || $value=='h3' || $value=='h4' || $value=='h5' || $value=='h6') {
             if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
               if (!$this->searcTegFor($parametr,$i,1)) $text=$parametr[$i+1]; else $text=''; else $text='';
             if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
               if (!$this->searcTegFor($parametr,$i,2)) $class=$parametr[$i+2]; else $class=$this->nameB.$value.$i; else $class=$class=$nameBlock.$value.$i;
             echo '<div class="'.$class.'PH"><'.$value.' class="'.$class.'" id="'.$class.'">'.$text.'</'.$value.'></div>';
           }
         if ($value=='span') {
             if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
               if (!$this->searcTegFor($parametr,$i,1)) $text=$parametr[$i+1]; else $text=''; else $text='';
             if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
               if (!$this->searcTegFor($parametr,$i,2)) $class=$parametr[$i+2]; else $class=$this->nameB.$value.$i; else $class=$class=$nameBlock.$value.$i;
             echo '<'.$value.' class="'.$class.'">'.$text.'</'.$value.'>';
           }
          if ($value=='color') {
            if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
              if (!$this->searcTegFor($parametr,$i,1)) $name=$parametr[$i+1]; else $name=$this->nameB.$value.$i; else $name=$nameBlock.$value.$i;
            echo '<input type="color" name="'.$name.'" id="'.$name.'">';
          }
          if ($value=='div') {
            if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
              if (!$this->searcTegFor($parametr,$i,1)) $mesage=$parametr[$i+1]; else $mesage=''; else $mesage='';
          if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
            if (!$this->searcTegFor($parametr,$i,2)) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
          if (isset($parametr[$i+3]) && $this->noBootstrap($parametr[$i+3]))
            if (!$this->searcTegFor($parametr,$i,3)) $id="id='".$parametr[$i+3]."'"; else $id=''; else $id='';
          echo "<div $class $id>$mesage</div>";
          }
          if ($value=='checkbox') {
            if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
              if (!$this->searcTegFor($parametr,$i,1)) $name=$parametr[$i+1]; else $name=$this->nameB.$value.$i; else $name=$nameBlock.$value.$i;
            if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
              if (!$this->searcTegFor($parametr,$i,2)) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            if (isset($parametr[$i+3]) && $this->noBootstrap($parametr[$i+3]))
              if (!$this->searcTegFor($parametr,$i,3)) $valueV='value="'.$parametr[$i+3].'"'; else $valueV=''; else $valueV='';
            if (isset($parametr[$i+4]) && $this->noBootstrap($parametr[$i+4]))
              if (!$this->searcTegFor($parametr,$i,4)) $id='id="'.$parametr[$i+4].'"'; else $id=''; else $id='';
            if ($checkbox) 
                $check='checked';
            else 
                $check='';
            $checkbox=false;
            echo "<label for='$name$i'>$textValue</label>";
            echo "<input type='checkbox' name='$name' $id $check $valueV>";
          }
          if ($value=='radio') {
            if (isset($parametr[$i+1]) && $this->noBootstrap($parametr[$i+1]))
              if (!$this->searcTegFor($parametr,$i,1)) $name=$parametr[$i+1]; else $name=$this->nameB.$value.$i; else $name=$nameBlock.$value.$i;
            if (isset($parametr[$i+2]) && $this->noBootstrap($parametr[$i+2]))
              if (!$this->searcTegFor($parametr,$i,2)) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
            if (isset($parametr[$i+3]) && $this->noBootstrap($parametr[$i+3]))
              if (!$this->searcTegFor($parametr,$i,3)) $valueV='value="'.$parametr[$i+3].'"'; else $valueV=''; else $valueV='';
            if (isset($parametr[$i+4]) && $this->noBootstrap($parametr[$i+4]))
              if (!$this->searcTegFor($parametr,$i,4)) $id='id="'.$parametr[$i+4].'"'; else $id=''; else $id='';
            if ($checkbox) 
                $check='checked';
            else 
                $check='';
                $checkbox=false;
            echo "<label for='$name'>$textValue</label>";
            echo "<input type='radio' name='$name' $id $check $valueV >";
          }
          // список ul
          if ($value=='ulli') {
            $j = $i;
            $mas = [];
            $jMas=0;
            // создать массив со всеми найденными параметрами
            while(isset($parametr[$j+3]) && $this->noBootstrap($parametr[$j+3]) && !$this->searcTegFor($parametr,$j+3,1)) {
              $mas[$jMas]=$parametr[$j+3];
              $j++;
              $jMas++;
            }
            // определить класс, если он есть
            $elementFoClass=$parametr[$i+1];
            // определить id, если он есть
            $elementFoId=$parametr[$i+2];
            $class='';
            $id='';
            if ($elementFoClass!='') // если параметр не пустой, то оформить сласс
                $class="class='$elementFoClass'";
            if ($elementFoId!='') // если параметр не пустой, то оформить сласс
                $id="id='$elementFoId'";   
            $rez="<ul $class $id>";
            foreach($mas as $key=>$value) { //нарисовать под каждый параметр элемент списка
                if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для li
                    $classFoLi="class='$elementFoClass$key'";
                else $classFoLi='';
                if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для li
                    $idFoLi="id='$elementFoId$key'";
                else $idFoLi='';
                $rez.="<li $classFoLi $idFoLi>$value</li>";
            }
            $rez.="</ul>";
            echo $rez;
          }

          // список ol
          if ($value=='olli') {
            $j = $i;
            $mas = [];
            $jMas=0;
            // создать массив со всеми найденными параметрами
            while(isset($parametr[$j+3]) && $this->noBootstrap($parametr[$j+3]) && !$this->searcTegFor($parametr,$j+3,1)) {
              $mas[$jMas]=$parametr[$j+3];
              $j++;
              $jMas++;
            }
            // определить класс, если он есть
            $elementFoClass=$parametr[$i+1];
            // определить id, если он есть
            $elementFoId=$parametr[$i+2];
            $class='';
            $id='';
            if ($elementFoClass!='') // если параметр не пустой, то оформить сласс
                $class="class='$elementFoClass'";
            if ($elementFoId!='') // если параметр не пустой, то оформить сласс
                $id="id='$elementFoId'";   
            $rez="<ol $class $id>";
            foreach($mas as $key=>$value) { //нарисовать под каждый параметр элемент списка
                if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для li
                    $classFoLi="class='$elementFoClass$key'";
                else $classFoLi='';
                if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для li
                    $idFoLi="id='$elementFoId$key'";
                else $idFoLi='';
                $rez.="<li $classFoLi $idFoLi>$value</li>";
            }
            $rez.="</ol>";
            echo $rez;
          }

          // список dl
          if ($value=='dlli') {
            $j = $i;
            $mas = [];
            $jMas=0;
            // создать массив со всеми найденными параметрами
            while(isset($parametr[$j+3]) && $this->noBootstrap($parametr[$j+3]) && !$this->searcTegFor($parametr,$j+3,1)) {
              $mas[$jMas]=$parametr[$j+3];
              $j++;
              $jMas++;
            }
            // определить класс, если он есть
            $elementFoClass=$parametr[$i+1];
            // определить id, если он есть
            $elementFoId=$parametr[$i+2];
            $class='';
            $id='';
            if ($elementFoClass!='') // если параметр не пустой, то оформить сласс
                $class="class='$elementFoClass'";
            if ($elementFoId!='') // если параметр не пустой, то оформить сласс
                $id="id='$elementFoId'";   
            $rez="<dl $class $id>";

            foreach($mas as $key=>$value) { //нарисовать под каждый параметр элемент списка
                if ($key%2==0 && $key!=1) { // Заходим в блок только на чётных элементах массива, в тегах используются парные данные
                    //определить класс и id для тегов dt
                    if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для li
                        $classFoLi="class='dt$elementFoClass$key'";
                    else $classFoLi='';
                    if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для li
                        $idFoLi="id='dt$elementFoId$key'";
                    else $idFoLi='';
                    $rez.="<dt $classFoLi $idFoLi>$value</dt>";
                }
                if ($key%2!=0 && $key!=0 || $key==1) { // Заходим в блок только на чётных элементах массива, в тегах используются парные данные
                  //определить класс и id для тегов dt
                  if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для li
                      $classFoLi="class='dd$elementFoClass$key'";
                  else $classFoLi='';
                  if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для li
                      $idFoLi="id='dd$elementFoId$key'";
                  else $idFoLi='';
                  $rez.="<dd $classFoLi $idFoLi>$value</dd>";
              }
            }
            $rez.="</dl>";
            echo $rez;
          }

          // список select
          if ($value=='select') {
            $j = $i;
            $mas = [];
            $jMas=0;
            // создать массив со всеми найденными параметрами
            while(isset($parametr[$j+5]) && $this->noBootstrap($parametr[$j+5]) && !$this->searcTegFor($parametr,$j+5,1)) {
              $mas[$jMas]=$parametr[$j+5];
              $j++;
              $jMas++;
            }
            // определить класс, если он есть
            $elementFoClass=$parametr[$i+1];
            // определить id, если он есть
            $elementFoId=$parametr[$i+2];
            $class='';
            $id='';
            // определить параметр name
            $elementFoName=$parametr[$i+3];
            // работа с дополнительной информацией
            // найти multiple
            $multiple=false;
            $elementFoMultiple=$parametr[$i+4];

            $multiple='';
            if (mb_strripos($elementFoMultiple,'multiple')!==false) 
                $multiple='multiple';
            // найти label
            $label=false;
            $elementFoMultiple=$parametr[$i+4];
            if (mb_strripos($elementFoMultiple,'label')!==false) 
                $label=true; 
            // выделить текст для label
            $labelText='';  
            if ($label) {
                $labelText=$elementFoMultiple;
                $labelText=preg_replace('/multiple/','',$labelText);
                $labelText=preg_replace('/label=/','',$labelText);
                $labelText=preg_replace('/,/','',$labelText);
            }     
            if ($elementFoClass!='') // если параметр не пустой, то оформить сласс
                $class="class='$elementFoClass'";
            $for='';
            if ($elementFoId!='') { // если параметр не пустой, то оформить сласс и сразу атрибут for для label
                $id="id='$elementFoId'"; 
                $for="for='$elementFoId'";
            }  
            if ($elementFoName!='') // если параметр не пустой, то оформить NAME
                $name="name='$elementFoName'"; 
            if ($label) 
                $rez="<label $for>$labelText</label>";
            else $rez='';
            $rez.="<select $multiple $class $id $name>";

            foreach($mas as $key=>$value) { //нарисовать под каждый параметр элемент списка
                if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для option
                    $classFoOption="class='$elementFoClass$key'";
                else $classFoOption='';
                if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для option
                    $idFoOption="id='$elementFoId$key'";
                else $idFoOption='';
                $disabled='';
                if (mb_strripos($value,'-disabled')) {
                    $disabled='disabled';
                    $value=preg_replace('/-disabled/','',$value);
                }
                $selected='';
                if (mb_strripos($value,'-selected')) {
                    $selected='selected';
                    $value=preg_replace('/-selected/','',$value);
                }
                if (mb_strripos($value,'_value')!==false) {
                  $valueFoOption=preg_split('/(=)|(-)/',$value);
                  $valueFoOptionString='value="'.$valueFoOption[1].'"';
                  $textFoOptionString=$valueFoOption[2];
                  $rez.="<option $selected $disabled $valueFoOptionString $idFoOption>$textFoOptionString</option>";
                }
                if (mb_strripos($value,'_group=')!==false) {
                  $valueFoGroup='label="'.preg_replace('/_group=/','',$value).'"';
                  $rez.="<optgroup $valueFoGroup>";
                } else if (mb_strripos($value,'_group')!==false) {
                  $rez.="</optgroup>";
                }
            }
            $rez.="</select>";
            echo $rez;
          }

           //$i++; 
        }
        
        echo '</div>'; // конец внутреннего блока

        if (!$form_not_close)
            echo '</form>';
        if (!$form_not_close && !$form_not_open)
            echo '</div>';
        if (!$zero_style && !$form_not_close && !$form_not_open) 
            echo '</div></section>';
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Вспомогательные функции для formBlock()

        // Кнопка типа Submit 1-2
        function tegiInputButtonSubmit(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'submit'.$iForOld;
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='Ok';
          if ($this->searchParam($parametr, $i)) $textWww=$parametr[++$i]; else $textWww=$this->actionForm;
          $class=$this->nameB.$name.$iForOld;
          if (!$this->zeroStyle) {
            if ($this->btnStart)
                $class='btn '.$this->btnBtn.$class;
            else
                $class=$class.' btn '.$this->btnBtn;
          }
          echo "<input type='submit' id='$name' name='$name' value='$textValue' class='$class' formaction='$textWww'>";
          return true;
        }

    // Кнопка типа Reset
    function tegiInputButtonReset(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
      if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='Reset';
      $class=$this->nameB.'reset'.$iForOld;
      if (!$this->zeroStyle) {
          if ($this->btnStart)
              $class='btn '.$this->btnBtn.$class;
          else
              $class=$class.' btn '.$this->btnBtn;
      }
      echo "<input type='reset' class='$class' value='$textValue'>";
      return true;
    }

  // текстовое поле для ввода текста
  function tegiInputTextArea(array $parametr, int &$i)
  {
    $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
    if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'text'.$iForOld;
    if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='';
    $class=$this->nameB.$name.$iForOld;
    echo "<textarea name='$name' class='$class'>$textValue</textarea>";
    return true;
  }

  // текстовое поле для ввода пароля c placeholder
  function tegiInputParol2(array $parametr, int &$i)
  {
    $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
    if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'password'.$iForOld; 
    if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue=''; 
    $class=$this->nameB.$name.$iForOld;
    echo '<input type="password" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
    return true;
}

    // текстовое поле для ввода пароля
    function tegiInputParol(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'password'.$iForOld;
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='';
      $class=$this->nameB.$name.$iForOld;
      echo "<input type='password' name='$name' value='$textValue' class='$class'>";
      return true;
    }
    //устанавливает поле формы типа input type=text с подключеным тегом LABEL и PlaceHolder с добавленным BR
    function tegiInputTextLH(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
      if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'text'.$iForOld; 
      if ($this->searchParam($parametr, $i)) $textValueFoLabel=$parametr[++$i]; else $textValueFoLabel='';
      if ($this->searchParam($parametr, $i)) $textValueFoText=$parametr[++$i]; else $textValueFoText='';
      $class=$this->nameB.$name.$iForOld;
      echo "<label for='{$class}label'>$textValueFoLabel </label><br>
            <input type='text' name='$name' class='$class' placeholder='$textValueFoText' id='$class'>";
      return true;
    }
    //устанавливает поле формы типа input type=text с подключеным тегом LABEL и PlaceHolder
    function tegiInputTextL(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
      if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'text'.$iForOld;
      if ($this->searchParam($parametr, $i)) $textValueFoLabel=$parametr[++$i]; else $textValueFoLabel='';
      if ($this->searchParam($parametr, $i)) $textValueFoText=$parametr[++$i]; else $textValueFoText='';
      $class=$this->nameB.$name.$iForOld;
      echo "<label for='{$class}label'>$textValueFoLabel </label>
            <input type='text' name='$name' class='$class' placeholder='$textValueFoText' id='$class'>";
      return true;
    }
    // устанавливает поле формы типа input type=text, вместо value PlaceHolder
    function tegiInputText2(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
      if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'text'.$iForOld;
      if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='';
      $class=$this->nameB.$name.$iForOld;
      echo "<input type='text' name='$name' placeholder='$textValue' class='$class'>";
      return true;
    }
    // устанавливает поле формы типа input type=text
    function tegiInputText(array $parametr, int &$i)
    {
      $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
      if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.'text'.$iForOld;
      if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='';
      $class=$this->nameB.$name.$iForOld;
      echo "<input type='text' name='$name' value='$textValue' class='$class'>";
      return true;
    } 

    // устанавливает функция некоторое число тегов <br>
    function tegiBr(array $parametr, &$i)
    {
      if (isset($parametr[$i+1]) && $parametr[$i+1]>1) 
          $kolWoBr=$parametr[++$i];
      else 
          $kolWoBr=1;
      for($j=0; $j<$kolWoBr; $j++)
          echo '<br>';
      return true;
    }

    // Функция устанавливает дивы с классами для разметки от BootStrap
    function tegiFoBootstrap(string $value)
    {
      if ($value=='bootstrap-start') {
        return '<section class="container-fluid">
              <div class="row">
              <div class="col-12">';
      }
      if ($value=='bootstrap-f-start') {
         return '</div></div>
               <div class="row">
               <div class="col-12">';
       }
      if ($value=='bootstrap-finish')
         return '</div></div></section>';
    }
    //////////////////////////////////////////////////// Конец вспомогательных функций для formBlock()/////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function formBlockMas(array $parametr)
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
       echo '<div class="'.$parametr[0].'">';
       if (!$form_not_open)
           echo '<form action="'.$parametr[1].'" method="POST">';
       echo '<div class="'.$parametr[0].'-div">';
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
                   if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'text'.$i; else $name=$parametr[0].'text'.$i;
               if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
                   if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
               $class=$parametr[0].$name.$i;
               echo '<input type="text" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
           }
         if ($value=='textarea') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'text'.$i; else $name=$parametr[0].'text'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
             $class=$parametr[0].$name.$i;
             echo '<textarea name="'.$name.'" class="'.$class.'">'.$textValue.'</textarea>';
           }
         if ($value=='text2') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'text'.$i; else $name=$parametr[0].'text'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
             $class=$parametr[0].$name.$i;
             echo '<input type="text" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
           }
         if ($value=='password') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'password'.$i; else $name=$parametr[0].'password'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
             $class=$parametr[0].$name.$i;
             echo '<input type="password" name="'.$name.'" value="'.$textValue.'" class="'.$class.'">';
           }
         if ($value=='password2') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'password'.$i; else $name=$parametr[0].'password'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue=''; else $textValue='';
             $class=$parametr[0].$name.$i;
             echo '<input type="password" name="'.$name.'" placeholder="'.$textValue.'" class="'.$class.'">';
           }
         if ($value=='reset') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $textValue=$parametr[$i+1]; else $textValue='Reset'; else $textValue='Reset';
             $class=$parametr[0].'reset'.$i;
             if (!$zero_style) echo '<input type="reset" class="'.$class.' btn" value="'.$textValue.'">';
             if ($zero_style) echo '<input type="reset" class="'.$class.' " value="'.$textValue.'">';
           }
         if ($value=='submit') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'submit'.$i; else $name=$parametr[0].'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$parametr[1]; else $textWww=$parametr[1];
             $class=$parametr[0].$name.$i;
             if (!$zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'">';
             if ($zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' " formaction="'.$textWww.'">';
           }
         if ($value=='submit2') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'submit'.$i; else $name=$parametr[0].'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$parametr[1]; else $textWww=$parametr[1];
             $class=$parametr[0].$i;
             if (!$zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'">';
             if ($zero_style) echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'">';
           }
         if ($value=='submit3') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$parametr[0].'submit'.$i; else $name=$parametr[0].'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$parametr[1]; else $textWww=$parametr[1];
             if (isset($parametr[$i+4]) && $parametr[$i+4]!='bootstrap-start' && $parametr[$i+4]!='bootstrap-f-start' && $parametr[$i+4]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3]) && !$this->searcTegFormBlock($parametr[$i+4])) $class=$parametr[$i+4]; else $class=''; else $textWww='';
             if (!$zero_style) echo '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.' btn" formaction="'.$textWww.'"></div>';
             if ($zero_style) echo '<div class="'.$class.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'"></div>';
           }
         if ($value=='p' || $value=='h1' || $value=='h2' || $value=='h3' || $value=='h4' || $value=='h5' || $value=='h6') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $text=$parametr[$i+1]; else $text=''; else $text='';
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $class=$parametr[$i+2]; else $class=$parametr[0].$value.$i; else $class=$class=$parametr[0].$value.$i;
             echo '<div class="'.$class.'PH"><'.$value.' class="'.$class.'">'.$text.'</'.$value.'></div>';
           }
         if ($value=='span') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $text=$parametr[$i+1]; else $text=''; else $text='';
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $class=$parametr[$i+2]; else $class=$parametr[0].$value.$i; else $class=$class=$parametr[0].$value.$i;
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
   function searcTegFormBlock($parametr)
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
   // функция проверяет не являются ли параметры тегами или на оборот
   // входящий параметр $parametr - это массив с входящими данными
   // $start - это стартовая позиция или позиция текущего обрабатываемого тега
   // $nom задает число параметров вперед, которые нужно проверить.
   // если один из необходимых параметров окажется тегом или названием объекта, то возвращаем true
   // УДАЛИТЬ ПОСЛЕ ПОЛНОЙ МОДЕРНИЗАЦИИ МЕТОДА formBlock
   function searcTegFor($parametr,$start,$nom)
   {
    for ($i=1; $i<=$nom; $i++)
           if ($this->searcTegFormBlock($parametr[$start+$i])) return true;
    return false;
   }

   // Функция проверяет существует ли следующий элемент в массиве, не является ли он тегом для бутстрапа и не является ли он тегов в принципе
   function searchParam(array $parametr, int $i)
   {
       if (isset($parametr[$i+1]))                              // если следующий параметр существует
           if ($this->noBootstrap($parametr[$i+1]))             // если это не разметка бутстрапа
               if (!$this->searcTegFormBlock($parametr[$i+1]))  // если это не следующая форма
                   return true;
       return false;
   }
   //функция проверяет, не находится ли в очередном параметре ключевые слова работы с бутстрапом
   function noBootstrap($attrib)
   {
        return match ($attrib) {
            'bootstrap-start'=>false,
            'bootstrap-f-start'=>false,
            'bootstrap-finish'=>false,
            default => true
        };
   }
}
