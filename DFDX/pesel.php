<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesel</title>
</head>
<body>
    <div>
    <form action="pesel.php" method="post"> 

        <select name="country">
            <option>PESEL</option>
            <option>SVN</option>
            <option>BSN</option>
        </select>

        <p>Wpisz swoją datę urodzenia</p>
        <input type="text" name="dataRok" value="Rok">
        <input type="text" name="dataMonth" value="Miesiąc">
        <input type="text" name="dataDay" value="dzień"><br><br>

        <p>Select gender</p>
        <input type="radio" id="gender men" name="gender" value="men">
        <label for="gender men">Mężczyzna</label><br>
        <input type="radio" id="gender women" name="gender" value="women">
        <label for="gender women">Kobieta</label><br><br>

        <input type="submit" value="Generation">
        <input type="reset" value="Reset">
    </form>
</div>
    
</body>
</html>