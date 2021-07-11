<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
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
$_SESSION['linkNaDiskord']='https://discord.gg/NFNU2mkYuz';
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

// Проверка пары логин-пароль. Если такая пара есть в БД, то получить статус пользователя. Если пользователь не подтвердил регистрацию
// то в его статусе находится проверочное число из письма. Если так, то присвоить такому ползователю статус 9.
if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$status->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;

$prowerkaKlana=file_get_contents("https://starfederation.ru/?m=api&a=player&name=".$_SESSION['login']); // Гет запрос на сайт звёздной федерации, проверяем игрока на принадлежность к клану Старков
$rezPoisKlana=strripos($prowerkaKlana,'S_T_A_R_K_ink');
if (!$rezPoisKlana && $_SESSION['status']!=9 && $_SESSION['status']!=4 && $_SESSION['status']!=5) {$_SESSION['youNotKlan']=false;$_SESSION['linkNaDiskord']='starki.php';} else $_SESSION['youNotKlan']=true;

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
if (isset($_SESSION['login']) && isset($_SESSION['youNotKlan']) && !$_SESSION['youNotKlan']) $privet=$privet.' Тебя ещё нет в нашем клане, твои возможности на сайте немного ограничены.';
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
<!--\<form method="POST" action=\"https://discord.gg/FZkzYFma9A\"\>
 '<input type="submit" class="linkDiskord btn" value="Discord" formaction="'.$_SESSION['linkNaDiskord'].'">'
 <input type="submit" class="linkDiskord btn" value="Discord" formaction="https://discord.gg/FZkzYFma9A">
\</form\>-->
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
?>
<section class="container-fluid"><div class="row">
<?php
///////////////////////////////////Форматируем страницу под работу с уставом альянса///////////
if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==13)
{
   echo '<div class="1">';
   echo '</div class="1">';
   echo '<div class="10">';

if ($_SESSION['youNotKlan']) // если чел есть в клане старков
   klikLoginIgroka(); // обрабатываем клик по кнопке устава
   




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
}
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
//echo 'о магистре'.$_POST['dolgnosti_starkow'];
}
if (isset($_POST['menu_stark_glawnoe'])  &&  $_POST['menu_stark_glawnoe']==$menuUp->getNamepoId('menu_stark_glawnoe',0))  
{ //
//echo 'о нас';
}
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Выход')  { //Если нажата кнопка Вход
  $_SESSION['status']=0;
  $_SESSION['login']="";
  $_SESSION['regimRaboty']=0;
  if (!isset($_SESSION['vyhod']) || isset($_SESSION['vyhod']) && $_SESSION['vyhod']==false)
    {
     $_SESSION['vyhod']=true;
     $_SESSION['vhod']=false;
    // $_SESSION['vhod']=false;
     echo '<script>location.reload()</script>';
    }
}
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Вход' && $status->statusRegi($_POST['login_status_stark'],$_POST['parol_status_stark']))  { //Если нажата кнопка Вход
  //проверить статус запрашиваемого пользователя
  $_SESSION['status']=$status->statusRegi($_POST['login_status_stark'],$_POST['parol_status_stark']);
  $_SESSION['regimRaboty']=16;

  if ($_SESSION['status']>99 || $_SESSION['status']==9 || $_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3 || $_SESSION['status']==4 || $_SESSION['status']==5)
   {
    $_SESSION['login']=$_POST['login_status_stark'];
    $_SESSION['parol']=$_POST['parol_status_stark'];
   }

  if (!isset($_SESSION['vhod']) || isset($_SESSION['vhod']) && $_SESSION['vhod']==false)
    {
     $_SESSION['vhod']=true;
     $_SESSION['vyhod']=false;
     echo '<script>location.reload()</script>';
    }
}


//if (isset($_POST['login_stark'])  &&  $_POST['login_stark']=='Регистрация' || $_SESSION['regimRaboty']==13)  { //Если нажата кнопка Регистрация
//  $_SESSION['sSajta']=true;
  //header('Location: redaktor.php ');
//  exit("<meta http-equiv='refresh' content='0; url= redaktor.php'>");/
//}
///////////////////////////////////////////////////////////Конец работы с регистрацией///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$_SESSION['regimRaboty']=20 // Редактирование профиля пользователя

?>
<?php

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