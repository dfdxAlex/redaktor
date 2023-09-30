<?php
namespace classCV\forCvCreate;

use \classCV\forCvCreate\StylisationListSkillByJs;
use \class\nonBD\Translation;

class StackTehnologi
{
    public function __construct(&$mas)
    {
        if ($_SESSION['skillsbriefly_numer']>0) {

            new StylisationListSkillByJs;
            $listSkills = new Translation('Список навыков');
            
            $listSkills_text="<section class='container-fluid list-skills--container'>";
            $priznak=true;
            $numberColumns=$_SESSION['number_columns_skill_list'];
            $numbersCol=12/$numberColumns;
        
            for ($i=1; $i<=$_SESSION['skillsbriefly_numer']; $i++) {
                $skillsL=$_SESSION['skillsbriefly_name'.$i-1];

                $listSkills_text.=$this->addDivForStartRowSkills($i, $numberColumns);

                $listSkills_text.=$this->getListSkills($numbersCol, $skillsL);
                
                $listSkills_text.=$this->addDivForFinishRowSkills($i, $numberColumns);
             }

             if (!$priznak) $listSkills_text.="</div>";
             $listSkills_text.="</section>";
         }

         $mas[0] = $listSkills;
         $mas[1] = $listSkills_text;
    }

    private function addDivForStartRowSkills($i, $numberColumns)
    {
        if ((($i-1)%$numberColumns==0 
            && $i>$numberColumns) 
                || $i==1) {
                    $priznak=false;
                    return "<div class='row list-skills-text'>";
         }
         return '';
    }

    private function addDivForFinishRowSkills($i, $numberColumns)
    {
        if ((($i)%$numberColumns==0 
            && $i>2) 
               || ($numberColumns==1)) {
                   $priznak=true;
                   return "</div>";
        }
        return '';
    }

    private function getListSkills($numbersCol, $skillsL)
    {
        return "<div class='col-$numbersCol'>
                   <div class='skills'>$skillsL</div> 
                </div>";
    }
}
