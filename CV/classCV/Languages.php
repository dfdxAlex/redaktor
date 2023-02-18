<?php
namespace classCV;

// класс хранит информацию об Языках
class Languages
{
    public function __construct()
    {
        if (!isset($_SESSION['languages_numer'])) $_SESSION['languages_numer']=1; // число полей для заполнения


    }

    public function __toString()
    {
        $formLang='';

        // добавить новую переменную сессий, если было открыто новое поле
        for($i=0; $i<$_SESSION['languages_numer']; $i++) {
            if (!isset($_SESSION['languages'.$i])) $_SESSION['languages'.$i]='';
            if (!isset($_SESSION['languages-level'.$i])) $_SESSION['languages-level'.$i]='';
        }
        
        for($i=0; $i<$_SESSION['languages_numer']; $i++) {
            if ($_SESSION['languages-level'.$i]=='') $nameLevelButton=(string) new \class\nonBD\Translation('Уровень владения языком');
            else $nameLevelButton = $_SESSION['languages-level'.$i];

            $formLang.='   
            <div class="row">
            <div class="col-8">
                <input type="text" name="form_text'.$i.'" value="'.$_SESSION['languages'.$i].'">
            </div>   

            <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    '.$nameLevelButton.'
                    </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Родной').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Свободное владение языком').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Читаю, пишу и разговариваю').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Могу читать и разговаривать').'"></li>
                    <li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Читаю документацию с переводчиком').'"></li>
                </ul>
                </div>
            </div> 
            </div>
            ';//<li><input type="submit" name="form_sub'.$i.'" class="dropdown-item" value="'.(string) new \class\nonBD\Translation('Родной').'"></li>
        }

        return '
            <section class="container-fluid form-languages">
                <div class="row">
                    <div class="col-12">
                        <p>'.(string) new \class\nonBD\Translation('Уровень владения языком').'</p>
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
                        <input type="submit" name="go_language" value="'.(string) new \class\nonBD\Translation('Отправить').'" class="btn btn-info">
                    </div>   
                </div>
                </form>
            </section>
        ';
    }

    // работает с числом колличества языков
    public function languagesNumer()
    {
        if (isset($_REQUEST['form_plus'])) {
            $_SESSION['languages_numer']++;
            if (!isset($_SESSION['languages-level'.$_SESSION['languages_numer']]))
                $_SESSION['languages-level'.$_SESSION['languages_numer']]='';
                $_SESSION['languages'.$_SESSION['languages_numer']]='';
        }
        else if (isset($_REQUEST['form_minus'])) $_SESSION['languages_numer']--;
        if ($_SESSION['languages_numer']<0) $_SESSION['languages_numer']=0;
    }

    // работает с информацией об языках и уровнях владения языками
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
