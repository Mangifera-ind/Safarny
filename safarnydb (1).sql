-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 12:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safarnydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `subscription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_service`
--

CREATE TABLE `appointment_service` (
  `appointmentservice_id` int(11) NOT NULL,
  `service_fee` int(11) NOT NULL,
  `cancellation_policy` varchar(255) NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `region`, `language`, `currency`) VALUES
(0, '', '', '', ''),
(101, 'Canada', 'North America', 'English', 'Canadian Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `issuing_office`
--

CREATE TABLE `issuing_office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `office_location` varchar(255) NOT NULL,
  `opening_time` time NOT NULL,
  `closeing_time` time NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `selectedservice`
--

CREATE TABLE `selectedservice` (
  `service_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `appointmentservice_id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `bundle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `travel_agency`
--

CREATE TABLE `travel_agency` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `referal_links` varchar(255) NOT NULL,
  `agency_description` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_gender` tinyint(1) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` int(11) NOT NULL,
  `issuing_country` varchar(255) NOT NULL,
  `visa_fee` varchar(255) NOT NULL,
  `expiration_data` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visa_details`
--

CREATE TABLE `visa_details` (
  `visadetails_id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `visatype_id` int(11) NOT NULL,
  `visarequirments_id` int(11) NOT NULL,
  `visa_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visa_requirments`
--

CREATE TABLE `visa_requirments` (
  `visarequirments_id` int(11) NOT NULL,
  `visa_restrictions` varchar(3500) NOT NULL,
  `price` varchar(255) NOT NULL,
  `issuing_duration` varchar(255) NOT NULL,
  `requirements` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visa_requirments`
--

INSERT INTO `visa_requirments` (`visarequirments_id`, `visa_restrictions`, `price`, `issuing_duration`, `requirements`) VALUES
(1, 'Each applicant 18 years or older must complete IMM 5645 form.\r\nFamily members or third parties who apply on behalf of the applicant need to complete IMM 5476 form.', '', '', 'passports (regular, official or diplomatic) from most countries (see exceptions below)\r\nalien’s passport for stateless persons\r\nUS Permit to Re-Enter (Form I-327)\r\nUS Refugee Travel Document (Form I-571)\r\nother refugee travel documents for non-citizens\r\nA clear, colour copy of your valid passport or travel document that you’ll use to travel to Canada\r\n\r\nIf you have a passport, you must provide a copy of\r\n\r\nthe page that shows your birth date and country of origin\r\nany pages with stamps, visas or markings\r\nIf you have a travel document, it must be issued by a government and include your name\r\ndate of birth\r\ndocument number\r\ncitizenship or residency status\r\nphoto\r\nexpiry date (if applicable)\r\nRecommended documents: Travel History, Itinerary, and Bank account statement.');

-- --------------------------------------------------------

--
-- Table structure for table `visa_types`
--

CREATE TABLE `visa_types` (
  `visatype_id` int(11) NOT NULL,
  `visatype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD PRIMARY KEY (`appointmentservice_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `issuing_office`
--
ALTER TABLE `issuing_office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `selectedservice`
--
ALTER TABLE `selectedservice`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`visa_id`);

--
-- Indexes for table `visa_details`
--
ALTER TABLE `visa_details`
  ADD PRIMARY KEY (`visadetails_id`);

--
-- Indexes for table `visa_requirments`
--
ALTER TABLE `visa_requirments`
  ADD PRIMARY KEY (`visarequirments_id`);

--
-- Indexes for table `visa_types`
--
ALTER TABLE `visa_types`
  ADD PRIMARY KEY (`visatype_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
