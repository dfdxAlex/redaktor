<?php
namespace Object;

// class deletes entry in json file overwriting it
// parameter CreateTable $ct, needed to use some methods from the CreateTable class
// string parameter $id defines the ID of the entry to be deleted
// класс удаляет запись в файле json перезаписывая его
// параметр CreateTable $ct, нужен для использывания некоторых методов от класса CreateTable
// параметр string $id определяет ID той записи, которую нужно удалить
class KillUser
{
    private $testStrokaJson;
    public function __construct(CreateTable $ct, string $id)
    {
        // convert string to int
        // преобразовать string в int
        $killId=(int)$id;

        // return decoded array from json file
        // вернуть декодированный массив из файла json
        if ($killId>0) {
            $masJson=$ct->getFileJsonMas();

            foreach ($masJson as $key=>$value) {
                if ($value['id']==$killId) {
                    unset($masJson[$key]);
                    break;
                }
            }
        } else return;

        $strokaJson=json_encode($masJson,JSON_PRESERVE_ZERO_FRACTION);

        file_put_contents("dataset\users.json",$strokaJson);

        // the variable is needed for testing and is output via the toString magic method
        // переменна необходима для тестирования и выводится черех магический метод toString
        $this->testStrokaJson=$strokaJson;
    }

    public function __toString()
    {
        // the variable is needed for testing and is output via the toString magic method
        // переменна необходима для тестирования и выводится черех магический метод toString
        return $this->testStrokaJson;
    }
}
