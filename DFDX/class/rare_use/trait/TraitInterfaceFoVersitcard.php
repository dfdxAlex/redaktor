<?php
namespace class\rare_use\trait;

trait TraitInterfaceFoVersitcard
{
    public function interfaceDataCard()
    {
        echo 'BEGIN:VCARD<br>
              VERSION:3.0<br><br>';

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

                         'submit',
                         'block-v-card',
                         'Сгенерировать файл',
                         '#',
                         'submit',
                         'block-v-card',
                         'Отправить файл',
                         '#',
                );

        echo '<br>END:VCARD';

        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $patronymic = $_POST['patronymic'] ?? '';

        $org=$_POST['org'] ?? '';
        $role=$_POST['role'] ?? '';
        $tel_home=$_POST['tel_home'] ?? '';
        $email=$_POST['email'] ?? '';
        $url=$_POST['url'] ?? '';
        $note=$_POST['note'] ?? '';

        $exportEmail=$_POST['exportEmail'] ?? '';


        echo 'BEGIN:VCARD<br>
              VERSION:3.0<br>';

        if (isset($_POST['block-v-card'])){
            if ($name!='' || $surname!='' || $surname!='') {
                echo 'FN:к.м.н., пр. '.$surname.' '.$name.' '.$patronymic.'<br>'
                     .'N:'.$surname.';'.$name.';'.$patronymic.';пр.,к.м.н.<br>';
            }
            if ($org!='') {
                echo 'ORG:'.$org.'<br>';
            }
            if ($role!='') {
                echo 'ROLE:'.$role.'<br>';
            }
            if ($tel_home!='') {
                echo 'TEL;TYPE=work, voice, pref, cell, msg:'.$tel_home.'<br>';
            }
            if ($url!='') {
                echo 'URL:'.$url.'<br>';
            }
            if ($email!='') {
                echo 'EMAIL;TYPE=INTERNET:'.$email.'<br>';
            }
            if ($note!='') {
                echo 'NOTE:'.$note;
            }
            if ($_POST['block-v-card']=='Отправить файл' && $exportEmail!=''){
                //mail(
                //    $exportEmail,
                //    'Электронная визитка',
                //    string $message,
                //    array|string $additional_headers = [],
                //    string $additional_params = ""
                //);
            }
        }

        echo '<br>END:VCARD';



    }
}
