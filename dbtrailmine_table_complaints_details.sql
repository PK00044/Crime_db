
-- --------------------------------------------------------

--
-- Table structure for table `complaints_details`
--
-- Creation: Mar 16, 2024 at 06:52 PM
-- Last update: Mar 19, 2024 at 06:19 AM
--

DROP TABLE IF EXISTS `complaints_details`;
CREATE TABLE IF NOT EXISTS `complaints_details` (
  `ack_no` varchar(64) DEFAULT NULL,
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `Wit_name` varchar(100) NOT NULL,
  `Wit_phno` bigint(15) NOT NULL,
  `Crim_age` int(100) NOT NULL,
  `Wit_gender` varchar(10) NOT NULL,
  `crim_gen` varchar(10) NOT NULL,
  `Crime` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pin-code` int(10) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `desc` varchar(1000) NOT NULL,
  `Wit_email` varchar(100) NOT NULL,
  `image` varchar(10000) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`),
  UNIQUE KEY `ack_no` (`ack_no`)
) ;

--
-- Truncate table before insert `complaints_details`
--

TRUNCATE TABLE `complaints_details`;
--
-- Dumping data for table `complaints_details`
--

INSERT DELAYED IGNORE INTO `complaints_details` (`ack_no`, `complaint_id`, `Wit_name`, `Wit_phno`, `Crim_age`, `Wit_gender`, `crim_gen`, `Crime`, `City`, `Address`, `Pin-code`, `State`, `Date`, `desc`, `Wit_email`, `image`, `STATUS`) VALUES
('BMO6J8N4PU', 39, 'pushpa', 1234567890, 30, 'Female', 'Male', 'Robbery', 'Hubli', 'G4-103 Madhura Flats, Madhura Estate, Keshwapur, Hubli', 580023, 'KARNATAKA', '2024-03-18 04:24:00', 'I saw him running out of a home it might be robbery case.', 'nayakpushpa311@gmail.com', 'images/p1.jpg', NULL),
('8UYV29WJC1', 40, 'Pratham', 7894561233, 40, 'Male', 'Female', 'murder', 'Bellary', 'KHB COLONY,MILLERPET', 583101, 'KARANATAKA', '2024-03-05 10:34:00', 'SHE KILLED SOMEONE IN FRONT OF ME.', 'PRATHAMKUBSAD@GMAIL.COM', 'images/p2.jpg', NULL),
('L4SABRDQ5M', 41, 'RASHMI', 1456987892, 35, 'Female', 'Male', 'KIDNAP', 'DHARWAD', 'GANDHINAGAR', 580011, 'KARNATAKA', '2024-03-19 10:38:00', 'SOMEBODY GOT KIDNAPPED', 'RASHMIKENGANUR@GMAIL.COM', 'images/p3.jpg', NULL),
('53VG7S8FL1', 42, 'ADITYA', 7894561230, 40, 'Male', 'Female', 'FRAUD', 'BENGALURU', 'SHOP NO 32,KR MARKET', 560002, 'KARNATAKA', '2024-03-08 10:41:00', '21 DAYS MONEY DOUBLE FRAUD', 'adityalalge99@gmail.com', 'images/p3.jpg', NULL),
('IPC3Y2Q8AH', 43, 'BHARGAVI', 4567891230, 25, 'Female', 'Male', 'Assault', 'HUBLI', 'SAI NAGAR', 580032, 'KARNATAKA', '2024-03-15 10:44:00', 'I SAW SOMEBODY ASSAULTING SOMEONE', 'BHARAVI@GMAIL.COM', 'images/p6.jpg', NULL),
('2GYDH7WSMO', 45, 'SUHAAN', 214587963, 25, 'Male', 'Male', 'BIKE ACCIDENT', 'hubli', 'near jk school hubli', 580032, 'KARNATAKA', '2024-03-19 00:52:00', '-', 'suhaan@gmail.com', 'images/p5.jpg', NULL),
('2DBT8ANREY', 46, 'muiz', 7856987423, 25, 'Male', 'Male', 'Robbery', 'JAIPUR', 'BASWA', 302001, 'RAJASTHAN ', '2024-03-17 10:49:00', 'A SHOP ROBBERY ', 'MUIZ@GMAIL.COM', 'images/p4.jpg', NULL),
('ME4AFQP0IZ', 49, 'SNEHA', 6587749562, 0, 'Female', '', 'Robbery', 'Hubli', 'G4-103 Madhura Flats, Madhura Estate, Keshwapur, Hubli', 580023, 'KARNATAKA', '2024-03-19 03:51:00', 'OUR HOUSE GOT ROBBED.', 'prathamkubsad@gmail.com', 'No File available', NULL);
