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


if (!isset($_SESSION['resetNameTable'])) $_SESSION['resetNameTable']=false;
if (!isset($_SESSION['regimRaboty'])) $_SESSION['regimRaboty']=0;
if (!isset($_SESSION['status'])) $_SESSION['status']=0;
if (!isset($_SESSION['sSajta'])) $_SESSION['sSajta']=false;

if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$poisk->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;
echo '<a name="vverh">';
      if ($_SESSION['status']>99 || $_SESSION['status']==9)
         $poisk->__unserialize(array('menu6','podtverdit','redaktor.php','Введите код'));

      if ($_SESSION['status']==5 || $_SESSION['status']==4)
         $poisk->__unserialize(array('menu3','redaktor_up','Редактор','Сайт','Выйти','Создать страницу','Подсветить меню'));

      if ($_SESSION['status']==0)
         $poisk->__unserialize(array('menu4','login','redaktor.php','Логин','Пароль','Вход','Регистрация'));

       if ($_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3)
         $poisk->menu('dla_statusob_123');
      
      if (isset($_SESSION['status']) && $_SESSION['status']>0)
        echo '<h6>Вы вошли под логином: '.$_SESSION['login'].'</h6>';
        else {
            echo '<h6 class="mesage">Доброго времени суток. Вы попали в админ. панель движка dfdx. Выберите продолжение регистрации или войдите под своим логином и паролем.</h6>';
            echo '<h6 class="mesage">Так-же Вы всегда можете вернуться на сайт нажав на кнопку "На сайт"</h6>';
        }

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

