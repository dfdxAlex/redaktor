<?php
namespace ValueObject;

// object returns the user's website or a null string
// объект возвращает вебсайт пользователя или строку null
class ToWebsite
{
    public function __construct()
    {
        $this->rez='null';

        if (isset($_POST['Save']))
        if ($_POST['website']!='') {
            $res1 = preg_match('/www\.[^\..]*\./',$_POST['website']);
            if (($res1)>0)
                $this->rez=$_POST['website'];
        }
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getWebsite()
    {
         return $this->rez;
    }
}
