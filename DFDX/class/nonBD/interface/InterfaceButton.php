<?php
namespace class\nonBD\interface;

//интерфейс функций, работающих с кнопками
//Interfejs funkcji przycisków
//button functions interface

// Есть аналог данного интерфейса, который наследует работу с БД.
// Если необходимо работать без использования базы данных, то следует использовать этот файл из этого пространства имен
// There is an analogue of this interface, which inherits the work with the database.
// If you need to work without using a database, then you should use this file from this namespace

interface InterfaceButton
{
   //Функция ловит нажатую кнопку по её имени, части имени или названию перебирая массив POST
   //Funkcja przechwytuje wciśnięty przycisk według jego nazwy, części nazwy lub nazwy, przeglądając tablicę POST
   //The function catches the pressed button by its name, part of the name or name by looping through the array POST
   public function hanterButton(...$parametr);

   // функция рисует кнопку с использованием параметров префикса и переменной. Работает с функцией buttonHanter()
   // funkcja rysuje przycisk za pomocą prefiksu i zmiennych parametrów. Działa z funkcją buttonHanter()
   // function draws a button using prefix and variable parameters. Works with function buttonHanter()
   public function buttonPrefix(...$parametr);

   // Функция выводит некое сообщение $mesaz, задает название кнопок, которым будет присвоено OK или Cansel 
   // $mesaz - сообщение, $nameKn - имя кнопки, отправляемой в массив $_POST, 
   // $classDiv - дополнительный класс для общего контейнера
   // $classP - класс тегов Р - сообщения, $classButton - класс для кнопок
   //
   // Funkcja wyświetla komunikat $mesaz, ustawia nazwę przycisków, które zostaną przypisane OK lub Cansel
   // $mesaz - wiadomość, $nameKn - nazwa przycisku wysyłanego do tablicy $_POST,
   // $classDiv - dodatkowa klasa dla kontenera ogólnego
   // $classP - klasa tagów P - wiadomości, $classButton - klasa przycisków
   //
   // The function displays some message $mesaz, sets the name of the buttons that will be assigned OK or Cansel
   // $mesaz - message, $nameKn - name of the button sent to the $_POST array,
   // $classDiv - additional class for the general container
   // $classP - tag class P - messages, $classButton - class for buttons//
   public function okCansel($mesaz,$nameKn,$classDiv,$classP,$classButton);

   // выводит поле checkbox с кнопкой Ок
   // wyświetla pole wyboru z przyciskiem OK
   // displays a checkbox field with an OK button
   public function okSelect($mesaz,$nameKn,$classDiv,$classP,$classButton);

   // Набор текстовое поле + кнопки Ok Cansel
   // Ustaw pole tekstowe + przyciski OK Anuluj
   // Set textbox + Ok Cancel buttons
   public function poleInputokCansel($mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput);

   // Набор текстовое поле + кнопки Ok Cansel + указывает на страницу обработчик
   // Ustaw pole tekstowe + przycisk Ok Cansel + wskaż obsługę strony
   // Set textbox + Ok Cansel button + point to page handler
   public function poleInputokCanselPlusNameStr($nameStr,$mesaz,$nameKn,$classDiv,$classP,$classButton,$classInput);

   // Функция ставит блок кнопок и текстовых полей без использования базы данных.
   //$nameBlock - имя блока кнопок 
   //$actionN - ссылка на страницу обработки
   //...$parametr дальше пошел список параметров
   // первым в параметре идёт тип кнопки или название тега:
   // Если br то после этого тега можно указать число данных тегов <br>, если не указать, то будет 1 тег
   // Если text, то будет текстовое поле, следующим параметром должно идти имя name=.. за ним текст по умолчанию для value 
   // class="$nameBlock+name+номер кнопки" , по умолчанию value будет пустая строка
   // Если text2, то будет текстовое поле, следующим параметром должно идти имя name=.. за ним текст по умолчанию для placeholder 
   // class="$nameBlock+name+номер кнопки", по умолчанию placeholder будет пустая строка
   // Если textarea то создаем текстовое поле как text, только большое
   // Если password, то будет текстовое поле для ввода пароля, следующим параметром должно идти имя name=.. 
   // class="$nameBlock+name+номер кнопки" , по умолчанию value будет пустая строка
   // Если password2, то будет текстовое поле для ввода пароля, следующим параметром должно идти имя name=.. за ним текст по умолчанию для placeholder 
   // class="$nameBlock+name+номер кнопки", по умолчанию placeholder будет пустая строка
   // Если reset то будет кнопка очистки текстовых полей. После него следует ввести надпись на кнопке, если параметр пропустить, то на кнопке будет надпись Reset
   // class="$nameBlock+reset+номер кнопки"
   
