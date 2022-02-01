<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceCollectScolding
{
          public function sborMatov() {
            $zapros="SELECT nastr FROM tablica_nastroer_dvigka_int WHERE id=1"; //настройка показа формы сбора данных
            $rez=$this->zaprosSQL($zapros);
            if ($rez) $stroka=mysqli_fetch_array($rez);
            return $stroka[0];
          }
}
