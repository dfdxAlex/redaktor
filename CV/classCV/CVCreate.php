<?php
namespace classCV;

// класс формирует страницу
class CVCreate
{
    public function __construct()
    {
    }

    public function __toString()
    {
        if ($_SESSION['pattern']==1)
        return (string) $this->CV1();
    }

    function CV1()
    {
        
        if ($_SESSION['address']!='') {
            $address=(string)  new Translation('Адрес');
            $addressTeg="<p>$address :</p><p>{$_SESSION['address']}</p>";
        } else $addressTeg='';

        if ($_SESSION['tel']!='') {
            $tel=(string)  new Translation('Телефон');
            $telTeg="<p>$tel :</p><p>{$_SESSION['tel']}</p>";
        } else $telTeg='';     
        
        if ($_SESSION['email']!='') {
            $email=(string)  new Translation('Почта');
            $emailTeg="<p>$email :</p><p>{$_SESSION['email']}</p>";
        } else $emailTeg='';  

        $cvCreate=(string) new Translation('Скачать CV');
        return "
            <form action='#' method='post'>
                <input type='submit' value='$cvCreate' name='loadCV' class='btn btn-info btn-load-cv'>
            </form>
            <section class='container-fluid create-cv'>
                <div class='row'>
                    <div class='col-7 name'>
                        <p> {$_SESSION['name']} </p>
                        <p> {$_SESSION['surname']}</p>
                    </div>
                    <div class='col-5 address-cv-create'>
                        $addressTeg
                        $telTeg
                        $emailTeg
                    </div>
                </div>
            </section>
        ";
    }
}
