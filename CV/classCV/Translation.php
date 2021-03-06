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
            
            $this->str=='Сертификаты, допуски, разрешения' && SelectLanguage::getLenguage()=='ru' => 'Сертификаты, допуски, разрешения',
            $this->str=='Сертификаты, допуски, разрешения' && SelectLanguage::getLenguage()=='ua' => 'Сертифікати, допуски, дозволи',
            $this->str=='Сертификаты, допуски, разрешения' && SelectLanguage::getLenguage()=='pl' => 'Certyfikaty, atesty, zezwolenia',
            $this->str=='Сертификаты, допуски, разрешения' && SelectLanguage::getLenguage()=='en' => 'Certificates, approvals, permits',

            $this->str=='Скачать CV' && SelectLanguage::getLenguage()=='ru' => 'Скачать CV',
            $this->str=='Скачать CV' && SelectLanguage::getLenguage()=='ua' => 'Завантажити CV',
            $this->str=='Скачать CV' && SelectLanguage::getLenguage()=='pl' => 'Pobierz CV',
            $this->str=='Скачать CV' && SelectLanguage::getLenguage()=='en' => 'Download CV',

            $this->str=='Читаю, пишу и разговариваю' && SelectLanguage::getLenguage()=='ru' => 'Читаю, пишу и разговариваю',
            $this->str=='Читаю, пишу и разговариваю' && SelectLanguage::getLenguage()=='ua' => 'Читаю, пишу та розмовляю',
            $this->str=='Читаю, пишу и разговариваю' && SelectLanguage::getLenguage()=='pl' => 'Czytanie, pisanie i mówienie',
            $this->str=='Читаю, пишу и разговариваю' && SelectLanguage::getLenguage()=='en' => 'Reading, writing and speaking',

            $this->str=='Могу читать и разговаривать' && SelectLanguage::getLenguage()=='ru' => 'Могу читать и разговаривать',
            $this->str=='Могу читать и разговаривать' && SelectLanguage::getLenguage()=='ua' => 'Можу читати та розмовляти',
            $this->str=='Могу читать и разговаривать' && SelectLanguage::getLenguage()=='pl' => 'Umiem czytać i mówić',
            $this->str=='Могу читать и разговаривать' && SelectLanguage::getLenguage()=='en' => 'I can read and speak',

            $this->str=='Читаю документацию с переводчиком' && SelectLanguage::getLenguage()=='ru' => 'Читаю документацию с переводчиком',
            $this->str=='Читаю документацию с переводчиком' && SelectLanguage::getLenguage()=='ua' => 'Читаю документацію з перекладачем',
            $this->str=='Читаю документацию с переводчиком' && SelectLanguage::getLenguage()=='pl' => 'Czytanie dokumentacji z tłumaczem',
            $this->str=='Читаю документацию с переводчиком' && SelectLanguage::getLenguage()=='en' => 'Reading documentation with a translator',

            $this->str=='Свободное владение языком' && SelectLanguage::getLenguage()=='ru' => 'Свободное владение языком',
            $this->str=='Свободное владение языком' && SelectLanguage::getLenguage()=='ua' => 'Вільне володіння мовою',
            $this->str=='Свободное владение языком' && SelectLanguage::getLenguage()=='pl' => 'Biegła znajomość języka',
            $this->str=='Свободное владение языком' && SelectLanguage::getLenguage()=='en' => 'Fluency in the language',

            $this->str=='Родной' && SelectLanguage::getLenguage()=='ru' => 'Родной',
            $this->str=='Родной' && SelectLanguage::getLenguage()=='ua' => 'Рідний',
            $this->str=='Родной' && SelectLanguage::getLenguage()=='pl' => 'Rodzinny',
            $this->str=='Родной' && SelectLanguage::getLenguage()=='en' => 'Native',

            $this->str=='Уровень владения языком' && SelectLanguage::getLenguage()=='ru' => 'Уровень владения языком',
            $this->str=='Уровень владения языком' && SelectLanguage::getLenguage()=='ua' => 'Рівень володіння мовою',
            $this->str=='Уровень владения языком' && SelectLanguage::getLenguage()=='pl' => 'Znajomość języka',
            $this->str=='Уровень владения языком' && SelectLanguage::getLenguage()=='en' => 'Language Proficiency',

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
            $this->str=='Почта' && SelectLanguage::getLenguage()=='en' => 'Email',

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
