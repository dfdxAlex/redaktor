-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.57
-- Время создания: Ноя 18 2021 г., 01:37
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f0585840_dfdx`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bd2`
--

CREATE TABLE `bd2` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `news` mediumtext COLLATE utf8_bin,
  `login_redaktora` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `razdel` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `bd2`
--

INSERT INTO `bd2` (`id`, `name`, `news`, `login_redaktora`, `razdel`) VALUES
(0, 'Комментарии в html.', 'Комментарии в html используются, как и в других языках программирования, хотя оный им не является, в основном для ведения пояснений к различным частям кода, или отдельных его строк. Так-же комментарии активно применяются при отладке кода программы, или страницы. В случае с разметкой html, комментарии можно использовать и для создания динамической страницы, разумеется, с использованием некоторого языка программирования, однако – это не самый эффективный способ управлять содержимым страницы. \r\nВнимание!! Комментарий всегда виден на странице, если посмотреть её код с помощью браузера. <br>\r\n\r\nКоротко: пояснение части кода, отладка страницы при верстке, создание динамической страницы, <br>последнее лишь возможность. \r\n\r\nСинтаксис: &lt!—Текстовый комментарий--&gt \r\n\r\n<code>          \r\nПривет мир 			&lt!- -Обычный текст--&gt <br>\r\n<b>               Привет мир </b> 		&lt!- -Жирный текст--&gt <br>\r\n</code> \r\n#html3html5#', 'alfa54', 'html3html5'),
(2, '&lt!DOCTYPE&gt - объявление типа документа.', 'Данная конструкция, либо ключевое слово объявляет тип документа. Используется в самом начале страницы для того, чтобы браузер понимал, с каким типом документа он будет работать, либо загружать. Проще говоря, браузер должен знать страничка размечена по правилам HTML4, HTML5 или XHTML.\r\n<br>\r\nВ разных типах документов, страничек, используются разные наборы тегов. Если Вы собираетесь создавать страничку с набором тегов HTML5 – это самый новый стандарт на момент написания статьи, то сообщить об этом браузеру можно указав в начале документа объявление:\r\n<code>         \r\n&lt!DOCTYPE html&gt\r\n</code>\r\nЕсли по какой-то неизвестной причине Вы решите написать или разметить страницу на старом HTML4, то сообщить об этом браузеру можно будет следующим образом:\r\n<code>         \r\n&lt!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\r\n</code>\r\nПродолжая тему гурманов, можно вспомнить и об XHTML, объявить который браузеру можно написав в начале страницы код ниже:\r\n<code>         \r\n&lt!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\r\n</code>\r\nДанные объявления влияют на функционал страницы. Разные системы немного отличаются наборами тегов друг от друга. На пример тег APPLET присутствует только в HTML4, а тега AREA нет только в XHTML. Вряд ли есть какой-то смысл использовать старые разметки, но если у Вас вдруг такая необходимость появилась, то Вы всегда сможете узнать какой тег в какой системе работает, найдя его описание с помощью системы поиска на нашем сайте.\r\n#html3html5#', 'alfa54', 'html3html5'),
(4, 'Функция : preg_filter().', 'Доброго всем времени суток. Коротенькая статья о том, для чего и как применяется функция preg_filter(). <br>\r\n<img        src=\"https://a.radikal.ru/a12/2110/fe/0592a16bb7c5.jpg\" alt=\"сыщик\"><br>\r\nФункция применяется для поиска и замены части текста на другую часть текста. Для поиска используются регулярные выражения. Найденное совпадение функция вырезает и на место старого текста вставляет заготовленную строку.<br>\r\n<br>\r\n<i>Синтаксис:</i>   <a href=\"regular_expressions.php\" target=\"_blank\">…поупражняться с рабочей функцией можно тут: </a><br>\r\n<code>                <br>\r\npreg_filter(<br>\r\n    string|array $pattern,<br>\r\n    string|array $replacement,<br>\r\n    string|array $subject,<br>\r\n    int $limit = -1,<br>\r\n    int &$count = null<br>\r\n): string|array|null<br>\r\n</code><br>\r\nКак видно функция работает как со строками, так и с массивами.<br>\r\nПервый параметр ($pattern) в функции задает то самое регулярное выражение. Заключено оно должно быть в разделители, к примеру //, позже покажу в примере. <br>\r\nВторой параметр функции ($replacement)– это строка, которая будет вставлена в то место, которое будет совпадать с регулярным выражением, само же совпадение будет удалено из строки.<br>\r\nТретий параметр ($subject) – это входящая строка или массив, с которым будут проводиться манипуляции, но сама строка останется не тронутой, если не будет присвоена сама себе конечно.<br>\r\nДалее в функции два необязательных параметра.<br>\r\nПервый параметр ($limit) задает максимальное количество замен. То есть, если необходимо провести замену в двух местах, то параметр должен быть равен 2. Если необходимо произвести все возможные замены, то значение должно быть (-1) или параметр должен отсутствовать.<br>\r\nНу и последний параметр, если будет указан в параметрах функции, является носителем того, сколько замен удалось совершить. Задается как переменная и читается так-же, как переменная, после, разумеется, отработки функции.<br>\r\nНу и наконец возвращаемое значение – это новая, переработанная строка.<br>\r\n<br>\r\n<i>Пример:</i> <a href=\"regular_expressions.php\" target=\"_blank\">…поупражняться с рабочей функцией можно тут: </a><br>\r\n<code>                <br>\r\n$pattern =’/[0-9]/’;<br>\r\n$replacement=’*’;<br>\r\n$subject=’EF43QREWFKHJ349088ASDEF’;<br>\r\n$result=preg_filter($pattern, $replacement, $subject);<br>\r\n</code><br>\r\nПосле отработки в переменной $result будет строка, в которой все цифры от 0 до 9 будут изменены на символы ‘*’.<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sfrJjRB9RIs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#', 'alfa54', 'phpregular'),
(5, 'Функция preg_quote()', 'Функция предназначена для экранирования служебных символов в тексте.<br>\r\nСлужебные символы – это символы, которые что-либо делают. К примеру, символ точка «.» в регулярном выражении означает любой символ, кроме переноса строки. Теперь представим, что Вы ищите в тексте словосочетание: «Пункт 1.2». <br>\r\n<img    src=\"https://a.radikal.ru/a22/2110/42/4ba69651b88d.jpg\" alt=\"экранирование\"><br>\r\n<br>\r\nТогда поисковая функция вместо точки будет подставлять любой символ кроме переноса строки, а это «Пункт 102», «Пункт 112» и так далее. Для того, чтобы этого избежать и необходимо экранировать служебные символы. Экранирование производится установкой обратного слеша перед каждым служебным символом. Если текст статический и небольшой, то можно — это сделать вручную один раз и не использовать функцию. В случае большого или динамического текста, который, к примеру, скачивается из интернета или вводится пользователем, пригодится функция накшталт preg_quote(). <br>\r\n<br>\r\nФункция preg_quote() считает служебными символами: . \\ + * ? [ ^ ] $ ( ) { } = ! &lt &gt | : - #. Перед каждым из этих символов будет поставлен обратный слеш и символ перестанет быть служебным. Если по какой-то причине необходимо расширить список служебных знаков, то в функции есть второй, не обязательный параметр.<br>\r\n<br>\r\nПосмотреть, как – это работает можно на странице <a href=\"regular_expressions.php\" target=\"_blank\"><b>              тут</b></a> выбрав данную функцию из всего списка функций и задав необходимые параметры. <br>\r\nСинтаксис:<br>\r\n<code>                 <br>\r\npreg_quote(string $str, ?string $delimiter = null): string<br>\r\n</code><br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/axH3EbjcD5E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#<br>\r\n', 'alfa54', 'phpregular'),
(6, 'Функция preg_grep().', 'Данная функция проверяет соответствие членов массива регулярному выражению и выводит в новый массив найденные члены. В качестве входящего параметра есть строка регулярного выражения и массив, в котором ищем совпадения. Есть у функции и третий, не обязательный параметр, который определяет, что именно выводить в выходной массив. <br>\r\nФункция может выводить как те члены, в которых нашли совпадение, так и те члены массива, в котором не нашли совпадение. Собственно, для этих целей и используется третий параметр. По умолчанию в выходной массив попадут те члены массива, в которых нашли совпадения по шаблону.<br>\r\nСинтаксис.<br>\r\n<code>             <br>\r\n<br>\r\npreg_grep(string $pattern, array $array, int $flags = 0): array|false<br>\r\n</code><br>\r\nКак видно из синтаксиса, функция вернет массив с результатом или False (array|false), если что-то пошло не так.<br>\r\nПервым параметром идёт строка шаблона, регулярного выражения. Второй параметр – это и есть входящий массив, в котором будем что-то искать. Ну и собственно флаг, его можно не задавать, тогда в выходном массиве будут те члены массива, которые соответствуют шаблону, если значение флага будет PREG_GREP_INVERT, то в выходном массиве будут члены, которые не соответствуют шаблону.<br>\r\n<br>\r\n<a href=\"regular_expressions.php\" target=\"_blank\">Как функция работает на практике можно посмотреть тут:</a><br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YmSNmw9pyKc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#<br>\r\n<br>\r\n', 'alfa54', 'phpregular'),
(7, 'Функция preg_match().', 'Всем доброго времени суток. Небольшая статья о том, как работает данная функция. Поэкспериментировать можно на сайте в соответствующем разделе. В конце статьи есть видео инструкция по работе с функцией и где с ней можно поработать онлайн.<br>\r\n<br>\r\nФункция находит вхождения регулярного выражения в строку и записывает результаты в массив, если такой массив задан, в противном случае функция просто возвращает факт наличия или отсутствия такого вхождения.<br>\r\n<br>\r\nСинтаксис:<br>\r\n<code>   <br>\r\npreg_match($pattern, $subject, &$matches, $flags, $offset);<br>\r\n</code><br>\r\nКак видно функция возвращает целое число или логическое Ложь. Здесь следует обратить внимание на то, что проверять возврат нуля или false следует при помощи тройного знака «=», то есть «===» вместо обычного «==». Причина в том, что число 0 и значение false равны, если можно так сказать, по модулю. Тройное равно проверяет на соответствие не только значению, но и типу переменных. Целое число 0 !== false.<br>\r\n<br>\r\nПервый параметр $pattern определяет регулярное выражение. Второй параметр $subject задает входную строку, в которой ищем соответствия для нашего регулярного выражения. Обязательными параметрами в функции preg_match являются только эти два параметра, остальные можно пропустить. В этом случае можно лишь проверять сам факт вхождения или соответствия регулярного выражения части строки. Если соответствие нашли, то функция вернет цифру 1, если не нашли, то 0, если же произошла ошибка, то функция вернет false. Повторюсь, отличить 0 от false можно тройным знаком равно, вместо двойного.<br>\r\n<br>\r\nЕсли Вам необходимо работать с найденными вхождениями, то необходимо задать третий параметр – это массив. В зависимости от режима работы массив может быть двумерным или одномерным, функция сама его создает. На специальной странице нашего сайта можно посмотреть, как – это работает онлайн. В каких случаях массив будет каким зависит от флагов.<br>\r\n<br>\r\nТеперь рассмотрим немного флаги. У preg_match() флагов два: PREG_OFFSET_CAPTURE и PREG_UNMATCHED_AS_NULL. Можно, разумеется, использовать оба флага через вертикальную полосу «PREG_OFFSET_CAPTURE | PREG_UNMATCHED_AS_NULL». <br>\r\nКак было описано выше, если Вам необходимо работать с вхождениями, которые были найдены, Вам нужно задать массив третьим параметром. Если Вы это сделали, то можете расширить функционал работы с массивом используя данные флаги. <br>\r\nЕсли флаги не задавать, то на выходе получите одномерный массив с найденными вхождениями. Флаг PREG_OFFSET_CAPTURE используется для того, чтобы создать двумерный массив, в котором все нулевые члены будут содержать значения, а все первые члены будут показывать смещение найденного значения, ВНИМАНИЕ в байтах. В зависимости от кодировки одно и то же значение может иметь разное смещение. К примеру, латиница занимает 1 байт, а значит третий символ в строке находится на втором байте, отчет начинается с нуля. Если речь о кириллице, то размер символа равен 2 байтам и тогда третий символ в строке будет иметь смещение 4.<br>\r\nВсё это можно увидеть на тестовой странице сайта.<br>\r\n<br>\r\nНу и последний параметр  $offset задает то самое смещение, с которого следует начинать поиск соответствий. По умолчанию значение равно нулю, исчисление производится так-же в байтах, не в символах.<br>\r\n<br>\r\nОстается добавить то, что несмотря на то, что 3,4,5 параметры не обязательны, но для того, чтобы задать параметр 5 – смещение, следует задать флаг, иначе функция воспримет Ваше смещение за флаг и выдаст ошибку.<br>\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LsP_sDXyLHU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#', 'alfa54', 'phpregular'),
(8, 'Функция preg_match_all().', 'Всем доброго времени суток. Небольшая статья о том, как работает данная функция. Поэкспериментировать можно на сайте в соответствующем разделе. В конце статьи есть видео инструкция по работе с функцией и где с ней можно поработать онлайн.<br>\r\n<br>\r\nФункция находит вхождения регулярного выражения в строку и записывает результаты в массив, если такой массив задан, в противном случае функция просто возвращает число найденных вхождений.<br>\r\n<br>\r\nСинтаксис:<br>\r\n<code>           <br>\r\npreg_match_all($pattern, $subject, &$matches, $flags, $offset);<br>\r\n</code><br>\r\nФункция возвращает число найденных вхождений, либо false в случае ошибки. Если вхождений не найдено, то функция возвращает цифру 0. Написано в документации и то, что функция умеет возвращать значение NULL, однако, не указано в каких случаях.<br>\r\n<br>\r\nВходные параметры функции такие-же, как и у preg_match(), но другие флаги.<br>\r\nПервый параметр задает регулярное выражение, второй параметр – это строка, в которой ищем совпадения по регулярному выражению. Этих двух параметров достаточно, для запуска функции, остальные же параметры добавляются по необходимости.<br>\r\nТретий параметр – это массив, в котором будут помещены результаты работы функции, напоминаю, функция возвращает лишь число вхождений.<br>\r\nЧетвертый параметр – это флаг, у функции preg_match_all() из 4. Рассмотрим ниже.<br>\r\nПоследний параметр – это смещение от начала строки в байтах, на случай если поиск необходимо начинать не с начала строки. Если используете не однобайтовую котировку, то – это следует учитывать. Так-же следует помнить, что хоть задание флагов не обязательно, но при задании смещения необходимо задавать и флаг, иначе функция посчитает смещение флагом и выдаст ошибку, либо отработает не так, как ожидалось, если смещение совпадет со значением флага.<br>\r\n<br>\r\nЧто касается флагов.<br>\r\nПервый флаг и флаг по умолчанию – это PREG_PATTERN_ORDER. Если указан данный флаг, то в массиве найденные совпадения будут выстроены таким образом, что в нулевом элементе будут находиться полные совпадения шаблона, а в следующих элементах массива будут расположены найденные подмаски шаблона. <br>\r\nВторой флаг – это PREG_SET_ORDER. Если он задан, то в нулевом элементе массива будет содержаться первый набор вхождений, в первом элементе массива второй набор вхождений и так далее.<br>\r\nЕсли задать третий флаг: PREG_OFFSET_CAPTURE, то для всех вхождений будет указано их смещение, то есть массив будет содержать не данные о вхождениях, а массив с данными о вхождениях и смещениях. По-простому массив станет двумерным и каждое вхождение будет указано в нулевой ячейке($matches[x][0]), а смещение в первой ячейке($matches[x][1]). <br>\r\nПоследний флаг PREG_UNMATCHED_AS_NULL делает так, что не совпадающие маски будут обозначены не пустыми строками, а значениями NULL.<br>\r\nРазумеется, все флаги можно комбинировать акромя первого и второго. В функции из двух первых флагов может быть задан только один. В программе тестирования на этом сайте первый параметр в приоритете и, если он задан, второй будет проигнорирован. В реальности будет выдана ошибка.<br>\r\n<br>\r\nНиже можно посмотреть видео с тестированием функции, либо самому её протестировать на соответствующей <a href=\"http://dfdx.uxp.ru/regular_expressions.php\">странице нашего сайта.</a><br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WvL9-Pj2JdA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#', 'alfa54', 'phpregular'),
(9, 'Функция preg_split().', 'Всем доброго времени суток. Небольшая статья о том, как работает функция preg_split(). Поэкспериментировать можно на сайте в соответствующем разделе. В конце статьи есть видео инструкция по работе с функцией и где с ней можно поработать онлайн.<br>\r\n<br>\r\nФункция разбивает строку на подстроки, используя в качестве разделителя регулярное выражение.<br>\r\n<br>\r\nСинтаксис:<br>\r\n<code>  <br>\r\npreg_split ($pattern,$subject,$limit,$flags): array|false<br>\r\n</code><br>\r\nФункция возвращает массив с подстроками.<br>\r\n<br>\r\n$pattern – данный параметр задает регулярное выражение, которое и будет тем признаком, по которому входная строка будет разбита на подстроки. <br>\r\n<br>\r\n$subject – строка, которую следует разбить на подстроки и результат поместить в выходной массив.<br>\r\n<br>\r\n$limit – данный параметр задает максимальное число подстрок в результирующем массиве. Если значение равно -1, то строка будет разбита по всем найденным вхождениям регулярного выражения. Если значение будет больше, чем -1, то в результирующем массиве будет только $limit подстрок, при этом в последнюю подстроку войдёт оставшаяся часть строки вне зависимости от того есть ли там ещё вхождения регулярного выражения или нет.<br>\r\n<br>\r\nЧто касается флагов.<br>\r\nУ функции preg_split() есть три флага. Комбинировать флаги можно используя вертикальный слеш |.<br>\r\n<br>\r\nPREG_SPLIT_NO_EMPTY – если задан этот флаг, то в выходном массиве будут только не пустые строки. В видео ролике показан вариант появления в массиве пустой строки.<br>\r\n<br>\r\nPREG_SPLIT_DELIM_CAPTURE – данный флаг используется тогда, когда в регулярном выражении применяются круглые скобки. Благодаря этому флагу в массив выведется так-же найденное регулярное выражение, по которому произошло деление строки. Данный момент тоже хорошо показан в видеоролике.<br>\r\n<br>\r\nPREG_SPLIT_OFFSET_CAPTURE – флаг используется тогда, когда необходимо знать положение или смещение каждой найденной подстроки. Смещение указывается в дополнительной ячейке массива в байтах. Первый символ строки находимся на нулевом байте. Если шрифт строки занимает не один байт, к примеру кириллица, то этот момент так-же следует учитывать. <br>\r\n<br>\r\nНиже можно посмотреть видео с тестированием функции, либо самому её протестировать на <a href=\"http://dfdx.uxp.ru/regular_expressions.php\">соответствующей странице нашего сайта.</a><br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qHAWhKzt2JU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe><br>\r\n#phpregular#', 'alfa54', 'phpregular');

