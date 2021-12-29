<?php

function regaAdministratora($kod)
{
  if ($_SESSION['login']=='admin' || $_SESSION['login']=='Admin' || $_SESSION['login']=='Administrator' || $_SESSION['login']=='administrator') 
   {
     $status = new redaktor\login();
     $kodFile=file_get_contents('kod.txt');
     if ($kodFile==$kod)
      {
        echo '<p class="mesage">Код администратора верен.</p>';
        $_SESSION['status']=5;$status->saveStatus(5);
        if ($status->statusRegi($_SESSION['login'],$_SESSION['parol'])==5)
         {
            echo '<p class="mesage">Учётная запись администратора создана.</p>';
            unlink('kod.txt');
            return 2; // произвольное значение для определения третьего варианта, запись админа прошла успешно
         }
        
      } else echo '<p class="mesage">Код администратора не верен.</p>';
     return true; // попытка записать админа не удалась, не верный код
   }
   return false;  // нет попытки создать админа, просто вошли и вышли
}
function genericKodAdmina($login)
{
  $status = new redaktor\login();
  if ($login=='admin' || $login=='Admin' || $login=='Administrator' || $login=='administrator') 
   if (!$status->prowerkaLogin('admin') || !$status->prowerkaLogin('Admin') || !$status->prowerkaLogin('Administrator') || !$status->prowerkaLogin('administrator')) 
    file_put_contents('kod.txt',mt_rand(1000000,9999999));
}

function buttonTwitter($text)
{
  $textTwitter=preg_filter('/\s/','%20',$text);
  echo '<br><br>';
  echo '<div class="buttonTwitterDiv">';
  echo '<a class="link-button-twitter-text" target="_blank"';
  echo ' href="https://twitter.com/intent/tweet?text='.$textTwitter.'">';
  echo 'Твитнуть</a>';
  echo '</div>';
}

function forma($idTeg,$Teg,$opisanie,$opisanieVideo,$idPrimer,$idAtribut,$idSintax,$kluc1,$kluc2,$kluc3,$kluc4,$kluc5,$kluc6,$kluc7,$kluc8,$kluc9,$kluc10)
{
echo '<div class="container">';
echo '<div class="btn">';
echo '<form method="POST" action="redaktor.php">';                                                           

echo 'Номер id тега: <input type="number" name="idTeg" value='.$idTeg.'>';                                   
echo 'Название тега:<input type="text" name="Teg" value="'.$Teg.'"><br>';                                    
echo '<textarea rows="15" cols="100" name="opisanie" maxlength="65000">'.$opisanie.'</textarea> <br>';       
echo 'Ссылка на видео:<input type="url" name="opisanieVideo" value="'.$opisanieVideo.'"><br>';               
echo 'Есть пример:<input type="number" name="idPrimer" value='.$idPrimer.'><br>';                            
echo 'Есть атрибуты:<input type="number" name="idAtribut" value='.$idAtribut.'><br>';                        
echo 'Есть атрибуты:<input type="number" name="idSintax" value='.$idSintax.'><br>';                          

echo 'Ключ1:<input type="text" name="kluc1" value='.$kluc1.'>';                                              
echo 'Ключ2:<input type="text" name="kluc2" value='.$kluc2.'>';                                              
echo 'Ключ3:<input type="text" name="kluc3" value='.$kluc3.'><br>';                                          
echo 'Ключ4:<input type="text" name="kluc4" value='.$kluc4.'>';                                              
echo 'Ключ5:<input type="text" name="kluc5" value='.$kluc5.'>';                                              
echo 'Ключ6:<input type="text" name="kluc6" value='.$kluc6.'><br>';                                          
echo 'Ключ7:<input type="text" name="kluc7" value='.$kluc7.'>';                                              
echo 'Ключ8:<input type="text" name="kluc8" value='.$kluc8.'>';                                              
echo 'Ключ9:<input type="text" name="kluc9" value='.$kluc9.'><br>';                                          
echo 'Ключ0:<input type="text" name="kluc10" value='.$kluc10.'><br>';                                        

echo '<input class="btn btn-primary" type="submit" name="buttonSub" value="Очистить форму">';      
echo ' <input class="btn btn-primary" type="submit" name="buttonSub" value="Прочитать запись">';                                 
echo ' <input class="btn btn-primary" type="submit" name="buttonSub" value="Записать">';                                            
if (isset($_POST['tegUgeJest']) && $_POST['tegUgeJest'])  {
    $_POST['tegUgeJest']=false;
    echo ' <input class="btn btn-primary" type="submit" name="buttonSub" value="Тег уже есть, всё равно записать">';                  
}

echo ' </form>';                                                                                            
echo '</div>';
echo '</div>';
}

