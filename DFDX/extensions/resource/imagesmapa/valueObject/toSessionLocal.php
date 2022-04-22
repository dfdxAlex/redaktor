<?php
namespace extensions\resource\imagesmapa\valueObject;

// класс проверяет список необходимых переменных сессий и если их нет, создает
class toSessionLocal
{
    public function __construct()
    {
        if (!isset($_SESSION['imagesMapaMenuUp'])) $_SESSION['imagesMapaMenuUp']='';
        //if (!isset($_SESSION['edit_menu'])) $_SESSION['edit_menu']='';
    }
}
