<?php
namespace game\tic_tac_toe\ValueObject;

// объект помещает в переменные сессий, отвечающие за содержимое ноликов, крестиков, либо пустых мест на поле нужного значения.
// если игрок отправляет в объект цифру с ходом, то объект проверяет что поле ещё пустое и помещает в соответствующую 
// переменную тот символ, которым играет игрок.
// если алгоритм компьютера делает свой ход, то происходит то же самое, проверяется факт пустого поля и заносится знак,
// которым играет компьютер. Хотя при генерации своего хода компьютер сам проверяет пустое ли место на поле.

// для работы необходимо объявить объект и передать в виде параметра ему значение цифры хода или служебной команды.
// остальные данные объект возьмём у переменных сессий, такие как кто сделал ход к примеру.

// если в конструктор дать тип 'reset' то поле обнулится
// если передали в объект любое не цифровое значение, то объект через toString вернет error

// Если ход игрока был удачным, то переменная сессий, отвечающая за число ходов игрока увеличится на 1.
// Считаются только удачные ходы игрока

// obiekt umieszcza zera, krzyżyki lub puste spacje w zmiennych sesji odpowiedzialnych za zawartość żądanej wartości.
// jeśli gracz wyśle ​​numer z ruchem do obiektu, to obiekt sprawdza, czy pole jest nadal puste i umieszcza je w odpowiednim polu
// zmienna to postać, którą gra gracz.
// jeśli algorytm komputerowy wykona swój ruch, to dzieje się to samo, sprawdzany jest fakt pustego pola i wpisywany znak,
// grany przez komputer. Chociaż, generując własny ruch, komputer sam sprawdza, czy na boisku jest pusta przestrzeń.

// do pracy konieczne jest zadeklarowanie obiektu i przekazanie do niego wartości cyfry ruchu lub komendy serwisowej jako parametru.
// reszta danych obiektu zostanie pobrana ze zmiennych sesji, takich jak na przykład kto wykonał ruch.

// jeśli podasz konstruktorowi typ „reset”, to pole zostanie zresetowane do zera
// jeśli do obiektu została przekazana wartość nienumeryczna, obiekt zwróci błąd poprzez toString

// Jeśli ruch gracza się powiódł, to zmienna sesji odpowiedzialna za liczbę ruchów gracza wzrośnie o 1.
// Liczą się tylko udane ruchy gracza

// the object puts zeros, crosses, or empty spaces in the session variables responsible for the content of the desired value.
// if the player sends a number with a move to the object, then the object checks that the field is still empty and puts it in the corresponding one
// variable is the character the player is playing with.
// if the computer algorithm makes its move, then the same thing happens, the fact of an empty field is checked and the sign is entered,
// played by the computer. Although, when generating its own move, the computer itself checks whether there is an empty space on the field.

// for work it is necessary to declare an object and pass the value of the move digit or service command as a parameter to it.
// the rest of the object data will be taken from the session variables, such as who made the move, for example.

// if you give the 'reset' type to the constructor, then the field will be reset to zero
// if any non-numeric value was passed to the object, then the object will return an error via toString

// If the player's move was successful, then the session variable responsible for the number of player moves will increase by 1.
// Only successful player moves are counted

class ValueMasSession
{
    private $rezOut;
    public function __construct($type='noReset')
    {
        $this->rezOut='Ok';

        // статистика ходов в не зависимости от того, кто ходил
        if (gettype($type)=='integer')
            if ($type>0 && $type<10)
                if ($_SESSION['pole'.$type]=='')
                    {
                        $_SESSION['nomer_move']++;
                        $_SESSION['move'.$_SESSION['nomer_move']]=$type;
                    }

        // если в объект передан не цифровой параметр или передана цифра на уже занятое место, то вернуть 'error'
        if (gettype($type)=='integer' && $type>0 && $type<10) {
         if ($_SESSION['pole'.$type]!='') $this->rezOut='error';
        } else $this->rezOut='error';
         
        // если передали параметр конструктора reset, то обнулить все позиции
        if ($type=='reset') {
            for ($i=1; $i<10; $i++) 
                 $_SESSION['pole'.$i]='';

            for ($i=1; $i<10; $i++)
                 $_SESSION['move'.$i]='0';

            $_SESSION['nomer_move']=0;
            $_SESSION['blockBigMenu']=false; 
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
