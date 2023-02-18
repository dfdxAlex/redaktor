<?php
namespace class\redaktor\interface\interface;

//Интерфейс работы с пользователями
//Interfejs użytkownika
//User Interface

interface InterfaceFoUser extends InterfaceButton, InterfaceWorkToMail
{

   // записывает в таблицу нового пользователя
   // zapisuje nowego użytkownika do tabeli
   // writes a new user to the table
   public function zapisGostia($login,$parol,$mail,$temaMeila,$meilText);

   // Проверяет статус учётной записи пользователя
   // Sprawdza status konta użytkownika
   // Checks the status of the user account
   public function statusRegi($login,$parol);

   // Изменяет статус учётной записи
   // Zmienia status konta
   // Changes account status
   public function saveStatus($status);

   //выводит список клиентов, объем информации зависит от статуса модератора или администратора
   //wyświetla listę klientów, ilość informacji zależy od statusu moderatora lub administratora
   //displays a list of clients, the amount of information depends on the status of the moderator or administrator
   public function listKlientow();

   // Сбросить пароль. Пароль сбрасывается для пользователя, логин которого указан в массиве $_POST['login']
   // Zresetuj hasło. Hasło jest resetowane dla użytkownika, którego login jest podany w tablicy $_POST['login']
   // Reset the password. The password is reset for the user whose login is specified in the $_POST['login'] array
   public function resetParol();

   // Сохраняет параметры пользователя, логин, пароль, почта ... данные берутся из массива POST
   // Zapisuje parametry użytkownika, login, hasło, pocztę ... dane są pobierane z tablicy POST
   // Saves user parameters, login, password, mail ... data is taken from the POST array
   public function saveStatusR();

   // удаляет пользователя
   // Usuń użytkownika
   // delete user
   public function killGosc();

   // повторная отправка письма с проверочным кодом
   // ponowne wysłanie e-maila z kodem weryfikacyjnym
   // resending the email with the verification code
   public function siearcMail($login,$meilText);

   // модифицированная функция siearcMail(), отправка почты с помощью PHPMailer
   // zmodyfikowano funkcję searcMail(), wysyłanie poczty za pomocą PHPMailer
   // modified searcMail() function, sending mail with PHPMailer
   public function modifiedSearcMail(\PHPMailer\PHPMailer\PHPMailer $mailer, $login, $meilText);

   // функция генерирует вопрос для капчи
   // funkcja generuje pytanie captcha
   // function generates a captcha question
   public function capcha();

   // варианты ответов для капчи
   // opcje odpowiedzi dla captcha
   // answer options for captcha
   public function varianty($nomer);

   // Проверяет правильность ответа капчи
   // Sprawdza poprawność odpowiedzi captcha
   // Checks the correctness of the captcha answer
   public function capcaRez($vopros,$otvet);

   //Ловит нажатие кнопки варианта капчи
   // Łapie kliknięcie przycisku opcji captcha
   //Catches the click of the captcha option button
   public function lovimOtvetNaCapcu($knopka); 

   // функция проверяет корректность почты
   // funkcja sprawdza poprawność poczty
   // function checks the correctness of mail
   public function prowerkaMail();

   // Преобразуем номер статуса в его значение
   // Konwertuj numer statusu na jego wartość
   // Convert the status number to its value
   public function statusNumerSlovo($status);

   // Функция преобразовывает статус пользователя цифровой в его текстовый аналог - название
   // Funkcja konwertuje status cyfrowy użytkownika na jego tekstowy odpowiednik - nazwę
   // The function converts the user's digital status into its text counterpart - name
   public function statusString();

   // проверка логина, если логин не существует или не соответствует правилам, то вернуть TRUE
   // sprawdzenie loginu, jeśli login nie istnieje lub nie pasuje do reguł, to zwróć TRUE
   // checking the login, if the login does not exist or does not match the rules, then return TRUE
   public function prowerkaLogin(); 

   // Функция проверяет поля логина и пароля, если они заполнены, то вытягивает из базы статус 
   // пользователя и заносит его в переменную $_SESSION["status"]
   // Также функция обрабатывает нажатие кнопки Вход и Выход
   
   // Funkcja sprawdza pola login i hasło, czy są wypełnione, a następnie pobiera status 
   // użytkownika z bazy danych i wpisuje go do zmiennej $_SESSION["status"]
   // Funkcja obsługuje również naciśnięcie klawisza Enter i Exit

   // The function checks the login and password fields, if they are filled, then pulls the user status 
   // from the database and enters it into the $_SESSION["status"] variable
   // Also, the function handles the button press Enter and Exit
   public function checkUserStatus();
}
