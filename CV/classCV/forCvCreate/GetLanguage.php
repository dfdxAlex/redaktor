<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class GetLanguage
{
    public function __construct(&$mas)
    {
        $mas = $this->language();
    }

    private function language()
    {
        // формирование строк с перечнем языков и уровнем владения языками
        if ($_SESSION['languages_numer']>0) {
            $language=(string)  new Translation('Знания языков');
            $language_text="";
            for ($i=0; $i<$_SESSION['languages_numer']; $i++) {
                $lang=$_SESSION['languages'.$i];
                $langLevl=$_SESSION['languages-level'.$i];
                $language_text.="
                    <div class='row'>
                        <div class='col-4'>
                            <div>$lang</div>
                        </div>
                        <div class='col-8'>
                            <div>$langLevl</div>
                        </div>
                    </div>
                ";
            }
            return [$language, $language_text];
        }
        return ['',''];
    }
}
