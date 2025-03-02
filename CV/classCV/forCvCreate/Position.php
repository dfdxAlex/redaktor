<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class Position
{
    public function __construct(&$mas)
    {

            $listSkills = new Translation('Желаемая должность');
            
            // $listSkills_text="
            //                         <strong>
            //                           FrontEnd, BackEnd, FullStack
            //                         </strong>
            //                   ";
            $listSkills_text="
                  <strong>
                    Programista PLC
                  </strong>
            ";

         $mas[0] = $listSkills;
         $mas[1] = $listSkills_text;
    }

    
}
