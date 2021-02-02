-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 02 2021 г., 12:24
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ci-3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sd_users`
--

CREATE TABLE `sd_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `descript` text,
  `email` varchar(150) NOT NULL,
  `pwd` varchar(77) NOT NULL DEFAULT '',
  `restore_key` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sd_users`
--

INSERT INTO `sd_users` (`id`, `name`, `lname`, `descript`, `email`, `pwd`, `restore_key`) VALUES
(1, 'Alex', 'Naghtigall', 'Shabat Shalom', '86522@mail.ru', 'fkd25555&jlkf323', 'fkd25555&jlkf323'),
(2, 'Alex', 'Naghtigall', 'Shabat Shalom', '32262@mail.ru', 'fkd25555&jlkf323', 'fkd25555&jlkf323'),
(3, 'Alex', 'Naghtigall', 'Shabat Shalom', '66939@mail.ru', 'fkd25555&jlkf323', 'fkd25555&jlkf323'),
(4, 'Alex', 'Naghtigall', 'Shabat Shalom', '56897@mail.ru', 'fkd25555&jlkf323', 'fkd25555&jlkf323');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sd_users`
--
ALTER TABLE `sd_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sd_users`
--
ALTER TABLE `sd_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
