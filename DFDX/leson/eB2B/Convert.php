
<?php

class Convert
{
    public function __construct()
    {

    }

    public function convertToNumeric(string $str='')
    {
        if ($str=='') return false;

        //policz długość ciągu 1 raz
        $strLen=strlen($str);
        $strRezult="";

        // zmienna $i służy do uruchomienia pętli
        // zmienna $j służy do sprawdzenia, czy jesteśmy na ostatniej iteracji
        for ($i=0, $j=0; ++$j; $i++) {

            //wszystkie znaki na małe litery, przekonwertuj następny znak na liczbę i dodaj go do wynikowego ciągu
            $strRezult.=$this->charToInt(substr($str,$i,1));

            //Jeśli ta iteracja jest ostatnią, wyjdź z pętli
            if ($j==$strLen) break;

            //dodaj przecinek
            $strRezult.=',';
        }
        return $strRezult;
    }


    //zamiana jednego znaku na liczby
    public function charToInt($v)
    {
        return match (mb_strtolower($v)) {
            'a' => '2',
            'b' => '22',
            'c' => '222',
            'd' => '3',
            'e' => '33',
            'f' => '333',
            'g' => '4',
            'h' => '44',
            'i' => '444',
            'j' => '5',
            'k' => '55',
            'l' => '555',  
            'm' => '6',
            'n' => '66',
            'o' => '666',
            'p' => '7',
            'q' => '77',
            'r' => '777',
            's' => '7777',
            't' => '8', 
            'u' => '88',
            'v' => '888',
            'w' => '9',
            'x' => '99',
            'y' => '999',
            'z' => '9999',
            ' ' => '0',
        };  
    }
}
