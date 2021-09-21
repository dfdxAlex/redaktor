-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 19 2021 г., 00:33
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
(4, 'На сайт', 'starki.php', 'login_stark'),
(0, 'login_status', 'text2', 'login_stark'),
(1, 'parol_status', 'text2', 'login_stark'),
(2, 'Вход', 'starki.php', 'login_stark'),
(3, 'Регистрация', 'starki.php', 'login_stark'),
(4, 'На сайт', 'starki.php', 'login_stark');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
