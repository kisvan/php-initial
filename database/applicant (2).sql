-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 02:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicant`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `app_numb` int(11) NOT NULL,
  `applicant` int(11) NOT NULL,
  `job` int(11) NOT NULL,
  `education` int(11) NOT NULL,
  `gpa` int(11) NOT NULL,
  `total_exp` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'On progress',
  `app_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_numb`, `applicant`, `job`, `education`, `gpa`, `total_exp`, `status`, `app_date`) VALUES
(14, 22, 12, 3, 4, 4, 'On progress', '2021-07-08 12:48:57'),
(15, 22, 13, 2, 4, 4, 'On progress', '2021-07-11 06:59:15'),
(16, 39, 13, 1, 3, 4, 'On progress', '2021-07-11 06:59:15'),
(17, 43, 13, 3, 4, 3, 'On progress', '2021-07-12 10:00:01'),
(18, 45, 13, 3, 3, 3, 'On progress', '2021-07-12 10:00:01'),
(19, 57, 13, 3, 4, 4, 'On progress', '2021-07-12 18:41:43'),
(20, 61, 13, 3, 3, 8, 'On progress', '2021-07-12 18:47:08'),
(21, 60, 13, 3, 4, 1, 'On progress', '2021-07-12 18:51:19'),
(22, 60, 14, 3, 4, 1, 'On progress', '2021-07-12 18:52:00'),
(23, 56, 13, 2, 3, 1, 'On progress', '2021-07-12 19:02:37'),
(24, 61, 15, 2, 4, 8, 'On progress', '2021-07-22 19:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Procurement And Logistics'),
(2, 'Statistics And Mathematics'),
(3, 'IT and Telecoms'),
(4, 'Engineering and Constructions'),
(5, 'Education and Training'),
(6, 'Finance and Accounting'),
(7, 'Healthcare and Pharmaceutical'),
(8, 'Farming and Agribusiness'),
(9, 'HR and Administrtion'),
(10, 'International Relation');

-- --------------------------------------------------------

--
-- Table structure for table `education_level`
--

CREATE TABLE `education_level` (
  `elevel_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `elevel` int(11) NOT NULL,
  `pcategory` int(11) NOT NULL,
  `gpa` int(11) NOT NULL,
  `sdate` year(4) NOT NULL,
  `edate` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_level`
--

INSERT INTO `education_level` (`elevel_id`, `userID`, `elevel`, `pcategory`, `gpa`, `sdate`, `edate`) VALUES
(15, 22, 3, 6, 4, 2008, 2011),
(16, 22, 2, 3, 4, 2012, 2014),
(17, 38, 1, 3, 5, 2001, 2005),
(18, 39, 2, 3, 4, 2019, 2021),
(19, 39, 1, 3, 3, 2020, 2021),
(20, 39, 3, 3, 3, 2014, 2017),
(21, 41, 3, 1, 4, 2015, 2018),
(22, 41, 4, 1, 5, 2012, 2014),
(23, 41, 5, 1, 4, 2009, 2011),
(24, 43, 3, 3, 4, 2014, 2018),
(25, 45, 3, 3, 2, 1990, 2002),
(26, 45, 3, 3, 3, 1990, 1997),
(27, 46, 4, 3, 4, 2011, 2014),
(28, 47, 3, 3, 4, 2007, 2011),
(29, 48, 3, 3, 3, 2016, 2019),
(30, 49, 2, 3, 4, 2015, 2017),
(31, 50, 4, 3, 4, 2009, 2012),
(32, 51, 2, 3, 5, 2007, 2011),
(33, 52, 4, 3, 3, 2008, 2011),
(34, 53, 3, 3, 4, 2006, 2009),
(35, 54, 2, 3, 4, 2008, 2010),
(36, 55, 2, 3, 5, 2006, 2008),
(37, 56, 4, 3, 3, 2012, 2014),
(38, 57, 3, 3, 4, 2012, 2015),
(39, 60, 4, 3, 4, 2014, 2016),
(40, 61, 2, 3, 4, 2008, 2011),
(41, 61, 3, 3, 3, 2004, 2007),
(42, 60, 3, 3, 4, 2018, 2021),
(43, 56, 3, 3, 3, 2015, 2019),
(44, 56, 2, 3, 5, 2019, 2021),
(45, 61, 3, 3, 4, 2018, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `postID` int(11) NOT NULL,
  `jobsize` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `jtitle` varchar(20) NOT NULL,
  `yexperience` varchar(8) NOT NULL,
  `gpa` int(11) NOT NULL,
  `pcategory` varchar(20) NOT NULL,
  `jdescription` varchar(255) NOT NULL,
  `elevel` int(11) NOT NULL,
  `employer` varchar(100) NOT NULL,
  `poster` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`postID`, `jobsize`, `sdate`, `edate`, `jtitle`, `yexperience`, `gpa`, `pcategory`, `jdescription`, `elevel`, `employer`, `poster`) VALUES
(12, 2, '2021-07-01', '2021-06-30', 'Accountant', '2', 3, '6', ' we need you', 3, 'Mzumbe university', 'kisvan@gmail.com'),
(13, 10, '2021-07-08', '2021-09-08', 'IT Manager', '1', 3, '3', 'we need you', 3, 'udsm', 'kisvan@gmail.com'),
(14, 5, '2021-07-08', '2021-07-30', 'Database Administrat', '3', 3, '3', 'get hired', 3, 'Tanzania Aircraft', 'kisvan@gmail.com'),
(15, 2, '2021-07-09', '2021-07-24', 'data analyst', '6', 2, '2', 'pre requisite ', 2, 'Tanzania Data lab', 'kisvan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_name` varchar(50) NOT NULL,
  `unit` float NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_name`, `unit`, `level_id`) VALUES
('PHD', 5, 1),
('Master Degree', 4, 2),
('Undergraduate Degree', 3, 3),
('Diploma', 2, 4),
('Certificate', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `image`, `user`) VALUES
(10, '38EIOD8240.JPG', 38),
(11, '1IMG_0608.JPG', 1),
(12, '39IMG_0601.JPG', 39),
(13, '40EIOD8240.JPG', 40),
(14, '41Screenshot (2).png', 41);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fName` varchar(60) NOT NULL,
  `lName` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `objectives` text NOT NULL,
  `elevel` varchar(60) NOT NULL,
  `pcategory` varchar(60) NOT NULL,
  `start_year` int(4) NOT NULL,
  `end_year` int(4) NOT NULL,
  `gpa` varchar(8) NOT NULL,
  `jcategory` varchar(60) NOT NULL,
  `yexperiance` varchar(60) NOT NULL,
  `icomputer` varchar(8) NOT NULL,
  `mWord` varchar(8) NOT NULL,
  `mExcel` varchar(8) NOT NULL,
  `mPoint` varchar(8) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `organization` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `email`, `contact`, `gender`, `password`, `objectives`, `elevel`, `pcategory`, `start_year`, `end_year`, `gpa`, `jcategory`, `yexperiance`, `icomputer`, `mWord`, `mExcel`, `mPoint`, `user_type`, `organization`) VALUES
