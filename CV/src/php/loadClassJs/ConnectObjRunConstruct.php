<?php
namespace src\php\loadClassJs;

/**
 * Класс подключает функцию JS из папки Js
 * c событием Load
 */
use \class\nonBD\trait\DirectorySep;

class ConnectObjRunConstruct
{
    public function __construct($name)
    {   
        foreach ($name as $value) {
        $pathFileJs = "$value";
        $pathFileJs = DirectorySep::insertDirectorySeparator($pathFileJs);
        
        $sep = DIRECTORY_SEPARATOR;
        echo '<script src="..'.$sep.$pathFileJs.'.js"></script>';

        $masFileName = preg_split('/\//',$value);

        $nameObjWithPoint = end($masFileName);

        $masFileName = preg_split('/\./',$nameObjWithPoint);

        $nameObj = reset($masFileName);

        echo '<script>
                new '.$nameObj.';
              </script>';
        }
    }
}
