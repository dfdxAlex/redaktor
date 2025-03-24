<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class Position
{
    public function __construct(&$mas)
    {

            $listSkills = new Translation('Желаемая должность');
            
            $listSkills_text="
                  <strong>
                    Frontend Developer
                  </strong>
            ";

         $mas[0] = $listSkills;
         $mas[1] = $listSkills_text;
    }

    
}
