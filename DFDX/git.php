<?php
namespace class\redaktor;

//файл сгенерирован CMS-DFDX 2022-02-10 23:09:32
//file generated CMS-DFDX 2022-02-10 23:09:32
session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";
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
  $header->headStart('<title>git</title>');
  $header->headBootStrap5([$poisk->searcNamePath('styli.css'),$poisk->searcNamePath('dfdx.css')]);

echo '</head>';
echo '<body>';

if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;
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
if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);
if ($_SESSION["status"]>99) $_SESSION["status"]=9;
$maty->__unserialize(array('menu9','menu_up_dfdx','dfdx.php','Логин','Пароль'));
//$_SESSION['redaktiruem']="#страница обработки правого меню#";
////////////////////////////Начало основного кода страницы//////////////////////////  
///////////////////////////////////////////////////////////////////////////////////////////////////// Шапка
echo '  <img src="image/logo.png" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>';
 //////////////////////////////////////////////////////////////////////////////////////////////////
// Раздел сайта показать
echo '<section class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-12">';
echo '<div class="logoHtml">';
// Блок работает тогда, когда данный файл вызывается не из персональных ссылок для статей
if (stripos($_SERVER['REQUEST_URI'],'news')===false) { 
    if (file_exists('image/git.png'))
        echo '<img src="image/git.png" alt="git">';
    else git();
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
echo '<hr>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////ловим кнопку правой панели///////////////////////////////////////////////////////////////
$statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
///////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<section class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12">';  // Левое меню
levoeMenu();
echo '</div>';
////////////////////////////////////////////Центр//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12">';  // Центр
$bylPoisk=false;
//$action='action=git.php';  //страница обработки кнопок в модуле news()
$nameBD='bd2';
$nameBD='nameTD='.$nameBD;
$metka="git"; //метка для счётчика статистики посещения конкретной страницы


$nonTemplates->publishNews($redaktor,'action=git.php','Число_статей=5',-1,$nameBD,'категория-git','Раздел=git');
/*
////////////////////////////////////////////////////поиск
if (isset($_POST['poisk'])) {
  $poisk->poiskStati('bd2',$_POST['strPoisk'],$idStati,'категория-git') ;
  if ($idStati[0]>-1)
    foreach($idStati as $value) 
     $redaktor->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value);
   $bylPoisk=true;
 }
///////////////////////////////////////////////////
 if (!$bylPoisk) {
      $statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
      if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели
        $redaktor->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'Раздел=git',$nomerNewsGlawn);
      if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
        $redaktor->news1("id=".$statiaPoId,$nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'Раздел=git');
  }
*/

//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
//buttonTwitter

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
