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
        <form action="#" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="address">'. (string) new Translation('Адрес').':</label>
                </div>
                <div class="col-6">
                    <input type="text" name="address" id="address" value="'.$_SESSION['address'].'"><br>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <label for="tel">'. (string) new Translation('Телефон').':</label>
                </div>
                <div class="col-6">
                <input type="tel" name="tel" id="tel" value="'.$_SESSION['tel'].'"><br>
            </div>
            </div>
            <div class="row">
            <div class="col-6">
                <label for="email">'. (string) new Translation('Почта').':</label>
                </div>
                <div class="col-6">
                <input type="email" name="email" id="email" value="'.$_SESSION['email'].'"><br>
            </div>
            </div>
            <div class="row">
            <div class="col-6">
                <label for="Linkedln">Linkedln:</label>
            </div>
            <div class="col-6">
                <input type="url" name="Linkedln" id="Linkedln" value="'.$_SESSION['Linkedln'].'"><br>
            </div>
            </div>
            <div class="row">
            <div class="col-6">
                <label for="git">Git:</label>
            </div>
            <div class="col-6">
                <input type="url" name="git" id="git" value="'.$_SESSION['git'].'"><br>
            </div>
            </div>
            <div class="row">
            <div class="col-6">
                
            </div>
            <div class="col-6">
            <input type="submit" name="adresButton" value="'. (string) new Translation('Отправить').'" class="btn btn-info"><br>
            </div>
            </div>
        </form>
        </section>
        ';

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
