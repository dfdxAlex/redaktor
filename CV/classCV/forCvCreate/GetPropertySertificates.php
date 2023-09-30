<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class GetPropertySertificates
{
    public function __construct(&$mas)
    {
        $mas = $this->certificates();
    }

    private function certificates()
    {
        if ($_SESSION['certificates_numer']>0) {
            $certificates = new Translation('Сертификаты');
            $certificates_text="";
            for ($i=0; $i<$_SESSION['certificates_numer']; $i++) {
                $sert=$_SESSION['certificates_name'.$i];
                $certificates_text.="
                    <div class='row'>
                        <div class='col-12'>
                            <div>$sert</div> 
                        </div>
                    </div>
                ";
            }
            return [$certificates, $certificates_text];
        } 
        return ['',''];
    }
}
