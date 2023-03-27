<?php
namespace class\redaktor;

// Класс - шаблон по умолчанию
class NonTemplates implements interface\interface\InterfaceWorkToNonTemplates,
                              \class\rare_use\interface\InterfaceFoVersitcard,
                              interface\interface\InterfaceWorkToMail
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToNonTemplates;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToSearch;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToStatistik;
  use \class\rare_use\trait\TraitInterfaceFoVersitcard;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;

    public function __construct()
     {
      $this->connectToBd();
      $this->tableValidationCMS();
     }
    
     public function leftMenu()
     {
        echo '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12">';
        $this->formBlock('levBlock','dfdx.php',
            'submit',
            'levBlock',
            'API DFDX',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('apidfdx.php'),
            'br',
            'submit',
            'levBlock',
            'CMS DFDX',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('cms-dfdx.php'),
            'br',
            'submit',
            'levBlock',
            'GIT',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('git.php'),
            'br',
            'submit',
            'levBlock',
            'HTML',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('htmlFoDfdx.php'),
            'br',
            'submit',
            'levBlock',
            'XHTML',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('xhtml.php'),
            'br',
            'submit',
            'levBlock',
            'HTML5',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('html5FoDfdx.php'),
            'br',
            'submit',
            'levBlock',
            'CSS3',
            '#',
            'br',
            'submit',
            'levBlock',
            'Bootstrap 5',
            '#',
            'br',
            'submit',
            'levBlock',
            'jQuery',
            '#',
            'br',
            'submit',
            'levBlock',
            'Регулярные в...',
            \class\nonBD\SearchPathFromFile::createObj()->searchPath('regular_expressions.php'),
            'br',
            'submit',
            'levBlock',
            'PHP8',
            '#',
             'br',
             'submit',
             'levBlock',
             'PSR',
             \class\nonBD\SearchPathFromFile::createObj()->searchPath('psr.php'),
             'br',
             '3',
             'submit',
             'levBlock',
             'Задачи',
             \class\nonBD\SearchPathFromFile::createObj()->searchPath('leson.php')
            );

       echo '</div>';
     }

    // Функция выводит статью с помощью функции news1
    // параметр Modul $modul необходим для передачи в функцию объекта класса Modul, в котором и живёт news1()
    // параметр $action - это страница обработки news1, передается в функцию news1
    // параметр $nomerNewsGlawn определяет сколько статей будет показано на одной странице
    // параметр $runNewsIsNews1 принимает значение ИД статьи, которую нужно показать на странице персональной ссылки
    // параметр nameBD определяет имя таблицы, в которой лежат статьи функции news1
    // параметр string $searchСategory определяет, с какими категориями функция poiskStati() будет работать.
    // параметр string $articleSection определяет, с какими категориями функция news1() будет работать.
     public function publishNews(\class\redaktor\Modul $modul, 
                                 string $action,                // ссылка для отработки клика по заголовку
                                 string $nomerNewsGlawn,        // число новостей на главной страницк
                                 int $runNewsIsNews1, 
                                 string $nameBD, 
                                 string $searchСategory, 
                                 string $articleSection, 
                                 string $twitter)
     {
        $bylPoisk=false;
        echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12">';  // Центр
        
        // часть кода работает с главной страницей и со страницами генерации персональных файлов для статей и их просмотр и поиск
        // работаем с полем поиска слов в базе данных
        if (isset($_POST['poisk']) && $searchСategory=='#категория для поиска#') {
            $this->poiskStati('bd2',$_POST['strPoisk'],$idStati);
            if ($idStati[0]>-1)
                foreach($idStati as $value) 
                    $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value);
                $bylPoisk=true;
         }
       
        if (!$bylPoisk && $searchСategory=='#категория для поиска#') {

            // проверяем была ли нажата кнопка правого меню сайта
            $statiaPoId=$this->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");

            if ($runNewsIsNews1>-1 && !isset($_POST['menu_up_dfdx']))
                $modul->news1("id=".$runNewsIsNews1,$nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);

            // переход на страницу при нажатии на верхнее меню.
            if ($runNewsIsNews1<0)
            if ($statiaPoId=='netKnopki' || isset($_POST['menu_up_dfdx']))  // Если не была нажата кнопка правой панели
               $modul->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);
            if ($action!='action=dfdx.php' && $statiaPoId==-1)
                if (!$_SESSION["runStrNews"]) 
                    $statiaPoId=$runNewsIsNews1; 
            
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
            if ($twitter!=='buttonTwitter')
                $this->buttonTwitter($twitter);
            echo '</div>';
     }

     public function rightMenu(interface\interface\InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc, int $nBootton=1000000)
     {
         echo '<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 prawy">';  // правое меню
         echo '<div class="poiskDiv">';
         poiskDfdx('dfdx.php');
         echo '</div>';
         $this->pravoePole($InterfaceWorkToStatistik, $kluc, $nBootton);   // категория статей, которые должны быть показаны в правом меню 
         echo '</div>';
     }
 
     // string $kluc, - категория, с которой работаем
     // int $nBootton - число кнопок максимальное
     function pravoePole(interface\interface\InterfaceWorkToStatistik $InterfaceWorkToStatistik, string $kluc, int $nBootton=1000000)
     {
     echo '<section class="container-fluid">';
     echo '<div class="pravoe-pole-div">';
     $i=0;
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

       while (!is_null($stroka=(mysqli_fetch_assoc($rez))) && $nBootton>$i) {
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
          
          if ($knopkaYes) {
              echo '<button class="prawBlock btn"  name="panelPrawa'.$stroka['id'].'" formaction="'.$strokaUrl.'">'.$nameSmall.'</button>';
              $i++;  
          }
          echo '</div>';
          echo '</div>';
        }
        
       echo '</form>';

       echo '</div>';
      echo '</section>';
 }

}
