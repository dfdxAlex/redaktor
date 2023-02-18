<?php
namespace extensions\resource\socialMedia\valueObject;

// класс проверяет список необходимых переменных сессий и если их нет, создает
class ToSessionLocal
{
    public function __construct()
    {
        if (!isset($_SESSION['socialMedia_next'])) $_SESSION['socialMedia_next']=false;
        if (!isset($_SESSION['socialMedia_youtube'])) $_SESSION['socialMedia_youtube']=false;

        if (isset($_GET['push'])){
            if ($_GET['push']=='next' && !$_SESSION['socialMedia_next']) $_SESSION['socialMedia_next']=true;
                else if ($_GET['push']=='next' && $_SESSION['socialMedia_next']) $_SESSION['socialMedia_next']=false;

            if ($_GET['push']=='youtube' && !$_SESSION['socialMedia_youtube']) $_SESSION['socialMedia_youtube']=true;
                else if ($_GET['push']=='youtube' && $_SESSION['socialMedia_youtube']) $_SESSION['socialMedia_youtube']=false;
        }
    }
}
