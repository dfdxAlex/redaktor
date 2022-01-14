<?php
spl_autoload_register(function ($class_name) {
  //echo $class_name.'<br>';
    $hablon='/[^\d\w]/';
    $class_name=preg_replace($hablon,DIRECTORY_SEPARATOR,$class_name);
    //echo 'class/'.$class_name . '.php<br>';
    include 'class/'.$class_name . '.php';
  }
  );
?>