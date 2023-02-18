<?php
namespace class\rare_use\interface;

//интерфейс функций, работающих с микростандартом Versitcard или vCard
//interfejs funkcji współpracujących z microstandard Versitcard lub vCard
//interface of functions that work with microstandard Versitcard or vCard

interface InterfaceFoVersitcard extends \class\redaktor\interface\interface\InterfaceWorkToMenu,
                                        \class\redaktor\interface\interface\InterfaceWorkToMail
{
    // функция выводит интерфейс, для заполнения данных для визитки
    public function interfaceDataCard();
}
