-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2011 at 03:00 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firefighting`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE IF NOT EXISTS `availability` (
  `ecode` varchar(10) NOT NULL,
  `d0h0` varchar(1) DEFAULT NULL,
  `d0h1` varchar(1) DEFAULT NULL,
  `d0h2` varchar(1) DEFAULT NULL,
  `d0h3` varchar(1) DEFAULT NULL,
  `d0h4` varchar(1) DEFAULT NULL,
  `d0h5` varchar(1) DEFAULT NULL,
  `d0h6` varchar(1) DEFAULT NULL,
  `d0h7` varchar(1) DEFAULT NULL,
  `d0h8` varchar(1) DEFAULT NULL,
  `d0h9` varchar(1) DEFAULT NULL,
  `d0h10` varchar(1) DEFAULT NULL,
  `d0h11` varchar(1) DEFAULT NULL,
  `d0h12` varchar(1) DEFAULT NULL,
  `d0h13` varchar(1) DEFAULT NULL,
  `d0h14` varchar(1) DEFAULT NULL,
  `d0h15` varchar(1) DEFAULT NULL,
  `d0h16` varchar(1) DEFAULT NULL,
  `d0h17` varchar(1) DEFAULT NULL,
  `d0h18` varchar(1) DEFAULT NULL,
  `d0h19` varchar(1) DEFAULT NULL,
  `d0h20` varchar(1) DEFAULT NULL,
  `d0h21` varchar(1) DEFAULT NULL,
  `d0h22` varchar(1) DEFAULT NULL,
  `d0h23` varchar(1) DEFAULT NULL,
  `d1h0` varchar(1) DEFAULT NULL,
  `d1h1` varchar(1) DEFAULT NULL,
  `d1h2` varchar(1) DEFAULT NULL,
  `d1h3` varchar(1) DEFAULT NULL,
  `d1h4` varchar(1) DEFAULT NULL,
  `d1h5` varchar(1) DEFAULT NULL,
  `d1h6` varchar(1) DEFAULT NULL,
  `d1h7` varchar(1) DEFAULT NULL,
  `d1h8` varchar(1) DEFAULT NULL,
  `d1h9` varchar(1) DEFAULT NULL,
  `d1h10` varchar(1) DEFAULT NULL,
  `d1h11` varchar(1) DEFAULT NULL,
  `d1h12` varchar(1) DEFAULT NULL,
  `d1h13` varchar(1) DEFAULT NULL,
  `d1h14` varchar(1) DEFAULT NULL,
  `d1h15` varchar(1) DEFAULT NULL,
  `d1h16` varchar(1) DEFAULT NULL,
  `d1h17` varchar(1) DEFAULT NULL,
  `d1h18` varchar(1) DEFAULT NULL,
  `d1h19` varchar(1) DEFAULT NULL,
  `d1h20` varchar(1) DEFAULT NULL,
  `d1h21` varchar(1) DEFAULT NULL,
  `d1h22` varchar(1) DEFAULT NULL,
  `d1h23` varchar(1) DEFAULT NULL,
  `d2h0` varchar(1) DEFAULT NULL,
  `d2h1` varchar(1) DEFAULT NULL,
  `d2h2` varchar(1) DEFAULT NULL,
  `d2h3` varchar(1) DEFAULT NULL,
  `d2h4` varchar(1) DEFAULT NULL,
  `d2h5` varchar(1) DEFAULT NULL,
  `d2h6` varchar(1) DEFAULT NULL,
  `d2h7` varchar(1) DEFAULT NULL,
  `d2h8` varchar(1) DEFAULT NULL,
  `d2h9` varchar(1) DEFAULT NULL,
  `d2h10` varchar(1) DEFAULT NULL,
  `d2h11` varchar(1) DEFAULT NULL,
  `d2h12` varchar(1) DEFAULT NULL,
  `d2h13` varchar(1) DEFAULT NULL,
  `d2h14` varchar(1) DEFAULT NULL,
  `d2h15` varchar(1) DEFAULT NULL,
  `d2h16` varchar(1) DEFAULT NULL,
  `d2h17` varchar(1) DEFAULT NULL,
  `d2h18` varchar(1) DEFAULT NULL,
  `d2h19` varchar(1) DEFAULT NULL,
  `d2h20` varchar(1) DEFAULT NULL,
  `d2h21` varchar(1) DEFAULT NULL,
  `d2h22` varchar(1) DEFAULT NULL,
  `d2h23` varchar(1) DEFAULT NULL,
  `d3h0` varchar(1) DEFAULT NULL,
  `d3h1` varchar(1) DEFAULT NULL,
  `d3h2` varchar(1) DEFAULT NULL,
  `d3h3` varchar(1) DEFAULT NULL,
  `d3h4` varchar(1) DEFAULT NULL,
  `d3h5` varchar(1) DEFAULT NULL,
  `d3h6` varchar(1) DEFAULT NULL,
  `d3h7` varchar(1) DEFAULT NULL,
  `d3h8` varchar(1) DEFAULT NULL,
  `d3h9` varchar(1) DEFAULT NULL,
  `d3h10` varchar(1) DEFAULT NULL,
  `d3h11` varchar(1) DEFAULT NULL,
  `d3h12` varchar(1) DEFAULT NULL,
  `d3h13` varchar(1) DEFAULT NULL,
  `d3h14` varchar(1) DEFAULT NULL,
  `d3h15` varchar(1) DEFAULT NULL,
  `d3h16` varchar(1) DEFAULT NULL,
  `d3h17` varchar(1) DEFAULT NULL,
  `d3h18` varchar(1) DEFAULT NULL,
  `d3h19` varchar(1) DEFAULT NULL,
  `d3h20` varchar(1) DEFAULT NULL,
  `d3h21` varchar(1) DEFAULT NULL,
  `d3h22` varchar(1) DEFAULT NULL,
  `d3h23` varchar(1) DEFAULT NULL,
  `d4h0` varchar(1) DEFAULT NULL,
  `d4h1` varchar(1) DEFAULT NULL,
  `d4h2` varchar(1) DEFAULT NULL,
  `d4h3` varchar(1) DEFAULT NULL,
  `d4h4` varchar(1) DEFAULT NULL,
  `d4h5` varchar(1) DEFAULT NULL,
  `d4h6` varchar(1) DEFAULT NULL,
  `d4h7` varchar(1) DEFAULT NULL,
  `d4h8` varchar(1) DEFAULT NULL,
  `d4h9` varchar(1) DEFAULT NULL,
  `d4h10` varchar(1) DEFAULT NULL,
  `d4h11` varchar(1) DEFAULT NULL,
  `d4h12` varchar(1) DEFAULT NULL,
  `d4h13` varchar(1) DEFAULT NULL,
  `d4h14` varchar(1) DEFAULT NULL,
  `d4h15` varchar(1) DEFAULT NULL,
  `d4h16` varchar(1) DEFAULT NULL,
  `d4h17` varchar(1) DEFAULT NULL,
  `d4h18` varchar(1) DEFAULT NULL,
  `d4h19` varchar(1) DEFAULT NULL,
  `d4h20` varchar(1) DEFAULT NULL,
  `d4h21` varchar(1) DEFAULT NULL,
  `d4h22` varchar(1) DEFAULT NULL,
  `d4h23` varchar(1) DEFAULT NULL,
  `d5h0` varchar(1) DEFAULT NULL,
  `d5h1` varchar(1) DEFAULT NULL,
  `d5h2` varchar(1) DEFAULT NULL,
  `d5h3` varchar(1) DEFAULT NULL,
  `d5h4` varchar(1) DEFAULT NULL,
  `d5h5` varchar(1) DEFAULT NULL,
  `d5h6` varchar(1) DEFAULT NULL,
  `d5h7` varchar(1) DEFAULT NULL,
  `d5h8` varchar(1) DEFAULT NULL,
  `d5h9` varchar(1) DEFAULT NULL,
  `d5h10` varchar(1) DEFAULT NULL,
  `d5h11` varchar(1) DEFAULT NULL,
  `d5h12` varchar(1) DEFAULT NULL,
  `d5h13` varchar(1) DEFAULT NULL,
  `d5h14` varchar(1) DEFAULT NULL,
  `d5h15` varchar(1) DEFAULT NULL,
  `d5h16` varchar(1) DEFAULT NULL,
  `d5h17` varchar(1) DEFAULT NULL,
  `d5h18` varchar(1) DEFAULT NULL,
  `d5h19` varchar(1) DEFAULT NULL,
  `d5h20` varchar(1) DEFAULT NULL,
  `d5h21` varchar(1) DEFAULT NULL,
  `d5h22` varchar(1) DEFAULT NULL,
  `d5h23` varchar(1) DEFAULT NULL,
  `d6h0` varchar(1) DEFAULT NULL,
  `d6h1` varchar(1) DEFAULT NULL,
  `d6h2` varchar(1) DEFAULT NULL,
  `d6h3` varchar(1) DEFAULT NULL,
  `d6h4` varchar(1) DEFAULT NULL,
  `d6h5` varchar(1) DEFAULT NULL,
  `d6h6` varchar(1) DEFAULT NULL,
  `d6h7` varchar(1) DEFAULT NULL,
  `d6h8` varchar(1) DEFAULT NULL,
  `d6h9` varchar(1) DEFAULT NULL,
  `d6h10` varchar(1) DEFAULT NULL,
  `d6h11` varchar(1) DEFAULT NULL,
  `d6h12` varchar(1) DEFAULT NULL,
  `d6h13` varchar(1) DEFAULT NULL,
  `d6h14` varchar(1) DEFAULT NULL,
  `d6h15` varchar(1) DEFAULT NULL,
  `d6h16` varchar(1) DEFAULT NULL,
  `d6h17` varchar(1) DEFAULT NULL,
  `d6h18` varchar(1) DEFAULT NULL,
  `d6h19` varchar(1) DEFAULT NULL,
  `d6h20` varchar(1) DEFAULT NULL,
  `d6h21` varchar(1) DEFAULT NULL,
  `d6h22` varchar(1) DEFAULT NULL,
  `d6h23` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`ecode`, `d0h0`, `d0h1`, `d0h2`, `d0h3`, `d0h4`, `d0h5`, `d0h6`, `d0h7`, `d0h8`, `d0h9`, `d0h10`, `d0h11`, `d0h12`, `d0h13`, `d0h14`, `d0h15`, `d0h16`, `d0h17`, `d0h18`, `d0h19`, `d0h20`, `d0h21`, `d0h22`, `d0h23`, `d1h0`, `d1h1`, `d1h2`, `d1h3`, `d1h4`, `d1h5`, `d1h6`, `d1h7`, `d1h8`, `d1h9`, `d1h10`, `d1h11`, `d1h12`, `d1h13`, `d1h14`, `d1h15`, `d1h16`, `d1h17`, `d1h18`, `d1h19`, `d1h20`, `d1h21`, `d1h22`, `d1h23`, `d2h0`, `d2h1`, `d2h2`, `d2h3`, `d2h4`, `d2h5`, `d2h6`, `d2h7`, `d2h8`, `d2h9`, `d2h10`, `d2h11`, `d2h12`, `d2h13`, `d2h14`, `d2h15`, `d2h16`, `d2h17`, `d2h18`, `d2h19`, `d2h20`, `d2h21`, `d2h22`, `d2h23`, `d3h0`, `d3h1`, `d3h2`, `d3h3`, `d3h4`, `d3h5`, `d3h6`, `d3h7`, `d3h8`, `d3h9`, `d3h10`, `d3h11`, `d3h12`, `d3h13`, `d3h14`, `d3h15`, `d3h16`, `d3h17`, `d3h18`, `d3h19`, `d3h20`, `d3h21`, `d3h22`, `d3h23`, `d4h0`, `d4h1`, `d4h2`, `d4h3`, `d4h4`, `d4h5`, `d4h6`, `d4h7`, `d4h8`, `d4h9`, `d4h10`, `d4h11`, `d4h12`, `d4h13`, `d4h14`, `d4h15`, `d4h16`, `d4h17`, `d4h18`, `d4h19`, `d4h20`, `d4h21`, `d4h22`, `d4h23`, `d5h0`, `d5h1`, `d5h2`, `d5h3`, `d5h4`, `d5h5`, `d5h6`, `d5h7`, `d5h8`, `d5h9`, `d5h10`, `d5h11`, `d5h12`, `d5h13`, `d5h14`, `d5h15`, `d5h16`, `d5h17`, `d5h18`, `d5h19`, `d5h20`, `d5h21`, `d5h22`, `d5h23`, `d6h0`, `d6h1`, `d6h2`, `d6h3`, `d6h4`, `d6h5`, `d6h6`, `d6h7`, `d6h8`, `d6h9`, `d6h10`, `d6h11`, `d6h12`, `d6h13`, `d6h14`, `d6h15`, `d6h16`, `d6h17`, `d6h18`, `d6h19`, `d6h20`, `d6h21`, `d6h22`, `d6h23`) VALUES
('4d2309efc5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '3', '3', '3', '2'),
('efc5ab8167', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('ab81674d23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('fc5ab81674', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('09efc5ab81', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('309efc5ab8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('674d2309ef', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('1674d2309e', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('2309efc5ab', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `jobtitle` varchar(15) NOT NULL,
  `mcode` varchar(10) NOT NULL,
  `ecode` varchar(10) NOT NULL,
  `eid` varchar(5) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `minit` varchar(1) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `regpending` tinyint(1) NOT NULL,
  `mempending` tinyint(1) NOT NULL,
  `mid` varchar(5) NOT NULL,
  `t_rescue` tinyint(1) NOT NULL,
  `t_driver` tinyint(1) NOT NULL,
  `t_medic` tinyint(1) NOT NULL,
  `t_fighter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`jobtitle`, `mcode`, `ecode`, `eid`, `fname`, `minit`, `lname`, `email`, `uname`, `regpending`, `mempending`, `mid`, `t_rescue`, `t_driver`, `t_medic`, `t_fighter`) VALUES