-- --------------------------------------------------------

--
-- Структура таблицы `blocked_list_dobavit_mat`
--

CREATE TABLE `blocked_list_dobavit_mat` (
  `id` int(11) DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `blocked_list_dobavit_mat`
--

INSERT INTO `blocked_list_dobavit_mat` (`id`, `login`) VALUES
(2, 'Starki'),
(3, 'Stark'),
(37, 'alex25'),
(38, 'Nyna'),
(2, 'Starki'),
(3, 'Stark'),
(4, 'alex25'),
(5, 'alex25'),
(39, 'alfa54'),
(40, 'alfa54'),
(41, 'alfa54'),
(42, 'alfa54'),
(43, 'alfa54');

-- --------------------------------------------------------

--
-- Структура таблицы `dla_statusob_123`
--

CREATE TABLE `dla_statusob_123` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `dla_statusob_123`
--

INSERT INTO `dla_statusob_123` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'На Сайт', 'dfdx.php', 'dla_statusob_123');

-- --------------------------------------------------------

--
-- Структура таблицы `login`
--

CREATE TABLE `login` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `login`
--

INSERT INTO `login` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'login_status', 'text2', 'login_dfdx'),
(1, 'parol_status', 'text2', 'login_dfdx'),
(2, 'Вход', 'redaktor.php', 'login_dfdx'),
(3, 'Регистрация', 'redaktor.php', 'login_dfdx'),
(4, 'На сайт', 'dfdx.php', 'login_dfdx');

