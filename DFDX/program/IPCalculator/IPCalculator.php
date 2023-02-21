<?php
namespace program\IPCalculator;

//файл сгенерирован CMS-DFDX 2022-03-20 19:06:45
//file generated CMS-DFDX 2022-03-20 19:06:45
session_start();
require "../../funcii.php";
require "../../functionDfdx.php";
require "../../image/swapImages.php";
require "../../class.php";

use \class\redaktor\Modul;
use \class\redaktor\statistic;
use \class\redaktor\Header;
use \class\redaktor\futter;
use \class\redaktor\NonTemplates;
use \program\IPCalculator\src\ClassIPCalculator;

  $redaktor= new Modul();
  $statistik = new statistic();
  $header = new Header();
  $futter = new futter();
  $nonTemplates = new NonTemplates();
  $ipCalculator = new ClassIPCalculator();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  $statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ'); 
  $header->headStart('<title>ipCalculator</title>');
  $header->headBootStrap5([\class\nonBD\SearchPathFromFile::createObj()->searchPath('styli.css'),\class\nonBD\SearchPathFromFile::createObj()->searchPath('dfdx.css'),\class\nonBD\SearchPathFromFile::createObj()->searchPath('styliipCalculator.css')]);
  //$header->headBootStrap5([$header->searcNamePath('styli.css'),$header->searcNamePath('dfdx.css')]);

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

// Функция выводит картинку шапки
// Funkcja wyświetla obraz nagłówka
// The function displays the header image
$header->showSiteHeader('../../image/logo.png');

 // Функция показывает раздел сайта под шапкой, либо, если это статья по персональной ссылке, то бегущую строку названия статьи
 // Если картинки нет для раздела, то так-же будет выведена бегущая строка раздела сайта
 // Funkcja wyświetla sekcję witryny pod nagłówkiem lub, jeśli jest to artykuł za pośrednictwem osobistego linku, przewijany wiersz tytułu artykułu
 // Jeśli nie ma obrazu dla sekcji, zostanie również wyświetlony bieżący wiersz sekcji witryny
 // The function shows the section of the site under the header, or, if this is an article via a personal link, then the scrolling line of the article title
 // If there is no picture for the section, then the running line of the site section will also be displayed
 $header->showSiteSection('../../image/home.png','ipCalculator');   

echo '<section class="container-fluid">';
echo '<div class="row">';

// блок для вывода левого меню
// blok wyświetlania lewego menu
// block for displaying the left menu
$nonTemplates->leftMenu();

// имя таблица со статьями для функции news1
// nazwa tabeli z artykułami dla funkcji news1
// table name with articles for news1 function
$nameBD='bd2';
$nameBD='nameTD='.$nameBD;

//метка для счётчика статистики посещения конкретной страницы
//etykieta licznika statystyk odwiedzin na określonej stronie
//label for the statistics counter of visits to a specific page
$metka="ipCalculator"; //метка для счётчика статистики посещения конкретной страницы

echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12">';  // Центр
// Запуск объекта, который определяет бизнес логику данной страницы
// Uruchom obiekt, który definiuje logikę biznesową tej strony
// Run an object that defines the business logic of this page
$ipCalculator->businesIPCalculator();
echo '</div>'; //закрыть центр

//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
//buttonTwitter

echo '</div>';
echo '</section>';
// Функция выводит нижнюю часть сайта
// The function displays the bottom of the site
$futter->futterGeneral($statistik,$metka);

// функция подключает вторую часть бутстрапа и закрывает документ html
// the function connects the second part of the bootstrap and closes the html document
$futter->closeHtmlDok();
