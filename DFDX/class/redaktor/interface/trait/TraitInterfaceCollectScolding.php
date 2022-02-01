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
          public function proverkaMata($slovo) // проверяет входной параметр на соответствие мату из базы данных
          {
            $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
            while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ($slovo==$stroka[0]) return true;
            return false;
          }
}
