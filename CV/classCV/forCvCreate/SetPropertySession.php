<?php
namespace classCV\forCvCreate;

class SetPropertySession
{
    public function __construct()
    {
        if (!isset($_SESSION['number_columns_skill_list']))
            $_SESSION['number_columns_skill_list']=2;
        if (!isset($_SESSION['youtube']))
            $_SESSION['youtube']="@amatorDed";
    }
}
