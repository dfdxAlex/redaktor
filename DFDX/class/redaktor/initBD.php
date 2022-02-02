<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class initBd extends instrument implements interface\interface\InterfaceWorkToBd,
                                           interface\interface\InterfaceCollectScolding
                                           //interface\interface\InterfaceWorkToType
{
    
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceButton;
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

    





    // Функция записывает некоторое сообщение в таблицу `debuger`. Если $kill=true, запись будет одна, если false, то будут добавляться
    public function printTab($mesadz,$kill)
    {
      if ($kill) 
          $this->zaprosSQL("DELETE FROM debuger WHERE 1");
      $zapros="CREATE TABLE debuger (mesage VARCHAR(255))";
      $this->zaprosSQL($zapros);
      $zapros="INSERT INTO debuger(mesage) VALUES ('".$mesadz."')";
      $this->zaprosSQL($zapros);
    }

    // Выводит данные из таблицы debuger
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
