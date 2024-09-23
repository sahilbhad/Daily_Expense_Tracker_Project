-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 01:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dets`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_expense`
--

CREATE TABLE `add_expense` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `e_date` date NOT NULL,
  `e_item` varchar(100) NOT NULL,
  `e_cost` float NOT NULL,
  `e_detail` varchar(150) NOT NULL,
  `e_mode` varchar(10) NOT NULL,
  `c_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_expense`
--

INSERT INTO `add_expense` (`e_id`, `u_id`, `e_date`, `e_item`, `e_cost`, `e_detail`, `e_mode`, `c_id`) VALUES
(47, 1, '2023-09-17', 'tv', 100, ' sssssss', 'Cash', 97),
(48, 1, '2023-09-17', 'tv', 200, ' vv', 'Cash', 97),
(49, 1, '2023-09-17', 'ss', 100, ' c', 'Cash', 97),
(50, 1, '2023-09-17', 's', 100, ' ', 'Cash', 98),
(51, 1, '2023-09-27', 's', 100, ' gfggggf', 'Cash', 98),
(55, 6, '2023-09-18', 'tv', 100, ' kk', 'Cash', 97),
(56, 1, '2023-09-19', 'tv', 100, ' kkjbjh', 'Cash', 98),
(57, 1, '2023-09-23', 'tv', 20, ' dfrf', 'Cash', 0),
(58, 9, '2023-10-02', 'ert', 100, ' ASDFGHJJKL', 'Cash', 100),
(59, 9, '2023-10-02', 's', 100, ' ssss', 'Cash', 100),
(60, 9, '2023-10-02', 's', 100, ' dd', 'Cash', 100),
(61, 1, '2023-10-02', 'sss', 100, ' gg', 'Cash', 98);

-- --------------------------------------------------------

--
-- Table structure for table `add_income`
--

CREATE TABLE `add_income` (
  `i_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `i_date` date NOT NULL,
  `amount` float NOT NULL,
  `i_pmode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_income`
--

INSERT INTO `add_income` (`i_id`, `u_id`, `i_date`, `amount`, `i_pmode`) VALUES
(50, 6, '2023-09-18', 900, ' Cash'),
(52, 1, '2023-09-23', 4900, ' Cash'),
(53, 9, '2023-10-02', 700, ' Cash');

-- --------------------------------------------------------

--
-- Table structure for table `e_category`
--

CREATE TABLE `e_category` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `c_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_category`
--

INSERT INTO `e_category` (`id`, `u_id`, `c_name`) VALUES
(97, 6, 'io'),
(98, 1, 'y'),
(100, 9, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `super_a`
--

CREATE TABLE `super_a` (
  `s_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_a`
--

INSERT INTO `super_a` (`s_id`, `username`, `password`) VALUES
(1, 'admin', 'admin@1234');

-- --------------------------------------------------------

--
-- Table structure for table `u_register`
--

CREATE TABLE `u_register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_register`
--

INSERT INTO `u_register` (`id`, `username`, `email`, `password`) VALUES
(1, 'sahil', 'sahil@gmail.com', '111'),
(6, ' abhi', ' abhi@gmail.com', '456'),
(8, 'sahi', 'k', '111'),
(9, 'abc', 'abc@gmail.com', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_expense`
--
ALTER TABLE `add_expense`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `add_income`
--
ALTER TABLE `add_income`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `e_category`
--
ALTER TABLE `e_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_a`
--
ALTER TABLE `super_a`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `u_register`
--
ALTER TABLE `u_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_expense`
--
ALTER TABLE `add_expense`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `add_income`
--
ALTER TABLE `add_income`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `e_category`
--
ALTER TABLE `e_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `super_a`
--
ALTER TABLE `super_a`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `u_register`
--
ALTER TABLE `u_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
