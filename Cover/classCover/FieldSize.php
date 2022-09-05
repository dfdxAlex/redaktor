<?php
namespace classCover;


// класс управляет логикой приложения  
class FieldSize extends \class\nonBD\Button
{
    
    public function __construct()
    {
        parent::__construct();

        $mesageHeight=(string)  new Translation('Введите размер поля');
        $loadWidth=(string)  new Translation('Введите ширину');
        $loadHeyght=(string)  new Translation('Введите высоту');
        $buttonFieldSize=(string)  new Translation('Сохранить');

        parent::formBlock(
                         'FieldSize', 
                         '#',
                         'btn_start',
                         'btn-info',

                         'bootstrap-start',
                         'p',
                         $mesageHeight,
                         'mesageHeight',
                         'bootstrap-f-start',
                         'text2',
                         'loadWidth',
                         $loadWidth,
                         'bootstrap-f-start',
                         'text2',
                         'loadHeyght',
                         $loadHeyght,
                         'bootstrap-f-start',
                         
                         'submit',
                         'buttonFieldSize',
                         $buttonFieldSize,
                         'bootstrap-finish',

                        );
    }
}
