<?php
namespace ValueObject;

// object returns user's mail or null string
// объект возвращает почту пользователя или строку null
class ToEmail
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
        if ($_POST['email']!='') {
            $rez=preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $_POST['email']);
            if ($rez==1) $this->rez=$_POST['email'];
        }
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getEmeil()
    {
         return $this->rez;
    }
}
