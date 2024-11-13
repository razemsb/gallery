-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2024 at 08:18 PM
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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(5) NOT NULL,
  `Filetitle` varchar(40) NOT NULL,
  `Filename` varchar(60) NOT NULL,
  `upload_user` varchar(20) NOT NULL,
  `upload_date` varchar(20) NOT NULL,
  `likes` int(10) NOT NULL,
  `size` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Filetitle`, `Filename`, `upload_user`, `upload_date`, `likes`, `size`) VALUES
(24, 'alucard', 'files/1731510004_8590.jpeg', 'razemsb', '2024-11-13 18:00:04', 1, 40957),
(25, 'press_f', 'files/1731510012_1761.jpg', 'razemsb', '2024-11-13 18:00:12', 0, 31412),
(26, 'nigga', 'files/1731510023_3887.jpeg', 'razemsb', '2024-11-13 18:00:22', 0, 16280),
(27, 'summer', 'files/1731510036_9384.jpg', 'razemsb', '2024-11-13 18:00:36', 0, 750494),
(28, 'kalblBaH', 'files/1731510058_1755.jpeg', 'razemsb', '2024-11-13 18:00:58', 0, 49657),
(29, 'trash', 'files/1731510068_6777.jpg', 'razemsb', '2024-11-13 18:01:07', 0, 103579),
(30, 'alucard', 'files/1731510080_7289.jpeg', 'razemsb', '2024-11-13 18:01:19', 0, 54488),
(31, 'facts', 'files/1731510249_9975.jpg', 'snaff', '2024-11-13 18:04:09', 0, 25663),
(32, '$daun', 'files/1731510340_5384.png', 'snaff', '2024-11-13 18:05:39', 0, 372537),
(33, 'zhaba lox', 'files/1731510363_1796.jpeg', 'snaff', '2024-11-13 18:06:03', 0, 17848);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `Login` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Login`, `Password`, `Email`, `is_admin`) VALUES
(1, 'razemsb', 'zhaba', 'maxim1xxx363@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
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
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
