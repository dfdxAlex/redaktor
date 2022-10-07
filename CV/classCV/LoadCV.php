<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class LoadCV extends \class\nonBD\Button
{
    public function __construct()
    {
        // подключить модуль работы с базой данных
        $bd = new \class\redaktor\initBd();

      
        
        // функция рисует интерфейс для пользователя
        $this->interfaceForSaveCv();
    }



    function interfaceForSaveCv()
    {
        // работа с текстами, нуждающимися к переводу
        $nameCv = new \class\nonBD\Translation('Название CV');
        $namePlaceholder = new \class\nonBD\Translation('Название');
        $buttonValue = new \class\nonBD\Translation('Сохранить');
//echo 'ergdf';
        echo "<section class='container-fluid'>";
            parent::formBlock('formLoad','#', 'btn_start', 'btn-info',
            'bootstrap-start',
            'select',
            'class',
            'id',
            'name',
            'multiple',
            '_value=name1-парам 1',
            'pull:_value=name1-парам 2_value=name1-парам 3_value=name1-парам 4_value=name1-парам 5_value=name1-парам 6',
            '_value=name1-парам 7',
            'pull:_value=name1-парам 2_value=name1-парам 3_value=name1-парам 4_value=name1-парам 5_value=name1-парам 6',
            'bootstrap-finish',
            );
        echo "</section>";
    }



}
