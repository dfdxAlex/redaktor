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


    public function formBlock($nameBlock, $actionN,...$parametr)
    {
       $form_not_open=false;          // Управляет выводом открывающего тега Форм, если фалс, то выводим.
       $form_not_close=false;         // Управляет выводом закрывающего тега Форм, если фалс, то выводим.
       $zero_style=false;             // если присутствует данный признак, то Bootstrap работать не будет
       $btn_start=false;              // если данный признак установить в true, то в классах кнопок btn будет на первом месте
       // поиск различных признаков.
       foreach ($parametr as $value) {// поиск признаков $form_not_open и $form_not_close=false;
           if ($value=='form_not_open') $form_not_open=true;
           if ($value=='form_not_close') $form_not_close=true;
           if ($value=='zero_style') $zero_style=true;
           if ($value=='btn_start') $btn_start=true;
        }
     
       if (!$zero_style && !$form_not_open && !$form_not_close) {
           echo '<section class="container-fluid">';
           echo '<div class="row">';
       }

       if (!$form_not_open && !$form_not_close)
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
             if (!$zero_style) {
                 if ($btn_start)
                     $class='btn '.$class;
                 if (!$btn_start)
                     $class=$class.' btn';
             }
             echo '<input type="reset" class="'.$class.'" value="'.$textValue.'">';
           }
         if ($value=='submit' || $value=='submit2') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
             $class=$nameBlock.$name.$i;
             if (!$zero_style) {
                 if ($btn_start)
                     $class='btn '.$class;
                 if (!$btn_start)
                     $class=$class.' btn';
             }
             echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'">';
           }
           /*
         if ($value=='submit2') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
             $class=$nameBlock.$name.$i;
             if (!$zero_style) {
                 if ($btn_start)
                     $class='btn '.$class;
                 if (!$btn_start)
                     $class=$class.' btn';
             }
             echo '<input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'">';
           }*/
         if ($value=='submit3') {
             if (isset($parametr[$i+1]) && $parametr[$i+1]!='bootstrap-start' && $parametr[$i+1]!='bootstrap-f-start' && $parametr[$i+1]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1])) $name=$parametr[$i+1]; else $name=$nameBlock.'submit'.$i; else $name=$nameBlock.'submit'.$i;
             if (isset($parametr[$i+2]) && $parametr[$i+2]!='bootstrap-start' && $parametr[$i+2]!='bootstrap-f-start' && $parametr[$i+2]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2])) $textValue=$parametr[$i+2]; else $textValue='Ok'; else $textValue='Ok';
             if (isset($parametr[$i+3]) && $parametr[$i+3]!='bootstrap-start' && $parametr[$i+3]!='bootstrap-f-start' && $parametr[$i+3]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3])) $textWww=$parametr[$i+3]; else $textWww=$actionN; else $textWww=$actionN;
             if (isset($parametr[$i+4]) && $parametr[$i+4]!='bootstrap-start' && $parametr[$i+4]!='bootstrap-f-start' && $parametr[$i+4]!='bootstrap-finish')
               if (!$this->searcTegFormBlock($parametr[$i+1]) && !$this->searcTegFormBlock($parametr[$i+2]) && !$this->searcTegFormBlock($parametr[$i+3]) && !$this->searcTegFormBlock($parametr[$i+4])) $class=$parametr[$i+4]; else $class=''; else $textWww='';
             $class=$nameBlock.$name.$i;
             $classFoDiv=$class;
             if (!$zero_style) {
                 if ($btn_start)
                     $class='btn '.$class;
                 if (!$btn_start)
                     $class=$class.' btn';
             }
             echo '<div class="'.$classFoDiv.'Div"><input type="submit" name="'.$name.'" value="'.$textValue.'" class="'.$class.'" formaction="'.$textWww.'"></div>';
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
             echo '<'.$value.' class="'.$class.'">'.$text.'</'.$value.'>';
           }
           $i++; 
        }
        
        echo '</div>'; // конец внутреннего блока

        if (!$form_not_close)
            echo '</form>';
        if (!$form_not_close && !$form_not_open)
            echo '</div>';
        if (!$zero_style && !$form_not_close && !$form_not_open) 
            echo '</div></section>';
    }

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
}
