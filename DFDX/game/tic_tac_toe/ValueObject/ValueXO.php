<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, играть крестиками или ноликами и возвращает значение 0 или 1
class ValueXO
{
    public function __construct()
    {
        // если не существует данной переменной сессии, то создать её и обнулить
        if (!isset($_SESSION['x_o'])) $_SESSION['x_o']='X';

        // если есть значение от $_POST['x_o'], то проверить его значение и настроить переменную сессии
        if (isset($_POST['x_o'])) {
            if ($_POST['x_o']=='Играю крестиками (I play with crosses)') $_SESSION['x_o']='X';
            if ($_POST['x_o']=='Играю ноликами (I play with zeros)') $_SESSION['x_o']='O';
        } 
    }
}
