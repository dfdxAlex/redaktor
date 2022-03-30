<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, какой сложности игра
// информация принимается от $_POST['gameDifficulty'] и помещается в $_SESSION['gameDifficulty']
// для запуска в нужном месте необходимо создать любой объект данного класса. После этого объект не используется.
// при необходимости можно узнать заданный уровень сложности используя магический метод toString

// obiekt akceptuje zawartość przycisku do wyboru poziomu trudności gry
// informacje są pobierane z $_POST['gameDifficulty'] i umieszczane w $_SESSION['gameDifficulty']
// aby uruchomić się we właściwym miejscu, musisz stworzyć dowolny obiekt tej klasy. Po tym obiekt nie jest używany.
// w razie potrzeby możesz sprawdzić dany poziom trudności za pomocą magicznej metody toString

// the object accepts the content of the button for choosing what difficulty the game is
// info is taken from $_POST['gameDifficulty'] and put into $_SESSION['gameDifficulty']
// to run in the right place, you need to create any object of this class. After that, the object is not used.
// if necessary, you can find out the given difficulty level using the toString magic method


class ValueGameDifficulty
{
    public function __construct()
    {
        if (!isset($_SESSION['gameDifficulty'])) $_SESSION['gameDifficulty']='easy';

        if (isset($_POST['gameDifficulty'])) {
            if ($_POST['gameDifficulty']=='Простая игра (Simple game)') 
                $_SESSION['gameDifficulty']='easy';
            else if ($_POST['gameDifficulty']=='Сложная игра (Difficult game)')
                $_SESSION['gameDifficulty']='difficult';
            else if ($_POST['gameDifficulty']=='Невозможно выиграть (impossible to win)')
                $_SESSION['gameDifficulty']='impossible';
            else 
                $_SESSION['gameDifficulty']='intelligence';
        } 
    }

    public function __toString()
    {
        return $_SESSION['gameDifficulty'];
    }
}
