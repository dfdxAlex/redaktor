<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceAdminPanelDfdx
{
    public function kakovClass($nameMenu) 
    {
      $zapros="SELECT CLASS FROM tablica_tablic WHERE NAME='".$nameMenu."'";
      $rez=$this->zaprosSQL($zapros);
      $stroka=mysqli_fetch_array($rez);
      if (!isset($stroka)) return false;
      if ($stroka[0]==0) return false;
      if ($stroka[0]==1) return true;
    }

    public function startMenuRedaktora()
    {
        $zapros="SELECT * FROM nastrolkiredaktora WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        $stroka=mysqli_fetch_assoc($rez);
        $poslednijZapros=$stroka['imiePosTabl'];
        $_SESSION['nameTablice']=$poslednijZapros;
        if (!$this->searcNameTablic($poslednijZapros)) $poslednijZapros="";
        echo '<h6 class="mesage">*поле слева предназначено для имени таблицы</h6>';
        echo '<h6 class="error">**Внимание!! Не использовать заглавные буквы в названии таблицы</h6>';
        $this->__unserialize(array('menu7','redaktor_nastr7','redaktor.php',$poslednijZapros,'не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно','не важно'));
     }

    public function createTablicySawe($nameTable) 
    {
      $i=0;
      $j=0;
      if (!$this->searcNameTablic($nameTable)) {
          $zapros="CREATE TABLE ".$nameTable."(id_tab_gl INT, ";
              for ($j=1; $j<=$_SESSION['col']; $j++) {
                   $zapros=$zapros."poz".$j." VARCHAR(255)";
                   if ($j!=$_SESSION['col']) $zapros=$zapros.", ";
                }
          $zapros=$zapros.")";
          $rez=$this->zaprosSQL($zapros);
         }
       for ($j=1; $j<=$_SESSION['str']; $j++) {
            $zapros1="INSERT INTO ".$nameTable." (id_tab_gl,";
            $zapros2=" VALUES (".$j.",";
            for ($i=1; $i<=$_SESSION['col']; $i++) {
                 $zapros1=$zapros1."poz".$i;
                 if ($i!=$_SESSION['col'])  $zapros1=$zapros1.",";
                 $zapros2=$zapros2."'".$_POST['radio_'.$nameTable.'_'.$j.'_'.$i]."'";
                 if ($i!=$_SESSION['col'])  $zapros2=$zapros2.",";
             }
            $zapros1=$zapros1.")"; 
            $zapros2=$zapros2.")"; 
            $zapros=$zapros1.$zapros2;
            echo $zapros."<br>";
            $rez=$this->zaprosSQL($zapros);
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
        for ($j=1; $j<=$str; $j++) {
             echo '<div class="poleTablicy1">'."\n";
             for ($i=1; $i<=$col; $i++) {
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
                  echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="video" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'16" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'16">video</label><br>'."\n";
                  echo '<input type=radio name="radio_'.$nameTable.'_'.$j.'_'.$i.'" class="radio_class_'.$nameTable.'_'.$j.'_'.$i.'" value="произвольный" id="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'17" /><label for="id_'.$nameTable.'_'.$j.'_'.$i.'_'.'17">произвольный</label><br>'."\n";
                  cho '</div>'."\n";
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
       if ($this->searcNameTablic($_SESSION['nameTablice'])) 
           $this->killTab($_SESSION['nameTablice']);
       echo '<p class=mesage>В полях ниже введите число столбцов и строк соответственно</p>';
       $this->menu4('menu_parametr_tab','redaktor.php');   
      }

      public function createStyleTabUProwerkaImeni($nameTable) 
      {
         if ($this->zapretUdaleniaTablicy($nameTable)!="Невозможно удалить") {
             if ($this->searcNameTablic($nameTable)) {
                 $nameTab='Таблица с именем:'.$nameTable.' существует. Для продолжения жмём ОК';
               }
               else $nameTab='Создаём таблицу с именем:'.$nameTable.'. Для продолжения жмём ОК';
          $this->okCansel($nameTab,'buttonTabUniwJestUge','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
         } else $this->okCansel('Таблица защищена от удаления. Пока-пока, и да, не важно на что ты нажмёшь...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
      }

    public function nazataPokazatSpisokTablic()
     {
        $this->stolb=$this->kolVoStolbovTablice($_SESSION['nameTablice']);
        $this->strok=$this->kolVoZapisTablice($_SESSION['nameTablice']); 
        echo '<div class="infoSpisokTablic">';                        
        echo '<p class="obhieSpisokTablic">Общие таблицы</p>';        
        echo '<p class="menuSpisokTablic">Таблицы для меню</p>';
        echo '<p class="buttonMenuSpisokTablicGlavP">Таблицы для верстки сайтов</p>';
        echo '<p class="buttonMenuSpisokTablicGlavTegP">Таблица данных для сайтов</p>';
        echo '<p class="zapretNaUdalenieP">Таблицу невозможно удалить</p>';
        echo '</div>';
        $zapros="SHOW TABLES";
        $rez=$this->zaprosSQL($zapros);  
        echo '<div class="container-fluid">';
        echo '<div class="row spisokTablic">';
        echo'<form method="POST" active="redaktor.php">';
        if ($this->notFalseAndNULL($rez))                                      // Если нашли список таблиц в БД то идём дальше
          while ($stroka=mysqli_fetch_array($rez)) {                           // перебираем все найденные таблицы
          if ($_SESSION['status']==5                                           // Если список просматривает администратор или если нет, то не должно быть запрета на удаление таблицы
              || ($_SESSION['status']!=5 && $this->zapretUdaleniaTablicy($stroka[0])!='Невозможно удалить')) {
                  if ($this->zapretUdaleniaTablicy($stroka[0])=='Невозможно удалить')   // Раскрашиваем запрещенные к удалению таблицы
                      $dopClass="zapretNaUdalenie";
                      else $dopClass="";
            
            $name_teg=false;
            $rezLocal=$this->zaprosSQL("SHOW COLUMNS FROM ".$stroka[0]);     //- список столбцов в таблице
            while ($strokaLocal=mysqli_fetch_array($rezLocal) && !$name_teg) // перебор списка полей и поиск поля name_teg
                if (gettype($strokaLocal)=='string')
                    if ($strokaLocal[0]=='name_teg') $name_teg=true;

            if ($this->tablicaDlaMenu($stroka[0]))         //Проверяем принадлежит ли таблица кнопкам-менюшкам
                     echo '<input class="btn btn-primary buttonMenuSpisokTablic '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
            else if ($this->id_tab_gl_searc($stroka[0]))   // проверяем относится ли таблица к главным таблицам
                     echo '<input class="btn btn-primary buttonMenuSpisokTablicGlav '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
            else if ($name_teg)  
                     echo '<input class="btn btn-primary buttonMenuSpisokTablicGlavTeg '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
              else   echo '<input class="btn btn-primary '.$dopClass.'" type="submit" name="bottonListTablic" value="'.$stroka[0].'">';
            }
         }
        echo'</form>';
        echo '</div>';
        echo '</div>';
     }

     public function saveNameTable($nameTable)
     {
       $_SESSION['nameTablice']=$nameTable;
       $zapros="UPDATE nastrolkiredaktora SET imiePosTabl='".$nameTable."' WHERE 1";
       $rez=$this->zaprosSQL($zapros);
     }

    public function createNameMenu($nameTablic)
    {
      if ($this->zapretUdaleniaTablicy($nameTablic)!="Невозможно удалить") {
        $mesaz="Такая таблица уже есть, продолжить?";
        $nameKn='tablicaJest';
        $classDiv="buttonCreateNameMenuDiv";
        $classP="buttonCreateNameMenuP";
        $classButton="buttonCreateNameMenuButton";
        if ($this->searcNameTablic($nameTablic)) $this->okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton);
        if (!$this->searcNameTablic($nameTablic)) {
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
      } else $this->okCansel('Таблица защищена от удаления. Пока-пока, и да, не важно на что ты нажмёшь...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
     }

     public function createTabDlaMenu()
     {
        $zapros="CREATE TABLE ".$_SESSION['nameTablice']."(ID INT, NAME VARCHAR(255), URL VARCHAR(255), CLASS VARCHAR(255))";
        $rez=$this->zaprosSQL($zapros);
        $rezId=$this->maxIdLubojTablicy('tablica_tablic');
        $nameTable=$_SESSION['nameTablice'];  
        if ($_POST['listStyle']=="Общий стиль для всех кнопок") $class=0;
        if ($_POST['listStyle']=="У каждой кнопки свой стиль") $class=1;
        $zapros="INSERT INTO `tablica_tablic`(`ID`, `NAME`, `CLASS`) VALUES (".$rezId.",'".$nameTable."',".$class.")";
        $rez=$this->zaprosSQL($zapros);
     }

     public function createTabDlaMenu5()
     {
        $zapros="CREATE TABLE ".$_SESSION['nameTablice']."(ID INT, NAME VARCHAR(255), URL VARCHAR(255), CLASS VARCHAR(255), STATUS VARCHAR(255))";
        $rez=$this->zaprosSQL($zapros);
        $rezId=$this->maxIdLubojTablicy('tablica_tablic');
        $nameTable=$_SESSION['nameTablice'];
        if ($_POST['listStyle']=="Общий стиль для всех кнопок") $class=0;
        if ($_POST['listStyle']=="У каждой кнопки свой стиль") $class=1;
        $zapros="INSERT INTO `tablica_tablic`(`ID`, `NAME`, `CLASS`) VALUES (".$rezId.",'".$nameTable."',".$class.")";
        $rez=$this->zaprosSQL($zapros);
     }

  public function loadTablic($nameTablic)  // загрузить главную таблицу загрузить шаблон нарисовать шаблон 
    {
       if (!$this->searcNameTablic($nameTablic) && !$this->id_tab_gl_searc($nameTablic)) {//Не нашли таблицу 
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
        if ($this->searcNameTablic($nameTablic) && !$this->id_tab_gl_searc($nameTablic)) {//Если нашли таблицу
            $zapros="SELECT kol_voKn FROM tablica_tablic WHERE NAME='".$nameTablic."'";  // Проверяем данные о числе записей в таблице таблиц
            $rez=$this->zaprosSQL($zapros);
            $kol_voZapisejTablicaTablic=array();
            $kol_voZapisejTablicaTablic[0]=2;
            if ($rez!==false) 
                $kol_voZapisejTablicaTablic=mysqli_fetch_array($rez);
            if (!isset($kol_voZapisejTablicaTablic)) 
                $kol_voZapisejTablicaTablic[0]='Число записей не известно';
            echo '<p class="mesage">Число записей в таблице '.$nameTablic.' равно '.$kol_voZapisejTablicaTablic[0].'</p>';
            $mesaz="В поле ниже введите число позиций(кнопок) в создаваемом меню";
            $nameKn='kol_voKn';
            $classDiv="buttonCreateNameMenuDiv";
            $classP="buttonCreateNameMenuP";
            $classButton="buttonCreateNameMenuButton";
            $classInput="inputCreateNameMenuButton";
            $this->poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput);
        }
      if ($this->id_tab_gl_searc($nameTablic)) {//Редактирование таблицы главной. проверить есть ли радио и чекбоксы и если есть, то по сколько пунктов 
          $this->okSelect("Показать нулевые кнопки",'pokazNULL','pokazNULLDiv','pokazNULLP','pokazNULLButton');
           //проверим есть ли вспомогательная таблица и если нет, то создадим её 
           if (!$this->searcNameTablic($nameTablic.'_tegi'))
                $this->zaprosSQL("CREATE TABLE ".$nameTablic."_tegi"."(stolb INT, str INT, name_teg VARCHAR(255), name_attrib VARCHAR(255), text VARCHAR(6000), string_ili_int INT)");
 
           //проверим есть ли вспомогательная таблица и если нет, то создадим её 
           if (!$this->searcNameTablic($nameTablic.'_status'))
               $this->zaprosSQL("CREATE TABLE ".$nameTablic."_status"."(stolb INT, str INT, status VARCHAR(255))");
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
           echo '<input type="checkbox" name="status00_0" value="s0"'.$this->checkedStatus(0,0,"0",$nameTablic).'>0 ';
           echo '<input type="checkbox" name="status10_0" value="s1"'.$this->checkedStatus(0,0,"1",$nameTablic).'>1 ';
           echo '<input type="checkbox" name="status20_0" value="s2"'.$this->checkedStatus(0,0,"2",$nameTablic).'>2 ';
           echo '<input type="checkbox" name="status30_0" value="s3"'.$this->checkedStatus(0,0,"3",$nameTablic).'>3 ';
           echo '<input type="checkbox" name="status40_0" value="s4"'.$this->checkedStatus(0,0,"4",$nameTablic).'>4 ';
           echo '<input type="checkbox" name="status50_0" value="s5"'.$this->checkedStatus(0,0,"5",$nameTablic).'>5 ';
           echo '<input type="checkbox" name="status90_0" value="s9"'.$this->checkedStatus(0,0,"9",$nameTablic).'>9 <br>';
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
           if ($this->checkedStatus(0,0,"0",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Гость</p></div>';
           if ($this->checkedStatus(0,0,"1",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Пользователь</p></div>';
           if ($this->checkedStatus(0,0,"2",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Редактор</p></div>';
           if ($this->checkedStatus(0,0,"3",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Подписчик</p></div>';
           if ($this->checkedStatus(0,0,"4",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Администратор</p></div>';
           if ($this->checkedStatus(0,0,"5",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Супер Администратор</p></div>';
           if ($this->checkedStatus(0,0,"9",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
           echo '<div class="'.$klass.'"><p>Не проверен</p></div>';
           echo '</div>';
           echo '</div></div><br>';
           $this->strok=$this->kolVoZapisTablice($nameTablic);
           $this->stolb=$this->kolVoStolbovTablice($nameTablic);
           for ($i=1; $i<=$this->strok; $i++) {//перебираем столбцы начиная с первого. 
              for ($j=1; $j<$this->stolb; $j++) { // перебираем строки с первойkolVoZapisTablice
                $zapros="SELECT poz".$j." FROM ".$nameTablic." WHERE id_tab_gl=".$i;
                $rez=$this->zaprosSQL($zapros);
                $stroka=mysqli_fetch_array($rez);
                if ($stroka[0]!="NULL" || $_SESSION['pokazNULL']) {
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
                   echo '<input type="checkbox" name="status0'.$j.'_'.$i.'" value="s0"'.$this->checkedStatus($j,$i,"0",$nameTablic).'>0 ';
                   echo '<input type="checkbox" name="status1'.$j.'_'.$i.'" value="s1"'.$this->checkedStatus($j,$i,"1",$nameTablic).'>1 ';
                   echo '<input type="checkbox" name="status2'.$j.'_'.$i.'" value="s2"'.$this->checkedStatus($j,$i,"2",$nameTablic).'>2 ';
                   echo '<input type="checkbox" name="status3'.$j.'_'.$i.'" value="s3"'.$this->checkedStatus($j,$i,"3",$nameTablic).'>3 ';
                   echo '<input type="checkbox" name="status4'.$j.'_'.$i.'" value="s4"'.$this->checkedStatus($j,$i,"4",$nameTablic).'>4 ';
                   echo '<input type="checkbox" name="status5'.$j.'_'.$i.'" value="s5"'.$this->checkedStatus($j,$i,"5",$nameTablic).'>5 ';
                   echo '<input type="checkbox" name="status9'.$j.'_'.$i.'" value="s9"'.$this->checkedStatus($j,$i,"9",$nameTablic).'>9 <br>';
                   if ($stroka[0]=='video source' || $stroka[0]=='audio source') {
                    if ($stroka[0]=='video source') {
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" checked value="src" id="src"><label for="src">src</label> ';
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="type"  id="type"><label for="type">type</label> <br>';
                      echo '<input type="radio" name="tegVideoSourse'.$j."_".$i.'" class="poleRedaktGlawnTablTegText" value="codex"  id="codecs"><label for="codecs">codecs</label> <br>';
                    }
                    if ($stroka[0]=='audio source') {
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
                    if ((isset($_SESSION['obnovit']) && !$_SESSION['obnovit']) || (isset($_POST['selectTegAttrib'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['selectTegAttrib'.$j."_".$i]!="----------")) {
                        $_SESSION['obnovit']=true;//переменная предотвращает циклические обновления страницы
                        $this->saveAttribTega($nameTablic,$stroka[0],$_POST['selectTegAttrib'.$j."_".$i],'savePola'.$j."_".$i,$_POST['formGlavnyAttrib'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);
                    }
                
                  //Запись общих аттрибутов и их свойств
                  if (isset($_POST['selectTegUniversalAttrib'.$j."_".$i])  && isset($_POST['savePola'.$j."_".$i]) && $_POST['selectTegUniversalAttrib'.$j."_".$i]!="----------")
                      $this->saveAttribTega($nameTablic,$stroka[0],$_POST['selectTegUniversalAttrib'.$j."_".$i],'savePola'.$j."_".$i,$_POST['formGlavnyAttribUniversalny'.$j."_".$i],$_POST['tegRadio'.$j."_".$i]);
                  
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
                  if ($cisloVhodowBr>1) 
                      $fontSize=intdiv(180,$cisloVhodowBr);
                  if ($fontSize>16) 
                      $fontSize=16;
                  if ($fontSize<7) 
                      $fontSize=7;
                  $rezultat='<div style="font-size: '.$fontSize.'px;">'.$rezultat.'</div>';
                  echo $rezultat; 
                  echo '<div class="col-12 statusy">'; // Вывод статусов в правый столбец
                  if ($this->checkedStatus($j,$i,"0",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Гость</p></div>';
                  if ($this->checkedStatus($j,$i,"1",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Пользователь</p></div>';
                  if ($this->checkedStatus($j,$i,"2",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Редактор</p></div>';
                  if ($this->checkedStatus($j,$i,"3",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Подписчик</p></div>';
                  if ($this->checkedStatus($j,$i,"4",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Администратор</p></div>';
                  if ($this->checkedStatus($j,$i,"5",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Супер Администратор</p></div>';
                  if ($this->checkedStatus($j,$i,"9",$nameTablic)=="checked") $klass='statusyTrue'; else $klass='statusyFalse';
                      echo '<div class="'.$klass.'"><p>Не проверен</p></div>';
                  echo '</div>';
                echo '</div></div><br>';
                 }
               }
             }
             echo '</form>';
         echo '</container>'; 

         echo '<div class="helpFormGlawTab container-fluid" >'; // Помощь по работе с главной таблицей 
         echo '<a name="helpTegForm">';                         // Помощь по настройке общего вида в теге Form
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
         echo '<a name="helpImgText">';                         // Помощь по привязке ссылки на картинку к картинке
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
         echo '<a name="helpRadio">';                           // Помощь по привязке ссылки на картинку к картинке
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
         echo '<a name="helpPH16Text">';                        // Помощь по настройке общего вида в теге Form
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
    }

    public function cisloUrovnejHablon($nameTablice)
    {
       $zapros="SELECT MAX(str) FROM ".$nameTablice.'_tegi';
       $rez=$this->zaprosSQL($zapros);
       if ($rez===false) 
          return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) 
          return -1;
       if (is_null($stroka[0])) 
          $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }

    public function cisloStolbovjHablon($nameTablice)
    {
       $zapros="SELECT MAX(stolb) FROM ".$nameTablice.'_tegi';
       $rez=$this->zaprosSQL($zapros);
       if ($rez===false) 
          return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) 
          return -1;
       if (is_null($stroka[0])) 
          $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }

    public function setapTeg($nameTablice,$nameAtrib,$stolb,$str)
    {
       $zapros="SELECT text FROM ".$nameTablice."_tegi"." WHERE name_attrib='".$nameAtrib."' AND stolb=".$stolb." AND str=".$str;
       $rez=$this->zaprosSQL($zapros);
       if ($rez===false) 
          return -1;
       $stroka=mysqli_fetch_array($rez);
       if (!isset($stroka)) 
          return -1;
       if (is_null($stroka[0])) 
          $stroka[0]=-1;
       $rezId=$stroka[0];
       return $rezId;
    }
}
