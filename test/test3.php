<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<script>

</script>

<?php

//echo '<pre>';  <?php declare(strict_types=1); 
//echo "$a <br>";
//echo '</pre>';


class torg
{
    public $apple;
    public $melon;
    public $peach;
    public $thing;

    public $apple_juice;
    public $grape_juice;
    public $tomato_juice;
    public $liter;

    public function __construct($apple, $melon, $peach, $apple_juice, $grape_juice, $tomato_juice)
    {
        $this->apple=$apple;
        $this->melon=$melon;
        $this->peach=$peach;
        $this->apple_juice=$apple_juice;
        $this->grape_juice=$grape_juice;
        $this->tomato_juice=$tomato_juice;
    }

    public function getPrice()
    {
        return $this->apple*0.5+$this->melon*1.5+$this->peach*2+$this->apple_juice*2.5+$this->grape_juice*3+$this->tomato_juice*0.5;
    }

}

class torgThing extends torg
{
    public function __construct($apple, $melon, $peach)
    {
        parent::__construct($apple, $melon, $peach, 0, 0, 0);
    }
    
    public function getThing()
    {
        $this->thing=$this->apple+$this->melon+$this->peach;
        return $this->thing;
    }
}

class torgLiter extends torg
{
    public function __construct($apple_juice, $grape_juice, $tomato_juice)
    {
        parent::__construct(0,0,0, $apple_juice, $grape_juice, $tomato_juice);
    }

    public function getLiter()
    {
        $this->liter=$this->apple_juice+$this->grape_juice+$this->tomato_juice;
        return $this->liter;
    }
}



$obj = new torgLiter(2,3,4);
echo '<pre>';
var_dump($obj);
echo '<pre>';
// echo $obj->getPrice();

// echo $obj->getThing();
//  ..echo $obj->getThing();





















function getTypeMax($type,$info=false)
{
    if ($info)
        echo '<br>';
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
    if (!is_object($type))
        if (!is_array($type))
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
