-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.2.30
-- Время создания: Сен 06 2021 г., 01:10
-- Версия сервера: 5.7.34-37
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
-- База данных: `f0532808_starki`
--

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
(1, 'alfa54'),
(2, 'Starki'),
(3, 'Stark'),
(4, 'alex25'),
(5, 'alex25');

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
(0, 'На Сайт', 'starki.php', 'dla_statusob_123');

-- --------------------------------------------------------

--
-- Структура таблицы `dolgnosti_starkow`
--

CREATE TABLE `dolgnosti_starkow` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `dolgnosti_starkow`
--

INSERT INTO `dolgnosti_starkow` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Глава Альянса Nyna', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(1, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(2, 'Зам.главы Han_Solo', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(3, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(4, 'Зам.главы Vasilisk', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(5, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(6, 'Магистр WhiteZip', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(7, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(8, 'Магистр drewniy', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(9, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(10, 'Магистр RENNI', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(11, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(12, 'Магистр Shadow_1313', 'starki.php', 'dolgnosti_starkow', '-01234599'),
(13, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(14, 'Магистр merlin', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(15, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(16, 'Магистр steelxack', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(17, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(18, 'Магистр Indi', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(19, 'br', 'text', 'dolgnosti_starkow', '-0123459'),
(20, 'Магистр Kharus', 'starki.php', 'dolgnosti_starkow', '-0123459'),
(21, 'br', 'text', 'dolgnosti_starkow', '-0123459');

-- --------------------------------------------------------

--
-- Структура таблицы `dolgnost_opis`
--

CREATE TABLE `dolgnost_opis` (
  `ID` int(11) DEFAULT NULL,
  `dolgnost` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `opis` varchar(5000) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `dolgnost_opis`
--

INSERT INTO `dolgnost_opis` (`ID`, `dolgnost`, `opis`) VALUES
(1, 'Глава альянса', 'Я могу всё'),
(2, 'Падаван', 'Просмотр online - статуса, Просмотр проектов, Просмотр логов сражений членов альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(3, 'Магистр науки', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр флотов членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Назначение должности, Модерирование чата альянса, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(4, 'Магистр дипломатии', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр флотов членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Назначение должности, Принятие в альянс и исключение из альянса, Модерирование чата альянса, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса.'),
(5, 'Джедай', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(6, 'Заместитель', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр флотов членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Заключение и объявление отношений с другими альянсами, Назначение должности, Редактирование информации об альянсе, Принятие в альянс и исключение из альянса, Модерирование чата альянса, Совершение финансовых операций, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(7, 'Магистр разведки', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр флотов членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Назначение должности, Модерирование чата альянса, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(8, 'Магистр', 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Назначение должности, Модерирование чата альянса, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(9, 'Юнлинг', 'Просмотр online - статуса, Просмотр логов сражений членов альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса'),
(10, 'Рядовой', ':-(');

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, 'Пример настройки менюшек', 'Пример настройки менюшек из панели настроек сайта (cms).\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Fde3GMaOneg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(1, 'Наполнение контентом сайта Starki.php (cms dfdx)', 'Пример наполнение контентом сайта Starki.php (cms dfdx).\r\n\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1S0TqCnFFxE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(2, 'Aдминистрирование от модератора, сайт Starki.php(cms dfdx)', 'Aдминистрирование от модератора, сайт Starki.php(cms dfdx).\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-rgfFSFJCWQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n', 'alfa54'),
(3, 'Как добавить или удалить пользователя в менюшке членов клана.', 'Как добавить или удалить пользователя в менюшке членов клана.\r\n<br><br><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wggjMtXdsgo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(4, 'Как добавить или удалить пользователя в менюшке членов клана.', 'Как добавить или удалить пользователя в менюшке членов клана.\r\n<br><br><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wggjMtXdsgo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(5, 'Добавление расовых модулей', 'Короткая справка о том, как добавлять или удалять расовые модули а базу данных.\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XdY4pHcb6CY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54');

-- --------------------------------------------------------

--
-- Структура таблицы `info_free`
--

CREATE TABLE `info_free` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `info_free`
--

INSERT INTO `info_free` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, 'Как зарегистрироваться на сайте', 'Регистрация на сайте клана Starki как игрок клана.\r\n<br><br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/auAlCbRgK9M?start=11\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(1, 'Функционал сайта Starki.php для пользователя и члена клана.', 'Функционал сайта Starki.php для пользователя и члена клана.\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VQ-KJAAIV1o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(2, 'Как добавить свои технологии расовые?', 'Как добавить свои технологии расовые?\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LOqz9-GMEKU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54');

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
(0, 'login_status', 'text2', 'login_stark'),
(1, 'parol_status', 'text2', 'login_stark'),
(2, 'Вход', 'starki.php', 'login_stark'),
(3, 'Регистрация', 'starki.php', 'login_stark'),
(4, 'На сайт', 'starki.php', 'login_stark');

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
-- Структура таблицы `menu_opisania_prawa_dolgnost`
--

CREATE TABLE `menu_opisania_prawa_dolgnost` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_opisania_prawa_dolgnost`
--

INSERT INTO `menu_opisania_prawa_dolgnost` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Глава альянса', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(1, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(2, 'Заместитель', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(3, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(4, 'Магистр науки', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(5, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(6, 'Магистр дипломатии', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(7, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(8, 'Магистр разведки', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(9, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(10, 'Магистр', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(11, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(12, 'Джедай', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(13, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(14, 'Падаван', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(15, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(16, 'Юнлинг', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(17, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(18, 'Рядовой', 'starki.php', 'prawa_dolgnost_sawe', '-s45'),
(19, 'br', 'text', 'prawa_dolgnost_br', '-s45');

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
(3, 'Отмена', 'redaktor.php', 'menu_parametr_tab');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_stark_glawnoe`
--

CREATE TABLE `menu_stark_glawnoe` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_stark_glawnoe`
--

INSERT INTO `menu_stark_glawnoe` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'О членах клана', 'starki.php', 'login_stark btn', '-012345'),
(1, 'Устав клана', 'starki.php', 'login_stark btn', '-012345'),
(2, 'Мы на Ютубе', 'starki.php', 'login_stark btn', '-012345'),
(3, 'Наши проекты', 'starki.php', 'login_stark btn', '-012345'),
(4, 'Наши Базы', 'starki.php', 'login_stark btn', '-12345'),
(5, 'Info', 'starki.php', 'login_stark btn', '-45'),
(6, 'Help', 'starki.php', 'login_stark btn', '-0123459'),
(7, 'Добавить модуль', 'starki.php', 'login_stark btn', '-45');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_stark_up_status`
--

CREATE TABLE `menu_stark_up_status` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `menu_stark_up_status`
--

INSERT INTO `menu_stark_up_status` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'login_status_stark', 'text2', 'login_stark btn', '-0-'),
(1, 'parol_status_stark', 'textP2', 'login_stark btn', '-0'),
(2, 'Вход', 'starki.php', 'login_stark btn', '-0'),
(3, 'Регистрация', 'redaktor.php', 'login_stark btn', '-0'),
(4, 'Редактор', 'redaktor.php', 'login_stark btn', '-54'),
(5, 'Выход', 'starki.php', 'login_stark btn', '-123459'),
(6, 'Подтвердить', 'redaktor.php', 'login_stark btn', '-9'),
(7, 'Профиль', 'starki.php', 'login_stark btn', '-12345'),
(8, 'Наш Discord', 'https://discord.gg/FZkzYFma9A', 'login_stark btn', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_astoks`
--

CREATE TABLE `moduly_astoks` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_astoks`
--

INSERT INTO `moduly_astoks` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Нейтронный модулятор', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(1, 'gelion_text1', 'text2', 'moduly_astoks_text', '-12345'),
(2, 'br', 'text', 'moduly_astoks_br', '-12345'),
(3, 'Радио-оптическая маскировка', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(4, 'astoks_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Нейтронная маскировка', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(7, 'astoks_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Противоракетная система', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(10, 'astoks_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Отсек управления', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(13, 'astoks_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Астросканер', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(16, 'astoks_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Абордажный модуль', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(19, 'astoks_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Абордажная платформа ', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(22, 'astoks_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345'),
(24, 'Археологический модуль', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(25, 'astoks_text25', 'text2', 'moduly_gelion_text', '-12345'),
(26, 'br', 'text', 'moduly_gelion_br', '-12345'),
(27, 'Корабельный радар', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(28, 'astoks_text28', 'text2', 'moduly_gelion_text', '-12345'),
(29, 'br', 'text', 'moduly_gelion_br', '-12345'),
(30, 'РПУ-X1', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(31, 'astoks_text31', 'text2', 'moduly_gelion_text', '-12345'),
(32, 'br', 'text', 'moduly_gelion_br', '-12345'),
(33, 'РПУ-X2', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(34, 'astoks_text34', 'text2', 'moduly_gelion_text', '-12345'),
(35, 'br', 'text', 'moduly_gelion_br', '-12345'),
(36, 'РПУ-X3', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(37, 'astoks_text37', 'text2', 'moduly_gelion_text', '-12345'),
(38, 'br', 'text', 'moduly_gelion_br', '-12345'),
(39, 'Торпедный аппарат ', 'starki.php', 'class_rasy_stark_astoks_modul btn', '-12345'),
(40, 'astoks_text40', 'text2', 'moduly_gelion_text', '-12345'),
(41, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_gelion`
--

CREATE TABLE `moduly_gelion` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_gelion`
--

INSERT INTO `moduly_gelion` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Малый двигательный отсек', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(1, 'gelion_text1', 'text2', 'moduly_gelion_text', '-12345'),
(2, 'br', 'text', 'moduly_gelion_br', '-12345'),
(3, 'Двигательный отсек ', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(4, 'gelion_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Джамп ', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(7, 'gelion_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Электромагнитный парус', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(10, 'gelion_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Реактивный двигатель', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(13, 'gelion_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Ядерный двигатель', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(16, 'gelion_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Гравитационный двигатель', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(19, 'gelion_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Фотонный двигатель', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(22, 'gelion_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345'),
(24, 'Гипер двигатель', 'starki.php', 'class_rasy_stark_gelion_modul btn', '-12345'),
(25, 'gelion_text25', 'text2', 'moduly_gelion_text', '-12345'),
(26, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_glarg`
--

CREATE TABLE `moduly_glarg` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_glarg`
--

INSERT INTO `moduly_glarg` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Малый реакторный отсек', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(1, 'glarg_text1', 'text2', 'moduly_glarg_text', '-12345'),
(2, 'br', 'text', 'moduly_glarg_br', '-12345'),
(3, 'Реакторный отсек', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(4, 'glarg_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Большой реакторный отсек', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(7, 'glarg_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Отсек вооружения', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(10, 'glarg_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Химический реактор', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(13, 'glarg_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Преобразователь излучения ', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(16, 'glarg_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Ядерный реактор', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(19, 'glarg_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Термоядерный реактор', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(22, 'glarg_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345'),
(24, 'Бортовой компьютер', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(25, 'glarg_text25', 'text2', 'moduly_gelion_text', '-12345'),
(26, 'br', 'text', 'moduly_gelion_br', '-12345'),
(27, 'Гравитационный вычислитель', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(28, 'glarg_text28', 'text2', 'moduly_gelion_text', '-12345'),
(29, 'br', 'text', 'moduly_gelion_br', '-12345'),
(30, 'Восстановитель щитов', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(31, 'glarg_text31', 'text2', 'moduly_gelion_text', '-12345'),
(32, 'br', 'text', 'moduly_gelion_br', '-12345'),
(33, 'Командный модуль', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(34, 'glarg_text34', 'text2', 'moduly_gelion_text', '-12345'),
(35, 'br', 'text', 'moduly_gelion_br', '-12345'),
(36, 'Магнитный щит', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(37, 'glarg_text37', 'text2', 'moduly_gelion_text', '-12345'),
(38, 'br', 'text', 'moduly_gelion_br', '-12345'),
(39, 'Гравитационный щит', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(40, 'glarg_text40', 'text2', 'moduly_gelion_text', '-12345'),
(41, 'br', 'text', 'moduly_gelion_br', '-12345'),
(42, 'Нейтронный щит', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(43, 'glarg_text43', 'text2', 'moduly_gelion_text', '-12345'),
(44, 'br', 'text', 'moduly_gelion_br', '-12345'),
(45, 'Гравитационный реактор', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(46, 'glarg_text46', 'text2', 'moduly_gelion_text', '-12345'),
(47, 'br', 'text', 'moduly_gelion_br', '-12345'),
(48, 'Щитовая платформа', 'starki.php', 'class_rasy_stark_glarg_modul btn', '-12345'),
(49, 'glarg_text49', 'text2', 'moduly_gelion_text', '-12345'),
(50, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_mroon`
--

CREATE TABLE `moduly_mroon` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_mroon`
--

INSERT INTO `moduly_mroon` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Рабочий отсек', 'starki.php', 'class_rasy_stark_mroon_modul btn', '-12345'),
(1, 'mroon_text1', 'text2', 'moduly_mroon_text', '-45'),
(2, 'br', 'text', 'moduly_mroon_br', '-45'),
(3, 'Жилой отсек', 'starki.php', 'class_rasy_stark_mroon_modul btn', '-12345'),
(4, 'mroon_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Строительный модуль', 'starki.php', 'class_rasy_stark_mroon_modul btn', '-12345'),
(7, 'mroon_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Ремонтный модуль', 'starki.php', 'class_rasy_stark_mroon_modul btn', '-12345'),
(10, 'mroon_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_tormal`
--

CREATE TABLE `moduly_tormal` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_tormal`
--

INSERT INTO `moduly_tormal` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Грузовая платформа', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(1, 'tormal_text1', 'text2', 'moduly_tormal_text', '-12345'),
(2, 'br', 'text', 'moduly_tormal_br', '-12345'),
(3, 'Погрузочная платформа', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(4, 'tormal_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Погрузочный модуль', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(7, 'tormal_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Корабельный ангар', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(10, 'tormal_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Большой корабельный ангар', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(13, 'tormal_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Сборщик обломков', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(16, 'tormal_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Малый грузовой отсек', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(19, 'tormal_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Грузовой отсек', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(22, 'tormal_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345'),
(24, 'Большой грузовой отсек', 'starki.php', 'class_rasy_stark_tormal_modul btn', '-12345'),
(25, 'tormal_text25', 'text2', 'moduly_gelion_text', '-12345'),
(26, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_velid`
--

CREATE TABLE `moduly_velid` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_velid`
--

INSERT INTO `moduly_velid` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Лазерная турель', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(1, 'velid_text1', 'text2', 'moduly_velid_text', '-12345'),
(2, 'br', 'text', 'moduly_velid_br', '-12345'),
(3, 'Орудийная башня', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(4, 'velid_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Ракетная турель', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(7, 'velid_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Кинетическая пушка', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(10, 'velid_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Ионная пушка', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(13, 'velid_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Устройство бомбометания ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(16, 'velid_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Планетарный разрушитель', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(19, 'velid_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Антилазерное покрытие ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(22, 'velid_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345'),
(24, 'Энергетический дефлектор ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(25, 'velid_text25', 'text2', 'moduly_gelion_text', '-12345'),
(26, 'br', 'text', 'moduly_gelion_br', '-12345'),
(27, 'Инерционный лазер ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(28, 'velid_text28', 'text2', 'moduly_gelion_text', '-12345'),
(29, 'br', 'text', 'moduly_gelion_br', '-12345'),
(30, 'Легкий лазер', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(31, 'velid_text31', 'text2', 'moduly_gelion_text', '-12345'),
(32, 'br', 'text', 'moduly_gelion_br', '-12345'),
(33, 'Тяжелый лазер', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(34, 'velid_text34', 'text2', 'moduly_gelion_text', '-12345'),
(35, 'br', 'text', 'moduly_gelion_br', '-12345'),
(36, 'Плазменнное оружие ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(37, 'velid_text37', 'text2', 'moduly_gelion_text', '-12345'),
(38, 'br', 'text', 'moduly_gelion_br', '-12345'),
(39, 'Стальная пластина', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(40, 'velid_text40', 'text2', 'moduly_gelion_text', '-12345'),
(41, 'br', 'text', 'moduly_gelion_br', '-12345'),
(42, 'Композитная броня', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(43, 'velid_text43', 'text2', 'moduly_gelion_text', '-12345'),
(44, 'br', 'text', 'moduly_gelion_br', '-12345'),
(45, 'Титановая пластина', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(46, 'velid_text46', 'text2', 'moduly_gelion_text', '-12345'),
(47, 'br', 'text', 'moduly_gelion_br', '-12345'),
(48, 'Нанопластина', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(49, 'velid_text49', 'text2', 'moduly_gelion_text', '-12345'),
(50, 'br', 'text', 'moduly_gelion_br', '-12345'),
(51, 'Фибробетон', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(52, 'velid_text52', 'text2', 'moduly_gelion_text', '-12345'),
(53, 'br', 'text', 'moduly_gelion_br', '-12345'),
(54, 'Термоядерная торпеда', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(55, 'velid_text55', 'text2', 'moduly_gelion_text', '-12345'),
(56, 'br', 'text', 'moduly_gelion_br', '-12345'),
(57, 'Протонная торпеда', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(58, 'velid_text58', 'text2', 'moduly_gelion_text', '-12345'),
(59, 'br', 'text', 'moduly_gelion_br', '-12345'),
(60, 'Гравитационная торпеда', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(61, 'velid_text61', 'text2', 'moduly_gelion_text', '-12345'),
(62, 'br', 'text', 'moduly_gelion_br', '-12345'),
(63, 'Стрела-X1', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(64, 'velid_text64', 'text2', 'moduly_gelion_text', '-12345'),
(65, 'br', 'text', 'moduly_gelion_br', '-12345'),
(66, 'Молния-X1', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(67, 'velid_text67', 'text2', 'moduly_gelion_text', '-12345'),
(68, 'br', 'text', 'moduly_gelion_br', '-12345'),
(69, 'Ураган-X1', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(70, 'velid_text70', 'text2', 'moduly_gelion_text', '-12345'),
(71, 'br', 'text', 'moduly_gelion_br', '-12345'),
(72, 'Шторм-X2 ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(73, 'velid_text73', 'text2', 'moduly_gelion_text', '-12345'),
(74, 'br', 'text', 'moduly_gelion_br', '-12345'),
(75, 'Смерч-X2', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(76, 'velid_text76', 'text2', 'moduly_gelion_text', '-12345'),
(77, 'br', 'text', 'moduly_gelion_br', '-12345'),
(78, 'Игла-X2', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(79, 'velid_text79', 'text2', 'moduly_gelion_text', '-12345'),
(80, 'br', 'text', 'moduly_gelion_br', '-12345'),
(81, 'Валькирия-X3', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(82, 'velid_text82', 'text2', 'moduly_gelion_text', '-12345'),
(83, 'br', 'text', 'moduly_gelion_br', '-12345'),
(84, 'Гарпия-X3', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(85, 'velid_text85', 'text2', 'moduly_gelion_text', '-12345'),
(86, 'br', 'text', 'moduly_gelion_br', '-12345'),
(87, 'Горгона-X3 ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(88, 'velid_text88', 'text2', 'moduly_gelion_text', '-12345'),
(89, 'br', 'text', 'moduly_gelion_br', '-12345'),
(90, 'Нейтронная бомба', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(91, 'velid_text91', 'text2', 'moduly_gelion_text', '-12345'),
(92, 'br', 'text', 'moduly_gelion_br', '-12345'),
(93, 'Бункерная бомба ', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(94, 'velid_text94', 'text2', 'moduly_gelion_text', '-12345'),
(95, 'br', 'text', 'moduly_gelion_br', '-12345'),
(96, 'Термоядерная бомба', 'starki.php', 'class_rasy_stark_velid_modul btn', '-12345'),
(97, 'velid_text97', 'text2', 'moduly_gelion_text', '-12345'),
(98, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `moduly_zekt`
--

CREATE TABLE `moduly_zekt` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `moduly_zekt`
--

INSERT INTO `moduly_zekt` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Буровая платформа МД-1', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(1, 'zekt_text1', 'text2', 'moduly_zekt_text', '-12345'),
(2, 'br', 'text', 'moduly_zekt_br', '-12345'),
(3, 'Буровая платформа МД-2 ', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(4, 'zekt_text4', 'text2', 'moduly_gelion_text', '-12345'),
(5, 'br', 'text', 'moduly_gelion_br', '-12345'),
(6, 'Тяжелая буровая платформа', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(7, 'zekt_text7', 'text2', 'moduly_gelion_text', '-12345'),
(8, 'br', 'text', 'moduly_gelion_br', '-12345'),
(9, 'Модуль геологоразведки', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(10, 'zekt_text10', 'text2', 'moduly_gelion_text', '-12345'),
(11, 'br', 'text', 'moduly_gelion_br', '-12345'),
(12, 'Буровая установка МД-1', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(13, 'zekt_text13', 'text2', 'moduly_gelion_text', '-12345'),
(14, 'br', 'text', 'moduly_gelion_br', '-12345'),
(15, 'Буровая установка МД-2', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(16, 'zekt_text16', 'text2', 'moduly_gelion_text', '-12345'),
(17, 'br', 'text', 'moduly_gelion_br', '-12345'),
(18, 'Лазерный бур', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(19, 'zekt_text19', 'text2', 'moduly_gelion_text', '-12345'),
(20, 'br', 'text', 'moduly_gelion_br', '-12345'),
(21, 'Плазменный бур', 'starki.php', 'class_rasy_stark_zekt_modul btn', '-12345'),
(22, 'zekt_text22', 'text2', 'moduly_gelion_text', '-12345'),
(23, 'br', 'text', 'moduly_gelion_br', '-12345');

-- --------------------------------------------------------

--
-- Структура таблицы `my_na_youtub`
--

CREATE TABLE `my_na_youtub` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `news` mediumtext COLLATE utf8_bin,
  `login_redaktora` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `my_na_youtub`
--

INSERT INTO `my_na_youtub` (`id`, `name`, `news`, `login_redaktora`) VALUES
(1, 'Обзор игры Звездная Федерация', 'Обзор игры Звездная Федерация\r\n<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FRSecIQ-tEs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(2, 'Звездная Федерация - знакомство с расами и строим оборону', 'Звездная Федерация - знакомство с расами и строим оборону <br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8va3FZMUMwQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(3, 'Звездная федерация. Проектируем археолога. Хейтеры. Работа с информационной картой.', 'Звездная федерация. Проектируем археолога. Хейтеры. Работа с информационной картой. <br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sieJYUpFO_s\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(4, 'Трейд, разбор комментариев, критика игры и администрации.', 'Звездная Федерация. Трейд, разбор комментариев, критика игры и администрации. <br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_Sjtg0ZzqAQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(5, 'Звездная Федерация - логистика.', 'Звездная Федерация - логистика.<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/O439GMfjInY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(6, 'Гайд по боевке.', 'Звездная Федерация. Гайд по боевке.<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VtbG5V9iR4g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(7, 'Гайд по рейтингам и трейду.', 'Звездная Федерация. Гайд по рейтингам и трейду.<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nWPJaoh_sfU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(8, 'Гайд по застройке главка.', 'Звездная Федерация, гайд по застройке главка. (для новичков)<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BBAJbieMdNM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(9, 'Гайд по застройке главка.', 'Звездная Федерация, гайд по застройке главка. (для новичков)<br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BBAJbieMdNM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54');

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazaalex25`
--

CREATE TABLE `my_zone_bazaalex25` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `my_zone_bazaalex25`
--

INSERT INTO `my_zone_bazaalex25` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, 'База Торговая', '<b>База Торговая.</b><br>\r\nПредназначение - Торговля.<br>\r\nБез уточнения можно брать любые тормалевские модули, число которых <br>меньше 500 штук, так сказать, остатки).<br>\r\n<br>\r\n<img src=\"https://d.radikal.ru/d43/2108/47/12d1a0199deb.jpg\">\r\n<br>\r\n', 'alex25');

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazaalfa54`
--

CREATE TABLE `my_zone_bazaalfa54` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazaboeslav`
--

CREATE TABLE `my_zone_bazaboeslav` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazadeathgar`
--

CREATE TABLE `my_zone_bazadeathgar` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazagreyfox`
--

CREATE TABLE `my_zone_bazagreyfox` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `my_zone_bazagreyfox`
--

INSERT INTO `my_zone_bazagreyfox` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, 'Забавно :)', '', 'GREYFOX');

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazaindi`
--

CREATE TABLE `my_zone_bazaindi` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazanyna`
--

CREATE TABLE `my_zone_bazanyna` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_bazashadow_1313`
--

CREATE TABLE `my_zone_bazashadow_1313` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freealex25`
--

CREATE TABLE `my_zone_freealex25` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freealfa54`
--

CREATE TABLE `my_zone_freealfa54` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freeboeslav`
--

CREATE TABLE `my_zone_freeboeslav` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freedeathgar`
--

CREATE TABLE `my_zone_freedeathgar` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freegreyfox`
--

CREATE TABLE `my_zone_freegreyfox` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freeindi`
--

CREATE TABLE `my_zone_freeindi` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freenyna`
--

CREATE TABLE `my_zone_freenyna` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freeshadow_1313`
--

CREATE TABLE `my_zone_freeshadow_1313` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_freeадминистратор`
--

CREATE TABLE `my_zone_freeадминистратор` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectalex25`
--

CREATE TABLE `my_zone_proectalex25` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectalfa54`
--

CREATE TABLE `my_zone_proectalfa54` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectboeslav`
--

CREATE TABLE `my_zone_proectboeslav` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectdeathgar`
--

CREATE TABLE `my_zone_proectdeathgar` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectgreyfox`
--

CREATE TABLE `my_zone_proectgreyfox` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectindi`
--

CREATE TABLE `my_zone_proectindi` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectnyna`
--

CREATE TABLE `my_zone_proectnyna` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `my_zone_proectshadow_1313`
--

CREATE TABLE `my_zone_proectshadow_1313` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` mediumtext COLLATE utf8_unicode_ci,
  `login_redaktora` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `nashi_bazy`
--

CREATE TABLE `nashi_bazy` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `news` mediumtext COLLATE utf8_bin,
  `login_redaktora` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `nashi_bazy`
--

INSERT INTO `nashi_bazy` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, 'База с материалами', '<img src=\"https://a.radikal.ru/a07/2108/05/f4a987e1e58a.jpg\">\r\n<br>\r\n\r\nБаза с материалами для всех нуждающихся. \r\nСклад Джери - это координаты.', 'alfa54');

-- --------------------------------------------------------

--
-- Структура таблицы `nash_proekt`
--

CREATE TABLE `nash_proekt` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `news` mediumtext COLLATE utf8_bin,
  `login_redaktora` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `nash_proekt`
--

INSERT INTO `nash_proekt` (`id`, `name`, `news`, `login_redaktora`) VALUES
(1, 'Арх_АМСпро2', 'Весьма эффективный археолог для новичков в альянсе. При изучении проекта есть возможность получить модули на 20 кораблей.<br>\r\nПроект корабля:\r\n<br>\r\n<img src=\"https://c.radikal.ru/c16/2108/ec/7301ad6db718.jpg\">\r\n<img src=\"https://d.radikal.ru/d11/2108/25/b0d5943f285d.jpg\">\r\n<br>\r\n<img src=\"https://a.radikal.ru/a14/2108/de/cccd352d51ed.jpg\">\r\n<img src=\"https://c.radikal.ru/c08/2108/bf/79b71234b5f5.jpg\">\r\n<img src=\"https://d.radikal.ru/d16/2108/ea/67fccec44de4.jpg\">\r\n<br>\r\n<img src=\"https://c.radikal.ru/c09/2108/4b/d4ae343d3842.jpg\">\r\n<img src=\"https://a.radikal.ru/a40/2108/57/ea8400d0e8c5.jpg\">\r\n<img src=\"https://d.radikal.ru/d02/2108/c4/3ca0d39ca669.jpg\">\r\n<br>\r\n<img src=\"https://b.radikal.ru/b40/2108/20/1be7a6d92551.jpg\">\r\n<img src=\"https://c.radikal.ru/c36/2108/aa/d3850014fc7c.jpg\">\r\n<img src=\"https://b.radikal.ru/b21/2108/38/69b9da5bda45.jpg\">\r\n<br>\r\n<img src=\"https://b.radikal.ru/b27/2108/b9/deceab9e9e47.jpg\">\r\n<br><br>\r\nСтоимость корабля в материалах:<br>\r\nCR 156051930<br>\r\nАлюминий 4353291<br>\r\nПолимеры 11915979<br>\r\nЭлектронные компоненты 8109344<br>\r\nКомпозиты 3830605<br>\r\nТитановый сплав 134905<br>\r\nЗаброзин 3136<br>\r\nСталь 6589453<br>\r\nНоксикум 79685<br>\r\nИзидрит 20895<br>\r\nЛевиум 13214<br>\r\nЗукрит 147383<br>\r\nСероний 19747<br>\r\nНановолокно 3604140<br>\r\nКвантиум 14585<br>\r\n<br>\r\nЧисло модулей для одного корабля:<br>\r\nДвигательный отсек: 5000 ур. (Гелионы) 9 шт.<br>\r\nБольшой реакторный отсек: 2000 ур. (Гларги) 4 шт.<br>\r\nГравитационный вычислитель: 3000 ур. (Гларги) 1 шт.<br>\r\nОтсек вооружения: 2000 ур. (Гларги) 2 шт.<br>\r\nОтсек управления: 150 ур. (Астоксы) 3 шт.<br>\r\nРабочий отсек: 2000 ур. (Мруны) 2 шт.<br>\r\nГрузовая платформа: 150 ур. (Тормали) 7 шт.<br>\r\nНейтронный модулятор: 6500 ур. (Астоксы) 1 шт.<br>\r\nНейтронная маскировка: 19000 ур. (Астоксы) 8 шт.<br>\r\nРадио-оптическая маскировка: 15000 ур. (Астоксы) 1 шт.<br>\r\nБольшой грузовой отсек: 27000 ур. (Тормали) 14 шт.<br>\r\nДжамп двигатель: 5000 ур. (Гелионы) 1 шт.<br>\r\nГипер двигатель: 15000 ур. (Гелионы) 5 шт.<br>\r\nФотонный двигатель: 15000 ур. (Гелионы) 11 шт.<br>\r\nГравитационный двигатель: 15000 ур. (Гелионы) 1 шт.<br>\r\nТермоядерный реактор: 30000 ур. (Гларги) 7 шт.<br>\r\nПротиворакетная система: 15000 ур. (Астоксы) 3 шт.<br>\r\nБортовой компьютер: 15000 ур. (Гларги) 3 шт.<br>\r\nАрхеологический модуль: 15800 ур. (Астоксы) 6 шт.<br>', 'alfa54');

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
('moduly_zekt');

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
-- Структура таблицы `o_clenah_klana`
--

CREATE TABLE `o_clenah_klana` (
  `id_tab_gl` int(11) DEFAULT NULL,
  `poz1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `poz2` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `o_clenah_klana`
--

INSERT INTO `o_clenah_klana` (`id_tab_gl`, `poz1`, `poz2`) VALUES
(1, 'text', 'заголовок'),
(2, 'img', 'text'),
(3, 'textarea', 'заголовок'),
(4, 'button', 'button');

-- --------------------------------------------------------

--
-- Структура таблицы `o_clenah_klana_data`
--

CREATE TABLE `o_clenah_klana_data` (
  `id` int(11) DEFAULT NULL,
  `stolb` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `name_attrib` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `text` varchar(6000) COLLATE utf8_bin DEFAULT NULL,
  `avtor` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name2` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `o_clenah_klana_status`
--

CREATE TABLE `o_clenah_klana_status` (
  `stolb` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `o_clenah_klana_status`
--

INSERT INTO `o_clenah_klana_status` (`stolb`, `str`, `status`) VALUES
(0, 0, '-s0s1s2s3s4s5s9'),
(2, 1, '-s0s1s2s3s4s5s9'),
(2, 4, '-s2s4s5'),
(1, 1, '-s2s4s5');

-- --------------------------------------------------------

--
-- Структура таблицы `o_clenah_klana_tegi`
--

CREATE TABLE `o_clenah_klana_tegi` (
  `stolb` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `name_teg` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name_attrib` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `text` varchar(6000) COLLATE utf8_bin DEFAULT NULL,
  `string_ili_int` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `o_clenah_klana_tegi`
--

INSERT INTO `o_clenah_klana_tegi` (`stolb`, `str`, `name_teg`, `name_attrib`, `text`, `string_ili_int`) VALUES
(0, 0, 'form', 'action', 'starki.php', 0),
(0, 0, 'form', 'method', 'POST', 0),
(1, 1, 'text', 'value', 'imie', 0),
(1, 1, 'text', 'class', 'imie_dolgnost', 0),
(2, 1, 'заголовок', 'h2', '', 0),
(2, 1, 'заголовок', 'class', 'imie_dolgnost_p', 0),
(2, 4, 'button', 'текст на кнопке', 'Очистить', 0),
(2, 4, 'button', 'type', 'reset', 0),
(1, 1, 'text', 'disabled', '', 0);

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
-- Структура таблицы `prawa_dolgnost`
--

CREATE TABLE `prawa_dolgnost` (
  `ID` int(11) DEFAULT NULL,
  `NAME` mediumtext COLLATE utf8_bin,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `prawa_dolgnost`
--

INSERT INTO `prawa_dolgnost` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Магистр дипломатии', 'h2', 'prawa_dolgnost_h2', '-s12345'),
(1, 'Просмотр online - статуса, Просмотр проектов, Просмотр планет членов альянса, Просмотр флотов членов альянса, Просмотр логов сражений членов альянса, Просмотр отношений членов альянса и отношений между альянсами, Назначение должности, Принятие в альянс и исключение из альянса, Модерирование чата альянса, Создание наград альянса, Награждение от имени альянса, Загрузка кораблей со склада альянса, Просмотр складов альянса.', 'p', 'prawa_dolgnost_p', '-s12345'),
(2, 'Izmenit', 'textarea', 'prawa_dolgnost_textarea', '-s45'),
(3, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(4, 'Изменить', 'starki.php', 'prawa_dolgnost_sawe', '-s45');

-- --------------------------------------------------------

--
-- Структура таблицы `rasy_stark`
--

CREATE TABLE `rasy_stark` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `rasy_stark`
--

INSERT INTO `rasy_stark` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'nameModul', 'text2', 'class_rasy_stark', '-45'),
(1, 'br', 'text', 'class_rasy_br', '-45'),
(2, 'br', 'text', 'class_rasy_br', '-45'),
(3, 'Гелионы', 'starki.php', 'class_rasy_stark_gelion btn', '-45'),
(4, 'br', 'text', 'class_rasy_br', '-45'),
(5, 'Зект', 'starki.php', 'class_rasy_stark_zect btn', '-45'),
(6, 'br', 'text', 'class_rasy_br', '-45'),
(7, 'Тормаль', 'starki.php', 'class_rasy_stark_tormal', '-45'),
(8, 'br', 'text', 'class_rasy_br', '-45'),
(9, 'Велид', 'starki.php', 'class_rasy_stark_velid', '-45'),
(10, 'br', 'text', 'class_rasy_br', '-45'),
(11, 'Гларг', 'starki.php', 'class_rasy_stark_glarg', '-45'),
(12, 'br', 'text', 'class_rasy_br', '-45'),
(13, 'Астокс', 'starki.php', 'class_rasy_stark_astoks', '-45'),
(14, 'br', 'text', 'class_rasy_br', '-45'),
(15, 'Мрун', 'starki.php', 'class_rasy_stark_mrun', '-45'),
(16, 'br', 'text', 'class_rasy_br', '-45');

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
(1, 'Сайт', 'starki.php', 'redaktor_up'),
(2, 'Выйти', 'redaktor.php', 'redaktor_up');

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
(11, 'Галоши надеть забыл он', 'redaktor.php', 'registracia btn btn-info'),
(12, 'Весь мир ошарашил вскоре', 'redaktor.php', 'registracia btn btn-info'),
(13, 'Лечили его всем миром', 'redaktor.php', 'registracia btn btn-info'),
(14, 'Намедни катался на лыжах', 'redaktor.php', 'registracia btn btn-info'),
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
  `metka` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zaprosov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `slegka_dfdx`
--

INSERT INTO `slegka_dfdx` (`id`, `metka`, `zaprosov`) VALUES
(0, '-', 0),
(1, 'главная', 434);

-- --------------------------------------------------------

--
-- Структура таблицы `starki_ustaw`
--

CREATE TABLE `starki_ustaw` (
  `ID` int(11) DEFAULT NULL,
  `NAME` mediumtext COLLATE utf8_bin,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `starki_ustaw`
--

INSERT INTO `starki_ustaw` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(1, '                1.Общие положения\r<br>1.1 Альянс Stark_ink организован 14 февраля 2019 года с целью обучение новичков в игре Звездная Федерация (далее ЗФ) Помощи им в освоение и понимание игры ЗФ и карьерного роста в соответствии с данным уставом.\r<br>1.2. Альянс Stark_ink  осуществляет свою деятельность в соответствии с правилами пользования предусмотренными руководством игры ЗФ, пактом принятом между альянсами и уставом конгресса альянсов (находиться в разработке, в дальнейшем будет дана ссылка)\r<br>1.3 Альянс Stark_ink является самостоятельным альянсом, несмотря на то что считается академией альянса StarWolves. Имеет свой уставной капитал и основателей в лице игроков IronMan6 и Han_Solo\r<br>1.4. Альянс Stark_ink имеет право производить договора, вести боевые действия, заключать союзы и иные действия с другими альянсами, вне зависимости от желания или нежелания отдельных его членов, но заведомо их предупредив.\r<br>1.5 Альянс Stark_ink вправе производить учредительство других альянсов и создание в них групп для их формирования из числа собственных членов. Созданные альянсы производят партнерство в соответствии отдельной договоренности.\r<br>1.6. Альянс Stark_ink осуществляет помощь новым членам альянса, освобождая их от налога в казну с момента приема и до конца календарного месяца, в котором был произведен прием (исключение имеют игроки со снятым статусом новичка)\r<br>1.7.Альянс Stark_ink осуществляет помощь в строительстве (перестройке планет в соответствии с технологиями альянса Stark_ink), помогая материалами для этого. Которые могут быть доставлены им либо взяты самостоятельно с любого из складов альянса что открыт к загрузке.\r<br>1.8.Альянс Stark_ink осуществляет помощь, в случае боевых потерь членами альянса Stark_ink. Это могут быть как материалы, модули, либо корабли или иные ценности.\r<br>1.9.Альянс Stark_ink осуществляет помощь в обучении, путем предоставления гайдов в группе в ВК кроме того, в данной группе постоянно обновляются как гайды, так и приветствуются собственные инициативы по их обновлению. Кроме того, любой член альянса в праве получить информационную помощь в специально созданном чате альянса в Скайпе!\r<br> \r<br>\r<br>2.Учредители\r<br>\r<br>2.1 StarWolves\r<br>2.2. IronMan6\r<br>2.3.Han_Solo\r<br>\r<br>3. Цели и задачи\r<br>\r<br>3.1 Обучение новичков игре ЗФ\r<br>3.2. Помощь новичкам в карьерном росте\r<br>3.3 Вывод альянса Stark_ink на лидирующие позиции в статистике альянсов ЗФ\r<br>\r<br>4. Членство\r<br>\r<br>4.1. Членами альянс Stark_ink могут быть любые игроки, достигнувшие рейтинга в игре 1000 и более.\r<br>4.2. Члены альянса Stark_ink сохраняют свою независимость и самостоятельность и имеют право на выход из альянса, если это не идет вразрез с уставом альянса Stark_ink и не наносит вреда другим его членам.\r<br> \r<br>5. Права и обязанности членов альянса Stark_ink\r<br>\r<br>5.1 Члены альянса Stark_ink имеют право:\r<br> 5.1.1. Управлять делами альянса Stark_ink на общих повестках и собраниях в чате альянса Stark_ink в Скайпе.\r<br> 5.1.2. Вносить свои предложения в чате альянса Stark_ink в Скайпе или в общем игровом чате альянса.\r<br> 5.1.3. Пользоваться любым имуществом в открытых складах альянса Stark_ink на свое усмотрение. (исключение составляют игроки со статусом новичок и желающие продать имущество альянса игрокам из других альянсов)\r<br> 5.1.4. Запрашивать любую информацию для собственного развития в чате альянса Stark_ink в Скайпе \r<br> 5.1.5. Получать помощь от альянса Stark_ink в виде кредитов, ресурсов, материалов, кораблей УД и даже ИГ если на то есть острая необходимость для альянса Stark_ink и соответственно возможность.\r<br> 5.1.6 не платить налог в казну альянса с момента вступления в альянс и до конца текущего месяца. (исключение игроки со снятым статусом новичка)\r<br>5.2. Обязанности членов альянса Stark_ink:\r<br> 5.2.1. Платить налог в казну альянса Stark_ink в размере не менее 100 ИГ в сутки. Ставка по кредитам на усмотрение игрока, но большое число кредитов на балансе ведет к увеличению потерь от казино и деятельности Археологических Центров (АЦ)\r<br>Рекомендуется либо скидывать излишки в казну, либо прятать в ТЦ.\r<br> 5.2.2. Иметь стабильный онлайн не менее 2х раз в неделю.\r<br> 5.2.3 Подключиться к чату альянса в скайпе\r<br>Олег Герчет (Han_Solo) профиль главы альянса Han_Solo в скайпе\r<br>Также можно запросить ссылку у старших офицеров альянса в игровом чате альянса.\r<br> 5.2.4. Быть вежливым с другими членами альянса, избегать флуда, спама, офтопа и иных действий, что могут привести к конфликтной ситуации.\r<br> 5.2.5. В случае агрессии или агрессивных действий в свой адрес, оповещать и корректировать свои действия со старшими офицерами в альянсе. Избегать его эскалации!\r<br> 5.2.6 В случае заморозки или длительного отсутствия (более месяца) предупреждать главу либо офицеров альянса (отсутствие, не отменяет налога в казну)\r<br> 5.2.7 В случае решения покинуть проект, передать в пользу альянса ценное имущество с аккаунта. Вам не надо, альянсу будет полезно.\r<br>\r<br>6.Порядок управления\r<br>\r<br>6.1. Управление осуществляется главой альянса Stark_ink Han_Solo\r<br>Заместитель главы Alamat и другими офицерами альянса.\r<br> 6.1.1 Глава Научного Комитета - Alamat\r<br>Осуществляет контроль научных изысканий, регулировкой ученых в альянсе по направлениям в науке\r<br> 6.1.2. Глава Производственного Комитета - Ellecon\r<br>Осуществляет добычу ресурсов для альянса курирует склады альянса, регулирует членов альянса, осуществляющих добычу ресурсов и производство материалов.\r<br> 6.1.3. Модератор чата в Скайпе - Vasilisk\r<br>Модерирует чат альянса в скайпе и в игре\r<br> 6.1.4 Дополнительно руководство осуществляют кураторы и консультанты из альянса StarWolver  _3a6u9ka_   ATTILA61  IronMan6\r<br>Осуществляют помощь в обучении боевой подготовки и общим обучении.\r<br> 6.1.5. Глава разведки и контрразведки (пока засекречен)\r<br>Деятельность засекречена.\r<br> 6.1.6. Регулировкой казны альянса, распределением должностей, званий в альянсе, приемом и отчислением занимаются глава альянса и его заместитель.\r<br>Удалить из альянса также имеют право и офицеры альянса.\r<br>\r<br>7. Приоритеты по расам\r<br>\r<br>7.1 Гелионы - осуществляют организацию производства материалов, для этого строят матоварки, КБ со складами альянса.\r<br>Также в приоритете боевое обучение. В качестве дополнения могут иметь возможность осуществлять помощь в науке, добыче ресурсов (но это вторичные задачи)\r<br>Обеспечивают альянс двигателями.\r<br>7.2 Мруны - создание планет “банков”, для пополнения кредитами казны альянса.\r<br>Осуществляют торговлю кораблями, материалами. Имеют все возможности для торговли планетами и орбитами. за использование технологий альянса ОБЯЗАНЫ, часть дохода с торговли передавать в казну альянса поверх налога! Часть является на усмотрение Мрунов.\r<br>Обеспечивают альянс модулями своей расы\r<br>7.3 Зекты - обеспечивают нужды альянса в ресурсах. Для этого строят ресурсодобывающие флоты, строят КБ со складами альянса для возможности изымать излишки ресурсов, для дальнейшей их переработки в материалы. Развитые Зекты осуществляют продажу материалами оптом. Как и Мруны, не забывают о казне!\r<br>Дополнительно могут производить помощь в обороне альянса, научных изысканиях, но это вторично.\r<br>Обеспечивают альянс ресурсодобывающими модулями\r<br>7.4. Гларги — это наши умы! за Гларгами в приоритете изучение наук для альянса!\r<br>Никто не против, если Гларг будет еще и добывать ресурсы, варить материалы, продавать их оптом и воевать, но это для Гларгов вторично.\r<br>Обеспечивают альянс реакторами и другими модулями своей расы.\r<br>7.5. Тормали - обладают лучшими трюмами и складами по объему! Для них в приоритете застройка на заказ, создание кораблей и их продажа, строительство КБ для нужд альянса и на продажу!\r<br>Обеспечение альянса модулями своей расы.\r<br>Так же, как и у остальных, во вторичных целях - добыча, маты, торговля. Все что может принести пользу альянсу!\r<br>7.6. Велиды — это раса имеет максимальный бонус к войне. За Велидами первично обучение боевой подготовке! Эта надежда альянса на случай агрессии. Если наши производители и ученные, не будут иметь защиты, то альянс в любой момент может быть подвержен атаке! Уж коль надели мундиры, то будьте добры соответствовать! для вас нет особой нужды махать кайлом, для добычи реса или сидеть с калькулятором изучая науку! Боевка, боевка и еще раз боевка!\r<br>Также, в ореоле полномочий Велидов, обеспечение альянса модулями вооружения, защиты и обороны. Возможна торговля боевыми кораблями.\r<br>Все остальные задачи вторичны и не приоритетны!\r<br>7.7 Астоксы - Основная деятельность, связана с разведкой. Возможна торговля археологами (корабли для добычи артефактов), торговля артефактами. Обеспечение альянса артефактами, модулями своей расы.\r<br>Кроме того, осуществляют содействие в получении разведданных для альянса. (под руководством главы разведки и контрразведки)\r<br>Остальные действия не осуждаются, но являются вторичны. (добыча ресурсов, варка материалов, торговля и т. д.)\r<br>\r<br> 8. Порядок подачи и выполнения заказов для изготовления модулей\r<br>\r<br>8.1 Заказчик - в игровом чате альянса, дает заявку, где прописывает:\r<br> 8.1.1 Точное название необходимых модулей и расу\r<br> 8.1.2 Уровень модулей\r<br> 8.1.3 Количество модулей\r<br> 8.1.4 Куда доставить готовые модули\r<br> 8.1.5 Задает вопрос куда отправить ресурсы для производства.\r<br>8.2 Исполнитель - в игровом чате отвечает на заказ, где прописывает:\r<br> 8.2.1 Скопировав текст заказа.\r<br> 8.2.2 Указывает куда доставить нужные ресурсы для производства.\r<br>8.3 Заказчик обязан не позднее чем через сутки после публикации заказа, доставить необходимое для производства. (в действительности, в приоритете 1-3 часа, не больше. Сутки это уже черта, перешагнув которую, игрок может быть даже удален из альянса) если есть сложности с доставкой, допускается дополнительная договоренность в ЛС с изготовителем.\r<br>8.4 Изготовитель, обязан не позднее чем через сутки, после поставки материалов, изготовить заказ и доставить его заказчику. Если имеется загруженность или недостаточная мощность производства, то не рекомендуется принимать заказ. Допускается дополнительная договоренность с заказчиком в ЛС\r<br>8.5. Производство модулей между членами альянса ведется совершенно бесплатно. Любые взимания “мзды” за услуги - Запрещены!\r<br>8.6 Запрещается брать самовольно материалы для производства модулей со складов альянса! Только с разрешения владельца!\r<br>8.7. Категорически запрещается брать материалы, ресурсы или иные ценности со складов альянса, для дальнейшей их продажи!!! Склады альянса исключительно для собственных нужд!!!\r<br>Для продажи производите собственные мощности, не в ущерб и не напрягая альянс!\r<br> \r<br>9.Переход в другой альянс либо выход из него\r<br>\r<br>9.1 Все члены альянса, при желании покинуть альянс, обязаны!!! Осведомить об этом главу, либо офицеров альянса\r<br>9.2 В приоритете переход в альянс StarWolver, что возможно после согласование с главами альянсов, прохождения всех стадий обучения и вручения знака отличия (орден джедая). В числе обязательных знаний (экзаменационных), обязательна знание боевки и пиратству, понимание механики игры.\r<br>9.3 Игрок обязан вернуть все ценности, которые ему выдавал альянс в пользование. если таковые были (Уды, планеты и т. д.). Перевести в казну альянса 20К ИГ, за помощь в обучении и строительстве своей империи.\r<br>9.4 Из альянса не имеют права уходить самостоятельно офицеры альянса и члены Научного Комитета, давшие присягу альянсу!\r<br>За нарушение данного пункта альянс оставляет за собой право преследования игрока, вплоть до обнуления всех планет игрока!!!\r<br>9.5 Переход в другие альянсы не приветствуется, но не осуждается. Возможен с согласованием с главой и выплаты компенсации в казну альянса. (ставка та же 20К ИГ)\r<br>Исключение имеют игроки, не снявшим статус новичка, либо пребывающим в альянсе совсем мало времени и не пользовавшиеся возможностями альянса\r<br>\r<br>10.Дополнения\r<br>\r<br>10.1 В устав могут быть внесены дополнения и редактирования. Это обусловлено изменениями в игре, составе руководства альянса или иными обстоятельствами, но согласованно с главой альянса, либо с его Заместителем!\r<br>\r<br>11. Боевые действия. Порядок и организация обороны\r<br>\r<br>Ввиду участившихся атак со стороны пиратов (и возможных атак от враждующих альянсов) приказываю:\r<br>11.1. Строить в обязательном порядке на орбитах всех планет и КБ оборонительные сооружения! Для эффективной обороноспособности, требуется не менее 150 БП (на старте можно даже 0 уровня, но после установки вооружения, следует постоянно увеличивать их прочность до ТОП уровня) Для исключения атаки с “подсадки”, в БП устанавливать 100 шт. планетарных разрушителей, 40 ЛЛ и 10 инерционных лазеров.\r<br>На орбиту устанавливать в дрейф орбитальную крепость, вооруженную ЛЛ и инерционными лазерами! в идеале еще и ТЛ.\r<br>Возможно, это не позволит избежать потери со стороны обороны, но даст время для прилета ГБР для помощи.\r<br>11.2 В обязательном порядке установить маскировку на все планеты и КБ! Это не даст вам 100% защиты, но усложнит атаку ваших планет!\r<br>11.3 В обязательном порядке установить на всех планетах здания контрразведки не менее 2х шт. и в ТОП по уровням! Это обезопасит вас от атак диверсантами!\r<br>11.4 Всем Велидам и Гелионам, в обязательном порядке осваивать боевку! Рос БР должен увеличиваться ежедневно от 10ти единиц!!! За помощью и в случае возникновения вопросов обращаться ко мне лично в скайпе или дискорте!\r<br>11.5 Всем в обязательном порядке в случае оффлайн, ставить на парковку флоты на главке, либо базах Федерации! В этом и только в этом случае, ваши флоты гарантированы от нападения на 100%!\r<br>11.6 Производить добычу и раскопки только онлайн! Либо быть на связи, в случае если корабли в цикле!\r<br>Все ресурсодобывающие флоты, археологи, желательно и транспорты оборудовать системами маскировки!\r<br>Для добычи предпочтительно создать флота на базе креп.\r<br>11.7 Вести постоянный мониторинг сообщений о сражениях. В случае атаки не писать, А ЗВОНИТЬ!!! Мне на скайп, он включен практически круглосуточно!\r<br>После подготовки ГБР и оснащения их, возможны будут звонки любому из ГБР.\r<br>Звонки разрешаются в любое время суток!!!\r<br>11.8 Всем игрокам осваивать боевку и создавать подвижные боевые флота! Это касается не только Велидов и Гелионов, ВСЕХ!\r<br>11.9 Руководителям промышленного комитета, оказать всяческое содействие в создание ГБР, провести мобилизацию среди Зектов и прочих рас (Мруны, Тормали), для увеличения добычи ресурсов для нужд альянса и увеличения производства материалов!\r<br>11.10. Этот пункт скорее предложение - все Лежащие без дела УДы, предлагаю свозить на Donfire_SPAK для создания банка УД. Что лежит без дела, будет либо меняться на нужное, либо распределяться между теми, от кого будет польза при их применении.\r<br>Кроме того, при продаже товаров минуя ТЦ, не забывайте скидывать в казну %. Вы используете техи альянса, это не дешево дается!\r<br>Последнее предложение, предлагаю скидываться ежемесячно в казну в районе 5К ИГ помимо налога. (кому это будет проблемно, не настаиваю). Нужно покупать фазы, нульки и т. д. для одного это дорого, всем будет не сложно.\r<br>11.11 В случае атаки и получения ущерба, сообщить мне либо офицерам альянса о причиненном ущербе. Альянс поможет вам восстановиться.\r<br>11.12 (дополнение) рекомендуется ставить в обороне центр обороны и с 50-100 штурмов в нее с ЛЛ \r<br>Запомните - колонизируя любую планету, после постройки колонии первично строительство обороны!!!\r<br> \r<br>\r<br>\r<br> \r<br> \r<br>', 'p', 'starki_ustaw_p', '-s12345'),
(2, 'Izmenit', 'textarea', 'starki_ustaw_textarea', '-s45'),
(3, 'br', 'text', 'starki_ustaw_br', '-s45'),
(4, 'Изменить', 'starki.php', 'starki_ustaw_sawe', '-s45');

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
  `BdUpMonth` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица будет содержать статистику запросов к другим таблица';

--
-- Дамп данных таблицы `statistik`
--

INSERT INTO `statistik` (`html`, `elektronik`, `SiteUpSec`, `SiteUpMin`, `SiteUpHours`, `SiteUpDay`, `SiteUpWday`, `SiteUpMon`, `SiteUpYears`, `SiteUpYday`, `SiteUpWeekday`, `SiteUpMonth`, `BdUpSec`, `BdUpMin`, `BdUpHours`, `BdUpDay`, `BdUpWday`, `BdUpMon`, `BdUpYears`, `BdUpYday`, `BdUpWeekday`, `BdUpMonth`) VALUES
(16570, 0, 33, 4, 19, 8, 4, 4, 2021, 97, 'Thursday', 'April', 41, 4, 19, 8, 4, 4, 2021, 97, 'Thursday', 'April');

-- --------------------------------------------------------

--
-- Структура таблицы `statistik_dfdx`
--

CREATE TABLE `statistik_dfdx` (
  `statik_true` int(11) DEFAULT NULL,
  `n_zapros` int(11) DEFAULT NULL,
  `d_zapros` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `statistik_dfdx`
--

INSERT INTO `statistik_dfdx` (`statik_true`, `n_zapros`, `d_zapros`) VALUES
(1, 67062, '2021-09-06');

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
('Nyna', 'ebmwn123', 'vsulga236@gmail.com ', 4, 1628959594),
('alex11', '123123', 'alexmwaукпкy78@gmail.com', 94224, 1629404370),
('GREYFOX', 'qwerty123', 'gorkatelecom@gmail.com', 1, 1629473393),
('Deathgar', 'tiberiansun', 'greedisgoodmillenium@gmail.com', 1, 1629474087),
('Shadow_1313', 'iq13kam77z', 'kuku100.74@mail.ru', 1, 1629564755);

-- --------------------------------------------------------

--
-- Структура таблицы `strarki_menu_dolgnosti`
--

CREATE TABLE `strarki_menu_dolgnosti` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `strarki_menu_dolgnosti`
--

INSERT INTO `strarki_menu_dolgnosti` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Изменить ширину меню', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45'),
(1, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s45'),
(2, 'Zwanie_alfa54', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(3, 'Администратор', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(4, 'alfa54', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(5, '<<<     alfa54', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(6, '^1     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(7, '^10     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(8, '^20     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(9, 'Сохранить alfa54', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(10, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(74, 'Изменить ширину меню', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45'),
(75, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s45'),
(76, 'Меню описания должностей', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45'),
(65, 'Zwanie_Deathgar', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(66, 'Джедай', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(67, 'Deathgar', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(68, '<<<     Deathgar', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(69, '^1     Deathgar', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(70, '^10     Deathgar', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(71, '^20     Deathgar', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(72, 'Сохранить Deathgar', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(73, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(56, 'Zwanie_GREYFOX', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(57, 'Джедай', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(58, 'GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(59, '<<<     GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(60, '^1     GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(61, '^10     GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(62, '^20     GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(63, 'Сохранить GREYFOX', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(64, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(11, 'Zwanie_Nyna', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(12, 'Глава альянса', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(13, 'Nyna', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(14, '<<<     Nyna', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(15, '^1     Nyna', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(16, '^10     Nyna', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(17, '^20     Nyna', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(18, 'Сохранить Nyna', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(19, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(20, 'Zwanie_Indi', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(21, 'Магистр дипломатии', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(22, 'Indi', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(23, '<<<     Indi', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(24, '^1     Indi', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(25, '^10     Indi', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(26, '^20     Indi', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(27, 'Сохранить Indi', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(28, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(29, 'Zwanie_Shadow_1313', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(30, 'Магистр', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(31, 'Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(32, '<<<     Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(33, '^1     Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(34, '^10     Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(35, '^20     Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(36, 'Сохранить Shadow_1313', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(37, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(47, 'Zwanie_boeslav', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(48, 'Джедай', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(49, 'boeslav', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(50, '<<<     boeslav', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(51, '^1     boeslav', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(52, '^10     boeslav', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(53, '^20     boeslav', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(54, 'Сохранить boeslav', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(55, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(38, 'Zwanie_alex25', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(39, 'Джедай', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(40, 'alex25', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(41, '<<<     alex25', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(42, '^1     alex25', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(43, '^10     alex25', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(44, '^20     alex25', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(45, 'Сохранить alex25', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(46, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459');

-- --------------------------------------------------------

--
-- Структура таблицы `strarki_menu_dolgnosti_prefix`
--

CREATE TABLE `strarki_menu_dolgnosti_prefix` (
  `ID` int(11) DEFAULT NULL,
  `prefix` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `strarki_menu_dolgnosti_prefix`
--

INSERT INTO `strarki_menu_dolgnosti_prefix` (`ID`, `prefix`, `login`) VALUES
(12, 'Магистр разведки', 'Модератор'),
(13, 'Магистр науки', 'Stark'),
(14, 'Магистр дипломат', 'Starki'),
(15, 'Зам Главы', 'Логин11'),
(16, 'Магистр дипломатии', 'Indi'),
(17, 'Джедай', 'boeslav'),
(18, 'Джедай', 'alex25'),
(19, 'Администратор', 'alfa54'),
(20, 'Глава альянса', 'Nyna'),
(21, 'Джедай', 'GREYFOX'),
(22, 'Джедай', 'Deathgar'),
(23, 'Магистр', 'Shadow_1313');

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
(1, 'redaktor_up', 0, 5),
(2, 'redaktor_down', 0, 3),
(5, 'menu_parametr_tab', 0, 4),
(7, 'login', 0, 5),
(8, 'podtverdit', 0, 5),
(10, 'menu_stark_up_status', 0, 9),
(11, 'menu_stark_glawnoe', 0, 7),
(13, 'redaktor_nastr7', 0, 9),
(14, 'dolgnosti_starkow', 0, 22),
(15, 'menu_maty', 0, 9),
(16, 'dla_statusob_123', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tab_modul`
--

CREATE TABLE `tab_modul` (
  `id` int(11) DEFAULT NULL,
  `login` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_modul` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `levl_modul` int(11) DEFAULT NULL,
  `rasa` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tab_modul`
--

INSERT INTO `tab_modul` (`id`, `login`, `name_modul`, `levl_modul`, `rasa`) VALUES
(0, 'login', 'modul', 0, 'rasa'),
(1, 'alex25', 'Грузовая платформа', 5, 'tormal'),
(2, 'alex25', 'Погрузочная платформа', 441, 'tormal'),
(3, 'alex25', 'Погрузочный модуль', 12002, 'tormal'),
(4, 'alex25', 'Большой корабельный ангар', 15400, 'tormal'),
(5, 'alex25', 'Корабельный ангар', 7861, 'tormal'),
(6, 'alex25', 'Сборщик обломков', 7212, 'tormal'),
(7, 'alex25', 'Малый грузовой отсек', 20000, 'tormal'),
(8, 'alex25', 'Грузовой отсек', 16852, 'tormal'),
(9, 'alex25', 'Большой грузовой отсек', 15000, 'tormal'),
(10, 'Indi', 'Грузовая платформа', 999, 'tormal'),
(11, 'Indi', 'Корабельный ангар', 40000, 'tormal'),
(12, 'Indi', 'Погрузочная платформа', 13245, 'tormal'),
(13, 'Indi', 'Погрузочный модуль', 21414, 'tormal'),
(14, 'Indi', 'Сборщик обломков', 21414, 'tormal'),
(15, 'Indi', 'Малый грузовой отсек', 27281, 'tormal'),
(16, 'Indi', 'Грузовой отсек', 32281, 'tormal'),
(17, 'Indi', 'Большой грузовой отсек', 27000, 'tormal'),
(18, 'Indi', 'Большой корабельный ангар', 40000, 'tormal');

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
('redaktor_up', 3),
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
('rasy_stark', 9),
('moduly_gelion', 9),
('moduly_tormal', 9);

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
