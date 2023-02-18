<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToSearch
{
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
     $rez=$this->zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE 1"); //прочитать все категории из базы
    if ($autor && $razdel)
     $rez=$this->zaprosSQL("SELECT razdel FROM ".$nametablic." WHERE login_redaktora='".$autor_login."'"); //прочитать все категории из базы 

   if ($razdel && $rez!==false) // Если нашли заданные разделы, то найти комбинированные разделы например html3 входит в html3html5
    while(!is_null($stroka=mysqli_fetch_array($rez))) 
      if (!$this->proverkaMassiwa($smegnyeKategorii,$stroka[0])) // если такой категории в массиве нет
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
          $rez=$this->zaprosSQL($zapros);
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
        $rez=$this->zaprosSQL($zapros);
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
