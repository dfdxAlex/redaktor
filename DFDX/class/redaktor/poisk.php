<?php

namespace class\redaktor;

class poisk implements interface\interface\InterfaceWorkToSearch
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  //use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToSearch;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;
  
 function __construct()
  {
    $this->connectToBd();
    $this->tableValidationCMS();
  }
}