   // если есть параметр на входе в любом месте 'btn_start', то будет добавлен btn в начало класса для кнопки
   // отдельно в любом месте можно добавить стиль для кнопки из классов Bootstrap, на пример 'btn-info'
   // если есть параметр на входе в любом месте не будет 'btn_start', то будет добавлен btn в конец класса для кнопки
   // Если submit или submit2  то рисуется кнопка, после 3 параметра, имя кнопки, надпись на ней и Третий параметр может быть ссылка на другую страницу обработки формы.
   // class="$nameBlock+name+номер кнопки", надпись на кнопке по умолчанию Ок
   // Если submit3 то рисуется кнопка, после 3 параметра, имя кнопки, надпись на ней и Третий параметр может быть ссылка на другую страницу обработки формы.
   // class кнопки задается 4-м параметром, надпись на кнопке по умолчанию Ок
   // Добавлен Div со своим классом для кнопки. Класс Дива равен классу кнопки + Div

   // Если P или h1-h6, то создаем заголовок. Текст - это следующий параметр, класс - это второй параметр.
   // Добавлен див, класс Дива равен классу заголовка+PH

   // Если span то создаем строчный тег внутри дивов. Текст - это следующий параметр, класс - это второй параметр.
   // Добавлен див, класс Дива равен классу заголовка+PH
   // <span class="class">Текст</span>

   // Признаки form_not_open form_not_close не обязательны и управляют отсутствием открывающего тега form и закрывающего тега form соответственно.
   // Признак zero_style, если задать этот признак, то элементы будут без  бутстрапа
   // Стили
   // Класс общего Дива равен имени блока. <div class="$nameBlock">
   // Класс внутриформенного блока <div class="$nameBlock-div">
   // бутстрап
   // bootstrap-start - добавляет section, row, col-12
   // bootstrap-f-start - добавляет /col-12 /row row, col-12
   // bootstrap-finish - добавляет /col-12 /row /section
   //
   // Funkcja umieszcza blok przycisków i pól tekstowych bez korzystania z bazy danych.
   //$nameBlock - nazwa bloku przycisku
   //$actionN - link do strony przetwarzania
   //...$parametr lista parametrów poszła dalej
   // pierwszy parametr to typ przycisku lub nazwa tagu:
   // Jeśli br, to po tym tagu możesz określić liczbę tych tagów <br>, jeśli nie określono, będzie 1 tag
   // Jeśli tekst, będzie to pole tekstowe, następnym parametrem powinna być nazwa name=.. poprzedzona domyślnym tekstem wartości
   // class="$nameBlock+nazwa+numer przycisku" , domyślną wartością będzie pusty ciąg
   // Jeśli text2, będzie to pole tekstowe, następnym parametrem powinna być nazwa=.., po której następuje domyślny tekst symbolu zastępczego
   // class="$nameBlock+nazwa+numer przycisku", domyślnie symbol zastępczy będzie pustym ciągiem
   // Jeśli pole tekstowe to utwórz pole tekstowe, takie jak tekst, tylko duże
   // Jeśli hasło, to pojawi się pole tekstowe do wpisania hasła, kolejnym parametrem powinna być nazwa name=.. poprzedzona domyślnym tekstem wartości
   // class="$nameBlock+nazwa+numer przycisku" , domyślną wartością będzie pusty ciąg
   // Jeśli hasło2, to pojawi się pole tekstowe do wpisania hasła, następnym parametrem powinna być nazwa=.. a następnie domyślny tekst dla symbolu zastępczego
   // class="$nameBlock+nazwa+numer przycisku", domyślnie symbol zastępczy będzie pustym ciągiem
   // Jeśli zresetujesz, pojawi się przycisk do czyszczenia pól tekstowych. Po tym należy wpisać napis na przycisku, jeśli pominiesz parametr to na przycisku będzie napis Reset
   // class="$nameBlock+reset+numer przycisku"
   // Jeśli submit, to przycisk jest rysowany, po 3 parametrach nazwa przycisku, napis na nim i Trzeci parametr może być linkiem do innej strony przetwarzania formularza.
   // class="$nameBlock+nazwa+numer przycisku", domyślny opis przycisku Ok
   // Jeśli submit2 to przycisk jest rysowany, po 3 parametrach nazwa przycisku, napis na nim i Trzeci parametr może być linkiem do innej strony przetwarzania formularza.
   // class="$nameBlock+numer przycisku", domyślny opis przycisku OK
   // Jeśli submit3 to przycisk jest rysowany, po 3 parametrach, nazwie przycisku, etykiecie na nim i Trzecim parametrze może być link do innej strony przetwarzania formularza.
   // klasa przycisku jest ustawiana przez 4 parametr, etykieta na przycisku domyślnie jest OK
   // Dodano element Div z własną klasą dla przycisku. Klasa Diva jest równa klasie przycisku + Div
   // Jeśli P lub h1-h6, utwórz tytuł. Następnym parametrem jest tekst, drugim parametrem klasa.
   // Dodano div, div class równa się nagłówkowi class+PH
   // Jeśli span stwórz wbudowany znacznik wewnątrz div. Następnym parametrem jest tekst, drugim parametrem klasa.
   // Dodano div, div class równa się nagłówkowi class+PH
   // <div class="classPH"><span class="class">Tekst</span></div>
   // Flagi form_not_open form_not_close są opcjonalne i kontrolują odpowiednio brak otwierającego znacznika formularza i zamykającego znacznika formularza.
   // Podpisz zero_style, jeśli ustawisz ten znak, to elementy będą bez ładowania początkowego
   // Style
   // Klasa ogólnej Divy jest równa nazwie bloku. <div class="$nameBlock">
   // Wbudowana klasa bloku <div class="$nameBlock-div">
   // bootstrap
   // bootstrap-start - dodaje sekcję, wiersz, kolumnę-12
   // bootstrap-f-start - dodaje /col-12 /wiersz wiersza, col-12
   // bootstrap-finish - dodaje /col-12 /row /section
   //
   // The function puts a block of buttons and text fields without using the database.
   //$nameBlock - button block name
   //$actionN - link to the processing page
   //...$parametr the list of parameters went further
   // the first parameter is the button type or tag name:
   // If br, then after this tag, you can specify the number of data tags <br>, if not, then there will be 1 tag
   // If text, this will be a text field, the next parameter should be the name name=.. followed by the default text for value
   // class="$nameBlock+name+button number" , default value will be an empty string
   // If text2, this will be a text field, the next parameter should be name=.. followed by the default text for placeholder
   // class="$nameBlock+name+button number", by default placeholder will be an empty string
   // If textarea then create a text field like text, only big
   // If password, then there will be a text field for entering a password, the next parameter should be the name name=.. followed by the default text for value
   // class="$nameBlock+name+button number" , default value will be an empty string
   // If password2, then there will be a text field for entering a password, the next parameter should be name=.. followed by the default text for placeholder
   // class="$nameBlock+name+button number", by default placeholder will be an empty string
   // If reset then there will be a button to clear the text fields. After it, you should enter the inscription on the button, if you skip the parameter, then the button will have the inscription Reset
   // class="$nameBlock+reset+button number"
   // If submit, then a button is drawn, after 3 parameters, the name of the button, the inscription on it and The third parameter can be a link to another form processing page.
   // class="$nameBlock+name+button number", default button caption Ok
   // If submit2 then a button is drawn, after 3 parameters, the name of the button, the inscription on it and The third parameter can be a link to another form processing page.
   // class="$nameBlock+button number", default button caption OK
   // If submit3 then a button is drawn, after 3 parameters, the name of the button, the label on it and The third parameter can be a link to another form processing page.
   // the class of the button is set by the 4th parameter, the label on the button by default is OK
   // Added a Div with its own class for the button. Diva class is equal to button class + Div
   // If P or h1-h6, then create a header. Text is the next parameter, class is the second parameter.
   // Added div, div class is equal to header class+PH
   // If span then create an inline tag inside the divs. Text is the next parameter, class is the second parameter.
   // Added div, div class is equal to header class+PH
   // <div class="classPH"><span class="class">Text</span></div>
   // The form_not_open form_not_close flags are optional and control the absence of an opening form tag and a closing form tag, respectively.
   // Sign zero_style, if you set this sign, then the elements will be without bootstrap
   // Styles
   // The class of the general Diva is equal to the name of the block. <div class="$nameBlock">
   // Inline block class <div class="$nameBlock-div">
   // bootstrap
   // bootstrap-start - adds section, row, col-12
   // bootstrap-f-start - adds /col-12 /row row, col-12
   // bootstrap-finish - adds /col-12 /row /section
   public function formBlock($nameBlock, $actionN,...$parametr);

