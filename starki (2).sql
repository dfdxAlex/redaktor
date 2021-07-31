-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 31 2021 г., 15:11
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `starki`
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
(3, 'Stark');

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
(2, 'Падаван', 'хз что может'),
(3, 'Магистр науки', 'Наука всему голова');

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
(2, 'Мы на Ютубе', 'starki.php', 'login_stark btn', '-012345');

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
-- Структура таблицы `nastrolkiredaktora`
--

CREATE TABLE `nastrolkiredaktora` (
  `imiePosTabl` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `nastrolkiredaktora`
--

INSERT INTO `nastrolkiredaktora` (`imiePosTabl`) VALUES
('news1');

-- --------------------------------------------------------

--
-- Структура таблицы `news1`
--

CREATE TABLE `news1` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `news` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `login_redaktora` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `news1`
--

INSERT INTO `news1` (`id`, `name`, `news`, `login_redaktora`) VALUES
(0, '', '[img]https://habr.com/ru/company/otus/blog/484048/[/img]', 'alfa54'),
(1, '', '', 'alfa54'),
(2, '', '', 'alfa54'),
(3, '', '[img]https://habr.com/ru/company/otus/blog/484048/[/img]', 'alfa54'),
(4, '', '[img]https://habr.com/ru/company/otus/blog/484048/[/img]', 'alfa54'),
(5, '', '[<img src=]https://habr.com/ru/company/otus/blog/484048/[/<img src=]', 'alfa54'),
(6, '', '[img]https://habr.com/ru/company/otus/blog/484048/[/img]', 'alfa54'),
(7, '', '<img src=]https://habr.com/ru/company/otus/blog/484048/[/<img src=]', 'alfa54'),
(8, 'иди на**', '<img src=https://habr.com/ru/company/otus/blog/484048>', 'alfa54'),
(9, 'иди на**', '<img src=\"https://mms.businesswire.com/media/20210303005333/en/862508/4/%5BEN%5DTEG_Module_Structure.jpg?download=1\">', 'alfa54'),
(10, 'иди на**', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Z4zgymBy2VQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alfa54'),
(11, '', '<img src=\"https://www.womanhit.ru/media/CACHE/images/articleimage2/2020/10/1_nEZ6vVT/c2fe89bec413d04cd01ae0bd1f54276e.png\">', 'alfa54');

-- --------------------------------------------------------

--
-- Структура таблицы `news1_redaktor`
--

CREATE TABLE `news1_redaktor` (
  `ID` int(11) DEFAULT NULL,
  `NAME` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `news1_redaktor`
--

INSERT INTO `news1_redaktor` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'zagolowok', 'text2', 'news1_redaktor_text2', '-s45'),
(1, 'br', 'text', 'news1_redaktor_br', '-s45'),
(2, 'statia', 'textarea', 'news1_redaktor_textarea', '-s45'),
(3, 'br', 'text', 'news1_redaktor_br', '-s45'),
(4, 'Сохранить', 'starki.php', 'news1_redaktor_button', '-s45'),
(5, 'br', 'text', 'news1_redaktor_br', '-s45');

-- --------------------------------------------------------

--
-- Структура таблицы `news1_redaktor2`
--

CREATE TABLE `news1_redaktor2` (
  `ID` int(11) DEFAULT NULL,
  `NAME` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `news1_redaktor2`
--

INSERT INTO `news1_redaktor2` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'zagolowok', 'text2', 'news1_redaktor_text2', '-s12345'),
(1, 'br', 'text', 'news1_redaktor_br', '-s12345'),
(2, 'statia', 'textarea', 'news1_redaktor_textarea', '-s12345'),
(3, 'br', 'text', 'news1_redaktor_br', '-s12345'),
(4, 'Сохранить', 'starki.php', 'news1_redaktor_button', '-s12345'),
(5, 'br', 'text', 'news1_redaktor_br', '-s12345');

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
  `NAME` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `prawa_dolgnost`
--

INSERT INTO `prawa_dolgnost` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Заместитель', 'h2', 'prawa_dolgnost_h2', '-s12345'),
(1, '', 'p', 'prawa_dolgnost_p', '-s12345'),
(2, 'Izmenit', 'textarea', 'prawa_dolgnost_textarea', '-s45'),
(3, 'br', 'text', 'prawa_dolgnost_br', '-s45'),
(4, 'Изменить', 'starki.php', 'prawa_dolgnost_sawe', '-s45');

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
(8, 'Маты', 'redaktor.php', 'redaktor_nastr7_maty', '-54');

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
(11, 'Больше не буду плакать', 'redaktor.php', 'registracia btn btn-info'),
(12, 'Звёзды спадают на пол', 'redaktor.php', 'registracia btn btn-info'),
(13, 'Кот шурудит на крыше', 'redaktor.php', 'registracia btn btn-info'),
(14, 'Дождь уже слабо падал', 'redaktor.php', 'registracia btn btn-info'),
(15, 'br', 'text', 'registracia btn btn-info'),
(16, 'Сменить капчу', 'redaktor.php', 'registracia btn btn-info'),
(17, 'Очистить', 'redaktor.php', 'registracia btn btn-info'),
(17, 'Проверить', 'redaktor.php', 'registracia btn btn-info');

-- --------------------------------------------------------

--
-- Структура таблицы `starki_ustaw`
--

CREATE TABLE `starki_ustaw` (
  `ID` int(11) DEFAULT NULL,
  `NAME` mediumtext COLLATE utf8_bin DEFAULT NULL,
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
('Модератор', '123123', 'Почта', 4, 1618926955),
('Stark', '123123', 'arbfaergf', 1, 1619007402),
('Starki', '123123', 'swtrugnwsioer', 1, 1619007929),
('Логин11', '123123', 'Почта11', 1, 1619226084),
('Логин111', '123123', 'aleway78@gmail.com', 1, 1625528918),
('Логин1122', '123123', 'aleqsgvay@mail.ru', 1, 1625528965),
('Логин11234', '123123', 'alexwerfay78@gmail.com', 1, 1625529008),
('alfa54erf', '1111', 'alexmwewey78@gmail.com', 1, 1625529131),
('alfa54e5rg', '123123', 'aleqrgfgay78@gmail.com', 1, 1625529509),
('afdsdf3', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf3', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf6', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf7', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf8', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf10', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf11', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf12', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf13', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf14', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf15', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf16', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf17', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf18', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf19', 'agrear', 'aqerfe', 1, 5234534),
('afdsdf20', 'agrear', 'aqerfe', 1, 5234534),
('alex25', '123123', 'alex444y@mail.ru', 1, 1626041766);

-- --------------------------------------------------------

--
-- Структура таблицы `strarki_menu_dolgnosti`
--

CREATE TABLE `strarki_menu_dolgnosti` (
  `ID` int(11) DEFAULT NULL,
  `NAME` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CLASS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `strarki_menu_dolgnosti`
--

INSERT INTO `strarki_menu_dolgnosti` (`ID`, `NAME`, `URL`, `CLASS`, `STATUS`) VALUES
(0, 'Изменить ширину меню', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45'),
(1, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s45'),
(2, 'Zwanie_alfa54', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(3, 'Глава альянса', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(4, 'alfa54', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(5, '<<<     alfa54', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(6, '^1     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(7, '^10     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(8, '^20     alfa54', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(9, 'Сохранить alfa54', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(10, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(11, 'Zwanie_Модератор', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(12, 'Магистр разведки', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(13, 'Модератор', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(14, '<<<     Модератор', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(15, '^1     Модератор', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(16, '^10     Модератор', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(17, '^20     Модератор', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(18, 'Сохранить Модератор', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(19, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(20, 'Zwanie_Stark', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(21, 'Магистр науки', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(22, 'Stark', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(23, '<<<     Stark', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(24, '^1     Stark', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(25, '^10     Stark', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(26, '^20     Stark', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(27, 'Сохранить Stark', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(28, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(29, 'Zwanie_Starki', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(30, 'Магистр дипломат', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(31, 'Starki', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(32, '<<<     Starki', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(33, '^1     Starki', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(34, '^10     Starki', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(35, '^20     Starki', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(36, 'Сохранить Starki', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(37, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(38, 'Zwanie_Логин11', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(39, 'Зам Главы', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(40, 'Логин11', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(41, '<<<     Логин11', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(42, '^1     Логин11', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(43, '^10     Логин11', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(44, '^20     Логин11', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(45, 'Сохранить Логин11', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(46, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(47, 'Zwanie_Логин111', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(48, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(49, 'Логин111', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(50, '<<<     Логин111', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(51, '^1     Логин111', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(52, '^10     Логин111', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(53, '^20     Логин111', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(54, 'Сохранить Логин111', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(55, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(56, 'Zwanie_Логин1122', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(57, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(58, 'Логин1122', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(59, '<<<     Логин1122', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(60, '^1     Логин1122', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(61, '^10     Логин1122', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(62, '^20     Логин1122', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(63, 'Сохранить Логин1122', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(64, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(65, 'Zwanie_Логин11234', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(66, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(67, 'Логин11234', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(68, '<<<     Логин11234', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(69, '^1     Логин11234', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(70, '^10     Логин11234', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(71, '^20     Логин11234', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(72, 'Сохранить Логин11234', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(73, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(74, 'Zwanie_alfa54erf', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(75, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(76, 'alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(77, '<<<     alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(78, '^1     alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(79, '^10     alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(80, '^20     alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(81, 'Сохранить alfa54erf', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(82, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(83, 'Zwanie_alfa54e5rg', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(84, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(85, 'alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(86, '<<<     alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(87, '^1     alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(88, '^10     alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(89, '^20     alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(90, 'Сохранить alfa54e5rg', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(91, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(92, 'Zwanie_afdsdf3', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(93, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(94, 'afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(95, '<<<     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(96, '^1     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(97, '^10     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(98, '^20     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(99, 'Сохранить afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(100, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(101, 'Zwanie_afdsdf3', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(102, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(103, 'afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(104, '<<<     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(105, '^1     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(106, '^10     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(107, '^20     afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(108, 'Сохранить afdsdf3', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(109, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(110, 'Zwanie_afdsdf6', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(111, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(112, 'afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(113, '<<<     afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(114, '^1     afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(115, '^10     afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(116, '^20     afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(117, 'Сохранить afdsdf6', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(118, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(119, 'Zwanie_afdsdf7', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(120, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(121, 'afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(122, '<<<     afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(123, '^1     afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(124, '^10     afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(125, '^20     afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(126, 'Сохранить afdsdf7', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(127, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(128, 'Zwanie_afdsdf8', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(129, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(130, 'afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(131, '<<<     afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(132, '^1     afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(133, '^10     afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(134, '^20     afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(135, 'Сохранить afdsdf8', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(136, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(137, 'Zwanie_afdsdf10', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(138, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(139, 'afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(140, '<<<     afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(141, '^1     afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(142, '^10     afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(143, '^20     afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(144, 'Сохранить afdsdf10', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(145, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(146, 'Zwanie_afdsdf11', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(147, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(148, 'afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(149, '<<<     afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(150, '^1     afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(151, '^10     afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(152, '^20     afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(153, 'Сохранить afdsdf11', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(154, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(155, 'Zwanie_afdsdf12', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(156, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(157, 'afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(158, '<<<     afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(159, '^1     afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(160, '^10     afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(161, '^20     afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(162, 'Сохранить afdsdf12', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(163, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(164, 'Zwanie_afdsdf13', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(165, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(166, 'afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(167, '<<<     afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(168, '^1     afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(169, '^10     afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(170, '^20     afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(171, 'Сохранить afdsdf13', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(172, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(173, 'Zwanie_afdsdf14', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(174, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(175, 'afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(176, '<<<     afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(177, '^1     afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(178, '^10     afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(179, '^20     afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(180, 'Сохранить afdsdf14', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(181, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(182, 'Zwanie_afdsdf15', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(183, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(184, 'afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(185, '<<<     afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(186, '^1     afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(187, '^10     afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(188, '^20     afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(189, 'Сохранить afdsdf15', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(190, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(191, 'Zwanie_afdsdf16', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(192, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(193, 'afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(194, '<<<     afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(195, '^1     afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(196, '^10     afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(197, '^20     afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(198, 'Сохранить afdsdf16', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(199, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(200, 'Zwanie_afdsdf17', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(201, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(202, 'afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(203, '<<<     afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(204, '^1     afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(205, '^10     afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(206, '^20     afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(207, 'Сохранить afdsdf17', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(208, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(209, 'Zwanie_afdsdf18', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(210, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(211, 'afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(212, '<<<     afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(213, '^1     afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(214, '^10     afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(215, '^20     afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(216, 'Сохранить afdsdf18', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(217, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(218, 'Zwanie_afdsdf19', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(219, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(220, 'afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(221, '<<<     afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(222, '^1     afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(223, '^10     afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(224, '^20     afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(225, 'Сохранить afdsdf19', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(226, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(227, 'Zwanie_afdsdf20', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(228, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(229, 'afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(230, '<<<     afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(231, '^1     afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(232, '^10     afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(233, '^20     afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(234, 'Сохранить afdsdf20', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(235, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(236, 'Zwanie_alex25', 'text2', 'strarki_menu_dolgnosti_text2', '-s45'),
(237, ' ', 'starki.php', 'strarki_menu_dolgnosti_prefix btn', '-s123'),
(238, 'alex25', 'starki.php', 'strarki_menu_dolgnosti_login btn', '-s0123459'),
(239, '<<<     alex25', 'starki.php', 'strarki_menu_dolgnosti_down btn', '-s45'),
(240, '^1     alex25', 'starki.php', 'strarki_menu_dolgnosti_up1 btn', '-s45'),
(241, '^10     alex25', 'starki.php', 'strarki_menu_dolgnosti_up10 btn', '-s45'),
(242, '^20     alex25', 'starki.php', 'strarki_menu_dolgnosti_up20 btn', '-s45'),
(243, 'Сохранить alex25', 'starki.php', 'strarki_menu_dolgnosti_save btn', '-s45'),
(244, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s0123459'),
(245, 'Изменить ширину меню', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45'),
(246, 'br', 'text', 'strarki_menu_dolgnosti_br', '-s45'),
(247, 'Меню описания должностей', 'starki.php', 'strarki_menu_dolgnosti_rashirit btn', '-s45');

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
(11, 'Глава альянса', 'alfa54'),
(12, 'Магистр разведки', 'Модератор'),
(13, 'Магистр науки', 'Stark'),
(14, 'Магистр дипломат', 'Starki'),
(15, 'Зам Главы', 'Логин11');

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
(11, 'menu_stark_glawnoe', 0, 3),
(13, 'redaktor_nastr7', 0, 9),
(14, 'dolgnosti_starkow', 0, 22),
(15, 'menu_maty', 0, 9),
(16, 'dla_statusob_123', 0, 1);

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
('news1_redaktor2', 9);

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
