<?php
namespace src\libraries\delegatorLang;

/**
 * Класс хранит в себе массив с переводами
 */
class DataContainier
{
    private $dataMas;
    private $obj;
    private $objController;
    private $dubl = false;

    public function createObj()
    {
        // массив локальный, для внутренней работы
        $newMas = [];
        // массив с элементами языков, ru, en...
        $mas = $this->objController->getPropertyPrivate('in');

        try {
            // по умолчанию дублей нет
            
            /**  проверяем на дуюликаты сначала для русского сообщения
             * если находится дубликат, то проверяются все остальные сообщения
             * если и они совпадают, то выкидываем сообщение о дубликате.
            */
            foreach($this->dataMas as $value)
            {
                $this->dubl = false;
                // проверка на совпадение ключевой русской фразы
                if ($value['ru'] === preg_replace('/\s+/', ' ', $_POST['textarearu'])) {
                    // echo 'первый этап';
                    $this->dubl=true;
                    foreach($mas as $valueLang) {
                        if ($value[$valueLang] !== preg_replace('/\s+/', ' ', $_POST['textarea'.$valueLang])) {
                            $this->dubl=false;
                            //echo "{$value[$valueLang]}  {$_POST['textarea'.$valueLang]})";
                        }
                    }
                }
            }
            if ($this->dubl) throw new \Exception("Сообщение полностью совпадает с другим сообщением");
        
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        foreach($mas as $value) {
            $newMas[$value] = preg_replace('/\s+/', ' ', $_POST['textarea'.$value]);
        }

        $this->dataMas[] = $newMas;
    }

    public function getDataContainer($key)
    {
        return $dataObj[$key];
    }

    // прочитать информацию из файла и поместить в объект
    public function loadData()
    {
       $name = $this->obj->getNameFile();
       // прочитать имя файла, усстановленное у потомка
       $this->dataMas = json_decode(file_get_contents($name), true);
    }

    /**
     * Динамический метод, проверяет какой гет запрос в строке
     * относительно языка, и возвращает перевод
     */
    public function returnMessage($messages)
    {
        foreach($this->dataMas as $value) {
            if ($value['ru'] === $messages) 
                return $value[$_GET['lang']];
            
        }
        foreach($this->dataMas as $value) {
            if (mb_strtolower($value['ru']) === $messages) 
                return $value[$_GET['lang']];
        }

    }

    public function saveData()
    {
        if (isset($_POST['areaSubmit'])) {
        

        if ($this->createObj()!==false)
            file_put_contents($this->obj->getNameFile(),json_encode($this->dataMas));
        }

        $this->clearData();

    }

    // получить ссылку на объект потомка
    public function importObj()
    {
        $this->obj = $this;
    }

    // получить ссылку на объект контроллер
    public function __construct($obj)
    {
        $this->objController = $obj;
    }

    /**
     * Считает число одинаковых элементов по ключу русской фразы
     */
    public function intDubl($mas, $key, $value)
    {
        $i=0;
        foreach($mas as $keyFor=>$valueFor) {
            if ($value === $valueFor) $i++;
        }
        return $i;
    }
    public function clearData()
    {
        $localMas = [];
        /**
         * поиск слов none и пустых пробелов
         */
        foreach($this->dataMas as $key=>$value) {
            $localMas[$key] = $value['ru'];
            if (($value['ru'] == 'none' || $value['ru'] == ' ')
               || $this->intDubl($localMas, $key, $value['ru'])>1
               ) {
                if (count($this->dataMas)>3) {
                    unset($this->dataMas[$key]);
                }
            }
        }
        
    }
}
