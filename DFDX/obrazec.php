<?php 
namespace class\redaktor;

session_start(); 
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";

  $statistik = new statistic();
  $poisk = new poisk();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();

  echo '<!DOCTYPE html>';
  echo '<html lang="ru">';
  echo '<head>';
  
    $statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
    $header->headStart('<title>образец стилей</title>');
    $header->headBootStrap5([$poisk->searcNamePath('styli.css'),$poisk->searcNamePath('dfdx.css')]);
  
  echo '</head>';
  echo '<body>';

// функция создает переменные сессий при первом посещении страницы
// funkcja tworzy zmienne sesji przy pierwszej wizycie na stronie
// function creates session variables on first visit to the page
$header->firstCreationSessionVariables();

// Функция проверяет поля логина и пароля, если они заполнены, то вытягивает из базы статус 
// пользователя и заносит его в переменную $_SESSION["status"]
// Также функция обрабатывает нажатие кнопки Вход и Выход
   
// Funkcja sprawdza pola login i hasło, czy są wypełnione, a następnie pobiera status 
// użytkownika z bazy danych i wpisuje go do zmiennej $_SESSION["status"]
// Funkcja obsługuje również naciśnięcie klawisza Enter i Exit

// The function checks the login and password fields, if they are filled, then pulls the user status 
// from the database and enters it into the $_SESSION["status"] variable
// Also, the function handles the button press Enter and Exit
$header->checkUserStatus();



echo '<section class="container-fluid">';
echo '<div class="row">';
// функция скачивает и показывает колличество монет у пользователя
// Modul $redaktor сигнатура класса работы с админкой
// funkcja pobiera i pokazuje liczbę monet, które posiada użytkownik
// Podpis klasy administratora modułu $redaktor
// the function downloads and shows the number of coins the user has
// Modul $redaktor admin class signature
$header->showNumberOfCoins(new Modul);

// Функция реализует установку и обработку верхнего главного меню
// Funkcja realizuje ustawienia i przetwarzanie w górnym menu głównym
// The function implements the setting and processing of the top main menu
$header->topMenuProcessing();
echo '</div>';
echo '</section>';
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
    $futter->futterGeneral($statistik,'obrazec');
    $futter->closeHtmlDok();
