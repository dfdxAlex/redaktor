<?php
namespace classCV;

// класс формирует страницу
class CVCreate
{
    public function __construct()
    {
        if (!isset($_SESSION['nameFile'])) $_SESSION['nameFile']='';
        if (!isset($_SESSION['md5'])) $_SESSION['md5']='';
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

        if ($_SESSION['skills']!='') {
            $skills=(string)  new Translation('Резюме');
            $skills_text="{$_SESSION['skills']}";
        } else $skills='';  

        if ($_SESSION['experience']!='') {
            $experience=(string)  new Translation('Опыт');
            $experience_text="{$_SESSION['experience']}";
        } else $experience='';  

        if ($_SESSION['education']!='') {
            $education=(string)  new Translation('Образование');
            $education_text="{$_SESSION['education']}";
        } else $education='';  

        if ($_SESSION['git']!='') {
            $git='GIT';
            $git_text="<a href='{$_SESSION['git']}' target='_blank'>{$_SESSION['git']}</a>";
        } else $git='';  

        if ($_SESSION['certificates_numer']>0) {
            $certificates=(string)  new Translation('Сертификаты');
            $certificates_text="";
            for ($i=0; $i<$_SESSION['certificates_numer']; $i++) {
                $sert=$_SESSION['certificates_name'.$i];
                $certificates_text.="
                    <div class='row'>
                        <div class='col-12'>
                            <div>$sert</div> 
                        </div>
                    </div>
                ";
            }
        } else $certificates='';  

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

        $servisCreateDFDX=(string) new Translation('Сервис создан на базе CMS DFDX');
        

        return "
            
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

                <section class='container-fluid pole-info'>
                    <div class='row'>
                        <div class='col-12 summary'>
                            <div>$skills</div>
                        </div>
                    </div><div class='row'>
                        <div class='col-12 summary-text'>
                            <div>$skills_text</div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12 experience'>
                            <div>$experience</div>
                        </div>
                    </div><div class='row'>
                        <div class='col-12 experience-text'>
                            <div>$experience_text</div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12 education'>
                            <div>$education</div>
                        </div>
                        </div><div class='row'>
                        <div class='col-12 experience-text'>
                            <div>$education_text</div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12 language'>
                            <div>$language</div>
                        </div>
                    </div>
                    <div class='language_text'>
                       $language_text
                    </div>

                    <div class='row'>
                        <div class='col-12 sertificates'>
                            <div>$certificates</div>
                        </div>
                    </div>

                    <div class='sertificates_text'>
                        $certificates_text
                    </div>

                    <div class='row'>
                    <div class='col-12 git'>
                        <div>$git</div>
                    </div>
                    </div><div class='row'>
                        <div class='col-12 git-text'>
                            <div>$git_text</div>
                        </div>
                    </div>


                </section>
                <div class='servis-create-dfdx'>$servisCreateDFDX</div> 
            </section>
        ";
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
        if (!isset($_REQUEST['printCV'])) return false;
        $cv = new \classCV\CVCreate();

        $header = new \class\nonBD\HtmlHead('CSS/cv.css','CV','classPrint',1,1);
        $futer = new \class\nonBD\HtmlFutter();
    
        $rez="$header$cv$futer";

        $nameFile="user_files/{$_SESSION['name']}_{$_SESSION['surname']}.html";

        $i=0;
        while (file_exists($nameFile)) {
            $i++;
            $nameFile="user_files/{$_SESSION['name']}_{$_SESSION['surname']}$i.html";
        }
        $_SESSION['nameFile']=$nameFile;

        if ($_SESSION['md5']!=hash('md5',$rez)) {
            $rez=preg_replace('/CSS\/cv/',"../CSS/cv",$rez);
            $_SESSION['md5']=hash('md5',$rez);
            file_put_contents($nameFile,$rez);
        } else return false;
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
