<?php
namespace classCV;


// Класс администрирует записи CV в базе данных
class AdminCvToBd extends \class\nonBD\Button
{

    public function __construct()
    {
        // подключить модуль работы с базой данных
        $this->bd = new \class\redaktor\initBd();

        $instrument = new \class\redaktor\instrument();

        $zapros="select json_name from cv_json where name_user='{$_SESSION['login']}'";
        $rez=$this->bd->zaprosSQL($zapros);

        if ($instrument->notFalseAndNULL($rez)) 
            while($stroka=mysqli_fetch_array($rez)) {
                if (isset($_POST[$stroka[0]])) {
                    $zapros="select id from cv_json where name_user='{$_SESSION['login']}' AND json_name='{$stroka[0]}'";
                    $rezLocal=$this->bd->zaprosSQL($zapros);
                    $strocaLocal=mysqli_fetch_array($rezLocal);
                    if ($strocaLocal[0]>0 && gettype($strocaLocal[0])=='string') {
                        $zaprosKill="DELETE FROM cv_json WHERE id={$strocaLocal[0]}";
                        $this->bd->zaprosSQL($zaprosKill);
                    }
                }
            }
        
    } 

    function interfaceForSaveCv()
    {
        $bd = $this->bd;
        // работа с текстами, нуждающимися к переводу
        $nameCv = new \class\nonBD\Translation('Сохраненные CV');

        $zapros="select json_name from cv_json where name_user='{$_SESSION['login']}'";
        $rez=$bd->zaprosSQL($zapros);
        
        $strParam='pull:';

        while($stroka=mysqli_fetch_array($rez)) {
            $strParam.=$stroka[0]." .....<button name='$stroka[0]'> <span class='kill_CV'>x</span></button>-";

        }

        echo "<section class='container-fluid'>";
            parent::formBlock('formAdmin','#', 'btn_start', 'btn-info',
            'bootstrap-start',
            'h4',
            $nameCv,
            'bootstrap-f-start',
            'ulli',
            'formAdmin-select',
            'formAdmin-select-id',
            $strParam,
            'bootstrap-finish',
            );
        echo "</section>";
    }
}
