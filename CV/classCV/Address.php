<?php
namespace classCV;

// класс хранит информацию об контактных данных 
class Address
{
    public function __construct()
    {
        if (!isset($_SESSION['address'])) $_SESSION['address']='';
        if (!isset($_SESSION['tel'])) $_SESSION['tel']='';
        if (!isset($_SESSION['email'])) $_SESSION['email']='';
        if (!isset($_SESSION['Linkedln'])) $_SESSION['Linkedln']='';
        if (!isset($_SESSION['git'])) $_SESSION['git']='';
    }

    public function __toString()
    {
        return '
        <section class="container-fluid form-kontakt">
        <form action="#" method="post">'
              .$this->label('address').$this->label('tel').$this->label('email').
               $this->label('Linkedln').$this->label('Git').$this->label('').
            '</form>
        </section>
        ';
    }

    /**
     * Depending on the input parameter, the function generates elements
     * forms.
     * В зависимости от входного параметра функция формирует элементы 
     * формы.
     */
    function label($for)
    {
        
        $strBeginRow = '<div class="row">';
        $strBeginCol = '<div class="col-6">';
        $strEnd =   '</div>';
        $str = '';
        $str2 = '<input type="submit" name="adresButton" value="'. new \class\nonBD\Translation('Отправить').'" class="btn btn-info"><br>';

        if ($for==="Git") {
            $str = '<label for="git">Git:</label>';
            $str2 = '<input type="url" name="git" id="git" value="'.$_SESSION['git'].'"><br>';
        }
        if ($for==="Linkedln") {
            $str = '<label for="Linkedln">Linkedln:</label>';
            $str2 = '<input type="text" name="Linkedln" id="Linkedln" value="'.$_SESSION['Linkedln'].'"><br>';
        }
        if ($for==="email") {
            $str = '<label for="email">'. new \class\nonBD\Translation('Почта').':</label>';
            $str2 = '<input type="email" name="email" id="email" value="'.$_SESSION['email'].'"><br>';
        }
        if ($for==="tel") {
            $str = '<label for="tel">'. new \class\nonBD\Translation('Телефон').':</label>';
            $str2 = '<input type="tel" name="tel" id="tel" value="'.$_SESSION['tel'].'"><br>';
        }
        if ($for==="address") {
            $str = '<label for="address">'. new \class\nonBD\Translation('Адрес').':</label>';
            $str2 = '<input type="text" name="address" id="address" value="'.$_SESSION['address'].'"><br>';
        }
        return $strBeginRow.$strBeginCol.$str.$strEnd.$strBeginCol.$str2.$strEnd.$strEnd;
    }

    public function addressHunt()
    {
        if (isset($_REQUEST['adresButton'])) {
            $_SESSION['address']=$_REQUEST['address'];
            $_SESSION['tel']=$_REQUEST['tel'];
            $_SESSION['email']=$_REQUEST['email'];
            $_SESSION['Linkedln']=$_REQUEST['Linkedln'];
            $_SESSION['git']=$_REQUEST['git'];
        }
    }
}
