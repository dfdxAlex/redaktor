<?php
namespace class\redaktor;

// Работа с матами и нецензурной лексикой
class maty implements interface\interface\InterfaceWorkToMenu
{

  use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
  use \class\redaktor\interface\trait\TraitInterfaceCollectScolding;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
  use \class\redaktor\interface\trait\TraitInterfaceButton;
  use \class\redaktor\interface\trait\TraitInterfaceDebug;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
  use \class\redaktor\interface\trait\TraitInterfaceFoUser;
  use \class\redaktor\interface\trait\TraitInterfaceWorkToMenu;

    public function __construct()
      {
        $this->connectToBd();
        $this->tableValidationCMS();
        $mas_mat = array();
        $nie_mat = array();
        $mat_polsovat = array();
        $this->initDataWithLanguage();
       }





 





        public function zablokirovanMaty()  // Функция разблокировка пользователя
         {
          $vivod=false;
          $rez=$this->zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // проверяем заблокирован ли пользователь на добавление матов
          while(!is_null($stroka=mysqli_fetch_array($rez)))
             if ($stroka[0]==$_SESSION['login']) // Если была нажата кнопка, блокировки пользователя
              {$vivod=true; break;}
          return $vivod;
         }
       public function save_ot_polsovatelej()  // Функция переноса мата из временной таблицы в постоянную
         {
           if (isset($this->mat_polsovat[0]))
             foreach($this->mat_polsovat as $value)
               if (isset($_POST['save_mat_ot_polzovatelej_'.$value])) {// Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                   $this->zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
                   $this->zaprosSQL("INSERT INTO maty(mat) VALUES ('".$value."')");
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
           ///////////////////////////////////////конец работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
          ////////// Показать список заблокированных пользователей
         if (isset($_POST['buttonListBocked'])) {//&& $_POST['menu_maty']=='Список заблокированных пользователей')
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
  public function dobavilMat($text) //mat_ot_polzovatelej
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
}// конец класса maty
