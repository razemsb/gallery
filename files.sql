-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2024 at 06:46 PM
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
  `upload_user` varchar(50) NOT NULL,
  `upload_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `Filename`, `upload_date`, `filesize`, `upload_user`, `upload_path`) VALUES
(207, 'doomguy', '2024-10-28 10:21:16', '25663', 'razemsb', 'files/1fdd29ef66dd7106a67cc15a14cb5b29.jpg'),
(208, 'alucard', '2024-10-28 10:27:24', '54488', 'razemsb', 'files/24d75665-45d7-45ee-ac14-20c230881457.jpeg'),
(209, 'press_F', '2024-10-28 10:27:51', '31412', 'razemsb', 'files/f9cf0ba1be16700669e87c60333a2e34.jpg'),
(210, 'woman', '2024-10-28 10:28:18', '82558', 'razemsb', 'files/Yoru.jpeg'),
(211, 'summer', '2024-10-28 10:28:32', '750494', 'razemsb', 'files/wallpaperflare.com_wallpaper.jpg'),
(212, 'oiii', '2024-10-28 10:29:18', '103579', 'razemsb', 'files/кфееу.jpg'),
(213, 'bogdan', '2024-10-28 10:48:46', '126496', 'razemsb', 'files/photo_2024-09-12_19-10-02.jpg');

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
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
