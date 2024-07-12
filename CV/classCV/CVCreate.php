<?php
namespace classCV;

use \class\nonBD\Translation;

use \classCV\forCvCreate\{
                          SetPropertySession, UserInfo,
                          StackTehnologi, CommercialExperience,
                          Experience, GetPropertyEducation,
                          CreateLinkForGit, GetPropertySertificates,
                          GetLanguage, VievCv
                        };

class CVCreate
{

    public function __toString()
    {
        if ($_SESSION['pattern']==1)
            return $this->CV1();
    }

    function CV1()
    {
        $masRez = [];

        // Создает некоторые переменные сессий, если их ещё нет
        new SetPropertySession;

        /**
         * UserInfo($mas); изменяет переданный массив и наполняет его
         * html инфой личных данных. 
         * Оптимизация кода, замена array_push() 
         * на array_merge() или array_merge_recursive()
         * Если всё работает, то при следующей оптимизации удалить
         * заккоментированный 
         */
        new UserInfo($mas);
        // [$addressTeg, $telTeg, $emailTeg, 
        //  $youtube, $gitHub, $linkdln] = $mas;
        // array_push($masRez, $addressTeg, $telTeg, $emailTeg, 
        //            $youtube, $gitHub, $linkdln);
        array_push($masRez, ...$mas);
        unset($mas);

        new StackTehnologi($mas);
        // [$listSkills,$listSkills_text] = $mas;
        // array_push($masRez, $listSkills, $listSkills_text);
        array_push($masRez, ...$mas);
        unset($mas);

        new CommercialExperience($mas);
        // [$skills, $skills_text] = $mas;
        // array_push($masRez, $skills, $skills_text);
        array_push($masRez, ...$mas);
        unset($mas);

        new Experience($mas);
        // [$experience, $experience_text] = $mas;
        // array_push($masRez, $experience, $experience_text);
        array_push($masRez, ...$mas);
        unset($mas);

        new GetPropertyEducation($mas);
        // [$education, $education_text] = $mas;
        // array_push($masRez, $education, $education_text);
        array_push($masRez, ...$mas);
        unset($mas);

        new CreateLinkForGit($mas);
        // [$git, $git_text] = $mas;
        // array_push($masRez, $git, $git_text);
        array_push($masRez, ...$mas);
        unset($mas);

        new GetPropertySertificates($mas);
        // [$certificates, $certificates_text] = $mas;
        // array_push($masRez, $certificates, $certificates_text);
        array_push($masRez, ...$mas);
        unset($mas);
 
        new GetLanguage($mas);
        // [$language, $language_text] = $mas;
        // array_push($masRez, $language, $language_text);
        array_push($masRez, ...$mas);

        $servisCreateDFDX = new Translation('CV сгенерировано на моем проекте "cv.php"');
        $masRez[] = $servisCreateDFDX;

        $obj = new VievCv($masRez);
        return $obj->getCv();
    }

    public function createCV()
    {
            echo $this->CV1();
    }

}
