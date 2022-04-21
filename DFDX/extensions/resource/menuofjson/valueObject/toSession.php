<?php
namespace extensions\resource\menuofjson\valueObject;

// класс по обработке переменных сессии
// параметр $nameVarSession вводит имя переменной сессии и если его нет, то создать новую переменную
// Если передан параметр пустой строки, то не проверять существование переменной
// Если задать ключевое слово в параметре all, то объект вернет список всех переменных сессий и их значения
class toSession
{
    private $nameVarSession;
    public function __construct($nameVarSession="",$value='')
    {
        $this->nameVarSession=$nameVarSession;
        if ($nameVarSession!="") {
            if (!isset($_SESSION[$nameVarSession])) $_SESSION[$nameVarSession]=$value;
        }
    }

    
    public function getSession($nameVarSession) // $_SESSION[''] | false
    {
        if (isset($_SESSION[$nameVarSession])) return $_SESSION[$nameVarSession];
        else return false;
    }

    public function __toString()
    {
        $rez='';
        // вернуть все переменные сессий в одной строке если входящий параметр пуст
        if ($this->nameVarSession=='') {
            $rez='Ввели объект без параметров, возвращаю список всех переменных и их значений<br>';
            foreach ($_SESSION as $key=>$value) {
                $rez.='$_SESSION["'.$key.'"]='.$value.'<br>';
            }
            $rez.='Вывод переменных сессий закончен.';
        return $rez;
        }
        return '';
    }
}
