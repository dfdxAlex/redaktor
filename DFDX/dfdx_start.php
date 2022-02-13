<?php
namespace class\redaktor;

#файл сгенерировать#
#file generated#
session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";

  $redaktor=new Modul();
  $poisk = new poisk();
  $statistik = new statistic();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  $statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
  $header->headStart('#title#');
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

if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) $_SESSION["status"]=$poisk->statusRegi($_SESSION["login"],$_SESSION["parol"]);

// Функция реализует установку и обработку верхнего главного меню
// Funkcja realizuje ustawienia i przetwarzanie w górnym menu głównym
// The function implements the setting and processing of the top main menu
$header->topMenuProcessing();

////////////////////////////Начало основного кода страницы//////////////////////////  
/////////////////////////////////////////////////// Шапка
echo '  <img src="image/logo.png" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>';
 //////////////////////////////////////////////////////////////////////////////////////////////////
 // Функция показывает раздел сайта под шапкой, либо, если это статья по персональной ссылке, то бегущую строку названия статьи
 // Если картинки нет для раздела, то так-же будет выведена бегущая строка раздела сайта
 // Funkcja wyświetla sekcję witryny pod nagłówkiem lub, jeśli jest to artykuł za pośrednictwem osobistego linku, przewijany wiersz tytułu artykułu
 // Jeśli nie ma obrazu dla sekcji, zostanie również wyświetlony bieżący wiersz sekcji witryny
 // The function shows the section of the site under the header, or, if this is an article via a personal link, then the scrolling line of the article title
 // If there is no picture for the section, then the running line of the site section will also be displayed
 $header->showSiteSection('image/home.png','#pagetitleimages#');   

echo '<section class="container-fluid">';
echo '<div class="row">';

// блок для вывода левого меню
// blok wyświetlania lewego menu
// block for displaying the left menu
$nonTemplates->leftMenu();
////////////////////////////////////////////Центр//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////


// имя таблица со статьями для функции news1
// nazwa tabeli z artykułami dla funkcji news1
// table name with articles for news1 function
$nameBD='#таблица для поиска#';
$nameBD='nameTD='.$nameBD;

//метка для счётчика статистики посещения конкретной страницы
//etykieta licznika statystyk odwiedzin na określonej stronie
//label for the statistics counter of visits to a specific page
$metka='dfdx'; //метка для счётчика статистики посещения конкретной страницы

// функция управляет выводом статей в разных режимах используя функцию news1
// funkcja steruje wyświetlaniem artykułów w różnych trybach za pomocą funkcji news1
// the function controls the output of articles in different modes using the news1 function
$nonTemplates->publishNews($redaktor,'action=dfdx.php','Число_статей=5',-1,$nameBD,'#категория для поиска#','Раздел=regular_expressions');

//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
//buttonTwitter

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
