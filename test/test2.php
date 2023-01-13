

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dragdrop.css">
    <style>
     
    </style>
    <script src="js/drag_and_drop.js"></script>
</head>
<body>

<?php 

    $data = [
        ['name' => 'Jan', 'surname' => 'Kowalski', 'age' => 11],
        ['name' => 'Andrzej', 'surname' => 'Nowak', 'age' => 22],
        ['name' => 'Zenon', 'surname' => 'Sikora', 'age' => 33],
        ['name' => 'ąndrzej', 'surname' => 'Nowak', 'age' => 44],
        ['name' => 'Zenon', 'surname' => 'śruba', 'age' => 55],
        ['name' => 'andrzej', 'surname' => 'Nowak', 'age' => 66],
        ['name' => 'jan', 'surname' => 'kowalski', 'age' => 77],
        ['name' => 'Ąndrzej', 'surname' => 'Nowak', 'age' => 88],
        ['name' => 'Ęcki', 'surname' => 'Zima', 'age' => 99],
        ['name' => 'Ącki', 'surname' => 'Lato', 'age' => 100],
    ];

    function normalizePlToEn($str)
    {
        $mas = array ('ą','ć','ę','ł','ń','ó','ś','ź','ż');
        $mas2 = array ('a','c','e','l','n','o','s','z','z');
        return str_replace($mas,$mas2,mb_strtolower($str));
    }

    function sortT($nameKey,$reverse) 
    {
     return function ($x, $y) use ($nameKey,$reverse)
         {
             $koef=1;
             if ($reverse) {
                 $strX = normalizePlToEn($x[$nameKey]);
                 $strY = normalizePlToEn($y[$nameKey]);
             } else {
                 $strY = normalizePlToEn($x[$nameKey]);
                 $strX = normalizePlToEn($y[$nameKey]);
                 $koef=-1;
             }
             if ($nameKey!='age')
                 return strcoll($strX, $strY);
             else 
                 return ($x[$nameKey]<=>$y[$nameKey])*$koef;
         };

    }

    function name_sort(&$data,string $name,bool $reverse) 
    {
         usort ($data, sortT($name,$reverse));
    }

    name_sort($data,'age',true);

    foreach($data as $key => $rec) 
        echo $key."\t=>\t".$rec['name'].', '.$rec['surname'].': '.$rec['age']."\n";

    foreach($data as $key => $rec) 
        echo "$key\t=>\t{$rec['name']}, {$rec['surname']}: {$rec['age']} \n";

?>

</body>
</html>
