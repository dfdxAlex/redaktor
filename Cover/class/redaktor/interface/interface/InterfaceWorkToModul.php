<?php
namespace class\redaktor\interface\interface;

interface InterfaceWorkToModul extends InterfaceWorkToSearch

{
    // Функция работает с монетами, которые соответствуют колличеству символов. Функция вспомогательная для news1
    public function money(...$parametr);
}
