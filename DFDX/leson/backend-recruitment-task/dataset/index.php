<?php
namespace class\redaktor;

require "../../../class.php";

$json=file_get_contents('users.json');

$json=json_decode($json,$associative=true);

$qqq = new instrument();

$qqq->printMas($json);

echo $json[0]['username'];

for ($i=0; $i<count($json); $i++)
    {

    }

//var_dump($json);
//foreach ($json as $value)
 // foreach ($value as $key=>$value2)
 //   echo $key.'=>'.$value2;
