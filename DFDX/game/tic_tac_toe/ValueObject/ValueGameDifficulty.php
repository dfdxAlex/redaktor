<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, кто ходит первый, игрок или компьютер
class ValueGameDifficulty
{
    public function __construct()
    {
        // если не существует данной переменной сессии, то создать её и обнулить
        if (!isset($_SESSION['gameDifficulty'])) $_SESSION['gameDifficulty']='easy';

        if (isset($_POST['gameDifficulty'])) {
            if ($_POST['gameDifficulty']=='Простая игра (Simple game)') $_SESSION['gameDifficulty']='easy';
            else $_SESSION['gameDifficulty']='difficult';
        } 
    }
}
