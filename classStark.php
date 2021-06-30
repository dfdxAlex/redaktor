<?php
    //namespace stark;
    include 'class.php';
 
    

function createTableDolgnostiStarkow(&$masMenu)
    {
        $masMenu[0]='starki.php';
        $classdxdl = new redaktor\maty();
        $_SESSION['rezNormMenu']=true;
        $_SESSION['rezNormRega']=true;

        // Если была нажата кнопка удаления таблицы меню, то удалить
        if (isset($_POST['netMenu']) && $_POST['netMenu']=='Исправить?')
          $classdxdl->killTab('strarki_menu_dolgnosti');

        //проверим есть ли вспомогательная таблица и матов
        // Проверить актуальность меню если на сайт вошел модератор или администратор
 if ($_SESSION['status']==4 || $_SESSION['status']==5)
    if ($classdxdl->searcNameTablic('strarki_menu_dolgnosti'))
        {
           $rezRega=$classdxdl->zaprosSQL("SELECT login FROM status_klienta WHERE status<10");
           $rezMenu=$classdxdl->zaprosSQL("SELECT NAME FROM strarki_menu_dolgnosti WHERE CLASS='strarki_menu_dolgnosti_login'");
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
               //echo $valueMenu.'<br>';
               $normMenu=false;
            }

           $normRega=false;
           foreach($masRega as $valueRega)       //Провряем есть ли для каждого зарегистрированного свое меню
           {
                foreach ($masMenu as $valueMenu)
                    if ($valueMenu==$valueRega) $normRega=true; // Нашли меню для зарегистрированного
                if (!$normRega) {$_SESSION['rezNormRega']=false;break;}
                //echo $valueRega.'<br>';
                $normRega=false;
           }
        }  // Конец работы с проверкой на соответствие между подтверждёнными регистрайиями и пунктами в меню должностей.

        if (!$classdxdl->searcNameTablic('strarki_menu_dolgnosti'))
        {
            $classdxdl->zaprosSQL("CREATE TABLE strarki_menu_dolgnosti(ID INT, NAME VARCHAR(50), URL VARCHAR(50), CLASS VARCHAR(50), STATUS VARCHAR(20))");
            $rez=$classdxdl->zaprosSQL("SELECT login FROM status_klienta WHERE status<10");
            $id=0;
            $idIgrok=0;
            $idMas=1;
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить ширину меню','starki.php','strarki_menu_dolgnosti_rashirit','-s45')");
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s45')");

            while(!is_null($stroka=mysqli_fetch_array($rez)))
            {
                $masMenu[$idMas++]='Звание';
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Zwanie','text2','strarki_menu_dolgnosti_text2','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '".$stroka[0]."','starki.php','strarki_menu_dolgnosti_login','-s0123459')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '<<<','starki.php','strarki_menu_dolgnosti_down','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^1','starki.php','strarki_menu_dolgnosti_up1','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^10','starki.php','strarki_menu_dolgnosti_up10','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", '^20','starki.php','strarki_menu_dolgnosti_up20','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Сохранить','starki.php','strarki_menu_dolgnosti_save','-s45')");
                $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s0123459')");
            }
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'Изменить ширину меню','starki.php','strarki_menu_dolgnosti_rashirit','-s45')");
            $classdxdl->zaprosSQL("INSERT INTO strarki_menu_dolgnosti(ID, NAME, URL, CLASS, STATUS) VALUES (".$id++.", 'br','text','strarki_menu_dolgnosti_br','-s45')");
        } //////////////////Конец создания новой таблицы



        if (!$classdxdl->searcNameTablic('strarki_menu_dolgnosti_prefix'))
        {
            $classdxdl->zaprosSQL("CREATE TABLE strarki_menu_dolgnosti_prefix(ID INT, prefix VARCHAR(50))");
        }
    }

// Функция удаляет таблицу бокового меню для того, чтобы создать новую, актуальную killTab($nameTablicy) 
    function resetTableStrarkiMenuDolgnostiPrefix()
    {
        $classdxdl = new redaktor\maty();
       if (!$_SESSION['rezNormRega'])
        $classdxdl->formBlock('strarki_menu_dolgnosti','starki.php','br',2,'p','Меню членов клана неактуально!','classStrarkiMenuDolgnostiPrefix','submit','netMenu','Исправить?');
    }

?>