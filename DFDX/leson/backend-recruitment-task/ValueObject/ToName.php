<?php
namespace ValueObject;

// object returns username or null string
// объект возвращает имя пользователя или строку null
class ToName
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['name']!='' && $_POST['name']!="Name")
                $this->rez=$_POST['name'];
    }

    public function __toString()
    {
        return $this->rez;
    }
    public function getName()
    {
        return $this->rez;
    }
}
