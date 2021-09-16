<?php
    //namespace stark;
    include 'classInstrument.php';


function poiskBaz()  // Непосредственный поиск ближайших баз или всез баз. работает вместе с pokazatMenuPoiskBaz()
{

      $classPhp = new redaktor\maty();
      $bazaMin='';
      $classPhp->createTab(
        'name=bazy_federacii',
        'poleN=ID',//--  
        'poleT=int',
        'poleS=0', //-- 
        'poleN=kory', //-- 
        'poleT=varchar(55)',
        'poleS=0000-0000', //--  
        'poleN=login_dobavil', //-- 
        'poleT=varchar(55)',
        'poleS=login',//--  
        'poleN=login_proveril',//--  
        'poleT=varchar(55)',
        'poleS=login', //-- 
        'poleN=provereno',//--  
        'poleT=int',
        'poleS=0' //-- 
      );
      if (isset($_POST['bazy_fedi']) && $_POST['bazy_fedi']=='Найти')
      {
        
        $bazaMax=99999999999999999999;
        $kory=preg_replace('/\s/','',$_POST['kory']); // удалить пробелы
        $kory=preg_replace('/\[||\]/','',$kory); // удалить пробелы
        $masKory=preg_split('/-/',$kory,-1,PREG_SPLIT_NO_EMPTY); 
        $rez=$classPhp->zaprosSQL("SELECT kory FROM bazy_federacii WHERE 1");
        while(!is_null($stroka=mysqli_fetch_array($rez))) 
         {
          $tekuscKory=preg_split('/-/',$stroka[0],-1,PREG_SPLIT_NO_EMPTY); 
          $k0=$masKory[0]-$tekuscKory[0];
          if ($k0<0) $k0=-1*$k0;
          $k1=$masKory[1]-$tekuscKory[1];
          if ($k1<0) $k1=-1*$k1;
          $sum=$k0*$k0+$k1*$k1;
          $dlina=$sum**0.5;
          if ($bazaMax>$dlina) {$bazaMax=$dlina; $bazaMin='['.$stroka[0].']';}
         }
         
      }
      // Нажали добавление координат баз федерации
      if (isset($_POST['bazy_fedi']) && $_POST['bazy_fedi']=='Добавить базу Федерации')
       {
         if ($_POST['kory']!='')
          {
            $breakk=false;
            $kory=preg_replace('/\s/','',$_POST['kory']); // удалить пробелы
            $kory=preg_replace('/\[||\]/','',$kory); // удалить пробелы
            $rez=$classPhp->zaprosSQL("SELECT kory FROM bazy_federacii WHERE 1");
            while(!is_null($stroka=mysqli_fetch_array($rez))) //проверим есть ли такие координаты в базе
              if ($stroka[0]==$kory) {echo '<br><p class="error mesageFon">Координаты уже присутствуют в базе<br>';$breakk=true;break;}
            if (!$breakk)
              $classPhp->zaprosSQL("INSERT INTO bazy_federacii(id, kory, login_dobavil, login_proveril, provereno) VALUES (".$classPhp->maxIdLubojTablicy('bazy_federacii').",'".$kory."','".$_SESSION['login']."','',0)"); 
          }
       }



      $_SESSION['poiskBaz']=$classPhp->hanterButton('rez=info','name=poiskBaz');

      if (!isset($_SESSION['poiskBaz']) || !$_SESSION['poiskBaz']) $_SESSION['poiskBaz']='Базы Федерации';
      
      echo '<br>';
      echo '<p class="mesage mesageFon">В поле ниже введите координаты точки, относительно которой будет производиться поиск.<br>';
      echo 'Координаты принимаются только цифровые. На пример: 10336 - 45408 или [ 40245 - 10195 ]</p>';
      echo '<br><br>';
      echo '<p class="mesage mesageFon">Поиск: '.$_SESSION['poiskBaz'].'</p>';

      echo '<form method="POST" action="starki.php">';
      echo '<input type="text" name="kory" value=""><br><br>';
      echo '<input type="submit" name="bazy_fedi" value="Найти" class="poiskBaz btn">';
      echo '<input type="submit" name="bazy_fedi" value="Добавить базу Федерации" class="poiskBaz btn">';
      echo '</form">';




      if ($_SESSION['poiskBaz']=="Базы Федерации")
       {
        $knopkaPodtwerditOtGost=$classPhp->hanterButton('rez=hant','nameStatic=proveritBazu','returnNameDynamic');
        if ($knopkaPodtwerditOtGost)
          $classPhp->zaprosSQL("UPDATE bazy_federacii SET login_proveril='".$_SESSION['login']."' WHERE kory='".$knopkaPodtwerditOtGost."'");
        $podtwerditBazuAdmin=$classPhp->hanterButton('rez=hant','nameStatic=podtwerditBazu','returnNameDynamic'); //адрес базы
        $okIliKill=$classPhp->hanterButton('rez=hant','nameStatic=podtwerditBazu','returnValue'); //адрес базы
        if ($podtwerditBazuAdmin)
         {
           if ($okIliKill=='Ok')
            $classPhp->zaprosSQL("UPDATE bazy_federacii SET provereno=1 WHERE kory='".$podtwerditBazuAdmin."'");
           if ($okIliKill=='Kill')
            $classPhp->zaprosSQL("DELETE FROM bazy_federacii WHERE kory='".$podtwerditBazuAdmin."'");
         }


      // Если находимся в процессе работы с базами федерации, но не нажимали кнопку Найти
      if (!isset($_POST['bazy_fedi']) || isset($_POST['bazy_fedi']) && $_POST['bazy_fedi']!='Найти')
       {
        echo '<form method="POST" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT * FROM bazy_federacii WHERE 1");
        echo '<br><br>';
        echo '<section class="container-fluid">';
        echo '<div class="row">';
        echo '<div class="col-3 pokazat_bazy_federacii">';
        echo '<p class="mesage">Координаты</p>';
        echo '</div>';
        echo '<div class="col-3 pokazat_bazy_federacii">';
        echo '<p class="mesage">Добавил</p>';
        echo '</div>';
        echo '<div class="col-3 pokazat_bazy_federacii">';
        echo '<p class="mesage">Проверил</p>';
        echo '</div>';
        if ($_SESSION['status']==4 || $_SESSION['status']==5)
        {
        echo '<div class="col-3 pokazat_bazy_federacii">';
        echo '<p class="mesage">Ok/Kill</p>';
        echo '</div>';
        }
        echo '</div>';
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
          echo '<div class="row">';
          echo '<div class="col-3 pokazat_bazy_federacii">';
          echo '<div class="mesage mesageFon">['.$stroka['kory'].']</div>';
          echo '</div>';
          echo '<div class="col-3 pokazat_bazy_federacii">';
          echo '<div class="mesage mesageFon">'.$stroka['login_dobavil'].'</div>';
          echo '</div>';
          echo '<div class="col-3 pokazat_bazy_federacii">';
          if ($stroka['login_proveril']=='' && $stroka['provereno']==0 && $stroka['login_dobavil']!=$_SESSION['login'])
            echo '<input type="submit" class="btn potverditBazu_Gost" value="Подтвердить" name="proveritBazu'.$stroka['kory'].'">';
          if ($stroka['login_proveril']=='' && $stroka['provereno']==0 && $stroka['login_dobavil']==$_SESSION['login'])
            echo '<div class="mesage mesageFon">не проверено</div>';
          if ($stroka['login_proveril']!='' && $stroka['provereno']==0)
            echo '<div class="mesage mesageFon">'.$stroka['login_proveril'].'</div>';
          if ($stroka['provereno']==1) 
            echo '<div class="mesage mesageFon">Ok</div>';
          echo '</div>'; 
          if ($_SESSION['status']==4 || $_SESSION['status']==5)
          {
            echo '<div class="col-3 pokazat_bazy_federacii">';
            if ($stroka['provereno']==0)
             {
               echo '<input type="submit" value="Ok" name="podtwerditBazu'.$stroka['kory'].'" class="btn potverditBazu_Gost">';
               echo '<input type="submit" value="Kill" name="podtwerditBazu'.$stroka['kory'].'" class="btn potverditBazu_Gost">';
             }
            if ($stroka['provereno']==1)
               echo '<input type="submit" value="Kill" name="podtwerditBazu'.$stroka['kory'].'" class="btn potverditBazu_Gost">';
            echo '</div>';
          }
          echo '</div>';
         }
        echo '</section>';
        echo '</form">';
       }

       echo '<br><br><div class="mesage mesageFon">Координаты ближайшей базы Федерации: '.$bazaMin.'</div>';

       }


}
function pokazatMenuPoiskBaz()   // Проверяет акаунты игроков и выводит кнопки для поиска баз с материалами
{
     $classPhp = new redaktor\maty();
     $mas = array();
     $mas[0]='bazy_federacii';
     $rez=$classPhp->zaprosSQL("SHOW TABLES");
     //$nahliProdukt=false;
     $i=1;
     while(!is_null($stroka=mysqli_fetch_array($rez))) // вытащить все имена таблиц, которые принадлежат личному пространству игроков
      if (stripos('sss'.$stroka[0],'my_zone')>0) $mas[$i++]=$stroka[0];

     echo '<form action="starki.php" method="POST">';
     foreach ($mas as $value)  // рисуем кнопки
         if ($value=='bazy_federacii') 
          echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Базы Федерации"><br><br>';

      $topliwoNahli=false;
      foreach ($mas as $value)  // рисуем кнопки
        if ($value!='bazy_federacii') 
             {
               $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                while(!is_null($stroka=mysqli_fetch_array($rez)))
                 if ((stripos('sss'.$stroka[0],'%Матоварка%')>0))
                 {
                  $topliwoNahli=true;
                  echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Матоварки"><br>'; 
                 }
             }
      if ($topliwoNahli) echo '<br>';

      $topliwoNahli=false;
      foreach ($mas as $value)  // рисуем кнопки
        if ($value!='bazy_federacii') 
         {
           $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
            while(!is_null($stroka=mysqli_fetch_array($rez)))
             if ((stripos('sss'.$stroka[0],'%Органическое топливо%')>0))
             {
              $topliwoNahli=true;
              echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Органическое топливо"><br>'; 
             }
         }
      foreach ($mas as $value)  // рисуем кнопки
         if ($value!='bazy_federacii') 
           {
             $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
             while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Ядерное топливо%')>0))
               {
                $topliwoNahli=true;
                echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Ядерное топливо"><br>'; 
               }
           }
       foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
            {
             $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
             while(!is_null($stroka=mysqli_fetch_array($rez)))
              if ((stripos('sss'.$stroka[0],'%Термоядерное топливо%')>0))
              {
                $topliwoNahli=true;
                echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Термоядерное топливо"><br>'; 
              }
            }
       foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
             {
              $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
              while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Гравитационное топливо%')>0))
               {
                $topliwoNahli=true;
                 echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Гравитационное топливо"><br>';
               } 
             }
      if ($topliwoNahli) echo '<br>';

      $topliwoNahli=false;
      foreach ($mas as $value)  // рисуем кнопки
         if ($value!='bazy_federacii') 
           {
             $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
             while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Железная руда%')>0))
               {
                $topliwoNahli=true;
                echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Железная руда"><br>'; 
               }
           }
       foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
            {
             $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
             while(!is_null($stroka=mysqli_fetch_array($rez)))
              if ((stripos('sss'.$stroka[0],'%Полиэлементная руда%')>0))
              {
                $topliwoNahli=true;
                echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Полиэлементная руда"><br>'; 
              }
            }
       foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
             {
              $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
              while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Полиорганическая руда%')>0))
               {
                $topliwoNahli=true;
                 echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Полиорганическая руда"><br>';
               } 
             }
        foreach ($mas as $value)  // рисуем кнопки
             if ($value!='bazy_federacii') 
                {
                 $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                 while(!is_null($stroka=mysqli_fetch_array($rez)))
                  if ((stripos('sss'.$stroka[0],'%Уран%')>0))
                  {
                   $topliwoNahli=true;
                    echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Уран"><br>';
                  } 
                }
      if ($topliwoNahli) echo '<br>';
      $topliwoNahli=false;
    foreach ($mas as $value)  // рисуем кнопки
      if ($value!='bazy_federacii') 
        {
          $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
          while(!is_null($stroka=mysqli_fetch_array($rez)))
            if ((stripos('sss'.$stroka[0],'%Митрацит%')>0))
            {
             $topliwoNahli=true;
             echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Митрацит"><br>'; 
            }
        }
    foreach ($mas as $value)  // рисуем кнопки
       if ($value!='bazy_federacii') 
         {
          $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
          while(!is_null($stroka=mysqli_fetch_array($rez)))
           if ((stripos('sss'.$stroka[0],'%Иридиум%')>0))
           {
             $topliwoNahli=true;
             echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Иридиум"><br>'; 
           }
         }
    foreach ($mas as $value)  // рисуем кнопки
       if ($value!='bazy_federacii') 
          {
           $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
           while(!is_null($stroka=mysqli_fetch_array($rez)))
            if ((stripos('sss'.$stroka[0],'%Крокит%')>0))
            {
             $topliwoNahli=true;
              echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Крокит"><br>';
            } 
          }
     foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
             {
              $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
              while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Брадий%')>0))
               {
                $topliwoNahli=true;
                 echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Брадий"><br>';
               } 
             }
      foreach ($mas as $value)  // рисуем кнопки
             if ($value!='bazy_federacii') 
                {
                 $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                 while(!is_null($stroka=mysqli_fetch_array($rez)))
                  if ((stripos('sss'.$stroka[0],'%Титанит%')>0))
                  {
                   $topliwoNahli=true;
                    echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Титанит"><br>';
                  } 
                }
      if ($topliwoNahli) echo '<br>';
      $topliwoNahli=false;

      foreach ($mas as $value)  // рисуем кнопки
      if ($value!='bazy_federacii') 
        {
          $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
          while(!is_null($stroka=mysqli_fetch_array($rez)))
            if ((stripos('sss'.$stroka[0],'%Ноксикум%')>0))
            {
             $topliwoNahli=true;
             echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Ноксикум"><br>'; 
            }
        }
    foreach ($mas as $value)  // рисуем кнопки
       if ($value!='bazy_federacii') 
         {
          $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
          while(!is_null($stroka=mysqli_fetch_array($rez)))
           if ((stripos('sss'.$stroka[0],'%Изидрит%')>0))
           {
             $topliwoNahli=true;
             echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Изидрит"><br>'; 
           }
         }
    foreach ($mas as $value)  // рисуем кнопки
       if ($value!='bazy_federacii') 
          {
           $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
           while(!is_null($stroka=mysqli_fetch_array($rez)))
            if ((stripos('sss'.$stroka[0],'%Сероний%')>0))
            {
             $topliwoNahli=true;
              echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Сероний"><br>';
            } 
          }
     foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
             {
              $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
              while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Зукрит%')>0))
               {
                $topliwoNahli=true;
                 echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Зукрит"><br>';
               } 
             }
      foreach ($mas as $value)  // рисуем кнопки
             if ($value!='bazy_federacii') 
                {
                 $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                 while(!is_null($stroka=mysqli_fetch_array($rez)))
                  if ((stripos('sss'.$stroka[0],'%Миланокс%')>0))
                  {
                   $topliwoNahli=true;
                    echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Миланокс"><br>';
                  } 
                }
            foreach ($mas as $value)  // рисуем кнопки
                if ($value!='bazy_federacii') 
                   {
                    $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                    while(!is_null($stroka=mysqli_fetch_array($rez)))
                     if ((stripos('sss'.$stroka[0],'%Орекс%')>0))
                     {
                      $topliwoNahli=true;
                       echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Орекс"><br>';
                     } 
                   }
            foreach ($mas as $value)  // рисуем кнопки
                   if ($value!='bazy_federacii') 
                      {
                       $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                       while(!is_null($stroka=mysqli_fetch_array($rez)))
                        if ((stripos('sss'.$stroka[0],'%Заброзин%')>0))
                        {
                         $topliwoNahli=true;
                          echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Заброзин"><br>';
                        } 
                      }        
            if ($topliwoNahli) echo '<br>';
            $topliwoNahli=false;

          foreach ($mas as $value)  // рисуем кнопки
                if ($value!='bazy_federacii') 
                   {
                    $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                    while(!is_null($stroka=mysqli_fetch_array($rez)))
                     if ((stripos('sss'.$stroka[0],'%Квантиум%')>0))
                     {
                      $topliwoNahli=true;
                       echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Квантиум"><br>';
                     } 
                   }
          foreach ($mas as $value)  // рисуем кнопки
                   if ($value!='bazy_federacii') 
                      {
                       $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                       while(!is_null($stroka=mysqli_fetch_array($rez)))
                        if ((stripos('sss'.$stroka[0],'%Левиум%')>0))
                        {
                         $topliwoNahli=true;
                          echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Левиум"><br>';
                        } 
                      } 
          if ($topliwoNahli) echo '<br>';
          $topliwoNahli=false;  
          
    foreach ($mas as $value)  // рисуем кнопки
          if ($value!='bazy_federacii') 
             {
              $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
              while(!is_null($stroka=mysqli_fetch_array($rez)))
               if ((stripos('sss'.$stroka[0],'%Темная материя%')>0))
               {
                $topliwoNahli=true;
                 echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Темная материя"><br>';
               } 
             }
    foreach ($mas as $value)  // рисуем кнопки
             if ($value!='bazy_federacii') 
                {
                 $rez=$classPhp->zaprosSQL("SELECT news FROM ".$value." WHERE 1");
                 while(!is_null($stroka=mysqli_fetch_array($rez)))
                  if ((stripos('sss'.$stroka[0],'%Гелий-3%')>0))
                  {
                   $topliwoNahli=true;
                    echo '<input type="submit" class="poiskBaz btn" name="poiskBaz" value="Гелий-3"><br>';
                  } 
                } 
      if ($topliwoNahli) echo '<br>';
      $topliwoNahli=false; 
    


      ///// конец рисования кнопок с ресурсами    





        //$rez=$classPhp->zaprosSQL("SHOW TABLES");

     echo '</form>';

}
function pokazModul() // поиск модулей, у кого какой модуль есть
{

    //Если меню отсутствует, то создаем его
    $classPhp = new redaktor\maty();
    $classPhp->createTab(
        'name=pokaz_modul',
        'poleN=ID',//-- ID
        'poleT=int',
        'poleS=0', //-- ID
        'poleN=NAME', //-- NAME
        'poleT=varchar(255)',
        'poleS=Все', //-- NAME
        'poleN=URL', //-- URL
        'poleT=varchar(255)',
        'poleS=starki.php',//-- URL
        'poleN=CLASS',//-- CLASS
        'poleT=varchar(255)',
        'poleS=class_rasy_stark_vse_modul_pokaz btn', //-- CLASS
        'poleN=STATUS',//-- ID
        'poleT=varchar(255)',
        'poleS=-12345' //-- ID
      );

    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<2)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (1,'Гелионы','starki.php','class_rasy_stark_gelion_modul_pokaz btn','-12345')"); //br
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<3)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (2,'Зект','starki.php','class_rasy_stark_zekt_modul_pokaz btn','-12345')"); // текстовое
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<4)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (3,'Тормаль','starki.php','class_rasy_stark_tormal_modul_pokaz btn','-12345')"); // текстовое
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<5)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (4,'Велид','starki.php','class_rasy_stark_velid_modul_pokaz btn','-12345')"); // текстовое
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<6)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (5,'Гларг','starki.php','class_rasy_stark_glarg_modul_pokaz btn','-12345')"); // текстовое
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<7)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (6,'Астокс','starki.php','class_rasy_stark_astoks_modul_pokaz btn','-12345')"); // текстовое
    if ($classPhp->maxIdLubojTablicy('pokaz_modul')<8)
      $classPhp->zaprosSQL("INSERT INTO pokaz_modul(ID, NAME, URL, CLASS, STATUS) VALUES (7,'Мрун','starki.php','class_rasy_stark_mroon_modul_pokaz btn','-12345')"); // текстовое


      $classPhp->menu9('pokaz_modul','starki.php');
     $poiskModul=999;

     if (isset($_POST['pokaz_modul']))
      {
          if ($_POST['pokaz_modul']=='Все') $poiskModul=1;          // Все
          if ($_POST['pokaz_modul']=='Гелионы') $poiskModul=2;      // Гелионы
          if ($_POST['pokaz_modul']=='Зект') $poiskModul=3;         // Зект
          if ($_POST['pokaz_modul']=='Тормаль') $poiskModul=4;      // Тормаль
          if ($_POST['pokaz_modul']=='Велид') $poiskModul=5;        // Велид
          if ($_POST['pokaz_modul']=='Гларг') $poiskModul=6;        // Гларг
          if ($_POST['pokaz_modul']=='Астокс') $poiskModul=7;       // Астокс
          if ($_POST['pokaz_modul']=='Мрун') $poiskModul=8;         // Мрун
      }

      $modul='';
      if ($classPhp->hanterButton('name=list_modul','rez=info')) $modul=$classPhp->hanterButton('name=list_modul','rez=info');
      if ($modul) $poiskModul=999;
      /////////////////////////////////////////////////////////////выполнение//////////////////////////////////////////////////////
      if ($modul)
       {
         $rez=$classPhp->zaprosSQL("SELECT login, levl_modul FROM tab_modul WHERE name_modul='".$modul."'");
         echo '<p class="mesage spisok_modul">Список игроков, у которых можно заказать данный модуль:</p>';
         while(!is_null($stroka=mysqli_fetch_assoc($rez)))
           echo '<p class=fon>Логин игрока: '.$stroka['login'].' (максимальный уровень модуля-'.$stroka['levl_modul'].')</p>';
       }
      if ($poiskModul==2 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_gelion WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_gelion_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==3 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_zekt WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_zekt_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==4 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_tormal WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_tormal_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==5 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_velid WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_velid_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==6 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_glarg WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_glarg_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==7 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_astoks WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_astoks_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
       if ($poiskModul==8 || $poiskModul==1)
       {
        echo '<br>';
        echo '<form method="post" action="starki.php">';
        $rez=$classPhp->zaprosSQL("SELECT name FROM moduly_mroon WHERE url='starki.php'");
        while(!is_null($stroka=mysqli_fetch_assoc($rez)))
         {
           echo '<input type="submit" name="list_modul" value="'.$stroka['name'].'" class="button_class_rasy_stark_mroon_modul">';
           echo '<br>';
         }
         if ($poiskModul!=1) echo '</form>';
       }
    }

