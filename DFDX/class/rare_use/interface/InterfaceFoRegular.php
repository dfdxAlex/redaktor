<?php
namespace class\rare_use\interface;

//интерфейс функций, работающих со страницей тестирования функций регулярных выражений
//interfejs funkcji współpracujących ze stroną do testowania funkcji wyrażeń regularnych
//interface of functions that work with the page for testing regular expression functions

interface InterfaceFoRegular extends \class\redaktor\interface\interface\InterfaceButton
{
    //Функция рисует форму выбора нужной функции. Комуникация производится через массив POST
    //Funkcja rysuje formularz wyboru żądanej funkcji. Komunikacja odbywa się za pośrednictwem tablicy POST
    //Function draws the form for selecting the desired function. Communication is done through the POST array
    public function featureSelectionForm();

    // работа с тестированием функции preg_replace_callback_array()
    // praca z testowaniem funkcji preg_replace_callback_array()
    // work with testing the function preg_replace_callback_array()
    public function pregReplaceCallbackArray();

    // работа с тестированием функции preg_replace_callback()
    // praca z testowaniem funkcji preg_replace_callback()
    // work with testing the function preg_replace_callback()
    public function pregReplaceCallback();
}
