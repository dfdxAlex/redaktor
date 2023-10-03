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
        $mas[3] = $this->youtube();
        $mas[4] = $this->gitHub();
        $mas[5] = $this->linkdln();
    }

    private function adress()
    {
        if ($_SESSION['address']!='') {
            $address=(string) new Translation('Адрес');
            return "<p>$address :".$_SESSION['address']."</p>";
        }
        return '';
    }

    private function tel()
    {
        if ($_SESSION['tel']!='') {
            $tel=(string) new Translation('Телефон');
            return "<p>$tel :".$_SESSION['tel']."</p>";
        } 
        return '';
    }

    private function email()
    {
        if ($_SESSION['email']!='') {
            $email=(string) new Translation('Почта');
            return "<p>$email :".$_SESSION['email']."</p>";
        } 
        return '';
    }

    private function youtube()
    {
        if ($_SESSION['youtube']!='') {
            $youtube='youtube';
            return "<p>$youtube :".$_SESSION['youtube']."</p>";
        } 
        return '';
    }

    private function gitHub()
    {
        $git = $_SESSION['git'];
        $git = preg_replace('/https\:\/\/github\.com\//', '', $git);
        if ($_SESSION['git']!='') {
            return "<p>Git :".$git."</p>";
        } 
        return '';
    }

    private function linkdln()
    {
        $linkedln = $_SESSION['Linkedln'];

        if ($_SESSION['Linkedln']!='') {
            return "<p>Linkedln :".$linkedln."</p>";
        } 
        return '';
    }
}
