<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceDebug
{
  public function headerTrue(string $mesage=null)
  {
    if (isset($mesage) && headers_sent())
            echo $mesage;
    if (!isset($mesage) && headers_sent())
            echo 'Заголовок отправлен';
  }

  public function domDom(array $masArgument)
        {
          $masOk=false;
          if (!isset($_SESSION['domDom'])) $_SESSION['domDom']=false;
          if ($_SESSION['domDom']===false) return;
          
          if ($_SESSION['domDom']) {
            foreach($masArgument as $value) {
              if (gettype($value)=='string')
                  if (stripos($value,'domdom')===true || stripos($value,'где дом'))
                      echo __FILE__;
              if (gettype($value)=='array' && !$masOk) {
                foreach($value as $value2) {
                  $masOk=true;
                  if (stripos($value2,'domdom')===true || stripos($value2,'где дом'))
                      echo __FILE__;
                }
              }
            }
                
          }
              
        }

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
