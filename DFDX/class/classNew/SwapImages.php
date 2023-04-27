<?php
namespace class\classNew;

class SwapImages
{
    private static $link = null;

    private function __construct() {}

    static public function swapImages()
    {
        if (is_null(self::$link)) self::$link = new SwapImages;
        return self::$link;
    }

    public function noImage($img)
    {
        echo match(true) {
            $img==="zagolowkaBeg" => '<p class="swap-images"><span>'.$img.'</span></p>',
            $img==="home" => '<p class="swap-images"><span>Главная страница</span></p>',
            $img==="tictactoe" => '<p class="swap-images"><span>Игра крестики нолики</span>',
            $img==="htmlPhp" => '<p class="swap-images"><span>HTML</span></p>',
            $img==="cmsdfdx" => '<p class="swap-images"><span>CMS DFDX</span></p>',
            $img==="xhtml" => '<p class="swap-images"><span>XHTML</span></p>',
            $img==="git" => '<p class="swap-images"><span>GitHub</span></p>',
            $img==="leson" => '<p class="swap-images"><span>Различные реализованные задачи</span></p>',
            $img==="apidfdx" => '<p class="swap-images"><span>API DFDX</span></p>',
            $img==="html3" => '<p class="swap-images"><span>HTML3</span></p>',
            $img==="html5" => '<p class="swap-images"><span>HTML5</span></p>',
            $img==="psr" => '<p class="swap-images"><span>Рекомендации PSR</span></p>',
            $img==="elVisitka" => '<p class="swap-images"><span>Создаем электронную визитку</span></p>',
            $img==="gamesOfPhp" => '<p class="swap-images"><span>Игры на PHP</span></p>',
            $img==="programToPhp" => '<p class="swap-images"><span>Программы на PHP</span></p>',
            $img==="ipCalculator" => '<p class="swap-images"><span>IP Калькулятор на PHP</span></p>',
        };
    }
}

