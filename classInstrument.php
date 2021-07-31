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
           // Ищем имя таблицы
            foreach($parametr as $value)
              if (stripos('sss'.$value,'nameTD='))
                 $nametablice=preg_replace('/nameTD=/','',$value);

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
                if (stripos('sss'.$value,'Логин редактора='))
                 {
                    // echo 'зашли <br>';
                     $loginRedaktora=preg_replace('/Логин редактора=/','',$value); // Выделяем логин редактора/ов
                     if (stripos('sss'.$loginRedaktora,$_SESSION['login'])) $razresheniePoLoginu=true; // Если в списке логинов присутствует текущий логин, то разрешаем запуск открытого меню
                 }
           //ищем чьи статьи показать
           foreach($parametr as $value)
            if (stripos('sss'.$value,'Статьи редактора='))
             {
                  $pokazarStatijRedaktora=preg_replace('/Статьи редактора=/','',$value); // Выделяем логин редактора/ов
             }
           foreach($parametr as $value)
             if (stripos('sss'.$value,'Шаблон='))
              {
                   $hablon=preg_replace('/Шаблон=/','',$value); // Выделяем логин редактора/ов
              }
           foreach($parametr as $value)
              if (stripos('sss'.$value,'Отступ='))
               {
                    $otstup=(int)preg_replace('/Отступ=/','',$value); // Выделяем логин редактора/ов
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
                   
                }
            // Начало прорисовки блока
            // Проверим присутствует ли таблица блока, если нет, то создадим её
            if ($nametablice!='' && !$classPhp->searcNameTablic($nametablice))
             {
                $classPhp->zaprosSQL("CREATE TABLE ".$nametablice."(id INT, name VARCHAR(200), news VARCHAR(65000), login_redaktora VARCHAR(200))");
             }
             // Воспроизводим статью от pokazarStatijRedaktora-здесь хранится имя автора, чьи статьи показать
             
             $zapros='';
             if ($pokazarStatijRedaktora=='')
               $zapros="SELECT * FROM ".$nametablice." WHERE 1";
             if ($pokazarStatijRedaktora!='') 
               $zapros="SELECT * FROM ".$nametablice." WHERE login_redaktora='".$pokazarStatijRedaktora."'";
             //echo $zapros;
             $dataMas = array(array(),array(),array(),array());
             $rez=$classPhp->zaprosSQL($zapros);

             $i=0; //Загрузить таблицу в массив
             while(!is_null($stroka=mysqli_fetch_array($rez)))
             {
               $dataMas[$i][0][0][0]=$stroka['id'];
               $dataMas[$i][1][0][0]=$stroka['name'];
               $dataMas[$i][0][1][0]=$stroka['news'];
               $dataMas[$i++][0][0][1]=$stroka['login_redaktora'];
               
             }
             // сформируем отступ между статьями
             $otstupBr='<br>';
             for ($j=0; $j<$otstup;$j++) $otstupBr=$otstupBr.'<br>';
             
             if ($hablon==1)
              for ($ii=0; $ii<$i; $ii++)
                  echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0].'</div><small> автор: '.$dataMas[$ii][0][0][1].'</small>'.$otstupBr;
             if ($hablon==2)
                  for ($ii=$i-1; $ii>-1; $ii--)
                      echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0].'</div><small> автор: '.$dataMas[$ii][0][0][1].'</small>'.$otstupBr;
    
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
                 $classPhp->zaprosSQL("INSERT INTO ".$nametablice."(id, name,news,login_redaktora) VALUES (".$classPhp->maxIdLubojTablicy($nametablice).", '".$imieNowosti."','".$news."', '".$_SESSION['login']."')");
                 ///////////////////////////////////////////////////////////////////////////////

             }
            // Проверим присутствует ли таблица для редактора статей, если нет, то создадим её
            // Меню формируется с заданными правами
          if ($nametablice!='' && !$classPhp->searcNameTablic($nametablice.'_redaktor'))
             {
                $classPhp->zaprosSQL("CREATE TABLE ".$nametablice."_redaktor(ID INT, NAME VARCHAR(65000), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(50))");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (0, 'zagolowok','text2','news1_redaktor_text2','".$statusRedaktora."')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (1, 'br','text','news1_redaktor_br','".$statusRedaktora."')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (2, 'statia','textarea','news1_redaktor_textarea','".$statusRedaktora."')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (3, 'br','text','news1_redaktor_br','".$statusRedaktora."')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (4, 'Сохранить','starki.php','news1_redaktor_button','".$statusRedaktora."')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor(ID, NAME, URL, CLASS, STATUS) VALUES (5, 'br','text','news1_redaktor_br','".$statusRedaktora."')");
            
            }
            // Проверим присутствует ли таблица для редактора статей, если нет, то создадим её
            // Даное меню создается открытым для всех и запускается в случае, если зашел человек с нужным логином
           if ($nametablice!='' && !$classPhp->searcNameTablic($nametablice.'_redaktor2'))
             {
                $classPhp->zaprosSQL("CREATE TABLE ".$nametablice."_redaktor2(ID INT, NAME VARCHAR(65000), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(50))");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (0, 'zagolowok','text2','news1_redaktor_text2','-s12345')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (1, 'br','text','news1_redaktor_br','-s12345')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (2, 'statia','textarea','news1_redaktor_textarea','-s12345')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (3, 'br','text','news1_redaktor_br','-s12345')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (4, 'Сохранить','starki.php','news1_redaktor_button','-s12345')");
                $classPhp->zaprosSQL("INSERT INTO ".$nametablice."_redaktor2(ID, NAME, URL, CLASS, STATUS) VALUES (5, 'br','text','news1_redaktor_br','-s12345')");
            
            }
            if ($nametablice!='' && $classPhp->searcNameTablic($nametablice))
             {

            if (!$razresheniePoLoginu) // Запускаем это меню только если нет разрешения по логину
             $classPhp->__unserialize('menu9',$nametablice.'_redaktor',array('starki.php','Название новости','Текст новости'));
            if ($razresheniePoLoginu) // Запускаем это меню только если есть разрешения по логину
             $classPhp->__unserialize('menu9',$nametablice.'_redaktor2',array('starki.php','Название новости','Текст новости'));
             }
             echo '<p>Вставить картинку можно через тег img. Пример &ltimg src="ссылка на картинку"&gt</p>'; 
             echo '<p>Для видео ютуб дает готовую ссылку: поделиться/встроить и копируем ссылку, вставляем в текст статьи.</p>'; 
        }

    } // конец класса modul

?>