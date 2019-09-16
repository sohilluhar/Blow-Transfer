-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 09:18 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paytransfer`
--

-- --------------------------------------------------------

--
-- Table structure for table `authotp`
--

CREATE TABLE `authotp` (
  `email` text NOT NULL,
  `otp` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authotp`
--

INSERT INTO `authotp` (`email`, `otp`, `timestamp`) VALUES
('abc@abc.com', 660028, '2018-01-18 11:30:37'),
('abc@abc.com', 476403, '2018-01-18 11:37:36'),
('yash@yash.com', 460372, '2018-01-18 14:33:00'),
('abc@abc.com', 805388, '2018-01-18 14:38:16'),
('abc1@abc.com', 36281, '2018-01-18 14:39:38'),
('abc2@gmail.com', 729417, '2018-01-18 14:42:13'),
('yash123@yash.com', 318369, '2018-01-27 12:00:22'),
('yash1234@yash.com', 300923, '2018-01-27 12:05:23'),
('yash12345@yash.com', 456769, '2018-01-27 12:06:06'),
('bac@gmail.com', 656014, '2018-02-10 10:22:38'),
('ypilankar1@gmail.com', 268734, '2018-02-24 09:40:09'),
('ypilankar1@gmail.com', 257062, '2018-02-24 09:40:34'),
('', 918968, '2018-02-24 09:41:00'),
('', 968893, '2018-02-24 09:55:19'),
('', 584910, '2018-02-24 09:55:39'),
('', 869473, '2018-02-24 09:56:19'),
('', 747792, '2018-03-02 17:08:45'),
('', 735269, '2018-03-02 17:11:17'),
('amyra@gmail.com', 99806, '2018-03-02 17:28:20'),
('amyra@gmail.com', 545201, '2018-03-02 17:29:05'),
('amyra@gmail.com', 1874, '2018-03-02 17:29:55'),
('amyra1@gmail.com', 526086, '2018-03-02 17:31:16'),
('user1@gmail.com', 242408, '2018-03-03 15:21:47'),
('gazala@gmail.com', 632458, '2018-03-03 15:27:00'),
('gazala1@gmail.com', 218905, '2018-03-03 15:29:04'),
('shifa@gmail.com', 141030, '2018-03-04 06:40:14'),
('ansarigazala29@gmail.com', 893302, '2018-03-04 06:45:17'),
('ariba15801@gmail.com', 867702, '2018-03-04 07:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `filestore`
--

CREATE TABLE `filestore` (
  `file_id` int(4) NOT NULL,
  `sender` bigint(10) NOT NULL,
  `reciever` bigint(10) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filestore`
--

INSERT INTO `filestore` (`file_id`, `sender`, `reciever`, `filename`) VALUES
(8, 8097670658, 9987262313, 'abc.png'),
(9, 9987262313, 8097670658, 'pqr.pdf'),
(10, 9594248314, 9987262313, 'xyz.txt');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `name`, `email`, `mobile`, `password`) VALUES
(28, 'yash', 'amyra@gmail.com', 7021854016, 'yashyash'),
(29, 'amyra', 'amyra1@gmail.com', 8097670658, 'yashyash'),
(30, 'user', 'user1@gmail.com', 7021854016, 'yashyash'),
(32, 'gazala', 'gazala1@gmail.com', 9987262313, 'qwerty'),
(34, 'gazala', 'ansarigazala29@gmail.com', 9987262313, '123456'),
(35, 'ariba', 'ariba15801@gmail.com', 9594248314, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filestore`
--
ALTER TABLE `filestore`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filestore`
--
ALTER TABLE `filestore`
  MODIFY `file_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
