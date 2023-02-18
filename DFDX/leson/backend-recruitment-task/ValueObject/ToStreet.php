<?php
namespace ValueObject;

// object returns user's street or null string
// объект возвращает улицу пользователя или строку null
class ToStreet
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
        if ($_POST['street']!='' && $_POST['street']!="Street")
            $this->rez=$_POST['street'];
    }

    public function __toString()
    {
        return $this->rez;  
    }

    public function getStreet()
    {
        return $this->rez;  
    }
}
