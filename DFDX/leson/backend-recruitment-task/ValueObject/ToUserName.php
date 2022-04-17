<?php
namespace ValueObject;

// object returns username or null string
// объект возвращает имя пользователя или строку null
class ToUserName
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['userName']!='' && $_POST['userName']!="UserName")
                $this->rez=$_POST['userName'];
    }

    public function __toString()
    {
        return $this->rez;
    }

    public function getUserName()
    {
        return $this->rez;
    }
}
