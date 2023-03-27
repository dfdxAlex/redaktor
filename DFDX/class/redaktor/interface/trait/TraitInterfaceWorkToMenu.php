<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToMenu
{
         public function getNamepoId($tab,$id) 
         {
            $zapros="SELECT NAME FROM ".$tab." WHERE ID=".$id;
            $rez=$this->zaprosSQL($zapros);
            $stroka=mysqli_fetch_array($rez);
            return $stroka['NAME'];
         }

         public function typMenu($nameTablic)
         {
            $zapros="SELECT type_menu FROM type_menu_po_imeni WHERE name_menu='".$nameTablic."'";
            $rez=$this->zaprosSQL($zapros);
            if ($rez) $stroka=mysqli_fetch_array($rez); else return 0;
            if ($stroka[0]>0) return $stroka[0]; else return 0;
         }

         public function saveTypMenu($nameTablic,$typ)
         {
            $zapros="UPDATE type_menu_po_imeni SET `type_menu`=".$typ." WHERE name_menu='".$nameTablic."'";
            $rez=$this->zaprosSQL($zapros);
            return $rez;
         }

         public function createTypMenu($nameTablic,$typ)
         {
            $zapros="INSERT INTO type_menu_po_imeni(`name_menu`, `type_menu`) VALUES ('".$nameTablic."',".$typ.")";
            $rez=$this->zaprosSQL($zapros);
            return $rez;
         }

     public function __unserialize(array $data)//:void
     {
      $nameMenu=$data[0];
      $nameTablic=$data[1];
      $this->zapuskMenuMagiceski=true;
      if ($nameMenu=='menu3') {
          $i=0;
          foreach ($data as $value) {
              if ($i>1) // блокируем проверку первых двух элементов массива, которые содержат в себе значения переменных $nameMenu и $nameTablic
                  $this->masKn[$i-2] = $value;
              $i++;
          }
          $this->menu3($nameTablic);
        }

      if ($nameMenu=='menu4' || $nameMenu=='menu5' || $nameMenu=='menu6' || $nameMenu=='menu7' || $nameMenu=='menu8' || $nameMenu=='menu9') {
          $i=0;
              foreach ($data as $value) {
                  if ($i>1) // блокируем проверку первых двух элементов массива, которые содержат в себе значения переменных $nameMenu и $nameTablic
                      $this->masKn[$i-2] = $value;
                  $i++;
          }
          
       if ($nameMenu=='menu4')
            $this->menu4($nameTablic,$this->masKn[0]);
       if ($nameMenu=='menu5')
            $this->menu5($nameTablic,$this->masKn[0]);
       if ($nameMenu=='menu6')
            $this->menu6($nameTablic,$this->masKn[0]);
       if ($nameMenu=='menu7')
            $this->menu7($nameTablic,$this->masKn[0]);
       if ($nameMenu=='menu8')
            $this->menu8($nameTablic,$this->masKn[0]);
       if ($nameMenu=='menu9')
            $this->menu9($nameTablic,$this->masKn[0]);
     }
     $this->zapuskMenuMagiceski=false;
}

     public function menu($nameTablic)
     {
         if ($this->typMenu($nameTablic)!=1) {
             if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                 $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                 $this->saveTypMenu($nameTablic,1); 
             }
         if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,1);
         }
        
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $i=0;
        if ($this->notFalseAndNULL($rez))
            while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
                if ($stroka['URL']!='default')
                    echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
                if ($stroka['URL']=='default')
                    echo '<form class="form_'.$stroka['CLASS'].'" action="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
            $i++;
        }
        echo'</section>';
     }

     public function menu2($nameTablic,$kod)
     {
        if ($this->typMenu($nameTablic)!=2) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
            $this->saveTypMenu($nameTablic,2); 
            }
        if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,2);
        }
       if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
       
       if ($kod>=32768) $this->kn[15]=true; else $this->kn[15]=false;
       while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[14]=true; else $this->kn[14]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[13]=true; else $this->kn[13]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[12]=true; else $this->kn[12]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[11]=true; else $this->kn[11]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[10]=true; else $this->kn[10]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[9]=true; else $this->kn[9]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[8]=true; else $this->kn[8]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[7]=true; else $this->kn[7]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[6]=true; else $this->kn[6]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[5]=true; else $this->kn[5]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[4]=true; else $this->kn[4]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[3]=true; else $this->kn[3]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[2]=true; else $this->kn[2]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[1]=true; else $this->kn[1]=false;
           while ($kod>=32768) {$kod=$kod-32768;}
       $kod=$kod << 1;
       if ($kod>=32768) $this->kn[0]=true; else $this->kn[0]=false;

       $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
       $rez=$this->zaprosSQL($zapros);
       echo'<section class="'.$nameTablic.'">';
       $i=0;
       while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
           if ($this->kn[$i])
               if ($stroka['URL']!='default')
                   echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
           if ($this->kn[$i])
               if ($stroka['URL']=='default')
                   echo '<form class="form_'.$stroka['CLASS'].'" action="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
        $i++;
        }
        echo'</section>';
     }

    public function menu3($nameTablic)
    {
        if ($this->typMenu($nameTablic)!=3) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic))  {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,3); 
            }
        if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,3);
        }
        echo'<section class="'.$nameTablic.'">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        foreach ($this->masKn as $value) {
           $zapros="SELECT * FROM ".$nameTablic." WHERE NAME='".$value."'";
           $rez=$this->zaprosSQL($zapros);
           $stroka=mysqli_fetch_array($rez);
           if ($stroka['URL']!='default')
           echo '<form class="form_'.$stroka['CLASS'].'" action="'.$stroka['URL'].'" method="POST"><button class="button_'.$stroka['CLASS'].'" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
           if ($stroka['URL']=='default')
           echo '<form class="form_'.$stroka['CLASS'].'" action="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'" method="POST"><button class="button_'.$stroka['CLASS'].'" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
         }
        unset($value);
        echo'</section>';
    }

     public function menu4($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=4) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,4); 
            }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,4);
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        if (!$rez) echo'Не удалось загрузить таблицу для menu4';
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $i=0;
        while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
            if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && $stroka['URL']!='default')
                echo '<button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            if ($stroka['URL']=='reset')
                echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
           
          if ($stroka['URL']=='text')
              if ($stroka['NAME']!='br') {
                  $textStart="";
                  if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                  echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                  $ii++;
               } else echo '<br>';

          if ($stroka['URL']=='text2')
              if ($stroka['NAME']!='br') {
                  $textStart="";
                  if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                  echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                  $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='textP')
              if ($stroka['NAME']!='br') {
                  $textStart="";
                  if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                  echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                  $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='text2P' || $stroka['URL']=='textP2')
              if ($stroka['NAME']!='br') {
                  $textStart="";
                  if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                  echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                  $ii++;
                } else echo '<br>';           

            if ($stroka['URL']=='default')
                echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
            $i++;
        }
        echo '</form>';
        echo'</section>';
     }

     public function menu5($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=5) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,5); 
            }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,5);
        }

        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $i=0;
        $status=(string)$_SESSION['status'];
        
        while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
            if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
            if ($stroka['URL']!='text2'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default')
                echo '<button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
                echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
            
            if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
                if ($stroka['NAME']!='br') {
                    $textStart="";
                    if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                    echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                    $ii++;
                } else echo '<br>';

            if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
                if ($stroka['NAME']!='br') {
                    $textStart="";
                    if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                    echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                    $ii++;
                 } else echo '<br>';
             
            if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
                if ($stroka['NAME']!='br') {
                    $textStart="";
                    if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                    echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                    $ii++;
                 } else echo '<br>';

            if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                 if ($stroka['NAME']!='br') {
                     $textStart="";
                     if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                     echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                     $ii++;
                  } else echo '<br>';    
             
             if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
                 echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
             $i++;
        }
        echo '</form>';
        echo'</section>';
     }

     public function menu6($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=6) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,6); 
             }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,6);
        }

        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        if ($rez===false) return false;

        while (!is_null($stroka=(mysqli_fetch_assoc($rez)))) {
            if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
            if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP'  && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default') {   
                $linkButton=$stroka['URL'];
            if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($linkButton).'"/>';
            if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
          }

         if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
             echo '<button class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button>';
          
         if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
             if ($stroka['NAME']!='br') {
                 $textStart="";
                 if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                 echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                 $ii++;
              } else echo '<br>';

          if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
              if ($stroka['NAME']!='br') {
                  $textStart="";
                  if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                  echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                  $ii++;
               } else echo '<br>';

           if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
               if ($stroka['NAME']!='br') {
                   $textStart="";
                   if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                   echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                   $ii++;
              } else echo '<br>';

              if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                   if ($stroka['NAME']!='br') {
                       $textStart="";
                       if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                       echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                       $ii++;
                    } else echo '<br>';  

              if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
                  echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
         }
        echo '</form>';
        echo'</section>';
     }

     public function menu7($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=7) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,7); 
             }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,7);
        }

        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
        for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
            while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
                if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']!='text'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default') {   
                        $linkButton=$stroka['URL'];
                        if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
                        echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($linkButton).'">';
                        if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
                    }
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
                    echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
          
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                            $ii++;
                        } else echo '<br>';

                if ($stroka['ID']==$idPoz)
                    if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                         if ($stroka['NAME']!='br') {
                             $textStart="";
                             if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                             echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                             $ii++;
                          } else echo '<br>';                  

                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                            $ii++;
                         } else echo '<br>';

                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='textP' &&  strrpos($stroka['STATUS'],$status)!=false)
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                            $ii++;
                        } else echo '<br>';

                if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
                    if ($stroka['URL']=='default')
                        echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
    
             }
             $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
             $rez=$this->zaprosSQL($zapros);
         }
         echo '</form>';
         echo'</section>';
     }

     public function menu8($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=8) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,8); 
            }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,8);
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
        for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
            while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
                if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2' && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default') {   
                        $linkButton=$stroka['URL'];
                        if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];  
                        echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($linkButton).'">';
                        if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
                    }
                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
                            echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
         
                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
                            if ($stroka['NAME']!='br') {
                                $textStart="";
                                if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                                echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                                $ii++;
                            } else echo '<br>';

                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='textP')
                            if ($stroka['NAME']!='br') {
                                $textStart="";
                                if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                                echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                                $ii++;
                             } else echo '<br>';
                        
                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
                            if ($stroka['NAME']!='br') {
                                $textStart="";
                                if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                                echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                                $ii++;
                             } else echo '<br>';

                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false) {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
                            $ii++;
                         }
                    if ($stroka['ID']==$idPoz)
                        if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                            if ($stroka['NAME']!='br') {
                                $textStart="";
                                if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                                echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                                $ii++;
                             } else echo '<br>';   

                    if ($stroka['ID']==$idPoz)
                        if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false)
                            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
                 }
              $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
              $rez=$this->zaprosSQL($zapros);
           }
        echo '</form>';
        echo'</section>';
     }

     public function menu9($nameTablic,$url)
     {
        if ($this->typMenu($nameTablic)!=9) {
            if ($this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) {
                $this->killZapisTablicy('type_menu_po_imeni',"WHERE name_menu='".$nameTablic."'");
                $this->saveTypMenu($nameTablic,9); 
            }
            if (!$this->siearcSlova('type_menu_po_imeni','name_menu',$nameTablic)) $this->createTypMenu($nameTablic,9);
        }
        $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
        $rez=$this->zaprosSQL($zapros);
        echo'<section class="'.$nameTablic.'">';
        echo '<form class="form_'.$nameTablic.'" action="'.$url.'" method="POST">';
        if (isset($_POST['redaktor_up']) && $_POST['redaktor_up']=='Подсветить меню') echo $nameTablic.'<br>';
        $ii=1;
        $status=(string)$_SESSION['status'];
        $zapros="SELECT MAX(ID) FROM ".$nameTablic." WHERE 1";
        $stroka=mysqli_fetch_array($this->zaprosSQL($zapros));
        $idMax=$stroka[0];
        for ($idPoz=0; $idPoz<=$idMax; $idPoz++) { 
            while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
                if (!isset($stroka['STATUS'])) $stroka['STATUS']='-s0123459';
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']!='textarea'  && $stroka['URL']!='text2P'  && $stroka['URL']!='textP2'  && $stroka['URL']!='textP' && $stroka['URL']!='text' && $stroka['URL']!='text2' && $stroka['URL']!='reset' && strrpos($stroka['STATUS'],$status)!=false && $stroka['URL']!='default' && $stroka['URL']!='p'  
                      && $stroka['URL']!='h1' && $stroka['URL']!='h2' && $stroka['URL']!='h3' && $stroka['URL']!='h4' && $stroka['URL']!='h5' && $stroka['URL']!='h6' && $stroka['URL']!='div' && $stroka['NAME']!='img' 
                        && $stroka['NAME']!='hr'  && $stroka['NAME']!='col1' && (!stripos('-'.$stroka['NAME'],'col2') && !stripos($stroka['NAME'],'&') && !stripos ('-'.$stroka['NAME'],'col3')) ) {   
                           $linkButton=$stroka['URL'];
                           if (isset($_SESSION[$linkButton])) $linkButton=$_SESSION[$linkButton];
                           echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($linkButton).'">';
                           if (isset($_SESSION[$linkButton])) session_unset($_SESSION[$linkButton]);
                     }
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='reset' &&  strrpos($stroka['STATUS'],$status)!=false)
                        echo '<input class="button_'.$stroka['CLASS'].'" type="reset" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">';
          
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='text2' &&  strrpos($stroka['STATUS'],$status)!=false)
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                            $ii++;
                        } else echo '<br>';

                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='textP')
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                            $ii++;
                         } else echo '<br>';
                 
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='text' &&  strrpos($stroka['STATUS'],$status)!=false)
                        if ($stroka['NAME']!='br') {
                            $textStart="";
                            if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                            echo '<input class="text_'.$stroka['CLASS'].'" type="text" name="'.$stroka['NAME'].'" value="'.$textStart.'"/>';
                            $ii++;
                         } else echo '<br>';

                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='textarea' &&  strrpos($stroka['STATUS'],$status)!=false) {
                        $textStart="";
                        if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                        echo '<textarea class="textarea_'.$stroka['CLASS'].'" name="'.$stroka['NAME'].'"/>'.$textStart.'</textarea>';
                        $ii++;
                     }
                if ($stroka['ID']==$idPoz)
                    if (($stroka['URL']=='text2P' || $stroka['URL']=='textP2') &&  strrpos($stroka['STATUS'],$status)!=false)
                       if ($stroka['NAME']!='br') {
                           $textStart="";
                           if ($this->zapuskMenuMagiceski && isset($this->masKn[$ii])) $textStart=$this->masKn[$ii];
                           echo '<input class="text_'.$stroka['CLASS'].'" type="password" name="'.$stroka['NAME'].'" placeholder="'.$textStart.'"/>';
                           $ii++;
                        } else echo '<br>';    
                if ($stroka['ID']==$idPoz)
                    if ($stroka['URL']=='default' &&  strrpos($stroka['STATUS'],$status)!=false) {
                        $obj = \class\nonBD\SearchPathFromFile::createObj();
                        echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.\class\nonBD\SearchPathFromFile::createObj()->searchPath($this->initsite()).'"/>';
                    }
          
                if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
                    if ($stroka['URL']=='p' || $stroka['URL']=='h1' || $stroka['URL']=='h2' || $stroka['URL']=='h3' || $stroka['URL']=='h4' || $stroka['URL']=='h5' || $stroka['URL']=='h6' || $stroka['URL']=='div')
                        echo '<'.$stroka['URL'].' class="'.$stroka['URL'].'_'.$stroka['CLASS'].'">'.$stroka['NAME'].'</'.$stroka['URL'].'>';
          
                if ($stroka['ID']==$idPoz)
                    if ($stroka['NAME']=='img' &&  strrpos($stroka['STATUS'],$status)!=false)
                        echo '<div class="imgDiv_'.$stroka['CLASS'].'"><img src="'.$stroka['URL'].'" alt="название и путь к файлу:'.$stroka['URL'].'"></div>';
        
                if ($stroka['ID']==$idPoz)
                    if ($stroka['NAME']=='hr' &&  strrpos($stroka['STATUS'],$status)!=false)
                        echo '<hr class="hr_'.$stroka['CLASS'].'">';

                if ($stroka['ID']==$idPoz)
                    if ($stroka['NAME']=='col1' &&  strrpos($stroka['STATUS'],$status)!=false)
                        echo '<div class="container-fluid"><div class="row"><div class="col-12"><div class=col1_'.$stroka['CLASS'].'">'.$stroka['URL'].'</div></div></div></div>';
         
                if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
                    if ($stroka['NAME']=='col2' || $stroka['NAME']=='col2_1/11' || $stroka['NAME']=='col2_2/10' || $stroka['NAME']=='col2_3/9' 
                      || $stroka['NAME']=='col2_4/8' || $stroka['NAME']=='col2_5/7' || $stroka['NAME']=='col2_7/5' || $stroka['NAME']=='col2_8/4' || $stroka['NAME']=='col2_9/3' 
                        || $stroka['NAME']=='col2_10/2' || $stroka['NAME']=='col2_11/1' || $stroka['NAME']=='col2_6/6') {
                           $box1=6;
                           $box2=6;
                           if ($stroka['NAME']!='col2') {
                               $vhod=strrpos($stroka['NAME'],'/');
                               $box2=(int)mb_substr($stroka['NAME'],$vhod+1);
                               $box1=12-$box2;
                            }
                            $vhod=strrpos($stroka['URL'],'&');
                            $stroka2=mb_substr ($stroka['URL'],$vhod+1);
                            $stroka1=mb_substr ($stroka['URL'],-strlen($stroka['URL']),$vhod);
                            echo '<div class="container-fluid"><div class="row"><div class="col-'.$box1.'"><div class="col2_'.$stroka['CLASS'].'">'.$stroka1.'</div></div><div class="col-'.$box2.'"><div class="col2_'.$stroka['CLASS'].'">'.$stroka2.'</div></div></div></div>';
                     }

                if ($stroka['ID']==$idPoz &&  strrpos($stroka['STATUS'],$status)!=false)
                    if (stripos ('-'.$stroka['NAME'],'col3')) {
                        $box1=4;
                        $box2=4;
                        $box3=4;
                        if ($stroka['NAME']!='col3') {
                            $vhod=strrpos($stroka['NAME'],'/');
                            $box2=(int)mb_substr($stroka['NAME'],$vhod+1); //нашли третью цифру для столбца бутстрапа
                            $box1=(int)mb_substr($stroka['NAME'],5,$vhod-5);                
                            $box3=12-$box2-$box1;
                         }
                        $dlinaStr=strlen ( $stroka['URL'] );
                        $vhod2=strrpos($stroka['URL'],'&');   // нашли последнее вхождение
                        $vhod1=strrpos($stroka['URL'],'&',-($dlinaStr-$vhod2+1));   // нашли предпоследнее вхождение
                        $stroka3=mb_substr ($stroka['URL'],$vhod2+1);
                        $stroka2=mb_substr ($stroka['URL'],$vhod1+1,$vhod2-$vhod1-1);
                        $stroka1=mb_substr ($stroka['URL'],0,$vhod1);
                        echo '<div class="container-fluid"><div class="row"><div class="col-'.$box1.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka1.'</div></div><div class="col-'.$box2.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka2.'</div></div><div class="col-'.$box3.'"><div class="col3_'.$stroka['CLASS'].'">'.$stroka3.'</div></div></div></div>';
                    }
            }
            $zapros="SELECT * FROM ".$nameTablic." WHERE 1";
            $rez=$this->zaprosSQL($zapros);
        }
        echo '</form>';
        echo'</section>';
     }

}
