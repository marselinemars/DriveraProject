

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(5) NOT NULL,
  `MaxStudents` int(11) DEFAULT NULL,
  `MaxStudentExam` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `NumHoursTheoretical` int(11) NOT NULL,
  `NumHoursPractical1` int(11) NOT NULL,
  `NumHoursPractical2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`CategoryID`, `CategoryName`, `MaxStudents`, `MaxStudentExam`, `IsActive`, `NumHoursTheoretical`, `NumHoursPractical1`, `NumHoursPractical2`) VALUES
(1, 'A1', 0, 0, 0, 25, 0, 0),
(2, 'A2', 0, 0, 0, 15, 10, 10),
(3, 'B', 0, 0, 0, 15, 10, 10),
(4, 'C1', 0, 0, 0, 15, 10, 10),
(5, 'C2', 0, 0, 0, 15, 10, 10),
(6, 'BE', 0, 0, 0, 0, 0, 20),
(7, 'C1E', 0, 0, 0, 0, 0, 20),
(8, 'C2E', 0, 0, 0, 0, 0, 20),
(9, 'DE', 0, 0, 0, 0, 0, 20);



CREATE TABLE `driving_school` (
  `Name` varchar(30) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `enrollement` (
  `EnrollementID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  `attendance` enum('present','absent') NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `exam` (
  `Student_ID` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Exam_Stage` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `failed_students` (
  `studentID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `stage` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `succ_students` (
  `studentID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `stage` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `monitor` (
  `IDM` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_num` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bgroup` varchar(3) NOT NULL,
  `exp` int(11) DEFAULT NULL,
  `exp_date` date NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `type` enum('1','2','3','4','5','6') NOT NULL,
  `NID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `paymenthistory` (
  `PaymentID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `PaymentDate` varchar(50) NOT NULL,
  `PaidAmount` decimal(10,2) DEFAULT NULL,
  `RemainingAmount` decimal(10,2) DEFAULT NULL,
  `PaymentAmount` decimal(10,2) DEFAULT NULL,
  `NextPaymentDate` varchar(50) DEFAULT NULL,
  `RowStyle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `MonitorID` int(11) NOT NULL,
  `VehicleID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Type` enum('Theoretical','Practical Type 1','Practical Type 2') NOT NULL,
  `name` varchar(50) NOT NULL,
  `num_hours` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `student` (
  `IDS` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `bday` date NOT NULL,
  `PlaceOfBirth` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `PriviousLicenseCategory` enum('A1','A2','B','C1','C2','BE','C1E','C2E','DE') DEFAULT NULL,
  `PriviousLicenseDate` date DEFAULT NULL,
  `phone_num` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bgroup` varchar(3) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `TotalPaid` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Stage` enum('Theoretical','Practical Type 1','Practical Type 2') DEFAULT NULL,
  `NumOfAttendantHours` int(11) DEFAULT 0,
  `scheduled` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `theowner` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phone_num` varchar(12) NOT NULL,
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `thestate` varchar(20) NOT NULL,
  `theid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `LicenseplateNum` varchar(11) NOT NULL,
  `InsurancePolicyNumber` varchar(50) NOT NULL,
  `InsuranceExpiryDate` date NOT NULL,
  `TechnicalInspectionExpiryDate` date NOT NULL,
  `AvailableForUse` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

ALTER TABLE `enrollement`
  ADD PRIMARY KEY (`EnrollementID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `ScheduleID` (`ScheduleID`);

ALTER TABLE `exam`
  ADD PRIMARY KEY (`Student_ID`);

ALTER TABLE `monitor`
  ADD PRIMARY KEY (`IDM`);

ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NID`);

ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `StudentID` (`StudentID`);

ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `MonitorID` (`MonitorID`),
  ADD KEY `VehicleID` (`VehicleID`),
  ADD KEY `fk_category_id` (`CategoryID`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`IDS`),
  ADD KEY `category_ibfk_1` (`CategoryID`);

ALTER TABLE `theowner`
  ADD PRIMARY KEY (`theid`);

ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`);

ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `enrollement`
  MODIFY `EnrollementID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `monitor`
  MODIFY `IDM` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `notifications`
  MODIFY `NID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `paymenthistory`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `student`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `theowner`
  MODIFY `theid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `enrollement`
  ADD CONSTRAINT `enrollement_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`IDS`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollement_ibfk_2` FOREIGN KEY (`ScheduleID`) REFERENCES `schedule` (`ScheduleID`) ON DELETE CASCADE;

ALTER TABLE `paymenthistory`
  ADD CONSTRAINT `paymenthistory_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`IDS`) ON DELETE CASCADE;


ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`MonitorID`) REFERENCES `monitor` (`IDM`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`) ON DELETE CASCADE;

ALTER TABLE `student`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`) ON DELETE CASCADE;

ALTER TABLE `monitor`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`) ON DELETE CASCADE;

ALTER TABLE `vehicle`
  ADD CONSTRAINT `category_ibfk_3` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`) ON DELETE CASCADE;





COMMIT;
