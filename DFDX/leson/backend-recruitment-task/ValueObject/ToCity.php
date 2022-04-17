<?php
namespace ValueObject;

// object returns the user's city or a null string
// объект возвращает город пользователя или строку null
class ToCity
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['city']!='' && $_POST['city']!="city")
               $this->rez=$_POST['city'];
    }

    public function __toString()
    {
        return $this->rez;
    }

    public function getCity()
    {
        return $this->rez;
    }
}
