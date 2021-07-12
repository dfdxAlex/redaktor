-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.2.30
-- Время создания: Июл 12 2021 г., 23:36
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
