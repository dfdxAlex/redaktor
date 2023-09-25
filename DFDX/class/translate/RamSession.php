<?php
namespace src\libraries;

/** Simpelton
 * Класс для работы с массивом $_SESSION
 */

/** Manual:
 * Создать объект
 * src\libraries\RamSession::ramSession();
 * 
 * setPrefix($value) - устанавливает префиекс для работы, возвращает $this
 * getPrefix() - прочитать значение префикса
 * 
 * getRam(), прочитать нужный элемент SESSION
 * setRam() , усстановить значение для указанного элемента SESSION
 * 
 * Вернуть ассоциативный массив из существующих переменных SESSION
 * Если параметр $outError по умолчанию, то будет выкинута ошибка,
 * если переменных не найдено.
 * Параметр префик если true, то выбираем только элементы с префиксом,
 * иначе все.
 * Если параметр $print равет true, то подключить echo и вывести результат
 * на экран.
 * getRamAllPrefix($prefix=true, $print=false, $outError = true)
 * 
 * увеличивает любой счётчик на 1
 * setRamPlus()
 * уменьшает любой счётчик на 1
 * setRamMinus()
 * 
 * Преобразовывает массив ассоциативный, полученный из переменныз SESSION в JSON строку
 * masToJson($prefix=true)
 * 
 * Метод преобразовывает строку JSON в массив, ранее строка была
 * Массивом ассоциативный, полученный в классе из массива SESSION
 * Если $type=true, то вернем массив, иначе объект
 * public function jsonToMas($str,$type=true)
 * 
 * Преобразовывает внутренний массив объекта в массив SESSION
 * masToSession($mas)
 * 
 * Переводит строку JSON в массив SESSION
 * jsonToSession($str)
 * 
 * Записать JSON в Файл
 *public function jsonToFile($nameFile, $str)
 *
 * Метод читает JSON из файла в массив
 *public function fileJsonToMas($nameFile)
 * 
 * читает json из файла, переводит строку в массив, массив переводит 
 * в массив SESSION
 * fileJsonToSession($nameFile)
 */

class RamSession
{

    /**
     * Поле хранит в себе ссылку на созданный объект или NULL,
     * если объект ещё не создавался
     */
    private static $instances = null;

    /**
     * Бизнес логика
     * Переменная хранит префикс для работы с переменными
     */
    public $prefix = null;
   
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
    public static function ramSession($prefix='none'): RamSession
    {
        if (is_null(self::$instances)) 
            self::$instances = new self();
        
        
        /**
         * Часть бизнес-логики
         * Можно задать префикс при создании объекта 
         * */
        if ($prefix!='none') {
            self::$instances->prefix = $prefix;
        } else if (is_null(self::$instances->prefix)) {
            self::$instances->prefix = '';
        }

        
        // /** Часть бизнес-логики */
        // if ($key!='none' && $value!=0) {
        //     $_SESSION[$prefix.$key]=$value;

        // }

        // if (empty($_SESSION['ramSession_mas_0'])) $_SESSION['ramSession_mas_0']='none';
        // if (empty($_SESSION['ramSession_mas_1'])) $_SESSION['ramSession_mas_1']='none';

        return self::$instances;
    }
    
    /**Работа с префиксом, методы установки и получения префикса 
     * setPrefix($value) - усстановить префикс и вернуть ссылку на объект
     * getPrefix() - вернуть префикс или пустую строку
    */
    public function setPrefix($value)
    {
        $this->prefix = $value;
        return $this;
    }
    public function getPrefix()
    {
        if (is_null($this->prefix)) return '';
        return $this->prefix;
    }

    /**
     * Дальше бизнес-логика
     * Если нужный элемент существует, то вернуть его, иначе вернуть ошибку
     */
    public function getRam(string $key)
    {
        try {
            if (empty($_SESSION[$this->prefix.$key])) {
                $error = "Не удалось прочитать элемент SESSION[$this->prefix$key] 
                          //class RamSession->getRam()".PHP_EOL;
                throw new \Exception("$error"); 
            }
            return $_SESSION[$this->prefix.$key];
        } catch (\Exception $err) {
            echo $err->getMessage();
        }
    }
    /**
     * Усстановить нужный элемент или вернуть ошибку
     * Метод возвращает ссылку на объект или ошибку
     */
    public function setRam($key, $value)
    {
        try {
            $_SESSION[$this->prefix.$key] = $value;
            if (empty($_SESSION[$this->prefix.$key])) {
                $error = "Не удалось создать элемент SESSION[$this->prefix$key]=$value //class RamSession/setRam()".PHP_EOL;
                throw new \Exception("$error"); 
            }
        } catch (\Exception $err) {
            echo $err->getMessage();
        } finally {
            return $this;
        }
    }

    /**
     * Вернуть ассоциативный массив из существующих переменных SESSION
     * Если параметр $outError по умолчанию, то будет выкинута ошибка,
     * если переменных не найдено.
     * Параметр префик если true, то выбираем только элементы с префиксом,
     * иначе все.
     * Если параметр $print равет true, то подключить echo и вывести результат
     * на экран.
     */
    public function getRamAllPrefix($prefix=true, $print=false, $outError = true)
    {   
        /**Проверяем есть ли переменные сессий с нужным префиксом */
        $search = false;
        if ($outError)
            foreach($_SESSION as $key=>$value) {
                if (strripos($key,$this->prefix)!==false)
                    $search=true;   
            }

        try {
            /** Если не было найдено переменных с нужным префиксом то обработать ошибку */
            if (!$search && $outError) {
                $error = "Не удалось найти элементы SESSION[] с префиксом $this->prefix 
                          //class RamSession->getRamAll()".PHP_EOL;
                throw new \Exception("$error"); 
            }
            /**Если всё нормально, собираем массив */
            $rezMas = [];
            foreach($_SESSION as $key=>$value) {
                if (strripos($key,$this->prefix)!==false || $prefix===false)
                    $rezMas[$key]=$value;
                if ($print) 
                    echo "\$_SESSION['$key'] = $value<br>";
            }
            return $rezMas;
        } catch (\Exception $err) {
            echo $err->getMessage();
        }
    }

