<?php
namespace class\redaktor\interface\interface;

interface InterfaceWorkToType
{
    // функция возвращает труе, если входящее значение не равно Фальс и не равно NULL и существует
    // function returns true if input value is neither False nor NULL and exists
    public function notFalseAndNULL($data):bool;

    // функция выводит на экран массив неизвестного уровня - главная задача
    // функция выводит тип переменной и её значение если это не массив
    // функция просматривает до 9-ти мерные массивы включительно
    // the function displays an array of an unknown level - the main task
    // the function prints the type of the variable and its value if it is not an array
    // the function looks up to 9-dimensional arrays inclusive
    public function printMas($mas);

    // функция возвращает текстовое значение переданного параметра булеан или нулл или false, 
    // если параметр не соответствует этим типам
    // the function returns the text value of the passed parameter boolean or null or false,
    // if the parameter does not match these types
    public function trueFalseNull($param);
}
