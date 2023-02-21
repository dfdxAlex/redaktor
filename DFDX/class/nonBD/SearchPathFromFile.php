<?php
namespace class\nonBD;

/**
  * Pattern Singleton.
  * Pattern should create only one object - pattern principle
  * Property for business logic is an array with a list of searched file names.
  * The pattern must accept the desired file, check it in the array.
  * If the file was found earlier, then return the value from the array, otherwise, 
  * find the file, write its path to an array and return the value to the user.
*/
/**
 * Паттерн Одиночка. 
 * Паттерн должен создавать только один объект - принцип паттерна
 * Свойство для бизнесс-логики - это массив со списком искомых имён файлов.
 * Паттерн должен принимать искомый файл, проверять его в массиве. 
 * Если файл находили ранее, то вернуть значение из массива, иначе, найти файл,
 * записать его путь в массив и вернуть значение пользователю.
 */

class SearchPathFromFile
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
    public static function createObj()
    {
        if (is_null(self::$objLink)) 
            self::$objLink = new SearchPathFromFile;

        return self::$objLink;
    }

    /**
     * Методы бизнес-логики
     * Функция ищет файл в разных каталогах
     */
    public function searchPath(string $nameFile)
    {
        /**Стартовое значение искомого файла */
        $nameFileStart = $nameFile;

        if ($nameFile==="") return false;

        /**Если имя файла есть в массиве, то вернуть его и выйти из функции*/
        if ($this->searchPathFromMass($nameFile)!=='') return $this->searchPathFromMass($nameFile);
        
        /**Если дошли до сюда, значит файл раньше не находился, найти его*/
        while (!file_exists($nameFile)) 
            $nameFile='../'.$nameFile;


        /**Добавить найденный путь в массив */
        self::$pathMas[$nameFileStart]=$nameFile;

        /**Вернуть путь и имя файла */
        return $nameFile;
        
    }

    /**
     * Метод проверяет нет ли в массиве искомого имени файла, если есть, то вернуть путь к 
     * файлу из массива. Если нет, то вернуть пустую строку.
     */
    private function searchPathFromMass(string $nameFile):string
    {
        foreach (self::$pathMas as $key=>$value) {
            if ($key === $nameFile) 
                return $value;
        }
        return '';
    }

}
