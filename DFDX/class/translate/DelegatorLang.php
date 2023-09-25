<?php
namespace class\translate;

/**
 * Класс управляет процессом подстановки переводов на разные языки и процессом
 * создания бах для переводов.
 * Класс создан по шаблону Делегирования, все зависимости находятся в папке
 * DelegatorLang.
 * 
 * Для использования класса нужно создать объект:
 * $obj = new \src\libraries\DelegatorLang();
 * запустить метод $obj->control(false); // параметр false определяет 
 * показывать ли редактор
 * и пользоваться после этого методом $go = $obj->translator('Вперед');
 * 
 * Все возможные настройки задаются в свойствах класса и в методе control();
 * 
 * Чтобы перейти в режим добавления данных, 
 * свойство  private $redaktor = false;
 * метод $obj->control(true);
 * нужно заменить на  private $redaktor = true;
 */
class DelegatorLang
{
    private $urlLevelLink = null;
    private $masGet;
    private $masUrl = [];               // массив кнопок выбора языка и ссылок для них
    private $in = [];                   // массив входящий, кнопок языка
    private $classMode = "lang-menu--"; // Префикс для стилей кнопок выбора языка
    private $redaktor = false;          // Определяет режим работы класса, редактирование словаря либо работа
    private $objLanguageData;           // ссылка на объект

    public static $objLanguageDataCreate = null;

    public function __construct()
    {
        // $this->control(false);
    }
    public function translator($messages)
    {
        //echo $messages;
        return $this->objLanguageData->returnMessage($messages);
    }

    public function control($redaktor = false)
    {
        /**определяет показывать ли редактор */
        $this->setRedactorLang($redaktor);
        /**
         * Создать объект по работе со ссылками, 
         * либо получить ссылку на него
         */
        $this->urlLevelLink = UrlLevel::urlLevel();

        /**
         * Получить доступ к массиву из объекта UrlLevel
         * массив содержит GET[] елементы
         */
        $this->masGet = $this->urlLevelLink->getGetMas();

        $this->setMasUrl(['en','pl','ua','ru']);

        /**если не было выбрано языка, то английский */
        $this->resetLang();
        
        /**Выбрать решим работы языкового объекта */
        $this->selectClassButton();

        // создать объект
        $this->objLanguageData = new delegatorLang\LanguageData($this);
 
        /**
        * усстановить имя рабочего файла
        * сначала указывается имя с обычным слешем, после этого
        * обычный слеш меняется на слеш DIRECTORY_SEPARATOR
        */
         $name = "../modules/class/translate/json/data.json";
         $hablon='/\//';
         $name=preg_replace($hablon,DIRECTORY_SEPARATOR,$name);
         $this->objLanguageData->setupFileName($name);
         
        // прочитать данные из файла
        $this->objLanguageData->loadData();

        // записать объект в файл
        $this->objLanguageData->saveData();

        

    }
    /**
     * распечатать всё содержимое файла с данными
     */
    public function echoDataMas()
    {
        $this->objLanguageData->echoDataMas();
    }
    /**
     * Функция позволяет возвращать защищенные свойства 
     * класса за его пределами
     */
    public function getPropertyPrivate($property)
    {
        return $this->$property;
    }

    /**
     * Функция создает массив $this->masUrl[], который
     * содержит $key - надпись на кнопке выбора языка, 
     * $value = ссылка для кнопки языка.
     */
    public function setMasUrl(array $in)
    {
        $this->in = $in;
        /**
         * Cоздать локальную копию массива с гет параматрами 
         * Копия принадлешит этому классу, 
         * но взята из класса UrlLevel
         */
        foreach($this->urlLevelLink->getGetMas() as $key=>$value) {
            $mas[$key] = $value; 
        }

        /**
         * Цикл создает массив $this->masUrl, который содержит
         * имя языкового режима и ссылка для кнопки языкового
         * режима
         */
        foreach($in as $value) {
            $mas['lang'] = $value;
            $this->masUrl[$value] = $this->urlLevelLink->getUrlStart().$this->urlLevelLink->getStr($mas);
        
        }
    }
    /**
     * устанавливает режим работы сервиса, добавить перевод или рабочий режим
     */
    public function setRedactorLang($tr)
    {
        return $this->redaktor = $tr;
    }

    /**если не было выбрано языка, то английский */
    public function resetLang()
    {
        if (!isset($this->masGet['lang'])) $this->urlLevelLink->setGetMas('lang', 'en');
    }

    /**
     * Функция проверяет был ли POST запрос за изменения языка
     */
    public function setLang()
    {
        if (isset($_GET['lang'])) $this->urlLevelLink->setGetMas('lang', $_GET['lang']);
    }

    /**
     * Выбирает создавать объект с кнопками выбора языка или с полями редактора
     */
    public function selectClassButton()
    {
        if ($this->redaktor==false) {
            if (is_null(DelegatorLang::$objLanguageDataCreate))
            DelegatorLang::$objLanguageDataCreate = new delegatorLang\ButtonLangBootstrap($this);
        }
        else {
            new delegatorLang\PoleRedaktorLang($this);
        }
    }
}
