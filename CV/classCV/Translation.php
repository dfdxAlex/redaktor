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

            $this->str=='Опишите своё образование' && SelectLanguage::getLenguage()=='ru' => 'Опишите своё образование',
            $this->str=='Опишите своё образование' && SelectLanguage::getLenguage()=='ua' => 'Опишіть свою освіту',
            $this->str=='Опишите своё образование' && SelectLanguage::getLenguage()=='pl' => 'Opisz swoje wykształcenie',
            $this->str=='Опишите своё образование' && SelectLanguage::getLenguage()=='en' => 'Describe your education',

            $this->str=='Опишите свой опыт' && SelectLanguage::getLenguage()=='ru' => 'Опишите свой опыт',
            $this->str=='Опишите свой опыт' && SelectLanguage::getLenguage()=='ua' => 'Опишіть свій досвід',
            $this->str=='Опишите свой опыт' && SelectLanguage::getLenguage()=='pl' => 'Opisz swoje doświadczenie',
            $this->str=='Опишите свой опыт' && SelectLanguage::getLenguage()=='en' => 'Describe your experience',

            $this->str=='Опишите свои умения' && SelectLanguage::getLenguage()=='ru' => 'Опишите свои умения',
            $this->str=='Опишите свои умения' && SelectLanguage::getLenguage()=='ua' => 'Опишіть свої вміння',
            $this->str=='Опишите свои умения' && SelectLanguage::getLenguage()=='pl' => 'Opisz swoje umiejętności',
            $this->str=='Опишите свои умения' && SelectLanguage::getLenguage()=='en' => 'Describe your skills',

            $this->str=='Почта' && SelectLanguage::getLenguage()=='ru' => 'Почта',
            $this->str=='Почта' && SelectLanguage::getLenguage()=='ua' => 'Пошта',
            $this->str=='Почта' && SelectLanguage::getLenguage()=='pl' => 'Poczta',
            $this->str=='Почта' && SelectLanguage::getLenguage()=='en' => 'Mail',

            $this->str=='Телефон' && SelectLanguage::getLenguage()=='ru' => 'Телефон',
            $this->str=='Телефон' && SelectLanguage::getLenguage()=='ua' => 'Телефон',
            $this->str=='Телефон' && SelectLanguage::getLenguage()=='pl' => 'Telefon',
            $this->str=='Телефон' && SelectLanguage::getLenguage()=='en' => 'Telephone',

            $this->str=='Адрес' && SelectLanguage::getLenguage()=='ru' => 'Адрес',
            $this->str=='Адрес' && SelectLanguage::getLenguage()=='ua' => 'Адреса',
            $this->str=='Адрес' && SelectLanguage::getLenguage()=='pl' => 'Adres',
            $this->str=='Адрес' && SelectLanguage::getLenguage()=='en' => 'Address',

            $this->str=='Ссылка на картинку' && SelectLanguage::getLenguage()=='ru' => 'Ссылка на картинку:',
            $this->str=='Ссылка на картинку' && SelectLanguage::getLenguage()=='ua' => 'Посилання на картинку:',
            $this->str=='Ссылка на картинку' && SelectLanguage::getLenguage()=='pl' => 'Link do zdjęcia:',
            $this->str=='Ссылка на картинку' && SelectLanguage::getLenguage()=='en' => 'Link to picture:',

            $this->str=='Выбрать' && SelectLanguage::getLenguage()=='ru' => 'Выбрать',
            $this->str=='Выбрать' && SelectLanguage::getLenguage()=='ua' => 'Вибрати',
            $this->str=='Выбрать' && SelectLanguage::getLenguage()=='pl' => 'Wybierac',
            $this->str=='Выбрать' && SelectLanguage::getLenguage()=='en' => 'Choose',

            $this->str=='Выбрать фотографию' && SelectLanguage::getLenguage()=='ru' => 'Выбрать фотографию',
            $this->str=='Выбрать фотографию' && SelectLanguage::getLenguage()=='ua' => 'Вибрати фотографію',
            $this->str=='Выбрать фотографию' && SelectLanguage::getLenguage()=='pl' => 'Wybierz zdjęcie',
            $this->str=='Выбрать фотографию' && SelectLanguage::getLenguage()=='en' => 'Choose photo',

            $this->str=='Отправить' && SelectLanguage::getLenguage()=='ru' => 'Отправить',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='ua' => 'Відправити',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='pl' => 'Wysłać',
            $this->str=='Отправить' && SelectLanguage::getLenguage()=='en' => 'Send',

            $this->str=='Очистить' && SelectLanguage::getLenguage()=='ru' => 'Очистить',
            $this->str=='Очистить' && SelectLanguage::getLenguage()=='ua' => 'Очистити',
            $this->str=='Очистить' && SelectLanguage::getLenguage()=='pl' => 'Сzysta',
            $this->str=='Очистить' && SelectLanguage::getLenguage()=='en' => 'Clear',

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
