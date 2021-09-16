<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon">
    <title>Starki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styli.css">
    <link rel="stylesheet" href="starki.css">
    <meta name="Cache-Control" content="no-store">
</head>
<body class="bod<?php echo 'y'.rand(1,9)?>">
<?php
session_start();
$_SESSION['youNotKlan']=false; // по умолчению игрок не состоит в клане
$_SESSION['linkNaDiskord']='https://discord.gg/NFNU2mkYuz'; // содержит ссылку на дискорд, которая может быть изменена на ссылку на главную страницу, если игрок не состоит в клане
if (!isset($_POST['strarki_menu_dolgnosti'])) $_SESSION['redaktor_menu_dolgnosti_stark']=true;
if (!isset($_SESSION['resetNameTable'])) $_SESSION['resetNameTable']=false;
if (!isset($_SESSION['regimRaboty'])) $_SESSION['regimRaboty']=1;
if (!isset($_SESSION['status'])) $_SESSION['status']=0;
include 'funcii.php';
//include 'class.php';
include 'classStark.php';
$redaktor=false;        // Признак нажатия кнопки настройки редактора
$spisokTablic=false;    // Признак нажатия кнопки Список таблиц

$red = new redaktor\redaktor();
$status = new redaktor\login();
$menuUp = new redaktor\menu(); 
$maty = new redaktor\maty();
$blok = new redaktor\modul();
$stat = new redaktor\statistic();

//http://starfederation.local/?m=api&a=player&name=XXXX где XXXX - имя игрока в ответе будет раса на русском и раса на английском
//echo file_get_contents("https://starfederation.ru/?m=api&a=player&name=".$_SESSION['login']);
// Проверка пары логин-пароль. Если такая пара есть в БД, то получить статус пользователя. Если пользователь не подтвердил регистрацию
// то в его статусе находится проверочное число из письма. Если так, то присвоить такому ползователю статус 9.
if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$status->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;

// Проверяем состоит ли игрок в клане Старков, если состоит, то $_SESSION['youNotKlan']=true, инача $_SESSION['youNotKlan']=false
$prowerkaKlana=file_get_contents("https://starfederation.ru/?m=api&a=player&name=".$_SESSION['login']); // Гет запрос на сайт звёздной федерации, проверяем игрока на принадлежность к клану Старков
$rezPoisKlana=strripos($prowerkaKlana,'S_T_A_R_K_ink');
$_SESSION['myKlan']=$rezPoisKlana;  // игрок есть в клане
//echo file_get_contents("https://starfederation.ru/?m=api&a=player&name=alex25");

if (!$rezPoisKlana && $_SESSION['status']!=9 && $_SESSION['status']!=4 && $_SESSION['status']!=5) {$_SESSION['youNotKlan']=false;$_SESSION['linkNaDiskord']='starki.php';} else $_SESSION['youNotKlan']=true;
//if ($_SESSION['youNotKlan']) echo 'я в клане';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!------------------------------------Шапка сайта---------------------------------------->
<section class="container-fluid">
<div class="row">
<div class="col-3">
<div class="soloDiv"><img src="image/hapka2.png" <?php echo 'height="'.rand(250,450).'px"; width="'.rand(250,450).'px"; vspace="'.rand(5,50).'px"; hspace="'.rand(5,50).'px"'?>></div>
</div>
<div class="col-2">
<?php
///////////////////////////////////// Приветствие с проверкой  ////////////////////////////////
$privet='Привет';
if (isset($_SESSION['login'])) $privet='Привет '.$_SESSION['login'];
if (isset($_SESSION['login']) && !$_SESSION['youNotKlan']) $privet=$privet.' Тебя ещё нет в нашем клане, твои возможности на сайте немного ограничены.';
$privet=$privet.' ('.$status->statusString().')';
echo '<p class="privetDrug">'.$privet.'</p>';
///////////////////////////////////////////////////////////////////////////////////////////////
?>
</div>
<!-------------------------------------------конец шапки------------------------------------------------------>

<!-------------------------Верхнее меню, главное для сайта с логином----------------------------------------------->
<div class="col-7"> 
  <?php 
      if ($_SESSION['status']>99) $_SESSION['status']=9; //Меню входа и регистрации
      $menuUp->__unserialize('menu9','menu_stark_up_status',array('starki.php','Логин','Пароль','Вход','Регистрация','Выход','Редактор'));
   ?>
</div></div></section>
<!------------------------------------------------------------------------>
<!-------------------------Второе меню, главное для сайта----------------------------------------------->
<section class="container-fluid"><div class="row"><div class="col-12"> 
<?php $menuUp->__unserialize('menu7','menu_stark_glawnoe',array('starki.php','О членах'));?>
</div></div></section>
<!------------------------------------------------------------------------>
<?php

