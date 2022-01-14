<?php
session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";
  use redaktor\instrument as instrument;
  use redaktor\Modul as modul;
  use redaktor\login as login;
  use redaktor\maty as maty;
  use redaktor\poisk as poisk;
  $b=new instrument();
  $redaktor=new Modul();
  $status = new login();
  $maty = new maty();
  $poisk = new poisk();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-MF3F7YTKCQ');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
<title>html3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="styli.css">
<link rel="stylesheet" href="dfdx.css">
<meta name="Cache-Control" content="no-store">
</head>
<body>
<?php
if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;
//if ($_SESSION["status"]>99) $_SESSION["status"]=9;
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
    if (file_exists('image/html3.png'))
        echo '<img src="image/html3.png" alt="html3">';
    else html3();
}
// Блок работает тогда, когда данный файл вызывается из персональных ссылок для статей
if (stripos($_SERVER['REQUEST_URI'],'news')!==false) {
  $pathMas=preg_split('/news/',$_SERVER['REQUEST_URI']);
  $pathFile='news'.$pathMas[1];
  $zapros="SELECT bd2.name FROM bd2, url_po_id_bd2 WHERE bd2.id=url_po_id_bd2.id AND url_po_id_bd2.url='".$pathFile."'";
  $rez=$maty->zaprosSQL($zapros);
  if ($b->notFalseAndNULL($rez)) {
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
$action='action=htmlFoDfdx.php';  //страница обработки кнопок в модуле news()
$nameBD='bd2';
$nameBD='nameTD='.$nameBD;
////////////////////////////////////////////////////поиск
if (isset($_POST['poisk'])) {
  $poisk->poiskStati('bd2',$_POST['strPoisk'],$idStati,'категория-html3') ;
  if ($idStati[0]>-1)
    foreach($idStati as $value) 
     $redaktor->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'id='.$value);
   $bylPoisk=true;
 }
///////////////////////////////////////////////////
 if (!$bylPoisk) {
      $statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
      if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели
        $redaktor->news1($nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'Раздел=html3');
      if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
        $redaktor->news1("id=".$statiaPoId,$nameBD,"Заголовок=h3","Статус редактора=-s12345","Шаблон=2","Отступ=1",$action,'Раздел=html3');
  }
echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
echo '<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 prawy">';  // правое меню
 echo '<div class="poiskDiv">';
  poiskDfdx("htmlFoDfdx.php"); // кнопка Поиск, ссылка на обработчик
 echo '</div>';
pravoePole("html3");   // категория статей, которые должны быть показаны в правом меню 
echo '</div>';
echo '</div>';
echo '</section>';
////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////Конец основного кода страницы////////////////////////// 
/// Статистика///////////////////////////////////////
echo '<footer class="container-fluid futter">';
$statistik = new redaktor\statistic();
if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
$statistik->statistikOnOff();
if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
$maty->redactMaty();
// Вывод статистики Футтер
$statistik->metkaStatistika("html3");   // метка для подсчёта загрузки страницы, пишется в БД
echo '<div class="futterDivDfdx">';
echo '<p class="footerMarginTop">Просмотров:'.$statistik->getMetkaStatistik("html3").'</p>'; // метка для подсчёта загрузки страницы, пишется в БД
echo '<p class="footerMarginTop">Число запросов к БД: '.$statistik->kolZaprosow().'</p>';
echo '<p class="footerMarginTop">Начало верстки сайта 2021-09-19</p>';
echo '<p class="footerMarginTop">CMS-DFDX</p>';
echo '</div>';
$maty->dobavilMat('Здесь можно пополнить справочник нецензурных слов. Слово попадет в базу после проверки модератором.');
?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
