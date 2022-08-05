-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2022 at 07:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `cal_data`
--

CREATE TABLE `cal_data` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `t1` varchar(20) NOT NULL,
  `t2` varchar(20) NOT NULL,
  `t3` varchar(20) NOT NULL,
  `v1` varchar(20) NOT NULL,
  `v2` varchar(20) NOT NULL,
  `hm` varchar(20) NOT NULL,
  `mfr` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cal_exp`
--

CREATE TABLE `cal_exp` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `i` varchar(20) NOT NULL,
  `v` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Sno` int(10) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `h1` varchar(10) NOT NULL,
  `h2` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `vol` varchar(10) NOT NULL,
  `result` varchar(20) NOT NULL,
  `re` varchar(20) NOT NULL,
  `fric` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ebu_data`
--

CREATE TABLE `ebu_data` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `press` varchar(20) NOT NULL,
  `stemp` varchar(20) NOT NULL,
  `val300` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `rflag` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ebu_exp`
--

CREATE TABLE `ebu_exp` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experiment`
--

CREATE TABLE `experiment` (
  `Srno` int(10) NOT NULL,
  `eid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plen` int(10) NOT NULL,
  `pdia` int(10) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` tinyint(4) NOT NULL,
  `feedback_id` tinyint(4) NOT NULL,
  `question_1` varchar(150) NOT NULL,
  `question_2` varchar(150) NOT NULL,
  `question_3` varchar(150) NOT NULL,
  `question_4` varchar(150) NOT NULL,
  `question_5` varchar(150) NOT NULL,
  `question_6` varchar(150) NOT NULL,
  `question_7` varchar(150) NOT NULL,
  `question_8` varchar(150) NOT NULL,
  `question_9` varchar(150) NOT NULL,
  `question_10` varchar(150) NOT NULL,
  `question_11` varchar(150) NOT NULL,
  `question_12` varchar(150) NOT NULL,
  `question_13` varchar(150) NOT NULL,
  `question_14` varchar(150) NOT NULL,
  `question_15` varchar(150) NOT NULL,
  `question_16` varchar(150) NOT NULL,
  `question_17` varchar(150) NOT NULL,
  `question_18` varchar(150) NOT NULL,
  `question_19` varchar(150) NOT NULL,
  `question_20` varchar(150) NOT NULL,
  `question_21` varchar(150) NOT NULL,
  `question_22` varchar(150) NOT NULL,
  `question_23` varchar(150) NOT NULL,
  `question_24` varchar(150) NOT NULL,
  `question_25` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fm_exp`
--

CREATE TABLE `fm_exp` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fluid` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htl_data`
--

CREATE TABLE `htl_data` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `v1` varchar(20) NOT NULL,
  `v2` varchar(20) NOT NULL,
  `v3` varchar(20) NOT NULL,
  `v4` varchar(20) NOT NULL,
  `v5` varchar(20) NOT NULL,
  `v6` varchar(20) NOT NULL,
  `v7` varchar(20) NOT NULL,
  `v8` varchar(20) NOT NULL,
  `v9` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htl_datanew`
--

CREATE TABLE `htl_datanew` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `hft` varchar(20) NOT NULL,
  `cft` varchar(20) NOT NULL,
  `percent` varchar(20) NOT NULL,
  `thout` varchar(20) NOT NULL,
  `tcout` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htl_exp`
--

CREATE TABLE `htl_exp` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sys` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htl_turb`
--

CREATE TABLE `htl_turb` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `hft` varchar(20) NOT NULL,
  `cft` varchar(20) NOT NULL,
  `percent` varchar(20) NOT NULL,
  `thout` varchar(20) NOT NULL,
  `tcout` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `id` tinyint(4) NOT NULL,
  `experiment_id` int(10) NOT NULL,
  `question_1` varchar(80) NOT NULL,
  `option_1` varchar(40) NOT NULL,
  `option_2` varchar(40) NOT NULL,
  `option_3` varchar(40) NOT NULL,
  `option_4` varchar(40) NOT NULL,
  `answer` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vle_calib`
--

CREATE TABLE `vle_calib` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `v1` varchar(20) NOT NULL,
  `v2` varchar(20) NOT NULL,
  `ri` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vle_data`
--

CREATE TABLE `vle_data` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `v1` varchar(10) DEFAULT NULL,
  `v2` varchar(10) DEFAULT NULL,
  `hl` varchar(10) DEFAULT NULL,
  `rix` varchar(10) DEFAULT NULL,
  `riy` varchar(10) DEFAULT NULL,
  `t` varchar(10) DEFAULT NULL,
  `x` varchar(50) DEFAULT NULL,
  `y` varchar(50) DEFAULT NULL,
  `g1log` varchar(50) DEFAULT NULL,
  `g2log` varchar(50) DEFAULT NULL,
  `ge` varchar(50) DEFAULT NULL,
  `gy` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vle_exp`
--

CREATE TABLE `vle_exp` (
  `Srno` int(10) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sys` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cal_data`
--
ALTER TABLE `cal_data`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `cal_exp`
--
ALTER TABLE `cal_exp`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `ebu_data`
--
ALTER TABLE `ebu_data`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `ebu_exp`
--
ALTER TABLE `ebu_exp`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `experiment`
--
ALTER TABLE `experiment`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `fm_exp`
--
ALTER TABLE `fm_exp`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `htl_data`
--
ALTER TABLE `htl_data`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `htl_datanew`
--
ALTER TABLE `htl_datanew`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `htl_exp`
--
ALTER TABLE `htl_exp`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `htl_turb`
--
ALTER TABLE `htl_turb`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `vle_calib`
--
ALTER TABLE `vle_calib`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `vle_data`
--
ALTER TABLE `vle_data`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `vle_exp`
--
ALTER TABLE `vle_exp`
  ADD PRIMARY KEY (`Srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cal_data`
--
ALTER TABLE `cal_data`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cal_exp`
--
ALTER TABLE `cal_exp`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `Sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebu_data`
--
ALTER TABLE `ebu_data`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebu_exp`
--
ALTER TABLE `ebu_exp`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiment`
--
ALTER TABLE `experiment`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_exp`
--
ALTER TABLE `fm_exp`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `htl_data`
--
ALTER TABLE `htl_data`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `htl_datanew`
--
ALTER TABLE `htl_datanew`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `htl_exp`
--
ALTER TABLE `htl_exp`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `htl_turb`
--
ALTER TABLE `htl_turb`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vle_calib`
--
ALTER TABLE `vle_calib`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vle_data`
--
ALTER TABLE `vle_data`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vle_exp`
--
ALTER TABLE `vle_exp`
  MODIFY `Srno` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
