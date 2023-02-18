<?php
namespace game\sea_battle\object;

class WorkingWithSessions
{
    public function __construct()
    {
        if (!isset($_SESSION['sea_battle_user_name'])) $_SESSION['sea_battle_user_name']='';
        if (!isset($_SESSION['sea_battle_user_step'])) $_SESSION['sea_battle_user_step']=1;
    }
}
