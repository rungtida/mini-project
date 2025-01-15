-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 10:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leopet`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memstatus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memid`, `username`, `pass`, `name`, `surname`, `email`, `tel`, `memstatus`) VALUES
('M001', 'tukta', '3112', 'Rungmanee', 'Rimsittiwangso', 'tukta2533@gmail.com', '0852247000', 'admin'),
('M003', 'dalovecat', '1111', 'rungtida', 'rimsittiwangso', 'meaotingtong@gmail.com', '0618612253', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `order_fullname`, `order_address`, `order_phone`) VALUES
(1, '2019-10-11 01:15:29', 'rungtida rimsittiwangso', '80 สวนพลู กทม 10120', '0618612253'),
(2, '2022-10-04 03:43:45', 'da', '50/83', '00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`) VALUES
(1, 1, '129.00', 2, 1),
(2, 1, '200.00', 1, 1),
(3, 1, '129.00', 3, 2),
(4, 2, '200.00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`) VALUES
('0004', 'P004', 'อาหารเม็ด', 'รสไก่', 'images/2.jpg', '200.00'),
('0002', 'P002', 'อาหารเปียก', 'รสส้ม', 'images/14.jpg', '89.00'),
('0003', 'P003', 'ขนมคบเคี้ยว', 'รสลูกพรุน', 'images/24.jpg', '129.00'),
('0001', 'P001', 'อาหารเม็ด', 'รสชาเขียว', 'images/4.jpg', '200.00'),
('0005', 'P005', 'อาหารเปียก', 'รสทะเล', 'images/23.jpg', '89.00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `name`, `subject`, `email`, `detail`, `date`, `status`) VALUES
('Q001', 'rungtida rimsittiwangso', 'เกี่ยวกับผลิตภัณฑ์', 'meaotingtong@gmail.com', 'อาหารโรคไตมีอะไรบ้าง', '2019-10-09', 'รอตอบกลับ'),
('Q004', 'MEAO', 'เกี่ยวกับผลิตภัณฑ์', 'meaotingtong@gmail.com', 'อาหารแบบเม็ดมีรสผลไม้ไหม', '2019-10-10', 'รอตอบกลับ');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyid`),
  ADD KEY `qid` (`qid`,`memid`),
  ADD KEY `memid` (`memid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `question` (`qid`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`memid`) REFERENCES `member` (`memid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
