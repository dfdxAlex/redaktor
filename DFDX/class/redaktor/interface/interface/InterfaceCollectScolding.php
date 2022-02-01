<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с системой обработки нецензурной лексики
// interfejs dla funkcji współpracujących z systemem przetwarzania wulgaryzmów
// interface for functions that work with the profanity processing system


interface InterfaceCollectScolding
{
    // функция проверяет в базе данных включён ли блок кнопок сбора слов нецензурной лексики
    // funkcja sprawdza w bazie danych, czy blok przycisków do zbierania nieprzyzwoitych słów jest włączony
    // the function checks in the database whether the block of buttons for collecting obscene words is enabled
    public function sborMatov();
}
