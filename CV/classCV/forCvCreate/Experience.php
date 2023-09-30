<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class Experience
{
    public function __construct(&$mas)
    {
        $mas = $this->experience();
    }

    private function experience()
    {
        if ($_SESSION['experience']!='') {
            $experience = new Translation('Опыт');
            $experience_text = $_SESSION['experience'];
            return [$experience, $experience_text];
        } 
        return ['',''];
    }
}
