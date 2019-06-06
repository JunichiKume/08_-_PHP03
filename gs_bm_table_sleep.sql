-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db_2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table_sleep`
--

CREATE TABLE `gs_bm_table_sleep` (
  `id` int(12) NOT NULL,
  `checkDate` datetime NOT NULL,
  `clinic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `bloodPressure` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ahi` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sleepiness` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `oralCleaning` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `jawJoint` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `oaUse` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `oralMuscle` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `tonguePressure` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `lowerJaw` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nutrition` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `exercise` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nextDate` datetime NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table_sleep`
--

INSERT INTO `gs_bm_table_sleep` (`id`, `checkDate`, `clinic`, `weight`, `bloodPressure`, `ahi`, `sleepiness`, `oralCleaning`, `jawJoint`, `oaUse`, `oralMuscle`, `tonguePressure`, `lowerJaw`, `nutrition`, `exercise`, `nextDate`, `remarks`, `indate`) VALUES
(22, '2019-06-13 00:00:00', 'デンタルクリニック', '0', '1', '3', '有', '良', '良', '良', '◎', '強', '4', '◎', '◎', '0000-00-00 00:00:00', '要経過観察', '2019-06-06 14:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table_sleep`
--
ALTER TABLE `gs_bm_table_sleep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table_sleep`
--
ALTER TABLE `gs_bm_table_sleep`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