function myZone()
{
    $loginMy='--';
    if (!isset($_POST['strarki_menu_dolgnosti']) 
        || (isset($_POST['strarki_menu_dolgnosti']) 
         && $_POST['strarki_menu_dolgnosti']!='Глава альянса'
          && $_POST['strarki_menu_dolgnosti']!='Заместитель'
           && $_POST['strarki_menu_dolgnosti']!='Магистр науки'
            && $_POST['strarki_menu_dolgnosti']!='Магистр дипломатии'
             && $_POST['strarki_menu_dolgnosti']!='Магистр разведки'
              && $_POST['strarki_menu_dolgnosti']!='Магистр'
               && $_POST['strarki_menu_dolgnosti']!='Джедай'
                && $_POST['strarki_menu_dolgnosti']!='Падаван'
                 && $_POST['strarki_menu_dolgnosti']!='Юнлинг'
                  && $_POST['strarki_menu_dolgnosti']!='Рядовой'
                   && $_POST['strarki_menu_dolgnosti']!='Администратор'
                    && $_POST['strarki_menu_dolgnosti']!='Супер Администратор'
                     && $_POST['strarki_menu_dolgnosti']!='Изменить ширину меню'
                      && $_POST['strarki_menu_dolgnosti']!='Меню описания должностей'
                       && !stripos('sss'.$_POST['strarki_menu_dolgnosti'],'^1')
                        && !stripos('sss'.$_POST['strarki_menu_dolgnosti'],'^2')
                         && !stripos('sss'.$_POST['strarki_menu_dolgnosti'],'<<<')
                          && !stripos('sss'.$_POST['strarki_menu_dolgnosti'],'Сохранить')
                    )
        )
      if (isset($_POST['strarki_menu_dolgnosti']) || (isset($_SESSION['regimMenu2']) && $_SESSION['regimMenu2']==18))
       { 
            $classPhp = new redaktor\maty();
            $modul = new redaktor\modul();
            if (isset($_POST['strarki_menu_dolgnosti']))
             {
                $loginMy=preg_replace('/Zwanie_/','',$_POST['strarki_menu_dolgnosti']); // Выделяем логин редактора/ов
                $_SESSION['zonePokaz']=$loginMy;
                $_SESSION['name1']='n1-myZoneBaza'.$loginMy;
                $_SESSION['name2']='n2-myZoneProekt'.$loginMy;
                $_SESSION['name3']='n3-myZoneFree'.$loginMy;
                $_SESSION['name4']='n4-myZoneTehno'.$loginMy;
             }
            $_SESSION['regimMenu2']=18;
            // форматируем личное пространство
            echo '<section class="container-fluid">';
            echo '<div class="row myZone">';
            echo '<div class="col-1">';
            echo '</div>';
            echo '<div class="col-10">';
            $regimZonyInfo=$classPhp->hanterButton("rez=hant","nameStatic=myZone",'returnValue');
            if (!$regimZonyInfo && isset($_SESSION['regimMyZone']))  //если не было нажатой кнопки переключающей категории личного пространства, то восстановить её по режиму
             {
                if ($_SESSION['regimMyZone']==1) $regimZonyInfo='Базы';
                if ($_SESSION['regimMyZone']==2) $regimZonyInfo='Проекты';
                if ($_SESSION['regimMyZone']==3) $regimZonyInfo='Разное';
                if ($_SESSION['regimMyZone']==4) $regimZonyInfo='Технологии';
             }
            echo '<h3 class="dobroPozalovatVzonu">Добро пожаловать в личное пространство игрока: '.$_SESSION['zonePokaz'].' ('.$regimZonyInfo.')'.'</h3>';
            //Рисуем личное меню
            $classPhp->buttonPrefix('class=-row-','container','action=-starki.php-','кнопок-4',$_SESSION['name1'],$_SESSION['name2'],$_SESSION['name3'],$_SESSION['name4'],'v1-Базы','v2-Проекты','v3-Разное','v4-Технологии','classButton=-btn myZoneMenu-');
            echo '<br>';
            if (isset($_POST['strarki_menu_dolgnosti']))
            $_SESSION['regimMyZone']=1;
            //Показать блок редактирования статей при режиме Мои Базы
            if ($regimZonyInfo=='Базы')   
             $_SESSION['regimMyZone']=1;
            //Показать блок редактирования статей при режиме Мои Проекты
            if ($regimZonyInfo=='Проекты')   
            $_SESSION['regimMyZone']=2;
            //Показать блок редактирования статей при режиме Разное
            if ($regimZonyInfo=='Разное')
                $_SESSION['regimMyZone']=3;
            //Показать блок редактирования статей при режиме Мои Технологии
            if ($regimZonyInfo=='Технологии')   
             $_SESSION['regimMyZone']=4;

            if (isset($_POST['strarki_menu_dolgnosti'])) // зашли в личное пространство к ...
             $_SESSION['licnoeProstranstvo']=$_POST['strarki_menu_dolgnosti'];
            //исполнение ............................................................................................
            if ($_SESSION['regimMyZone']==4)
            {
                $rassa='Мистер Администратор';
                $rassaBrud=file_get_contents("https://starfederation.ru/?m=api&a=player&name=".$_SESSION['login']);
                if (strripos($rassaBrud,'Thormal')>0) $rassa='Тормаль'; //
                if (strripos($rassaBrud,'Helion')>0) $rassa='Гелион'; //Zect
                if (strripos($rassaBrud,'Zect')>0) $rassa='Зект'; //Velid
                if (strripos($rassaBrud,'Velid')>0) $rassa='Велид'; //Glarg
                if (strripos($rassaBrud,'Glarg')>0) $rassa='Гларг'; //Astox
                if (strripos($rassaBrud,'Astox')>0) $rassa='Астокс'; //Maroon
                if (strripos($rassaBrud,'Maroon')>0) $rassa='Мрун'; //Maroon
                $nameBd=''; // имя БД модулей рассы, залогиненного игрока
                if ($rassa=='Тормаль') $nameBd='moduly_tormal';
                if ($rassa=='Гелион') $nameBd='moduly_gelion';
                if ($rassa=='Зект') $nameBd='moduly_zekt';
                if ($rassa=='Велид') $nameBd='moduly_velid';
                if ($rassa=='Гларг') $nameBd='moduly_glarg';
                if ($rassa=='Астокс') $nameBd='moduly_astoks';
                if ($rassa=='Мрун') $nameBd='moduly_mroon';
                // ловим кнопку игрока, личное пространство которого просматриваем
                $rassaGost=''; // здесь имя таблицы игрока, в личное пространство к которому пришли
                // Узнаем рассу просматриваемого персонажа
                $rassaGost=file_get_contents("https://starfederation.ru/?m=api&a=player&name=".$_SESSION['licnoeProstranstvo']);
                //$rassaGost=preg_replace('/\W/','',$rassaGost); // Удалить лишнее
                if (strripos($rassaGost,'Thormal')>0) $rassaGost='Тормаль'; //
                if (strripos($rassaGost,'Helion')>0) $rassaGost='Гелион'; //Zect
                if (strripos($rassaGost,'Zect')>0) $rassaGost='Зект'; //Velid
                if (strripos($rassaGost,'Velid')>0) $rassaGost='Велид'; //Glarg
                if (strripos($rassaGost,'Glarg')>0) $rassaGost='Гларг'; //Astox
                if (strripos($rassaGost,'Astox')>0) $rassaGost='Астокс'; //Maroon
                if (strripos($rassaGost,'Maroon')>0) $rassaGost='Мрун'; //Maroon
                // определить таблицу модулей для игрока, к которому зашли
                if ($rassaGost=='Тормаль') $rassaGost='moduly_tormal';
                if ($rassaGost=='Гелион') $rassaGost='moduly_gelion';
                if ($rassaGost=='Зект') $rassaGost='moduly_zekt';
                if ($rassaGost=='Велид') $rassaGost='moduly_velid';
                if ($rassaGost=='Гларг') $rassaGost='moduly_glarg';
                if ($rassaGost=='Астокс') $rassaGost='moduly_astoks';
                if ($rassaGost=='Мрун') $rassaGost='moduly_mroon';
                $rassaGost=$rassaGost; // здесь имя таблицы игрока, в личное пространство к которому пришли
                $rassa=$rassa;         // здесь имя собственное имя таблицы игрока
                // проверка таблиц
                //dobavitTehu();
                echo '<div class="my_zone_baza_div">';
                echo '<section class="container-fluid"><div class="row">';
                if ($_SESSION['licnoeProstranstvo']==$_SESSION['login']) // если зашел в свою зону
                {
                echo '<div class="col-7">';
                 $classPhp->menu9($rassaGost,'starki.php');
                                 
                 $classPhp->createTab( //если не было таблицы модулей, создать её
                                    'name=tab_modul',
                                    'poleN=id',//-- ID
                                    'poleT=int',
                                    'poleS=0', //-- ID
                                    'poleN=login', //--  
                                    'poleT=varchar(55)',
                                    'poleS=login', //--  
                                    'poleN=name_modul', //--  
                                    'poleT=varchar(155)',
                                    'poleS=modul',//-- 
                                    'poleN=levl_modul',//--  
                                    'poleT=int',
                                    'poleS=0', //-- 
                                    'poleN=rasa',//--  
                                    'poleT=varchar(35)',
                                    'poleS=rasa' //-- 
                                  );
                  $redaktModul=$classPhp->hanterButton("rez=hant","nameStatic=moduly",'returnValue'); // текст на кнопке редактируемого модуля
                  if ($redaktModul)
                  {
                    $rez=$classPhp->zaprosSQL("SELECT id FROM ".$rassaGost." WHERE name='".$redaktModul."'");
                    $stroka=mysqli_fetch_array($rez);
                  
                    $idTextVvod=$stroka[0]+1; // Нашли id текстового поля, которое необходимо запомнить
                    $myRas=preg_replace('/moduly_/','',$nameBd);  
                    $nameTextPole=$myRas.'_text'.$idTextVvod;
                    $levlPoleText=preg_replace('/\D/','',$_POST[$nameTextPole]); // очищаем от нецифр

                    $idModulaIgrokaRez=$classPhp->zaprosSQL("SELECT id FROM tab_modul WHERE login='".$_SESSION['login']."' AND name_modul='".$redaktModul."'");
                    $idModulaIgroka=mysqli_fetch_array($idModulaIgrokaRez);
                    if (!$idModulaIgroka[0]>0) // если у данного игрока ещё нет такого модуля
                    if (isset($_POST[$nameTextPole]) && $_POST[$nameTextPole]!='')
                     $rez=$classPhp->zaprosSQL("INSERT INTO tab_modul(id, login, name_modul, levl_modul, rasa) VALUES (".$classPhp->maxIdLubojTablicy('tab_modul').",'".$_SESSION['login']."','".$redaktModul."',".$levlPoleText.",'".$myRas."')");
                     if ($idModulaIgroka[0]>0) // если у данного игрока уже есть запись такого модуля
                     if (isset($_POST[$nameTextPole]) && $_POST[$nameTextPole]!='')
                     $rez=$classPhp->zaprosSQL("UPDATE tab_modul SET levl_modul=".$levlPoleText." WHERE login='".$_SESSION['login']."' AND name_modul='".$redaktModul."'" );
                    }
                     echo '</div>';
                     echo '<div class="col-5">';
            }
                $rez=$classPhp->zaprosSQL("SELECT name_modul,levl_modul FROM tab_modul WHERE login='".$_SESSION['licnoeProstranstvo']."'");
                $i=0;
                while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                {
                  echo '<div class="row">';
                  echo '<div class="col-10 polosaFon'.$i.'">'.$stroka['name_modul'].'</div><div class="col-2 polosaFon'.$i.'">'.$stroka['levl_modul'].'</div>';
                  echo '</div>';
                  if ($i==0) $i=1; else $i=0;
                }
                
                if ($_SESSION['licnoeProstranstvo']==$_SESSION['login']) // если зашел в свою зону
                 echo '</div>';
                 echo '</div></section>';
                 echo '</div>';
             }
             if ($_SESSION['regimMyZone']==3)
             {
               echo '<div class="my_zone_baza_div">';
               $modul->news1('classKill=-button_statia-','classRedakt=-button_statia-',
                               "Отступ=1","Шаблон=2",'Статьи редактора='.$_SESSION['zonePokaz'],
                               'nameTD=my_zone_free'.$_SESSION['zonePokaz'],"Заголовок=h3",'Логин редактора='.$_SESSION['zonePokaz']);
               echo '</div>';
             }
             if ($_SESSION['regimMyZone']==2)
             {
               echo '<div class="my_zone_baza_div">';
               $modul->news1('classKill=-button_statia-','classRedakt=-button_statia-',
                               "Отступ=1","Шаблон=2",'Статьи редактора='.$_SESSION['zonePokaz'],
                               'nameTD=my_zone_proect'.$_SESSION['zonePokaz'],"Заголовок=h3",'Логин редактора='.$_SESSION['zonePokaz']);
               echo '</div>';
             }
             if ($_SESSION['regimMyZone']==1)
             {
               echo '<div class="my_zone_baza_div">';
               $modul->news1('classKill=-button_statia-','classRedakt=-button_statia-',
                               "Отступ=1","Шаблон=2",'Статьи редактора='.$_SESSION['zonePokaz'],
                               'nameTD=my_zone_baza'.$_SESSION['zonePokaz'],"Заголовок=h3",'Логин редактора='.$_SESSION['zonePokaz']);
               echo '</div>';
             }
            echo '</div>';
            echo '<div class="col-1">';
            echo '</div>';
            echo '</div>';
            echo '</section>';
       }
}
function dobavitModul()
{
                   $classPhp = new redaktor\maty();
                    // проверим есть ли таблица, если нет, то создадим её
                    // Таблица модулей Гелионов
                 $classPhp->createTab(
                    'name=rasy_stark',
                    'poleN=ID',//-- ID
                    'poleT=int',
                    'poleS=0', //-- ID
                    'poleN=NAME', //-- NAME
                    'poleT=varchar(255)',
                    'poleS=nameModul', //-- NAME
                    'poleN=URL', //-- URL
                    'poleT=varchar(255)',
                    'poleS=text2',//-- URL
                    'poleN=CLASS',//-- CLASS
                    'poleT=varchar(255)',
                    'poleS=class_rasy_stark', //-- CLASS
                    'poleN=STATUS',//-- ID
                    'poleT=varchar(255)',
                    'poleS=-45' //-- ID
                  );

                  if ($classPhp->maxIdLubojTablicy('rasy_stark')<2)
                  $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (1,'br','text','class_rasy_br','-45')"); //br
                  if ($classPhp->maxIdLubojTablicy('rasy_stark')<3)
                  $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','class_rasy_br','-45')"); // текстовое
                  
                  if ($classPhp->maxIdLubojTablicy('rasy_stark')<4)
                  $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (3,'Гелионы','starki.php','class_rasy_stark_gelion btn','-45')"); // текстовое
                  
                  if ($classPhp->maxIdLubojTablicy('rasy_stark')<5)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (4,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<6)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (5,'Зект','starki.php','class_rasy_stark_zect btn','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<7)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (6,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<8)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (7,'Тормаль','starki.php','class_rasy_stark_tormal','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<9)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (8,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<10)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (9,'Велид','starki.php','class_rasy_stark_velid','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<11)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (10,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<12)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (11,'Гларг','starki.php','class_rasy_stark_glarg','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<13)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (12,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<14)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (13,'Астокс','starki.php','class_rasy_stark_astoks','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<15)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (14,'br','text','class_rasy_br','-45')"); // текстовое
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<16)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (15,'Мрун','starki.php','class_rasy_stark_mrun','-45')"); //br
                    if ($classPhp->maxIdLubojTablicy('rasy_stark')<17)
                    $classPhp->zaprosSQL("INSERT INTO rasy_stark(ID, NAME, URL, CLASS, STATUS) VALUES (16,'br','text','class_rasy_br','-45')"); // текстовое
               ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // редактируем таблицу
                   proverkaTablicModuliRas();
                   if (!isset($_SESSION['redaktiruem_moduli'])) $_SESSION['redaktiruem_moduli']='';
                   
                   //создаем префикс для подмены БД
                   if ($_SESSION['redaktiruem_moduli']=='Гелионы') $_SESSION['redaktiruem_moduli_angl']='gelion';
                   else if ($_SESSION['redaktiruem_moduli']=='Зект') $_SESSION['redaktiruem_moduli_angl']='zekt';
                   else if ($_SESSION['redaktiruem_moduli']=='Тормаль') $_SESSION['redaktiruem_moduli_angl']='tormal';
                   else if ($_SESSION['redaktiruem_moduli']=='Велид') $_SESSION['redaktiruem_moduli_angl']='velid';
                   else if ($_SESSION['redaktiruem_moduli']=='Гларг') $_SESSION['redaktiruem_moduli_angl']='glarg';
                   else if ($_SESSION['redaktiruem_moduli']=='Астокс') $_SESSION['redaktiruem_moduli_angl']='astoks';
                   else if ($_SESSION['redaktiruem_moduli']=='Мрун') $_SESSION['redaktiruem_moduli_angl']='mroon';      
                   else $_SESSION['redaktiruem_moduli_angl']='';
                   ///////////////////////////////////////////////////////////////////////////////
                          // добавляем модуль
                          if (isset($_POST['nameModul']) && $_POST['nameModul']!='')
                          if (!$classPhp->siearcSlova('moduly_'.$_SESSION['redaktiruem_moduli_angl'],'NAME',$_POST['nameModul'])) //если нет такого модуля то продолжим
                          {
                          $id=$classPhp->maxIdLubojTablicy('moduly_'.$_SESSION['redaktiruem_moduli_angl']);
                          $classPhp->zaprosSQL("INSERT INTO moduly_".$_SESSION['redaktiruem_moduli_angl']."(ID, NAME, URL, CLASS, STATUS) VALUES (".$id.",'".$_POST['nameModul']."','starki.php','class_rasy_stark_".$_SESSION['redaktiruem_moduli_angl']."_modul btn','-12345')"); // текстовое
                          $classPhp->zaprosSQL("INSERT INTO moduly_".$_SESSION['redaktiruem_moduli_angl']."(ID, NAME, URL, CLASS, STATUS) VALUES (".++$id.",'".$_SESSION['redaktiruem_moduli_angl']."_text".$id."','text2','moduly_gelion_text','-12345')"); // текстовое
                          $classPhp->zaprosSQL("INSERT INTO moduly_".$_SESSION['redaktiruem_moduli_angl']."(ID, NAME, URL, CLASS, STATUS) VALUES (".++$id.",'br','text','moduly_gelion_br','-12345')"); //br
                          }
                          echo '<div class="my_zone_baza_div">';
                          echo '<div class="row">';
                          echo '<div class="col-6">';
                          $classPhp->menu9('rasy_stark','starki.php');
                          echo '</div>';
                          echo '<div class="col-6">';
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 if (!isset($_POST['rasy_stark']))
                  {
                    $valueKill=$classPhp->hanterButton('rez=hant','nameStatic=NAME','returnValue');
                    $bazaKill=$classPhp->hanterButton('rez=hant','nameStatic=NAME','returnNameDynamic');
                    if ($valueKill && $bazaKill)
                    {
                    if (stripos($bazaKill,'gelion')>0) $bazaKill='moduly_gelion';
                    if (stripos($bazaKill,'zekt')>0) $bazaKill='moduly_zekt';
                    if (stripos($bazaKill,'tormal')>0) $bazaKill='moduly_tormal';
                    if (stripos($bazaKill,'velid')>0) $bazaKill='moduly_velid';
                    if (stripos($bazaKill,'glarg')>0) $bazaKill='moduly_glarg';
                    if (stripos($bazaKill,'astoks')>0) $bazaKill='moduly_astoks';
                    if (stripos($bazaKill,'mroon')>0) $bazaKill='moduly_mroon';
                    $valueKill=preg_replace('/X /','',$valueKill);
                    $rez=$classPhp->zaprosSQL("SELECT id FROM ".$bazaKill." WHERE name='".$valueKill."'");
                    $stroka=mysqli_fetch_array($rez);
                    $idS=$stroka[0]-1;
                    $idF=$stroka[0]+3;
                    $classPhp->zaprosSQL("DELETE FROM ".$bazaKill." WHERE id>".$idS." AND id<".$idF);
                    }
                  }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////
                        if (isset($_POST['rasy_stark']))
                          $_SESSION['redaktiruem_moduli']=$_POST['rasy_stark'];
                    if ($_SESSION['redaktiruem_moduli']=='Гелионы')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_gelion WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_gelion_modul-','кнопок-1','action=-starki.php-','n1-NAME_gelion'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Зект')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_zekt WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_zekt_modul-','кнопок-1','action=-starki.php-','n1-NAME_zekt'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Тормаль')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_tormal WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_tormal_modul-','кнопок-1','action=-starki.php-','n1-NAME_tormal'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Велид')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_velid WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_velid_modul-','кнопок-1','action=-starki.php-','n1-NAME_velid'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Гларг')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_glarg WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_glarg_modul-','кнопок-1','action=-starki.php-','n1-NAME_glarg'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Астокс')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_astoks WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_astoks_modul-','кнопок-1','action=-starki.php-','n1-NAME_astoks'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                    if ($_SESSION['redaktiruem_moduli']=='Мрун')
                        {
                          $rez=$classPhp->zaprosSQL("SELECT NAME,id FROM moduly_mroon WHERE url='starki.php'");
                          while(!is_null($stroka=mysqli_fetch_assoc($rez)))
                            $classPhp->buttonPrefix('class=-row-','container','classButton=-button_class_rasy_stark_mroon_modul-','кнопок-1','action=-starki.php-','n1-NAME_mroon'.$stroka['id'],'v1-X '.$stroka['NAME']);
                        }
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
}
function proverkaTablicModuliRas()
{
    $classPhp = new redaktor\maty();
    $classPhp->createTab(
        'name=moduly_gelion',
        'poleN=ID',//-- ID
        'poleT=int',
        'poleS=0', //-- ID
        'poleN=NAME', //-- NAME
        'poleT=varchar(255)',
        'poleS=Малый двигательный отсек', //-- NAME
        'poleN=URL', //-- URL
        'poleT=varchar(255)',
        'poleS=starki.php',//-- URL
        'poleN=CLASS',//-- CLASS
        'poleT=varchar(255)',
        'poleS=class_rasy_stark_gelion_modul btn', //-- CLASS
        'poleN=STATUS',//-- ID
        'poleT=varchar(255)',
        'poleS=-12345' //-- ID
      );
      if ($classPhp->maxIdLubojTablicy('moduly_gelion')<2)
      $classPhp->zaprosSQL("INSERT INTO moduly_gelion(ID, NAME, URL, CLASS, STATUS) VALUES (1,'gelion_text1','text2','moduly_gelion_text','-12345')"); // текстовое
      if ($classPhp->maxIdLubojTablicy('moduly_gelion')<3)
      $classPhp->zaprosSQL("INSERT INTO moduly_gelion(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_gelion_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_zekt',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Буровая платформа МД-1', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_zekt_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_zekt')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_zekt(ID, NAME, URL, CLASS, STATUS) VALUES (1,'zekt_text1','text2','moduly_zekt_text','-12345')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_zekt')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_zekt(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_zekt_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_tormal',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Грузовая платформа', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_tormal_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_tormal')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_tormal(ID, NAME, URL, CLASS, STATUS) VALUES (1,'tormal_text1','text2','moduly_tormal_text','-12345')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_tormal')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_tormal(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_tormal_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_velid',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Лазерная турель', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_velid_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_velid')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_velid(ID, NAME, URL, CLASS, STATUS) VALUES (1,'velid_text1','text2','moduly_velid_text','-12345')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_velid')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_velid(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_velid_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_glarg',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Малый реакторный отсек', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_glarg_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_glarg')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_glarg(ID, NAME, URL, CLASS, STATUS) VALUES (1,'glarg_text1','text2','moduly_glarg_text','-12345')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_glarg')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_glarg(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_glarg_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_astoks',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Нейтронный модулятор', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_astoks_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_astoks')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_astoks(ID, NAME, URL, CLASS, STATUS) VALUES (1,'gelion_text1','text2','moduly_astoks_text','-12345')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_astoks')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_astoks(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_astoks_br','-12345')"); //br
///////////////////////////////
$classPhp->createTab(
    'name=moduly_mroon',
    'poleN=ID',//-- ID
    'poleT=int',
    'poleS=0', //-- ID
    'poleN=NAME', //-- NAME
    'poleT=varchar(255)',
    'poleS=Рабочий отсек', //-- NAME
    'poleN=URL', //-- URL
    'poleT=varchar(255)',
    'poleS=starki.php',//-- URL
    'poleN=CLASS',//-- CLASS
    'poleT=varchar(255)',
    'poleS=class_rasy_stark_mroon_modul btn', //-- CLASS
    'poleN=STATUS',//-- ID
    'poleT=varchar(255)',
    'poleS=-12345' //-- ID
  );
  if ($classPhp->maxIdLubojTablicy('moduly_mroon')<2)
  $classPhp->zaprosSQL("INSERT INTO moduly_mroon(ID, NAME, URL, CLASS, STATUS) VALUES (1,'mroon_text1','text2','moduly_mroon_text','-45')"); // текстовое
  if ($classPhp->maxIdLubojTablicy('moduly_mroon')<3)
  $classPhp->zaprosSQL("INSERT INTO moduly_mroon(ID, NAME, URL, CLASS, STATUS) VALUES (2,'br','text','moduly_mroon_br','-45')"); //br

}
//function dobavitTehu()
//{
                 //  $classPhp = new redaktor\maty();
                    // проверим есть ли таблица, если нет, то создадим её
                // Таблица модулей Гелионов
               // if ($_SESSION['status']==4 || $_SESSION['status']==5)
               // if ($_SESSION['status']==4 || $_SESSION['status']==5)
               // if ($classPhp->maxIdLubojTablicy('moduly_gelion')<2)  
               //  {
                   


                  //  if ($classPhp->maxIdLubojTablicy('moduly_gelion')<4)
                  //  $classPhp->zaprosSQL("INSERT INTO moduly_gelion(ID, NAME, URL, CLASS, STATUS) VALUES (3,'Двигательный отсек','starki.php','class_moduly_gelion','-12345')"); // текстовое
                  //  if ($classPhp->maxIdLubojTablicy('moduly_gelion')<5)
                  //  $classPhp->zaprosSQL("INSERT INTO moduly_gelion(ID, NAME, URL, CLASS, STATUS) VALUES (4,'gelion_text2','text2','moduly_gelion_text','-12345')"); // текстовое
                  //  if ($classPhp->maxIdLubojTablicy('moduly_gelion')<6)
                  //  $classPhp->zaprosSQL("INSERT INTO moduly_gelion(ID, NAME, URL, CLASS, STATUS) VALUES (5,'br','text','moduly_gelion_br','-12345')"); //br
                // }
//}
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
                    $text=$_POST['Izmenit'];
                    $text3=preg_replace('/\n/','<br>',$text);
                     $classdxdl->zaprosSQL("UPDATE starki_ustaw SET NAME='".$text3."' WHERE ID=1");
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
          $classdxdl->killTab2('strarki_menu_dolgnosti');

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