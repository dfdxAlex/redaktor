<?php
namespace class\classNew\futter;

class FutterGeneral
{
    use \class\redaktor\interface\trait\TraitInterfaceWorkToStatistik;
    use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;

         // функция имплементируется тут, потому, что не получается в трейде указать на интерфейс
         public function __construct(string $metka)
         {
          echo '<footer class="container-fluid futter">';
          if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
              $this->statistikOnOff();
          
          if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
              $this->redactMaty();
          
          // Вывод статистики Футтер
          $this->metkaStatistika($metka);
          echo '<div class="futterDivDfdx">';
          echo '<p class="footerMarginTop">Просмотров:'.$this->getMetkaStatistik($metka).'</p>'; //TraitInterfaceWorkToStatistik
          echo '<p class="footerMarginTop">Число запросов к БД: '.$this->kolZaprosow().'</p>';   //TraitInterfaceWorkToStatistik
          echo '<p class="footerMarginTop">Начало верстки сайта 2021-09-19</p>';
          echo '<p class="footerMarginTop">CMS-DFDX</p>';
          echo '</div>';
          $this->dobavilMat('Здесь можно пополнить справочник нецензурных слов. Слово попадет в базу после проверки модератором.');
          echo '</footer>';
         }
}
