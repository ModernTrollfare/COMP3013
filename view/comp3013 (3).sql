-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2015 at 04:02 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comp3013`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(9) NOT NULL,
  `name` varchar(30) COLLATE ascii_bin NOT NULL,
  `pwd` varchar(50) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `pwd`) VALUES
(0, 'Test1', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(1, 'Test2', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(2, 'Test3', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(3, 'Test4', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(4, 'Test5', '61c239e5c7203949a78ff72615256c8db5dc04c4');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE IF NOT EXISTS `assessments` (
  `assessment_id` int(9) NOT NULL,
  `report_id` int(9) NOT NULL,
  `group_id` int(9) NOT NULL,
  `grade` double DEFAULT NULL,
  `comments` text COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `report_id`, `group_id`, `grade`, `comments`) VALUES
(0, 0, 1, 10, ''),
(1, 1, 0, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `assignations`
--

CREATE TABLE IF NOT EXISTS `assignations` (
  `group_to_be_assessed` int(11) NOT NULL,
  `group_assessing` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignations`
--

INSERT INTO `assignations` (`group_to_be_assessed`, `group_assessing`) VALUES
(1, 0),
(0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
`thread_id` int(6) unsigned NOT NULL,
  `parentThread` int(6) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `message` text,
  `posttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastreplytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_id` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`thread_id`, `parentThread`, `title`, `message`, `posttime`, `lastreplytime`, `student_id`) VALUES
(1, 0, 'test', '123', '2015-03-15 00:00:00', '2015-03-19 14:15:33', 1),
(4, 1, NULL, 'test', '2015-03-15 14:58:57', '2015-03-15 14:58:57', 1),
(5, 1, NULL, 'test agan', '2015-03-15 15:05:51', '2015-03-15 15:05:51', 1),
(6, 0, 'test2', 'test ar', '2015-03-15 15:08:13', '2015-03-19 14:22:51', 1),
(7, 1, NULL, 'stupid student2', '2015-03-19 14:15:33', '2015-03-19 14:15:33', 2),
(8, 6, NULL, 'test lo', '2015-03-19 14:22:51', '2015-03-19 14:22:51', 2),
(9, 0, 'GROUP FIRST THREAD!!', 'HELLO WORLD', '2015-03-19 14:25:36', '2015-03-19 14:25:36', 5);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(9) NOT NULL,
  `student_1` int(9) DEFAULT NULL,
  `student_2` int(9) DEFAULT NULL,
  `student_3` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `student_1`, `student_2`, `student_3`) VALUES
(0, 0, 1, 2),
(1, 3, 4, 5),
(2, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(9) NOT NULL,
  `text` text COLLATE ascii_bin NOT NULL,
  `group_id` int(9) NOT NULL,
  `last_modified` date NOT NULL,
  `xml_title` text COLLATE ascii_bin,
  `xml_content` longtext COLLATE ascii_bin,
  `xml_file` varchar(400) COLLATE ascii_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `text`, `group_id`, `last_modified`, `xml_title`, `xml_content`, `xml_file`) VALUES
(0, '', 0, '2015-03-19', '123', '456', 'uploads/356a192b7913b04c54574d18c28d46e6395428abtest.xml'),
(1, 'this is a test report for group 2', 1, '2015-03-13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(9) NOT NULL,
  `name` varchar(30) COLLATE ascii_bin NOT NULL,
  `pwd` varchar(40) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `pwd`) VALUES
(0, 'student1', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(1, 'student2', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(2, 'student3', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(3, 'student4', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(4, 'student5', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(5, 'student6', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(6, 'Test9', '61c239e5c7203949a78ff72615256c8db5dc04c4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
 ADD PRIMARY KEY (`assessment_id`), ADD KEY `group_id` (`group_id`), ADD KEY `report_id` (`report_id`);

--
-- Indexes for table `assignations`
--
ALTER TABLE `assignations`
 ADD PRIMARY KEY (`group_to_be_assessed`,`group_assessing`), ADD KEY `group_to_be_assessed` (`group_to_be_assessed`,`group_assessing`), ADD KEY `group_assessing` (`group_assessing`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
 ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`group_id`), ADD KEY `student_1` (`student_1`), ADD KEY `student_2` (`student_2`), ADD KEY `student_3` (`student_3`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`report_id`), ADD UNIQUE KEY `group_id` (`group_id`), ADD KEY `group_id_2` (`group_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
MODIFY `thread_id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`),
ADD CONSTRAINT `assessments_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `reports` (`group_id`);

--
-- Constraints for table `assignations`
--
ALTER TABLE `assignations`
ADD CONSTRAINT `assignations_ibfk_1` FOREIGN KEY (`group_to_be_assessed`) REFERENCES `groups` (`group_id`),
ADD CONSTRAINT `assignations_ibfk_2` FOREIGN KEY (`group_assessing`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`student_1`) REFERENCES `students` (`student_id`),
ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`student_2`) REFERENCES `students` (`student_id`),
ADD CONSTRAINT `groups_ibfk_3` FOREIGN KEY (`student_3`) REFERENCES `students` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
