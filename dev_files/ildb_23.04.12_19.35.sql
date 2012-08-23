-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 23 2012 г., 19:34
-- Версия сервера: 5.1.40
-- Версия PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ildb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(5) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `group_format_id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `classroom`
--

INSERT INTO `classroom` (`id`, `group_format_id`, `name`, `description`) VALUES
(1, 1, 'Желтый кабинет', ''),
(2, 1, 'Сборная комната', ''),
(3, 2, 'Красный зал', ''),
(4, 1, 'Общая аудитория', '');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `name`, `short_name`) VALUES
(1, 'Польский', 'Pl'),
(2, 'Испанский', 'Es'),
(3, 'Английский', 'En'),
(4, 'Немецкий', 'Ge'),
(5, 'Французкий', 'Fr');

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `descriptiion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(5) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(5) NOT NULL,
  `to_user_id` int(5) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(6) NOT NULL,
  `users_id` int(5) NOT NULL,
  `summ` decimal(8,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnt_lessons` int(11) DEFAULT NULL,
  `payment_to` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `student_id`, `users_id`, `summ`, `date`, `comment`, `cnt_lessons`, `payment_to`) VALUES
(1, 17, 2, '200.00', '2012-04-22 21:00:00', 'Платеж принят нормально', 3, 'За обучение'),
(2, 17, 1, '200.00', '2012-04-22 21:00:00', '', 0, 'За обучение');

-- --------------------------------------------------------

--
-- Структура таблицы `school_groups`
--

CREATE TABLE IF NOT EXISTS `school_groups` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(5) NOT NULL,
  `level_id` int(5) NOT NULL,
  `group_format_id` int(5) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `school_groups`
--

INSERT INTO `school_groups` (`id`, `name`, `lang_id`, `level_id`, `group_format_id`, `status`) VALUES
(1, 'Белки', 1, 3, 2, 1),
(2, 'Ежики', 3, 2, 1, 1),
(3, 'Грибоеды', 4, 3, 3, 1),
(4, 'Летающие антилопы', 2, 5, 3, 1),
(5, 'Летние ласты', 5, 4, 2, 1),
(6, '', 0, 0, 1, 0),
(7, '', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `school_groups_users`
--

CREATE TABLE IF NOT EXISTS `school_groups_users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `school_groups_id` int(5) NOT NULL,
  `users_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `school_groups_users`
--

INSERT INTO `school_groups_users` (`id`, `school_groups_id`, `users_id`) VALUES
(1, 6, 2),
(2, 6, 5),
(3, 6, 3),
(4, 7, 7),
(5, 7, 3),
(6, 7, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(3) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `business_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_know` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_id` int(5) DEFAULT NULL,
  `test_lesson` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `info_obj` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `fio`, `mail`, `phone`, `address`, `birthday`, `status`, `comment`, `business_info`, `from_know`, `discount`, `date`, `status_id`, `test_lesson`, `info_obj`) VALUES
