<?php
namespace class\redaktor;

// Класс работа со статистикой
class statistic implements interface\interface\InterfaceWorkToStatistik
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToStatistik;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;

  public function __construct()
  {
    $this->connectToBd();
    $this->tableValidationCMS();
  }
}
