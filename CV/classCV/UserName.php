<?php
namespace classCV;

use \class\nonBD\Translation;
use \classCV\forUserName\VievUserName;

// класс Класс принимает имя пользователя
class UserName
{
    private $vievRezult;

    public function __construct()
    {
        $this->nameHunt();
        $this->createSessionName();
        $this->createSessionSurname();

        $objViev = new VievUserName($this);
        $this->vievRezult = $objViev->vievNameForm();
    }

    public function getName()
    {
        return $_SESSION['name'];
    }

    public function getSurname()
    {
        return $_SESSION['surname'];
    }

    public function nameForm()
    {
        echo $this->vievRezult;
    }

    function nameHunt()
    {
        if (isset($_REQUEST['nameFoCV'])) {
            if ($_REQUEST['name']!='')
                $_SESSION['name']=$_REQUEST['name'];

            if ($_REQUEST['surname']!='')
                $_SESSION['surname']=$_REQUEST['surname'];

            if ($_REQUEST['youtube']!='')
                $_SESSION['youtube']=$_REQUEST['youtube'];
        } 
    }

    private function createSessionName()
    {
        if (!isset($_SESSION['name']) 
            || (isset($_SESSION['name']) 
                && ($_SESSION['name']=='' 
                    || $_SESSION['name']=='Name'  
                        || $_SESSION['name']=='Imię' 
                            || $_SESSION['name']=='Ім\'я' 
                                || $_SESSION['name']=='Имя'))) 
            $_SESSION['name'] = new Translation('Имя');
    }

    private function createSessionSurname()
    {
        if (!isset($_SESSION['surname']) 
            || (isset($_SESSION['surname']) 
                && ($_SESSION['surname']=='' 
                    || $_SESSION['surname']=='Surname'  
                        || $_SESSION['surname']=='Nazwisko' 
                            || $_SESSION['surname']=='Прізвище' 
                                || $_SESSION['surname']=='Фамилия'))) 
            $_SESSION['surname'] = new Translation('Фамилия');
    }

    private function createSessionYoutube()
    {
        if (!isset($_SESSION['youtube']) 
            || (isset($_SESSION['youtube']) 
                && $_SESSION['youtube']=='')) 
            $_SESSION['youtube'] = "@amatorDed";
    }
}
