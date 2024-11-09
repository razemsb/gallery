-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2024 at 10:38 PM
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
(2, 'kirik', 'files/3cb3d453-769d-409f-80fc-e42d6b885d4f.jpeg', 'razemsb', '2024-11-08 10:50:32', 11, 16280),
(3, 'kalbIBaH', 'files/09d6ab14-05f9-411c-b45d-1e6246e48552.jpeg', 'razemsb', '2024-11-08 13:44:24', 2, 76422),
(4, 'alucard', 'files/1748a587-5ef1-423f-b465-647b76a55823.jpeg', 'razemsb', '2024-11-08 13:51:20', 1, 40957),
(5, 'doomguy', 'files/f9cf0ba1be16700669e87c60333a2e34.jpg', 'razemsb', '2024-11-08 13:53:21', 0, 31412),
(6, 'summer', 'files/wallpaperflare.com_wallpaper (1).jpg', 'razemsb', '2024-11-08 13:53:33', 5, 750494),
(7, 'alucard', 'files/24d75665-45d7-45ee-ac14-20c230881457.jpeg', 'razemsb', '2024-11-08 14:03:40', 21, 54488),
(11, 'калыван', 'files/1731086272_2897.jpeg', 'razemsb', '2024-11-08 17:17:51', 24, 49657),
(12, '$daun', 'files/1731086331_5032.png', 'razemsb', '2024-11-08 17:18:50', 5, 372537),
(16, 'trash...', 'files/1731183216_8711.png', 'razemsb', '2024-11-09 20:13:35', 0, 640703),
(17, 'mysor', 'files/1731183240_5528.png', 'razemsb', '2024-11-09 20:14:00', 0, 174489),
(18, 'ЖЕНЩИНА', 'files/1731183340_7849.png', 'razemsb', '2024-11-09 20:15:40', 0, 624127);

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
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
