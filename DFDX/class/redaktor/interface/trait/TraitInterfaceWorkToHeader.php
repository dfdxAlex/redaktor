<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToHeader
{
    public function headStart($title)
    {
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">';
        echo $title;
        echo '<meta name="Cache-Control" content="no-store">';
    }

    public function headBootStrap5(array $listFileStyle)
    {
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">';
        
        foreach($listFileStyle as $value)
            echo '<link rel="stylesheet" href="'.$value.'"> ';
    }
}
