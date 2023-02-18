<?php
namespace ValueObject;

// object returns the user's company slogan or a null string
// объект возвращает слоган компании пользователя или строку null
class ToCompanySlogan
{
    public function __construct()
    {
        $this->rez='null';
        if (isset($_POST['Save']))
            if ($_POST['Company_slogan']!='' && $_POST['Company_slogan']!="Company slogan")
                $this->rez=$_POST['Company_slogan'];
    }

    public function __toString()
    {
         return $this->rez;
    }

    public function getCompanySlogan()
    {
         return $this->rez;
    }
}



