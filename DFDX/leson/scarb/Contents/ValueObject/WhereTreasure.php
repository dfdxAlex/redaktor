<?php
namespace Contents\ValueObject;

// klasa zbiera dane o lokalizacji skarbów i zwraca poziom, na którym skarb jest najwcześniej i najwcześniej
// класс соберает данные о расположении кладов и возвращает уровень, на котором больше всего и раньше всего есть клад
class WhereTreasure
{
    private $allСlades;

    public function __construct()
    {
        $this->allСlades = array();
    }

    public function getIndexMax()
    {

        //sprawdź liczbę skarbów na każdym poziomie.
        //узнать число кладов на каждом уровне. 
        $numberOfTreasuresAtEachLevel = array_count_values($this->allСlades);

        // Znajdź poziom z maksymalną liczbą skarbów
        // Найти уровень с максимальным числом кладов
        $firstIndexOfArrayOfMaximums = array_key_first($numberOfTreasuresAtEachLevel);

        //Znajdź pierwsze dopasowanie poziomu skarbów do jednego z poziomów zawierających maksymalną 
        //liczbę skarbów i zwróć indeks - to jest odpowiedź
        //Найти первое совпадение уровня с кладом с одним из уровней, содержащих максимальное 
        //число кладов и вернуть индекс - это ответ
        foreach($this->allСlades as $key => $value) {
            if ($value==$firstIndexOfArrayOfMaximums) return $key;
        }

    }

    public function setDataTreasure(int $index, int $poziom)
    {
        $this->allСlades[$index]=$poziom;
    }
    
}
