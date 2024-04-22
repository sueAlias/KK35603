-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 12:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurserydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `myKID` varchar(15) NOT NULL,
  `childName` varchar(50) NOT NULL,
  `parentIC` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`myKID`, `childName`, `parentIC`, `gender`, `classID`) VALUES
('000122154324', 'Myra Mysa', '770923125433', 'Female', 1),
('010423054323', 'Rykal Ryzki', '880212054321', 'Male', 2),
('121212122111', 'ahmad bin daddy', '444444444444', 'Male', 2),
('123333333333', 'sofea rania', '344444444444', 'Female', 1),
('222222222222', 'Syafiq Miekael', '111111111111', 'Male', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `className` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `className`) VALUES
(1, '1 Alpha'),
(2, '2 Beta');

-- --------------------------------------------------------

--
-- Table structure for table `class_attendance`
--

CREATE TABLE `class_attendance` (
  `attendanceID` int(11) NOT NULL,
  `attendanceDate` date NOT NULL,
  `classID` int(11) NOT NULL,
  `myKID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_attendance`
--

INSERT INTO `class_attendance` (`attendanceID`, `attendanceDate`, `classID`, `myKID`) VALUES
(1, '2023-12-10', 1, '000122154324'),
(2, '2023-12-11', 1, '000122154324'),
(3, '2023-12-11', 2, '010423054323'),
(4, '2023-12-11', 2, '222222222222'),
(5, '2023-12-07', 2, '010423054323'),
(6, '2023-12-10', 2, '010423054323'),
(7, '2023-12-10', 2, '222222222222'),
(8, '2023-12-19', 2, '010423054323'),
(9, '2023-12-19', 2, '121212122111'),
(10, '2023-12-19', 2, '222222222222'),
(11, '2023-12-20', 1, '000122154324'),
(12, '2024-01-02', 1, '000122154324'),
(13, '2024-01-02', 2, '010423054323'),
(14, '2024-01-02', 2, '121212122111'),
(15, '2024-01-04', 2, '010423054323'),
(16, '2024-01-04', 2, '121212122111'),
(17, '2024-01-04', 2, '222222222222'),
(18, '2024-01-03', 1, '000122154324'),
(19, '2024-01-04', 2, '010423054323'),
(20, '2024-01-04', 2, '121212122111'),
(21, '2024-01-04', 2, '222222222222');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nurseryview`
-- (See below for the actual view)
--
CREATE TABLE `nurseryview` (
`childName` varchar(50)
,`myKID` varchar(15)
,`parentName` varchar(50)
,`parentIC` varchar(15)
,`userID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `parentIC` varchar(15) NOT NULL,
  `parentName` varchar(50) NOT NULL,
  `parentAddress` varchar(100) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `createDate` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `parentIC`, `parentName`, `parentAddress`, `contactNum`, `createdBy`, `createDate`, `userID`) VALUES
(35, '111111111111', 'parent2 name', '', '011-9999999', '9', '2023-12-10', 9),
(37, '123124124444', 'mama 1', '', '012-2998722', '11', '2023-12-20', 11),
(39, '343333333333', 'mama2', '', '012-1211111', '12', '2023-12-20', 12),
(43, '344444444444', 'mama', '', '111-1111111', '12', '0000-00-00', 12),
(42, '444444444444', 'daddy1', '', '012-2344444', '13', '2023-12-20', 13),
(29, '770923125433', 'Musli Hamid', '', '012-4325611', '', '2023-12-04', 6),
(30, '880212054321', 'Robiah Syukur', '', '011-4235555', '', '2023-12-04', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `subjectTeacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`, `teacherID`, `subjectTeacher`) VALUES
(1, 'Let\'s count 1, 2, 3', 1, 'Laudra'),
(2, 'Science and Me', 2, 'Jamie'),
(3, 'Sing along DO, RE, ME', 3, 'Helen'),
(4, 'Spell it right', 4, 'Susanti');

-- --------------------------------------------------------

--
-- Table structure for table `subject_enroll`
--

