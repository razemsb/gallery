-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 05:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `files`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(3) NOT NULL,
  `Filename` varchar(50) NOT NULL,
  `upload_date` varchar(50) NOT NULL,
  `filesize` varchar(50) NOT NULL,
  `upload_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `Filename`, `upload_date`, `filesize`, `upload_user`) VALUES
(152, 'f9cf0ba1be16700669e87c60333a2e34.jpg', '2024-10-16 21:00:05', '31412', 'razemsb'),
(155, 'pngwing.png', '2024-10-17 09:48:49', '589140', 'punk'),
(156, 'pngwing.com (12).png', '2024-10-17 10:04:35', '11319', 'punk'),
(162, 'bg.jpg', '2024-10-17 10:06:05', '18743', 'razemsb'),
(170, 'photo-2.jpg', '2024-10-17 10:07:48', '343415', 'punk'),
(171, 'photo-1.jpg', '2024-10-17 10:09:03', '222651', 'punk'),
(173, 'MAMP-PRO-Logo.png', '2024-10-17 10:09:44', '5793', 'razemsb'),
(174, 'kot.jpg', '2024-10-17 10:10:02', '17474', 'razemsb'),
(176, 'project_1.jpg', '2024-10-17 10:15:40', '172487', 'punk'),
(177, 'project_2.jpg', '2024-10-17 10:15:44', '190298', 'punk'),
(178, 'project_3.jpg', '2024-10-17 10:15:47', '193138', 'razemsb'),
(181, 'main_7.png', '2024-10-17 11:18:25', '4631', 'razemsb'),
(183, 'main_9.png', '2024-10-17 12:54:52', '11044', 'razemsb'),
(184, 'project_3_3.jpg', '2024-10-17 13:18:04', '243517', 'razemsb'),
(185, 'project_1_1.jpg', '2024-10-17 13:18:09', '172487', 'razemsb'),
(186, 'project_1_2.jpg', '2024-10-17 13:18:14', '145706', 'razemsb'),
(187, 'project_2_1.jpg', '2024-10-17 13:18:22', '190298', 'razemsb'),
(188, 'project_2_2.jpg', '2024-10-17 13:18:25', '255787', 'razemsb'),
(189, 'project_2_3.jpg', '2024-10-17 13:18:30', '203128', 'razemsb'),
(190, 'project_3_1.jpg', '2024-10-17 13:18:34', '193138', 'razemsb'),
(191, 'project_3_2.jpg', '2024-10-17 13:18:37', '223730', 'razemsb'),
(192, 'html.svg', '2024-10-17 13:19:47', '479', 'razemsb'),
(194, '1c.svg', '2024-10-17 14:36:43', '4649', 'razemsb'),
(195, 'bit.svg', '2024-10-17 14:37:02', '1948', 'razemsb'),
(196, 'cpp.svg', '2024-10-17 14:37:10', '1485', 'razemsb'),
(197, 'python.svg', '2024-10-17 14:37:16', '2018', 'razemsb'),
(198, 'кфееу.jpg', '2024-10-17 16:46:35', '103579', 'rezr'),
(199, 'svg (9).svg', '2024-10-17 16:47:59', '2424', 'rezr'),
(200, 'wallpaperflare.com_wallpaper.jpg', '2024-10-17 16:48:50', '750494', 'rezr'),
(202, 'Yoru.jpeg', '2024-10-17 16:49:16', '82558', 'rezr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `Login` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Login`, `Password`, `Email`) VALUES
(1, 'razemsb', 'zhaba', 'maxim1xxx363@gmail.com'),
(5, 'punk', 'zhaba', 'razemsb@gmail.com'),
(6, 'rezr', '123456', 'maxim1xxx363@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