////////////////////////////////////////////////////Определяем режим работы, какая кнопка была нажата
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='О членах клана') $_SESSION['regimMenu2']=1;  // Была нажата кнопка О членах клана
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Устав клана') $_SESSION['regimMenu2']=13;  // Была нажата кнопка устав клана
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Мы на Ютубе') $_SESSION['regimMenu2']=14;  // Была нажата кнопка Мы на ютубе
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Наши проекты') $_SESSION['regimMenu2']=15;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Наши Базы') $_SESSION['regimMenu2']=16;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Info') $_SESSION['regimMenu2']=17;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Help') $_SESSION['regimMenu2']=19;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Добавить модуль') $_SESSION['regimMenu2']=20;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Наши модули') $_SESSION['regimMenu2']=21;  // Была нажата кнопка наши проекты
if (isset($_POST['menu_stark_glawnoe']) && $_POST['menu_stark_glawnoe']=='Поиск баз') $_SESSION['regimMenu2']=22;  // Была нажата кнопка поиск баз
 
if (isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Меню описания должностей') $_SESSION['regimMenu2']=2;  // Была нажата кнопка О членах клана
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Глава альянса') $_SESSION['regimMenu2']=3; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Заместитель') $_SESSION['regimMenu2']=4; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Магистр науки') $_SESSION['regimMenu2']=5; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Магистр дипломатии') $_SESSION['regimMenu2']=6; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Магистр разведки') $_SESSION['regimMenu2']=7; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Магистр') $_SESSION['regimMenu2']=8; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Джедай') $_SESSION['regimMenu2']=9; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Падаван') $_SESSION['regimMenu2']=10; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Юнлинг') $_SESSION['regimMenu2']=11; // Нажата кнопка описания главы альянса
if (isset($_POST['menu_opisania_prawa_dolgnost']) && $_POST['menu_opisania_prawa_dolgnost']=='Рядовой') $_SESSION['regimMenu2']=12; // Нажата кнопка описания главы альянса

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Меню описания должностей
//////////////////////////////////////////////////// Ловим кнопку личное пространство
if ($_SESSION['youNotKlan'])
myZone();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<section class="container-fluid"><div class="row">
<?php
///////////////////////////////////Форматируем страницу под работу с поиск баз///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==22 && $_SESSION['myKlan'] || $_SESSION['status']==4 && $_SESSION['regimMenu2']==22 || $_SESSION['status']==5 && $_SESSION['regimMenu2']==22)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-4>';
  pokazatMenuPoiskBaz();
  echo '</div>';
  echo '<div class=col-8>';
  echo '<p class="mesage mesageFon">Раздел помогает найти ближайшую базу.<br>';
  echo 'По умолчанию ищем ближайшую безопасную базу.<br>';
  echo 'В меню слева можно задать ресурс или предмет, который необходимо найти на базе.<br>';
  echo 'Если база игрока, который не состоит в Вашем клане, то необходимо убедиться в безопасности посещения данного места.<br>';
  echo 'Информация берется из личного акаунта игрока, проверка актуальности информации не доступна.<br>';
  echo 'В текстовое поле следует ввести координаты точки, для которой необходимо найти базу.</p>';
  //pokazModul();
  //echo 'Pfikb';
  poiskBaz();
  //hanterButton(...$parametr);
  echo '</div>';
  
  //echo '<div class=col-1>';
  //echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с инфой для пользователя///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==21 && $_SESSION['myKlan'] || $_SESSION['status']==4 && $_SESSION['regimMenu2']==21 || $_SESSION['status']==5 && $_SESSION['regimMenu2']==21)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-1>';
  echo '</div>';
  echo '<div class=col-10>';
  pokazModul();
  echo '</div>';
  
  echo '<div class=col-1>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с инфой для пользователя///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==20)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
  dobavitModul();
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с инфой для пользователя///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==19)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
   $blok->news1('Заголовок=h3','Статус редактора=-s45','Шаблон=2','nameTD=info_free','classKill=-button_statia-','classRedakt=-button_statia-');
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с инфой для модератора///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==17)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
  if ($_SESSION['status']==4 || $_SESSION['status']==5) // если чел есть в клане старков
   $blok->news1('Заголовок=h3','Статус редактора=-s45','Шаблон=2','nameTD=info','classKill=-button_statia-','classRedakt=-button_statia-');
   else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для модераторов и администраторов
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с наши базы///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==16)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
  if ($_SESSION['youNotKlan']) // если чел есть в клане старков
   $blok->news1('Заголовок=h3','Статус редактора=-s45','Шаблон=2','nameTD=nashi_bazy','classKill=-button_statia-','classRedakt=-button_statia-');
   else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для членов клана, то убрать коммент
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с наши проекты///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==15)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
  if ($_SESSION['youNotKlan']) // если чел есть в клане старков
   $blok->news1('Заголовок=h3','Статус редактора=-s45','Шаблон=2','nameTD=nash_proekt','classKill=-button_statia-','classRedakt=-button_statia-');
   else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для членов клана, то убрать коммент
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с Мы на Ютубе///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==14)
{
  echo '<section class="container-fluid">';
  echo '<div class="row">';
  echo '<div class=col-2>';
  echo '</div>';
  echo '<div class=col-8>';
  //if ($_SESSION['status']>1 && $_SESSION['status']<6) // Если инфа только для членов клана, то убрать коммент
   $blok->news1('Заголовок=h3','Статус редактора=-s45','Шаблон=2','nameTD=my_na_youtub','classKill=-button_statia-','classRedakt=-button_statia-');
  // else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для членов клана, то убрать коммент
  echo '</div>';
  echo '<div class=col-2>';
  echo '</div>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с уставом альянса///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==13)
{
   echo '<div class="1">';
   echo '</div class="1">';
   echo '<div class="10">';
if ($_SESSION['youNotKlan']) // если чел есть в клане старков
   klikLoginIgroka(); // обрабатываем клик по кнопке устава
   else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для членов клана, то убрать коммент
   echo '</div class="10">';
   echo '<div class="1">';
   echo '</div class="1">';

}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Форматируем страницу под работу с должностями игроков
////////////////////////////////Левое меню с должностями, занимает 2 позиции////////////////////////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==1)
{
if (isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Изменить ширину меню') 
 {
   $izmenili=false;
   if (isset($_POST['strarki_menu_dolgnosti']) && $_SESSION['redaktor_menu_dolgnosti_stark']==true ) 
     {
       $_SESSION['redaktor_menu_dolgnosti_stark']=false;
       $izmenili=true;
     }
   if (isset($_POST['strarki_menu_dolgnosti']) && $_SESSION['redaktor_menu_dolgnosti_stark']==false && !$izmenili) $_SESSION['redaktor_menu_dolgnosti_stark']=true;
 }
//---------------------
  if ($_SESSION['redaktor_menu_dolgnosti_stark']==true)
    echo '<div class="col-3">';
  if ($_SESSION['redaktor_menu_dolgnosti_stark']==false)
    echo '<div class="col-8">';
  //---------------------
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_SESSION['youNotKlan']) // если чел есть в клане старков
{
  saveZwanie(); // Ловим кнопку сохранения звания конкретного логина
  $masStrarkiMenuDolgnosti = array();
  createTableDolgnostiStarkow($masStrarkiMenuDolgnosti);
  $menuUp->__unserialize('menu9','strarki_menu_dolgnosti',$masStrarkiMenuDolgnosti); //strarki_menu_dolgnosti
  resetTableStrarkiMenuDolgnostiPrefix();  // Если есть несоответствие между менюшкой и регами вывести кнопку с решением
} else echo '<p class="mesage">Информация только для членов клана!</p>';// Если инфа только для членов клана, то убрать коммент
echo '</div>';

///////////////////////////////////////////////////////////////////////////////////////////////////////-->
//////////////////////////////////////////Вторая часть форматирования страницы под должности игроков
if ($_SESSION['redaktor_menu_dolgnosti_stark']==true)
  echo '<div class="col-9">';
if ($_SESSION['redaktor_menu_dolgnosti_stark']==false)
  echo '<div class="col-4">';
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////

} //------------------------------------ конец меню о членах клана
////////////////////////////////Среднее поле на 8 позиций////////////////////////////
// Реакция на нажатия кнопок должностей
if ($_SESSION['youNotKlan']) // если чел есть в клане старков
prawaDolgnost();
/////////////////////////////////////////////Редактирование профиля////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['submit_redakt_profil'])  &&  $_POST['submit_redakt_profil']=='Отправить')  { //Если нажата кнопка Профиль
  $_SESSION['regimRaboty']=20;
  $red->saveProfil('redakt_profil',false);
}
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Профиль')  { //Если нажата кнопка Профиль
  $_SESSION['regimRaboty']=20;
  $red->hablon('redakt_profil',false);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['dolgnosti_starkow']))  
{
    echo '<h3 class="zagolowok_dolgnosti">'.$_POST['dolgnosti_starkow'].'</h3>';
    echo $red->hablon('o_clenah_klana');
}
if (isset($_POST['menu_stark_glawnoe'])  &&  $_POST['menu_stark_glawnoe']==$menuUp->getNamepoId('menu_stark_glawnoe',0))  
{ 
//echo 'о нас';
}
?></div>