    /**Увеличивает любой счётчик на 1 */
    public function setRamPlus(string $key, int $max=10)
    {
        $obj = new Delegator($this,__METHOD__);
        return $obj->modification($key, $max);
    }

    /**Уменьшает любой счётчик на 1 */
    public function setRamMinus(string $key, int $min=0)
    {
        $obj = new Delegator($this,__METHOD__);
        return $obj->modification($key, $min);
    }

    /**
     * Метод преобразовывает нужного типа массив в строку JSON
     * Массив ассоциативный, полученный в классе из массива SESSION
     */
    public function masToJson($prefix=true)
    {
        $mas = $this->getRamAllPrefix($prefix=true, $print=false, $outError = true);
        return json_encode($mas);
    }
    /**
     * Метод преобразовывает строку JSON в массив, ранее строка была
     * Массивом ассоциативный, полученный в классе из массива SESSION
     * Если $type=true, то вернем массив, иначе объект
     */
    public function jsonToMas($str,$type=true)
    {
        return json_decode($str,$type);
    }

    /**
     * Преобразовать массив полученный в классе из массива SESSION в 
     * настоящий массив SESSION
     */
    public function masToSession($mas)
    {
        foreach ($mas as $key=>$value) {
            $_SESSION[$key] = $value;
        }
        return $this;
    }

    /**
     * Метод переводит строку JSON сразу в SESSION
     */
    public function jsonToSession($str)
    {
        $this->masToSession($this->jsonToMas($str,$type=true));
        return $this;
    }

    /**
     * Метод записывает JSON на диск
     */
    public function jsonToFile($nameFile, $str)
    {
        file_put_contents($nameFile,$str);
        return $this;
    }

    /**
     * Метод читает JSON из файла в массив
     */
    public function fileJsonToMas($nameFile)
    {
        return $this->jsonToMas(file_get_contents($nameFile));
    }

    /**
     * Метод читает JSON из файла в массив и вводит массив обычный в массив SESSION
     */
    public function fileJsonToSession($nameFile)
    {
        $this->masToSession($this->fileJsonToMas($nameFile));
        return $this;
    }
}




/** 
 * Паттерн Делегирование 
 * Паттерн создан в качестве учебных целей, однако, он рабочий
 * Паттерн используется для функций увеличения и уменьшения счётчиков
 * Интерфейс описывает метод, увеличивающий или уменьшающий значение переменной
 */
interface PlusMinus
{
    public function modification($key, $lvl, $in);
}
/**
 * Класс управляет поведением шаблона Делегации
 * В зависимости от условий, создаются определенные объекты
 * и одни и те же методы обладают разными свойствами
 */
class Delegator 
{
    public $obj;
    public $thRam;
    public function __construct($thRam, $nameFunc)
    {
        if ($nameFunc=='src\libraries\RamSession::setRamPlus') $this->obj = new PlusOne($thRam);
        else $this->obj = new MinusOne($thRam);
        $this->thRam = $thRam;
    }

    public function modification($key, $lvl)
    {
        $obj = new RamPlusMinus($this->thRam, $this->obj);
        return $obj->mod($key, $lvl);
    }
}
/**
 * В данном классе один метод, который увеличивает значение переменной на 1
 */
class PlusOne implements PlusMinus
{
    public function modification($key,$max, $in)
    {
              /**Если всё нормально, то уменьшием на один*/
              if ($_SESSION[$in->prefix.$key]<$max)
                  $_SESSION[$in->prefix.$key]+=1;
              return $_SESSION[$in->prefix.$key];  
    }
}
/**
 * В данном классе один метод, который уменьшает значение переменной на 1
 */
class MinusOne implements PlusMinus
{
    public function modification($key, $min, $in)
    {
        /**Если всё нормально, то уменьшием на один*/
        if ($_SESSION[$in->prefix.$key]>$min)
            $_SESSION[$in->prefix.$key]-=1;
        return $_SESSION[$in->prefix.$key];
    }
}

/** 
 * Класс по паттерну Делегирования 
 * Класс проверяет может ли элемент массива $_SESSION использоваться как счётчик.
 */
class RamPlusMinus
{
    public $in;
    public $obj;
    public function __construct($in, PlusMinus $obj)
    {
        $this->in = $in;
        $this->obj = $obj;
    }

    public function mod($key, $min)
    {
        if ($this->testElement($key))
           return $this->obj->modification($key, $min, $this->in);
    }

    public function testElement($key) 
    {
        try {
            if (!isset($_SESSION[$this->in->prefix.$key])) {
                $error = "Не удалось найти элемент SESSION[$this->in->prefix$key] 
                          //class RamSession->setRamMinus()//Строка __LINE__".PHP_EOL;
                throw new \Exception("$error"); 
            }
            if (!(is_numeric($_SESSION[$this->in->prefix.$key]))) {
                $error = "Функция работает только со значениями Integer 
                          //class RamSession->setRamMinus()//Строка __LINE__".PHP_EOL;
                throw new \Exception("$error"); 
            }
        } catch (\Exception $err) {
            echo $err->getMessage();
            return false;
        } 
        return true;
    }
}

