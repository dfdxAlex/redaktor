<?php
namespace classCover;


// класс принимает данные размера поля.
class FieldSize extends \class\nonBD\Button
{
    
    public function __construct()
    {
        parent::__construct();

        $mesageHeight=(string)  new Translation('Введите размер поля');

        $loadWidthSes='';
        if ((int)$_SESSION['loadWidth_cover']>0) $loadWidthSes=$_SESSION['loadWidth_cover']; 
        $loadWidth=(string)  new Translation('Введите ширину');

        $loadHeyghtSes='';
        if ((int)$_SESSION['loadHeyght_cover']>0) $loadHeyghtSes=$_SESSION['loadHeyght_cover'];
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
                         'textLH',
                         'loadWidth',
                         $loadWidth,
                         $loadWidthSes,
                         'bootstrap-f-start',
                         'textLH',
                         'loadHeyght',
                         $loadHeyght,
                         $loadHeyghtSes,
                         'bootstrap-f-start',
                         'submit',
                         'buttonFieldSize',
                         $buttonFieldSize,
                         'bootstrap-finish',

                        );
    }
}
