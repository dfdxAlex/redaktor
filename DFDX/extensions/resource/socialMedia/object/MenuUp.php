<?php
namespace extensions\resource\socialMedia\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct()
    {
        
    }

    public function menu()
    {
        echo '
               <img src="resource/socialMedia/images/menu.jpg" width="1200px" height="800px" alt="CMS-DFDX" usemap="#workmap">
                  <map name="workmap">
                     <area shape="poly" href="socialMedia.php?push=next" coords="13,52,14,40,32,6,44,33,57,14,131,12,130,42,50,41,45,51,12,52" >
                     <area shape="poly" href="socialMedia.php?push=youtube" coords="93,147,112,147,115,153,237,152,238,180,86,181,87,174,92,174,94,163,88,147" >
                  </map>
        ';

        $this->fon();
    }

    function fon()
    {
        if ($_SESSION['socialMedia_youtube']) {
            echo '<div class="fon-youtube"></div>';
        }
    }
}
