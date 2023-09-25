<?php
// Класс содержит базовые методы, которые используются в других классах
// Klasa zawiera metody bazowe używane w innych klasach
// The class contains base methods that are used in other classes

// Класс переделан под интерфейсы и трейты. Данный файл остался для совместимости со старой логикой.
// Klasa została przeprojektowana pod kątem interfejsów i cech. Ten plik pozostawiono dla zgodności ze starą logiką.
// The class has been redesigned for interfaces and traits. This file was left for compatibility with the old logic.
namespace class\redaktor;

// API
//function notFalseAndNULL($data):true/false  If the variable exists, is not equal to false and is not equal to NULL then return true
//function printMas($mas)                     Displays the contents of a variable with a hint of what type it is.
//function clearCode($cod,...$parametr)       the function cleans the code from dangerous tags
//

class instrument implements interface\interface\InterfaceWorkToType, 
                            interface\interface\InterfaceButton, 
                            interface\interface\InterfaceFoUser
{
   use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
   use \class\redaktor\interface\trait\TraitInterfaceButton;
   use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles; 
   use \class\redaktor\interface\trait\TraitInterfaceFoUser;
   use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
   use \class\redaktor\interface\trait\TraitInterfaceDebug;
   use \class\redaktor\interface\trait\TraitInterfaceWorkToMail;
}

// API
// function notFalseAndNULL($data):true/false Если переменная существует, не равна false и не равна NULL то вернуть true
// function printMas($mas)                    Выводит содержимое переменной с подскажкой какого она типа
//function clearCode($cod,...$parametr)       функция очищает код от опасных тегов
