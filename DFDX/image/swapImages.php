
<?php

/**
 * Файл удалить после всех исправлений. Во всех файлах следует закомментировать его подключение
 * Файл заменен на Синглтон, смотри страницу dfdx.php строка 11.
 * Синглтон реализован на namespace class\classNew\SwapImages.php
 */

// Файл содержит функции, заменяющие картинки в определенных местах
function zagolowkaBeg($stroka)
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>'.$stroka.'</span></p>';
}
function htmlPhp()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>HTML</span></p>';
}
function cmsdfdx()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>CMS DFDX</span></p>';
}
function xhtml()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>XHTML</span></p>';
}
function home()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Главная страница</span></p>';
}
function git()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>GitHub</span></p>';
}
function leson()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Различные реализованные задачи</span></p>';
}
function apidfdx()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>API DFDX</span></p>';
}
function html3()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>HTML3</span></p>';
}
function html5()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>HTML5</span></p>';
}
function psr()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Рекомендации PSR</span></p>';
}
function elVisitka()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Создаем электронную визитку</span></p>';
}
function tictactoe()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Игра крестики нолики</span></p>';
}
function gamesOfPhp()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Игры на PHP</span></p>';
}
function programToPhp()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>Программы на PHP</span></p>';
}
function ipCalculator()
{
   errorSwapImages(__FUNCTION__);
   echo '<p class="swap-images"><span>IP Калькулятор на PHP</span></p>';
}

function errorSwapImages($func)
{
   echo "Устаревший вызов функции $func: закоментируй require 'image/swapImages.php' ";
}
