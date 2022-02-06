<?php
namespace class\redaktor;

class menu implements interface\interface\InterfaceWorkToBd
 {
  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;

     public function __construct() {

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

         $this->connectToBd();
         $this->tableValidationCMS();
     }
      

     public function __destruct() {
        mysqli_close($this->con);
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
     //$this->__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
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
                    if ($this->typMenu($nameTablic)!=7) {
                     if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                        $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,7); 
                      }
                     if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,7);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
       for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
        while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default') {   
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
                if ($stroka['NAME']!='br') {
                    $textStart="";
                     if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                     echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                     $ii++;
                  } else echo '<br>';

           if ($stroka['ID']==$idPoz)
              if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                 if ($stroka['NAME']!='br') {
                         $textStart="";
                          if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                          echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                          $ii++;
                       } else echo '<br>';                  

        if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

        if ($stroka['ID']==$idPoz)
          if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
           if ($stroka['URL']=='default')
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
    
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
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
     //$this->__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
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
                    if ($this->typMenu($nameTablic)!=8) {
                     if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                        $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,8); 
                      }
                     if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,8);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
       for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
        while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default') {   
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
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
             if ($stroka['URL']=='textP')
                 if ($stroka['NAME']!='br') {
                 $textStart="";
                 if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                 echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                 $ii++;
                 } else echo '<br>';
                        
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false) {
             $textStart="";
             if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
             echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
             $ii++;
            }
          if ($stroka['ID']==$idPoz)
            if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
               if ($stroka['NAME']!='br') {
                       $textStart="";
                        if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                        echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                        $ii++;
                     } else echo '<br>';   

          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
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
     //$this->__unserialize('menu4','redaktor_nastr',array('redaktor.php',$poslednijZapros));
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
                    if ($this->typMenu($nameTablic)!=9) {
                     if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                        $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                        $this->saveTypMenu($nameTablic,9); 
                      }
                     if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,9);
                    }
                   //////////////////////////////////////
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
       for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
        while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
          if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default' && $stroka['URL']!='p'  
              && $stroka['URL']!='h1' && $stroka['URL']!='h2' && $stroka['URL']!='h3' && $stroka['URL']!='h4' && $stroka['URL']!='h5' && $stroka['URL']!='h6' && $stroka['URL']!='div' && $stroka['NAME']!='img' 
               && $stroka['NAME']!='hr'  && $stroka['NAME']!='col1' && (!stripos('-'.$stroka['NAME'],'col2') && !stripos($stroka['NAME'],'&') && !stripos ('-'.$stroka['NAME'],'col3')) ) {   
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
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
             if ($stroka['URL']=='textP')
                 if ($stroka['NAME']!='br') {
                 $textStart="";
                 if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                 echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                 $ii++;
                 } else echo '<br>';
                 
          if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br') {
              $textStart="";
              if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
              echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
              $ii++;
              } else echo '<br>';

          if ($stroka['ID']==$idPoz)
           if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false) {
             $textStart="";
             if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
             echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
             $ii++;
            }
          if ($stroka['ID']==$idPoz)
            if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
               if ($stroka['NAME']!='br') {
                       $textStart="";
                        if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                        echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                        $ii++;
                     } else echo '<br>';    
         if ($stroka['ID']==$idPoz)
            if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
          
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
               || $stroka['NAME']=='col2_10/2' || $stroka['NAME']=='col2_11/1' || $stroka['NAME']=='col2_6/6') {
                $box1=6;
                $box2=6;
               if ($stroka['NAME']!='col2') {
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
             if (stripos ('-'.$stroka['NAME'],'col3')) {
                $box1=4;
                $box2=4;
                $box3=4;
               if ($stroka['NAME']!='col3') {
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
        $rez=$this->zaprosSQL($zapros);
      }
        echo '</form>';
        echo'</section>';
     }
 }
