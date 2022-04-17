<?php
namespace ValueObject;

// object returns the first free ID number
// объект возвращает первый свободный ID номер
class ToId
{
    private $id;

    public function __construct(\Object\CreateTable $ct)
    {
        // get array from CreateTable object
        // получить массив из объекта CreateTable
        $masJson=$ct->getFileJsonMas();

        $this->id=0;
        // Find the largest ID
        // Найти самый большой ID
        foreach ($masJson as $value) {
            if ($value['id']>$this->id) $this->id=$value['id'];
        }
        //increment ID by one
        //увеличить ID на единицу
        $this->id++;
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function idInteger()
    {
        return $this->id;
    }
}
