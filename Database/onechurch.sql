-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onechurch`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `property` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `transaction_amount` int(12) NOT NULL,
  `transaction_ref` int(12) NOT NULL,
  `transaction_method` varchar(255) DEFAULT NULL,
  `deposited_by` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `bankname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `account_no` int(15) NOT NULL,
  `currency` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expence`
--

CREATE TABLE `expence` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `resoan` varchar(500) NOT NULL,
  `expense` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expensecategory`
--

CREATE TABLE `expensecategory` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `details` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expensecategory`
--

INSERT INTO `expensecategory` (`id`, `categoryname`, `details`, `creation_date`) VALUES
(1, 'Office supplies', 'for office use', '2022-03-11 06:22:27'),
(3, 'Equipment', 'For office use', '2022-03-11 06:22:23'),
(4, 'Rent', 'For office use', '2022-03-11 06:18:25'),
(5, 'Barangan Media', '', '2024-07-28 09:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `expensename`
--

CREATE TABLE `expensename` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expensename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `registeredby` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expensename`
--

INSERT INTO `expensename` (`id`, `categoryname`, `expensename`, `registeredby`, `creation_date`) VALUES
(1, '1', 'pens and paper', 'Nikhil', '2022-03-11 06:14:58'),
(2, '3', ' computers', 'Nikhil', '2022-03-11 06:16:58'),
(3, '4', ' additional office space', 'Nikhil', '2022-03-11 06:18:40'),
(4, '5', ' ', 'Frankie', '2024-07-28 09:43:55'),
(5, '5', ' Camera', 'Frankie', '2024-07-28 09:45:08'),
(6, '5', ' Lens Camera', 'Frankie', '2024-07-28 09:45:28'),
(7, '5', ' Hdmi Cable', 'Frankie', '2024-07-28 09:46:33'),
(8, '5', ' Connector Usb to Hdmi', 'Frankie', '2024-07-28 09:48:31'),
(9, '5', ' Hdmi Splitter', 'Frankie', '2024-07-28 09:53:07'),
(10, '5', ' Usb Type-C', 'Frankie', '2024-07-28 09:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `general_jaunal`
--

CREATE TABLE `general_jaunal` (
  `id` int(12) NOT NULL,
  `property` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `credit` varchar(15) NOT NULL,
  `debit` varchar(15) NOT NULL,
  `ref_no` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `general_jaunal`
--

INSERT INTO `general_jaunal` (`id`, `property`, `description`, `credit`, `debit`, `ref_no`, `date`) VALUES
(1, '', 'general', '51000', '', '983233477', '2022-03-11 06:24:29'),
(2, '', 'store item out: Candles', '', '600', '363126121', '2022-03-11 07:25:34'),
(3, '', 'used item: Candles', '600', '', '363126121', '2022-03-11 07:25:34'),
(4, '', 'store item out: Name tags', '', '200', '988244425', '2022-03-11 08:58:10'),
(5, '', 'used item: Name tags', '200', '', '988244425', '2022-03-11 08:58:10'),
(6, '', 'payment by nikhil', '2500', '', '319458877', '2022-03-11 08:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `newfiles`
--

CREATE TABLE `newfiles` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'application/octet-stream',
  `description` varchar(255) NOT NULL DEFAULT 'File Transfer',
  `disposition` varchar(255) NOT NULL DEFAULT 'attachment',
  `expires` int(11) NOT NULL DEFAULT 0,
  `cache` varchar(255) NOT NULL DEFAULT 'must-revalidate',
  `pragma` varchar(255) NOT NULL DEFAULT 'public',
  `downloads` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petty_balance`
--

CREATE TABLE `petty_balance` (
  `id` int(11) NOT NULL,
  `property` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash`
--

CREATE TABLE `petty_cash` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref_no` int(15) NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `method` varchar(255) NOT NULL,
  `initiatedby` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `store_out`
--

CREATE TABLE `store_out` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `itemsoutvalue` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store_out`
--

INSERT INTO `store_out` (`id`, `date`, `item`, `quantity`, `itemsoutvalue`) VALUES
(1, '2022-03-11', 'Name tags', '10', 200);

-- --------------------------------------------------------

--
-- Table structure for table `store_stock`
--

CREATE TABLE `store_stock` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `rate` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `quantity_remaining` varchar(500) NOT NULL,
  `itemvalue` int(15) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store_stock`
--

INSERT INTO `store_stock` (`id`, `date`, `item`, `quantity`, `rate`, `total`, `quantity_remaining`, `itemvalue`, `status`) VALUES
(1, '2022-03-11', 'Candles', '', '13', '6500', '500', 6500, '1'),
(2, '2022-03-11', 'Name tags', '', '20', '10000', '490', 9800, '1'),
(3, '2022-03-11', 'Batteries', '', '20', '400', '20', 400, '1'),
(4, '2022-03-11', 'First aid kit', '', '250', '250', '1', 250, '1'),
(5, '2022-03-11', 'Curtains', '', '250', '2500', '10', 2500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, 'U001', 'Admin', 'admin', 'Frankie', 'Jones', 1119397473, 'frankiejones@bemcc.com', 1, 'pro4.jpg', '21232f297a57a5a743894a0e4a801fc3', '2021-07-21 10:18:39'),
(31, 'U006', 'Admin', 'kavoldski', 'Cedric', 'Hilary', 183743375, 'kavoldski@bemcc.com', 1, 'avatar15.jpg', 'e10adc3949ba59abbe56e057f20f883e', '2024-07-27 08:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblattendancy`
--

CREATE TABLE `tblattendancy` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Sex` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Age` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `District` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Village` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Cdate` date DEFAULT NULL,
  `Temperature` int(10) DEFAULT NULL,
  `Registeredby` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblattendancy`
--

INSERT INTO `tblattendancy` (`ID`, `Name`, `Sex`, `Age`, `District`, `Village`, `Phone`, `Cdate`, `Temperature`, `Registeredby`, `lastname`) VALUES
(1, 'Aiden Christ', 'Male', '26', 'Nashik', 'Nashik', 2147483647, '2022-03-11', 55, 'Nikhil', 'Bhalerao'),
(2, 'Remo Dsouza', 'Male', '41', 'Pune', 'Pune', 2147483647, '2022-03-11', 103, 'Nikhil', 'Bhalerao');

-- --------------------------------------------------------

--
-- Table structure for table `tblbaptism`
--

CREATE TABLE `tblbaptism` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Secondname` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) NOT NULL,
  `Sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Parish` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Village` varchar(255) DEFAULT NULL,
  `District` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Registeredby` varchar(200) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblchristian`
--

CREATE TABLE `tblchristian` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `Age` int(11) NOT NULL DEFAULT 1,
  `Sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Parish` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Village` varchar(255) DEFAULT NULL,
  `District` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Marital` varchar(255) DEFAULT NULL,
  `Registeredby` varchar(200) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblchristian`
--

INSERT INTO `tblchristian` (`ID`, `Name`, `Code`, `number`, `Age`, `Sex`, `Occupation`, `Status`, `Country`, `Parish`, `Village`, `District`, `Email`, `Phone`, `Photo`, `Marital`, `Registeredby`, `lastname`, `Birthdate`, `CreationDate`) VALUES
(1, 'Frankie Jones anak Saing', '312654', 1, 31, 'Male', 'Technician', 'Baptised', 'Iban', 'BEM Central City', 'Kampung Saratok', 'Saratok', 'frankiejones99@gmail.com', '111111111', 'face21.jpg', 'Single', 'Nikhil', 'Bhalerao', '1997-03-25', '2022-03-11 06:01:53'),
(5, 'Cedric Hilary Samah', '001206130199', 1, 24, 'Male', 'Bussiness man', 'Baptised', 'Malaysia', 'Jalan Allamanda 2', 'Kampung Data Kakus', 'Bintulu', 'kavoldski@gmail.com', '183743375', '449176931_805371258365420_7486760121003106164_n.jpg', 'Single', 'Nikhil', 'Bhalerao', '2000-12-06', '2024-07-27 07:57:26'),
(6, 'Joshua Caseley Anak Akun', 'CC0001', 1, 42, 'Male', 'Penolong Pengarah Pendidikan', 'Baptised', 'Malaysia', 'NA', 'Julau Pakan Sarikei', 'No.45c, Taman Berangan Height', 'caselee1982@yahoo.com', '0138179369', '', 'Married', 'Frankie', 'Jones', '1982-05-07', '2024-07-27 15:51:54'),
(7, 'Bolton Bigin Anak Tumas', 'CC0002', 1, 31, 'Male', 'Software Engineer', 'Baptised', 'Malaysia', 'NA', 'Sabah', 'P1-o3-06 Taman Vista Ilmu ', 'boltonbigin@gmail.com', '0143914385', '', 'Married', 'Frankie', 'Jones', '1993-10-18', '2024-07-28 08:08:14'),
(8, 'Lawrence Cornelius Anak Sijem', 'CC0003', 1, 44, 'Male', 'Juruteknik', 'Baptised', 'Malaysia', 'Taman Univista, Kuching-samarahan Expressway 94300 Kota Samarahan', 'Kampung Singai', '44e, Lorong 3c,', 'mantre55@yahoo.com', '0198652602', '', 'Married', 'Frankie', 'Jones', '1980-02-02', '2024-07-28 08:27:37'),
(9, 'Christopher Anak Kayad', 'CC0004', 1, 46, 'Male', 'Manager', 'Baptised', 'Malaysia', 'Taman Desa Ilmu, Jln Datuk Muhammad Musa, 94300 Kota Samarahan', '', 'No.164, Lorong 22b1', 'kriztopper78@gmail.com', '0198595467', '', 'Married', 'Frankie', 'Jones', '1978-03-26', '2024-07-28 08:35:35'),
(10, 'Roland Le', 'CC0005', 1, 44, 'Male', 'Pengawai Ehwal Ekonomi', 'Baptised', 'Malaysia', 'Tmn Samarindah Baru, Samarindah, Kota Samarahan', '', 'No.151, Lrg 18s9,', 'rollonjesus@yahoo.com', '0105076154', '', 'Married', 'Frankie', 'Jones', '1978-08-03', '2024-07-28 08:38:33'),
(11, 'Tansli Mering', 'CC0006', 1, 49, 'Male', 'Pegawai Polis', 'Baptised', 'Malaysia', 'Taman Samarindah Kota Samarahan', '', 'No.866 Lorong 4b4', 'tanslimering@gmail.com', '0133098821', '', 'Married', 'Frankie', 'Jones', '1975-01-31', '2024-07-28 08:59:02'),
(12, 'Dolly Jenil', 'CC0007', 1, 42, 'Female', 'Project Accounts Executive', 'Baptised', 'Malaysia', 'Jln Dato Muhd Musa, 94300 Kota Samarahan', '', '48 Kpg Merdang Gayam,', 'dollyjenil82@gmail.com', '01113106122', '', 'Married', 'Frankie', 'Jones', '1982-12-17', '2024-07-28 09:01:15'),
(13, 'Johnny Anak Umus', 'CC0008', 1, 49, 'Male', 'Pesara Tentera', 'Baptised', 'Malaysia', 'Taman Desa Murni Jalan Dato Mohd Musa 93400 Kota Samarahan Sarawak ', '', 'Lot 7', 'anyukduan@gmail.com', '01114042701', '', 'Married', 'Frankie', 'Jones', '1975-02-20', '2024-07-28 09:05:10'),
(14, 'Deday Kipli', 'CC0009', 1, 42, 'Male', 'Bomba', 'Baptised', 'Malaysia', 'Taman Palm Villa Kota Samarahan', '', 'No.152 Lorong 9 ', 'dedaykipli@gmail.com', '0138046207', '', 'Married', 'Frankie', 'Jones', '1982-05-08', '2024-07-28 09:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyphone` text NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `creationdate`) VALUES
(1, '123456', 'BEM Central City', 'bemcentralcity@gmail.com', 'Malaysia', '0178073031', 'BEM Central City, 94300 Kota Samarahan, Sarawak', 'logo.png', '0', '2022-03-11 05:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE `tblitems` (
  `id` int(11) NOT NULL,
  `item` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`id`, `item`, `description`, `Creationdate`) VALUES
(1, 'Candles', 'for prayers', '2022-03-11 07:28:47'),
(2, 'Name tags', 'for official use', '2022-03-11 07:29:25'),
(3, 'Batteries', 'for PA system components', '2022-03-11 07:30:19'),
(4, 'First aid kit', 'for medical use', '2022-03-11 07:31:36'),
(5, 'Curtains', 'for church window', '2022-03-11 08:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblloans`
--

CREATE TABLE `tblloans` (
  `id` int(11) NOT NULL,
  `bankname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `promisedamount` int(11) NOT NULL,
  `loanamount` int(11) NOT NULL,
  `currency` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loandescription` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `depositedby` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblloans`
--

INSERT INTO `tblloans` (`id`, `bankname`, `phone`, `promisedamount`, `loanamount`, `currency`, `loandescription`, `date`, `depositedby`) VALUES
(1, 'Elizabeth Haddad', 2147483647, 5100, 3900, 'INR', 'she said i will give', '2022-03-12', 'Nikhil'),
(2, 'David A K', 2147483647, 1000, 500, 'INR', 'for building developement', '2022-03-11', 'Nikhil');

-- --------------------------------------------------------

--
-- Table structure for table `tblmarriage`
--

CREATE TABLE `tblmarriage` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Age` int(11) NOT NULL DEFAULT 1,
  `Sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Parish` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Village` varchar(255) DEFAULT NULL,
  `District` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Registeredby` varchar(200) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `id` int(11) NOT NULL,
  `nature` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbloffertory`
--

CREATE TABLE `tbloffertory` (
  `id` int(11) NOT NULL,
  `currency` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `offertoryamount` int(10) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `depositedby` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'on',
  `date` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `paidamount` int(11) NOT NULL,
  `transaction` int(11) NOT NULL,
  `paiddate` date NOT NULL,
  `attachment` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `SerDes` varchar(250) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expence`
--
ALTER TABLE `expence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensecategory`
--
ALTER TABLE `expensecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensename`
--
ALTER TABLE `expensename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_jaunal`
--
ALTER TABLE `general_jaunal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newfiles`
--
ALTER TABLE `newfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_balance`
--
ALTER TABLE `petty_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_cash`
--
ALTER TABLE `petty_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_out`
--
ALTER TABLE `store_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_stock`
--
ALTER TABLE `store_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblattendancy`
--
ALTER TABLE `tblattendancy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbaptism`
--
ALTER TABLE `tblbaptism`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblchristian`
--
ALTER TABLE `tblchristian`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblloans`
--
ALTER TABLE `tblloans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmarriage`
--
ALTER TABLE `tblmarriage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbloffertory`
--
ALTER TABLE `tbloffertory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expence`
--
ALTER TABLE `expence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expensename`
--
ALTER TABLE `expensename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `general_jaunal`
--
ALTER TABLE `general_jaunal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newfiles`
--
ALTER TABLE `newfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petty_balance`
--
ALTER TABLE `petty_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_out`
--
ALTER TABLE `store_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_stock`
--
ALTER TABLE `store_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblattendancy`
--
ALTER TABLE `tblattendancy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbaptism`
--
ALTER TABLE `tblbaptism`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblchristian`
--
ALTER TABLE `tblchristian`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblloans`
--
ALTER TABLE `tblloans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmarriage`
--
ALTER TABLE `tblmarriage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbloffertory`
--
ALTER TABLE `tbloffertory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
