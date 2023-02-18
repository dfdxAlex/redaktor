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

    // работа с тестированием функции preg_replace()
    // praca z testowaniem funkcji preg_replace()
    // work with testing the function preg_replace()
    public function pregReplace();

    // работа с тестированием функции preg_split()
    // praca z testowaniem funkcji preg_split()
    // work with testing the function preg_split()
    public function pregSplit();

    // работа с тестированием функции preg_match_all()
    // praca z testowaniem funkcji preg_match_all()
    // work with testing the function preg_match_all()
    public function pregMatchAll();

    // работа с тестированием функции preg_match()
    // praca z testowaniem funkcji preg_match()
    // work with testing the function preg_match()
    public function pregMatch();

    // работа с тестированием функции preg_grep()
    // praca z testowaniem funkcji preg_grep()
    // work with testing the function preg_grep()
    public function pregGrep(); 

    // работа с тестированием функции preg_filter()
    // praca z testowaniem funkcji preg_filter()
    // work with testing the function preg_filter()
    public function pregFilter(); 

    // работа с тестированием функции preg_quote()
    // praca z testowaniem funkcji preg_quote()
    // work with testing the function preg_quote()
    public function pregQuote(); 
}