('Firefighter', 'efc5ab8167', '4d2309efc5', 'ab816', 'Basil', '', 'Varghese', 'bas@bas.com', 'basil123', 0, 0, '4d230', 0, 1, 1, 0),
('Firefighter', 'efc5ab8167', 'efc5ab8167', '4d230', 'Basils', '', 'Vargheses', 'bas@bas.com', 'basil1234', 0, 0, '4d230', 0, 0, 0, 0),
('Firefighter', 'b81674d230', 'ab81674d23', '09efc', 'Employee', '', 'Sebastian', 'seb@seb.com', 'seban123', 0, 0, '9efc5', 0, 0, 0, 0),
('Firefighter', 'b81674d230', 'fc5ab81674', 'd2309', 'Employee', '', 'Sebastiansd', 'seb2@seb.com', 'seban1234', 0, 3, '9efc5', 0, 0, 0, 0),
('Firefighter', 'efc5ab8167', '09efc5ab81', '674d2', 'Emp', '', 'test', 'aaa@aaa.com', 'testcase1', 0, 1, '4d230', 0, 0, 0, 0),
('Firefighter', 'efc5ab8167', '309efc5ab8', '1674d', 'Emp', '', 'test', 'aaa1@aaa.com', 'testcase2', 0, 1, '4d230', 0, 0, 0, 0),
('Firefighter', 'efc5ab8167', '674d2309ef', 'c5ab8', 'Emp', '', 'test', 'aaa3@aaa.com', 'testcase3', 0, 1, '4d230', 0, 0, 0, 0),
('Firefighter', 'efc5ab8167', '1674d2309e', 'fc5ab', 'Emp', '', 'test', 'aaa4@aaa.com', 'testcase4', 0, 1, '4d230', 0, 0, 0, 0),
('Firefighter', 'efc5ab8167', '2309efc5ab', '81674', 'Emp', '', 'test', 'aaa5@aaa.com', 'testcase5', 0, 1, '4d230', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `epassword`
--

CREATE TABLE IF NOT EXISTS `epassword` (
  `empcode` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epassword`
--

INSERT INTO `epassword` (`empcode`, `pass`) VALUES
('4d2309efc5', 'basil123'),
('efc5ab8167', 'basil1234'),
('ab81674d23', '5ab816'),
('fc5ab81674', 'seban1234'),
('09efc5ab81', '309efc'),
('309efc5ab8', '2309ef'),
('674d2309ef', '1674d2'),
('1674d2309e', '81674d'),
('2309efc5ab', 'd2309e');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `mcode` varchar(10) NOT NULL,
  `title` varchar(15) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `mid` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `minit` varchar(1) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `mem_alert` int(2) NOT NULL,
  `res_alert` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mcode`, `title`, `uname`, `mid`, `email`, `fname`, `minit`, `lname`, `scode`, `mem_alert`, `res_alert`) VALUES
('efc5ab8167', 'Firefighter', 'albinin002', '4d230', 'albinin000@gmail.com', 'Albin', '', 'George', 'd2309efc5a', 6, 2),
('b81674d230', 'Firefighter', 'manman1', '9efc5', 'man@man.com', 'Manager', '', 'Mathews', 'd2309efc5a', 0, 0),
('d2309efc5a', 'Firefighter', 'sam1234', 'b8167', 'sadm@gmail.com', 'Managers', '', 'sam', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpassword`
--

CREATE TABLE IF NOT EXISTS `mpassword` (
  `mcode` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpassword`
--

INSERT INTO `mpassword` (`mcode`, `pass`) VALUES
('efc5ab8167', 'albing'),
('b81674d230', 'manman1'),
('d2309efc5a', 'sam1234');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `sid` varchar(5) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `owner` varchar(10) NOT NULL,
  `managers` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sid`, `scode`, `sname`, `owner`, `managers`) VALUES
('15243', 'd2309efc5a', 'StationX', 'efc5ab8167', 'b81674d230,');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
