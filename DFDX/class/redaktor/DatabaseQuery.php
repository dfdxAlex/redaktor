<?php
namespace class\redaktor;

class DatabaseQuery
{
    /**
     * В массиве будут находиться имена файлов и их путь
     */
    private static $pathMas = [];

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
    public static function createDbQuery()
    {
        if (is_null(self::$objLink)) 
            self::$objLink = new DatabaseQuery;

        return self::$objLink;
    }
    /**
     * Начинается бизнес-логика
     */
    public function dbQuery(string $str)
    {
        $rez = mysqli_query(\class\redaktor\DatabaseConn::dBConnection()->getCon(), $str);
        
        if (!is_null($rez))
            return $rez;
        else return '';
    }
}
