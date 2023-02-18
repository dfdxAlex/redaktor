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
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
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
      echo '<footer class="container-fluid futter">';
      if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
          $interfaceStatistik->statistikOnOff();
      
      if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
          $interfaceStatistik->redactMaty();
      
      // Вывод статистики Футтер
      $interfaceStatistik->metkaStatistika($metka);
      echo '<div class="futterDivDfdx">';
      echo '<p class="footerMarginTop">Просмотров:'.$interfaceStatistik->getMetkaStatistik($metka).'</p>';
      echo '<p class="footerMarginTop">Число запросов к БД: '.$interfaceStatistik->kolZaprosow().'</p>';
      echo '<p class="footerMarginTop">Начало верстки сайта 2021-09-19</p>';
      echo '<p class="footerMarginTop">CMS-DFDX</p>';
      echo '</div>';
      $interfaceStatistik->dobavilMat('Здесь можно пополнить справочник нецензурных слов. Слово попадет в базу после проверки модератором.');
      echo '</footer>';
     }
}
