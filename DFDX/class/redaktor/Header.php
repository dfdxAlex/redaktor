<?php
namespace class\redaktor;
// ////////////////Считываем параметры инициализации базы данных////////////////////////////

class Header implements interface\interface\InterfaceWorkToHeader
{
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceFoUser;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToHeader;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;

    public function __construct() 
    {
     $this->connectToBd();
     $this->tableValidationCMS();
    }


}
