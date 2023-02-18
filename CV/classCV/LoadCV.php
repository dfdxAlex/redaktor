<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class LoadCV extends \class\nonBD\Button
{
    public function __construct()
    {
        // подключить модуль работы с базой данных
        $bd = new \class\redaktor\initBd();

        $instrument = new \class\redaktor\instrument();

        // проверяем был ли выбор варианта СВ
        $this->loadCv($bd, $instrument);
        
        // функция рисует интерфейс для пользователя
        $this->interfaceForSaveCv($bd);
    }

    function loadCv($bd, $instrument)
    {
        $masJs = array();
        if (isset($_REQUEST['button-formLoad'])) {
            $zapros="SELECT json_str FROM cv_json WHERE name_user='{$_SESSION['login']}' AND json_name='{$_REQUEST['formLoad-name']}'";
            $rez=$bd->zaprosSQL($zapros);
            if ($instrument->notFalseAndNULL($rez)) {
                $stroka=mysqli_fetch_array($rez);
                $strokaJs=$stroka[0];
                $levelLocal=$_SESSION['level'];
                $_SESSION=unserialize($strokaJs);
                $_SESSION['level']=$levelLocal;
            }
        }
    }

    function interfaceForSaveCv($bd)
    {
        // работа с текстами, нуждающимися к переводу
        $nameCv = new \class\nonBD\Translation('Выберите CV из списка');

        $zapros="select json_name from cv_json where name_user='{$_SESSION['login']}'";
        $rez=$bd->zaprosSQL($zapros);
        $strParam='pull:';
        while($stroka=mysqli_fetch_array($rez)) {
            $strParam.='_value='.$stroka[0].'-'.$stroka[0];
        }
        $admin = new \classCV\AdminCvToBd();
        echo "<section class='container-fluid'>";
                          parent::formBlock('formLoad','#', 'btn_start', 'btn-info',
                          'bootstrap-start',
                          'h5',
                          $nameCv,
                          'bootstrap-f-start',
                          'select',
                          'formLoad-select',
                          'formLoad-select-id',
                          'formLoad-name',
                          '',
                          $strParam,
                          'bootstrap-f-start',
                          'submit',
                          'button-formLoad',
                          new \class\nonBD\Translation('Загрузить'),
                          'bootstrap-finish',
                          );
        echo     " {$admin->interfaceForSaveCv()}
             </section>";
    }



}
