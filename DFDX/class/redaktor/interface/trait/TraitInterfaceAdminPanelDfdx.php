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

    public function statusRegiHablon($nameTablic,$stolb,$str)
    {
      $zapros="SELECT status FROM ".$nameTablic."_status WHERE stolb=".$stolb." AND str=".$str;
      $rez=$this->zaprosSQL($zapros);
      if ($rez===false) return false;
      $stroka=mysqli_fetch_array($rez);
      $st=$_SESSION['status'].'';
      if (stripos($stroka[0],$st)>0) return true;
      return false;
    }

    public function hablon($nameTablic)
    {
        $urovnejHablona=$this->cisloUrovnejHablon($nameTablic);
        $stolbovHablona=$this->cisloStolbovjHablon($nameTablic);
        ///////////////////////////////////////////// добываем параметры сетки bootstrap
        $stolpBootstrap=array();
        $razdelitBr=0;
        $razdelitHr=0;
        $rez=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='разделение блоков с BR'");
        if ($rez) {$stroka=mysqli_fetch_array($rez);$razdelitBr=(int)$stroka[0]+0;}
        $rez=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='разделение блоков с HR'");
        if ($rez) {$stroka=mysqli_fetch_array($rez);$razdelitHr=(int)$stroka[0]+0;}
        $rez=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0 AND name_attrib='ширина столбцов bootstrap'");
        if (!$rez)  // если нет данных, то сделать равные столбцы
          for ($i=1; $i<=$stolbovHablona; $i++)  // создаем фальш строку bootstrap
            $stolpBootstrap[$i]=12/$stolbovHablona;
        $stolbec=mysqli_fetch_array($rez);
        $chars = preg_split('/(-)+?/',$stolbec[0], -1);
        for ($i=1; $i<=$stolbovHablona; $i++)  // достаем параметры столбов bootstrap
          $stolpBootstrap[$i]=(int)$chars[$i-1];
        
        echo '<section class="container-fluid section_'.$nameTablic.'">';
        echo '<h4>Редактирование профиля '.$_SESSION['login'].' ('.$this->statusNumerSlovo($_SESSION['status']).')</h4>';

        ///////////////////////////////////////////рисуем form/////////////////////////////////////////
        $rez=$this->zaprosSQL("SELECT * FROM ".$nameTablic."_tegi WHERE str=0 AND stolb=0");
        if (!$rez) {echo 'Не найдена таблица шаблона'; return 'Не найдена таблица шаблона';}
        $viv=' ';
        $vivteg='';
        $textPh1h6='0-0';
        while ($stroka=mysqli_fetch_assoc($rez)) {
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
      
        for ($stri=1; $stri<$urovnejHablona+1; $stri++) { //Цикл просмотра строк
            echo '<div class="row">';
            for ($stolbi=1; $stolbi<$stolbovHablona+1; $stolbi++) { //Цикл просмотра ытолбцов
                //////////////////////////////////////рисуем поле////////////////////////////////////////////////
                 if ($this->statusRegiHablon($nameTablic,$stolbi,$stri)) {//Если всё в порядке со статусом
                      // вытягиваем все аттрибуты, которые зарегистрированы по рассматриваемой позиции
                      $rez=$this->zaprosSQL("SELECT * FROM ".$nameTablic."_tegi WHERE str=".$stri." AND stolb=".$stolbi);
                      if ($rez===false) {
                          echo 'Не найдена таблица шаблона';
                          break;
                      }
                      $viv=' ';
                      $textNaKnopke='';
                      $for='';
                      $kodHtml='';
                      $nameTega='';
                      $urlDlaImage='';
                      // узнаем имя тега из главной таблицы
                      $nameTega=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$stolbi." FROM ".$nameTablic." WHERE id_tab_gl=".$stri));
                      // обрабатываем чекбоксы и радио в случае, если они заданы блоком
                      $blockJest=false;
                      if ($nameTega[0]=='checkbox' || $nameTega[0]=='radio') {
                        $poiskBloka=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri." AND stolb=".$stolbi." AND name_attrib='блок'" );
                        if (!$poiskBloka) $blockJest=false;    // Если нет данных, значит нет блока
                        $rezPoiskBlok=mysqli_fetch_array($poiskBloka);
                        if (!$rezPoiskBlok[0]) $blockJest=false;  //  Если нет данных, значит нет блока
                        if (stripos($rezPoiskBlok[0],$nameTega[0])>0) { //Нашли блок, соответствующий заданному чекбоксу или радио
                           $blockJest=true; // Нашли блок для нужного чекбокса или радио
                           $strStatus=$this->loadInfoData($nameTablic,$stri,$stolbi);
                           $rezPoiskBlok[0]=preg_replace ("%(<br><label for=)%","<label for=",$rezPoiskBlok[0]); // убираем лишние <br>
                           $rezPoiskBlok[0]=preg_replace ("%(<br><label class=)%","<label class=",$rezPoiskBlok[0]); // убираем лишние <br>
                           if (stripos($rezPoiskBlok[0],'statusStr'.$stri.'Stolb'.$stolbi)>0) {// проверяем привязку к работе со статусами
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
                      //---------------------------------------------------------------------------------------------------
                      $info=$this->loadInfoData($nameTablic,$stri,$stolbi); //Получаем пользовательское значение из таблицы _data, если оно есть
                      if (!$blockJest) // Есть смысл создавать строку с аттрибутами только если чекбокс или радио не заданы блоком
                      while ($stroka=mysqli_fetch_assoc($rez)) { 
                         if ($stroka['name_attrib']=='источник текста') $textPh1h6=$stroka['text'];
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
                                  ) {
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
                          if ($stroka['name_attrib']=='checked') 
                              $viv=$viv.' checked';  // простые аттрибуты
                       
                          //////////////////////////////////////////////////////////////////////////////////////////////////////////
                          ////////////Работаем со значением Текст на кнопке
                          if ($stroka['name_attrib']=='текст на кнопке') {
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
                         if ($nameTega[0]=='html' && $stroka['name_attrib']=='ввести код')
                               $kodHtml=$stroka['text'];                            //выдернуть(запомнить) html код
                        ////////////Работаем с img
                         if ($stroka['name_teg']=='img' && $stroka['name_attrib']=='источник ссылки') {
                            $strIstok=0;
                            $stolbIstok=0;
                            $rezult=preg_split("/-/",$stroka['text']);
                            $strIstok=(int)$rezult[0];
                            $stolbIstok=(int)$rezult[1];
                            $linkImg=$this->loadInfoData($nameTablic,$strIstok,$stolbIstok); //Получаем пользовательское значение из таблицы _data, если оно есть
                            $viv=$viv.' src="'.$linkImg.'"';
                            if (preg_match("/(http.+)/",$linkImg)) 
                                $viv=preg_replace("/(src)?.+(jpg)?/",' src="'.$linkImg.'"',$viv);
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

                         if ($nameTega[0]=='p' || $nameTega[0]=='h1' || $nameTega[0]=='h2' || $nameTega[0]=='h3' || $nameTega[0]=='h4' || $nameTega[0]=='h5' || $nameTega[0]=='h6') {
                            // прочитать значение текста из пользовательской таблицы _data
                            if ($textPoUmolcaniu=="здесь фальш_аттрибута текста по умолчанию нет") {
                                $strIstok=0;
                                $stolbIstok=0;
                                $rezult=preg_split("/-/",$textPh1h6);
                                $strIstok=(int)$rezult[0];
                                $stolbIstok=(int)$rezult[1];
                                $textPh1h6=mysqli_fetch_array($this->zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$strIstok." AND stolb=".$stolbIstok." AND login='".$_SESSION['login']."'" ));
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
              if ($razdelitBr>0) 
                  for ($i=1;$i<=$razdelitBr;$i++) 
                      echo '<br>';
              if ($razdelitHr>0) 
                  for ($i=1;$i<=$razdelitHr;$i++) 
                      echo '<hr class="Hr'.$nameTablic.'">';
              echo '</div>';
              echo '</div>';
            echo '</div>'; //закрыли тег класса row
          } // конец i
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////записываем//////////////////////////////////////////////////////
         echo '</form>';
        echo '</section>';
    }

    public function searcUrlImage($nameTablic,$str,$stolb,$classKontakt) 
        {
           /////////////////////////////////////////////работаем с фальш-тегом "источник ссылки"////////////////////////////////////
           // узнаем источник ссылки с помощью фальш тега, если он есть
           $z=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE name_attrib='источник ссылки' AND name_teg='img' AND str=".$str." AND stolb=".$stolb);
           $stroka=mysqli_fetch_array($z);
           $chars = preg_split('/(-)+?/',$stroka[0], -1);
           $strX=(int)$chars[0];
           $stolbX=(int)$chars[1];
           $z=$this->zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$strX." AND stolb=".$stolbX." AND  login='".$_SESSION['login']."'");
           if ($this->notFalseAndNULL($z)) $stroka=mysqli_fetch_array($z);
           if (preg_match('/.+?\.(jpg|png|tiff|psd|bmp|gif|jp2)/i',$stroka[0], $matches, PREG_OFFSET_CAPTURE)==1) 
           return $stroka[0];
           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $str2=0;
            $stolb2=0;
            if ($classKontakt=='') {// если маркировочный класс не задан в входящем параметре, то найдём его
              $z=$this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE name_attrib='class' AND name_teg='img' AND str=".$str." AND stolb=".$stolb);
              if ($this->notFalseAndNULL($z))
                  $stroka=mysqli_fetch_array($z);
              $pozSpace=strripos($stroka[0],' ');
              $classKontakt=mb_substr($stroka[0],$pozSpace);
            }

            $z=$this->zaprosSQL("SELECT str,stolb,text FROM ".$nameTablic."_tegi WHERE name_attrib='class' AND name_teg!='img'");
            if ($this->notFalseAndNULL($z))
              while ($stroka=mysqli_fetch_assoc($z)) {
                if (strpos($stroka['text'], $classKontakt)>0) {$str2=$stroka['str'];$stolb2=$stroka['stolb']; } // Если нашли вхождение, то запомнить координаты блока
                if ($str2>0) break 1;
              }
            $z=$this->zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$str2." AND stolb=".$stolb2." AND login='".$_SESSION['login']."'");
            if ($z===false) return false;
            $stroka=mysqli_fetch_array($z);
            return $stroka[0];
         }

         public function loadInfoData($nameTablic,$str,$stolb) //Вывести значение столбцы инфо из базы по строке и столбцу
         {
          $z=$this->zaprosSQL("SELECT info FROM ".$nameTablic."_data WHERE str=".$str." AND login='".$_SESSION['login']."' AND stolb=".$stolb);
          if ($z===false) return false;
          $stroka=(mysqli_fetch_array($z));
          if (!$stroka) return false;
          return $stroka[0];
         }

         public function saveStrData($nameTablic,$str,$stolb,$info,$dopis)
         {
          $id=0;
          $jestNol=false;
          //проверим есть ли вспомогательная таблица _data если нет, то создадим её 
          if (!$this->searcNameTablic($nameTablic.'_data'))
              $this->zaprosSQL("CREATE TABLE ".$nameTablic."_data"."(id INT, str INT, stolb INT, info VARCHAR(6000), login VARCHAR(100))");
          //проверяем есть ли конкретная запись на нужном месте в таблице. Функция выводит максимальный ID для записей для конкретного места
          //Если режим одной записи, то есть не дописываем а заменяем запись
          $id=$this->searcIdPoUsloviu($nameTablic."_data",'str='.$str,'stolb='.$stolb,'login="'.$_SESSION['login'].'"','','');                                                     
          ///////Прочитать строку с найдеными ИД и логином. Полезно при ИД=0
          if ($id==0) {
            $login=$_SESSION['login'];
            $z=$this->zaprosSQL("SELECT * FROM ".$nameTablic."_data WHERE id=0 AND login='".$login."'");
            $stroka=(mysqli_fetch_assoc($z));
            if ($stroka['str']>0) $jestNol=true;
           }
          $idMax=$this->maxIdLubojTablicy($nameTablic.'_data'); // поиск максимального id по всей таблице
          if ($idMax<0) $idMax=0;
          ////////////////////////////////////////////////////////////////////////////////////////////
          if ((!$dopis && $id>0) || (!$dopis && $jestNol)) {
              $zapros="DELETE FROM redakt_profil_data WHERE id=".$id." AND str=".$str." AND stolb=".$stolb." AND login='".$_SESSION['login']."'";
              $this->zaprosSQL($zapros);
             } 
           $zapros="INSERT INTO ".$nameTablic."_data(id, str, stolb, info, login) VALUES (".$idMax.",".$str.",".$stolb.",'".$info."','".$_SESSION['login']."')";
           $this->zaprosSQL($zapros);
         }

         public function saveProfil($nameTablic,$dopis)  // Функция обрабатывает нажатие кнопки Сохранить профиль // запись шаблона
         {
          $urovnejHablona=$this->cisloUrovnejHablon($nameTablic);
          $stolbovHablona=$this->cisloStolbovjHablon($nameTablic);
          for ($stri=1; $stri<$urovnejHablona+1; $stri++) { //Цикл просмотра строк
            for ($stolbi=1; $stolbi<$stolbovHablona+1; $stolbi++) {//Цикл просмотра ытолбцов
                $nameTega[0]='';
                $nameTega=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$stolbi." FROM ".$nameTablic." WHERE id_tab_gl=".$stri));
                if ($nameTega[0]=='text' || $nameTega[0]=='textarea') {
                   $searcName=mysqli_fetch_array($this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri.' AND stolb='.$stolbi.' AND name_attrib=\'name\''));
                   if (isset($_POST[$searcName[0]]))
                    $this->saveStrData($nameTablic,$stri,$stolbi,$_POST[$searcName[0]],false);
                 }
                 if ($nameTega[0]=='radio' || $nameTega[0]=='checkbox') {
                   $searcName=mysqli_fetch_array($this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE str=".$stri.' AND stolb='.$stolbi.' AND name_attrib=\'id\''));
                    $this->saveStrData($nameTablic,$stri,$stolbi,$this->statusVStroku($searcName[0]),false);
                 }
              }
          }
         }

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

        public function strokaAttrbutov($nameTable,$teg,$str,$pole,$tegOpen,$tegClose)
             {
               $strokaRez="";
               $nadpisNaButton='';
               $attribDlaFor='';
               $zagolowok='';
               $stringSelect='';
               if ($teg=='form') { 
                  echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                  $strokaRez=$tegOpen.'form';
                }
               if ($teg=='text') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="text"';
                }
               if ($teg=='password') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="password"';
                }
               if ($teg=='button') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'button';
                }
               if ($teg=='input submit') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="submit"';
                }
               if ($teg=='input reset')  {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input type="reset"';
                }
               if ($teg=='img') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'img';
                }
               if ($teg=='textarea') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'textarea';
                }
               if ($teg=='radio') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
                 $strokaRez=$tegOpen.'input type="radio"';
                }
               if ($teg=='checkbox') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
                 $strokaRez=$tegOpen.'input type="checkbox"';
                }
                if ($teg=='заголовок')
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>Колличество пунктов формируется во время создания таблицы.<br></p>';
               if ($teg=='select') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br>
                         Для добавления пункта выбираем аттрибут "option", а в его значения вписываем имя_Валуе=имя_Пункта. Пример: name=Gena.<br>
                         Для удаления выбираем аттрибут "удалить option", в качестве значения указываем часть имени value, без первого символа.</p>';
                 $strokaRez=$tegOpen.'select';
                }
                if ($teg=='input') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'input ';
                }
                if ($teg=='audio') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'audio ';
                }
                if ($teg=='embed') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'embed ';
                }
                if ($teg=='video') {
                 echo '<p class="mesage strokaAttribP">Задаем необходимые аттрибуты из выпадающих списков.<br>Нижнее поле на случай, если нужного аттрибута нет.<br></p>';
                 $strokaRez=$tegOpen.'video ';
                }
                if ($teg=='произвольный')
                 echo '<p class="mesage strokaAttribP">Если нужно вставить тег, то выбираем "вставить тег" и в правом поле записываем имя тега.<br>Если нужно вставить код, то выбираем соответствующий код и в правое поле вставляем его.</p>';
                if ($teg=='html') {
                  echo '<p class="mesage strokaAttribP">Вписываем код html cо скобками тегов</p>';
                  $strokaRez=$tegOpen.'div ';
                 }      
                 if ($teg=='PHP')
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                 if ($teg=='javaScript') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='VBScript') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='JScript') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='Ruby') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }   
                 if ($teg=='Python') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }     
                 if ($teg=='Tcl') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 }  
                 if ($teg=='C++(bin)') {
                  echo '<p class="mesage strokaAttribP">В разработке</p>';
                  $strokaRez=$tegOpen.'div ';
                 } 
                $classDlaLabel='';
                $z=$this->zaprosSQL("SELECT * FROM ".$nameTable."_tegi WHERE name_teg='".$teg."' AND str=".$str." AND stolb=".$pole);
                while (!is_null($stroka=(mysqli_fetch_assoc($z)))) {
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
                      if ($teg=='select' && $stroka['name_attrib']=="option") {
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
               
                if ($teg=='radio' || $teg=='checkbox') { // Проверяем сколько есть в таблице строк и дублируем
                                                       $strokaRez=$strokaRez.'<br>'.$tegOpen.'label ';
                                                       if ($classDlaLabel!='') $strokaRez=$strokaRez.'class="'.$classDlaLabel.'" ';
                                                       $strokaRez=$strokaRez.'for="'.$attribDlaFor.'"'.$tegClose.$nadpisNaButton.$tegOpen.'/label'.$tegClose;
                                                       
                                                       $strokaTime=$strokaRez; 
                                                       $strokaHablon=$strokaRez;
                                                       $j=$this->nomerChecboxRadio($nameTable,$str,$pole);
                                                       if ($j>1)  {
                                                        $strokaRez='';
                                                       for ($i=1; $i<=$j; $i++) {
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
                                                            if ($idNew) {
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

   public function nameAttibuta($nameTable,$str,$poz,$attrib)
    {
      $z=$this->zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='".$attrib."'");
      if (!$z) return false;
      $stroka=mysqli_fetch_array($z);
      if (!$stroka) return false;
      return $stroka[0];
    }

    public function nomerChecboxRadio($nameTable,$str,$poz)
    {
      $z=$this->zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='число строк'");
      if (!$z) return 0;
      $stroka=mysqli_fetch_array($z);
      if (!$stroka) return 0;
      return $stroka[0];
    }

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
    $this->zaprosSQL("DELETE FROM `".$nameTable."_status` WHERE stolb=".$pole." AND str=".$str);
    $this->zaprosSQL("INSERT INTO ".$nameTable."_status(stolb, str, status) VALUES (".$pole.", ".$str.", '".$status."')");
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
   }

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
         $z=$this->zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."' AND name_attrib='".$attrib."'");
    ////////////////////////////////////////////////
     if ($z!=false && $attrib!='задать тег' &&  $attrib!='удалить' &&  $attrib!='option' &&  $attrib!='ввести код') 
         $this->zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."' AND name_attrib='".$attrib."'");
    ///////////////////////////////////////////////
    
    //Ищем в аттрибуте слово "текст" для работы с надписями на чекбоксах
    if (preg_match('/(текст)/', $attrib, $matches, PREG_OFFSET_CAPTURE)==1) {
        $poiskText=$matches[0];
        if ($poiskText[0]=='text') {
            $this->zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_attrib='".$attrib."'");
            $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$teg."','".$attrib."','".$strokaTime."')";
            $this->zaprosSQL($stroka);  
            return true;
          }
      }

    if ($attrib=='сохранить блок' && isset($_SESSION['text_checkbox_'.$str.'_'.$pole])) {
      $strokaTime=preg_replace('%\&lt%','<',$_SESSION['text_checkbox_'.$str.'_'.$pole]);
      $strokaTime=preg_replace('%\&gt%','>',$strokaTime);
      $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$teg."','блок','".$strokaTime."')";
      $this->zaprosSQL($stroka);  
      return true;
    }
    //очистить аттрибуты
    if ($attrib=='очистить аттрибуты')
     $this->zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str);
    // импорт аттрибутов
    if ($attrib=='импорт из клетки ?-?') {
      $pozicii=preg_split("/-/",$text);  // находим позицию - источник импорта
      $strP=(int)$pozicii[0];                 // находим позицию - источник импорта
      $stolpP=(int)$pozicii[1];               // находим позицию - источник импорта
      $strokaImport=$this->zaprosSQL("SELECT * FROM ".$nameTable."_tegi WHERE stolb=".$stolpP." AND str=".$strP);
      
      while (!is_null($zCopy=mysqli_fetch_assoc($strokaImport))) {
             $strokaTime=preg_replace('%(Str)[0-9]+?%','Str'.$str,$zCopy['text']);
             $strokaTime2=preg_replace('%(Stolb)[0-9]+?%','Stolb'.$pole,$strokaTime);
             $zCopy['text']=$strokaTime2;
             $stroka="INSERT INTO ".$nameTable."_tegi(stolb, str, name_teg, name_attrib, text) VALUES (".$pole.",".$str.",'".$zCopy['name_teg']."','".$zCopy['name_attrib']."','".$zCopy['text']."')";
             $this->zaprosSQL($stroka);
             //$this->printTab ($stroka,1);
       }
    }
    if ($attrib=='удалить блок' && isset($_SESSION['text_checkbox_'.$str.'_'.$pole])) {
      $this->zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND name_attrib='блок'");
      return true;
    }
    ////////////////////////////////////////////////////
    if ($teg=='произвольный' && $attrib=='задать тег' || $teg=='заголовок' && $attrib=='задать тег') {
     $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;// WHERE 1
     $this->zaprosSQL($stroka);   
     return true;
     }

   // вставить html код
   if (($teg=='html' || $teg=='PHP' || $teg=='javaScript' || $teg=='VBScript' || $teg=='JScript' || $teg=='Tcl') && $attrib=='ввести код') {
        $stroka=mysqli_fetch_array($z);
        if ($text!="-")
            $kodVpis=$stroka[0].$text; 
        else $kodVpis='';
        $z=mysqli_fetch_array($this->zaprosSQL("SELECT name_attrib FROM ".$nameTable."_tegi WHERE name_attrib='ввести код' AND stolb=".$pole." AND str=".$str));
        if ($z[0]!='ввести код') $this->zaprosSQL("INSERT INTO ".$nameTable."_tegi(stolb, str,name_teg,name_attrib, text,  string_ili_int) VALUES (".$pole.", ".$str.", '".$teg."', 'ввести код', '".$kodVpis."', 0)");
        else {
              $stroka="UPDATE ".$nameTable."_tegi SET text='".$kodVpis."' WHERE stolb=".$pole." AND str=".$str." AND name_attrib='ввести код'";
              $this->zaprosSQL($stroka);
             }
    }
   // вставить html код
    if ($attrib=='вставить HTML код') {
       $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
       if ($z[0]=="html") return true;
       $stroka="UPDATE ".$nameTable." SET poz".$pole."='html' WHERE id_tab_gl=".$str;
       $this->zaprosSQL($stroka);
       if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
             $_SESSION['obnovit']=false;
             $_SESSION['pokazNULL']=false;
             echo '<script>location.reload();</script>';
           }
    }
     // вставить php код
      if ($attrib=='вставить PHP код') {
         $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
         if ($z[0]=="PHP") return true;
            $stroka="UPDATE ".$nameTable." SET poz".$pole."='PHP' WHERE id_tab_gl=".$str;
            $this->zaprosSQL($stroka);
             if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
                 $_SESSION['obnovit']=false;
                 $_SESSION['pokazNULL']=false;
                 echo '<script>location.reload();</script>';
               }
        }
     // вставить javaScript код
     if ($attrib=='вставить javaScript код') {
      $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
      if ($z[0]=="javaScript") return true;
         $stroka="UPDATE ".$nameTable." SET poz".$pole."='javaScript' WHERE id_tab_gl=".$str;
         $this->zaprosSQL($stroka);
          if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
              $_SESSION['obnovit']=false;
              $_SESSION['pokazNULL']=false;
              echo '<script>location.reload();</script>';
            }
     }
     // вставить VBScript код
     if ($attrib=='вставить VBScript код') {
      $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
      if ($z[0]=="VBScript") return true;
         $stroka="UPDATE ".$nameTable." SET poz".$pole."='VBScript' WHERE id_tab_gl=".$str;
         $this->zaprosSQL($stroka);
          if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
              $_SESSION['obnovit']=false;
              $_SESSION['pokazNULL']=false;
              echo '<script>location.reload();</script>';
            }
     }
     // вставить JScript код
     if ($attrib=='вставить JScript код') {
      $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
      if ($z[0]=="JScript") return true;
         $stroka="UPDATE ".$nameTable." SET poz".$pole."='JScript' WHERE id_tab_gl=".$str;
         $this->zaprosSQL($stroka);
          if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
              $_SESSION['obnovit']=false;
              $_SESSION['pokazNULL']=false;
              echo '<script>location.reload();</script>';
            }
     }
     // вставить Tcl код
     if ($attrib=='вставить Tcl код') {
      $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
      if ($z[0]=="Tcl") return true;
         $stroka="UPDATE ".$nameTable." SET poz".$pole."='Tcl' WHERE id_tab_gl=".$str;
         $this->zaprosSQL($stroka);
          if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
              $_SESSION['obnovit']=false;
              $_SESSION['pokazNULL']=false;
              echo '<script>location.reload();</script>';
            }
     }  

    if ($teg=='select' && $attrib=="удалить option") {
         $zz="SELECT * FROM ".$nameTable."_tegi WHERE stolb=".$pole." AND str=".$str." AND name_teg='".$teg."'";
         $rezz=$this->zaprosSQL($zz);
         while (!is_null($stroka1=(mysqli_fetch_array($rezz)))) {
           if (strripos($stroka1['text'], $text ,0))
           $this->zaprosSQL("DELETE FROM `".$nameTable."_tegi` WHERE stolb=".$pole." AND str=".$str." AND text='".$stroka1['text']."'");
          }  
       }
       /////////////////////////////
     if ($text!="-" && $attrib!='задать тег' &&  $attrib!='удалить' && $attrib!='удалить option' && $attrib!='вставить HTML код' && $attrib!='ввести код') {
       $z=$this->zaprosSQL("INSERT INTO ".$nameTable."_tegi (`stolb`, `str`, `name_teg`, `name_attrib`, `text`, `string_ili_int`) VALUES (".$pole.",".$str.",'".$teg."','".$attrib."','".$text."' ,".$stringIliInt.")");
       return true;
       }
     //////////////////////////////////////////////

     if ($attrib=='задать тег' && $text!="" && $z['id_tab_gl']==$str && $attrib!='удалить option') {
      $z=mysqli_fetch_assoc($this->zaprosSQL("SELECT * FROM ".$nameTable." WHERE poz".$pole."='произвольный'"));
      if ($z["poz".$pole]=='произвольный') {
        $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
        $this->zaprosSQL($stroka);
        if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
         $_SESSION['obnovit']=false;
        echo '<script>location.reload();</script>';
        return true;
        }
       }
      }
     //////////////////////////////////////
     if ($attrib=='задать тег' && $text!="" && $z['id_tab_gl']==$str) {
       $z=mysqli_fetch_assoc($this->zaprosSQL("SELECT * FROM ".$nameTable." WHERE poz".$pole."='NULL'"));
        if ($z["poz".$pole]=='NULL' || $z["poz".$pole]=='произвольный') {
        $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
        $this->zaprosSQL($stroka);
        if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
         $_SESSION['obnovit']=false;
         $_SESSION['pokazNULL']=false;
        echo '<script>location.reload();</script>';
        }
       }
      }
    //////////////////////////////////////
     if ($attrib=='задать тег' && $text!="") {
       // для блокировки циклических обновлений проверяем отработала ли функция, если да, то обновление страницы произошло
       $z=mysqli_fetch_array($this->zaprosSQL("SELECT poz".$pole." FROM ".$nameTable." WHERE id_tab_gl=".$str));
       // выполняем задачу по смене значения NULL на нужный тег
       $stroka="UPDATE ".$nameTable." SET poz".$pole."='".$text."' WHERE id_tab_gl=".$str;
       $this->zaprosSQL($stroka);
       //-----------------------------------------------------
       if ($z[0]=='NULL')
       echo '<script>location.reload();</script>';
     }
      /////////////////
      if ($attrib=='удалить' && $attrib!='удалить option') {
         $stroka="UPDATE ".$nameTable." SET poz".$pole."='NULL' WHERE id_tab_gl=".$str;
         $this->zaprosSQL($stroka);
         if (isset($_SESSION['obnovit']) && $_SESSION['obnovit']) {
          $_SESSION['obnovit']=false;
          $_SESSION['pokazNULL']=false;
         echo '<script>location.reload();</script>';
         }
       }
     } 

     public function selectValue($attrib)
     {
       if ($attrib=='accesskey' || $attrib=='autofocus' || $attrib=='form' 
        || $attrib=='multiple' || $attrib=='name' || $attrib=='required' || $attrib=='size' || $attrib=='tabindex') return 'select';
        if ($attrib=='disabled' || $attrib=='label' || $attrib=='selected' || $attrib=='value') return 'option';
        return 'value';
     }

     public function poiskButtonName()
        {
          $i=1;$j=1;
          if (isset($_SESSION['nameTablice'])) {
          $this->strok=$this->kolVoZapisTablice($_SESSION['nameTablice']);
           $this->stolb=$this->kolVoStolbovTablice($_SESSION['nameTablice']);
          }
          if (isset($_SESSION['clickButtonGlawnPole']) && $_SESSION['clickButtonGlawnPole']) { 
            for ($i=1; $i<=$this->strok; $i++) //перебираем столбцы начиная с первого.
             for ($j=1; $j<$this->stolb; $j++)  // перебираем строки с первойkolVoZapisTablice
                if (isset($_POST['savePola'.$j."_".$i])) return $j."_".$i;
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
          $zz=mysqli_fetch_array($this->zaprosSQL("SELECT text FROM ".$nameTablic."_tegi WHERE stolb=".$poz." AND str=".$str." AND name_attrib='число строк'"));
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
            echo '<option>ввести код</option>';
          
          if ($teg=='произвольный' || $teg=='NULL') {
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
         
          if ($teg=='заголовок') {
              echo '<option>h1</option>';
              echo '<option>h2</option>';
              echo '<option>h3</option>';
              echo '<option>h4</option>';
              echo '<option>h5</option>';
              echo '<option>h6</option>';
              echo '<option>p</option>';
            }

        if ($teg=='select') {
        echo '<option>удалить option</option>';
        echo '<option>option</option>';
        }

        if ($teg=='img')
            echo '<option>источник ссылки</option>';
        if ($teg=='p' || $teg=='h1' || $teg=='h2' || $teg=='h3' || $teg=='h4' || $teg=='h5' || $teg=='h6') {
        echo '<option>текст по умолчанию</option>';
        echo '<option>источник текста</option>';
        }
        if ($teg=='form') {
        echo '<option>ширина столбцов bootstrap</option>';
        echo '<option>разделение блоков с BR</option>';
        echo '<option>разделение блоков с HR</option>';
        }

        if ($teg=='video source') {
        echo '<option>удалить source</option>';
        echo '<option>source</option>';
        }

        if ($teg=='radio' || $teg=='checkbox') {
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

    public function poiskSwoistvaTega($nameTable,$teg,$attrib,$str,$pole)
        {
          $z=$this->zaprosSQL("SELECT text FROM ".$nameTable."_tegi WHERE name_teg='".$teg."' AND str=".$str." AND stolb=".$pole." AND name_attrib='".$attrib."'");
          $stroka=mysqli_fetch_assoc($z);
          return $stroka['text'];
        }

    public function createFormTablicyMenu($nameTablic,$kol_voStrokVvod)
        {
          // Проверка будет меню 3,4 или меню 5  ////////////////////////////
          $zapros="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".$this->initBdNameBD()."' AND TABLE_NAME = '".$nameTablic."' AND COLUMN_NAME = 'STATUS'";
          $typeMenu=34;
          $rez=$this->zaprosSQL($zapros);
          $stroka=mysqli_fetch_assoc($rez);
          if (!is_null($stroka))
          if ($stroka['ORDINAL_POSITION']>4) $typeMenu="5";
          //////////////////////////////////////////////////////////////////////
            $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
            $rez=$this->zaprosSQL($zapros);
            $kol_voZapisej=$this->kolVoZapisTablice($nameTablic);        // Проверяем фактическое число записей в таблице
            $zapros="SELECT kol_voKn FROM tablica_tablic WHERE NAME='".$nameTablic."'";  // Проверяем данные о числе записей в таблице таблиц
            $kol_voZapisejTablicaTablic=mysqli_fetch_assoc($this->zaprosSQL($zapros));
            if (!isset($kol_voZapisejTablicaTablic['kol_voKn'])) $kol_voZapisejTablicaTablic['kol_voKn']=0;
            $kol_voStrok=$kol_voZapisejTablicaTablic['kol_voKn'];
            //Находим максимальное значение из трёх источников: из таблицы таблиц, из введенного и из фактического
            if ($kol_voStrokVvod>=$kol_voZapisej) $maxKnopok=$kol_voStrokVvod; else $maxKnopok=$kol_voZapisej;
            if ($maxKnopok>$kol_voStrok) {
                $kol_voStrok=$maxKnopok;
                $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$kol_voStrok." WHERE NAME='".$nameTablic."'";
                $this->zaprosSQL($zapros);
            }
            if ($kol_voZapisej>$kol_voZapisejTablicaTablic['kol_voKn']) {
                $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$kol_voStrok." WHERE NAME='".$nameTablic."'";
                $this->zaprosSQL($zapros);
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
            for ($i=0; $i<$kol_voStrok; $i++) {
                if (!is_null($kol_voZapisej) && $kol_voZapisej>$i) {
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
           $typeMenu=$this->typMenu($nameTablic);
           if ($typeMenu==1 || $typeMenu==3 || $typeMenu==4 || $typeMenu==5 || $typeMenu==6 || $typeMenu==7 || $typeMenu==8 || $typeMenu==9) {
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
              if ($typeMenu==9) {
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
          if ($typeMenu==2) {
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

        public function saveFormTablicyMenu($nameTablic)
        {
                    // Проверка будет меню 3,4 или меню 5  ////////////////////////////
                    $zapros="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".$this->initBdNameBD()."' AND TABLE_NAME = '".$nameTablic."' AND COLUMN_NAME = 'STATUS'";
                    $typeMenu=34;
                    $rez=$this->zaprosSQL($zapros);
                    $stroka=mysqli_fetch_assoc($rez);
                    if (!is_null($stroka))
                    if ($stroka['ORDINAL_POSITION']==5) $typeMenu="5";
                    //////////////////////////////////////////////////////////////////////
            $this->clearTab($nameTablic);
            $i=0;
            $id="ID".$i;
            $name="NAME".$i;
            $url="URL".$i;
            $class="CLASS".$i;
            $status="STATUS".$i;
            while (isset($_POST[$id])) {
                if ($_POST[$name]!="") {
                  if ($typeMenu==34)
                    $zapros="INSERT INTO ".$nameTablic."(`ID`, `NAME`, `URL`, `CLASS`) VALUES (".$_POST[$id].",'".$_POST[$name]."','".$_POST[$url]."','".$_POST[$class]."')";
                    if ($typeMenu==5) 
                    $zapros="INSERT INTO ".$nameTablic."(`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES (".$_POST[$id].",'".$_POST[$name]."','".$_POST[$url]."','".$_POST[$class]."','".$_POST[$status]."')";
                    $rez=$this->zaprosSQL($zapros);
                }
                $i++;
                $id="ID".$i;
                $name="NAME".$i;
                $url="URL".$i;
                $class="CLASS".$i;
                $status="STATUS".$i;
             }
           $zapisej=$this->kolVoZapisTablice($nameTablic);  // проверяем сколько удалось записать строк для менюшки и обновляем число записей в таблице таблиц
           $zapros="UPDATE tablica_tablic SET `kol_voKn`=".$zapisej." WHERE NAME='".$nameTablic."'";
           $this->zaprosSQL($zapros);
        }
}