CREATE TABLE `subject_enroll` (
  `id` int(11) NOT NULL,
  `myKID` varchar(15) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_enroll`
--

INSERT INTO `subject_enroll` (`id`, `myKID`, `subjectID`) VALUES
(40, '000122154324', 3),
(55, '121212122111', 2),
(58, '123333333333', 2),
(59, '123333333333', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `userID`) VALUES
(1, 'Laudra', 3),
(2, 'Jamie', 2),
(3, 'Helen', 7),
(4, 'Susanti', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPwd` varchar(255) NOT NULL,
  `userRoles` int(11) NOT NULL DEFAULT 2 COMMENT '1 - Admin (teacher), 2 - User (parent)',
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPwd`, `userRoles`, `registrationDate`) VALUES
(1, 'user1', 'user1@email.com', '$2y$10$HVCzxuAfYXzRAyPwKiRXpeAYf.kiHBuFZrNifQQLtJupqJ9zhvvx6', 2, '2023-12-04'),
(2, 'admin2', 'admin2@email.com', '$2y$10$hUmy4QCATrRvQRJ4oVB4M.Nv/Q0M7haNQ.u07wFfGtbvset7hYIJ.', 1, '2023-12-04'),
(3, 'Teacher Laudra', 'admin1@email.com', '$2y$10$bu1ou.l3aLC4VpOOrRTx6OOvx2bIkzigtERXDwlyaRNAYVZs317J6', 1, '2023-12-04'),
(4, 'user3', 'user3@email.com', '$2y$10$0C9ivLkT.O2HBxRv878i0.EWoIo8VV91t7WJ6PcNJxlOuXbyw5bhi', 2, '2023-12-04'),
(5, 'user4', 'user4@email.com', '$2y$10$oTtyrfpNM6TbWvUUTDIQYuc2AZKdEUvCKiSfcZKh/.lSysGTFcGuK', 2, '2023-12-04'),
(6, 'user5', 'user5@email.com', '$2y$10$g/WUPZzYHsbTl.M74xrg8eoijXjOAYCTGZSd9vjjh6cm4Y531kOCm', 2, '2023-12-04'),
(7, 'admin3', 'admin3@email.com', '$2y$10$LRoFNQSZQiQaWrvTrhZtVuRESuS0KeQoHh6LhtGtcsEfz148zplw6', 1, '2023-12-08'),
(8, 'parent1', 'parent1@email.com', '$2y$10$Yhb8GQnYpxbM0t8Si.Z6kuYkUCzDYy2ZpObcvFMyZB93PjtFOeSPa', 2, '2023-12-08'),
(9, 'parent2', 'parent2@email.com', '$2y$10$Lbx0IO39puD0drjM6tc7oO3tjto8yfO1z0E5QF6Cy07KmLZZOVuXy', 2, '2023-12-08'),
(10, 'parent3', 'parent3@email.com', '$2y$10$AWzeWi4CY7uEje2s0xQrd.v30Hl/J.GsuDGXj4rC7XGuLE0aO9riO', 2, '2023-12-18'),
(11, 'mama1', 'mama1@email.com', '$2y$10$pHfr.l30usK0Ri4x/IC22.Z/trA61zk10cd7rMW4922cq5N6CFDRq', 2, '2023-12-20'),
(12, 'mama2', 'mama2@email.com', '$2y$10$m8ukoxkWTPx/6o/El06jKOoyIQUf1rkiKH0wgYV8KztFNalKv9H7K', 2, '2023-12-20'),
(13, 'daddy1', 'daddy1@email.com', '$2y$10$xe4N5lggaOGy5cStHuNabO1YRR8em5dLa9BBHzg0i9k4nPssY.CZu', 2, '2023-12-20'),
(14, 'Teacher Susanti', 'admin4@email.com', '$2y$10$x5KY2As4mY287rBwmagaAeDHBTWrJmmytNytHeJZ56tvpL8Bwmhte', 1, '2024-01-03');

-- --------------------------------------------------------

--
-- Structure for view `nurseryview`
--
DROP TABLE IF EXISTS `nurseryview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nurseryview`  AS SELECT `child`.`childName` AS `childName`, `child`.`myKID` AS `myKID`, `parent`.`parentName` AS `parentName`, `parent`.`parentIC` AS `parentIC`, `parent`.`userID` AS `userID` FROM (`child` join `parent`) WHERE `parent`.`parentIC` = `child`.`parentIC` ORDER BY `parent`.`parentName` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`myKID`),
  ADD KEY `FK_Parent` (`parentIC`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `myKID` (`myKID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentIC`),
  ADD KEY `id` (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `subject_enroll`
--
ALTER TABLE `subject_enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CHILD` (`myKID`),
  ADD KEY `FK_SUBJECT` (`subjectID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_attendance`
--
ALTER TABLE `class_attendance`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_enroll`
--
ALTER TABLE `subject_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `FK_Parent` FOREIGN KEY (`parentIC`) REFERENCES `parent` (`parentIC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`);

--
-- Constraints for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD CONSTRAINT `class_attendance_ibfk_1` FOREIGN KEY (`myKID`) REFERENCES `child` (`myKID`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `subject_enroll`
--
ALTER TABLE `subject_enroll`
  ADD CONSTRAINT `FK_CHILD` FOREIGN KEY (`myKID`) REFERENCES `child` (`myKID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SUBJECT` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
