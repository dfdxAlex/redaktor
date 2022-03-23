<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, кто ходит первый, игрок или компьютер
class ValueWhoFirst
{
    public function __construct()
    {
        // если не существует данной переменной сессии, то создать её и обнулить
        if (!isset($_SESSION['firstMove'])) $_SESSION['firstMove']='player';

        if (isset($_POST['firstMove'])) {
            if ($_POST['firstMove']=='Я хожу первым (I go first)') $_SESSION['firstMove']='player';
            else $_SESSION['firstMove']='computer';
        } 
    }
}
