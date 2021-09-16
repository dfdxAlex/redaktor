-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.2.30
-- Время создания: Сен 09 2021 г., 00:39
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
