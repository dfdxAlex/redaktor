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
         * Массив содержит список слассов, которые будут 
         * использованны при построении последней страницы CV
         */

        $classes = [
            'UserInfo',
            'StackTehnologi',
            'Position',
            'CommercialExperience',
            'Experience',
            'GetPropertyEducation',
            'CreateLinkForGit',
            'GetPropertySertificates',
            'GetLanguage'
        ];
        
        /**
         * Цикл перебирает массив в слассами, из которых создаются
         * объекты, для получения информации о последней странице.
         * В переменную $class дописывается путь для автозагрузчика
         * так как при разыменовании пространство имён не срабатывает.
         */
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
