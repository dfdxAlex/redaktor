<?php
namespace ValueObject;

// The class returns the ID number of the button that was clicked
// if there are no pressed buttons, then returns an empty character
// Класс возвращает номер ID кнопки, которая была нажата
// если нет нажатых кнопок, то возвращает пустой символ

class NomerButton
{
    public function __construct()
    {
    }

    public function __toString()
    {
        if (!isset($_POST)) return '';
        if (isset($_POST)) {
            foreach ($_POST as $key=>$value) {
                if (!is_null($rez=preg_replace('/remove\_/','',$key))) {
                    return (string)$rez;
                }
            }
        }
        return '';
    }
}
