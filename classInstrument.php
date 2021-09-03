<?php
namespace redaktor;
// Файл сложных классов - модулей. 


include 'class.php';

//класс готовых модулей
class modul
    {

        public function __construct()
            {
                //$classPhp = new maty();
            }

        //новостной модуль
        public function news1(...$parametr)
        {
           $classPhp = new maty();
           $nametablice=''; // по умолчанию
           $zagolowok='p';  // по умолчанию
           $statusRedaktora='-s12345'; // Определяет статус пользователя, для которого открывается меню редактирования
           $razresheniePoLoginu=false;
           $pokazarStatijRedaktora=''; // Содержит имя редактора, чьи статьи нужно показать. Если ='', то показать все
           $hablon=1;  // Шаблон показа статьи, по умолчанию=1, первая статья сверху, последняя снизу.
           $otstup=1;  // Отступ между статьями
           $classKill='';
           $classRedakt='';
           $redaktirowat=-1;
           $poleRedaktora=false;
           $netNowostej=false;
           $classSave='';
           // Ищем имя таблицы
            foreach($parametr as $value)
              if (stripos('sss'.$value,'nameTD='))
              {
                 $nametablice=preg_replace('/nameTD=/','',$value);
                 $nametablice=mb_strtolower($nametablice);
              }

           // Ищем размер заголовка
            foreach($parametr as $value)
              if (stripos('sss'.$value,'Заголовок='))
               $zagolowok=preg_replace('/Заголовок=/','',$value);

           // Статус редактора
             foreach($parametr as $value)
                if (stripos('sss'.$value,'Статус редактора='))
                     $statusRedaktora=preg_replace('/Статус редактора=/','',$value);

           //проверяем логин
            foreach($parametr as $value)
                if (stripos('---'.$value,'Логин редактора='))
                 {
                     $loginRedaktora=preg_replace('/Логин редактора=/','',$value); // Выделяем логин редактора/ов
                     if (stripos('---'.$loginRedaktora,$_SESSION['login'])>0) 
                     {
                       $razresheniePoLoginu=true; // Если в списке логинов присутствует текущий логин, то разрешаем запуск открытого меню
                       //echo 'работаем по логину';
                     }
                  }
           //ищем чьи статьи показать
           foreach($parametr as $value)
            if (stripos('sss'.$value,'Статьи редактора='))
                  $pokazarStatijRedaktora=preg_replace('/Статьи редактора=/','',$value); // Выделяем логин редактора/ов

            foreach($parametr as $value)
             if (stripos('sss'.$value,'Шаблон='))
                   $hablon=preg_replace('/Шаблон=/','',$value); // Выделяем логин редактора/ов
            foreach($parametr as $value)
              if (stripos('sss'.$value,'Отступ='))
                    $otstup=(int)preg_replace('/Отступ=/','',$value); // Выделяем логин редактора/ов
            foreach($parametr as $value)
               if (stripos('sss'.$value,'classKill='))
                {
                     $classKill=preg_replace('/classKill=/','',$value); // Удалить лишнее
                     $classKill=preg_replace('/-/','',$classKill); // Удалить лишнее
                }
            foreach($parametr as $value)
                if (stripos('sss'.$value,'classRedakt='))
                 {
                      $classRedakt=preg_replace('/classRedakt=/','',$value); // Удалить лишнее
                      $classRedakt=preg_replace('/-/','',$classRedakt); // Удалить лишнее
                 }
            foreach($parametr as $value)
                 if (stripos('sss'.$value,'classSave='))
                  {
                       $classRedakt=preg_replace('/classSave=/','',$value); // Удалить лишнее
                       $classRedakt=preg_replace('/-/','',$classSave); // Удалить лишнее
                  }

            //обработка параметра help
            foreach($parametr as $value)
              if ($value=='help' || $value=='Помощь')
               {
                   echo '<p>Функция выводит новостной блок</p>';
                   echo '<p>Параметры функции произвольные и задаются как обычно!</p>';
                   echo '<p>Функция проверяет все параметры и по ключевым словам определяет с каким параметром, что следует делать.</p>';
                   echo '<p>Параметров произвольное колличество</p>';
                   echo '<p>Из обязательных параметров задаем название таблицы в БД. Пример: news1("nameTD=Имя таблицы");</p>';
                   echo '<p>Можно задать размер заголовка для названия новости. Пример: news1("Заголовок=h1-h6,p");</p>';
                   echo '<p>Можно задать статус редактора. Пример: news1("Статус редактора=-s12345"); Окно редактирования будет открыто для статусов 1,2,3,4 и 5</p>';
                   echo '<p>Можно задать логин редактора. Пример: news1("Логин редактора=alfa25"); Окно редактирования будет открыто для пользователя с логином alfa25</p>';
                   echo '<p>Чьи статьи показать? Пример: news1("Статьи редактора=alfa25"); Показать статьи редактора alfa25</p>';
                   echo '<p>Шаблон статьи. Пример: news1("Шаблон=1"); Показать статьи в шаблоне №1</p>';
                   echo '<p>---Шаблон статьи №1. Статьи отображаются подряд, название и статья за ним. Первая статья сверху, последняя снизу.</p>';
                   echo '<p>---Шаблон статьи №2. Статьи отображаются подряд, название и статья за ним. Последняя статья сверху, первая снизу.</p>';
                   
                   echo '<p>Задать отступ между статьями. Пример: news1("Отступ=1"); Отступ равен одной строке</p>';

                   echo '<p>Работа с классами</p>';
                   echo '<p>Класс для кнопки удаления новости "classKill=-имя класса-"</p>';
                   echo '<p>Класс для кнопки редактирования новости "classRedakt=-имя класса-"</p>';
                   echo '<p>Класс для кнопки Сохранить новость "classSave=-имя класса-"</p>';
                   //echo '<p>Класс для заголовка новости "classRedakt=-имя класса-"</p>';
                   echo '<p></p>';
                   
                }
                             /////////////////////////////////////////////////////////////////////////////////////////////////////////
             // Запись статьи, если была нажата кнопка Сохранить

            if ($nametablice!='' && $classPhp->searcNameTablic($nametablice) 
            && ((isset($_POST[$nametablice.'_redaktor']) && $_POST[$nametablice.'_redaktor']=='Сохранить')
             || (isset($_POST[$nametablice.'_redaktor2']) && $_POST[$nametablice.'_redaktor2']=='Сохранить'))
        )
         {
             // Преобразовываем имя статьи и статью в нормальный вид и записываем.
             $imieNowosti=$classPhp->bezMatov(quotemeta($_POST['zagolowok']));
             $news=$classPhp->bezMatov(quotemeta($_POST['statia']));
             if (isset($_SESSION['redaktirowatId']) && $_SESSION['redaktirowatId']>-1)
              {
                $classPhp->killZapisTablicy($nametablice,'WHERE id='.$_SESSION['redaktirowatId']);
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."(id, name,news,login_redaktora) VALUES (".$_SESSION['redaktirowatId'].", '".$imieNowosti."','".$news."', '".$_SESSION['login']."')");
              } 
              else 
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."(id, name,news,login_redaktora) VALUES (".$classPhp->maxIdLubojTablicy($nametablice).", '".$imieNowosti."','".$news."', '".$_SESSION['login']."')");
             
              $_SESSION['redaktirowatId']=-1;
                ///////////////////////////////////////////////////////////////////////////////

         }
         /////////////////////////////////////// работаем с кнопкой удалить ////////////////////////////////// row button_statia
         if ($classPhp->hanterButton('rez=hant','nameStatic=statia','returnValue')=='Удалить')
           {
             $killStroka=$classPhp->hanterButton('rez=hant','nameStatic=statia','returnName');
             $killStroka=preg_replace('/statia/','',$killStroka); // Удалить лишнее
             $killStroka=preg_replace('/kill/','',$killStroka); // Удалить лишнее
             $killStroka=preg_replace('/'.$_SESSION['login'].'/','',$killStroka); // Удалить лишнее
             $classPhp->killZapisTablicy($nametablice,'WHERE id='.$killStroka);
           }
         /////////////////////////////////////////////////////////////////////////////////////////////////////
         /////////////////////////////////////// работаем с кнопкой редактировать ////////////////////////////////// row button_statia
         if ($classPhp->hanterButton('rez=hant','nameStatic=statia','returnValue')=='Редактировать')
            {
              $redaktirowat=$classPhp->hanterButton('rez=hant','nameStatic=statia','returnName');
              $redaktirowat=preg_replace('/statia/','',$redaktirowat); // Удалить лишнее
              $redaktirowat=preg_replace('/redakt/','',$redaktirowat); // Удалить лишнее
              $redaktirowat=preg_replace('/'.$_SESSION['login'].'/','',$redaktirowat); // Удалить лишнее // нашли ID редактируемой статьи
              $_SESSION['redaktirowatId']=$redaktirowat;
              //echo '--'.$redaktirowat;
            }
                /////////////////////////////////////////////////////////////////////////////////////////////////////
            // Начало прорисовки блока
            // Проверим присутствует ли таблица блока, если нет, то создадим её
            if ($nametablice!='' && !$classPhp->searcNameTablic($nametablice))
                $classPhp->zaprosSQL("CREATE TABLE ".$nametablice."(id INT, name VARCHAR(200), news VARCHAR(65000), login_redaktora VARCHAR(200))");
            // проверим пустая ли таблица новостей, если да, то вывести кнопку добавления новости
            if ($classPhp->kolVoZapisTablice($nametablice)==0)
              $netNowostej=true;
                // Воспроизводим статью от pokazarStatijRedaktora-здесь хранится имя автора, чьи статьи показать
             $zapros='';
             if ($pokazarStatijRedaktora=='')
               $zapros="SELECT * FROM ".$nametablice." WHERE 1";
             if ($pokazarStatijRedaktora!='') 
               $zapros="SELECT * FROM ".$nametablice." WHERE login_redaktora='".$pokazarStatijRedaktora."'";
             //echo $zapros;
             $dataMas = array(array(),array(),array(),array());
             $rez=$classPhp->zaprosSQL($zapros);


             // сформируем отступ между статьями
             $otstupBr='<br>';
             for ($j=0; $j<$otstup;$j++) $otstupBr=$otstupBr.'<br>';
             

             $i=0; //Загрузить таблицу в массив
             while(!is_null($stroka=mysqli_fetch_assoc($rez)))
             {
               $dataMas[$i][0][0][0]=$stroka['id'];
               $dataMas[$i][1][0][0]=$stroka['name'];
               $dataMas[$i][0][1][0]=$stroka['news'];
               $dataMas[$i++][0][0][1]=$stroka['login_redaktora'];
             }
             
             // вывести статью согласно определенному шаблону.
             if ($hablon==1)
              for ($ii=0; $ii<$i; $ii++)
                {
                  echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0].'</div><small> автор: '.$dataMas[$ii][0][0][1].'</small>';
                  if ($redaktirowat==$dataMas[$ii][0][0][0]) 
                   {
                     $this->poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora);
                     $poleRedaktora=true;
                   }
                  if ($_SESSION['status']==4 
                    || $_SESSION['status']==5 
                     || $_SESSION['login']==$dataMas[$ii][0][0][1]
                      )
                  $classPhp->buttonPrefix('container','class=-row-','v1-Удалить','v2-Редактировать','v3-Добавить','n3-dobawitNow', // кнопки удалить и редактировать
                                          'n2-statia'.$_SESSION['login'].'redakt'.$dataMas[$ii][0][0][0],'n1-statia'.$_SESSION['login'].'kill'.$dataMas[$ii][0][0][0],
                                          'кнопок-3','c3=-'.$classKill.' btn-','c1=-'.$classKill.' btn-','c2=-'.$classRedakt.' btn-','action=-starki.php-');
                  echo $otstupBr;
                }
             if ($hablon==2)
                  for ($ii=$i-1; $ii>-1; $ii--)
                  {
                      echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0].'</div><small> автор: '.$dataMas[$ii][0][0][1].'</small>';
                      if ($redaktirowat==$dataMas[$ii][0][0][0]) 
                      {
                        $this->poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora);
                        $poleRedaktora=true;
                      }
                      if ($_SESSION['status']==4 
                      || $_SESSION['status']==5 
                       || $_SESSION['login']==$dataMas[$ii][0][0][1]
                        )
                        $classPhp->buttonPrefix('container','class=-row-','v1-Удалить','v2-Редактировать','v3-Добавить','n3-dobawitNow', // кнопки удалить и редактировать
                        'n2-statia'.$_SESSION['login'].'redakt'.$dataMas[$ii][0][0][0],'n1-statia'.$_SESSION['login'].'kill'.$dataMas[$ii][0][0][0],
                        'кнопок-3','c3=-'.$classKill.' btn-','c1=-'.$classKill.' btn-','c2=-'.$classRedakt.' btn-','action=-starki.php-');
                    echo $otstupBr;
                  }
                 
              
              if (isset($_POST['dobawitNow']) || $netNowostej)
              {
                $_SESSION['redaktirowatId']=-1;
                $this->poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora);
                 }

        }
        // вспомогательная функция к news1
        public function poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora)
         {
          
          $classPhp = new maty();
           //if ($razresheniePoLoginu) echo 'разрешение по логину';
           if ($nametablice!='' && $classPhp->searcNameTablic($nametablice))
            {

           if (!$razresheniePoLoginu &&  ($_SESSION['status']==4 || $_SESSION['status']==5)) // Запускаем это меню только если нет разрешения по логину
           {
            $zagolowok='';//echo 'разрешение по логину';
            $statia='';
            $awtor='';
            if ($_SESSION['redaktirowatId']>-1)  //если была нажата кнопка редактирования, то достать статью из базы
             {
               $zapros="SELECT * FROM ".$nametablice." WHERE id=".$_SESSION['redaktirowatId']; //настройка показа формы сбора данных
               $rez=$classPhp->zaprosSQL($zapros);
               if ($rez) $stroka=mysqli_fetch_assoc($rez);
               $zagolowok=$stroka['name'];
               $statia=$stroka['news'];
               $awtor=$stroka['login_redaktora'];
             }
            $classPhp->formBlock($nametablice."_redaktor", 'starki.php','text','zagolowok',$zagolowok,'br',
                                'textarea', 'statia',$statia,'br',
                                'p',$awtor,'br',
                                'submit3',$nametablice.'_redaktor','Сохранить','starki.php','myZoneSave'
                                );
            echo '<p class="mesage">&ltbr&gt - переход на новую строку</p>';
            echo '<p class="mesage">Вставить картинку можно через тег img. Пример &ltimg src="ссылка на картинку"&gt</p>'; 
            echo '<p class="mesage">Для видео ютуб дает готовую ссылку: поделиться/встроить и копируем ссылку, вставляем в текст статьи.</p>';
           }
           if ($razresheniePoLoginu) // Запускаем это меню только если есть разрешения по логину
            {
              $zagolowok='';
              $statia='';
              $awtor='';
              if ($_SESSION['redaktirowatId']>-1)  //если была нажата кнопка редактирования, то достать статью из базы
               {
                 $zapros="SELECT * FROM ".$nametablice." WHERE id=".$_SESSION['redaktirowatId']; //настройка показа формы сбора данных
                 $rez=$classPhp->zaprosSQL($zapros);
                 if ($rez) $stroka=mysqli_fetch_assoc($rez);
                 $zagolowok=$stroka['name'];
                 $statia=$stroka['news'];
                 $awtor=$stroka['login_redaktora'];
               }
              $classPhp->formBlock($nametablice."_redaktor", 'starki.php','text','zagolowok',$zagolowok,'br',
              'textarea', 'statia',$statia,'br',
              'p',$awtor,'br',
              'submit3',$nametablice.'_redaktor2','Сохранить','starki.php','myZoneSave'
              );
             echo '<p class="mesage">&ltbr&gt - переход на новую строку</p>';
             echo '<p class="mesage">Вставить картинку можно через тег img. Пример &ltimg src="ссылка на картинку"&gt</p>'; 
             echo '<p class="mesage">Для видео ютуб дает готовую ссылку: поделиться/встроить и копируем ссылку, вставляем в текст статьи.</p>'; 
            }
            }

         }

    } // конец класса modul

?>