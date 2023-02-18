<?php
namespace class\redaktor;

class htmlTeg extends initBd
{
    public function __construct($nameTeg)
        {
            parent::__construct();
            if ($nameTeg=="") {
                $nameTeg="html"; echo("Задан пустой тег, знаете ли Вы, что можно делать с комментариями в html?<br>");
              }
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд
            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT * FROM html_teg WHERE teg=".chr(39).$nameTeg.chr(39);
            $rez=parent::zaprosSQL($zapros) OR die ('Не удалось отправить запрос стр.17');
            $stroka=mysqli_fetch_assoc($rez) OR die ('Не удалось получить массив данных, скорее всего нет такой темы, ищите по ключевым словам или тексту.');
            if ($stroka!=false){
                $this->id=$stroka['id'];
                $this->teg=$stroka['teg'];
                $this->info=$stroka['info'];
                $this->infoVideo=$stroka['infoVideo'];
                $this->leson_id=$stroka['leson_id'];
                $this->atrib_id=$stroka['atrib_id'];
                $this->sintax_id=$stroka['sintax_id'];
                $this->kluc1=$stroka['kluc1'];
                $this->kluc2=$stroka['kluc2'];
                $this->kluc3=$stroka['kluc3'];
                $this->kluc4=$stroka['kluc4'];
                $this->kluc5=$stroka['kluc5'];
                $this->kluc6=$stroka['kluc6'];
                $this->kluc7=$stroka['kluc7'];
                $this->kluc8=$stroka['kluc8'];
                $this->kluc9=$stroka['kluc9'];
                $this->kluc10=$stroka['kluc10'];
                $this->htmlTegError=0;
            }
            mysqli_close($con);
            $this->statikHtml();
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function id(){               //читает id из защищённой переменной
              return $this->id;
              }
        public function teg(){              //читает teg из защищённой переменной
                return $this->teg;
              }
        public function info(){             //читает info из защищённой переменной
                return $this->info;
              }
        public function infoVideo(){        //читает infoVideo из защищённой переменной
                return $this->infoVideo;
              }
        public function leson_id(){         //читает leson_id из защищённой переменной
                return $this->leson_id;
              }
        public function atrib_id(){         //читает atrib_id из защищённой переменной
                return $this->atrib_id;
              }
        public function sintax_id(){        //читает sintax_id из защищённой переменной
                return $this->sintax_id;
              }
        public function initTeg($nameTeg)   // Обновление значений свойст объекта
              {                             // Прочитать инфу о теге из бд
                  $ret=true;
                  if ($nameTeg=="") {
                      $nameTeg="html";
                    }
                  $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд                  mysqli_set_charset ( $con , "utf8" ) ;
                  $zapros="SELECT * FROM html_teg WHERE teg=".chr(39).$nameTeg.chr(39);
                  $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
                  $stroka=mysqli_fetch_assoc($rez);// OR die ('Не удалось получить массив');
                  if ($stroka!=false){
                      $this->id=$stroka['id'];
                      $this->teg=$stroka['teg'];
                      $this->info=$stroka['info'];
                      $this->infoVideo=$stroka['infoVideo'];
                      $this->leson_id=$stroka['leson_id'];
                      $this->atrib_id=$stroka['atrib_id'];
                      $this->sintax_id=$stroka['sintax_id'];
                      $this->kluc1=$stroka['kluc1'];
                      $this->kluc2=$stroka['kluc2'];
                      $this->kluc3=$stroka['kluc3'];
                      $this->kluc4=$stroka['kluc4'];
                      $this->kluc5=$stroka['kluc5'];
                      $this->kluc6=$stroka['kluc6'];
                      $this->kluc7=$stroka['kluc7'];
                      $this->kluc8=$stroka['kluc8'];
                      $this->kluc9=$stroka['kluc9'];
                      $this->kluc10=$stroka['kluc10'];
                } else $ret=false;
                  mysqli_close($con);
                  $this->statikHtml();
                  return $ret;
              }
        /////////////////////////////////////////////////////////////////////////////////////////////

        public function maxid($nameTablica)   // определяет максимальное id + 1 или минимальное свободное id
        {
            if ($nameTablica=='') $nameTablica="html_teg";
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT MAX(id) FROM html_teg";
            $rez=parent::zaprosSQL($zapros);
            if (!$rez) {
                mysqli_close($con);
                return -1;
              }
            $stroka=mysqli_fetch_array($rez);
            if (!isset($stroka)) {
                mysqli_close($con);
                return -1;
              }
            mysqli_close($con);
            $this->statikHtml();
            return $stroka[0]+1;
        }
        public function idTega($teg)   // определяет id номер тега
        {
            if ($teg=='') 
                return -1;
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT id FROM html_teg WHERE teg=".chr(39).$teg.chr(39);
            $rez=parent::zaprosSQL($zapros);
            if ($rez===false) {
                mysqli_close($con);
                return -1;
              }
            $stroka=mysqli_fetch_array($rez);
            if (!isset($stroka)) {
                mysqli_close($con);
                return -1;
              }
            mysqli_close($con);
            $this->statikHtml();
            return $stroka[0];
        }
        public function saveTeg($nameTablica)   // Запись данных из формы в базу данных, если неудача то вернем false
        {
            $start=true;
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;           // установить кодировку
            if ($this->idTega($_POST['Teg'])==-1)
                $zapros="INSERT INTO  ".$nameTablica."(`id`, `teg`, `info`, `infoVideo`, `leson_id`, `atrib_id`, `sintax_id`, `kluc1`, `kluc2`, `kluc3`, `kluc4`, `kluc5`, `kluc6`, `kluc7`, `kluc8`, `kluc9`, `kluc10`) VALUES (".$this->maxid($nameTablica).",'".$_POST['Teg']."','".$_POST['opisanie']."','".$_POST['opisanieVideo']."',".$_POST['idPrimer'].",".$_POST['idAtribut'].",".$_POST['idSintax'].",'".$_POST['kluc1']."','".$_POST['kluc2']."','".$_POST['kluc3']."','".$_POST['kluc4']."','".$_POST['kluc5']."','".$_POST['kluc6']."','".$_POST['kluc7']."','".$_POST['kluc8']."','".$_POST['kluc9']."','".$_POST['kluc10']."')";
            if ($this->idTega($_POST['Teg'])>-1)
                $zapros="UPDATE ".$nameTablica." SET `id`=".$_POST['idTeg'].",`teg`='".$_POST['Teg']."',`info`='".$_POST['opisanie']."',`infoVideo`='".$_POST['opisanieVideo']."',`leson_id`=".$_POST['idPrimer'].",`atrib_id`=".$_POST['idAtribut'].",`sintax_id`=".$_POST['idSintax'].",`kluc1`='".$_POST['kluc1']."',`kluc2`='".$_POST['kluc2']."',`kluc3`='".$_POST['kluc3']."',`kluc4`='".$_POST['kluc4']."',`kluc5`='".$_POST['kluc5']."',`kluc6`='".$_POST['kluc6']."',`kluc7`='".$_POST['kluc7']."',`kluc8`='".$_POST['kluc8']."',`kluc9`='".$_POST['kluc9']."',`kluc10`='".$_POST['kluc10']."' WHERE teg='".$_POST['Teg']."'";
            $rez=parent::zaprosSQL($zapros);
            if ($rez===false) 
                $start=false;
            mysqli_close($con);
            $this->initTeg($_POST['Teg']);     // Освежить свойства объекта
            $this->statikHtml();
            return $start;
        }

        public function statikHtml()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;           // установить кодировку
            $zapros="SELECT html FROM statistik WHERE 1";
            $rez=parent::zaprosSQL($zapros);
            $stroka=mysqli_fetch_array($rez);
            $chet=1;
            $chet=$stroka[0]+1;
            $zapros="UPDATE statistik SET html=".$chet." WHERE 1";
            $rez=parent::zaprosSQL($zapros);
            mysqli_close($con);
            return $chet;
        }
}
