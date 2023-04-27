<?php
namespace game\tic_tac_toe;

//файл сгенерирован CMS-DFDX 2022-03-20 19:06:45
//file generated CMS-DFDX 2022-03-20 19:06:45
session_start();

// require "../../funcii.php";
// require "../../functionDfdx.php";

require "../../class.php";

use \class\redaktor as libr;

$redaktor= new libr\Modul();
$statistik = new libr\statistic();
$header = new libr\Header();
$futter = new libr\futter();
$nonTemplates = new libr\NonTemplates();

$gameF = new ClassGameTicTacToe();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  /**
   * подключение статистики от google
   * connect statistics from google
   */
  new \class\classNew\analitic\GoogleAnalitic();

  $header->headStart('<title>tic_tac_toe</title>');

  /**
   * поиск файла с общими стилями
   * search for a file with common styles
   */
  $fileStyle = \class\nonBD\SearchPathFromFile::createObj()
                            ->searchPath('styli.css');
  /**
   * поиск главной страницы сайта
   * home page search
   */
  $fileDfdx = \class\nonBD\SearchPathFromFile::createObj()
                           ->searchPath('dfdx.css');
  /**
   * поиск файла стилей игры
   * search for game style file
   */
  $fileStyleGame = \class\nonBD\SearchPathFromFile::createObj()
                                ->searchPath('styliGame.css');

  $header->headBootStrap5([$fileStyle, $fileDfdx,$fileStyleGame]);


echo '</head>';
echo '<body>';

// функция создает переменные сессий при первом посещении страницы
// function creates session variables on first visit to the page
$header->firstCreationSessionVariables();

// Функция проверяет поля логина и пароля, если они заполнены, то вытягивает из базы статус 
// пользователя и заносит его в переменную $_SESSION["status"]
// Также функция обрабатывает нажатие кнопки Вход и Выход

// The function checks the login and password fields, if they are filled, then pulls the user status 
// from the database and enters it into the $_SESSION["status"] variable
// Also, the function handles the button press Enter and Exit
$header->checkUserStatus();

echo '<section class="container-fluid">';
echo '<div class="row">';
// функция скачивает и показывает колличество монет у пользователя
// Modul $redaktor сигнатура класса работы с админкой

// the function downloads and shows the number of coins the user has
// Modul $redaktor admin class signature
$header->showNumberOfCoins($redaktor);

// Функция реализует установку и обработку верхнего главного меню
// The function implements the setting and processing of the top main menu
$header->topMenuProcessing();
echo '</div>';
echo '</section>';

// Функция выводит картинку шапки
// The function displays the header image
$header->showSiteHeader('../../image/logo.png');

 // Функция показывает раздел сайта под шапкой, либо, если это статья по персональной ссылке, 
 // то бегущую строку названия статьи
 // Если картинки нет для раздела, то так-же будет выведена бегущая строка раздела сайта
 // The function shows the section of the site under the header, or, 
 // if this is an article via a personal link, then the scrolling line of the article title
 // If there is no picture for the section, then the running line of the site section will 
 // also be displayed
 $header->showSiteSection('../../image/home.png','tictactoe');   

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
$metka="tic_tac_toe"; //метка для счётчика статистики посещения конкретной страницы

// функция управляет выводом статей в разных режимах используя функцию news1
// funkcja steruje wyświetlaniem artykułów w różnych trybach za pomocą funkcji news1
// the function controls the output of articles in different modes using the news1 function
//$nonTemplates->publishNews($redaktor,'action=tic_tac_toe.php','Число_статей=5',-1,$nameBD,'категория-tic_tac_toe','Раздел=tictactoe','buttonTwitter');

echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12">';  // Центр
// функция начальных установок
$gameF->pickSide();
echo '</div>'; //закрыть центр

//Закоментированная строка внизу заменяется на кнопку твиттера в сгенерированных статьях    
//The commented out line at the bottom is replaced with a twitter button in generated articles 
//buttonTwitter

// функция отображает правое меню вместе со своей частью разметки Бутстрапа и функцией поиска по сайту
// the function displays the right menu along with its part of the Bootstrap markup and the site search function
//$nonTemplates->rightMenu($statistik,"home");
echo '</div>';
echo '</section>';
// Функция выводит нижнюю часть сайта
// The function displays the bottom of the site
$futter->futterGeneral($statistik,$metka);

// функция подключает вторую часть бутстрапа и закрывает документ html
// the function connects the second part of the bootstrap and closes the html document
$futter->closeHtmlDok();
