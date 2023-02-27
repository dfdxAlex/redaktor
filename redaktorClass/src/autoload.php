<?php
namespace src;

$func = function ($in)
{
    $in = preg_replace('~\\\\~',DIRECTORY_SEPARATOR,$in);
    $in.='.php';
    include_once $in;
};

spl_autoload_register($func);
