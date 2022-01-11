<?php
namespace redaktor;

 $nameClass="class/instrument.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/initBD.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/htmlTeg.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/dataAktual.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/menu.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;

 $nameClass="class/redaktor.php";
 while (!file_exists($nameClass)) 
  $nameClass='../'.$nameClass;
 include $nameClass;





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class login extends initBd  // Работа с регистрациями
{
   public function __construct()
   {
    parent::__construct();
    $this->milisek=time();
    if (!parent::searcNameTablic('status_klienta')) {// если таблицы нет, то создать её
      $zapros="CREATE TABLE status_klienta(login VARCHAR(30), parol VARCHAR(30), mail VARCHAR(50), status INT , time INT)";
      parent::zaprosSQL($zapros);
     }
   }
   public function prowerkaLogin() // проверка логина, если логин существует или не соответствует правилам, то вернуть TRUE
   {
    if (parent::proverkaMata($_POST['Логин'])) return true;
    if ($_POST['Логин']=='' || $_POST['Логин']=='Логин') return true; 
    $zapros="SELECT status FROM status_klienta WHERE login='".$_POST['Логин']."'";
    $rez=parent::zaprosSQL($zapros);
    $stroka=mysqli_fetch_array($rez);
    if (is_null($stroka)) return false;
    if ($stroka[0]>=0) return true;
    return false;
   }
   public function prowerkaMail()
   {
    if (preg_match('/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/',$_POST['Почта'])!=1) return true;
    $zapros="SELECT status FROM status_klienta WHERE mail='".$_POST['Почта']."'";
    $rez=parent::zaprosSQL($zapros);
    $stroka=mysqli_fetch_array($rez);
    if (is_null($stroka[0])) return false;
    if ($stroka[0]>=0) return true;
    return false;
   }
   public function capcha()
   {
     $randcislo=rand(0,9);
     
     if ($randcislo==0) {
       $this->varianty($randcislo);
       return "Сколько ног у таракана?";
     }
     if ($randcislo==1) {
       $this->varianty($randcislo);
       return "Летом тепло...";
     }
     if ($randcislo==2) {
       $this->varianty($randcislo);
       return "Ночью темно...";
     }
     if ($randcislo==3) {
       $this->varianty($randcislo);
       return "Трижды по половине";
     }
     if ($randcislo==4) {
       $this->varianty($randcislo);
       return "Музыку еле слышно";
     }
     if ($randcislo==5) {
       $this->varianty($randcislo);
       return "Капли текли по крыше";
     }
     if ($randcislo==6) {
       $this->varianty($randcislo);
       return "Ваньку валяли в полдень";
     }
     if ($randcislo==7) {
       $this->varianty($randcislo);
       return "Ветер срывает крышу";
     }
     if ($randcislo==8) {
       $this->varianty($randcislo);
       return "Вирус пришел внезапно";
     }
     if ($randcislo==9) {
       $this->varianty($randcislo);
       return "Кто-нибудь видел Жору?";
     }
   }

   public function varianty($nomer)
   {
    if ($nomer==0) {
     parent::zaprosSQL("UPDATE registracia SET NAME='4' WHERE ID=11");
     parent::zaprosSQL("UPDATE registracia SET NAME='6' WHERE ID=12");
     parent::zaprosSQL("UPDATE registracia SET NAME='8' WHERE ID=13");
     parent::zaprosSQL("UPDATE registracia SET NAME='10' WHERE ID=14");
     return '6';
    }

     if ($nomer==1) {
      parent::zaprosSQL("UPDATE registracia SET NAME='Колесо круглое' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Пи=3,1415...' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ночью темно' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Зимой холодно' WHERE ID=14");
      return 'Зимой холодно';
     }
     if ($nomer==2) {
      parent::zaprosSQL("UPDATE registracia SET NAME='Летом тепло' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Джинсы тесны' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ахалай Махалай' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Днем светло' WHERE ID=14");
      return 'Днем светло';
     }
     if ($nomer==3) {// трижды по половине
      parent::zaprosSQL("UPDATE registracia SET NAME='Дважды по три бутылки' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Конь на холме пасётся' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше чем два поллитра' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Пять раз по двадцать пять' WHERE ID=14");
      return 'Больше чем два поллитра';
     }

     if ($nomer==4) {//Музыку еле слышно
      parent::zaprosSQL("UPDATE registracia SET NAME='Боком толкали бочку' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Видно, но хуже слышно' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Вода попала в уши' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Холодно, но не жарко' WHERE ID=14");
      return 'Вода попала в уши';
     }
     if ($nomer==5) {// Капли текли по крыше
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Звёзды спадают на пол' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Кот шурудит на крыше' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Дождь уже слабо падал' WHERE ID=14");
      return 'Дождь уже слабо падал';
     }
     if ($nomer==6) { // Ваньку валяли в полдень
      parent::zaprosSQL("UPDATE registracia SET NAME='Круглое часто носят' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Зеньки раскрой зараза' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Ваньку валяли в полдень' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=14");
      return 'Ваньку валяли в полдень';
     }
     if ($nomer==7) { // Ветер срывает крышу
      parent::zaprosSQL("UPDATE registracia SET NAME='Новую нужно ставить' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Кошка кричит весною' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Жизнь оживает снова' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Только не очень быстро' WHERE ID=14");
      return 'Новую нужно ставить';
     }

     if ($nomer==8) { // Вирус пришел внезапно
      parent::zaprosSQL("UPDATE registracia SET NAME='Галоши надеть забыл он' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Весь мир ошарашил вскоре' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Лечили его всем миром' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Намедни катался на лыжах' WHERE ID=14");
      return 'Лечили его всем миром';
     }
     if ($nomer==9) {//Кто-нибудь видел Жору
      parent::zaprosSQL("UPDATE registracia SET NAME='Жора играет в спальне' WHERE ID=11");
      parent::zaprosSQL("UPDATE registracia SET NAME='Гена сидит на крыше' WHERE ID=12");
      parent::zaprosSQL("UPDATE registracia SET NAME='Миша ломает гвозди' WHERE ID=13");
      parent::zaprosSQL("UPDATE registracia SET NAME='Федя читает книгу' WHERE ID=14");
      return 'Жора играет в спальне';
     }
   }
  public function capcaRez($vopros,$otvet)  // Проверяет правильность ответа капчи
  {
    if ($vopros=='Сколько ног у таракана?' && $otvet=='6') return true;
    if ($vopros=='Летом тепло...' && $otvet=='Зимой холодно') return true;
    if ($vopros=='Ночью темно...' && $otvet=='Днем светло') return true;
    if ($vopros=='Трижды по половине' && $otvet=='Больше чем два поллитра') return true;
    if ($vopros=='Музыку еле слышно' && $otvet=='Вода попала в уши') return true;
    if ($vopros=='Капли текли по крыше' && $otvet=='Дождь уже слабо падал') return true;
    if ($vopros=='Ваньку валяли в полдень' && $otvet=='Ваньку валяли в полдень') return true;
    if ($vopros=='Ветер срывает крышу' && $otvet=='Новую нужно ставить') return true;
    if ($vopros=='Вирус пришел внезапно' && $otvet=='Весь мир ошарашил вскоре') return true;
    if ($vopros=='Кто-нибудь видел Жору' && $otvet=='Жора играет в спальне') return true;
    return false;
  }

public function lovimOtvetNaCapcu($knopka) //Ловит нажатие кнопки варианта капчи
{
   if ($knopka=='4' || $knopka=='6' || $knopka=='8' || $knopka=='10' || $knopka=='Колесо круглое' 
   || $knopka=='Пи=3,1415...' || $knopka=='Ночью темно' || $knopka=='Зимой холодно'
   || $knopka=='Летом тепло' || $knopka=='Джинсы тесны' || $knopka=='Ахалай Махалай' || $knopka=='Днем светло'
   || $knopka=='Дважды по три бутылки' || $knopka=='Конь на холме пасётся' || $knopka=='Больше чем два поллитра' 
   || $knopka=='Пять раз по двадцать пять'  || $knopka=='Боком толкали бочку' || $knopka=='Видно, но хуже слышно'
   || $knopka=='Вода попала в уши' || $knopka=='Холодно, но не жарко' || $knopka=='Больше не буду плакать' 
   || $knopka=='Круглое часто носят' || $knopka=='Дождь уже слабо падал' || $knopka=='Кот шурудит на крыше' || $knopka=='Звёзды спадают на пол'
   || $knopka=='Кошка кричит весною' || $knopka=='Новую нужно ставить' || $knopka=='Ваньку валяли в полдень' || $knopka=='Зеньки раскрой зараза'
   || $knopka=='Весь мир ошарашил вскоре' || $knopka=='Галоши надеть забыл он' || $knopka=='Только не очень быстро' || $knopka=='Жизнь оживает снова'
   || $knopka=='Федя читает книгу' || $knopka=='Миша ломает гвозди' || $knopka=='Гена сидит на крыше' || $knopka=='Жора играет в спальне' || $knopka=='Намедни катался на лыжах' || $knopka=='Лечили его всем миром') return true;
   return false;
  }

public function zapisGostia($login,$parol,$mail,$temaMeila,$meilText)
{
  $rand=rand(9999,99999);
  $zapros="INSERT INTO status_klienta(`login`, `parol`, `mail`, `status`, `time`) VALUES ('".$login."','".$parol."','".$mail."',".$rand.",".time().")";
      parent::zaprosSQL($zapros);
      $mlText=$meilText.$rand;
      mail ($mail,$temaMeila,$mlText);
}
public function siearcMail($login,$meilText)
{
  $zapros="SELECT * FROM status_klienta WHERE login='".$login."'";
  $rez=parent::zaprosSQL($zapros);
  $stroka=mysqli_fetch_assoc($rez);
  $mlText=$meilText.$stroka['status'];
      mail ($stroka['mail'],'Нашли письмо',$mlText);
}
public function statusRegi($login,$parol)  // Проверяем статус учётной записи
{
  $zapros="SELECT status FROM status_klienta WHERE login='".$login."' AND parol='".$parol."'";
  $rez=parent::zaprosSQL($zapros);
  if (!$rez) return 0;
  $stroka=mysqli_fetch_array($rez);
  if (!$stroka) return 0;
  return $stroka[0];
}
public function saveStatus($status)  // Проверяем статус учётной записи
{
  $rez=parent::zaprosSQL("UPDATE status_klienta SET status=".$status." WHERE login='".$_SESSION['login']."'");
}

public function listKlientow()
{
  if ($_SESSION['status']==5 || $_SESSION['status']==4)
   $rez=parent::zaprosSQL("SELECT * FROM status_klienta WHERE 1");
   if ($_SESSION['status']==4) {
     echo '<section class="container-fluid status">';
     echo '<div class="row">';
     echo '<div class="col">';
     echo '<p class="mesage">Login</p>';
     echo '</div>';
     echo '<div class="col">';
     echo '<p class="mesage">Reset Password</p>';
     echo '</div>';
     echo '</div>';
 
   while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
     if ($stroka['status']<5) {
     echo '<form method="POST" active="redaktor.php">';
     echo '<div class="row">';
     echo '<div class="col">'; 
     echo '<input type="text" class="status_text" name="login" value="'.$stroka['login'].'">';
     echo '</div>';
     echo '<div class="col">';
     echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сбр.пароль">';
     echo '</div>';
     echo '</div>';
     echo '</form>';
     }
   }
     echo '</section>';
   }
  if ($_SESSION['status']==5) {
    echo '<section class="container-fluid status">';
    echo '<div class="row">';
    echo '<div class="col">';
    echo '<p class="mesage">Login</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Password</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mail">Mail</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Status</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="time">Time</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Reset Password</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Save</p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p class="mesage">Kill</p>';
    echo '</div>';
    echo '</div>';

  while (!is_null($stroka=(mysqli_fetch_array($rez)))) {
    echo '<form method="POST" active="redaktor.php">';
    echo '<div class="row">';
    echo '<div class="col">'; //login
    echo '<input type="text" class="status_text" name="login" value="'.$stroka['login'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="parol" value="'.$stroka['parol'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="mail" value="'.$stroka['mail'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="status" value="'.$stroka['status'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" class="status_text" name="time" value="'.$stroka['time'].'">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сбр.пароль">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Сохранить">';
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="submit" class="status_button" name="redaktirowanieStatusa" value="Удалить">';
    echo '</div>';
    echo '</div>';
    echo '</form>';
  }
  echo '<dt class="col-3 text-truncate">Статусы</dt>';
  echo '<dd class="col-9 text-truncate style-infoMenu">';
  echo '<p>Всего существует 7 статусов: 0,1,2,3,4,5,9</p>';
  echo '<p>0-Гость</p>';
  echo '<p>1-Зарегистрированный пользователь</p>';
  echo '<p>2-Редактор</p>';
  echo '<p>3-Подписчик</p>';
  echo '<p>4-Модератор (имеет доступ к таблицам в базе данных сайта)</p>';
  echo '<p>5-Администратор (имеет доступ ко всем таблицам в базе данных)</p>';
  echo '<p>9-Зарегистрированный, но не подтвердивший регистрацию пользователь</p>';
  echo '</dd>';
    echo '</section>';
  }
} // конец listKlientow()

public function resetParol() // Сбросить пароль 
{
  parent::zaprosSQL("UPDATE status_klienta SET parol='1111' WHERE login='".$_POST['login']."'");
}
public function saveStatusR() // Сохранить учётку
{
  parent::zaprosSQL("UPDATE status_klienta SET parol='".$_POST['parol']."', mail='".$_POST['mail']."', status=".$_POST['status']." WHERE login='".$_POST['login']."'");
}
  public function killGosc() // Удалить учётку учётку
{
  parent::zaprosSQL("DELETE FROM status_klienta WHERE login='".$_POST['login']."'");
}
  public function naGlavnuStranicu()
{
  exit("<meta http-equiv='refresh' content='0; url= ".parent::initsite()."'>");
}
  public function tutObnovit()
  {
  exit("<meta http-equiv='refresh' content='0; url= 'redaktor.php'>");
}
  public function nameGlawnogoSite()
{
  return parent::initsite();
}
public function statusString()
{
if ($_SESSION['status']>99 || $_SESSION['status']==9) return 'Учётная запись не подтверждена.';
if ($_SESSION['status']==0) return 'Гость.';
if ($_SESSION['status']==1) return 'Пользователь.';
if ($_SESSION['status']==2) return 'Модератор.';
if ($_SESSION['status']==3) return 'Подписчик.';
if ($_SESSION['status']==4) return 'Администратор.';
if ($_SESSION['status']==5) return 'Супер Администратор.';
}
} // конец класса login
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
class maty extends menu  // Работа с матами и нецензурной лексикой
{
    public function __construct()
      {
        parent::__construct();
         //проверим есть ли вспомогательная таблица и матов
         if (!parent::searcNameTablic('maty'))
         parent::zaprosSQL("CREATE TABLE maty(mat VARCHAR(15))");
         $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE 1");
         //проверим есть ли вспомогательная таблица и Не матов
         if (!parent::searcNameTablic('nie_maty'))
          parent::zaprosSQL("CREATE TABLE nie_maty(nie_mat VARCHAR(15))");
         $rez_nieMat=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
         //проверим есть ли вспомогательная таблица для матов от пользователей
         if (!parent::searcNameTablic('mat_ot_polzovatelej'))
          parent::zaprosSQL("CREATE TABLE mat_ot_polzovatelej(mat VARCHAR(15), login VARCHAR(15))");
         $rez_mat_polsovat=parent::zaprosSQL("SELECT mat FROM mat_ot_polzovatelej WHERE 1");

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
       //функция должна разбить текст на оттельные слова и искать мат при условии, что слово не входит в базу исключений.
       //цель в правильном написании слова подстраХуй
       public function echoBezMatovPlusIsklucenia($text) // функция находит совпадения матов и меняет их на звездочки.
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
       public function echoBezMatov($text) // функция находит совпадения матов и меняет их на звездочки и выводит результат
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
         public function searcMata($mat) // Функция ищет матерное слово в базе, если находит, то возвращает true
          {
            // сначала проверим наличие слова
            $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE mat='".$mat."'");
            $stroka=mysqli_fetch_array($rez);
            if ($stroka[0]) return true;
            return false;
          }
          public function searcNieMata($nie_mat) // Функция ищет слово в базе исключений для матерных слов, если находит, то возвращает true
          {
            // сначала проверим наличие слова
            $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$nie_mat."'");
            $stroka=mysqli_fetch_array($rez);
            if ($stroka[0]) return true;
            return false;
          }
        public function kill_mat()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->mas_mat[0]))
             foreach($this->mas_mat as $value)
               if (isset($_POST['maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM maty WHERE mat='".$value."'"); 
         }
         public function kill_nie_mat()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->nie_mat[0]))
             foreach($this->nie_mat as $value)
               if (isset($_POST['nie_maty_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$value."'"); 
         }
         public function list_block_save()  // Функция блокировки пользователя для добавления матов.
         {
            $rez=parent::zaprosSQL("SELECT login FROM status_klienta WHERE status>0 AND status<6"); // получаем все логины со статусами от 1 до 5
            while(!is_null($stroka=mysqli_fetch_array($rez))) {
               if (isset($_POST['blok_user_mat_ot_polzovatelej_'.$stroka[0]])) {// Если была нажата кнопка, блокировки пользователя
                  $id=parent::maxIdLubojTablicy('blocked_list_dobavit_mat');
                  if ($id<1) $id=1;
                  parent::zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$stroka[0]."')");
                }
             }
         }
         public function kill_ot_polsovatelej()  // Функция быстрое удаление конкретного слова через его кнопку
         {
           if (isset($this->mat_polsovat[0]))
             foreach($this->mat_polsovat as $value)
               if (isset($_POST['kill_mat_ot_polzovatelej_'.$value])) // Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                 parent::zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
         }
        public function razblokirovka_polsovatelej()  // Функция разблокировка пользователя
         {
          $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // получаем все логины со статусами от 1 до 5
          while(!is_null($stroka=mysqli_fetch_array($rez)))
             if (isset($_POST['buttonListBocked'.$stroka[0]])) // Если была нажата кнопка, блокировки пользователя
               parent::zaprosSQL("DELETE FROM blocked_list_dobavit_mat WHERE login='".$stroka[0]."'"); 
         }
        public function zablokirovanMaty()  // Функция разблокировка пользователя
         {
          $vivod=false;
          $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1"); // проверяем заблокирован ли пользователь на добавление матов
          while(!is_null($stroka=mysqli_fetch_array($rez)))
             if ($stroka[0]==$_SESSION['login']) // Если была нажата кнопка, блокировки пользователя
              {$vivod=true; break;}
          return $vivod;
         }
       public function save_ot_polsovatelej()  // Функция переноса мата из временной таблицы в постоянную
         {
           if (isset($this->mat_polsovat[0]))
             foreach($this->mat_polsovat as $value)
               if (isset($_POST['save_mat_ot_polzovatelej_'.$value])) {// Если была нажата кнопка, сформированная по правилам name="maty_матюк'"
                   parent::zaprosSQL("DELETE FROM mat_ot_polzovatelej WHERE mat='".$value."'"); 
                   parent::zaprosSQL("INSERT INTO maty(mat) VALUES ('".$value."')");
                }
         }
      public function redactMaty() // Работа с меню ретактирования таблицы матов
       {
          $this->razblokirovka_polsovatelej();  // Функция разблокировка пользователя
          $this->list_block_save(); // функция проверяет не была ли нажата кнопка блокировки пользователя, если была, то заносит логин в таблицу банов
          $this->kill_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
          $this->kill_nie_mat(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова
          $this->kill_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого удаления матерного слова пользователей
          $this->save_ot_polsovatelej(); // функция просматривает не была ли нажата одна из кнопок быстрого переноса слова из временной таблицы пользователей в постоянную
          parent::menu4('menu_maty','redaktor.php');
          ///////////////////////////////////////начало работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
          echo '<br>';
         if (isset($_POST['vklSborMatov']))
          parent::zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=1 WHERE id=1");
         if (isset($_POST['vyklSborMatov']))
          parent::zaprosSQL("UPDATE tablica_nastroer_dvigka_int SET nastr=0 WHERE id=1");
         if (parent::sborMatov()==1) {// Значит сбор матов включен, поставить кнопку выключения
           
            echo '<div class="vklSborMatovDiv">';
            echo '<form method="POST" action="redaktor.php">';
            echo '<input type="submit" class="vyklSborMatov" name="vyklSborMatov" value="Выключить форму сбора нецензурных слов от пользователей">';
            echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
            echo '</form>';
            echo '</div>';
            echo '<br>';             
           } else // иначе сбор матов выключен, поставить кнопку включения
            {
                  echo '<div class="vklSborMatovDiv">';
                  echo '<form method="POST" action="redaktor.php">';
                  echo '<input type="submit" class="vklSborMatov" name="vklSborMatov" value="Включить форму сбора нецензурных слов от пользователей">';
                  echo '<input type="submit" class="buttonListBocked" name="buttonListBocked" value="Список заблокированных пользователей">';
                  echo '</form>';
                  echo '</div>';
                  echo '<br>';
            }
           ///////////////////////////////////////конец работы и обработки кнопки включения и отключения сбора нецензурных слов от пользователей///////////////////////////////////////////////////////////////////////
          ////////// Показать список заблокированных пользователей
         if (isset($_POST['buttonListBocked'])) {//&& $_POST['menu_maty']=='Список заблокированных пользователей')
             $rez=parent::zaprosSQL("SELECT login FROM blocked_list_dobavit_mat WHERE 1");
             echo '<section class="container-fluid">';
             echo '<form action="redaktor.php" method="post">';
             while(!is_null($stroka=mysqli_fetch_array($rez))) {
                echo '<div class="row">';
                echo '<div class="col">';
                echo '<input class="buttonListBocked" type="submit" name="buttonListBocked'.$stroka[0].'" value="Разблокировать ('.$stroka[0].')">';
                echo '</div>';
                echo '</div>';
              }
             echo '</section>';
             echo 'Конец списка';
            }
          if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить мат' && $_POST['mat_text']!='') {
             // Если слово есть, то удаляем
             if ($this->searcMata($_POST['mat_text'])) {
               parent::zaprosSQL("DELETE FROM maty WHERE mat='".$_POST['mat_text']."'");
               //Снова проверяем наличие слова в БД
               if ($this->searcMata($_POST['mat_text'])) echo 'Не удалось удалить';
               if (!$this->searcMata($_POST['mat_text'])) echo 'Слово удалено<br>';
              }
           // если слова нет, то заносим его в базу данных
           if (!$this->searcMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
          }
        if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Удалить не мат' && $_POST['mat_text']!='') {
           // Если слово есть, то удаляем
           if ($this->searcNieMata($_POST['mat_text'])) {
             parent::zaprosSQL("DELETE FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
             //Снова проверяем наличие слова в БД
             if ($this->searcNieMata($_POST['mat_text'])) echo 'Не удалось удалить';
             if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово удалено<br>';
            }
         // если слова нет, то заносим его в базу данных
         if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слова в базе отсутствует';
        }

      if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать') {
          $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE 1");
          echo '<section class="container-fluid">';
          echo '<form action="redaktor.php" method="post">';
          while(!is_null($stroka=mysqli_fetch_array($rez))) {
             echo '<div class="row">';
             echo '<div class="col">';
             echo '<input class="button_maty" type="submit" name="maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
             echo '</div>';
             echo '</div>';
           }
          echo '</section>';
          echo 'Конец списка';
         }
        if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Показать не маты') {// Рисуем кнопки нематов
           $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE 1");
           echo '<section class="container-fluid">';
           echo '<form action="redaktor.php" method="post">';
           while(!is_null($stroka=mysqli_fetch_array($rez))) {
              echo '<div class="row">';
              echo '<div class="col">';
              echo '<input class="button_nie_maty" type="submit" name="nie_maty_'.$stroka[0].'" value="Удалить ('.$stroka[0].')">';
              echo '</div>';
              echo '</div>';
            }
           echo '</section>';
           echo 'Конец списка';
          }

       if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='От пользователей') {// Рисуем кнопки матов от пользователей
            $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE 1");
            echo '<section class="container-fluid">';
            echo '<form action="redaktor.php" method="post">';
            while(!is_null($stroka=mysqli_fetch_assoc($rez))) {
               echo '<div class="row">';
               echo '<div class="col">';
               echo '<input class="button_mat_ot_polzovatelej_list" type="submit" name="kill_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Пользователь '.$stroka['login'].' добавил мат ('.$stroka['mat'].'). Удалить!">';
               echo '<input class="button_mat_ot_polzovatelej_save" type="submit" name="save_mat_ot_polzovatelej_'.$stroka['mat'].'" value="Сохранить">';
               echo '<input class="button_mat_ot_polzovatelej_block" type="submit" name="blok_user_mat_ot_polzovatelej_'.$stroka['login'].'" value="Заблокировать пользователя - '.$stroka['login'].'">';
               echo '</div>';
               echo '</div>';
             }
            echo '</section>';
            echo 'Конец списка';
           }

  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='') {
        $rez=parent::zaprosSQL("SELECT mat FROM maty WHERE mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Проверить слово' && $_POST['mat_text']!='') {
        $rez=parent::zaprosSQL("SELECT nie_mat FROM nie_maty WHERE nie_mat='".$_POST['mat_text']."'");
        $stroka=mysqli_fetch_array($rez);
        if (!$stroka[0]) echo 'Слово не найдено в БД НЕ матов<br>';
        if ($stroka[0]) echo 'Слово присутствует в БД НЕ матов<br>';
      }
  if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить' && $_POST['mat_text']!='') {
        // сначала проверим наличие слова
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcMata($_POST['mat_text'])) {
          parent::zaprosSQL("INSERT INTO maty(mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник матов!<br>';
        if (!$this->searcMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник матов!<br>';
        }
      }
    if (isset($_POST['menu_maty']) && $_POST['menu_maty']=='Добавить не мат' && $_POST['mat_text']!='') {
        // сначала проверим наличие слова
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово уже присутствует в справочнике НЕ матов!<br>';
        // если слова нет, то заносим его в базу данных
        if (!$this->searcNieMata($_POST['mat_text'])) {
          parent::zaprosSQL("INSERT INTO nie_maty(nie_mat) VALUES ('".$_POST['mat_text']."')");
        //Снова проверяем наличие слова в БД
        if ($this->searcNieMata($_POST['mat_text'])) echo 'Слово успешно добавлено в справочник НЕ матов!<br>';
        if (!$this->searcNieMata($_POST['mat_text'])) echo 'Слово не удалось добавить в справочник НЕ матов!<br>';
        }
      }
  }
      // работаем с заполнением базы матов от пользователей на главной странице сайта
  public function dobavilMat($text) //mat_ot_polzovatelej
       {
        if (isset($_POST['otkazDobawleniaMatow'])) {//Самозаблокироваться от показа окна добавления матов
          $id=parent::maxIdLubojTablicy('blocked_list_dobavit_mat');
          if ($id<1) $id=1;
          parent::zaprosSQL("INSERT INTO blocked_list_dobavit_mat(id, login) VALUES (".$id.", '".$_SESSION['login']."')");
         }
        if ($_SESSION['status']<1 || $_SESSION['status']>5) return false;
        if ($this->zablokirovanMaty()) return false; // если пользователь заблокирован, то выйти
        if (parent::sborMatov()==0) return false;
         // Узнаем сколько матов пользователь может ввести
         $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
         $cisloMatov=10;
           while(!is_null($stroka=mysqli_fetch_assoc($rez)))
              $cisloMatov--;

        if ($cisloMatov>0 && isset($_POST['dobawilMat']) && $_POST['dobawilMat']=='Ok' && $_POST['dobawilMatText']!='') {
                foreach($this->mas_mat as $value)
                  if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное нецензурное слово уже присутствует в базе данных.';
                foreach($this->nie_mat as $value)
                  if ($value==$_POST['dobawilMatText']) $text='Спасибо, но данное слово уже присутствует в базе данных и помечено как слово, разрешенное к применению на данном ресурсе.';
           
            if (!preg_match_all('/Спасибо/u',$text)>0) { //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
                $rez=parent::zaprosSQL("SELECT * FROM mat_ot_polzovatelej WHERE login='".$_SESSION['login']."'");
                if (!$rez) echo 'не удалось прочитать данные из таблицы временных нецензурных слов';
                while(!is_null($stroka=mysqli_fetch_assoc($rez))) 
                    if ($stroka['mat']==$_POST['dobawilMatText']) $text='Спасибо, но некто, с логином '.$stroka['login'].' уже отправил данное слово на рассмотрение.';
            }

            if (!preg_match_all('/Спасибо/u',$text)>0) {  //Если мата нет в двух постоянных таблицах матов и нематов, то проверяем во временной таблице
                  parent::zaprosSQL("INSERT INTO mat_ot_polzovatelej(mat, login) VALUES ('".$_POST['dobawilMatText']."','".$_SESSION['login']."')");
                  $cisloMatov--;
            } 
        }
        if ($cisloMatov<1) $text='Лимит ввода нецензурных слов исчерпан, подождите пока модератор одобрит предыдущие Ваши предложения.';
         else   {
              $text=$text.' Лимит матов-'.$cisloMatov;
              parent::formBlock('formaSborMata',parent::initsite(),
                                'p', $text, 'dobawilMatP',
                                'text2','dobawilMatText',
                                'submit','dobawilMat',
                                'reset',
                                'submit','otkazDobawleniaMatow','Заблокировать данную функцию');

            }
    }
}// конец класса maty

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class futter  extends maty //dataAktual  // Класс выводит информацию в низ сайта
{
    public function __construct()
     {
        parent::__construct();
     }
     public function futterR(...$parametr)
     {
      $bootStrap=false;
      $container='-fluid';
      $dataSozdania='';
      $classPole='';
      // Ищем параметр подключающий бутстрап
      foreach($parametr as $value)
        if (stripos('sss'.$value,'bootstrap'))
          $bootStrap=true;

      //ищем приставку к классу container
      foreach($parametr as $value)
        if (stripos('sss'.$value,'container='))
          $container='-'.preg_replace('/container=/','',$value); // Выделяем логин редактора/ов

      //ищем создания сайта
      foreach($parametr as $value)
        if (stripos('sss'.$value,'дата:'))
          $dataSozdania=preg_replace('/дата:/','',$value); // Выделяем логин редактора/ов

      //ищем имя класса главного поля
      foreach($parametr as $value)
        if (stripos('sss'.$value,'pole='))
        $classPole=preg_replace('/pole=/','',$value); // Выделяем логин редактора/ов

      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь') {
           echo '<p>Функция выводит нижний блок</p>';
           echo '<p>Параметры функции произвольные и задаются как обычно!</p>';
           echo '<p>Функция проверяет все параметры и по ключевым словам определяет с каким параметром, что следует делать.</p>';
           echo '<p>Параметров произвольное колличество</p>';
           echo '<p>Для настройки блока под бутстрап необходимо вписать параметр "bootstrap"</p>';
           echo '<p>Для задания приставки к классу container-...fluid задаем дополнительный параметр "container=...fluid"</p>';
           echo '<p>по умолчанию параметр container=fluid</p>';
           echo '<p>Дальше выводимая информация</p>';
           echo '<p>Дата создания сайта задается параметром "дата:18.02.2021"</p>';
           echo '<p></p>';
           echo '<p></p>';
           echo '<p>Работа с классами</p>';
           echo '<p>Задать имя класса главного поля можно через параметр "pole=имя класса"</p>';
           echo '<p>По умолчанию есть класс futter заданный в стилях движка, после него идёт класс заданный с помощью pole=</p>';
           echo '<p></p>';
        }

        // Выводим футтер
      if ($bootStrap) echo '<section class="container'.$container.'">';
      if ($bootStrap) echo '<div class="row">';
      if ($classPole=='') echo '<div class="futtrer">';
      if ($classPole!='') echo '<div class='.$classPole.'>';
      if ($dataSozdania!='') echo '<p>Дата создания сайта:'.$dataSozdania.'</p>';
      echo '</div>';
      if ($bootStrap) echo '</div>';
      if ($bootStrap) echo '</section>';
     }
     public function dataRedaktSite()
     {
      //  echo ("<h3>Статистика обращений к базам данных</h3>");
       // echo '<h4>Обращений к базе HTML:'.$this->stHtml.'</h4>';
       // $chislo="".$this->mdaySite;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdaySite<10) $chislo="0".$this->mdaySite;
       // $dat="".$this->monSite;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monSite<10) $dat="0".$this->monSite;
       // $min="".$this->minutesSite;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesSite<10) $min="0".$this->minutesSite;
       // $sek="".$this->secondsSite;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsSite<10) $sek="0".$this->secondsSite;
       // echo '<h5>Последнее изменение сайта '.$chislo.'.'.$dat.'.'.$this->yearSite.'. <span>Время изменения <span>'.$this->hoursSite.':'.$min.':'.$sek.'</span></span></h5>';
       // $chislo="".$this->mdayBd;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdayBd<10) $chislo="0".$this->mdayBd;
       // $dat="".$this->monBd;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monBd<10) $dat="0".$this->monBd;
       // $min="".$this->minutesBd;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesBd<10) $min="0".$this->minutesBd;
       // $sek="".$this->secondsBd;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsBd<10) $sek="0".$this->secondsBd;
       // echo '<h5>Последнее изменение БД '.$chislo.'.'.$dat.'.'.$this->yearBd.'. <span>Время изменения <span>'.$this->hoursBd.':'.$min.':'.$sek.'</span></span></h5>';
       // echo '<h6>Используемые языки: HTML,CSS,PHP,MySQL</h6>';
     }
}   // Конец класса футтер
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

