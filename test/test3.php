

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


$a=PHP_INT_MAX;

//echo PHP_INT_MAX;


var_dump(getTypeMax($a));



function getTypeMax($type,$info=false)
{
    $mas=array();
    $mas['boolean']=false;
    $mas['int']=false;
    $mas['double']=false;
    $mas['infinite']=false;
    $mas['nan']=false;
    $mas['string']=false;
    $mas['numeric']=false;
    $mas['scalar']=false;
    $mas['null']=false;
    $mas['array']=false;
    $mas['object']=false;


    if ($info)
        echo 'Исследуемая переменная подходит для следующих типов:<br><br>';
    $getTypeError=true;
    if (is_bool($type)) {
        if ($info)
            echo 'Совпадение со значением типа Boolean<br>';
        $getTypeError=false;
        $mas['boolean']=true;
    }
    if (is_int($type)) {
        if ($info)
            echo 'Совпадение со значением типа Integer<br>';
        $mas['int']=true;
        $getTypeError=false;
    }
    if (is_double($type)) {
        if ($info)
            echo 'Совпадение со значением типа Double<br>';
        $getTypeError=false;
        $mas['double']=true;
    }
    if (is_scalar($type))
        if (is_infinite($type)) {
            if ($info)
                echo 'Совпадение со значением типа INF - бесконечность<br>';
            $getTypeError=false;
            $mas['infinite']=true;
        }
    if (is_nan($type)) {
        if ($info)
            echo 'Совпадение со значением типа NAN - не допустимое числовое значение<br>';
        $getTypeError=false;
        $mas['nan']=true;
    }
    if (is_string($type)) {
        if ($info)
            echo 'Совпадение со значением типа String<br>';
        $getTypeError=false;
        $mas['string']=true;
    }
    if (is_numeric($type)) {
        if ($info)
            echo 'Совпадение со значением типа Число, или строка, содержащая число<br>';
        $getTypeError=false;
        $mas['numeric']=true;
    }
    if (is_scalar($type)) {
        if ($info)
            echo 'Совпадение со значением типа Простое значение - скалярное<br>';
        $getTypeError=false;
        $mas['scalar']=true;
    }
    if (is_null($type)) {
        if ($info)
            echo 'Совпадение со значением типа NULL<br>';
        $getTypeError=false;
        $mas['null']=true;
    }
    if (is_array($type)) {
        if ($info)
            echo 'Совпадение со значением типа Array<br>';
        $getTypeError=false;
        $mas['array']=true;
    }
    if (is_object($type)) {
        if ($info)
            echo 'Совпадение со значением типа Object<br>';
        $getTypeError=false;
        $mas['object']=true;
    }
    if ($info)
        if ($getTypeError)  echo 'Ни один из типов не подошел<br>';
    return $mas;
}
?>
</body>
</html>
