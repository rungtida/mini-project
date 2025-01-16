-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 06:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `mamber`
--

CREATE TABLE `mamber` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mamber`
--

INSERT INTO `mamber` (`id`, `name`, `number`) VALUES
('M001', 'd', '0'),
('M002', 'Dandelion', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `rid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datesell` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`rid`, `mid`, `detail`, `total`, `datesell`) VALUES
('R001', 'M002', 'ขวดน้ำขาวขุ่น 1 กก. ขวดน้ำใส 1 กก. อลูมิเนียมกระป๋องโค้ก 1 กก.', '32', '23/05/21'),
('R002', 'M002', 'ขวดน้ำขาวขุ่น 4 กก. ขวดน้ำใส 2 กก.    กระดาษสี/กระดาษกล่อง รองเท้า/กล่องผลไม้ 1 กก.', '26.9', '23/05/21'),
('R003', 'M001', 'อลูมิเนียมกระป๋องโค้ก 5 กก.', '120', '23/05/21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mamber`
--
ALTER TABLE `mamber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
