<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class initBd implements interface\interface\InterfaceCollectScolding
{
    
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceFoUser;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;
    
    //use \class\redaktor\interface\interface\InterfaceWorkToMail;

    public function __construct()
    {
        $this->connectToBd();
        $this->tableValidationCMS();
    }
      public function __destruct()
      {
        mysqli_close($this->con);
      }
}
