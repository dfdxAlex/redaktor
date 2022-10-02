<?php
namespace classCV;


// класс обслуживает переменную сессии в которой хранится текущий шаг пользователя $_SESSION['level']
class SaveCV extends \class\nonBD\Button
{
    public function __construct()
    {
        $nameBlock= new \class\nonBD\Translation('Придумайте название');
        echo "<section class='container-fluid'>";
            parent::formBlock('formSave','#',
            'h2',
            $nameBlock,
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',


            );
        echo "</section>";
    }
}
