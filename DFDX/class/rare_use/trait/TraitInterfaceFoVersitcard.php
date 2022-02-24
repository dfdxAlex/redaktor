<?php
namespace class\rare_use\trait;

trait TraitInterfaceFoVersitcard
{
    public function interfaceDataCard()
    {
        //echo 'BEGIN:VCARD<br>
        //      VERSION:3.0<br><br>';

        $this->formBlock('block-v-card','elWisitka.php',
                         'text2',
                         'surname',
                         'Фамилия',
                         'br',
                         'text2',
                         'name',
                         'Имя',
                         'br',
                         'text2',
                         'patronymic',
                         'Отчество',
                         'br',

                         'text2',
                         'tel_home',
                         'Телефон',
                         'br',

                         'text2',
                         'org',
                         'Организация',
                         'br',
                         'text2',
                         'role',
                         'Должность',
                         'br',

                         'text2',
                         'url',
                         'Ссылка на страницу',
                         'br',
                         'text2',
                         'email',
                         'Почта на визитке',
                         'br',

                         'text2',
                         'note',
                         'Дополнительная информация',
                         'br',

                         'text2',
                         'exportEmail',
                         'Почта для отправки визитки',
                         'br',

                       //  'text2',
                       //  'fileName',
                       //  'имя файла',
                       //  'br',

                         'submit',
                         'block-v-card',
                         'Сгенерировать файл',
                         '#',
                        // 'submit',
                        // 'block-v-card',
                        // 'Отправить файл',
                        // '#',
                );

        //echo '<br>END:VCARD';

        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $patronymic = $_POST['patronymic'] ?? '';

        $org=$_POST['org'] ?? '';
        $role=$_POST['role'] ?? '';
        $tel_home=$_POST['tel_home'] ?? '';
        $email=$_POST['email'] ?? '';
        $url=$_POST['url'] ?? '';
        $note=$_POST['note'] ?? '';

        //$file=$_POST['fileName'] ?? '123123123.txt';

        $exportEmail=$_POST['exportEmail'] ?? '';

 

        
        if (isset($_POST['block-v-card'])){

            $file=$this->siteRootDirectory().'second_menu/card_'.$_SESSION['login'].'.vcr';
            $handle = fopen($file, "w");
            $stroka='BEGIN:VCARD';
            echo $stroka.'<br>';
            fwrite($handle,$stroka."\n");
            $stroka='VERSION:3.0';
            echo $stroka.'<br>';
            fwrite($handle,$stroka."\n");

            if ($name!='' || $surname!='' || $surname!='') {
                $stroka= 'FN:к.м.н., пр. '.$surname.' '.$name.' '.$patronymic;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
                $stroka= 'N:'.$surname.';'.$name.';'.$patronymic.';пр.,к.м.н.';
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($org!='') {
                $stroka= 'ORG:'.$org;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($role!='') {
                $stroka= 'ROLE:'.$role;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($tel_home!='') {
                $stroka= 'TEL;TYPE=work, voice, pref, cell, msg:'.$tel_home;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($url!='') {
                $stroka= 'URL:'.$url;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($email!='') {
                $stroka= 'EMAIL;TYPE=INTERNET:'.$email;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }
            if ($note!='') {
                $stroka= 'NOTE:'.$note;
                echo $stroka.'<br>';
                fwrite($handle,$stroka."\n");
            }

            //if ($_POST['block-v-card']=='Отправить файл' && $exportEmail!='') {
                $this->letterTextFromFilePlusAttachment(new \PHPMailer\PHPMailer\PHPMailer(),
                                                       'Визитка от DFDX', $exportEmail,'Визитка от DFDX', 
                                                       $file,$file, false);
            //}
            $stroka='END:VCARD';
            echo $stroka.'<br>';
            fwrite($handle,$stroka.'\n');
            fclose($handle);
            echo 'Файл отправлен на указанную почту.';
        }

            
 

       




    }
}
