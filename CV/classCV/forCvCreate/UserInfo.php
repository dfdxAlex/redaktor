<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class UserInfo
{
    public function __construct(&$mas)
    {
        $mas[0] = $this->adress();
        $mas[1] = $this->tel();
        $mas[2] = $this->email();
    }

    private function adress()
    {
        if ($_SESSION['address']!='') {
            $address=(string) new Translation('Адрес');
            return "<p>$address :</p><p>".$_SESSION['address']."</p>";
        }
        return '';
    }

    private function tel()
    {
        if ($_SESSION['tel']!='') {
            $tel=(string) new Translation('Телефон');
            return "<p>$tel :</p><p>".$_SESSION['tel']."</p>";
        } 
        return '';
    }

    private function email()
    {
        if ($_SESSION['email']!='') {
            $email=(string) new Translation('Почта');
            return "<p>$email :</p><p>".$_SESSION['email']."</p>";
        } 
        return '';
    }
}
