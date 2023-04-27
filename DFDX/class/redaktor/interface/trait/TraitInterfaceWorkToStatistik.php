<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToStatistik
{
    public function statistikOnOff()
    {
        if (isset($_POST['buttonStatistik'])) {
          if ($_POST['buttonStatistik']=='Включить статистику запроссов к БД (функция zaprosSQL)')
             $this->zaprosSQL("UPDATE statistik_dfdx SET statik_true=1 WHERE 1");
          if ($_POST['buttonStatistik']=='Выключить статистику запроссов к БД (функция zaprosSQL)')
             $this->zaprosSQL("UPDATE statistik_dfdx SET statik_true=0 WHERE 1");
        }
        //echo 'нажата кнопка статистики';
        $rez=$this->zaprosSQL("SELECT statik_true FROM statistik_dfdx WHERE 1");
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
      $rez=$this->zaprosSQL("SELECT d_zapros FROM statistik_dfdx WHERE 1");
      $stroka=mysqli_fetch_assoc($rez);
      return $stroka['d_zapros'];
    }

    public function kolZaprosow()
    {
      $rez=$this->zaprosSQL("SELECT n_zapros FROM statistik_dfdx WHERE 1");
      $stroka=mysqli_fetch_assoc($rez);
      return $stroka['n_zapros'];
    }

    public function metkaStatistika($metka)
    {
      $rez=$this->zaprosSQL("SELECT id FROM slegka_dfdx WHERE metka='".$metka."'");
      $stroka=mysqli_fetch_assoc($rez);
      if ($this->notFalseAndNULL($stroka) && $stroka['id']>0) {
        $id=$stroka['id'];
        $rez=$this->zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
        $stroka=mysqli_fetch_assoc($rez);
        $stroka['zaprosov']++;
        $this->zaprosSQL("UPDATE slegka_dfdx SET zaprosov=".$stroka['zaprosov']." WHERE id=".$id);
      } else $this->zaprosSQL("INSERT INTO slegka_dfdx(id, metka, zaprosov) VALUES (".$this->maxIdLubojTablicy('slegka_dfdx') .",'".$metka."',1)");
    }

    public function getMetkaStatistik($metka) // чтение числа запроссов к метке
    {
      $rez=$this->zaprosSQL("SELECT zaprosov FROM slegka_dfdx WHERE metka='".$metka."'");
      $stroka=mysqli_fetch_assoc($rez); 
      if (!$this->notFalseAndNULL($stroka)) return 0;
      return $stroka['zaprosov'];
    }

    public function googleAnalitic($src)
    {
      new \class\classNew\analitic\GoogleAnalitic();
    }
}
