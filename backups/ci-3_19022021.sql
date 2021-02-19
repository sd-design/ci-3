-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 19 2021 г., 12:07
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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `restore_key` varchar(250) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `login`, `pwd`, `name`, `lastname`, `restore_key`, `user_level`) VALUES
(1, 'chessman@yandex.ru', '$2y$10$gNF1oIrtn5jNIAHv5TE9J.DXuZIJHlSOlRp8uZSGHJcdiLGPl6oXm', 'Александр', 'Соловей', '', 1),
(4, 'a.solovey@deholding.org', '$2y$10$oSO5cj0lxeHNJzIdUxv54eLybQUS.GcNC1RXZoKJ8Tk/d3VFZob3K', 'Alex', 'Naghtigall', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_levels`
--

CREATE TABLE `user_levels` (
  `ID` int(11) NOT NULL,
  `level_name` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_levels`
--

INSERT INTO `user_levels` (`ID`, `level_name`, `user_level`) VALUES
(1, 'Root admin', 'root'),
(2, 'Administrtors', 'admin'),
(3, 'Editors', 'editor'),
(4, 'Clients', 'client'),
(5, 'Managers', 'manager'),
(6, 'Androids', 'android');

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `user_level` (`user_level`);

--
-- Индексы таблицы `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sd_users`
--
ALTER TABLE `sd_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_level` FOREIGN KEY (`user_level`) REFERENCES `user_levels` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
