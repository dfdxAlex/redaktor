<?php
namespace class\redaktor;

class DatabaseConn
{
    /**redaktor\DatabaseConnection.php
     * В свойстве $con будет находиться идентификатор соединения 
     * с базой
     */
    private static $con = null;
    private static $host; 
    private static $loginBD; 
    private static $parol; 
    private static $nameBD; 
    private static $site; 
    private static $smtpServerFoPhpMailer; 
    private static $mailFoPhpMailer; 
    private static $parolFoMailFoPhpMailer; 
    private static $siteRootDirectory; 

    /**
     * Свойство хранит ссылку на объект или null, если объект ещё не создан
     */
    private static $objLink=null;

    /**
     * Конструктор типа protected, для запрета создания нового 
     * объекта оператором new
     */
    protected function __construct() { }

    /**
     * Запрет клонирования.
     */
    protected function __clone() { }

    /**
     * Запрет восстановления из строк
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * Метод создающий объект.
     */
    public static function dBConnection()
    {
        if (is_null(self::$objLink)) 
            self::$objLink = new DatabaseConn;

        /** Бизнес-логика */
        if (is_null(self::$con)) {
            $fd = fopen(\class\nonBD\SearchPathFromFile::createObj()->searchPath('tmp/initBD.ini'), 'r') or die("не удалось открыть файл");
            self::$host=stristr(fgets($fd),';',true); 
            self::$loginBD=stristr(fgets($fd),';',true); 
            self::$parol=stristr(fgets($fd),';',true); 
            self::$nameBD=stristr(fgets($fd),';',true); 
            self::$site=stristr(fgets($fd),';',true); 
            self::$smtpServerFoPhpMailer=stristr(fgets($fd),';',true); 
            self::$mailFoPhpMailer=stristr(fgets($fd),';',true); 
            self::$parolFoMailFoPhpMailer=stristr(fgets($fd),';',true); 
            self::$siteRootDirectory=stristr(fgets($fd),';',true); 
            fclose($fd);
            self::$con = mysqli_connect(self::$host,self::$loginBD,self::$parol,self::$nameBD) OR die ('ошибка подключения БД'); 
            }

        return self::$objLink;
    }

    /**
     * Бизнес-логика
     */
    public function getCon()
    {
        return self::$con;
    }

    public function initBdHost()
    {
      return self::$host;
    }

    public function initBdLogin()
    {
      return self::$loginBD;
    }

    public function initBdParol()
    {
      return self::$parol;
    }

    public function initBdNameBD()
    {
      return self::$nameBD;
    }

    public function initsite()
    {
      return self::$site;
    } 

    public function initMailFoPhpMailer()
    {
      return self::$mailFoPhpMailer;
    } 

    public function initParolFoMailFoPhpMailer()
    {
      return self::$parolFoMailFoPhpMailer;
    } 

    public function smtpServerFoPhpMailer()
    {
      return self::$smtpServerFoPhpMailer;
    } 

    public function siteRootDirectory()
    {
      if (self::$siteRootDirectory=='') return $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
      self::$siteRootDirectory=preg_replace('/\//',DIRECTORY_SEPARATOR,self::$siteRootDirectory);
      return self::$siteRootDirectory;
    }
}