(55, 'juma', 'ally', 'ally@gmail.com', '071223243', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '7', '', '', '', '', 'USER', 'Health services'),
(47, 'john ', 'damian', 'damian@gmail.com', '0745443433', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '06', '2', '1', '2', '2', 'USER', 'Social Sevices'),
(22, 'fredy', 'brighton', 'fredrickbrighton@gmail.com', '0987777555', 'M', '25d55ad283aa400af464c76d713c07ad', '\r\n', '', '', 0, 0, '', 'Finance And Accounting', '4', '1', '1', '1', '1', 'USER', 'udom'),
(61, 'julietha', 'jackson', 'jackson@gmail.com', '07576766667', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '8', '3', '2', '2', '1', 'USER', 'Social Sevices'),
(50, 'emmanuel', 'james', 'james@gmail.com', '0654373821', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '5', '2', '1', '2', '1', 'USER', 'Health services'),
(39, 'joseph', 'kulwa', 'joseph@gmail.com', '0754136587', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '4', '2', '2', '2', '1', 'USER', 'CRDB'),
(53, 'julieth', 'julius', 'julius@gmail.com', '065434232', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '3', '2', '1', '2', '2', 'USER', 'Social Sevices'),
(25, 'kareem', 'Gonga', 'kareem@gmail.com', '0987777', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '4', '', '', '', '', 'USER', 'udom'),
(1, 'kisvan', 'kakun', 'kisvan@gmail.com', '0767345634543', 'M', '25d55ad283aa400af464c76d713c07ad', '  ', '', '', 0, 0, '', '', '', '', '', '', '', 'POSTER', ''),
(56, 'anne', 'marie', 'marie@gmail.com', '07576766667', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '1', '2', '1', '2', '2', 'USER', 'Health services'),
(60, 'marietha', 'samson', 'marietha@gmail.com', '0675754034', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '1', '', '', '', '', 'USER', 'Social Sevices'),
(48, 'samson', 'masugu', 'masungu@gmail.com', '07546457623', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '2', '', '', '', '', 'USER', 'Social Sevices'),
(51, 'james', 'moshi', 'moshi@gmail.com', '07576766667', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '4', '2', '1', '2', '1', 'USER', 'Social Sevices'),
(46, 'elizabeth', 'mwakasege', 'mwakasege@gmail.com', '0765554545', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '03', '2', '1', '2', '2', 'USER', 'Health services'),
(54, 'johnson', 'mwakipesile', 'mwakipesile@gmail.com', '07576766667', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '7', '', '', '', '', 'USER', 'Health services'),
(43, 'angel', 'mzava', 'mzava@gmail.com', '06757540347676', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '3', '2', '1', '1', '1', 'USER', 'dlab'),
(41, 'fatma', 'mzenzi', 'mzenzifatma@gmail.com', '0675754034', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'Procurement And Logistics', '6', '1', '2', '1', '3', 'USER', 'TIA'),
(40, 'patrick', 'nachenga', 'patrick@gmail.com', '07444545566', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', '', '0', '', '', '', '', 'USER', ''),
(45, 'RAMADHAN', 'RAMADHAN', 'ramadhanirajab168@gmail.com', '0756903456', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '3', '2', '3', '2', '1', 'USER', 'Social Sevices'),
(38, 'victor', 'henerik', 'victor@gmail.com', '0755121354', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '3', '1', '1', '1', '1', 'USER', 'udom'),
(57, 'joseph', 'willbard', 'wilbard@gmail.com', '07576766667', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '4', '1', '2', '2', '1', 'USER', 'Health services'),
(52, 'janeth', 'william', 'william@gmail.com', '0675754034', 'F', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '4', '2', '1', '2', '2', 'USER', 'Health services'),
(49, 'simon', 'winfred', 'winfred@gmail.com', '0675435215', 'M', '25d55ad283aa400af464c76d713c07ad', '', '', '', 0, 0, '', 'IT And Telecoms', '9', '3', '1', '2', '2', 'USER', 'Social Sevices');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_numb`),
  ADD KEY `jobApplicant` (`applicant`),
  ADD KEY `applicantJob` (`job`),
  ADD KEY `applicaionElevel` (`education`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `education_level`
--
ALTER TABLE `education_level`
  ADD PRIMARY KEY (`elevel_id`),
  ADD KEY `userEleve` (`userID`),
  ADD KEY `categorEdu` (`pcategory`),
  ADD KEY `levelEdu` (`elevel`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `sdds` (`elevel`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `unit` (`unit`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `sn` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_numb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education_level`
--
ALTER TABLE `education_level`
  MODIFY `elevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicaionElevel` FOREIGN KEY (`education`) REFERENCES `level` (`level_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `applicantJob` FOREIGN KEY (`job`) REFERENCES `jobpost` (`postID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jobApplicant` FOREIGN KEY (`applicant`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `education_level`
--
ALTER TABLE `education_level`
  ADD CONSTRAINT `categorEdu` FOREIGN KEY (`pcategory`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `levelEdu` FOREIGN KEY (`elevel`) REFERENCES `level` (`level_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `userEleve` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD CONSTRAINT `sdds` FOREIGN KEY (`elevel`) REFERENCES `level` (`level_id`) ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `userPro` FOREIGN KEY (`user`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
