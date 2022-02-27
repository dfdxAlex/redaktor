<?php
namespace class\rare_use\class;

// Класс выводит информацию в низ сайта
class ClassRegularTest implements \class\rare_use\interface\InterfaceFoRegular
{

  use \class\rare_use\trait\TraitInterfaceFoRegular;

    public function __construct()
     {
      //$this->connectToBd();
      //$this->tableValidationCMS();
     }
}
