<?php
namespace ValueObject;

// object returns zip-code or null string
// объект возвращает zip-code пользователя или строку null
class ToZip
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['zip']!='' && $_POST['zip']!="Zip code")
                $this->rez=$_POST['zip'];
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getZip()
    {
         return $this->rez;
    }
}
