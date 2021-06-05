<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon">
    <title>Starki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="starki.css">
    <meta name="Cache-Control" content="no-store">
</head>
<body class="bod<?php echo 'y'.rand(1,9)?>">
<?php
session_start();
if (!isset($_SESSION['resetNameTable'])) $_SESSION['resetNameTable']=false;
if (!isset($_SESSION['regimRaboty'])) $_SESSION['regimRaboty']=1;
if (!isset($_SESSION['status'])) $_SESSION['status']=0;
include 'funcii.php';
include 'class.php';
$redaktor=false;        // Признак нажатия кнопки настройки редактора
$spisokTablic=false;    // Признак нажатия кнопки Список таблиц

$red = new redaktor();
$status = new login();
$menuUp = new menu(); 

if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$status->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;
?>
<section class="container-fluid">
<div class="row">
<div class="col-3">
<div class="soloDiv"><img src="image/hapka2.png" <?php echo 'height="'.rand(250,450).'px"; width="'.rand(250,450).'px"; vspace="'.rand(5,50).'px"; hspace="'.rand(5,50).'px"'?>></div>
</div>
<div class="col-2">
<?php
$privet='Привет Гость';
if (isset($_SESSION['login'])) $privet='Привет '.$_SESSION['login'];
$privet=$privet.' ('.$status->statusString().')';
echo '<p class="privetDrug">'.$privet.'</p>';
?>
</div>

<!-------------------------Верхнее меню, главное для сайта----------------------------------------------->
<div class="col-7"> 
  <?php 
      if ($_SESSION['status']>99) $_SESSION['status']=9; //Меню входа и регистрации
      $menuUp->__unserialize('menu7','menu_stark_up_status',array('starki.php','Логин','Пароль','Вход','Регистрация','Выход','Редактор'));
   ?>
</div></div></section>
<!------------------------------------------------------------------------>
<!-------------------------Второе меню, главное для сайта----------------------------------------------->
<section class="container-fluid"><div class="row"><div class="col-12"> 
<?php $menuUp->__unserialize('menu7','menu_stark_glawnoe',array('starki.php','О членах'));?>
</div></div></section>
<!------------------------------------------------------------------------>

<section class="container-fluid"><div class="row">
<?php
////////////////////////////////Левое меню с должностями, занимает 2 позиции////////////////////////////
echo '<div class="col-2">';
$menuUp->__unserialize('menu7','dolgnosti_starkow',array('starki.php'));
echo '</div>';
?>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-8">
<?php
////////////////////////////////Среднее поле на 8 позиций////////////////////////////
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
if (isset($_POST['menu_stark_up_status'])  &&  $_POST['menu_stark_up_status']=='Вход')  { //Если нажата кнопка Вход
  $_SESSION['regimRaboty']=16;
  $_SESSION['status']=$status->statusRegi($_POST['login_status_stark'],$_POST['parol_status_stark']);
  $_SESSION['login']=$_POST['login_status_stark'];
  $_SESSION['parol']=$_POST['parol_status_stark'];
  if (!isset($_SESSION['vhod']) || isset($_SESSION['vhod']) && $_SESSION['vhod']==false)
    {
     $_SESSION['vhod']=true;
     $_SESSION['vyhod']=false;
    // $_SESSION['vhod']=false;
     echo '<script>location.reload()</script>';
    }
}


if (isset($_POST['login_stark'])  &&  $_POST['login_stark']=='Регистрация' || $_SESSION['regimRaboty']==13)  { //Если нажата кнопка Регистрация
  $_SESSION['sSajta']=true;
  //header('Location: redaktor.php ');
  exit("<meta http-equiv='refresh' content='0; url= redaktor.php'>");
}
///////////////////////////////////////////////////////////Конец работы с регистрацией///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$_SESSION['regimRaboty']=20 // Редактирование профиля пользователя
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

