<?php
declare(strict_types=1);
namespace class\redaktor;

#файл сгенерирован#
#file generated#
session_start();

require "funcii.php";
require "functionDfdx.php"; 

// подключение автозагрузчика от PHPMailer, библиотека инсталлирована с помощью Composer
// podłączenie autoloadera z PHPMailera, biblioteka jest instalowana za pomocą Composera
// connecting the autoloader from PHPMailer, the library is installed using Composer
//require "PHPMailer-6.5.4/PHPMailer-6.5.4/vendor/autoload.php";

// подключение автозагрузчика от SYMFONY, библиотека инсталлирована с помощью Composer
//require "symfony_api/vendor/autoload.php";

// загрузка классов по старой схеме используя автозагрузчик из PSR0
// ładowanie klas według starego schematu za pomocą autoloadera z PSR0
// loading classes according to the old scheme using the autoloader from PSR0
require "class.php";

  $redaktor=new Modul();
  $statistik = new statistic();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();

  // определяет будет ли функция domDom() проверять входные параметры функций, в которых она прописана
  //$_SESSION['domDom']=true;

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  /**
   * подключение статистики от google
   * connect statistics from google
   */
  new \class\classNew\analitic\GoogleAnalitic();
  
  $header->headStart('<title>dfdx</title>');

   /**  Объект по шаблону Singleton, ищет и хранит в себе путь к искомому файлу
   * Создать объект или вернуть ссылку на него.
   * Вторая строка запускает метод по поиску файла
   */
  $header->headBootStrap5([\class\nonBD\SearchPathFromFile::createObj()->searchPath('styli.css'),\class\nonBD\SearchPathFromFile::createObj()->searchPath('dfdx.css')]);

echo '</head>';
echo '<body>';

// функция создает переменные сессий при первом посещении страницы
// funkcja tworzy zmienne sesji przy pierwszej wizycie na stronie
// function creates session variables on first visit to the page
$header->firstCreationSessionVariables();

// функция обнуляет все режимы работы, если на страницу пришли из административной панели
// funkcja resetuje wszystkie tryby działania, jeśli strona była odwiedzana z panelu administratora
// the function resets all modes of operation if the page was visited from the admin panel
$header->resetOperatingMode();

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
//$_SESSION['status']=5;

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

// Функция выводит картинку шапки
// Funkcja wyświetla obraz nagłówka
// The function displays the header image  
$header->showSiteHeader('image/logo.png');
 
 // Функция показывает раздел сайта под шапкой, либо, если это статья по персональной ссылке, то бегущую строку названия статьи
 // Если картинки нет для раздела, то так-же будет выведена бегущая строка раздела сайта
 // The function shows the section of the site under the header, or, if this is an article via a personal link, then the scrolling line of the article title
 // If there is no picture for the section, then the running line of the site section will also be displayed
$header->showSiteSection('image/home.png','home');   

echo '<section class="container-fluid">
     <div class="row">
     <div class="col-12">';
//второе меню. В кнопки можно добавлять через массив добавляя пару Название=>ссылка
$header->menuOfOurProjects(array('Электронные визитки'=>'second_menu\elVisitka.php','Игры на PHP'=>'game\gamesOfPhp.php','Программы на PHP'=>'program\programToPHP.php'));
echo '</div>
      </div>
      </section>';

echo '<section class="container-fluid pole">';
echo '<div class="row">';

// блок для вывода левого меню
// blok wyświetlania lewego menu
// block for displaying the left menu
$nonTemplates->leftMenu();

//метка для счётчика статистики посещения конкретной страницы
//etykieta licznika statystyk odwiedzin na określonej stronie
//label for the statistics counter of visits to a specific page
$metka='dfdx'; 

// имя таблица со статьями для функции news1
// nazwa tabeli z artykułami dla funkcji news1
// table name with articles for news1 function
$nameBD='bd2';
$nameBD='nameTD='.$nameBD;

// функция управляет выводом статей в разных режимах используя функцию news1
// funkcja steruje wyświetlaniem artykułów w różnych trybach za pomocą funkcji news1
// the function controls the output of articles in different modes using the news1 function
$nonTemplates->publishNews($redaktor,'action=dfdx.php','Число_статей=5',-1,$nameBD,'#категория для поиска#','Раздел=regular_expressions','buttonTwitter');
//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
//button-Twitter

//Служебная переменная
$_SESSION["runStrNews"]=false; // обнуление переменной

// функция отображает правое меню вместе со своей частью разметки Бутстрапа и функцией поиска по сайту
// the function displays the right menu along with its part of the Bootstrap markup and the site search function
$nonTemplates->rightMenu($statistik,"home",20);
echo '</div>';
echo '</section>';

// Функция выводит нижнюю часть сайта
// The function displays the bottom of the site
// $futter->futterGeneral($statistik,$metka);
new \class\classNew\futter\FutterGeneral($metka);

// функция подключает вторую часть бутстрапа и закрывает документ html
// the function connects the second part of the bootstrap and closes the html document
$futter->closeHtmlDok();

