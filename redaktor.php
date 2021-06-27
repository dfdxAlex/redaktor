<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
    <title>RedaktorBD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styli.css">
    <meta name="Cache-Control" content="no-store">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['resetNameTable'])) $_SESSION['resetNameTable']=false;
if (!isset($_SESSION['regimRaboty'])) $_SESSION['regimRaboty']=0;
if (!isset($_SESSION['status'])) $_SESSION['status']=0;
if (!isset($_SESSION['sSajta'])) $_SESSION['sSajta']=false;
include 'funcii.php';
include 'class.php';
$redaktor=false;        // Признак нажатия кнопки настройки редактора
$spisokTablic=false;    // Признак нажатия кнопки Список таблиц

$red = new redaktor\redaktor();
$status = new redaktor\login();
$maty = new redaktor\maty();


if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$status->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;
?>
<a name="vverh">
   
      <?php 
      $menuUp = new redaktor\menu(); 
      if ($_SESSION['status']>99 || $_SESSION['status']==9)
       $menuUp->__unserialize('menu6','podtverdit',array('redaktor.php','Введите код'));

      if ($_SESSION['status']==5 || $_SESSION['status']==4)
         $menuUp->__unserialize('menu3','redaktor_up',array('Редактор','Сайт','Выйти'));

      if ($_SESSION['status']==0)
       $menuUp->__unserialize('menu4','login',array('redaktor.php','Логин','Пароль','Вход','Регистрация'));

       if ($_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3)
         $menuUp->menu('dla_statusob_123');
      
      if (isset($_SESSION['status']) && $_SESSION['status']>0)
        echo '<h6>Вы вошли под логином: '.$_SESSION['login'].'</h6>';
        else {
            echo '<h6 class="mesage">Доброго времени суток. Вы попали в админ. панель движка dfdx. Выберите продолжение регистрации или войдите под своим логином и паролем.</h6>';
            echo '<h6 class="mesage">Так-же Вы всегда можете вернуться на сайт нажав на кнопку "На сайт"</h6>';
        }
      ?>
    
<!------------------------------------------Шапка------------------------------------------------------------------------->
<section class="container-fluid">
<div class="row">
  <div class="col-12">
 <div class="kartinkaHapki"> 
  <img class="kartinkaHapkiImg" width="300px" height="300px" src="image/hapka2.png" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>
</div>
</div>
</div>
</section>

<?php

if ($_SESSION['status']==5 || $_SESSION['status']==4) $red->startMenuRedaktora();
/////////////////////////////////////Кнопки настройки редактора//////////////////////////////////////////////
/////////////////////////////////////Кнопки настройки редактора//////////////////////////////////////////////
/////////////////////////////////////Кнопки настройки редактора//////////////////////////////////////////////
/////////////////////////////////////Кнопки настройки редактора//////////////////////////////////////////////stolbcov

