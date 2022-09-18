<?php
namespace classCover;

// класс настраивает параметры фона
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
            'div',
            '',
            '',
            'div_color_1',
            'bootstrap-f-start',
            'p',
             $secondColor,
             '',
             'color',
             'colorName2',
             'div',
             '',
             '',
             'div-color-2',

             'submit',
             'resetColor',
             'Без фона',
            'bootstrap-f-start',
            'radio',
            'checkName1',
            'Фон 1',
            'fon1',
            'fon1',
            'radio',
            'checkName1',
            'Фон 2',
            'fon2',
            'fon2',
            'radio',
            'checkName1',
            'Линейный градиент',
            'fon3',
            'fon3',
            'radio',
            'checkName1',
            'Радиальный градиент',
            'fon4',
            'fon4',
            'bootstrap-f-start',
            'p',
             $applyB,
             'buttonOk',
             'p',
             $borderB,
             'buttonBorder',
             'submit',
             'saveColor',
             'Запомнить',
            'bootstrap-finish',
            
           );

           //window.addEventListener('load', borderSet);
           $heyghtB=$_SESSION['loadHeyght_cover'];
           $widthB=$_SESSION['loadWidth_cover'];

           $nomerChecked=$_SESSION['checkName1_cover'];
           $bBackGround=$_SESSION['colorName1_cover'];
           $bBackGround2=$_SESSION['colorName2_cover'];

           if ($nomerChecked=='fon2')
               $bBackGround=$_SESSION['colorName2_cover'];

           if ($nomerChecked=='fon3') {
                
           }

           $color1=$_SESSION['colorName1_cover'];
           $color2=$_SESSION['colorName2_cover'];
           
        echo "
            <script>
                b = new BorderSet($heyghtB,$widthB,'$bBackGround','$nomerChecked','$bBackGround2');
                b.colorDivCircle('$color1','$color2');
                b.checkedFlag('$nomerChecked');
            </script>

            <section id='workingField'>
            </section>
        ";

    }
}
