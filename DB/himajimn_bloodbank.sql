-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 04:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himajimn_bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `BloodID` int(2) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`BloodID`, `Type`, `Description`) VALUES
(1, 'O+', 'O Positive'),
(2, 'O-', 'O Negative'),
(3, 'A+', 'A Positive'),
(4, 'A-', 'A Negative'),
(5, 'B+', 'B Positive'),
(6, 'B-', 'B Negative'),
(7, 'AB+', 'AB Positive'),
(8, 'AB-', 'AB Negative');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_admin`
--

CREATE TABLE `blood_bank_admin` (
  `BAdminID` int(10) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `BloodBankID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_admin`
--

INSERT INTO `blood_bank_admin` (`BAdminID`, `NIC`, `FirstName`, `LastName`, `Password`, `BloodBankID`, `Email`) VALUES
(15, '970000000V', 'Nuwans', 'Zetti', '$2y$10$memGHPdbKNf1//ZDwlvAQuLYZk28tm.mAfJ15KpCc9bh2lhZBApra', 10, 'kasun@gmail.com'),
(16, '978888888V', 'madusanka', 'nipunajith', '$2y$10$blRxJdkdnmWjDBiEfZVPrenf0qCkWmA2Yva6RULCAZqPsJR98ATzK', 11, 'thugsnowball@gamil.com'),
(17, '973333333V', 'Pramodya', 'Sithumini', '$2y$10$YVUdst8.dMj4u.G2F2JP8O9ouiHnkMT.2r/ojXKNQFIqN6eKL.Y8u', 12, 'thugsnowball@gmail.com'),
(18, '991111111123', 'adithya', 'deshan', '$2y$10$e3OLQhGq3H9FtnwEdgZ3Xe74A/Mob45Or7FsHlZxcQB4EJigIwqoi', 10, 'madusankanipunajith@gmail.com'),
(19, '971111111V', 'madusanka', 'nipunajith', '$2y$10$QsIPj95SVuWrNHI9O37mjOU1aI0auuO42bZVEJqUkNyCRSvImdoZ6', 11, 'pramodyasithumini21@gmail.com'),
(21, '701234567V', 'Sunil', 'fernando', '$2y$10$a0ZYK52RZ4Q6ZDkkF2J9C.d0ruqCLlhDv0I14oHzD5vuLkOhaTvTe', 21, 'pramodyasithumini21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_hospital`
--

