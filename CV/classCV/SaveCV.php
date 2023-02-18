<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class SaveCV extends \class\nonBD\Button
{
    public function __construct()
    {
        $this->errorNameCv=false;
        $bd = new \class\redaktor\initBd();
        // проверить существует ли таблица для хранения данных, если нет, то создать
        $this->createTabFoJson($bd);
        // в переменной хранится имя создаваемой записи
        $this->nameCV='';
        $this->searcValue(); // проверяем была ли еажата кнопка Сохранить, если да, то запомнить данные
        
        
        if ($this->nameCV!='')
            $this->searchDoubleNameJson($bd);
        // функция рисует интерфейс для пользователя
        $this->interfaceForSaveCv();
    }

    function searchDoubleNameJson($bd)
    {
        
        if ($bd->siearcSlova('cv_json','json_name',$this->nameCV)) {
            $this->errorNameCv=true;
        }
        else {

            // сделаю свою функцию перевода массива в строку
             //$str=json_encode($_SESSION);

             $str=serialize($_SESSION);

             $id=$bd->maxIdLubojTablicy("cv_json");
             $login=$_SESSION['login'];
             $zapros="INSERT INTO cv_json(id, name_user, json_name, json_str) VALUES ($id,'$login','$this->nameCV','$str')";
             $bd->zaprosSQL($zapros);
             }

    }

    function interfaceForSaveCv()
    {
        // работа с текстами, нуждающимися к переводу
        $nameBlock = new \class\nonBD\Translation('Придумайте название для CV и нажмите кнопку Сохранить');
        if ($this->errorNameCv) $nameBlock = new \class\nonBD\Translation('Такое имя уже существует, придумайте новое.');
        $nameCv = new \class\nonBD\Translation('Название CV');
        $namePlaceholder = new \class\nonBD\Translation('Название');
        $buttonValue = new \class\nonBD\Translation('Сохранить');

        $admin = new \classCV\AdminCvToBd();
        echo "<section class='container-fluid'>";
                          parent::formBlock('formSave','#', 'btn_start', 'btn-info',
                          'bootstrap-start',
                          'h5',
                          $nameBlock,
                          'bootstrap-f-start',
                          'textL',
                          'nameCV',
                          $nameCv,
                          $namePlaceholder,
                          'submit',
                          'saveSV',
                          $buttonValue,
                          'bootstrap-finish',
                          );
        echo     "  {$admin->interfaceForSaveCv()}
             </section>";
    }

    function searcValue()
    {
        if (!isset($_REQUEST['saveSV'])) return false;
        $this->nameCV = $_REQUEST['nameCV'];
    }

    function createTabFoJson($bd)
    {
        // проверка присутствия таблиц для модуля работы со статистикой
        $bd->createTab(
          'name=cv_json', //имя таблицы для хранения данных CV
          'poleN=id',     //поле ID
          'poleT=int',
          'poleS=0',
          'poleN=name_user', //поле ID пользователя
          'poleT=VARCHAR(50)',
          'poleS= ',
          'poleN=json_name',        // поле содержит имя строки json
          'poleT=VARCHAR(50)',
          'poleS= ',
          'poleN=json_str',        // поле содержит строку json
          'poleT=VARCHAR(10000)',
          'poleS= ',
        );
    }

}