-- --------------------------------------------------------

--
-- Структура таблицы `maty`
--

CREATE TABLE `maty` (
  `mat` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `maty`
--

INSERT INTO `maty` (`mat`) VALUES
('гавно'),
('пизда'),
('чувак'),
('говно'),
('хуй'),
('хуя'),
('хую'),
('fuck'),
('хуйня'),
('нахуй'),
('похуй'),
('захуй'),
('хуёвый'),
('лох'),
('гнида'),
('заебись'),
('блять'),
('пиздабол'),
('жопа'),
('жопу'),
('залупа'),
('сучька'),
('сучка'),
('гавно'),
('пизда'),
('чувак'),
('говно'),
('хуй'),
('хуя'),
('хую'),
('fuck'),
('хуйня'),
('нахуй'),
('похуй'),
('захуй'),
('хуёвый'),
('лох'),
('гнида'),
('заебись'),
('блять'),
('пиздабол');

-- --------------------------------------------------------

--
-- Структура таблицы `mat_ot_polzovatelej`
--

CREATE TABLE `mat_ot_polzovatelej` (
  `mat` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `mat_ot_polzovatelej`
--

INSERT INTO `mat_ot_polzovatelej` (`mat`, `login`) VALUES
('Кракозябра', 'GREYFOX'),
('жоппа', 'Indi');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_maty`
--

CREATE TABLE `menu_maty` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_maty`
--

INSERT INTO `menu_maty` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'mat_text', 'text', 'menu_maty'),
(1, 'Показать', 'redaktor.php', 'menu_maty'),
(2, 'Добавить', 'redaktor.php', 'menu_maty'),
(3, 'Удалить мат', 'redaktor.php', 'menu_maty_kill_mat'),
(4, 'Проверить слово', 'redaktor.php', 'menu_maty_prowerit_slowo'),
(5, 'Показать не маты', 'redaktor.php', 'menu_nematy_pokaz'),
(6, 'Добавить не мат', 'redaktor.php', 'menu_maty_dobavit'),
(7, 'Удалить не мат', 'redaktor.php', 'menu_maty_kill'),
(8, 'От пользователей', 'redaktor.php', 'menu_maty_ot_polzovatel');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_parametr_tab`
--

CREATE TABLE `menu_parametr_tab` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_parametr_tab`
--

INSERT INTO `menu_parametr_tab` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'stolbcov', 'text', 'menu_parametr_tab'),
(1, 'strok', 'text', 'menu_parametr_tab'),
(2, 'Ок', 'redaktor.php', 'menu_parametr_tab'),
(3, 'Отмена', 'redaktor.php', 'menu_parametr_tab'),
(0, 'stolbcov', 'text', 'menu_parametr_tab'),
(1, 'strok', 'text', 'menu_parametr_tab'),
(2, 'Ок', 'redaktor.php', 'menu_parametr_tab'),
(3, 'Отмена', 'redaktor.php', 'menu_parametr_tab');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_up_dfdx`
--

CREATE TABLE `menu_up_dfdx` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_up_dfdx`
--

INSERT INTO `menu_up_dfdx` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(1, 'Регистрация', 'redaktor.php', 'menu_up_dfdx btn', '-0'),
(4, 'Вход', 'dfdx.php', 'menu_up_dfdx btn', '-0'),
(5, 'Выход', 'dfdx.php', 'menu_up_dfdx btn', '-12345'),
(6, 'Настройки', 'redaktor.php', 'menu_up_dfdx btn', '-45'),
(2, 'login', 'text2', 'menu_up_dfdx', '-0'),
(3, 'parol', 'text2P', 'menu_up_dfdx', '-0'),
(0, 'Главная', 'dfdx.php', 'menu_up_dfdx btn', '-012345');

-- --------------------------------------------------------

--
-- Структура таблицы `monety_dfdx`
--

CREATE TABLE `monety_dfdx` (
  `login` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `monet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `monety_dfdx`
--

INSERT INTO `monety_dfdx` (`login`, `monet`) VALUES
('login', 0),
('alfa54', 32270);

-- --------------------------------------------------------

--
-- Структура таблицы `nastrolkiredaktora`
--

CREATE TABLE `nastrolkiredaktora` (
  `imiePosTabl` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `nastrolkiredaktora`
--

INSERT INTO `nastrolkiredaktora` (`imiePosTabl`) VALUES
('menu_up_dfdx');

-- --------------------------------------------------------

--
-- Структура таблицы `nie_maty`
--

CREATE TABLE `nie_maty` (
  `nie_mat` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `nie_maty`
--

INSERT INTO `nie_maty` (`nie_mat`) VALUES
('подстрахуй'),
('страхуй'),
('застрахуй');

-- --------------------------------------------------------

--
-- Структура таблицы `podtverdit`
--

CREATE TABLE `podtverdit` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `podtverdit`
--

INSERT INTO `podtverdit` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'kod', 'text2', 'podtverdit btn btn-info'),
(1, 'Подтвердить запись', 'redaktor.php', 'podtverdit btn btn-info'),
(2, 'Найти письмо', 'redaktor.php', 'podtverdit btn btn-info'),
(3, 'Выйти', 'starki.php', 'podtverdit btn btn-info'),
(4, 'На сайт', 'starki.php', 'podtverdit btn btn-info');

-- --------------------------------------------------------

--
-- Структура таблицы `redaktor_down`
--

CREATE TABLE `redaktor_down` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redaktor_down`
--

INSERT INTO `redaktor_down` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'Обновить дату изменения сайта', 'redaktor.php', 'redaktor_down'),
(1, 'Обновить дату изменения базы данных', 'redaktor.php', 'redaktor_down'),
(2, 'Настроить редактор', 'redaktor.php', 'redaktor_down');

-- --------------------------------------------------------

--
-- Структура таблицы `redaktor_nastr7`
--

CREATE TABLE `redaktor_nastr7` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redaktor_nastr7`
--

INSERT INTO `redaktor_nastr7` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'text_redaktor_nastr', 'text', 'redaktor_nastr_text', '-45'),
(1, 'Загрузить', 'redaktor.php', 'redaktor_nastr_zagruzit', '-45'),
(2, 'Создать таблицу', 'redaktor.php', 'redaktor_nastr_soz_tab', '-5'),
(3, 'Меню 3-4', 'redaktor.php', 'redaktor_nastr_soz_menu', '-5'),
(4, 'Список таблиц', 'redaktor.php', 'redaktor_nastr_spis_tab', '-45'),
(5, 'Удалить', 'redaktor.php', 'redaktor_nastr_udalit', '-5'),
(6, 'Меню 5-9', 'redaktor.php', 'redaktor_nastr_menu_5', '-5'),
(7, 'Статус', 'redaktor.php', 'redaktor_nastr_status', '-54'),
(8, 'Маты', 'redaktor.php', 'redaktor_nastr7_maty', '-54'),
(9, 'Статистика', 'redaktor.php', 'redaktor_nastr_statistik', '-45');

-- --------------------------------------------------------

--
-- Структура таблицы `redaktor_up`
--

CREATE TABLE `redaktor_up` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redaktor_up`
--

INSERT INTO `redaktor_up` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'Редактор', 'redaktor.php', 'redaktor_up'),
(1, 'Сайт', 'dfdx.php', 'redaktor_up'),
(2, 'Выйти', 'redaktor.php', 'redaktor_up'),
(3, 'Создать страницу', 'rdNovaStr.php', 'redaktor_up_1');

-- --------------------------------------------------------

--
-- Структура таблицы `redakt_profil`
--

