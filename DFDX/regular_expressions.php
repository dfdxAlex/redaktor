<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">
<title>regular_expressions</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="styli.css">
<link rel="stylesheet" href="dfdx.css">
<meta name="Cache-Control" content="no-store">
</head>
 
 
<body>
<?php
//session_start();
if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;
include "funcii.php";
include "functionDfdx.php";

$status = new redaktor\login();
$maty = new redaktor\maty();

if ($_SESSION["status"]>99) $_SESSION["status"]=9;

////////////////////////////////////////////Верхнее меню///////////////////////////////////////////////////////   

///////////////////////////////////////////Обработка верхнего меню
if ($_SESSION["status"]>0)             // если есть какой-то статух входа на сайт
 if (isset($_POST['menu_up_dfdx']))    // если было нажатие любой кнопки верхнего меню
  if ($_POST['menu_up_dfdx']=='Выход') // Если была нажата кнопка Выход верхнего меню
   {
    $_SESSION["status"]=0;              // Обнуляем статус пользователя (выходим)
    $_SESSION["login"]='';
   }

if ($_SESSION["status"]==0)             // если пользователь не вошел
  if (isset($_POST['menu_up_dfdx']))    // если было нажатие любой кнопки верхнего меню
    if ($_POST['menu_up_dfdx']=='Вход') // Если была нажата кнопка Вход верхнего меню
      {
        $_SESSION["login"]=$_POST['login'];
        $_SESSION["parol"]=$_POST['parol'];
      }

if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);

$_SESSION['redaktiruem']="regular_expressions.php";
$maty->__unserialize('menu9','menu_up_dfdx',array('dfdx.php','Логин','Пароль'));
////////////////////////////Начало основного кода страницы//////////////////////////  
///////////////////////////////////////////////////////////////////////////////////////////////////// Шапка
echo '  <img src="image/logo.png" alt="Картинка должна называться image/hapka2.png размер 300 на 300"/>';
 //////////////////////////////////////////////////////////////////////////////////////////////////
// Раздел сайта показать
echo '<section class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-12">';
echo '<div class="logoHtml">';
echo '<img src="image/regular_expressions.png" alt="regular_expressions">';
echo '<hr>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////ловим кнопку правой панели///////////////////////////////////////////////////////////////
$redaktor=new redaktor\modul();
$statiaPoId=$maty->hanterButton("false=netKnopki","rez=hant","nameStatic=panelPrawa","returnNameDynamic");
///////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<section class="container-fluid">';
echo '<div class="row">';

echo '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12">';  // Левое меню
levoeMenu();
echo '</div>';

