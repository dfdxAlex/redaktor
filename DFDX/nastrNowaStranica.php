<?php
declare(strict_types=1);
namespace class\redaktor;

session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";

$class = new statistic();
$redaktor=new Modul();
$poisk = new poisk();
$header = new Header();
$futter = new futter();

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';

  $class->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
  $header->headStart('<title>Генерация новой страницы</title>');
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

echo '<a name="vverh">';
   
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


$errorName=true;
$nameFile='';
$fileUgeJest=true;
$nameStranic='';
$_SESSION['nameNotPhp']='';
$_SESSION['nameFilePreg']='';
if (!isset($_SESSION['newsTab'])) $_SESSION['newsTab']='bd2';
// проверить ввели ли имя нового файла, значение переменной приходит со страницы rdNovaStr.php и означает, что стадия задания имени файла прошла успешно.
if ($_SESSION['variantNowaStr']==1 || $_SESSION['variantNowaStr']==2) $errorName=false;

if ($errorName) echo 'Имя файла не удовлетворяет условию';

if (!$errorName)
 {
  $_SESSION['nameNotPhp']=$_POST['images-tema-kategirii-rdNovaStr'];

    $_SESSION['nameNotPhp']=preg_replace('/\..*$/','',$_SESSION['nameNotPhp']); // очищаем имя файла от расширения
    $_SESSION['nameNotPhp']=preg_replace('/.*\//','',$_SESSION['nameNotPhp']); // очищаем имя файла от расширения

     // проверим есть ли в названии файла .php, если нет, то добавить
     if (stripos($_SESSION['nameFile'],'.php')>0) 
          $nameFile=$_SESSION['nameFile'];
        else $nameFile=$_SESSION['nameFile'].'.php';
     $nameStranic=preg_replace('/.php/','',$nameFile);
     // проверить существование файла
     $fileUgeJest=file_exists ($nameFile);
     $_SESSION['nameFilePreg']=$nameFile;
     echo '<br>';
     echo '<form action='.$nameFile.'>';
     echo '<input type="submit" value="Перейти на новую страницу">';
     echo '</form>';
 }

 if ($fileUgeJest) echo '<p class="error">Файл '.$nameFile.' уже существует!</p>';

 if (!$fileUgeJest && $_SESSION['variantNowaStr']==2)   // Если всё в порядке, то создаем страницу
  if ($nameFile!='') 
   {
    $fileStart=file_get_contents('dfdx_start.php',true,null,0); // проситали файл в строку
    if ($fileStart!==false)
     { 
      // преобразовываем файл image/logo.png
      $fileStart=preg_replace_callback_array([
                                              '/image\/logo\.png/' => function ($machh) {return $_POST['images-hapka-rdNovaStr'];},
                                              '/image\/regular_expressions\.png/' => function ($machh) {return $_POST['images-tema-kategirii-rdNovaStr'];},
                                              '/alt=\"regular_expressions/' => function ($machh) {return 'alt="'.$_SESSION['nameNotPhp'];},
                                              '/poiskDfdx\(\'cms_dfdx\.php\'\)/' => function ($machh) {return 'poiskDfdx("'.$_SESSION['nameFilePreg'].'")';},
                                              '/pravoePole\(\'cms-dfdx\'\)/' => function ($machh) {return 'pravoePole("'.$_POST['kategoria-news-rdNovaStr'].'")';},
                                              '/\$metka=\'dfdx\'/' => function ($machh) {return '$metka="'.$_POST['metka-rdNovaStr'].'"';},
                                              '/action=dfdx\.php/' => function ($machh) {return 'action='.$_SESSION['nameFilePreg'];},
                                              '/bd2/' => function ($machh) {return $_SESSION['newsTab'];},
                                              '/\#pagetitleimages\#/' => function ($machh) {return $_POST['kategoria-news-rdNovaStr'];},
                                              '/Раздел=regular_expressions/' => function ($machh) {return 'Раздел='.$_POST['kategoria-news-rdNovaStr'];},
                                              '/#таблица\sдля\sпоиска#/' => function ($machh) {return 'bd2';},
                                              '/#категория\sдля\sпоиска#/' => function ($machh) {return 'категория-'.$_POST['kategoria-news-rdNovaStr'];},
                                              '/#title#/' => function ($machh) {return '<title>'.$_SESSION['nameNotPhp'].'</title>';},
                                              '/#файл\sсгенерировать#/' => function ($machh) {return '//файл сгенерирован CMS-DFDX '.date('Y-m-d H:i:s');},
                                              '/#file\sgenerated#/' => function ($machh) {return '//file generated CMS-DFDX '.date('Y-m-d H:i:s');},
                                              ]
                                              ,$fileStart);
      //////////////////////
      $saweRez=file_put_contents($nameFile,$fileStart,LOCK_EX);
      if ($saweRez!==false) echo 'Записано '.$saweRez.' байт<br>'; //$_SESSION['newsTab'] title>regular_expressions</title
        else 'Страница не создана!';
     }
   }

 if (!$fileUgeJest && $_SESSION['variantNowaStr']==1)   // Если всё в порядке, то создаем страницу
  if ($nameFile!='') 
   {
     echo '<p class="mesage">Создаю страницу '.$nameFile.'</p>';
     $fp = fopen($nameFile, "w");//поэтому используем режим 'w' 
     fwrite($fp, '<?php session_start(); ?>'."\r\n");
     fwrite($fp, '<!DOCTYPE html>'."\r\n");
     fwrite($fp, '<html lang="ru">'."\r\n");
     fwrite($fp, '<head>'."\r\n");
     fwrite($fp, '<meta charset="UTF-8">'."\r\n");
     fwrite($fp, '<meta name="viewport" content="width=device-width, initial-scale=1.0">'."\r\n");
     fwrite($fp, '<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">'."\r\n");
     fwrite($fp, '<title>'.$nameStranic.'</title>'."\r\n");
     fwrite($fp, '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">'."\r\n");
     fwrite($fp, '<link rel="stylesheet" href="styli.css">'."\r\n");
     fwrite($fp, '<meta name="Cache-Control" content="no-store">'."\r\n");
     fwrite($fp, '</head>'."\r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, '<body>'."\r\n");
     fwrite($fp, '<?php'."\r\n");
     fwrite($fp, 'if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;'."\r\n");
     fwrite($fp, 'if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;'."\r\n");
     fwrite($fp, 'if (!isset($_SESSION["status"])) $_SESSION["status"]=0;'."\r\n");
     fwrite($fp, 'if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;'."\r\n");
     fwrite($fp, 'include "funcii.php";'."\r\n");
     fwrite($fp, 'include "functionDfdx.php";'."\r\n");
     fwrite($fp, '$class = new redaktor\statistic();'."\r\n");
     fwrite($fp, '$status = new redaktor\login();'."\r\n");
     fwrite($fp, '$maty = new redaktor\maty();'."\r\n");
     fwrite($fp, 'if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);'."\r\n");
     fwrite($fp, 'if ($_SESSION["status"]>99) $_SESSION["status"]=9;'."\r\n");
     fwrite($fp, ' $menuUp = new redaktor\menu();'."\r\n"); 
     fwrite($fp, '  if ($_SESSION["status"]>99 || $_SESSION["status"]==9)'."\r\n");
     fwrite($fp, '   $menuUp->__unserialize(array("menu6","podtverdit","redaktor.php","Введите код"));'."\r\n");
     fwrite($fp, ' if ($_SESSION["status"]==5 || $_SESSION["status"]==4)'."\r\n");
     fwrite($fp, '    $menuUp->__unserialize(array("menu3","redaktor_up","Редактор","Сайт","Выйти","Создать страницу"));'."\r\n");
     fwrite($fp, ' if ($_SESSION["status"]==0)'."\r\n");
     fwrite($fp, '  $menuUp->__unserialize(array("menu4","login","redaktor.php","Логин","Пароль","Вход","Регистрация"));'."\r\n");
     fwrite($fp, ' if ($_SESSION["status"]==1 || $_SESSION["status"]==2 || $_SESSION["status"]==3)'."\r\n");
     fwrite($fp, '    $menuUp->menu("dla_statusob_123");'."\r\n");
     fwrite($fp, 'if (isset($_SESSION["status"]) && $_SESSION["status"]>0)'."\r\n");
     fwrite($fp, '  echo "<h6>Вы вошли под логином: ".$_SESSION["login"]."</h6>";'."\r\n");
     fwrite($fp, '   else {'."\r\n");
     fwrite($fp, '      echo \'<h6 class="mesage">Доброго времени суток. Вы попали в админ. панель движка dfdx. Выберите продолжение регистрации или войдите под своим логином и паролем.</h6>\';'."\r\n");
     fwrite($fp, '      echo \'<h6 class="mesage">Так-же Вы всегда можете вернуться на сайт нажав на кнопку "На сайт"</h6>\';'."\r\n");
     fwrite($fp, "  }"."\r\n");
     fwrite($fp, '////////////////////////////Начало основного кода страницы//////////////////////////'." \r\n");
     fwrite($fp, '//////////////////////////////////////////////////////////////////////////////////////////////////'." \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, " \r\n");
     fwrite($fp, '//////////////////////////////////////////////////////////////////////////////////////////////////'." \r\n");
     fwrite($fp, '////////////////////////////Конец основного кода страницы//////////////////////////'." \r\n");
     fwrite($fp, '/// Статистика///////////////////////////////////////'."\r\n");
     fwrite($fp, 'if ($_SESSION[\'regimRaboty\']==22) // исполнение нажатия кнопки Статистика'."\r\n");
     fwrite($fp, '{'."\r\n");
      fwrite($fp, '$statistik = new redaktor\statistic();'."\r\n");
      fwrite($fp, '$statistik->statistikOnOff();'."\r\n");
      fwrite($fp, '}'."\r\n");
      fwrite($fp, 'if ($_SESSION[\'regimRaboty\']==21) //исполнение нажатия Маты'."\r\n");
      fwrite($fp, '$maty->redactMaty();'."\r\n");
      fwrite($fp, '?>'."\r\n");
      fwrite($fp, '</div>'."\r\n");
      fwrite($fp, '</div>'."\r\n");
      fwrite($fp, '<?php'."\r\n");
      fwrite($fp, '$class->metkaStatistika(\''.$nameStranic.'\');'."\r\n");
      fwrite($fp, '?>'."\r\n");
      fwrite($fp, '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>'."\r\n");
      fwrite($fp, '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>'."\r\n");
      fwrite($fp, '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>'."\r\n");
      fwrite($fp, '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>'."\r\n");
      fwrite($fp, '</body>'."\r\n");
      fwrite($fp, '</html>'."\r\n");
     fclose($fp); 
  }

/// Статистика///////////////////////////////////////
  if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
      $class->statistikOnOff();

  if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
       $poisk->redactMaty();

echo '</div>';
echo '</div>';

 $futter->futterGeneral($class,'nastrNowaStranica');
 $futter->closeHtmlDok();

