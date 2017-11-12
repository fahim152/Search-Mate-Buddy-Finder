-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2017 at 12:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `search_mate`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `u_id` varchar(10) NOT NULL,
  `r_id` varchar(10) NOT NULL,
  `accept` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`u_id`, `r_id`, `accept`, `status`) VALUES
('1005', '1006', 'Accepted', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `pass`, `usertype`) VALUES
('1002', 'Shouvick Monjur', '12345678', 'moderator'),
('1004', 'Jakia Sultana', '12345678', 'mate'),
('1004', 'Jakia Sultana', '12345678', 'mate'),
('1006', 'Shouvin Bhuiyan', '12345678', 'mate'),
('1005', 'Shohag Monzur', '12345678', 'mate'),
('1001', 'Fahim Ahmed', '12345678', 'mate'),
('1001', 'Fahim Ahmed', '12345678', 'mate');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(10) NOT NULL,
  `r_id` varchar(10) NOT NULL,
  `message` mediumtext NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`c_id`, `u_id`, `r_id`, `message`, `time`) VALUES
(1, '1006', '1005', 'hii', '03:56:59'),
(2, '1005', '1006', 'hello', '03:57:06'),
(3, '1005', '1006', 'how are u?', '03:57:15'),
(4, '1006', '1005', 'i am fine.thank you', '03:57:37'),
(5, '1006', '1005', 'how are u?', '03:57:52'),
(6, '1005', '1006', 'good', '03:58:05'),
(7, '1005', '1006', 'what you are doing?', '04:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE IF NOT EXISTS `moderator` (
  `id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `name`, `pass`, `usertype`) VALUES
('1002', 'Shouvick Monjur', '12345678', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `school` varchar(30) NOT NULL,
  `college` varchar(30) NOT NULL,
  `university` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `workplace` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `pass`, `mobile`, `school`, `college`, `university`, `facebook`, `workplace`, `designation`, `photo`, `type`) VALUES
('1001', 'Fahim Ahmed', 'fahim152@gmail.com', '12345678', '01620882194', 'Comilla Zilla School', 'Comilla Victoria College', 'AIUB', 'fahim152', 'DSI', 'UI developer', '', 'mate'),
('1002', 'Shouvick Monjur', 'shouvick@gmail.com', '12345678', '01521212948', 'Motijheel high school', 'Notre dame college ', 'AIUB', 'Shouvick', 'Home it', 'UX dev', '', 'moderator'),
('1003', 'Rana Russel', ' rana152@yahoo.com', '12345678', '01521212948', 'Motijheel high school', 'Motijheel high school', 'AIUB', 'ranarussel', 'Home IT', 'web dev', '', 'admin'),
('1004', 'Jakia Sultana', 'jakia152@gmail.com', '12345678', '01521212948', 'Mirpur Ideal School and Colleg', 'Mirpur Ideal School and Colleg', 'AIUB', 'jakiaeva', 'DSI ', 'web dev', '', 'mate'),
('1005', 'Shohag Monzur', 'shohag@aol.net', '12345678', '01620882194', 'Dhaka School', 'Dhaka College', 'AIUB', 'shohag', 'Therap', 'Web dev', '', 'mate'),
('1006', 'Shouvin Bhuiyan', 'bhuiyan@yahoo.com', '12345678', '01620882194', 'Dhaka School', 'Dhaka College', 'BUET', 'shouvin', 'Samsung IT', 'Peon', '', 'mate');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
