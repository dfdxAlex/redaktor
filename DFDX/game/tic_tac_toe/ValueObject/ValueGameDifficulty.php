<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, кто ходит первый, игрок или компьютер
// информация принимается от $_POST['gameDifficulty'] и помещается в $_SESSION['gameDifficulty']
// для запуска в нужном месте необходимо создать любой объект данного класса. После этого объект не используется.

// obiekt akceptuje zawartość przycisku, aby wybrać, kto idzie pierwszy, gracz czy komputer
// informacje są pobierane z $_POST['gameDifficulty'] i umieszczane w $_SESSION['gameDifficulty']
// aby uruchomić się we właściwym miejscu, musisz stworzyć dowolny obiekt tej klasy. Po tym obiekt nie jest używany.

// object accepts the content of the button to select who goes first, the player or the computer
// info is taken from $_POST['gameDifficulty'] and put into $_SESSION['gameDifficulty']
// to run in the right place, you need to create any object of this class. After that, the object is not used.

// при необходимости можно узнать заданный уровень сложности используя магический метод toString
// w razie potrzeby możesz sprawdzić dany poziom trudności za pomocą magicznej metody toString
// if necessary, you can find out the given difficulty level using the toString magic method
class ValueGameDifficulty
{
    public function __construct()
    {
        if (!isset($_SESSION['gameDifficulty'])) $_SESSION['gameDifficulty']='easy';
        if (isset($_POST['gameDifficulty'])) {
            if ($_POST['gameDifficulty']=='Простая игра (Simple game)') 
                $_SESSION['gameDifficulty']='easy';
            else 
                $_SESSION['gameDifficulty']='difficult';
        } 
    }

    public function __toString()
    {
        return $_SESSION['gameDifficulty'];
    }
}
