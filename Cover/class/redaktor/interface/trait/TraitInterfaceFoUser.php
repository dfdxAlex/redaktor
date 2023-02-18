<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceFoUser
{

   public function checkUserStatus()
   {
    if ($_SESSION["status"]>0)                      // если есть какой-то статух входа на сайт
        if (isset($_POST['menu_up_dfdx']))          // если было нажатие любой кнопки верхнего меню
            if ($_POST['menu_up_dfdx']=='Выход') {  // Если была нажата кнопка Выход верхнего меню
                $_SESSION["status"]=0;              // Обнуляем статус пользователя (выходим)
                $_SESSION["login"]='';
             }

    if ($_SESSION["status"]==0)                      // если пользователь не вошел
        if (isset($_POST['menu_up_dfdx']))           // если было нажатие любой кнопки верхнего меню
            if ($_POST['menu_up_dfdx']=='Вход') {    // Если была нажата кнопка Вход верхнего меню
                $_SESSION["login"]=$_POST['login'];
                $_SESSION["parol"]=$_POST['parol'];
             }
    if (isset($_SESSION["login"]) && isset($_SESSION["parol"])) 
        $_SESSION["status"]=$this->statusRegi($_SESSION["login"],$_SESSION["parol"]);
   }

   public function resetParol()
   {
      $this->zaprosSQL("UPDATE status_klienta SET parol='1111' WHERE login='".$_POST['login']."'");
   }


   public function saveStatusR()
   {
       $this->zaprosSQL("UPDATE status_klienta SET parol='".$_POST['parol']."', mail='".$_POST['mail']."', status=".$_POST['status']." WHERE login='".$_POST['login']."'");
   }


   public function killGosc()
   {
       $this->zaprosSQL("DELETE FROM status_klienta WHERE login='".$_POST['login']."'");
   }

  public function listKlientow()
  {
    if ($_SESSION['status']==5 || $_SESSION['status']==4)
     $rez=$this->zaprosSQL("SELECT * FROM status_klienta WHERE 1");
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
      echo '<div class="col">'; 
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
  } 

  public function zapisGostia($login,$parol,$mail,$temaMeila,$meilText)
  {
    $rand=rand(9999,99999);
    $zapros="INSERT INTO status_klienta(`login`, `parol`, `mail`, `status`, `time`) VALUES ('".$login."','".$parol."','".$mail."',".$rand.",".time().")";
    $this->zaprosSQL($zapros);
        $mlText=$meilText.$rand;
        mail ($mail,$temaMeila,$mlText);
  }

  public function statusRegi($login,$parol)
  {
    $zapros="SELECT status FROM status_klienta WHERE login='".$login."' AND parol='".$parol."'";
    $rez=$this->zaprosSQL($zapros);
    if ($this->notFalseAndNULL($rez)===false) return 0;
    $stroka=mysqli_fetch_array($rez);
    if ($this->notFalseAndNULL($stroka)===false) return 0;
    return $stroka[0];
  }

  public function saveStatus($status)
  {
    $rez=$this->zaprosSQL("UPDATE status_klienta SET status=".$status." WHERE login='".$_SESSION['login']."'");
  }

  public function siearcMail($login,$meilText)
  {
    $zapros="SELECT * FROM status_klienta WHERE login='".$login."'";
    $rez=$this->zaprosSQL($zapros);
    $stroka=mysqli_fetch_assoc($rez);
    $mlText=$meilText.$stroka['status'];
    mail ($stroka['mail'],'Нашли письмо',$mlText);
  }
  public function modifiedSearcMail(\PHPMailer\PHPMailer\PHPMailer $mailer, $login,$meilText)
  {
    $zapros="SELECT * FROM status_klienta WHERE login='".$login."'";
    $rez=$this->zaprosSQL($zapros);
    $stroka=mysqli_fetch_assoc($rez);
    $mlText=$meilText.$stroka['status'];
    $this->simpleLetter($mailer, "От DFDX", $stroka['mail'],"Kod oт ".$this->initsite(), $meilText);
  }
  public function lovimOtvetNaCapcu($knopka)
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

  public function capcaRez($vopros,$otvet)
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
     $this->zaprosSQL("UPDATE registracia SET NAME='4' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='6' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='8' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='10' WHERE ID=14");
    return '6';
   }

    if ($nomer==1) {
     $this->zaprosSQL("UPDATE registracia SET NAME='Колесо круглое' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Пи=3,1415...' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Ночью темно' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Зимой холодно' WHERE ID=14");
     return 'Зимой холодно';
    }
    if ($nomer==2) {
     $this->zaprosSQL("UPDATE registracia SET NAME='Летом тепло' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Джинсы тесны' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Ахалай Махалай' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Днем светло' WHERE ID=14");
     return 'Днем светло';
    }
    if ($nomer==3) {// трижды по половине
     $this->zaprosSQL("UPDATE registracia SET NAME='Дважды по три бутылки' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Конь на холме пасётся' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Больше чем два поллитра' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Пять раз по двадцать пять' WHERE ID=14");
     return 'Больше чем два поллитра';
    }

    if ($nomer==4) {//Музыку еле слышно
     $this->zaprosSQL("UPDATE registracia SET NAME='Боком толкали бочку' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Видно, но хуже слышно' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Вода попала в уши' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Холодно, но не жарко' WHERE ID=14");
     return 'Вода попала в уши';
    }
    if ($nomer==5) {// Капли текли по крыше
     $this->zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Звёзды спадают на пол' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Кот шурудит на крыше' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Дождь уже слабо падал' WHERE ID=14");
     return 'Дождь уже слабо падал';
    }
    if ($nomer==6) { // Ваньку валяли в полдень
     $this->zaprosSQL("UPDATE registracia SET NAME='Круглое часто носят' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Зеньки раскрой зараза' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Ваньку валяли в полдень' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Больше не буду плакать' WHERE ID=14");
     return 'Ваньку валяли в полдень';
    }
    if ($nomer==7) { // Ветер срывает крышу
     $this->zaprosSQL("UPDATE registracia SET NAME='Новую нужно ставить' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Кошка кричит весною' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Жизнь оживает снова' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Только не очень быстро' WHERE ID=14");
     return 'Новую нужно ставить';
    }

    if ($nomer==8) { // Вирус пришел внезапно
     $this->zaprosSQL("UPDATE registracia SET NAME='Галоши надеть забыл он' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Весь мир ошарашил вскоре' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Лечили его всем миром' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Намедни катался на лыжах' WHERE ID=14");
     return 'Лечили его всем миром';
    }
    if ($nomer==9) {//Кто-нибудь видел Жору
     $this->zaprosSQL("UPDATE registracia SET NAME='Жора играет в спальне' WHERE ID=11");
     $this->zaprosSQL("UPDATE registracia SET NAME='Гена сидит на крыше' WHERE ID=12");
     $this->zaprosSQL("UPDATE registracia SET NAME='Миша ломает гвозди' WHERE ID=13");
     $this->zaprosSQL("UPDATE registracia SET NAME='Федя читает книгу' WHERE ID=14");
     return 'Жора играет в спальне';
    }
  }

  public function prowerkaMail()
  {
   if (preg_match('/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/',$_POST['Почта'])!=1) return true;
   $zapros="SELECT status FROM status_klienta WHERE mail='".$_POST['Почта']."'";
   $rez=$this->zaprosSQL($zapros);
   $stroka=mysqli_fetch_array($rez);
   if (is_null($stroka[0])) return false;
   if ($stroka[0]>=0) return true;
   return false;
  }

  public function prowerkaLogin()
  {
     if ($this->proverkaMata($_POST['Логин'])) return true;
     if ($_POST['Логин']=='' || $_POST['Логин']=='Логин') return true; 
     $zapros="SELECT status FROM status_klienta WHERE login='".$_POST['Логин']."'";
     $rez=$this->zaprosSQL($zapros);
     $stroka=mysqli_fetch_array($rez);
     if (is_null($stroka)) return false;
     if ($stroka[0]>=0) return true;
     return false;
  }

    public function statusNumerSlovo($status)
    {
     switch ($status) {
       case 0:
         return 'Гость';
       case 1:
         return 'Пользователь';
       case 2:
         return 'Редактор';
       case 3:
         return 'Подписчик';
       case 4:
         return 'Администратор';
       case 5:
         return 'Супер Администратор';
       case 9:
         return 'Не подтвердивший регистрацию';
       default:
         return 'Статус не известен';
     }
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
}
