<?php
namespace game\tic_tac_toe\ValueObject;

// объект обрабатывает переменные сессии, отвечающие за игровое поле
// если в конструктор дать тип 'reset' то поле обнулится
class ValueMasSession
{
    private $rezOut;
    public function __construct($type='noReset')
    {
        $this->rezOut='Ok';

        // если в объект передан не цифровой параметр или передана цифра на уже занятое место, то вернуть 'error'
        if (gettype($type)=='integer' && $type>0 && $type<10) {
         if ($_SESSION['pole'.$type]!='') $this->rezOut='error';
        } else $this->rezOut='error';
         
         if ($type=='reset') {
            for ($i=1; $i<10; $i++) 
                 $_SESSION['pole'.$i]='';
         }

         $x_o=$_SESSION['x_o']; // по умолчанию крест или ноль берется у игрока
         
         $yesOutput=false;

         // определяем какой именно знак загонять в место для хода. Если ходит игрок, то символ оставляем из переменной $_SESSION['x_o']
         // если ходит компьютер, то переворачиваем значение
         if ($_SESSION['firstMove']=='computer') {
             if ($x_o=='X') {
                    $x_o='O';
                    $yesOutput=true;
             }
             if ($x_o=='O' && !$yesOutput) $x_o='X';
         }
         if (gettype($type)=='integer' && $type>0 && $type<10 && $this->rezOut!='error') {
         // записываем в переменные сессий ход компьютера
         $_SESSION['pole'.$type]=$x_o;

         // считаем удачные ходы
         if ($_SESSION['firstMove']!='computer') $_SESSION['hit']++;
         }
    }

public function __toString()
{
    return $this->rezOut;
}

}
