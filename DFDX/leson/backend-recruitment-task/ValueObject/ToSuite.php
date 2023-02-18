<?php
namespace ValueObject;

// object returns the address of the user's office or a null string
// объект возвращает адрес офиса пользователя или строку null
class ToSuite
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
        if ($_POST['suite']!='' && $_POST['suite']!="Suite")
            $this->rez=$_POST['suite'];
    }

    public function __toString()
    {
        return $this->rez;
    }

    public function getSuite()
    {
        return $this->rez;
    }
}
