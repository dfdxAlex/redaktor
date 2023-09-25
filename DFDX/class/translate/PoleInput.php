<?php
namespace src\libraries;

class PoleInput
{
    static public function createPole($level)
    {
        if ($level==1) 
            return new Level1;
    }
}

class Level1
{
    public function __toString()
    {
        return "
            
        ";
    }
}