CREATE TABLE `redakt_profil` (
  `id_tab_gl` int(11) DEFAULT NULL,
  `poz1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `poz2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `poz3` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `poz4` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redakt_profil`
--

INSERT INTO `redakt_profil` (`id_tab_gl`, `poz1`, `poz2`, `poz3`, `poz4`) VALUES
(1, 'img', 'text', 'checkbox', 'NULL'),
(2, 'p', 'text', 'checkbox', 'NULL'),
(3, 'p', 'text', 'checkbox', 'NULL'),
(4, 'textarea', 'p', 'checkbox', 'NULL'),
(5, 'p', 'text', 'checkbox', 'NULL'),
(6, 'p', 'text', 'checkbox', 'NULL'),
(7, 'p', 'text', 'checkbox', 'NULL'),
(8, 'p', 'text', 'checkbox', 'NULL'),
(9, 'p', 'text', 'checkbox', 'NULL'),
(10, 'p', 'text', 'checkbox', 'NULL'),
(11, 'NULL', 'NULL', 'NULL', 'NULL'),
(12, 'NULL', 'NULL', 'NULL', 'NULL'),
(13, 'NULL', 'NULL', 'NULL', 'NULL'),
(14, 'p', 'text', 'checkbox', 'NULL'),
(15, 'p', 'text', 'checkbox', 'NULL'),
(16, 'NULL', 'NULL', 'NULL', 'NULL'),
(17, 'NULL', 'NULL', 'NULL', 'NULL'),
(18, 'NULL', 'NULL', 'NULL', 'NULL'),
(19, 'NULL', 'NULL', 'NULL', 'NULL'),
(20, 'checkbox', 'NULL', 'NULL', 'button');

-- --------------------------------------------------------

--
-- Структура таблицы `redakt_profil_data`
--

CREATE TABLE `redakt_profil_data` (
  `id` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `stolb` int(11) DEFAULT NULL,
  `info` varchar(6000) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redakt_profil_data`
--

INSERT INTO `redakt_profil_data` (`id`, `str`, `stolb`, `info`, `login`) VALUES
(132, 3, 1, '', 'alfa54'),
(137, 6, 1, '', 'alfa54'),
(139, 7, 1, '', 'alfa54'),
(141, 8, 1, '', 'alfa54'),
(143, 9, 1, '', 'alfa54'),
(145, 10, 1, '', 'alfa54'),
(147, 11, 1, '', 'alfa54'),
(148, 11, 2, '', 'alfa54'),
(149, 12, 1, '', 'alfa54'),
(150, 12, 2, '', 'alfa54'),
(151, 13, 1, '', 'alfa54'),
(152, 13, 2, '', 'alfa54'),
(153, 14, 1, '', 'alfa54'),
(378, 5, 1, 'Мой сайт', 'alfa54'),
(499, 1, 2, 'Введите адрес изображения', 'Модератор'),
(500, 1, 3, '-', 'Модератор'),
(501, 2, 2, 'Введите имя', 'Модератор'),
(502, 2, 3, '-', 'Модератор'),
(503, 3, 2, 'Введите фамилию', 'Модератор'),
(504, 3, 3, '-', 'Модератор'),
(505, 4, 1, 'Немного о себе', 'Модератор'),
(506, 4, 3, '-', 'Модератор'),
(507, 5, 2, 'ссылка на сайт', 'Модератор'),
(508, 5, 3, '-', 'Модератор'),
(509, 6, 2, 'Моя почта', 'Модератор'),
(510, 6, 3, '-', 'Модератор'),
(511, 7, 2, 'Мой Skype', 'Модератор'),
(512, 7, 3, '-', 'Модератор'),
(513, 8, 2, 'Мой WhatsApp', 'Модератор'),
(514, 8, 3, '-', 'Модератор'),
(515, 9, 2, 'моя тоже блин телега', 'Модератор'),
(516, 9, 3, '-s1s2s3s4s5s9', 'Модератор'),
(517, 10, 3, '-', 'Модератор'),
(518, 11, 3, '-', 'Модератор'),
(519, 12, 3, '-', 'Модератор'),
(520, 13, 3, '-', 'Модератор'),
(521, 14, 3, '-', 'Модератор'),
(522, 20, 1, '-', 'Модератор'),
(575, 1, 2, 'https://cspromogame.ru//storage/upload_images/avatars/3958.jpg', 'alfa54'),
(576, 1, 3, '-s1s2s3s4s5s9', 'alfa54'),
(577, 2, 2, 'Александр', 'alfa54'),
(578, 2, 3, '-s1s2s3s4s5s9', 'alfa54'),
(579, 3, 2, 'Ищук', 'alfa54'),
(580, 3, 3, '-s1s2s3s4s5s9', 'alfa54'),
(581, 4, 1, 'Кто тут главный? Я тут главный.', 'alfa54'),
(582, 4, 3, '-s1s2s3s4s5s9', 'alfa54'),
(583, 5, 2, 'http://google.com', 'alfa54'),
(584, 5, 3, '-s1s2s3s4s5s9', 'alfa54'),
(585, 6, 2, 'alexmway@mail.ru', 'alfa54'),
(586, 6, 3, '-s1s2s3s4s5s9', 'alfa54'),
(587, 7, 2, 'Лидер 25', 'alfa54'),
(588, 7, 3, '-s1s2s3s4s5s9', 'alfa54'),
(589, 8, 2, 'Что ап?', 'alfa54'),
(590, 8, 3, '-s1s2s3s4s5s9', 'alfa54'),
(591, 9, 2, 'моя телега', 'alfa54'),
(592, 9, 3, '-s1s2s3s4s5s9', 'alfa54'),
(593, 10, 2, 'а фигушки', 'alfa54'),
(594, 10, 3, '-s1s2s3s4s5s9', 'alfa54'),
(595, 11, 3, '-s1s2s3s4s5s9', 'alfa54'),
(596, 12, 3, '-s1s2s3s4s5s9', 'alfa54'),
(597, 13, 3, '-s1s2s3s4s5s9', 'alfa54'),
(598, 14, 2, 'ага ага', 'alfa54'),
(599, 14, 3, '-s1s2s3s4s5s9', 'alfa54'),
(600, 15, 2, 'неа', 'alfa54'),
(601, 15, 3, '-s1s2s3s4s5s9', 'alfa54'),
(602, 20, 1, '-', 'alfa54'),
(603, 1, 2, 'https://cspromogame.ru//storage/upload_images/avatars/838.jpg', 'Starki'),
(604, 1, 3, '-s1s2s3s4s5s9', 'Starki'),
(605, 2, 2, 'Имя', 'Starki'),
(606, 2, 3, '-s1s2s3s4s5s9', 'Starki'),
(607, 3, 2, 'Введите фамилию', 'Starki'),
(608, 3, 3, '-', 'Starki'),
(609, 4, 1, 'Немного о себе', 'Starki'),
(610, 4, 3, '-', 'Starki'),
(611, 5, 2, 'ссылка на сайт', 'Starki'),
(612, 5, 3, '-', 'Starki'),
(613, 6, 2, 'Моя почта', 'Starki'),
(614, 6, 3, '-', 'Starki'),
(615, 7, 2, 'Мой Skype', 'Starki'),
(616, 7, 3, '-', 'Starki'),
(617, 8, 2, 'Мой WhatsApp', 'Starki'),
(618, 8, 3, '-', 'Starki'),
(619, 9, 2, 'Мой Telegram', 'Starki'),
(620, 9, 3, '-', 'Starki'),
(621, 10, 2, 'Мой Viber', 'Starki'),
(622, 10, 3, '-', 'Starki'),
(623, 14, 2, 'Мой Youtube', 'Starki'),
(624, 14, 3, '-', 'Starki'),
(625, 15, 2, 'Мой facebook', 'Starki'),
(626, 15, 3, '-', 'Starki'),
(627, 20, 1, '-', 'Starki');

-- --------------------------------------------------------

--
-- Структура таблицы `redakt_profil_status`
--

CREATE TABLE `redakt_profil_status` (
  `stolb` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redakt_profil_status`
--

INSERT INTO `redakt_profil_status` (`stolb`, `str`, `status`) VALUES
(4, 20, '-s1s2s3s4s5s9'),
(4, 1, '-s1s2s3s4s5s9'),
(3, 1, '-s1s2s3s4s5s9'),
(3, 2, '-s1s2s3s4s5s9'),
(2, 1, '-s1s2s3s4s5s9'),
(4, 2, '-'),
(0, 0, '-s1s2s3s4s5s9'),
(2, 2, '-s1s2s3s4s5s9'),
(1, 2, '-s1s2s3s4s5s9'),
(1, 3, '-s1s2s3s4s5s9'),
(2, 3, '-s1s2s3s4s5s9'),
(3, 3, '-s1s2s3s4s5s9'),
(3, 4, '-s1s2s3s4s5s9'),
(3, 5, '-s1s2s3s4s5s9'),
(3, 6, '-s1s2s3s4s5s9'),
(3, 7, '-s1s2s3s4s5s9'),
(3, 8, '-s1s2s3s4s5s9'),
(3, 9, '-s1s2s3s4s5s9'),
(3, 10, '-s1s2s3s4s5s9'),
(3, 14, '-s1s2s3s4s5s9'),
(1, 4, '-s1s2s3s4s5s9'),
(2, 4, '-s1s2s3s4s5s9'),
(2, 5, '-s1s2s3s4s5s9'),
(1, 5, '-s1s2s3s4s5s9'),
(1, 6, '-s1s2s3s4s5s9'),
(2, 6, '-s1s2s3s4s5s9'),
(1, 7, '-s1s2s3s4s5s9'),
(2, 7, '-s1s2s3s4s5s9'),
(1, 8, '-s1s2s3s4s5s9'),
(1, 9, '-s1s2s3s4s5s9'),
(2, 9, '-s1s2s3s4s5s9'),
(2, 8, '-s1s2s3s4s5s9'),
(1, 10, '-s1s2s3s4s5s9'),
(2, 10, '-s1s2s3s4s5s9'),
(1, 15, '-s1s2s3s4s5s9'),
(2, 15, '-s1s2s3s4s5s9'),
(2, 14, '-s1s2s3s4s5s9'),
(3, 15, '-s1s2s3s4s5s9'),
(1, 13, '-'),
(2, 13, '-'),
(3, 13, '-s1s2s3s4s5s9'),
(2, 12, '-'),
(3, 12, '-s1s2s3s4s5s9'),
(1, 11, '-'),
(2, 11, '-'),
(3, 11, '-s1s2s3s4s5s9'),
(1, 14, '-s1s2s3s4s5s9'),
(1, 12, '-s1s2s3s4s5s9'),
(1, 1, '-s1s2s3s4s5s9');

-- --------------------------------------------------------

--
-- Структура таблицы `redakt_profil_tegi`
--

CREATE TABLE `redakt_profil_tegi` (
  `stolb` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `name_teg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name_attrib` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `text` varchar(6000) COLLATE utf8_bin DEFAULT NULL,
  `string_ili_int` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `redakt_profil_tegi`
--

INSERT INTO `redakt_profil_tegi` (`stolb`, `str`, `name_teg`, `name_attrib`, `text`, `string_ili_int`) VALUES
(0, 0, 'form', 'action', 'starki.php', 0),
(0, 0, 'form', 'method', 'POST', 0),
(2, 1, 'text', 'name', 'adresFoto', 0),
(2, 1, 'text', 'value', 'Введите адрес изображения', 0),
(1, 1, 'img', 'src', 'image/anonim.jpg', 0),
(4, 20, 'button', 'name', 'submit_redakt_profil', 0),
(4, 20, 'button', 'class', 'submit_redakt_profil', 0),
(4, 20, 'button', 'текст на кнопке', 'Отправить', 0),
(2, 1, 'text', 'size', '35', 0),
(4, 20, 'button', 'value', 'Отправить', 0),
(1, 1, 'img', 'class', 'imgProfil urlurlFoto', 0),
(3, 1, 'checkbox', 'текст на кнопке', 'привет', 0),
(3, 1, 'checkbox', 'Текст 1', 'Гость', 0),
(3, 1, 'checkbox', 'Текст 2', 'Пользователь', 0),
(3, 1, 'checkbox', 'Текст 3', 'Редактор', 0),
(3, 1, 'checkbox', 'Текст 4', 'Подписчик', 0),
(3, 1, 'checkbox', 'Текст 5', 'Модератор', 0),
(3, 1, 'checkbox', 'checked', '', 0),
(3, 1, 'checkbox', 'id', 'statusStr1Stolb3', 0),
(3, 1, 'checkbox', 'for', 'statusStr1Stolb3', 0),
(3, 1, 'checkbox', 'name', 'N_statusStr1Stolb3', 0),
(3, 1, 'checkbox', 'value', 'V_statusStr1Stolb3', 0),
(3, 1, 'checkbox', 'Текст 6', 'Админ', 0),
(3, 1, 'checkbox', 'class', 'statusProf', 0),
(3, 1, 'checkbox', 'class для label', 'statusProfPunkt', 0),
(3, 1, 'checkbox', 'Текст 7', 'Не подтвердил', 0),
(3, 1, 'checkbox', 'блок', '<input type=\"checkbox\" checked id=\"statusStr1Stolb3_1\" name=\"N_statusStr1Stolb3_1\" value=\"V_statusStr1Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_1\">Гость</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_2\" name=\"N_statusStr1Stolb3_2\" value=\"V_statusStr1Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_3\" name=\"N_statusStr1Stolb3_3\" value=\"V_statusStr1Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_3\">Редактор</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_4\" name=\"N_statusStr1Stolb3_4\" value=\"V_statusStr1Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_5\" name=\"N_statusStr1Stolb3_5\" value=\"V_statusStr1Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_5\">Модератор</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_6\" name=\"N_statusStr1Stolb3_6\" value=\"V_statusStr1Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_6\">Админ</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_7\" name=\"N_statusStr1Stolb3_7\" value=\"V_statusStr1Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 2, 'checkbox', 'id', 'statusStr2Stolb3', 0),
(3, 2, 'checkbox', 'for', 'statusStr2Stolb3', 0),
(3, 2, 'checkbox', 'name', 'N_statusStr2Stolb3', 0),
(3, 2, 'checkbox', 'value', 'V_statusStr2Stolb3', 0),
(3, 2, 'checkbox', 'Текст 1', 'Гость', 0),
(3, 2, 'checkbox', 'Текст 2', 'Пользователь', 0),
(3, 2, 'checkbox', 'Текст 3', 'Редактор', 0),
(3, 2, 'checkbox', 'Текст 4', 'Подписчик', 0),
(3, 2, 'checkbox', 'Текст 5', 'Модератор', 0),
(3, 2, 'checkbox', 'Текст 6', 'Админ', 0),
(3, 2, 'checkbox', 'Текст 7', 'Не подтвердил', 0),
(2, 2, 'text', 'name', 'nameProfil', 0),
(2, 2, 'text', 'value', 'Введите имя', 0),
(3, 2, 'checkbox', 'class для label', 'statusProfPunkt', 0),
(3, 1, 'checkbox', 'число строк', '7', 0),
(3, 1, 'checkbox', 'блок', '<input type=\"checkbox\" checked id=\"statusStr1Stolb3_1\" name=\"N_statusStr1Stolb3_1\" value=\"V_statusStr1Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_1\">Гость</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_2\" name=\"N_statusStr1Stolb3_2\" value=\"V_statusStr1Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_3\" name=\"N_statusStr1Stolb3_3\" value=\"V_statusStr1Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_3\">Редактор</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_4\" name=\"N_statusStr1Stolb3_4\" value=\"V_statusStr1Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_5\" name=\"N_statusStr1Stolb3_5\" value=\"V_statusStr1Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_5\">Модератор</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_6\" name=\"N_statusStr1Stolb3_6\" value=\"V_statusStr1Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_6\">Админ</label><br><input type=\"checkbox\" checked id=\"statusStr1Stolb3_7\" name=\"N_statusStr1Stolb3_7\" value=\"V_statusStr1Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr1Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 2, 'checkbox', 'class', 'statusProf', 0),
(3, 2, 'checkbox', 'число строк', '7', 0),
(3, 2, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr2Stolb3_1\" name=\"N_statusStr2Stolb3_1\" value=\"V_statusStr2Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_2\" name=\"N_statusStr2Stolb3_2\" value=\"V_statusStr2Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_3\" name=\"N_statusStr2Stolb3_3\" value=\"V_statusStr2Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_4\" name=\"N_statusStr2Stolb3_4\" value=\"V_statusStr2Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_5\" name=\"N_statusStr2Stolb3_5\" value=\"V_statusStr2Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_6\" name=\"N_statusStr2Stolb3_6\" value=\"V_statusStr2Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr2Stolb3_7\" name=\"N_statusStr2Stolb3_7\" value=\"V_statusStr2Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr2Stolb3_7\">Не подтвердил</label><br>', NULL),
(2, 1, 'text', 'class', 'urlFoto urlurlFoto', 0),
(0, 0, 'form', 'ширина столбцов bootstrap', '3-6-2-1', 0),
(0, 0, 'form', 'разделение блоков с HR', '1', 0),
(0, 0, 'form', 'разделение блоков с BR', '1', 0),
(1, 2, 'p', 'источник текста', '2-2', 0),
(1, 2, 'p', 'class', 'nameProfil', 0),
(1, 3, 'p', 'class', 'nameProfil', 0),
(1, 3, 'p', 'источник текста', '3-2', 0),
(2, 3, 'text', 'value', 'Введите фамилию', 0),
(2, 3, 'text', 'name', 'profilName2', 0),
(3, 3, 'checkbox', 'очистить аттрибуты', '', 0),
(3, 3, 'checkbox', 'id', 'statusStr3Stolb3', NULL),
(3, 3, 'checkbox', 'for', 'statusStr3Stolb3', NULL),
(3, 3, 'checkbox', 'name', 'N_statusStr3Stolb3', NULL),
(3, 3, 'checkbox', 'value', 'V_statusStr3Stolb3', NULL),
(3, 3, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 3, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 3, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 3, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 3, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 3, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 3, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 3, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 3, 'checkbox', 'class', 'statusProf', NULL),
(3, 3, 'checkbox', 'число строк', '7', NULL),
(3, 3, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr3Stolb3_1\" name=\"N_statusStr3Stolb3_1\" value=\"V_statusStr3Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_2\" name=\"N_statusStr3Stolb3_2\" value=\"V_statusStr3Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_3\" name=\"N_statusStr3Stolb3_3\" value=\"V_statusStr3Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_4\" name=\"N_statusStr3Stolb3_4\" value=\"V_statusStr3Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_5\" name=\"N_statusStr3Stolb3_5\" value=\"V_statusStr3Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_6\" name=\"N_statusStr3Stolb3_6\" value=\"V_statusStr3Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr3Stolb3_7\" name=\"N_statusStr3Stolb3_7\" value=\"V_statusStr3Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr3Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 3, 'checkbox', 'импорт из клетки ?-?', '2-3', 0),
(3, 4, 'checkbox', 'очистить аттрибуты', '', 0),
(3, 4, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 4, 'checkbox', 'id', 'statusStr4Stolb3', NULL),
(3, 4, 'checkbox', 'for', 'statusStr4Stolb3', NULL),
(3, 4, 'checkbox', 'name', 'N_statusStr4Stolb3', NULL),
(3, 4, 'checkbox', 'value', 'V_statusStr4Stolb3', NULL),
(3, 4, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 4, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 4, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 4, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 4, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 4, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 4, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 4, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 4, 'checkbox', 'class', 'statusProf', NULL),
(3, 4, 'checkbox', 'число строк', '7', NULL),
(3, 4, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr4Stolb3_1\" name=\"N_statusStr4Stolb3_1\" value=\"V_statusStr4Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_2\" name=\"N_statusStr4Stolb3_2\" value=\"V_statusStr4Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_3\" name=\"N_statusStr4Stolb3_3\" value=\"V_statusStr4Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_4\" name=\"N_statusStr4Stolb3_4\" value=\"V_statusStr4Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_5\" name=\"N_statusStr4Stolb3_5\" value=\"V_statusStr4Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_6\" name=\"N_statusStr4Stolb3_6\" value=\"V_statusStr4Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr4Stolb3_7\" name=\"N_statusStr4Stolb3_7\" value=\"V_statusStr4Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr4Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 4, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 4, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 5, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 5, 'checkbox', 'id', 'statusStr5Stolb3', NULL),
(3, 5, 'checkbox', 'for', 'statusStr5Stolb3', NULL),
(3, 5, 'checkbox', 'name', 'N_statusStr5Stolb3', NULL),
(3, 5, 'checkbox', 'value', 'V_statusStr5Stolb3', NULL),
(3, 5, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 5, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 5, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 5, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 5, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 5, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 5, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 5, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 5, 'checkbox', 'class', 'statusProf', NULL),
(3, 5, 'checkbox', 'число строк', '7', NULL),
(3, 5, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr5Stolb3_1\" name=\"N_statusStr5Stolb3_1\" value=\"V_statusStr5Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_2\" name=\"N_statusStr5Stolb3_2\" value=\"V_statusStr5Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_3\" name=\"N_statusStr5Stolb3_3\" value=\"V_statusStr5Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_4\" name=\"N_statusStr5Stolb3_4\" value=\"V_statusStr5Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_5\" name=\"N_statusStr5Stolb3_5\" value=\"V_statusStr5Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_6\" name=\"N_statusStr5Stolb3_6\" value=\"V_statusStr5Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr5Stolb3_7\" name=\"N_statusStr5Stolb3_7\" value=\"V_statusStr5Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr5Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 5, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 5, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 6, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 6, 'checkbox', 'id', 'statusStr6Stolb3', NULL),
(3, 6, 'checkbox', 'for', 'statusStr6Stolb3', NULL),
(3, 6, 'checkbox', 'name', 'N_statusStr6Stolb3', NULL),
(3, 6, 'checkbox', 'value', 'V_statusStr6Stolb3', NULL),
(3, 6, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 6, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 6, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 6, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 6, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 6, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 6, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 6, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 6, 'checkbox', 'class', 'statusProf', NULL),
(3, 6, 'checkbox', 'число строк', '7', NULL),
(3, 6, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr6Stolb3_1\" name=\"N_statusStr6Stolb3_1\" value=\"V_statusStr6Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_2\" name=\"N_statusStr6Stolb3_2\" value=\"V_statusStr6Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_3\" name=\"N_statusStr6Stolb3_3\" value=\"V_statusStr6Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_4\" name=\"N_statusStr6Stolb3_4\" value=\"V_statusStr6Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_5\" name=\"N_statusStr6Stolb3_5\" value=\"V_statusStr6Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_6\" name=\"N_statusStr6Stolb3_6\" value=\"V_statusStr6Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr6Stolb3_7\" name=\"N_statusStr6Stolb3_7\" value=\"V_statusStr6Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr6Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 6, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 6, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 7, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 7, 'checkbox', 'id', 'statusStr7Stolb3', NULL),
(3, 7, 'checkbox', 'for', 'statusStr7Stolb3', NULL),
(3, 7, 'checkbox', 'name', 'N_statusStr7Stolb3', NULL),
(3, 7, 'checkbox', 'value', 'V_statusStr7Stolb3', NULL),
(3, 7, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 7, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 7, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 7, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 7, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 7, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 7, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 7, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 7, 'checkbox', 'class', 'statusProf', NULL),
(3, 7, 'checkbox', 'число строк', '7', NULL),
(3, 7, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr7Stolb3_1\" name=\"N_statusStr7Stolb3_1\" value=\"V_statusStr7Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_2\" name=\"N_statusStr7Stolb3_2\" value=\"V_statusStr7Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_3\" name=\"N_statusStr7Stolb3_3\" value=\"V_statusStr7Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_4\" name=\"N_statusStr7Stolb3_4\" value=\"V_statusStr7Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_5\" name=\"N_statusStr7Stolb3_5\" value=\"V_statusStr7Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_6\" name=\"N_statusStr7Stolb3_6\" value=\"V_statusStr7Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr7Stolb3_7\" name=\"N_statusStr7Stolb3_7\" value=\"V_statusStr7Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr7Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 7, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 7, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 8, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 8, 'checkbox', 'id', 'statusStr8Stolb3', NULL),
(3, 8, 'checkbox', 'for', 'statusStr8Stolb3', NULL),
(3, 8, 'checkbox', 'name', 'N_statusStr8Stolb3', NULL),
(3, 8, 'checkbox', 'value', 'V_statusStr8Stolb3', NULL),
(3, 8, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 8, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 8, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 8, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 8, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 8, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 8, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 8, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 8, 'checkbox', 'class', 'statusProf', NULL),
(3, 8, 'checkbox', 'число строк', '7', NULL),
(3, 8, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr8Stolb3_1\" name=\"N_statusStr8Stolb3_1\" value=\"V_statusStr8Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_2\" name=\"N_statusStr8Stolb3_2\" value=\"V_statusStr8Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_3\" name=\"N_statusStr8Stolb3_3\" value=\"V_statusStr8Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_4\" name=\"N_statusStr8Stolb3_4\" value=\"V_statusStr8Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_5\" name=\"N_statusStr8Stolb3_5\" value=\"V_statusStr8Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_6\" name=\"N_statusStr8Stolb3_6\" value=\"V_statusStr8Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr8Stolb3_7\" name=\"N_statusStr8Stolb3_7\" value=\"V_statusStr8Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr8Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 8, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 8, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 9, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 9, 'checkbox', 'id', 'statusStr9Stolb3', NULL),
(3, 9, 'checkbox', 'for', 'statusStr9Stolb3', NULL),
(3, 9, 'checkbox', 'name', 'N_statusStr9Stolb3', NULL),
(3, 9, 'checkbox', 'value', 'V_statusStr9Stolb3', NULL),
(3, 9, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 9, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 9, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 9, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 9, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 9, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 9, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 9, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 9, 'checkbox', 'class', 'statusProf', NULL),
(3, 9, 'checkbox', 'число строк', '7', NULL),
(3, 9, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr9Stolb3_1\" name=\"N_statusStr9Stolb3_1\" value=\"V_statusStr9Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_2\" name=\"N_statusStr9Stolb3_2\" value=\"V_statusStr9Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_3\" name=\"N_statusStr9Stolb3_3\" value=\"V_statusStr9Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_4\" name=\"N_statusStr9Stolb3_4\" value=\"V_statusStr9Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_5\" name=\"N_statusStr9Stolb3_5\" value=\"V_statusStr9Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_6\" name=\"N_statusStr9Stolb3_6\" value=\"V_statusStr9Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr9Stolb3_7\" name=\"N_statusStr9Stolb3_7\" value=\"V_statusStr9Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr9Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 9, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 9, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 10, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 10, 'checkbox', 'id', 'statusStr10Stolb3', NULL),
(3, 10, 'checkbox', 'for', 'statusStr10Stolb3', NULL),
(3, 10, 'checkbox', 'name', 'N_statusStr10Stolb3', NULL),
(3, 10, 'checkbox', 'value', 'V_statusStr10Stolb3', NULL),
(3, 10, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 10, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 10, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 10, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 10, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 10, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 10, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 10, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 10, 'checkbox', 'class', 'statusProf', NULL),
(3, 10, 'checkbox', 'число строк', '7', NULL),
(3, 10, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr10Stolb3_1\" name=\"N_statusStr10Stolb3_1\" value=\"V_statusStr10Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_2\" name=\"N_statusStr10Stolb3_2\" value=\"V_statusStr10Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_3\" name=\"N_statusStr10Stolb3_3\" value=\"V_statusStr10Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_4\" name=\"N_statusStr10Stolb3_4\" value=\"V_statusStr10Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_5\" name=\"N_statusStr10Stolb3_5\" value=\"V_statusStr10Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_6\" name=\"N_statusStr10Stolb3_6\" value=\"V_statusStr10Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr10Stolb3_7\" name=\"N_statusStr10Stolb3_7\" value=\"V_statusStr10Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr10Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 10, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 10, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 11, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 11, 'checkbox', 'id', 'statusStr11Stolb3', NULL),
(3, 11, 'checkbox', 'for', 'statusStr11Stolb3', NULL),
(3, 11, 'checkbox', 'name', 'N_statusStr11Stolb3', NULL),
(3, 11, 'checkbox', 'value', 'V_statusStr11Stolb3', NULL),
(3, 11, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 11, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 11, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 11, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 11, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 11, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 11, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 11, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 11, 'checkbox', 'class', 'statusProf', NULL),
(3, 11, 'checkbox', 'число строк', '7', NULL),
(3, 11, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr11Stolb3_1\" name=\"N_statusStr11Stolb3_1\" value=\"V_statusStr11Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_2\" name=\"N_statusStr11Stolb3_2\" value=\"V_statusStr11Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_3\" name=\"N_statusStr11Stolb3_3\" value=\"V_statusStr11Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_4\" name=\"N_statusStr11Stolb3_4\" value=\"V_statusStr11Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_5\" name=\"N_statusStr11Stolb3_5\" value=\"V_statusStr11Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_6\" name=\"N_statusStr11Stolb3_6\" value=\"V_statusStr11Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr11Stolb3_7\" name=\"N_statusStr11Stolb3_7\" value=\"V_statusStr11Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr11Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 11, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 11, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 12, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 12, 'checkbox', 'id', 'statusStr12Stolb3', NULL),
(3, 12, 'checkbox', 'for', 'statusStr12Stolb3', NULL),
(3, 12, 'checkbox', 'name', 'N_statusStr12Stolb3', NULL),
(3, 12, 'checkbox', 'value', 'V_statusStr12Stolb3', NULL),
(3, 12, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 12, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 12, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 12, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 12, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 12, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 12, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 12, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 12, 'checkbox', 'class', 'statusProf', NULL),
(3, 12, 'checkbox', 'число строк', '7', NULL),
(3, 12, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr12Stolb3_1\" name=\"N_statusStr12Stolb3_1\" value=\"V_statusStr12Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_2\" name=\"N_statusStr12Stolb3_2\" value=\"V_statusStr12Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_3\" name=\"N_statusStr12Stolb3_3\" value=\"V_statusStr12Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_4\" name=\"N_statusStr12Stolb3_4\" value=\"V_statusStr12Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_5\" name=\"N_statusStr12Stolb3_5\" value=\"V_statusStr12Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_6\" name=\"N_statusStr12Stolb3_6\" value=\"V_statusStr12Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr12Stolb3_7\" name=\"N_statusStr12Stolb3_7\" value=\"V_statusStr12Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr12Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 12, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 12, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 13, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 13, 'checkbox', 'id', 'statusStr13Stolb3', NULL),
(3, 13, 'checkbox', 'for', 'statusStr13Stolb3', NULL),
(3, 13, 'checkbox', 'name', 'N_statusStr13Stolb3', NULL),
(3, 13, 'checkbox', 'value', 'V_statusStr13Stolb3', NULL),
(3, 13, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 13, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 13, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 13, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 13, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 13, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 13, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 13, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 13, 'checkbox', 'class', 'statusProf', NULL),
(3, 13, 'checkbox', 'число строк', '7', NULL),
(3, 13, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr13Stolb3_1\" name=\"N_statusStr13Stolb3_1\" value=\"V_statusStr13Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_2\" name=\"N_statusStr13Stolb3_2\" value=\"V_statusStr13Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_3\" name=\"N_statusStr13Stolb3_3\" value=\"V_statusStr13Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_4\" name=\"N_statusStr13Stolb3_4\" value=\"V_statusStr13Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_5\" name=\"N_statusStr13Stolb3_5\" value=\"V_statusStr13Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_6\" name=\"N_statusStr13Stolb3_6\" value=\"V_statusStr13Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr13Stolb3_7\" name=\"N_statusStr13Stolb3_7\" value=\"V_statusStr13Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr13Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 13, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 13, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(3, 14, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 14, 'checkbox', 'id', 'statusStr14Stolb3', NULL),
(3, 14, 'checkbox', 'for', 'statusStr14Stolb3', NULL),
(3, 14, 'checkbox', 'name', 'N_statusStr14Stolb3', NULL),
(3, 14, 'checkbox', 'value', 'V_statusStr14Stolb3', NULL),
(3, 14, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 14, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 14, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 14, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 14, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 14, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 14, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 14, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 14, 'checkbox', 'class', 'statusProf', NULL),
(3, 14, 'checkbox', 'число строк', '7', NULL),
(3, 14, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr14Stolb3_1\" name=\"N_statusStr14Stolb3_1\" value=\"V_statusStr14Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_2\" name=\"N_statusStr14Stolb3_2\" value=\"V_statusStr14Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_3\" name=\"N_statusStr14Stolb3_3\" value=\"V_statusStr14Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_4\" name=\"N_statusStr14Stolb3_4\" value=\"V_statusStr14Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_5\" name=\"N_statusStr14Stolb3_5\" value=\"V_statusStr14Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_6\" name=\"N_statusStr14Stolb3_6\" value=\"V_statusStr14Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr14Stolb3_7\" name=\"N_statusStr14Stolb3_7\" value=\"V_statusStr14Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr14Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 14, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 14, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(1, 4, 'textarea', 'name', 'profilOsebe', 0),
(1, 4, 'textarea', 'текст на кнопке', 'Немного о себе', 0),
(2, 4, 'заголовок', 'p', '', 0),
(2, 4, 'заголовок', 'class', 'profilOsebeArea', 0),
(2, 4, 'p', 'источник текста', '4-1', 0),
(2, 4, 'p', 'class', 'profilOsebeP', 0),
(1, 5, 'text', 'class', 'mojSajt', 0),
(1, 5, 'text', 'name', 'mojSite', 0),
(1, 5, 'text', 'value', 'Мой сайт', 0),
(2, 5, 'text', 'class', 'mojSajt', 0),
(2, 5, 'text', 'name', 'mojSajt', 0),
(2, 5, 'text', 'value', 'ссылка на сайт', 0),
(1, 5, 'p', 'class', 'mojSiteP', 0),
(1, 5, 'p', 'текст по умолчанию', 'Мой сайт', 0),
(1, 6, 'p', 'текст по умолчанию', 'Моя почта', 0),
(1, 6, 'p', 'class', 'mujMailProfilP', 0),
(2, 6, 'text', 'name', 'profilMujMail', 0),
(2, 6, 'text', 'value', 'Моя почта', 0),
(2, 6, 'text', 'class', 'profilMojMailText', 0),
(2, 7, 'text', 'name', 'profilMujSkype', 0),
(1, 7, 'p', 'текст по умолчанию', 'Мой Skype', 0),
(1, 7, 'p', 'class', 'ProfilMujSkypeText', 0),
(2, 7, 'text', 'value', 'Мой Skype', 0),
(1, 8, 'p', 'текст по умолчанию', 'Мой WhatsApp', 0),
(1, 8, 'p', 'class', 'profilMujWhatsAppP', 0),
(2, 8, 'text', 'class', 'profilMujWhatsAppText', 0),
(2, 8, 'text', 'name', 'profilMujWhatsAppText', 0),
(2, 9, 'text', 'name', 'profilMojTelegram', 0),
(1, 9, 'p', 'текст по умолчанию', 'Мой Telegram', 0),
(1, 9, 'p', 'class', 'profilMojTelegram', 0),
(2, 9, 'text', 'value', 'Мой Telegram', 0),
(2, 8, 'text', 'value', 'Мой WhatsApp', 0),
(1, 10, 'p', 'текст по умолчанию', 'Мой Viber', 0),
(1, 10, 'p', 'class', 'profilMujViber', 0),
(2, 10, 'text', 'name', 'profilMujViber', 0),
(2, 10, 'text', 'value', 'Мой Viber', 0),
(2, 10, 'text', 'class', 'profilMujViberText', 0),
(1, 15, 'p', 'текст по умолчанию', 'facebook', 0),
(1, 15, 'p', 'class', 'profilfacebook', 0),
(2, 15, 'text', 'name', 'profilfacebook', 0),
(2, 15, 'text', 'value', 'Мой facebook', 0),
(2, 15, 'text', 'class', 'profilfacebookText', 0),
(2, 14, 'text', 'name', 'youtobeprofilText', 0),
(1, 14, 'p', 'текст по умолчанию', 'Мой youtube', 0),
(1, 14, 'p', 'class', 'profilYoutubeP', 0),
(2, 14, 'text', 'class', 'profilYoutubeText', 0),
(2, 14, 'text', 'value', 'Мой Youtube', 0),
(3, 15, 'checkbox', 'очистить аттрибуты', '', NULL),
(3, 15, 'checkbox', 'id', 'statusStr15Stolb3', NULL),
(3, 15, 'checkbox', 'for', 'statusStr15Stolb3', NULL),
(3, 15, 'checkbox', 'name', 'N_statusStr15Stolb3', NULL),
(3, 15, 'checkbox', 'value', 'V_statusStr15Stolb3', NULL),
(3, 15, 'checkbox', 'Текст 1', 'Гость', NULL),
(3, 15, 'checkbox', 'Текст 2', 'Пользователь', NULL),
(3, 15, 'checkbox', 'Текст 3', 'Редактор', NULL),
(3, 15, 'checkbox', 'Текст 4', 'Подписчик', NULL),
(3, 15, 'checkbox', 'Текст 5', 'Модератор', NULL),
(3, 15, 'checkbox', 'Текст 6', 'Админ', NULL),
(3, 15, 'checkbox', 'Текст 7', 'Не подтвердил', NULL),
(3, 15, 'checkbox', 'class для label', 'statusProfPunkt', NULL),
(3, 15, 'checkbox', 'class', 'statusProf', NULL),
(3, 15, 'checkbox', 'число строк', '7', NULL),
(3, 15, 'checkbox', 'блок', '<input type=\"checkbox\" id=\"statusStr15Stolb3_1\" name=\"N_statusStr15Stolb3_1\" value=\"V_statusStr15Stolb3_1\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_1\">Гость</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_2\" name=\"N_statusStr15Stolb3_2\" value=\"V_statusStr15Stolb3_2\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_2\">Пользователь</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_3\" name=\"N_statusStr15Stolb3_3\" value=\"V_statusStr15Stolb3_3\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_3\">Редактор</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_4\" name=\"N_statusStr15Stolb3_4\" value=\"V_statusStr15Stolb3_4\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_4\">Подписчик</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_5\" name=\"N_statusStr15Stolb3_5\" value=\"V_statusStr15Stolb3_5\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_5\">Модератор</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_6\" name=\"N_statusStr15Stolb3_6\" value=\"V_statusStr15Stolb3_6\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_6\">Админ</label><br><input type=\"checkbox\" id=\"statusStr15Stolb3_7\" name=\"N_statusStr15Stolb3_7\" value=\"V_statusStr15Stolb3_7\" class=\"statusProf\"><br><label class=\"statusProfPunkt\" for=\"statusStr15Stolb3_7\">Не подтвердил</label><br>', NULL),
(3, 15, 'checkbox', 'импорт из клетки ?-?', '2-3', NULL),
(3, 15, 'checkbox', 'импорт из клетки ?-?', '3-3', 0),
(1, 12, 'p', 'class', '123123', 0),
(1, 1, 'img', 'источник ссылки', '1-2', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `registracia`
--

CREATE TABLE `registracia` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `registracia`
--

INSERT INTO `registracia` (`ID`, `NAME`, `URL`, `CLASS`) VALUES
(0, 'Логин', 'text2', 'registracia btn btn-info'),
(5, 'br', 'text', 'registracia btn btn-info'),
(6, 'parol', 'text2', 'registracia btn btn-info'),
(7, 'br', 'text', 'registracia btn btn-info'),
(6, 'parol2', 'text2', 'registracia btn btn-info'),
(7, 'br', 'text', 'registracia btn btn-info'),
(8, 'Почта', 'text2', 'registracia btn btn-info'),
(9, 'br', 'text', 'registracia btn btn-info'),
(10, 'Capcha', 'text', 'registracia btn btn-info'),
(11, 'Жора играет в спальне', 'redaktor.php', 'registracia btn btn-info'),
(12, 'Гена сидит на крыше', 'redaktor.php', 'registracia btn btn-info'),
(13, 'Миша ломает гвозди', 'redaktor.php', 'registracia btn btn-info'),
(14, 'Федя читает книгу', 'redaktor.php', 'registracia btn btn-info'),
(15, 'br', 'text', 'registracia btn btn-info'),
(16, 'Сменить капчу', 'redaktor.php', 'registracia btn btn-info'),
(17, 'Очистить', 'redaktor.php', 'registracia btn btn-info'),
(17, 'Проверить', 'redaktor.php', 'registracia btn btn-info');

-- --------------------------------------------------------

--
-- Структура таблицы `slegka_dfdx`
--

CREATE TABLE `slegka_dfdx` (
  `id` int(11) DEFAULT NULL,
  `metka` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `zaprosov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `slegka_dfdx`
--

INSERT INTO `slegka_dfdx` (`id`, `metka`, `zaprosov`) VALUES
(0, '-', 4),
(2, 'rdNowaStr', 85),
(3, 'nastrNowaStranica', 38),
(4, 'ццццц', 3),
(5, 'ййй', 2),
(6, 'ььь', 1),
(7, 'dfdx', 1373),
(8, 'html', 800),
(9, 'html5', 246),
(10, 'regular_expressions', 315);

-- --------------------------------------------------------

--
-- Структура таблицы `statistik`
--

CREATE TABLE `statistik` (
  `html` bigint(20) NOT NULL,
  `elektronik` bigint(20) NOT NULL,
  `SiteUpSec` tinyint(4) NOT NULL,
  `SiteUpMin` tinyint(4) NOT NULL,
  `SiteUpHours` tinyint(4) NOT NULL,
  `SiteUpDay` tinyint(4) NOT NULL,
  `SiteUpWday` tinyint(4) NOT NULL,
  `SiteUpMon` tinyint(4) NOT NULL,
  `SiteUpYears` smallint(6) NOT NULL,
  `SiteUpYday` smallint(6) NOT NULL,
  `SiteUpWeekday` varchar(15) NOT NULL,
  `SiteUpMonth` varchar(15) NOT NULL,
  `BdUpSec` tinyint(4) NOT NULL,
  `BdUpMin` tinyint(4) NOT NULL,
  `BdUpHours` int(11) NOT NULL,
  `BdUpDay` tinyint(4) NOT NULL,
  `BdUpWday` tinyint(20) NOT NULL,
  `BdUpMon` tinyint(4) NOT NULL,
  `BdUpYears` smallint(6) NOT NULL,
  `BdUpYday` smallint(6) NOT NULL,
  `BdUpWeekday` varchar(15) NOT NULL,
  `BdUpMonth` varchar(15) NOT NULL,
  `imiePosTabl24` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица будет содержать статистику запросов к другим таблица';

--
-- Дамп данных таблицы `statistik`
--

INSERT INTO `statistik` (`html`, `elektronik`, `SiteUpSec`, `SiteUpMin`, `SiteUpHours`, `SiteUpDay`, `SiteUpWday`, `SiteUpMon`, `SiteUpYears`, `SiteUpYday`, `SiteUpWeekday`, `SiteUpMonth`, `BdUpSec`, `BdUpMin`, `BdUpHours`, `BdUpDay`, `BdUpWday`, `BdUpMon`, `BdUpYears`, `BdUpYday`, `BdUpWeekday`, `BdUpMonth`, `imiePosTabl24`) VALUES
(16502, 0, 33, 4, 19, 8, 4, 4, 2021, 97, 'Thursday', 'April', 41, 4, 19, 8, 4, 4, 2021, 97, 'Thursday', 'April', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `statistik_dfdx`
--

CREATE TABLE `statistik_dfdx` (
  `statik_true` int(11) DEFAULT NULL,
  `n_zapros` int(11) DEFAULT NULL,
  `d_zapros` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `statistik_dfdx`
--

INSERT INTO `statistik_dfdx` (`statik_true`, `n_zapros`, `d_zapros`) VALUES
(1, 415367, '2021-11-18');

-- --------------------------------------------------------

--
-- Структура таблицы `status_klienta`
--

CREATE TABLE `status_klienta` (
  `login` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `parol` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `status_klienta`
--

INSERT INTO `status_klienta` (`login`, `parol`, `mail`, `status`, `time`) VALUES
('alfa54', '123123', 'alexmway@mail.ru', 5, 1618426782),
('boeslav', '123123', '8902514@mail.ru', 1, 1628871956),
('Liutik', 'q100600Q', 'Liutiaplay@gmail.com', 78538, 1628876110),
('Indi', 'August1978', 'kuzhelev1978@yandex.ru', 1, 1628888529),
('alex25', '123123', 'ergfsd', 1, 524524),
('Stark2', '123123', 'alexmway5578@gmail.com', 1, 1629402191),
('Han_Solo', '123123', 'fff', 1, 333333),
('Nyna', '123123', '1', 1, 111),
('drewniy', '123123', '1', 1, 111),
('Anchorte', '123123', '1', 1, 111),
('supertony', '123123', '1', 1, 111),
('Vasilisk', '123123', '1', 1, 111);

-- --------------------------------------------------------

--
-- Структура таблицы `status_statii_dfdx`
--

CREATE TABLE `status_statii_dfdx` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `status_statii_dfdx`
--

INSERT INTO `status_statii_dfdx` (`id`) VALUES
(-1);

-- --------------------------------------------------------

--
-- Структура таблицы `styl_statii_dfdx`
--

CREATE TABLE `styl_statii_dfdx` (
  `id` int(11) DEFAULT NULL,
  `nomer_styla` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `styl_statii_dfdx`
--

INSERT INTO `styl_statii_dfdx` (`id`, `nomer_styla`) VALUES
(-1, -1),
(2, 3),
(0, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tablica_nastroer_dvigka_int`
--

CREATE TABLE `tablica_nastroer_dvigka_int` (
  `id` int(11) DEFAULT NULL,
  `nastr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `tablica_nastroer_dvigka_int`
--

INSERT INTO `tablica_nastroer_dvigka_int` (`id`, `nastr`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tablica_tablic`
--

CREATE TABLE `tablica_tablic` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` int(255) DEFAULT NULL,
  `kol_voKn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `tablica_tablic`
--

INSERT INTO `tablica_tablic` (`ID`, `NAME`, `CLASS`, `kol_voKn`) VALUES
(1, 'redaktor_up', 0, 4),
(2, 'redaktor_down', 0, 3),
(5, 'menu_parametr_tab', 0, 4),
(7, 'login', 0, 5),
(8, 'podtverdit', 0, 5),
(10, 'menu_stark_up_status', 0, 9),
(11, 'menu_stark_glawnoe', 0, 10),
(13, 'redaktor_nastr7', 0, 10),
(14, 'dolgnosti_starkow', 0, 22),
(15, 'menu_maty', 0, 9),
(16, 'dla_statusob_123', 0, 1),
(17, 'menu_up_dfdx', 0, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `type_menu_po_imeni`
--

CREATE TABLE `type_menu_po_imeni` (
  `name_menu` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `type_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `type_menu_po_imeni`
--

INSERT INTO `type_menu_po_imeni` (`name_menu`, `type_menu`) VALUES
('menu_stark_glawnoe', 7),
('dolgnosti_starkow', 7),
('redaktor_nastr7', 7),
('menu_test', 5),
('menu_test_6', 5),
('menu_test_5', 2),
('login', 4),
('menu_parametr_tab', 4),
('test9', 9),
('registracia', 4),
('menu_maty', 4),
('menu', 1),
('dla_statusob_123', 1),
('podtverdit', 6),
('strarki_menu_dolgnosti', 9),
('menu_opisania_prawa_dolgnost', 9),
('prawa_dolgnost', 9),
('starki_ustaw', 9),
('menu_stark_up_status', 9),
('news1_redaktor', 9),
('news1_redaktor2', 9),
('myNaUtub_redaktor', 9),
('my_na_youtub_redaktor', 9),
('nash_proekt_redaktor', 9),
('moduly_gelion', 9),
('rasy_stark', 9),
('moduly_tormal', 9),
('{\"RESULT\":\"FALIED\",\"ERROR\":\"player not found\"}', 9),
('moduly_velid', 9),
('moduly_zekt', 9),
('pokaz_modul', 9),
('redaktor_up', 3),
('menu_up_dfdx', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `url_po_id_bd2`
--

CREATE TABLE `url_po_id_bd2` (
  `id` int(11) DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `url_po_id_bd2`
--

INSERT INTO `url_po_id_bd2` (`id`, `url`) VALUES
(-1, 'пусто'),
(8, 'news/phpregular/funkciya-preg_match_all.php'),
(7, 'news/phpregular/funkciya-preg_match.php'),
(6, 'news/phpregular/funkciya-preg_grep.php'),
(4, 'news/phpregular/funkciya-preg_filter.php'),
(2, 'news/html3html5/lt-doctype-gt-obyavlenie-tipa-dokumenta.php'),
(0, 'news/html3html5/kommentarii-v-html.php'),
(9, 'news/phpregular/funkciya-preg_-plit.php');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tablica_tablic`
--
ALTER TABLE `tablica_tablic`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
