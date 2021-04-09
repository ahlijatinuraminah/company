-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 04:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--
-- CREATE DATABASE IF NOT EXISTS `company` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- USE `company`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dname` varchar(20) DEFAULT NULL,
  `dnumber` int(1) NOT NULL,
  `mgr_ssn` char(9) DEFAULT NULL,
  `mgr_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dname`, `dnumber`, `mgr_ssn`, `mgr_start_date`) VALUES
('Headquarters', 1, '888665555', '1981-06-19'),
('Administration', 4, '987654321', '1995-01-01'),
('Research', 5, '333445555', '1988-05-22'),
('ABCD', 88, '808080808', '2021-04-08'),
('IT', 919, '666884444', '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `essn` char(9) NOT NULL,
  `dependent_name` varchar(20) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `relationship` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`essn`, `dependent_name`, `sex`, `bdate`, `relationship`) VALUES
('333445555', 'Aizar', 'M', '2020-04-17', 'Sons'),
('333445555', 'Alice', 'F', '1986-04-05', 'Daughter'),
('333445555', 'Joy', 'F', '1958-05-03', 'Spouse'),
('333445555', 'Theodore', 'M', '1983-10-25', 'Son'),
('81177', 'Anak 1', 'F', '2021-04-08', 'anak perta'),
('987654321', 'Abner', 'M', '1988-01-04', 'Son'),
('987654321', 'Afnan', 'F', '2013-04-01', 'Daughter'),
('999999999', 'Afnan', 'M', '2020-04-08', 'Anak'),
('999999999', 'Iya', 'F', '2020-04-25', 'Daughter');

-- --------------------------------------------------------

--
-- Table structure for table `dept_locations`
--

CREATE TABLE `dept_locations` (
  `dnumber` int(1) NOT NULL,
  `dlocation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_locations`
--

INSERT INTO `dept_locations` (`dnumber`, `dlocation`) VALUES
(1, 'Houston'),
(1, 'Kentucky'),
(1, 'Semarang'),
(4, 'Stafford'),
(5, 'Austin'),
(5, 'Bellaire'),
(5, 'Sugarland');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `fname` varchar(20) DEFAULT NULL,
  `minit` char(1) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `ssn` char(9) NOT NULL,
  `bdate` date DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `salary` int(5) DEFAULT NULL,
  `super_ssn` char(9) DEFAULT NULL,
  `dno` int(1) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `photo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`fname`, `minit`, `lname`, `ssn`, `bdate`, `address`, `sex`, `salary`, `super_ssn`, `dno`, `userid`, `photo`) VALUES
