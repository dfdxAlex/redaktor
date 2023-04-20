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

    // функция рисует кнопку с использованием параметров префикса и переменной. 
    // Работает с функцией buttonHanter()
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
       $this->checkbox=true;
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

          // Кнопка из Url
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='buttonUrl') 
              if ($this->buttonUrl($parametr, $i)) continue;

        
          echo formblockmas\FactoryForFormBlockMas::factoryForFormBlockMas($value,$parametr,$i,$nameBlock, $actionN, true);

          // Контейнер Color
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='color') 
              if ($this->colorF($parametr, $i)) continue;

          // Контейнер div
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='div') 
              if ($this->divF($parametr, $i)) continue;
          
          // Контейнер checkbox
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='checkbox') 
              if ($this->checkboxF($parametr, $i)) continue;

          // Контейнер radio
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='radio') 
              if ($this->radioF($parametr, $i)) continue;

          // Контейнер ul и ol
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='ulli' || $value=='olli') 
              if ($this->ulli($parametr, $i)) continue;

          // Контейнер dl
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='dlli') 
              if ($this->dlli($parametr, $i)) continue;

          // Контейнер select
          // рабочая функция находится в IF и всегда выдает TRUE - это сделано для того, чтобы не ставить фигурные скобки для CONTINUE
          // CONTINUE нужен для того, чтобы выйти при отработке функции из цикла
          // рабочая функция увеличивает переменную счётчика $i на число параметров, переданных через условие. (сократить вход в FOR)
          if ($value=='select') 
              if ($this->selectF($parametr, $i)) continue;
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

        // Контейнер select
        function selectF(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          $j = $i;
          $mas = [];
          $jMas=0;
          // создать массив со всеми найденными параметрами
          // параметры пунктов для выбора
          
          while($this->searchParam($parametr, $j+4)) {
            
            //если параметры заданы простым способом _value=name-userText
            if (stripos($parametr[$j+5],'pull:')===false) 
                $mas[$jMas]=$parametr[$j+5];
            else {
                 //если находим строку с началом pull: то разбераем её на отдельные параметры и заносим в массив
                 $paramText=preg_replace('/pull:/','',$parametr[$j+5]);
                 $paramMas=preg_split('/_value=/',$paramText);
                 foreach($paramMas as $value) 
                      if ($value!='')
                          $mas[$jMas++]='_value='.$value;
                 
            }
            //--
            $j++;
            $jMas++;
          }
          //var_dump($mas);
          // определить класс, если он есть
          $elementFoClass=$parametr[++$i];
          // определить id, если он есть
          $elementFoId=$parametr[++$i];
          $class='';
          $id='';
          // определить параметр name
          $elementFoName=$parametr[++$i];
          // работа с дополнительной информацией
          // найти multiple
          $multiple=false;
          $elementFoMultiple=$parametr[++$i]; // i+4

          $multiple='';
          if (mb_strripos($elementFoMultiple,'multiple')!==false) 
              $multiple='multiple';

          // найти label
          $label=false;
          $elementFoMultiple=$parametr[$i];
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
                $textFoOptionString='Название не определено';
                if (isset($valueFoOption[2]))
                    $textFoOptionString=$valueFoOption[2];
                $rez.="<option $selected $disabled $valueFoOptionString $idFoOption>$textFoOptionString</option>";
              }

              if (mb_strripos($value,'_group=')!==false) {
                $valueFoGroup='label="'.preg_replace('/_group=/','',$value).'"';
                $rez.="<optgroup $valueFoGroup>";
              } else if (mb_strripos($value,'_group')!==false) {
                $rez.="</optgroup>";
              }

          } //конец foreach
          $rez.="</select>";
          echo $rez;
        
          $i=$j+3;
          return true;
        }

        // Контейнер dl
        function dlli(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          $j = $i+2;
          $mas = [];
          $jMas=0;
          // создать массив со всеми найденными параметрами
          while($this->searchParam($parametr, $j)) {
            
            if (stripos($parametr[++$j],'pull:')===false) 
                $mas[$jMas++]=$parametr[$j];
                
            else {
                 //если находим строку с началом pull: то разбераем её на отдельные параметры и заносим в массив
                 $paramText=preg_replace('/pull:/','',$parametr[$j]);
                 $paramMas=preg_split('/\-/',$paramText);
                 foreach($paramMas as $value) 
                      if ($value!='') 
                          $mas[$jMas++]=$value;
            }
          }
          // определить класс, если он есть
          $elementFoClass=$parametr[++$i];
          // определить id, если он есть
          $elementFoId=$parametr[++$i];
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
          $i=$j+2;
          return true;
        }
    
        // Контейнер ul и ol
        function ulli(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          $j = $i+2;
          $mas = [];
          $jMas=0;
          //echo $parametr[$i];
          $teg='ul';
          if ($parametr[$i]=='olli') $teg='ol';
          // создать массив со всеми найденными параметрами
          while($this->searchParam($parametr, $j)) {
            if ($j>100) throw new Error('цикл'); //удалить
            if (stripos($parametr[++$j],'pull:')===false) 
                $mas[$jMas++]=$parametr[$j];
            else {
                 //если находим строку с началом pull: то разбераем её на отдельные параметры и заносим в массив
                 $paramText=preg_replace('/pull:/','',$parametr[$j]);
                 $paramMas=preg_split('/\-/',$paramText);
                 foreach($paramMas as $value) 
                      if ($value!='') 
                          $mas[$jMas++]=$value;
            
            }
          }
          // определить класс, если он есть
          $elementFoClass=$parametr[++$i];
          // определить id, если он есть
          $elementFoId=$parametr[++$i];
          $class='';
          $id='';
          if ($elementFoClass!='') // если параметр не пустой, то оформить сласс
              $class="class='$elementFoClass'";
          if ($elementFoId!='') // если параметр не пустой, то оформить сласс
              $id="id='$elementFoId'"; 

          $rez="<$teg $class $id>";
          foreach($mas as $key=>$value) { //нарисовать под каждый параметр элемент списка
              if ($elementFoClass!='')    // если есть параметр класса во входящих параметрах, то создать класс из него для li
                  $classFoLi="class='$elementFoClass$key'";
              else $classFoLi='';
              if ($elementFoId!='')       // если есть параметр id во входящих параметрах, то создать id из него для li
                  $idFoLi="id='$elementFoId$key'";

              else $idFoLi='';

              $rez.="<li $classFoLi $idFoLi>$value</li>";
          }
          $rez.="</$teg>";
          echo $rez;
          $i=$j+2;
          return true;
        }

        // Контейнер Radio
        function radioF(array $parametr, int &$i)
        {
          $checkedLocal=false;
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) {
              $name=$parametr[++$i];
              // если в первом параметре name есть слово -checked, то записать флаг в переменную $checkedLocal, а флаг удалить из имени
              if (mb_strripos($name,'-checked')) {
                $checkedLocal=true;
                $name=preg_replace('/-checked/','',$name);
              }
          } else $name=$this->nameB.$value.$iForOld;
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='';  
          if ($this->searchParam($parametr, $i)) $valueV='value="'.$parametr[++$i].'"'; else $valueV=''; 
          if ($this->searchParam($parametr, $i)) $id=$parametr[++$i]; else $id='';  
          if ($this->checkbox || $checkedLocal) 
              $check='checked';
          else 
              $check='';
              $this->checkbox=false;
          echo "<label for='$id'>$textValue</label>";
          echo "<input type='radio' name='$name' id='$id' $valueV $check>";
          return true;
        }

        // Контейнер CheckBox
        function checkboxF(array $parametr, int &$i)
        {
          $checkedLocal=false;
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) {
              $name=$parametr[++$i];
              // если в первом параметре name есть слово -checked, то записать флаг в переменную $checkedLocal, а флаг удалить из имени
              if (mb_strripos($name,'-checked')) {
                $checkedLocal=true;
                $name=preg_replace('/-checked/','',$name);
              }
          } else $name=$this->nameB.$value.$iForOld; 
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue=''; 
          if ($this->searchParam($parametr, $i)) $valueV='value="'.$parametr[++$i].'"'; else $valueV=''; 
          if ($this->searchParam($parametr, $i)) $id=$parametr[++$i]; else $id=''; 
        if ($this->checkbox || $checkedLocal) 
            $check='checked';
        else 
            $check='';
        $this->checkbox=false;
        echo "<label for='$id'>$textValue</label>";
        echo "<input type='checkbox' name='$name' id='$id' $check $valueV>";
          return true;
        }

        // Контейнер Div
        function divF(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) $mesage=$parametr[++$i]; else $mesage=''; 
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue=''; 
          if ($this->searchParam($parametr, $i)) $id="id='".$parametr[++$i]."'"; else $id=''; 
          $class=$id;
          echo "<div $class $id>$mesage</div>";
          return true;
        }

        // Контейнер Color
        function colorF(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) $name=$parametr[++$i]; else $name=$this->nameB.$value.$iForOld;
          echo "<input type='color' name='$name' id='$name'>";
          return true;
        }

        // Кнопка из Url, тега а
        function buttonUrl(array $parametr, int &$i)
        {
          $iForOld=$i; // Сохраняем значение $i для совместимости со старыми функциями formBlock()
          if ($this->searchParam($parametr, $i)) $textValue=$parametr[++$i]; else $textValue='Ok'; 
          if ($this->searchParam($parametr, $i)) $textWww=$parametr[++$i]; else $textWww=$this->actionForm; 
          if ($this->searchParam($parametr, $i)) $class=$parametr[++$i]; else $class='';  
          $class=$this->nameB.$iForOld;
          $classFoDiv=$class;
          if (!$this->zeroStyle) {
            if ($this->btnStart)
                $class='btn '.$this->btnBtn.$class;
            else
                $class=$class.' btn '.$this->btnBtn;
          }
          echo "<div class='{$class}FoDivDiv'><a class='$class' href='$textWww'>$textValue</a></div>";
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
      if ($this->searchParam($parametr, $i)) 
          $kolWoBr=$parametr[++$i];
      else 
          $kolWoBr=1;

      if (!is_int($kolWoBr)) $kolWoBr=1; //если не задано число знаков br, то равно 1
      for($j=0; $j<$kolWoBr; $j++) {
          echo '<br>';
          if ($j>100) throw new \Error("$kolWoBr цикл 1016"); //удалить
      }

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


           /**
            * Фабрика возвращает объект с нужным элементом
            */
           echo formblockmas\FactoryForFormBlockMas::factoryForFormBlockMas($value,$parametr,$i);
           $i++; 
        }
        
        echo '</div>'; // конец внутреннего блока

        if (!$form_not_close) 
            echo '</form>';
        echo '</div>';
        if (!$zero_style) 
            echo '</div></section>';
    }

  /**
   * Функция обертка, осталась для работы старого кода
   * Служебная функция проверяет не является ли параметр кнопкой
   */
   function searcTegFormBlock($parametr)
   {
        $obj = new formblock\SearcTegFormBlock;
        return $obj->searcTegFormBlock($parametr);
   }

   /**
    * Функция обертка, осталась для работы старого кода
    * Функция проверяет существует ли следующий элемент в массиве, 
    * не является ли он тегом для бутстрапа и не является ли он тегоm 
    * в принципе
    */
   function searchParam(array $parametr, int $i)
   {
        $obj = new formblock\SearchParam($parametr);
        return $obj->searchParam($parametr, $i);
   }
}
