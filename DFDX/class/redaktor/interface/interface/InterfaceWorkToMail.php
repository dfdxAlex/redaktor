<?php
namespace class\redaktor\interface\interface;

//интерфейс функций, работающих с почтой
//interfejs funkcji obsługujących pocztę
//interface of functions working with mail

interface InterfaceWorkToMail extends InterfaceWorkToBd

{
    //Функция отправляет сообщение на указанную почту
    //первый параметр передает объект типа PHPMailer в функцию
    //параметр string $sender определяет отправителя письма, его подпись
    //параметр string $address определяет адрес получателя письма
    //параметр string $emailHeader определяет заголовок письма
    //параметр string $textOfTheLetter задает текст сообщения письма
    //параметр bool $showSendResult определяет показать ли сообщение о результате отработки функции

    //Funkcja wysyła wiadomość na podany adres e-mail
    //pierwszy parametr przekazuje do funkcji obiekt typu PHPMailer
    //string parametr $sender określa nadawcę listu, jego podpis
    //string parametr $address określa adres odbiorcy listu
    //string parametr $emailHeader definiuje nagłówek wiadomości e-mail
    //string parametr $textOfTheLetter ustawia tekst wiadomości w liście
    //bool parametr $showSendResult określa, czy wyświetlać komunikat o wyniku przetwarzania funkcji

    //The function sends a message to the specified mail
    //first parameter passes an object of type PHPMailer to the function
    //string parameter $sender defines the sender of the letter, his signature
    //string parameter $address defines the address of the recipient of the letter
    //string parameter $emailHeader defines the email header
    //string parameter $textOfTheLetter sets the message text of the letter
    //bool parameter $showSendResult determines whether to show a message about the result of the function processing
    //public function simpleLetter(\PHPMailer\PHPMailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $textOfTheLetter, bool $showSendResult=false);
    public function simpleLetter(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $textOfTheLetter, bool $showSendResult=false);

    //Функция отправляет сообщение на указанную почту + прикрепляет файл во вложениях
    //первый параметр передает объект типа PHPMailer в функцию
    //параметр string $sender определяет отправителя письма, его подпись
    //параметр string $address определяет адрес получателя письма
    //параметр string $emailHeader определяет заголовок письма
    //параметр string $textOfTheLetter задает текст сообщения письма
    //параметр string $pathFileAttachment задает путь и имя файла для вложения в письмо
    //параметр bool $showSendResult определяет показать ли сообщение о результате отработки функции

    //Funkcja wysyła wiadomość na podany mail + załącza plik w załącznikach
     //pierwszy parametr przekazuje do funkcji obiekt typu PHPMailer
     //string parametr $sender określa nadawcę listu, jego podpis
     //string parametr $address określa adres odbiorcy listu
     //string parametr $emailHeader definiuje nagłówek wiadomości e-mail
     //string parametr $textOfTheLetter ustawia tekst wiadomości w liście
     //parametr ciągu $pathFileAttachment ustawia ścieżkę i nazwę pliku do załączenia do wiadomości e-mail
     //bool parametr $showSendResult określa, czy wyświetlać komunikat o wyniku przetwarzania funkcji

    //The function sends a message to the specified mail + attaches the file in attachments
     //first parameter passes an object of type PHPMailer to the function
     //string parameter $sender defines the sender of the letter, his signature
     //string parameter $address defines the address of the recipient of the letter
     //string parameter $emailHeader defines the email header
     //string parameter $textOfTheLetter sets the message text of the letter
     //string parameter $pathFileAttachment sets the path and file name to attach to the email
     //bool parameter $showSendResult determines whether to show a message about the result of the function processing
    public function simpleLetterPlusFileileAttachment(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $textOfTheLetter, string $pathFileAttachment, bool $showSendResult=false);

    //Функция отправляет сообщение из файла на указанную почту + прикрепляет файл отдельный во вложениях
    //первый параметр передает объект типа PHPMailer в функцию
    //параметр string $sender определяет отправителя письма, его подпись
    //параметр string $address определяет адрес получателя письма
    //параметр string $emailHeader определяет заголовок письма
    //параметр string $fileOfTheLetter файл с содержимым письма
    //параметр string $pathFileAttachment задает путь и имя файла для вложения в письмо
    //параметр bool $showSendResult определяет показать ли сообщение о результате отработки функции

    //Funkcja wysyła wiadomość z pliku na określoną pocztę + dołącza osobny plik w załącznikach
    //pierwszy parametr przekazuje do funkcji obiekt typu PHPMailer
    //string parametr $sender określa nadawcę listu, jego podpis
    //string parametr $address określa adres odbiorcy listu
    //string parametr $emailHeader definiuje nagłówek wiadomości e-mail
    //string parametr $fileOfTheLetter plik z treścią listu
    //parametr ciągu $pathFileAttachment ustawia ścieżkę i nazwę pliku do załączenia do wiadomości e-mail
    //bool parametr $showSendResult określa, czy wyświetlać komunikat o wyniku przetwarzania funkcji

    //The function sends a message from a file to the specified mail + attaches a separate file in attachments
    //first parameter passes an object of type PHPMailer to the function
    //string parameter $sender defines the sender of the letter, his signature
    //string parameter $address defines the address of the recipient of the letter
    //string parameter $emailHeader defines the email header
    //string parameter $fileOfTheLetter file with the content of the letter
    //string parameter $pathFileAttachment sets the path and file name to attach to the email
    //bool parameter $showSendResult determines whether to show a message about the result of the function processing
    public function letterTextFromFilePlusAttachment(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $fileOfTheLetter, string $pathFileAttachment, bool $showSendResult=false);

}
