<?php
include "classInstrument.php";

function levoeMenu() //Выводит левое меню
{
    $clas=new redaktor\statistic();
    //$clas=new redaktor\modul();
    $clas->formBlock('levBlock',
                    'dfdx.php',
                    'submit',
                    'levBlock',
                    'HTML',
                    'htmlFoDfdx.php',
                    'br',
                    'submit',
                    'levBlock',
                    'HTML5',
                    'html5FoDfdx.php',
                    'br'
                        );


}

function pravoePole($kluc)
{
    $clas=new redaktor\statistic();
    //$clas=new redaktor\modul();

    if ($kluc=='html3') // Если функция вызвана со страницы html
        $zapros="SELECT name FROM bd2 WHERE razdel='html3' OR razdel='html3html5' OR razdel='html5html3'";

    if ($kluc=='html5') // Если функция вызвана со страницы html или html5
        $zapros="SELECT name FROM bd2 WHERE  razdel='html5' OR razdel='html3html5' OR razdel='html5html3'";

    if ($kluc=='html3' || $kluc=='html5') // Если функция вызвана со страницы html или html5
     {
      $rez=$clas->zaprosSQL($zapros);
      echo '<form action="'.$_SESSION['redaktiruem'].'" method="post">';
      while (!is_null($stroka=(mysqli_fetch_array($rez))))
         echo '<input class="prawBlock btn" type="submit" name="panelPrawa" value="'.$stroka[0].'">';
      echo '</form>';
     }
}
?>