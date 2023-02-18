<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceCollectScolding
{

          public function save_ot_polsovatelej()  // Функция переноса мата из временной таблицы в постоянную
          {
              if (isset($this->mat_polsovat[0]))
                  foreach($this->mat_polsovat as $value)
                          if (isset($_POST['save_mat_ot_polzovatelej_'.$value])) {// Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                              $this->zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
                              $this->zaprosSQL("INSERT INTO maty(mat) VALUES ('".$value."')");
                          }
          }

          public function zablokirovanMaty()  // Функция блокировка пользователя
          {
              $vivod=false;
              $rez=$this->zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // проверяем заблокирован ли пользователь на добавление матов
              while(!is_null($stroka=mysqli_fetch_array($rez)))
                    if ($stroka[0]==$_SESSION['login']) {// Если была нажата кнопка, блокировки пользователя
                        $vivod=true; break;
                      }
              return $vivod;
          }

          public function razblokirovka_polsovatelej()  // Функция разблокировка пользователя
          {
              $rez=$this->zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // получаем все логины со статусами от 1 до 5
              while(!is_null($stroka=mysqli_fetch_array($rez)))
                    if (isset($_POST['buttonListBocked'.$stroka[0]])) // Если была нажата кнопка, блокировки пользователя
                        $this->zaprosSQL("DELETE FROM blocked_list_dobavit_mat WHERE login='".$stroka[0]."'"); 
          }

          public function kill_ot_polsovatelej()  // Функция быстрое удаление конкретного слова через его кнопку
          {
              if (isset($this->mat_polsovat[0]))
                  foreach($this->mat_polsovat as $value)
                          if (isset($_POST['kill_mat_ot_polzovatelej_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                              $this->zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
          }

          public function list_block_save()  // Функция блокировки пользователя для добавления матов.
          {
              $rez=$this->zaprosSQL("SELECT login FROM status_klienta WHERE status>0 AND status<6"); // получаем все логины со статусами от 1 до 5
              while(!is_null($stroka=mysqli_fetch_array($rez))) 
                    if (isset($_POST['blok_user_mat_ot_polzovatelej_'.$stroka[0]])) {// Если была нажата кнопка, блокировки пользователя
                        $id=$this->maxIdLubojTablicy('blocked_list_dobavit_mat');
                        if ($id<1) $id=1;
                        $this->zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$stroka[0]."')");
               }
          }

          public function kill_nie_mat()
          {
              if (isset($this->nie_mat[0]))
                  foreach($this->nie_mat as $value)
                          if (isset($_POST['nie_maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                              $this->zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$value."'"); 
          }

          public function kill_mat()
          {
              if (isset($this->mas_mat[0]))
                  foreach($this->mas_mat as $value)
                          if (isset($_POST['maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                              $this->zaprosSQL("DELETE FROM maty WHERE mat='".$value."'"); 
          }

          public function searcNieMata($nie_mat)
          {
              // сначала проверим наличие слова
              $rez=$this->zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$nie_mat."'");
              $stroka=mysqli_fetch_array($rez);
              if ($stroka[0]) return true;
              return false;
           }

          public function searcMata($mat)
          {
              // сначала проверим наличие слова
              $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE mat='".$mat."'");
              $stroka=mysqli_fetch_array($rez);
              if ($stroka[0]) return true;
              return false;
           }

          public function createRegularNotRegistr($value) // функция возвращает преобразованные слова для регистронезависимого поиска
          {
              $value=preg_replace('/а|А/','(а|А)+?',$value);
              $value=preg_replace('/б|Б/','(б|Б)+?',$value);
              $value=preg_replace('/в|В/','(в|В)+?',$value);
              $value=preg_replace('/г|Г/','(г|Г)+?',$value);
              $value=preg_replace('/д|Д/','(д|Д)+?',$value);
              $value=preg_replace('/е|Е/','(е|Е)+?',$value);
              $value=preg_replace('/ё|Ё/','(ё|Ё)+?',$value);
              $value=preg_replace('/ж|Ж/','(ж|Ж)+?',$value);
              $value=preg_replace('/з|З/','(з|З)+?',$value);
              $value=preg_replace('/и|И/','(и|И)+?',$value);
              $value=preg_replace('/й|Й/','(й|Й)+?',$value);
              $value=preg_replace('/к|К/','(к|К)+?',$value);
              $value=preg_replace('/л|Л/','(л|Л)+?',$value);
              $value=preg_replace('/м|М/','(м|М)+?',$value);
              $value=preg_replace('/н|Н/','(н|Н)+?',$value);
              $value=preg_replace('/о|О/','(о|О)+?',$value);
              $value=preg_replace('/п|П/','(п|П)+?',$value);
              $value=preg_replace('/р|Р/','(р|Р)+?',$value);
              $value=preg_replace('/с|С/','(с|С)+?',$value);
              $value=preg_replace('/т|Т/','(т|Т)+?',$value);
              $value=preg_replace('/у|У/','(у|У)+?',$value);
              $value=preg_replace('/ф|Ф/','(ф|Ф)+?',$value);
              $value=preg_replace('/х|Х/','(х|Х)+?',$value);
              $value=preg_replace('/ч|Ч/','(ч|Ч)+?',$value);
              $value=preg_replace('/ц|Ц/','(ц|Ц)+?',$value);
              $value=preg_replace('/ш|Ш/','(ш|Ш)+?',$value);
              $value=preg_replace('/щ|Щ/','(щ|Щ)+?',$value);
              $value=preg_replace('/ъ|Ъ/','(ъ|Ъ)+?',$value);
              $value=preg_replace('/ы|Ы/','(ы|Ы)+?',$value);
              $value=preg_replace('/ь|Ь/','(ь|Ь)+?',$value);
              $value=preg_replace('/э|Э/','(э|Э)+?',$value);
              $value=preg_replace('/ю|Ю/','(ю|Ю)+?',$value);
              $value=preg_replace('/я|Я/','(я|Я)+?',$value);
              $hablon=$value;
              return $hablon;
           }
 
          public function bezMatov($text) // функция находит совпадения матов и меняет их на звездочки и возвращает результат
          {
              $rezultat=$text;
              if (isset($this->mas_mat[0]))
                  foreach($this->mas_mat as $value) {  
                          $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                          $vyragenie='/(^|\s|\W|\d)'.$hablon.'($|\s|(\W)|\d+)?/uUmi';
                          $rezultat=preg_replace($vyragenie,'**',$rezultat);
                   }
              return $rezultat;
           }

          public function echoBezMatov($text)
          {
              $rezultat=$text;
              if (isset($this->mas_mat[0]))
                  foreach($this->mas_mat as $value) {  
                          $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                          $vyragenie='/(^|\s|\W|\d)'.$hablon.'($|\s|(\W)|\d+)?/uUmi';
                          $rezultat=preg_replace($vyragenie,'**',$rezultat);
                     }
              echo $rezultat;
          }

         public function echoBezMatovPlusIsklucenia($text) 
         {  // Не работает!!!!!!!!!!!!!!!!!!!!!!!!
             $rezultat=$text;
             echo $text.'<br>';
             $mas_rezult=$masRezult[0];
             foreach($mas_rezult as $value) { 
                     $hablon=$this->createRegularNotRegistr($value);  // сделать матюк регистронезависимым
                     $vyragenie='/\s('.$hablon.')\s?/';
                     $rezultat=preg_replace($vyragenie,' ** ',$rezultat);
              }
          }

          public function sborMatov() 
          {
            $zapros="SELECT nastr FROM tablica_nastroer_dvigka_int WHERE id=1"; //настройка показа формы сбора данных
            $rez=$this->zaprosSQL($zapros);
            if ($rez) $stroka=mysqli_fetch_array($rez);
            return $stroka[0];
          }
          
          public function proverkaMata($slovo) // проверяет входной параметр на соответствие мату из базы данных
          {
            $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
            while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ($slovo==$stroka[0]) return true;
            return false;
          }

          public function initDataWithLanguage()
          {
            $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
            $rez_nieMat=$this->zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
            $rez_mat_polsovat=$this->zaprosSQL("SELECT mat FROM mat_ot_polzovatelej WHERE 1");
             $i=0;
            //Читаем таблицу ы массив mat_polsovat
            while(!is_null($stroka=mysqli_fetch_array($rez))) {
               $this->mas_mat[$i]=$stroka[0];
               $i++;
             }
             $i=0;
            //Читаем таблицу ы массив
            while(!is_null($stroka=mysqli_fetch_array($rez_nieMat))) {
               $this->nie_mat[$i]=$stroka[0];
               $i++;
             }
            $i=0;
            while(!is_null($stroka=mysqli_fetch_array($rez_mat_polsovat))) {
               $this->mat_polsovat[$i]=$stroka[0];
               $i++;
             }
          }

          public function redactMaty() // Работа с меню ретактирования таблицы матов
          {
              $this->razblokirovka_polsovatelej();  // Функция разблокировка пользователя
              $this->list_block_save(); // функция проверяет не была ли нажата кнопка блокировки пользователя, если была, то заносит логин в таблицу банов
              $this->kill_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
              $this->kill_nie_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
              $this->kill_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова пользователей
              $this->save_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого переноса слова из временной таблицы пользователей в постоянную
              $this->menu4('menu_maty','redaktor.php');
              ///////////////////////////////////////начало работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
              echo '<br>';
              if (isset($_POST['vklSborMatov']))
                  $this->zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=1 WHERE id=1");
              if (isset($_POST['vyklSborMatov']))
                  $this->zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=0 WHERE id=1");
              if ($this->sborMatov()==1) {// Значит сбор матов включен, поставить кнопку выключения
                  echo '<div class="vklSborMatovDiv">';
                  echo '<form method="POST" action="redaktor.php">';
                  echo '<input type="submit" class="vyklSborMatov" name="vyklSborMatov" value="Выключить форму сбора нецензурных слов от пользователей">';
                  echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
                  echo '</form>';
                  echo '</div>';
                  echo '<br>';             
               } else // иначе сбор матов выключен, поставить кнопку включения
                      {
                          echo '<div class="vklSborMatovDiv">';
                          echo '<form method="POST" action="redaktor.php">';
                          echo '<input type="submit" class="vklSborMatov" name="vklSborMatov" value="Включить форму сбора нецензурных слов от пользователей">';
                          echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
                          echo '</form>';
                          echo '</div>';
                          echo '<br>';
                       }
               //////////////////конец работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
               ////////// Показать список заблокированных пользователей
               if (isset($_POST['buttonListBocked'])) {
                   $rez=$this->zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1");
                   echo '<section class="container-fluid">';
                   echo '<form action="redaktor.php" method="post">';
                   while(!is_null($stroka=mysqli_fetch_array($rez))) {
                         echo '<div class="row">';
                         echo '<div class="col">';
                         echo '<input class="buttonListBocked" type="submit" name="buttonListBocked'.$stroka[0].'" value="Разблокировать ('.$stroka[0].')">';
                         echo '</div>';
                         echo '</div>';
                      }
                   echo '</section>';
                   echo 'Конец списка';
                }

               if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить мат' && $_POST['mat_text']!='') {
                   // Если слово есть, то удаляем
                   if ($this->searcMata($_POST['mat_text'])) {
                       $this->zaprosSQL("DELETE FROM maty WHERE mat='".$_POST['mat_text']."'");
                       //Снова проверяем наличие слова в БД
                       if ($this->searcMata($_POST['mat_text'])) echo 'Не удалось удалить';
                       if (!$this->searcMata($_POST['mat_text'])) echo 'Слово удалено<br>';
                    }
                // если слова нет, то заносим его в базу данных
                if (!$this->searcMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
             }

             if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить не мат' && $_POST['mat_text']!='') {
                 // Если слово есть, то удаляем
                 if ($this->searcNieMata($_POST['mat_text'])) {
                     $this->zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
                     //Снова проверяем наличие слова в БД
                     if ($this->searcNieMata($_POST['mat_text'])) echo 'Не удалось удалить';
                     if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово удалено<br>';
                  }
                 // если слова нет, то заносим его в базу данных
                 if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
             }

      if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать') {
          $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE 1");
          echo '<section class="container-fluid">';
          echo '<form action="redaktor.php" method="post">';
          while(!is_null($stroka=mysqli_fetch_array($rez))) {
             echo '<div class="row">';
             echo '<div class="col">';
             echo '<input class="button_maty" type="submit" name="maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
             echo '</div>';
             echo '</div>';
           }
          echo '</section>';
          echo 'Конец списка';
         }
        if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать не маты') {// Рисуем кнопки нематов
           $rez=$this->zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
           echo '<section class="container-fluid">';
           echo '<form action="redaktor.php" method="post">';
           while(!is_null($stroka=mysqli_fetch_array($rez))) {
              echo '<div class="row">';
              echo '<div class="col">';
              echo '<input class="button_nie_maty" type="submit" name="nie_maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
              echo '</div>';
              echo '</div>';
            }
           echo '</section>';
           echo 'Конец списка';
          }

       if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='От пользователей') {// Рисуем кнопки матов от пользователей
            $rez=$this->zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE 1");
            echo '<section class="container-fluid">';
            echo '<form action="redaktor.php" method="post">';
            while(!is_null($stroka=mysqli_fetch_assoc($rez))) {
               echo '<div class="row">';
               echo '<div class="col">';
               echo '<input class="button_mat_ot_polzovatelej_list" type="submit" name="kill_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Пользователь '.$stroka['login'].' добавил мат ('.$stroka['mat'].'). Удалить!">';
               echo '<input class="button_mat_ot_polzovatelej_save" type="submit" name="save_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Сохранить">';
               echo '<input class="button_mat_ot_polzovatelej_block" type="submit" name="blok_user_mat_ot_polzovatelej_'.$stroka['login'].'" value="Заблокировать пользователя - '.$stroka['login'].'">';
               echo '</div>';
               echo '</div>';
             }
            echo '</section>';
            echo 'Конец списка';
           }

  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='') {
        $rez=$this->zaprosSQL("SELECT mat FROM maty WHERE mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='') {
        $rez=$this->zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД НЕ матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД НЕ матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить' && $_POST['mat_text']!='') {
        // сначала проверим наличие слова
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcMata($_POST['mat_text'])) {
          $this->zaprosSQL("INSERT INTO maty(mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник матов!<br>';
        if (!$this->searcMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник матов!<br>';
        }
      }
    if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить не мат' && $_POST['mat_text']!='') {
        // сначала проверим наличие слова
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике НЕ матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcNieMata($_POST['mat_text'])) {
          $this->zaprosSQL("INSERT INTO nie_maty(nie_mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник НЕ матов!<br>';
        if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник НЕ матов!<br>';
        }
      }
  }

  // работаем с заполнением базы матов от пользователей на главной странице сайта
  public function dobavilMat($text) 
  {
   if (isset($_POST['otkazDobawleniaMatow'])) {//Самозаблокироваться от показа окна добавления матов
     $id=$this->maxIdLubojTablicy('blocked_list_dobavit_mat');
     if ($id<1) $id=1;
     $this->zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$_SESSION['login']."')");
    }
   if ($_SESSION['status']<1 || $_SESSION['status']>5) return false;
   if ($this->zablokirovanMaty()) return false; // если пользователь заблокирован, то выйти
   if ($this->sborMatov()==0) return false;
    // Узнаем сколько матов пользователь может ввести
    $rez=$this->zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
    $cisloMatov=10;
      while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         $cisloMatov--;

   if ($cisloMatov>0 && isset($_POST['dobawilMat']) && $_POST['dobawilMat']=='Ok' && $_POST['dobawilMatText']!='') {
           foreach($this->mas_mat as $value)
             if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное нецензурное слово уже присутствует в базе данных.';
           foreach($this->nie_mat as $value)
             if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное слово уже присутствует в базе данных и помечено как слово, разрешенное к применению на данном ресурсе.';
      
   if (!preg_match_all('/Спасибо/u',$text)>0) { //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
           $rez=$this->zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
           if (!$rez) echo 'не удалось прочитать данные из таблицы временных нецензурных слов';
           while(!is_null($stroka=mysqli_fetch_assoc($rez))) 
               if ($stroka['mat']==$_POST['dobawilMatText']) $text='Спасибо, но некто, с логином '.$stroka['login'].' уже отправил данное слово на рассмотрение.';
       }

       if (!preg_match_all('/Спасибо/u',$text)>0) {  //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
             $this->zaprosSQL("INSERT INTO mat_ot_polzovatelej(mat, login) VALUES ('".$_POST['dobawilMatText']."','".$_SESSION['login']."')");
             $cisloMatov--;
        } 
     }
   if ($cisloMatov<1) $text='Лимит ввода нецензурных слов исчерпан, подождите пока модератор одобрит предыдущие Ваши предложения.';
    else   {
               $text=$text.' Лимит матов-'.$cisloMatov;
               $this->formBlock('formaSborMata',$this->initsite(),
                                'p', $text, 'dobawilMatP',
                                'text2','dobawilMatText',
                                'submit','dobawilMat',
                                'reset',
                                'submit','otkazDobawleniaMatow','Заблокировать данную функцию');
            }
}
}
