-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 03:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accommodation`
--

CREATE TABLE `tbl_accommodation` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_address` varchar(20) NOT NULL,
  `a_coordinate` varchar(30) NOT NULL,
  `a_type` varchar(20) NOT NULL,
  `a_service` text NOT NULL,
  `a_rating` tinyint(4) NOT NULL,
  `a_roomavail` tinyint(4) NOT NULL,
  `a_roomrate` varchar(20) NOT NULL,
  `a_contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(16) NOT NULL,
  `admin_pass` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cafe`
--

CREATE TABLE `tbl_cafe` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_desc` text NOT NULL,
  `c_address` varchar(30) NOT NULL,
  `c_coordinate` varchar(30) NOT NULL,
  `c_contact` varchar(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_services` text NOT NULL,
  `c_ratings` tinyint(4) NOT NULL,
  `c_starttime` varchar(10) NOT NULL,
  `c_closetime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_desc` text NOT NULL,
  `p_address` varchar(30) NOT NULL,
  `p_coordinate` varchar(30) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_rating` tinyint(4) NOT NULL,
  `p_fee` varchar(20) NOT NULL,
  `p_starttime` varchar(10) NOT NULL,
  `p_closetime` varchar(10) NOT NULL,
  `p_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rec_accommodation`
--

CREATE TABLE `tbl_rec_accommodation` (
  `rec_a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_address` varchar(20) NOT NULL,
  `a_coordinate` varchar(30) NOT NULL,
  `a_type` varchar(20) NOT NULL,
  `a_service` text NOT NULL,
  `a_rating` tinyint(4) NOT NULL,
  `a_roomavail` tinyint(4) NOT NULL,
  `a_roomrate` varchar(20) NOT NULL,
  `a_contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rec_cafe`
--

CREATE TABLE `tbl_rec_cafe` (
  `rec_c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_desc` text NOT NULL,
  `c_address` varchar(30) NOT NULL,
  `c_coordinate` varchar(30) NOT NULL,
  `c_contact` varchar(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_services` text NOT NULL,
  `c_ratings` tinyint(4) NOT NULL,
  `c_starttime` varchar(10) NOT NULL,
  `c_closetime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rec_place`
--

CREATE TABLE `tbl_rec_place` (
  `rec_p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_desc` text NOT NULL,
  `p_address` varchar(30) NOT NULL,
  `p_coordinate` varchar(30) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_rating` tinyint(4) NOT NULL,
  `p_fee` varchar(20) NOT NULL,
  `p_starttime` varchar(10) NOT NULL,
  `p_closetime` varchar(10) NOT NULL,
  `p_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rec_restaurant`
--

CREATE TABLE `tbl_rec_restaurant` (
  `acc_r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `r_desc` text NOT NULL,
  `r_address` varchar(30) NOT NULL,
  `r_coordinate` varchar(30) NOT NULL,
  `r_contact` varchar(20) NOT NULL,
  `r_type` varchar(20) NOT NULL,
  `r_services` text NOT NULL,
  `r_ratings` tinyint(4) NOT NULL,
  `r_starttime` varchar(10) NOT NULL,
  `r_closetime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `r_desc` text NOT NULL,
  `r_address` varchar(30) NOT NULL,
  `r_coordinate` varchar(30) NOT NULL,
  `r_contact` varchar(20) NOT NULL,
  `r_type` varchar(20) NOT NULL,
  `r_services` text NOT NULL,
  `r_ratings` tinyint(4) NOT NULL,
  `r_starttime` varchar(10) NOT NULL,
  `r_closetime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(16) NOT NULL,
  `u_email` varchar(20) NOT NULL,
  `u_pass` varchar(42) NOT NULL,
  `u_address` varchar(20) NOT NULL,
  `u_gender` enum('Male','Female','Others') NOT NULL,
  `u_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cafe`
--
ALTER TABLE `tbl_cafe`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_rec_accommodation`
--
ALTER TABLE `tbl_rec_accommodation`
  ADD PRIMARY KEY (`rec_a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_rec_cafe`
--
ALTER TABLE `tbl_rec_cafe`
  ADD PRIMARY KEY (`rec_c_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_rec_place`
--
ALTER TABLE `tbl_rec_place`
  ADD PRIMARY KEY (`rec_p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_rec_restaurant`
--
ALTER TABLE `tbl_rec_restaurant`
  ADD PRIMARY KEY (`acc_r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cafe`
--
ALTER TABLE `tbl_cafe`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rec_accommodation`
--
ALTER TABLE `tbl_rec_accommodation`
  MODIFY `rec_a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rec_cafe`
--
ALTER TABLE `tbl_rec_cafe`
  MODIFY `rec_c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rec_place`
--
ALTER TABLE `tbl_rec_place`
  MODIFY `rec_p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rec_restaurant`
--
ALTER TABLE `tbl_rec_restaurant`
  MODIFY `acc_r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rec_accommodation`
--
ALTER TABLE `tbl_rec_accommodation`
  ADD CONSTRAINT `tbl_rec_accommodation_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rec_cafe`
--
ALTER TABLE `tbl_rec_cafe`
  ADD CONSTRAINT `tbl_rec_cafe_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rec_place`
--
ALTER TABLE `tbl_rec_place`
  ADD CONSTRAINT `tbl_rec_place_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rec_restaurant`
--
ALTER TABLE `tbl_rec_restaurant`
  ADD CONSTRAINT `tbl_rec_restaurant_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
