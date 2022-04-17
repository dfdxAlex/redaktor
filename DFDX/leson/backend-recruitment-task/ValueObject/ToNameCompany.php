<?php
namespace ValueObject;

// object returns the user's company name or a null string
// объект возвращает имя компании пользователя или строку null
class ToNameCompany
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['name_company']!='' && $_POST['name_company']!="Name company")
                $this->rez=$_POST['name_company'];
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getNameCompany()
    {
         return $this->rez;
    }
}
