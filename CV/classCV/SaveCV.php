<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class SaveCV extends \class\nonBD\Button
{
    //use class\redaktor\interface\interface;

    public function __construct()
    {
        $bd = new \class\redaktor\initBd();
        // проверка присутствия таблиц для модуля работы со статистикой
        $bd->createTab(
          'name=cv_json',
          'poleN=id',
          'poleT=int',
          'poleS=0',
          'poleN=id_user',
          'poleT=int',
          'poleS=0',
          'poleN=json',
          'poleT=VARCHAR',
          'poleS='
        );

        $this->nameCV='';
        $this->searcValue(); // проверяем была ли еажата кнопка Сохранить, если да, то запомнить данные

        // работа с текстами, нуждающимися к переводу
        $nameBlock = new \class\nonBD\Translation('Придумайте название для CV и нажмите кнопку Сохранить');
        $nameCv = new \class\nonBD\Translation('Название CV');
        $namePlaceholder = new \class\nonBD\Translation('Название');
        $buttonValue = new \class\nonBD\Translation('Сохранить');

        echo "<section class='container-fluid'>";
            parent::formBlock('formSave','#', 'btn_start', 'btn-info',
            'bootstrap-start',
            'h4',
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
        echo "</section>";
    }

    function searcValue()
    {
        if (!isset($_REQUEST['saveSV'])) return false;
        $this->nameCV = $_REQUEST['nameCV'];
        //echo $this->nameCV;
    }



}