   // функция является копией функции formBlock($nameBlock, $actionN,...$parametr);, только входящий параметр - массив
   // цель модификации функции упростить динамическое проектирование модуля форм кнопок и других полей
   // есть вероятность, что развитие функций не будет синхронным.
   // Работают только кнопки Submit

   // funkcja jest kopią funkcji formBlock($nameBlock, $actionN,...$parametr); tylko parametr wejściowy jest tablicą
   // celem modyfikacji funkcji jest uproszczenie dynamicznego projektowania modułu formularza przycisku i innych pól
   // istnieje możliwość, że rozwój funkcji nie będzie synchroniczny.
   // Działają tylko przyciski przesyłania

   // the function is a copy of the formBlock($nameBlock, $actionN,...$parametr); function, only the input parameter is an array
   // the purpose of modifying the function is to simplify the dynamic design of the button form module and other fields
   // there is a possibility that the development of functions will not be synchronous.
   // Only submit buttons work
   public function formBlockMas(array $parametr);

   // функция ставит кнопку для твиттера. Параметр $text содержит заголовок статьи и ссылку на статью
   // funkcja ustawia przycisk dla Twittera. Parametr $text zawiera tytuł artykułu i link do artykułu
   // function sets the button for twitter. The $text parameter contains the title of the article and a link to the article
   public function buttonTwitter($text);
}
