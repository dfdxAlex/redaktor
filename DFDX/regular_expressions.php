<?php
session_start();
require "funcii.php";
require "functionDfdx.php";
require "image/swapImages.php";
require "class.php";
  use \class\redaktor\Modul as modul;
  use \class\redaktor\login as login;
  use \class\redaktor\maty as maty;
  use \class\redaktor\poisk as poisk;
  use \class\redaktor\statistic as statistic;
  $instrum= new initBd();
  $redaktor= new Modul();
  $status = new login();
  $maty = new maty();
  $poisk = new poisk();
  $statistik = new statistic();
?>
<!DOCTYPE html>
<html lang="ru">
<head>

<?php
$statistik->googleAnalitic('https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ');
?>

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
if (!isset($_SESSION["resetNameTable"])) $_SESSION["resetNameTable"]=false;
if (!isset($_SESSION["regimRaboty"])) $_SESSION["regimRaboty"]=0;
if (!isset($_SESSION["status"])) $_SESSION["status"]=0;
if (!isset($_SESSION["sSajta"])) $_SESSION["sSajta"]=false;
//if ($_SESSION["status"]>99) $_SESSION["status"]=9;
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
if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) $_SESSION["status"]=$status->statusRegi($_SESSION["login"],$_SESSION["parol"]);
$_SESSION['redaktiruem']="regular_expressions.php";
$maty->__unserialize(array('menu9','menu_up_dfdx','dfdx.php','Логин','Пароль'));
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
if (!isset($_POST['poisk']) || isset($_POST['selectFunctionPhp'])) {// Выводим работу с регулярными выражениями только если не было нажатой кнопки Поиск
  if (!isset($_SESSION['name_function_test'])) $_SESSION['name_function_test']='preg_filter()';
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
          echo '<option>preg_grep()</option>';
          echo '<option>preg_match()</option>';
          echo '<option>preg_match_all()</option>';
          echo '<option>preg_quote()</option>';
          echo '<option>preg_replace_callback_array()</option>';
          echo '<option>preg_replace_callback()</option>';
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
if (isset($_POST['selectFunctionPhp']) &&  isset($_POST['functionPhp']) 
  || (isset($_POST['buttonPregQuote'])) || (isset($_POST['buttonPregGrep']))) {//если нажимали кнопку выбора функции и есть выбранная функция, то заходим в раздел работы с конкретной функцией
           ////////////////////////////////////////////// работа с preg_replace_callback_array ////////////////////////////////////////////////
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_replace_callback_array()') || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_replace_callback_array()')) {// preg_replace_callback_array()
             if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
             echo '<div class="row">';
               echo '<div class="col-12">';
                echo '<div class="working-with-the-function-p">';
                 echo '<p><b>Работаем с preg_replace_callback_array()</b></p>';
                 echo '<p>Синтаксис:</p>';
                 echo '<code><div class="kod3">';
                 echo "<p>preg_replace_callback_array(<br>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array \$pattern, //массив пар: регулярное выражение=>анонимная функция <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array|string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  int \$limit = -1 //лимит подстрок <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$count = null //содержит число произведенных замен <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //содержит комбинацию флагов <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ): array|string|null</p>";
                echo '</div></code>';
               echo '</div>';
              echo '</div>';
             echo '</div>';
             echo '<div class="row">';
              echo '<div class="col-12">';
                // запоминаем данные с формы
             if (!isset($_SESSION['pattern1'])) $_SESSION['pattern1']='Выражение';
             if (isset($_POST['pattern1']) && $_POST['pattern1']!='') $_SESSION['pattern1']=$_POST['pattern1']; 
               else $_SESSION['pattern1']='';
             if (!isset($_SESSION['pattern2'])) $_SESSION['pattern2']='Выражение';
             if (isset($_POST['pattern2']) && $_POST['pattern2']!='') $_SESSION['pattern2']=$_POST['pattern2']; 
               else $_SESSION['pattern2']='';
             if (!isset($_SESSION['pattern3'])) $_SESSION['pattern3']='Выражение';
             if (isset($_POST['pattern3']) && $_POST['pattern3']!='') $_SESSION['pattern3']=$_POST['pattern3']; 
               else $_SESSION['pattern3']='';
             if (!isset($_SESSION['retur1'])) $_SESSION['retur1']='Выражение';
             if (isset($_POST['retur1']) && $_POST['retur1']!='') $_SESSION['retur1']=$_POST['retur1']; 
               else $_SESSION['retur1']='';
             if (!isset($_SESSION['retur2'])) $_SESSION['retur2']='Выражение';
             if (isset($_POST['retur2']) && $_POST['retur2']!='') $_SESSION['retur2']=$_POST['retur2']; 
               else $_SESSION['retur2']='';
             if (!isset($_SESSION['retur3'])) $_SESSION['retur3']='Выражение';
             if (isset($_POST['retur3']) && $_POST['retur3']!='') $_SESSION['retur3']=$_POST['retur3']; 
               else $_SESSION['retur3']='';
             if (!isset($_SESSION['subject'])) $_SESSION['subject']='Субъект';
             if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 
               else $_SESSION['subject']='';
             if (!isset($_SESSION['limit'])) $_SESSION['limit']='-1';
             if (isset($_POST['limit']) && $_POST['limit']!='') $_SESSION['limit']=$_POST['limit']; 
             if (!isset($_SESSION['flags'])) $_SESSION['flags']=0;
             if (isset($_POST['flags']) && $_POST['flags']!='') $_SESSION['flags']=$_POST['flags']; 
   
         ///////////////////////////////////////////////////////////////////////////////////
         $maty->formBlock('block_function_test_preg_replace_callback_array','regular_expressions.php','bootstrap-start',
                'p','preg_replace_callback_array(','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'text','pattern1',$_SESSION['pattern1'],
                'p','=>function ($match) {','regular-block-name-function-preg_replace_callback_array',
                'p','return ','regular-block-name-function-preg_replace_callback_array',
                'text','retur1',$_SESSION['retur1'],
                'p','}','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'text','pattern2',$_SESSION['pattern2'],
                'p','=>function ($match) {','regular-block-name-function-preg_replace_callback_array',
                'p','return ','regular-block-name-function-preg_replace_callback_array',
                'text','retur2',$_SESSION['retur2'],
                'p','}','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'text','pattern3',$_SESSION['pattern3'],
                'p','=>function ($match) {','regular-block-name-function-preg_replace_callback_array',
                'p','return ','regular-block-name-function-preg_replace_callback_array',
                'text','retur3',$_SESSION['retur3'],
                'p','}','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'br','2',
                'p','subject =>','regular-block-name-function-preg_replace_callback_array',
                'text','subject',$_SESSION['subject'],
                'bootstrap-f-start',
                'br','2',
                'p','int $limit =>','regular-block-name-function-preg_replace_callback_array',
                'text','limit',$_SESSION['limit'],
                'bootstrap-f-start',
                'p','int &$count','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'p','int $flags =>','regular-block-name-function-preg_replace_callback_array',
                'text','flags',$_SESSION['flags'],
                'bootstrap-f-start',
                'br','2',
                'bootstrap-f-start',
                'p','int $flag=>PREG_OFFSET_CAPTURE','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'p','int $flag=>PREG_UNMATCHED_AS_NULL','regular-block-name-function-preg_replace_callback_array',
                'bootstrap-f-start',
                'p',')','regular-block-name-function-preg_match-finish',
                'bootstrap-f-start',
                'submit','buttonPregGrep','Отработать','regular_expressions.php',
                'reset','Очистить',
                'bootstrap-finish'
                );
                echo '</div>';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<p>Результат:</p>';
                echo '<code><div class="kod3">';
             $subject3=NULL;
             $subject=NULL;
             $limit=-1;
             $flag=0;
                $mas[0]='~'.$_SESSION['pattern1'].'~u'.' => function ($match) {return '.$_SESSION['retur1'].';}';
                $mas[1]='~'.$_SESSION['pattern2'].'~u'.' => function ($match) {return '.$_SESSION['retur2'].';}';
                $mas[2]='~'.$_SESSION['pattern3'].'~u'.' => function ($match) {return '.$_SESSION['retur3'].';}';
                // код преобразует переменную $_SESSION['subject'] в строку, если в ней нет квадратных скобок
                // код преобразует переменную $_SESSION['subject'] в массив, если в ней есть квадратные скобки
                if (isset($_SESSION['subject']) && $_SESSION['subject']!='')
                 if (stripos($_SESSION['subject'],'[')===false)
                    $subject3=$_SESSION['subject'];
                    else {
                           $subject2=$_SESSION['subject'];
                           preg_match_all('/(\[\w+\]?)|(\[\d+\]?)/u', $subject2, $subject);
                           $subject3=preg_replace('/\[|\]/','',$subject[0],-1);
                         }
                 ////////////////////////////////////////////////////////////////////////////////////////////// 
              echo 'Массив регулярных выражений вместе с callback-функцией:<br>';
              echo $instrum->printMas($mas).'<br><br>';
              echo 'Субъект, с которым проводятся манипуляции:<br>';
              echo $instrum->printMas($subject3).'<br><br>';
              if (gettype($_SESSION['limit'])!='integer') $limit=-1;
               else $limit=$_SESSION['limit']+0;
              if ($limit<-1) $limit=-1;
              echo 'Лимит преобразований: '.$limit.'<br><br>';
              $flag_PREG_OFFSET_CAPTURE=false;
              $flag_PREG_UNMATCHED_AS_NULL=false;
              if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>1) {$flag=$flag+256;$flag_PREG_OFFSET_CAPTURE=true;}
              if (stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>1) {$flag=$flag+512;$flag_PREG_UNMATCHED_AS_NULL=true;}
              echo 'Используемые флаги: <br>';
              if ($flag_PREG_OFFSET_CAPTURE) echo 'PREG_OFFSET_CAPTURE<br>';
              if ($flag_PREG_UNMATCHED_AS_NULL) echo 'PREG_UNMATCHED_AS_NULL<br><br><br>';
              echo 'Результат:<br><br>';
              $rez=preg_replace_callback_array(
                [
                  '~'.$_SESSION['pattern1'].'~u' => function ($match) {
                        echo 'Входной массив:<br>';
                        $instrum= new instrument();
                        $instrum->printMas($match).'<br>';
                        return $_SESSION['retur1'];
                      },
                  '~'.$_SESSION['pattern2'].'~u' => function ($match) {
                        $instrum= new instrument();
                        echo 'Входной массив:<br>';
                        $instrum->printMas($match).'<br>';
                        return $_SESSION['retur2'];
                      },
                  '~'.$_SESSION['pattern3'].'~u' => function ($match) {
                        $instrum= new instrument();
                        echo 'Входной массив:<br>';
                        $instrum->printMas($match).'<br>';
                        return $_SESSION['retur3'];
                      }
                ] ,$subject3,$limit,$count,$flag);
              echo $instrum->printMas($rez).'<br><br>';
              echo 'Произведено замен:'.$count;
             echo '</div></code>';
           echo '</div>';
           echo '</div>';
         }// конец работы с preg_replace_callback
          ////////////////////////////////////////////// работа с preg_replace_callback ////////////////////////////////////////////////
    if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_replace_callback()') 
      || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_replace_callback()')) {// preg_replace_callback()
            if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
            echo '<div class="row">';
              echo '<div class="col-12">';
               echo '<div class="working-with-the-function-p">';
                echo '<p><b>Работаем с preg_replace_callback()</b></p>';
                echo '<p>Синтаксис:</p>';
                echo '<code><div class="kod3">';
                echo "<p>preg_replace_callback(array|string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; callable \$callback, //callback - функция <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array|string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  int \$limit = -1 //лимит подстрок <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$count = null //содержит число произведенных замен <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //содержит комбинацию флагов <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ): array|false|null</p>";
               echo '</div></code>';
              echo '</div>';
             echo '</div>';
            echo '</div>';
            echo '<div class="row">';
             echo '<div class="col-12">';
               // запоминаем данные с формы
            if (!isset($_SESSION['pattern'])) $_SESSION['pattern']='Выражение';
            if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 
              else $_SESSION['pattern']='';
  
            if (!isset($_SESSION['callBack'])) $_SESSION['callBack']='Тело функции';
            if (isset($_POST['callBack']) && $_POST['callBack']!='') $_SESSION['callBack']=$_POST['callBack']; 
              else $_SESSION['callBack']='';

            if (!isset($_SESSION['subject'])) $_SESSION['subject']='Строка';
            if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 
              else $_SESSION['subject']='';
       
            if (!isset($_SESSION['limit'])) $_SESSION['limit']='-1';
            if (isset($_POST['limit']) && $_POST['limit']!='') $_SESSION['limit']=$_POST['limit']; 

            if (!isset($_SESSION['flags'])) $_SESSION['flags']=0;
            if (isset($_POST['flags']) && $_POST['flags']!='') $_SESSION['flags']=$_POST['flags']; 
  
            for ($i=1;$i<10;$i++) {
               if (isset($_POST['patternMas'.$i])) $_SESSION['patternMas'.$i]=$_POST['patternMas'.$i];
               else $_SESSION['patternMas'.$i]='';
             }
            for ($i=1;$i<10;$i++) {
               if (isset($_POST['subject'.$i])) $_SESSION['subject'.$i]=$_POST['subject'.$i];
               else $_SESSION['subject'.$i]='';
             }
        
        ///////////////////////////////////////////////////////////////////////////////////
        $maty->formBlock('block_function_test_preg_replace_callback','regular_expressions.php','bootstrap-start',
               'p','preg_replace_callback(','regular-block-name-function-preg_split-p',
               'bootstrap-f-start',
               'p','string $pattern=>','regular-block-name-function-preg_match-pattern',
               'text','pattern',$_SESSION['pattern'],
               'bootstrap-f-start',
               'text','patternMas1',$_SESSION['patternMas1'],
               'text','patternMas2',$_SESSION['patternMas2'],
               'text','patternMas3',$_SESSION['patternMas3'],
               'bootstrap-f-start',
               'text','patternMas4',$_SESSION['patternMas4'],
               'text','patternMas5',$_SESSION['patternMas5'],
               'text','patternMas6',$_SESSION['patternMas6'],
               'bootstrap-f-start',
               'text','patternMas7',$_SESSION['patternMas7'],
               'text','patternMas8',$_SESSION['patternMas8'],
               'text','patternMas9',$_SESSION['patternMas9'],
               'bootstrap-f-start',
               'br','2',
               'p','handler(array $match)','regular-block-name-function-preg_match-pattern-nameFunc',
               'bootstrap-f-start',
               'p','{','regular-block-name-function-preg_match-pattern-poz1',
               'bootstrap-f-start',
               'p','$instrum = new instrument();//создание объекта с необходимыми методами','regular-block-name-function-preg_match-pattern-poz2',
                'bootstrap-f-start',
               'p','echo \'переданы параметры в функцию:\';// сообщение вызов функции callback','regular-block-name-function-preg_match-pattern-poz2',
                'bootstrap-f-start',
               'p','echo $instrum->printMas($match);// показать содержимое массива $match','regular-block-name-function-preg_match-pattern-poz2',
                'bootstrap-f-start',
               'text','callBack',$_SESSION['callBack'],
               'p','// значение для замены, помещено в массив $matches','regular-block-name-function-preg_match-pattern',
               'bootstrap-f-start',
               'p','return $matches[0];','regular-block-name-function-preg_match-pattern-poz2',
                'bootstrap-f-start',
               'p',';','regular-block-name-function-preg_match-pattern-poz2',
               'bootstrap-f-start',
               'p','}','regular-block-name-function-preg_match-pattern-poz1',
               'bootstrap-f-start',
               'br','2',
               'p','string $subject=>','regular-block-name-function-preg_match-pattern',
               'text','subject',$_SESSION['subject'],
               'bootstrap-f-start',
               'text','subject1',$_SESSION['subject1'],
               'text','subject2',$_SESSION['subject2'],
               'text','subject3',$_SESSION['subject3'],
               'bootstrap-f-start',
               'text','subject4',$_SESSION['subject4'],
               'text','subject5',$_SESSION['subject5'],
               'text','subject6',$_SESSION['subject6'],
               'bootstrap-f-start',
               'text','subject7',$_SESSION['subject7'],
               'text','subject8',$_SESSION['subject8'],
               'text','subject9',$_SESSION['subject9'],
               'bootstrap-f-start',
               'br','2',
               'p','int $limit =>','regular-block-name-function-preg_match-pattern',
               'text','limit',$_SESSION['limit'],
               'bootstrap-f-start',
               'p','int &$count','regular-block-name-function-preg_match-pattern',
               'bootstrap-f-start',
               'p','int $flags =>','regular-block-name-function-preg_match-pattern',
               'text','flags',$_SESSION['flags'],
               'bootstrap-f-start',
               'br','2',
               'bootstrap-f-start',
               'p','int $flag=>PREG_OFFSET_CAPTURE','regular-block-name-function-preg_match-pattern',
               'bootstrap-f-start',
               'p','int $flag=>PREG_UNMATCHED_AS_NULL','regular-block-name-function-preg_match-pattern',
               'bootstrap-f-start',
               'p',')','regular-block-name-function-preg_match-finish',
               'bootstrap-f-start',
               'submit','buttonPregGrep','Отработать','regular_expressions.php',
               'reset','Очистить',
               'bootstrap-f-start',
               'bootstrap-finish'
               );
          echo '</div>';
          echo '</div>';
          echo '<div class="row">';
          echo '<div class="col-12">';
            echo '<p>Результат:</p>';
            echo '<code><div class="kod3">';
  
              $pattern=NULL;
              $subject=NULL;
              $limit=(int)$_SESSION['limit']+0;
              $flags=0;
  
              if ($_SESSION['pattern']!='')
                $pattern='/'.$_SESSION['pattern'].'/u';
              else for ($i=1;$i<10;$i++)
                      $pattern[$i]='/'.$_SESSION['patternMas'.$i].'/u';
  
              if ($_SESSION['subject']!='')
                $subject=$_SESSION['subject'];
                else for ($i=1;$i<10;$i++)
                    $subject[$i]=$_SESSION['subject'.$i];
              
              if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>1)
              $flags=$flags+256;
              if (stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>1)
              $flags=$flags+512;

             echo 'Регулярное выражение:<br>';
             echo $instrum->printMas($pattern);
  
             echo '<br><br>Строка или массив для манипуляций:<br>';
             echo $instrum->printMas($subject).'<br><br>';

             echo 'используемые флаги:'.'<br>';
             $flagTest=$flags;
             if ($flagTest>511) {
                echo 'PREG_UNMATCHED_AS_NULL'.'<br><br>';
                $flagTest=$flagTest-512;
              }
             if ($flagTest>255) echo 'PREG_OFFSET_CAPTURE'.'<br>';
             $rezpreg_replace=preg_replace_callback($pattern,
                                                      function ($match) {
                                                        echo '<br>переданы параметры в функцию:<br>';
                                                        echo $instrum->printMas($match);
                                                        $index=preg_match('/[0-9]/u',$_SESSION['callBack'],$matches);
                                                        return $matches[0];
                                                      },
                                                      $subject,
                                                      $limit,
                                                      $count,
                                                      $flags);
       
             if (gettype($rezpreg_replace)=='boolean' && $rezPreg_match==true) echo 'Функция вернула:True';
             if (gettype($rezpreg_replace)=='boolean' && $rezPreg_match==false) echo 'Функция вернула:False';
             if (is_null($rezpreg_replace)) echo 'Функция вернула:NULL';
             echo '<br><br>Переменная: count='.$count.'<br><br>';
             echo 'Вывод через foreach<br><br>';
             $instrum->printMas($rezpreg_replace); echo '<br><br><br>';
              echo 'Вывод массива через print_r';
              echo '<br>';
              print_r($rezpreg_replace);
              echo '<br><br><br>';
            echo '</div></code>';
          echo '</div>';
          echo '</div>';
        }// конец работы с preg_replace_callback
        ////////////////////////////////////////////// работа с preg_replace ////////////////////////////////////////////////
    if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_replace()') 
      || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_replace()')) {
          if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
          echo '<div class="row">';
            echo '<div class="col-12">';
             echo '<div class="working-with-the-function-p">';
              echo '<p><b>Работаем с preg_replace()</b></p>';
              echo '<p>Синтаксис:</p>';
              echo '<code><div class="kod3">';
              echo "<p>preg_replace(array|string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array|string \$replacement, //подстрока для замены <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array|string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  int \$limit = -1 //лимит подстрок <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$count = null //содержит число произведенных замен <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ): array|false|null</p>";
             echo '</div></code>';
            echo '</div>';
           echo '</div>';
          echo '</div>';
          echo '<div class="row">';
           echo '<div class="col-12">';
             // запоминаем данные с формы
          if (!isset($_SESSION['pattern'])) $_SESSION['pattern']='Выражение';
          if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 
            else $_SESSION['pattern']='';

          if (!isset($_SESSION['replacement'])) $_SESSION['replacement']='Заменить на';
          if (isset($_POST['replacement']) && $_POST['replacement']!='') $_SESSION['replacement']=$_POST['replacement']; 
            else $_SESSION['replacement']='';
     
          if (!isset($_SESSION['subject'])) $_SESSION['subject']='Строка';
          if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 
            else $_SESSION['subject']='';
     
          if (!isset($_SESSION['limit'])) $_SESSION['limit']='-1';
          if (isset($_POST['limit']) && $_POST['limit']!='') $_SESSION['limit']=$_POST['limit']; 

          for ($i=1;$i<10;$i++) {
             if (isset($_POST['patternMas'.$i])) $_SESSION['patternMas'.$i]=$_POST['patternMas'.$i];
             else $_SESSION['patternMas'.$i]='';
           }
          for ($i=1;$i<10;$i++) {
             if (isset($_POST['replacement'.$i])) $_SESSION['replacement'.$i]=$_POST['replacement'.$i];
             else $_SESSION['replacement'.$i]='';
           }
          for ($i=1;$i<10;$i++) {
             if (isset($_POST['subject'.$i])) $_SESSION['subject'.$i]=$_POST['subject'.$i];
             else $_SESSION['subject'.$i]='';
           }
      ///////////////////////////////////////////////////////////////////////////////////
      $maty->formBlock('block_function_test_preg_replace','regular_expressions.php','bootstrap-start',
             'p','preg_replace(','regular-block-name-function-preg_split-p',
             'bootstrap-f-start',
             'p','string $pattern=>','regular-block-name-function-preg_match-pattern',
             'text','pattern',$_SESSION['pattern'],
             'bootstrap-f-start',
             'text','patternMas1',$_SESSION['patternMas1'],
             'text','patternMas2',$_SESSION['patternMas2'],
             'text','patternMas3',$_SESSION['patternMas3'],
             'bootstrap-f-start',
             'text','patternMas4',$_SESSION['patternMas4'],
             'text','patternMas5',$_SESSION['patternMas5'],
             'text','patternMas6',$_SESSION['patternMas6'],
             'bootstrap-f-start',
             'text','patternMas7',$_SESSION['patternMas7'],
             'text','patternMas8',$_SESSION['patternMas8'],
             'text','patternMas9',$_SESSION['patternMas9'],
             'bootstrap-f-start',
             'br','2',
             'p','string $replacement=>','regular-block-name-function-preg_match-pattern',
             'text','replacement',$_SESSION['replacement'],
             'bootstrap-f-start',
             'text','replacement1',$_SESSION['replacement1'],
             'text','replacement2',$_SESSION['replacement2'],
             'text','replacement3',$_SESSION['replacement3'],
             'bootstrap-f-start',
             'text','replacement4',$_SESSION['replacement4'],
             'text','replacement5',$_SESSION['replacement5'],
             'text','replacement6',$_SESSION['replacement6'],
             'bootstrap-f-start',
             'text','replacement7',$_SESSION['replacement7'],
             'text','replacement8',$_SESSION['replacement8'],
             'text','replacement9',$_SESSION['replacement9'],
             'bootstrap-f-start',
             'br','2',
             'p','string $subject=>','regular-block-name-function-preg_match-pattern',
             'text','subject',$_SESSION['subject'],
             'bootstrap-f-start',
             'text','subject1',$_SESSION['subject1'],
             'text','subject2',$_SESSION['subject2'],
             'text','subject3',$_SESSION['subject3'],
             'bootstrap-f-start',
             'text','subject4',$_SESSION['subject4'],
             'text','subject5',$_SESSION['subject5'],
             'text','subject6',$_SESSION['subject6'],
             'bootstrap-f-start',
             'text','subject7',$_SESSION['subject7'],
             'text','subject8',$_SESSION['subject8'],
             'text','subject9',$_SESSION['subject9'],
             'bootstrap-f-start',
             'br','2',
             'p','int $limit =>','regular-block-name-function-preg_match-pattern',
             'text','limit',$_SESSION['limit'],
             'bootstrap-f-start',
             'p','int &$count','regular-block-name-function-preg_match-pattern',
             'p',')','regular-block-name-function-preg_match-finish',
             'bootstrap-f-start',
             'submit','buttonPregGrep','Отработать','regular_expressions.php',
             'reset','Очистить',
             'bootstrap-finish'
             );
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="col-12">';
          echo '<p>Результат:</p>';
          echo '<code><div class="kod3">';

            $pattern=NULL;
            $replacement=NULL;
            $subject=NULL;

            if ($_SESSION['pattern']!='')
              $pattern='/'.$_SESSION['pattern'].'/u';
            else for ($i=1;$i<10;$i++)
                    $pattern[$i]='/'.$_SESSION['patternMas'.$i].'/u';

            if ($_SESSION['replacement']!='')
              $replacement=$_SESSION['replacement'];
              else for ($i=1;$i<10;$i++)
                    $replacement[$i]=$_SESSION['replacement'.$i];
            
            if ($_SESSION['subject']!='')
              $subject=$_SESSION['subject'];
              else for ($i=1;$i<10;$i++)
                  $subject[$i]=$_SESSION['subject'.$i];

           echo 'Регулярное выражение:<br>';
           echo $instrum->printMas($pattern);

           echo '<br><br>Выражение для замены:<br>';
           echo $instrum->printMas($replacement);

           echo '<br><br>Строка или массив для манипуляций:<br>';
           echo $instrum->printMas($subject);

           $rezpreg_replace=preg_replace($pattern,$replacement,$subject,$_SESSION['limit'],$count);
     
           if (gettype($rezpreg_replace)=='boolean' && $rezPreg_match==true) echo 'Функция вернула:True';
           if (gettype($rezpreg_replace)=='boolean' && $rezPreg_match==false) echo 'Функция вернула:False';
           if (is_null($rezpreg_replace)) echo 'Функция вернула:NULL';

           echo '<br><br>Переменная: count='.$count.'<br><br>';

           echo 'Вывод через foreach<br><br>';
           $instrum->printMas($rezpreg_replace); echo '<br><br><br>';
            
            echo 'Вывод массива через print_r';
            echo '<br>';
            print_r($rezpreg_replace);
            echo '<br><br><br>';
          echo '</div></code>';
        echo '</div>';
        echo '</div>';
      }// конец работы с preg_replace
     ////////////////////////////////////////////// работа с preg_split ////////////////////////////////////////////////
     if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_split()') 
        || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_split()')) {
       if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
       echo '<div class="row">';
         echo '<div class="col-12">';
          echo '<div class="working-with-the-function-p">';
           echo '<p><b>Работаем с preg_split()</b></p>';
           echo '<p>Синтаксис:</p>';
           echo '<code><div class="kod3">';
           echo "<p>preg_split(string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  int \$limit = -1 //лимит подстрок <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //задает объем информации, выданной в массив <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ): array|false</p>";
          echo '</div></code>';
         echo '</div>';
        echo '</div>';
       echo '</div>';
       echo '<div class="row">';
        echo '<div class="col-12">';
          // запоминаем данные с формы
       if (!isset($_SESSION['pattern'])) $_SESSION['pattern_']='Выражение';
       if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 
  
       if (!isset($_SESSION['subject'])) $_SESSION['subject']='Строка';
       if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 
  
       if (!isset($_SESSION['flags'])) $_SESSION['flags']='PREG_SPLIT_NO_EMPTY';
       if (isset($_POST['flags']) && $_POST['flags']!='') $_SESSION['flags']=$_POST['flags']; 
  
       if (!isset($_SESSION['limit'])) $_SESSION['limit']='-1';
       if (isset($_POST['limit']) && $_POST['limit']!='') $_SESSION['limit']=$_POST['limit']; 
   
   ///////////////////////////////////////////////////////////////////////////////////
   $maty->formBlock('block_function_test_preg_split','regular_expressions.php','bootstrap-start',
          'p','preg_split(','regular-block-name-function-preg_split-p',
          'bootstrap-f-start',
          'p','string $pattern=>','regular-block-name-function-preg_match-pattern',
          'text','pattern',$_SESSION['pattern'],
          'bootstrap-f-start',
          'p','string $subject=>','regular-block-name-function-preg_match-pattern',
          'text','subject',$_SESSION['subject'],
          'bootstrap-f-start',
          'p','int $limit =>','regular-block-name-function-preg_match-pattern',
          'text','limit',$_SESSION['limit'],
          'bootstrap-f-start',
          'p','int $flag  =>','regular-block-name-function-preg_match-pattern',
          'text','flags',$_SESSION['flags'],
          'p',')','regular-block-name-function-preg_match-finish',
          'bootstrap-f-start',
          'p','флаг=> PREG_SPLIT_NO_EMPTY','regular-block-name-function-preg_match-pattern-help',
          'bootstrap-f-start',
          'p','флаг=> PREG_SPLIT_DELIM_CAPTURE','regular-block-name-function-preg_match-pattern-help',
          'bootstrap-f-start',
          'p','флаг=> PREG_SPLIT_OFFSET_CAPTURE','regular-block-name-function-preg_match-pattern-help',
          'bootstrap-f-start',
          'submit','buttonPregGrep','Отработать','regular_expressions.php',
          'reset','Очистить',
          'bootstrap-finish'
          );
     echo '</div>';
     echo '</div>';
     echo '<div class="row">';
     echo '<div class="col-12">';
       echo '<p>Результат:</p>';
       echo '<code><div class="kod3">';
         $pattern='/'.$_SESSION['pattern'].'/u';
         $flags='sss'.$_SESSION['flags'];
         $flag1=false;
         $flag2=false;
         $flag3=false;
         $flag=0;
  
         if (stripos($flags,'PREG_SPLIT_NO_EMPTY')>1) // 1
           $flag=PREG_SPLIT_NO_EMPTY;
  
         if (stripos($flags,'PREG_SPLIT_DELIM_CAPTURE')>1) //2
          $flag=$flag|PREG_SPLIT_DELIM_CAPTURE;
  
         if (stripos($flags,'PREG_SPLIT_OFFSET_CAPTURE')>1) //4
          $flag=$flag|PREG_SPLIT_OFFSET_CAPTURE;
         
          if ($flag>0)
            $rezPreg_match=preg_split($pattern,$_SESSION['subject'],$_SESSION['limit'],$flag);
          else $rezPreg_match=preg_split($pattern,$_SESSION['subject'],$_SESSION['limit']);

        $flagTest=$flag;
        if ($flagTest>=4) {$flag3=true;$flagTest=$flagTest-4;}
        if ($flagTest>=2) {$flag2=true;$flagTest=$flagTest-2;}
        if ($flagTest>=1) $flag1=true;
  
        echo 'Используемые флаги:<br>';
        if ($flag1) echo 'PREG_SPLIT_NO_EMPTY<br>';
        if ($flag2) echo 'PREG_SPLIT_DELIM_CAPTURE<br>';
        if ($flag3) echo 'PREG_SPLIT_OFFSET_CAPTURE<br>';
  
        echo '<br><br><br>';
  
        if (gettype($rezPreg_match)=='boolean' && $rezPreg_match==true) echo 'Функция вернула:True';
        if (gettype($rezPreg_match)=='boolean' && $rezPreg_match==false) echo 'Функция вернула:False';
        echo '<br><br>';
        
        echo 'Вывод через foreach<br><br>';
        $instrum->printMas($rezPreg_match); echo '<br><br><br>';
         
         echo 'Вывод массива через print_r';
         echo '<br>';
         print_r($rezPreg_match);
  
         echo '<br><br>';
         
         echo '<br>';
  
       echo '</div></code>';
     echo '</div>';
     echo '</div>';
   }// конец работы с preg_filter
  
   //////////////////////////////---------------------------------------------------------------------
   ////////////////////////////////////////////// работа с preg_match_all ////////////////////////////////////////////////
  if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_match_all()') 
    || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_match_all()')) {
     if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
     echo '<div class="row">';
       echo '<div class="col-12">';
        echo '<div class="working-with-the-function-p">';
         echo '<p><b>Работаем с preg_match_all()</b></p>';
         echo '<p>Синтаксис:</p>';
         echo '<code><div class="kod3">';
         echo "<p>preg_match_all(string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array &\$matches = null, // массив с результатами поиска<br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //задает объем информации, выданной в массив <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$offset = 0 // задает с какой позиции начинать поиск, в байтах): int|false|null</p>";
        echo '</div></code>';
       echo '</div>';
      echo '</div>';
     echo '</div>';
     echo '<div class="row">';
      echo '<div class="col-12">';
        // запоминаем данные с формы
     if (!isset($_SESSION['pattern'])) $_SESSION['pattern_']='Выражение';
     if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 

     if (!isset($_SESSION['subject'])) $_SESSION['subject']='Строка';
     if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 

     if (!isset($_SESSION['flags'])) $_SESSION['flags']='PREG_PATTERN_ORDER';
     if (isset($_POST['flags']) && $_POST['flags']!='') $_SESSION['flags']=$_POST['flags']; 

     if (!isset($_SESSION['offset'])) $_SESSION['offset']='0';
     if (isset($_POST['offset']) && $_POST['offset']!='') $_SESSION['offset']=$_POST['offset']; 
 
 ///////////////////////////////////////////////////////////////////////////////////
 $maty->formBlock('block_function_test_preg_match_all','regular_expressions.php','bootstrap-start',
        'p','preg_match_all(','regular-block-name-function-preg_match-all-p',
        'bootstrap-f-start',
        'p','string $pattern=>','regular-block-name-function-preg_match-pattern',
        'text','pattern',$_SESSION['pattern'],
        'bootstrap-f-start',
        'p','string $subject=>','regular-block-name-function-preg_match-pattern',
        'text','subject',$_SESSION['subject'],
        'bootstrap-f-start',
        'p','array &$matches null=>','regular-block-name-function-preg_match-pattern',
        'p','массив добавлен автоматически, в коде он не обязателен','regular-block-name-function-preg_match-info-k-masivu',
        'bootstrap-f-start',
        'p','int $flags =>','regular-block-name-function-preg_match-pattern',
        'text','flags',$_SESSION['flags'],
        'bootstrap-f-start',
        'p','int $offset  =>','regular-block-name-function-preg_match-pattern',
        'text','offset',$_SESSION['offset'],
        'p',')','regular-block-name-function-preg_match-finish',
        'bootstrap-f-start',
        'p','флаг=> PREG_PATTERN_ORDER','regular-block-name-function-preg_match-pattern-help',
        'bootstrap-f-start',
        'p','флаг=> PREG_SET_ORDER','regular-block-name-function-preg_match-pattern-help',
        'bootstrap-f-start',
        'p','флаг=> PREG_OFFSET_CAPTURE','regular-block-name-function-preg_match-pattern-help',
        'bootstrap-f-start',
        'p','флаг=> PREG_UNMATCHED_AS_NULL','regular-block-name-function-preg_match-pattern-help',
        'bootstrap-f-start',
        'p','разделитель флагов |','regular-block-name-function-preg_match-pattern-help',
        'bootstrap-f-start',
        'submit','buttonPregGrep','Отработать','regular_expressions.php',
        'reset','Очистить',
        'bootstrap-finish'
        );
   echo '</div>';
   echo '</div>';
   echo '<div class="row">';
   echo '<div class="col-12">';
     echo '<p>Результат:</p>';
     echo '<code><div class="kod3">';
       $pattern='/'.$_SESSION['pattern'].'/u';
       $offset=$_SESSION['offset']+0;
       $flags='sss'.$_SESSION['flags'];
       $flag1=false;
       $flag2=false;
       $flag3=false;
       $flag4=false;
       $flag=0;

       if (stripos($flags,'PREG_PATTERN_ORDER')>1)
         $flag=PREG_PATTERN_ORDER;
       else  if (stripos($flags,'PREG_SET_ORDER')>1)
         $flag=PREG_SET_ORDER;

       if (stripos($flags,'PREG_OFFSET_CAPTURE')>1)
        $flag=$flag|PREG_OFFSET_CAPTURE;

       if (stripos($flags,'PREG_UNMATCHED_AS_NULL')>1)
        $flag=$flag|PREG_UNMATCHED_AS_NULL;
       
        if ($flag>0)
          $rezPreg_match=preg_match_all($pattern,$_SESSION['subject'],$matches,$flag,$offset);
        else $rezPreg_match=preg_match_all($pattern,$_SESSION['subject'],$matches);

      $flagTest=$flag;
      if ($flagTest>=512) {$flag4=true;$flagTest=$flagTest-512;}
      if ($flagTest>=256) {$flag3=true;$flagTest=$flagTest-256;}
      if ($flagTest>=2) {$flag2=true;$flagTest=$flagTest-2;}
      if ($flagTest>=1) $flag1=true;

      echo 'Используемые флаги:<br>';
      if (!$flag1 && !$flag2 && !$flag3 && !$flag4) echo 'PREG_PATTERN_ORDER<br>';
      if ($flag1) echo 'PREG_PATTERN_ORDER<br>';
      if ($flag2) echo 'PREG_SET_ORDER<br>';
      if ($flag3) echo 'PREG_OFFSET_CAPTURE<br>';
      if ($flag4) echo 'PREG_UNMATCHED_AS_NULL<br>';

      echo '<br><br><br>';

      if (gettype($rezPreg_match)=='integer') echo 'Функция вернула:'.$rezPreg_match;
      if (gettype($rezPreg_match)=='boolean' && $rezPreg_match==true) echo 'Функция вернула:True';
      if (gettype($rezPreg_match)=='boolean' && $rezPreg_match==false) echo 'Функция вернула:False';
      if (is_null($rezPreg_match)) echo 'Функция вернула:NULL';
      echo '<br><br>';
      
      echo 'Вывод через foreach<br><br>';
      $instrum->printMas($matches); 
      echo '<br><br><br>';
       
       echo 'Вывод массива через print_r';
       echo '<br>';
       print_r($matches);
       echo '<br><br><br>';
     echo '</div></code>';
   echo '</div>';
   echo '</div>';
 }// конец работы с preg_filter

 //////////////////////////////---------------------------------------------------------------------
         ////////////////////////////////////////////// работа с preg_match ////////////////////////////////////////////////
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_match()') 
          || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_match()')) {
           if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
           echo '<div class="row">';
             echo '<div class="col-12">';
              echo '<div class="working-with-the-function-p">';
               echo '<p><b>Работаем с preg_match()</b></p>';
               echo '<p>Синтаксис:</p>';
               echo '<code><div class="kod3">';
               echo "<p>preg_match(string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; string \$subject, //входящая строка <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array &\$matches = null, // массив с результатами поиска<br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //задает объем информации, выданной в массив <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$offset = 0 // задает с какой позиции начинать поиск, в байтах): int|false</p>";
              echo '</div></code>';
             echo '</div>';
            echo '</div>';
           echo '</div>';
           echo '<div class="row">';
            echo '<div class="col-12">';
              // запоминаем данные с формы
           if (!isset($_SESSION['pattern'])) $_SESSION['pattern_']='Выражение';
           if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 

           if (!isset($_SESSION['subject'])) $_SESSION['subject']='Строка';
           if (isset($_POST['subject']) && $_POST['subject']!='') $_SESSION['subject']=$_POST['subject']; 

           if (!isset($_SESSION['flags'])) $_SESSION['flags']='Флаги';
           if (isset($_POST['flags']) && $_POST['flags']!='') $_SESSION['flags']=$_POST['flags']; 

           if (!isset($_SESSION['offset'])) $_SESSION['offset']='0';
           if (isset($_POST['offset']) && $_POST['offset']!='') $_SESSION['offset']=$_POST['offset']; 
       
       ///////////////////////////////////////////////////////////////////////////////////
       $maty->formBlock('block_function_test_preg_match','regular_expressions.php','bootstrap-start',
              'p','preg_match(','regular-block-name-function-preg_match-p',
              'p','string $pattern=>','regular-block-name-function-preg_match-pattern',
              'text','pattern',$_SESSION['pattern'],
              'bootstrap-f-start',
              'p','string $subject=>','regular-block-name-function-preg_match-pattern',
              'text','subject',$_SESSION['subject'],
              'bootstrap-f-start',
              'p','array &$matches null=>','regular-block-name-function-preg_match-pattern',
              'p','массив добавлен автоматически, в коде он не обязателен','regular-block-name-function-preg_match-info-k-masivu',
              'bootstrap-f-start',
              'p','int $flags =>','regular-block-name-function-preg_match-pattern',
              'text','flags',$_SESSION['flags'],
              'bootstrap-f-start',
              'p','int $offset  =>','regular-block-name-function-preg_match-pattern',
              'text','offset',$_SESSION['offset'],
              'p',')','regular-block-name-function-preg_match-finish',
              'bootstrap-f-start',
              'p','флаг=> PREG_OFFSET_CAPTURE','regular-block-name-function-preg_match-pattern-help',
              'bootstrap-f-start',
              'p','флаг=> PREG_UNMATCHED_AS_NULL','regular-block-name-function-preg_match-pattern-help',
              'bootstrap-f-start',
              'p','разделитель флагов |','regular-block-name-function-preg_match-pattern-help',
              'bootstrap-f-start',
              'submit','buttonPregGrep','Отработать','regular_expressions.php',
              'reset','Очистить',
              'bootstrap-finish'
              );
         echo '</div>';
         echo '</div>';
         echo '<div class="row">';
         echo '<div class="col-12">';
           echo '<p>Результат:</p>';
           echo '<code><div class="kod3">';
             $pattern='/'.$_SESSION['pattern'].'/u';
             $offset=$_SESSION['offset']+0;
             if (stripos($_SESSION['flags'],'PREG_OFFSET_CAPTURE')===false && stripos($_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')===false)
                 $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches);

             if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0 || stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>0)
                 if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0) {
                    if (stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>0)
                     $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL,$offset);   
                    else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE,$offset);
                  } else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_UNMATCHED_AS_NULL,$offset);
             if ($rezPreg_match===false) echo 'Вернули False - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
             if ($rezPreg_match===0) echo 'Вернули 0 - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
             if ($rezPreg_match) echo 'Вернули '.$rezPreg_match.'<br><br>';

          if ($rezPreg_match) {
             echo '<br><br>var_dump()<br>';
             var_dump($matches);
             echo '<br><br>print_r()<br>';
             print_r($matches);
             echo '<br><br>echo()<br>';
             if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0) {
               foreach ($matches as $mat => $matches2)
                foreach ($matches2 as $mat2 => $value) {
                   if (!is_null($value))
                      echo 'echo $matches['.$mat.']['.$mat2.']='.$value.'<br>';
                   else echo 'echo $matches['.$mat.']['.$mat2.']=null:-)<br>';
                  }
              } else  {
                        foreach ($matches as $mat=>$value)
                         if (!is_null($value))
                          echo 'echo $matches['.$mat.']='.$value.'<br>';
                         else echo 'echo $matches['.$mat.']=null:-)<br>';
                      }
            }
           echo '</div></code>';
         echo '</div>';
         echo '</div>';
       }// конец работы с preg_match
       //////////////////////////////---------------------------------------------------------------------
     ////////////////////////////////////////////// работа с preg_filter ////////////////////////////////////////////////
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_grep()') 
          || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_grep()')  ) {
           if (isset($_POST['functionPhp'])) $_SESSION['name_function_test']=$_POST['functionPhp'];
           echo '<div class="row">';
             echo '<div class="col-12">';
              echo '<div class="working-with-the-function-p">';
               echo '<p><b>Работаем с preg_grep()</b></p>';
               echo '<p>Синтаксис:</p>';
               echo '<code><div class="kod3">';
               echo "<p>preg_grep(string \$pattern, //искомый шаблон <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; array \$array, //входящий массив <br> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; int \$flags = 0 //может быть PREG_GREP_INVERT): array|false</p>";
              echo '</div></code>';
             echo '</div>';
            echo '</div>';
           echo '</div>';
           echo '<div class="row">';
            echo '<div class="col-12">';
              // запоминаем данные с формы
              if (!isset($_SESSION['pattern'])) $_SESSION['pattern']='Введите регулярное выражение';
              if (isset($_POST['pattern']) && $_POST['pattern']!='') $_SESSION['pattern']=$_POST['pattern']; 
       
              if (!isset($_SESSION['flag'])) $_SESSION['flag']='flag';
              if (isset($_POST['flag']) && $_POST['flag']!='') $_SESSION['flag']=$_POST['flag']; 
       
              for ($i=1;$i<11;$i++) {// объявляются или инициализируются 10 пар переменных, работающих со значениями массива
                 if (!isset($_SESSION['array_poz_'.$i])) $_SESSION['array_poz_'.$i]='Poz-'.$i;
                 if (isset($_POST['array_poz_'.$i]) && $_POST['array_poz_'.$i]!='') $_SESSION['array_poz_'.$i]=$_POST['array_poz_'.$i]; 
                 if (!isset($_SESSION['array_'.$i])) $_SESSION['array_'.$i]='meaning-'.$i;
                 if (isset($_POST['array_'.$i]) && $_POST['array_'.$i]!='') $_SESSION['array_'.$i]=$_POST['array_'.$i]; 
               }
            $masResult=array();
              if (isset($_POST['buttonPregGrep']) && $_POST['buttonPregGrep']=='Отработать') {
                 for ($i=1; $i<11;$i++) {
                     if ($_SESSION['array_poz_'.$i]=='') $_SESSION['array_poz_'.$i]='Poz-'.$i;
                     if ($_SESSION['array_'.$i]=='') $_SESSION['array_'.$i]='meaning-'.$i;
                    }
            $masStart=array(
            $_SESSION['array_poz_1']=>$_SESSION['array_1'],
            $_SESSION['array_poz_2']=>$_SESSION['array_2'],
            $_SESSION['array_poz_3']=>$_SESSION['array_3'],
            $_SESSION['array_poz_4']=>$_SESSION['array_4'],
            $_SESSION['array_poz_5']=>$_SESSION['array_5'],
            $_SESSION['array_poz_6']=>$_SESSION['array_6'],
            $_SESSION['array_poz_7']=>$_SESSION['array_7'],
            $_SESSION['array_poz_8']=>$_SESSION['array_8'],
            $_SESSION['array_poz_9']=>$_SESSION['array_9'],
            $_SESSION['array_poz_10']=>$_SESSION['array_10']
          );
          $pattern='/'.$_SESSION['pattern'].'/u';
          if ($_SESSION['flag']!='PREG_GREP_INVERT')
              $masResult=preg_grep($pattern,$masStart);
          else $masResult=preg_grep($pattern,$masStart,PREG_GREP_INVERT);
        }
       
       ///////////////////////////////////////////////////////////////////////////////////
       $maty->formBlock('block_function_test_grep','regular_expressions.php','bootstrap-start',
             'p','array=','regular-block-name-function-filter-p',
             'text2','array_poz_1',$_SESSION['array_poz_1'],'span','=>','vektor-mas','text2','array_1',$_SESSION['array_1'],
             'bootstrap-f-start',
             'text2','array_poz_2',$_SESSION['array_poz_2'],'span','=>','vektor-mas','text2','array_2',$_SESSION['array_2'],
             'bootstrap-f-start',
             'text2','array_poz_3',$_SESSION['array_poz_3'],'span','=>','vektor-mas','text2','array_3',$_SESSION['array_3'],
             'bootstrap-f-start',
             'text2','array_poz_4',$_SESSION['array_poz_4'],'span','=>','vektor-mas','text2','array_4',$_SESSION['array_4'],
             'bootstrap-f-start',
             'text2','array_poz_5',$_SESSION['array_poz_5'],'span','=>','vektor-mas','text2','array_5',$_SESSION['array_5'],
             'bootstrap-f-start',
             'text2','array_poz_6',$_SESSION['array_poz_6'],'span','=>','vektor-mas','text2','array_6',$_SESSION['array_6'],
             'bootstrap-f-start',
             'text2','array_poz_7',$_SESSION['array_poz_7'],'span','=>','vektor-mas','text2','array_7',$_SESSION['array_7'],
             'bootstrap-f-start',
             'text2','array_poz_8',$_SESSION['array_poz_8'],'span','=>','vektor-mas','text2','array_8',$_SESSION['array_8'],
             'bootstrap-f-start',
             'text2','array_poz_9',$_SESSION['array_poz_9'],'span','=>','vektor-mas','text2','array_9',$_SESSION['array_9'],
             'bootstrap-f-start',
             'text2','array_poz_10',$_SESSION['array_poz_10'],'span','=>','vektor-mas','text2','array_10',$_SESSION['array_10'],
             'bootstrap-f-start',
             'span','Форма отображает массив входного параметра функции. Можно оставить значения по умолчанию!!','regular-block-name-function-grep-mesage',
             'br','4',
             'bootstrap-f-start',//начало формы функции
             'p','preg_grep(','regular-block-name-function-grep',
             'text2','pattern',$_SESSION['pattern'],'p',' ,','zapiataja','p','inpuy-array','regular-block-name-function-grep',
             'bootstrap-f-start',
             'text2','flag',$_SESSION['flag'],'p',');','regular-block-name-function-grep',
             'bootstrap-f-start',
             'submit','buttonPregGrep','Отработать','regular_expressions.php',
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
            foreach($masResult  as $key => $value)
              echo '<p>'.$key.'=>'.$value.'</p>';
           echo '</div></code>';
         echo '</div>';
         echo '</div>';
       }// конец работы с preg_filter
       //////////////////////////////---------------------------------------------------------------------
   ////////////////////////////////////////////// работа с preg_filter ////////////////////////////////////////////////
      if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_filter()') 
        || (isset($_POST['buttonPregQuote']) && $_SESSION['name_function_test']=='preg_filter()')  ) {
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
          if (isset($_POST['buttonPregQuote'])) {// если была нажата кнопка Отработать
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
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_quote()') 
          || (isset($_POST['buttonPregQuote']) && $_SESSION['name_function_test']=='preg_quote()')) {// preg_quote()
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

if (isset($_POST['poisk'])) { 
  $poisk->poiskStati('bd2',$_POST['strPoisk'],$idStati,'категория-regular') ;
  if ($idStati[0]>-1)
    foreach($idStati as $value) 
     $redaktor->news1("nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','id='.$value);
  $bylPoisk=true;
 }

  if (!$bylPoisk) {
      if ($statiaPoId>-1 && $statiaPoId!='netKnopki') // Если была нажата кнопка правой панели
      $redaktor->news1("id=".$statiaPoId,"nameTD=bd2","Заголовок=h3","Статус редактора=-s45","Шаблон=2","Отступ=1",'action=regular_expressions.php','Раздел=regular');
    }
 buttonTwitter('Тестирование функции (php) '.$_SESSION['name_function_test'].'http://dfdx.uxp.ru/regular_expressions.php');
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
