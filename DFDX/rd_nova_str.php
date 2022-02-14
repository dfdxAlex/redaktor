<?php 
namespace class\redaktor;

session_start();

include 'funcii.php';
include 'class.php';
$class = new Modul();  
$stat = new  statistic();
$poisk = new poisk();
$header = new Header();
$futter = new futter();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  $stat->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
  $header->headStart('<title>Редактор новой страницы</title>');
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

echo '<a name="vverh">';

echo '<section class="container-fluid">';
echo '<div class="row">';
// функция скачивает и показывает колличество монет у пользователя
// Modul $redaktor сигнатура класса работы с админкой
// funkcja pobiera i pokazuje liczbę monet, które posiada użytkownik
// Podpis klasy administratora modułu $redaktor
// the function downloads and shows the number of coins the user has
// Modul $redaktor admin class signature
$header->showNumberOfCoins($class);

// Функция реализует установку и обработку верхнего главного меню
// Funkcja realizuje ustawienia i przetwarzanie w górnym menu głównym
// The function implements the setting and processing of the top main menu
$header->topMenuProcessing();
echo '</div>';
echo '</section>';

$_SESSION['variantNowaStr']=0;

if (isset($_POST['variantNowaStr']) 
    && $_POST['variantNowaStr']=='Пустая страница для редактора DFDX, только необходимая разметка.')
        $_SESSION['variantNowaStr']=1;

if (isset($_POST['variantNowaStr']) 
    && $_POST['variantNowaStr']=='Пустая страница для сайта, только необходимая разметка.')
        $_SESSION['variantNowaStr']=2;

// меню выбора типа страницы nastrNowaStranica.php
if ($_SESSION['variantNowaStr']==0)
    $poisk->formBlock(
        'nastrNovStranic',
        'rd_nova_str.php',
        'text',                           
        'nameFile', 
        'Введите имя файла страницы.',
        'br',
         3,
        'submit',                          
        'variantNowaStr',
        'Пустая страница для редактора DFDX, только необходимая разметка.',
        'br',
        'submit',                          
        'variantNowaStr',
        'Пустая страница для сайта, только необходимая разметка.'
);

if ($_SESSION['variantNowaStr']==2) {// Нажата кнопка ...Пустая страница для редактора DFDX, только необходимая разметка.
    $nameFileNotPhp=$_POST['nameFile'];
    $nameCategori=$nameFileNotPhp;
    $nameCategori=preg_replace('/[^\d\w]/','',$nameCategori,-1);
    $nameMetka=$nameFileNotPhp;


     
  if ($class->numberNews($nameCategori)>0) $nameCategori='Задайте категорию вручную';
  if ($stat->getMetkaStatistik($nameMetka)>0) $nameMetka='Задайте метку счётчика для страницы';

     // проверим есть ли в названии файла .php, если нет, то добавить
     if (stripos($_POST['nameFile'],'.php')>0) $_SESSION['nameFile']=$_POST['nameFile'];
     else $_SESSION['nameFile']=$_POST['nameFile'].'.php';

   echo '<section class="container">';
   echo '<div class="row">';
   echo '<div class="col-1">';
   echo '</div>';
   echo '<div class="col-10">';
   echo '<p class="mesage">Данная опция создает файл - стартовую страницу для Вашего сайта.</p>';
   echo '<p class="mesage">В начале файла будут стартовые настройки для html.</p>';
   echo '<p class="mesage">Подключен Bootstrap 5.</p>';
   echo '<p class="mesage">Установлено верхнее меню.</p>';
   echo '<p class="mesage">Заданы необходимые изменения в странице шаблона, для этого необходимо ввести дополнительные данные.</p>';
   echo '<br>';
   echo '<form method="POST">';
   echo '<p class="mesage">В поле ниже путь к картинке-шапке</p>';
   echo '<input type="text" class="pole-dop-inf-rdNovaStr" name="images-hapka-rdNovaStr" value="image/logo.png"><br><br>';
   echo '<p class="mesage">В поле ниже путь к картинке-заголовку, описывающую тематику раздела</p>';
   echo '<input type="text" class="pole-dop-inf-rdNovaStr" name="images-tema-kategirii-rdNovaStr"  value="image/html.png"><br><br>';
   echo '<p class="mesage">В поле ниже категория статей, согласно этой категории в правом меню будут кнопки со статьями.</p>';
   echo '<input type="text" class="pole-dop-inf-rdNovaStr" name="kategoria-news-rdNovaStr" value="'.$nameCategori.'"><br><br>';
   echo '<p class="mesage">В поле ниже задайте метку для счётчика посещений.</p>';
   echo '<input type="text" class="pole-dop-inf-rdNovaStr" name="metka-rdNovaStr" value="'.$nameMetka.'"><br><br>';
   echo '<button class="generaciaStr btn" formaction="nastrNowaStranica.php" >Ok</button>';
   echo '<button class="generaciaStr btn"formaction="rdNovaStr.php" >Вернуться</button>';
   echo '</form>';
   echo '</div>';
   echo '<div class="col-1">';
   echo '</div>'; 
   
}

if ($_SESSION['variantNowaStr']==1) {// Нажата кнопка ...Пустая страница для редактора DFDX, только необходимая разметка.
     // проверим есть ли в названии файла .php, если нет, то добавить
     if (stripos($_POST['nameFile'],'.php')>0) $_SESSION['nameFile']=$_POST['nameFile'];
     else $_SESSION['nameFile']=$_POST['nameFile'].'.php';

   echo '<section class="container">';
   echo '<div class="row">';
   echo '<div class="col-1">';
   echo '</div>';
   echo '<div class="col-10">';
   echo '<p class="mesage">Данная опция создает файл - стартовую страницу для редактора DFDX.</p>';
   echo '<p class="mesage">В начале файла будут стартовые настройки для html.</p>';
   echo '<p class="mesage">Подключен Bootstrap 5.</p>';
   echo '<p class="mesage">Установлено верхнее меню и настроена система Статусов.</p>';
   echo '<form method="POST">';
   echo '<button class="generaciaStr btn" formaction="nastrNowaStranica.php" >Ok</button>';
   echo '<button class="generaciaStr btn"formaction="rdNovaStr.php" >Вернуться</button>';
   echo '</form>';
   echo '</div>';
   echo '<div class="col-1">';
   echo '</div>'; 
}


 $futter->futterGeneral($stat,'rdNowaStr');
 $futter->closeHtmlDok();

