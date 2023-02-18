<?php

// connect your autoloader
// подключение своего автозагрузчика
require "class.php";

// include the HTML page header including the open body tag
// подключение заголовка HTML страницы включая открытый тег body
echo new \Object\HtmlHead('assets/css/styli.css','JSON');
// <body>

#Algorithm for deleting a record from a json file
// create an object to work with data deletions from the table
#Алгоритм удаления записи из файла json
// создаем объект для работы с удалениями данных из таблицы
$jsonMas = new \Object\CreateTable();

// returns the number of the pressed DELETE button to the $nomerKill ID variable
// возвращает в переменную $nomerKill ID номер нажатой кнопки УДАЛЕНИЯ
$nomerKill=new \ValueObject\NomerButton();

// remove the array element specified in the $nomerKill variable from the json file
// удаляем элемент массива, указанный в переменной $nomerKill, из файла json
$killUser = new \Object\KillUser($jsonMas,$nomerKill);
#The algorithm for deleting a record from a json file worked#
#Алгоритм удаления записи из файла json отработал#

// object for writing data from forms to a file
// объект для записи данных из форм в файл
$saveFormToJson = new \Object\SaveFormToJson(new \ValueObject\FormToMas());

// create an object for working with tables
// создаем объект для работы с таблицами
$jsonMas = new \Object\CreateTable();

echo '<p>Zatwierdź zmianę 1</p>';
// create a table without Delete buttons (there is no input parameter, or there is, but false)
// содаем таблицу без кнопок Удалить (нет входного параметра, либо есть, но false)
$jsonMas->createTab();

echo '<div class="zmiane"><p>Zatwierdź zmianę 2</p></div>';
// create a table with Delete buttons (there is an input parameter true)
// создаем таблицу с кнопками Удалить (есть входной параметр true)
$jsonMas->createTab(true);

// put the form to add a client
// ставим форму для добавления клиента
echo new \Object\FormAdd(new \ValueObject\Geo());

// </body>
// Closing the html document
// Закрытие документа html
echo new \Object\HtmlFutter();