(1, '1 Шевченко Александр Александрович', 'skybee84@yandex.ru', '066-150-80-25', 'пр-т. Победы 48-а', '2009-01-15 22:00:00', NULL, 'Хороший студент', NULL, '1', 5, '2012-04-12 21:00:00', 0, '0000-00-00 00:00:00', NULL),
(2, '2 Михайлов Андрей Юрьевич', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2005-08-18 21:00:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, '3 Михайлов Андрей Юрьевич', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2012-04-14 20:01:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', 1, '0000-00-00 00:00:00', NULL),
(4, '4 Михайлов Андрей Юрьевич', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2012-04-14 20:02:09', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', 1, '2012-03-31 21:00:00', NULL),
(5, '5 Михайлов Андрей Юрьевич', 'skybee84@yandex.ru', '0661508025', 'ул. Анисовая 42', '2005-08-18 21:00:00', NULL, 'Знающий студент. Может быть направлен в группу с более высоким уровнем', NULL, '1', 0, '2012-04-13 21:00:00', 1, '2012-04-02 21:00:00', NULL),
(6, '6 Михайлов Андрей Юрьевич', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-02 21:00:00', NULL),
(7, '7 Михайлов Андрей Юрьевич', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '0000-00-00 00:00:00', NULL),
(8, '8 Михайлов Андрей Юрьевич', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL),
(9, '9 Михайлов Андрей Юрьевич', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL),
(10, '10 Михайлов Андрей Юрьевич', '', '0661508025', '', '0000-00-00 00:00:00', NULL, '', NULL, '2', 0, '2012-04-13 21:00:00', 1, '2012-04-27 21:00:00', NULL),
(11, 'Николаев Александр', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(12, 'Николаев Александр', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(13, 'Николаев Александр', '', '0956234578', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-20 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(14, 'Петренко Иван Антонавич', '', '0579580245', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-21 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(15, 'Максименко Иван Антонавич', '', '0579580245', 'ул. Ивановская 12-б', '2012-04-25 21:00:00', NULL, '', NULL, '2', 20, '2012-04-21 21:00:00', 1, '0000-00-00 00:00:00', NULL),
(16, 'Павликов Михаил Иванович', 'sdf@mail.ru', '0669214566', 'ул. Магаданская 18', '0000-00-00 00:00:00', NULL, '', NULL, '2', 10, '2012-04-22 21:00:00', NULL, '0000-00-00 00:00:00', NULL),
(17, 'Павликов Михаил Иванович 18', 'sdf12@mail.ru', '0669214512', 'ул. Магаданская 12', '2011-09-11 21:00:00', NULL, 'Хорошо бегает', 'Бегун 12', 'метро', 10, '2012-04-11 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":4:{s:12:"count_lesson";s:1:"2";s:11:"lesson_form";s:1:"2";s:13:"lesson_length";s:1:"2";s:11:"schedule_ar";a:2:{i:1;s:8:"16:30:00";i:5;s:8:"19:00:00";}}'),
(18, 'Коробко Евгений генадиевич', '', '380501584512', '', '0000-00-00 00:00:00', NULL, '', NULL, '1', 0, '2012-04-22 21:00:00', 3, '0000-00-00 00:00:00', 'O:11:"info_db_lib":4:{s:12:"count_lesson";s:1:"2";s:11:"lesson_form";s:1:"1";s:13:"lesson_length";s:4:"2:30";s:11:"schedule_ar";a:2:{i:2;s:8:"17:00:00";i:5;s:8:"17:00:00";}}');

-- --------------------------------------------------------

--
-- Структура таблицы `student_school_groups`
--

CREATE TABLE IF NOT EXISTS `student_school_groups` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `student_id` int(6) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `student_school_groups`
--

INSERT INTO `student_school_groups` (`id`, `student_id`, `school_groups_id`) VALUES
(1, 2, 3),
(2, 3, 3),
(3, 4, 3),
(4, 5, 2),
(5, 6, 1),
(6, 7, 1),
(7, 8, 2),
(8, 9, 2),
(9, 10, 2),
(10, 9, 3),
(11, 10, 1),
(12, 10, 3),
(13, 14, 6),
(14, 15, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `student_status`
--

CREATE TABLE IF NOT EXISTS `student_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `default` tinyint(1) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `student_status`
--

INSERT INTO `student_status` (`id`, `default`, `name`, `sort`) VALUES
(1, 1, 'Учащиеся', 1),
(2, 1, 'Пробное занятие', 2),
(3, 1, 'Без группы', 3),
(4, 1, 'Архивные', 4),
(5, 1, 'Удаленные', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_lang`
--

CREATE TABLE IF NOT EXISTS `teacher_lang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `lang_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

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
(10, 7, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable_set`
--

CREATE TABLE IF NOT EXISTS `timetable_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(5) NOT NULL,
  `school_groups_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `day` int(1) NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `timetable_set`
--

INSERT INTO `timetable_set` (`id`, `classroom_id`, `school_groups_id`, `user_id`, `day`, `time_start`, `time_stop`) VALUES
(6, 3, 6, 3, 6, '16:30:00', '18:30:00'),
(5, 3, 6, 5, 4, '17:00:00', '19:00:00'),
(4, 3, 6, 2, 2, '16:30:00', '18:30:00'),
(7, 3, 7, 7, 2, '16:30:00', '18:30:00'),
(8, 3, 7, 3, 4, '17:00:00', '19:00:00'),
(9, 3, 7, 7, 6, '16:30:00', '18:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `fio`, `company`, `phone`) VALUES
(1, 2130706433, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'ADMIN', '0'),
(2, 111, 'teacher1', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Евтушенко Анна Семеновна', NULL, NULL),
(3, 111, 'teacher2', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Кузнец Генадий Петрович', NULL, NULL),
(4, 111, 'teacher3', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Голубь Татьяна Николаевна', NULL, NULL),
(5, 111, 'teacher4', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Волк Максим Васильевич', NULL, NULL),
(6, 111, 'teacher5', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Лоза Андрей Юрьевич', NULL, NULL),
(7, 111, 'teacher6', '1111', NULL, '', NULL, NULL, NULL, 11, NULL, NULL, 'Кивенко Марина Альбертовна', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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
(8, 7, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
