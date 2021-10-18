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
           $razdel='';
           $action="dfdx.php";
           $pokazatStatiuPoId=-1;
           $prevju=150;
           $redaktorUser=false;
           $redaktorPodpis=false;
           $redaktorRedaktor=false;
           $_SESSION['action']='';

           if (!isset($_SESSION['mas_time_name_news']))
              $_SESSION['mas_time_name_news']='';
           if (!isset($_SESSION['mas_time_news']))  
               $_SESSION['mas_time_news']='';

           if (!isset($_SESSION['nomerStylaStatii']))
             $_SESSION['nomerStylaStatii']=0;
           // Ищем имя таблицы
            foreach($parametr as $value)
              if (stripos('sss'.$value,'nameTD='))
              {
                 $nametablice=preg_replace('/nameTD=/','',$value);
                 $nametablice=mb_strtolower($nametablice);
              }

            foreach($parametr as $value) // ищем обработчик кнопок Сохранить ...
              if (stripos('sss'.$value,'action='))
               {
                $action=preg_replace('/action=/','',$value);
                $_SESSION['action']=$action;
               }

           // Ищем размер заголовка
            foreach($parametr as $value)
              if (stripos('sss'.$value,'Заголовок='))
               $zagolowok=preg_replace('/Заголовок=/','',$value);

          // Проверяем задан ли раздел статей
            foreach($parametr as $value)
              if (stripos('sss'.$value,'Раздел='))
                 $razdel=preg_replace('/Раздел=/','',$value);

           // Статус редактора
             foreach($parametr as $value)
                if (stripos('sss'.$value,'Статус редактора='))
                 {
                     $statusRedaktora=preg_replace('/Статус редактора=/','',$value);
                     if (stripos('sss'.$value,'1')) $redaktorUser=true;
                     if (stripos('sss'.$value,'3')) $redaktorPodpis=true;
                     if (stripos('sss'.$value,'2')) $redaktorRedaktor=true;
                 }

           //проверяем логин
            foreach($parametr as $value)
                if (stripos('---'.$value,'Логин редактора='))
                 {
                     $loginRedaktora=preg_replace('/Логин редактора=/','',$value); // Выделяем логин редактора/ов
                     if (stripos('---'.$loginRedaktora,$_SESSION['login'])>0) 
                       $razresheniePoLoginu=true; // Если в списке логинов присутствует текущий логин, то разрешаем запуск открытого меню
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
              if (stripos('sss'.$value,'id='))
               {
                   $pokazatStatiuPoId=preg_replace('/id=/','',$value); // Вывести статью по Id
                   $pokazatStatiuPoId=$pokazatStatiuPoId*1;
               }
            
             ////////////////////////////////////////////////////////
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

            foreach($parametr as $value)
                  if (stripos('sss'.$value,'превью='))
                   {
                        $prevju=preg_replace('/превью=/','',$value); // Удалить лишнее
                    
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
                   echo '<p>Можно задать дополнительный маркер Раздел. news1("Раздел=html")</p>';
                   echo '<p>Ссылка на обработчик кнопок задается news1("action=dfdx.php")</p>';

                   echo '<p>Задать отступ между статьями. Пример: news1("Отступ=1"); Отступ равен одной строке</p>';

                   echo '<p>Работа с классами</p>';
                   echo '<p>Класс для кнопки удаления новости "classKill=-имя класса-"</p>';
                   echo '<p>Класс для кнопки редактирования новости "classRedakt=-имя класса-"</p>';
                   echo '<p>Класс для кнопки Сохранить новость "classSave=-имя класса-"</p>';

                   echo '<p>Выводимые статьи</p>';
                   echo '<p>Вывести статью по id: задать параметр "id=номер"</p>';

                   echo '<p></p>';
                   
                }

                             /////////////////////////////////////////////////////////////////////////////////////////////////////////
                         ///////////////////////////////////////////Нажали кнопку Запомнить Шаблон//////////////////////////////
                         if (isset($_POST['vvv']))
                         {
                          $_SESSION['mas_time_name_news']=$_POST['zagolowok']; //nl2br
                          $_SESSION['mas_time_news']=$_POST['statia'];//nl2br($_POST['statia']);
                         }
            // Запись статьи, если была нажата кнопка Сохранить
            if ($nametablice!='' && $classPhp->searcNameTablic($nametablice) 
              && ((isset($_POST[$nametablice.'_redaktor']) && $_POST[$nametablice.'_redaktor']=='Сохранить')
                || (isset($_POST[$nametablice.'_redaktor2']) && $_POST[$nametablice.'_redaktor2']=='Сохранить'))
               )
                 {
                 $dlinaStati=0;
                 $loginAwtora='';
                 $id=-1;
                 // Преобразовываем имя статьи и статью в нормальный вид и записываем. //&ltimg src="ссылка на картинку"&gt</p>';
                 $imieNowosti=$classPhp->bezMatov(quotemeta($classPhp->clearCode($_POST['zagolowok']))); // удалить мат заголовка

                 //Найти хештег Раздел
                 $mas=array();
                 $kluc=preg_match('/#[a-zA-Zа-яёА-ЯЁ0-9]+#?/',$_POST['statia'],$mas); // Поиск в текстк категории
                 //echo $mas[0];
                 if (!$kluc) $razdel='-';        // Если нет категории в тексте, то присвоить -
                   else $razdel=preg_replace('/#/','',$mas[0]);   // Удалить лишнее
                 //echo  $razdel;
                    $news=$classPhp->bezMatov(quotemeta($classPhp->clearCode(nl2br($_POST['statia'])))); // удаляем маты и теги из статьи

                  $dlinaStati=strlen($news); // длина статьи из текстового окна сайта
                   if (isset($_SESSION['redaktirowatId']) && $_SESSION['redaktirowatId']>-1) // если есть Ид статьи
                     { // Если Сохранить была нажата при редактировании существующей статьи
                     // найти старую длину статьи
                     $rez=$classPhp->zaprosSQL("select news FROM ".$nametablice." WHERE id=".$_SESSION['redaktirowatId']);
                     $stroka=mysqli_fetch_array($rez);
                     $dlinaStatiStara=strlen($stroka[0]); // -длина старой статьи
                     $dlinaStati=$dlinaStati-$dlinaStatiStara; // разница длин старой и отредактированной статьи
                     $classPhp->zaprosSQL("UPDATE ".$nametablice." SET name='".$imieNowosti."',news='".$news."',razdel='".$razdel."'  WHERE id=".$_SESSION['redaktirowatId']);
                     if ($_SESSION['status']==1 || $_SESSION['status']==3) // Если статью публикует подписчик или просто пользователь, то закинуть в раздел не проверенных
                        $classPhp->zaprosSQL("INSERT INTO status_statii_dfdx(id) VALUES (".$_SESSION['redaktirowatId'].")");
                     } 
                   else 
                    { // Если сохраняем новую статью
                      $id=$classPhp->maxIdLubojTablicy($nametablice);
                      $classPhp->zaprosSQL("INSERT INTO ".$nametablice."(id, name,news,login_redaktora,razdel) VALUES (".$id.", '".$imieNowosti."','".$news."', '".$_SESSION['login']."','".$razdel."')");
                      if ($_SESSION['status']==1 || $_SESSION['status']==3) // Если статью публикует подписчик или просто пользователь, то закинуть в раздел не проверенных
                       { 
                        $classPhp->zaprosSQL("INSERT INTO status_statii_dfdx(id) VALUES (".$id.")");
                        echo '<meta http-equiv="refresh" content="125; URL=dfdx.php">';
                        echo 'Статья отправлена на модерацию, страница вот-вот перезагрузится';
                       }
                    }

                    if ($_SESSION['status']==4 || $_SESSION['status']==5) // Если статью сохранили статусы 4 или 5 и её ИД есть в таблице возвращенных статей, то удалить этот ИД из данной таблицы
                      {
                        $classPhp->zaprosSQL("DELETE FROM vernul_statii_dfdx WHERE id=".$_SESSION['redaktirowatId']); 
                        // поиск автора редактируемой или создаваемой статьи
                        if (!isset($_SESSION['redaktirowatId']) || $_SESSION['redaktirowatId']<0) // признак того, что создается новая статья
                          $loginAwtora=$_SESSION['login'];
                        if (isset($_SESSION['redaktirowatId']) && $_SESSION['redaktirowatId']>-1)
                         {
                          $rez=$classPhp->zaprosSQL("select login_redaktora FROM ".$nametablice." WHERE id=".$_SESSION['redaktirowatId']);
                          $stroka=mysqli_fetch_array($rez);
                          $loginAwtora=$stroka[0];
                         }
                        $this->money('login='.$loginAwtora,'заплатить='.$dlinaStati); // добавить или отнять монеты
                      }

                    if ($_SESSION['status']==1 || $_SESSION['status']==3) // Если статью сохранили статусы 1 или 3 то удалить статью из таблицы возвратов
                        $classPhp->zaprosSQL("DELETE FROM vernul_statii_dfdx WHERE id=".$_SESSION['redaktirowatId']); 
                 
                        $_SESSION['mas_time_name_news']='';
                         $_SESSION['mas_time_news']='';
                 
                 }///////////////////////////////////////////////////////////////////////////////
                 if ((isset($_POST[$nametablice.'_redaktor']) || isset($_POST[$nametablice.'_redaktor2']))  && !isset($_POST['vvv'])) {$_SESSION['redaktirowatId']=-1;echo '<meta http-equiv="refresh" content="0; URL=dfdx.php">';}
         /////////////////////////////////////// работаем с кнопкой удалить ////////////////////////////////// row button_statia
         if ($classPhp->hanterButton('rez=hant','nameStatic=statia','returnValue')=='Удалить')
           {
             $killStroka=$classPhp->hanterButton('rez=hant','nameStatic=statia','returnName');
             $killStroka=preg_replace('/statia/','',$killStroka); // Удалить лишнее
             $killStroka=preg_replace('/kill/','',$killStroka); // Удалить лишнее
             $killStroka=preg_replace('/'.$_SESSION['login'].'/','',$killStroka); // Удалить лишнее $killStroka - ИД статьи, которую нужно удалить 

             if (($_SESSION['status']==4 || $_SESSION['status']==5) && $this->statusStati($killStroka)) 
             {
              $rez=$classPhp->zaprosSQL("select login_redaktora, news from ".$nametablice." where id=".$killStroka); // логин редактора и статья
              $stroka=mysqli_fetch_assoc($rez);
              $zaplatit=strlen($stroka['news']);
              $zaplatit=0-$zaplatit;
              $login=$stroka['login_redaktora'];
              $this->money('login='.$login,'заплатить='.$zaplatit);
             }
             $classPhp->killZapisTablicy($nametablice,'WHERE id='.$killStroka);
             $classPhp->killZapisTablicy('status_statii_dfdx','WHERE id='.$killStroka);
             $classPhp->killZapisTablicy('vernul_statii_dfdx','WHERE id='.$killStroka);
           }
         /////////////////////////////////////////////////////////////////////////////////////////////////////
         /////////////////////////////////////// работаем с кнопкой редактировать ////////////////////////////////// row button_statia
         
         if ($classPhp->hanterButton('rez=hant','nameStatic=statia','returnValue')=='Редактировать')
            {
              $redaktirowat=$classPhp->hanterButton('rez=hant','nameStatic=statia','returnName');
              $redaktirowat=preg_replace('/statia/','',$redaktirowat); // Удалить лишнее
              $redaktirowat=preg_replace('/redakt/','',$redaktirowat); // Удалить лишнее
              $redaktirowat=preg_replace('/'.$_SESSION['login'].'/','',$redaktirowat); // Удалить лишнее // нашли ID редактируемой статьи
              $_SESSION['redaktirowatId']=$redaktirowat; //Получить id редактируемой статьи
            }
          /////////////////////////////////////////////Кнопка Опубликовать
          if ($classPhp->hanterButton('rez=hant','nameStatic=opublikowat','returnNameDynamic',"false=www")!='www')
          {
            $id=$classPhp->hanterButton('rez=hant','nameStatic=opublikowat','returnNameDynamic',"false=www"); // находим ИД статьи
            $classPhp->killZapisTablicy('status_statii_dfdx','where id='.$id); // удаляем ИД статьи из таблицы не проверенных статей
            $rez=$classPhp->zaprosSQL('select news from bd2 where  id='.$id);
            $stroka=mysqli_fetch_array($rez);
            $zaplatit=strlen($stroka[0]);

            $rez=$classPhp->zaprosSQL('select login_redaktora from bd2 where  id='.$id);
            $stroka=mysqli_fetch_array($rez);
            $this->money('login='.$stroka[0],'заплатить='.$zaplatit);
          }

          // Вернуть на доработку
          if ($classPhp->hanterButton('rez=hant','nameStatic=vernut','returnNameDynamic',"false=www")!='www')
          {
            
            $id=$classPhp->hanterButton('rez=hant','nameStatic=vernut','returnNameDynamic',"false=www"); // находим ИД статьи
            if ($_POST['vernut'.$id]=='Вернуть')
             {
                $pricinaVozwrata=$_POST['pricina'];
                if ($_POST['pricina']=='Причина возврата') $pricinaVozwrata="Причина не указана";
                $rez=$classPhp->zaprosSQL("INSERT INTO vernul_statii_dfdx(id, komment) VALUES (".$id.",'".$pricinaVozwrata."')");// Добавить статью в базу возвращенных
             }
             if ($_POST['vernut'.$id]=='Отмена возврата' || $_POST['vernut'.$id]=='Отправить на проверку')
              $rez=$classPhp->zaprosSQL("DELETE FROM vernul_statii_dfdx WHERE id=".$id);
          }
                /////////////////////////////////////////////////////////////////////////////////////////////////////
            // Начало прорисовки блока
            // Проверим присутствует ли таблица блока, если нет, то создадим её
            if ($nametablice!='' && !$classPhp->searcNameTablic($nametablice))
                $classPhp->zaprosSQL("CREATE TABLE ".$nametablice."(id INT, name VARCHAR(200), news VARCHAR(65000), login_redaktora VARCHAR(200), razdel VARCHAR(100))");
            // проверим пустая ли таблица новостей, если да, то вывести кнопку добавления новости
            if ($classPhp->kolVoZapisTablice($nametablice)==0)
              $netNowostej=true;


             // Воспроизводим статью от pokazarStatijRedaktora-здесь хранится имя автора, чьи статьи показать
             $zapros='';
             if ($pokazarStatijRedaktora=='')
               $zapros="SELECT * FROM ".$nametablice." WHERE 1";
             if ($pokazarStatijRedaktora!='') 
               $zapros="SELECT * FROM ".$nametablice." WHERE login_redaktora='".$pokazarStatijRedaktora."'";

             $dataMas = array(array(),array(),array(),array(),array());
             $rez=$classPhp->zaprosSQL($zapros);


             // сформируем отступ между статьями
             $otstupBr='<br>';
             for ($j=0; $j<$otstup;$j++) $otstupBr=$otstupBr.'<br>';
             

             $i=0; //Загрузить таблицу в массив
             while(!is_null($stroka=mysqli_fetch_assoc($rez)))
             {
               $dataMas[$i][0][0][0][0]=$stroka['id'];
               $dataMas[$i][1][0][0][0]=$stroka['name'];
               $dataMas[$i][0][1][0][0]=$stroka['news'];//echo $dataMas[$i][0][1][0][0];
               $dataMas[$i][0][0][1][0]=$stroka['login_redaktora'];
               $dataMas[$i++][0][0][0][1]=$stroka['razdel'];
             }
             //проверим не была ли нажата кнопка заголовка статьи
             //строка находит ИД кнопки в обход входного параметра
             $nomerZagolowkaStati=$classPhp->hanterButton("rez=hant","nameStatic=statiaKorotka","returnNameDynamic",'false=www');

             if ($nomerZagolowkaStati!='www') $pokazatStatiuPoId=$nomerZagolowkaStati;
             $statusStatii=false;
             $pokazalStatej=0;
             // вывести статью согласно определенному шаблону.
             // Шаблон 1 не доделан, необходимо скопировать все изменения из шаблона 2
             // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

             

if ($hablon==2)
 if (!isset($_POST['dobawitNow']))
  for ($ii=$i-1; $ii>-1; $ii--)
    {             
                  if ($_SESSION['status']==1 || $_SESSION['status']==3)
                    $statiaVozwrat=$this->vernutStati($dataMas[$ii][0][0][0][0]); // Проверяет не вернута ли статья на доработку
                  else $statiaVozwrat=false;

                  $statusStatii=$this->statusStati($dataMas[$ii][0][0][0][0]); // проверяет статус статьи по ИД номеру, проверена она или ещё нет
                 
          if ($pokazatStatiuPoId<0 || ($pokazatStatiuPoId==$dataMas[$ii][0][0][0][0] && $statusStatii))
             if (stripos('sss'.$dataMas[$ii][0][0][0][1],$razdel) || $dataMas[$ii][0][0][0][1]=='-' || $razdel=='') // Если заданный раздел входит в категорию статьи
              { 
                  if ($statusStatii || (isset($_SESSION['login']) && $statiaVozwrat && $dataMas[$ii][0][0][1][0]==$_SESSION['login']))      // Если труе, то статья проверена модератором
                    if ($pokazalStatej==0 && $nomerZagolowkaStati=='www')  // первая статья не по клику по названию статьи
                     {
                      if (!$statiaVozwrat)  // показ первой статьи при обычных условиях
                       {
                        $class='statiaKrutka btn'; // класс заголовка по умолчанию
                        if ($this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon')>0)  // класс заголовка в зависимости от стиля
                         {
                          $hablon=$this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon'); // читаем тип шаблона из таблицы
                          $class='nazwanie'.$hablon.' btn'; // класс по шаблону

                          $perwSymbol=mb_substr($dataMas[$ii][0][1][0][0],0,1);  // подготовить первый символ
                          $text=mb_substr($dataMas[$ii][0][1][0][0],1); // подготовить оставшийся текст
                          
                          $text='<p class="perwaLitera'.$hablon.'">'.$perwSymbol.'</p><p class="osnownojText'.$hablon.'">'.$text.'</p>'; // подготовить весь текст
                         
 
                          //Находим содержимое свойства alt
                          if (preg_match('/alt=\"\w+\"/u',$text, $alt))
                          {
                          //echo 'перестраиваем<br>';
                            $alt=preg_filter('/alt=/','',$alt[0],-1);
                            $alt=preg_filter('/\"/','',$alt,-1);
                           //--------------------------------------------
                          // Находим содержимое URL
                          if (preg_match('/src.*alt/u',$text, $url))
                            {
                              $url=preg_filter('/src=/','',$url[0],-1);
                              $url=preg_filter('/alt/','',$url,-1);
                              $url=preg_filter('/\"/','',$url,-1);
                            } 
                            //---------------------------------------------
                            //Добавить див в начале ссылки
                            $text=preg_filter('/<img/','<div class="img-div-'.$hablon.'"><img ',$text,-1); // добавить див с классом к img
                            //Заменили урл на картинку на такой же урл, но обрамленный тегами ДИВ с классом нужного типа
                            $text=preg_filter('/src=.*"\s*>/','class="img-'.$hablon.'" src="'.$url.'" alt="'.$alt.'"></div>',$text,-1);
                          }

                          $text=preg_replace('/<code>/','<section class="container-fluid"><div class="row"><div class="col-12"><code><div class="kod'.$hablon.'">',$text); // вставить класс в теги code
                          $text=preg_replace('/<\/code>/','</div></code></div></div></section>',$text); // вставить класс в теги code

                          echo '<section class="container-fluid">';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<form method="post" action="'.$action.'"><input class="'.$class.'" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'"></form>';
                          echo '</div></div>';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<div>'.$text.'</div>';
                          echo '</div></div>';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';  
                          echo '</div></div></section>';
                        }
                        else
                        {
                          echo '<section class="container-fluid">';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<form method="post" action="'.$action.'"><input class="'.$class.'" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'"></form>';
                          echo '</div></div>';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<div>'.$dataMas[$ii][0][1][0][0].'</div>';
                          echo '</div></div>';
                          echo '<div class="row">';
                          echo '<div class="col-12">';
                          echo '<small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';  
                          echo '</div></div></section>';
                        }
                       }
                       
                      if ($statiaVozwrat)  // Показ статьи в случае, если её запостил статус 1 или 3
                       {
                       $class='statiaKrutka btn'; // класс заголовка по умолчанию
                       if ($this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon')>0) // класс заголовка в зависимости от стиля
                        {
                          $hablon=$this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon'); // читаем тип шаблона из таблицы
                          $class='nazwanie'.$hablon.' btn'; // класс по шаблону
                          $perwSymbol=mb_substr($dataMas[$ii][0][1][0][0],0,1);  // подготовить первый символ
                          $text=mb_substr($dataMas[$ii][0][1][0][0],1,strlen($dataMas[$ii][0][1][0][0])-1); // подготовить оставшийся текст
                          
                          $text=preg_replace('/<code>/','<section class="container-fluid"><div class="row"><div class="col-12"><code><div class="kod'.$hablon.'">',$text); // вставить класс в теги code
                          $text=preg_replace('/<\/code>/','</div></code></div></div></section>',$text); // вставить класс в теги code

                          $text='<p class="perwaLitera'.$hablon.'">'.$perwSymbol.'</p><p class="osnownojText'.$hablon.'">'.$text.'</p>'; // подготовить весь текст
                          
                        }
                        else
                          echo '<form method="post" action="'.$action.'"><input class="'.$class.'" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'">'.'<div>'.$text.'</div><small> автор: '.$dataMas[$ii][0][0][1][0].'</small></form>';  
                       echo $otstupBr;
                       echo 'Причина возврата: '.$this->vernutStatiKomment($dataMas[$ii][0][0][0][0]);
                       }
                      }
                  ///////////////////////////Вторая и следующие статьи//////////////////////////////
                  if ($statusStatii || (isset($_SESSION['login']) && $statiaVozwrat && $dataMas[$ii][0][0][1][0]==$_SESSION['login']))     // Если труе, то статья проверена модератором
                    if ($pokazalStatej>0 && $nomerZagolowkaStati=='www')   // вторая и дальше статья не по клику по названию статьи
                     {
                          $text=$dataMas[$ii][0][1][0][0]; 
                          //Находим содержимое свойства alt
                          if (preg_match('/alt=\"\w+\"/u',$text, $alt))
                            {
                              $alt=preg_filter('/alt=/','',$alt[0],-1);
                              $alt=preg_filter('/\"/','',$alt,-1);
                          // Находим содержимое URL
                              if (preg_match('/src.*alt/u',$text, $url))
                                {
                                  $url=preg_filter('/src=/','',$url[0],-1);
                                  $url=preg_filter('/alt/','',$url,-1);
                                  $url=preg_filter('/\"/','',$url,-1);
                                } 
                            echo '<div class="img-div-'.$hablon.'-next">';
                            echo '<img class="img-'.$hablon.'-nextMesage" src="'.$url.'" alt="'.$alt.'">';
                            echo '</div>';
                            }
                      $text=preg_filter('/<br>/','',$text);
                      $text=preg_filter('/[<>]/','',$text);
                      echo '<form method="post" action="'.$action.'"><input class="statiaKrutka btn" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'"></form>'.'<div>'.mb_substr($text,0,$prevju).'</div><small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';  
                      echo $otstupBr; 
                    }

                  //////////////////////////////////// Блок выводит статью при нажатии на её заголовок-///////////////////////////////////////
                  if ($statusStatii)// Если труе, то статья проверена модератором
                    if ($dataMas[$ii][0][0][0][0]==$nomerZagolowkaStati && $pokazalStatej==0) // Вывод по клику по заголовку статьи
                    {
                      $class='statiaKrutka btn';  // класс заголовка по умолчанию
                      if ($this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon')>0) // класс заголовка в зависимости от стиля
                       {
                        $hablon=$this->styliStati('id='.$dataMas[$ii][0][0][0][0],'id-hablon');
                        $class='nazwanie'.$hablon.' btn'; // класс по шаблону
                        $perwSymbol=mb_substr($dataMas[$ii][0][1][0][0],0,1);  // подготовить первый символ
                        $text=mb_substr($dataMas[$ii][0][1][0][0],1,strlen($dataMas[$ii][0][1][0][0])-1); // подготовить оставшийся текст
                        $text='<p class="perwaLitera'.$hablon.'">'.$perwSymbol.'</p><p class="osnownojText'.$hablon.'">'.$text.'</p>'; // подготовить весь текст
                        
                        
                          
                          //Находим содержимое свойства alt
                          if (preg_match('/alt=\"\w+\"/u',$text, $alt))
                          {
                          //echo 'перестраиваем<br>';
                          $alt=preg_filter('/alt=/','',$alt[0],-1);
                          $alt=preg_filter('/\"/','',$alt,-1);
                           //--------------------------------------------
                          // Находим содержимое URL
                          if (preg_match('/src.*alt/u',$text, $url))
                          {
                          $url=preg_filter('/src=/','',$url[0],-1);
                          $url=preg_filter('/alt/','',$url,-1);
                          $url=preg_filter('/\"/','',$url,-1);
                          } 
                            //---------------------------------------------
                          //Добавить див в начале ссылки
                          $text=preg_filter('/<img/','<div class="img-div-'.$hablon.'"><img ',$text,-1); // добавить див с классом к img
                          //Заменили урл на картинку на такой же урл, но обрамленный тегами ДИВ с классом нужного типа
                          $text=preg_filter('/src=.*"\s*>/','class="img-'.$hablon.'" src="'.$url.'" alt="'.$alt.'"></div>',$text,-1);
                          }
                        
                        $text=preg_replace('/<code>/','<section class="container-fluid"><div class="row"><div class="col-12"><div class="news-code"><code><div class="kod'.$hablon.'">',$text); // вставить класс в теги code
                        $text=preg_replace('/<\/code>/','</div></code></div></div></div></section>',$text); // вставить класс в теги code
                        //echo 'этот';
                        echo '<section class="container-fluid">';

                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo '<form method="post" action="'.$action.'"><input class="'.$class.'" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'"></form>';
                        echo '</div></div>';
                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo $text;
                        echo '</div></div>';
                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo '<small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';  
                        echo '</div></div></section>';

                        //echo '<p class="'.$class.'">'.$dataMas[$ii][1][0][0][0].'</p>'.'<div>'.$text.'</div><small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';
                       }
                      else
                      {
                        echo '<section class="container-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo '<form method="post" action="'.$action.'"><input class="'.$class.'" name="statiaKorotka'.$dataMas[$ii][0][0][0][0].'" type="submit" value="'.$dataMas[$ii][1][0][0][0].'"></form>';
                        echo '</div></div>';
                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo $dataMas[$ii][0][1][0][0];
                        echo '</div></div>';
                        echo '<div class="row">';
                        echo '<div class="col-12">';
                        echo '<small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';  
                        echo '</div></div></section>';
                       //echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0][0].'</div><small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';
                      }
                        $pokazalStatej=1;
                      //echo $otstupBr;
                    }

                //////////////////////////////////////////////////////////////////////////////////////////////////////
                  if (!$statusStatii)// Статья не проверена модератором
                    if ($_SESSION['status']==4 || $_SESSION['status']==5) // 
                    {
                      echo '<'.$zagolowok.'>'.$dataMas[$ii][1][0][0][0].'</'.$zagolowok.'>'.'<div>'.$dataMas[$ii][0][1][0][0].'</div><small> автор: '.$dataMas[$ii][0][0][1][0].'</small>';
                      echo '<section class="container-fluid">';
                      echo '<div class="row">';
                      echo '<div class="col-12">';
                      echo '<form action="'.$action.'" method="post">';
                      echo '<input type="submit" class="Publikacia btn" value="Опубликовать" name="opublikowat'.$dataMas[$ii][0][0][0][0].'">';
                      if (!$this->vernutStati($dataMas[$ii][0][0][0][0]))
                       {
                          echo '<input type="text"  value="Причина возврата" name="pricina" class="pricina">';
                          echo '<input type="submit" class="Publikacia btn" value="Вернуть" name="vernut'.$dataMas[$ii][0][0][0][0].'">';
                       }
                      else
                      if ($this->vernutStati($dataMas[$ii][0][0][0][0]))
                        {
                          echo '<input type="submit" class="Publikacia btn" value="Отмена возврата" name="vernut'.$dataMas[$ii][0][0][0][0].'">';
                          echo '<p>Причина возврата: '.$this->vernutStatiKomment($dataMas[$ii][0][0][0][0]).'</p>';
                        }
                      echo '</form>';
                      echo '</div>';
                      echo '</div>';
                      echo '</section>';
                    }
                  /////////////////////////////////////////////////////////////////////////////////////////////////////////

                if ($redaktorUser || $redaktorPodpis || $redaktorRedaktor) // если есть разрешение на редактирование статей для статусов 1,2 или 3
                  if ($_SESSION['status']>0  && $_SESSION['status']<4) // Если статус автора 1,2 или 3
                    if (($redaktorUser || $redaktorPodpis) && $statusStatii  || ($statiaVozwrat && $dataMas[$ii][0][0][1][0]==$_SESSION['login'])) // ЕСЛИ СТАТУС 1 или 3 и статья не на проверке
                     {
                      $value='Добавить';
                      if ($statiaVozwrat && $dataMas[$ii][0][0][1][0]==$_SESSION['login']) 
                       {
                        $classPhp->buttonPrefix('classButton=SaveLoadRedaktButton','container','class=-row-','v1-Удалить','v2-Редактировать','v3-Добавить','n3-dobawitNow', // кнопки удалить и редактировать
                        'n2-statia'.$_SESSION['login'].'redakt'.$dataMas[$ii][0][0][0][0],'n1-statia'.$_SESSION['login'].'kill'.$dataMas[$ii][0][0][0][0],
                        'кнопок-3','c3=-'.$classKill.' btn-','c1=-'.$classKill.' btn-','c2=-'.$classRedakt.' btn-','action=-"'.$action.'"-');
                       } else
                      $classPhp->buttonPrefix('classButton=SaveLoadRedaktButton','container','class=-row-','v1-'.$value,'n1-dobawitNow', // Кнопка Добавить
                      'кнопок-1','c1=-'.$classKill.' btn-','action=-"'.$action.'"-');
                      }
                   ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                  if ($statusStatii)   $pokazalStatej++;   // Если труе, то статья проверена модератором

                     ///////////////////////////////////Кнопки удаления, редактирования, добавления
                    if ($nomerZagolowkaStati=='www' || $dataMas[$ii][0][0][0][0]==$nomerZagolowkaStati) 
                     if ($_SESSION['status']==4 
                      || $_SESSION['status']==5 
                        )
                        $classPhp->buttonPrefix('classButton=SaveLoadRedaktButton','container','class=-row-','v1-Удалить','v2-Редактировать','v3-Добавить','n3-dobawitNow', // кнопки удалить и редактировать
                        'n2-statia'.$_SESSION['login'].'redakt'.$dataMas[$ii][0][0][0][0],'n1-statia'.$_SESSION['login'].'kill'.$dataMas[$ii][0][0][0][0],
                        'кнопок-3','c3=-'.$classKill.' btn-','c1=-'.$classKill.' btn-','c2=-'.$classRedakt.' btn-','action=-"'.$action.'"-');
                   ///////////////////////////////////////////////////////////////////////////////////////////////
                } // конец IF
                   if ($_SESSION['redaktirowatId']==$dataMas[$ii][0][0][0][0]) // Сравнение ИД статьи, которую следует редактировать с ИД текущей статьи
                      { 
                        $this->poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora,$action);
                        $poleRedaktora=true;
                      }
              
    } // конец FOR
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

              // Выводит поле редактирования в случае, если не вывелось ни одной статьи или нажата кнопка Добавить
             if (!$poleRedaktora)
              if (isset($_POST['dobawitNow']) || $netNowostej || (isset($_POST['vvv']) && $_SESSION['redaktirowatId']=-1))
               {
                
                $this->poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora,$action);
               }
             // $classPhp->formBlock($nametablice."_redaktor", $action,'text','zagolowok',$zagolowok,'br',
              //                    'textarea', 'statia',$statia,'br',
               //                   'p',$awtor,'br',
             ///////////////////////////////////////////Нажали кнопку Запомнить Шаблон//////////////////////////////
              if (isset($_POST['vvv']))
               {
                $this->styliStati('id='.$_SESSION['redaktirowatId'],'hablon='.$_SESSION['nomerStylaStatii']);
                //$_SESSION['mas_time_name_news']=$_POST['zagolowok'];
                //$_SESSION['mas_time_news']=$_POST['statia'];
                //echo 'запомнить--'.$_SESSION['mas_time_news'].'<br>';
               }
                             ////////////////////////////////////////////////////////////////////////////////////////////////////////

}
// служебная функция для задания стилей оформления статьи
function styliStati(...$parametr) // тут
{
  $classPhp = new maty();
    $classPhp->createTab(
        "name=styl_statii_dfdx",
        "poleN=id",   // будет соответствовать ИД статьи
        "poleT=int", 
        "poleS=-1",
        "poleN=nomer_styla", 
        "poleT=int",
        "poleS=-1"
    );

$variantow=0;   //число отображаемых радиокнопок
$idStati=-1;
$hablonStati=-1;
//////////////////////////////////////////////////////////////////////////////////////////////////////
$form_not_open=false;          // Управляет выводом открывающего тега Форм, если фалс, то выводим.
$form_not_close=false;         // Управляет выводом закрывающего тега Форм, если фалс, то выводим.
foreach ($parametr as $value)  // поиск признаков $form_not_open и $form_not_close=false;
 {
  if ($value=='form_not_open') $form_not_open=true;
  if ($value=='form_not_close') $form_not_close=true;
 }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    foreach($parametr as $value) // задать ИД статьи
      if (stripos('sss'.$value,'id='))
       $idStati=preg_replace('/id=/','',$value);

    foreach($parametr as $value) // задать шаблон статьи
      if (stripos('sss'.$value,'hablon='))
       $hablonStati=preg_replace('/hablon=/','',$value);

    foreach($parametr as $value) // задать шаблон статьи
      if (stripos('sss'.$value,'id-hablon') || stripos('sss'.$value,'hablon-id'))
       {
        $rez=$classPhp->zaprosSQL("select nomer_styla FROM styl_statii_dfdx WHERE id=".$idStati);
        $stroka=mysqli_fetch_array($rez);
        return $stroka[0];
       }


    foreach($parametr as $value)
    if ($value=='link' || $value=='образец')
      return  '<a href="obrazec.php" target="_blank">Посмотреть образцы оформлений</a>';

    
    foreach($parametr as $value) // показать радио кнопки
      if (stripos('sss'.$value,'вариантов='))
       {
        $stroka='';
        $variantow=preg_replace('/вариантов=/','',$value);
        $stroka=$stroka.'<section class="container-fluid"><div class="row"><div class="col-12">';
        if (!$form_not_open)
            $stroka=$stroka.'<form method="post" action="'.$_SESSION['action'].'">';
        for ($i=1; $i<=$variantow; $i++)
         {
          $stroka=$stroka.'<input type="radio" id="contactChoice'.$i.'" name="variant" value="№'.$i.'"';
          if ((isset($_POST['variant']) && $_POST['variant']=='№'.$i) || $_SESSION['nomerStylaStatii']==$i)
            {
            $stroka=$stroka.' checked ';
            $_SESSION['nomerStylaStatii']=$i;
            }
          $stroka=$stroka.'>';
          $stroka=$stroka.'<label for="contactChoice'.$i.'">№'.$i.'</label>';
         }

         $stroka=$stroka.'<input class="myZoneSave btn" type="submit" name="vvv" value="Выбрать">';
         if (!$form_not_close)
            $stroka=$stroka.'</form>';
         $stroka=$stroka.'</div></div></section>';
         return $stroka;
       }
       


      if ($idStati>-1 && $hablonStati>0) // реализация присвоения статье своего стиля
       {
        $classPhp->zaprosSQL("DELETE FROM styl_statii_dfdx WHERE id=".$idStati);
        $classPhp->zaprosSQL("INSERT INTO styl_statii_dfdx(id, nomer_styla) VALUES (".$idStati.",".$hablonStati.")");
       }

      //обработка параметра help
      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь' || $value=='помощь')
        {
          echo '<p>Функция работает со стилем оформления статьи</p>';
          echo '<p>Если задать параметр функции "link" или "образец", то функция возвращает ссылку с надписью Посмотреть образцы оформлений</p>';
          echo '<p>Задать число пунктов радиоблока можно параметром "вариантов=число пунктов", после нажатия на кнопку сохранить, информация сохранится в переменной $_SESSION["nomerStylaStatii"]</p>';
          echo '<p>Чтобы присвоить статье свой шаблон необходимо задать два параметра "id=" и "hablon="</p>';
          echo '<p>Чтобы узнать какой шаблон присвоен статье, нужно задать параметр "id-hablon" или "hablon-id" и нужен параметр "id="</p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
        } 

}
function money(...$parametr) // работа с символами или деньгами
 {
  $classPhp = new maty();
    $classPhp->createTab(
        "name=monety_dfdx",
        "poleN=login",
        "poleT=varchar(50)",
        "poleS=login",
        "poleN=monet",
        "poleT=int",
        "poleS=0"
    );
    
    $login='';
    $zaplatit=0;
    foreach($parametr as $value)
     if (stripos('sss'.$value,'login='))
      $login=preg_replace('/login=/','',$value);

    foreach($parametr as $value)
      if (stripos('sss'.$value,'заплатить='))
       $zaplatit=preg_replace('/заплатить=/','',$value);

    if ($login!='')// && $zaplatit>0) // Обработка параметра Логин + заплатить
     {
      $regaJest=false;
      $regaJest=$classPhp->siearcSlova('monety_dfdx','login',$login);
      if ($regaJest)
       {
        $rez=$classPhp->zaprosSQL("SELECT monet FROM monety_dfdx WHERE login='".$login."'");
        $stroka=mysqli_fetch_array($rez);
        $monet=$stroka[0];
        $monet=$monet+$zaplatit;
        $zapros="UPDATE monety_dfdx SET monet=".$monet." WHERE login='".$login."'";
        $classPhp->zaprosSQL($zapros);
       }
       if (!$regaJest)
       {
        $zapros="INSERT INTO monety_dfdx(login, monet) VALUES ('".$login."',".$zaplatit.") ";
        //$zapros="UPDATE monety_dfdx SET monet=".$monet." WHERE 1";
        $classPhp->zaprosSQL($zapros);
       }
     }

    if ($login!='' && $zaplatit==0) // Обработка параметра Логин
     {
       $rez=$classPhp->zaprosSQL("SELECT monet FROM monety_dfdx WHERE login='".$login."'");
       $stroka=mysqli_fetch_array($rez);
       return $stroka[0];
     }

      //обработка параметра help
      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь')
        {
          echo '<p>Функция проверяет существует ли таблица монет, если нет, то создает её и присваивает начальные значения</p>';
          echo '<p>Чтобы функция вернула число монет пользователя, необходимо задать логин путем "login=логин игрока". Функция возвращает значение и выходит</p>';
          echo '<p>Чтобы добавить число монет человеку, вводим логин и заплатить."login=логин игрока", "заплатить=1000" </p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
          echo '<p></p>';
        } 
 }
        // вспомогательная функция к news1
        public function statusStati($id) // Проверяет статус статьи, проверил её модератор или нет
        {                                // если Труе, то можно показать статью
          $classPhp = new maty();
          $classPhp->createTab(
              "name=status_statii_dfdx",
              "poleN=id",
              "poleT=int",
              "poleS=-1"
          );
          $rez=$classPhp->zaprosSQL("SELECT id FROM status_statii_dfdx WHERE 1");
          while (!is_null($stroka=mysqli_fetch_array($rez))) 
           if ($id==$stroka[0]) return false;
          return true;
        }
        // вспомогательная функция к news1
        public function vernutStati($id) // Возврат статьи на доработку, возвращает труе, если вернули статью
        {                                //
          $classPhp = new maty();
          $classPhp->createTab(
              "name=vernul_statii_dfdx",
              "poleN=id",
              "poleT=int",
              "poleS=-1",
              "poleN=komment",
              "poleT=varchar(500)",
              "poleS=ноу комент))"
          );
          $rez=$classPhp->zaprosSQL("SELECT id FROM vernul_statii_dfdx WHERE 1");
          while (!is_null($stroka=mysqli_fetch_array($rez))) 
           if ($id==$stroka[0]) return true;
          return false;
        }
        public function vernutStatiKomment($id) // Возврат коммента при возврате статьи
        {                                //
          $classPhp = new maty();
          $rez=$classPhp->zaprosSQL("SELECT komment FROM vernul_statii_dfdx WHERE id=".$id);
          $stroka=mysqli_fetch_array($rez);
          return $stroka[0];
        }
        // вспомогательная функция к news1
        public function poleRedaktStatia($nametablice,$razresheniePoLoginu,$statusRedaktora,$action)
         {
          
          $classPhp = new maty();
           if ($nametablice!='' && $classPhp->searcNameTablic($nametablice))
            {

           if (!$razresheniePoLoginu &&  ($_SESSION['status']>0)) //|| $_SESSION['status']<6)) // Запускаем это меню только если нет разрешения по логину
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
               $zagolowok=$stroka['name'];
               $awtor=$stroka['login_redaktora'];
             } 
            if ($_SESSION['mas_time_news']!='') $statia=$_SESSION['mas_time_news'];
            if ($_SESSION['mas_time_name_news']!='') $zagolowok=$_SESSION['mas_time_name_news'];
            $statia=preg_replace('/<br>/','',$statia);
            $classPhp->formBlock($nametablice."_redaktor", $action,'text','zagolowok',$zagolowok,'br',
                                'textarea', 'statia',$statia,'br',
                                'p',$awtor,'br',
                                'submit3',$nametablice.'_redaktor','Сохранить',$action,'myZoneSave','form_not_close'
                                );
                                
            echo '<div class="container-fluid">';
             echo '<div class="row">';
              echo '<div class="col-12">'; 
              echo '<h6 class="mesage helpPodRedaktoromStatejH6">Ниже можно выбрать стиль оформления статьи >>>'.$this->styliStati('link').'</h6>';
              echo $this->styliStati('вариантов=3','form_not_open');
              echo '</div>';
              echo '<div class="col-12">'; 
               echo '<h6 class="mesage helpPodRedaktoromStatejH6">Список существующих категорий:</h6>';
               echo '<h6 class="mesage helpPodRedaktoromStatejH6">'.listKategorijNews1($nametablice).'</h6>';
               
              echo '</div>';
             echo '</div>';
              echo '<div class="row">';
                echo '<div class="col-12">';       
                  echo '<div class="helpPodRedaktoromStatej">';           
                    echo '<h6 class="mesage helpPodRedaktoromStatejH6">Чтобы задать раздел, в который попадет статья, необходимо задать его между двумя символами #Раздел#<br>в любом месте статьи.</h6>';                    
                    echo '<h6 class="mesage helpPodRedaktoromStatejH6">&ltbr&gt - переход на новую строку</h6>';
                    echo '<h6 class="mesage helpPodRedaktoromStatejH6">Вставить картинку можно через тег img. Пример &ltimg src="ссылка на картинку"&gt</h6>'; 
                    echo '<h6 class="mesage helpPodRedaktoromStatejH6">Для видео ютуб дает готовую ссылку: поделиться/встроить и копируем ссылку, вставляем в текст статьи.</h6>';
                 echo '</div>';
                echo '</div>';
              echo '</div>';

              echo '<div class="row">';
               echo '<div class="col-12">';  
                 echo '<div class="helpPodRedaktoromStatejDopTegi">';
                   echo '<h6>Допустимые теги:'.$classPhp->clearCode('','список').'</h6>';
                 echo '</div>';
                echo '</div>';
              echo '</div>';

            echo '</div>';

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
                 if ($_SESSION['mas_time_news']!='') $statia=$_SESSION['mas_time_news'];
                 if ($_SESSION['mas_time_name_news']!='') $zagolowok=$_SESSION['mas_time_name_news'];
                 $statia=preg_replace('/<br>/','',$statia);
              $classPhp->formBlock($nametablice."_redaktor", $action,'text','zagolowok',$zagolowok,'br',
              'textarea', 'statia',$statia,'br',
              'p',$awtor,'br',
              'submit3',$nametablice.'_redaktor2','Сохранить',$action,'myZoneSave','form_not_close'
              );


              echo '<div class="container-fluid">';
              echo '<div class="row">';
               echo '<div class="col-12">'; 
               echo '<h6 class="mesage helpPodRedaktoromStatejH6">Ниже можно выбрать стиль оформления статьи. >>>'.$this->styliStati('link').'</h6>';
               echo $this->styliStati('вариантов=3','form_not_open');
              echo '</div>';
               echo '<div class="col-12">'; 
                echo '<h6 class="mesage helpPodRedaktoromStatejH6">Список существующих категорий:</h6>';
                echo '<h6 class="mesage helpPodRedaktoromStatejH6">'.listKategorijNews1($nametablice).'</h6>';
                
               echo '</div>';
              echo '</div>';
               echo '<div class="row">';
                 echo '<div class="col-12">';       
                   echo '<div class="helpPodRedaktoromStatej">';           
                     echo '<h6 class="mesage helpPodRedaktoromStatejH6">Чтобы задать раздел, в который попадет статья, необходимо задать его между двумя символами #Раздел#<br>в любом месте статьи.</h6>';                    
                     echo '<h6 class="mesage helpPodRedaktoromStatejH6">&ltbr&gt - переход на новую строку</h6>';
                     echo '<h6 class="mesage helpPodRedaktoromStatejH6">Вставить картинку можно через тег img. Пример &ltimg src="ссылка на картинку"&gt</h6>'; 
                     echo '<h6 class="mesage helpPodRedaktoromStatejH6">Для видео ютуб дает готовую ссылку: поделиться/встроить и копируем ссылку, вставляем в текст статьи.</h6>';
                  echo '</div>';
                 echo '</div>';
               echo '</div>';
 
               echo '<div class="row">';
                echo '<div class="col-12">';  
                  echo '<div class="helpPodRedaktoromStatejDopTegi">';
                    echo '<h6>Допустимые теги:'.$classPhp->clearCode('','список').'</h6>';
                  echo '</div>';
                 echo '</div>';
               echo '</div>';
 
             echo '</div>';
 

            }
            }
         }

    } // конец класса modul

?>