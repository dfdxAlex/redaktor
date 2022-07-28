<?php
namespace classCV;

// класс подставляет соответствующую надпись на вывод
// надпись зависит от выбранного языка
class Translation
{
    public function __construct($str='')
    {
         $this->str=$str;
    }
    public function __toString()
    {
        return match (true) {


            $this->str=='Отправить' && SelectLanguage::getLenguage()=='ru' => 'Отправить',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='ua' => 'Відправити',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='pl' => 'Wysłać',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='en' => 'Send',

            $this->str=='Имя' && SelectLanguage::getLenguage()=='ru' => 'Имя',
            $this->str=='Имя' && SelectLanguage::getLenguage()=='ua' => 'Ім\'я',
            $this->str=='Имя' && SelectLanguage::getLenguage()=='pl' => 'Imię',
            $this->str=='Имя' && SelectLanguage::getLenguage()=='en' => 'Name',

            $this->str=='Фамилия' && SelectLanguage::getLenguage()=='ru' => 'Фамилия',
            $this->str=='Фамилия' && SelectLanguage::getLenguage()=='ua' => 'Прізвище',
            $this->str=='Фамилия' && SelectLanguage::getLenguage()=='pl' => 'Nazwisko',
            $this->str=='Фамилия' && SelectLanguage::getLenguage()=='en' => 'Surname',

            $this->str=='Введите имя и фамилию' && SelectLanguage::getLenguage()=='ru' => 'Введите имя и фамилию',
            $this->str=='Введите имя и фамилию' && SelectLanguage::getLenguage()=='ua' => 'Введіть iм\'я та прізвище',
            $this->str=='Введите имя и фамилию' && SelectLanguage::getLenguage()=='pl' => 'Wpisz imię i nazwisko',
            $this->str=='Введите имя и фамилию' && SelectLanguage::getLenguage()=='en' => 'Enter first and last name',

            $this->str=='Выбран шаблон' && SelectLanguage::getLenguage()=='ru' => 'Выбран шаблон',
            $this->str=='Выбран шаблон' && SelectLanguage::getLenguage()=='ua' => 'Вибрано шаблон',
            $this->str=='Выбран шаблон' && SelectLanguage::getLenguage()=='pl' => 'Wybrano szablon',
            $this->str=='Выбран шаблон' && SelectLanguage::getLenguage()=='en' => 'Template selected',

            $this->str=='Выберите шаблон' && SelectLanguage::getLenguage()=='ru' => 'Выберите шаблон',
            $this->str=='Выберите шаблон' && SelectLanguage::getLenguage()=='ua' => 'Виберіть шаблон',
            $this->str=='Выберите шаблон' && SelectLanguage::getLenguage()=='pl' => 'Wybierz szablon',
            $this->str=='Выберите шаблон' && SelectLanguage::getLenguage()=='en' => 'Choose a template',

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
