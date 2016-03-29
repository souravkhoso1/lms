-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2016 at 09:01 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentml` int(3) NOT NULL,
  `studentvl` int(3) NOT NULL,
  `studentcl` int(3) NOT NULL,
  `facultyml` int(3) NOT NULL,
  `facultyvl` int(3) NOT NULL,
  `facultycl` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `studentml`, `studentvl`, `studentcl`, `facultyml`, `facultyvl`, `facultycl`) VALUES
(1, 15, 15, 15, 15, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `rollnumber` varchar(30) NOT NULL,
  `department` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `typeofleave` varchar(20) NOT NULL,
  `daysofleave` int(3) NOT NULL,
  `leavefrom` varchar(30) NOT NULL,
  `leaveto` varchar(30) NOT NULL,
  `hodapproved` varchar(20) NOT NULL,
  `coordinatorapproved` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `rollnumber` varchar(20) NOT NULL,
  `department` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `ml` int(3) DEFAULT NULL,
  `cl` int(3) DEFAULT NULL,
  `vl` int(3) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `rollnumber`, `department`, `password`, `ml`, `cl`, `vl`, `role`) VALUES
(2, 'Ramana', 'hod_cse', 'cse', '12345', NULL, NULL, NULL, 'hod'),
(3, 'Atul Kumar', 'ugpgcoordinator', '', '1234', 0, 0, 0, 'ugpgcoordinator'),
(4, 'Ramana', 'ramana', 'cse', '1234', 0, 0, 0, 'faculty'),
(5, 'Fulwani', 'facultycoordinator', '', '123', 0, 0, 0, 'facultycoordinator'),
(7, 'admin1', 'admin1', '', '1234', 2, 0, 0, 'admin'),
(8, 'AKT', 'hod_ee', 'ee', '1234', NULL, NULL, NULL, 'hod'),
(9, 'B. Ravindra', 'hod_me', 'me', '1234', NULL, NULL, NULL, 'hod'),
(10, 'KKR', 'hod_ma', 'ma', '1234', NULL, NULL, NULL, 'hod'),
(11, 'V. Narayanan', 'hod_ph', 'ph', '1234', NULL, NULL, NULL, 'hod'),
(12, 'Rakesh Sharma', 'hod_ch', 'ch', '1234', NULL, NULL, NULL, 'hod'),
(13, 'Sushmita Jha', 'hod_bi', 'bi', '1234', NULL, NULL, NULL, 'hod'),
(14, 'Vidya', 'hod_hss', 'hss', '1234', NULL, NULL, NULL, 'hod');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
