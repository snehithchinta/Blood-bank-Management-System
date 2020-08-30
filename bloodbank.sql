-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 06:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donationid` int(5) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bloodgroup` varchar(3) DEFAULT NULL,
  `quantitydonated` varchar(5) DEFAULT NULL,
  `hospitaldonated` varchar(60) DEFAULT NULL,
  `dateofdonation` date DEFAULT NULL,
  `availability` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donationid`, `email`, `bloodgroup`, `quantitydonated`, `hospitaldonated`, `dateofdonation`, `availability`) VALUES
(1001, 'jagruthi@gmail.com', 'O+', '200', 'Yashoda Hospitals', '2019-10-15', '200'),
(1002, 'shravya16097@gmail,com', 'O+', '150', 'Continental Hospital', '2019-09-16', '0'),
(1003, 'nikki@gmail.com', 'B+', '200', 'Bombay Hospital', '2019-10-29', '200'),
(1004, 'kavyareddi@gmail.com', 'B-', '125', 'Remedy Medical Hospital', '2019-11-01', '125'),
(1005, 'amankhan@yahoo.co.in', 'A-', '125', 'Omni Muliti Speciality Hospital', '2019-10-13', 'No'),
(1006, 'arucse@gmail.com', 'B+', '100', 'Life Care Hospital', '2019-09-04', '0'),
(1007, 'siri@hotmail.com', 'AB+', '150', 'Gandhi Medical Hospital and College', '2019-08-30', '0'),
(1008, 'harshitha@gmail.com', 'A+', '140', 'Yashoda Hospitals', '2019-11-05', '140'),
(1009, 'kiransai@yahoo.com', 'B-', '200', 'Continental Hospital', '2019-10-28', '200'),
(1010, 'me180001032@iiti.ac.in', 'AB-', '180', 'Sunshine Medical Hospital', '2019-07-28', '0'),
(1011, 'sarayurocks@gmail.com', 'B+', '170', 'Katuri General Hospital', '2019-10-25', '120'),
(1012, 'rahul123@gmail.com', 'O-', '175', 'Apollo Medical Hospital', '2019-10-15', '175'),
(1013, 'sathvik@yahoo.com', 'O-', '160', 'Bombay Hospital', '2019-10-31', '160'),
(1014, 'me180001032@iiti.ac.in', 'AB-', '180', 'Sunshine Medical Hospital', '2019-11-01', '180'),
(1015, 'amankhan@yahoo.co.in', 'A-', '140', 'Omni Muliti Speciality Hospital', '2018-10-13', '0'),
(1016, 'me180001032@iiti.ac.in', 'AB-', '150', 'Life Care Hospital', '2018-12-15', '0'),
(1017, 'jsunaina@reddiffmail.com', 'B+', '152', 'Remedy Medical Hospital', '2018-07-30', '0'),
(1018, 'riya@gmail.com', 'AB+', '200', 'Sunshine Medical Hospital', '2019-11-01', '150'),
(1019, 'siri@hotmail.com', 'AB+', '100', 'Katuri General Hospital', '2019-11-01', '100');

--
-- Triggers `donations`
--
DELIMITER $$
CREATE TRIGGER `avail` BEFORE INSERT ON `donations` FOR EACH ROW begin
set new.availability=new.quantitydonated;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalid` int(11) NOT NULL,
  `hospitalname` varchar(50) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `streetno` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT 'Telangana',
  `inchargeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalid`, `hospitalname`, `phoneno`, `streetno`, `city`, `state`, `inchargeid`) VALUES
