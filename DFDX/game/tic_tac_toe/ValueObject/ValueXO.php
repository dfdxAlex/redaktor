<?php
namespace game\tic_tac_toe\ValueObject;

// объект принимает содержимое кнопки выбора того, играть крестиками или ноликами и возвращает значение X или O
// объект принимает значение у массива $_POST['x_o'] и помещает в переменную $_SESSION['x_o']
// для использования необходимо в нужном месте объявить объект данного класса.
// Узнать чем играет игрок или чем играет компьютер можно задав объекту входящий параметр player/computer
// по умолчанию объект вернет значение того, чем играет игрок

// obiekt akceptuje zawartość przycisku, aby wybrać, czy grać w kółko i krzyżyk, i zwraca wartość X lub O
// obiekt pobiera wartość z tablicy $_POST['x_o'] i umieszcza ją w zmiennej $_SESSION['x_o']
// aby z niego skorzystać, należy w odpowiednim miejscu zadeklarować obiekt tej klasy.
// Możesz dowiedzieć się, w co gra odtwarzacz lub w co gra komputer, ustawiając parametr wejściowy player/computer na obiekt
// domyślnie obiekt zwróci wartość tego, z czym bawi się gracz

// object accepts the content of the button to select whether to play tic-tac-toe and returns the value of X or O
// the object takes the value from the array $_POST['x_o'] and puts it into the variable $_SESSION['x_o']
// to use it, you need to declare an object of this class in the right place.
// You can find out what the player is playing or what the computer is playing by setting the input parameter player/computer to the object
// by default, the object will return the value of what the player is playing with
class ValueXO
{
    private $rezOut;

    public function __construct(string $type="player")
    {
        $this->rezOut=$type;
        if (isset($_POST['x_o'])) {
            if ($_POST['x_o']=='Играю крестиками (I play with crosses)') $_SESSION['x_o']='X';
            if ($_POST['x_o']=='Играю ноликами (I play with zeros)') $_SESSION['x_o']='O';
        } 
    }

    public function __toString()
    {
        if ($this->rezOut=='player') return $_SESSION['x_o'];
        if ($this->rezOut=='computer') {
            if ($_SESSION['x_o']=='X') return 'O';
            else return 'X';
        }
    }
}
