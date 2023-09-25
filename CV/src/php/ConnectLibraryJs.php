<?php
namespace src\php;

class ConnectLibraryJs
{
    private $mas = [];
    public function __construct($mas=[])
    {
        $this->mas = $mas;

    }

    public function __toString()
    {
        $rez = "";
        foreach ($this->mas as $value) {
            $rez .= '<script src="'.$value.'"></script>';
        }

        return $rez;
    }
}
