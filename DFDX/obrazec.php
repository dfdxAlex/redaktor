<?php 
namespace class\redaktor;

session_start(); 
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";
  $status = new login();
  $maty = new maty();
  $statistik = new statistic();
  $menuUp = new menu();
  $poisk = new poisk();
  $header = new Header();
  $futter = new futter();

  echo '<!DOCTYPE html>';
  echo '<html lang="ru">';
  echo '<head>';
  
    $statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
    $header->headStart('<title>образец стилей</title>');
    $header->headBootStrap5([$poisk->searcNamePath('styli.css'),$poisk->searcNamePath('dfdx.css')]);
  
  echo '</head>';
  echo '<body>';

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
    $futter->closeHtmlDok();
