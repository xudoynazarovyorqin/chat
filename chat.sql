-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 30 2021 г., 13:16
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ban_user`
--

CREATE TABLE `ban_user` (
  `id` int(255) NOT NULL,
  `banned_id` int(255) NOT NULL,
  `from_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ban_user`
--

INSERT INTO `ban_user` (`id`, `banned_id`, `from_id`) VALUES
(39, 834441711, 864484813);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(255) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_ban` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `is_ban`) VALUES
(1, 864484813, 834441711, 'qalay', 0),
(2, 864484813, 834441711, 'asdfasdf', 0),
(3, 834441711, 864484813, 'asdfasdfsafds', 0),
(4, 834441711, 864484813, 'asdfasd', 0),
(5, 834441711, 864484813, 'asdf', 0),
(6, 834441711, 864484813, 'asdfasdf', 1),
(7, 834441711, 864484813, 'salom', 0),
(8, 864484813, 834441711, 'hello', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `name`, `email`, `password`) VALUES
(30, 834441711, 'Yorqin', 'xudoynazarovyorqin@gmail.com', 'yorqin.khan'),
(33, 864484813, 'Xushnud', 'xushnud.khan@gmail.com', '12312313'),
(37, 1455485178, 'Asadbek', '123456@gmail.com', '123456'),
(39, 117966272, 'Ogabek', 'oga@gmail.com', '123123'),
(40, 854361125, 'jasur', 'jasur@gmail.com', '123123'),
(41, 1146791385, 'suxrob', 'suxrob@gmail.com', '123123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ban_user`
--
ALTER TABLE `ban_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ban_user`
--
ALTER TABLE `ban_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
