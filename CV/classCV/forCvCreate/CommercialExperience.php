<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class CommercialExperience
{
    public function __construct(&$mas)
    {
        $mas = $this->getCommercialExperience();
    }

    private function getCommercialExperience()
    {
        if ($_SESSION['skills']!='') {
            $skills = new Translation('Коммерческий опыт');
            $skills_text=$_SESSION['skills'];
            return [$skills, $skills_text];
        }
        return ['','']; 
    }
}