/////////////////////////////////////////////Работа со входом и регистрацией////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Если не нажата кнопка Список таблиц zaprosSQL($zapros)
if ((isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',4)))// || $_SESSION['regimRaboty']==3)  
{ 
$redaktor=true;
$spisokTablic=true;
$_SESSION['regimRaboty']=3;
$red->nazataPokazatSpisokTablic();
}
if ($_SESSION['status']==9 && isset($_POST['podtverdit']) && $_POST['podtverdit']=='На сайт') //Переход на главную страницу
{
  $_SESSION['regimRaboty']=0;
  $status->naGlavnuStranicu();
}
if ($_SESSION['status']==9 && isset($_POST['podtverdit']) && $_POST['podtverdit']=='Выйти')  //Выйти из учётки
{
  $_SESSION['login']='';
  $_SESSION['parol']='';
  $_SESSION['status']=0;
  $_SESSION['regimRaboty']=0;
  //$status->naGlavnuStranicu();
}
if ($_SESSION['status']==9 && isset($_POST['podtverdit'])  &&  $_POST['podtverdit']=='Найти письмо')  { //Если нажата кнопка Найти письмо
  $_SESSION['regimRaboty']=20;
  $mailText='Доброго времени суток. Была запрошена повторная отправка письма с кодом регистрации с сайта '.$status->nameGlawnogoSite().' Код для подтверждения регистрации:';
  $status->siearcMail($_SESSION['login'],$meilText);
  echo '<p class="mesage">Письмо отправлено</p>';
}
if (isset($_POST['podtverdit'])  &&  $_POST['podtverdit']=='Подтвердить запись')  { //Если нажата кнопка Подтвердить запись
  $_SESSION['regimRaboty']=17;
  if ($status->statusRegi($_SESSION['login'],$_SESSION['parol'])==$_POST['kod']) {$_SESSION['status']=1;$status->saveStatus(1);echo '<p class="mesage">Код верный, приятного серфинга!</p>';}
    else {echo '<p class="error">Код не верен!!</p>';}
          if ($_SESSION['status']!=4 && $_SESSION['status']!=5 && $_SESSION['status']!=9) $status->naGlavnuStranicu();
}
if (isset($_POST['login'])  &&  $_POST['login']=='Вход'  && $status->statusRegi($_POST['login_status'],$_POST['parol_status']))  { //Если нажата кнопка Вход
  $_SESSION['regimRaboty']=16;
  $_SESSION['status']=$status->statusRegi($_POST['login_status'],$_POST['parol_status']);
  if ($_SESSION['status']>99 || $_SESSION['status']==9 || $_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3 || $_SESSION['status']==4 || $_SESSION['status']==5)
  {
   $_SESSION['login']=$_POST['login_status'];
   $_SESSION['parol']=$_POST['parol_status'];
  }
  header("Refresh:0");
}
  if (isset($_POST['login'])  &&  $_POST['login']=='На сайт')  { //Если нажата кнопка На сайт
    $status->naGlavnuStranicu();
  }

if (isset($_POST['registracia'])  && $status->lovimOtvetNaCapcu($_POST['registracia']) )  { //Нажата кнопка выбора варианта ответа на капчу
  $_SESSION['regimRaboty']=13;
  if ($status->capcaRez($_POST['Capcha'],$_POST['registracia']) && !$status->prowerkaLogin() && !$status->prowerkaMail() && $_POST['parol']==$_POST['parol2'] && $_POST['parol']!="" && $_POST['parol']!="Пароль")  
   {
     $_SESSION['regimRaboty']=15;
     $mailText='Доброго времени суток. Данная почта используется для регистрации на сайте '.$status->nameGlawnogoSite().' . Код для подтверждения регистрации:';
     $status->zapisGostia($_POST['Логин'],$_POST['parol'],$_POST['Почта'],'Клан S.T.A.R.K.I. Подтверждение учётной записи.',$mailText); //Первая запись в базу данных
   } else {
           $_SESSION['regimRaboty']=14;
           $menuUp->__unserialize('menu4','registracia',array('redaktor.php',$_POST['Логин'],$_POST['parol'],$_POST['parol2'],$_POST['Почта'],$status->capcha()));
           if ($status->prowerkaLogin()) echo '<p class="error">Такой логин уже существует или не соответствует правилам.</p>';
           if ($status->prowerkaMail()) echo '<p class="error">Такая почта уже существует или не соответствует правилам.</p>';
           if ($_POST['parol']!=$_POST['parol2']) echo '<p class="error">Разные пароли</p>';
           if ($_POST['parol']=="" || $_POST['parol']==" " || $_POST['parol']=="Пароль") echo '<p class="error">Отсутствует или плохой пароль</p>';
          }
}

if (isset($_POST['registracia'])  &&  $_POST['registracia']=='Проверить')  { //Если нажата кнопка Проверить 
  $_SESSION['regimRaboty']=13;
  $menuUp->__unserialize('menu4','registracia',array('redaktor.php',$_POST['Логин'],$_POST['parol'],$_POST['parol2'],$_POST['Почта'],$status->capcha()));
  if ($status->prowerkaLogin()) echo '<p class="error">Такой логин уже существует или не соответствует правилам.</p>'; else  echo '<p class="mesage">Логин свободен.</p>';
  if ($status->prowerkaMail()) echo '<p class="error">Такая почта уже существует или не соответствует правилам.</p>'; else  echo '<p class="mesage">Почта свободна.</p>';
}
if (isset($_POST['registracia'])  &&  $_POST['registracia']=='Очистить')  { //Если нажата кнопка Очистить
  $_SESSION['regimRaboty']=13;
  $menuUp->__unserialize('menu4','registracia',array('redaktor.php','Логин','Пароль','Повторить','Почта',$status->capcha()));
}
if (isset($_POST['registracia'])  &&  $_POST['registracia']=='Сменить капчу')  { //Если нажата кнопка Сменить капчу
  $_SESSION['regimRaboty']=13;
  $menuUp->__unserialize('menu4','registracia',array('redaktor.php',$_POST['Логин'],$_POST['parol'],$_POST['parol2'],$_POST['Почта'],$status->capcha()));
}
if (isset($_POST['login'])  &&  $_POST['login']=='Регистрация' && $_SESSION['regimRaboty']!=13)  { //Если нажата кнопка Регистрация
  $menuUp->__unserialize('menu4','registracia',array('redaktor.php','Логин','Пароль','Повторить','Почта',$status->capcha()));
  $_SESSION['regimRaboty']=13;
}
///////////////////////////////////////////////////////////Конец работы с регистрацией///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Кнопка Удалить учётной записи
if (isset($_POST['redaktirowanieStatusa']) && $_POST['redaktirowanieStatusa']=='Удалить')  { 
  $status->killGosc();
}
// Кнопка сохранение учётной записи
if (isset($_POST['redaktirowanieStatusa']) && $_POST['redaktirowanieStatusa']=='Сохранить')  { 
  $status->saveStatusR();
}
// Кнопка сбросить пароль учётной записи
if (isset($_POST['redaktirowanieStatusa']) && $_POST['redaktirowanieStatusa']=='Сбр.пароль')  { 
  $status->resetParol();
}
//Если нажата 7 кнопка Статус
if ((isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',7)) || $_SESSION['regimRaboty']==19)  { 
  $_SESSION['regimRaboty']=19;
  $status->listKlientow();
}
//Если нажата  кнопка Маты
if ((isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',8)) || $_SESSION['regimRaboty']==21)  { 
  $_SESSION['regimRaboty']=21;
  $maty->redactMaty();
  
  //$status->listKlientow();
}
if (isset($_POST['pokazNULL'])  && isset($_POST['pokazNULLSelect']) && $_POST['pokazNULLSelect']=='pokazNULLValue')  { //Если нажата кнопка Загрузить таблицу для меню
  $_SESSION['regimRaboty']=10;
  $_SESSION['pokazNULL']=true;
  $red->loadTablic($_SESSION['nameTablice']);
}
if (isset($_POST['pokazNULL']) && !isset($_POST['pokazNULLSelect']))  { //Если нажата кнопка Загрузить таблицу для меню
  $_SESSION['regimRaboty']=10;
  $_SESSION['pokazNULL']=false;
  $red->loadTablic($_SESSION['nameTablice']);
}
if (isset($_POST['poka_poka']))
{
$_SESSION['regimRaboty']=12;
}

// Запомнить настройки тега
if (isset($_POST['savePola'.$red->poiskButtonName()]) && $_POST['savePola'.$red->poiskButtonName()]=='Запомнить' )  {
  $_SESSION['clickButtonGlawnPole']=false;
  $red->loadTablic($_SESSION['nameTablice']);
}

if (isset($_POST['saweTabOb']) && $_POST['saweTabOb']=='Сохранить' )  { //Кнопка Сохранить при записи таблицы главной 
  $red->createTablicySawe($_SESSION['nameTablice']);
}
if (isset($_POST['menu_parametr_tab']) && $_POST['menu_parametr_tab']=='Ок' )  { //Кнопка ок после ввода параметров поля 
  $red->createPoleTablicy($_SESSION['nameTablice'],$_POST['stolbcov'],$_POST['strok']);
}
if (isset($_POST['buttonTabUniwJestUge']) && $_POST['buttonTabUniwJestUge']=='OK' )  { //Если нажата кнопка ОК или имя новой общей таблицы свободно
  $red->createStyleTabUParametryTabliws();
}
//Если нажата кнопка Создать таблицу для меню
if (isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',2))  { 
  $red->createStyleTabUProwerkaImeni($_POST['text_redaktor_nastr']);
  $_SESSION['nameTablice']=$_POST['text_redaktor_nastr'];
  $_SESSION['regimRaboty']=11;
  $red->saveNameTable($_POST['text_redaktor_nastr']);
}
if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Редактор')  { //Если не нажата кнопка Редактор
  $_SESSION['regimRaboty']=1;
  $redaktor=false;
}
if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Выйти')  { //Если нажата кнопка Выйти
  session_destroy();
  $_SESSION['status']=0;
  $_SESSION['obnovit']=true;
  //$status->naGlavnuStranicu();
  $status->tutObnovit();
}
if (isset($_POST['saveTabeMenu']) && $_POST['saveTabeMenu']=='Сохранить')  { //Если не нажата кнопка Создать таблицу для меню
  $red->saveFormTablicyMenu($_SESSION['nameTablice']);
}
if (isset($_POST['kol_voKn']) && $_POST['kol_voKn']=='Ok')  { //нажата кнопка Записать таблицу
  $red->createFormTablicyMenu($_SESSION['nameTablice'],$_POST['kol_voKnText']);
}
if (isset($_POST['killTabCancel']) && $_POST['killTabCancel']=='Отмена')  { //Если не нажата кнопка Создать таблицу для меню
  $_SESSION['regimRaboty']=9;
}
if (isset($_POST['killTabOk']) && $_POST['killTabOk']=='Согласен удалить')  { //Если не нажата кнопка Создать таблицу для меню
  $_SESSION['regimRaboty']=7;
  $red->killTab($_SESSION['nameTablice']);
  $where="WHERE NAME='".$_SESSION['nameTablice']."'";
  $red->killZapisTablicy("tablica_tablic",$where);
  $_SESSION['nameTablice']='';
  
}
if (isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',1))  { //Если нажата кнопка Загрузить таблицу для меню
  $_SESSION['regimRaboty']=10;
  $_SESSION['nameTablice']=$_POST['text_redaktor_nastr'];
  $red->saveNameTable($_SESSION['nameTablice']);
  $red->loadTablic($_SESSION['nameTablice']);
  $_SESSION['pokazNULL']=false;
}
if (isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',5))  { //Если не нажата кнопка Создать таблицу для меню
  $_SESSION['regimRaboty']=8;
  $red->killTabEtap1($_SESSION['nameTablice']);
}
if (isset($_POST['createTabMenu']) && $_POST['createTabMenu']=='Создать')  { //Если не нажата кнопка Создать таблицу для меню
  if ($_SESSION['regimRaboty']==2) $red->createTabDlaMenu(); // Таблица для menu3 и menu4
  if ($_SESSION['regimRaboty']==18) $red->createTabDlaMenu5(); // Таблица для menu5
  $_SESSION['regimRaboty']=6;
}
if (isset($_POST['tablicaJest']) && $_POST['tablicaJest']=='OK')  { //Если не нажата кнопка OK
  $_SESSION['regimRaboty']=4;
  echo('ОК');
}
if (isset($_POST['tablicaJest']) && $_POST['tablicaJest']=='Cancel')  { //Если не нажата кнопка OK
  $_SESSION['regimRaboty']=5;
  echo('Cansel');
}
if (isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',3))  { //Создать меню
  $_SESSION['regimRaboty']=2;
}
if (isset($_POST['redaktor_nastr7']) && $_POST['redaktor_nastr7']==$menuUp->getNamepoId('redaktor_nastr7',6))  { //Создать меню 5
  $_SESSION['regimRaboty']=18;
}
if (isset($_POST['menuUp']) && $_POST['menuUp']=='Home')  { //Если не нажата кнопка 
  $_SESSION['regimRaboty']=1;
}
if (isset($_POST['redaktor_down']) && $_POST['redaktor_down']=='Настроить редактор')  { //Если не нажата кнопка настройки редактора
  $redaktor=true;
  $_SESSION['resetNameTable']=false;
}



//Если была нажата кнопка, соответствующая некоторой таблице, обрабатываем тут
if (isset($_POST['bottonListTablic'])){
  $redaktor=true;
  $spisokTablic=true;
  $red->saveNameTable($_POST['bottonListTablic']);
  $_SESSION['resetNameTable']=true;
  header("Refresh:0");
}



if ($redaktor && $spisokTablic) {  // Нажата кнопка в редакторе менюшек Показать список таблиц
 // $red->nazataPokazatSpisokTablic();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////


if ($_SESSION['regimRaboty']==2 || $_SESSION['regimRaboty']==18)
{
 if (isset($_POST['text_redaktor_nastr']))
 {
  $red->createNameMenu($_POST['text_redaktor_nastr']);
  $_SESSION['nameTablice']=$_POST['text_redaktor_nastr']; // запоминаем имя таблицы создаваемой менюшки
  $red->saveNameTable($_SESSION['nameTablice']);
  header("Refresh:0");
  } else {
           $red->createNameMenu($_SESSION['nameTablice']);  // Запуск функции создания менюшки если имя таблицы отсутствует в POST
         }
}

 $data=new redaktor\dataAktual();

echo '<div class="container-fluid">'."\n";
echo '<div class="row menu_redaktor_down">'."\n";
   if (isset($_POST['redaktor_down']) && $_POST['redaktor_down']=='Обновить дату изменения сайта'  && !$redaktor)
    {
      $data->saveDataSite();
      echo("Актуализация даты изменения сайта проведена");
    }
    if (isset($_POST['redaktor_down']) && $_POST['redaktor_down']=='Обновить дату изменения базы данных'  && !$redaktor)
    {
      $data->saveDataBd();
      echo("Актуализация даты изменения Базы Данных проведена");
    }
//echo '</div>'."\n";
//echo '</div>'."\n";
?>

</div>
</div>

<?php
 //if (isset($_POST['obnovit']) && $_SESSION['obnovit'])
 //{
 // $_SESSION['obnovit']=false;
 //header("Refresh:0");
 
// }
//$red->printTabEcho()
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

<!--
$_SESSION['nameTablice'] // Здесь имя создаваемой таблицы

$_SESSION['regimRaboty']=1 // режим редактирования базы данных
$_SESSION['regimRaboty']=2 // создать меню
$_SESSION['regimRaboty']=3 // В редакторе нажата кнопка Список Таблиц
$_SESSION['regimRaboty']=4 // В редакторе нажата кнопка ОК после предупреждения о том, что такая таблица уже есть Создаем меню
$_SESSION['regimRaboty']=5 // В редакторе нажата кнопка Cancel после предупреждения о том, что такая таблица уже есть Создаем меню
$_SESSION['regimRaboty']=6 // Нажата кнопка Создать таблицу для меню
$_SESSION['regimRaboty']=7 // Нажата кнопка Удалить таблицу 
$_SESSION['regimRaboty']=8 // Спросить согласие на Удалить таблицу 
$_SESSION['regimRaboty']=9 // Отменили удаление таблицы
$_SESSION['regimRaboty']=10 // Нажата кнопка Загрузить таблицу
$_SESSION['regimRaboty']=11 // Нажата кнопка Создать общую таблицу
$_SESSION['regimRaboty']=12 // Отказ от удаления или создания новой таблицы с именем защищенной от удаления таблицы
$_SESSION['regimRaboty']=13 // Регистрация
$_SESSION['regimRaboty']=14 // Ошибочно заполнена форма регистрации
$_SESSION['regimRaboty']=15 // Правильно заполнена форма регистрации
$_SESSION['regimRaboty']=16 // Нажата кнопка входа
$_SESSION['regimRaboty']=17 // Нажата кнопка Подтвердить запись
$_SESSION['regimRaboty']=18 // Создание меню типа 5
$_SESSION['regimRaboty']=19 // Редактирование учётных записей
$_SESSION['regimRaboty']=20 // найти письмо
$_SESSION['regimRaboty']=21 // маты

  -->