////////////////////////////////////////////Центр//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-8 col-12 display-block">';
if ($statiaPoId=='netKnopki') // если не было нажато правое меню
if (!isset($_POST['poisk']) || isset($_POST['selectFunctionPhp'])) // Выводим работу с регулярными выражениями только если не было нажатой кнопки Поиск
 {
    
//////////////////////////////////////форма выбора функции////////////////////////////////
echo '<section class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-12">';
   echo '<div class="regular-form-select-function">';
    echo '<form action="regular_expressions.php" method="post" >';

    echo '<p class="regular-select-p">На примере функций php</p>';

     echo '<div class="regular-select-select">';
      echo '<select name="functionPhp">';
        echo '<optgroup label="Выберите функцию php">';
          echo '<option>preg_filter()</option>';
          echo '<option>preg_preg()</option>';
          echo '<option>preg_match()</option>';
          echo '<option>preg_match_all()</option>';
          echo '<option>preg_quote()</option>';
          echo '<option>preg_replace_callback_array()</option>';
          echo '<option>preg_replace()</option>';
          echo '<option>preg_split()</option>';
        echo '</optgroup>';
        echo '</select>';
      echo '</div>';

    echo '<button name="selectFunctionPhp" class="select-function-php-button btn" value="Выбрать функцию">Выбрать</button>';

    echo '</form>';
    echo '</div>';
echo '</div>';
echo '</div>';
///////////////////////////////////////////////////////////////////////////
    if (isset($_POST['selectFunctionPhp']) &&  isset($_POST['functionPhp']) || (isset($_POST['buttonPregQuote']))  ) //если нажимали кнопку выбора функции и есть выбранная функция, то заходим в раздел работы с конкретной функцией
      {
        ////////////////////////////////////////////// работа с preg_filter ////////////////////////////////////////////////
      if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_filter()') || (isset($_POST['buttonPregQuote']) && $_SESSION['name_function_test']=='preg_filter()')  ) // preg_filter()
        {
          if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
          echo '<div class="row">';
          echo '<div class="col-12">';
           echo '<div class="working-with-the-function-p">';
            echo '<p><b>Работаем с preg_filter()</b></p>';
            echo '<p>Синтаксис:</p>';
            echo '<code><div class="kod3">';
            echo "<p>preg_filter(string|array \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; string|array \$replacement, //строка для замены <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; string|array \$subject, //входная строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$limit = -1, // максимальное число замен<br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int &\$count = null //содержит число замен <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;): string|array|null</p>";
            echo '</div></code>';
            echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '<div class="row">';
          echo '<div class="col-12">';
          if (!isset($_SESSION['result_regular_function'])) $_SESSION['result_regular_function']='Данных нет';
          // запоминаем данные с формы
          if (!isset($_SESSION['pattern'])) $_SESSION['pattern']='Введите регулярное выражение';
          if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 
          if (!isset($_SESSION['replacement'])) $_SESSION['replacement']='Введите выражение для замены';
          if (isset($_POST['replacement']) && $_POST['replacement']!='') $_SESSION['replacement']=$_POST['replacement']; 
          if (isset($_SESSION['replacement']) && $_SESSION['replacement']=="''") $_SESSION['replacement']='';
          if (isset($_SESSION['replacement']) && $_SESSION['replacement']=='""') $_SESSION['replacement']='';
          if (!isset($_SESSION['subjekt'])) $_SESSION['subjekt']='Входная строка';
          if (isset($_POST['subjekt']) && $_POST['subjekt']!='') $_SESSION['subjekt']=$_POST['subjekt']; 
          if (!isset($_SESSION['substitutions'])) $_SESSION['substitutions']='-1';
          if (isset($_POST['substitutions']) && $_POST['substitutions']!='') $_SESSION['substitutions']=$_POST['substitutions']; 
          $_SESSION['substitutions']=preg_replace('/[a-zA-Zа-яёА-Яё]/u','',$_SESSION['substitutions']); // Удалить все нецифры
          if ($_SESSION['substitutions']=='' || $_SESSION['substitutions']==' ')  $_SESSION['substitutions']=-1;
          if (!isset($_SESSION['substitutions_rez'])) $_SESSION['substitutions_rez']='0';
          if (isset($_POST['buttonPregQuote'])) // если была нажата кнопка Отработать
          {
           $pattern='/'.$_SESSION['pattern'].'/u';
           $_SESSION['result_regular_function']=preg_filter($pattern,$_SESSION['replacement'],$_SESSION['subjekt'],$_SESSION['substitutions'],$_SESSION['substitutions_rez']);
          }
          ///////////////////////////////////////////////////////////////////////////////////
          $maty->formBlock('block_function_test_filter','regular_expressions.php','bootstrap-start',
                'p','preg_filter(','regular-block-name-function-filter-p',
                'text2','pattern',$_SESSION['pattern'],
                'p',' ,','zapiataja','bootstrap-f-start',
                'text2','replacement',$_SESSION['replacement'],
                'p',' ,','zapiataja','bootstrap-f-start',
                'text2','subjekt',$_SESSION['subjekt'],
                'p',' ,','zapiataja','bootstrap-f-start',
                'text2','substitutions',$_SESSION['substitutions'],
                'p',' ,','zapiataja','bootstrap-f-start',
                'p','Удалось совершить замен:'.$_SESSION['substitutions_rez'].');','substitutions_rez','bootstrap-f-start',
                'submit','buttonPregQuote','Отработать','regular_expressions.php',
                'reset','Очистить',
                'bootstrap-finish',
                'zero_style'
                 );
            echo '</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-12">';
              echo '<p>Результат:</p>';
              echo '<code><div class="kod3">';
                echo '<p>'.$_SESSION['result_regular_function'].'</p>';
              echo '</div></code>';
            echo '</div>';
            echo '</div>';
          }// конец работы с preg_filter
          //////////////////////////////---------------------------------------------------------------------
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_quote()') || (isset($_POST['buttonPregQuote']) && $_SESSION['name_function_test']=='preg_quote()')  ) // preg_quote()
          {
            if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
            echo '<div class="row">';
            echo '<div class="col-12">';
             echo '<div class="working-with-the-function-p">';
              echo '<p><b>Работаем с preg_quote()</b></p>';
              echo '<p>Синтаксис:</p>';
              echo '<code><div class="kod3">';
              echo "<p>preg_quote(string \$str, ?string \$delimiter = null): string</p>";
              echo '</div></code>';
              echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-12">';
            if (!isset($_SESSION['textValue'])) $_SESSION['textValue']='Введите исходную строку';
            if (isset($_POST['stringFunctionBegin']) && $_POST['stringFunctionBegin']!='') $_SESSION['textValue']=$_POST['stringFunctionBegin']; 
            if (!isset($_SESSION['textValueDelimiter'])) $_SESSION['textValueDelimiter']='Delimiter';
            if (isset($_POST['stringFunctionDelimiter']) && $_POST['stringFunctionDelimiter']=='') $_SESSION['textValueDelimiter']='Delimiter';
            if (isset($_POST['stringFunctionDelimiter']) && $_POST['stringFunctionDelimiter']!='') $_SESSION['textValueDelimiter']=$_POST['stringFunctionDelimiter']; 
            
            $maty->formBlock('block_function_test','regular_expressions.php','bootstrap-start',
                  'p','preg_quote(','regular-block-name-function',
                  'text2','stringFunctionBegin',$_SESSION['textValue'],
                  'p',',','bootstrap-f-start',
                  'text2','stringFunctionDelimiter',$_SESSION['textValueDelimiter'],
                  'p',');','regular-block-close-function','bootstrap-f-start',
                  'submit','buttonPregQuote','Отработать','regular_expressions.php',
                  'bootstrap-finish',
                  'zero_style'
                   );

              echo '</div>';
              echo '</div>';
              echo '<div class="row">';
              echo '<div class="col-12">';
                echo '<p>Результат:</p>';
                echo '<code><div class="kod3">';
                if ($_SESSION['textValueDelimiter']!='Delimiter')
                  echo '<p>'.preg_quote($_SESSION['textValue'],$_SESSION['textValueDelimiter']).'</p>';
                if ($_SESSION['textValueDelimiter']=='Delimiter')
                  echo '<p>'.preg_quote($_SESSION['textValue']).'</p>';
                echo '</div></code>';
              echo '</div>';
              echo '</div>';
            }// конец работы с preg_quote()
        }  // Конец Нажата кнопка выбора функции
  }// Конец работы с регулярными выражениями
 //////////////////////////////////////////работа с выводом статей
