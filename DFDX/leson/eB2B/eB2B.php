<?php

require "Convert.php";      

$a = new Convert();

echo $a->convertToNumeric('Ela nie ma kota');

echo $a->convertToString('5,2,22,555,33,222,9999,66,444,55');
