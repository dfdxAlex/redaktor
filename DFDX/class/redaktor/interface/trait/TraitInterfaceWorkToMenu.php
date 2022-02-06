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
                    echo '<form class="form_'.$stroka['CLASS'].'" action="'.$this->initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
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
                   echo '<form class="form_'.$stroka['CLASS'].'" action="'.$this->initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
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
           echo '<form class="form_'.$stroka['CLASS'].'" action="'.$this->initsite().'" method="POST"><button class="button_'.$stroka['CLASS'].'" name="'.$nameTablic.'" value="'.$stroka['NAME'].'">'.$stroka['NAME'].'</button></form>';
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
                echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
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
                 echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
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
            echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$linkButton.'"/>';
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
                  echo '<input class="button_'.$stroka['CLASS'].'" type="submit" name="'.$nameTablic.'" value="'.$stroka['NAME'].'" formaction="'.$this->initsite().'"/>';
         }
        echo '</form>';
        echo'</section>';
     }
}
