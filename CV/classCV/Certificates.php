<?php
namespace classCV;

// класс хранит информацию об Сертификатах
class Certificates
{
    public function __construct()
    {
        if (!isset($_SESSION['certificates_numer'])) $_SESSION['certificates_numer']=1; // число полей для заполнения
        
    }

    public function __toString()
    {
        $formLang='';

        if (!isset($_SESSION['certificates_name'])) $_SESSION['certificates_name']=''; // число полей для заполнения
        
        // открыть новую переменную сессий, если были открыты новые поля
        for($i=0; $i<$_SESSION['certificates_numer']; $i++) {
            if (!isset($_SESSION['certificates_name'.$i])) $_SESSION['certificates_name'.$i]='';
        }
        
        for($i=0; $i<$_SESSION['certificates_numer']; $i++) {

            $formLang.='   
            <div class="row">
            <div class="col-12">
                <input type="text" name="form_text_sert'.$i.'" value="'.$_SESSION['certificates_name'.$i].'">
            </div>   
            </div>
            ';
        }

        return '
            <section class="container-fluid form-certificates">
            <div class="row">
            <div class="col-12">
                <p>'.(string) new \class\nonBD\Translation('Сертификаты, допуски, разрешения').'</p>
            </div>
            </div>
                <form action="#" method="post">
                '.$formLang.'
                    <div class="row">
                        <div class=col-12>
                            <input type="submit" name="form_plus" value="+" class="btn btn-info">
                            <input type="submit" name="form_minus" value="-" class="btn btn-info">
                        </div>   
                    </div>
                    <div class="row">
                    <div class=col-12>
                        <input type="submit" name="go_sertificate" value="'.(string) new \class\nonBD\Translation('Отправить').'" class="btn btn-info">
                    </div>   
                </div>
                </form>
            </section>
        ';
    }

    public function certificatesNumer()
    {
        if (isset($_REQUEST['form_plus'])) {
            // Если была нажата кнопка +, то добавить одну строку для ввода текста
            $_SESSION['certificates_numer']++;
            if (!isset($_SESSION['certificates_name'.$_SESSION['certificates_numer']]))
                $_SESSION['certificates_name'.$_SESSION['certificates_numer']]='';
        }
        else if (isset($_REQUEST['form_minus'])) $_SESSION['certificates_numer']--;
        if ($_SESSION['certificates_numer']<0) $_SESSION['certificates_numer']=0;
    }

    public function certificatesLevl()
    {
        $button='';
        for ($button=0; $button<$_SESSION['certificates_numer']; $button++) 
            if (isset($_REQUEST['form_text_sert'.$button]))
                $_SESSION['certificates_name'.$button]=$_REQUEST['form_text_sert'.$button];
            else break;
        
        return $button;
    }
}
