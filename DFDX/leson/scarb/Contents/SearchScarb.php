<?php
namespace Contents;

class SearchScarb
{
    //Konstruktor otrzymuje mapę jaskini z nagrodami oraz klasę WhereTreasure do przechowywania i przetwarzania danych o skarbach
    //Конструктор получает карту пещеры с призами и класс WhereTreasure для хранения и обработки данных об кладе
    public function __construct(\Contents\ValueObject\Mapa $mapa, \Contents\ValueObject\WhereTreasure $allСlades)
    {
        //dostajemy długość ciągu mapy
        //получаем длину строки карты
        $strLen=strlen($mapa);

        // początkowy poziom poszukiwacza skarbów w jaskini
        //начальный уровень искателя клада в пещере
        $poziom=0;

        //pozycja poszukiwacza, który jeszcze nie wszedł do jaskini
        //положение искателя, который не вошел ещё в пещеру
        $index=-1;

        // wypełniono tablicę obiektu WhereTreasure o wszystkich miejscach ze skarbami
        // заполнили массив объекта WhereTreasure о всех местах с кладами
        for ($i=0; $i<=$strLen; $i++){
            if (substr($mapa, $i, 1)=='(')  {
                $poziom--;
                continue;
            }

            if (substr($mapa, $i, 1)==')')  {
                $poziom++;
                continue;
            }

            if (substr($mapa, $i, 1)=='*')  {
                $allСlades->setDataTreasure($i, $poziom);
            }
        }
        
        // funkcja zlicza, które piętro ma najwięcej skarbów i zwraca pierwszy indeks podłogi z maksymalną liczbą skarbów
        // функция считает на каком этаже больше всего кладов и возвращает самый первый индекс этажа с максимальным числом кладов
        $this->retUrn = $allСlades->getIndexMax();

    }

    public function __toString()
    {
        return  $this->retUrn;
    }

}
