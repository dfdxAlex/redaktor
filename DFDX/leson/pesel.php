<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesel</title>
    <link rel="stylesheet" href="pesel_style.css">
</head>
<body>
<?php
require('pesel_lib.php');
?>

    <div class="form">
    <form action="pesel.php" method="post"> 
        <?php
         $dataNorm=dataNorm();
         if ($dataNorm) echo '<div class="dataNorm">'; else echo '<div class="dataErr">';
         if ($dataNorm) echo '<p>Wpisz swoją datę urodzenia</p>'; 
            else echo '<p>Napisz poprawnie swoją datę urodzenia RRRR/MM/DD</p>';
        ?>
        <input type="text" name="dataRok" value="<?php rok()?>" size="4" minlength="4" maxlength="4">
        <input type="text" name="dataMonth" value="<?php month()?>" size="4" minlength="1" maxlength="2">
        <input type="text" name="dataDay" value="<?php day()?>" size="4" minlength="1" maxlength="2"><br><br>
        </div>
        <?php
         if (isset($_POST['gender'])) echo '<div class="dataNorm">'; else echo '<div class="dataErr">';
        ?>
        <p>Select gender</p>
        <input type="radio" id="gender men" name="gender" value="men" <?php gender('men')?>>
        <label for="gender men">Mężczyzna</label><br>
        <input type="radio" id="gender women" name="gender" value="women" <?php gender('women')?>>
        <label for="gender women">Kobieta</label><br><br>
        </div>
        <input type="submit" value="Generation" name="generation">
    </form>
</div>

<?php
//generowanie 7,8,9 cyfr 
//nie wiadomo, skąd wziąć dane o użytych liczbach. W programie używam generatora liczb losowych
if ($dataNorm)
    {
        $nomer789=rand(100, 999);
        $pesel10=nomer1_6($_POST['dataRok'],$_POST['dataMonth'],$_POST['dataDay']).$nomer789.nomer10();
        $nomer11=nomer11($pesel10);
    }
echo '<div class="pesel">';
if ($dataNorm)
    echo $pesel10.$nomer11;
else echo'<p>Wpisz swoją datę urodzenia</p>';
echo '</div>';

function send_mail($to, $thm, $html, $path) 

{ 

  $fp = fopen($path,"r"); 

  if (!$fp) 

  { 

    print "Файл $path не может быть прочитан"; 

    exit(); 

  } else echo 'прочитали';

  $file = fread($fp, filesize($path)); 

  fclose($fp); 

  

  $boundary = "--".md5(uniqid(time())); // генерируем разделитель 

  $headers .= "MIME-Version: 1.0\n"; 

  $headers .="Content-Type: multipart/mixed; boundary=\"$boundary\"\n"; 

  $multipart .= "--$boundary\n"; 

  $kod = 'koi8-r'; // или $kod = 'windows-1251'; 

  $multipart .= "Content-Type: text/html; charset=$kod\n"; 

  $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n"; 

  $multipart .= "$html\n\n"; 



  $message_part = "--$boundary\n"; 

  $message_part .= "Content-Type: application/octet-stream\n"; 

  $message_part .= "Content-Transfer-Encoding: base64\n"; 

  $message_part .= "Content-Disposition: attachment; filename = \"".$path."\"\n\n"; 

  $message_part .= chunk_split(base64_encode($file))."\n"; 

  $multipart .= $message_part."--$boundary--\n"; 



  if(!mail($to, $thm, $multipart, $headers)) 

  { 

    echo "К сожалению, письмо не отправлено"; 

    exit(); 

  } else echo '<br>отправили';

} 

send_mail('alexmway@mail.ru','тест', 'тест тест тест','pesel_style.css');
echo 'тест';


?>




</body>
</html>
