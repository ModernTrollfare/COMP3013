-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2015 at 10:05 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `comp3013`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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

CREATE TABLE `assessments` (
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
(0, 0, 1, 70, 'Great!'),
(2, 0, 4, 30, 'nothing'),
(3, 1, 2, 55, ''),
(5, 1, 0, 89, 'welllll'),
(6, 3, 0, 62, 'HELLO');

-- --------------------------------------------------------

--
-- Table structure for table `assignations`
--

CREATE TABLE `assignations` (
  `group_to_be_assessed` int(11) NOT NULL,
  `group_assessing` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignations`
--

INSERT INTO `assignations` (`group_to_be_assessed`, `group_assessing`) VALUES
(1, 0),
(4, 0),
(0, 1),
(2, 1),
(3, 1),
(1, 2),
(3, 2),
(4, 2),
(2, 3),
(4, 3),
(0, 4),
(1, 4),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
`thread_id` int(6) unsigned NOT NULL,
  `parentThread` int(6) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `message` text,
  `posttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastreplytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_id` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`thread_id`, `parentThread`, `title`, `message`, `posttime`, `lastreplytime`, `student_id`) VALUES
(0, 0, 'GROUP FIRST THREAD!!', 'HELLO WORLD', '2015-03-19 14:25:36', '2015-03-19 14:25:36', 5),
(10, 0, 'HELLOWORLD', 'Hi, my groupmates!', '2015-03-19 21:49:09', '2015-03-19 21:49:54', 2),
(11, 0, 'MORE', 'More htreads', '2015-03-19 21:49:25', '2015-03-19 21:49:25', 2),
(12, 10, NULL, 'reply!', '2015-03-19 21:49:54', '2015-03-19 21:49:54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
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
(2, 6, 7, 8),
(3, 9, 10, 11),
(4, 12, 13, NULL),
(5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(9) NOT NULL,
  `text` text COLLATE ascii_bin NOT NULL,
  `xml_file` varchar(400) COLLATE ascii_bin DEFAULT NULL,
  `group_id` int(9) NOT NULL,
  `last_modified` date NOT NULL,
  `xml_title` text COLLATE ascii_bin,
  `xml_content` longtext COLLATE ascii_bin
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `text`, `xml_file`, `group_id`, `last_modified`, `xml_title`, `xml_content`) VALUES
(0, '', 'uploads/da4b9237bacccdf19c0760cab7aec4a8359010b0test.xml', 0, '2015-03-19', 'TITLE of this', 'this ->CONTENTS'),
(1, 'this is a test report for group 1', '', 1, '2015-03-13', NULL, NULL),
(2, 'this is a test report for group 2', 'uploads/c1dfd96eea8cc2b62785275bca38ac261256e278meta.xml', 2, '2015-03-13', NULL, NULL),
(3, '', 'uploads/bd307a3ec329e10a2cff8fb87480823da114f8f4test.xml', 4, '2015-03-19', 'TEST TITLE blabla', 'TEST CONTENTS');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(9) NOT NULL,
  `name` varchar(30) COLLATE ascii_bin NOT NULL,
  `pwd` varchar(40) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `pwd`) VALUES
(0, 'Lorriane Spears', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(1, 'Sheena Danks', '4bcf5419e091739485c205cde0ecbf9e6b2f87b4'),
(2, 'Megan Stutz', '4bcf5419e091739485c205cde0ecbf9e6b2f87b4'),
(3, 'Flavia Logsdon', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(4, 'Jenniffer Giffin', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(5, 'Ethelyn Peterman', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(6, 'Gilberto Calvery', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(7, 'Omega Heart', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(8, 'Susanna Ruehl', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(9, 'Judith Delnero', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(10, 'Francoise Strebel', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(11, 'Carman Harton', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(12, 'Kermit Gresham', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(13, 'Kieth Ewing', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(14, 'Kaye Toms', '61c239e5c7203949a78ff72615256c8db5dc04c4'),
(15, 'John Doe', 'a94ed22951173e86d7328393e6e44012ce0227b1'),
(16, 'Peter Pan', 'b317c69e435b0d97ccde9a81c79f33e0f9bd4641'),
(17, 'James Bond', 'c06972e6e3bed46b240d57aef0c24381c1788aa4'),
(18, 'John Newton', 'ff8da7bb386901cf3c9d0e55b42289673590f487'),
(19, 'HOlmes Sherlock', '74f4d0aedf10d16bc7aef7aecb54a27069c960f8'),
(20, 'Albert Men', 'e37c98b3fd38228f1e3e212e9a4318b5aa0f3d4c');

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
MODIFY `thread_id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
ADD CONSTRAINT `assessments_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`);

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

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);
