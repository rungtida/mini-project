-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 08:19 PM
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
-- Table structure for table `editmem`
--

CREATE TABLE `editmem` (
  `eid` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `editmem`
--

INSERT INTO `editmem` (`eid`, `name`, `number`, `status`) VALUES
('M003', 'time', '000', 'complete');

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
('M002', 'dande', '097'),
('M003', 'time', '000'),
('M004', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `rid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datesell` date NOT NULL,
  `datetimesell` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`rid`, `mid`, `detail`, `total`, `datesell`, `datetimesell`) VALUES
('R001', 'M002', '-อลูมิเนียมกระป๋องโค้ก 10 กก.', '240', '2020-05-30', '07:23:29'),
('R002', 'M002', '-ขวดน้ำใส 20 กก. -อลูมิเนียมกระป๋องโค้ก 12 กก. -กระดาษหนังสือพิมพ์ 1 กก. -กระดาษหนังสือเล่มรวม 1 กก.', '350.6', '2021-06-30', '07:45:56'),
('R003', 'M002', '-ขวดน้ำใส 10 กก.', '30', '2021-05-30', '07:46:49'),
('R004', 'M002', '-อลูมิเนียมกระป๋องโค้ก 10 กก.', '240', '2021-05-30', '07:47:52'),
('R005', 'M002', '-ขวดเบียร์ช้าง 1 กล่อง   -ขวดน้ำใส 1 กก.  -กระดาษหนังสือพิมพ์ 2 กก.', '18.5', '2021-05-30', '09:33:58'),
('R006', 'M002', '-ขวดน้ำใส 10 กก.', '30', '2021-05-30', '09:36:59'),
('R007', 'M002', '-ขวดน้ำขาวขุ่น 10 กก.', '50', '2021-05-30', '09:39:36'),
('R008', 'M002', '-ขวดน้ำใส 10 กก.', '30', '2021-05-30', '09:44:25'),
('R009', 'M002', '-ขวดน้ำใส 10 กก.', '30', '2021-05-30', '09:45:43'),
('R010', 'M003', '-ขวดเบียร์ลีโอ 10 กล่อง', '95', '2021-05-30', '09:45:55'),
('R011', 'M003', '-ขวดน้ำขาวขุ่น 10 กก. -ขวดน้ำใส 10 กก.', '80', '2020-05-30', '09:52:02'),
('R012', 'M002', '-ขวดเบียร์ลีโอ 10 กล่อง', '95', '2021-05-30', '16:52:09'),
('R013', 'M002', '-ขวดเบียร์ลีโอ 10 กล่อง', '95', '2021-05-30', '23:12:56'),
('R014', 'M002', '-ขวดน้ำขาวขุ่น 10 กก.', '50', '2021-05-30', '23:13:36'),
('R015', 'M002', '-ขวดเบียร์ลีโอ 10 กล่อง', '95', '2021-05-30', '23:22:10'),
('R016', 'M002', '-ขวดเบียร์ช้าง 20 กล่อง', '250', '2021-05-31', '00:00:03'),
('R017', 'M002', '-ขวดน้ำใส 1 กก.', '3', '2021-05-31', '00:03:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editmem`
--
ALTER TABLE `editmem`
  ADD PRIMARY KEY (`eid`);

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
