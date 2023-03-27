<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToBd
{
  public function connectToBd()
  {
      /**  Объект по шаблону Singleton, ищет и хранит в себе путь к искомому файлу
       * Создать объект или вернуть ссылку на него.
       * Вторая строка запускает метод по поиску файла
      */

      /**
       * получить ссылку на канал соединения с базой данных
       */
      $obj = \class\redaktor\DatabaseConn::dBConnection();
      /**
       * вызов методов из объекта DatabaseConn;
       * объект отвечает за соединение с базой данных
       */
      $this->con = $obj->getCon();
      $this->host=$obj->initBdHost(); 
      $this->loginBD=$obj->initBdLogin(); 
      $this->parol=$obj->initBdParol();
      $this->nameBD=$obj->initBdNameBD();
      $this->site=$obj->initsite();
      $this->smtpServerFoPhpMailer=$obj->smtpServerFoPhpMailer();
      $this->mailFoPhpMailer=$obj->initMailFoPhpMailer();
      $this->parolFoMailFoPhpMailer=$obj->initParolFoMailFoPhpMailer();
      $this->siteRootDirectory=$obj->siteRootDirectory(); 
  
    }

  public function tableValidationCMS()
      {
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

            // проверка таблицы status_klienta
            if (!$this->searcNameTablic('status_klienta')) {
                $zapros="CREATE TABLE status_klienta(login VARCHAR(30), parol VARCHAR(30), mail VARCHAR(50), status INT , time INT)";
                $this->zaprosSQL($zapros);
               }

            //Проверка существования таблицы type_menu_po_imeni
            if (!$this->searcNameTablic('type_menu_po_imeni')) {  // Проверяем есть ли таблица с названия-типами меню
              $zapros="CREATE TABLE type_menu_po_imeni(
                                                        name_menu    VARCHAR (100),
                                                        type_menu    INT 
                                                      )  ";
              $this->zaprosSQL($zapros);
            } 

            // заменить на отдельный класс
            //проверим есть ли вспомогательная таблица и матов
            if (!$this->searcNameTablic('maty'))
                 $this->zaprosSQL("CREATE TABLE maty(mat VARCHAR(15))");
            //проверим есть ли вспомогательная таблица и Не матов
            if (!$this->searcNameTablic('nie_maty'))
                 $this->zaprosSQL("CREATE TABLE nie_maty(nie_mat VARCHAR(15))");
            //проверим есть ли вспомогательная таблица для матов от пользователей
            if (!$this->searcNameTablic('mat_ot_polzovatelej'))
                 $this->zaprosSQL("CREATE TABLE mat_ot_polzovatelej(mat VARCHAR(15), login VARCHAR(15))");



              // проверка присутствия таблиц для модуля работы со статистикой
                $this->createTab(
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
                // проверка присутствия таблиц для модуля работы со статистикой
                $this->createTab(
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

                // проверка присутствия таблиц для искусственного интеллекта игры крестики нолики
                $this->createTab(
                 'name=tic_tac_toe',
                 'poleN=id',
                 'poleT=int',
                 'poleS=0',
                 'poleN=iniciator',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move1',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move2',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move3',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move4',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move5',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move6',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move7',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move8',
                 'poleT=int',
                 'poleS=0',
                 'poleN=move9',
                 'poleT=int',
                 'poleS=0',
                 'poleN=rezult',
                 'poleT=VARCHAR(50)',
                 'poleS=-',
               );
      }

  //функция проверяет есть ли таблица и если нет, то создает её
  public function createTab(...$parametr) 
  {
   $nametablice='';
   $masN=array();
   $masT=array();
   $masS=array();
   $prosmotr=false;
   $zapros1='Таблица уже существует!';
   $zapros2='Стартовое значение уже задано!';
   $i=0;
   $ii=0;
   $iii=0;
   foreach($parametr as $value) {
       if (stripos($value,'name=')!==false) {
           $nametablice=preg_replace('/name=/','',$value);
           $nametablice=mb_strtolower($nametablice);
       }
       if (stripos($value,'просмотр')!==false)
           $prosmotr=true;
       if (stripos($value,'poleN=')!==false)
           $masN[$i++]=preg_replace('/poleN=/','',$value);
       if (stripos($value,'poleT=')!==false)
           $masT[$ii++]=preg_replace('/poleT=/','',$value);
       if (stripos($value,'poleS=')!==false)
           $masS[$iii++]=preg_replace('/poleS=/','',$value);
       if ($value=='help' || $value=='Помощь') {
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
     }
   if ($nametablice=='' || $i!=$ii || $ii!=$iii) {
       echo 'Не корректное имя таблицы';
       return false;
     } //если забыли задать имя таблицы, то выходим из функции

   if (!$this->searcNameTablic($nametablice)) {
      $zapros="CREATE TABLE ".$nametablice.' (';
      $z='';
      for($j=0; $j<$i; $j++) {
          if ($j+1<$i)
             $z=$z.$masN[$j].' '.$masT[$j].', ';
          else $z=$z.$masN[$j].' '.$masT[$j];
        }
     $zapros=$zapros.$z.')';
     $zapros1=$zapros;
     if (!$prosmotr)
        $this->zaprosSQL($zapros);
     } 
 
 if (!$this->kolVoZapisTablice($nametablice)>0) {
     $zapros="INSERT INTO ".$nametablice.' (';
     $z='';
     $z1='';

     for($j=0; $j<$i; $j++) {
       if ($j+1<$i)
           $z=$z.$masN[$j].', ';
       else 
           $z=$z.$masN[$j];
       $znak='';

       if (stripos($masT[$j],'VARCHAR')!==false 
        || stripos($masT[$j],'varchar')!==false
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
       else 
           $z1=$z1.$znak.$masS[$j].$znak;
      }
      $zapros=$zapros.$z.') VALUES ('.$z1.')';
      $zapros2=$zapros;
      //echo $zapros;
      if (!$prosmotr)
       $this->zaprosSQL($zapros);
   } 
   if ($prosmotr)  //режим просмотра запроссов
     echo '<p>Запрос для создания таблицы: '.$zapros1.'</p><p>Запрос для первой строки: '.$zapros2.'</p>';
  }
  
     public function kolVoStolbovTablice($nameTablice)  
     {
         $zapros="SELECT MAX(ORDINAL_POSITION) FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME='".$nameTablice."'";
         $query=$this->zaprosSQL($zapros);   
         $viv=mysqli_fetch_array($query);
         return $viv[0];
      }
     public function kolVoZapisTablice($nameTablice)  
     {
         if ($this->searcNameTablic($nameTablice)) {
             $zapros="SELECT COUNT(1) FROM ".$nameTablice;
             $rez=$this->zaprosSQL($zapros);
             $viv=mysqli_fetch_array($rez);
             return $viv[0];
          } else return 0;
     }

     public function tablicaDlaMenu($nameTablice)
     {
         $boolRez=false;
         $zapros="SELECT ID FROM tablica_tablic WHERE NAME='".$nameTablice."'";
         $rez=$this->zaprosSQL($zapros);
         if ($this->notFalseAndNULL($rez)!==true) echo 'Проблема с таблицей "tablica_tablic"';
         if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
         if ($this->notFalseAndNULL($stroka))   
         if ($stroka[0]>-1) $boolRez=true;
         return $boolRez; 
      }
      
     public function zaprosSQL($zapros)
     {
        return \class\redaktor\DatabaseQuery::createDbQuery()->dbQuery($zapros);
     }

     public function killZapisTablicy($nameTablice,$were) 
     {
        $zapros="DELETE FROM ".$nameTablice." ".$were;
        $rez=$this->zaprosSQL($zapros);
     }

     public function maxIdLubojTablicy($nameTablice)  // поиск максимального ID таблицы +1
     {
         $zapros="SELECT MAX(id) FROM ".$nameTablice;
         $rez=$this->zaprosSQL($zapros);
         if ($rez===false) return -1;
         $stroka=mysqli_fetch_array($rez);
         if (is_null($stroka[0])) $stroka[0]=-1;
         $rezId=$stroka[0]+1;
         return $rezId;
      }

      public function clearTab($nameTablicy)
          {
              $zapros="TRUNCATE TABLE ".$nameTablicy;
              $rez=$this->zaprosSQL($zapros);
          }

      public function killTabEtap1($nameTablicy)
      {      
          if ($this->searcNameTablic($nameTablicy)) {
              echo '<h4>Внимание!! Попытка удалить таблицу '.$nameTablicy.'</h4>'; 
                  echo '<div class="container">';
                      echo '<div class="row">';
                          echo '<form method="POST" action="redaktor.php">';
                              echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="'.$this->zapretUdaleniaTablicy($nameTablicy).'" name="killTabOk">';
                              echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="Отмена" name="killTabCancel">';
                          echo '</form>';
                      echo '</div>';
                  echo '</div>';
            } else 
            okCansel('Такой таблицы нет и не важно на что нажать:). Пока-пока...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
       }

      public function killTab($nameTablicy)
      {
          $zapros="DROP TABLE ".$_SESSION['nameTablice'];
          $rez=$this->zaprosSQL($zapros);
      }

      public function killTab2($nameTablicy)
      {
          $zapros="DROP TABLE ".$nameTablicy;
          $rez=$this->zaprosSQL($zapros);
      }
      public function searcNameTablic($nameTablicy)  
      {
          $result=false;
          $zapros="SHOW TABLES";
          $rez=$this->zaprosSQL($zapros);
          while (!is_null($stroka=(mysqli_fetch_array($rez))))
              if ($stroka[0]==$nameTablicy)   
                  $result=true;           
          return $result;
       }
      public function id_tab_gl_searc($nameTablicy)
      {
         $zapros="select * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
         $stroka='';
         $rez=$this->zaprosSQL($zapros);
         if ($this->notFalseAndNULL($rez)) {
               $stroka=(mysqli_fetch_assoc($rez));
               return false;
             }
         if ($stroka['COLUMN_NAME']=='id_tab_gl') return true;
         return false;
      }

      public function radioAndChekboxSearc($nameTablicy)
        {
            $zapros="select  from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
            $rez=$this->zaprosSQL($zapros);
            $vozvrat=false;
            $str=$this->kolVoZapisTablice($nameTablice);
            while (!is_null($stroka=(mysqli_fetch_assoc($rez))))
               if ($stroka['radio'] || $stroka['checkbox']) {
                  $vozvrat=true;
                  break;
              }
            return $vozvrat;
        }

     public function zapretUdaleniaTablicy($nameTablicy)  
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
           if ($nameTablicy=='tablica_nastroer_dvigka_int') return 'Невозможно удалить';  
           if ($nameTablicy=='dla_statusob_123') return 'Невозможно удалить';
           return 'Согласен удалить';
       }
  
    public function siearcSlova($nameTablice,$stolb,$slovo)
      {
        $zapros="SELECT ".$stolb." FROM ".$nameTablice." WHERE ".$stolb."='".$slovo."'";
        $rez=$this->zaprosSQL($zapros);
        if ($rez===false) return false;
        $stroka=mysqli_fetch_array($rez);
        if (is_null($stroka)) return false;
        $strr='--'.$stroka[0];
        $strVhod=stripos( $strr ,$slovo);
        if ($strVhod>1) return true;
        return false;
      }

    public function searcIdPoUsloviu($nameTablicy,$usl1,$usl2,$usl3,$usl4,$usl5)  
    {
      $zapros="SELECT MAX(id) FROM ".$nameTablicy;
      if ($usl1!="") $zapros=$zapros.' WHERE '.$usl1;
      if ($usl2!="") $zapros=$zapros.' AND '.$usl2;
      if ($usl3!="") $zapros=$zapros.' AND '.$usl3;
      if ($usl4!="") $zapros=$zapros.' AND '.$usl4;
      if ($usl5!="") $zapros=$zapros.' AND '.$usl5;
      $rez=$this->zaprosSQL($zapros);
      if (!$rez) return 0;
      $stroka=mysqli_fetch_array($rez);
      if (is_null($stroka)) return 0;
      if ($stroka[0]=='')   return 0;
      if ($stroka)  return $stroka[0];
      return 0;
    }

    public function initBdHost()
    {
      return $this->host;
    }

    public function initBdLogin()
    {
      return $this->loginBD;
    }

    public function initBdParol()
    {
      return $this->parol;
    }

    public function initBdNameBD()
    {
      return $this->nameBD;
    }

    public function initsite()
    {
      return $this->site;
    } 

    public function initMailFoPhpMailer()
    {
      return $this->mailFoPhpMailer;
    } 

    public function initParolFoMailFoPhpMailer()
    {
      return $this->parolFoMailFoPhpMailer;
    } 

    public function smtpServerFoPhpMailer()
    {
      return $this->smtpServerFoPhpMailer;
    } 

    public function siteRootDirectory()
    {
      if ($this->siteRootDirectory=='') return $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
      $this->siteRootDirectory=preg_replace('/\//',DIRECTORY_SEPARATOR,$this->siteRootDirectory);
      return $this->siteRootDirectory;
    }

    public function checkedStatus($pole,$str,$status,$nameTable)
    {
      $zapros="SELECT status FROM ".$nameTable."_status WHERE stolb=".$pole." AND str=".$str;
      $rez=$this->zaprosSQL($zapros);
      if ($rez===false) 
          return ' ';
      $stroka=mysqli_fetch_array($rez);
      if ($stroka===false) 
          return ' ';
      if (stripos($stroka['0'],$status)!==false) 
          return 'checked';
      $rez=$this->zaprosSQL($zapros);
      $stroka=mysqli_fetch_array($rez);
      return ' ';
    }

    public function naGlavnuStranicu()
    {
      exit("<meta http-equiv='refresh' content='0; url= ".$this->initsite()."'>");
    }

    public function tutObnovit()
    {
      exit("<meta http-equiv='refresh' content='0; url= 'redaktor.php'>");
    }

    public function nameGlawnogoSite()
    {
      return $this->initsite();
    }
}
