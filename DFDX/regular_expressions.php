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
if (isset($_POST['selectFunctionPhp']) &&  isset($_POST['functionPhp']) || (isset($_POST['buttonPregQuote'])) || (isset($_POST['buttonPregGrep']))  ) //если нажимали кнопку выбора функции и есть выбранная функция, то заходим в раздел работы с конкретной функцией
{
   ////////////////////////////////////////////// работа с preg_match_all ////////////////////////////////////////////////
  if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_match_all()') || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_match_all()')  ) // preg_match_all()
   {
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
       //echo $flags;

       if (stripos($flags,'PREG_PATTERN_ORDER')>1 && stripos($flags,'PREG_SET_ORDER')===false) 
        if (stripos($flags,'PREG_OFFSET_CAPTURE')>1)
         $flags_flags=PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE;
        else $flags_flags=PREG_PATTERN_ORDER;

       if (stripos($flags,'PREG_SET_ORDER')>1 && stripos($flags,'PREG_PATTERN_ORDER')===false) 
       if (stripos($flags,'PREG_OFFSET_CAPTURE')>1)
         $flags_flags=PREG_SET_ORDER|PREG_OFFSET_CAPTURE;
       else $flags_flags=PREG_SET_ORDER;


       if (stripos($flags,'PREG_PATTERN_ORDER')>1 && stripos($flags,'PREG_OFFSET_CAPTURE')>1) 
        $flags_flags=PREG_PATTERN_ORDER|PREG_OFFSET_CAPTURE;
      
       //очистим флаги
       if (stripos($flags,'PREG_PATTERN_ORDER')>1) //$flag=(int)PREG_PATTERN_ORDER;
          {
            $rezPreg_match=preg_match_all($pattern,$_SESSION['subject'],$matches,$flags_flags,$offset);
          }

       //else $rezPreg_match=preg_match_all($pattern,$_SESSION['subject'],$matches);

       //print_r($matches);
       foreach ($matches as $mat1 => $matches2)
       foreach ($matches2 as $mat => $value)
        {
          echo 'matches['.$mat1.']['.$mat.']='.$value;
          echo '<br>';
        }
      // if (stripos($_SESSION['flags'],'PREG_OFFSET_CAPTURE')===false && stripos($_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')===false)
      //     $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches);

      // if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0 || stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>0)
      //     if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0)
      //      {
      //        if (stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>0)
      //         $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL,$offset);   
      //        else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE,$offset);
      //      } else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_UNMATCHED_AS_NULL,$offset);
      // if ($rezPreg_match===false) echo 'Вернули False - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
      // if ($rezPreg_match===0) echo 'Вернули 0 - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
      // if ($rezPreg_match) echo 'Вернули '.$rezPreg_match.'<br><br>';

    //if ($rezPreg_match)
    //  {
    //   echo '<br><br>var_dump()<br>';
    //   var_dump($matches);
    //   echo '<br><br>print_r()<br>';
    //   print_r($matches);
    //   echo '<br><br>echo()<br>';
    //  }
      // if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0)
      //  {
      //   foreach ($matches as $mat => $matches2)
      //    foreach ($matches2 as $mat2 => $value)
      //      {
      //       if (!is_null($value))
      //          echo 'echo $matches['.$mat.']['.$mat2.']='.$value.'<br>';
      //       else echo 'echo $matches['.$mat.']['.$mat2.']=null:-)<br>';
      //      }
      //  } else 
      //          {
      //            foreach ($matches as $mat=>$value)
      //             if (!is_null($value))
      //              echo 'echo $matches['.$mat.']='.$value.'<br>';
      //             else echo 'echo $matches['.$mat.']=null:-)<br>';
      //          }

      //}
     echo '</div></code>';
   echo '</div>';
   echo '</div>';
 }// конец работы с preg_filter

 //////////////////////////////---------------------------------------------------------------------
         ////////////////////////////////////////////// работа с preg_match ////////////////////////////////////////////////
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_match()') || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_match()')  ) // preg_match()
         {
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
                 if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0)
                  {
                    if (stripos('sss'.$_SESSION['flags'],'PREG_UNMATCHED_AS_NULL')>0)
                     $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL,$offset);   
                    else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_OFFSET_CAPTURE,$offset);
                  } else $rezPreg_match=preg_match($pattern,$_SESSION['subject'],$matches,PREG_UNMATCHED_AS_NULL,$offset);
             if ($rezPreg_match===false) echo 'Вернули False - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
             if ($rezPreg_match===0) echo 'Вернули 0 - Осторожно! У данной функции 0 и False - это одно и то же! Используйте ===';
             if ($rezPreg_match) echo 'Вернули '.$rezPreg_match.'<br><br>';

          if ($rezPreg_match)
            {
             echo '<br><br>var_dump()<br>';
             var_dump($matches);
             echo '<br><br>print_r()<br>';
             print_r($matches);
             echo '<br><br>echo()<br>';
             if (stripos('sss'.$_SESSION['flags'],'PREG_OFFSET_CAPTURE')>0)
              {
               foreach ($matches as $mat => $matches2)
                foreach ($matches2 as $mat2 => $value)
                  {
                   if (!is_null($value))
                      echo 'echo $matches['.$mat.']['.$mat2.']='.$value.'<br>';
                   else echo 'echo $matches['.$mat.']['.$mat2.']=null:-)<br>';
                  }
              } else 
                      {
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
        if ((isset($_POST['functionPhp']) && $_POST['functionPhp']=='preg_grep()') || (isset($_POST['buttonPregGrep']) && $_SESSION['name_function_test']=='preg_grep()')  ) // preg_grep()
         {
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
       
              for ($i=1;$i<11;$i++) // объявляются или инициализируются 10 пар переменных, работающих со значениями массива
               {
                 if (!isset($_SESSION['array_poz_'.$i])) $_SESSION['array_poz_'.$i]='Poz-'.$i;
                 if (isset($_POST['array_poz_'.$i]) && $_POST['array_poz_'.$i]!='') $_SESSION['array_poz_'.$i]=$_POST['array_poz_'.$i]; 
                 if (!isset($_SESSION['array_'.$i])) $_SESSION['array_'.$i]='meaning-'.$i;
                 if (isset($_POST['array_'.$i]) && $_POST['array_'.$i]!='') $_SESSION['array_'.$i]=$_POST['array_'.$i]; 
               }
            $masResult=array();
              if (isset($_POST['buttonPregGrep']) && $_POST['buttonPregGrep']=='Отработать')
                {
                 for ($i=1; $i<11;$i++)
                   {
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
            // echo '<p>'.$_SESSION['result_regular_function'].'</p>';
            foreach($masResult  as $key => $value)
              echo '<p>'.$key.'=>'.$value.'</p>';
           echo '</div></code>';
         echo '</div>';
         echo '</div>';
       }// конец работы с preg_filter
       //////////////////////////////---------------------------------------------------------------------
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
