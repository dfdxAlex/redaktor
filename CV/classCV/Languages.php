<?php
namespace classCV;

// класс хранит информацию об Языках
class Languages
{
    //use \class\nonBD\Button;

    public function __construct()
    {
        if (!isset($_SESSION['languages_numer'])) $_SESSION['languages_numer']=1; // число полей для заполнения

        for($i=0; $i<$_SESSION['languages_numer']; $i++) {
            if (!isset($_SESSION['languages'.$i])) $_SESSION['languages'.$i]='';
            if (!isset($_SESSION['languages-level'.$i])) $_SESSION['languages-level'.$i]='';
        }
    }

    public function __toString()
    {
        $formLang='';
        for($i=0; $i<$_SESSION['languages_numer']; $i++) {
            $formLang.='   
            <div class="row">
            <div class="col-4">
                <input type="text" name="form_text'.$i.'" value="'.$_SESSION['languages'.$i].'">
            </div>   

            <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    '.(string) new Translation('Уровень владения языком').'
                    </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><input type="submit" name="form_sub'.$i.'" class="btn btn-light" value="'.(string) new Translation('Родной').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="btn btn-light" value="'.(string) new Translation('Свободное владение языком').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="btn btn-light" value="'.(string) new Translation('Читаю, пишу и разговариваю').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="btn btn-light" value="'.(string) new Translation('Могу читать и разговаривать').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="btn btn-light" value="'.(string) new Translation('Читаю документацию с переводчиком').'"></li>
                </ul>
                </div>
            </div> 

            <div class="col-4">
                '.$_SESSION['languages-level'.$i].'
            </div>   
             
            </div>
            ';
        }


        return '
            <section class="container-fluid form-languages">
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
                        <input type="submit" name="go" value="Отправить" class="btn btn-info">
                    </div>   
                </div>
                </form>
            </section>
        ';
    }

    public function languagesNumer()
    {
        if (isset($_REQUEST['form_plus'])) $_SESSION['languages_numer']++;
        else if (isset($_REQUEST['form_minus'])) $_SESSION['languages_numer']--;
        if ($_SESSION['languages_numer']<0) $_SESSION['languages_numer']=0;
    }

    public function saveLevl()
    {
        $hunt = new \class\nonBD\Button();
        $button=$hunt->hanterButton("rez=hant","nameStatic=form_sub","returnNameDynamic","false=false");
        if ($button=='false') return false;
        $_SESSION['languages-level'.$button]='';
        $_SESSION['languages-level'.$button]=$_REQUEST['form_sub'.$button];
        $_SESSION['languages'.$button]=$_REQUEST['form_text'.$button];
        return $button;
    }
}
