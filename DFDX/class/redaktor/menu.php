<?php
namespace class\redaktor;

class menu implements interface\interface\InterfaceWorkToMenu
 {
  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;

     public function __construct() {

         $this->zapuskMenuMagiceski=false;

         $this->kn[0]=false;
         $this->kn[1]=false;
         $this->kn[2]=false;
         $this->kn[3]=false;
         $this->kn[4]=false;
         $this->kn[5]=false;
         $this->kn[6]=false;
         $this->kn[7]=false;
         $this->kn[8]=false;
         $this->kn[9]=false;
         $this->kn[10]=false;
         $this->kn[11]=false;
         $this->kn[12]=false;
         $this->kn[13]=false;
         $this->kn[14]=false;
         $this->kn[15]=false;

         $this->connectToBd();
         $this->tableValidationCMS();
     }

     public function __destruct() {
        mysqli_close($this->con);
     }
     
 }
