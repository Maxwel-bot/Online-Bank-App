-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 02:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_staff`
--

CREATE TABLE `bank_staff` (
  `Id` int(255) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `staff_id` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Mobile_no` varchar(50) DEFAULT NULL,
  `Email_id` varchar(50) DEFAULT 'Nill',
  `Gender` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `CITIZENSHIP` varchar(50) DEFAULT NULL,
  `Home_addr` varchar(50) DEFAULT NULL,
  `Last_login` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_staff`
--

INSERT INTO `bank_staff` (`Id`, `staff_name`, `staff_id`, `Password`, `Mobile_no`, `Email_id`, `Gender`, `Department`, `DOB`, `CITIZENSHIP`, `Home_addr`, `Last_login`) VALUES
(8, 'Maxwell MAXWELL', '582', '08119353acf600666553e7b1ec40eea5', '+2348135931429', 'maxwell.maxwell@student.aul.edu.ng', 'Male', 'Cash Deposit', '2022-08-25', 'Nigerian', 'Anchor Uni', '24/08/22 08:44:41 AM');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_709112`
--

CREATE TABLE `beneficiary_709112` (
  `id` int(255) NOT NULL,
  `Beneficiary_name` varchar(255) DEFAULT NULL,
  `Beneficiary_ac_no` varchar(255) DEFAULT NULL,
  `IFSC_code` varchar(255) DEFAULT NULL,
  `Account_type` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Date_added` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_709335`
--

CREATE TABLE `beneficiary_709335` (
  `id` int(255) NOT NULL,
  `Beneficiary_name` varchar(255) DEFAULT NULL,
  `Beneficiary_ac_no` varchar(255) DEFAULT NULL,
  `IFSC_code` varchar(255) DEFAULT NULL,
  `Account_type` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Date_added` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beneficiary_709335`
--

INSERT INTO `beneficiary_709335` (`id`, `Beneficiary_name`, `Beneficiary_ac_no`, `IFSC_code`, `Account_type`, `Status`, `Date_added`) VALUES
(1, 'Maxwell MAXWELL', '70939709864', '', 'Saving', 'ACTIVE', '22/08/22 07:51:19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_709864`
--

CREATE TABLE `beneficiary_709864` (
  `id` int(255) NOT NULL,
  `Beneficiary_name` varchar(255) DEFAULT NULL,
  `Beneficiary_ac_no` varchar(255) DEFAULT NULL,
  `IFSC_code` varchar(255) DEFAULT NULL,
  `Account_type` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Date_added` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time_sent` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `firstname`, `lastname`, `email_address`, `subject`, `message`, `time_sent`) VALUES
(1, 'James', 'Precious', 'maxwell.maxwell@student.aul.edu.ng', 'Application to Undergo Six Months Internship at Proxynet ', '4eq', '2022-08-07 23:04:44.355236'),
(2, 'Maxwell', 'MAXWELL', 'maxwell.maxwell@student.aul.edu.ng', 'Application to Undergo Six Months Internship at Proxynet ', ' wdwd', '2022-08-20 18:30:15.856733'),
(3, 'Maxwell', 'MAXWELL', 'maxwell.maxwell@student.aul.edu.ng', 'Application to Undergo Six Months Internship at Proxynet ', 'ebjkfkefkbwfe', '2022-08-22 11:09:21.496747');

-- --------------------------------------------------------

--
-- Table structure for table `customers_account`
--

CREATE TABLE `customers_account` (
  `Id` int(100) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(300) DEFAULT NULL,
  `Customer_Photo` longblob DEFAULT NULL,
  `Photo_name` varchar(500) DEFAULT NULL,
  `Customer_ID` varchar(20) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `Landline_no` varchar(10) NOT NULL,
  `Home_Addr` varchar(100) NOT NULL,
  `Office_Addr` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Pin_code` varchar(255) NOT NULL,
  `Account_no` varchar(20) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `IFSC_Code` varchar(50) DEFAULT NULL,
  `PAN` varchar(10) DEFAULT NULL,
  `CITIZENSHIP` varchar(50) DEFAULT NULL,
  `Current_Balance` float(100,2) DEFAULT NULL,
  `LastTransaction` int(20) DEFAULT 0,
  `Mobile_no` varchar(20) DEFAULT NULL,
  `Email_ID` varchar(50) DEFAULT 'Nil',
  `Debit_Card_No` varchar(50) DEFAULT NULL,
  `Debit_Card_Pin` int(4) DEFAULT NULL,
  `CVV` int(3) DEFAULT NULL,
  `DOB` varchar(20) DEFAULT NULL,
  `Area_Loc` varchar(255) DEFAULT NULL,
  `Nominee_name` varchar(255) DEFAULT NULL,
  `Nominee_ac_no` varchar(255) DEFAULT NULL,
  `Last_Login` varchar(50) DEFAULT NULL,
  `Ac_Opening_Date` varchar(255) DEFAULT NULL,
  `Account_Status` varchar(10) NOT NULL,
  `Account_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_account`
--

INSERT INTO `customers_account` (`Id`, `Username`, `Password`, `Customer_Photo`, `Photo_name`, `Customer_ID`, `Gender`, `Landline_no`, `Home_Addr`, `Office_Addr`, `Country`, `State`, `City`, `Pin_code`, `Account_no`, `Branch`, `IFSC_Code`, `PAN`, `CITIZENSHIP`, `Current_Balance`, `LastTransaction`, `Mobile_no`, `Email_ID`, `Debit_Card_No`, `Debit_Card_Pin`, `CVV`, `DOB`, `Area_Loc`, `Nominee_name`, `Nominee_ac_no`, `Last_Login`, `Ac_Opening_Date`, `Account_Status`, `Account_type`) VALUES
(23, 'Maxwell MAXWELL', 'b4cc344d25a2efe540adbf2678e2304c', NULL, NULL, '709335', 'Male', '2345678', 'Anchor Uni', 'Anchor', 'Nigeria', 'Alaska', 'Vancouver', '3544', '70921709335', ' ', '709', '', 'Nigerian', 947600.00, 0, '8135931429', 'maxwell.maxwell@student.aul.edu.ng', '421349256645', 5276, NULL, '2022-08-18', 'Texas', '', '', '12/09/22 02:24:00 PM', '21/08/22 06:35:12 PM', 'ACTIVE', 'Saving'),
(22, 'Maxwell MAXWELL', '08119353acf600666553e7b1ec40eea5', NULL, NULL, '709864', 'Female', '2345678', 'Anchor Uni', 'Anchor', 'Nigeria', 'Alaska', 'Vancouver', '3544', '70939709864', ' ', '709', '', 'Nigerian', 1003046464.00, 0, '8135931429', 'maxwell.maxwell@student.aul.edu.ng', '421317569553', 9325, NULL, '2022-08-20', 'Texas', '', '', '23/08/22 09:47:29 PM', '20/08/22 10:15:10 PM', 'ACTIVE', 'Saving'),
(32, 'Maxwell MAXWELL', '8601f6e1028a8e8a966f6c33fcd9aec4', NULL, NULL, '709112', 'Male', '2345678', 'Anchor Uni', 'Anchor', 'Nigeria', 'Alaska', 'Vancouver', '3544', '7095709112', ' ', '709', '', 'Nigerian', NULL, 0, '8135931429', 'maxwell.maxwell@student.aul.edu.ng', '421343801114', 4397, NULL, '2022-08-18', 'Texas', '', '', NULL, '24/08/22 09:08:16 AM', 'ACTIVE', 'Saving');

-- --------------------------------------------------------

--
-- Table structure for table `loan_709112`
--

CREATE TABLE `loan_709112` (
  `id` int(255) NOT NULL,
  `Account_No` varchar(255) DEFAULT NULL,
  `Desired_Amount` varchar(255) DEFAULT NULL,
  `Annual_Income` varchar(255) DEFAULT NULL,
  `Full_name` varchar(255) DEFAULT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `Email_Id` varchar(255) DEFAULT NULL,
  `Home_Address` varchar(255) DEFAULT NULL,
  `Mobile_No` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Job_title` varchar(255) DEFAULT NULL,
  `Purpose` varchar(255) DEFAULT NULL,
  `Date_requested` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_709112`
--

INSERT INTO `loan_709112` (`id`, `Account_No`, `Desired_Amount`, `Annual_Income`, `Full_name`, `DOB`, `Email_Id`, `Home_Address`, `Mobile_No`, `Country`, `City`, `Region`, `Job_title`, `Purpose`, `Date_requested`) VALUES
(3, '7389532411', '30,000', '1,000,000', 'Maxwell MAXWELL', '2022-08-25', 'maxwell.maxwell@student.aul.edu.ng', 'Anchor Uni', '+2348135931429', 'Nigeria', 'Vancouver', 'Alaska', 'Programmer', 'Education', '24/08/22 02:46:03 PM'),
(4, '7389106689', '30,000', '1,000,000', 'Maxwell MAXWELL', '2022-09-01', 'maxwell.maxwell@student.aul.edu.ng', 'Anchor Uni', '+2348135931429', 'Nigeria', 'Vancouver', 'Alaska', 'Programmer', 'Education', '24/08/22 02:59:31 PM'),
(5, '7389106689', '30,000', '1,000,000', 'Maxwell MAXWELL', '2022-08-19', 'maxwell.maxwell@student.aul.edu.ng', 'Anchor Uni', '+2348135931429', 'Nigeria', 'Vancouver', 'Alaska', 'Programmer', 'Education', '24/08/22 04:05:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `loan_requests`
--

CREATE TABLE `loan_requests` (
  `loanid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `annual_income` varchar(100) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `time_borrowed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_requests`
--

INSERT INTO `loan_requests` (`loanid`, `userid`, `full_name`, `loan_amount`, `annual_income`, `account_number`, `date_of_birth`, `phone_number`, `email_address`, `home_address`, `city`, `country`, `region`, `occupation`, `purpose`, `time_borrowed`) VALUES
(9, 709112, 'Maxwell MAXWELL', '30,000', '1,000,000', '7389106689', '2022-08-19', '+2348135931429', 'maxwell.maxwell@student.aul.edu.ng', 'Anchor Uni', 'Vancouver', 'Nigeria', 'Alaska', 'Programmer', 'Education', '2024-08-22 03:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `passbook_709112`
--

CREATE TABLE `passbook_709112` (
  `id` int(255) NOT NULL,
  `Transaction_id` varchar(255) DEFAULT NULL,
  `Transaction_date` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Cr_amount` varchar(255) DEFAULT NULL,
  `Dr_amount` varchar(255) DEFAULT NULL,
  `Net_Balance` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passbook_709112`
--

INSERT INTO `passbook_709112` (`id`, `Transaction_id`, `Transaction_date`, `Description`, `Cr_amount`, `Dr_amount`, `Net_Balance`, `Remark`) VALUES
(1, '856226981', '24/08/22 09:08:16 AM', 'Account Opening', '0', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passbook_709335`
--

CREATE TABLE `passbook_709335` (
  `id` int(255) NOT NULL,
  `Transaction_id` varchar(255) DEFAULT NULL,
  `Transaction_date` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Cr_amount` varchar(255) DEFAULT NULL,
  `Dr_amount` varchar(255) DEFAULT NULL,
  `Net_Balance` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passbook_709335`
--

INSERT INTO `passbook_709335` (`id`, `Transaction_id`, `Transaction_date`, `Description`, `Cr_amount`, `Dr_amount`, `Net_Balance`, `Remark`) VALUES
(1, '157881688', '21/08/22 06:35:12 PM', 'Account Opening', '0', '0', '0', NULL),
(2, '696802876', '22/08/22 12:04:08 PM', 'Cash Deposit', '3000000', '0', '3000000', 'Cash Deposit'),
(3, '793939060', '23/08/22 08:31:35 PM', 'Maxwell MAXWELL/70939709864/709', '0', '400', '2999600', ''),
(4, '433111284', '23/08/22 08:43:24 PM', 'Maxwell MAXWELL/70939709864', '0', '3000', '2983600', NULL),
(5, '121328563', '23/08/22 08:45:29 PM', 'Maxwell MAXWELL/70939709864', '0', '3000', '2980600', NULL),
(6, '339968581', '23/08/22 09:58:40 PM', 'Loan', '1000000', '0', '3980600', 'Cash Deposit'),
(7, '441922815', '05/09/22 02:43:51 PM', 'Maxwell MAXWELL/70939709864', '0', '30000', '3950600', NULL),
(8, '729341455', '05/09/22 02:44:36 PM', 'Maxwell MAXWELL/70939709864', '0', '3000000', '950600', NULL),
(9, '749725327', '12/09/22 03:08:22 PM', 'Maxwell MAXWELL/70939709864', '0', '3000', '947600', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passbook_709864`
--

CREATE TABLE `passbook_709864` (
  `id` int(255) NOT NULL,
  `Transaction_id` varchar(255) DEFAULT NULL,
  `Transaction_date` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Cr_amount` varchar(255) DEFAULT NULL,
  `Dr_amount` varchar(255) DEFAULT NULL,
  `Net_Balance` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passbook_709864`
--

INSERT INTO `passbook_709864` (`id`, `Transaction_id`, `Transaction_date`, `Description`, `Cr_amount`, `Dr_amount`, `Net_Balance`, `Remark`) VALUES
(1, '669711329', '20/08/22 10:15:10 PM', 'Account Opening', '0', '0', '0', NULL),
(2, '341666040', '20/08/22 10:20:06 PM', 'Cash Deposit', '1000000000', '0', '1000000000', 'Cash Deposit'),
(3, '793939060', '23/08/22 08:31:35 PM', 'Maxwell MAXWELL/70921709335/709', '400', '0', '1000000400', ''),
(4, '488838836', '23/08/22 08:41:55 PM', 'Maxwell MAXWELL/70921709335', '3000', '0', '1000006392', NULL),
(5, '190716081', '23/08/22 08:42:43 PM', 'Maxwell MAXWELL/70921709335', '4000', '0', '1000007392', NULL),
(6, '433111284', '23/08/22 08:43:24 PM', 'Maxwell MAXWELL/70921709335', '3000', '0', '1000010424', NULL),
(7, '121328563', '23/08/22 08:45:29 PM', 'Maxwell MAXWELL/70921709335', '3000', '0', '1000013432', NULL),
(8, '441922815', '05/09/22 02:43:51 PM', 'Maxwell MAXWELL/70921709335', '30000', '0', '1000043440', NULL),
(9, '729341455', '05/09/22 02:44:36 PM', 'Maxwell MAXWELL/70921709335', '3000000', '0', '1003043456', NULL),
(10, '749725327', '12/09/22 03:08:22 PM', 'Maxwell MAXWELL/70921709335', '3000', '0', '1003046456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pending_accounts`
--

CREATE TABLE `pending_accounts` (
  `Application_no` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Mobile_no` varchar(50) DEFAULT NULL,
  `Email_id` varchar(50) DEFAULT 'Nil',
  `Landline_no` varchar(50) DEFAULT 'Nil',
  `DOB` varchar(50) DEFAULT NULL,
  `PAN` varchar(50) DEFAULT NULL,
  `CITIZENSHIP` varchar(50) DEFAULT NULL,
  `Home_Addr` varchar(100) DEFAULT NULL,
  `Office_Addr` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Pin` varchar(50) DEFAULT NULL,
  `Area_Loc` varchar(255) DEFAULT NULL,
  `Nominee_name` varchar(255) DEFAULT NULL,
  `Nominee_ac_no` varchar(255) DEFAULT NULL,
  `Account_type` varchar(50) DEFAULT NULL,
  `Application_Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `ID` int(11) NOT NULL,
  `transaction_time` datetime(6) NOT NULL,
  `transferred_to` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_staff`
--
ALTER TABLE `bank_staff`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `beneficiary_709112`
--
ALTER TABLE `beneficiary_709112`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_709335`
--
ALTER TABLE `beneficiary_709335`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_709864`
--
ALTER TABLE `beneficiary_709864`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers_account`
--
ALTER TABLE `customers_account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loan_709112`
--
ALTER TABLE `loan_709112`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_requests`
--
ALTER TABLE `loan_requests`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `passbook_709112`
--
ALTER TABLE `passbook_709112`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passbook_709335`
--
ALTER TABLE `passbook_709335`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passbook_709864`
--
ALTER TABLE `passbook_709864`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_accounts`
--
ALTER TABLE `pending_accounts`
  ADD PRIMARY KEY (`Application_no`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_staff`
--
ALTER TABLE `bank_staff`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `beneficiary_709112`
--
ALTER TABLE `beneficiary_709112`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beneficiary_709335`
--
ALTER TABLE `beneficiary_709335`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary_709864`
--
ALTER TABLE `beneficiary_709864`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers_account`
--
ALTER TABLE `customers_account`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `loan_709112`
--
ALTER TABLE `loan_709112`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_requests`
--
ALTER TABLE `loan_requests`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passbook_709112`
--
ALTER TABLE `passbook_709112`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passbook_709335`
--
ALTER TABLE `passbook_709335`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passbook_709864`
--
ALTER TABLE `passbook_709864`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
