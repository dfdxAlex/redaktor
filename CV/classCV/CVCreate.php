<?php
namespace classCV;

use \classCV\forCvCreate\SetPropertySession;
use \class\nonBD\Translation;
use \classCV\forCvCreate\UserInfo;
use \classCV\forCvCreate\StackTehnologi;
use \classCV\forCvCreate\CommercialExperience;
use \classCV\forCvCreate\Experience;
use \classCV\forCvCreate\GetPropertyEducation;
use \classCV\forCvCreate\CreateLinkForGit;
use \classCV\forCvCreate\GetPropertySertificates;

// класс формирует страницу
class CVCreate
{

    public function __toString()
    {
        if ($_SESSION['pattern']==1)
        return (string) $this->CV1();
    }

    function CV1()
    {
        new SetPropertySession;

        new UserInfo($mas);
        [$addressTeg, $telTeg, $emailTeg] = $mas;

        new StackTehnologi($mas);
        [$listSkills,$listSkills_text] = $mas;

        new CommercialExperience($mas);
        [$skills, $skills_text] = $mas;

        new Experience($mas);
        [$experience, $experience_text] = $mas;

        new GetPropertyEducation($mas);
        [$education, $education_text] = $mas;

        new CreateLinkForGit($mas);
        [$git, $git_text] = $mas;

        new GetPropertySertificates($mas);
        [$certificates, $certificates_text] = $mas;
 

        // формирование строк с перечнем языков и уровнем владения языками
        if ($_SESSION['languages_numer']>0) {
            $language=(string)  new Translation('Знания языков');
            $language_text="";
            for ($i=0; $i<$_SESSION['languages_numer']; $i++) {
                $lang=$_SESSION['languages'.$i];
                $langLevl=$_SESSION['languages-level'.$i];
                $language_text.="
                    <div class='row'>
                        <div class='col-4'>
                            <div>$lang</div>
                        </div>
                        <div class='col-8'>
                            <div>$langLevl</div>
                        </div>
                    </div>
                ";
            }
        } else $language='';  

        $servisCreateDFDX=(string) new Translation('CV сгенерировано на моем проекте "cv.php"');
        
       // $menu = new ButtonMenuUp;
        
        return '
               <section class="container create-cv">
                <div class="row">
                    <div class="col-7 name">
                        <button name="lives1" form="form_setting">
                        <p> '.$_SESSION['name'].' </p>
                        <p> '.$_SESSION['surname'].'</p>
                        </button>
                    </div>
                    <div class="col-5 address-cv-create">
                        '.$addressTeg.'
                        '.$telTeg.'
                        '.$emailTeg.'
                    </div>
                </div>

                <section class="container-fluid pole-info">

                   <div class="row">
                       <div class="col-12 list-skills">
                           <div>'.$listSkills.'</div>
                       </div>
                   </div>
                           '.$listSkills_text.'

                    <div class="row">
                        <div class="col-12 summary">
                            <div>'.$skills.'</div>
                        </div>
                    </div><div class="row">
                        <div class="col-12 summary-text">
                            <div>'.$skills_text.'</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 experience">
                            <div>'.$experience.'</div>
                        </div>
                    </div><div class="row">
                        <div class="col-12 experience-text">
                            <div>'.$experience_text.'</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 education">
                            <div>'.$education.'</div>
                        </div>
                        </div><div class="row">
                        <div class="col-12 experience-text">
                            <div>'.$education_text.'</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 language">
                            <div>'.$language.'</div>
                        </div>
                    </div>
                    <div class="language_text">
                       '.$language_text.'
                    </div>

                    <div class="row">
                        <div class="col-12 sertificates">
                            <div>'.$certificates.'</div>
                        </div>
                    </div>

                    <div class="sertificates_text">
                        '.$certificates_text.'
                    </div>

                    <div class="row">
                    <div class="col-12 git">
                        <div>'.$git.'</div>
                    </div>
                    </div><div class="row">
                        <div class="col-12 git-text">
                            <div>'.$git_text.'</div>
                        </div>
                    </div>

                    <div class="danych">
                    Na podstawie art. 7 ust. 1 Rozporządzenia Parlamentu 
                    Europejskiego i Rady UE 2016/679 z 27 kwietnia 
                    2016 r. w sprawie ochrony osób fizycznych w związku 
                    z przetwarzaniem danych osobowych i w sprawie 
                    swobodnego przepływu takich danych oraz uchylenia 
                    dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie 
                    danych), oświadczam, iż wyrażam zgodę na przetwarzanie 
                    przez Administratora, moich 
                    danych osobowych w zakresie ujętym w CV, w celu 
                    przeprowadzenia procedury rekrutacji na to stanowisko
                    </div> 
                </section>

                <div class="servis-create-dfdx">'.$servisCreateDFDX.'</div> 

            </section>
        ';
    }

    public function buttonLoadCV()
    {
        $cvCreate=(string) new Translation('Скачать CV');
        echo "<form action='#' method='post'>
            <input type='submit' value='$cvCreate' name='loadCV' class='btn btn-info'>
        </form>";
    }

    public function buttonPrintCV()
    {
        $cvCreate=(string) new Translation('Создать CV');
        echo "<form action='#' method='post'>
            <input type='submit' value='$cvCreate' name='printCV' class='btn btn-info'>
        </form>";
    }

    public function createCV()
    {
            echo $this->CV1();
    }
    public function printCV()
    {
        if ($_SESSION['nameFile']=='') return false;
        $cvCreate=(string) new Translation('Открыть последнее CV');
        echo "<form action='{$_SESSION['nameFile']}' method='post'>
            <input type='submit' value='$cvCreate' name='printCV' class='btn btn-info'>
        </form>";
    }
}
