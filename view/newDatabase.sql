-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2015 at 02:33 PM
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
  `pwd` varchar(30) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `pwd`) VALUES
(0, 'Test1', '123'),
(1, 'Test2', '123'),
(2, 'Test3', '123'),
(3, 'Test4', '123'),
(4, 'Test5', '123');

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
(0, 0, 1, 10, ''),
(1, 1, 0, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `assignations`
--

CREATE TABLE `assignations` (
  `group_to_be_assessed` int(11) NOT NULL,
  `group_assessing` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(9) NOT NULL,
  `text` text COLLATE ascii_bin NOT NULL,
  `xml_file` longblob,
  `over_grade` double DEFAULT NULL,
  `group_id` int(9) NOT NULL,
  `last_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `text`, `xml_file`, `over_grade`, `group_id`, `last_modified`) VALUES
(0, 'this is a test report for group 1', NULL, NULL, 0, '2015-02-06'),
(1, 'this is a test report for group 2', NULL, NULL, 1, '2015-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(9) NOT NULL,
  `name` varchar(30) COLLATE ascii_bin NOT NULL,
  `pwd` varchar(30) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `pwd`) VALUES
(0, 'student1', '123'),
(1, 'student2', '123'),
(2, 'student3', '123'),
(3, 'student4', '123'),
(4, 'student5', '123'),
(5, 'student6', '123'),
(6, 'Test9', '57f7b03cc3');

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
ADD CONSTRAINT `assignations_ibfk_2` FOREIGN KEY (`group_assessing`) REFERENCES `groups` (`group_id`),
ADD CONSTRAINT `assignations_ibfk_1` FOREIGN KEY (`group_to_be_assessed`) REFERENCES `groups` (`group_id`);

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
