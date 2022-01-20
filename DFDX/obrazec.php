<?php 
namespace redaktor;

session_start(); 
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";
  $status = new login();
  $maty = new maty();
  $statistik = new statistic();
  $menuUp = new menu();
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
<title>obrazec</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="styli.css">
<meta name="Cache-Control" content="no-store">
</head>
 
<body>
<?php
if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;

if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) 
    $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);
if ($_SESSION["status"]>99) $_SESSION["status"]=9;



if ($_SESSION["status"]>99 || $_SESSION["status"]==9)
   $menuUp->__unserialize(array("menu6","podtverdit","redaktor.php","Введите код"));
if ($_SESSION["status"]==5 || $_SESSION["status"]==4)
   $menuUp->__unserialize(array("menu3","redaktor_up","Редактор","Сайт","Выйти","Создать страницу"));
if ($_SESSION["status"]==0)
   $menuUp->__unserialize(array("menu4","login","redaktor.php","Логин","Пароль","Вход","Регистрация"));
if ($_SESSION["status"]==1 || $_SESSION["status"]==2 || $_SESSION["status"]==3)
   $menuUp->menu("dla_statusob_123");
if (isset($_SESSION["status"]) && $_SESSION["status"]>0)
  echo "<h6>Вы вошли под логином: ".$_SESSION["login"]."</h6>";
else {
      echo '<h6 class="mesage">Доброго времени суток. Вы попали в админ. панель движка dfdx. Выберите продолжение регистрации или войдите под своим логином и паролем.</h6>';
      echo '<h6 class="mesage">Так-же Вы всегда можете вернуться на сайт нажав на кнопку "На сайт"</h6>';
  }
////////////////////////////Начало основного кода страницы////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////////// 
?>
<section class="container-fluid">
<div class="row">
<div class="col-12">  
<p>Шаблоны обрабатывают автоматически заголовок, текст статьи, первый символ первого абзаца и код в тегах code.</p>
</div> 
<div class="row">
<div class="col-12">  
<p class="nazwanie1">Шаблон №1.</p> 
</div>
</div>
<div class="row">
<div class="col-12">  
<span class="perwaLitera1">К</span><p class="osnownojText1">омментарии в html используются, как и в других языках программирования, хотя оный им не
является, в основном для ведения пояснений к различным частям кода, или отдельных его
строк. Так-же комментарии активно применяются при отладке кода программы, или
страницы. В случае с разметкой html, комментарии можно использовать и для создания
динамической страницы, разумеется, с использованием некоторого языка
программирования, однако – это не самый эффективный способ управлять содержимым
страницы.
Внимание!! Комментарий всегда виден на странице, если посмотреть её код с помощью браузера.
Коротко: пояснение части кода, отладка страницы при верстке, создание динамической страницы,
последнее лишь возможность.</p>
</div>
</div>
<div class="row">
<div class="col-12">  
<code>
   <div class="kod1">
for($j=0; $j<$i; $j++) 
           <br>{<br>
             if ($j+1<$i) <br>
            $z=$z.$masN[$j].' '.$masT[$j].', ';<br>
            else $z=$z.$masN[$j].' '.$masT[$j];<br>
            }<br>
         </div>
</code>
</div>
</div>
<div class="row">
<div class="col-12">  
<p class="nazwanie2">Шаблон №2.</p> 
</div>
</div>
<div class="row">
<div class="col-12">  
<span class="perwaLitera2">К</span><p class="osnownojText2">омментарии в html используются, как и в других языках программирования, хотя оный им не
является, в основном для ведения пояснений к различным частям кода, или отдельных его
строк. Так-же комментарии активно применяются при отладке кода программы, или
страницы. В случае с разметкой html, комментарии можно использовать и для создания
динамической страницы, разумеется, с использованием некоторого языка
программирования, однако – это не самый эффективный способ управлять содержимым
страницы.
Внимание!! Комментарий всегда виден на странице, если посмотреть её код с помощью браузера.
Коротко: пояснение части кода, отладка страницы при верстке, создание динамической страницы,
последнее лишь возможность.</p>
</div>
</div>
<div class="row">
<div class="col-12">  
<code>
   <div class="kod2">
for($j=0; $j<$i; $j++) 
           <br>{<br>
             if ($j+1<$i) <br>
            $z=$z.$masN[$j].' '.$masT[$j].', ';<br>
            else $z=$z.$masN[$j].' '.$masT[$j];<br>
            }<br>
         </div>
</code>
</div>
</div>
<div class="row">
<div class="col-12">  
<p class="nazwanie1">Шаблон №3.</p> 
</div>
</div>
<div class="row">
<div class="col-12">  
<span class="perwaLitera3">К</span><p class="osnownojText3">омментарии в html используются, как и в других языках программирования, хотя оный им не
является, в основном для ведения пояснений к различным частям кода, или отдельных его
строк. Так-же комментарии активно применяются при отладке кода программы, или
страницы. В случае с разметкой html, комментарии можно использовать и для создания
динамической страницы, разумеется, с использованием некоторого языка
программирования, однако – это не самый эффективный способ управлять содержимым
страницы.
Внимание!! Комментарий всегда виден на странице, если посмотреть её код с помощью браузера.
Коротко: пояснение части кода, отладка страницы при верстке, создание динамической страницы,
последнее лишь возможность.</p>
</div>
</div>
<div class="row">
<div class="col-12">  
<code>
   <div class="kod3">
for($j=0; $j<$i; $j++) 
           <br>{<br>
             if ($j+1<$i) <br>
            $z=$z.$masN[$j].' '.$masT[$j].', ';<br>
            else $z=$z.$masN[$j].' '.$masT[$j];<br>
            }<br>
         </div>
</code>
</div>
</div>
</div> 
</div> 
</section>
 <?php
////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////Конец основного кода страницы////////////////////////// 
/// Статистика///////////////////////////////////////
if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
    $statistik->statistikOnOff();

if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
    $maty->redactMaty();
?>
</div>
</div>
<?php
    $statistik->metkaStatistika('obrazec');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
