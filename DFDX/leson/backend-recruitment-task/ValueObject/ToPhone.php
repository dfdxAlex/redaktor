<?php
namespace ValueObject;

// object returns the user's phone or a null string
// объект возвращает телефон пользователя или строку null
class ToPhone
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
        if ($_POST['phone']!='') {
            $res1 = preg_match('/[\+]?([0-9])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',$_POST['phone']);
            $res3 = preg_match('/[\+]?([0-9])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',$_POST['phone']);
            $res2 = preg_match('/[\+]?([0-9])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',$_POST['phone']);
            $res4 = preg_match('/[\+]?([0-9])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',$_POST['phone']);
            $res5 = preg_match('/[\+]?([0-9])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',$_POST['phone']);
            $res6 = preg_match('/[\+]?([0-9])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',$_POST['phone']);
            if (($res1+$res2+$res3+$res4+$res5+$res6)>0)
                $this->rez=$_POST['phone'];
        }
    }

    public function __toString()
    {
        return $this->rez;
    }

    public function getPhone()
    {
        return $this->rez;
    }
}
