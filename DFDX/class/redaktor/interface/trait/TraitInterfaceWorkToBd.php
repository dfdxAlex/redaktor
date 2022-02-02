<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToBd
{
     public function kolVoStolbovTablice($nameTablice)  
     {
         $zapros="SELECT MAX(ORDINAL_POSITION) FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME='".$nameTablice."'";
         $query=$this->zaprosSQL($zapros);   
         $viv=mysqli_fetch_array($query);
         return $viv[0];
      }
     public function kolVoZapisTablice($nameTablice)  
     {
         if ($this->searcNameTablic($nameTablice)) {
             $zapros="SELECT COUNT(1) FROM ".$nameTablice;
             $rez=$this->zaprosSQL($zapros);
             $viv=mysqli_fetch_array($rez);
             return $viv[0];
          } else return 0;
     }

     public function tablicaDlaMenu($nameTablice)
     {
         $boolRez=false;
         $zapros="SELECT ID FROM tablica_tablic WHERE NAME='".$nameTablice."'";
         $rez=$this->zaprosSQL($zapros);
         if (notFalseAndNULL($rez)!==true) echo 'Проблема с таблицей "tablica_tablic"';
         if (notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
         if (notFalseAndNULL($stroka))   
         if ($stroka[0]>-1) $boolRez=true;
         return $boolRez; 
      }
      
     public function zaprosSQL($zapros)
     {
         $statistikTrueFalseRez=mysqli_query($this->con,'SELECT statik_true FROM statistik_dfdx WHERE 1');
         $statistikTrueFalse=mysqli_fetch_assoc($statistikTrueFalseRez);
         if ($statistikTrueFalse['statik_true']==1) {
             $statistikTrueFalseRez=mysqli_query($this->con,'SELECT n_zapros FROM statistik_dfdx WHERE 1');
             $statistik_n_zapros=mysqli_fetch_assoc($statistikTrueFalseRez);
             $statistik_n_zapros['n_zapros']++;
             mysqli_query($this->con,'UPDATE statistik_dfdx SET n_zapros='.$statistik_n_zapros['n_zapros'].' WHERE 1');
             mysqli_query($this->con,'UPDATE statistik_dfdx SET d_zapros="'.date("y.m.d").'" WHERE 1');
          }
         $rez=mysqli_query($this->con,$zapros);
         return $rez;
     }

     public function killZapisTablicy($nameTablice,$were) 
     {
        $zapros="DELETE FROM ".$nameTablice." ".$were;
        $rez=$this->zaprosSQL($zapros);
     }

     public function maxIdLubojTablicy($nameTablice)  // поиск максимального ID таблицы +1
     {
         $zapros="SELECT MAX(id) FROM ".$nameTablice;
         $rez=$this->zaprosSQL($zapros);
         if ($rez===false) return -1;
         $stroka=mysqli_fetch_array($rez);
         if (is_null($stroka[0])) $stroka[0]=-1;
         $rezId=$stroka[0]+1;
         return $rezId;
      }

      public function clearTab($nameTablicy)
          {
              $zapros="TRUNCATE TABLE ".$nameTablicy;
              $rez=$this->zaprosSQL($zapros);
          }

      public function killTabEtap1($nameTablicy)
      {      
          if ($this->searcNameTablic($nameTablicy)) {
              echo '<h4>Внимание!! Попытка удалить таблицу '.$nameTablicy.'</h4>'; 
                  echo '<div class="container">';
                      echo '<div class="row">';
                          echo '<form method="POST" action="redaktor.php">';
                              echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="'.$this->zapretUdaleniaTablicy($nameTablicy).'" name="killTabOk">';
                              echo '<input class="btn btn-primary buttonStartNastrRedaktor" type="submit" value="Отмена" name="killTabCancel">';
                          echo '</form>';
                      echo '</div>';
                  echo '</div>';
            } else 
            okCansel('Такой таблицы нет и не важно на что нажать:). Пока-пока...','poka_poka','divTabUniwJestUge','pTabUniwJestUge','buttonTabUniwJestUge');
       }

      public function killTab($nameTablicy)
      {
          $zapros="DROP TABLE ".$_SESSION['nameTablice'];
          $rez=$this->zaprosSQL($zapros);
      }

      public function killTab2($nameTablicy)
      {
          $zapros="DROP TABLE ".$nameTablicy;
          $rez=$this->zaprosSQL($zapros);
      }
      public function searcNameTablic($nameTablicy)  
      {
          $result=false;
          $zapros="SHOW TABLES";
          $rez=$this->zaprosSQL($zapros);
          while (!is_null($stroka=(mysqli_fetch_array($rez))))
              if ($stroka[0]==$nameTablicy)   
                  $result=true;           
          return $result;
       }
      public function id_tab_gl_searc($nameTablicy)
      {
         $zapros="select * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
         $stroka='';
         $rez=$this->zaprosSQL($zapros);
         if (notFalseAndNULL($rez)) {
               $stroka=(mysqli_fetch_assoc($rez));
               return false;
             }
         if ($stroka['COLUMN_NAME']=='id_tab_gl') return true;
         return false;
      }

      public function radioAndChekboxSearc($nameTablicy)
        {
            $zapros="select  from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='".$nameTablicy."'";
            $rez=$this->zaprosSQL($zapros);
            $vozvrat=false;
            $str=$this->kolVoZapisTablice($nameTablice);
            while (!is_null($stroka=(mysqli_fetch_assoc($rez))))
               if ($stroka['radio'] || $stroka['checkbox']) {
                  $vozvrat=true;
                  break;
              }
            return $vozvrat;
        }

     public function zapretUdaleniaTablicy($nameTablicy)  
        {
           if ($nameTablicy=='menu_parametr_tab') return 'Невозможно удалить';
           if ($nameTablicy=='nastrolkiredaktora') return 'Невозможно удалить';
           if ($nameTablicy=='redaktor_down') return 'Невозможно удалить';
           if ($nameTablicy=='redaktor_nastr7') return 'Невозможно удалить';
           if ($nameTablicy=='redaktor_up') return 'Невозможно удалить';
           if ($nameTablicy=='tablica_tablic') return 'Невозможно удалить';
           if ($nameTablicy=='login') return 'Невозможно удалить';
           if ($nameTablicy=='registracia') return 'Невозможно удалить';//
           if ($nameTablicy=='podtverdit') return 'Невозможно удалить';
           if ($nameTablicy=='status_klienta') return 'Невозможно удалить';
           if ($nameTablicy=='type_menu_po_imeni') return 'Невозможно удалить';
           if ($nameTablicy=='redakt_profil') return 'Невозможно удалить';
           if ($nameTablicy=='redakt_profil_tegi') return 'Невозможно удалить';
           if ($nameTablicy=='maty') return 'Невозможно удалить';
           if ($nameTablicy=='menu_maty') return 'Невозможно удалить';
           if ($nameTablicy=='mat_ot_polzovatelej') return 'Невозможно удалить';
           if ($nameTablicy=='nie_maty') return 'Невозможно удалить';
           if ($nameTablicy=='tablica_nastroer_dvigka_int') return 'Невозможно удалить';  
           if ($nameTablicy=='dla_statusob_123') return 'Невозможно удалить';
           return 'Согласен удалить';
       }
  
    public function siearcSlova($nameTablice,$stolb,$slovo)
      {
        $zapros="SELECT ".$stolb." FROM ".$nameTablice." WHERE ".$stolb."='".$slovo."'";
        $rez=$this->zaprosSQL($zapros);
        if ($rez===false) return false;
        $stroka=mysqli_fetch_array($rez);
        if (is_null($stroka)) return false;
        $strr='--'.$stroka[0];
        $strVhod=stripos( $strr ,$slovo);
        if ($strVhod>1) return true;
        return false;
      }

    public function searcIdPoUsloviu($nameTablicy,$usl1,$usl2,$usl3,$usl4,$usl5)  
    {
      $zapros="SELECT MAX(id) FROM ".$nameTablicy;
      if ($usl1!="") $zapros=$zapros.' WHERE '.$usl1;
      if ($usl2!="") $zapros=$zapros.' AND '.$usl2;
      if ($usl3!="") $zapros=$zapros.' AND '.$usl3;
      if ($usl4!="") $zapros=$zapros.' AND '.$usl4;
      if ($usl5!="") $zapros=$zapros.' AND '.$usl5;
      $rez=$this->zaprosSQL($zapros);
      if (!$rez) return 0;
      $stroka=mysqli_fetch_array($rez);
      if (is_null($stroka)) return 0;
      if ($stroka[0]=='')   return 0;
      if ($stroka)  return $stroka[0];
      return 0;
    }

    public function initBdHost()
    {
      return $this->host;
    }

    public function initBdLogin()
    {
      return $this->loginBD;
    }

    public function initBdParol()
    {
      return $this->parol;
    }

    public function initBdNameBD()
    {
      return $this->nameBD;
    }

    public function initsite()
    {
      return $this->site;
    } 

    public function checkedStatus($pole,$str,$status,$nameTable)
    {
      $zapros="SELECT status FROM ".$nameTable."_status WHERE stolb=".$pole." AND str=".$str;
      $rez=$this->zaprosSQL($zapros);
      if ($rez===false) return ' ';
      $stroka=mysqli_fetch_array($rez);
      if ($stroka===false) return ' ';
      if (stripos($stroka['0'],$status)!==false) return 'checked';
      $rez=$this->zaprosSQL($zapros);
      $stroka=mysqli_fetch_array($rez);
      return ' ';
    }
}
