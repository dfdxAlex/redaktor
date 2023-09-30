<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class GetPropertyEducation
{
    public function __construct(&$mas)
    {
        $mas = $this->education();
    }

    private function education()
    {
        if ($_SESSION['education']!='') {
            $education = new Translation('Образование');
            $education_text = $_SESSION['education'];
            return [$education, $education_text];
        } 
        return ['',''];
    }
}
