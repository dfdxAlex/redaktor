<?php
namespace classCV;

// класс подставляет соответствующую надпись на вывод
// надпись зависит от выбранного языка
class Translation
{
    public function __construct($str)
    {
         $this->str=$str;
    }
    public function __toString()
    {
        return match (true) {
            $this->str=='Вперед' && SelectLanguage::getLenguage()=='ru' => 'Вперед',
            $this->str=='Вперед' && SelectLanguage::getLenguage()=='ua' => 'Вперед',
            $this->str=='Вперед' && SelectLanguage::getLenguage()=='pl' => 'Do przodu',
            $this->str=='Вперед' && SelectLanguage::getLenguage()=='en' => 'Next',

            $this->str=='Назад' && SelectLanguage::getLenguage()=='ru' => 'Назад',
            $this->str=='Назад' && SelectLanguage::getLenguage()=='ua' => 'Назад',
            $this->str=='Назад' && SelectLanguage::getLenguage()=='pl' => 'Z powrotem',
            $this->str=='Назад' && SelectLanguage::getLenguage()=='en' => 'Back',

            $this->str=='На главную' && SelectLanguage::getLenguage()=='ru' => 'На главную',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='ua' => 'На головну',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='pl' => 'Do głównej',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='en' => 'To main',

            default => 'Неизвестное слово'
        };
    }
}
