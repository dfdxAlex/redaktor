<?php
namespace class\redaktor;

// Класс - шаблон по умолчанию
class NonTemplates implements interface\interface\InterfaceWorkToNonTemplates
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToNonTemplates;

    public function __construct()
     {
      $this->connectToBd();
      $this->tableValidationCMS();
     }
    
     public function rightMenu(interface\interface\InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc)
     {
         echo '<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 prawy">';  // правое меню
         echo '<div class="poiskDiv">';
         poiskDfdx('dfdx.php');
         echo '</div>';
         $this->pravoePole($InterfaceWorkToStatistik, $kluc);   // категория статей, которые должны быть показаны в правом меню 
         echo '</div>';
     }
 
     function pravoePole(interface\interface\InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc)
     {
     echo '<section class="container-fluid">';
     echo '<div class="pravoe-pole-div">';
     $strSummRazdel='WHERE ('; // переменная с условием запроса
     $zapros="SELECT razdel FROM bd2 WHERE 1";
     $rez=$InterfaceWorkToStatistik->zaprosSQL($zapros);
     $connectOR=false; // определяет добавлять ли к строке OR
     $redaktor=new \class\redaktor\Modul();
     //Перебираем все категории из таблицы bd2 и добавляем в условия WHERE те, в которых есть подстрока $kluc
     while (!is_null($stroka=(mysqli_fetch_array($rez))))
      if (stripos($strSummRazdel,$stroka[0])===false)
       if (stripos('s'.$stroka[0],$kluc)>0 || $kluc=='home') {
             if ($connectOR) $strSummRazdel=$strSummRazdel.' OR ';
             $strSummRazdel=$strSummRazdel.'bd2.razdel="'.$stroka[0].'" ';
             $connectOR=true;
        }
       if ($connectOR)
           $zapros="SELECT bd2.name, url_po_id_bd2.url, bd2.id FROM bd2, url_po_id_bd2 ".$strSummRazdel.') AND bd2.id=url_po_id_bd2.id';
       else $zapros='SELECT bd2.name, url_po_id_bd2.url, bd2.id FROM bd2, url_po_id_bd2 WHERE bd2.id=url_po_id_bd2.id';
       $rez=$InterfaceWorkToStatistik->zaprosSQL($zapros);
       if (!$InterfaceWorkToStatistik->notFalseAndNULL($rez)) return false;
       echo '<form action="'.$_SESSION['redaktiruem'].'" method="post">';
       while (!is_null($stroka=(mysqli_fetch_assoc($rez)))) {
         $stroka['name']=$InterfaceWorkToStatistik->clearCode($stroka['name'],'удалить_все');
          echo '<div class="row">';
          echo '<div class="col-12">';
          $nameSmall=mb_strcut($stroka['name'],0,27);
          $strokaUrl=$stroka['url'];
          $knopkaYes=false;
          $_SESSION['id_news_right']=$stroka['id'];  // Запоминаем id статьи, которую пошли смотреть ---------------------------------
          $knopkaYes=file_exists($strokaUrl); // если файл нашли, то присвоить признаку $knopkaYes труе
          if (!$knopkaYes) {
                 $path=$redaktor->urlPoIdPath('bd2',$stroka['id']);
                 if ($path!==false) {$strokaUrl=$path;$knopkaYes=true;}
              }
          
          if ($knopkaYes)
              echo '<button class="prawBlock btn"  name="panelPrawa'.$stroka['id'].'" formaction="'.$strokaUrl.'">'.$nameSmall.'</button>';
          echo '</div>';
          echo '</div>';
        }
       echo '</form>';
       echo '</div>';
      echo '</section>';
 }

}
