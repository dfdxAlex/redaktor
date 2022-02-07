<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceCollectScolding
{

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
}
