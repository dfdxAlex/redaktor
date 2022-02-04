<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class initBd extends instrument implements interface\interface\InterfaceWorkToBd,
                                           interface\interface\InterfaceCollectScolding,
                                           interface\interface\InterfaceDebug
{
    
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
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

}
