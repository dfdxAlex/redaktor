<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToModul
{
    
    public function money(...$parametr) // работа с символами или деньгами
    {
        $this->createTab(
                              "name=monety_dfdx",
                              "poleN=login",
                              "poleT=varchar(50)",
                              "poleS=login",
                              "poleN=monet",
                              "poleT=int",
                              "poleS=0"
                              );
        $login='';
        $zaplatit=0;
        foreach($parametr as $value)
            if (stripos('sss'.$value,'login='))
                $login=preg_replace('/login=/','',$value);
        foreach($parametr as $value)
            if (stripos('sss'.$value,'заплатить='))
                $zaplatit=preg_replace('/заплатить=/','',$value);
        if ($login!='') {// Обработка параметра Логин + заплатить
            $regaJest=false;
            $regaJest=$this->siearcSlova('monety_dfdx','login',$login);
            if ($regaJest) {
                $rez=$this->zaprosSQL("SELECT monet FROM monety_dfdx WHERE login='".$login."'");
                $stroka=mysqli_fetch_array($rez);
                $monet=$stroka[0];
                $monet=$monet+$zaplatit;
                $zapros="UPDATE monety_dfdx SET monet=".$monet." WHERE login='".$login."'";
                $this->zaprosSQL($zapros);
              }
            if (!$regaJest) {
                $zapros="INSERT INTO monety_dfdx(login, monet) VALUES ('".$login."',".$zaplatit.") ";
                $this->zaprosSQL($zapros);
              }
          }
        if ($login!='' && $zaplatit==0) {// Обработка параметра Логин
            $rez=$this->zaprosSQL("SELECT monet FROM monety_dfdx WHERE login='".$login."'");
            $stroka=mysqli_fetch_array($rez);
            return $stroka[0];
          }
        //обработка параметра help
        foreach($parametr as $value)
        if ($value=='help' || $value=='Помощь') {
            echo '<p>Функция проверяет существует ли таблица монет, если нет, то создает её и присваивает начальные значения</p>';
            echo '<p>Чтобы функция вернула число монет пользователя, необходимо задать логин путем "login=логин игрока". Функция возвращает значение и выходит</p>';
            echo '<p>Чтобы добавить число монет человеку, вводим логин и заплатить."login=логин игрока", "заплатить=1000" </p>';
            echo '<p></p>';
            echo '<p></p>';
            echo '<p></p>';
            echo '<p></p>';
            echo '<p></p>';
            echo '<p></p>';
            echo '<p></p>';
          } 
  }
}
