-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 10:49 AM
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
-- Database: `rewardpoint`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS rewardpoint;

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` varchar(5) NOT NULL,
  `id` varchar(5) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pointin` int(10) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pointout` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `tel`, `status`, `name`, `surname`) VALUES
('M001', 'ink', '001', 'inkfly', '0955', 'admin', 'tan', 'siri'),
('M002', 'ink2', '002', 'jkjklj@gmail.com', '1515', 'user', 'dfh', 'dfhdf');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `code` varchar(10) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `point` int(10) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `codestatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`code`, `adminname`, `point`, `mfd`, `exp`, `codestatus`) VALUES
('parkjim', 'ink2', 850, '2021-02-24', '2021-03-13', 'unused'),
('urcvryk', 'ink2', 100, '2021-02-24', '2021-03-13', 'unused');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopid` varchar(10) NOT NULL,
  `shopname` varchar(50) NOT NULL,
  `shoppic` varchar(250) NOT NULL,
  `shopdetail` varchar(500) NOT NULL,
  `shoplink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopid`, `shopname`, `shoppic`, `shopdetail`, `shoplink`) VALUES
('S001', '🍦HOKKAIDO SOFTKREAM', 'images/HOKKAIDO SOFTKREAM.jpg', 'ร้านนี้ไม่ต้องพูดเยอะ อีกร้านเทพซอฟครีมพรีเมียมสุดขีดพลัง รอบนี้ออกเมนูใหม่เป็น \"Canelé Soft Cream\" คาเนเล่ขนมจากฝรั่งเศส กรอบๆหนึบๆหอมวานิลลา มาเจอกับซอฟครีมนมหอมหวานฉ่ำๆของร้านนี้คือเด็ดมากต้องไปลอง เมนูนี้บอกเลยว่า ครีเอทดีงาม หน้าตาน่ากิน เหมาะแก่การถ่ายรูปมาก ๆ ส่วนซอฟครีมตัวอื่นในร้านก็ จิ้มไปเลยซักอันนึงอ่ะเทพหมดเชื่อหมอ อร่อยมากโดยเฉพาะโคนอ่ะเทพจริงไม่เหมือนใครเลย~', 'hokkaido.php'),
('S002', '🍫SQUARE2 CHOCOLATE', 'images/square2chocolate.jpg', 'ร้านนี้คือสวรรค์ของสายดาร์กเลย ใครที่เป็นทาสของช็อกโกเเลต พุ่งตัวมาร้านนี้ได้เลยอย่าได้พลาด เมนูเด็ดๆของร้านนี้คือ \"Nama Chocolate\" เลยเจ้มจ้นสุดๆสมชื่อช็อกโกเเลตสดมาก เเถมตอนนี้ออกเมนูวาเลนไทน์ด้วยนะ เป็นสตรอว์เบอร์รี่ไวท์ช็อก ที่คนโสดก็ต้องกินอ่ะ เพราะดีย์มากละมุนมาก ส่วนใครที่ชอบความเข้มๆ ก็ต้องเครื่องดื่มร้านนี้เลย เข้มมากๆ ดีย์มากๆ ใครชอบดาร์กช็อกนี่ขึ้นสวรรค์ไปเลยจ้าาา\r\n', 'SQUARE2 CHOCOLATE.php'),
('S003', '🍩SO DOUGH', 'images/🍩SO DOUGH.jpg', 'โดนัทนู่มมมมมมมสไตล์ญี่ปุ่น~ ที่นุ่มจริงนุ่มจังที่ต้องมาลองงับให้หายหมั่นเขี้ยวซักทีนึง!! โดนัทจากนมฮอกไกโดนุ่มๆจิ้มกับดิปหลายรสของทางร้าน คือเข้ากันมากกกกก ชอบสุดคือชาไทยเลย หรือใครชอบโดนัทเเบบมีไส้ร้านนี้ก็ตอบโจทย์นะ ไส้จะเป็นมาสคาโปนหอมๆนมๆครีมๆ เข้ากับโดนัทนุ่มๆหอมนมอยู่เเล้วได้เเบบโป๊ะเชะ!!', 'SO DOUGH.php'),
('S004', '🍵UHOLIC', 'images/🍵UHOLIC.jpg', 'ร้านซอฟเสิร์ฟเทพๆที่มีเครื่องดื่มที่อร่อยมากด้วยยยย ซอฟเสิร์ฟมัทฉะหอมทะลุโพรงจมูกออกหูออกปาก ซอฟเสิร์ฟสตรอว์เบอร์รี่กับเพิร์ลลิ้นจี่เปรี้ยวๆหวานๆหอมๆก็ดีย์มาก ตบด้วยเครื่องดื่มไวท์ช็อกมัทฉะคือฟินสุดพลัง เเค่ร้านนี้ร้านเดียวก็คุ้มพร้อมกลับบ้านเเล้ว', 'UHOLIC.php'),
('S005', '🦖GOZ BAKERY', 'images/🦖GOZ BAKERY.jpg', 'ต้นตำหรับบราวนี่มีไส้!! เด็ดมากอ่ะร้านนี้ เอางี้นะ ลองคิดภาพบราวนี่กรอบนอกหนึบในเนื้อฟัดจ์ๆดีๆ มาเจอกับไส้ เนียนๆเข้มข้นๆ เเล้วยิ่งเคี้ยว รสก็ยิ่งออกมาเรื่อยๆอ่ะ เป็นไงฟินยัง เเล้วนี่คือเราได้กินเเบบนั้นจริงๆ มันดีย์มากๆ เข้าใจง่ายมากๆ เเถมมีหลายรสด้วยนะ ทั้งสตรอว์เบอร์รี่เปรี้ยวหวานๆหอม ซิกเนเจอร์ช็อกโกเเลต นวลนัวๆเข้มข้น หรือจะมัทฉะหอมๆ เข้ากับช็อกโกเเลตอยู่เเล้ว เเถมตอนนี้ ออกรสเนยถั่วมาใหม่ด้วยนะ เทพมาก~~', 'GOZ BAKERY.php'),
('S006', '🍭เวฬา', 'images/🍭เวฬา.jpg', 'ร้านที่ยืนหนึ่งด้านสายไหมในงานนี้ เพราะมีร้านเดียว เเผ่ม!! เเต่ดีย์จริงๆนะทั้งตัวขนม ทั้งพี่เจ้าของร้านที่เกี่ยวกับขนมเขา พร้อมให้ความรู้งงอะไรถามได้ ร้านนี้จุดเด่นคือเเป้งเขาเลยเพราะทำสดๆร้อนๆเลย ตัวเเป้งบางหอมมมม เหนียวนุ่มดีมากๆ มันทำให้เราได้กินสายไหมเเบบเน้นๆ เหมาะกับไอ้ต้าวอ้วงเเบบเราเป็นที่สุด!!\r\n', 'เวฬา.php'),
('S007', '🍕PIZZA DOLLAR', 'images/🍕PIZZA DOLLAR.jpg', 'ร้านพิซซ่าอิ่มจุกคุ้มราคาทุกบาททุกสตางค์มากๆ พิซซ่ามีหลายหน้ามากๆ หน้านี่เเน่นสุดๆทุกชิ้น เเถมอีกอย่างที่เด็ดคือชีสโทส ที่ให้ชีสมาเเบบไม่กลัวขาดทุน เเล้วที่ชอบมากๆคือ พอเราสั่งปุ๊บร้านก็จะเอาเข้าอบร้อนๆให้เราเลย ดีย์มากๆ', 'PIZZA DOLLAR.php'),
('S008', '🍵TSUJIRI', 'images/🍵TSUJIRI.jpg', 'ร้านนี้ไม่ต้องพูดเยอะ ยืนหนึ่งเรื่องชาเขียวอยู่เเล้ว ลองเเกล้งๆเดินไปสั่งชาเขียวมาลองซักเเก้ว รับรองติดใจเเน่นอน เพราะชงสดๆ ใบชาเทพๆ ที่ดื่มไปเเล้วรู้เลยว่านี่เเหละ คือชาเขียวที่ดีจริงๆ', 'TSUJIRI.php'),
('S009', '🍮DADAYA', 'images/DADAYA.jpg', 'โอบันยากิร้อนๆ ที่ดูดตาดูดจมูกเหลือเกินอ่ะ ร้านนี้เขาทำสดเลย เเล้วโอบันยากิที่ทำสดอ่ะมันจะไม่อร่อยได้ไงเล่า!! เเถมมีไส้หลายไส้มากๆ เด็ดทุกไส้เลย เราเเนะนำมัทฉะนะ เจ้มจ้นดีมากๆหอมฟุดๆ ที่ร้านเขามีขายวาริบิโมจิด้วยนะดีย์เลยนะนุ่มๆหอมๆหวานละมุนๆ\r\n', 'DADAYA.php');

-- --------------------------------------------------------

--
-- Table structure for table `usepoint`
--

CREATE TABLE `usepoint` (
  `pid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppic` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppoint` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usepoint`
--

INSERT INTO `usepoint` (`pid`, `pname`, `ppic`, `ppoint`) VALUES
('P001', 'discount 30%', 'images/d1.jpg', 500),
('P002', 'discount 20%', 'images/d2.jpg', 300),
('P003', 'discount 50%', 'images/d3.jpg', 700),
('P004', 'buy 1 free 1', 'images/d4.jpg', 1200),
('P005', 'discount 80%', 'images/d5.jpg', 950);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopid`);

--
-- Indexes for table `usepoint`
--
ALTER TABLE `usepoint`
  ADD PRIMARY KEY (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
