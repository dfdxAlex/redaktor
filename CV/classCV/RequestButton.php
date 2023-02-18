<?php
namespace classCV;

// класс с общими статическими методами
class RequestButton
{
    // НЕ Работает
    static function livesCreateCV()
    {
        // возврат к последней странице с начтройками при нажатии на картинку CV
        if (isset($_REQUEST['lives1']))
            $_SESSION['level']=9;
    }
}
