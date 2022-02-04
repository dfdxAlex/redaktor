<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceDebug
{
        public function printTab($mesadz,$kill)
        {
          if ($kill) 
              $this->zaprosSQL("DELETE FROM debuger WHERE 1");
          $zapros="CREATE TABLE debuger (mesage VARCHAR(255))";
          $this->zaprosSQL($zapros);
          $zapros="INSERT INTO debuger(mesage) VALUES ('".$mesadz."')";
          $this->zaprosSQL($zapros);
        }

        public function printTabEcho()
        {
          $zapros="SELECT * FROM debuger WRERE 1";
          $rez=$this->zaprosSQL($zapros);
          if ($rez===false) {
              echo 'не получилось скачать данные из таблицы debuger'; 
              return false;
           }
          $stroka=mysqli_fetch_assoc($rez);
          while (!is_null($stroka=mysqli_fetch_assoc($rez)))
            foreach ($stroka as $key => $value)
               echo $key.'=>'.$value;
        }
}
