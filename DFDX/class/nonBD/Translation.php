<?php
namespace class\nonBD;

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

            $this->str=='Сохраненные CV' && SelectLanguage::getLenguage()=='ru' => 'Сохраненные CV',
            $this->str=='Сохраненные CV' && SelectLanguage::getLenguage()=='ua' => 'Збережені CV',
            $this->str=='Сохраненные CV' && SelectLanguage::getLenguage()=='pl' => 'Zapisane CV',
            $this->str=='Сохраненные CV' && SelectLanguage::getLenguage()=='en' => 'Saved CVs',

            $this->str=='Выберите CV из списка' && SelectLanguage::getLenguage()=='ru' => 'Выберите CV из списка',
            $this->str=='Выберите CV из списка' && SelectLanguage::getLenguage()=='ua' => 'Виберіть CV зі списку',
            $this->str=='Выберите CV из списка' && SelectLanguage::getLenguage()=='pl' => 'Wybierz CV z listy',
            $this->str=='Выберите CV из списка' && SelectLanguage::getLenguage()=='en' => 'Select a CV from the list',

            $this->str=='Загрузить' && SelectLanguage::getLenguage()=='ru' => 'Загрузить',
            $this->str=='Загрузить' && SelectLanguage::getLenguage()=='ua' => 'Завантажити',
            $this->str=='Загрузить' && SelectLanguage::getLenguage()=='pl' => 'Załaduj',
            $this->str=='Загрузить' && SelectLanguage::getLenguage()=='en' => 'Load',

            $this->str=='Такое имя уже существует, придумайте новое.' && SelectLanguage::getLenguage()=='ru' => 'Такое имя уже существует, придумайте новое.',
            $this->str=='Такое имя уже существует, придумайте новое.' && SelectLanguage::getLenguage()=='ua' => 'Такое ім\'я вже існує, придумайте нове.',
            $this->str=='Такое имя уже существует, придумайте новое.' && SelectLanguage::getLenguage()=='pl' => 'Ta nazwa już istnieje, wymyśl nową.',
            $this->str=='Такое имя уже существует, придумайте новое.' && SelectLanguage::getLenguage()=='en' => 'This name already exists, come up with a new one.',

            $this->str=='Придумайте название для CV и нажмите кнопку Сохранить' && SelectLanguage::getLenguage()=='ru' => 'Придумайте название для CV и нажмите кнопку Сохранить',
            $this->str=='Придумайте название для CV и нажмите кнопку Сохранить' && SelectLanguage::getLenguage()=='ua' => 'Придумайте назву для CV та натисніть кнопку Зберегти',
            $this->str=='Придумайте название для CV и нажмите кнопку Сохранить' && SelectLanguage::getLenguage()=='pl' => 'Nadaj swojemu CV imię i kliknij przycisk Zapisz',
            $this->str=='Придумайте название для CV и нажмите кнопку Сохранить' && SelectLanguage::getLenguage()=='en' => 'Give your CV a name and click the Save button',

            $this->str=='Название' && SelectLanguage::getLenguage()=='ru' => 'Название',
            $this->str=='Название' && SelectLanguage::getLenguage()=='ua' => 'Назва',
            $this->str=='Название' && SelectLanguage::getLenguage()=='pl' => 'Nazwa',
            $this->str=='Название' && SelectLanguage::getLenguage()=='en' => 'Name',

            $this->str=='Название CV' && SelectLanguage::getLenguage()=='ru' => 'Название CV',
            $this->str=='Название CV' && SelectLanguage::getLenguage()=='ua' => 'Назва CV',
            $this->str=='Название CV' && SelectLanguage::getLenguage()=='pl' => 'Tytuł CV',
            $this->str=='Название CV' && SelectLanguage::getLenguage()=='en' => 'Title CV',

            $this->str=='Придумайте название' && SelectLanguage::getLenguage()=='ru' => 'Придумайте название',
            $this->str=='Придумайте название' && SelectLanguage::getLenguage()=='ua' => 'Придумайте назву',
            $this->str=='Придумайте название' && SelectLanguage::getLenguage()=='pl' => 'Wymyśl nazwę',
            $this->str=='Придумайте название' && SelectLanguage::getLenguage()=='en' => 'Come up with a name',

            $this->str=='Граница поля' && SelectLanguage::getLenguage()=='ru' => 'Граница поля',
            $this->str=='Граница поля' && SelectLanguage::getLenguage()=='ua' => 'Кордон поля',
            $this->str=='Граница поля' && SelectLanguage::getLenguage()=='pl' => 'Granica pola',
            $this->str=='Граница поля' && SelectLanguage::getLenguage()=='en' => 'Field boundary',

            $this->str=='Применить' && SelectLanguage::getLenguage()=='ru' => 'Применить',
            $this->str=='Применить' && SelectLanguage::getLenguage()=='ua' => 'Застосувати',
            $this->str=='Применить' && SelectLanguage::getLenguage()=='pl' => 'Stosować',
            $this->str=='Применить' && SelectLanguage::getLenguage()=='en' => 'Apply',

            $this->str=='Определить второй цвет' && SelectLanguage::getLenguage()=='ru' => 'Определить второй цвет',
            $this->str=='Определить второй цвет' && SelectLanguage::getLenguage()=='ua' => 'Визначити другий колір',
            $this->str=='Определить второй цвет' && SelectLanguage::getLenguage()=='pl' => 'Zdefiniuj drugi kolor',
            $this->str=='Определить второй цвет' && SelectLanguage::getLenguage()=='en' => 'Define second color',

            $this->str=='Определить первый цвет' && SelectLanguage::getLenguage()=='ru' => 'Определить первый цвет',
            $this->str=='Определить первый цвет' && SelectLanguage::getLenguage()=='ua' => 'Визначити перший колір',
            $this->str=='Определить первый цвет' && SelectLanguage::getLenguage()=='pl' => 'Określ pierwszy kolor',
            $this->str=='Определить первый цвет' && SelectLanguage::getLenguage()=='en' => 'Determine first color',

            $this->str=='Введите высоту' && SelectLanguage::getLenguage()=='ru' => 'Введите высоту',
            $this->str=='Введите высоту' && SelectLanguage::getLenguage()=='ua' => 'Введіть висоту',
            $this->str=='Введите высоту' && SelectLanguage::getLenguage()=='pl' => 'Wprowadź wysokość',
            $this->str=='Введите высоту' && SelectLanguage::getLenguage()=='en' => 'Enter Height',

            $this->str=='Введите ширину' && SelectLanguage::getLenguage()=='ru' => 'Введите ширину',
            $this->str=='Введите ширину' && SelectLanguage::getLenguage()=='ua' => 'Введіть ширину',
            $this->str=='Введите ширину' && SelectLanguage::getLenguage()=='pl' => 'Wprowadź szerokość',
            $this->str=='Введите ширину' && SelectLanguage::getLenguage()=='en' => 'Enter Width',

            $this->str=='Введите размер поля' && SelectLanguage::getLenguage()=='ru' => 'Введите размер поля',
            $this->str=='Введите размер поля' && SelectLanguage::getLenguage()=='ua' => 'Введіть розмір поля',
            $this->str=='Введите размер поля' && SelectLanguage::getLenguage()=='pl' => 'Wpisz rozmiar pola',
            $this->str=='Введите размер поля' && SelectLanguage::getLenguage()=='en' => 'Enter field size',

            $this->str=='Высота строки' && SelectLanguage::getLenguage()=='ru' => 'Высота строки',
            $this->str=='Высота строки' && SelectLanguage::getLenguage()=='ua' => 'Висота рядка',
            $this->str=='Высота строки' && SelectLanguage::getLenguage()=='pl' => 'Wysokość wiersza',
            $this->str=='Высота строки' && SelectLanguage::getLenguage()=='en' => 'Row height',

            $this->str=='Ввести размер шрифта' && SelectLanguage::getLenguage()=='ru' => 'Ввести размер шрифта',
            $this->str=='Ввести размер шрифта' && SelectLanguage::getLenguage()=='ua' => 'Ввести розмір шрифту',
            $this->str=='Ввести размер шрифта' && SelectLanguage::getLenguage()=='pl' => 'Wprowadź rozmiar czcionki',
            $this->str=='Ввести размер шрифта' && SelectLanguage::getLenguage()=='en' => 'Enter font size',

            $this->str=='Настройки блока списка умений' && SelectLanguage::getLenguage()=='ru' => 'Настройки блока списка умений',
            $this->str=='Настройки блока списка умений' && SelectLanguage::getLenguage()=='ua' => 'Налаштування блоку списку умінь',
            $this->str=='Настройки блока списка умений' && SelectLanguage::getLenguage()=='pl' => 'Ustawienia bloku listy umiejętności',
            $this->str=='Настройки блока списка умений' && SelectLanguage::getLenguage()=='en' => 'Skill list block settings',

            $this->str=='Введите число столбцов' && SelectLanguage::getLenguage()=='ru' => 'Введите число столбцов',
            $this->str=='Введите число столбцов' && SelectLanguage::getLenguage()=='ua' => 'Введіть кількість стовпців',
            $this->str=='Введите число столбцов' && SelectLanguage::getLenguage()=='pl' => 'Podaj liczbę kolumn',
            $this->str=='Введите число столбцов' && SelectLanguage::getLenguage()=='en' => 'Enter number of columns',

            $this->str=='Сохранить' && SelectLanguage::getLenguage()=='ru' => 'Сохранить',
            $this->str=='Сохранить' && SelectLanguage::getLenguage()=='ua' => 'Зберегти',
            $this->str=='Сохранить' && SelectLanguage::getLenguage()=='pl' => 'Zapisz',
            $this->str=='Сохранить' && SelectLanguage::getLenguage()=='en' => 'Save',

            $this->str=='Настройки' && SelectLanguage::getLenguage()=='ru' => 'Настройки',
            $this->str=='Настройки' && SelectLanguage::getLenguage()=='ua' => 'Налаштування',
            $this->str=='Настройки' && SelectLanguage::getLenguage()=='pl' => 'Ustawienie',
            $this->str=='Настройки' && SelectLanguage::getLenguage()=='en' => 'Setting',

            $this->str=='Список навыков' && SelectLanguage::getLenguage()=='ru' => 'Список навыков',
            $this->str=='Список навыков' && SelectLanguage::getLenguage()=='ua' => 'Список навичок',
            $this->str=='Список навыков' && SelectLanguage::getLenguage()=='pl' => 'Lista umiejętności',
            $this->str=='Список навыков' && SelectLanguage::getLenguage()=='en' => 'List of skills',

            $this->str=='Открыть последнее CV' && SelectLanguage::getLenguage()=='ru' => 'Открыть последнее CV',
            $this->str=='Открыть последнее CV' && SelectLanguage::getLenguage()=='ua' => 'Відкрити останнє CV',
            $this->str=='Открыть последнее CV' && SelectLanguage::getLenguage()=='pl' => 'Otwórz najnowsze CV',
            $this->str=='Открыть последнее CV' && SelectLanguage::getLenguage()=='en' => 'Open latest CV',

            $this->str=='Создать CV' && SelectLanguage::getLenguage()=='ru' => 'Создать CV',
            $this->str=='Создать CV' && SelectLanguage::getLenguage()=='ua' => 'Створити CV',
            $this->str=='Создать CV' && SelectLanguage::getLenguage()=='pl' => 'Utwórz CV',
            $this->str=='Создать CV' && SelectLanguage::getLenguage()=='en' => 'Create CV',

            $this->str=='Отправить на печать' && SelectLanguage::getLenguage()=='ru' => 'Отправить на печать',
            $this->str=='Отправить на печать' && SelectLanguage::getLenguage()=='ua' => 'Надіслати на друк',
            $this->str=='Отправить на печать' && SelectLanguage::getLenguage()=='pl' => 'Wyślij do druku',
            $this->str=='Отправить на печать' && SelectLanguage::getLenguage()=='en' => 'Send to print',

            $this->str=='Сервис создан на базе CMS DFDX' && SelectLanguage::getLenguage()=='ru' => 'Сервис создан на базе CMS DFDX',
            $this->str=='Сервис создан на базе CMS DFDX' && SelectLanguage::getLenguage()=='ua' => 'Сервіс створений на базі CMS DFDX',
            $this->str=='Сервис создан на базе CMS DFDX' && SelectLanguage::getLenguage()=='pl' => 'Serwis stworzony w oparciu o CMS DFDX',
            $this->str=='Сервис создан на базе CMS DFDX' && SelectLanguage::getLenguage()=='en' => 'Service created on the basis of CMS DFDX',

            $this->str=='Сертификаты' && SelectLanguage::getLenguage()=='ru' => 'Сертификаты',
            $this->str=='Сертификаты' && SelectLanguage::getLenguage()=='ua' => 'Сертифікати',
            $this->str=='Сертификаты' && SelectLanguage::getLenguage()=='pl' => 'Certyfikaty',
            $this->str=='Сертификаты' && SelectLanguage::getLenguage()=='en' => 'Certificates',

            $this->str=='Знания языков' && SelectLanguage::getLenguage()=='ru' => 'Знания языков',
            $this->str=='Знания языков' && SelectLanguage::getLenguage()=='ua' => 'Знання мов',
            $this->str=='Знания языков' && SelectLanguage::getLenguage()=='pl' => 'Znajomość języków',
            $this->str=='Знания языков' && SelectLanguage::getLenguage()=='en' => 'Knowledge of languages',

            $this->str=='Образование' && SelectLanguage::getLenguage()=='ru' => 'Образование',
            $this->str=='Образование' && SelectLanguage::getLenguage()=='ua' => 'Освіта',
            $this->str=='Образование' && SelectLanguage::getLenguage()=='pl' => 'Edukacja',
            $this->str=='Образование' && SelectLanguage::getLenguage()=='en' => 'Education',

            $this->str=='Опыт' && SelectLanguage::getLenguage()=='ru' => 'Опыт',
            $this->str=='Опыт' && SelectLanguage::getLenguage()=='ua' => 'Досвід',
            $this->str=='Опыт' && SelectLanguage::getLenguage()=='pl' => 'Doświadczenie',
            $this->str=='Опыт' && SelectLanguage::getLenguage()=='en' => 'Experience',

            $this->str=='Основные навыки' && SelectLanguage::getLenguage()=='ru' => 'Основные навыки',
            $this->str=='Основные навыки' && SelectLanguage::getLenguage()=='ua' => 'Основні навички',
            $this->str=='Основные навыки' && SelectLanguage::getLenguage()=='pl' => 'Umiejętności podstawowe',
            $this->str=='Основные навыки' && SelectLanguage::getLenguage()=='en' => 'Core Skills',

            $this->str=='Резюме' && SelectLanguage::getLenguage()=='ru' => 'Резюме',
            $this->str=='Резюме' && SelectLanguage::getLenguage()=='ua' => 'Резюме',
            $this->str=='Резюме' && SelectLanguage::getLenguage()=='pl' => 'Streszczenie',
            $this->str=='Резюме' && SelectLanguage::getLenguage()=='en' => 'Summary',
            
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
            $this->str=='Назад' && SelectLanguage::getLenguage()=='pl' => 'Zwrócić',
            $this->str=='Назад' && SelectLanguage::getLenguage()=='en' => 'Back',

            $this->str=='На главную' && SelectLanguage::getLenguage()=='ru' => 'На главную',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='ua' => 'На головну',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='pl' => 'Do głównej',
            $this->str=='На главную' && SelectLanguage::getLenguage()=='en' => 'To main',

            default => 'Неизвестное слово'
        };
    }
}
