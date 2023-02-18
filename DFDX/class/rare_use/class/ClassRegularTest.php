<?php
namespace class\rare_use\class;

// Класс выводит информацию в низ сайта
class ClassRegularTest implements \class\rare_use\interface\InterfaceFoRegular,
                                  \class\redaktor\interface\interface\InterfaceButton
{

  use \class\rare_use\trait\TraitInterfaceFoRegular;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct()
     {
      $this->connectToBd();
      $this->tableValidationCMS();
     }
}
