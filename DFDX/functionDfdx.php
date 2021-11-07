<?php
include "classInstrument.php";

function translit($string) // функция транслитерации
{
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );

    $stroka=preg_filter('/[\c\s\d\W]/u','-',$string);
    $stroka=strtr($stroka, $converter);
    $stroka=mb_strtolower($stroka);
    if (!is_null(preg_filter('/-{2,9}?/','',$stroka))) $stroka=preg_filter('/-{2,9999}?/','',$stroka);
    return $stroka;
}

function listKategorijNews1($nameBd) //Функция выводит список имеющихся в базе категорий
{
    $clas=new redaktor\statistic();
    $masRez=array();
    $rez=$clas->zaprosSQL("SELECT razdel FROM ".$nameBd." WHERE 1");
    $i=0;
    $strokaReturn='Категорий пока нет';
    while (!is_null($stroka=mysqli_fetch_array($rez))) // собираем все категории в массив
        $masRez[$i++]=$stroka[0];

    if ($i>0) $strokaReturn=''; // находили выше какую-то категорию, обнуляем стартовое значение переменной, для создания правильной строки

    $masRez=array_unique ($masRez); // убираем одинаковые значения из массива

        foreach($masRez as $value)
         $strokaReturn=$strokaReturn.'#'.$value.'#';

         return $strokaReturn;
         
}
function poiskDfdx($strObrabotki) //Выводит кнопки поиска
{
    $clas=new redaktor\statistic();
    $clas->formBlock('poisk',
                    $strObrabotki,
                    'text',
                    'strPoisk',
                    'Поиск',
                    'submit',
                    'poisk',
                    'Найти'
                        );


}
function levoeMenu() //Выводит левое меню
{
    $clas=new redaktor\statistic();
    $clas->formBlock('levBlock',
                    'dfdx.php',
                    'submit',
                    'levBlock',
                    'HTML',
                    'htmlFoDfdx.php',
                    'br',
                    'submit',
                    'levBlock',
                    'HTML5',
                    'html5FoDfdx.php',
                    'br',
                    'submit',
                    'levBlock',
                    'Регулярные в...',
                    'regular_expressions.php',
                    'br'
                        );


}

function pravoePole($kluc)
{
    echo '<section class="container-fluid">';
    $clas=new redaktor\statistic();

    if ($kluc=='html3') // Если функция вызвана со страницы html
        $zapros="SELECT id,name FROM bd2 WHERE razdel='html3' OR razdel='html3html5' OR razdel='html5html3'";

    if ($kluc=='html5') // Если функция вызвана со страницы html или html5
        $zapros="SELECT id,name FROM bd2 WHERE  razdel='html5' OR razdel='html3html5' OR razdel='html5html3'";

    if ($kluc=='regular') // Если функция вызвана со страницы html или html5
        $zapros="SELECT id,name FROM bd2 WHERE  razdel='regular' OR razdel='phpregular' OR razdel='regularphp'";

    if ($kluc=='html3' || $kluc=='html5' ||  $kluc=='regular') // Если функция вызвана со страницы html или html5
     {
      $rez=$clas->zaprosSQL($zapros);
      echo '<form action="'.$_SESSION['redaktiruem'].'" method="post">';
      while (!is_null($stroka=(mysqli_fetch_assoc($rez))))
       {
        $stroka['name']=$clas->clearCode($stroka['name'],'удалить_все');
         echo '<div class="row">';
         echo '<div class="col-12">';
         echo '<input class="prawBlock btn" type="submit" name="panelPrawa'.$stroka['id'].'" value="'.$stroka['name'].'">';
         echo '</div>';
         echo '</div>';
       }
      echo '</form>';
     }
     echo '</section>';
}
?>