class poisk extends statistic // // Класс работа со статистикой
{
 function __construct()
  {
     parent::__construct();
  }

  // Функция поиска статьи по слову, возвращает массив с ID найденных статей
  public function poiskStati($nametablic,$slowo,&$masRezult=array(),...$data)
  {
    $help=false;
    $rezPoiska=0;
    $autor=false;
    $autor_login='';
    $razdel=false;
    $razdel_text='';
    $uslovie=1;
    $masRezult[0]=-1;
    $i=0;
    foreach($data as $value) 
    if (stripos('sss'.$value,'help') || stripos('sss'.$value,'помощь'))
     $help=true;

    foreach($data as $value) 
     if (stripos('sss'.$value,'заголовки'))
      $rezPoiska=1;

    foreach($data as $value) 
      if (stripos('sss'.$value,'текст'))
       $rezPoiska=2;

    foreach($data as $value) 
      if (stripos('sss'.$value,'автор')) {
       $autor=true;
       $autor_login=preg_replace('/автор-/','',$value);
      }

      foreach($data as $value) 
      if (stripos('sss'.$value,'категория'))
       $razdel=true;


    $smegnyeKategorii = array(); // массив со смежными категориями
    $iSmegKat=0;
    $masWhere = array();
    $masWhereI=0;
    $rez=false;
    if (!$autor && $razdel)
     $rez=parent::zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE 1"); //прочитать все категории из базы
    if ($autor && $razdel)
     $rez=parent::zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE login_redaktora='".$autor_login."'"); //прочитать все категории из базы 

   if ($razdel && $rez!==false) // Если нашли заданные разделы, то найти комбинированные разделы например html3 входит в html3html5
    while(!is_null($stroka=mysqli_fetch_array($rez))) 
      if (!parent::proverkaMassiwa($smegnyeKategorii,$stroka[0])) // если такой категории в массиве нет
        foreach($data as $value) 
         if (stripos('sss'.$value,'категория-')) {      // Если проверяемая категория входит в перечень тех категорий, которые есть на входе функции
           $razdelTest=preg_replace('/категория-/','',$value); // Удалить лишнее
           if (stripos('sss'.$stroka[0],$razdelTest)) {
              $smegnyeKategorii[$iSmegKat++]=$stroka[0];
              $razdel=true;
             }
          }
    if ($razdel) {
      // если задан логин, то добавить его в запрос
      if ($razdel) $uslovie='';
      if ($autor) $uslovie='login_redaktora="'.$autor_login.'" AND ';
        foreach($smegnyeKategorii as $value) {
            $uslovie=$uslovie.'razdel="'.$value.'"';
            $masWhere[$masWhereI++]=$uslovie;
            $uslovie='';
            if ($autor) $uslovie='login_redaktora="'.$autor_login.'" AND '; 
          }
       // Имеем массив с условиями запроссов связанных с категориями и логином $masWhere
      }
        if (!$razdel && !$autor) $uslovie=1; // Если не задан автор и не заданы категории, то смотрим все
        if (!$razdel && $autor) $uslovie="login_redaktora='".$autor_login."'"; // Если задан только автор
         
      $i=0;
      if ($razdel) //если разделы были заданы, то перебираем статьи по каждому разделу
       foreach($masWhere as $value) {// перебираем массив с условиями запросов, зависящими от логинов и категорий
          if ($rezPoiska==0) $zapros="SELECT id,name,news FROM ".$nametablic." WHERE ".$value;
          if ($rezPoiska==1) $zapros="SELECT id,name FROM ".$nametablic." WHERE ".$value;
          if ($rezPoiska==2) $zapros="SELECT id,news FROM ".$nametablic." WHERE ".$value;
          $rez=parent::zaprosSQL($zapros);
          while(!is_null($stroka=mysqli_fetch_assoc($rez))) {
            if ($rezPoiska==0 && (stripos('sss'.$stroka['name'],$slowo) || stripos('sss'.$stroka['news'],$slowo))) $masRezult[$i++]=$stroka['id'];
            if ($rezPoiska==1 && stripos('sss'.$stroka['name'],$slowo)) $masRezult[$i++]=$stroka['id'];
            if ($rezPoiska==2 && stripos('sss'.$stroka['news'],$slowo)) $masRezult[$i++]=$stroka['id'];
          }
        }
       
      if (!$razdel) {//если разделы не были заданы, то перебираем все статьи 
        if ($rezPoiska==0) $zapros="SELECT id,name,news FROM ".$nametablic." WHERE ".$uslovie;
        if ($rezPoiska==1) $zapros="SELECT id,name FROM ".$nametablic." WHERE ".$uslovie;
        if ($rezPoiska==2) $zapros="SELECT id,news FROM ".$nametablic." WHERE ".$uslovie;
        $rez=parent::zaprosSQL($zapros);
        while (!is_null($stroka=mysqli_fetch_assoc($rez))) {
         if ($rezPoiska==0 && (stripos('sss'.$stroka['name'],$slowo) || stripos('sss'.$stroka['news'],$slowo))) $masRezult[$i++]=$stroka['id'];
         if ($rezPoiska==1 && stripos('sss'.$stroka['name'],$slowo)) $masRezult[$i++]=$stroka['id'];
         if ($rezPoiska==2 && stripos('sss'.$stroka['news'],$slowo)) $masRezult[$i++]=$stroka['id'];
        }
       }

     $masRezult=array_unique ($masRezult);
     $mas=$masRezult;
     $i=-1;
     foreach($mas as $value)
      $i++;
     foreach($mas as $value)
      $masRezult[$i--]=$value;

    if ($help) {
      echo '<p class="mesage">Функция совершает поиск статьи по слову.</p>';
      echo '<p class="mesage">Первый параметр - это имя таблицы, в которой производим поиск</p>';
      echo '<p class="mesage">Второй параметр - это искомое слово.</p>';
      echo '<p class="mesage">Третий параметр - это массив, в который возвращаются ID номера найденных статей.</p>';

      echo '<p class="mesage">Не обязательные параметры</p>';
      echo '<p class="mesage">Ключевое слово "заголовки", производит поиск только по заголовкам. По умолчанию поиск максимальный</p>';
      echo '<p class="mesage">Ключевое слово "текст", производит поиск только по текстам. По умолчанию поиск максимальный</p>';
      echo '<p class="mesage">Для поиска по заголовкам и тексту не вводим ни параметр "заголовки" ни "текст"</p>';

      echo '<p class="mesage">Фильтр по автору "автор-логин"</p>';
      echo '<p class="mesage">Фильтр по категории "категория-имя категории"</p>';
      echo '<p class="mesage"></p>';
      echo '<p class="mesage"></p>';
      $masRezult[0]=-1;
    }
  }
}

?>