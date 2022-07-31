<?php
namespace classCV;

// класс хранит информацию об Языках
class Languages
{
    public function __construct()
    {
        if (!isset($_SESSION['languages_numer'])) $_SESSION['languages_numer']=1;

        for($i=0; $i<$_SESSION['languages_numer']; $i++) 
            if (!isset($_SESSION['languages'.$i])) $_SESSION['languages'.$i]='';
    }

    public function __toString()
    {
        
    }
}