<div class="col-2">

<!--Правый край экрана-->

</div>

</div>
</section>
<?php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Работа со входом и регистрацией////////////////////////////////////////menu7
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['dolgnosti_starkow']))  
{ 
}
if (isset($_POST['menu_stark_glawnoe'])  &&  $_POST['menu_stark_glawnoe']==$menuUp->getNamepoId('menu_stark_glawnoe',0))  
{ //
}
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Выход')  { //Если нажата кнопка Вход
  $_SESSION['status']=0;
  $_SESSION['login']="";
  $_SESSION['regimRaboty']=0;
  if (!isset($_SESSION['vyhod']) || isset($_SESSION['vyhod']) && $_SESSION['vyhod']==false)
    {
     $_SESSION['vyhod']=true;
     $_SESSION['vhod']=false;
     echo '<script>location.reload()</script>';
    }
}
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Вход' && $status->statusRegi($_POST['login_status_stark'],$_POST['parol_status_stark']))  { //Если нажата кнопка Вход
  //проверить статус запрашиваемого пользователя
  $_SESSION['status']=$status->statusRegi(quotemeta($_POST['login_status_stark']),quotemeta($_POST['parol_status_stark']));
  $_SESSION['regimRaboty']=16;

  if ($_SESSION['status']>99 || $_SESSION['status']==9 || $_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3 || $_SESSION['status']==4 || $_SESSION['status']==5)
   {
    $_SESSION['login']=quotemeta($_POST['login_status_stark']);
    $_SESSION['parol']=quotemeta($_POST['parol_status_stark']);
   }

  if (!isset($_SESSION['vhod']) || isset($_SESSION['vhod']) && $_SESSION['vhod']==false)
    {
     $_SESSION['vhod']=true;
     $_SESSION['vyhod']=false;
     echo '<script>location.reload()</script>';
    }
}


