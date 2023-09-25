<?php
namespace class\translate\delegatorLang;

/**
 * Класс занимается изменением имени файла с переводами, либо созданием стартового 
 * файла, пустого
 */
class LanguageData extends DataContainier
{
    private $obj; // ссылка на контроллер

    /**
     * имя файла с переводами, создается либо усстанавливается из контроллера
     * местным методом
     */
    private $nameFile;

    public function __construct($obj)
    {
      $this->obj = $obj;
      parent::__construct($obj);
      parent::importObj();
    }

    /**
     * Усстановить имя рабочего файла 
     * Если файл не найден, то создаем пустой файл 
     * с начальной разметкой
     * Метод только проверяет есть ли файл с базой данных перевода
     * если нет, то создает его.
    */
    public function setupFileName(string $name)
    {
        $this->nameFile = $name;
        try {

        if (!file_exists($this->nameFile)) throw new \Exception("Нет файла");
        } catch (\Exception $e) {

            echo 'Не удалось подключить файл с базой переводов';
            /**
             * Блок создает пустой массив, делает из него JSON
             * и записывает на диск
             */
            $localMas = [];
            $localMas2;
            // создать первый пустой объект
            foreach($this->obj->getPropertyPrivate('in') as $value) {
                $localMas[$value] = 'none';
            }
            $localMas2 = Array($localMas);
            $string=json_encode($localMas2);
            file_put_contents($this->nameFile,$string);
        }
    }
    /**
     * возвращает имя установленного рабочего файла с переводами
     */
    public function getNameFile()
    {
        return $this->nameFile;
    }
}
