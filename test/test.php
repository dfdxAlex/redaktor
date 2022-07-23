<?php
$data = [
    ['name' => 'Jan', 'surname' => 'Kowalski', 'age' => 22],
    ['name' => 'Andrzej', 'surname' => 'Nowak', 'age' => 33],
    ['name' => 'Zenon', 'surname' => 'Sikora', 'age' => 44],
    ['name' => 'Zenon', 'surname' => 'śruba', 'age' => 44],
    ['name' => 'jan', 'surname' => 'kowalski', 'age' => 11],
];

sort_field($data,'surname',true);

echo '<pre>';
var_dump($data);
echo '</pre>';

function sort_field(&$data,$field,$reverse)
{
    $status=true;
    while ($status) {
        for ($i=0; $i<count($data)-1; $i++) {
            $rez=mb_strtolower($data[$i][$field])<=>mb_strtolower($data[$i+1][$field]);
            if (($rez>0 && !$reverse) || ($rez<0 && $reverse)) {
                $mas=$data[$i];
                $data[$i]=$data[$i+1];
                $data[$i+1]=$mas;
                continue(2);
            }
        }
    $status=false;
    }
}
