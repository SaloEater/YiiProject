-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 02 2019 г., 20:27
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiiproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `name`, `description`) VALUES
(1, 'Мстители: Финал', ' американский супергеройский фильм 2019 года киностудии Marvel Studios'),
(2, 'Капитан Марвел', ' американский супергеройский фильм 2019 года, основанный на комиксах о персонаже Кэрол Дэнверс'),
(3, 'Аладдин', 'фильм Гая Ричи о приключениях Аладдина, киноадаптация одноимённого мультфильма 1992 года'),
(4, 'Блуждающая Земля', 'В ближайшем будущем становится известно, что Солнце скоро погаснет, и Солнечная система будет разрушена. '),
(5, 'Как приручить дракона 3', 'полнометражный анимационный фильм производства студии «DreamWorks Animation». Сиквел «Как приручить дракона 2»'),
(6, 'История игрушек 4', 'американский 3D-комедийный мультфильм, премьера которого состоялась 20 июня 2019 года.'),
(7, 'Покемон. Детектив Пикачу', 'полнометражный игровой фильм режиссёра Роба Леттермана(2) по одноимённой видеоигре'),
(8, 'Алита: Боевой ангел', ' американский боевик с элементами киберпанка режиссёра Роберта Родригеса по мотивам манги '),
(9, 'Годзилла 2: Король монстров', ' американский фантастический боевик режиссёра Майкла Догерти'),
(10, 'Шазам!', 'американский супергеройский фильм, основанный на одноимённом комиксе издательства DC Comics');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
