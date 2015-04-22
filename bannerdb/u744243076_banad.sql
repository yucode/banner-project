-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 21 2015 г., 22:18
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u744243076_banad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `code` text NOT NULL,
  `switch` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `start` datetime DEFAULT '0000-00-00 00:00:00',
  `end` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `author_id`, `title`, `code`, `switch`, `views`, `start`, `end`) VALUES
(1, 1, 'Parachute', '<img src="http://cs622721.vk.me/v622721862/27d1d/GXmIb84bf5o.jpg" width="300" height="240" alt="parachute" />', 1, 10, '2015-04-20 00:00:00', '2015-04-30 00:00:00'),
(2, 1, 'Surf', '<img src="http://cs622721.vk.me/v622721862/27e29/L2zcfYmiCKs.jpg" width="300" height="240" alt="parachute" />', 1, 0, '2015-05-30 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Rope', '<img src="http://cs624617.vk.me/v624617862/2a470/sOKoh4Qx_u0.jpg" width="300" height="240" alt="parachute" />', 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Climbing', '<img src="http://cs624617.vk.me/v624617862/2a477/yI-31635Q2E.jpg" width="300" height="240" alt="parachute" />', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Дамп данных таблицы `link`
--

INSERT INTO `link` (`id`, `page_id`, `banner_id`) VALUES
(64, 1, 1),
(65, 3, 1),
(75, 1, 3),
(76, 4, 3),
(82, 1, 4),
(83, 2, 4),
(84, 3, 4),
(85, 4, 4),
(86, 5, 4),
(110, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `url`) VALUES
(1, 'Home'),
(2, 'Goods'),
(3, 'Search'),
(4, 'Categories'),
(5, 'Contact');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
