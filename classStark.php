<?php
    //namespace stark;
    include 'class.php';

    //Функция обрабатывает клик по логину игрока
function klikLoginIgroka()
    {
        $classdxdl = new redaktor\maty();
        //Проверяем есть ли таблища шаблона описания с уставом, если нет, то создаем ей
            $id=0;
            if (!$classdxdl->searcNameTablic('starki_ustaw'))
               {
                   $classdxdl->zaprosSQL("CREATE TABLE starki_ustaw(ID INT, NAME VARCHAR(65000), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(50))");
                   $classdxdl->zaprosSQL("INSERT INTO starki_ustaw(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Устав альянса STARK ink','h2','starki_ustaw_h2','-s12345')");
                   $classdxdl->zaprosSQL("INSERT INTO starki_ustaw(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Устав альянса','p','starki_ustaw_p','-s12345')");
                   $classdxdl->zaprosSQL("INSERT INTO starki_ustaw(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Izmenit','textarea','starki_ustaw_textarea','-s45')");
                   $classdxdl->zaprosSQL("INSERT INTO starki_ustaw(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','starki_ustaw_br','-s45')");
                   $classdxdl->zaprosSQL("INSERT INTO starki_ustaw(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить','starki.php','starki_ustaw_sawe','-s45')");
                }

                if (isset($_POST['starki_ustaw']) && $_POST['starki_ustaw']=='Изменить')
                {
                    // Узнать из меню какая должность редактируется
                   //$dolgnost=mysqli_fetch_array($classdxdl->zaprosSQL("SELECT NAME FROM prawa_dolgnost WHERE 1"));
                    
                    //if ($classdxdl->searcIdPoUsloviu('dolgnost_opis','dolgnost="'.$dolgnost[0].'"','','','','')>0)
                    $text=$_POST['Izmenit'];
                    //$text2=preg_replace('/^/','<br>',$text);
                    $text3=preg_replace('/\n/','<br>',$text);
                     $classdxdl->zaprosSQL("UPDATE starki_ustaw SET NAME='".$text3."' WHERE ID=1");
     
                   // if (!$classdxdl->searcIdPoUsloviu('dolgnost_opis','dolgnost="'.$dolgnost[0].'"','','','','')>0)
                    // {
                     //    $id=$classdxdl->maxIdLubojTablicy('dolgnost_opis');
                      //   if (!$id>0) $id=1;
                      //   $classdxdl->zaprosSQL("INSERT INTO dolgnost_opis(ID, dolgnost, opis) VALUES (".$id.",'".$dolgnost[0]."','".$_POST['Izmenit']."')");
                    // }
                }

                echo '<section class="container-fluid">';
                echo '<div class="row">';
                echo '<div class="col">';
                    $classdxdl->menu9('starki_ustaw','starki.php');               //Поле редактирования устава
                echo '</div>';
                echo '</div>';
                echo '</section>';
    }

