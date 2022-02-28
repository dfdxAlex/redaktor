<?php
namespace class\rare_use\trait;

trait TraitInterfaceFoRegular
{
    public function featureSelectionForm()
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
    }

    public function pregReplaceCallbackArray()
    {
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
                $this->formBlock('block_function_test_preg_replace_callback_array','regular_expressions.php','bootstrap-start',
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
                     echo $this->printMas($mas).'<br><br>';
                     echo 'Субъект, с которым проводятся манипуляции:<br>';
                     echo $this->printMas($subject3).'<br><br>';
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
                               //$class= new instrument();
                               $this->printMas($match).'<br>';
                               return $_SESSION['retur1'];
                             },
                         '~'.$_SESSION['pattern2'].'~u' => function ($match) {
                               //$class= new instrument();
                               echo 'Входной массив:<br>';
                               $this->printMas($match).'<br>';
                               return $_SESSION['retur2'];
                             },
                         '~'.$_SESSION['pattern3'].'~u' => function ($match) {
                               //$class= new instrument();
                               echo 'Входной массив:<br>';
                               $this->printMas($match).'<br>';
                               return $_SESSION['retur3'];
                             }
                       ] ,$subject3,$limit,$count,$flag);
                     echo $this->printMas($rez).'<br><br>';
                     echo 'Произведено замен:'.$count;
                    echo '</div></code>';
                  echo '</div>';
                  echo '</div>';
                }// конец работы с preg_replace_callback
    }

    public function pregReplaceCallback()
    {
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
      $this->formBlock('block_function_test_preg_replace_callback','regular_expressions.php','bootstrap-start',
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
             'p','$class = new instrument();//создание объекта с необходимыми методами','regular-block-name-function-preg_match-pattern-poz2',
              'bootstrap-f-start',
             'p','echo \'переданы параметры в функцию:\';// сообщение вызов функции callback','regular-block-name-function-preg_match-pattern-poz2',
              'bootstrap-f-start',
             'p','echo $class->printMas($match);// показать содержимое массива $match','regular-block-name-function-preg_match-pattern-poz2',
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
           echo $this->printMas($pattern);

           echo '<br><br>Строка или массив для манипуляций:<br>';
           echo $this->printMas($subject).'<br><br>';

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
                                                      echo $this->printMas($match);
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
           $this->printMas($rezpreg_replace); echo '<br><br><br>';
            echo 'Вывод массива через print_r';
            echo '<br>';
            print_r($rezpreg_replace);
            echo '<br><br><br>';
          echo '</div></code>';
        echo '</div>';
        echo '</div>';
      }// конец работы с preg_replace_callback
    }

    
}
