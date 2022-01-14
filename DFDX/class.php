<?php
namespace redaktor;

spl_autoload_register(function ($class_name) {
    //echo $class_name.'<br>';
    $hablon='/[^\d\w]/';
    $class_name=preg_replace($hablon,DIRECTORY_SEPARATOR,$class_name);
    //echo $class_name.'<br>';
    include 'class/'.$class_name . '.php';
    //     echo 'Ошибка-'.$class_name;
  }
  );

//function my_autoloader($class){
/*
$nameClass="class/instrument.php";
while (!file_exists($nameClass)) 
 $nameClass='../'.$nameClass;
include $nameClass;

$nameClass="class/initBD.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/htmlTeg.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/dataAktual.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/menu.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/redaktor.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/login.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/maty.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/futter.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/statistic.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;
//}
 //spl_autoload_register('my_autoloader');

*/
?>