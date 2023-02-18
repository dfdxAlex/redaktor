<?php
// Класс содержит базовые методы, которые используются в других классах
// Klasa zawiera metody bazowe używane w innych klasach
// The class contains base methods that are used in other classes

// Класс переделан под интерфейсы и трейты. Данный файл остался для совместимости со старой логикой.
// Klasa została przeprojektowana pod kątem interfejsów i cech. Ten plik pozostawiono dla zgodności ze starą logiką.
// The class has been redesigned for interfaces and traits. This file was left for compatibility with the old logic.
namespace class\nonBD;



// API
//function notFalseAndNULL($data):true/false  If the variable exists, is not equal to false and is not equal to NULL then return true
//function printMas($mas)                     Displays the contents of a variable with a hint of what type it is.
//function clearCode($cod,...$parametr)       the function cleans the code from dangerous tags
//

class WorkToType implements \class\redaktor\interface\interface\InterfaceWorkToType
{
    public function __construct()
    {
    }  

   use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
}




// API
// function notFalseAndNULL($data):true/false Если переменная существует, не равна false и не равна NULL то вернуть true
// function printMas($mas)                    Выводит содержимое переменной с подскажкой какого она типа
//function clearCode($cod,...$parametr)       функция очищает код от опасных тегов