function ops()
{
  echo ('<class="ops" img width="50px" height="50px" src="image/oops.jpg">');
  echo ('<img width="50px" height="50px" src="image/oops.jpg">');
  echo ('<img width="50px" height="50px" src="image/oops.jpg">');
  echo ('<img width="50px" height="50px" src="image/oops.jpg">');
  echo ('<img width="50px" height="50px" src="image/oops.jpg">');
  echo '<br><h4>Такого тега нет в базе</h4>';
}

function formaVyborBd() { // форма для выбора базы данных на сайте
    echo ('<form method=POST action="amator.php">');
    echo ('<input type="submit" name="poiskButton" value="HTML">  ');
    echo ('<input type="submit" name="poiskButton" value="CSS">  ');
    echo ('<input type="submit" name="poiskButton" value="PHP">  ');
    echo ('<input type="submit" name="poiskButton" value="MySQL">  ');
    echo ('<input type="submit" name="poiskButton" value="JavaScript">  ');
    echo ('<input type="submit" name="poiskButton" value="MQL4">  ');
    echo ('<input type="submit" name="poiskButton" value="MQL5">  ');
    echo ('<input type="submit" name="poiskButton" value="Электроника">  ');

    echo ("</form>");
 }

function formaPoisk() { // форма для поиска на сайте
   echo ('<form method=POST action="amator.php">');
   echo ('<input type="text" name="poiskTemy">  ');

   if (!isset($_SESSION['nazwanieBd']))  //Если нне было переключений между базами данных, то назеначить базу HTML
   {
    $_SESSION['nazwanieBd']="HTML";
   }
   
   //Если была нажата одна из кнопок выбора базы данных, то переменной $nazwanieBd присваиваем значение массива $_POST['poiskButton']
   if (isset($_POST['poiskButton']))
      $_SESSION['nazwanieBd']=$_POST['poiskButton'];

   $title1="Первый тип поиска - поиск по названию темы-статьи, самый точный вариант поиска.";
   $title2="Второй тип поиска по ключевым словам, менее точный тип поиска информации.";
   $title3="Третий тип поиска - это поиск слова в тексте статьи, самый неточный тип поиска информации.";
   echo '<input type="submit" name="poiskPoTeme" value="Поиск по базе ',$_SESSION['nazwanieBd'],' Тема"><b title="',$title1,'"> ?</b><br>'; //Поиск по названию темы или заголовка
   echo ('<input type="text" name="poiskKluca">  ');
   echo '<input type="submit" name="poiskPoClucu" value="Поиск по базе ',$_SESSION['nazwanieBd'],' Ключ"><b title="',$title2,'"> ?</b><br>'; //Поиск по названию темы или заголовка
   echo ('<input type="text" name="poiskTexta">  ');
   echo '<input type="submit" name="poiskPoTextu" value="Поиск по базе ',$_SESSION['nazwanieBd'],' Текст"><b title="',$title3,'"> ?</b><br>'; //Поиск по названию темы или заголовка
   echo ("</form>");
}

function poisk($zapros)  // форма для поиска на сайте
  {
    $tegPoisk = new htmlTeg($zapros);
    if ($tegPoisk->teg=="<!--") $tegPoisk->teg="&lt!-- здесь любой текст --&gt";
    if (!$tegPoisk) {ops();echo ("ошибка при создании объекта<br>");}
     else echo "<h1>".$tegPoisk->teg."</h1>";
  }
  


?>