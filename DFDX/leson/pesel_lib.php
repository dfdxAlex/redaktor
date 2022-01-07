<?php
function dataNorm()
    {
        if (!isset($_POST['dataDay']) || !isset($_POST['dataRok']) || !isset($_POST['dataMonth'])) return false;
                if ($_POST['dataRok']<1800 || $_POST['dataRok']>2299) return false;
                if ($_POST['dataMonth']>0 
                    && $_POST['dataMonth']<13  
                        && $_POST['dataDay']>0 
                            && $_POST['dataDay']<32 
                                && checkdate($_POST['dataMonth'], $_POST['dataDay'], $_POST['dataRok'])) 
                                    return true;   
                else return false;
    }

function rok()
{
 if (isset($_POST['dataRok'])) echo $_POST['dataRok']; else echo 'rok';
}
function month()
{
 if (isset($_POST['dataMonth'])) echo $_POST['dataMonth']; else echo 'miesiąc';
}
function day()
{
 if (isset($_POST['dataDay'])) echo $_POST['dataDay']; else echo 'dzień';
}
function gender($gender)
{
 if (isset($_POST['gender']) && $_POST['gender']==$gender) echo 'checked';
}

function nomer1_6($dataRok,$dataMonth,&$dataDay)
{
        $nom0_1=mb_strcut($dataRok,2,2);
        if ($dataRok>1799 && $dataRok<1900) $nomer2_3=$dataMonth+80;
        if ($dataRok>1899 && $dataRok<2000) $nomer2_3=$dataMonth;
        if ($dataRok>1999 && $dataRok<2100) $nomer2_3=$dataMonth+20;
        if ($dataRok>2099 && $dataRok<2200) $nomer2_3=$dataMonth+40;
        if ($dataRok>2199 && $dataRok<2300) $nomer2_3=$dataMonth+60;
        if ($nomer2_3<10) $nomer2_3='0'.$nomer2_3;
        if ($dataDay<10) $dataDay='0'.$dataDay;
        return $nom0_1.$nomer2_3.$dataDay;
}

//nie wiadomo, skąd wziąć dane o użytych liczbach. W programie używam generatora liczb losowych
function nomer10()
{

if (isset($_POST['gender']) )
    {
        if ($_POST['gender']=='men')
            {
                $nomer10=1;
                while ($nomer10 % 2 != 0)
                    $nomer10=rand(0,9);
                return $nomer10;
            }
        else {
            $nomer10=0;
            while ($nomer10 % 2 == 0)
                $nomer10=rand(0,9);
            return $nomer10;
             }
    }
}
function ves($nomer)
{
    return match ($nomer){
        0=>1,
        1=>3,
        2=>7,
        3=>9,
        4=>1,
        5=>3,
        6=>7,
        7=>9,
        8=>1,
        9=>3
    };
}
function nomer11($pesel)
{
if ($pesel)
   $sum=0;
   for ($i=0; $i<10; $i++)
        $sum=$sum+(mb_strcut($pesel,$i,1)*ves($i));
   $nomer11=10-$sum%10;
   if ($nomer11==10) return 0;
   return $nomer11;
}
?>