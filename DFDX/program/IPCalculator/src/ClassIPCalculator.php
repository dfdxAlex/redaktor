<?php
namespace program\IPCalculator\src;

class ClassIPCalculator
{

    public function __construct()
    {
        // создаем объект для проверки наличия всех необходимых переменных сессий
        // utwórz obiekt, aby sprawdzić obecność wszystkich niezbędnych zmiennych sesji
        // create an object to check if all necessary session variables are present
        $controlSession = new ValueObject\ControlSession();
        // функция анализирует массив POST и если необходимо модифицирует переменные сессий
        // funkcja analizuje tablicę POST i w razie potrzeby modyfikuje zmienne sesji
        // the function parses the POST array and modifies session variables if necessary
        $controlSession->varSet();
    }

    public function businesIPCalculator()
    {
        $interface = new clas\ClassInterfaceIPCalculator();
        // Функция прорисовывает интерфейс для пользователя при работе с фиксированными классами сетей.
        // Там же происходит вся бизнес логика
        // Funkcja rysuje interfejs dla użytkownika podczas pracy ze stałymi klasami sieciowymi.
        // Tam dzieje się cała logika biznesowa
        // The function draws an interface for the user when working with fixed network classes.
        // All business logic happens there
        $interface->interfaceIPCalculatorGroups();
        // Функция прорисовывает интерфейс для пользователя при работе CIDR сетями.
        // Там же происходит вся бизнес логика
        // Funkcja rysuje interfejs dla użytkownika podczas pracy z sieciami CIDR.
        // Tam dzieje się cała logika biznesowa
        // The function draws an interface for the user when working with CIDR networks.
        // All business logic happens there
        $interface->interfaceIPCalculatorCIDR();
    }
}
