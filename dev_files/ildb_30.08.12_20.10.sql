-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 30 2012 г., 20:08
-- Версия сервера: 5.0.95
-- Версия PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `wwwiling_ildb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int(11) NOT NULL auto_increment,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `student_id` int(5) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  `img` varchar(150) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `certificate`
--

INSERT INTO `certificate` (`id`, `date`, `name`, `student_id`, `school_groups_id`, `img`) VALUES
(4, '2012-07-18 14:54:22', 'db_scheme2', 32, 19, 'db_scheme2.pdf'),
(3, '2012-07-18 14:51:36', 'db_scheme1', 31, 18, 'db_scheme1.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(5) NOT NULL auto_increment,
  `group_format_id` int(5) NOT NULL default '1',
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `description` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `classroom`
--

INSERT INTO `classroom` (`id`, `group_format_id`, `name`, `description`) VALUES
(1, 1, 'Alli Azure', ''),
(2, 1, 'Deep Purple', ''),
(3, 2, 'Yellow Submarine', ''),
(4, 1, 'The Vert', ''),
(5, 1, 'Lemon Tree', ''),
(6, 1, 'Salsa', '');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `description` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'teachers', ''),
(4, 'managers', '');

-- --------------------------------------------------------

--
-- Структура таблицы `group_format`
--

CREATE TABLE IF NOT EXISTS `group_format` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `group_format`
--

INSERT INTO `group_format` (`id`, `name`, `description`) VALUES
(1, 'Индивидуальная', ''),
(2, 'Малая (3-5 чел.)', ''),
(3, 'Средняя (5-7 чел)', ''),
(4, 'Большая (10-15 чел)', '');

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `short_name` varchar(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `name`, `short_name`) VALUES
(1, 'Английский', 'En'),
(2, 'Немецкий', 'De'),
(3, 'Французский', 'Fr'),
(4, 'Итальянский', 'It'),
(5, 'Испанский', 'Es'),
(7, 'Польский', 'Pl'),
(8, 'Русский', 'Ru'),
(9, 'Китайский', 'Zh'),
(10, 'Чешский', 'Cs');

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `descriptiion` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `level`
--

INSERT INTO `level` (`id`, `name`, `descriptiion`) VALUES
(1, 'A1', ''),
(2, 'A2', ''),
(3, 'B1', ''),
(4, 'B2', ''),
(5, 'C3', '');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(5) NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `message` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL auto_increment,
  `from_user_id` int(5) NOT NULL,
  `to_user_id` int(5) NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `message` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL auto_increment,
  `student_id` int(6) NOT NULL,
  `users_id` int(5) NOT NULL,
  `school_groups_id` int(11) default NULL,
  `summ` decimal(8,2) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `comment` varchar(255) collate utf8_unicode_ci default NULL,
  `cnt_lessons` int(11) default NULL,
  `period_date_start` timestamp NOT NULL default '0000-00-00 00:00:00',
  `period_date_stop` timestamp NOT NULL default '0000-00-00 00:00:00',
  `payment_to` varchar(150) collate utf8_unicode_ci NOT NULL,
  `not_full` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `student_id`, `users_id`, `school_groups_id`, `summ`, `date`, `comment`, `cnt_lessons`, `period_date_start`, `period_date_stop`, `payment_to`, `not_full`) VALUES
(1, 17, 2, 2, 200.00, '2012-04-22 21:00:00', 'Платеж принят нормально', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(2, 17, 1, 2, 200.00, '2012-04-22 21:00:00', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(3, 18, 1, 2, 200.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(4, 18, 1, 2, 200.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(5, 18, 1, 2, 200.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(6, 18, 1, 2, 200.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(7, 10, 2, 2, 250.00, '2012-04-25 10:53:12', 'Оплатил все', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(8, 10, 2, 2, 250.00, '2012-04-25 10:53:12', NULL, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(9, 10, 2, 2, 250.00, '2012-04-25 10:53:12', 'Оплатил все', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(10, 10, 2, 1, 250.00, '2012-04-25 10:53:12', NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(11, 10, 2, 1, 250.00, '2012-04-25 10:53:12', 'Остался должен 20 грн.', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(13, 10, 2, 3, 250.00, '2012-04-25 10:53:12', 'Остался должен 20 грн.', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(14, 10, 2, 2, 250.00, '2012-04-25 10:53:12', NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(15, 10, 2, 1, 250.00, '2012-04-25 10:53:12', 'Остался должен 20 грн.', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(16, 10, 2, 3, 250.00, '2012-04-25 10:53:12', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(17, 10, 1, NULL, 165.00, '2012-04-12 21:00:00', 'Частичная оплата', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(18, 10, 1, NULL, 165.00, '2012-04-12 21:00:00', 'Часть оплаты', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(19, 10, 2, 2, 320.00, '2012-04-26 21:00:00', 'Полная оплата', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(20, 33, 3, 1, 165.00, '2012-04-11 21:00:00', 'Частичная оплата', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(22, 34, 1, 2, 300.00, '2012-04-24 21:00:00', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(23, 35, 1, 2, 450.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(25, 10, 1, 2, 200.00, '2012-04-27 21:00:00', 'просто так', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(49, 10, 1, 5, 320.00, '2012-05-02 21:00:00', 'Вукаодл', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За на бухло', 0),
(27, 10, 1, 2, 120.00, '2012-04-28 21:00:00', 'ва ва', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(28, 10, 1, 2, 120.00, '2012-04-28 21:00:00', 'ва ва', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(48, 10, 4, 2, 300.00, '2012-05-02 21:00:00', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(31, 10, 1, 2, 30.00, '2012-04-29 21:00:00', 'занятие', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(41, 10, 1, 2, 250.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(50, 10, 1, 1, 235.00, '2012-05-02 21:00:00', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(43, 10, 1, 1, 310.00, '2012-04-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(44, 10, 1, 3, 260.00, '2012-04-26 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(51, 19, 1, 11, 260.00, '2012-06-21 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 1),
(52, 19, 1, 11, 320.00, '2012-06-21 21:00:00', '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(53, 19, 1, 11, 320.00, '2012-06-21 21:00:00', '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(54, 5, 1, 10, 100.00, '2012-06-24 21:00:00', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 1),
(55, 5, 1, 10, 230.00, '2012-06-24 21:00:00', '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(56, 5, 1, 10, 234.00, '2012-06-24 21:00:00', 'werrrwwerwewrg fbrb trbeb', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 0),
(57, 10, 1, 1, 260.00, '2012-06-24 21:00:00', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'За обучение', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `school_groups`
--

CREATE TABLE IF NOT EXISTS `school_groups` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lang_id` int(5) NOT NULL,
  `level_id` int(5) NOT NULL,
  `group_format_id` int(5) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `school_groups`
