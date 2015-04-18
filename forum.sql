-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 18 2015 г., 23:13
-- Версия сервера: 5.1.73
-- Версия PHP: 5.3.2-1ubuntu4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `MSGID` int(11) NOT NULL,
  `MSGTID` int(11) NOT NULL,
  `MSGUID` int(11) NOT NULL,
  `MSGDate` date NOT NULL,
  `MSGContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `MSGID` (`MSGID`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`MSGID`, `MSGTID`, `MSGUID`, `MSGDate`, `MSGContent`) VALUES
(1, 1, 1, '2010-04-29', 'Сообщение'),
(2, 1, 2, '2015-04-13', 'Новое сообщение'),
(3, 1, 2, '2015-04-13', ' пропропропро'),
(6, 5, 1, '2010-04-29', 'Сообщение'),
(7, 5, 4, '2015-04-17', ' sdfasfs'),
(9, 5, 4, '2015-04-17', ' asdfsdafasdfsdf'),
(10, 5, 4, '2015-04-17', ' sdfasfsf'),
(12, 5, 4, '2015-04-17', ' cccccccccccccc'),
(13, 5, 4, '2015-04-17', ' sadfsda'),
(14, 5, 4, '2015-04-17', ' asdfasd'),
(15, 11, 4, '2015-04-17', ' '),
(16, 11, 4, '2015-04-17', ' '),
(18, 14, 4, '2015-04-18', ' hjghjghjghj'),
(19, 14, 4, '2015-04-18', ' sdfasd'),
(20, 20, 6, '2015-04-18', ' sadfasd'),
(21, 20, 6, '2015-04-18', ' sadfasd'),
(22, 14, 6, '2015-04-18', ' sadfsdfdasf'),
(23, 14, 6, '2015-04-18', ' sdfsdfas'),
(24, 15, 5, '2015-04-18', ' safasdf'),
(25, 24, 4, '2015-04-18', ' sdfsda');

-- --------------------------------------------------------

--
-- Структура таблицы `subForum`
--

CREATE TABLE IF NOT EXISTS `subForum` (
  `FID` int(11) NOT NULL,
  `FUID` int(11) NOT NULL,
  `FDate` date NOT NULL,
  `FContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `FID` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Дамп данных таблицы `subForum`
--

INSERT INTO `subForum` (`FID`, `FUID`, `FDate`, `FContent`) VALUES
(1, 1, '2015-04-15', 'ПОДФОРУМ!'),
(2, 4, '2015-04-18', ' asdasdasdas'),
(3, 4, '2015-04-18', ' sdasdasd'),
(4, 4, '2015-04-18', 'sdafsdfsdafsdfasdfasdfsd'),
(5, 4, '2015-04-18', 'sdafsdfsdafsdfasdfasdfsd'),
(6, 4, '2015-04-18', 'asdfsdfasdf'),
(7, 4, '2015-04-18', 'asdfsdfasdf'),
(8, 4, '2015-04-18', 'asdfsdfasdf'),
(9, 4, '2015-04-18', ' asdasa'),
(10, 4, '2015-04-18', 'asdfsdfasdf'),
(11, 4, '2015-04-18', ' фывфвф'),
(13, 4, '2015-04-18', ' zsdzsadsdfs');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `ThemID` int(11) NOT NULL,
  `ThemUID` int(11) NOT NULL,
  `ThemDate` date NOT NULL,
  `ThemContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ThemDescr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ThemFID` int(11) NOT NULL,
  UNIQUE KEY `ThemID` (`ThemID`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`ThemID`, `ThemUID`, `ThemDate`, `ThemContent`, `ThemDescr`, `ThemFID`) VALUES
(1, 1, '2010-05-01', 'Новая тема', '', 0),
(2, 2, '2015-04-12', ' ', '', 0),
(3, 2, '2015-04-12', ' asd', '', 0),
(4, 2, '2015-04-12', ' ', '', 0),
(6, 4, '2015-04-17', ' ', '', 0),
(7, 4, '2015-04-17', ' фываывфа', '', 0),
(14, 4, '2015-04-18', ' sadasdas', '', 1),
(15, 4, '2015-04-18', ' sdasd', '', 1),
(16, 4, '2015-04-18', ' sadasdas', '', 1),
(17, 5, '2015-04-18', ' ', '', 2),
(18, 6, '2015-04-18', ' sfsdfs', '', 1),
(19, 4, '2015-04-18', ' dasddas', '', 1),
(20, 6, '2015-04-18', ' asdfasd', '', 3),
(21, 6, '2015-04-18', ' asdfasd', '', 3),
(22, 6, '2015-04-18', ' rsdtgrt', '', 3),
(23, 6, '2015-04-18', ' rsdtgrt', '', 3),
(24, 6, '2015-04-18', ' dfsdf', '', 1),
(25, 4, '2015-04-18', ' sdfsdf', '', 1),
(26, 4, '2015-04-18', ' sdfdsfsds', '', 12),
(27, 4, '2015-04-18', ' 1', '', 13),
(28, 3, '2015-04-18', ' xzcdzxczx', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(11) NOT NULL,
  `UName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UPSW` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Family` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SecName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Power` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `UID` (`UID`,`UName`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`UID`, `UName`, `UPSW`, `Family`, `Name`, `SecName`, `Power`) VALUES
(1, 'Andrey', 'Fadeev', 'Фадеев', 'Андрей', 'Михайлович', ''),
(2, 'Vasily', 'Vasily', 'Василий', 'Василий', 'Васильев', ''),
(3, 'nik', 'w', 'фам', 'имя', 'отч', 'u'),
(4, 'nik1', 'c', 'sd', 'sd', 'sd', 'a'),
(5, 'nik2', 'w', 'sd', 'sd', 'sd', 'm'),
(6, 'nik3', 'e', 'sd', 'sd', 'sd', 'u'),
(7, 'fam', 'fam', 'Фамилия', 'Имя ', 'Отчество', 'u');
