<?php
namespace classCover;

// класс выводит кнопки Вперед, Назад, В начало
class BackGroundPole extends \class\nonBD\Button
{
    public function __construct()
    {
        // значения размера поля по умолчанию
        if (!isset($_SESSION['loadWidth_cover'])) $_SESSION['loadWidth_cover']=300;
        if (!isset($_SESSION['loadHeyght_cover'])) $_SESSION['loadHeyght_cover']=300;

        $firstColor=(string)  new Translation('Определить первый цвет');
        $secondColor=(string)  new Translation('Определить второй цвет');
        $applyB=(string)  new Translation('Применить');
        $borderB=(string)  new Translation('Граница поля');

        parent::formBlock(
            'BackGroundColor', 
            '#',
            'btn_start',
            'btn-info',
            'bootstrap-start',
            'p',
            $firstColor,
            '',
            'color',
            'colorName1',
            'bootstrap-f-start',
            'p',
             $secondColor,
             '',
             'color',
             'colorName2',
            'bootstrap-f-start',
            'radio',
            'checkName1',
            'Фон 1',
            'radio',
            'checkName1',
            'Фон 2',
            'radio',
            'checkName1',
            'Линейный градиент',
            'radio',
            'checkName1',
            'Радиальный градиент',
            'bootstrap-f-start',
            'submit',
            'buttonFieldSize',
             $applyB,
             'p',
              $borderB,
              'buttonBorder',
            'bootstrap-finish',
           );

           $qq=$_SESSION['n']++;
        echo "
            <script>window.addEventListener('load', borderSet);</script>
            <section id='workingField'>
            $qq
            </section>
        ";

    }
}