--

INSERT INTO `school_groups` (`id`, `name`, `lang_id`, `level_id`, `group_format_id`, `status`) VALUES
(15, 'Индивидуал', 2, 1, 1, 0),
(16, 'Индивидуал', 9, 1, 1, 0),
(17, 'Индивидуал', 8, 1, 1, 0),
(18, 'Индивидуал', 8, 1, 1, 0),
(19, 'Индивидуал', 8, 1, 1, 0),
(20, 'test 02', 9, 1, 2, 1),
(21, 'De интенсив лето 17:00', 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `school_groups_users`
--

CREATE TABLE IF NOT EXISTS `school_groups_users` (
  `id` int(6) NOT NULL auto_increment,
  `school_groups_id` int(5) NOT NULL,
  `users_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `school_groups_users`
--

INSERT INTO `school_groups_users` (`id`, `school_groups_id`, `users_id`) VALUES
(1, 6, 2),
(2, 6, 5),
(3, 6, 3),
(4, 7, 7),
(5, 7, 3),
(6, 7, 7),
(7, 10, 2),
(8, 10, 7),
(9, 10, 7),
(10, 11, 2),
(11, 11, 6),
(12, 12, 4),
(13, 12, 5),
(14, 11, 10),
(15, 4, 11),
(16, 11, 13),
(17, 13, 7),
(18, 13, 3),
(19, 13, 4),
(20, 14, 13),
(21, 14, 13),
(22, 10, 14),
(23, 15, 14),
(24, 15, 13),
(25, 16, 14),
(26, 16, 14),
(27, 17, 14),
(28, 17, 14),
(29, 18, 14),
(30, 18, 14),
(31, 19, 14),
(32, 19, 14),
(33, 20, 13),
(34, 20, 14),
(35, 21, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(6) NOT NULL auto_increment,
  `fio` varchar(255) collate utf8_unicode_ci NOT NULL,
  `fio_name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `fio_sname` varchar(150) collate utf8_unicode_ci NOT NULL,
  `fio_mname` varchar(150) collate utf8_unicode_ci NOT NULL,
  `mail` varchar(50) collate utf8_unicode_ci default NULL,
  `phone` varchar(50) collate utf8_unicode_ci NOT NULL,
  `address` varchar(255) collate utf8_unicode_ci default NULL,
  `birthday` timestamp NULL default '0000-00-00 00:00:00',
  `status` int(3) default NULL,
  `comment` text collate utf8_unicode_ci,
  `business_info` varchar(255) collate utf8_unicode_ci default NULL,
  `from_know` varchar(150) collate utf8_unicode_ci default NULL,
  `discount` int(2) default NULL,
  `date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `status_id` int(5) default NULL,
  `test_lesson` timestamp NULL default '0000-00-00 00:00:00',
  `info_obj` text collate utf8_unicode_ci,
  `star` varchar(3) collate utf8_unicode_ci NOT NULL default 'off',
  `delete` varchar(15) collate utf8_unicode_ci NOT NULL default 'live',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `fio`, `fio_name`, `fio_sname`, `fio_mname`, `mail`, `phone`, `address`, `birthday`, `status`, `comment`, `business_info`, `from_know`, `discount`, `date`, `status_id`, `test_lesson`, `info_obj`, `star`, `delete`) VALUES
(1, '1 Шевченко Александр Александрович', '', '', '', 'skybee84@yandex.ru', '066-150-80-25', 'пр-т. Победы 48-а', '2009-01-15 22:00:00', NULL, 'Хороший студент', NULL, '1', 5, '2012-04-12 21:00:00', 0, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(2, '2 Михайлов Андрей Юрьевич', '', '', '', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2005-08-18 21:00:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'delete'),
(3, '3 Михайлов Андрей Юрьевич', '', '', '', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2012-04-14 20:01:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'arhive'),
(4, '4 Михайлов Андрей Юрьевич', '', '', '', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2012-04-14 20:02:09', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', 1, '2012-03-31 21:00:00', NULL, 'off', 'arhive'),
(5, 'Лысенко Андрей Генадиевич', 'Андрей', 'Лысенко', 'Генадиевич', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2005-08-18 21:00:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', '', 'метро', 0, '2012-04-13 21:00:00', 1, '2012-04-02 21:00:00', NULL, 'off', 'live'),
(6, '6 Михайлов Андрей Юрьевич', '', '', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-02 21:00:00', NULL, 'on', 'arhive'),
(7, '7 Михайлов Андрей Юрьевич', '', '', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', '', 'метро', 0, '2012-04-13 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'arhive'),
(8, '8 Михайлов Андрей Юрьевич', '', '', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL, 'off', 'delete'),
(9, '9 Михайлов Андрей Юрьевич', '', '', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL, 'off', 'delete'),
(10, '10 Михайлов Андрей Юрьевич', '', '', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', '', 'метро', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL, 'off', 'live'),
(11, 'Николаев Александр', '', '', '', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(12, 'Николаев Александр', '', '', '', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(13, 'Николаев Александр', '', '', '', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(14, 'Петренко Иван Антонавич', '', '', '', '', '0579580245', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-21 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(15, 'Максименко Иван Антонавич', '', '', '', '', '0579580245', 'ул. Ивановская 12-б', '2012-04-25 21:00:00', NULL, '', NULL, '2', 20, '2012-04-21 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(16, 'Павликов Михаил Иванович', '', '', '', 'sdf@mail.ru', '0669214566', 'ул. Магаданская 18', '0000-00-00 00:00:00', NULL, '', NULL, '2', 10, '2012-04-22 21:00:00', NULL, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(23, 'Цукерка Алена Васильевна', '', '', '', '', '0631256415', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-05-29 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"2";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:1:"2";s:11:"prefer_lang";s:2:"Ge";s:11:"schedule_ar";a:3:{i:1;s:8:"17:30:00";i:3;s:8:"18:00:00";i:5;s:8:"17:00:00";}}', 'off', 'live'),
(22, 'Николаенко Кирил Артемович', '', '', '', '', '0953082217', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-05-29 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"2";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:1:"2";s:11:"prefer_lang";s:2:"En";s:11:"schedule_ar";a:3:{i:1;s:8:"17:00:00";i:2;s:8:"17:30:00";i:4;s:8:"17:30:00";}}', 'off', 'live'),
(19, 'Максименко Андрей Павлович', '', '', '', '', '0503084571', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-04-26 21:00:00', 1, '2012-04-13 21:00:00', NULL, 'off', 'live'),
(20, 'Петренко Николай Алексеевич', '', '', '', '', '0991502021', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-05-29 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"3";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:1:"2";s:11:"prefer_lang";s:1:"2";s:11:"schedule_ar";a:4:{i:1;s:8:"18:00:00";i:3;s:8:"18:00:00";i:5;s:8:"16:30:00";i:7;s:8:"18:30:00";}}', 'off', 'live'),
(21, 'Василенеко Андрей Генадиевич', '', '', '', '', '308226512', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-05-29 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"3";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:4:"2:30";s:11:"prefer_lang";s:2:"Es";s:11:"schedule_ar";a:3:{i:1;s:8:"17:00:00";i:3;s:8:"16:30:00";i:5;s:8:"17:00:00";}}', 'off', 'live'),
(24, 'Василенко Артем Андреевич', 'Артем', 'Василенко', 'Андреевич', '', '0661598023', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-06-04 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(25, 'Петренко Генадий Андреевич', 'Генадий', 'Петренко', 'Андреевич', 'skybee@meta.ua', '0501507832', 'ул. Калужная 9', '2009-09-17 21:00:00', NULL, 'Мавзик ватерноп амбилака дерабе примп. Аля бры.', NULL, 'интернет', 0, '2012-07-02 21:00:00', 1, '2012-07-13 21:00:00', NULL, 'off', 'live'),
(26, 'Понин Вася Петрович', 'Вася', 'Понин', 'Петрович', '', '0924578615', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-02 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(27, 'Валик Стас Гаврилович', 'Стас', 'Валик', 'Гаврилович', '', '0661507832', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-02 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"4";s:11:"lesson_form";s:1:"1";s:13:"lesson_length";s:1:"2";s:11:"prefer_lang";s:2:"Es";s:11:"schedule_ar";a:3:{i:1;s:8:"00:00:00";i:4;s:8:"00:00:00";i:7;s:8:"00:00:00";}}', 'off', 'live'),
(28, 'Николенко Александр Викторович', 'Александр', 'Николенко', 'Викторович', 'sderty@mail.ru', '0923162215', 'ул. Светлая 17', '1997-01-15 22:00:00', NULL, 'Молодец!', NULL, 'метро', 0, '2012-07-05 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(29, 'Сирко Андрей Викторович', 'Андрей', 'Сирко', 'Викторович', 'sderty@ua.com', '0932173216', 'пр-т. Свободы 48, кв. 52', '1988-05-19 20:00:00', NULL, '', NULL, 'интернет', 0, '2012-07-08 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'live'),
(30, 'Ванько Андрей Генадиевич', 'Андрей', 'Ванько', 'Генадиевич', '', '05031822333', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-08 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'arhive'),
(31, 'Ванько Андрей Генадиевич', 'Андрей', 'Ванько', 'Генадиевич', '', '05031822333', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-08 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'delete'),
(32, 'Ванько Андрей Генадиевич', 'Андрей', 'Ванько', 'Генадиевич', '', '05031822333', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-08 21:00:00', 1, '0000-00-00 00:00:00', NULL, 'on', 'live'),
(33, 'Аксёнова Алина Юрьевна', 'Алина', 'Аксёнова', 'Юрьевна', '', '0507293710', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-03-13 22:00:00', 1, '0000-00-00 00:00:00', NULL, 'off', 'arhive'),
(34, 'Макушенко Марина Тимуровна', 'Марина', 'Макушенко', 'Тимуровна', '', '0633827406', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-06-04 21:00:00', 1, '2012-06-05 21:00:00', NULL, 'off', 'live'),
(35, 'Кравченко Марина Вячеславовна', 'Марина', 'Кравченко', 'Вячеславовна', '', '0989350797', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-04-17 21:00:00', 1, '2012-06-05 21:00:00', NULL, 'off', 'live'),
(36, 'Скорик Анна Леонидовна', 'Анна', 'Скорик', 'Леонидовна', '', '0675735740', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-03-26 21:00:00', 1, '2012-06-05 21:00:00', NULL, 'off', 'live'),
(37, 'Петренко Алексай Ифакович', 'Алексай', 'Петренко', 'Ифакович', '', '0509582345', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-07-17 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":5:{s:12:"count_lesson";s:1:"1";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:4:"2:30";s:11:"prefer_lang";s:2:"Es";s:11:"schedule_ar";a:2:{i:1;s:8:"16:00:00";i:4;s:8:"17:00:00";}}', 'off', 'live'),
(38, 'Микуленко Андрей ', 'Андрей', 'Микуленко', '', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, 'метро', 0, '2012-08-24 21:00:00', 1, '2012-08-16 21:00:00', NULL, 'on', 'live');

-- --------------------------------------------------------

--
-- Структура таблицы `student_school_groups`
--

CREATE TABLE IF NOT EXISTS `student_school_groups` (
  `id` int(8) NOT NULL auto_increment,
  `student_id` int(6) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  `test_lesson` timestamp NOT NULL default '0000-00-00 00:00:00',
  `start_lesson_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `start_pause` timestamp NOT NULL default '0000-00-00 00:00:00',
  `stop_pause` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `student_school_groups`
--

INSERT INTO `student_school_groups` (`id`, `student_id`, `school_groups_id`, `test_lesson`, `start_lesson_date`, `start_pause`, `stop_pause`) VALUES
(66, 38, 20, '2012-08-16 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 3, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(3, 4, 3, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(4, 5, 2, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(5, 6, 1, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(6, 7, 1, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(33, 10, 1, '0000-00-00 00:00:00', '2012-05-24 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 10, 3, '0000-00-00 00:00:00', '2012-05-16 21:00:00', '2012-06-27 21:00:00', '2012-06-29 21:00:00'),
(39, 10, 2, '0000-00-00 00:00:00', '2012-05-23 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 14, 6, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(14, 15, 7, '0000-00-00 00:00:00', '2012-04-27 13:33:21', '2012-04-27 13:32:48', '2012-04-27 13:32:57'),
(22, 19, 4, '2012-04-13 21:00:00', '0000-00-00 00:00:00', '2012-06-21 21:00:00', '2012-06-29 21:00:00'),
(41, 5, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 23, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 21, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 21, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 19, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 24, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 25, 1, '2012-07-13 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 26, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 11, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 20, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 26, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 23, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 28, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 29, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 32, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 33, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 34, 21, '2012-06-05 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 35, 21, '2012-06-05 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 36, 21, '2012-06-05 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 36, 1, '0000-00-00 00:00:00', '2012-07-03 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `student_status`
--

CREATE TABLE IF NOT EXISTS `student_status` (
  `id` int(5) NOT NULL auto_increment,
  `default` tinyint(1) NOT NULL,
  `in_list` tinyint(1) NOT NULL default '1',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL default '10',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_lang`
--

CREATE TABLE IF NOT EXISTS `teacher_lang` (
  `id` int(10) NOT NULL auto_increment,
  `user_id` int(5) NOT NULL,
  `lang_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `teacher_lang`
--

INSERT INTO `teacher_lang` (`id`, `user_id`, `lang_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 2),
(6, 5, 5),
(7, 6, 4),
(8, 7, 1),
(9, 7, 3),
(10, 7, 4),
(19, 13, 4),
(18, 13, 3),
(20, 14, 2),
(21, 14, 1),
(22, 15, 2),
(23, 16, 4),
(24, 17, 4),
(25, 18, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable_changes`
--

CREATE TABLE IF NOT EXISTS `timetable_changes` (
  `id` int(11) NOT NULL auto_increment,
  `timetable_set_id` int(11) NOT NULL,
  `change_date` date NOT NULL,
  `new_date` date NOT NULL,
  `classroom_id` int(4) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `day` int(1) NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Дамп данных таблицы `timetable_changes`
--

INSERT INTO `timetable_changes` (`id`, `timetable_set_id`, `change_date`, `new_date`, `classroom_id`, `school_groups_id`, `user_id`, `day`, `time_start`, `time_stop`) VALUES
(36, 17, '2012-08-20', '2012-08-20', 5, 16, 14, 1, '09:00:00', '11:00:00'),
(35, 44, '2012-08-20', '2012-08-20', 2, 20, 15, 1, '08:00:00', '10:00:00'),
(100, 46, '2012-08-27', '2012-08-27', 5, 15, 15, 1, '09:00:00', '10:30:00'),
(93, 17, '2012-08-27', '2012-08-27', 4, 16, 14, 1, '13:00:00', '15:00:00'),
(26, 46, '2012-08-20', '2012-08-20', 3, 15, 15, 1, '08:00:00', '09:30:00'),
(39, 17, '2012-09-24', '2012-09-24', 4, 16, 14, 1, '13:00:00', '15:00:00'),
(43, 44, '2012-09-24', '2012-09-24', 2, 20, 15, 1, '14:00:00', '16:00:00'),
(99, 44, '2012-08-27', '2012-08-27', 1, 20, 15, 1, '12:00:00', '13:30:00'),
(96, 23, '2012-08-28', '2012-08-28', 4, 19, 14, 2, '10:30:00', '12:00:00'),
(102, 44, '2012-09-10', '2012-09-10', 4, 20, 15, 1, '08:00:00', '10:00:00'),
(103, 18, '2012-09-13', '2012-09-13', 6, 16, 14, 4, '12:00:00', '13:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable_set`
--

CREATE TABLE IF NOT EXISTS `timetable_set` (
  `id` int(11) NOT NULL auto_increment,
  `classroom_id` int(5) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `day` int(1) NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `timetable_set`
--

INSERT INTO `timetable_set` (`id`, `classroom_id`, `school_groups_id`, `user_id`, `day`, `time_start`, `time_stop`) VALUES
(47, 5, 15, 15, 7, '08:30:00', '10:00:00'),
(46, 1, 15, 15, 1, '12:00:00', '14:00:00'),
(17, 4, 16, 14, 1, '11:30:00', '13:00:00'),
(18, 6, 16, 14, 4, '12:00:00', '14:00:00'),
(23, 3, 19, 14, 2, '08:00:00', '09:30:00'),
(24, 4, 19, 14, 5, '12:00:00', '14:00:00'),
(48, 6, 20, 14, 6, '19:30:00', '21:00:00'),
(45, 2, 20, 15, 4, '19:30:00', '21:30:00'),
(28, 5, 21, 15, 2, '13:30:00', '15:00:00'),
(29, 2, 21, 15, 3, '17:00:00', '18:30:00'),
(30, 3, 21, 15, 5, '17:00:00', '18:30:00'),
(44, 4, 20, 15, 1, '10:30:00', '11:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(40) collate utf8_unicode_ci NOT NULL,
  `salt` varchar(40) collate utf8_unicode_ci default NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) collate utf8_unicode_ci default NULL,
  `forgotten_password_code` varchar(40) collate utf8_unicode_ci default NULL,
  `remember_code` varchar(40) collate utf8_unicode_ci default NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned default NULL,
  `active` tinyint(1) unsigned default NULL,
  `fio` varchar(255) collate utf8_unicode_ci default NULL,
  `fio_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `fio_sname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `fio_mname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `name` varchar(150) collate utf8_unicode_ci NOT NULL default 'Антон',
  `company` varchar(100) collate utf8_unicode_ci default NULL,
  `phone` varchar(20) collate utf8_unicode_ci default NULL,
  `address` varchar(200) collate utf8_unicode_ci NOT NULL,
  `comment` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `fio`, `fio_name`, `fio_sname`, `fio_mname`, `name`, `company`, `phone`, `address`, `comment`) VALUES
(1, 2130706433, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1268889823, 1, 'Admin', '', '', '', 'Антон', 'ADMIN', '0', '', ''),
(2, 111, 'teacher1', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Евтушенко Анна Семеновна', '', '', '', 'Антон', NULL, NULL, '', ''),
(3, 111, 'teacher2', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Кузнец Генадий Петрович', '', '', '', 'Антон', NULL, NULL, '', ''),
(4, 111, 'teacher3', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Голубь Татьяна Николаевна', '', '', '', 'Антон', NULL, NULL, '', ''),
(5, 111, 'teacher4', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Волк Максим Васильевич', '', '', '', 'Антон', NULL, NULL, '', ''),
(6, 111, 'teacher5', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Лоза Андрей Юрьевич', '', '', '', 'Антон', NULL, NULL, '', ''),
(7, 111, 'teacher6', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Кивенко Марина Альбертовна', '', '', '', 'Антон', NULL, NULL, '', ''),
(13, 0, '', '', NULL, 'dertom@rr.ru', NULL, NULL, NULL, 0, NULL, NULL, 'Ефремов Константин Авлентович', 'Константин', 'Ефремов', 'Авлентович', 'Антон', NULL, '05932545812', 'ул. Международная 32', 'Молодец! Очень'),
(14, 0, '', '', NULL, '', NULL, NULL, NULL, 0, NULL, NULL, 'Мирный Герман Алексеевич', 'Герман', 'Мирный', 'Алексеевич', 'Антон', NULL, '0991482516', '', ''),
(15, 0, '', '', NULL, 'y-la@mail.ru', NULL, NULL, NULL, 0, NULL, NULL, 'Куринова Юлия Вячеславовна', 'Юлия', 'Куринова', 'Вячеславовна', 'Антон', NULL, '0637603357', '', ''),
(16, 0, '', '', NULL, 'marco7519@virgilio.it', NULL, NULL, NULL, 0, NULL, NULL, 'Cirulli Marco ', 'Marco', 'Cirulli', '', 'Антон', NULL, '0669701415', '', ''),
(17, 0, '', '', NULL, 'marco7519@virgilio.it', NULL, NULL, NULL, 0, NULL, NULL, 'Cirulli Marco ', 'Marco', 'Cirulli', '', 'Антон', NULL, '80669701415', '', ''),
(18, 0, '', '', NULL, 'irennikl@rambler.ru', NULL, NULL, NULL, 0, NULL, NULL, 'Конон Ирина Александровна', 'Ирина', 'Конон', 'Александровна', 'Антон', NULL, '80662249728', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 3),
(5, 4, 3),
(6, 5, 3),
(7, 6, 3),
(8, 7, 3),
(9, 8, 3),
(10, 9, 3),
(11, 10, 3),
(12, 11, 3),
(13, 12, 3),
(14, 13, 3),
(15, 14, 3),
(16, 15, 3),
(17, 16, 3),
(18, 17, 3),
(19, 18, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
