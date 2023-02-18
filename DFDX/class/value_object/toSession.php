<?php
namespace class\value_object;

// класс по обработке переменных сессии
// параметр $nameVarSession вводит имя переменной сессии и если его нет, то создать новую переменную
// Если передан параметр пустой строки, то не проверять существование переменной
// Если задать ключевое слово в параметре all, то объект вернет список всех переменных сессий и их значения
//  getSession($nameVarSession) возвращает значение переменной сессии по имени или false, если её нет
// getSessionAll() - выводит список всех переменных сессий
// public function getSessionAllFilter($filter,$header) выводит список всех переменных сессий, в имени которых содержится $filter
// если $header=false то функция выводит только значения переменных через запятую
// killSessionFilter($filter) функция удаляет переменные сессии, содержащие фильтр в имени $_SESSION['$filter']
// public function getSessionAllFilterReturn($filter,$header=',') // возвращает строку со всеми параметрами 
// содержащимися во всех подходящих переменных
class toSession
{
    private $nameVarSession;
    public function __construct($nameVarSession="",$value='')
    {
        $this->nameVarSession=$nameVarSession;
        if ($nameVarSession!="" && $nameVarSession!="all") {
            if (!isset($_SESSION[$nameVarSession])) $_SESSION[$nameVarSession]=$value;
        }
    }

    
    public function getSession($nameVarSession) // $_SESSION[''] | false
    {
        if (isset($_SESSION[$nameVarSession])) return $_SESSION[$nameVarSession];
        else return false;
    }

    // выводит все переменные сессий
    public function getSessionAll()
    {
        echo 'Функция getSessionAll() выводит список всех переменных сессий<br>';
        foreach ($_SESSION as $key=>$value) {
            echo '$_SESSION["'.$key.'"]='.$value.'<br>';
        }
        echo 'Вывод переменных сессий закончен.';
    }

    // выводит все переменные сессий, в имени которых есть $filter
    // если $header=false то функция выводит только значения переменных через запятую
    public function getSessionAllFilter($filter,$header=true) 
    {
        if ($header)
            echo 'Функция getSessionAllFilter("часть ключа") выводит список всех переменных сессий<br>';
        foreach ($_SESSION as $key=>$value) {
            if (strripos($key,$filter)!==false) {
                if ($header)
                    echo '$_SESSION["'.$key.'"]='.$value.'<br>';
                if (!$header)
                    echo $value.',';
            }
        }
        if ($header)
            echo 'Вывод переменных сессий закончен.';
    }

    // возвращает все переменные сессий, в имени которых есть $filter
    // если $header задает разделитель, по уполчанию будет запятая
    public function getSessionAllFilterReturn($filter,$header=',') 
    {
        $rez='';
        foreach ($_SESSION as $key=>$value) {
            if (strripos($key,$filter)!==false) {
                    $rez.=$value.$header;
            }
        }
        return $rez;
    }

    public function __toString()
    {
        $rez='';
        // вернуть все переменные сессий в одной строке если входящий параметр пуст
        if ($this->nameVarSession=='all') {
            $rez='Ввели объект без параметров, возвращаю список всех переменных и их значений<br>';
            foreach ($_SESSION as $key=>$value) {
               $rez.='$_SESSION["'.$key.'"]='.$value.'<br>';
            }
            $rez.='Вывод переменных сессий закончен.';
        return $rez;
        }
        return '';
    }

    // функция удаляет переменные сессии, содержащие фильтр в имени $_SESSION['$filter']
    public function killSessionFilter($filter)
    {
         foreach ($_SESSION as $key=>$value) {
             if (stripos($key,$filter)!==false) unset($_SESSION[$key]);
         }
    }

    public function toSessionHelp()
    {
         echo '<br>';
         echo '<p>Создание объекта $name= new class\value_object\toSession($nameVarSession="",$value="")<br>';
         echo '$nameVarSession="" - Имя переменной сессии, если такой переменной нет, то будет создана новая и пустая<br>';
         echo '$nameVarSession="" - Значение зарезервированно, если его задать, то метод toString выведет все переменные и их значения<br>';
         echo '$value="" - Значение для данной переменной сессии</p>';
         echo '<p>getSession($nameVarSession) // $_SESSION[""] | false<br>';
         echo 'Функция возвращает содержимое переменной или false</p>';
         echo '<p>getSessionAll() - выводит список всех переменных сессий</p>';
         echo '<p>getSessionAllFilter($filter,$header) выводит список всех переменных сессий, в имени которых содержится $filter';
         echo 'если $header=false то функция выводит только значения переменных через запятую</p>';         
         echo '<p>getSessionAllFilterReturn($filter,$header=",") возвращает строку со всеми параметрами содержащимися во всех подходящих переменных</p>';
         echo '<p>killSessionFilter($filter) функция удаляет переменные сессии, содержащие фильтр в имени $_SESSION[..filter..]</p>';
         echo '<p></p>';
         echo '<p></p>';
         echo '<p></p>';

    }
}
