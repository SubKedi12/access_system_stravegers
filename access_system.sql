-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2013 at 02:48 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ACCESS_SYSTEM`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `data_logger` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `OTP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Verified_otp` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Verified, 0=Not verified',
  `Verified_grap` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Verified, 0=Not verified',
  PRIMARY KEY  (`id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `clg` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `userimage` varchar(800) NOT NULL,
  `image1` varchar(800) NOT NULL,
  `image2` varchar(800) NOT NULL,
  `image3` varchar(800) NOT NULL,
  `image4` varchar(800) NOT NULL,
  `image5` varchar(800) NOT NULL,
  PRIMARY KEY  (`username`,`email`,`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--
CREATE TABLE `mobile_numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
 `mobile_number` bigint(10) COLLATE utf8_unicode_ci NOT NULL,
 `verification_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 `verified` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Verified, 0=Not verified',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`username`, `password`, `name`, `clg`, `email`, `phone`, `userimage`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
('Ankit', 'password1', 'Ankit Rout', 'CET', 'kishanrout@gmail.com', 1234566541, 'images/default.jpg', 'http://localhost/accsys/images/wood.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/edu.jpg', 'http://localhost/accsys/images/two.jpg', 'http://localhost/accsys/images/virus.jpg'),
('Jaspreet', 'password2', 'Jaspreet Kaur', 'CET', 'simrancalcutta1999@gmail.com', 4567896547, 'images/default.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/two.jpg', 'http://localhost/accsys/images/edu.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/two.jpg'),
('Subham', 'password3', 'Subham Kedia', 'CET', 'subham.kedia.12@gmail.com', 4971104971, 'images/default.jpg', 'http://localhost/accsys/images/edu.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/two.jpg', 'http://localhost/accsys/images/virus.jpg', 'http://localhost/accsys/images/wood.jpg'),
('Stravenger', 'goodguy', 'Stravenger Team', 'CET', 'stravenger@login.com', 3456789127, 'images/default.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/two.jpg', 'http://localhost/accsys/images/edu.jpg', 'http://localhost/accsys/images/bit.jpg', 'http://localhost/accsys/images/two.jpg');