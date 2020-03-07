-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2020 г., 01:59
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zadachnik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zdchnk_data`
--

CREATE TABLE `zdchnk_data` (
  `id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `task_message` varchar(1000) NOT NULL,
  `dt_create` varchar(30) NOT NULL,
  `dt_update` varchar(30) NOT NULL,
  `admin_edit` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zdchnk_data`
--

INSERT INTO `zdchnk_data` (`id`, `user_name`, `user_email`, `task_message`, `dt_create`, `dt_update`, `admin_edit`, `status`) VALUES
(1, 'Roman', 'test@test.lan', 'Текст задачи', '2020-03-04 00:00:00', '2020-03-04', 1, 0),
(2, 'Roman2', 'test@test.lan2', 'Текст задачи', '2020-03-04 00:00:50', '2020-03-08 00:29:03', 0, 1),
(3, 'Roman3', 'test@test.lan3', 'Текст задачи', '2020-03-04 00:20:00', '2020-03-04', 1, 0),
(4, 'Roman4', 'test@test.lan4', 'Текст задачи', '2020-03-04 00:05:00', '2020-03-04', 0, 0),
(5, 'Roman5', 'test@test.lan5', 'Текст задачи', '2020-03-04 00:30:00', '2020-03-04', 1, 0),
(6, 'Roman6', 'test@test.lan6', 'Текст задачи', '2020-03-04 00:45:00', '2020-03-04', 0, 0),
(7, 'Пользовватель', 'test1@test.lan', 'Проверка текста задачи', '2020-03-06 17:21:49', '2020-03-06 17:21:49', 1, 0),
(8, 'Гость2', 'guest@mail.ru', 'Текст задачи от гостя', '2020-03-06 17:23:40', '2020-03-06 17:23:40', 0, 0),
(9, 'Проверка logout', 'logout@localhost.lan', 'Проверка logout', '2020-03-06 17:34:16', '2020-03-06 17:34:16', 0, 0),
(10, '1234', 'test@mail.ru', '12345', '2020-03-07 00:28:21', '2020-03-07 00:28:21', 0, 0),
(11, 'test', 'test@ua.fm', 'test123', '2020-03-07 00:45:54', '2020-03-07 00:45:54', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zdchnk_vcard_users`
--

CREATE TABLE `zdchnk_vcard_users` (
  `id` int(5) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `dt_last` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zdchnk_vcard_users`
--

INSERT INTO `zdchnk_vcard_users` (`id`, `fio`, `login`, `pass`, `dt_last`) VALUES
(1, 'ФИО', 'admin', '07431ad6ce174d4efd7894f9926b6e01', '2020-03-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `zdchnk_data`
--
ALTER TABLE `zdchnk_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zdchnk_vcard_users`
--
ALTER TABLE `zdchnk_vcard_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `zdchnk_data`
--
ALTER TABLE `zdchnk_data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `zdchnk_vcard_users`
--
ALTER TABLE `zdchnk_vcard_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