///////////////////////////////////////////////////////////Конец работы с регистрацией///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$_SESSION['regimRaboty']=20 // Редактирование профиля пользователя

?>
<?php
$stat->metkaStatistika('главная');
//$fut = new redaktor\futter();
//$fut->futterR("дата:18.02.2021",'bootstrap','pole=footerStark');
echo '<div class="futterDiv">';
echo '<div class="futterP">';
echo '<p><a href="https://www.starfederation.ru/" target="_blank">Star Federation</a></p>';
echo '<p><br><br><br></p>';
echo '<p></p>';
echo '<p>Просмотров:'.$stat->getMetkaStatistik('главная').'</p>';
echo '<p>Число запросов к БД: '.$stat->kolZaprosow().'</p>';
echo '<p class="nacaloVerstki">Начало верстки сайта 2021-02-18</p>';
echo '<p class="nacaloVerstki">CMS-DFDX</p>';
echo '</div>';
echo '</div>';
$maty->dobavilMat('Здесь можно пополнить справочник нецензурных слов. Слово попадет в базу после проверки модератором.');
 ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

<!-- $_SESSION['regimMenu2']=1; была нажата кнопка меню 2 О членах клана--> 
<!-- $_SESSION['regimMenu2']=2; была нажата кнопка меню Меню описания должностей--> 
<!-- $_SESSION['regimMenu2']=3; Нажата кнопка описания главы альянса-->
<!-- $_SESSION['regimMenu2']=4; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=5; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=6; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=7; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=8; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=9; Нажата кнопка описания --->
<!-- $_SESSION['regimMenu2']=10; Нажата кнопка описания---->
<!-- $_SESSION['regimMenu2']=11; Нажата кнопка описания ---->
<!-- $_SESSION['regimMenu2']=12; Нажата кнопка описания рядовой-->
<!-- $_SESSION['regimMenu2']=13; Работаем с уставом клана-->
<!-- $_SESSION['regimMenu2']=14; Работаем с Мы на Ютубе-->
<!-- $_SESSION['regimMenu2']=15; Работаем с наши проекты-->
<!-- $_SESSION['regimMenu2']=16; Работаем с наши базы-->
<!-- $_SESSION['regimMenu2']=17; Работаем с пунктом Info-->
<!-- $_SESSION['regimMenu2']=18; Кто-то зашел в личное пространство-->
<!-- $_SESSION['regimMenu2']=19; Кто-то зашел в инфа для всех-->
<!-- $_SESSION['regimMenu2']=20; Редактирование расовых модулей-->
<!-- $_SESSION['regimMenu2']=21; Поиск модулей-->
<!-- $_SESSION['regimMenu2']=22; Поиск баз-->


<!-- $_SESSION['regimMyZone']==1  Режим работы в личной зоне с базами-->