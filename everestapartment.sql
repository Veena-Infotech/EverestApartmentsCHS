-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `everestapartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_id`, `password`) VALUES
(1, 'ajaysck@gmail.com', '11A_#_Chetan'),
(2, 'ajaysck@gmail.com', '11B_$_Soni'),
(3, 'anjushetty@me.com', '12_@_Anjali'),
(4, 'vjhaveri@deloitte.com', '13_%_Vipul'),
(5, 'sanjay@sansula.com', '21A_#_Lalitha'),
(6, 'sanjay@sansula.com', '21B_$_Sanjay'),
(7, 'mohan_renu@yahoo.com', '22_@_Mohan'),
(8, 'ninasugatsr@hotmail.com', '23_%_Nina'),
(9, 'dilip.mehta@hotmail.com', '31A_#_Dilip'),
(10, 'dilip.mehta@hotmail.com', '31B_$_Anshul'),
(11, 'vijaybaduni@gmail.com', '31_@_Divya'),
(12, 'ninasugatsr@hotmail.com', '33_%_Nina'),
(13, 'btbhandary@gmail.com', '41_#_Deepa'),
(14, 'vithalani.family@gmail.com', '42_$_Vithalani'),
(15, 'karandugal@gmail.com', '43_@_Manjit'),
(16, 'sunainkk@hotmail.com', '51_%_Sangeeta'),
(17, 'vithalani.family@gmail.com', '52_#_Vithalani'),
(18, 'crystal_drape@yahoo.com', '53_$_Amit'),
(19, 'mehboob.sahny@outlook.com', '61_@_Mehboob'),
(20, 'dhiraj@apparelize.com', '62_%_Resham'),
(21, 'sovertan@gmail.com', '63_#_Murli'),
(22, 'veena@umrit.com', '71_$_Umesh'),
(23, 'adityak@saksoft.com', '72_@_Aditya'),
(24, 'abhimjianifly@gmail.com', '73_%_Arvind'),
(25, 'rekha@murjani.com', '81_#_Lansing'),
(26, 'ajaysck@gmail.com', '82_$_Ajaykumar'),
(27, 'farah.badhwar@gmail.com', '83_@_Rahul'),
(28, 'vithalani.family@gmail.com', '91_%_Hargovind'),
(29, 'sghatalia@gmail.com', '92_#_Shailesh'),
(30, 'varun@magnumadvisors.in', '93_$_Varun'),
(31, 'dayalp@hotmail.com', '101_@_Dayal'),
(32, 'mail@chokhanipharma.com', '102_%_Shobha'),
(33, 'dayalp@hotmail.com', '103_#_Vinti'),
(34, 'kamaldbhavnani@gmail.com', '111_$_Kamal'),
(35, 'nitaa2004@hotmail.com', '112_@_Gautam'),
(36, 'luke.henny@gmail.com', '113_%_Luke'),
(37, 'thakkarabhay@hotmail.com', '121_#_Kavita'),
(38, 'account@sikkimferroalloys.com', '122_$_Alioth'),
(39, 'ushanp@usha.co.in', '123_@_Gobind'),
(40, 'vidya.moorjani@gmail.com', '131_%_Moorjani'),
(41, 'jaithakur@gmail.com', '132_#_Kavita'),
(42, 'guptaauchitya@gmail.com', '133_$_Kamal'),
(43, 'vidya.moorjani@gmail.com', '141_@_Vidya'),
(44, 'amiteshh@lntecc.com', '142_%_Larsen'),
(45, 'inahalankar@hotmail.com', '143_#_Arun'),
(46, 'somathadani@hotmail.com', '151_$_Mohan'),
(47, 'rtlalvani@yahoo.com', '152_@_Ranjit'),
(48, 'anuragadlakha@gmail.com', '153__%_Anurag'),
(49, 'admin@gmail.com', 'everestlog1');
(50, 'admin@mail.com', 'admin@123');


--
-- Indexes for dumped tables
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
