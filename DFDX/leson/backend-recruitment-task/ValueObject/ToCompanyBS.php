<?php
namespace ValueObject;

// object returns the BS of the company (whatever that means) of the user or a null string
// объект возвращает BS компании (что бы это не означало) пользователя или строку null
class ToCompanyBS
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['Company_BS']!='' && $_POST['Company_BS']!="Company BS")
                $this->rez=$_POST['Company_BS'];
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getCompanyBS()
    {
         return $this->rez;
    }
}


