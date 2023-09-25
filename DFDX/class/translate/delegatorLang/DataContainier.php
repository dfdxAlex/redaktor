<?php
namespace class\translate\delegatorLang;

/**
 * Класс хранит в себе массив с переводами
 */
class DataContainier
{
    private $dataMas;
    private $obj;
    private $objController;
    // private $dubl = false;

    /**
     * Вывести все переводы с кнопками на удаление лишних
     */
    public function echoDataMas()
    {
        /**если был запрос на удаление, то удалить и записать */
        $this->killTranslate();
        
        echo "<form 
                method='post' 
                id='form'
              >
              </form>";

        foreach($this->dataMas as $keyMas=>$value) {
            foreach($value as $key=>$value2) {
                if ($key!=='ru')
                    echo "$key => $value2 <br>";
                else {
                    echo "<input 
                            type='submit'
                            name='$keyMas'
                            form='form'
                            value='x'
                          > 
                          => $value2 <br>";
                }
            }
            echo '<br>';
        }
    }

    /**
     * метод перехватывает post запрос от кнопок удаления
     * информации из массива и удаляет элемент
     */
    private function killTranslate()
    {
        if (isset($_POST))
            foreach ($_POST as $key=>$value) {
                if ($value='x') {//echo "попытка удалить элемент $key";
                    unset($this->dataMas[$key]);
                    file_put_contents($this->obj->getNameFile(),json_encode($this->dataMas));
                }
            }
    }

    /**
     * Метод очищает строку от пробелов по краям и от 
     * двойных пробелов
     */
    private function clearSpace($in)
    {
         //очистить текст русской фразы от двойных пробелов
         $textRu = preg_replace('/\s+/', ' ', $in);
         //очистить текст русской фразы от пробелов вначале
         $textRu = preg_replace('/^\s+/', '', $textRu);
         $textRu = preg_replace('/$\s+/', '', $textRu);
         return $textRu;
    }

    public function createObj()
    {
        // echo "запустили из ".$_POST['areaSubmit'];
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
                $dubl = false;
                // проверка на совпадение ключевой русской фразы
                if ($value['ru'] === $this->clearSpace($_POST['textarearu'])) {
                    $dubl=true;
                    foreach($mas as $valueLang) {
                        if ($value[$valueLang] !== $this->clearSpace($_POST['textarea'.$valueLang])) {
                            $dubl=false;
                        }
                    }
                }
            }
            if ($dubl) throw new \Exception("Сообщение полностью совпадает с другим сообщением");
        
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        foreach($mas as $value) {
            $newMas[$value] = $this->clearSpace($_POST['textarea'.$value]);
        }

        $this->dataMas[] = $newMas;
    }

    public function getDataContainer($key)
    {
        return $dataObj[$key];
    }

    // прочитать информацию из файла и поместить в массив
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
        /**
        * Данный метод возвращает язык, с которым следует работать
        * toSolid\ReturnGetLang::returnGetLang();
        */
        foreach($this->dataMas as $value) {
            /**
             * Массив $value состоит из нескольких переводов
             * проверяется русский текст для поиска совпадение
             * так как русский - это основа и ключ. 
             * Ну и дальше выбирается тот елемент массива, чей
             * ключ задан языковым выбором.
             */
            
            if ($value['ru'] === $messages) 
                return $value[toSolid\ReturnGetLang::returnGetLang()];
        }
        foreach($this->dataMas as $value) {
            if (mb_strtolower($value['ru']) === $messages) 
                return $value[toSolid\ReturnGetLang::returnGetLang()];
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
