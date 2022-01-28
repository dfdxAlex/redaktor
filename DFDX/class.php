<?php
namespace redaktor;
spl_autoload_register(function ($class_name) {
 // echo $class_name.'<br>';
    $hablon='/[^\d\w]/';
    $class_name=preg_replace($hablon,DIRECTORY_SEPARATOR,$class_name);
    $rez=require $class_name . '.php';
  } 
  );
