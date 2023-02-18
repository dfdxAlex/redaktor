<?php
namespace extensions\resource\menuofjson\valueObject;

// класс проверяет список необходимых переменных сессий и если их нет, создает
class toSessionLocal
{
    public function __construct()
    {
        if (!isset($_SESSION['new_menu'])) $_SESSION['new_menu']='';
        if (!isset($_SESSION['edit_menu'])) $_SESSION['edit_menu']='';
    }
}
