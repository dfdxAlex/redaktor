<?php
namespace classCV;

// класс с общими статическими методами
class RequestButton
{
    // НЕ Работает
    static function livesCreateCV()
    {
        if (isset($_REQUEST['lives1']))
            $_SESSION['level']=9;
    }
}
