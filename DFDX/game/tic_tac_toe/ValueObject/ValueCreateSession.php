<?php
namespace game\tic_tac_toe\ValueObject;

// объект проверяет существуют ли необходимые переменные сессий и если их нет, то создает их.
// в начале кода необходимо просто создать объект данного класса и можно его сразу же удалить

// obiekt sprawdza, czy wymagane zmienne sesji istnieją, a jeśli nie, tworzy je.
// na początku kodu wystarczy stworzyć obiekt tej klasy i można go od razu usunąć

// the object checks if the required session variables exist, and if they don't, it creates them.
// at the beginning of the code, you just need to create an object of this class and you can immediately delete it

class ValueCreateSession
{
    public function __construct()
    {
        if (!isset($_SESSION['blockBigMenu'])) $_SESSION['blockBigMenu']=false;
        if (!isset($_SESSION['x_o'])) $_SESSION['x_o']='X';
        if (!isset($_SESSION['firstMove'])) $_SESSION['firstMove']='player';
        if (!isset($_SESSION['game_result'])) $_SESSION['game_result']='';
        if (!isset($_SESSION['nomer_move'])) $_SESSION['nomer_move']=0;

        for ($i=1; $i<10; $i++)
            if (!isset($_SESSION['pole'.$i]))
                $_SESSION['pole'.$i]='';

        for ($i=1; $i<10; $i++)
            if (!isset($_SESSION['move'.$i]))
                $_SESSION['move'.$i]='';
        
    }
}
