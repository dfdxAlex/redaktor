<?php
namespace class\redaktor;

session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";

use \class\rare_use\class\ClassRegularTest;

  $class = new statistic();
  $redaktor= new Modul();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();
  $testRegular = new ClassRegularTest();


  echo '<!DOCTYPE html>';
  echo '<html lang="ru">';
  echo '<head>';
  
    $class->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
    $header->headStart('<title>Регулярные выражения</title>');
    $header->headBootStrap5([\class\nonBD\SearchPathFromFile::createObj()->searchPath('styli.css'),\class\nonBD\SearchPathFromFile::createObj()->searchPath('dfdx.css')]);
  
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
$header->showNumberOfCoins($redaktor);

// Функция реализует установку и обработку верхнего главного меню
// Funkcja realizuje ustawienia i przetwarzanie w górnym menu głównym
// The function implements the setting and processing of the top main menu
$header->topMenuProcessing();
echo '</div>';
echo '</section>';

////////////////////////////Начало основного кода страницы//////////////////////////  
///////////////////////////////////////////////////////////////////////////////////////////////////// Шапка
echo '  <img src="image/logo.png" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>';
 //////////////////////////////////////////////////////////////////////////////////////////////////
 // Функция показывает раздел сайта под шапкой, либо, если это статья по персональной ссылке, то бегущую строку названия статьи
 // Если картинки нет для раздела, то так-же будет выведена бегущая строка раздела сайта
 // Funkcja wyświetla sekcję witryny pod nagłówkiem lub, jeśli jest to artykuł za pośrednictwem osobistego linku, przewijany wiersz tytułu artykułu
 // Jeśli nie ma obrazu dla sekcji, zostanie również wyświetlony bieżący wiersz sekcji witryny
 // The function shows the section of the site under the header, or, if this is an article via a personal link, then the scrolling line of the article title
 // If there is no picture for the section, then the running line of the site section will also be displayed
 $header->showSiteSection('image/regular_expressions.png','regular_expressions');   
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////ловим кнопку правой панели///////////////////////////////////////////////////////////////

$statiaPoId=$class->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
///////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<section class="container-fluid">';
echo '<div class="row">';

// блок для вывода левого меню
// blok wyświetlania lewego menu
// block for displaying the left menu
$nonTemplates->leftMenu();
////////////////////////////////////////////Центр//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12 display-block">';
if ($statiaPoId=='netKnopki') // если не было нажато правое меню
if (!isset($_POST['poisk']) || isset($_POST['selectFunctionPhp'])) {// Выводим работу с регулярными выражениями только если не было нажатой кнопки Поиск
  if (!isset($_SESSION['name_function_test'])) $_SESSION['name_function_test']='preg_filter()';

    //Функция рисует форму выбора нужной функции. Комуникация производится через массив POST
    //Funkcja rysuje formularz wyboru żądanej funkcji. Komunikacja odbywa się za pośrednictwem tablicy POST
    //Function draws the form for selecting the desired function. Communication is done through the POST array  
    $testRegular->featureSelectionForm();

///////////////////////////////////////////////////////////////////////////
if (isset($_POST['selectFunctionPhp']) &&  isset($_POST['functionPhp']) 
  || (isset($_POST['buttonPregQuote'])) || (isset($_POST['buttonPregGrep']))) {//если нажимали кнопку выбора функции и есть выбранная функция, то заходим в раздел работы с конкретной функцией

    // работа с тестированием функции preg_replace_callback_array()
    // praca z testowaniem funkcji preg_replace_callback_array()
    // work with testing the function preg_replace_callback_array()
    $testRegular->pregReplaceCallbackArray();

    // работа с тестированием функции preg_replace_callback()
    // praca z testowaniem funkcji preg_replace_callback()
    // work with testing the function preg_replace_callback()
    $testRegular->pregReplaceCallback();

    // работа с тестированием функции preg_replace()
    // praca z testowaniem funkcji preg_replace()
    // work with testing the function preg_replace()
    $testRegular->pregReplace();

    // работа с тестированием функции preg_split()
    // praca z testowaniem funkcji preg_split()
    // work with testing the function preg_split()
    $testRegular->pregSplit();

    // работа с тестированием функции preg_match_all()
    // praca z testowaniem funkcji preg_match_all()
    // work with testing the function preg_match_all()
    $testRegular->pregMatchAll();

    // работа с тестированием функции preg_match()
    // praca z testowaniem funkcji preg_match()
    // work with testing the function preg_match()
    $testRegular->pregMatch(); 

    // работа с тестированием функции preg_grep()
    // praca z testowaniem funkcji preg_grep()
    // work with testing the function preg_grep()
    $testRegular->pregGrep(); 

    // работа с тестированием функции preg_filter()
    // praca z testowaniem funkcji preg_filter()
    // work with testing the function preg_filter()
    $testRegular->pregFilter();  

    // работа с тестированием функции preg_quote()
    // praca z testowaniem funkcji preg_quote()
    // work with testing the function preg_quote()
    $testRegular->pregQuote(); 

  }  // Конец Нажата кнопка выбора функции
}// Конец работы с регулярными выражениями

 //////////////////////////////////////////работа с выводом статей
$bylPoisk=false;

if (isset($_POST['poisk'])) { 
  $class->poiskStati('bd2',$_POST['strPoisk'],$idStati,'категория-regular') ;
  if ($idStati[0]>-1)
    foreach($idStati as $value) 
     $redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','id='.$value);
  $bylPoisk=true;
 }

  if (!$bylPoisk) {
      if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
      $redaktor->news1("id=".$statiaPoId,"nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','Раздел=regular');
    }
$nonTemplates->buttonTwitter('Тестирование функции (php) '.$_SESSION['name_function_test'].'http://dfdx.uxp.ru/regular_expressions.php');
 echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////

// функция отображает правое меню вместе со своей частью разметки Бутстрапа и функцией поиска по сайту
// the function displays the right menu along with its part of the Bootstrap markup and the site search function
$nonTemplates->rightMenu($class,'regular');
echo '</div>';
echo '</section>';

// Функция выводит нижнюю часть сайта
// The function displays the bottom of the site
$futter->futterGeneral($class,'regular');

// функция подключает вторую часть бутстрапа и закрывает документ html
// the function connects the second part of the bootstrap and closes the html document
$futter->closeHtmlDok();