CREATE TABLE `blood_bank_hospital` (
  `HospitalID` int(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Capacity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_hospital`
--

INSERT INTO `blood_bank_hospital` (`HospitalID`, `Name`, `Address`, `District`, `Capacity`) VALUES
(10, 'Ragama Hospital', 'Ragama', 'Gampaha', 200),
(11, 'Ganemulla Hospitals', 'Ganemulla RD', 'Kaluthara', 0),
(12, 'Wathupitiwala General Hospital', 'Wathupitiwala RD', 'Gampaha', 0),
(13, 'Welisara Hospital', 'Welisara RD', 'Gampaha', 0),
(14, 'Horana Genaral Hospital', 'Horana RD', 'Kaluthara', 0),
(16, 'Balangoda Main Hospital', 'Balangoda RD', 'Balangoda', 0),
(17, 'Jaffna Hospital', 'Jaffna RD', 'Jaffna', 50),
(18, 'Hambanthota Genaral Hospital', 'Hambanthota RD', 'Hambanthota', 100),
(21, 'Bibila Genaral Hospital', 'Balangoda RD', 'Kandy', 200);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_hospital_telephone`
--

CREATE TABLE `blood_bank_hospital_telephone` (
  `BBID` int(10) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `Flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_hospital_telephone`
--

INSERT INTO `blood_bank_hospital_telephone` (`BBID`, `TelephoneNo`, `Flag`) VALUES
(10, '0667777777', 0),
(10, '0335555555', 1),
(11, '0661234567', 0),
(11, '0664444443', 1),
(12, '0331122246', 0),
(12, '0332345678', 1),
(13, '0332222222', 1),
(14, '0115555555', 1),
(16, '0662222222', 1),
(17, '0772222345', 1),
(18, '0112345678', 1),
(21, '0771234567', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_request`
--

CREATE TABLE `blood_bank_request` (
  `ID` int(10) NOT NULL,
  `SenderID` int(100) NOT NULL,
  `ReceiverID` int(10) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Amount` varchar(500) NOT NULL,
  `Dates` date NOT NULL,
  `Flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_request`
--

INSERT INTO `blood_bank_request` (`ID`, `SenderID`, `ReceiverID`, `Type`, `Amount`, `Dates`, `Flag`) VALUES
(0, 21, 10, 'O+', '300', '2020-12-09', 0),
(1, 11, 10, 'A+', '100', '2020-11-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `StockID` int(100) NOT NULL,
  `BloodID` int(10) NOT NULL,
  `Volume` int(10) DEFAULT NULL,
  `Volume2` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`StockID`, `BloodID`, `Volume`, `Volume2`) VALUES
(10, 1, 0, 0),
(10, 2, 0, 0),
(10, 3, 6, 2),
(10, 4, 0, 0),
(10, 5, 0, 0),
(10, 6, 0, 0),
(10, 7, 0, 0),
(10, 8, 0, 0),
(11, 1, 100, 0),
(11, 2, 450, 0),
(11, 3, 700, 0),
(11, 4, 100, 0),
(11, 5, 100, 0),
(11, 6, 450, 0),
(11, 7, 1000, 0),
(11, 8, 800, 0),
(12, 1, NULL, 0),
(12, 2, NULL, 0),
(12, 3, NULL, 0),
(12, 4, NULL, 0),
(12, 5, NULL, 0),
(12, 6, NULL, 0),
(12, 7, NULL, 0),
(12, 8, NULL, 0),
(13, 1, NULL, 0),
(13, 2, NULL, 0),
(13, 3, NULL, 0),
(13, 4, NULL, 0),
(13, 5, NULL, 0),
(13, 6, NULL, 0),
(13, 7, NULL, 0),
(13, 8, NULL, 0),
(14, 1, NULL, 0),
(14, 2, NULL, 0),
(14, 3, NULL, 0),
(14, 4, NULL, 0),
(14, 5, NULL, 0),
(14, 6, NULL, 0),
(14, 7, NULL, 0),
(14, 8, NULL, 0),
(16, 1, NULL, 0),
(16, 2, NULL, 0),
(16, 3, NULL, 0),
(16, 4, NULL, 0),
(16, 5, NULL, 0),
(16, 6, NULL, 0),
(16, 7, NULL, 0),
(16, 8, NULL, 0),
(17, 1, NULL, 0),
(17, 2, NULL, 0),
(17, 3, NULL, 0),
(17, 4, NULL, 0),
(17, 5, NULL, 0),
(17, 6, NULL, 0),
(17, 7, NULL, 0),
(17, 8, NULL, 0),
(18, 1, NULL, 0),
(18, 2, NULL, 0),
(18, 3, NULL, 0),
(18, 4, NULL, 0),
(18, 5, NULL, 0),
(18, 6, NULL, 0),
(18, 7, NULL, 0),
(18, 8, NULL, 0),
(21, 1, NULL, 0),
(21, 2, NULL, 0),
(21, 3, NULL, 0),
(21, 4, NULL, 0),
(21, 5, NULL, 0),
(21, 6, NULL, 0),
(21, 7, NULL, 0),
(21, 8, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `CampaignID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Location` varchar(500) NOT NULL,
  `Estimate` varchar(500) NOT NULL,
  `BHospitalID` int(10) NOT NULL,
  `Dates` varchar(12) NOT NULL,
  `Tme` time NOT NULL,
  `OrganizationID` varchar(100) NOT NULL,
  `Flag` tinyint(1) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`CampaignID`, `Name`, `Location`, `Estimate`, `BHospitalID`, `Dates`, `Tme`, `OrganizationID`, `Flag`, `Email`) VALUES
(27, 'Little Hearts', 'Jaffna School', '40', 10, '2020-11-27', '04:37:00', 'sandun', 1, ''),
(28, 'Thurunu Arana', 'colombo university UCSC premises', '1000', 10, '2020-12-23', '10:30:00', 'sandun', 0, ''),
(29, 'Le Binduwa', 'Oruthota Temple', '1000', 10, '2020-11-19', '10:00:00', 'sandun', 1, ''),
(30, 'Suwanda Saban', 'Gothami Junior School', '1000', 10, '2020-11-20', '10:30:00', 'Kuppa', 1, ''),
(31, 'Retro Donation', 'colombo university UCSC premises', '1000', 10, '2020-11-25', '10:00:00', 'dasun', 0, ''),
(32, 'yuthukama', 'Gothami Junior School', '1000', 10, '2020-11-21', '10:30:00', 'sandun', 0, ''),
(33, 'Rathu Palasa', 'Beside Ranjan Lanka , Gampaha', '1000', 10, '2020-11-25', '06:22:00', 'sandun', 2, ''),
(34, 'Rathu Palasa', 'Beside Ranjan Lanka , Gampaha', '1000', 10, '2020-12-10', '10:29:00', 'sandun', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cash_donation`
--

CREATE TABLE `cash_donation` (
  `CashID` int(100) NOT NULL,
  `RequesterID` varchar(10) NOT NULL,
  `Amount` int(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choose_campaign`
--

CREATE TABLE `choose_campaign` (
  `Id` int(100) NOT NULL,
  `campId` int(100) NOT NULL,
  `donorId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choose_hospital`
--

CREATE TABLE `choose_hospital` (
  `Id` int(100) NOT NULL,
  `donorId` int(100) NOT NULL,
  `hodId` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `Province`) VALUES
(1, 'Ampara', 'easet'),
(2, 'Anuradhapura', 'north central'),
(3, 'Badulla', 'uwa'),
(4, 'Batticoloa', 'easet'),
(5, 'Colombo', 'western'),
(6, 'Galle', 'southern'),
(7, 'Gampaha', 'western'),
(8, 'Hambanthota', 'southern'),
(9, 'Jaffna', 'north'),
(10, 'Kaluthara', 'western'),
(11, 'Kandy', 'central'),
(12, 'Kegalle', 'sabaragamuwa'),
(13, 'Kilinochchi', 'north'),
(14, 'Kurunegala', 'north western'),
(15, 'Mannar', 'north'),
(16, 'Mathale', 'central'),
(17, 'Mathara', 'southern'),
(18, 'Monaragala', 'uwa'),
(19, 'Mullativu', 'north'),
(20, 'Nuwara Eliya', 'central'),
(21, 'Polonnaruwa', 'north central'),
(22, 'Puttalam', 'north western'),
(23, 'Rathnapura', 'sabaragamuwa'),
(24, 'Trincomalee', 'easet'),
(25, 'Vavniya', 'north');

-- --------------------------------------------------------

--
-- Table structure for table `donate_campaign`
--

CREATE TABLE `donate_campaign` (
  `DonateID` int(100) NOT NULL,
  `CampID` int(100) NOT NULL,
  `SerialNumber` varchar(50) NOT NULL,
  `PacketNumber` varchar(50) NOT NULL,
  `HospitalID` int(10) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Dates` date NOT NULL,
  `Tme` time NOT NULL,
  `ExpDate` date NOT NULL,
  `Valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `donate_campaign`
--

INSERT INTO `donate_campaign` (`DonateID`, `CampID`, `SerialNumber`, `PacketNumber`, `HospitalID`, `DonorID`, `Dates`, `Tme`, `ExpDate`, `Valid`) VALUES
(1, 29, 'NN001 15', '4 01164 DD', 16, '201111111V', '2020-11-19', '12:12:12', '2020-12-18', 1),
(19, 34, 'NN001 15', '4 01169 DD', 10, '980000000V', '2020-12-24', '17:43:50', '2020-12-31', 1),
(20, 34, 'NN001 15', '4 01170 DD', 10, '975555555V', '2020-12-22', '17:44:38', '2020-12-31', 1),
(21, 34, 'NN001 15', '4 01171 DD', 10, '972723818V', '2020-12-22', '17:45:16', '2020-12-31', 1),
(22, 34, 'NN001 15', '4 01172 DD', 10, '971111111V', '2020-12-22', '17:45:46', '2020-12-31', 1),
(23, 29, 'NN001 15', '4 01265 DD', 10, '971234567V', '2020-12-26', '10:00:20', '2021-01-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donate_hospital`
--

CREATE TABLE `donate_hospital` (
  `DonateID` int(100) NOT NULL,
  `SerialNumber` varchar(50) NOT NULL,
  `PacketNumber` varchar(100) NOT NULL,
  `HospitalID` int(100) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Dates` date NOT NULL,
  `ExpDate` date NOT NULL,
  `Tme` time NOT NULL,
  `Valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_hospital`
--

INSERT INTO `donate_hospital` (`DonateID`, `SerialNumber`, `PacketNumber`, `HospitalID`, `DonorID`, `Dates`, `ExpDate`, `Tme`, `Valid`) VALUES
(26, 'NN001 15', '4 01165 DD', 10, '970000001V', '2020-12-22', '2021-01-02', '17:09:21', 1),
(29, 'NN001 15', '4 01166 DD', 16, '893333333V', '2020-12-22', '2020-12-31', '17:41:50', 0),
(30, 'NN001 15', '4 01167 DD', 10, '972223223V', '2020-12-22', '2020-12-31', '17:42:29', 1),
(31, 'NN001 15', '4 01168 DD', 10, '980000000V', '2020-12-23', '2020-12-31', '17:43:06', 1),
(32, 'NN001 15', '4 01120 DD', 10, '980000000v', '2020-12-31', '2021-01-28', '13:04:51', 1),
(33, 'NN001 15', '4 01121 DD', 14, '201111111V', '2020-12-31', '2021-01-28', '13:06:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `nic` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `bloodgroup` varchar(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `district` varchar(20) NOT NULL,
  `addressline1` varchar(255) NOT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(5000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `validation` int(1) NOT NULL DEFAULT 0,
  `privacy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`nic`, `password`, `first_name`, `last_name`, `dob`, `bloodgroup`, `gender`, `district`, `addressline1`, `addressline2`, `email`, `status`, `created_at`, `validation`, `privacy`) VALUES
('201111111V', '$2y$10$B8CitvWMwkawxQqkIQLOsOGNhu5xj20oFgtnZWCB9zbhXXb9HeGPu', 'Pramodya', 'Sithumini', '2020-11-13', 'B+', 'female', 'Gampaha', '168/B Oruthota , Gampaha', '', 'pramodyasithumini21@gmail.com', '????^S? ?y?j', '2020-11-11 17:42:54', 1, 0),
('651234567V', '$2y$10$X5.rOKgkLbpQDfpqZMoYLeSTKtGPlXt/2V6YjKxRMDJ3IeW/NZAK6', 'Chandani', 'Amarasingha', '2020-11-05', 'O-', 'female', 'Gampaha', '168/B Oruthota , Gampaha', '', 'chandani@gmail.com', '', '2020-11-22 23:09:53', 1, 0),
('652345678V', '$2y$10$MakOgJFLLUxfRrbzuxo6.uoWWx7S9Q2Ng6i4ArpddAFaQlStpgAMm', 'Sunil', 'Wickramaarachchi', '2020-11-01', 'AB+', 'male', 'Gampaha', '168/D Oruthota , Gampaha', '', 'thugsnowball@gmail.com', '', '2020-11-17 17:55:37', 1, 0),
('861234567V', '$2y$10$v6DsaZPSQmolI.CEOfcpAeQ31Ay6GPhaIpxNolq.G/t6nCU7Liysy', 'Kasun', 'Kalhara', '1992-01-06', 'A+', 'male', 'Kandy', '121/1, Kandy RD, Kandy', '', 'kasuns@gmail.com', '', '2020-11-22 22:58:13', 0, 0),
('881212121V', '$2y$10$eWW6PGcAcn6FugtWiZIMSeD13M/nBhMsJZZgn6TUJKLuphiPGBCSG', 'Angelo', 'Mathews', '2020-11-03', 'AB+', 'male', 'Mathara', '168/D Oruthota , Gampaha', '', 'angelo@gmail.com', '', '2020-11-22 23:00:32', 1, 0),
('893333333V', '$2y$10$L7Fu552VIFu8xvpjmU7A7e30lNtsgYLXVtRYG5GTCK7HTaOA48q8y', 'Amali', 'Perera', '1989-06-21', 'AB+', 'female', 'Kandy', '121/2, Kandy Rd, Kandy', '', 'amali@gmail.com', 'nlXK', '2020-11-21 13:08:05', 0, 0),
('960410580V', '$2y$10$GXebwhGMcgixFXqXCbWIN.yC6FsLth6NIVs81AARBQ9TU6DbmLI3C', 'Himal', 'Malith', '2020-10-17', 'O+', 'male', 'Ampara', 'Haggamuwa Road, Alankulama, Sravasthipura', 'Kolila 3', 'dphmalith@gmail.com', '', '2020-10-29 11:59:30', 1, 0),
('970000001V', '$2y$10$ZaRaXGII8x7FvShIdz.JlOKt6yJ.WDU5fUPys4ZR6eLlkBQeaaH56', 'Madusanka', 'Nipunajith', '2020-11-03', 'B+', 'male', 'Ampara', '168/B Oruthota , Gampaha', '', 'madushankanipunajith@gmail.com', 'kXPzWFGRtD5RFvc=', '2020-11-15 18:25:31', 1, 0),
('971111111V', '$2y$10$1wNJCn7cP8e2NEKi/XYv0.z6CktklqQQEnVHnXR/NjxkqoiyAM9rW', 'Ranmal', 'Rathnayaka', '2020-10-01', 'O+', 'male', 'Batticaloa', '87/5, yagoda rd', 'yagoda', 'kanna@gmail.com', 'sXPzWFGRtD5RFvc=', '2020-10-25 10:27:48', 1, 0),
('971234567V', '$2y$10$CBSduHtpmshSlsrUnCClDuWPNTbywSSMguNOGRKMRppi5DOCPu7my', 'Chathuras', 'Silva', '2020-10-24', 'A+', 'male', 'Gampaha', '87/5, yagoda rd', 'yagoda', 'madushankanipunajith@gmail.com', 'r3PpHBCLtH9UDL8os7JfEmU7ViQQYQ==', '2020-10-24 23:15:46', 1, 1),
('972222222V', '$2y$10$wOgcMtTN.5/bJrczgXaRLeSnxPiSZ2W7Z8leLfT11WAmBls35DOUa', 'Nimal', 'Lanzza', '2020-10-11', 'B+', 'male', 'Matale', '87/5, yagoda rd', 'yagoda', 'samantha@gmail.com', 'j3PpHBmYpzodKtYZ/LlSQWg/RC1KKYvX+i4bCz2o/L72HKevWn7hO/14hBUA9R6bfhg=', '2020-10-25 10:40:06', 0, 0),
('972223223V', '$2y$10$.rHmeUOnstRGvHOzYNCyce23ufxI1k3JRqQO3VqZnPnSBDrXQYkGi', 'Dinelka', 'Basnayaka', '2020-11-04', 'B+', 'male', 'Gampaha', '168/B Oruthota , Gampaha', '', 'd@gmail.com', 'kXPzWFGRtD5RFvc=', '2020-11-22 23:08:37', 1, 0),
('972723818V', '$2y$10$gb2gaBvDVo45RDm3QNX82uPrAt0.47CLH2CmSAfmwyTh4aGtARXKe', 'Adithya', 'Deshan', '2020-03-10', 'O+', 'male', 'Gampaha', '168C,Oruthota,Gampaha', '', 'desh@gmail.com', 'kXPzWFGRtD5RFvc=', '2020-10-26 09:34:22', 1, 0),
('972723819V', '$2y$10$CBSduHtpmshSlsrUnCClDuWPNTbywSSMguNOGRKMRppi5DOCPu7my', 'Madusanka', 'Nipunajith', '2020-10-06', 'B+', 'male', 'Gampaha', '168B,Oruthota,Gampaha', '', 'madushankanipunajith@gmail.com', '', '2020-10-26 09:28:49', 1, 0),
('973333333V', '$2y$10$9H2W4JUjK2c5pZTbMFtK2.KxdMwLQa59s0jZQiscmn/WL8hok/NYu', 'Amal', 'Perera', '2020-10-06', 'B+', 'male', 'Matale', '87/5, yagoda rd', 'yagoda', 'amal@gmail.com', '', '2020-10-25 11:26:15', 0, 0),
('975555555V', '$2y$10$g4KyI3h5zre54Pf/G1leieGvDkhXpugJwpjTsx4aD2SSvv1O03dja', 'Lila', 'Gunasekara', '2020-11-02', 'B-', 'female', 'Matale', '87/5, yagoda rd', 'yagoda', 'kcjgjuydutdkuh@gmail.com', 'kXPzWFGRtDNcFvc=', '2020-11-05 03:56:37', 1, 0),
('976666666V', '$2y$10$CBSduHtpmshSlsrUnCClDuWPNTbywSSMguNOGRKMRppi5DOCPu7my', 'Nuwan', 'Pradeep', '2020-10-25', 'AB+', 'male', 'Mannar', '87/5, yagoda rd', 'yagoda', 'madushankanipunajith@gmail.com', '', '2020-10-29 23:32:21', 1, 0),
('978888888V', '$2y$10$12DA6/LsQ9TOmRmxsYzhROrsg9UG6SBrZmkSfk.wQOJtzLaojb/KK', 'Adithya', 'Deshan', '2020-10-02', 'O+', 'male', 'Colombo', '168/B Oruthota , Gampaha', '', 'madushankanipunajith@gmail.com', '', '2020-11-09 21:33:17', 1, 0),
('980000000V', '$2y$10$FmWgIAc7N42Y36aqFv0BLeuyokBpI/EfVzfFiiupTS6LIFF4/hjLS', 'Nisura', 'Rupasinghe', '1998-09-23', 'A+', 'male', 'Gampaha', '168/A Oruthota , Gampaha', '', 'nisurarupasingha@gmail.com', '????^S? ?y?j', '2020-11-21 13:31:12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_reservation`
--

CREATE TABLE `donor_reservation` (
  `ID` int(10) NOT NULL,
  `HosID` int(10) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Dates` date NOT NULL,
  `Tme` time NOT NULL,
  `Flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_reservation`
--

INSERT INTO `donor_reservation` (`ID`, `HosID`, `DonorID`, `Dates`, `Tme`, `Flag`) VALUES
(10, 10, '971234567V', '2020-11-09', '17:00:00', 1),
(11, 10, '971234567V', '2020-11-11', '16:10:00', 2),
(12, 10, '971234567V', '2020-11-14', '10:59:00', 1),
(13, 10, '971234567V', '2020-11-14', '10:10:00', 2),
(14, 10, '971234567V', '2020-11-13', '15:30:00', 1),
(15, 10, '971234567V', '2020-11-28', '09:10:00', 1),
(16, 10, '970000001V', '2020-11-24', '10:50:00', 1),
(17, 10, '972723818V', '2020-11-24', '10:30:00', 2),
(18, 10, '971234567V', '2020-11-30', '10:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_satisfaction`
--

CREATE TABLE `donor_satisfaction` (
  `HospitalID` int(5) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Satisfaction` int(2) NOT NULL,
  `Validation` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_satisfaction`
--

INSERT INTO `donor_satisfaction` (`HospitalID`, `DonorID`, `Satisfaction`, `Validation`) VALUES
(10, '201111111V', 0, 1),
(10, '893333333V', 0, 0),
(10, '970000001V', 0, 1),
(10, '971111111v', 0, 1),
(10, '971234567v', 1, 1),
(10, '972222222v', 0, 0),
(10, '972223223V', 0, 1),
(10, '980000000V', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor_telephone`
--

CREATE TABLE `donor_telephone` (
  `NIC` varchar(15) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_telephone`
--

INSERT INTO `donor_telephone` (`NIC`, `TelephoneNo`, `Flag`) VALUES
('201111111V', '0332233782', 1),
('651234567V', '0332222332', 1),
('652345678V', '0332233378', 0),
('652345678V', '0112345678', 1),
('861234567V', '0778989898', 1),
('881212121V', '0112222234', 1),
('893333333V', '0714053999', 0),
('893333333V', '0112345677', 1),
('960410580V', '0767239908', 1),
('970000001V', '0771234567', 1),
('971111111V', '0556666666', 0),
('971111111V', '0332222222', 1),
('971234567V', '0997777777', 0),
('971234567V', '0225555555', 1),
('972222222V', '0331111111', 0),
('972222222V', '0665555555', 1),
('972223223V', '0112222223', 1),
('972723818V', '0332234782', 0),
('972723818V', '0332228526', 1),
('972723819V', '', 0),
('972723819V', '0712081918', 1),
('973333333V', '0332121252', 0),
('973333333V', '0332121212', 1),
('975555555V', '0665555555', 0),
('975555555V', '0664444444', 1),
('976666666V', '0665555555', 0),
('976666666V', '0334444444', 1),
('978888888V', '0332233782', 1),
('980000000V', '0335676897', 1);

-- --------------------------------------------------------

--
-- Table structure for table `normal_blood_request`
--

CREATE TABLE `normal_blood_request` (
  `ID` int(100) NOT NULL,
  `SenderID` varchar(100) NOT NULL,
  `ReceiverID` int(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Amount` varchar(500) NOT NULL,
  `Dates` date NOT NULL,
  `Flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_blood_request`
--

INSERT INTO `normal_blood_request` (`ID`, `SenderID`, `ReceiverID`, `Type`, `Amount`, `Dates`, `Flag`) VALUES
(2, 'Janith', 10, 'A+', '200', '2020-11-19', 0),
(3, 'Janith', 10, 'B+', '100', '2020-11-19', 2),
(4, 'Kamal', 11, 'A+', '500', '2020-11-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `normal_hospital`
--

CREATE TABLE `normal_hospital` (
  `UserName` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `District` varchar(15) NOT NULL,
  `Chief` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_hospital`
--

INSERT INTO `normal_hospital` (`UserName`, `Name`, `Address`, `District`, `Chief`, `Password`, `Email`) VALUES
('971234567V', 'Yagoda Hospital', 'Yaogda RD, Yagoda', 'Gampaha', 'Dr. Amila', '$2y$10$YvYtNUTwkxpIilQZspsqe.6ZHfP8a82RVsIJz5EM5EU.N2EugB0UK', ''),
('Gune', 'Ja-ela Hospital', 'Ragama', 'Batticaloa', 'Dr. Gune', '$2y$10$QhHlwNnNcnsNpT03qPaczemG.uw8HuzeLCZ9lfXgdZjP2lxjgTco2', ''),
('hambanHos', 'hambanthota hospital', 'sooriyawewa, hambanthota', 'Hambantota', 'dr. hambanthota', '$2y$10$wQqVGNDalQc0C2thQPCOteJBIXyoEgEPMUhLoNthlEeocGwVzgZui', ''),
('himajimn_bloodbank', 'jaffna hospital', 'kilinochchi', 'Jaffna', 'dr. jaffna', '$2y$10$oMxWzQY0db.pMpPgYFIowehRWI7rKskallw4Hv2t9ScVc0uaZlOBK', ''),
('Hospitalku', 'kuliyapitiya hospital', 'kuliyaitiya, kurunegala', 'kuruneala', 'Dr. Nimal', '$2y$10$FjR3QX.0KJmhN3vVblIol.tywAcx1PmXjJIfMmTyG6Ipgu7k5.CzW', ''),
('Janith', 'Yagoda isapiritale', '168b, Oruthota', 'Gampaha', 'MaduRox', '$2y$10$zovRL/pFt1STomeoIUZGzelBM2gH0F/ZrJH7zeMWGlUqL/m9cztcC', ''),
('Kamal', 'Oruthota Hospital', '168/B Oruthota, Gampaha', 'Gampaha', 'Dr. Kamalani Herath', '$2y$10$dQw0ICXSa2pA9gNbh1mOju0kCeaCLVRKnJBrPGjqjB/XuVuPh53vW', 'madushankanipunajith@gmail.com'),
('Kuhospital', 'kurunegala teaching hospital', 'colombo road, kurunegala', 'kurunegala', 'Dr. C.Perera', '$2y$10$kim4vJcJx9u25SyprBwnheR/Q78GCp0ClUDpR1kMg0OVoVj40Ob8G', ''),
('main', 'main', 'main', 'Badulla', 'main', '$2y$10$l3kSN2LMs91tkCI2/sAPSOqe/HnVE2aFOX1ITPY8vq4MGcAfolNDG', ''),
('maintest', 'main', 'main', 'Ampara', 'main', '$2y$10$/6c7awJUaKm9Yain7.IAG./g32XjStbb/6CQX.7oNTMbgAwpTTSIK', 'main@gmail.com'),
('Perera@123', 'Anuradhapura Hospital', 'Anuradhapura RD, Anuradhapura', 'Anuradhapura', 'Dr. Kasun Perera', '$2y$10$6D7DWT0IxwUukjaodDk/H.AVk8qgkJY8ZGDDfs3wziOXKX0U2/dAa', 'pramodyasithumini21@gmail.com'),
('Sumudu', 'Rathnapura Hospital', 'Rathnapura RD', 'Rathnapura', 'Dr. Sumudu Manaskantha', '$2y$10$mVS5tGOfiAeteLYPKzkZJ.jUxbB8I41/Atf7ukN8orwTbsg8Ub41K', 'sumudumanas123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `normal_hospital_telephone`
--

CREATE TABLE `normal_hospital_telephone` (
  `username` varchar(100) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_hospital_telephone`
--

INSERT INTO `normal_hospital_telephone` (`username`, `TelephoneNo`, `flag`) VALUES
('Janith', '0712081918', 1),
('Kamal', '0771234567', 0),
('Kamal', '0712081918', 1),
('main', '764322123', 1),
('maintest', '764322123', 1),
('Perera@123', '0113456666', 0),
('Perera@123', '0712081918', 1),
('Sumudu', '0776543567', 0),
('Sumudu', '0712081918', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `UserName` varchar(100) NOT NULL,
  `OrganizationName` varchar(200) NOT NULL,
  `District` varchar(50) NOT NULL,
  `President` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Purpose` varchar(500) NOT NULL,
  `Created_At` datetime DEFAULT current_timestamp(),
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`UserName`, `OrganizationName`, `District`, `President`, `Password`, `Purpose`, `Created_At`, `Email`) VALUES
('951111111V', 'Ganga Addara', 'Colombo', 'pasindu', '$2y$10$Z.zIPWqbZjQ7A6XDTN1dLOUVEh84q6tzi6bD3u8VCmrM1SQ9YiSB2', 'To help people', '2020-10-26 09:41:31', 'pasi@gmail.com'),
('Chathura', 'Ada Derana', 'Colombo', 'Chathura alwis', '$2y$10$meIiWIWreWUtTg67HQ4g3.5cjihsBz2dcBKw7sXO6tx6oovtfI6gO', '', '2020-11-21 15:22:40', 'chathuraalwis@gmail.com'),
('dasun', 'UCSC Retro Club', 'Colombo', 'Dasun Rajapaksha', '$2y$10$l.Bl4UJQbsmW2pnGsrJBje/la8/0Csbo5L85782W617d7R6gYKGJm', 'to help people', '2020-11-15 22:03:57', 'madushankanipunajith@gmail.com'),
('hfyuryf', 'hrurhhg', 'Ampara', 'hdjhfsih', '$2y$10$JqqSDOKcPa5jgAlfSBfAhukFE4LHVZsOw94LBFmVvGYptWYjAcB8u', '', '2020-11-02 09:24:37', 'hfhutk@gmail.com'),
('kanna', 'Kanna stor', 'Colombo', 'Pissu Kanna', '$2y$10$PeCjCsiPmTd9GzFb8pjec.wH1//wd8g86/REt3wiK6gA5FDbyKncK', 'Mmmmmmmmmmmmmmmmmmmm.........                                                                                                                                                                                                                                                                                                ', '2020-10-25 01:45:25', 'jgfufvuhgxdyfixcyfr@gmail.com'),
('Kuppa', 'Thurunu Sawiya', 'Kegalle', 'Sookiri Banda', '$2y$10$qTiR9zwHk6qn6QhParCz7.CI0tYQxfd5FGUMLQoKqK/EfjY/1e5eO', 'to help people                                            ', '2020-10-30 07:59:25', 'madushankanipunajith@gmail.com'),
('lkjhgfd', 'saman kakulu', 'Galle', 'nimal', '$2y$10$4eYVybYuVRbj5ZGqFfQf9.zKZvfmnqx/.81QP0Mi96IKIE40uzwdS', '', '2020-10-27 11:20:16', 'nimal2@gmail.com'),
('madusanka', 'Thurunu Shakthi', 'Gampaha', 'madusanka nipunajith', '$2y$10$og/acnDwjpd/NFsi.9fZEenle9ORNDWSk/vdHLKl3d67c6YKyOUce', 'xxx', '2020-11-06 17:37:48', 'madushankanipunajith@gmail.com'),
('nimalK', 'Yuthukama youth', 'Ampara', 'nimal', '$2y$10$FlNjTChjkcHcAXM2hpZkBuHu8lNTPmDHNXeWZbpt5pXbly5bu/40O', '', '2020-10-27 03:11:21', 'yuth@gmail.com'),
('samanK1', 'Liya Thambara', 'Kurunegala', 'Saman', '$2y$10$HbsgePFq8.bp8elPsOM4NuhWqQn.wf2zb8jbuFWK9i3aqRzXCLcna', '                                                                                                ', '2020-10-27 02:43:28', 'liya@gmail.com'),
('sandun', 'Muthu Ahura', 'Gampaha', 'sandun galpatha', '$2y$10$v.LLSWmavmdkiUSbExGxOOmDnwi.zhPpfRg8Cjox4f8MPeO3pQvkW', ' to help people                                                                                                                                                                                         ', '2020-10-25 09:24:39', 'gayanlaksiri@gmail.com'),
('sookiri', 'Suwanda Saban', 'Kurunegala', 'Nana Sookiri banda', '$2y$10$SqT.Jr.30muVsqBmuNaOYOLq1G3dqNHt/Sgs9j60Y8iHXuXKM9rkG', 'ow****', '2020-10-25 10:42:26', 'suwanda@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organization_telephone`
--

CREATE TABLE `organization_telephone` (
  `OrgId` varchar(100) NOT NULL,
  `TelephoneNo` varchar(11) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_telephone`
--

INSERT INTO `organization_telephone` (`OrgId`, `TelephoneNo`, `Flag`) VALUES
('951111111V', '0332234782', 1),
('Chathura', '0772344534', 0),
('Chathura', '0116758443', 1),
('dasun', '0332233782', 0),
('dasun', '0712081918', 1),
('hfyuryf', '1232134567', 1),
('kanna', '0335555555', 0),
('kanna', '0334444444', 1),
('Kuppa', '0668888888', 0),
('Kuppa', '0221111111', 1),
('lkjhgfd', '0764322123', 1),
('madusanka', '0712081918', 1),
('nimalK', '9875678754', 1),
('samanK1', '0335555555', 0),
('samanK1', '0987654321', 1),
('sandun', '0330000000', 0),
('sandun', '0331111112', 1),
('sookiri', '0112222222', 0),
('sookiri', '0223333333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(1, 'madushankanipunajith@gmail.com', '1748518fa866624f1628966ee454dfdde96ffabb457cd5c6a90638a3853775b8b6f025ca2ebcf1300732cb3ab01b9c4077bd'),
(2, 'thugsnowball@gamil.com', 'af387996908892419c54801ffe26cf86af8032682a67f39382452dd1799cf57891e4dad7ed6738277a1cecfe829574f06fe4'),
(3, 'thugsnowball@gmail.com', 'b8e211723e7d8d5195943bf33fb600d285704bc6309890bfd741bdc210b7135c512da01ff5c3d7cb6c458a1dd4f18c4b5184');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `NIC` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`NIC`, `Name`, `District`) VALUES
('923456789V', 'Arjuna Ranathunga', 'Kandy'),
('941234555V', 'Maleesha Silva', 'Kandy'),
('971234567V', 'Kasun Kalhara', 'Kegalle'),
('972723819V', 'madusanka nipunajith', 'Gampaha');

-- --------------------------------------------------------

--
-- Table structure for table `requestor`
--

CREATE TABLE `requestor` (
  `NIC` varchar(15) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Lane1` varchar(100) NOT NULL,
  `Lane2` varchar(20) DEFAULT NULL,
  `District` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestor`
--

INSERT INTO `requestor` (`NIC`, `FirstName`, `LastName`, `DateOfBirth`, `Password`, `Lane1`, `Lane2`, `District`, `Province`, `Gender`, `CreatedAt`, `Email`) VALUES
('901212121V', 'Sunil', 'maniseharan', '2020-11-01', '$2y$10$IYhf7HZ01pU43HtcdFlLmOraoA/WHhzo10sa4WMhEEYIAuxYbYlia', '111/1 mg RD, Jaffna', '', 'Jaffna', 'north', 'male', '2020-11-22 23:13:59', 'mani@gmail.com'),
('931212121V', 'Pasindu', 'Kaushan', '2020-11-05', '$2y$10$GmD1Eh7z6gAZBViEoAQGHupbUdBAiuTsLvkahL5QtJ52Om54PmgSq', '122/2 Rathnapura Rd, Rathnapura', '', 'Rathnapura', 'sabaragamuwa', 'male', '2020-11-22 23:15:49', 'pasindy@gmail.com'),
('960000000V', 'Roy', 'Perera', '1996-06-12', '$2y$10$IJNkM0zlrVl9w9lDrO/ydeHphgKIaRfHd.gXq3qJqBV8VztER46dO', '168/D , Galauda', '', 'Badulla', 'uwa', 'male', '2020-11-21 14:09:09', 'royperera@gmail.com'),
('960410580V', 'Himal', 'Malith', '2020-10-23', '$2y$10$2L4ZxthHvkgINsJRjdBnV.LqOwJeZdzDncmgtqYUcFZm8lM7PzO4O', 'Haggamuwa Road, Alankulama, Sravasthipura', 'Kolila 3', 'Anuradhapura', 'north central', 'male', '2020-10-27 12:36:25', ''),
('972222222V', 'Madusanka', 'Nipunajith', '1997-09-28', '$2y$10$lnUZi/HzCtmyrmAgZlCN5.F.MupI6nSZgsT/b2Pqq.RwWGDYoM84S', '168/B Oruthota , Gampaha', '', 'Gampaha', 'western', 'male', '2020-11-21 14:44:37', 'madushankanipunajith@gmail.com'),
('973333333V', 'csccsc', 'sbdsbd', '2020-10-16', '$2y$10$LWFB9BBUSoIH09uIP1SZq.f.U3GoHv9UExv3RpLD8NnL83ikgr7.a', 'kandy', '', 'Kandy', 'central', 'female', '2020-10-30 10:08:34', 'thugsnowball@gmail.com'),
('978888888V', 'Gayan', 'Laksiri', '2020-10-13', '$2y$10$0iJc1ntHw0Ms38BNVrElWepLAPDRuXyP5l4ROmjIOgFdWuGYS7QTa', '87/5, yagoda rd', 'yagoda', 'Colombo', 'western', 'male', '2020-10-30 07:48:05', 'gayanlaksiri@gmail.com'),
('981234566V', 'Adithya', 'Deshan', '1998-10-21', '$2y$10$ZO7ocjir7F91tEuEnghhSO9yVOFfbG9wpZvl9UUV44shuOA15e0F6', '168/C, Oruthota , Gampaha', '', 'Gampaha', 'western', 'male', '2020-11-21 13:11:56', 'thugsnowball@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `requestor_telephone`
--

CREATE TABLE `requestor_telephone` (
  `NIC` varchar(15) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestor_telephone`
--

INSERT INTO `requestor_telephone` (`NIC`, `TelephoneNo`, `Flag`) VALUES
('901212121V', '0771234567', 1),
('931212121V', '0714057234', 1),
('960000000V', '0227776587', 1),
('960410580V', '0767239908', 1),
('972222222V', '0712081918', 0),
('972222222V', '0332233782', 1),
('973333333V', '', 0),
('973333333V', '0765433213', 1),
('978888888V', '0663333333', 0),
('978888888V', '0336666666', 1),
('981234566V', '0712345677', 0),
('981234566V', '0332228526', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `SID` int(3) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`SID`, `UserName`, `Password`, `Email`) VALUES
(1, 'Anonymus', '$2y$10$LrU6qeB8iUaB22qjZPentu9vMSwVXvAMNWV00bmShvCZUa4tDsVBW', 'madushankanipunajith@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transfusion`
--

CREATE TABLE `transfusion` (
  `SerialNumber` varchar(15) NOT NULL,
  `PacketNumber` varchar(15) NOT NULL,
  `PNIC` varchar(15) NOT NULL,
  `DNIC` varchar(15) NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfusion`
--

INSERT INTO `transfusion` (`SerialNumber`, `PacketNumber`, `PNIC`, `DNIC`, `Dates`) VALUES
('NN001 15', '4 01164 DD', '972723819V', '201111111V', '2020-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`BloodID`);

--
-- Indexes for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  ADD PRIMARY KEY (`BAdminID`),
  ADD KEY `BloodBankID` (`BloodBankID`);

--
-- Indexes for table `blood_bank_hospital`
--
ALTER TABLE `blood_bank_hospital`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `blood_bank_hospital_telephone`
--
ALTER TABLE `blood_bank_hospital_telephone`
  ADD PRIMARY KEY (`BBID`,`TelephoneNo`),
  ADD KEY `BBTP` (`BBID`,`Flag`);

--
-- Indexes for table `blood_bank_request`
--
ALTER TABLE `blood_bank_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceiverID` (`ReceiverID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`StockID`,`BloodID`),
  ADD KEY `blood_stock_ibfk_2` (`BloodID`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `campaign_ibfk_3` (`BHospitalID`),
  ADD KEY `campaign_ibfk_4` (`OrganizationID`);

--
-- Indexes for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD PRIMARY KEY (`CashID`),
  ADD KEY `cash_donation_ibfk_1` (`RequesterID`);

--
-- Indexes for table `choose_campaign`
--
ALTER TABLE `choose_campaign`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `choose_hospital`
--
ALTER TABLE `choose_hospital`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  ADD PRIMARY KEY (`DonateID`),
  ADD KEY `donate_campaign_ibfk_3` (`CampID`),
  ADD KEY `donate_campaign_ibfk_5` (`DonorID`),
  ADD KEY `donate_campaign_ibfk_4` (`HospitalID`);

--
-- Indexes for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  ADD PRIMARY KEY (`DonateID`),
  ADD KEY `hosId` (`HospitalID`),
  ADD KEY `donate_hospital_ibfk_2` (`DonorID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HosID` (`HosID`),
  ADD KEY `DonorID` (`DonorID`);

--
-- Indexes for table `donor_satisfaction`
--
ALTER TABLE `donor_satisfaction`
  ADD PRIMARY KEY (`HospitalID`,`DonorID`),
  ADD KEY `DonorID` (`DonorID`);

--
-- Indexes for table `donor_telephone`
--
ALTER TABLE `donor_telephone`
  ADD PRIMARY KEY (`NIC`,`TelephoneNo`),
  ADD KEY `DTP` (`NIC`,`Flag`);

--
-- Indexes for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `ReceiverID` (`ReceiverID`);

--
-- Indexes for table `normal_hospital`
--
ALTER TABLE `normal_hospital`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `normal_hospital_telephone`
--
ALTER TABLE `normal_hospital_telephone`
  ADD PRIMARY KEY (`TelephoneNo`,`username`) USING BTREE,
  ADD KEY `username` (`username`),
  ADD KEY `NHTP` (`username`,`flag`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `organization_telephone`
--
ALTER TABLE `organization_telephone`
  ADD PRIMARY KEY (`TelephoneNo`,`OrgId`) USING BTREE,
  ADD KEY `OrgId` (`OrgId`),
  ADD KEY `OTP` (`OrgId`,`Flag`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `requestor`
--
ALTER TABLE `requestor`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `requestor_telephone`
--
ALTER TABLE `requestor_telephone`
  ADD PRIMARY KEY (`NIC`,`TelephoneNo`),
  ADD KEY `RTP` (`NIC`,`Flag`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `transfusion`
--
ALTER TABLE `transfusion`
  ADD PRIMARY KEY (`SerialNumber`,`PacketNumber`),
  ADD KEY `PNIC` (`PNIC`),
  ADD KEY `transfusion_index` (`Dates`),
  ADD KEY `transfusion_ibfk_1` (`DNIC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  MODIFY `BAdminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blood_bank_hospital`
--
ALTER TABLE `blood_bank_hospital`
  MODIFY `HospitalID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `CampaignID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cash_donation`
--
ALTER TABLE `cash_donation`
  MODIFY `CashID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choose_campaign`
--
ALTER TABLE `choose_campaign`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choose_hospital`
--
ALTER TABLE `choose_hospital`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  MODIFY `DonateID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  MODIFY `DonateID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `SID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  ADD CONSTRAINT `blood_bank_admin_ibfk_1` FOREIGN KEY (`BloodBankID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_bank_hospital_telephone`
--
ALTER TABLE `blood_bank_hospital_telephone`
  ADD CONSTRAINT `blood_bank_hospital_telephone_ibfk_1` FOREIGN KEY (`BBID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_bank_request`
--
ALTER TABLE `blood_bank_request`
  ADD CONSTRAINT `blood_bank_request_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_bank_request_ibfk_3` FOREIGN KEY (`ReceiverID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD CONSTRAINT `blood_stock_ibfk_1` FOREIGN KEY (`StockID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_stock_ibfk_2` FOREIGN KEY (`BloodID`) REFERENCES `blood` (`BloodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_3` FOREIGN KEY (`BHospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_ibfk_4` FOREIGN KEY (`OrganizationID`) REFERENCES `organization` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD CONSTRAINT `cash_donation_ibfk_1` FOREIGN KEY (`RequesterID`) REFERENCES `requestor` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  ADD CONSTRAINT `donate_campaign_ibfk_3` FOREIGN KEY (`CampID`) REFERENCES `campaign` (`CampaignID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donate_campaign_ibfk_4` FOREIGN KEY (`HospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donate_campaign_ibfk_5` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  ADD CONSTRAINT `donate_hospital_ibfk_1` FOREIGN KEY (`HospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donate_hospital_ibfk_2` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  ADD CONSTRAINT `donor_reservation_ibfk_1` FOREIGN KEY (`HosID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_reservation_ibfk_2` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_satisfaction`
--
ALTER TABLE `donor_satisfaction`
  ADD CONSTRAINT `donor_satisfaction_ibfk_1` FOREIGN KEY (`HospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_satisfaction_ibfk_2` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_telephone`
--
ALTER TABLE `donor_telephone`
  ADD CONSTRAINT `donor_telephone_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  ADD CONSTRAINT `normal_blood_request_ibfk_1` FOREIGN KEY (`ReceiverID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `normal_blood_request_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `normal_hospital` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_hospital_telephone`
--
ALTER TABLE `normal_hospital_telephone`
  ADD CONSTRAINT `normal_hospital_telephone_ibfk_1` FOREIGN KEY (`username`) REFERENCES `normal_hospital` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization_telephone`
--
ALTER TABLE `organization_telephone`
  ADD CONSTRAINT `organization_telephone_ibfk_1` FOREIGN KEY (`OrgId`) REFERENCES `organization` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requestor_telephone`
--
ALTER TABLE `requestor_telephone`
  ADD CONSTRAINT `requestor_telephone_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `requestor` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfusion`
--
ALTER TABLE `transfusion`
  ADD CONSTRAINT `transfusion_ibfk_1` FOREIGN KEY (`DNIC`) REFERENCES `donor` (`nic`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transfusion_ibfk_2` FOREIGN KEY (`PNIC`) REFERENCES `patient` (`NIC`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
