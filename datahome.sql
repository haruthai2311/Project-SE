-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 12:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datahome`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_in` int(200) NOT NULL COMMENT 'เลขที่ใบเสร็จ',
  `userid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_room` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขห้อง',
  `rcdate` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่บันทึก',
  `preve` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขอ่านได้ก่อนหน้า *ไฟฟ้า',
  `prese` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขมิเตอร์ที่อ่านได้ *ไฟฟ้า',
  `prevw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขอ่านได้ก่อนหน้า *ประปา',
  `presw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขมิเตอร์ที่อ่านได้ *ประปา',
  `inprice` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ยอดค้างชำระ',
  `pmno` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่การชำระ',
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id_in`, `userid`, `id_room`, `rcdate`, `preve`, `prese`, `prevw`, `presw`, `inprice`, `pmno`, `status`) VALUES
(16, '1102003228851', '303', '01/11/21', '2032', '2050', '129', '132', '147', '1', 'pending'),
(17, '1199900767214', '413', '01/11/21', '996', '1000', '85', '89', '56', '0', 'overdue'),
(18, '1102003228851', '303', '02/11/21', '2050', '2100', '132', '135', '371', '2', 'pending'),
(19, '1199900767214', '413', '02/11/21', '1000', '1060', '89', '95', '462', '0', 'overdue');

-- --------------------------------------------------------

--
-- Table structure for table `invoicesroomrent`
--

CREATE TABLE `invoicesroomrent` (
  `id_inroom` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่บันทึก',
  `priceroom` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ราคาห้อง',
  `prerent` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ค่ามัดจำ',
  `discount` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ส่วนลด',
  `totalprice` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ราคา',
  `semester` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ภาคการศึกษา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoicesroomrent`
--

INSERT INTO `invoicesroomrent` (`id_inroom`, `id_room`, `date`, `priceroom`, `prerent`, `discount`, `totalprice`, `semester`) VALUES
(4, 303, '01/11/21', '8000', '0', '500', '7500', 'ภาคปลาย 64'),
(5, 413, '01/11/21', '10000', '0', '0', '10000', 'ภาคปลาย 64');

-- --------------------------------------------------------

--
-- Table structure for table `occupant`
--

CREATE TABLE `occupant` (
  `id_ocp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_ocp` text COLLATE utf8_unicode_ci NOT NULL,
  `last_ocp` text COLLATE utf8_unicode_ci NOT NULL,
  `gender_ocp` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_ocp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_per` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_rlts` text COLLATE utf8_unicode_ci NOT NULL,
  `id_room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `occupant`
--

INSERT INTO `occupant` (`id_ocp`, `name_ocp`, `last_ocp`, `gender_ocp`, `phone_ocp`, `address`, `contact_per`, `contact_phone`, `contact_rlts`, `id_room`, `userid`) VALUES
('1102003228851', 'หฤทัย', 'ไชยเทศ', 'หญิง', '0985149477', '  2 หมู่ 3  บ้านข่า ศรีสงคราม นครพนม 48150', 'ถาวร  ไชยเทศ', '0625820657', 'แม่', '303', 24),
('1199900767214', 'มัสลิน', 'สิงห์อุบล', 'หญิง', '0925356022', '  120/9 ม.10  ตาลเดี่ยว แก่งคอย สระบุรี 18110', 'ชาตรี สิงห์อุบล', '0812905469', 'พ่อ', '413', 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pmno` int(11) NOT NULL COMMENT 'เลขที่การชำระ',
  `id_invoices` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่ใบชำระ',
  `id_ocp` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ไอดีผู้เช่า',
  `pm_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่ชำระ',
  `apdate` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่อนุมัติ',
  `pmtotal` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จำนวนเงิน',
  `pmstatus` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id_room` int(11) NOT NULL,
  `type_room` text COLLATE utf8_unicode_ci NOT NULL,
  `price_room` int(11) NOT NULL,
  `status_room` text COLLATE utf8_unicode_ci NOT NULL,
  `id_mte` int(11) NOT NULL,
  `id_mtw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_room`, `type_room`, `price_room`, `status_room`, `id_mte`, `id_mtw`) VALUES
(101, 'ห้องแอร์', 10000, 'empty', 1001, 11),
(102, 'ห้องแอร์', 10000, 'empty', 1002, 12),
(103, 'ห้องแอร์', 10000, 'empty', 1003, 13),
(104, 'ห้องพัดลม', 8000, 'empty', 1004, 14),
(105, 'ห้องแอร์', 10000, 'empty', 1005, 15),
(201, 'ห้องพัดลม', 8000, 'empty', 1006, 16),
(202, 'ห้องแอร์', 10000, 'empty', 1007, 17),
(203, 'ห้องพัดลม', 8000, 'empty', 1008, 18),
(204, 'ห้องพัดลม', 8000, 'empty', 1009, 19),
(301, 'ห้องแอร์', 10000, 'empty', 1020, 20),
(302, 'ห้องแอร์', 10000, 'empty', 1021, 21),
(303, 'ห้องพัดลม', 8000, 'rented', 1022, 22),
(304, 'ห้องแอร์', 10000, 'empty', 1023, 23),
(411, 'ห้องแอร์', 10000, 'empty', 1024, 24),
(412, 'ห้องพัดลม', 8000, 'empty', 1025, 25),
(413, 'ห้องแอร์', 10000, 'rented', 1026, 26),
(414, 'ห้องแอร์', 10000, 'empty', 1027, 27),
(415, 'ห้องแอร์', 10000, 'empty', 1028, 28),
(521, 'ห้องแอร์', 10000, 'empty', 1029, 29),
(522, 'ห้องพัดลม', 8000, 'empty', 1030, 30),
(523, 'ห้องแอร์', 10000, 'empty', 1031, 31),
(524, 'ห้องพัดลม', 8000, 'empty', 1032, 32),
(525, 'ห้องแอร์', 10000, 'empty', 1033, 33),
(607, 'ห้องแอร์', 10000, 'empty', 1034, 34),
(608, 'ห้องแอร์', 10000, 'empty', 1035, 35),
(609, 'ห้องแอร์', 10000, 'empty', 1036, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tempo_bill`
--

CREATE TABLE `tempo_bill` (
  `id` int(11) NOT NULL,
  `prevw` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `preve` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id_room` int(11) NOT NULL,
  `name_ocp` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempo_bill`
--

INSERT INTO `tempo_bill` (`id`, `prevw`, `preve`, `id_room`, `name_ocp`) VALUES
(1, '135', '2100', 303, 'หฤทัย'),
(2, '95', '1060', 413, 'มัสลิน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_room` int(11) DEFAULT NULL,
  `status` enum('USER','ADMIN') COLLATE utf8_unicode_ci DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `id_room`, `status`) VALUES
(10, 'มัสลิน สิงห์อุบล', '1199900767214', '1199900767214', 413, 'USER'),
(23, 'ppadmin', 'adminn', '1230', NULL, 'ADMIN'),
(24, 'หฤทัย ไชยเทศ', '1102003228851', '1102003228851', 303, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_in`);

--
-- Indexes for table `invoicesroomrent`
--
ALTER TABLE `invoicesroomrent`
  ADD PRIMARY KEY (`id_inroom`);

--
-- Indexes for table `occupant`
--
ALTER TABLE `occupant`
  ADD PRIMARY KEY (`id_ocp`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmno`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username_admin` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_in` int(200) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบเสร็จ', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoicesroomrent`
--
ALTER TABLE `invoicesroomrent`
  MODIFY `id_inroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่การชำระ';

--
-- AUTO_INCREMENT for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
