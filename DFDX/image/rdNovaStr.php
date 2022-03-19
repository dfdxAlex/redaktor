<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MF3F7YTKCQ');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
    <title>RedaktorBD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styli.css">
    <meta name="Cache-Control" content="no-store">
</head>
<body>
<?php

if (!isset($_SESSION['resetNameTable'])) $_SESSION['resetNameTable']=false;
if (!isset($_SESSION['regimRaboty'])) $_SESSION['regimRaboty']=0;
if (!isset($_SESSION['status'])) $_SESSION['status']=0;
if (!isset($_SESSION['sSajta'])) $_SESSION['sSajta']=false;
include 'funcii.php';
//include 'class.php';
include 'classInstrument.php';

$class = new redaktor\statistic();
$status = new redaktor\login();
$maty = new redaktor\maty();



if (isset($_SESSION['login']) && isset($_SESSION['parol'])) $_SESSION['status']=$status->statusRegi($_SESSION['login'],$_SESSION['parol']);
if ($_SESSION['status']>99) $_SESSION['status']=9;
?>
<a name="vverh">
   
      <?php 
      $menuUp = new redaktor\menu(); 
      if ($_SESSION['status']>99 || $_SESSION['status']==9)
       $menuUp->__unserialize(array('menu6','podtverdit','redaktor.php','Введите код'));

      if ($_SESSION['status']==5 || $_SESSION['status']==4)
         $menuUp->__unserialize(array('menu3','redaktor_up','Редактор','Сайт','Выйти','Создать страницу'));

      if ($_SESSION['status']==0)
       $menuUp->__unserialize(array('menu4','login','redaktor.php','Логин','Пароль','Вход','Регистрация'));

       if ($_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3)
         $menuUp->menu('dla_statusob_123');
      
      if (isset($_SESSION['status']) && $_SESSION['status']>0)
        echo '<h6>Вы вошли под логином: '.$_SESSION['login'].'</h6>';
        else {
            echo '<h6 class="mesage">Доброго времени суток. Вы попали в админ. панель движка dfdx. Выберите продолжение регистрации или войдите под своим логином и паролем.</h6>';
            echo '<h6 class="mesage">Так-же Вы всегда можете вернуться на сайт нажав на кнопку "На сайт"</h6>';
        }
      ?>

<?php

$_SESSION['variantNowaStr']=0;

if (isset($_POST['variantNowaStr']) && $_POST['variantNowaStr']=='Пустая страница для редактора DFDX, только необходимая разметка.')
 $_SESSION['variantNowaStr']=1;

if (isset($_POST['variantNowaStr']) && $_POST['variantNowaStr']=='Пустая страница для сайта, только необходимая разметка.')
 $_SESSION['variantNowaStr']=2;

// меню выбора типа страницы nastrNowaStranica.php
if ($_SESSION['variantNowaStr']==0)
$maty->formBlock(
  'nastrNovStranic',
  'rdNovaStr.php',
  'text',                          //class="nastrNovStranicnameFile0"
  'nameFile', 
  'Введите имя файла страницы.',
  'br',
   3,
  'submit',                         //class="nastrNovStranicvariantNowaStr5"
  'variantNowaStr',
  'Пустая страница для редактора DFDX, только необходимая разметка.',
  'br',
  'submit',                         //class="nastrNovStranicvariantNowaStr9"
  'variantNowaStr',
  'Пустая страница для сайта, только необходимая разметка.'
);

if ($_SESSION['variantNowaStr']==2) // Нажата кнопка ...Пустая страница для редактора DFDX, только необходимая разметка.
{
  $nameFileNotPhp=$_POST['nameFile'];
  $nameCategori=$nameFileNotPhp;
  //$nameCategori=preg_replace('/\c/','',$nameCategori,-1);
  //$nameCategori=preg_replace('/\s/','',$nameCategori,-1);
  $nameCategori=preg_replace('/[^\d\w]/','',$nameCategori,-1);
  $nameMetka=$nameFileNotPhp;

  $instrum = new redaktor\modul(); //
  $stat = new redaktor\statistic();
     
  if ($instrum->numberNews($nameCategori)>0) $nameCategori='Задайте категорию вручную';
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

if ($_SESSION['variantNowaStr']==1) // Нажата кнопка ...Пустая страница для редактора DFDX, только необходимая разметка.
{

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



/// Статистика///////////////////////////////////////
  if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
    {
      $statistik = new redaktor\statistic();
      $statistik->statistikOnOff();
    }

  if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
       $maty->redactMaty();
?>

</div>
</div>

<?php
 $class->metkaStatistika('rdNowaStr');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

