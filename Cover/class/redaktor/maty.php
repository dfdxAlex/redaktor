<?php
namespace class\redaktor;

// Работа с матами и нецензурной лексикой
class maty implements interface\interface\InterfaceWorkToMenu
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;

    public function __construct()
      {
        $this->connectToBd();
        $this->tableValidationCMS();
        $mas_mat = array();
        $nie_mat = array();
        $mat_polsovat = array();
        $this->initDataWithLanguage();
       }
      
}// конец класса maty
