<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, кто ходит первый, игрок или компьютер
// объект сам берет информыцию из массива $_POST['firstMove'] и заносит его в переменную $_SESSION['firstMove']
// кто должен сделать ход в определенный момент времени можно узнать благодаря магическому методу __toString
// для отработки класса необходимо просто создать объект и можно сразу же его удалять

// Внимание!! Переменная $_SESSION['firstMove'] изменяет свое значение в процессе ходов игрока и компьютера

// obiekt akceptuje zawartość przycisku, aby wybrać, kto idzie pierwszy, gracz czy komputer
// sam obiekt pobiera informacje z tablicy $_POST['firstMove'] i umieszcza je w zmiennej $_SESSION['firstMove']
// kto powinien wykonać ruch w określonym momencie, można dowiedzieć się dzięki magicznej metodzie __toString
// aby wypracować klasę wystarczy stworzyć obiekt i można go od razu usunąć

// object accepts the content of the button to select who goes first, the player or the computer
// the object itself takes information from the $_POST['firstMove'] array and puts it into the $_SESSION['firstMove'] variable
// who should make a move at a certain point in time can be found out thanks to the __toString magic method
// to work out the class, you just need to create an object and you can immediately delete it

class ValueWhoFirst
{
    public function __construct()
    {
        if (isset($_POST['firstMove'])) {
            if ($_POST['firstMove']=='Я хожу первым (I go first)') {
                $_SESSION['firstMove']='player';
                $_SESSION['firstMoveConst']='player';
            }
            else {
                $_SESSION['firstMove']='computer';
                $_SESSION['firstMoveConst']='computer';
            }
        } 
    }

    public function __toString()
    {
        return $_SESSION['firstMove'];
    }

}
