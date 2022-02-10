<?php
declare(strict_types=1);
namespace class\redaktor;

//файл сгенерирован CMS-DFDX 2022-02-09 18:36:32
//file generated CMS-DFDX 2022-02-09 18:36:32
session_start();
include "../../funcii.php";
include "../../functionDfdx.php";
include "../../image/swapImages.php";
include "../../class.php";

  $redaktor=new Modul();
  $status = new login();
  $maty = new maty();
  $poisk = new poisk();
  $statistik = new statistic();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  $statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
  $header->headStart('<title>Функция preg_replace_callback().</title>');
  $header->headBootStrap5([$poisk->searcNamePath('styli.css'),$poisk->searcNamePath('dfdx.css')]);

echo '</head>';
echo '<body>';

if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;
if (!isset($_SESSION["runStrNews"])) $_SESSION["runStrNews"]=false; // если страницу загрузили из модуля news, то значение true, если по прямой ссылке, то остается false
if (!isset($_SESSION['redaktiruem'])) $_SESSION['redaktiruem']='';

if ($_SESSION["status"]>99) $_SESSION["status"]=9;
if (isset($_POST['redaktor_up'])) $_SESSION["regimRaboty"]=0; // Если пришли из редактора движка, то абнулить режим работы
////////////////////////////////////////////Верхнее меню///////////////////////////////////////////////////////   

///////////////////////////////////////////Обработка верхнего меню
if ($_SESSION["status"]>0)             // если есть какой-то статух входа на сайт
 if (isset($_POST['menu_up_dfdx']))    // если было нажатие любой кнопки верхнего меню
  if ($_POST['menu_up_dfdx']=='Выход') {// Если была нажата кнопка Выход верхнего меню
    $_SESSION["status"]=0;              // Обнуляем статус пользователя (выходим)
    $_SESSION["login"]='';
 }

if ($_SESSION["status"]==0)             // если пользователь не вошел
  if (isset($_POST['menu_up_dfdx']))    // если было нажатие любой кнопки верхнего меню
    if ($_POST['menu_up_dfdx']=='Вход') {// Если была нажата кнопка Вход верхнего меню
        $_SESSION["login"]=$_POST['login'];
        $_SESSION["parol"]=$_POST['parol'];
  }
if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) 
    $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);
echo '<section class="container-fluid">';
    echo '<div class="row">';
        echo '<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12">';
            if (isset($_SESSION["login"])) {
                echo '<div class="monetki"><img src="'.$poisk->searcNamePath('image/pngwingmal.png').'" class="img-fluid" alt="монет"></div>';
                echo $redaktor->money('login='.$_SESSION["login"]);
            }
        echo '</div>';
        echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">';
        if ($_SESSION["status"]>99) 
            $_SESSION["status"]=9;
        echo '<form method="post" action="../../dfdx.php"><input name="menu_up_dfdx" type="submit" class="button_menu_up_dfdx button_menu_up_dfdx_parser btn" value="Главная"></form>';
        echo '</div>';
    echo '</div>';
echo '</section>';
//$_SESSION['redaktiruem']="dfdx.php";
////////////////////////////Начало основного кода страницы//////////////////////////  
///////////////////////////////////////////////////////////////////////////////////////////////////// Шапка
echo '  <img src="'.$poisk->searcNamePath('image/logo.png').'" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>';
 //////////////////////////////////////////////////////////////////////////////////////////////////
 // Раздел сайта показать
echo '<section class="container-fluid">';
    echo '<div class="row">';
        echo '<div class="col-12">';
            echo '<div class="logoHtml">';
            if (stripos($_SERVER['REQUEST_URI'],'news')===false) { 
                if (file_exists('image/home.png'))
                    echo '<img src="image/home.png" alt="home">';
                else home();
            }
            // Блок работает тогда, когда данный файл вызывается из персональных ссылок для статей
            if (stripos($_SERVER['REQUEST_URI'],'news')!==false) {
                $pathMas=preg_split('/news/',$_SERVER['REQUEST_URI']);
                $pathFile='news'.$pathMas[1];
                $zapros="SELECT bd2.name FROM bd2, url_po_id_bd2 WHERE bd2.id=url_po_id_bd2.id AND url_po_id_bd2.url='".$pathFile."'";
                $rez=$maty->zaprosSQL($zapros);
                if ($poisk->notFalseAndNULL($rez)) {
                    $stroka=mysqli_fetch_array($rez);
                    zagolowkaBeg($stroka[0]);
                }
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<hr>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</section>';
//////////////////////////////////////////////////////////////////////////////
echo '<section class="container-fluid pole">';
    echo '<div class="row">';
        echo '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12">';  // Левое меню
        //levoeMenu();
        echo '</div>';

        echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12">';  // Центр
        $bylPoisk=false;
        $action='action=#';  //страница обработки кнопок в модуле news()
        $runNewsIsNews1=11;
        $metka='funkciya-preg_replace_callback-'; //метка для счётчика статистики посещения конкретной страницы
        $nomerNewsPoisk='Число_статей=5';
        $nomerNewsGlawn='Число_статей=5';
        //if (!file_exists($action)) $action=basename(__FILE__);

        ////////////////////////////////////////////////////поиск
        if (isset($_POST['poisk'])) {
            $poisk->poiskStati('bd2',$_POST['strPoisk'],$idStati) ;
            if ($idStati[0]>-1)
                foreach($idStati as $value) 
                    $redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value,$nomerNewsPoisk);
                $bylPoisk=true;
         }
        ///////////////////////////////////////////////////
        //маркер
        if (!$bylPoisk) {
            $statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");

            if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели проверяем нажатие заголовков статей
                $statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=statiaKorotka","returnNameDynamic");

            if (isset($_SESSION['statiaPoId']))
               if ($statiaPoId=='netKnopki') 
                  $statiaPoId=$_SESSION['statiaPoId'];

            if ($statiaPoId=='netKnopki' || isset($_POST['menu_up_dfdx']))  // Если не была нажата кнопка правой панели
               $redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);

// Комментарий внизу снимается в сгенерированных автоматически новостях от модуля news1      
// The comment below is removed from the automatically generated news from the news1 module    
//НЕ УДАЛЯТЬ, ИСПОЛЬЗУЕТСЯ в персональных ссылках
if (!$_SESSION["runStrNews"]) $statiaPoId=$runNewsIsNews1; 

            if ($statiaPoId>-1 && !isset($_POST['menu_up_dfdx']) && $statiaPoId!='netKnopki')
               $redaktor->news1("id=".$statiaPoId,"nameTD=bd2","Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,$nomerNewsGlawn);
          }

//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
buttonTwitter("Функция preg_replace_callback(). http://dfdx.uxp.ru/news/phpregular/funkciya-preg_replace_callback.php");

$_SESSION["runStrNews"]=false; // обнуление переменной
echo '</div>';

// функция отображает правое меню вместе со своей частью разметки Бутстрапа и функцией поиска по сайту
// the function displays the right menu along with its part of the Bootstrap markup and the site search function
$nonTemplates->rightMenu($statistik,"home");
echo '</div>';
echo '</section>';

// Функция выводит нижнюю часть сайта
// The function displays the bottom of the site
$futter->futterGeneral($statistik,$metka);

// функция подключает вторую часть бутстрапа и закрывает документ html
// the function connects the second part of the bootstrap and closes the html document
$futter->closeHtmlDok();