$bylPoisk=false;
$poisk = new \redaktor\poisk();
$redaktor=new redaktor\modul();
if (isset($_POST['poisk']))
 { 
  $poisk->poiskStati('bd2',$_POST['strPoisk'],$idStati,'категория-regular') ;
  if ($idStati[0]>-1)
    foreach($idStati as $value) 
     $redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','id='.$value);
  $bylPoisk=true;
 }

 if (!$bylPoisk)
 {

    //Запуск функции если не было нажатие правого меню
    //if ($statiaPoId=='netKnopki' )  // Если не была нажата кнопка правой панели
     //$redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','Раздел=regular');
    //Запуск функции если была нажата кнопка правой панели
    if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
      $redaktor->news1("id=".$statiaPoId,"nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','Раздел=regular');
    }

 echo '</div>';
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
echo '<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 prawy">';  // правое меню

 echo '<div class="poiskDiv">';
  poiskDfdx('regular_expressions.php');
 echo '</div>';

pravoePole('regular');
echo '</div>';

echo '</div>';
echo '</section>';
////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////Конец основного кода страницы////////////////////////// 
/// Статистика///////////////////////////////////////
echo '<footer class="container-fluid futter">';
$statistik = new redaktor\statistic();
if ($_SESSION['regimRaboty']==22) // исполнение нажатия кнопки Статистика
$statistik->statistikOnOff();

if ($_SESSION['regimRaboty']==21) //исполнение нажатия Маты
$maty->redactMaty();


// Вывод статистики Футтер
$statistik->metkaStatistika('regular_expressions');
echo '<div class="futterDivDfdx">';
echo '<p class="footerMarginTop">Просмотров:'.$statistik->getMetkaStatistik('regular_expressions').'</p>';
echo '<p class="footerMarginTop">Число запросов к БД: '.$statistik->kolZaprosow().'</p>';
echo '<p class="footerMarginTop">Начало верстки сайта 2021-09-19</p>';
echo '<p class="footerMarginTop">CMS-DFDX</p>';
echo '</div>';

$maty->dobavilMat('Здесь можно пополнить справочник нецензурных слов. Слово попадет в базу после проверки модератором.');
?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
