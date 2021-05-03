-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 05:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'aitechindia'
--
CREATE DATABASE IF NOT EXISTS aitechindia DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE aitechindia;

-- --------------------------------------------------------

--
-- Table structure for table 'user_creation'
--

DROP TABLE IF EXISTS user_creation;
CREATE TABLE IF NOT EXISTS user_creation (
  user_creation_id int(11) NOT NULL AUTO_INCREMENT,
  user_identity varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  email varchar(255) CHARACTER SET latin1 NOT NULL,
  mobile_no varchar(255) CHARACTER SET latin1 NOT NULL,
  gender varchar(255) CHARACTER SET latin1 NOT NULL,
  address text CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  password_status int(11) NOT NULL DEFAULT '0',
  delete_status int(11) NOT NULL DEFAULT '0',
  last_modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_creation_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table 'user_creation'
--

INSERT INTO user_creation (user_creation_id, user_identity, name, email, mobile_no, gender, address, password, password_status, delete_status, last_modified, created) VALUES
(1, 'admin', 'Admin', 'ap.prabhu85@gmail.com', '7708087718', 'male', 's/o Mani K\r\n10/60.Moorthipatty\r\n', '608ec74690332', 1, 0, '2021-05-02 15:39:52', '2020-07-21 13:21:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
