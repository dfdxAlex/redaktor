<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class initBd /*extends instrument*/ implements interface\interface\InterfaceWorkToBd,
                                           interface\interface\InterfaceCollectScolding,
                                           interface\interface\InterfaceDebug,
                                           interface\interface\InterfaceWorkToType, 
                                           interface\interface\InterfaceButton, 
                                           interface\interface\InterfaceWorkToFiles,
                                           interface\interface\InterfaceFoUser
{
    
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;

    //use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    //use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceFoUser;

    public function __construct()
    {
        //parent::__construct();
        $this->connectToBd();
        $this->tableValidationCMS();
    }
      public function __destruct()
      {
        mysqli_close($this->con);
      }
}