function prawaDolgnost()  
    {
        $classdxdl = new redaktor\maty();
        if (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==2)  // Нажата кнопка меню должностей
            {
                $id=0;
                //Проверяем есть ли таблища шаблона описания должностей, если нет, создаем
                 if (!$classdxdl->searcNameTablic('prawa_dolgnost'))
                    {
                        $classdxdl->zaprosSQL("CREATE TABLE prawa_dolgnost(ID INT, NAME VARCHAR(65000), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(50))");
                        $classdxdl->zaprosSQL("INSERT INTO prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Глава альянса','h2','prawa_dolgnost_h2','-s12345')");
                        $classdxdl->zaprosSQL("INSERT INTO prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Описание','p','prawa_dolgnost_p','-s12345')");
                        $classdxdl->zaprosSQL("INSERT INTO prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Izmenit','textarea','prawa_dolgnost_textarea','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить','starki.php','prawa_dolgnost_sawe','-s45')");
                    }
                //Проверяем есть ли таблища описания должностей, если нет, создаем/ должность - описание
                 if (!$classdxdl->searcNameTablic('dolgnost_opis'))
                     $classdxdl->zaprosSQL("CREATE TABLE dolgnost_opis(ID INT, dolgnost VARCHAR(50), opis VARCHAR(5000))");

                //Проверяем есть ли таблища меню описания должностей, если нет, создаем
                if (!$classdxdl->searcNameTablic('menu_opisania_prawa_dolgnost'))
                    {
                        $id=0;
                        $classdxdl->zaprosSQL("CREATE TABLE menu_opisania_prawa_dolgnost(ID INT, NAME VARCHAR(50), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(50))");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Глава альянса','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Заместитель','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Магистр науки','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Магистр дипломатии','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Магистр разведки','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Магистр','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Джедай','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Падаван','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Юнлинг','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Рядовой','starki.php','prawa_dolgnost_sawe','-s45')");
                        $classdxdl->zaprosSQL("INSERT INTO menu_opisania_prawa_dolgnost(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','prawa_dolgnost_br','-s45')");
                    } 
             
                }

            if (isset($_POST['prawa_dolgnost']) && $_POST['prawa_dolgnost']=='Изменить')
                {
                    // Узнать из меню какая должность редактируется
                    $dolgnost=mysqli_fetch_array($classdxdl->zaprosSQL("SELECT NAME FROM prawa_dolgnost WHERE 1"));
                    
                    if ($classdxdl->searcIdPoUsloviu('dolgnost_opis','dolgnost="'.$dolgnost[0].'"','','','','')>0)
                     $classdxdl->zaprosSQL("UPDATE dolgnost_opis SET opis='".preg_quote($_POST['Izmenit'])."' WHERE dolgnost='".$dolgnost[0]."'");
     
                    if (!$classdxdl->searcIdPoUsloviu('dolgnost_opis','dolgnost="'.$dolgnost[0].'"','','','','')>0)
                     {
                         $id=$classdxdl->maxIdLubojTablicy('dolgnost_opis');
                         if (!$id>0) $id=1;
                         $classdxdl->zaprosSQL("INSERT INTO dolgnost_opis(ID, dolgnost, opis) VALUES (".$id.",'".$dolgnost[0]."','".$_POST['Izmenit']."')");
                     }
                }
            if (isset($_SESSION['regimMenu2']))
             {  ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==3 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Глава альянса'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Глава альянса' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Глава альянса'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }  
                   ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==4 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Заместитель'))  // Нажата кнопка описания главы альянса
                { 
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Заместитель' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Заместитель'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==5 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Магистр науки'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Магистр науки' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Магистр науки'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==6 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Магистр дипломатии'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Магистр дипломатии' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Магистр дипломатии'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==7 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Магистр разведки'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Магистр разведки' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Магистр разведки'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==8 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Магистр'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Магистр' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Магистр'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==9 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Джедай'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Джедай' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Джедай'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==10 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Падаван'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Падаван' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Падаван'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==11 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Юнлинг'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Юнлинг' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Юнлинг'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
                ///Это условие для статуса 4-5 //  Это условие для статусов 1-2-3
                if ($_SESSION['regimMenu2']==12 || ($_SESSION['regimMenu2']==1 && isset($_POST['strarki_menu_dolgnosti']) && $_POST['strarki_menu_dolgnosti']=='Рядовой'))  // Нажата кнопка описания главы альянса
                {
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='Рядовой' WHERE ID=0");
                    $rez=$classdxdl->zaprosSQL("SELECT opis FROM dolgnost_opis WHERE dolgnost='Рядовой'");
                    $dolgnost=array();
                    if ($rez) $dolgnost=mysqli_fetch_array($rez); else $dolgnost[0]='Описание';
                    $classdxdl->zaprosSQL("UPDATE prawa_dolgnost SET NAME='".$dolgnost[0]."' WHERE ID=1");
                }
             }


             ///Это условие для статуса 4-5 
            if (isset($_SESSION['regimMenu2']) 
                && ($_SESSION['regimMenu2']==3 
                    || $_SESSION['regimMenu2']==2
                      || $_SESSION['regimMenu2']==4
                         || $_SESSION['regimMenu2']==5
                             || $_SESSION['regimMenu2']==6
                                 || $_SESSION['regimMenu2']==7
                                     || $_SESSION['regimMenu2']==8
                                         || $_SESSION['regimMenu2']==9
                                              || $_SESSION['regimMenu2']==10
                                                 || $_SESSION['regimMenu2']==11
                                                      || $_SESSION['regimMenu2']==12)
                     
                      ||   ((isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==1) //  Это условие для статусов 1-2-3
                             && isset($_POST['strarki_menu_dolgnosti'])
                              && (
                                $_POST['strarki_menu_dolgnosti']=='Глава альянса' 
                                 || $_POST['strarki_menu_dolgnosti']=='Заместитель' 
                                  || $_POST['strarki_menu_dolgnosti']=='Магистр науки' 
                                   || $_POST['strarki_menu_dolgnosti']=='Магистр дипломатии' 
                                    || $_POST['strarki_menu_dolgnosti']=='Магистр разведки' 
                                     || $_POST['strarki_menu_dolgnosti']=='Магистр' 
                                      || $_POST['strarki_menu_dolgnosti']=='Джедай' 
                                       || $_POST['strarki_menu_dolgnosti']=='Падаван' 
                                        || $_POST['strarki_menu_dolgnosti']=='Юнлинг' 
                                         || $_POST['strarki_menu_dolgnosti']=='Рядовой' 
                                 )

                         )
                )
                {
                    echo '<section class="container-fluid">';
                    echo '<div class="row">';
                    echo '<div class="col-4">';
                    $classdxdl->menu9('menu_opisania_prawa_dolgnost','starki.php'); // Меню редактирования прав
                    echo '</div>';
                    echo '<div class="col-4">';
                    $classdxdl->menu9('prawa_dolgnost','starki.php');               //Поле редактирования прав
                    echo '</div>';
                    echo '</div>';
                    echo '</section>';
                }


        
    }
function saveZwanie() // Сохраняем звание в таблицу strarki_menu_dolgnosti_prefix
 {
    $classdxdl = new redaktor\maty();
    if (isset($_POST['strarki_menu_dolgnosti']))
        if ($classdxdl->searcNameTablic('strarki_menu_dolgnosti_prefix'))
         {
           //echo 'была нажата кнопка и есть таблица префиксов';
           $rezMenu=$classdxdl->zaprosSQL("SELECT ID,NAME FROM strarki_menu_dolgnosti WHERE CLASS='strarki_menu_dolgnosti_login btn'");
           while(!is_null($stroka=mysqli_fetch_assoc($rezMenu))) //перебираем все логины, которые есть в менюшке
           {
               if ($_POST['strarki_menu_dolgnosti']=='Сохранить '.$stroka['NAME'])
                {
                    // Словили кнопку Сохранить
                    // Запрашиваем логин из таблицы префиксов, если он есть, то удаляем запись из таблицы
                    $rez=$classdxdl->zaprosSQL("SELECT login FROM strarki_menu_dolgnosti_prefix WHERE 1");
                    if ($rez) $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti_prefix WHERE login='".$stroka['NAME']."'");
                    // сохраняем префикс в таблицу
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti_prefix(ID, prefix, login) VALUES (".$classdxdl->maxIdLubojTablicy('strarki_menu_dolgnosti_prefix') .",'".$_POST['Zwanie_'.$stroka['NAME']]."','".$stroka['NAME']."')");
                    // Изменить поле для префикса в основном меню 
                    $classdxdl->zaprosSQL("UPDATE strarki_menu_dolgnosti SET NAME='".$_POST['Zwanie_'.$stroka['NAME']]."' WHERE ID=".--$stroka['ID']);
                    
                } 
           }
         }
 }
 // Подготавливает таблицу и массив для меню
function createTableDolgnostiStarkow(&$masMenu1)
    {
        $masMenu1[0]='starki.php';
        $classdxdl = new redaktor\maty();
        $_SESSION['rezNormMenu']=true;
        $_SESSION['rezNormRega']=true;
        $masMinMax=array();
        // Создать массив для запуска меню через магический метод
        if (!$classdxdl->searcNameTablic('strarki_menu_dolgnosti_prefix')) {
            $strok=$classdxdl->kolVoZapisTablice('strarki_menu_dolgnosti') ;
            $strok=($strok-4)/8;
            for ($i=1; $i<=$strok;$i++)
                $masMenu1[$i]='Звание';
            $classdxdl->zaprosSQL("CREATE TABLE strarki_menu_dolgnosti_prefix(ID INT, prefix VARCHAR(50), login VARCHAR(50))");
        }

        // Если была нажата кнопка удаления таблицы меню, то удалить
        if (isset($_POST['netMenu']) && $_POST['netMenu']=='Исправить?')
        {
          $classdxdl->killTab2('strarki_menu_dolgnosti');
          echo 'Удалить strarki_menu_dolgnosti';
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //проверим есть ли таблица бокового меню с должностями, если нет, то создать её
        // Проверить актуальность меню если на сайт вошел модератор или администратор
 if ($_SESSION['status']==4 || $_SESSION['status']==5)
    if ($classdxdl->searcNameTablic('strarki_menu_dolgnosti'))
        {
           $rezRega=$classdxdl->zaprosSQL("SELECT login FROM status_klienta WHERE status<10");
           $rezMenu=$classdxdl->zaprosSQL("SELECT NAME FROM strarki_menu_dolgnosti WHERE CLASS='strarki_menu_dolgnosti_login btn'");
           $masRega=array();
           $masMenu=array();
           $i=0;
           while(!is_null($stroka=mysqli_fetch_array($rezRega))) //Заносим инфу о всех зарегестрированных и подтвердивших регу в массив
               $masRega[$i++]=$stroka[0];
           $i=0;
           while(!is_null($stroka=mysqli_fetch_array($rezMenu))) //Заносим инфу о всех кто есть в меню в массив
               $masMenu[$i++]=$stroka[0];

           $normMenu=false;
           foreach($masMenu as $valueMenu)       //Провряем есть ли каждый логии в меню, в базе зарегистрированных
            {
               foreach ($masRega as $valueRega)
                   if ($valueMenu==$valueRega) $normMenu=true; // Нашли соответствие логина в менюслогином в списке зарегистрированных
               if (!$normMenu) {$_SESSION['rezNormRega']=false;break;}
               $normMenu=false;
            }

           $normRega=false;
           foreach($masRega as $valueRega)       //Провряем есть ли для каждого зарегистрированного свое меню
           {
                foreach ($masMenu as $valueMenu)
                    if ($valueMenu==$valueRega) $normRega=true; // Нашли меню для зарегистрированного
                if (!$normRega) {$_SESSION['rezNormRega']=false;break;}
                $normRega=false;
           }
        }  // Конец работы с проверкой на соответствие между подтверждёнными регистрайиями и пунктами в меню должностей.
         //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['strarki_menu_dolgnosti']))
         {
     
             if (preg_match('/<<</','ftre'.$_POST['strarki_menu_dolgnosti'])
                 ||  preg_match('/\^1/','ftre'.$_POST['strarki_menu_dolgnosti'])
                   ||  preg_match('/\^20/','ftre'.$_POST['strarki_menu_dolgnosti'])
             )
             {
     
               $max=$classdxdl->maxIdLubojTablicy('strarki_menu_dolgnosti')-4; // Последний ИД последней кнопки последней записи в меню игроков
     
               $knopka=$_POST['strarki_menu_dolgnosti'];
               $rez=$classdxdl->zaprosSQL("SELECT ID FROM strarki_menu_dolgnosti WHERE NAME='".$knopka."'");
               if ($rez) $id=mysqli_fetch_array($rez);
     
               $startIdVerh=$id[0]-3;  // Это ID первой позиции (начало меню конкретного пользователя) Будем опускать на 1
               $endId=$startIdVerh+8;  // Последний ID блока кнопок конкретного игрока
     
            // если кнопка предпоследняя ($max-9>=$endId) тогда можно опускать
            if ($max-9>=$endId && preg_match('/<<</','ftre'.$_POST['strarki_menu_dolgnosti']))
             {
               // Запоминаем старые записи
               $rez=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".$startIdVerh." AND ID<=".($startIdVerh+8));
               $rez2=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh+9)." AND ID<=".($startIdVerh+17));
               
               // Удаляем старые записи
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".$startIdVerh." AND ID<=".($startIdVerh+8));
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh+9)." AND ID<=".($startIdVerh+17));
     
               // Добавляем обратно старые записи с новыми ID
                while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']+9).", '".$stroka['NAME']."', '".$stroka['URL']."', '".$stroka['CLASS']."', '".$stroka['STATUS']."')");
                while(!is_null($stroka=mysqli_fetch_assoc($rez2)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']-9).", '".$stroka['NAME']."','".$stroka['URL']."','".$stroka['CLASS']."', '".$stroka['STATUS']."')");
             }

          if ($endId>19 && preg_match('/\^1\s/','ftre'.$_POST['strarki_menu_dolgnosti']))
             { 
               // Запоминаем старые записи
               $rez=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-1)." AND ID<=".($startIdVerh+7));
               $rez2=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-10)." AND ID<=".($startIdVerh-2));
               
               // Удаляем старые записи
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-1)." AND ID<=".($startIdVerh+7));
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-10)." AND ID<=".($startIdVerh-2));
     
               // Добавляем обратно старые записи с новыми ID
                while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']-9).", '".$stroka['NAME']."', '".$stroka['URL']."', '".$stroka['CLASS']."', '".$stroka['STATUS']."')");
                while(!is_null($stroka=mysqli_fetch_assoc($rez2)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']+9).", '".$stroka['NAME']."','".$stroka['URL']."','".$stroka['CLASS']."', '".$stroka['STATUS']."')");
             }

          if ($endId>100 && preg_match('/\^10\s/','ftre'.$_POST['strarki_menu_dolgnosti']))
             { 
               // Запоминаем старые записи
               $rez=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-2)." AND ID<=".($startIdVerh+6));
               $rez2=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-92)." AND ID<=".($startIdVerh-3));
               
               // Удаляем старые записи
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-2)." AND ID<=".($startIdVerh+6));
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-92)." AND ID<=".($startIdVerh-3));
     
               // Добавляем обратно старые записи с новыми ID
                while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']-90).", '".$stroka['NAME']."', '".$stroka['URL']."', '".$stroka['CLASS']."', '".$stroka['STATUS']."')");
                while(!is_null($stroka=mysqli_fetch_assoc($rez2)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']+9).", '".$stroka['NAME']."','".$stroka['URL']."','".$stroka['CLASS']."', '".$stroka['STATUS']."')");
             }
         if ($endId>189 && preg_match('/\^20\s/','ftre'.$_POST['strarki_menu_dolgnosti']))
             { 
               // Запоминаем старые записи
               $rez=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-3)." AND ID<=".($startIdVerh+5));
               $rez2=$classdxdl->zaprosSQL("SELECT * FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-183)." AND ID<=".($startIdVerh-4));
               
               // Удаляем старые записи
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-3)." AND ID<=".($startIdVerh+5));
               $classdxdl->zaprosSQL("DELETE FROM strarki_menu_dolgnosti WHERE ID>=".($startIdVerh-183)." AND ID<=".($startIdVerh-4));
     
               // Добавляем обратно старые записи с новыми ID
                while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']-180).", '".$stroka['NAME']."', '".$stroka['URL']."', '".$stroka['CLASS']."', '".$stroka['STATUS']."')");
                while(!is_null($stroka=mysqli_fetch_assoc($rez2)))
                    $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".($stroka['ID']+9).", '".$stroka['NAME']."','".$stroka['URL']."','".$stroka['CLASS']."', '".$stroka['STATUS']."')");
             }
        }
         }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //   Заносим данные в массив для подписания званий и запуска меню через магический метод
    if ($classdxdl->searcNameTablic('strarki_menu_dolgnosti_prefix')) 
           {
             $strok=$classdxdl->kolVoZapisTablice('strarki_menu_dolgnosti') ;
             $strok=($strok-4)/8;

            // собрали массив логинов из менюшки должностей
            $rezMenu=$classdxdl->zaprosSQL("SELECT ID, NAME FROM strarki_menu_dolgnosti WHERE CLASS='strarki_menu_dolgnosti_login btn'");
            $i=1;

            $loginMas1 = array(array());
            $loginMas1[0][0]='-'; /// просто исключаю нулевую позицию
            $loginMas1[0][1]='-'; /// просто исключаю нулевую позицию
         if ($rezMenu) // Если удалось прочитать логины
             while(!is_null($stroka=mysqli_fetch_assoc($rezMenu))) //Заносим инфу о всех зарегестрированных и подтвердивших регу в массив
              if ($stroka)
              {
                  $i++;
                  $loginMas1[$i][1]=$stroka['NAME']; // создаем массив логинов по порядку
                  $loginMas1[$i][0]=$stroka['ID']; // создаем массив ID логинов 
              }
              for ($i=0; $i<count($loginMas1,COUNT_NORMAL)-1; $i++)
              {
              $idMin=999999999999999;

              foreach($loginMas1 as $value) //находим самый маленький ИД и запоминаем его
               if ($value[0]!='-' && $value[0]<$idMin) $idMin=$value[0];

              foreach($loginMas1 as &$value) // находим логин, соответствующий ранее найденному самому маленькому ИД и помещаем в массив
              {
               if ($value[0]==$idMin) 
                {
                    $masMinMax[$i]=$value[1];
                    $value[0]=999999999999999;
                }
                unset($value); // разорвать ссылку на последний элемент
               }
              }
        ///////////////////////////////////////////////
            foreach ($masMinMax as $key=>$value)  // перебераем массив логинов
                  {  
                      //Загружаем меню префиксов-званий по порядку
                     $rezMenu=$classdxdl->zaprosSQL("SELECT prefix FROM strarki_menu_dolgnosti_prefix WHERE login='".$value."'");
                     if (!is_null($stroka=mysqli_fetch_array($rezMenu))) $masMenu1[++$key]=$stroka[0];
                          else $masMenu1[++$key]='Звание';
                  }
            } // конец заполнения массива для отображения должностей в текстовом поле


    if (!$classdxdl->searcNameTablic('strarki_menu_dolgnosti'))
        {
            $classdxdl->zaprosSQL("CREATE TABLE strarki_menu_dolgnosti(ID INT, NAME VARCHAR(50), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(20))");
            $rez=$classdxdl->zaprosSQL("SELECT login FROM status_klienta WHERE status<10");
            $id=0;
            $idIgrok=0;
            $idMas=1;
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить ширину меню','starki.php','strarki_menu_dolgnosti_rashirit btn','-s45')");
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s45')");

            while(!is_null($stroka=mysqli_fetch_array($rez)))
            {
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Zwanie_".$stroka[0]."','text2','strarki_menu_dolgnosti_text2','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '".paraPrefixLogin($stroka[0])."','starki.php','strarki_menu_dolgnosti_prefix btn','-s123')"); 
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '".$stroka[0]."','starki.php','strarki_menu_dolgnosti_login btn','-s0123459')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '<<<     ".$stroka[0]."','starki.php','strarki_menu_dolgnosti_down btn','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^1     ".$stroka[0]."','starki.php','strarki_menu_dolgnosti_up1 btn','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^10     ".$stroka[0]."','starki.php','strarki_menu_dolgnosti_up10 btn','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^20     ".$stroka[0]."','starki.php','strarki_menu_dolgnosti_up20 btn','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Сохранить ".$stroka[0]."','starki.php','strarki_menu_dolgnosti_save btn','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s0123459')");
            }
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить ширину меню','starki.php','strarki_menu_dolgnosti_rashirit btn','-s45')");
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s45')");
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Меню описания должностей','starki.php','strarki_menu_dolgnosti_rashirit btn','-s45')");
        } //////////////////Конец создания новой таблицы
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        

    }

// Функция удаляет таблицу бокового меню для того, чтобы создать новую, актуальную killTab($nameTablicy) 
function resetTableStrarkiMenuDolgnostiPrefix()
    {
        $classdxdl = new redaktor\maty();
       if (!$_SESSION['rezNormRega'])
        $classdxdl->formBlock('strarki_menu_dolgnosti','starki.php','br',2,'p','Меню членов клана неактуально!','classStrarkiMenuDolgnostiPrefix','submit','netMenu','Исправить?');
    }
// возвращает префикс по логину, если он есть, или пустую строку
function paraPrefixLogin($login)
    {
        $classdxdl = new redaktor\maty();
        $rez=$classdxdl->zaprosSQL("SELECT prefix FROM strarki_menu_dolgnosti_prefix WHERE login='".$login."'");
        if (!$rez) return ' ';
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka) return ' ';
        return $stroka[0];
    }
?>