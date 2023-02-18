<?php
namespace classCV;

// класс Класс принимает имя пользователя
class UserName
{
    public function __construct()
    {
        $this->nameHunt();
        if (!isset($_SESSION['name']) || (isset($_SESSION['name']) && ($_SESSION['name']=='' || $_SESSION['name']=='Name'  
           || $_SESSION['name']=='Imię' || $_SESSION['name']=='Ім\'я' || $_SESSION['name']=='Имя'))) 
            $_SESSION['name']=(string) new \class\nonBD\Translation('Имя');
        if (!isset($_SESSION['surname']) || (isset($_SESSION['surname']) && ($_SESSION['surname']=='' 
           || $_SESSION['surname']=='Surname'  || $_SESSION['surname']=='Nazwisko' || $_SESSION['surname']=='Прізвище' 
              || $_SESSION['surname']=='Фамилия'))) 
            $_SESSION['surname']= (string) new \class\nonBD\Translation('Фамилия');
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
        
        echo '
        <script src="js/MyLib.js"></script>
            <div class="name-form">
                <section class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>'. (string) new \class\nonBD\Translation('Введите имя и фамилию').'</p> 
                        </div>
                    </div>
                    <div class="row">
                    <form action="#" method="post">
                        <div class="col-4">
                            <input type="text" name="name" value="'.$this->getName().'">
                        </div>
                        <div class="col-4">
                            <input type="text" name="surname" value="'.$this->getSurname().'">
                        </div>
                        <div class="col-4">
                            <input type="submit" name="nameFoCV" value="'. (string) new \class\nonBD\Translation('Отправить').'" class="btn btn-secondary" >
                        </div>
                    </form>
                    </div>
                </section>
            </div>
        ';
    }

    function nameHunt()
    {
        if (isset($_REQUEST['nameFoCV'])) {
            if ($_REQUEST['name']!='' && $_REQUEST['name']!='Name'  && $_REQUEST['name']!='Imię' && $_REQUEST['name']!='Ім\'я' && $_REQUEST['name']!='Имя')
                $_SESSION['name']=$_REQUEST['name'];
            if ($_REQUEST['surname']!='' && $_REQUEST['surname']!='Surname' && $_REQUEST['surname']!='Nazwisko' && $_REQUEST['surname']!='Прізвище' && $_REQUEST['surname']!='Фамилия')
                $_SESSION['surname']=$_REQUEST['surname'];
        } else {
           // $_SESSION['name']='Name';
           // $_SESSION['surname']='UserName';
        }

    }
}
