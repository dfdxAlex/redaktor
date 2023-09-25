<?php
namespace class\translate;

/** Simpleton
 * Класс обрабатывает ссылку с уровнем Level
 * 
 */
/**
  * The class handles the link with Level
*/

/** Manual
 * 
 * Создать объект
 * src\libraries\UrlLevel::urlLevel($min=1, $max=10);
 * второй и третий - это минимум и максимум изменения уровня Level
 * 
 * getUrlStart()
 * возвращает чистый урл страницы, без get параметров
 * 
 * getLevel()
 * возвращает текущий шаг
 * 
 * getUrlReal()
 * возвращает ссылку с get параметрами
 * 
 * getGetMas()
 * Возвращает ссылку на массив, содержащий get параметры
 * 
 * printGetMas()
 * выводит на экран массив с get параметрами
 * 
 * getUrlUp()
 * Возвращает ссылку, для движения вперед
 * 
 * getUrlDown()
 * возвращает ссылку для движения назад
 * 
 * getMin()
 * возвращает минимальное значение уровня Level
 * 
 * getMax()
 * возвращает максимальное значение уровня Level
 */
class UrlLevel
{
    private static $instances = null;

    /**
     * В переменной содержится готовая ссылка
     */
    private static $url = null;
    /**
     * В переменной содержится переданное в конструктор значение
     * уровня Level
     */
    private static $level;
    /**
     * В переменной держим образец ссылки, без параметров гет
     */
    private static $urlStart = null;
    /**
     * Ссылка вместе с гет параметрами
     */
    private static $urlReal;
    /**
     * Get массив из строки
     */
    private static $getMas = [];
    /**
     * Переменные содержат минимум и максимум изменения шага
     */
    private static $min;
    private static $max;

    /**
     * Переменная для хранения имени элемента массива GET
     * с которым работаем. По умолчанию работаем с GET[level]
     */
    private static $getName = 'level';

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
    
    /** Конструктор */
    public static function urlLevel($min=1, $max=10): UrlLevel
    {
        /** Создать объект, если он не создан */
        if (is_null(self::$instances)) 
            self::$instances = new self();

        /** Принять границы изменения шага */
        self::$min=$min;
        self::$max=$max;

        /**
         * Переменная содержит рабочее имя элемента массива Get.
         * Данная переменная используется для организации работы с другими целями,
         * отличными от цели перемещения по страницам сайта.
         * Для стабильной работы, данная переменная всегда сбрасывается в значение level
         * и изменяется непосредственно перед другим применением класса.
         */
        self::$getName='level';

        /** 
         * Если есть значение на входе конструктора, то 
         * поместить его в статическую переменную
         */
        if (isset($_GET[self::$getName]))
            self::$level=$_GET[self::$getName];
        else self::$level = $min;
        
        /** 
         * Если нету стартового урла кнопки, то создать его.
         * Параллельно очищаем от ненужного Get запроса прошлого
         * раза. Всё, что после ? удаляется.
         */
        if (is_null(self::$urlStart)) {
            self::$urlReal = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            self::$urlStart=preg_replace('/\?.*/','',self::$urlReal);
        }

        /** 
         * Запомнить Get массив
         */
        foreach($_GET as $key=>$value) {
            self::$getMas[$key] = $value;
        }
          
        return self::$instances;
    }

    /** Возвратить чистый урл страницы, запускающей скрипт */
    public function getUrlStart()
    {
        return self::$urlStart;
    }

    /**Возвращает левл, без ссылки */
    public function getLevel():int
    {
        return self::$level;
    }

    /**Вернуть ссылку с гет параметрами */
    public function getUrlReal():string
    {
        return self::$urlReal;
    }

    /** Вернуть ссылку на массив с гет параметрами*/
    public function getGetMas()
    {
        return self::$getMas;
    }


    /** вывести на экран все гет параметры*/
    public function printGetMas()
    {
        foreach(self::$getMas as $key=>$value)
            echo "$key => $value <br>";
    }
    /** функция из массива делает строку с параметрами GET */
    public function getStr(array $mas):string
    {
        $i=0;
        $rez='';
        foreach($mas as $key=>$value) {
            $i==0 ? $rez.= "?" : $rez.= "&";
            $rez.="$key=$value";
            $i++;
        }
        return $rez;
    }

    /** вывести ссылку для движения вперед */
    public function getUrlUp()
    {
        if (empty(self::$getMas['level'])) self::$getMas['level']=$this->getMin()-1;
        
        if (self::$getMas['level']<$this->getMax()) {
            self::$getMas['level']++;
        }
        return $this->getUrlStart().$this->getStr(self::$getMas);
    }

    /** вывести ссылку для движения назад */
    public function getUrlDown()
    {

        if (empty(self::$getMas['level'])) self::$getMas['level']=$this->getMax()+1;
    
        if (self::$getMas['level']>$this->getMin()) 
            self::$getMas['level']--;

        return $this->getUrlStart().$this->getStr(self::$getMas);
    }


    /** Прочитать минимальный предел изменения переменной Level */
    public function getMin()
    {
        return self::$min;
    }
    /** Прочитать максимальный предел изменения переменной Level */
    public function getMax()
    {
        return self::$max;
    }

    public function setGetMas($key, $value)
    {
        self::$getMas[$key] = $value;
    }
}