(3001, 'Katuri General Hospital', '9981959988', '7G', 'Warangal', 'Telangana', 4001),
(3002, 'Apollo Medical Hospital', '9494947777', '12', 'Hyderaabad', 'Telangana', 4002),
(3003, 'Gandhi Medical Hospital and College', '7777474747', '3', 'Nalgonda', 'Telangana', 4003),
(3004, 'Bombay Hospital', '8585850000', '6A', 'Khammam', 'Telangana', 4004),
(3005, 'Life Care Hospital', '8999989999', '11', 'Sangareddy', 'Telangana', 4005),
(3006, 'Remedy Medical Hospital', '7654765400', 'A4', 'Kukatpally', 'Telangana', 4006),
(3007, 'Omni Multi Speciality Hospital', '9543295432', '06', 'Banjara Hills', 'Telangana', 4007),
(3008, 'Yashoda Hospitals', '9897989686', '07', 'Somajiguda', 'Telangana', 4008),
(3009, 'Continental Hospital', '9897987600', 'A2', 'Hanamakonda', 'Telangana', 4009),
(3010, 'Sunshine Medical Hospital', '7657658888', '3B', 'Adilabad', 'Telangana', 4010);

-- --------------------------------------------------------

--
-- Table structure for table `incharge`
--

CREATE TABLE `incharge` (
  `inchargeid` int(11) NOT NULL,
  `inchargename` varchar(50) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incharge`
--

INSERT INTO `incharge` (`inchargeid`, `inchargename`, `phoneno`, `username`, `password`) VALUES
(4001, 'Arun', '9564845584', 'arun12', 'jaitley'),
(4002, 'Ram', '9564879584', 'sriram', 'ramayan'),
(4003, 'Bharat', '9583879584', 'bharat90', 'india234'),
(4004, 'Kalyan', '9561179584', 'ramkalyan', 'tapas'),
(4005, 'Abhishiktha Bhargav', '9560009584', 'abhibhargav', 'politician'),
(4006, 'Pawan', '9104879584', 'pavan13', 'kalyan'),
(4007, 'Prahas', '8956879584', 'vprahas', 'sahoo'),
(4008, 'Rahul', '6304879584', 'jrahulsai', 'junglee'),
(4009, 'Trivikram', '9561111114', 'trivisrinu', 'julai'),
(4010, 'Raghava', '9512129584', 'raghav0', 'complicated');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `pass`) VALUES
('nikki@gmail.com', 'shru'),
('shravya16097@gmail.com', 'potti'),
('jagruthi@gmail.com', 'jag123'),
('amankhan@yahoo.co.in', 'amank'),
('arucse@gmail.com', 'thanuja'),
('siri@hotmail.com', 'sssss'),
('harshitha@gmail.com', 'kolukuluru'),
('kiransai@yahoo.com', 'mawa'),
('me180001032@iiti.ac.in', 'mari'),
('pullu@gmail.com', 'saline'),
('rahul123@gmail.com', 'rahul123'),
('sarayurocks@gmail.com', 'sitti'),
('sathvik@yahoo.com', 'sathvik'),
('snehashrie@gmail.com', 'akka'),
('sunithavvit@gmail.com', 'shravya'),
('udaykk@hotmail.com', 'mettukuru'),
('kavyareddi@gmail.com', 'kukuku'),
('raja@gmail.com', 'raja1234'),
('harshad456@yahoo.com', 'harsh'),
('jsunaina@reddiffmail.com', 'sunaina'),
('roshini111@gmail.com', 'roshi'),
('manjumama@gmail.com', 'mama');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixabn`
-- (See below for the actual view)
--
CREATE TABLE `mixabn` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixabp`
-- (See below for the actual view)
--
CREATE TABLE `mixabp` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixan`
-- (See below for the actual view)
--
CREATE TABLE `mixan` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixap`
-- (See below for the actual view)
--
CREATE TABLE `mixap` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixbn`
-- (See below for the actual view)
--
CREATE TABLE `mixbn` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixbp`
-- (See below for the actual view)
--
CREATE TABLE `mixbp` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixon`
-- (See below for the actual view)
--
CREATE TABLE `mixon` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mixop`
-- (See below for the actual view)
--
CREATE TABLE `mixop` (
`availability` varchar(3)
,`hospitaldonated` varchar(60)
,`inchargename` varchar(50)
,`phoneno` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `recipientlist`
--

CREATE TABLE `recipientlist` (
  `Rid` int(5) NOT NULL,
  `bloodgroup` varchar(3) DEFAULT NULL,
  `quantityused` varchar(5) DEFAULT NULL,
  `dateused` date DEFAULT NULL,
  `hospital` varchar(50) DEFAULT NULL,
  `emailID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipientlist`
--

INSERT INTO `recipientlist` (`Rid`, `bloodgroup`, `quantityused`, `dateused`, `hospital`, `emailID`) VALUES
(1, 'B-', '150', '2019-07-01', 'Omni Multi Speciality Hospital', 'pullu@gmail.com'),
(2, 'AB+', '100', '2019-06-12', 'Continental Hospital', 'raja@gmail.com'),
(3, 'O-', '100', '2019-05-15', 'Gandhi Medical Hospital and College', 'roshini111@gmail.com'),
(4, 'A-', '50', '2017-02-24', 'Life Care Hospital', 'harshad456@yahoo.com'),
(5, 'A+', '100', '2018-09-04', 'Apollo Medical Hospital', 'jsunaina@reddiffmail.com'),
(6, 'B+', '230', '2017-12-22', 'Apollo Medical Hospital', 'sarayurocks@gmail.com'),
(7, 'AB+', '50', '2019-11-07', 'Apollo Medical Hospital', 'siri@hotmail.com'),
(10, 'B+', '50', '2019-11-06', 'Sunshine Medical Hospital', 'manjumama@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `weight` varchar(3) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `emailID` varchar(50) NOT NULL,
  `streetno` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT 'Telengana'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `dob`, `gender`, `age`, `weight`, `phoneno`, `emailID`, `streetno`, `city`, `state`) VALUES
('Aman Khan', '1982-02-28', 'Male', '37', '72', '7832045725', 'amankhan@yahoo.co.in', '3T', 'Miyapur', 'Telengana'),
('Aravind', '1981-10-10', 'Male', '38', '57', '7712645987', 'arucse@gmail.com', '', 'Warangal', 'Telengana'),
('Harshad Ibrahim', '1977-02-15', 'Male', '42', '69', '9906452376', 'harshad456@yahoo.com', NULL, 'Secunderabad', 'Telengana'),
('Harshitha', '2000-08-27', 'Female', '19', '58', '9643799035', 'harshitha@gmail.com', '4C', 'Hyderabad', 'Telengana'),
('Jagruthi', '2001-08-30', 'Female', '18', '55', '6303223139', 'jagruthi@gmail.com', '1', 'Hyderabad', 'Telengana'),
('Jessica Sunaina', '1983-06-23', 'Female', '36', '72', '8745630098', 'jsunaina@reddiffmail.com', '2E', 'Nagpur', 'Telengana'),
('Kavya', '1996-04-13', 'Female', '23', '50', '9898767656', 'kavyareddi@gmail.com', '5', 'Khammam', 'Telengana'),
('Sai Kiran ', '1984-06-14', 'Male', '35', '66', '6598300027', 'kiransai@yahoo.com', NULL, 'Khammam', 'Telengana'),
('Manjunath', '1995-05-21', 'Male', '24', '54', '9848062424', 'manjumama@gmail.com', '13B', 'Nalgonda', 'Telengana'),
('Dhanush', '1970-03-13', 'Male', '49', '66', '8754264537', 'me180001032@iiti.ac.in', NULL, 'Kukatpally', 'Telengana'),
('Nikhil', '1997-11-10', 'Male', '22', '66', '9123783213', 'nikki@gmail.com', '3B', 'Hyderabad', 'Telengana'),
('Pulakitha', '1992-12-12', 'Female', '27', '43', '6547654876', 'pullu@gmail.com', '05', 'Jubliee Hills', 'Telengana'),
('Rahul', '1967-12-26', 'Male', '52', '69', '9543245662', 'rahul123@gmail.com', '12', 'Sangareddy', 'Telengana'),
('Raja', '1990-02-21', 'Male', '29', '70', '8372737746', 'raja@gmail.com', '12A', 'Hyderabad', 'Telengana'),
('Roshni', '1995-11-13', 'Female', '24', '57', '7348290873', 'roshini111@gmail.com', '1E', 'Madhapur', 'Telengana'),
('Sarayu', '1988-08-12', 'Female', '31', '59', '9876987321', 'sarayurocks@gmail.com', '2G', 'Karimnagar', 'Telengana'),
('Sathvik Reddy', '1977-04-05', 'Male', '201', '70', '9432986453', 'sathvik@yahoo.com', NULL, 'Warangal', 'Telengana'),
('Shravya', '2001-01-31', 'Female', '18', '50', '7993928829', 'shravya16097@gmail.com', '13', 'Hyderabad', 'Telengana'),
('Siri', '1985-07-19', 'Female', '34', '50', '6687745678', 'siri@hotmail.com', '1G', 'Hyderabad', 'Telengana'),
('Sneha Bhukya', '1990-08-23', 'Female', '29', '53', '9844530198', 'snehashrie@gmail.com', NULL, 'Banjara Hills', 'Telengana'),
('Sunitha', '1973-10-28', 'Female', '46', '65', '9441264836', 'sunithavvit@gmail.com', '2T', 'Warangal', 'Telengana'),
('Uday Kumar', '1987-09-28', 'Male', '32', '57', '9235500987', 'udaykk@hotmail.com', '2-3', 'Patancheru', 'Telengana');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `agefind` BEFORE INSERT ON `users` FOR EACH ROW set new.age=(year(curdate())-year(new.dob))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `mixabn`
--
DROP TABLE IF EXISTS `mixabn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixabn`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'AB-' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixabp`
--
DROP TABLE IF EXISTS `mixabp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixabp`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'AB+' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixan`
--
DROP TABLE IF EXISTS `mixan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixan`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'A-' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixap`
--
DROP TABLE IF EXISTS `mixap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixap`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'A+' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixbn`
--
DROP TABLE IF EXISTS `mixbn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixbn`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'B-' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixbp`
--
DROP TABLE IF EXISTS `mixbp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixbp`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'O+' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixon`
--
DROP TABLE IF EXISTS `mixon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixon`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'O-' and `d`.`availability` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `mixop`
--
DROP TABLE IF EXISTS `mixop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mixop`  AS  select `d`.`availability` AS `availability`,`d`.`hospitaldonated` AS `hospitaldonated`,`i`.`inchargename` AS `inchargename`,`i`.`phoneno` AS `phoneno` from ((`hospital` `h` join `donations` `d` on(`h`.`hospitalname` = `d`.`hospitaldonated`)) join `incharge` `i` on(`h`.`inchargeid` = `i`.`inchargeid`)) where `d`.`bloodgroup` = 'O+' and `d`.`availability` <> '0' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donationid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalid`),
  ADD KEY `inchargeid` (`inchargeid`);

--
-- Indexes for table `incharge`
--
ALTER TABLE `incharge`
  ADD PRIMARY KEY (`inchargeid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `email` (`email`);

--
-- Indexes for table `recipientlist`
--
ALTER TABLE `recipientlist`
  ADD PRIMARY KEY (`Rid`),
  ADD KEY `emailID` (`emailID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`emailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donationid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT for table `recipientlist`
--
ALTER TABLE `recipientlist`
  MODIFY `Rid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`inchargeid`) REFERENCES `incharge` (`inchargeid`),
  ADD CONSTRAINT `hospital_ibfk_2` FOREIGN KEY (`inchargeid`) REFERENCES `incharge` (`inchargeid`),
  ADD CONSTRAINT `hospital_ibfk_3` FOREIGN KEY (`inchargeid`) REFERENCES `incharge` (`inchargeid`),
  ADD CONSTRAINT `hospital_ibfk_4` FOREIGN KEY (`inchargeid`) REFERENCES `incharge` (`inchargeid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`emailID`);

--
-- Constraints for table `recipientlist`
--
ALTER TABLE `recipientlist`
  ADD CONSTRAINT `recipientlist_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `users` (`emailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