('John', 'B', 'Smith', '123456789', '1965-01-09', '731 Fondren, Houston, TX', 'M', 30000, '333445555', 5, 1, '123456789.jpg'),
('Ana', 'm', 'Elsa', '16166', '2020-04-03', 'Jkara', 'F', 12000, '888665555', 4, 32, NULL),
('Franklin', 'T', 'Wong', '333445555', '1955-12-08', '638 Voss, Houston, TX', 'M', 40000, '888665555', 5, 2, '333445555.jpg'),
('Joyce', 'A', 'English', '453453453', '1972-07-31', '5631 Rice, Houston, TX', 'F', 25000, '333445555', 5, 25, '453453453.jpeg'),
('Raisa', 'M', 'Adriana', '66666666', '2020-05-23', 'Bogor', 'F', 21200, '333445555', 919, 34, '66666666.jpg'),
('Ramesh', 'K', 'Narayan', '666884444', '1920-09-15', '975 Fire Oak, Humble, TX', 'M', 38000, '333445555', 5, 9, '666884444.jpg'),
('Melissa', 'M', 'Jones', '808080808', '1970-07-10', '1001 Western, Houston, TX', 'F', 27500, '333445555', 5, 26, NULL),
('Ade', 'M', 'Olala', '81177', '2020-04-04', 'jalan jalan', 'F', 2020, '333445555', 1, 33, NULL),
('James', 'E', 'Borg', '888665555', '1937-11-10', '450 Stone, Houston, TX', 'M', 55000, NULL, 1, 11, '888665555.png'),
('Tony', 'S', 'Junior', '910191019', '2021-04-07', 'Kensington Rd', 'M', 2000, '333445555', 88, NULL, NULL),
('Jennifer', 'S', 'Wallace', '987654321', '1941-06-20', '291 Berry, Bellaire, Tx', 'F', 37000, '888665555', 4, 4, NULL),
('Ahmad', 'V', 'Jabbar', '987987987', '1969-03-29', '980 Dallas, Houston, TX', 'M', 22000, '987654321', 4, 10, '987987987.png'),
('Alicia', 'J', 'Zelaya', '999887777', '1968-01-19', '3321 castle, Spring, TX', 'F', 25000, '987654321', 4, 3, '999887777.jpg'),
('Ahlijati', 'X', 'Nuraminah', '999999999', '2020-04-09', 'Jakarta', 'F', 40002, '333445555', 1, 37, '999999999.png');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pname` varchar(20) DEFAULT NULL,
  `pnumber` int(2) NOT NULL,
  `plocation` varchar(20) DEFAULT NULL,
  `dnum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pname`, `pnumber`, `plocation`, `dnum`) VALUES
('ProductX', 1, 'Bellaire', 5),
('ProductY', 2, 'Sugarland', 5),
('ProductZ', 3, 'Houston', 5),
('Computerization', 10, 'Stafford', 4),
('Reorganization', 20, 'Houston', 1),
('Newbenefits', 30, 'Stafford', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `role`) VALUES
(1, 'bsmith@gmail.com', '$2y$10$yyTSdHV9/AkY2NSXXeTPquS60T6Qt2kRc3yoKOeIc3a9PTLi4tcsW', 'employee'),
(2, 'franklin@gmail.com', '$2y$10$4jO9RUjqTFve.Py5M41Dz.9Xi2A48eHJA847dddvjZXgMBZp8Ks86', 'manager'),
(3, 'alicia@gmail.com', '$2y$12$OFa1Ap.deqOV0G.Plv9GSONQnDZIxaEQKVD.YwPIeNj4Me66xM6y2', 'admin'),
(4, 'jennifer@gmail.com', '$2y$10$CV8vo.QR.MQ10QPkrORJpe./JciVzJCNFX9nNl8Gfx7mQK44mlkAq', 'employee'),
(9, 'ramesh@gmail.com', '$2y$10$DaXQrro611fL4WXjH84HEOgdKF4KfT3qCPj4EyL5YPawYX3oCZ8vS', 'manager'),
(10, 'ahmad@gmail.com', '$2y$10$ct/maE0uyithaTfyvSJpMuf3AAGzuDR5ElzK1J5ZHIH.JunZ5xj6u', 'employee'),
(11, 'james@gmail.com', '$2y$10$T.N/kvzvgENSX0Osst./Ee/onepYEcEfhKRL7a9Sm/IehVuYJyq4u', 'manager'),
(24, 'ahlijati.nuraminah@gmail.com', '$2y$10$bSDR/03m6GUMOhq366EIC.ekp4vB6zkeqWJxzmIXs7Th.oexr9v7C', 'employee'),
(25, 'joyce@gmail.com', '$2y$10$oiMx.iAWARwrjD3zwkOo7uUMRWQiHIoNAmsEO4zLm6uuO93pYW0c2', 'employee'),
(26, 'melissa@gmail.com', '$2y$10$eR3HrmeAYfpLRt.zWgeepe7ZdnK.zLy2S6gR8L3p8kjHSlP380ahi', 'employee'),
(32, 'anna@gmail.com', '$2y$10$B34jTO2sX2vk0JvT6gaQkODNP0TlCKjOFYp2DZlOjiR9/1Wvz59Fi', 'employee'),
(33, 'aderai@gmail.com', '$2y$10$L6hHh2xDi9EVS/tHKArDiOH7BFg2BAtB4PpgSfn24CTddw5RBsbTO', 'employee'),
(34, 'raisa@gmail.com', '$2y$10$sLmsnMxCkw0iEsvBqqInSOS6l/i1Abc1leUW6ITnGGx649BespwRm', 'employee'),
(36, 'ahlijati.nuraminah@gmail.com', '$2y$10$QOD.qrOiPJw8szrOs/rDquHfH8SfGUPZGMFsjs/c4uc2ED6ErwS6a', 'employee'),
(37, 'ahlijati.nuraminah@gmail.com', '$2y$10$aPu5/xYchwYt1DwX9O4Qqu/UKrJdMgFyYabpruGmzwrDCaJVl1eQS', 'employee'),
(38, 'user@gmail.com', '$2y$10$u4Xp91PCbv2WSeEuOn.xNOejtkHTVBct.6JjlNJm6ug/tFJm80Lh2', 'employee'),
(39, 'ahlijati.nuraminah@esqbs.ac.id', '$2y$10$Vs0TrYUR/CDEHxloeTa77OY9GwyGkNm/MwH83h7aOtf6hNL922tT6', 'employee'),
(40, 'ahlijati.nuraminah@esqbs.ac.id', '$2y$10$Xi02jBY4a6bF1EsTa0dCcuTSRIT1uhZ1en3f5MCYOthnOwZiRry3S', 'employee'),
(41, 'ahlijati.nuraminah@esqbs.ac.id', '$2y$10$GS/cdV.w3tnrnv6coe6KGOZ.MR9BVTmeKTftWzzQoWrOUNc/Jyt6.', 'employee');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_employee`
-- (See below for the actual view)
--
CREATE TABLE `v_employee` (
`fname` varchar(20)
,`minit` char(1)
,`lname` varchar(20)
,`ssn` char(9)
,`bdate` date
,`address` varchar(30)
,`sex` char(1)
,`salary` int(5)
,`super_ssn` char(9)
,`dno` int(1)
,`userid` int(11)
,`photo` varchar(15)
,`super_name` varchar(43)
,`dname` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_projectworks`
-- (See below for the actual view)
--
CREATE TABLE `v_projectworks` (
`pname` varchar(20)
,`pnumber` int(2)
,`plocation` varchar(20)
,`dnum` int(1)
,`essn` char(9)
,`pno` int(2)
,`hours` int(2)
,`dname` varchar(20)
,`dnumber` int(1)
,`mgr_ssn` char(9)
,`mgr_start_date` date
,`fname` varchar(20)
,`minit` char(1)
,`lname` varchar(20)
,`ssn` char(9)
,`bdate` date
,`address` varchar(30)
,`sex` char(1)
,`salary` int(5)
,`super_ssn` char(9)
,`dno` int(1)
,`userid` int(11)
,`photo` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`userid` int(11)
,`email` varchar(30)
,`password` varchar(100)
,`role` varchar(10)
,`ssn` char(9)
,`fname` varchar(20)
,`minit` char(1)
,`lname` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `essn` char(9) NOT NULL,
  `pno` int(2) NOT NULL,
  `hours` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`essn`, `pno`, `hours`) VALUES
('123456789', 1, 32),
('123456789', 2, 8),
('123456789', 3, 12),
('16166', 3, 5),
('333445555', 1, 10),
('333445555', 2, 10),
('333445555', 3, 5),
('333445555', 10, 10),
('333445555', 20, 10),
('333445555', 30, 5),
('453453453', 1, 20),
('453453453', 2, 20),
('81177', 3, 5),
('888665555', 20, 10),
('987654321', 20, 15),
('987654321', 30, 20),
('987987987', 10, 35),
('987987987', 30, 5),
('999887777', 10, 10),
('999887777', 30, 30),
('999999999', 2, 8),
('999999999', 3, 56);

-- --------------------------------------------------------

--
-- Structure for view `v_employee`
--
DROP TABLE IF EXISTS `v_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee`  AS  select `e`.`fname` AS `fname`,`e`.`minit` AS `minit`,`e`.`lname` AS `lname`,`e`.`ssn` AS `ssn`,`e`.`bdate` AS `bdate`,`e`.`address` AS `address`,`e`.`sex` AS `sex`,`e`.`salary` AS `salary`,`e`.`super_ssn` AS `super_ssn`,`e`.`dno` AS `dno`,`e`.`userid` AS `userid`,`e`.`photo` AS `photo`,concat(`s`.`fname`,' ',`s`.`minit`,' ',`s`.`lname`) AS `super_name`,`d`.`dname` AS `dname` from ((`employee` `e` left join `employee` `s` on(`e`.`super_ssn` = `s`.`ssn`)) join `department` `d` on(`e`.`dno` = `d`.`dnumber`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_projectworks`
--
DROP TABLE IF EXISTS `v_projectworks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_projectworks`  AS  select `p`.`pname` AS `pname`,`p`.`pnumber` AS `pnumber`,`p`.`plocation` AS `plocation`,`p`.`dnum` AS `dnum`,`w`.`essn` AS `essn`,`w`.`pno` AS `pno`,`w`.`hours` AS `hours`,`d`.`dname` AS `dname`,`d`.`dnumber` AS `dnumber`,`d`.`mgr_ssn` AS `mgr_ssn`,`d`.`mgr_start_date` AS `mgr_start_date`,`e`.`fname` AS `fname`,`e`.`minit` AS `minit`,`e`.`lname` AS `lname`,`e`.`ssn` AS `ssn`,`e`.`bdate` AS `bdate`,`e`.`address` AS `address`,`e`.`sex` AS `sex`,`e`.`salary` AS `salary`,`e`.`super_ssn` AS `super_ssn`,`e`.`dno` AS `dno`,`e`.`userid` AS `userid`,`e`.`photo` AS `photo` from (((`project` `p` join `works_on` `w`) join `department` `d`) join `employee` `e`) where `p`.`pnumber` = `w`.`pno` and `p`.`dnum` = `d`.`dnumber` and `w`.`essn` = `e`.`ssn` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `u`.`userid` AS `userid`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`role` AS `role`,`e`.`ssn` AS `ssn`,`e`.`fname` AS `fname`,`e`.`minit` AS `minit`,`e`.`lname` AS `lname` from (`employee` `e` left join `user` `u` on(`u`.`userid` = `e`.`userid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dnumber`),
  ADD KEY `mgr_ssn` (`mgr_ssn`);

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`essn`,`dependent_name`);

--
-- Indexes for table `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD PRIMARY KEY (`dnumber`,`dlocation`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ssn`),
  ADD KEY `super_ssn` (`super_ssn`),
  ADD KEY `dno` (`dno`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pnumber`),
  ADD KEY `dnum` (`dnum`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`essn`,`pno`),
  ADD KEY `pno` (`pno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`mgr_ssn`) REFERENCES `employee` (`ssn`);

--
-- Constraints for table `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_ibfk_1` FOREIGN KEY (`essn`) REFERENCES `employee` (`ssn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD CONSTRAINT `dept_locations_ibfk_1` FOREIGN KEY (`dnumber`) REFERENCES `department` (`dnumber`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`super_ssn`) REFERENCES `employee` (`ssn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`dno`) REFERENCES `department` (`dnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`dnum`) REFERENCES `department` (`dnumber`);

--
-- Constraints for table `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`essn`) REFERENCES `employee` (`ssn`),
  ADD CONSTRAINT `works_on_ibfk_2` FOREIGN KEY (`pno`) REFERENCES `project` (`pnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
