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