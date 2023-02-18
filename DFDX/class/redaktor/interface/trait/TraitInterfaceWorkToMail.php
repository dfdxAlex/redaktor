<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToMail
{
    public function simpleLetter(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $textOfTheLetter, bool $showSendResult=false)
    {
        $mailer->isSMTP();   
        $mailer->SMTPAuth   = true;
        // Настройки вашей почты
        $mailer->Host       = $this->smtpServerFoPhpMailer();           // SMTP сервера вашей почты
        $mailer->Username   = $this->initMailFoPhpMailer();             // Логин на почте
        $mailer->Password   = $this->initParolFoMailFoPhpMailer();      // Пароль на почте
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port       = 465;
        $mailer->setFrom($this->initMailFoPhpMailer(), $sender);        // Адрес самой почты и имя отправителя
        $mailer->CharSet = 'UTF-8';
        $mailer->addReplyTo($this->initMailFoPhpMailer(), $sender);     // обратный адрес
        $mailer->addAddress($address, $sender);                         // кому
        $mailer->Subject = $emailHeader;                                // тема
        $mailer->msgHTML($textOfTheLetter);
        $mailer->AltBody = $textOfTheLetter;                            // письмо обычным текстом, если клиент не поддерживает html
        // Отправляем
        if ($mailer->send()) {
            if ($showSendResult) echo 'Письмо отправлено!';
        } else {
            if ($showSendResult) echo 'Ошибка: ' . $mail->ErrorInfo;
        }
    } 

    public function simpleLetterPlusFileileAttachment(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $textOfTheLetter, string $pathFileAttachment='', bool $showSendResult=false)
    {
        $mailer->isSMTP();   
        $mailer->SMTPAuth   = true;
        // Настройки вашей почты
        $mailer->Host       = $this->smtpServerFoPhpMailer();           // SMTP сервера вашей почты
        $mailer->Username   = $this->initMailFoPhpMailer();             // Логин на почте
        $mailer->Password   = $this->initParolFoMailFoPhpMailer();      // Пароль на почте
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port       = 465;
        $mailer->setFrom($this->initMailFoPhpMailer(), $sender);        // Адрес самой почты и имя отправителя
        $mailer->CharSet = 'UTF-8';
        $mailer->addReplyTo($this->initMailFoPhpMailer(), $sender);     // обратный адрес
        $mailer->addAddress($address, $sender);                         // кому
        $mailer->Subject = $emailHeader;                                // тема
        $mailer->msgHTML($textOfTheLetter);
        $mailer->AltBody = $textOfTheLetter;                            // письмо обычным текстом, если клиент не поддерживает html
        if ($pathFileAttachment!='')
        $mailer->addAttachment($pathFileAttachment);        // прикрепляем один файл
        // Отправляем
        if ($mailer->send()) {
            if ($showSendResult) echo 'Письмо отправлено!';
        } else {
            if ($showSendResult) echo 'Ошибка: ' . $mail->ErrorInfo;
        }
    }

    public function letterTextFromFilePlusAttachment(\class\vendorMailerPhp\phpmailer\phpmailer\PHPMailer $mailer, string $sender, string $address, string $emailHeader, string $fileOfTheLetter, string $pathFileAttachment, bool $showSendResult=false)
    {
        $mailer->isSMTP();   
        $mailer->SMTPAuth   = true;
        // Настройки вашей почты
        $mailer->Host       = $this->smtpServerFoPhpMailer();           // SMTP сервера вашей почты
        $mailer->Username   = $this->initMailFoPhpMailer();             // Логин на почте
        $mailer->Password   = $this->initParolFoMailFoPhpMailer();      // Пароль на почте
        $mailer->SMTPSecure = 'ssl';

        $mailer->Port       = 465;

        $mailer->setFrom($this->initMailFoPhpMailer(), $sender);        // Адрес самой почты и имя отправителя
        $mailer->CharSet = 'UTF-8';
        $mailer->addReplyTo($this->initMailFoPhpMailer(), $sender);     // обратный адрес
        $mailer->addAddress($address, $sender);                         // кому
        $mailer->Subject = $emailHeader;        
        $mailer->msgHTML(file_get_contents($fileOfTheLetter), __DIR__);  // получаем "тело" письма из файла
        if ($pathFileAttachment!='')
            $mailer->addAttachment($pathFileAttachment);        // прикрепляем один файл
        // Отправляем
        if ($mailer->send()) {
            if ($showSendResult) echo 'Письмо отправлено!';
        } else {
            if ($showSendResult) echo 'Ошибка: ' . $mailer->ErrorInfo;
        }
    }
}
