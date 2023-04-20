<?php

include_once "autoload.php";


    abstract class ITaxi {


        // Принимает номер заказа
        protected $nomer;
        
        // Следующий элемент в цепочке обязанностей
        protected $next;

        // Принимает номер заказа
        public function __construct($nomer=111) {
            $this->nomer = $nomer;
        }

        // Принимает ссылку на объект типа Logger
        public function setNext(ITaxi $log) {
            $this->next = $log;
            return $log;
        }


        public function message() {
            // если выполнилось условие, то вывести сообщение
            if ($this->status()) {
                // return ;
            } 

            // если есть следующий объект в цепочке, то запустить его метор message()
            // рекурсивно.
            if ($this->next != null) {
                $this->next->message();
            }
        }
        protected abstract function status();
    }

class Run 
{
    public function run()
    {
        $obj = new Taxi1();
        
        $obj1 = $obj->setNext(new Taxi2());
        $obj2 = $obj1->setNext(new Taxi3());
        $obj3 = $obj2->setNext(new Taxi4());
        $obj4 = $obj3->setNext(new Taxi5());
        $obj5 = $obj4->setNext(new Taxi6());

        $obj->message();
       
    }
}

$obj = new Run;
$obj->run();

    class Taxi1 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 1. Принимаю заказ №$this->nomer<br>";
                return true;
            } else {
                echo "Taxi 1. Занят<br>";
                return false;
            }
        }
    }

    class Taxi2 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 2. Принимаю заказ №$this->nomer<br>";
                return true;
            } else {
                echo "Taxi 2. Занят<br>";
                return false;
            }
        }
    }

    class Taxi3 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 3. Принимаю заказ №$this->nomer <br>";
                return true;
            } else {
                echo "Taxi 3. Занят<br>";
                return false;
            }
        }
    }

    class Taxi4 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 4. Принимаю заказ №$this->nomer <br>";
                return true;
            } else {
                echo "Taxi 4. Занят<br>";
                return false;
            }
        }
    }

    class Taxi5 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 5. Принимаю заказ №$this->nomer <br>";
                return true;
            } else {
                echo "Taxi 5. Занят<br>";
                return false;
            }
        }
    }

    class Taxi6 extends ITaxi {

        protected function status() {
            if (rand(1,2) == 2) {
                echo "Taxi 6. Принимаю заказ №$this->nomer <br>";
                return true;
            } else {
                echo "Taxi 6. Занят<br>";
                return false;
            }
        }
    }







