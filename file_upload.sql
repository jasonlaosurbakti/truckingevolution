-- phpMyAdmin SQL Dump
-- version 3.5.2-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2013 at 04:18 PM
-- Server version: 5.0.51b-community-nt-log
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `ID` int(3) NOT NULL auto_increment,
  `Filename` varchar(50) NOT NULL,
  `Detail` varchar(255) NOT NULL,
  `Folder` varchar(50) NOT NULL,
  `DateUpload` datetime NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`ID`, `Filename`, `Detail`, `Folder`, `DateUpload`) VALUES
(1, 'medifcom_mdk3x4m.sql', 'test upload file dengan extensi sql', './upload/', '2013-01-30 15:39:17'),
(2, 'insan-kamil.jpg', 'file gambar jpg', './upload/', '2013-01-30 15:42:56'),
(3, 'php-ajax-jquery.png', 'php ajax jquery', './upload/', '2013-01-30 15:43:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
