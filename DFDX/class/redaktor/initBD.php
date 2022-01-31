<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class initBd extends instrument implements interface\interface\InterfaceWorkToBd
{
    
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    ////////////////////////////////////////////////Настройка движка
    // информация показывать ли на сайте форму сбора матов. 1-показать, 0-не показывать.
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        parent::__construct();
        $fd = fopen(parent::searcNamePath('tmp/initBD.ini'), 'r') or die("не удалось открыть файл");
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
      public function __destruct()
      {
        mysqli_close($this->con);
      }


      public function sborMatov() {
        $zapros="SELECT nastr FROM tablica_nastroer_dvigka_int WHERE id=1"; //настройка показа формы сбора данных
        $rez=$this->zaprosSQL($zapros);
        if ($rez) 
            $stroka=mysqli_fetch_array($rez);
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
        if ($value==$slowo) 
            return true;
      return false;
    }

    public function proverkaMata($slovo) // проверяет входной параметр на соответствие мату из базы данных
    {
      $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
      while(!is_null($stroka=mysqli_fetch_array($rez)))
         if ($slovo==$stroka[0]) return true;
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
      if (is_null($stroka)) 
        return 0;
      if ($stroka[0]=='') 
        return 0;
      if ($stroka) 
        return $stroka[0];
      return 0;
    }
    //Функция проверяет статус в заданной таблице, выводит checked="checked" если статус есть или ''
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
    public function siearcSlova($nameTablice,$stolb,$slovo)
    {
      $zapros="SELECT ".$stolb." FROM ".$nameTablice." WHERE ".$stolb."='".$slovo."'";
      $rez=$this->zaprosSQL($zapros);
      if ($rez===false) 
          return false;
      $stroka=mysqli_fetch_array($rez);
      if (is_null($stroka)) 
          return false;
      $strr='--'.$stroka[0];
      $strVhod=stripos( $strr ,$slovo);
      if ($strVhod>1) 
          return true;
      return false;
    }
    public function printTab($mesadz,$kill)
    {
      if ($kill) 
          $this->zaprosSQL("DELETE FROM `debuger` WHERE 1");
      $zapros="CREATE TABLE debuger (mesage VARCHAR(255))";
      $this->zaprosSQL($zapros);
      $zapros="INSERT INTO debuger(mesage) VALUES ('".$mesadz."')";
      $this->zaprosSQL($zapros);
    }
    public function printTabEcho()
    {
      $zapros="SELECT * FROM debuger WRERE 1";
      $rez=$this->zaprosSQL($zapros);
      if ($rez===false) {
          echo 'не получилось скачать данные из таблицы debuger'; 
          return false;
       }
      $stroka=mysqli_fetch_assoc($rez);
      while (!is_null($stroka=mysqli_fetch_assoc($rez)))
        foreach ($stroka as $key => $value)
           echo $key.'=>'.$value;
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
           if ($stroka['radio'] || $stroka['checkbox']) {
                $vozvrat=true;
                break;
            }
        return $vozvrat;
    }
    public function id_tab_gl_searc($nameTablicy)
     {
        $zapros="select * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
        $stroka='';
        $rez=$this->zaprosSQL($zapros);
        if (parent::notFalseAndNULL($rez))
            $stroka=(mysqli_fetch_assoc($rez));
        if ($stroka['COLUMN_NAME']=='id_tab_gl') return true;
        return false;
     }
    public function searcNameTablic($nameTablicy) // Поиск таблицы в базе данных
    {
        $result=false;
        $zapros="SHOW TABLES";
        $rez=$this->zaprosSQL($zapros);
        while (!is_null($stroka=(mysqli_fetch_array($rez))))
            if ($stroka[0]==$nameTablicy)   
                $result=true;           
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
            parent::okCansel('Такой таблицы нет и не важно на что нажать:). Пока-пока...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
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
        if ($rez===false) 
            return -1;
        $stroka=mysqli_fetch_array($rez);
        if (is_null($stroka[0])) 
            $stroka[0]=-1;
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
        if ($statistikTrueFalse['statik_true']==1) {
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

        if (parent::notFalseAndNULL($rez)!==true) echo 'Проблема с таблицей "tablica_tablic"';

        if (parent::notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
        
        if (parent::notFalseAndNULL($stroka))   
            if ($stroka[0]>-1) $boolRez=true;
        
        return $boolRez; 
     }
     public function kolVoZapisTablice($nameTablice) // считает число записей в таблицк
     {
       if ($this->searcNameTablic($nameTablice)) {
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
      $i=0;
      $ii=0;
      $iii=0;
      foreach($parametr as $value) {
          if (stripos('sss'.$value,'name=')) {
              $nametablice=preg_replace('/name=/','',$value);
              $nametablice=mb_strtolower($nametablice);
          }
          if (stripos('sss'.$value,'просмотр'))
              $prosmotr=true;
          
          if (stripos('sss'.$value,'poleN='))
              $masN[$i++]=preg_replace('/poleN=/','',$value);
          
          if (stripos('sss'.$value,'poleT='))
              $masT[$ii++]=preg_replace('/poleT=/','',$value);
          
          if (stripos('sss'.$value,'poleS='))
              $masS[$iii++]=preg_replace('/poleS=/','',$value);
          //обработка параметра help
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

          if (stripos('sss'.$masT[$j],'VARCHAR') 
           || stripos('sss'.$masT[$j],'varchar')
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
         if (!$prosmotr)
          $this->zaprosSQL($zapros);
      } 
      if ($prosmotr)  //режим просмотра запроссов
        echo '<p>Запрос для создания таблицы: '.$zapros1.'</p><p>Запрос для первой строки: '.$zapros2.'</p>';
     }
}
