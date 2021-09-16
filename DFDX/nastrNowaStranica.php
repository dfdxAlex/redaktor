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

$class = new redaktor\statistic();
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
         $menuUp->__unserialize('menu3','redaktor_up',array('Редактор','Сайт','Выйти','Создать страницу'));

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
    

<?php

$errorName=true;
// проверить ввели ли имя нового файла
if ($_POST['nameFile']!='' && $_POST['nameFile']!='Введите имя файла страницы.') $errorName=false;

if ($errorName) echo 'Имя файла не удовлетворяет условию';

if (!$errorName)
 {
     // проверим есть ли в названии файла .php, если нет, то добавить
     
 }
/// Статистика///////////////////////////////////////
  if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
    {
      $statistik = new redaktor\statistic();
      $statistik->statistikOnOff();
    }

  if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
       $maty->redactMaty();
?>

</div>
</div>

<?php
 $class->metkaStatistika('nastrNowaStranica');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

