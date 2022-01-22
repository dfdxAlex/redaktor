<?php
namespace redaktor;

class statistic  extends futter // // Класс работа со статистикой
{
  public function __construct()
  {
     parent::__construct();
     parent::createTab(
       'name=statistik_dfdx',
       'poleN=statik_true',
       'poleT=int',
       'poleS=0',
       'poleN=n_zapros',
       'poleT=int',
       'poleS=0',
       'poleN=d_zapros',
       'poleT=DATE',
       'poleS=1000-01-01'
     );
     parent::createTab(
      'name=slegka_dfdx',
      'poleN=id',
      'poleT=int',
      'poleS=0',
      'poleN=metka',
      'poleT=VARCHAR(500)',
      'poleS=-',
      'poleN=zaprosov',
      'poleT=int',
      'poleS=0'//,'просмотр'
    );
  }
  public function statistikOnOff()
  {
      if (isset($_POST['buttonStatistik'])) {
        if ($_POST['buttonStatistik']=='Включить статистику запроссов к БД (функция zaprosSQL)')
           parent::zaprosSQL("UPDATE statistik_dfdx SET statik_true=1 WHERE 1");
        if ($_POST['buttonStatistik']=='Выключить статистику запроссов к БД (функция zaprosSQL)')
           parent::zaprosSQL("UPDATE statistik_dfdx SET statik_true=0 WHERE 1");
      }
      //echo 'нажата кнопка статистики';
      $rez=parent::zaprosSQL("SELECT statik_true FROM statistik_dfdx WHERE 1");
      $stroka=mysqli_fetch_assoc($rez);
      if ($stroka['statik_true']==0) {$classButtonStatik='classButtonStatikFalse'; $valueButtonStatik="Включить статистику запроссов к БД (функция zaprosSQL)";}
      else {$classButtonStatik='classButtonStatikTrue';$valueButtonStatik="Выключить статистику запроссов к БД (функция zaprosSQL)";}
      //кнока включить-выключить статистику запросов в БД
      echo '<section class="container-fluid">';
      echo '<div class="row">';
      echo '<div class="buttonStatistikDiv">';
      echo '<form action="redaktor.php" method="post">';
      echo '<input type="submit" class="'.$classButtonStatik.' btn" value="'.$valueButtonStatik.'" name="buttonStatistik">';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</section>';
  }
  public function dataObnov()
  {
    $rez=parent::zaprosSQL("SELECT d_zapros FROM statistik_dfdx WHERE 1");
    $stroka=mysqli_fetch_assoc($rez);
    return $stroka['d_zapros'];
  }
  public function kolZaprosow() // число запросов к базе данных
  {
    $rez=parent::zaprosSQL("SELECT n_zapros FROM statistik_dfdx WHERE 1");
    $stroka=mysqli_fetch_assoc($rez);
    return $stroka['n_zapros'];
  }
  public function metkaStatistika($metka)  // увеличение запроссов к метке на 1
  {
    $rez=parent::zaprosSQL("SELECT id FROM slegka_dfdx WHERE metka='".$metka."'");
    $stroka=mysqli_fetch_assoc($rez);
    if (parent::notFalseAndNULL($stroka) && $stroka['id']>0) {
      $id=$stroka['id'];
      $rez=parent::zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
      $stroka=mysqli_fetch_assoc($rez);
      $stroka['zaprosov']++;
      parent::zaprosSQL("UPDATE slegka_dfdx SET zaprosov=".$stroka['zaprosov']." WHERE id=".$id);
    } else parent::zaprosSQL("INSERT INTO slegka_dfdx(id, metka, zaprosov) VALUES (".parent::maxIdLubojTablicy('slegka_dfdx') .",'".$metka."',1)");
  }
  public function getMetkaStatistik($metka) // чтение числа запроссов к метке
  {
    $rez=parent::zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
    $stroka=mysqli_fetch_assoc($rez); 
    if (!parent::notFalseAndNULL($stroka)) return 0;
    return $stroka['zaprosov'];
  }
}