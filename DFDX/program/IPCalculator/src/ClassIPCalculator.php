<?php
namespace program\IPCalculator\src;

class ClassIPCalculator
{

    public function __construct()
    {
        // создаем объект для проверки наличия всех необходимых переменных сессий
        $controlSession = new ValueObject\ControlSession();
        // функция анализирует массив POST и если необходимо модифицирует переменные сессий
        $controlSession->varSet();
    }

    public function businesIPCalculator()
    {
        $interface = new class\ClassInterfaceIPCalculator();
        $interface->interfaceIPCalculatorGroups();
        $interface->interfaceIPCalculatorCIDR();


    }
}
