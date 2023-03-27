<?php
namespace class\redaktor;

class redaktor implements interface\interface\InterfaceAdminPanelDfdx,
                          interface\interface\InterfaceWorkToMail
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceAdminPanelDfdx;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;

    public function __construct()
     {
        $this->colVn=0; // для хранения информации о размере поля редактирования главной таблицы
        $this->strVn=0; // для хранения информации о размере поля редактирования главной таблицы
        $this->connectToBd();
        $this->tableValidationCMS();
     }

    public function __destruct()
    {
        mysqli_close($this->con);
    }
      
}
