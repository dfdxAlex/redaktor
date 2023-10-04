<?php
namespace classCV\forCvCreate;

class VievCv
{
    private $vievCv;

    public function getCv()
    {
        return $this->vievCv;
    }

    public function __construct(array $mas)
    {
        [$addressTeg, $telTeg, $emailTeg,
        $youtube, $gitHub, $linkdln,
        $listSkills,$listSkills_text,
        $skills, $skills_text,
        $experience, $experience_text,
        $education, $education_text,
        $git, $git_text,
        $certificates, $certificates_text,
        $language, $language_text,
        $servisCreateDFDX
        ] = $mas;

        $this->vievCv = '
               <section class="container-fluid create-cv">
                <div class="row">
                    <div class="col-3 name">
                        <button name="lives1" form="form_setting">
                        <p> '.$_SESSION['name'].' </p>
                        <p> '.$_SESSION['surname'].'</p>
                        </button>
                    </div>
                    <div class="col-5 address-cv-create">
                        '.$addressTeg.'
                        '.$telTeg.'
                        '.$emailTeg.'
                        '.$youtube.'
                        '.$gitHub.'
                        '.$linkdln.'
                    </div>
                    <div class="col-4">
                        <div class="fotoCvCreate">
                        </div>
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
            </section>
        ';
    }
}

