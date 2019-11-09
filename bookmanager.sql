-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 04:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--



--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `ma` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`ma`, `name`, `phone`, `email`) VALUES
(3, 'A Cường GDTc', 2147483647, 'cuonggdtc@gmail.com'),
(4, 'A Dũng Vật lý', 2147483647, 'dungvatli@gmail.com'),
(6, 'A Dốc Khoa Sinh', 2147483647, 'dockhoasinh@gmail.com'),
(8, 'A Hải CDSP', 2147483647, 'haicdsp@gmail.com'),
(9, 'A Hải Khoa Sử', 2147483647, 'haikhoasu@gmail.com'),
(10, 'A Hoàng Báo Chí', 2147483647, 'hoangbaochia@gmail.com'),
(11, 'A Hoàng CNSV', 2147483647, 'hoangcnsv@gmail.com'),
(12, 'A Huấn Dhkh', 2147483647, 'huandhkh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhan`
--

CREATE TABLE `nhan` (
  `ma` int(20) NOT NULL,
  `lable_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhan`
--

INSERT INTO `nhan` (`ma`, `lable_name`) VALUES
(1, 'nguoi yeu'),
(2, 'ban be'),
(3, 'gia dinh');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_nguoidung`
--

CREATE TABLE `nhan_nguoidung` (
  `id` int(11) NOT NULL,
  `ma_nhan` int(11) NOT NULL,
  `ma_nguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhan_nguoidung`
--

INSERT INTO `nhan_nguoidung` (`id`, `ma_nhan`, `ma_nguoidung`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 1, 2),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'vietsong', '123');

--
-- Indexes for dumped tables
--

--

--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
