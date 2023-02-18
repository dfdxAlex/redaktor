<?php
namespace classCV;

// класс хранит информацию об навыках коротко
class SkillsBriefly
{
    public function __construct()
    {
        if (!isset($_SESSION['skillsbriefly_numer'])) $_SESSION['skillsbriefly_numer']=1; // число полей для заполнения
    }

    public function __toString()
    {
        $SkillsBriefly='';
        $this->testSession();

        //if (!isset($_SESSION['skillsbriefly_name'])) $_SESSION['skillsbriefly_name']='';

        for($i=0; $i<$_SESSION['skillsbriefly_numer']; $i++) {

            $SkillsBriefly.='   
            <div class="row">
            <div class="col-8">
                <input type="text" name="form_text_skill_list'.$i.'" value="'.$_SESSION['skillsbriefly_name'.$i].'">
            </div>   
            <div class="col-4"></div> 
            </div>
            ';
        }

        return '
            <section class="container-fluid skills_short">
                <div class="row">
                    <div class="col-12">
                        <p>'.(string) new \class\nonBD\Translation('Список навыков').'</p>
                    </div>
                </div>
                <form action="#" method="post">
                '.$SkillsBriefly.'
                    <div class="row">
                        <div class=col-12>
                            <input type="submit" name="form_plus" value="+" class="btn btn-info">
                            <input type="submit" name="form_minus" value="-" class="btn btn-info">
                        </div>   
                    </div>
                    <div class="row">
                    <div class=col-12>
                        <input type="submit" name="skills_short" value="'.(string) new \class\nonBD\Translation('Отправить').'" class="btn btn-info">
                    </div>   
                </div>
                </form>
            </section>
        ';
    }

    // работает с числом колличества скилов
    public function skillsBrieflyNumer()
    {
        if (isset($_REQUEST['form_plus'])) {
            // Если была нажата кнопка +, то добавить одну строку для ввода текста
            $_SESSION['skillsbriefly_numer']++;
            // Если не существует нужной переменной сессии, то создать её
            if (!isset($_SESSION['skillsbriefly_name'.$_SESSION['skillsbriefly_numer']]))
                $_SESSION['skillsbriefly_name'.$_SESSION['skillsbriefly_numer']]='';
        }
        else if (isset($_REQUEST['form_minus'])) $_SESSION['skillsbriefly_numer']--;
        if ($_SESSION['skillsbriefly_numer']<0) $_SESSION['skillsbriefly_numer']=0;
    }

    // работает с информацией об скилах - коротко об умениях
    public function skillsBrieflyLevl()
    {
        $button='';
        for ($button=0; $button<$_SESSION['skillsbriefly_numer']; $button++) 
            if (isset($_REQUEST['form_text_skill_list'.$button]))
                $_SESSION['skillsbriefly_name'.$button]=$_REQUEST['form_text_skill_list'.$button];
            else break;
        
        return $button;
    }

    function testSession()
    {
        for($i=0; $i<$_SESSION['skillsbriefly_numer']; $i++) {
            if (!isset($_SESSION['skillsbriefly_name'.$i])) $_SESSION['skillsbriefly_name'.$i]='';
        }
    }
}
