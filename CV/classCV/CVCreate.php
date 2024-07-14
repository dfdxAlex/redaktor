<?php
namespace classCV;

use \class\nonBD\Translation;

use \classCV\forCvCreate\SetPropertySession;
use \classCV\forCvCreate\VievCv;
                        

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
         */

        $classes = [
            'UserInfo',
            'StackTehnologi',
            'CommercialExperience',
            'Experience',
            'GetPropertyEducation',
            'CreateLinkForGit',
            'GetPropertySertificates',
            'GetLanguage'
        ];
        
        foreach ($classes as $class) {
            $mas = [];
            $class="\\classCV\\forCvCreate\\".$class;
            new $class($mas);
            array_push($masRez, ...$mas);
            unset($mas);
        }

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
