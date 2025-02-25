-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2025 г., 09:17
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `klinika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Гость'),
(2, 'Регистратор'),
(3, 'Врач'),
(4, 'Пациент'),
(5, 'Специалист отдела обработки данных');

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `id_spec` int(11) NOT NULL,
  `name_spec` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`id_spec`, `name_spec`) VALUES
(1, 'Гинеколог'),
(2, 'Невролог'),
(3, 'Кардиолог'),
(4, 'Гастроэнтеролог'),
(7, 'Лаборант');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `fio`, `email`, `login`, `password`, `id_role`) VALUES
(1, 'Краснов Андрей Глебович', 'andry.k2005@mail.ru', 'andrew', '123123', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `usluga`
--

CREATE TABLE `usluga` (
  `id_usluga` int(11) NOT NULL,
  `name_usl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `usluga`
--

INSERT INTO `usluga` (`id_usluga`, `name_usl`, `price`, `img`) VALUES
(1, 'Лабораторные исследования', '1500', '11.png'),
(2, 'УЗИ', '700', '9.png'),
(3, 'ЭКГ', '700', '32.png'),
(4, 'ЭхоКГ', '700', '1.jpg'),
(5, 'Вакцинация ', '1200', '8.jpg'),
(7, 'Медицинская экспертиза', '5000', '31.png'),
(8, 'МРТ', '1200', '10.png');

-- --------------------------------------------------------

--
-- Структура таблицы `vrach`
--

CREATE TABLE `vrach` (
  `id_vrach` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fio_vrach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spec` int(11) NOT NULL,
  `id_usluga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vrach`
--

INSERT INTO `vrach` (`id_vrach`, `id_role`, `fio_vrach`, `img`, `id_spec`, `id_usluga`) VALUES
(1, 3, 'Лебедева Ирина Григорьевна', '27.jpg', 3, 2),
(2, 3, 'Кострова Анна Васильевна', '28.jpg', 2, 4),
(3, 3, 'Сидоров Петр Николаевич', '26.jpg', 4, 5),
(4, 3, 'Друщиц Виталий Андреевич', '29.jpg', 7, 1),
(5, 3, 'Метальников Анатолий Сергеевич', '30.jpeg', 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `zapis`
--

CREATE TABLE `zapis` (
  `id_zapis` int(11) NOT NULL,
  `id_vrach` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_zapis` date NOT NULL,
  `time_zapis` time NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'новый',
  `otziv` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otvet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zapis`
--

INSERT INTO `zapis` (`id_zapis`, `id_vrach`, `id_user`, `date_zapis`, `time_zapis`, `status`, `otziv`, `otvet`) VALUES
(1, 2, 1, '2025-02-21', '22:16:13', '1', '123', '123123'),
(2, 1, 1, '2025-02-22', '22:16:13', '2', NULL, ''),
(3, 2, 1, '2025-02-24', '22:16:13', '1', NULL, ''),
(4, 1, 1, '2025-02-15', '22:16:13', '2', '123123', 'qweqwe'),
(5, 2, 1, '2025-02-19', '22:16:13', '1', 'Все очень понравилось!', 'Будьте здоровы!'),
(6, 1, 1, '2025-02-10', '22:16:13', '2', NULL, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`id_spec`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `usluga`
--
ALTER TABLE `usluga`
  ADD PRIMARY KEY (`id_usluga`);

--
-- Индексы таблицы `vrach`
--
ALTER TABLE `vrach`
  ADD PRIMARY KEY (`id_vrach`),
  ADD KEY `id_spec` (`id_spec`),
  ADD KEY `id_usluga` (`id_usluga`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `zapis`
--
ALTER TABLE `zapis`
  ADD PRIMARY KEY (`id_zapis`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vrach` (`id_vrach`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `id_spec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `usluga`
--
ALTER TABLE `usluga`
  MODIFY `id_usluga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `vrach`
--
ALTER TABLE `vrach`
  MODIFY `id_vrach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `zapis`
--
ALTER TABLE `zapis`
  MODIFY `id_zapis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `vrach`
--
ALTER TABLE `vrach`
  ADD CONSTRAINT `vrach_ibfk_1` FOREIGN KEY (`id_spec`) REFERENCES `spec` (`id_spec`),
  ADD CONSTRAINT `vrach_ibfk_2` FOREIGN KEY (`id_usluga`) REFERENCES `usluga` (`id_usluga`),
  ADD CONSTRAINT `vrach_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `zapis`
--
ALTER TABLE `zapis`
  ADD CONSTRAINT `zapis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `zapis_ibfk_2` FOREIGN KEY (`id_vrach`) REFERENCES `vrach` (`id_vrach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
