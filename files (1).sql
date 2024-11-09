-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Ноя 07 2024 г., 09:03
-- Версия сервера: 5.7.24
-- Версия PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `files`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `ID` int(3) NOT NULL,
  `Filename` varchar(50) NOT NULL,
  `upload_date` varchar(50) NOT NULL,
  `filesize` varchar(50) NOT NULL,
  `upload_user` varchar(50) NOT NULL,
  `upload_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`ID`, `Filename`, `upload_date`, `filesize`, `upload_user`, `upload_path`) VALUES
(207, 'doomguy', '2024-10-28 10:21:16', '25663', 'razemsb', 'files/1fdd29ef66dd7106a67cc15a14cb5b29.jpg'),
(208, 'alucard', '2024-10-28 10:27:24', '54488', 'razemsb', 'files/24d75665-45d7-45ee-ac14-20c230881457.jpeg'),
(209, 'press_F', '2024-10-28 10:27:51', '31412', 'razemsb', 'files/f9cf0ba1be16700669e87c60333a2e34.jpg'),
(210, 'woman', '2024-10-28 10:28:18', '82558', 'razemsb', 'files/Yoru.jpeg'),
(211, 'summer', '2024-10-28 10:28:32', '750494', 'razemsb', 'files/wallpaperflare.com_wallpaper.jpg'),
(212, 'oiii', '2024-10-28 10:29:18', '103579', 'razemsb', 'files/кфееу.jpg'),
(214, 'abama', '2024-10-29 06:04:08', '66835', 'razemsb', 'files/5opjcgjmjw.jpg'),
(215, 'naruto', '2024-10-29 06:09:48', '174784', 'razemsb', 'files/1393335-new-akatsuki-wallpaper-1920x1080-for-pc (2).jpg'),
(216, 'apple', '2024-10-29 06:14:51', '175213', 'razemsb', 'files/red-apple-fruit.jpg'),
(217, 'stasyan', '2024-10-29 06:16:32', '490726', 'punk', 'files/свинка.jpg'),
(218, 'shish', '2024-10-29 06:17:01', '14529', 'punk', 'files/ЩИИИИИИИЩЬ.jfif'),
(219, 'sunrise', '2024-10-29 06:17:51', '1499220', 'punk', 'files/HORIZO~1.JPG'),
(220, 'nowoman', '2024-10-29 06:23:02', '223819', 'razemsb', 'files/2Uh8IHcXY_0.jpg'),
(221, 'apple', '2024-10-29 08:31:50', '1131166', 'razemsb', 'files/33a158aca937ec804b8871264a610a36.gif'),
(222, 'kirik', '2024-10-29 10:14:27', '64631', 'razemsb', 'files/1.-Printsip-raboty-lokalnoj-seti.jpg'),
(223, 'zhaba', '2024-10-30 09:25:25', '98432', 'razemsb', 'files/003.jpg'),
(224, 'face', '2024-11-05 10:07:23', '14700', 'razemsb', 'files/homeless-beggar-emoticon-begging-money-260nw-1330219121.jpg'),
(227, 'fff', '2024-11-07 08:40:18', '139071', 'opiuopi', 'files/adidas4.png'),
(228, 'apple', '2024-11-07 08:40:29', '64545', 'opiuopi', 'files/adidas2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `Login` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Login`, `Password`, `Email`, `is_admin`) VALUES
(1, 'razemsb', 'zhaba', 'maxim1xxx363@gmail.com', 1),
(8, 'bumble', 'zhaba', 'razemsb@gmail.com', 0),
(9, 'opiuopi', 'zhaba', 'razemsb@gmail.com', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
