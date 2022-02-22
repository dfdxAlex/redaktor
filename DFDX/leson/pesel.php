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

echo '</body></html>';
