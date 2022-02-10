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
  use \class\redaktor\interface\trait\TraitInterfaceWorkToSearch;

    public function __construct()
     {
      $this->connectToBd();
      $this->tableValidationCMS();
     }
    
     public function publishNews(\class\redaktor\Modul $modul, string $action, string $nomerNewsGlawn, int $runNewsIsNews1, string $nameBD, string $searchСategory, string $articleSection)
     {
        $bylPoisk=false;

        // часть кода работает с главной страницей и со страницами генерации персональных файлов для статей и их просмотр и поиск
        if (isset($_POST['poisk']) && $searchСategory=='#категория для поиска#') {
            $this->poiskStati('bd2',$_POST['strPoisk'],$idStati);
            if ($idStati[0]>-1)
                foreach($idStati as $value) 
                    $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value);
                $bylPoisk=true;
         }
        if (!$bylPoisk && $searchСategory=='#категория для поиска#') {
            $statiaPoId=$this->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");

            if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели проверяем нажатие заголовков статей
                $statiaPoId=$this->hanterButton("false=netKnopki","rez=hant","nameStatic=statiaKorotka","returnNameDynamic");

            if (isset($_SESSION['statiaPoId']))
               if ($statiaPoId=='netKnopki') 
                  $statiaPoId=$_SESSION['statiaPoId'];

            if ($statiaPoId=='netKnopki' || isset($_POST['menu_up_dfdx']))  // Если не была нажата кнопка правой панели
               $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);

            if ($action!='action=dfdx.php' && $statiaPoId==-1)
                if (!$_SESSION["runStrNews"]) $statiaPoId=$runNewsIsNews1; 

            if ($statiaPoId>-1 && !isset($_POST['menu_up_dfdx']) && $statiaPoId!='netKnopki')
               $modul->news1("id=".$statiaPoId,$nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);
          }

          // часть кода работает с системой генерации новых страниц общих. rd_nova_str.php
          if (isset($_POST['poisk']) && $searchСategory!='#категория для поиска#') {
            $this->poiskStati('#таблица для поиска#',$_POST['strPoisk'],$idStati,'#категория для поиска#') ;
            if ($idStati[0]>-1)
              foreach($idStati as $value) 
               $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value);
             $bylPoisk=true;
           }
           if (!$bylPoisk && $searchСategory!='#категория для поиска#') {
                $statiaPoId=$this->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
                if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели
                  $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$articleSection,$nomerNewsGlawn);
                if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
                  $modul->news1("id=".$statiaPoId,$nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$articleSection);
            }

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
