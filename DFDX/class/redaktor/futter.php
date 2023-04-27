<?php
namespace class\redaktor;

// Класс выводит информацию в низ сайта
class futter implements interface\interface\InterfaceWorkToFutter
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFutter;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;

    public function __construct()
     {
      $this->connectToBd();
      $this->tableValidationCMS();
     }
    
     // функция имплементируется тут, потому, что не получается в трейде указать на интерфейс
     public function futterGeneral(interface\interface\InterfaceWorkToStatistik $interfaceStatistik, string $metka)
     {
      new \class\classNew\futter\FutterGeneral($metka);
     }
}
